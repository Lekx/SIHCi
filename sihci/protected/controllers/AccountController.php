<?php 
  	class AccountController extends Controller{

  	public $layout = '//layouts/system';
	private $currentemail ='';
	private $currentpassword ='';
	
	function checkEmail($email2, $email22){

		if ($email2 != $email22){
			echo "<script> alert(\"comprobacion de email incorrecto.\")</script>";
			return false;
		}
		else if($email2 == '' || $email22 == ''){
			echo "<script> alert(\"aqui valio madre.\")</script>";
			return false;
		}else
			return true;
	}

	function checkPassword($password2, $password22){
		if ($password2 != $password22){
			echo "<script> alert(\"Las dos contraseñas son distintas.\")</script>";
			return false;
		}
		else if($password2 == '' || $password22 == ''){
			echo "<script> alert(\"Algun campo esta en blanco.\")</script>";
			return false;
		}else
			return true;
	}

	public function actionInfoAccount(){
			$this->layout = 'system';
			//cambiar y agregar estas lineas en esponsors y curriculum
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
			echo "<script> alert(\"no es el email de la cuenta.\")</script>";
			return false;
		}
		else{
			return true;
		}
	}
		public function checkPasswordExist($password){
		if ($this->currentpassword != sha1(md5(sha1($password)))){
			echo "<script> alert(\"el password no es el de la cuenta.\")</script>";
			return false;
		}
		else{
			return true;
		}




	}


	public function actionActivateAccount($key){

		$query = Users::model()->findByAttributes(array('act_react_key'=>$key));		

		var_dump($query);

		if(!is_null($query)){
			
			if(Users::model()->updateByPk($query->id,array('status'=>'activo')))
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
		if(isset($_POST['Users']))
		{
			
			if($this->checkEmailExist($_POST['Users']['email']) && $this->checkEmail($_POST['Account']['email2'], $_POST['Account']['email22']))
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
		if(isset($_POST['Users']))
		{
			if($this->checkPasswordExist($_POST['Users']['password']) && $this->checkPassword($_POST['Account']['password2'],$_POST['Account']['password22']));
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
			$model = new SystemLog('search');
			$model->unsetAttributes(); 
			if(isset($_GET['SystemLog']))
				$model->attributes=$_GET['SystemLog'];

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