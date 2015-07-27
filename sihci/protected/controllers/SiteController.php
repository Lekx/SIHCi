<?php

class SiteController extends Controller {
	/**
	 * Declares class-based actions.
	 */

	/*public function actions() {
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}*/

 	public function actionSessionTimeout()
    {
        $this->render('sessionTimeout');
    }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout = 'informativas';
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
	$this->layout = 'informativas';
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest) {
				echo $error['message'];
			} else {
				$this->render('error', $error);
			}

		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact() {
		$this->layout = 'informativas';
		$model = new ContactForm;
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate()) {
				$name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
				$subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
				$headers = "From: $name <{$model->email}>\r\n" .
				"Reply-To: {$model->email}\r\n" .
				"MIME-Version: 1.0\r\n" .
				"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
				Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact', array('model' => $model));

	}

	/**
	 * Displays the login page
	 */
	//LO01-Inicio de sesión.
	public function actionLogin() {

		$model = new LoginForm;
		$msg = '';
		// if it is ajax validation request
		/*	if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
		echo CActiveForm::validate($model);
		Yii::app()->end();
		}*/

		// collect user input data
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {

			$model->attributes = $_POST['LoginForm'];

			$is_active = Users::model()->findByAttributes(array("status" => "activo", "email" => $model->username));

			$not_active = Users::model()->findByAttributes(array("status" => "inactivo", "email" => $model->username));


			if ($model->validate() && $model->login() && $is_active != null) {
				$section = "Login";
				$details = "Usuario: ".$model->username;
				$action = "Ingresó";
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				echo "200";
			} else if ($not_active != null) {
				echo "302";
				Yii::app()->user->logout();
			} else {
				echo "404";
				Yii::app()->user->logout();
			}
			Yii::app()->end();
		}
		// display the login form

		if (!isset($_POST['ajax'])) {
			$this->renderPartial('login', array('model' => $model));
		}

	}

	//$this->renderPartial('login',array('model'=>$model));

	/**
	 * Logs out the current user and redirect to homepage.
	 */

	// LO02 – Cerrar sesión
	public function actionLogout() {
				$section = "Logout";
				$details = "Usuario: ";//.Yii::app()->user->fullname;
				$action = "Cerró Sesión";
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	//LO03 – Recuperar contraseña
	public function actionRecoveryPassword() {

		$model = new RecoveryPassword;
		$msg = '';
		$random = rand(1000, 5000);
		$date = date("d/m/y H:i:s");

		if (isset($_POST['ajax']) && $_POST['ajax'] === 'recovery-form') {

			$model->attributes = $_POST['RecoveryPassword'];

			$is_active = Users::model()->findByAttributes(array("status" => "activo", "email" => $model->email));

			if ($model->validate() && $is_active != null) {


				$key = sha1(md5(sha1($date . "" . $model->email . "" . $random)));
				$is_active->act_react_key = $key;
				$is_active->save();
				$sihci = "From: SIHCI";
				$subject = "Has solicitado recuperar tu contraseña en: ";
				$subject .= Yii::app()->name;
				$title = "¡Has solicitado recuperar tu contraseña!";
				$content = "Haz click en ésta liga para cambiar tu contraseña:";
				$urlImg = "contrasena.png";
				$urltitle = "Cambiar Contraseña.";
				Yii::app()->runController('mail/sendMail/to/'.$to.'/subject/'.$subject.'/title/'.$title.'/content/'.$content.'/urlImg/'.$urlImg.'/urltitle/'.$urltitle.'/key/'.$key);

				$model->email = "";
				echo '200';

			}else{

				echo '404';

			}

		}

		if (!isset($_POST['ajax'])) {
			$this->renderPartial('recoveryPassword', array('model' => $model, 'msg' => $msg));
		}

	}

	function checkPassword($password2, $password22){
		if ($password2 != $password22){
			echo "<script> alert(\"Las contraseñas no coinciden.\")</script>";
			return false;
		}
		else if($password2 == '' || $password22 == ''){
			echo "<script> alert(\"Favor de llenar los campos todos los campos.\")</script>";
			return false;
		}else if(strlen($password2)<6 || strlen($password22<6)){
			echo "<script> alert(\"La contraseña debe ser minimo 6 caracteres.\")</script>";
			return false;
		}else
			return true;
	}

	//LO03 – Recuperar contraseña
	public function actionChangePassword($key) {
		$this->layout = "informativas";
		$user = Users::model()->findByAttributes(array('act_react_key'=>$key));
		$idUser = $user->id;
		$currentpassword = $user->password;
		if ($user != null) {

			if (isset($_POST["ChangePassword"])) {
				if($this->checkPassword($_POST['ChangePassword']['password2'],$_POST['ChangePassword']['password22']))
			{

				if($user->updateByPk($idUser,array('password'=>sha1(md5(sha1($_POST['ChangePassword']['password2']))), 'act_react_key'=>'null'))){
						$section = "Cuenta";
						$details = "Subsección: Olvidó su contraseña.";
						$action = "Modificación";
						Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
					$this->redirect(Yii::app()->homeUrl);
				}

			}
			}
		} else {
			$this->redirect(Yii::app()->homeUrl);
		}

		$this->render('changePassword', array('model' => $user, 'key' => $key));
	}
}
