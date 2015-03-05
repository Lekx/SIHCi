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
		$this->layout="index";
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
	public function actionLogin()
	{
		
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionRecoveryPassword()
	{
		$model = new RecoveryPassword;
   		$msg = '';
        $random = rand(1000,5000);
	    $date = date("d/m/y H:i:s");

   		if (isset($_POST["RecoveryPassword"])) {
   			$model->attributes = $_POST['RecoveryPassword'];

   			if (!$model->validate()) {
   				$msg = "<strong class='text-error'>Error al enviar el formulario</strong>";
   			}else{
   				//enviar email y consulta
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

   					// $consulta = "SELECT password from users WHERE ";
   					// $consulta .= "email='".$model->email."'";

   					// $resultado = $conexion->createCommand($consulta)->query();

   					// $resultado->bindColumn(1, $password);
   					// while($resultado->read()!==false){
   					// 	$password = $password;
   					// }
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
						array($model->email, 'joel'),
						$subject,
						$message
						);  
					$model->email="";
						$msg = "<strong class='text-success'>se ha enviado el password</strong>"; 					
   				}else{
   					$msg = "<strong class='text-error'>Error, el usuario no existe</strong>";
   				}
   			}
   		}
		$this->render('recoveryPassword', array('model' => $model, 'msg' => $msg));
	}
	public function actionChangePassword(){
            $model = new ChangePassword;
   		
   		if (isset($_POST["ChangePassword"])) {
   			$model->attributes = $_POST['ChangePassword'];

   			
   			}
   		
		$this->render('changePassword', array('model' => $model));
	}
}