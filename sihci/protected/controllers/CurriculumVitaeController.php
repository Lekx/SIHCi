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
				 'expression'=>'($user->Rol->alias==="ADMIN" || $user->type==="fisico")',
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

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$model = Persons::model()->findByAttributes(array('id_user' => $iduser));
		$curriculum = Curriculum::model()->findByAttributes(array('id_user' => $iduser));
		$path = YiiBase::getPathOfAlias("webroot").'/users/'.$iduser.'/cve-hc/';

			$section = "Curriculum Vitae"; //manda parametros al controlador SystemLog
			$details = "Subsección Datos Personales. Registro Número ".$model->id;
			$action = "Modificación";

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
			if($addresses->save()){
				$details = "Subsección Dirección Actual";
				$action = "Creación";
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			}

			$curriculum->id_user= $iduser;
			$curriculum->id_actual_address= $addresses->id;
			$curriculum->native_country = $model->country;
			$curriculum->SNI = -1;
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

					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
					echo CJSON::encode(array('status'=>'success'));
					Yii::app()->end();
				}else{
					$error = CActiveForm::validate($model);
								if($error!='[]')
									 echo $error;
								Yii::app()->end();
				}
		}
		$this->render('personal_data',array('model'=>$model, 'curriculum'=>$curriculum));
	}

	public function actionDocsIdentity(){
		$error = "{";
		$error1 = "";
		$error2 = "";
		$error3 = "";
		$error4 = "";

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$curriculum=Curriculum::model()->findByAttributes(array('id_user'=>$iduser));
		$DocExist = DocsIdentity::model()->findAllByAttributes(array('id_curriculum' => $curriculum->id));

		$modelDocs = array();
		if ($DocExist != null) {
			foreach ($DocExist as $key => $value) {
				$modelDocs[$value->type] = array($value->id, $value->doc_id, $value->type);
			}
		}

		$model=new DocsIdentity;
		$reload = false;

		if(isset($_POST['Acta'])){
			$path = YiiBase::getPathOfAlias("webroot").'/users/'.$iduser.'/cve-hc/';
			$path2 = '/users/'.Yii::app()->user->id.'/cve-hc/';

			if (!is_dir($path)) {
				mkdir($path, 0777, true);
			}

			if (is_object(CUploadedFile::getInstanceByName('Acta'))) {
				unset($model);
				$section = "Curriculum Vitae";
				if (!array_key_exists('Acta', $modelDocs)) {
					$model = new DocsIdentity;
					$action = "Creación";
					$details = "Subsección Documentos Oficiales. Se subió Acta";
				} else {
					$model = DocsIdentity::model()->findByPk($modelDocs['Acta'][0]);
					$action = "Modificación";
					$details = "Subsección Documentos Oficiales. Se subió Acta. Número Registro: ".$model->id;
				}

				$model->id_curriculum = $curriculum->id;
				$model->type = "Acta";
				$model->description = "Acta";
				$model->doc_id = CUploadedFile::getInstanceByName('Acta');

				if($model->validate()==1){

					$model->doc_id->saveAs($path . $model->type . "." . $model->doc_id->getExtensionName());
					$model->doc_id = $path2 . $model->type . "." . $model->doc_id->getExtensionName();
					if($model->save()){
						$reload = true;
						Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			     		}
				}else {
				 $error1 = CActiveForm::validate($model);
 				 $error1 = str_replace('DocsIdentity_doc_id','DocsIdentity_doc_id1',$error1);
			 	}
			}

			if (is_object(CUploadedFile::getInstanceByName('Pasaporte'))) {
				unset($model);
				$section = "Curriculum Vitae";
				if (!array_key_exists('Pasaporte', $modelDocs)) {
					$model = new DocsIdentity;
					$action = "Creación";
					$details = "Subsección Documentos Oficiales. Se subió Pasaporte";
				} else {
					$model = DocsIdentity::model()->findByPk($modelDocs['Pasaporte'][0]);
					$action = "Modificación";
					$details = "Subsección Documentos Oficiales. Se subió Pasaporte. Número Registro: ".$model->id;
				}

				$model->id_curriculum = $curriculum->id;
				$model->type = "Pasaporte";
				$model->description = "Pasaporte";
				$model->doc_id = CUploadedFile::getInstanceByName('Pasaporte');
				if($model->validate()==1){

					$model->doc_id->saveAs($path . $model->type . "." . $model->doc_id->getExtensionName());
					$model->doc_id = $path2 . $model->type . "." . $model->doc_id->getExtensionName();
					if($model->save()){
						$reload = true;
						Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			     		}
				}else {
					$error2 = CActiveForm::validate($model);
					$error2 = str_replace('DocsIdentity_doc_id','DocsIdentity_doc_id2',$error2);
			 	}

			}

			if (is_object(CUploadedFile::getInstanceByName('CURP'))) {
				unset($model);
				$section = "Curriculum Vitae";
				if (!array_key_exists('CURP', $modelDocs)) {
					$model = new DocsIdentity;
					$action = "Creación";
					$details = "Subsección Documentos Oficiales. Se subió CURP";
				} else {
					$model = DocsIdentity::model()->findByPk($modelDocs['CURP'][0]);
					$action = "Modificación";
					$details = "Subsección Documentos Oficiales. Se subió CURP. Número Registro: ".$model->id;
				}

				$model->id_curriculum = $curriculum->id;
				$model->type = "CURP";
				$model->description = "CURP";
				$model->doc_id = CUploadedFile::getInstanceByName('CURP');
				if($model->validate()==1){

					$model->doc_id->saveAs($path . $model->type . "." . $model->doc_id->getExtensionName());
					$model->doc_id = $path2 . $model->type . "." . $model->doc_id->getExtensionName();
					if($model->save()){
						$reload = true;
						Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			     		}
				}else {
					$error3 = CActiveForm::validate($model);
					$error3 = str_replace('DocsIdentity_doc_id','DocsIdentity_doc_id3',$error3);
			 	}

			}

			if (is_object(CUploadedFile::getInstanceByName('IFE'))) {
				unset($model);
				$section = "Curriculum Vitae";
				if (!array_key_exists('IFE', $modelDocs)) {
					$model = new DocsIdentity;
					$action = "Creación";
					$details = "Subsección Documentos Oficiales. Se subió IFE";
				} else {
					$model = DocsIdentity::model()->findByPk($modelDocs['IFE'][0]);
					$action = "Modificación";
					$details = "Subsección Documentos Oficiales. Se subió IFE. Número Registro: ".$model->id;
				}

				$model->id_curriculum = $curriculum->id;
				$model->type = "IFE";
				$model->description = "IFE";
				$model->doc_id = CUploadedFile::getInstanceByName('IFE');
				if($model->validate()==1){

					$model->doc_id->saveAs($path . $model->type . "." . $model->doc_id->getExtensionName());
					$model->doc_id = $path2 . $model->type . "." . $model->doc_id->getExtensionName();
					if($model->save()){
						$reload = true;
						Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			     		}
				}else {
					$error4 = CActiveForm::validate($model);
					$error4 = str_replace('DocsIdentity_doc_id','DocsIdentity_doc_id4',$error4);
			 	}

			}

			if ($reload == true) {
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

			if($error!='[]')
				echo str_replace("]\"", "],\"",$error)."}";

			Yii::app()->end();
			}
		}

	$this->render('docs_Identity',array('model'=>$model, 'modelDocs' => $modelDocs,));
	}

	public function actionAddresses(){

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>$iduser));
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
   					$section = "Curriculum Vitae"; //manda parametros al controlador SystemLog
					$details = "Subsección Datos de Dirección Actual. Número Registro: ".$model->id;
					$action = "Modificación";
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);

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

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>$iduser));
		$jobs = Jobs::model()->findByAttributes(array('id_curriculum' => $curriculum->id));
		$model=new Jobs;

		$section = "Curriculum Vitae"; //manda parametros al controlador SystemLog
		$details = "Subsección Datos laborales.";
		$action = "Creación";

		if ($jobs != null) {
			$model = Jobs::model()->findByPk($jobs->id);
			$details = "Subsección Datos laborales. Número Registro: ".$model->id;
			$action = "Modificación";
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
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);

				echo CJSON::encode(array('status'=>'success'));
				Yii::app()->end();
			}else{
				$error = CActiveForm::validate($model);
							if($error!='[]')
								 echo $error;
							Yii::app()->end();
     		}

		}
		$this->render('jobs',array('model'=>$model,));
	}

	public function actionResearchAreas(){

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>$iduser));
		$researchAreas = ResearchAreas::model()->findByAttributes(array('id_curriculum' => $curriculum->id));
		$getResearch = ResearchAreas::model()->findAllByAttributes(array('id_curriculum' => $curriculum->id));

		$model=new ResearchAreas;
		$error = "{";
		$error1 = "";
		$error2 = "";

		$this->performAjaxValidation($model);

		if(isset($_POST['ResearchAreas']) || isset($_POST['getResearch']))
		{
				$model->attributes=$_POST['ResearchAreas'];
			$reload = false;
			$model->id_curriculum = $curriculum->id;
			$model->name = $model->name;
			if($model->validate()){
				if($model->save()){
					$section = "Curriculum Vitae"; //manda parametros al controlador AdminSystemLog
					$details = "Subsección Linea de investigación: ".$model->name.".";
					$action = "Creación";
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);

					$reload=true;
				}
			}else{
				$error1 = CActiveForm::validate($model);
				$error1 = str_replace('ResearchAreas_name','ResearchAreas_name1',$error1);
			}


			if ($getResearch != null) {
				$getResearchs = $_POST['getResearch'];
				foreach ($getResearchs as $key => $value) {
					$research = ResearchAreas::model()->findByPk($getResearch[$key]->id);
					$research->id_curriculum = $curriculum->id;
					$research->name = $value;
					if($research->validate()){
						if($research->save())
							$reload=true;
					}else{
						$error2 = CActiveForm::validate($model);
						$error2 = str_replace('getResearch','getResearch1',$error2);
					}

				}
			}

			if($reload==true){
				echo CJSON::encode(array('status'=>'success'));
				Yii::app()->end();
			}else{

				if($error1 !='[]')
					$error.= str_replace("{", "",str_replace("}", "",$error1));

				if($error2 !='[]')
					$error.= str_replace("{", "",str_replace("}", "",$error2));

				if($error!='[]')
					echo str_replace("]\"", "],\"",$error)."}";

				Yii::app()->end();
			}

		}
		$this->render('research_areas',array('model'=>$model, 'getResearch'=>$getResearch,));
	}

	public function actionPhones(){

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$person = Persons::model()->findByAttributes(array('id_user'=>$iduser));
		$getEmails = Emails::model()->findAllByAttributes(array('id_person'=>$person->id));
		$getPhones = Phones::model()->findAllByAttributes(array('id_person'=>$person->id));

		$phone =new Phones;
		$email = new Emails;
		$email->id_person=$person->id;
		$phone->id_person=$person->id;
		$phone->is_primary="1";

		$this->performAjaxValidation($email);
		$this->performAjaxValidation($phone);

		if(isset($_POST['Phones']) || isset($_POST['getPhoneNumber']) || isset($_POST['Emails']) || isset($_POST['getEmail']))
		{
			$email->attributes = $_POST['Emails'];
			$reload=false;

			$email->id_person = $person->id;
				if($email->save()){
					$section = "Curriculum Vitae"; //manda parametros al controlador AdminSystemLog
					$details = "Subsección Datos de Contacto. Email.";
					$action = "Creación";
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
					$reload=true;
				}

			if ($getEmails != null) {

				$getEmail = $_POST['getEmail'];
				$getTypeEmail = $_POST['getTypeEmail'];

					foreach($getEmail as $key => $value) {
			 			$emails = Emails::model()->findByPk($getEmails[$key]->id);
						$emails->email = $getEmail[$key];
						$emails->type = $getTypeEmail[$key];
						if($emails->save()){
							$reload=true;
						}
					}

			}
			$phone->attributes = $_POST['Phones'];
			$phone->id_person = $person->id;
			$phone->is_primary = "1";
			if($phone->save()){
				$section = "Curriculum Vitae"; //manda parametros al controlador AdminSystemLog
				$details = "Subsección Datos de Contacto. Teléfono";
				$action = "Creación";
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				$reload=true;
			}

			if ($getPhones != null) {

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
					if($phones->save()){
						$reload=true;
					}
				}

			}


		if($reload == true){
			echo CJSON::encode(array('status'=>'success'));
				Yii::app()->end();
		}else{
				$error1 = CActiveForm::validate($email);
				$error2 = CActiveForm::validate($phone);
	      $error = "{";
					if($error1 !='[]')
						$error.= str_replace("{", "",str_replace("}", "",$error1));
					if($error2 !='[]')
						$error.= str_replace("{", "",str_replace("}", "",$error2));

					if($error!='[]')
						echo str_replace("]\"", "],\"",$error)."}";

        Yii::app()->end();
			}
			// $this->redirect('phones');
		}
		$this->render('phones',array('phone'=>$phone, 'email' =>$email, 'getEmails'=> $getEmails, 'getPhones'=> $getPhones,));
	}

	public function actionGrades(){

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>$iduser));
		$grade = Grades::model()->findByAttributes(array('id_curriculum' => $curriculum->id));
		$getGrades = Grades::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));

		$model=new Grades;
		$modelUp = new Grades;

		$reload =false;
		$this->performAjaxValidation($model);
		$this->performAjaxValidation($modelUp);

		if(isset($_POST['Grades']) || isset($_POST['getGrades']))
		{
			$model->attributes = $_POST['Grades'];
			$model->id_curriculum = $curriculum->id;
			if($model->save()){
				$section = "Curriculum Vitae"; //manda parametros al controlador AdminSystemLog
				$details = "Subsección Formación Académica.";
				$action = "Creación";
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				$reload=true;
			}

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
					if($gradeUp->save()){
						$reload = true;
					}
				}
			}

			if($reload==true){
				echo CJSON::encode(array('status'=>'success'));
				Yii::app()->end();
			}else{
				$error1 = CActiveForm::validate($model);
				$error2 = CActiveForm::validate($modelUp);
	      $error = "{";
					if($error1 !='[]')
						$error.= str_replace("{  ", "",str_replace("}", "",$error1));
					if($error2 !='[]')
						$error.= str_replace("{", "",str_replace("}", "",$error2));

					if($error!='[]')
						echo str_replace("]\"", "],\"",$error)."}";

				Yii::app()->end();
			}

		}

		$this->render('grades',array('model'=>$model, 'modelUp'=>$modelUp, 'getGrades'=>$getGrades));
	}


	public function actionCommission(){

		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

		$commission = Curriculum::model()->findByAttributes(array('id_user' => $iduser));
		$model=new Curriculum;

     	$section = "Curriculum Vitae."; //manda parametros al controlador SystemLog
		$details = "Subsección Nombramientos.";
		$action = "Creación.";

		if ($commission != null) {
			$model = Curriculum::model()->findByPk($commission->id);
			$details = "Subsección Nombramientos. Número Registro: ".$model->id;
			$action = "Modificación.";
		}

		if(isset($_POST['Curriculum']))
		{
			$model->attributes=$_POST['Curriculum'];

			if($model->save())
     		{
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);

				echo CJSON::encode(array('status'=>'success'));
				Yii::app()->end();
			}
		}
		$this->render('commission',array('model'=>$model,));
	}



	public function actionDeleteEmail($id){
		$model=Emails::model()->findByPk($id);
				$section = "Curriculum Vitae."; //manda parametros al controlador AdminSystemLog
				$details = "Subsección Datos de Contacto. Registro Número: ".$model->id.". Fecha Creación: ".$model->creation_date.". Datos: ".$model->email;
				$action = "Eliminación";
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('phones'));
	}

	public function actionDeletePhone($id){
		$model=Phones::model()->findByPk($id);
				$section = "Curriculum Vitae."; //manda parametros al controlador AdminSystemLog
				$details = "Subsección Datos de Contacto. Registro Número: ".$model->id.". Fecha Creación: ".$model->creation_date.". Datos: ".$model->country_code."-".$model->local_area_code."-".$model->phone_number.".";
				$action = "Eliminación";
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('phones'));
	}

	public function actionDeleteResearch($id){
		$model=ResearchAreas::model()->findByPk($id);
				$section = "Curriculum Vitae."; //manda parametros al controlador AdminSystemLog
				$details = "Subsección Líneas de Investigación. Registro Número: ".$model->id.". Datos: ".$model->name.".";
				$action = "Eliminación";
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('researchAreas'));
	}

	public function actionDeleteGrade($id){
		$model=Grades::model()->findByPk($id);
				$section = "Curriculum Vitae."; //manda parametros al controlador AdminSystemLog
				$details = "Subsección Formación Académica. Registro Número: ".$model->id.". Fecha Creación: ".$model->creation_date.". Datos: ".$model->grade.". Título de Tésis: ".$model->thesis_title;
				$action = "Eliminación";
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('grades'));
	}

	public function actionDeleteDocs($id, $pathDoc){
		$model=DocsIdentity::model()->findByPk($id);
		$path = YiiBase::getPathOfAlias("webroot").''.$pathDoc;
		unlink($path);
				$section = "Curriculum Vitae."; //manda parametros al controlador AdminSystemLog
				$details = "Subsección Documentos Oficiales. Registro Número: ".$model->id.". Datos: ".$model->type.".";
				$action = "Eliminación";
				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();
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
