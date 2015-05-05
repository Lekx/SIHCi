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
		$sponsorExist = Sponsors::model()->findByAttributes(array('id_user' => Yii::app()->user->id));

		if ($sponsorExist != null) {
			$model = $this->loadModel($sponsorExist->id);
			$modelAddresses = Addresses::model()->findByPk($model->id_address);
		} else {
			$model = new Sponsors;
			$modelAddresses = new Addresses;
			
		}

		$modelPersons = Persons::model()->findByAttributes(array('id_user' => Yii::app()->user->id));
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
					$model->id_user = Yii::app()->user->id;
					$model->id_address = $modelAddresses->id;
					if ($model->validate()) {
						if ($model->save()) {

							if (!empty(CUploadedFile::getInstanceByName('Persons[photo_url]'))) {
								
								$id_sponsor = Sponsors::model()->findByAttributes(array('id_user' => Yii::app()->user->id))->id;
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

								if ($modelPersons->updateByPk(Persons::model()->findByAttributes(array("id_user" => Yii::app()->user->id))->id, array('photo_url' => $logo))) {

									$log = new SystemLog();
									$log->id_user = Yii::app()->user->id;
									$log->section = "Empresas";
									$log->details = "Se creo un nuevo registro";
									$log->action = "creacion";
									$log->datetime = new CDbExpression('NOW()');
									$log->save();

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
		$model = Persons::model()->findByAttributes(array('id_user' => Yii::app()->user->id));

		if (isset($_POST['Persons'])) {
			$model->attributes = $_POST['Persons'];
			$model->id_user = Yii::app()->user->id;

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
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
			echo "entre 1";
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
				$model->save();

			}

		}

		
		$this->render('create_contact', array(
			'model' => $model,'modelPull' => $modelPull
		));
	}

	public function actionCreate_contacts() {
		$id_sponsor = Sponsors::model()->findByAttributes(array("id_user" => Yii::app()->user->id))->id;
		$model = new SponsorsContacts;
		$fullname = SponsorsContacts::model()->findAllByAttributes(array("id_sponsor"=>$id_sponsor));
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if (isset($_POST['fullnamesUpdate'])) {
			$fullnames = $_POST['fullnamesUpdate'];
			$fullnamesUpdateId = $_POST['fullnamesUpdateId'];
			foreach ($_POST['fullnamesUpdate'] as $key => $names) 
				$model->updateByPk($fullnamesUpdateId[$key],array('fullname' => $names));

			$this->redirect(array('view', 'id' => $model->id));
		}

		if (isset($_POST['fullnames'])) {
			$fullnames = $_POST['fullnames'];
			foreach ($_POST['fullnames'] as $key => $names) {
				unset($model);
				$model = new SponsorsContacts;
				$model->id_sponsor = $id_sponsor;
				$model->fullname = $names;
				$model->save();
				
			}
		}



		$this->render('create_contacts', array(
			'model' => $model, 'fullname' => $fullname,
		));
	}

	public function actionCreate_addresses() {
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

	public function actionCreate_billing() {

		$billingExist = SponsorBilling::model()->findByAttributes(array('id_sponsor' => Sponsors::model()->findByAttributes(array('id_user' => Yii::app()->user->id))->id));
		$sponsor = Sponsors::model()->findByAttributes(array("id_user" => Yii::app()->user->id));

		if ($billingExist != null) {
			$model = $billingExist;
			$modelAddresses = Addresses::model()->findByPk($model->id_address_billing);
			$sameAd = $modelAddresses->id == $sponsor->id_address ? true : false;

		} else {
			$model = new SponsorBilling;
			$modelAddresses = new Addresses;
			$sameAd = false;
		}

		if (isset($_POST['SponsorBilling'])) {

			$model->attributes = $_POST['SponsorBilling'];

			$model->id_sponsor = $sponsor->id;

			if (isset($_POST['sameAddress'])) {
				echo "es la misma direccion";
				$model->id_address_billing = Sponsors::model()->findByAttributes(array("id_user" => Yii::app()->user->id))->id_address;
				if ($model->save()) {
					if ($modelAddresses->id != $model->id_address_billing) {
						if ($modelAddresses->delete());
						$this->redirect(array('create_billing'));
					} else {
						echo "no es la misma direccion";
						$modelAddresses = new Addresses;

						$modelAddresses->attributes = $_POST['Addresses'];

						if ($modelAddresses->save()) {
							$model->id_address_billing = $modelAddresses->id;

							if ($model->save()) {
								$this->redirect(array('create_billing'));
							}

						}
					}
				}

			}

		}

		$this->render('create_billing', array(
			'model' => $model, 'modelAddresses' => $modelAddresses, 'sameAd' => $sameAd,
		));
	}

	public function actionCreate_docs() {
		$id_sponsor = Sponsors::model()->findByAttributes(array("id_user" => Yii::app()->user->id))->id;

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
			$id_sponsor = Sponsors::model()->findByAttributes(array("id_user" => Yii::app()->user->id))->id;
			if (!file_exists($path2)) {
				mkdir($path2, 0777, true);
			}
		
			if (is_object(CUploadedFile::getInstanceByName('Doc1'))) {
				unset($model);
				if (!array_key_exists('Documento_que_acredite_la_creacion_de_la_empresa', $modelDocs)) {
					var_dump($modelDocs);
					$model = new SponsorsDocs;
				} else {
					$model = SponsorsDocs::model()->findByPk($modelDocs['Documento_que_acredite_la_creacion_de_la_empresa'][0]);

				}

				$model->id_sponsor = $id_sponsor;
				$id_sponsor = Sponsors::model()->findByAttributes(array('id_user' => Yii::app()->user->id))->id;
				$model->file_name = "Documento_que_acredite_la_creacion_de_la_empresa";
				unlink($model->path);
				$model->path = CUploadedFile::getInstanceByName('Doc1');
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "sponsors/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
				
				if($model->save())
					$reload = true;
				
				
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
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "sponsors/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
				
					if ($model->save()) 
						$reload = true;
					
				

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
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "sponsors/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
					if ($model->save()) 
						$reload = true;
					
				

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
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "sponsors/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
					if ($model->save()) 
						$reload = true;
					
				

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
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "sponsors/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
					if ($model->save()) 
						$reload = true;
					
				

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
				$model->path->saveAs($path2 . $model->file_name . "." . $model->path->getExtensionName());
				$model->path = "sponsors/" . $id_sponsor . "/docs/" . $model->file_name . "." . $model->path->getExtensionName();
				if ($model->save()) 
					$reload = true;
				

			}

			if ($reload == true) {
				$this->redirect(array('create_docs'));
			}

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
		
		SponsorsContacts::model()->findByPk($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax'])) {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}

	}

	public function actionDeleteContact($id) {
		
		SponsorsContact::model()->findByPk($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax'])) {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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
