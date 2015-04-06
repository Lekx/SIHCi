<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout = 'informativas';
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	//LO01-Inicio de sesión. 
	public function actionLogin()
	{
		
		$model=new LoginForm;
		$msg = '';
		// if it is ajax validation request
	/*	if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}*/

		// collect user input data
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{

			$model->attributes=$_POST['LoginForm'];

			$is_active = Users::model()->findByAttributes(array("status"=>"activo","email"=>$model->username)); 
			$not_active = Users::model()->findByAttributes(array("status"=>"inactivo","email"=>$model->username)); 

			if ($model->validate() && $model->login() && $is_active != null){
	   			
	   				 echo "200";
			}
			if($not_active != null){
					echo "302";
			}    				
   			else{
					echo "404";
			} 
		
		Yii::app()->end();
	}
		// display the login form

		if(!isset($_POST['ajax']))
		$this->render('login',array('model'=>$model, 'msg' => $msg));
	}

	//$this->renderPartial('login',array('model'=>$model));

	/**
	 * Logs out the current user and redirect to homepage.
	 */

	// LO02 – Cerrar sesión 
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
    //LO03 – Recuperar contraseña 
	public function actionRecoveryPassword()
	{
		$this->layout = 'informativas';
		$model = new RecoveryPassword;
   		$msg = '';
        $random = rand(1000,5000);
	    $date = date("d/m/y H:i:s");

   		if (isset($_POST["RecoveryPassword"])) {
   			$model->attributes = $_POST['RecoveryPassword'];

   			if (!$model->validate()) {
   				$msg = "<strong class='text-error'>Error al enviar el formulario</strong>";
   			}else{
   				
	   				$conexion = Yii::app()->db;

	   				$consulta = "SELECT status FROM users where email='$model->email' and";
	   				$consulta .=" status='activo'";

	   				$resultado = $conexion->createCommand($consulta);
	   				$filas = $resultado->query();
	   				$existe = false;
         
	   				foreach ($filas as $fila) {
	   				   $existe=true;
	   				}
		   				if ($existe === true) {
		   					$conexion = Yii::app()->db;

			   				$consulta = "SELECT email from users WHERE ";
			   				$consulta .= "email='".$model->email."'";

			   				$resultado = $conexion->createCommand($consulta);
			   				$filas = $resultado->query();
			   				$existe = false;

			   				foreach ($filas as $fila) {
			   				   $existe=true;
			   				}
				   				if ($existe === true) {

				   					$llave = sha1(md5(sha1($date."".$model->email."".$random)));
				   					$insertar = "UPDATE users SET act_react_key='$llave' where";
				   					$insertar .=" email='".$model->email."'";
				   					$llaveBD = $conexion->createCommand($insertar)->query();

				   					$email = new SendEmail;
				   					$subject = "Has solicitado recuperar tu password en";
				   					$subject .= Yii::app()->name;
				   					$message = "<a href='http://localhost/sihci/index.php/site/changePassword?key=".$llave.">";
				   					$message .= "Haz click en ésta liga para cambiar tu contraseña";
				   					$message .= "</a><br /><br />";
				   					// $message .= "<a href='http://localhost/'>Regresar a la web</a>";
									$email->Send_Email
									(
										array(Yii::app()->params['emailAdmin'], Yii::app()->name),
										array($model->email, ''),
										$subject,
										$message
										);  
									$model->email="";
										$msg = "<strong class='text-success'>se ha enviado el password</strong>"; 					
				   				}else{
				   					$msg = "<strong class='text-error'>Error, el usuario no existe</strong>";
				   				}
		   				}else{

			   				$msg = "<strong class='text-error'>Su cuenta no ha sido activada favor de revisar su correo para activar la cuenta.</strong>";
			   			}
   			}
   		}
		$this->render('recoveryPassword', array('model' => $model, 'msg' => $msg));
	}

	//LO03 – Recuperar contraseña 
	public function actionChangePassword($key){

            $model = new ChangePassword;
   		  	$msg = '';

   		  	$conexion = Yii::app()->db;

   					$consulta = "SELECT act_react_key from users WHERE ";
   					$consulta .= "act_react_key='".$key."'";

   					$resultado = $conexion->createCommand($consulta);
   					$filas = $resultado->query();
   					$existe = false;

   					foreach ($filas as $fila) {
   					   $existe=true;
   					}
   					if ($existe === true) {

					   		if (isset($_POST["ChangePassword"])) {
					   			$model->attributes = $_POST['ChangePassword'];

					   			if (!$model->validate()) {
					   				$msg = "<strong class='text-error'>Error al enviar el formulario</strong>";
					   				}else{

					   					$conexion = Yii::app()->db;

					   					$consulta = "SELECT act_react_key from users WHERE ";
					   					$consulta .= "act_react_key='".$key."'";

					   					$resultado = $conexion->createCommand($consulta);
					   					$filas = $resultado->query();
					   					$existe = false;

					   					foreach ($filas as $fila) {
					   					   $existe=true;
					   					}
					   					if ($existe === true) {

					   					$insertar = "UPDATE users SET password=sha1(md5(sha1('$model->password'))) where ";
					   					$insertar .= "act_react_key='".$key."'";
					   					$llaveBD = $conexion->createCommand($insertar)->query();

												

										$delete = "UPDATE users SET act_react_key='' where ";
					   					$delete .= "act_react_key='".$key."'";
					   					$deleteDB = $conexion->createCommand($delete)->query();

					   					$model->password="";
										$model->password2="";
										$msg = "<strong class='text-success'>su contraseña ha cambiado con éxito</strong>"; 
					   					}else{
					   					
					   					$this->redirect(Yii::app()->homeUrl);
					   					}
					   				}
					   			
					   		}
   					}else{
   					$this->redirect(Yii::app()->homeUrl);
   					}
   		
		$this->render('changePassword', array('model' => $model, 'msg' => $msg, 'key' => $key));
	}
}