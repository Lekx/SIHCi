<?php
class UsersController extends Controller {


	function checkEmailDifferent($email, $email2){
		if ($email != $email2){
			return false;
		}else
			return true;
		}

function checkEmailNull($email, $email2){
	if($email == '' || $email2 == ''){
		return false;
	}else
			return true;
		}


	function checkPasswordDifferent($password, $password2){
		if ($password != $password2){
      return false;
		}else
			return true;


		}

	function checkPasswordNull($password, $password2){
		if($password == '' || $password2 == ''){
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

	public function checkEmailExist($email){
		if ($this->currentemail != $email){
      			return false;
		}
		else
			return true;
		}
		public function checkPasswordExist($password){
			if ($this->currentpassword != sha1(md5(sha1($password)))){
        	return false;
			}else
				return true;
			}

		public function checkEmailValid($email){
		  	if (!preg_match("/^([a-zA-Z0-9._]+)@([a-zA-Z0-9.-]+).([a-zA-Z]{2,4})$/",$email)){
          return false;
		  } else
		      return true;
		  }

	public $layout = '//layouts/column2';

	public function filters() {
		return array(
			'accessControl',
			'postOnly + delete',
		);
	}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}


	public function activateAccount($to,$activationKey){
		$sihci = "From: SIHCI";

		// subject
		$subject = "Activar cuenta";

		// message
		$message ='<html>
			  <head>
				<meta charset="UTF-8"/>
			  </head>
			  <body>
				<div id="container" style="width: 450px;height: auto;background-color: #ECEDEE">
			  <div class="logo">
				<img src="http://sgei.hcg.gob.mx/sihci/sihci/img/correos/up.png" alt="" style="width: 100%"/></div>
			  <div class="content" style="font-size: 15px;padding: 20px;text-align: justify">
				<h2>¡Felicidades!</h2>
			  Tu registro a sido exitoso, ahora eres miembro SIHCi,
			  si deseas acceder a tu cuenta necesitas confirmar tu correo,
			  podrás hacerlo con un sensillo click en el link que
			  se encuentra a continuación:
			  </div>
			  <div class="link">
				<img src="http://sgei.hcg.gob.mx/sihci/sihci/img/correos/usuario.png" alt="" style=""/><a href="http://sgei.hcg.gob.mx/sihci/sihci/index.php/account/activateAccount?key='.$activationKey.'" style="text-decoration: none;display: inline-block;margin-left: 20px;margin-bottom: 20px"><h5>Activar mi cuenta ahora</h5></a>
			  </div>
			  <div class="footer" style="font-size: 15px;padding-top: 10px;padding-bottom: 10px;border-top: 1px solid #00B9C0;text-align: center;margin-top: 10px">
				Todos los derechos reservados. Copyright © 2015 SIHCi
			  </div>
			</div>
			  </body>
			</html>
		';

		// from

		// To send HTML mail, the Content-type header must be set
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "CC: udevelopd@gmail.com\r\n";
		$headers .= 'Content-type: text/html;  charset=utf-8' . "\r\n";

		// Additional headers
		$headers .= "From: sihci@noreply.com";

		// Mail it
		if(!mail($to,$subject,$message,$headers)){
		  echo"Error al enviar el mensaje.";
		}
	}

	public function actionCreate() {

		$model = new Users;
		$modelPersons = new Persons;

		$this->performAjaxValidation($model);
		$this->performAjaxValidation($modelPersons);
		if(isset($_POST['Users'])) {
			$model->id_roles = '3';
			$model->attributes = $_POST['Users'];

			$result = $model->findAll(array('condition' => 'email="' . $model->email . '"'));
			if (empty($result)){
			if ($this->checkEmailDifferent($_POST['Users']['email'], $_POST['Users']['email2']) && $this->checkEmailNull($_POST['Users']['email'], $_POST['Users']['email2']) && $this->checkEmailValid($_POST['Users']['email'],$_POST['Users']['email2'])) {
				if ($this->checkPasswordDifferent($_POST['Users']['password'], $_POST['Users']['password2']) && $this->checkPasswordNull($_POST['Users']['password'],$_POST['Users']['password2'])) {



						$model->registration_date = new CDbExpression('NOW()');
						$model->activation_date = new CDbExpression('0000-00-00');
						$model->status = 'inactivo';
						$model->act_react_key = sha1(md5(sha1(date('d/m/y H:i:s') . $model->email . rand(1000, 5000))));
						$model->password = sha1(md5(sha1($model->password)));

						if ($model->validate()) {

							if (isset($_POST['Persons'])) {

								$modelPersons->attributes = $_POST['Persons'];

								$result2 = $modelPersons->findAll(array('condition' => 'curp_passport="' . $modelPersons->curp_passport . '"'));
								if (empty($result2)) {

									$modelPersons->id_user = 0;
									$modelPersons->marital_status = -1;
									$modelPersons->genre = -1;
									$modelPersons->birth_date = '00/00/0000';

									if ($modelPersons->validate()) {
										if($model->save()){
											$modelPersons->id_user = $model->id;
											if($modelPersons->save()){
												$this->activateAccount($model->email,$model->act_react_key);
												$log = new SystemLog();
												$log->id_user = Yii::app()->user->id;
												$log->section = "Empresas";
												$log->details = "Se creo un nuevo registro";
												$log->action = "creacion";
												$log->datetime = new CDbExpression('NOW()');
												$log->save();
												echo CJSON::encode(array('status'=>'success'));
												Yii::app()->end();

												}else{
												echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ha ocurrido un error interno al crear el registro (Persona), vuelva a intentarlo más tarde o si persiste el error contacte a el administrador.'));
												Yii::app()->end();
											}
										}else{
											echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ha ocurrido un error interno al crear el registro (Usuarios), vuelva a intentarlo más tarde o si persiste el error contacte a el administrador.'));
											Yii::app()->end();
										}

									}else{
										echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'El curp o pasaporte no es correcto, vuelva a intentarlo más tarde o si persiste el error contacte a el administrador.'));
										Yii::app()->end();
									}

							}else{
								echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'El curp ingresado ya existe, vuelva a intentarlo más tarde o si persiste el error contacte a el administrador.'));
								Yii::app()->end();
							}
						}
					}
				}else{
					echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Las contraseñas no concuerdan, vuelva a intentarlo más tarde o si persiste el error contacte a el administrador.'));
					Yii::app()->end();
				}
			}else{
				echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Los correos no concuerdan, vuelva a intentarlo más tarde o si persiste el error contacte a el administrador.'));
				Yii::app()->end();
			}
			}else{
				echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ya existe el correo ingresado, vuelva a intentarlo más tarde o si persiste el error contacte a el administrador.'));
				Yii::app()->end();
			}
		}

		if (!isset($_POST['ajax'])) {
			$this->renderPartial('create', array('model' => $model, 'modelPersons' => $modelPersons));
		}
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		if (isset($_POST['Users'])) {
			$model->attributes = $_POST['Users'];
			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}

		}
		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionDelete($id) {
		$this->loadModel($id)->delete();

		if (!isset($_GET['ajax'])) {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}

	}
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Users');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Users('search');
		$model->unsetAttributes();
		if (isset($_GET['Users'])) {
			$model->attributes = $_GET['Users'];
		}

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function loadModel($id) {
		$model = Users::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'The requested page does not exist.');
		}

		return $model;
	}

	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'users-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
