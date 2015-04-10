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
									}

						}else{

							$model->photo_url = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png';
								if($model->save()){
									$curriculum->native_country = $curriculum->native_country;
									$curriculum->save();
									}
							}//end if else photo_url == ''
					}// end if validate
				}// end isset $_POST
					$this->render('personal_data',array('model'=>$model, 'curriculum'=>$curriculum));
	//	}//valida si el usuario ya existe entra a Actualizar
	
	}

	public function actionDocsIdentity(){
		$curriculum=Curriculum::model()->find('id_user=:id_user',array(':id_user'=>Yii::app()->user->id));
		$docs = DocsIdentity::model()->findByAttributes(array('id_curriculum' => $curriculum->id));

		if ($docs != null) {
			$model = DocsIdentity::model()->findByPk($docs->id);
		}else{
			$model=new DocsIdentity;
		}

			if(isset($_POST['DocsIdentity']))
			{
			$model->attributes=$_POST['DocsIdentity'];
			$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			$model->doc_id = CUploadedFile::getInstanceByName('DocsIdentity[doc_id]');

			if ($model->validate()) {
				
				if($model->doc_id != ''){
					$model->doc_id->saveAs(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/'.$model->type.'.pdf');
					$model->doc_id = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/'.$model->type.'.pdf';
					$model->save();
				}
				
			}
		}

		$this->render('docs_Identity',array('model'=>$model,));
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
			$model->save();
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
					$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
					$model->save();
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
			$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			$model->save();
				$log = new SystemLog();
				$log->id_user = Yii::app()->user->id;
				$log->section = "Lineas de Investigacion";
				$log->details = "Se modifico su Linea de investigacion";
				$log->action = "Modificacion";
				$log->datetime = date ('d/m/Y H:i:s');
				$log->save();
		}

		$this->render('research_areas',array('model'=>$model,));
	}

	public function actionPhones(){
		  Yii::import('ext.multimodelform.MultiModelForm');

		$person = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		$phones = Phones::model()->findByAttributes(array('id_person' => $person->id));

		if ($phones != null) {
			$model = Phones::model()->findByPk($phones->id);
			$emails=Emails::model()->find('id_person=:id_person',
                              array(':id_person'=>Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id));
		$validatedEmails = array();
		}else{
			$model=new Phones;
			$emails = new Emails;
			$validatedEmails = array();
		}

		if(isset($_POST['Phones']) && isset($_POST['Emails']))
		{
			$model->attributes=$_POST['Phones'];
			$emails->attributes = $_POST['Emails'];
			if($model->save()){
				$emails->email = $emails->email;
				$emails->type = $emails->type;
				$emails->save();
			}
		}
		$this->render('phones',array('model'=>$model, 'emails' =>$emails, 'validatedEmails' => $validatedEmails,));
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
				$log = new SystemLog();
				$log->id_user = Yii::app()->user->id;
				$log->section = "Formacion academica";
				$log->details = "Se modifico su formacion academica";
				$log->action = "Modificacion";
				$log->datetime = date ('d/m/Y H:i:s');
				$log->save();
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
				if ($model->validate()) {
						$model->save();
							// $log = new SystemLog();
							// $log->id_user = Yii::app()->user->id;
							// $log->section = "Nombramientos";
							// $log->details = "Se modifico Nombramientos";
							// $log->action = "Modificacion";
							// $log->datetime = date ('d/m/Y H:i:s');
							// $log->save();
				}	
			
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
