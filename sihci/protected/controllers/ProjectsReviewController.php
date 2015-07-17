<?php

class ProjectsReviewController extends Controller
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
				'actions'=>array('create','update','admin','sendReviewCommittee','sponsoredAdmin','acceptSponsorship','rejectSponsorship','review','sendReview','setRegNumber','assignCommittees','setFolioNumber'),
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

	public function actionAdmin()
	{
		$model=new Projects('search');


		$this->render('admin',array(
			'model'=>$model, 'pendingProjects'=>$this->projectsToReview()
		));
	}

	public $sponsoredRules = array(  "0"=>"Proyecto patrocinado",
					 "1"=>array("userType"=>"DIVUH", "message"=>array("accept"=>"Proyecto enviado a asignación de folio, comités y evaluación del Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.","reject"=>"Proyecto devuelto al investigador para su corrección por parte de la División de Investigacion de la Unidad Hospitalaria."),"actions"=>array("accept","reject"), "type"=>"manual", "realSteps"=>array("6.06","6.07","6.08")),
					 "2"=>array("userType"=>"SEUH", "message"=>array("review"=>"","reject"=>"","accept"=>"Proyecto enviado a evaluación del comité(s) asignado."),"actions"=>array("accept","addcomms","addfolio"), "type"=>"manual", "realSteps"=>array("6.09")),
					 "3"=>array("userType"=>"COMITE", "message"=>array("accept"=>"Proyecto enviado a evaluación del Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.","reject"=>"Proyecto devuelto al investigador para su corrección por parte del comité."),"actions"=>array("accept","reject","addFile"), "type"=>"manual", "realSteps"=>array("6.10","6.11","6.12","6.13")),
				 	 "4"=>array("userType"=>"SEUH", "message"=>array("review"=>"","reject"=>"","accept"=>"Proyecto enviado a evaluación del Subdirector General de Enseñanza e Investigación."),"actions"=>array("accept","addFile"), "type"=>"manual", "realSteps"=>array("6.14")),
				 "5"=>array("userType"=>"DUH", "message"=>array("accept"=>"","reject"=>"","review"=>"Proyecto revisado por DUH"),"actions"=>array("review"), "type"=>"auto", "realSteps"=>array("6.15")),
				 	 "6"=>array("userType"=>"SGEI", "message"=>array("review"=>"","reject"=>"","accept"=>"Proyecto enviado a evaluación de la División de Investigacion de la Unidad Hospitalaria."),"actions"=>array("accept","addregistration"), "type"=>"manual", "realSteps"=>array("6.16")),
				 "7"=>array("userType"=>"DG", "message"=>array("accept"=>"","reject"=>"","review"=>"Proyecto revisado por SGEI"),"actions"=>array("review"), "type"=>"auto", "realSteps"=>array("6.17")),
			 	 "8"=>array("userType"=>"DUH", "message"=>array("accept"=>"","reject"=>"","review"=>"Proyecto revisado por DUH"),"actions"=>array("review"), "type"=>"auto", "realSteps"=>array("6.18")),
				 "9"=>array("userType"=>"SEUH", "message"=>array("accept"=>"","reject"=>"","review"=>"Proyecto revisado por SEUH"),"actions"=>array("review"), "type"=>"auto", "realSteps"=>array("6.19")),
					"10"=>array("userType"=>"DIVUH", "message"=>array("review"=>"","reject"=>"","accept"=>"Proyecto enviado a evaluación del comité(s) asignado."),"actions"=>array("accept"), "type"=>"manual", "realSteps"=>array("6.20")),
					"11"=>array("userType"=>"COMITE", "message"=>array("review"=>"","reject"=>"","accept"=>"Proyecto enviado a evaluación de la División de Investigacion de la Unidad Hospitalaria"),"actions"=>array("accept"), "type"=>"manual", "realSteps"=>array("6.21")),
					"12"=>array("userType"=>"DIVUH", "message"=>array("review"=>"","reject"=>"","accept"=>"Proyecto Dictaminado."),"actions"=>array("accept","addFile"), "type"=>"manual", "realSteps"=>array("6.22")),
				);               
