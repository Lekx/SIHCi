<?php 
  	class accountController extends controller{


	public $layout='//layouts/informativas';
	private $currentemail ='';
	private $currentpassword ='';
	
	function checkEmail($email2, $email22){

		if ($email2 != $email22){
			echo "<script> alert(\"Las dos correos son distintos.\")</script>";
			return false;
		}
		else if($email2 || $email22 == ''){
			echo "<script> alert(\"Algun campo esta en blanco.\")</script>";
			return false;
		}else
			return true;
	}

	function checkPassword($password2, $password22){
		if ($password2 != $password22){
			echo "<script> alert(\"Las dos contraseñas son distintas.\")</script>";
			return false;
		}
		else if($password2 || $password22 == ''){
			echo "<script> alert(\"Algun campo esta en blanco.\")</script>";
			return false;
		}else
			return true;
	}

	public function actionInfoAccount(){
		
			$details = Users::model()->findByPk(Yii::app()->user->id);
			$this->render('InfoAccount',array(
			'details'=>$details,
			));
	}

	public function checkEmailExist($email){
		if ($this->currentemail != $email){
			echo "<script> alert(\"Las dos correos son distintos.\")</script>";
			return false;
		}
		else{
			return true;
		}
	}
		public function checkPasswordExist($password){
		if ($this->currentpassword != sha1(md5(sha1($password)))){
			echo "<script> alert(\"Las dos contraseñas son distintas.\")</script>";
			return false;
		}
		else{
			return true;
		}




	}

	public function actionUpdateEmail(){
		
		$details = Users::model()->findByPk(Yii::app()->user->id);
		$this->currentemail = $details->email; 
		if(isset($_POST['Users']))
		{
			
			if($this->checkEmailExist($_POST['Users']['email']) && $this->checkEmail($_POST['Account']['email2'], $_POST['Account']['email22']))
			{
				$details->email=$_POST['Account']['email2'];
				if($details->save())
					$this->redirect(array('InfoAccount'));
			}
		}
		$this->renderPartial('_updateEmail',array(
			'details'=>$details,
		));
	}

	public function actionUpdatePassword(){
		
		$details = Users::model()->findByPk(Yii::app()->user->id);
		$this->currentpassword = $details->password;
		if(isset($_POST['Users']))
		{
			if($this->checkPasswordExist($_POST['Users']['password']) && $this->checkPassword($_POST['Account']['password2'],$_POST['Account']['password22']));
			{
				$details->password=sha1(md5(sha1($_POST['Account']['password2'])));
				if($details->save())
					$this->redirect(array('InfoAccount'));
			}					
		}
		$this->renderPartial('_updatePassword',array(
			'details'=>$details,
		));
	



	}
		
	







  	}

	



?>
