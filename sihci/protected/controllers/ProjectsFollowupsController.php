<?php

class ProjectsFollowupsController extends Controller
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
				'actions'=>array('index','view', 'FollowupToShow'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('createFollowup','update', 'FollowupReview','SendReview','SendReviewCommittee'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateFollowup($id)
	{
		$modelfollowup = new ProjectsFollowups;
		// $followups = ProjectsFollowups::model()->findAllByAttributes(array('id_project'=>$id),array('order'=>'id DESC'));
         $this->performAjaxValidation($modelfollowup);

        if(isset($_POST['ProjectsFollowups']))
        {

			$modelfollowup->unsetAttributes();
            $modelfollowup->attributes=$_POST['ProjectsFollowups'];
            $modelfollowup->id_project = $id;
            $modelfollowup->id_user = Yii::app()->user->id;
            $modelfollowup->type = "followup";
            $modelfollowup->status = "SEUH";
            $modelfollowup->url_doc = CUploadedFile::getInstance($modelfollowup,'url_doc');
			if($modelfollowup->validate() == 1){
	            if(is_object($modelfollowup->url_doc)){
	            	$path = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/projects/'.$id;

	                if(!is_dir($path))
	                	mkdir($path, 0777, true);

	            	$url_doc = $path.'/'.date('Y-m-d_H-i').'Archivo.'.$modelfollowup->url_doc->getExtensionName();
					$modelfollowup->url_doc->saveAs($url_doc);
				    $modelfollowup->url_doc = $url_doc;
	            }
	            if($modelfollowup->save()){
					$followup = new ProjectsFollowups;
					$followup->id_project = $modelfollowup->id_project;
					$followup->id_user = Yii::app()->user->id;
					$followup->id_fucom = $modelfollowup->id;

					$followup->followup = "Seguimiento enviado a evaluación del Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.";
					$followup->type = "system";
					$followup->step_number = 1;

					if($followup->save()){
						echo CJSON::encode(array('status'=>'success','message'=>'Registro realizado con éxito','subMessage'=>'El seguimiento ha sido enviado para su evaluación.'));
						Yii::app()->end();
					}else{
						echo CJSON::encode(array('status'=>'failure'));
						Yii::app()->end();
					}

				}
	        }else{
				$error = CActiveForm::validate($modelfollowup);
				if($error!='[]')
					echo $error;
				Yii::app()->end();
	        }
        }
		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionFollowupToShow()
	{
		$id= $_POST["id"];
		$followupCurrent= ProjectsFollowups::model()->findByAttributes(array('id'=>$id));
		$date = date("d/m/Y", strtotime($followupCurrent->creation_date));
		$comments= ProjectsFollowups::model()->findAllByAttributes(array('id_fucom'=>$id,), array('order'=>'creation_date DESC'));
		$comment="";
		foreach ($comments as $key => $value) {
			$user = Users::model()->findByAttributes(array('id'=>$comments[$key]->id_user));
			$rol = Roles::model()->findByAttributes(array('id'=>$user->id_roles));

			$comment .= "<div clas='comentsrow'><h5>Comentario - ".$rol->alias."</h5>";
			$comment .= "<p>".$comments[$key]->url_doc != null ? CHtml::link('Ver archivo', Yii::app()->baseUrl.$comments[$key]->url_doc,array("target"=>"_blank")) : "</p>";
			$comment .= "<br><br>";

			$comment .= "<div class=''>".$comments[$key]->followup."</div>";

			$comment .= "</div> <hr>";

		}
		echo CJSON::encode(array('id'=>$followupCurrent->id,'id_project'=>$followupCurrent->id_project,'followup'=>$followupCurrent->followup, 'date'=>$date, 'comments'=>$comment));
		Yii::app()->end();

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
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProjectsFollowups']))
		{
			$model->attributes=$_POST['ProjectsFollowups'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
		$dataProvider=new CActiveDataProvider('ProjectsFollowups');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id)
	{
		$modelFollowup=new ProjectsFollowups();
		$idLast=Yii::app()->db->createCommand('SELECT MAX(id) AS id FROM projects_followups WHERE type="followup"')->queryRow();

		$followupCurrent= ProjectsFollowups::model()->findByAttributes(array('id'=>$idLast['id']));
		$followups= ProjectsFollowups::model()->findAllByAttributes(array('id_project'=>$id,'type'=>'followup'), array('order'=>'creation_date DESC'));

		$this->render('admin',array('modelFollowup'=>$modelFollowup,
									'followupCurrent'=>$followupCurrent,
									'followups'=>$followups,
									'idProject'=>$id));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProjectsFollowups the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProjectsFollowups::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='projects-followups-form-create')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


		public $followupRules = array(  "0"=>"seguimiento de proyectos.",
					 "1"=>array("userType"=>"DIVUH", 
					 	"message"=>array(
					 		"review"=>"Seguimiento revisado por la División de Investigacion de la Unidad Hospitalaria.",
					 		"accept"=>"",
					 		"reject"=>""
					 		), "actions"=>array("review",""), "type"=>"auto", "realSteps"=>array("6.24")),
 					 "2"=>array("userType"=>"SEUH", 
					 	"message"=>array(
					 		"accept"=>"Seguimiento enviado a evaluación de comité(s) asignado(s).",
					 		"reject"=>"Seguimiento devuelto al investigador para su corrección por parte del Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria."
					 		), "actions"=>array("accept","convokeComms"), "type"=>"manual", "realSteps"=>array("6.25")),
					 "3"=>array("userType"=>"COMITE", 
					 	"message"=>array(
					 		"accept"=>"Seguimiento enviado a evaluación del Subdirector General de Enseñanza e Investigación.",
					 		"reject"=>"Seguimiento devuelto al investigador para su corrección por parte del comité."
					 		), "actions"=>array("accept","reject"), "type"=>"manual", "realSteps"=>array("6.26","6.27","6.28")),
					 "4"=>array("userType"=>"SEUH", 
					 	"message"=>array(
					 		"accept"=>"Seguimiento enviado a evaluación de la División de Investigacion de la Unidad Hospitalaria.",
					 		"reject"=>""
					 		), "actions"=>array("accpet","addFile"), "type"=>"manual", "realSteps"=>array("6.29")),
				 	"5"=>array("userType"=>"DUH", 
					 	"message"=>array(
					 		"review"=>"Seguimiento revisado por el Director de Unidad Hospitalaria.",
					 		"accept"=>"",
					 		"reject"=>""
					 		), "actions"=>array("review",""), "type"=>"auto", "realSteps"=>array("6.30")),
					 "6"=>array("userType"=>"DIVUH", 
					 	"message"=>array(
					 		"accept"=>"Seguimiento aprobado.",
					 		"reject"=>""
					 		), "actions"=>array("accept","addFile"), "type"=>"manual", "realSteps"=>array("6.31")), );


	public function actionFollowupReview($id)
	{
		$model=$this->loadModel($id);
		$modelProject = Projects::model()->findByPk($model->id_project);
		$modelfollowup = new ProjectsFollowups;

		$conexion = Yii::app()->db;
		$lastfollowup = $conexion->createCommand("
		SELECT id, id_project, id_user, step_number
		FROM projects_followups
		WHERE type = 'system' && id_fucom = '".$model->id."' ORDER BY id DESC LIMIT 0,1")->queryAll()[0];
		$evaluationStep = (int)$lastfollowup["step_number"] + 1;

		$this->render('followupReview',array(
			'model'=>$model,'modelfollowup'=>$modelfollowup,'modelProject'=>$modelProject, 'followupRules' => $this->followupRules, 'evaluationStep'=>$evaluationStep
		));
	}

	public function actionSendReviewCommittee($id)
	{
		$conexion = Yii::app()->db;
		$projectId = $id;
		$actualStep = $_POST[1];
		$action = $_POST[2];
		$idFucom = $_POST[3];
		$userId = Yii::app()->user->id;
		//$userId = 16;

		$committeeCheck =ProjectsCommittee::model()->findAllByAttributes(array('id_project'=>$projectId,'id_user_reviewer'=>$userId));
		ProjectsCommittee::model()->updateByPk($committeeCheck[0]->id,array('status' => ($action == 'reject' ? 'rechazadoFW' : 'aprobadoFW')));

		$committeesCheck =ProjectsCommittee::model()->findAllByAttributes(array('id_project'=>$projectId,'status'=>'pendienteFW'));

			if(count($committeesCheck) > 0){
				$followup = new ProjectsFollowups;
				$followup->id_project = $projectId;
				$followup->id_user = Yii::app()->user->id;
				$followup->followup = "Seguimiento ".($action == "accept" ? "aprobado" : "no aprobado")." por miembro del comité.";
				$followup->type = "system";
				$followup->step_number = $actualStep-1;
				$followup->id_fucom = $idFucom;

			if($followup->save())
				echo CJSON::encode(array('status'=>'success','message'=>'Acción realizada con éxito','subMessage'=>'El seguimiento ha sido calificado satisfactoriamente, es necesario que todos los miembros del comité realicén la misma calificación para que el proyecto pase a una siguiente fase.'));

			}else{
				
				$checkDifferentStatus = $conexion->createCommand("SELECT DISTINCT status FROM projects_committee WHERE id_project = ".$projectId." AND status != 'pendeinteFW' ")->queryAll();
				if(count($checkDifferentStatus) == 1) //si solo no hay diferencias en los estatus
					$this->actionSendReview($idFucom, $actualStep, $action);
				else
					echo CJSON::encode(array('message'=>'1 Ocurrió un error.','subMessage'=>'Este seguimiento ya ha sido calificado.'));

				
			}
	}


//Envia a revisión o evaluación (no comites).
	//params: id del followup project.
	public function actionSendReview($id, $actualStepCom = 0, $actionCom = 0)
	{
		$conexion = Yii::app()->db;
		$followupId = $id;
		$modelProject = ProjectsFollowups::model()->findByPk($followupId)->id_project;

		if($actualStepCom != 0 && $actualStepCom != 0){
			$actualStep = $actualStepCom;
			$action = $actionCom;
		}else{
			$actualStep = $_POST[1];
			$action = $_POST[2];
		}



		if($action == "accept" && $actualStep < 6){
				$status = $this->followupRules[$actualStep+1]["userType"];
		}else if($action == "reject" && $actualStep < 6)
			$status = "MODIFICAR";
		else 
			$status = "APROBADO";

		$result = false;

		if($action != "review"){
			if($actualStep == 4)
				$status = "DIVUH";
			$result = ProjectsFollowups::model()->updateByPk($followupId,array('status' => $status));

		}else if($action == "review"){

			$followup = new ProjectsFollowups;
			$followup->id_project = $modelProject;
			$followup->id_user = Yii::app()->user->id;
			$followup->followup = $this->followupRules[$actualStep]["message"][$action];
			$followup->type = "system";
			$followup->id_fucom = $followupId;

			if($followup->save()){

	 			echo CJSON::encode(array('status'=>'success','message'=>'Acción realizada con éxito','subMessage'=>'El seguimiento ha sido revisado satisfactoriamente.'));
	 			Yii::app()->end();
			}

		}

		if($result == 1){
			$followup = new ProjectsFollowups;
			$followup->id_project = $modelProject;
			$followup->id_user = Yii::app()->user->id;
			$followup->followup = $this->followupRules[$actualStep]["message"][$action];
			$followup->type = "system";
			$followup->id_fucom = $followupId;



			if($action == "reject")
				$followup->step_number = $actualStep - 1; //restamos uno para que se quede donde mismo
			else{
				//echo $actualStep;

				/*	if($actualStep == 4)
						$followup->step_number = 6;*/
					 if($actualStep == 4)
						$followup->step_number = 5;
					else
						$followup->step_number = $actualStep;

			

			}



			if($followup->save()){
				if($actualStep == 2){
					$conexion->createCommand("UPDATE projects_committee SET status = 'pendienteFW' WHERE id_project = ".$modelProject)->execute();
				}
				$subMessage = 'El seguimiento ha sido enviado satisfactoriamente para su revisión o evaluación.';
				if($actualStep == 6 ) // added and, may be removed
					$subMessage = 'El seguimiento ha sido aprobado satisfactoriamente.';

	 			echo CJSON::encode(array('status'=>'success','message'=>'Acción realizada con éxito','subMessage'=>$subMessage));
			}
		}else{
			echo CJSON::encode(array('message'=>'2 Ocurrió un error.','subMessage'=>'Error al realizar la acción solicitada, por favor vuelva a intentar.'));
		}
		
	}














}
