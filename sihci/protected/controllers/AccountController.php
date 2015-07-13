<?php


  	class AccountController extends Controller{

  	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

  	public $layout = '//layouts/informativa';
  	/**
	 * @return array action filters
	 */

	private $currentemail ='';
	private $currentpassword ='';

		public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(

				array('allow',
					'actions'=>array('infoAccount', 'activateAccount', 'index', 'updateEmail','updatePassword','systemLog','personalData','firstLogin','selectType'),
					'users'=>array('@'),
				),
				array('deny',
					'users'=>array('*'),
				),

			);
	}

	function checkEmail($email2, $email22){

		if ($email2 != $email22){
			echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error','subMessage'=>'Los correos electrónicos no coinciden.'));
			Yii::app()->end();
			return false;
		}
		else if($email2 == '' || $email22 == ''){
      echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error','subMessage'=>'Favor de llenar los campos de email.'));
      Yii::app()->end();
      return false;
		}else{
      echo CJSON::encode(array('status'=>'success'));
      Yii::app()->end();
			return true;
	}
}

	function checkPassword($password2, $password22){
		if ($password2 != $password22){
      echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error','subMessage'=>'Las contraseñas no coinciden.'));
      Yii::app()->end();
      return false;
		}
		else if($password2 == '' || $password22 == ''){
      echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error','subMessage'=>'Favor de llenar los campos de contraseñas.'));
      Yii::app()->end();
      return false;
		}else{
      echo CJSON::encode(array('status'=>'success'));
      Yii::app()->end();
			return true;
	}
}

	public function actionInfoAccount(){
			$this->layout = 'system';
		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

			$details = Users::model()->findByPk($iduser);
			$this->render('infoAccount',array(
			'details'=>$details,
			));
	}

	public function checkEmailExist($email){
		if ($this->currentemail != $email){
      echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error','subMessage'=>'El correo no es de la cuenta.'));
      Yii::app()->end();
      			return false;
		}
		else{
      echo CJSON::encode(array('status'=>'success'));
      Yii::app()->end();
			return true;
		}
	}
		public function checkPasswordExist($password){
			if ($this->currentpassword != sha1(md5(sha1($password)))){
        echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error','subMessage'=>'La contraseña no es de la cuenta.'));
        Yii::app()->end();
        				return false;
		}
			else{
        echo CJSON::encode(array('status'=>'success'));
        Yii::app()->end();
				return true;
		}
}

		public function checkEmailValid($email){
		  	if (!preg_match("/^([a-zA-Z0-9._]+)@([a-zA-Z0-9.-]+).([a-zA-Z]{2,4})$/",$email)){
          echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error','subMessage'=>'El email no es valido.'));
          Yii::app()->end();
          return false;
		  } else {
          echo CJSON::encode(array('status'=>'success'));
          Yii::app()->end();
		      return true;
		  }
}

	public function actionActivateAccount($key){


	$this->layout='informativas';
		$query = Users::model()->findByAttributes(array('act_react_key'=>$key));


		if(!is_null($query)){

			if(Users::model()->updateByPk($query->id, array('activation_date'=>new CDbExpression('NOW()'))) && Users::model()->updateByPk($query->id, array('status'=>'activo')))
				$result = "success";
			else
				$result = "failure";

		}else
			$result = "failure";

		$this->render('activateAccount',array('result'=>$result));
	}

	public function actionUpdateEmail(){
		$this->layout = 'system';

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$details = Users::model()->findByPk($iduser);
		$this->currentemail = $details->email;
		if(isset($_POST['Account']))
		{

			if($this->checkEmailValid($_POST['Account']['email2'], $_POST['Account']['email22']) && $this->checkEmail($_POST['Account']['email2'],$_POST['Account']['email22']))
			{

				if($details->updateByPk($iduser,array('email'=>$_POST['Account']['email2']))){
					$section = "Cuenta";
					$details = "Subsección: Cambio Email.";
					$action = "Modificación";
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);

					Yii::app()->user->logout();
					$this->redirect(Yii::app()->homeUrl);
				}

			}
		}
		$this->render('_updateEmail',array(
			'details'=>$details,
		));
	}

	public function actionUpdatePassword(){

		$this->layout = 'system';

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$details = Users::model()->findByPk($iduser);
		$this->currentpassword = $details->password;
		if(isset($_POST['Account']))
		{
			if($this->checkPasswordExist($_POST['Users']['password']) && $this->checkPassword($_POST['Account']['password2'],$_POST['Account']['password22']))
			{

				$details->password=sha1(md5(sha1($_POST['Account']['password2'])));
				if($details->updateByPk($iduser,array('password'=>sha1(md5(sha1($_POST['Account']['password2'])))))){
						$section = "Cuenta";
						$details = "Subsección: Cambio contraseña.";
						$action = "Modificación";
						Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);

				}
						Yii::app()->user->logout();
						$this->redirect(Yii::app()->homeUrl);
			}
		}
		$this->render('_updatePassword',array(
			'details'=>$details,
		));




	}

	public function actionSystemLog()
		{


			$this->layout='//layouts/system';
			$model = new SystemLogUsers('search');


			$this->render('systemLog',array(
				'model'=>$model,
			));
		}

		public function actionFirstLogin(){
			$this->layout = 'informativas';
			$this->render('firstLogin',array(
				's'=>'s',
			));
		}

		public function actionSelectType($type){
			$details = Users::model()->findByPk(Yii::app()->user->id);
			if($details->updateByPk(Yii::app()->user->id,array('type'=>$type))){
   				Yii::app()->user->setState('type', $type);
   				$this->redirect(array('account/InfoAccount'));
   			}
		}


  	}





?>
