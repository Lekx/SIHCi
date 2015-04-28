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
								'DeletePhone', 'DeleteResearch', 'DeleteGrade', 'DeleteDocs',
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

		if($model->birth_date == "30/11/-0001" || $model->birth_date == "00/00/0000"){
				$model->birth_date = "";
			}

		$this->performAjaxValidation($model);

		if(isset($_POST['Persons']) && isset($_POST['Curriculum']))
		{
			$model->attributes=$_POST['Persons'];

			$curriculum->attributes = $_POST['Curriculum'];
			$model->photo_url = CUploadedFile::getInstanceByName('Persons[photo_url]');
				

				if($model->photo_url != ''){
					$model->photo_url->saveAs($path.'/perfil.png');
				}

				$model->photo_url = $path.'/perfil.png';

				if($model->save()){
					$curriculum->native_country = $curriculum->native_country;
					$curriculum->save();
						// $section = "Datos Personales"; //manda parametros al controlador SystemLog
						// $details = "Se han modificado datos personales";
						// $action = "Modificacion";
						// Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
						//$this->redirect('personalData');
				
					echo CJSON::encode(array('status'=>'success'));
	     			Yii::app()->end();
	     		}else {
	     			 $error = CActiveForm::validate($model);
	                 if($error!='[]')
	                    echo $error;
	                 Yii::app()->end();
	     		}
				
			
		}
		$this->render('personal_data',array('model'=>$model, 'curriculum'=>$curriculum));
	}

	public function actionDocsIdentity(){
		
		$curriculum=Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		$getDocs = DocsIdentity::model()->findAll('id_curriculum=:id_curriculum',array(':id_curriculum'=>$curriculum->id));
		
		$DocExist = DocsIdentity::model()->findAllByAttributes(array('id_curriculum' => $curriculum->id));
		
		$modelDocs = array();
		if ($DocExist != null) {
			foreach ($DocExist as $key => $value) {
				$modelDocs[$value->type] = array($value->id, $value->doc_id);
			}

		}

		$model=new DocsIdentity;
		$reload = false;

		$this->performAjaxValidation($model);

		if(isset($_POST['Acta']))
		{

			$path = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/';
			$path2 = '/users/'.Yii::app()->user->id.'/cve-hc/';
			
			if (!is_dir($path)) {
				mkdir($path, 0777, true);
			}

			if (is_object(CUploadedFile::getInstanceByName('Acta'))) {
				unset($model);

				if (!array_key_exists('Acta', $modelDocs)) {
					var_dump($modelDocs);
					$model = new DocsIdentity;
				} else {
					$model = DocsIdentity::model()->findByPk($modelDocs['Acta'][0]);
					
				}

				$model->id_curriculum = $curriculum->id;
				$model->type = "Acta";
				$model->description = "Acta";
				$model->doc_id = CUploadedFile::getInstanceByName('Acta');
				
				if($model->doc_id->type == 'application/pdf' || $model->doc_id->type == 'application/msword' || $model->doc_id->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $model->doc_id->type == 'application/vnd.oasis.opendocument.text' ){
					unlink(YiiBase::getPathOfAlias("webroot").''.$modelDocs['Acta'][1]);
					$model->doc_id->saveAs($path . $model->type . "." . $model->doc_id->getExtensionName());
					$model->doc_id = $path2 . $model->type . "." . $model->doc_id->getExtensionName();
					if($model->save()){
						$reload = true;
			     		}
				}else {
			 echo "Tipo de archivo no valido, solo se admiten .PDF .DOC . DOCX .ODT";
			 	}     							
			}
			
			if (is_object(CUploadedFile::getInstanceByName('Pasaporte'))) {
				unset($model);

				if (!array_key_exists('Pasaporte', $modelDocs)) {
					$model = new DocsIdentity;
				} else {
					$model = DocsIdentity::model()->findByPk($modelDocs['Pasaporte'][0]);
				}

				$model->id_curriculum = $curriculum->id;
				$model->type = "Pasaporte";
				$model->description = "Pasaporte";
				$model->doc_id = CUploadedFile::getInstanceByName('Pasaporte');
				if($model->doc_id->type == 'application/pdf' || $model->doc_id->type == 'application/msword' || $model->doc_id->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $model->doc_id->type == 'application/vnd.oasis.opendocument.text' ){
					unlink(YiiBase::getPathOfAlias("webroot").''.$modelDocs['Pasaporte'][1]);
					$model->doc_id->saveAs($path . $model->type . "." . $model->doc_id->getExtensionName());
					$model->doc_id = $path2 . $model->type . "." . $model->doc_id->getExtensionName();
					if($model->save()){
						$reload = true;
			     		}
				}else {
			 	echo "Tipo de archivo no valido, solo se admiten .PDF .DOC . DOCX .ODT";
			 	}

			}
			
			if (is_object(CUploadedFile::getInstanceByName('CURP'))) {
				unset($model);

				if (!array_key_exists('CURP', $modelDocs)) {
					$model = new DocsIdentity;
				} else {
					$model = DocsIdentity::model()->findByPk($modelDocs['CURP'][0]);
				}

				$model->id_curriculum = $curriculum->id;
				$model->type = "CURP";
				$model->description = "CURP";
				$model->doc_id = CUploadedFile::getInstanceByName('CURP');
				if($model->doc_id->type == 'application/pdf' || $model->doc_id->type == 'application/msword' || $model->doc_id->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $model->doc_id->type == 'application/vnd.oasis.opendocument.text' ){
					unlink(YiiBase::getPathOfAlias("webroot").''.$modelDocs['CURP'][1]);
					$model->doc_id->saveAs($path . $model->type . "." . $model->doc_id->getExtensionName());
					$model->doc_id = $path2 . $model->type . "." . $model->doc_id->getExtensionName();
					if($model->save()){
						$reload = true;
			     		}
				}else {
			 	echo "Tipo de archivo no valido, solo se admiten .PDF .DOC . DOCX .ODT";
			 	}

			}
			
			if (is_object(CUploadedFile::getInstanceByName('IFE'))) {
				unset($model);

				if (!array_key_exists('IFE', $modelDocs)) {
					$model = new DocsIdentity;
				} else {
					$model = DocsIdentity::model()->findByPk($modelDocs['IFE'][0]);
				}

				$model->id_curriculum = $curriculum->id;
				$model->type = "IFE";
				$model->description = "IFE";
				$model->doc_id = CUploadedFile::getInstanceByName('IFE');
				if($model->doc_id->type == 'application/pdf' || $model->doc_id->type == 'application/msword' || $model->doc_id->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $model->doc_id->type == 'application/vnd.oasis.opendocument.text' ){
					unlink(YiiBase::getPathOfAlias("webroot").''.$modelDocs['IFE'][1]);
					$model->doc_id->saveAs($path . $model->type . "." . $model->doc_id->getExtensionName());
					$model->doc_id = $path2 . $model->type . "." . $model->doc_id->getExtensionName();
					if($model->save()){
						$reload = true;
			     		}
				}else {
			 	echo "Tipo de archivo no valido, solo se admiten .PDF .DOC . DOCX .ODT";
			 	}

			}

			if ($reload == true) {
				$this->redirect(array('docsIdentity'));
 			}		 			
			//$this->redirect('docsIdentity');
		}

	$this->render('docs_Identity',array('model'=>$model, 'getDocs'=>$getDocs, 'modelDocs' => $modelDocs,));
	}

	public function actionAddresses(){

		$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		$model = $curriculum->idActualAddress;
		if ($model->country=="null") {
				$model->country="";
			}
			if ($model->zip_code=="0") {
				$model->zip_code="";
			}
			if ($model->state=="null") {
				$model->state="";
			}
				if ($model->delegation=="null") {
				$model->delegation="";
			}
				if ($model->city=="null") {
				$model->city="";
			}
				if ($model->town=="null") {
				$model->town="";
			}
				if ($model->colony=="null") {
				$model->colony="";
			}
				if ($model->street=="null") {
				$model->street="";
			}
			if ($model->external_number=="null") {
				$model->external_number="";
			}
			if ($model->internal_number=="null") {
				$model->internal_number="";
			}

		$this->performAjaxValidation($model);

		if(isset($_POST['Addresses']))
		{
			$model->attributes=$_POST['Addresses'];
			
			if($model->save())
     		{
   		// 			 $section = "Datos de Dirección actual"; //manda parametros al controlador SystemLog
					// $details = "Se han modificado datos de Dirección Actual";
					// $action = "Modificacion";
					// Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);

     			echo CJSON::encode(array('status'=>'success'));
     			Yii::app()->end();
     		}	
     		else 
     		{
     			 $error = CActiveForm::validate($model);
                 if($error!='[]')
                    echo $error;
                 Yii::app()->end();
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

		$this->performAjaxValidation(array($model, $curriculum));

		if(isset($_POST['Jobs']))
		{
			$model->attributes=$_POST['Jobs'];
			$model->id_curriculum = $curriculum->id;
			if ($model->hospital_unit!="NA" ) {
				$model->organization="OPD Hospital Civil de Guadalajara";
			}
			if ($model->save()) {
				// $section = "Datos Laborales"; //manda parametros al controlador SystemLog
				// $details = "Se han modificado datos laborales";
				// $action = "Modificacion";
				// Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				echo CJSON::encode(array('status'=>'success'));
     			Yii::app()->end();
     		}	
     		else 
     		{
     			 $error = CActiveForm::validate($model);
                 if($error!='[]')
                    echo $error;
                 Yii::app()->end();
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
			$nameResearch = $_POST["nameResearch"];

			$researchNew = new ResearchAreas();
			$researchNew->id_curriculum = $curriculum->id;
			$researchNew->name = $nameResearch;
			$researchNew->save();
			
			if ($getResearch != null) {
				$getResearchs = $_POST['getResearch'];
				foreach ($getResearchs as $key => $value) {
					$research = ResearchAreas::model()->findByPk($getResearch[$key]->id);
					$research->id_curriculum = $curriculum->id;
					$research->name = $value;
					$research->save();
				}
				// $section = "Lineas de Investigacion"; //manda parametros al controlador SystemLog
				// $details = "Se modifico su Linea de investigacion";
				// $action = "Modificacion";
				// Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);

				echo CJSON::encode(array('status'=>'success'));
		    	Yii::app()->end();
			}else{
				$error = CActiveForm::validate($model);
                if($error!='[]')
                   echo $error;
                Yii::app()->end();
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

		if(isset($_POST['phoneNumber']) || isset($_POST['emails']))
		{
			$emailNew = $_POST["emails"];
			$typeEmailNew = $_POST["typesEmails"];
			
			$emailsNew = new Emails();
			$emailsNew->id_person = $person->id;
			$emailsNew->email = $emailNew;
			$emailsNew->type = $typeEmailNew;
			$emailsNew->save();
			

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

			$phoneNew = new Phones();
			$phoneNew->id_person = $person->id;
			$phoneNew->type = $typesPhonesNew;
			$phoneNew->country_code = $countryCodeNew;
			$phoneNew->local_area_code = $localAreaCodeNew;
			$phoneNew->phone_number = $phoneNumberNew;
			$phoneNew->extension = $extensionNew;
			$phoneNew->is_primary = "0";
			$phoneNew->save();
			

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
					$phones->is_primary = $getIsPrimary[$key+1];
					$phones->save();
				}	
				echo CJSON::encode(array('status'=>'success'));
		    	Yii::app()->end();
			}else{
				$error = CActiveForm::validate($model);
                if($error!='[]')
                   echo $error;
                Yii::app()->end();
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
			
				echo CJSON::encode(array('status'=>'success'));
		    	Yii::app()->end();
			}else{
				$error = CActiveForm::validate($getTitle);
                if($error!='[]')
                   echo $error;
                Yii::app()->end();
			}
			//$model->attributes=$_POST['Grades'];
			//$model->save();
				// $section = "Formación Académica"; //manda parametros al controlador SystemLog
				// $details = "Se han modificado datos de Formación Académica";
				// $action = "Modificacion";
				// Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			//	$this->redirect('grades');

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
			if($model->save())
     		{
    //  			$section = "Nombramientos"; //manda parametros al controlador SystemLog
				// $details = "Se han modificado datos de Nombramientos";
				// $action = "Modificacion";
				// Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);

     			echo CJSON::encode(array('status'=>'success'));
     			Yii::app()->end();
     		}	
     		else 
     		{
     			 $error = CActiveForm::validate($model);
                 if($error!='[]')
                    echo $error;
                 Yii::app()->end();
     		}
     		$this->redirect('commission');
			
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

	public function actionDeleteDocs($id, $pathDoc){
		$model=DocsIdentity::model()->findByPk($id)->delete();
		$path = YiiBase::getPathOfAlias("webroot").''.$pathDoc;
		unlink($path);
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('docsIdentity'));
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
