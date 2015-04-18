<?php
class CurriculumVitaeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/layoutDataPersons';
	/**
	 * @return array action filters
	 */
	public function actions()
    {
        return array(
            'coco'=>array(
                'class'=>'CocoAction',
            ),
        );
    }
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

				'actions'=>array('personalData', 'DocsIdentity', 'Addresses',
								   'Jobs', 'ResearchAreas', 'Phones', 'Grades', 'Commission'),

				 'expression'=>'isset($user->id_roles) && ($user->id_roles==="1")',
				 'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
		//CV02-Modificar registro 
	public function actionPersonalData(){
		$personExist = Persons::model()->findByAttributes(array('id_user' => Yii::app()->user->id));

		if ($personExist != null) {
			$model = $this->loadModel($personExist->id);
			$curriculum=Curriculum::model()->find('id_user=:id_user',array(':id_user'=>Yii::app()->user->id));
			if (!is_dir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/')) {
				mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/', 0777, true);
			}
		}else{
			$model=new Persons;
			$curriculum = new Curriculum;
			if (!is_dir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/')) {
				mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/', 0777, true);
			}
		}

		if(isset($_POST['Persons']) && isset($_POST['Curriculum']))
				{
					$model->attributes=$_POST['Persons'];
					$curriculum->attributes = $_POST['Curriculum'];
					$model->photo_url = CUploadedFile::getInstanceByName('Persons[photo_url]');
					
					if ($model->validate()) {
						
						if($model->photo_url != ''){
							
							$model->photo_url->saveAs(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png');
							$model->photo_url = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png';
							
							$this->performAjaxValidation($model);
								
								if($model->save()){
									$curriculum->native_country = $curriculum->native_country;
									$curriculum->save();
									//manda parametros al controlador SystemLog
										$section = "Datos Personales";
										$details = "Se han modificado datos personales con nueva foto de perfil";
										$action = "Modificacion";
										Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
										$this->redirect('personalData');
									}

						}else{

							$model->photo_url = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png';
								if($model->save()){
									$curriculum->native_country = $curriculum->native_country;
									$curriculum->save();
									//manda parametros al controlador SystemLog
										$section = "Datos Personales";
										$details = "Se han modificado datos personales";
										$action = "Modificacion";
										Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
										$this->redirect('personalData');
									}
							}//end if else photo_url == ''
					}// end if validate
				}// end isset $_POST
					$this->render('personal_data',array('model'=>$model, 'curriculum'=>$curriculum));
	}

	public function actionDocsIdentity(){
		$curriculum=Curriculum::model()->find('id_user=:id_user',array(':id_user'=>Yii::app()->user->id));
		$docs = DocsIdentity::model()->findByAttributes(array('id_curriculum' => $curriculum->id));
		
			$model=new DocsIdentity;
			$getDocs = DocsIdentity::model()->findAll('id_curriculum=:id_curriculum',array(':id_curriculum'=>$curriculum->id));
		

			if(isset($_POST['DocsIdentity']))
			{
				$getDocs->attributes=$_POST['DocsIdentity'];

				foreach($getDocs as $key => $values){
						print_r($getDocs[$key]->id);
					}
			// $model->attributes=$_POST['DocsIdentity'];
			// $model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			// $model->doc_id = CUploadedFile::getInstanceByName('DocsIdentity[doc_id]');

			// if ($model->validate()) {
				
			// 	if($model->doc_id != ''){
			// 		$model->doc_id->saveAs(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/'.$model->type.'.'.$model->doc_id->getExtensionName());
			// 		$model->doc_id = '/users/'.Yii::app()->user->id.'/cve-hc/'.$model->type.'.'.$model->doc_id->getExtensionName();
			// 			if($model->save()){
			// 			//manda parametros al controlador SystemLog
			// 			// $section = "Documentos Oficiales";
			// 			// $details = "Se han modificado Documentos Oficiales";
			// 			// $action = "Modificacion";
			// 			// Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			// 		}
			// 	}
				
			// }
		}

		$this->render('docs_Identity',array('model'=>$model, 'getDocs'=>$getDocs,));
	}

	public function actionAddresses(){

		$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		$model = $curriculum->idActualAddress;

		if ($model == null) {
			$model=new Addresses;
		}

		if(isset($_POST['Addresses']))
		{
			$model->attributes=$_POST['Addresses'];
				if($model->save()){
				//manda parametros al controlador SystemLog
				$section = "Datos de Dirección actual";
				$details = "Se han modificado datos de Dirección Actual";
				$action = "Modificacion";
				Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			}
		}

		$this->render('addresses',array('model'=>$model,));
	}

	public function actionJobs(){
		$curriculum=Curriculum::model()->find('id_user=:id_user',array(':id_user'=>Yii::app()->user->id));
		$jobs = Jobs::model()->findByAttributes(array('id_curriculum' => $curriculum->id));

		if ($jobs != null) {
			$model = Jobs::model()->findByPk($jobs->id);
		}else{
			$model=new Jobs;
		}
				if(isset($_POST['Jobs']))
				{
					$model->attributes=$_POST['Jobs'];
					$model->id_curriculum = $curriculum->id;
					if ($model->save()) {
					//manda parametros al controlador SystemLog
						$section = "Datos Laborales";
						$details = "Se han modificado datos laborales";
						$action = "Modificacion";
						Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
					}

				}

				$this->render('jobs',array(
					'model'=>$model,
				));
		
	}

	public function actionResearchAreas(){
		$curriculum=Curriculum::model()->find('id_user=:id_user',array(':id_user'=>Yii::app()->user->id));
		$researchAreas = ResearchAreas::model()->findByAttributes(array('id_curriculum' => $curriculum->id));

		if ($researchAreas != null) {
			$model = ResearchAreas::model()->findByPk($researchAreas->id);
		}else{
			$model=new ResearchAreas;
		}
	

		if(isset($_POST['ResearchAreas']))
		{
			$model->attributes=$_POST['ResearchAreas'];
			$model->id_curriculum = $curriculum->id;
			if ($model->save()) {
			//manda parametros al controlador SystemLog
				$section = "Lineas de Investigacion";
				$details = "Se modifico su Linea de investigacion";
				$action = "Modificacion";
				Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			}
		}

		$this->render('research_areas',array('model'=>$model,));
	}

	public function actionPhones(){

		$idPerson = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
		$phones = Phones::model()->findByAttributes(array('id_person' => $idPerson));

		if ($phones != null) {
			$model=new Phones;
			$emails = new Emails;
			$getEmails = Emails::model()->findAll('id_person=:id_person',array(':id_person'=>$idPerson));
			$getPhones = Phones::model()->findAll('id_person=:id_person',array(':id_person'=>$idPerson));
		}else{
			$model=new Phones;
			$emails = new Emails;
			$getEmails = Emails::model()->findAll('id_person=:id_person',array(':id_person'=>$idPerson));
			$getPhones = Phones::model()->findAll('id_person=:id_person',array(':id_person'=>$idPerson));
		}
		
		if(isset($_POST['phoneNumber']) && isset($_POST['emails']))
		{
			/////////// EMAILS ///////////
			$emailNew = $_POST["emails"];
			$typeEmailNew = $_POST["typesEmails"];
			
			foreach($emailNew as $key => $values){
				$emailsNew = new Emails();
				$emailsNew->id_person = $idPerson;
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
				//// update emails /////////
				$getEmail = $_POST['getEmail'];
				$getTypeEmail = $_POST['getTypeEmail'];
					foreach($getEmail as $key => $value) {
			 			$emails = Emails::model()->findByPk($getEmails[$key]->id);
						$emails->email = $getEmail[$key];
						$emails->type = $getTypeEmail[$key];
						$emails->save();
							// $section = "Datos de Contacto";
							// $details = "Se han modificado el Email: ".$getEmails[$key]->email." a ".$getEmail[$key];
							// $action = "Modificacion";
							// Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
					}
						
			}
			
			/////////////// phones /////////////
			$typesPhonesNew = $_POST["typesPhones"];
			$countryCodeNew = $_POST["countryCode"];
			$localAreaCodeNew = $_POST["localAreaCode"];
			$phoneNumberNew = $_POST["phoneNumber"];
			$extensionNew = $_POST["extension"];
			$isPrimaryNew = $_POST["isPrimary"];

			foreach($phoneNumberNew as $key => $values){
			 $phoneNew = new Phones();
			 $phoneNew->id_person = $idPerson;
			 $phoneNew->type = $typesPhonesNew[$key];
			 $phoneNew->country_code = $countryCodeNew[$key];
			 $phoneNew->local_area_code = $localAreaCodeNew[$key];
			 $phoneNew->phone_number = $values;
			 $phoneNew->extension = $extensionNew[$key];
			 $phoneNew->is_primary = $isPrimaryNew[$key];
			 $phoneNew->save();
			}
			if ($phones != null) {
				/////////////// update phones /////////////
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
		}///if isset
		$this->render('phones',array('model'=>$model, 'emails' =>$emails, 'getEmails'=> $getEmails, 'getPhones'=> $getPhones,));
	}

	public function actionGrades(){
		$curriculum=Curriculum::model()->find('id_user=:id_user',array(':id_user'=>Yii::app()->user->id));
		$grade = Grades::model()->findByAttributes(array('id_curriculum' => $curriculum->id));

		if ($grade != null) {
			$model = Grades::model()->findByPk($grade->id);
		}else{
			$model=new Grades;
			$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
		}
			
		if(isset($_POST['Grades']))
		{
			$model->attributes=$_POST['Grades'];
			$model->save();
			//manda parametros al controlador SystemLog
					$section = "Formación Académica";
					$details = "Se han modificado datos de Formación Académica";
					$action = "Modificacion";
					Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		}

		$this->render('grades',array('model'=>$model,));
	}


	public function actionCommission(){
		$commission = Curriculum::model()->findByAttributes(array('id_user' => Yii::app()->user->id));

		if ($commission != null) {
			$model = Curriculum::model()->findByPk($commission->id);
		}else{
			$model=new Curriculum;
		}

			if(isset($_POST['Curriculum']))
			{
				$model->attributes=$_POST['Curriculum'];
							$model->save();
							//manda parametros al controlador SystemLog
							$section = "Nombramientos";
							$details = "Se han modificado datos de Nombramientos";
							$action = "Modificacion";
							Yii::app()->runController('systemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			}

		$this->render('commission',array('model'=>$model,));
	}




	public function loadModel($id) {
		$model = Persons::model()->findByPk($id);
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
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'sponsors-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}




}
