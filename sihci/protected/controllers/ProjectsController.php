<?php

class ProjectsController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','sponsoredAdmin','acceptSponsorship','rejectSponsorship'),
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
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$followups = ProjectsFollowups::model()->findAllByAttributes(array('id_project'=>$id),array('order'=>'id DESC'));
		$modelfollowup = new ProjectsFollowups;

		$this->render('view',array(
			'model'=>$this->loadModel($id), 'followups'=>$followups, 'modelfollowup'=>$modelfollowup
		));
	}

	public $discipline = array("Anatomía Patológica"=>"Anatomía Patológica",
		"Anestesiología"=>"Anestesiología",
		"Angiología"=>"Angiología",
		"Biología de la Reproducción Humana"=>"Biología de la Reproducción Humana",
		"Cardiología"=>"Cardiología",
		"Cirugía Cardiotorácica"=>"Cirugía Cardiotorácica",
		"Cirugía General"=>"Cirugía General",
		"Cirugía Maxilofacial"=>"Cirugía Maxilofacial",
		"Cirugía Pediátrica"=>"Cirugía Pediátrica",
		"Cirugía Plástica y Reconstructiva"=>"Cirugía Plástica y Reconstructiva",
		"Coloproctología"=>"Coloproctología",
		"Audiología, Otoneurología y Foniatría"=>"Audiología, Otoneurología y Foniatría",
		"Dermatología"=>"Dermatología",
		"Endocrinología"=>"Endocrinología",
		"Epidemiología"=>"Epidemiología",
		"Estomatología"=>"Estomatología",
		"Gastroenterología"=>"Gastroenterología",
		"Genética Médica"=>"Genética Médica",
		"Geriatría"=>"Geriatría",
		"Ginecología y Obstetricia"=>"Ginecología y Obstetricia",
		"Hematología"=>"Hematología",
		"Infectología"=>"Infectología",
		"Inmunología Clínica y Alergia"=>"Inmunología Clínica y Alergia",
		"Medicina del Enfermo en Estado Crítico"=>"Medicina del Enfermo en Estado Crítico",
		"Medicina del Trabajo"=>"Medicina del Trabajo",
		"Medicina Familiar"=>"Medicina Familiar",
		"Medicina Física y Rehabilitación"=>"Medicina Física y Rehabilitación",
		"Medicina Interna"=>"Medicina Interna",
		"Medicina Nuclear"=>"Medicina Nuclear",
		"Nefrología"=>"Nefrología",
		"Neumología"=>"Neumología",
		"Oftalmología"=>"Oftalmología",
		"Oncología Médica y Radioterapia"=>"Oncología Médica y Radioterapia",
		"Ortopedia y Traumatología"=>"Ortopedia y Traumatología",
		"Otorrinolaringología y Cirugía de Cabeza y Cuello"=>"Otorrinolaringología y Cirugía de Cabeza y Cuello",
		"Pediatría Médica"=>"Pediatría Médica",
		"Psiquiatría y Psicología"=>"Psiquiatría y Psicología",
		"Radiodiagnóstico e Imagen"=>"Radiodiagnóstico e Imagen",
		"Reumatología"=>"Reumatología",
		"Urología"=>"Urología",
		"Otro"=>"Otro",
		"Neurocirugía"=>"Neurocirugía",
	);
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Projects;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Projects']))
		{
			$model->attributes=$_POST['Projects'];

			if(Yii::app()->user->Rol->id==1){
				$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>$model->id_curriculum))->id;
			}else{
				$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			}

			if($_POST[1]== "draft")
				$model->status = "borrador";
			else
				$model->status = "DIVUH";

			$model->folio = "-1";
			$model->is_sponsored = 0; 
			$model->is_sni = (Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->SNI > 0 ? 1 : 0);
			$model->registration_number = "-1";

			//var_dump($_POST['research_types']);

			foreach ($_POST['research_types'] as $key => $value) {
				if(!empty($value))
					$model->research_type.=$value."*-*";
			}

		if($model->validate()){
			if($model->save()){

				foreach ($_POST['adtlResearchers'] as $key => $value) {
					if(!empty($value)){
						$adtlRes = new ProjectsCoworkers;
						$adtlRes->id_project = $model->id;
						$adtlRes->fullName = $value;

						$adtlRes->save();
					}
				}
				if($_POST[1] != "draft"){
					$followup = new ProjectsFollowups;
					$followup->id_project = $model->id;
					$followup->id_user = Yii::app()->user->id;
					$followup->followup = "Proyecto enviado a revisión del Jefe de división de unidad hospitalaria.";

					if($followup->save()){
						echo CJSON::encode(array('status'=>'success','message'=>'Registro realizado con éxito','subMessage'=>'Su proyecto ha sido enviado para su evaluación.'));
						Yii::app()->end();
					}else{
						echo CJSON::encode(array('status'=>'failure'));
						Yii::app()->end();
					}
				}else{
						echo CJSON::encode(array('status'=>'success','message'=>'Proyecto guardado con éxito','subMessage'=>'Su proyecto ha sido guardado como borrador y puede editarlo en cualquier momento.'));
						Yii::app()->end();
				}	
			
			}
		}else{
				$error = CActiveForm::validate($model);
				if($error!='[]')
					echo $error;

				Yii::app()->end();
		}
		}else{

		$this->render('create',array(
			'model'=>$model,'discipline'=>$this->discipline
		));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Projects']))
		{
			$model->attributes=$_POST['Projects'];

			if(Yii::app()->user->Rol->id==1){
				$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>$model->id_curriculum))->id;
			}else{
				$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			}

			if($_POST[1]== "draft")
				$model->status = "borrador";
			else
				$model->status = "DIVUH";

			$model->folio = "-1";
			$model->is_sponsored = 0; 
			$model->is_sni = (Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->SNI > 0 ? 1 : 0);
			$model->registration_number = "-1";

			//var_dump($_POST['research_types']);

			foreach ($_POST['research_types'] as $key => $value) {
				if(!empty($value))
					$model->research_type.=$value."*-*";
			}

		if($model->validate()){
			if($model->save()){

				foreach ($_POST['adtlResearchers'] as $key => $value) {
					if(!empty($value)){
						$adtlRes = new ProjectsCoworkers;
						$adtlRes->id_project = $model->id;
						$adtlRes->fullName = $value;

						$adtlRes->save();
					}
				}
				if($_POST[1] != "draft"){
					$followup = new ProjectsFollowups;
					$followup->id_project = $model->id;
					$followup->id_user = Yii::app()->user->id;
					$followup->followup = "Proyecto enviado a revisión del Jefe de división de unidad hospitalaria.";

					if($followup->save()){
						echo CJSON::encode(array('status'=>'success','message'=>'Registro realizado con éxito','subMessage'=>'Su proyecto ha sido enviado para su evaluación.'));
						Yii::app()->end();
					}else{
						echo CJSON::encode(array('status'=>'failure'));
						Yii::app()->end();
					}
				}else{
						echo CJSON::encode(array('status'=>'success','message'=>'Proyecto guardado con éxito','subMessage'=>'Su proyecto ha sido guardado como borrador y puede editarlo en cualquier momento.'));
						Yii::app()->end();
				}	
			
			}
		}else{
				$error = CActiveForm::validate($model);
				if($error!='[]')
					echo $error;

				Yii::app()->end();
		}
		}else{

		$this->render('update',array(
			'model'=>$model,'discipline'=>$this->discipline
		));
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Projects');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Projects('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Projects']))
			$model->attributes=$_GET['Projects'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAcceptSponsorship($id)
	{
		
		$sponsoredProjExist = SponsoredProjects::model()->findByAttributes(array("id_sponsorship"=>$id));
		if(!is_object($sponsoredProjExist)){
			//echo "caca";
			$sponsored = Sponsorship::model()->findByPk($id);
			$project = new Projects;

			 

			 $cv = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));

			 $project->id_curriculum = $cv->id;
			 $project->title = $sponsored->project_name;
			 $project->discipline = "-1";
			 $project->research_type = "-1";
			 $project->priority_topic = "-1";
			 $project->sub_topic = "-1";
			 $project->justify = $sponsored->description;
			 $project->is_sni = 1;
			 $project->develop_uh ="-1";

			 $project->status = "borrador";
			 $project->folio = "-1";
			 $project->is_sponsored = 1;
			 $project->registration_number = "-1";

			 $sponsoredProj = new SponsoredProjects;


				$sponsoredProj->id_project = 1;
			 $sponsoredProj->id_sponsorship = $id;
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if($project->validate() && $sponsoredProj->validate())
				if($project->save()){
					$sponsoredProj->id_project = $project->id;
					if($sponsoredProj->save())
						if(Sponsorship::model()->updateByPk($id,array("status"=>1)))
							if(!isset($_GET['ajax']))
								$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('sponsoredAdmin'));

				}
		}
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('sponsoredAdmin'));
	}

	public function actionRejectSponsorship($id)
	{
		Sponsorship::model()->updateByPk($id,array("status"=>"rechazado"));

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('sponsoredAdmin'));
	}

	public function actionSponsoredAdmin()
	{
		//$model = new Sponsorship('search');

		$model = Sponsorship::model()->findByAttributes(array("id_user_researcher"=>Yii::app()->user->id));


		//$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Projects']))
			$model->attributes=$_GET['Projects'];

		$this->render('sponsoredAdmin',array(
			'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Projects the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Projects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Projects $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='projects-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
