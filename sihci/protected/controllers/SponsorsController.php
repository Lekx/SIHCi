
<?php

class SponsorsController extends Controller {

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/system';

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','view','sponsorsInfo', 'create_persons', 'create_contacts', 'create_contact',
							     'create_addresses','fillFirst','create_billing','create_docs','delete',
							     'deleteContacts','deleteContact','admin'),
				'expression'=>'($user->Rol->alias==="ADMIN" || $user->type==="moral")',
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	public function actionSponsorsInfo() {

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$sponsorExist = Sponsors::model()->findByAttributes(array('id_user' => $iduser));

		if($sponsorExist != null) {
			$model = $this->loadModel($sponsorExist->id);
			$modelAddresses = Addresses::model()->findByPk($model->id_address);
			$section = "Empresas"; //manda parametros al controlador SystemLog
			$details = "Subsección: Datos de Empresa. Registro Número ".$model->id;
			$action = "Modificación";
		} else {
			$model = new Sponsors;
			$modelAddresses = new Addresses;
			$section = "Empresas"; //manda parametros al controlador SystemLog
			$details = "Subsección: Datos de Facturación";
			$action = "Creación";

		}

		$modelPersons = Persons::model()->findByAttributes(array('id_user' => $iduser));
		$this->performAjaxValidation($model);
		$this->performAjaxValidation($modelAddresses);
		$this->performAjaxValidation($modelPersons);

		if (isset($_POST['Sponsors'])) {
			$model->attributes = $_POST['Sponsors'];
			$modelAddresses->attributes = $_POST['Addresses'];
			$modelPersons->photo_url = CUploadedFile::getInstanceByName('Persons[photo_url]');
			if ($modelPersons->photo_url != "") {
				$logo = CUploadedFile::getInstanceByName('Persons[photo_url]');

			}
			$model->id_user = 1;
			$model->id_address = 1;
			if($modelAddresses->validate() && $modelPersons->validate() && $model->validate()){
				if($modelAddresses->save()) {
					$model->id_user = $iduser;
					$model->id_address = $modelAddresses->id;
					if($model->validate() == 1) {
						if($model->save()) {

							Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
							$modelPersons->photo_url = CUploadedFile::getInstanceByName('Persons[photo_url]');
							if ($modelPersons->photo_url != NULL) {

								$id_sponsor = $iduser;

								$path = YiiBase::getPathOfAlias("webroot") . "/users/" . $id_sponsor . "/cve-hc/";
								if (!file_exists($path)) {
									mkdir($path, 0775, true);
								}

								$files = glob($path);
								foreach ($files as $file) {

									if (is_file($file)) {
										unlink($file);
									}

								}
								$logo->saveAs($path . 'perfil.' . $logo->getExtensionName());
								$logo = "sponsors/" . $id_sponsor . "/cve-hc/" . 'perfil.png';
								$modelPersons->updateByPk(Persons::model()->findByAttributes(array("id_user" => $iduser))->id, array('photo_url' => $logo));
								//if ($modelPersons->updateByPk(Persons::model()->findByAttributes(array("id_user" => $iduser))->id, array('photo_url' => $logo))) {
									$log = new SystemLog();
									$log->id_user = $iduser;
									$log->section = "Empresas";
									$log->details = "Se creo un nuevo registro";
									$log->action = "creacion";
									$log->datetime = new CDbExpression('NOW()');
									$log->save();
									echo CJSON::encode(array('status'=>'success'));
									Yii::app()->end();


								//}
							}
						}
					}

				}

		}else{
				$error1 = CActiveForm::validate($model);
				$error2 = CActiveForm::validate($modelAddresses);
				$error3 = CActiveForm::validate($modelPersons);
				$error = "{";
				if($error1 !='[]')
					$error.= str_replace("{", "",str_replace("}", "",$error1));
				if($error2 !='[]')
					$error.= str_replace("{", "",str_replace("}", "",$error2));
				if($error3 !='[]')
					$error.= str_replace("{", "",str_replace("}", "",$error3));


				if($error!='[]')
					echo str_replace("]\"", "],\"",$error)."}";
					Yii::app()->end();
	        }

		}

		$this->render('SponsorsInfo', array(
			'model' => $model, 'modelAddresses' => $modelAddresses, 'modelPersons' => $modelPersons,
		));
	}

	public function actionCreate_persons() {

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$model = Persons::model()->findByAttributes(array('id_user' => $iduser));

		if (isset($_POST['Persons'])) {
			$model->attributes = $_POST['Persons'];
			$model->id_user = $iduser;
			if($model->validate()){
			if ($model->save()) {
				$section="Empresas";
				$details="Subsección: Datos de Representante. Registro Número ".$model->id;
				$action="Modificación";
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				echo CJSON::encode(array('status'=>'success'));
				Yii::app()->end();
		}
		}else{
			echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ha ocurrido un error interno al crear el registro, vuelva a intentarlo más tarde o si persiste el error contacte a el administrador.'));
			Yii::app()->end();
		}

		}

		$this->render('create_persons', array(
			'model' => $model,
		));
	}

	public function actionCreate_contact() {
	$id_sponsor = Sponsors::model()->findByAttributes(array("id_user" => Yii::app()->user->id))->id;
	$model = new SponsorsContact;
	$modelPull = SponsorsContact::model()->findAllByAttributes(array("id_sponsor"=>$id_sponsor));
	// Uncomment the following line if AJAX validation is needed
	$this->performAjaxValidation($model);
	if (isset($_POST['valuesUpdate1'])) {

		$modelPullIds = $_POST['modelPullIds'];
		$types = $_POST['modelPullTypes'];
		$values1 = $_POST['valuesUpdate1'];
		$values2 = $_POST['valuesUpdate2'];
		$values3 = $_POST['valuesUpdate3'];
		foreach ($_POST['modelPullTypes'] as $key => $type)
			$model->updateByPk($modelPullIds[$key],array('type' => $type,'value' => $values1[$key] . "-" . $values2[$key] . "-" . $values3[$key]));


	}
	if (isset($_POST['values1'])) {

		$id_sponsor = Sponsors::model()->findByAttributes(array('id_user' => Yii::app()->user->id))->id;
		$types = $_POST['types'];
		$values1 = $_POST['values1'];
		$values2 = $_POST['values2'];
		$values3 = $_POST['values3'];

		foreach ($_POST['types'] as $key => $type) {
			unset($model);
			$model = new SponsorsContact;
			$model->id_sponsor = $id_sponsor;
			$model->type = $type;
			$model->value = $values1[$key] . "-" . $values2[$key] . "-" . $values3[$key];
			if($model->validate() == 1){
				if($model->save()){
					$section = "Empresas"; //manda parametros al controlador AdminSystemLog
					$details = "Subsección: Datos de Contactos. Datos: ".$model->fullname;
					$action = "Creación";
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
					echo CJSON::encode(array('status'=>'success'));
					Yii::app()->end();
			}
		}else {
			echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ha ocurrido un error interno al crear el registro, vuelva a intentarlo más tarde o si persiste el error contacte a el administrador.'));
			Yii::app()->end();
		}
	}
}

	$this->render('create_contact', array(
		'model' => $model,'modelPull' => $modelPull
	));
}

	public function actionCreate_contacts() {

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$id_sponsor = Sponsors::model()->findByAttributes(array("id_user" => $iduser))->id;
		$model = new SponsorsContacts;
		$fullname = SponsorsContacts::model()->findAllByAttributes(array("id_sponsor"=>$id_sponsor));
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if (isset($_POST['fullnamesUpdate'])) {
			$fullnames = $_POST['fullnamesUpdate'];
			$fullnamesUpdateId = $_POST['fullnamesUpdateId'];
			foreach ($_POST['fullnamesUpdate'] as $key => $names)
				$model->updateByPk($fullnamesUpdateId[$key],array('fullname' => $names));

		}

		if (isset($_POST['fullnames'])) {
			$countSuccess = 0;
			$fullnames = $_POST['fullnames'];
			foreach ($fullnames as $key => $names) {
				unset($model);
				$model = new SponsorsContacts;
				$model->id_sponsor = $id_sponsor;
				$model->fullname = $names;
				if($model->save()){
					$countSuccess++;
						$section = "Empresas"; //manda parametros al controlador AdminSystemLog
						$details = "Subsección: Datos de Contactos. Datos: ".$model->fullname;
						$action = "Creación";
						Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				}

				}
				if($countSuccess == count($fullnames)){
				echo CJSON::encode(array('status'=>'success'));
			}else{
				echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ha ocurrido un error interno al crear el registro, vuelva a intentarlo más tarde o si persiste el error contacte a el administrador.'));
			}
			Yii::app()->end();

			}




		$this->render('create_contacts', array(
			'model' => $model, 'fullname' => $fullname,
		));
	}

	public function actionCreate_addresses() {
		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$model = new Addresses;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if (isset($_POST['Addresses'])) {
			$model->attributes = $_POST['Addresses'];
			if ($model->save()) {

				$this->redirect(array('view', 'id' => $model->id));
			}

		}

		$this->render('create_addresses', array(
			'model' => $model,
		));
	}

		public function actionfillFirst() {

		$this->render('fillFirst');
	}

	public function actionCreate_billing() {

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$billingExist = SponsorBilling::model()->findByAttributes(array('id_sponsor' => Sponsors::model()->findByAttributes(array('id_user' => $iduser))->id));
		$sponsor = Sponsors::model()->findByAttributes(array("id_user" => $iduser));

		if ($billingExist != null) {
			$model = $billingExist;
			$modelAddresses = Addresses::model()->findByPk($model->id_address_billing);
			$sameAd = $modelAddresses->id == $sponsor->id_address ? true : false;
			$section = "Empresas"; //manda parametros al controlador SystemLog
			$details = "Subsección: Datos de Facturación. Registro Número ".$model->id;
			$action = "Modificación";
		} else {
			$model = new SponsorBilling;
			$modelAddresses = new Addresses;
			$sameAd = false;
			$section = "Empresas"; //manda parametros al controlador SystemLog
			$details = "Subsección: Datos de Facturación";
			$action = "Creación";
		}
		$this->performAjaxValidation($model);
		$this->performAjaxValidation($modelAddresses);


		if (isset($_POST['SponsorBilling'])) {

			$model->attributes = $_POST['SponsorBilling'];

			$model->id_sponsor = $sponsor->id;

			if (isset($_POST['sameAddress'])) {

				$model->id_address_billing = Sponsors::model()->findByAttributes(array("id_user" => $iduser))->id_address;

				if ($model->save())
					if ($modelAddresses->id != $model->id_address_billing && $modelAddresses->id > 0) {
						if ($modelAddresses->delete())
							$this->redirect(array('create_billing'));
					}else
						$this->redirect(array('create_billing'));
				} else {

						$modelAddresses = new Addresses;
						$modelAddresses->attributes = $_POST['Addresses'];

						if ($modelAddresses->save()) {
							$model->id_address_billing = $modelAddresses->id;

							if ($model->save()) {
								Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
								echo CJSON::encode(array('status'=>'success'));
									Yii::app()->end();
							}


						}
					}
				}





		$this->render('create_billing', array(
			'model' => $model, 'modelAddresses' => $modelAddresses, 'sameAd' => $sameAd,
		));
	}





			public function actionCreate_docs() {
				$error = "{";
				$error1 = "";
				$error2 = "";
				$error3 = "";
				$error4 = "";
				$error5 = "";
				$error6 = "";


			if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
				$iduser = (int)$_GET["ide"];
			else
				$iduser = Yii::app()->user->id;

		$id_sponsor = Sponsors::model()->findByAttributes(array("id_user" => Yii::app()->user->id))->id;
		$DocExist = SponsorsDocs::model()->findAllByAttributes(array('id_sponsor' => $id_sponsor));
		$modelDocs = array();
		if ($DocExist != null) {
			foreach ($DocExist as $key => $value) {
				$modelDocs[$value->file_name] = array($value->id, $value->path);
			}
		}
		$model = new SponsorsDocs;
		if (isset($_POST['Doc1'])) {
			$path2 = YiiBase::getPathOfAlias("webroot") . "/users/" . $id_sponsor . "/docs/";
			$id_sponsor = Sponsors::model()->findByAttributes(array("id_user" => Yii::app()->user->id))->id;
			if (!file_exists($path2)) {
				mkdir($path2, 0777, true);
			}

			if (is_object(CUploadedFile::getInstanceByName('Doc1'))) {
				unset($model);
				if (!array_key_exists('Documento_que_acredite_la_creacion_de_la_empresa', $modelDocs)) {
					$model = new SponsorsDocs;
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['Documento_que_acredite_la_creacion_de_la_empresa'][0]);
				}
				$model->id_sponsor = $id_sponsor;
				$id_sponsor = Sponsors::model()->findByAttributes(array('id_user' => Yii::app()->user->id))->id;
				$model->file_name = "Documento_que_acredite_la_creacion_de_la_empresa";
				$model->path = CUploadedFile::getInstanceByName('Doc1');
				if($model->validate()){
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "users/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();

				if($model->save())
					$reload = true;

				}else{
					$error1 = CActiveForm::validate($model);
					$error1 = str_replace('SponsorsDocs_path','SponsorsDocs1_path',$error1);
				}
			}


			if (is_object(CUploadedFile::getInstanceByName('Doc2'))) {
				unset($model);
				if (!array_key_exists('Acreditacion_de_las_facultades_del_representante_o_apoderado', $modelDocs)) {
					$model = new SponsorsDocs;
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['Acreditacion_de_las_facultades_del_representante_o_apoderado'][0]);
				}
				$model->id_sponsor = $id_sponsor;
				$model->file_name = "Acreditacion_de_las_facultades_del_representante_o_apoderado";
				$model->path = CUploadedFile::getInstanceByName('Doc2');
				if($model->validate()){
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "users/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
				if ($model->save())
						$reload = true;
				}else{
					$error2 = CActiveForm::validate($model);
					$error2 = str_replace('SponsorsDocs_path','SponsorsDocs2_path',$error2);
				}

			}
			if (is_object(CUploadedFile::getInstanceByName('Doc3'))) {
				unset($model);
				if (!array_key_exists('Permisos_de_actividades', $modelDocs)) {
					$model = new SponsorsDocs;
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['Permisos_de_actividades'][0]);
				}
				$model->id_sponsor = $id_sponsor;
				$model->file_name = "Permisos_de_actividades";
				$model->path = CUploadedFile::getInstanceByName('Doc3');
				if($model->validate()){
					$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
					$model->path = "users/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
					if ($model->save())
						$reload = true;

				}else{
					$error3 = CActiveForm::validate($model);
					$error3 = str_replace('SponsorsDocs_path','SponsorsDocs3_path',$error3);
				}
			}
			if (is_object(CUploadedFile::getInstanceByName('Doc4'))) {
				unset($model);
				if (!array_key_exists('RFC_o_equivalente', $modelDocs)) {
					$model = new SponsorsDocs;
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['RFC_o_equivalente'][0]);
				}
				$model->id_sponsor = $id_sponsor;
				$model->file_name = "RFC_o_equivalente";
				$model->path = CUploadedFile::getInstanceByName('Doc4');
				if($model->validate()){
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "users/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
				if ($model->save())
						$reload = true;
					}else{
					$error4 = CActiveForm::validate($model);
					$error4 = str_replace('SponsorsDocs_path','SponsorsDocs4_path',$error4);
				}

			}
			if (is_object(CUploadedFile::getInstanceByName('Doc5'))) {
				unset($model);
				if (!array_key_exists('Comprobante_de_domicilio', $modelDocs)) {
					$model = new SponsorsDocs;
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['Comprobante_de_domicilio'][0]);
				}
				$model->id_sponsor = $id_sponsor;
				$model->file_name = "Comprobante_de_domicilio";
				$model->path = CUploadedFile::getInstanceByName('Doc5');
				if($model->validate()){
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "users/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
				if ($model->save())
						$reload = true;

				}else{
					$error5 = CActiveForm::validate($model);
					$error5 = str_replace('SponsorsDocs_path','SponsorsDocs5_path',$error5);
				}
			}
			if (is_object(CUploadedFile::getInstanceByName('Doc6'))) {
				unset($model);
				if (!array_key_exists('Identificacion_Oficial_del_Representante', $modelDocs)) {
					$model = new SponsorsDocs;
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['Identificacion_Oficial_del_Representante'][0]);
				}
				$model->id_sponsor = $id_sponsor;
				$model->file_name = "Identificacion_Oficial_del_Representante";
				$model->path = CUploadedFile::getInstanceByName('Doc6');
				if($model->validate()){
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "users/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
				if ($model->save())
					$reload = true;
				}else{
					$error6 = CActiveForm::validate($model);
					$error6 = str_replace('SponsorsDocs_path','SponsorsDocs6_path',$error6);
				}

			}
				if ($reload == true){
					echo CJSON::encode(array('status'=>'success'));
								Yii::app()->end();
				}else{

					if($error1 !='[]')
						$error.= str_replace("{", "",str_replace("}", "",$error1));
					if($error2 !='[]')
						$error.= str_replace("{", "",str_replace("}", "",$error2));
					if($error3 !='[]')
						$error.= str_replace("{", "",str_replace("}", "",$error3));
					if($error4 !='[]')
						$error.= str_replace("{", "",str_replace("}", "",$error4));
					if($error5 !='[]')
						$error.= str_replace("{", "",str_replace("}", "",$error5));
					if($error6 !='[]')
						$error.= str_replace("{", "",str_replace("}", "",$error6));

				if($error!='[]')
					echo str_replace("]\"", "],\"",$error)."}";

				Yii::app()->end();
			 	}
		}
		$this->render('create_docs', array(
			'model' => $model, 'modelDocs' => $modelDocs,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax'])) {

			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}

	}

	public function actionDeleteContacts($id) {
		$model = SponsorsContacts::model()->findByPk($id);
			$section = "Empresas."; //manda parametros al controlador AdminSystemLog
			$details = "Subsección: Datos de Contactos. Registro Número: ".$model->id." Nombre: ".$model->fullname;
			$action = "Eliminación";
			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax'])) {
			$this->redirect(array('create_contacts'));
		}

	}

	public function actionDeleteContact($id) {
		$model = SponsorsContact::model()->findByPk($id);
			$section = "Empresas."; //manda parametros al controlador AdminSystemLog
			$details = "Subsección: Datos de Contacto. Registro Número: ".$model->id." Tipo: ".$model->type;
			$action = "Eliminación";
			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax'])) {
			$this->redirect(array('create_contact'));
			//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}

	}
	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Sponsors');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Sponsors('search');
		$model->unsetAttributes();
		if (isset($_GET['Sponsors'])) {
			$model->attributes = $_GET['Sponsors'];
		}

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sponsors the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Sponsors::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'The requested page does not exist.');
		}

		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sponsors $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax'])) {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
