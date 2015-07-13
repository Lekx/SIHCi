<?php
class UsersController extends Controller {
	function checkEmail($email, $email2) {

		if ($email != $email2) {
			echo "Los Emails no coinciden.";
			return false;
		} else {
			return true;
		}
	}
	function checkPassword($password, $password2) {
		if ($password != $password2) {
			echo "Las contraseñas no coinciden.";
			return false;
		} else {
			return true;
		}
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


 		$subject = "Activación de cuenta.";
 		$body = '
		 Activación de Cuenta.

		    Le damos la cordial bienvenida a el sistema SIHCi, para activar su cuenta solo debe dar clic en el siguiente enlace. http://sgei.hcg.gob.mx/sihci/sihci/index.php/account/activateAccount?key='.$activationKey.'

		   Si usted no se ha registrado en nuestro sitio, por favor hacer caso omiso de éste correo.

		 ';

		if(!mail($to,$subject,$body)){
		  echo"Error al enviar el mensaje.";
		}
	}

	public function actionCreate() {

		$model = new Users;
		$modelPersons = new Persons;

		//$this->performAjaxValidation($model);
		//$this->performAjaxValidation($modelPersons);
		if(isset($_POST['Users'])) {
			$model->id_roles = '3';
			$model->attributes = $_POST['Users'];

			$result = $model->findAll(array('condition' => 'email="' . $model->email . '"'));
			if (empty($result)){
			if ($this->checkEmail($_POST['Users']['email'], $_POST['Users']['email2'])) {
				if ($this->checkPassword($_POST['Users']['password'], $_POST['Users']['password2'])) {



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
										echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ha ocurrido un error interno al crear el registro (Persona), vuelva a intentarlo más tarde o si persiste el error contacte a el administrador.'));
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