/*
	public $noSponsoredRules = array(  "0"=>"Proyecto no patrocinado",
					 "1"=>array("userType"=>"DIVUH", "actions"=>array("accept","reject"), "type"=>"manual", "realSteps"=>array("6.03","6.04","6.05")),
					 "2"=>array("userType"=>"SEUH", "actions"=>array("accept"), "type"=>"manual", "realSteps"=>array("6.06")),
					 "3"=>array("userType"=>"COMITE", "actions"=>array("accept","reject"), "type"=>"manual", "realSteps"=>array("6.07","6.08","6.09")),
					 "4"=>array("userType"=>"DIVUH", "actions"=>array("accept"), "type"=>"manual", "realSteps"=>array("6.1")),
				"5"=>array("userType"=>"SEUH", "actions"=>array("review"), "type"=>"auto", "realSteps"=>array("6.11")),
				"6"=>array("userType"=>"DUH", "actions"=>array("review"), "type"=>"auto", "realSteps"=>array("6.12")),
					 "7"=>array("userType"=>"SGEI", "actions"=>array("accept"), "type"=>"manual", "realSteps"=>array("6.13","6.14")),
				 "8"=>array("userType"=>"DG", "actions"=>array("review"), "type"=>"auto", "realSteps"=>array("6.15")),
				 "9"=>array("userType"=>"DUH", "actions"=>array("review"), "type"=>"auto", "realSteps"=>array("6.16")),
				"10"=>array("userType"=>"SEUH", "actions"=>array("review"), "type"=>"auto", "realSteps"=>array("6.17")),
					"11"=>array("userType"=>"DIVUH", "actions"=>array("accept"), "type"=>"manual", "realSteps"=>array("6.18")),
					"12"=>array("userType"=>"COMITE", "actions"=>array("accept"), "type"=>"manual", "realSteps"=>array("6.19")),
					"13"=>array("userType"=>"SEUH", "actions"=>array("accept"), "type"=>"manual", "realSteps"=>array("6.2")),
				"14"=>array("userType"=>"DIVUH", "actions"=>array("review"), "type"=>"auto", "realSteps"=>array("6.21")),
	);
*/
	public function actionIndex()
	{
		$this->actionAdmin();
	}

	// RETORNA EL MENU CON LOS PROYECTOS PENDIENTES A REVISAR POR CADA USUARIO
	private function projectsToReview(){
		$rol = Yii::app()->user->Rol->alias;

		$condition = "WHERE p.status = '".$rol."'";

		if($rol == "COMINV" || $rol == "COMBIO" || $rol == "COMETI")
			$condition = "WHERE p.status = 'COMITE'";

		$conection = Yii::app()->db;
		$pProjects = $conection->createCommand("SELECT p.is_sponsored, p.id, p.title, pf.creation_date FROM projects AS p LEFT JOIN projects_followups AS pf ON pf.id_project = p.id ".$condition." GROUP BY p.title")->queryAll();

		$pendingProjects ="";

		foreach($pProjects AS $key => $value){
			$element ="";
			$element .= '<div class="projectRow" style="width:97%;border:0px solid black; margin:5px;font-size:.85em;">';
			$element .= '<div class = "projectTitle" >'.$value["title"].'</div>';
			$element .= '<div class = "projectDetails" style="border-bottom:1px solid #333;font-size:.9em;">'.$value["is_sponsored"].' - '.$value["creation_date"].'</div>';
			$element .= '</div>';
			$pendingProjects .= CHtml::link($element,array('projectsReview/review','id'=>$value["id"]));

		}
		return $pendingProjects;
	}

	// RENDERE LA VISTA DEL PROYECTO A REVISAR //RECIBE COMO PARAMETRO ID DE PROYECTO
	public function actionReview($id)
	{
		$modelfollowup = new ProjectsFollowups;
		$followups = ProjectsFollowups::model()->findAllByAttributes(array('id_project'=>$id),array('order'=>'id DESC'));
		$model = $this->loadModel($id);

		if($model->is_sponsored == 0)
			$evaluationRules = $this->noSponsoredRules;
		else
			$evaluationRules = $this->sponsoredRules;


		$conexion = Yii::app()->db;
		$lastfollowup = $conexion->createCommand("
		SELECT id, id_project, id_user, step_number
		FROM projects_followups
		WHERE type = 'system' && id_project = '".$model->id."' ORDER BY id DESC LIMIT 0,1")->queryAll()[0];

		$evaluationStep = (int)$lastfollowup["step_number"] + 1;

        if(isset($_POST['ProjectsFollowups']))
        {

			$modelfollowup->unsetAttributes();
            $modelfollowup->attributes=$_POST['ProjectsFollowups'];

            $modelfollowup->type="comment";
            $modelfollowup->id_project = $id;
            $modelfollowup->id_user = Yii::app()->user->id;
            if(isset($_POST[1]))
	            if($_POST[1] != "mandatory") // si existe este indice en los extras significa que es un comentario(followup) de un seguimiento(followup)
	            	$modelfollowup->id_fucom = $_POST[1];
	            else{
	            	$modelfollowup->followup = "se adjunta documento";
	            	$modelfollowup->type="mandatory";
	            	$modelfollowup->step_number = $_POST[2];
	            }

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
	     			echo CJSON::encode(array('status'=>'success'));
	     			Yii::app()->end();
				}
	        }else{
				$error = CActiveForm::validate($modelfollowup);
				if($error!='[]')
					echo $error;
				Yii::app()->end();
	        }
        }

		$this->render('review',array(
			'model'=>$this->loadModel($id),'evaluationRules'=>$evaluationRules,'evaluationStep'=>$evaluationStep,'pendingProjects'=>$this->projectsToReview(),'modelfollowup'=>$modelfollowup,'followups'=>$followups,//'modelproject'=>$modelproject,
		));
	}


	//Envia a revisión o evaluación (SOLO COMITÉS).
	//params: id del projecto.
	public function actionSendReviewCommittee($id)
	{
		$conexion = Yii::app()->db;
		$projectId = $id;
		$actualStep = $_POST[1];
		$action = $_POST[2];
		$userId = Yii::app()->user->id;
		//$userId = 16;

		$committeeCheck =ProjectsCommittee::model()->findAllByAttributes(array('id_project'=>$projectId,'id_user_reviewer'=>$userId,'status'=>'pendiente'));
		ProjectsCommittee::model()->updateByPk($committeeCheck[0]->id,array('status' => ($action == 'reject' ? 'rechazado' : 'aprobado')));
		$committeesCheck =ProjectsCommittee::model()->findAllByAttributes(array('id_project'=>$projectId,'status'=>'pendiente'));

			if(count($committeesCheck) > 0){
				$followup = new ProjectsFollowups;
				$followup->id_project = $projectId;
				$followup->id_user = Yii::app()->user->id;
				$followup->followup = "Proyecto aprobado por miembro del comité.";
				$followup->type = "system";
				//$followup->step_number = $actualStep;

			if($followup->save())
				echo CJSON::encode(array('status'=>'success','message'=>'Acción realizada con éxito','subMessage'=>'El proyecto ha sido calificado satisfactoriamente, es necesario que todos los miembros del comité realicén la misma calificación para que el proyecto pase a una siguiente fase.'));

			}else{
				
				$checkDifferentStatus = $conexion->createCommand("SELECT DISTINCT status FROM projects_committee WHERE id_project = ".$projectId." AND status != 'pendeinte' ")->queryAll();
				if(count($checkDifferentStatus) == 1) //si solo no hay diferencias en los estatus
					$this->actionSendReview($projectId, $actualStep, $action);
				else
					echo CJSON::encode(array('message'=>'1 Ocurrió un error.','subMessage'=>'Este proyecto ya ha sido calificado.'));

				
			}
	}
	
	//Envia a revisión o evaluación (no comites).
	//params: id del projecto.
	public function actionSendReview($id, $actualStepCom = 0, $actionCom = 0)
	{
		$conexion = Yii::app()->db;
		$projectId = $id;

		if($actualStepCom != 0 && $actualStepCom != 0){
			$actualStep = $actualStepCom;
			$action = $actionCom;
		}else{
			$actualStep = $_POST[1];
			$action = $_POST[2];
		}

		if($this->loadModel($projectId)->is_sponsored == 0)
			$evaluationRules = $this->noSponsoredRules;
		else
			$evaluationRules = $this->sponsoredRules;

		if($action == "accept")
			$status = $evaluationRules[$actualStep+1]["userType"];
		else if($action == "reject")
			$status = "MODIFICAR";

		$result = false;

		if($action != "review"){
			$result = Projects::model()->updateByPk($projectId,array('status' => $status));
		}else if($action == "review"){

			$followup = new ProjectsFollowups;
			$followup->id_project = $projectId;
			$followup->id_user = Yii::app()->user->id;
			$followup->followup = $evaluationRules[$actualStep]["message"][$action];
			$followup->type = "system";
			$followup->step_number = $actualStep;

			if($followup->save())
	 			echo CJSON::encode(array('status'=>'success','message'=>'Acción realizada con éxito','subMessage'=>'El proyecto ha sido revisado satisfactoriamente.'));
		}

		if($result == 1){
			$followup = new ProjectsFollowups;
			$followup->id_project = $projectId;
			$followup->id_user = Yii::app()->user->id;
			$followup->followup = $evaluationRules[$actualStep]["message"][$action];
			$followup->type = "system";
			$followup->step_number = $actualStep;

			if($action == "reject")
				$followup->step_number = $actualStep - 1; //restamos uno para que se quede donde mismo
			else
				$followup->step_number = $actualStep;

			if($followup->save())
	 			echo CJSON::encode(array('status'=>'success','message'=>'Acción realizada con éxito','subMessage'=>'El proyecto ha sido enviado satisfactoriamente para su revisión o evaluación.'));

		}else{
			echo CJSON::encode(array('message'=>'2 Ocurrió un error.','subMessage'=>'Error al realizar la acción solicitada, por favor vuelva a intentar.'));
		}
		
	}



