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
					'actions'=>array('activateAccount'),
					'users'=>array('*'),
				),
				array('allow',
					'actions'=>array('infoAccount', 'activateAccount', 'index', 'updateEmail','updatePassword','systemLog','personalData','firstLogin','selectType'),
					'users'=>array('@'),
				),
				array('deny',
					'users'=>array('*'),
				),

			);
	}

  function checkEmailDifferent($email2, $email22){
		if ($email2 != $email22){
			return false;
		}else
			return true;
		}

function checkEmailNull($email2, $email22){
	if($email2 == '' || $email22 == ''){
		return false;
	}else
			return true;
		}


	function checkPasswordDifferent($password2, $password22){
		if ($password2 != $password22){
      return false;
		}else
			return true;


		}

	function checkPasswordNull($password2, $password22){
		if($password2 == '' || $password22 == ''){
      return false;
		}else
			return true;

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

	public function checkEmailExist($email2){
		if ($this->currentemail != $email2){
      			return false;
		}
		else
			return true;
		}
		public function checkPasswordExist($password2){
			if ($this->currentpassword != sha1(md5(sha1($password2)))){
        	return false;
			}else
				return true;
			}

		public function checkEmailValid($email2){
		  	if (!preg_match("/^([a-zA-Z0-9._]+)@([a-zA-Z0-9.-]+).([a-zA-Z]{2,4})$/",$email2)){
          return false;
		  } else
		      return true;
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
		if(isset($_POST['Account'])){
      if($this->checkEmailDifferent($_POST['Account']['email2'],$_POST['Account']['email22'])){
      if($this->checkEmailValid($_POST['Account']['email2'], $_POST['Account']['email22'])){
      if($this->checkEmailNull($_POST['Account']['email2'], $_POST['Account']['email22'])){
        if($details->updateByPk($iduser,array('email'=>$_POST['Account']['email2']))){
          $details->email = $_POST['Account']['email2'];
					$section = "Cuenta";
					$details = "Subsección: Cambio Email.";
					$action = "Modificación";
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
          
          echo CJSON::encode(array('status'=>'success'));
          if(Yii::app()->user->admin == 0 )//lastday add
          	Yii::app()->user->logout();
          Yii::app()->end();
        }
      }else{
        echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'El correo ingresado no tiene un formato valido. "ejemplo@ejemplo.com"'));
        Yii::app()->end();
      }
    }else{
      echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Llene los campos de correo electronico.'));
      Yii::app()->end();
    }
			}else{
        echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Los correos no coinciden.'));
        Yii::app()->end();

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
			if($this->checkPasswordExist($_POST['Users']['password'])){
      if($this->checkPasswordDifferent($_POST['Account']['password2'],$_POST['Account']['password22'])){
      if($this->checkPasswordNull($_POST['Account']['password2'],$_POST['Account']['password22'])){
        $details->password=sha1(md5(sha1($_POST['Account']['password2'])));
			if($details->updateByPk($iduser,array('password'=>sha1(md5(sha1($_POST['Account']['password2'])))))){
					$section = "Cuenta";
					$details = "Subsección: Cambio contraseña.";
					$action = "Modificación";
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
          echo CJSON::encode(array('status'=>'success'));
          Yii::app()->user->logout();
          Yii::app()->end();
				}
      }else{
        echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Llene los campos de contraseña.'));
        Yii::app()->end();
      }
      }else{
        echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Las contraseñas no coinciden.'));
        Yii::app()->end();
      }
    }else{
      echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'La contraseña no es de la cuenta.'));
      Yii::app()->end();
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
