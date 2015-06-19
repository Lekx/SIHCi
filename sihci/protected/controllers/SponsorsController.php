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
	/*public function accessRules()
	{
	return array(
	array('allow',  // allow all users to perform 'index' and 'view' actions
	'actions'=>array('index','view'),
	'users'=>array('*'),
	),
	array('allow', // allow authenticated user to perform 'create' and 'update' actions
	'actions'=>array('create','update'),
	'users'=>array('@'),
	),
	array('allow', // allow admin user to perform 'admin' and 'delete' actions
	'actions'=>array('admin','delete'),
	'users'=>array('admin'),
	),
	array('deny',  // deny all users
	'users'=>array('*'),
	),
	);
	}*/

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

		if ($sponsorExist != null) {
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

			if (!empty(CUploadedFile::getInstanceByName('Persons[photo_url]'))) {
				$logo = CUploadedFile::getInstanceByName('Persons[photo_url]');
				
			}

			if ($modelAddresses->validate()) {
				if ($modelAddresses->save()) {
					$model->id_user = $iduser;
					$model->id_address = $modelAddresses->id;
					if ($model->validate()) {
						if ($model->save()) {

							Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);

							if (!empty(CUploadedFile::getInstanceByName('Persons[photo_url]'))) {

								if($model->photo_url->type == 'application/pdf' || $model->photo_url->type == 'application/msword' || $model->photo_url->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $model->photo_url->type == 'application/vnd.oasis.opendocument.text' )
								
								$id_sponsor = Sponsors::model()->findByAttributes(array('id_user' => $iduser))->id;
								$path = YiiBase::getPathOfAlias("webroot") . "/sponsors/" . $id_sponsor . "/img/";
								if (!file_exists($path)) {
									mkdir($path, 0775, true);
								}

								$files = glob($path);
								foreach ($files as $file) {

									if (is_file($file)) {
										unlink($file);
									}

								}
								$logo->saveAs($path . 'logo.' . $logo->getExtensionName());
								$logo = "sponsors/" . $id_sponsor . "/img/" . 'logo.' . $logo->getExtensionName();

								if ($modelPersons->updateByPk(Persons::model()->findByAttributes(array("id_user" => $iduser))->id, array('photo_url' => $logo))) {

									$log = new SystemLog();
									$log->id_user = $iduser;
									$log->section = "Empresas";
									$log->details = "Se creo un nuevo registro";
									$log->action = "creacion";
									$log->datetime = new CDbExpression('NOW()');
									$log->save();

								}else {
									echo "Tipo de archivo no valido, solo se admiten .PDF .DOC . DOCX .ODT";
								}
							}
						}
					}

				}
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

			if ($model->save()) {
				$section="Empresas";
				$details="Subsección: Datos de Representante. Registro Número ".$model->id;
				$action="Modificación";
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				//$this->redirect(array('view', 'id' => $model->id));
			}

		}

		$this->render('create_persons', array(
			'model' => $model,
		));
	}

	public function actionCreate_contact() {

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$id_sponsor = Sponsors::model()->findByAttributes(array("id_user" => $iduser))->id;
				//echo $id_sponsor;
		$model = new SponsorsContact;
			echo "cree molde";
		$modelPull = SponsorsContact::model()->findAllByAttributes(array("id_sponsor"=>$id_sponsor));
			var_dump($modelPull);
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);


		if (isset($_POST['valuesUpdate1'])) {
			
			$modelPullIds = $_POST['modelPullIds'];
			$types = $_POST['modelPullTypes'];
			$values1 = $_POST['valuesUpdate1'];
			$values2 = $_POST['valuesUpdate2'];
			$values3 = $_POST['valuesUpdate3'];
					echo "asigne primer post";

			foreach ($_POST['modelPullTypes'] as $key => $type) 
				$model->updateByPk($modelPullIds[$key],array('type' => $type,'value' => $values1[$key] . "-" . $values2[$key] . "-" . $values3[$key]));
		}

		if (isset($_POST['values1'])) {
			
			$id_sponsor = Sponsors::model()->findByAttributes(array('id_user' => $iduser))->id;
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
				if($model->save()){
					$section = "Empresas"; //manda parametros al controlador AdminSystemLog
					$details = "Subsección: Datos de Contacto. Datos: ".$model->type;
					$action = "Creación";
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
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

			//$this->redirect(array('view', 'id' => $model->id));
		}

		if (isset($_POST['fullnames'])) {
			$fullnames = $_POST['fullnames'];
			foreach ($_POST['fullnames'] as $key => $names) {
				unset($model);
				$model = new SponsorsContacts;
				$model->id_sponsor = $id_sponsor;
				$model->fullname = $names;
				if($model->save()){
					$section = "Empresas"; //manda parametros al controlador AdminSystemLog
					$details = "Subsección: Datos de Contactos. Datos: ".$model->fullname;
					$action = "Creación";
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				}
				
			}
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
								$this->redirect(array('create_billing'));
							}
							

						}
					}
				}

			

		

		$this->render('create_billing', array(
			'model' => $model, 'modelAddresses' => $modelAddresses, 'sameAd' => $sameAd,
		));
	}

	public function actionCreate_docs() {

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$id_sponsor = Sponsors::model()->findByAttributes(array("id_user" => $iduser))->id;

		$DocExist = SponsorsDocs::model()->findAllByAttributes(array('id_sponsor' => $id_sponsor));
		$modelDocs = array();
		if ($DocExist != null) {
			foreach ($DocExist as $key => $value) {
				$modelDocs[$value->file_name] = array($value->id, $value->path);
			}

		}

		$model = new SponsorsDocs;
		$reload = false;

		if (isset($_POST['Doc1'])) {

			$path2 = YiiBase::getPathOfAlias("webroot") . "/sponsors/" . $id_sponsor . "/docs/";
			$id_sponsor = Sponsors::model()->findByAttributes(array("id_user" => $iduser))->id;
			if (!file_exists($path2)) {
				mkdir($path2, 0777, true);
			}
		
			if (is_object(CUploadedFile::getInstanceByName('Doc1'))) {
				unset($model);
				$section = "Empresas"; 
				if (!array_key_exists('Documento_que_acredite_la_creacion_de_la_empresa', $modelDocs)) {
					$model = new SponsorsDocs;
					$action = "Creación";
					$details = "Subsección: Documentos Probatorios. Se subió Documento decreto de Creación de la Empresa";
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['Documento_que_acredite_la_creacion_de_la_empresa'][0]);
					$action = "Modificación";
					$details = "Subsección: Documentos Probatorios. Se subió Documento decreto de Creación de la Empresa. Número Registro: ".$model->id;
				}
				$model->id_sponsor = $id_sponsor;
				$id_sponsor = Sponsors::model()->findByAttributes(array('id_user' => $iduser))->id;
				$model->file_name = "Documento_que_acredite_la_creacion_de_la_empresa";
					
					$model = new SponsorsDocs;
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['Documento_que_acredite_la_creacion_de_la_empresa'][0]);

				}

				$model->id_sponsor = $id_sponsor;
				$id_sponsor = Sponsors::model()->findByAttributes(array('id_user' => $iduser))->id;
				$model->file_name = "Documento_que_acredite_la_creacion_de_la_empresa";
				//unlink($model->path);
				$model->path = CUploadedFile::getInstanceByName('Doc1');
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "sponsors/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
				
				if($model->save()){
					$reload = true;
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				}
				
				
			}

			if (is_object(CUploadedFile::getInstanceByName('Doc2'))) {
				unset($model);
				$section = "Empresas"; 
				if (!array_key_exists('Acreditacion_de_las_facultades_del_representante_o_apoderado', $modelDocs)) {
					$model = new SponsorsDocs;
					$action = "Creación";
					$details = "Subsección: Documentos Probatorios. Se subió Documento que acreditan las facultades del representante.";
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['Acreditacion_de_las_facultades_del_representante_o_apoderado'][0]);
					$action = "Modificación";
					$details = "Subsección: Documentos Probatorios. Se subió Documento que acreditan las facultades del representante. Número Registro: ".$model->id;
				}

				$model->id_sponsor = $id_sponsor;
				$model->file_name = "Acreditacion_de_las_facultades_del_representante_o_apoderado";
				$model->path = CUploadedFile::getInstanceByName('Doc2');
				if($model->file_name->type == 'application/pdf' || $model->file_name->type == 'application/msword' || $model->file_name->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $model->file_name->type == 'application/vnd.oasis.opendocument.text' );
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "sponsors/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
				
					if ($model->save()) {
						$reload = true;
						Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
					}
					
				

			}else {													
				//echo "Tipo de archivo no valido, solo se admiten .PDF .DOC . DOCX .ODT";
			}

			if (is_object(CUploadedFile::getInstanceByName('Doc3'))) {
				unset($model);
				$section = "Empresas"; 
				if (!array_key_exists('Permisos_de_actividades', $modelDocs)) {
					$model = new SponsorsDocs;
					$action = "Creación";
					$details = "Subsección: Documentos Probatorios. Se subió Documento de Licencias, autorizaciones, permisos para las actividades.";
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['Permisos_de_actividades'][0]);
					$action = "Modificación";
					$details = "Subsección: Documentos Probatorios. Se subió Documento de Licencias, autorizaciones, permisos para las actividades. Número Registro: ".$model->id;
				}

				$model->id_sponsor = $id_sponsor;
				$model->file_name = "Permisos_de_actividades";
				$model->path = CUploadedFile::getInstanceByName('Doc3');
				if($model->file_name->type == 'application/pdf' || $model->file_name->type == 'application/msword' || $model->file_name->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $model->file_name->type == 'application/vnd.oasis.opendocument.text' );
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "sponsors/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
					if ($model->save()) {
						$reload = true;
						Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
					}
					
				

			}else {													
				//echo "Tipo de archivo no valido, solo se admiten .PDF .DOC . DOCX .ODT";
			}

			if (is_object(CUploadedFile::getInstanceByName('Doc4'))) {
				unset($model);
				$section = "Empresas"; 
				if (!array_key_exists('RFC_o_equivalente', $modelDocs)) {
					$model = new SponsorsDocs;
					$action = "Creación";
					$details = "Subsección: Documentos Probatorios. Se subió Documento RFC o equivalente";
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['RFC_o_equivalente'][0]);
					$action = "Modificación";
					$details = "Subsección: Documentos Probatorios. Se subió Documento RFC o equivalente. Número Registro: ".$model->id;
				}

				$model->id_sponsor = $id_sponsor;
				$model->file_name = "RFC_o_equivalente";
				$model->path = CUploadedFile::getInstanceByName('Doc4');
				if($model->file_name->type == 'application/pdf' || $model->file_name->type == 'application/msword' || $model->file_name->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $model->file_name->type == 'application/vnd.oasis.opendocument.text' );
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "sponsors/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
					if ($model->save()) {
						$reload = true;
						Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
					}
					
				

			}else {													
				//echo "Tipo de archivo no valido, solo se admiten .PDF .DOC . DOCX .ODT";
			}

			if (is_object(CUploadedFile::getInstanceByName('Doc5'))) {
				unset($model);
				$section = "Empresas"; 
				if (!array_key_exists('Comprobante_de_domicilio', $modelDocs)) {
					$model = new SponsorsDocs;
					$action = "Creación";
					$details = "Subsección: Documentos Probatorios. Se subió Documento Comprobante de Domicilio";
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['Comprobante_de_domicilio'][0]);
					$action = "Modificación";
					$details = "Subsección: Documentos Probatorios. Se subió Documento Comprobante de Domicilio. Número Registro: ".$model->id;
				}

				$model->id_sponsor = $id_sponsor;
				$model->file_name = "Comprobante_de_domicilio";
				$model->path = CUploadedFile::getInstanceByName('Doc5');
				if($model->file_name->type == 'application/pdf' || $model->file_name->type == 'application/msword' || $model->file_name->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $model->file_name->type == 'application/vnd.oasis.opendocument.text' );
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "sponsors/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
					if ($model->save()) {
						$reload = true;
						Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
					}
					
				

			}else {													
				//echo "Tipo de archivo no valido, solo se admiten .PDF .DOC . DOCX .ODT";
			}

			if (is_object(CUploadedFile::getInstanceByName('Doc6'))) {
				unset($model);
				$section = "Empresas"; 
				if (!array_key_exists('Identificacion_Oficial_del_Representante', $modelDocs)) {
					$model = new SponsorsDocs;
					$action = "Creación";
					$details = "Subsección: Documentos Probatorios. Se subió Documento Identificación oficial del Representante.";
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['Identificacion_Oficial_del_Representante'][0]);
					$action = "Modificación";
					$details = "Subsección: Documentos Probatorios. Se subió Documento Identificación oficial del Representante. Número Registro: ".$model->id;
				}

				$model->id_sponsor = $id_sponsor;
				$model->file_name = "Identificacion_Oficial_del_Representante";
				$model->path = CUploadedFile::getInstanceByName('Doc6');
				if($model->file_name->type == 'application/pdf' || $model->file_name->type == 'application/msword' || $model->file_name->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $model->file_name->type == 'application/vnd.oasis.opendocument.text' );
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "sponsors/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
				if ($model->save()) {
					$reload = true;
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				}
				

			}else {													
				//echo "Tipo de archivo no valido, solo se admiten .PDF .DOC . DOCX .ODT";
			}

			if ($reload == true) {
				$this->redirect(array('create_docs'));
			}

		
		$this->render('create_docs', array(
			'model' => $model, 'modelDocs' => $modelDocs,
		));

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */

	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if (isset($_POST['Sponsors'])) {
			$model->attributes = $_POST['Sponsors'];
			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}

		}

		$this->render('update', array(
			'model' => $model,
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
			//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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