public function actionSetFolioNumber()
	{

            if(Projects::model()->updateByPk($_POST[1],array('folio'=>$_POST["Projects"]["folio"])))
     			echo CJSON::encode(array('status'=>'success','message'=>'Número de folio asignado con éxito.','subMessage'=>'A continuación seleccione los comités que evaluarán el proyecto.'));
	        else
 				echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'No se pudo asignar el número de folio, por favor vuelva a intentarlo.'));
	        
        Yii::app()->end();

	}

	public function actionSetRegNumber()
	{

            if(Projects::model()->updateByPk($_POST[1],array('registration_number'=>$_POST["Projects"]["registration_number"])))
     			echo CJSON::encode(array('status'=>'success','message'=>'Número de registro asignado con éxito.','subMessage'=>'A continuación seleccione los comités que evaluarán el proyecto.'));
	        else
 				echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'No se pudo asignar el número de registro, por favor vuelva a intentarlo.'));
	        
        Yii::app()->end();

	}

	// V A L I D O
	public function actionAssignCommittees()
	{
		
		if(isset($_POST['designate']))
		{
			$idProject = $_POST[1];
			$conexion = Yii::app()->db;
			$savedPC = 0;

			if(isset($_POST['designate']['COMINV'])){
					$comms = $conexion->createCommand("SELECT u.id FROM users AS u JOIN roles AS r on u.id_roles=r.id  WHERE r.alias = 'COMINV'")->queryAll();
					foreach($comms as $key => $value){
						$procom = new ProjectsCommittee;
						$procom->id_project = $idProject;
						$procom->committee = "COMINV";
						$procom->id_user_designator = Yii::app()->user->id;
						$procom->id_user_reviewer = $value["id"];
						if($procom->save()){
							$savedPC++;
						}
						unset($procom);
					}
			}

			if(isset($_POST['designate']['COMBIO'])){
					$comms = $conexion->createCommand("SELECT u.id FROM users AS u JOIN roles AS r on u.id_roles=r.id  WHERE r.alias = 'COMBIO'")->queryAll();
					foreach($comms as $key => $value){
						$procom = new ProjectsCommittee;
						$procom->id_project = $idProject;
						$procom->committee = "COMBIO";
						$procom->id_user_designator = Yii::app()->user->id;
						$procom->id_user_reviewer = $value["id"];
						if($procom->save()){
							$savedPC++;
						}
						unset($procom);
					}
			}



			if(isset($_POST['designate']['COMETI'])){
					$comms = $conexion->createCommand("SELECT u.id FROM users AS u JOIN roles AS r on u.id_roles=r.id  WHERE r.alias = 'COMETI'")->queryAll();
					foreach($comms as $key => $value){
						$procom = new ProjectsCommittee;
						$procom->id_project = $idProject;
						$procom->committee = "COMETI";
						$procom->id_user_designator = Yii::app()->user->id;
						$procom->id_user_reviewer = $value["id"];
						if($procom->save()){
							$savedPC++;
						}
						unset($procom);
					}
			}

			if($savedPC > 0){
				echo CJSON::encode(array('status'=>'success','message'=>'Comités asignados con éxito','subMessage'=>'Los comités han sido asignados satisfactoriamente ahora puede enviar el proyecto para su evaluación.'));
			}else{
				echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'2Necesita asignar mínimo un comité para la evaluación de este proyecto.'));
			}

		}else{
			echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Necesita asignar mínimo un comité para la evaluación de este proyecto.'));
		}

		Yii::app()->end();
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
