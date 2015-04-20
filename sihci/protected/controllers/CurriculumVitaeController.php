<?php
class CurriculumVitaeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/system';
	/**
	 * @return array action filters
	 */

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
		
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('personalData', 'DocsIdentity', 'Addresses', 'Index', 'DeleteEmail',
								'DeletePhone', 'DeleteResearch', 'DeleteGrade',
								   'Jobs', 'ResearchAreas', 'Phones', 'Grades', 'Commission'),
				 'expression'=>'isset($user->id_roles) && ($user->id_roles==="1")',
				 'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex() {
		$this->redirect("personalData");
	}
		//CV02-Modificar registro 
	public function actionPersonalData(){
		$model = Persons::model()->findByAttributes(array('id_user' => Yii::app()->user->id));
		$curriculum = Curriculum::model()->findByAttributes(array('id_user' => Yii::app()->user->id));
		$path = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/';

		if($curriculum == null){
			$curriculum = new Curriculum;
			$addresses = new Addresses;

			$addresses->country = "null";
			$addresses->zip_code = 0;
			$addresses->state = "null";
			$addresses->delegation = "null";
			$addresses->city = "null";
			$addresses->town = "null";
			$addresses->colony = "null";
			$addresses->street = "null";
			$addresses->external_number = "null";
			$addresses->internal_number = "null";
			$addresses->save();

			$curriculum->id_user= Yii::app()->user->id;
			$curriculum->id_actual_address= $addresses->id;
			$curriculum->native_country = $model->country;
			$curriculum->save();
		}

		if (!is_dir($path)) {
			mkdir($path, 0775, true);
		}

		$this->performAjaxValidation($model);

		if(isset($_POST['Persons']) && isset($_POST['Curriculum']))
		{
			$model->attributes=$_POST['Persons'];
			$curriculum->attributes = $_POST['Curriculum'];
			$model->photo_url = CUploadedFile::getInstanceByName('Persons[photo_url]');
			
			if ($model->validate()) {

				if($model->photo_url != ''){
					$model->photo_url->saveAs($path.'/perfil.png');
				}

				$model->photo_url = $path.'/perfil.png';

				if($model->save()){
					$curriculum->native_country = $curriculum->native_country;
					$curriculum->save();
						$section = "Datos Personales"; //manda parametros al controlador SystemLog
						$details = "Se han modificado datos personales";
						$action = "Modificacion";
						Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
						$this->redirect('personalData');
				}
				
			}
		}
		$this->render('personal_data',array('model'=>$model, 'curriculum'=>$curriculum));
	}

	public function actionDocsIdentity(){
		$model=new DocsIdentity;
		$curriculum=Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		$docs = DocsIdentity::model()->findByAttributes(array('id_curriculum' => $curriculum->id));
		$getDocs = DocsIdentity::model()->findAll('id_curriculum=:id_curriculum',array(':id_curriculum'=>$curriculum->id));
		
		$this->performAjaxValidation($model);

		if(isset($_POST['DocsIdentity']))
		{
			$model->attributes=$_POST['DocsIdentity'];
			$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			$model->doc_id = CUploadedFile::getInstanceByName('DocsIdentity[doc_id]');
			$path = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/';
			$path2 = '/users/'.Yii::app()->user->id.'/cve-hc/';
			if (!is_dir($path)) {
				mkdir($path, 0775, true);
			}
			$files = glob($path);

			foreach ($files as $file) {
				if (is_file($file)) {
					unlink($file);
				}

			}
			//$docExist = DocsIdentity::model()->find(array('condition'=>'id_curriculum='.$curriculum->id.' AND type="'.$model->type.'"'));
			if ($model->validate()) {
				//if ($docExist != null) {
					$model->doc_id->saveAs($path.$model->type.'.'.$model->doc_id->getExtensionName());
					$model->doc_id = $path2.$model->type.'.'.$model->doc_id->getExtensionName();
						if($model->save()){
						// $section = "Documentos Oficiales"; //manda parametros al controlador SystemLog
						// $details = "Se han modificado Documentos Oficiales";
						// $action = "Modificacion";
						// Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
							$this->redirect('docsIdentity');
						}
				//}
			}
		}

	$this->render('docs_Identity',array('model'=>$model, 'getDocs'=>$getDocs, ));
	}

	public function actionAddresses(){

		$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		$model = $curriculum->idActualAddress;

		$this->performAjaxValidation($model);

		if(isset($_POST['Addresses']))
		{
			$model->attributes=$_POST['Addresses'];
				if($model->save()){
					$section = "Datos de Dirección actual"; //manda parametros al controlador SystemLog
					$details = "Se han modificado datos de Dirección Actual";
					$action = "Modificacion";
					Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				}
		}

		$this->render('addresses',array('model'=>$model,));
	}

	public function actionJobs(){
		$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		$jobs = Jobs::model()->findByAttributes(array('id_curriculum' => $curriculum->id));
		$model=new Jobs;

		if ($jobs != null) {
			$model = Jobs::model()->findByPk($jobs->id);
		}

		$this->performAjaxValidation($model);

		if(isset($_POST['Jobs']))
		{
			$model->attributes=$_POST['Jobs'];
			$model->id_curriculum = $curriculum->id;
			if ($model->save()) {
				$section = "Datos Laborales"; //manda parametros al controlador SystemLog
				$details = "Se han modificado datos laborales";
				$action = "Modificacion";
				Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			}

		}
		$this->render('jobs',array('model'=>$model,));
	}

	public function actionResearchAreas(){
		$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		$researchAreas = ResearchAreas::model()->findByAttributes(array('id_curriculum' => $curriculum->id));
		$getResearch = ResearchAreas::model()->findAll('id_curriculum=:id_curriculum',array(':id_curriculum'=>$curriculum->id));
		$model=new ResearchAreas;
		
		$this->performAjaxValidation($model);

		if(isset($_POST['nameResearch']) || isset($_POST['getResearch']))
		{
			$researchNew = $_POST["nameResearch"];

			foreach ($researchNew as $key => $value) {
				$researchNew = new ResearchAreas();
				$researchNew->id_curriculum = $curriculum->id;
				$researchNew->name = $value;
				$researchNew->save();
			}

			if ($getResearch != null) {
				$getResearchs = $_POST['getResearch'];
				foreach ($getResearchs as $key => $value) {
					$research = ResearchAreas::model()->findByPk($getResearch[$key]->id);
					$research->id_curriculum = $curriculum->id;
					$research->name = $value;
					$research->save();
				}
				$section = "Lineas de Investigacion"; //manda parametros al controlador SystemLog
				$details = "Se modifico su Linea de investigacion";
				$action = "Modificacion";
				Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			}
			$this->redirect('researchAreas');
		}
		$this->render('research_areas',array('model'=>$model, 'getResearch'=>$getResearch,));
	}

	public function actionPhones(){
		$person = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		$phones = Phones::model()->findByAttributes(array('id_person' => $person->id));

		$model=new Phones;
		$emails = new Emails;
		$getEmails = Emails::model()->findAll('id_person=:id_person',array(':id_person'=>$person->id));
		$getPhones = Phones::model()->findAll('id_person=:id_person',array(':id_person'=>$person->id));
		
		$this->performAjaxValidation($model);

		if(isset($_POST['phoneNumber']) && isset($_POST['emails']))
		{
			$emailNew = $_POST["emails"];
			$typeEmailNew = $_POST["typesEmails"];
			
			foreach($emailNew as $key => $values){
				$emailsNew = new Emails();
				$emailsNew->id_person = $person->id;
				$emailsNew->email = $values;
				$emailsNew->type = $typeEmailNew[$key];

				if($emailsNew->save()){
						$section = "Datos de Contacto";
						$details = "Se ha creado el email: '".$values."'' con el tipo: '".$typeEmailNew[$key]."'' del usuario: '".Yii::app()->user->name."'";
						$action = "Creación";
						Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
					}
			}

			if ($getEmails != null) {

				$getEmail = $_POST['getEmail'];
				$getTypeEmail = $_POST['getTypeEmail'];

					foreach($getEmail as $key => $value) {
			 			$emails = Emails::model()->findByPk($getEmails[$key]->id);
						$emails->email = $getEmail[$key];
						$emails->type = $getTypeEmail[$key];
						$emails->save();
					}	
			}
			
			$typesPhonesNew = $_POST["typesPhones"];
			$countryCodeNew = $_POST["countryCode"];
			$localAreaCodeNew = $_POST["localAreaCode"];
			$phoneNumberNew = $_POST["phoneNumber"];
			$extensionNew = $_POST["extension"];
			$isPrimaryNew = $_POST["isPrimary"];

			foreach($phoneNumberNew as $key => $values){
				$phoneNew = new Phones();
				$phoneNew->id_person = $person->id;
				$phoneNew->type = $typesPhonesNew[$key];
				$phoneNew->country_code = $countryCodeNew[$key];
				$phoneNew->local_area_code = $localAreaCodeNew[$key];
				$phoneNew->phone_number = $values;
				$phoneNew->extension = $extensionNew[$key];
				$phoneNew->is_primary = $isPrimaryNew[$key];
				$phoneNew->save();
			}

			if ($phones != null) {

				$getTypesPhones = $_POST["getTypesPhones"];
				$getCountryCode = $_POST["getCountryCode"];
				$getLocalAreaCode = $_POST["getLocalAreaCode"];
				$getPhoneNumber = $_POST["getPhoneNumber"];
				$getExtension = $_POST["getExtension"];
				$getIsPrimary = $_POST["getIsPrimary"];

				foreach($getPhoneNumber as $key => $values){
					$phones = Phones::model()->findByPk($getPhones[$key]->id);
					$phones->type = $getTypesPhones[$key];
					$phones->country_code = $getCountryCode[$key];
					$phones->local_area_code = $getLocalAreaCode[$key];
					$phones->phone_number = $getPhoneNumber[$key];
					$phones->extension = $getExtension[$key];
					$phones->is_primary = $getIsPrimary[$key];
					$phones->save();
				}	
			}	
			$this->redirect('phones');
		}
		$this->render('phones',array('model'=>$model, 'emails' =>$emails, 'getEmails'=> $getEmails, 'getPhones'=> $getPhones,));
	}

	public function actionGrades(){
		$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		$grade = Grades::model()->findByAttributes(array('id_curriculum' => $curriculum->id));
		$getGrades = Grades::model()->findAll('id_curriculum=:id_curriculum',array(':id_curriculum'=>$curriculum->id));
		$model=new Grades;

		$this->performAjaxValidation($model);
			
		if(isset($_POST['grade']))
		{
			$gradeNew = new Grades();
			$gradeNew->id_curriculum = $curriculum->id;
			$gradeNew->country = $_POST['country'];
			$gradeNew->grade = $_POST['grade'];
			$gradeNew->writ_number = $_POST['writNumber'];
			$gradeNew->title = $_POST['title'];
			$gradeNew->obtention_date = $_POST['obtentionDate'];
			$gradeNew->thesis_title = $_POST['thesisTitle'];
			$gradeNew->state = $_POST['state'];
			$gradeNew->sector = "sector";
			$gradeNew->institution = $_POST['institution'];
			$gradeNew->area = $_POST['area'];
			$gradeNew->discipline = $_POST['discipline'];
			$gradeNew->subdiscipline = $_POST['subdiscipline'];
			$gradeNew->save();

			if ($getGrades != null) {
				$getCountry = $_POST['getCountry'];
				$getGrade = $_POST['getGrade'];
				$getWritNumber = $_POST['getWritNumber'];
				$getTitle = $_POST['getTitle'];
				$getObtentionDate = $_POST['getObtentionDate'];
				$getThesisTitle = $_POST['getThesisTitle'];
				$getState = $_POST['getState'];
				$getSector = $_POST['getSector'];
				$getInstitution = $_POST['getInstitution'];
				$getArea = $_POST['getArea'];
				$getDiscipline = $_POST['getDiscipline'];
				$getSubdiscipline = $_POST['getSubdiscipline'];

				foreach ($getGrade as $key => $value) {
					$gradeUp = Grades::model()->findByPk($getGrades[$key]->id);
					$gradeUp->id_curriculum = $curriculum->id;
					$gradeUp->country = $getCountry[$key];
					$gradeUp->grade = $getGrade[$key];
					$gradeUp->writ_number = $getWritNumber[$key];
					$gradeUp->title = $getTitle[$key];
					$gradeUp->obtention_date = $getObtentionDate[$key];
					$gradeUp->thesis_title = $getThesisTitle[$key];
					$gradeUp->state = $getState[$key];
					$gradeUp->sector = $getSector[$key];
					$gradeUp->institution = $getInstitution[$key];
					$gradeUp->area = $getArea[$key];
					$gradeUp->discipline = $getDiscipline[$key];
					$gradeUp->subdiscipline = $getSubdiscipline[$key];

					$gradeUp->save();
				}
			}
			//$model->attributes=$_POST['Grades'];
			//$model->save();
				// $section = "Formación Académica"; //manda parametros al controlador SystemLog
				// $details = "Se han modificado datos de Formación Académica";
				// $action = "Modificacion";
				// Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				$this->redirect('grades');

		}

		$this->render('grades',array('model'=>$model, 'getGrades'=>$getGrades));
	}


	public function actionCommission(){
		$commission = Curriculum::model()->findByAttributes(array('id_user' => Yii::app()->user->id));
		$model=new Curriculum;

		if ($commission != null) {
			$model = Curriculum::model()->findByPk($commission->id);
		}

		$this->performAjaxValidation($model);

		if(isset($_POST['Curriculum']))
		{
			$model->attributes=$_POST['Curriculum'];
			$model->save();
				$section = "Nombramientos"; //manda parametros al controlador SystemLog
				$details = "Se han modificado datos de Nombramientos";
				$action = "Modificacion";
				Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		}
		$this->render('commission',array('model'=>$model,));
	}



	public function actionDeleteEmail($id){
		$model=Emails::model()->findByPk($id)->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('phones'));
	}

	public function actionDeletePhone($id){
		$model=Phones::model()->findByPk($id)->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('phones'));
	}

	public function actionDeleteResearch($id){
		$model=ResearchAreas::model()->findByPk($id)->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('researchAreas'));
	}

	public function actionDeleteGrade($id){
		$model=Grades::model()->findByPk($id)->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('grades'));
	}




	/**
	 * Performs the AJAX validation.
	 * @param Sponsors $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'personal-data-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if (isset($_POST['ajax']) && $_POST['ajax'] === 'docs-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if (isset($_POST['ajax']) && $_POST['ajax'] === 'addresses-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if (isset($_POST['ajax']) && $_POST['ajax'] === 'jobs-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['ajax']) && $_POST['ajax']==='research-areas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'phones-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'grades-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'commission-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}//end controller
