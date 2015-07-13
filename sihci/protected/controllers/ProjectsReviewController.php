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
				'actions'=>array('create','update','admin','sponsoredAdmin','acceptSponsorship','rejectSponsorship','review','sendReview','setRegNumber','assignCommittees','setFolioNumber'),
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

	private $messages = array(
			"SEUH"=>"Proyecto enviado a asignación de folio por el Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.",
			"COMITE"=>"Proyecto enviado a evaluación de los siguientes comités: ",
			"SEUH2"=>"Proyecto enviado a evaluación de el Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.",

			"COMINV,COMETI,COMBIO"=>"Proyecto enviado a evaluación de el Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.",
			"COMINV,COMETI"=>"Proyecto enviado a evaluación de el Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.",
			"COMETI,COMBIO"=>"Proyecto enviado a evaluación de el Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.",
			"COMINV,COMBIO"=>"Proyecto enviado a evaluación de el Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.",
			"COMINV"=>"Proyecto enviado a evaluación de el Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.",
			"COMETI"=>"Proyecto enviado a evaluación de el Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.",
			"COMBIO"=>"Proyecto enviado a evaluación de el Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.",


			"SGEI"=>"Proyecto enviado a evaluación del Subdirector General de Enseñanza e Investigación. Notificación enviada al Director de Unidad Hospitalaria.",
			"DIVUH2"=>"Proyecto enviado a dictaminación por la División de Investigacion de la Unidad Hospitalaria. Notificación enviada a: Director General, Director de División Hospitalaria y al Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria.",
			"COMITE2"=>"Proyecto enviado a firma de dictamen por comités.",
			"DICTAMINADO"=>"Proyecto dictaminado como xx. Notificación enviada a la División de Investigacion de la Unidad Hospitalaria.",
			"rejectDIVUH"=>"Proyecto devuelto por la División de Investigacion de la Unidad Hospitalaria al investigador para su corrección o modificación.",
			"rejectCOMBIO"=>"Proyecto devuelto por el comité al investigador para su corrección o modificación. Notificación enviada a la División de Investigacion de la Unidad Hospitalaria y al Subdirector de Enseñanza e Investigación de la Unidad Hospitalaria.",
			"rejectCOMETI"=>"Proyecto devuelto por el comité al investigador para su corrección o modificación. Notificación enviada a la División de Investigacion de la Unidad Hospitalaria y al Subdirector de Enseñanza e Investigación de la Unidad Hospitalaria.",
			"rejectCOMINV"=>"Proyecto devuelto por el comité al investigador para su corrección o modificación. Notificación enviada a la División de Investigacion de la Unidad Hospitalaria y al Subdirector de Enseñanza e Investigación de la Unidad Hospitalaria.",

		);

	private function nextReview($actualStatus, $idProject){
		$status = "nulo";

		switch($actualStatus){
			case "rejectDIVUH":case "rejectCOMBIO":case "rejectCOMETI":case "rejectCOMINV": $status = "MODIFICAR"; break;
			case "DIVUH": $status = "SEUH"; break;
			case "SEUH": $status = "COMITE"; break; // ASIGNA NÚMERO DE FOLIO
			case "COMINV,COMETI,COMBIO": case "COMINV,COMETI": case "COMETI,COMBIO": case "COMINV,COMBIO": case "COMETI":case "COMINV": case "COMBIO": $status = "SEUH2"; break; // para pasar a seuh2 deben todos los comites asignados(uh) haber dicho "SI"
			case "SEUH2": $status = "SGEI"; break; // ALERTA A DUH
			case "SGEI": $status = "DIVUH2"; break; // ALERTA A DG, DUH, SEUH //DICTAMINACION
			case "DIVUH2": $status = "COMITE2"; break; // para pasar a dictaminado deben todos los comites asignados(uh) haber dicho "SI"
			case "COMITE2": $status = "DICTAMINADO"; break; // ALERTA DIVUH //REVISION DE FIRMAS POR DIVUH  ///aprobado o no aprobado
		}
		//echo $status;
		return $status;
	}

	private function projectsToReview(){
		//$id_role = Users::model()->findByPk(Yii::app()->user->id)->Rol->id;
		//$role = Roles::model()->findByPk($id_role)->alias;

		$rol = Yii::app()->user->Rol->alias;

		$condition = "WHERE p.status = '".$rol."'";

		if($rol == "COMINV" || $rol == "COMBIO" || $rol == "COMETI")
			$condition = "WHERE p.status LIKE '%".$rol."%'";

		$conection = Yii::app()->db;
		$pProjects = $conection->createCommand("SELECT p.is_sponsored, p.id, p.title, pf.creation_date FROM projects AS p LEFT JOIN projects_followups AS pf ON pf.id_project = p.id ".$condition." GROUP BY p.title")->queryAll();

		//$pProjects = Projects::model()->findAllByAttributes(array("status"=>$role));
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


	public function actionAdmin()
	{
		$model=new Projects('search');


		$this->render('admin',array(
			'model'=>$model, 'pendingProjects'=>$this->projectsToReview()
		));
	}

		/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->actionAdmin();
	}

		/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionReview($id)
	{
		$modelfollowup = new ProjectsFollowups;
		$followups = ProjectsFollowups::model()->findAllByAttributes(array('id_project'=>$id),array('order'=>'id DESC'));
		//$modelproject = Projects::model()->findByPk($id);

        if(isset($_POST['ProjectsFollowups']))
        {

			$modelfollowup->unsetAttributes();
            $modelfollowup->attributes=$_POST['ProjectsFollowups'];
            $modelfollowup->id_project = $id;
            $modelfollowup->id_user = Yii::app()->user->id;
            if(isset($_POST[1])) // si existe este indice en los extras significa que es un comentario(followup) de un seguimiento(followup)
            	$modelfollowup->id_fucom = $_POST[1];

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
			'model'=>$this->loadModel($id),'pendingProjects'=>$this->projectsToReview(),'modelfollowup'=>$modelfollowup,'followups'=>$followups,//'modelproject'=>$modelproject,
		));
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





	//Envia a revisión o evaluación.
	//params: id del projecto.
	public function actionSendReview($id)
	{
		//$res = Projects::model()->updateByPk($id,array('status'=>'asdfasdfasdf cabron que sss'));


		$conexion = Yii::app()->db;

		$nextReview = $this->nextReview($_POST[1], $id);

		$projectReal = Projects::model()->findByPk($id);




		//if(substr(Yii::app()->user->Rol->alias,0,3) == "COM"){
			//check for projects committees
			$comms1Check =ProjectsCommittee::model()->findAllByAttributes(array('id_project'=>$id,'id_user_reviewer'=>Yii::app()->user->id,'status'=>'pendiente'));
			//$comms1Check = CHtml::listData($comms1Check, 'id_user_reviewer', 'status');
			//var_dump($comms1Check);
			if(count($comms1Check) >0)
				ProjectsCommittee::model()->updateByPk($comms1Check[0]->id,array('status' => 'aprobado'));


			//volvemos a preguntar
			$comms2Check =ProjectsCommittee::model()->findAllByAttributes(array('id_project'=>$id,'status'=>'pendiente'));
				// si es mayor a 0 significa que el usuario no ha aprovado
			if(count($comms2Check) == 0){
						$commsCheck = $conexion->createCommand("
						SELECT DISTINCT pc.committee
						FROM projects_committee AS pc
						WHERE pc.id_project = '".$id."'")->queryAll();
						//CONVERT TO SIMPLE ARRAY
						$commsARRAYCheck = CHtml::listData($commsCheck, 'committee', 'committee');
						//var_dump($commsARRAYCheck);

						if(Yii::app()->user->Rol->alias == "SEUH" && $projectReal->status == "SEUH2"){
							$reasignationComms = $conexion->createCommand("UPDATE projects_committee SET status = 'pendiente' WHERE id_project =".$id)->execute();
							$nextReview .= (array_key_exists('COMINV',$commsARRAYCheck) ? "COMINV," : "").(array_key_exists('COMETI',$commsARRAYCheck) ? "COMETI," : "").(array_key_exists('COMBIO',$commsARRAYCheck) ? "COMBIO" : "");
						}
				// cambiar el eestatus de next review
		if($nextReview == "COMITE")
 			$nextReview .= (array_key_exists('COMINV',$commsARRAYCheck) ? "COMINV," : "").(array_key_exists('COMETI',$commsARRAYCheck) ? "COMETI," : "").(array_key_exists('COMBIO',$commsARRAYCheck) ? "COMBIO" : "");


echo "estamos aqui";
		$res = $conexion->createCommand("UPDATE projects SET status = '".$nextReview."' WHERE id =".$id)->execute();
		//	echo $res;
			if( $res == 1){
					$followup = new ProjectsFollowups;
					$followup->id_project = $id;
					$followup->id_user = Yii::app()->user->id;


					//$conexion = Yii::app()->db;
/*					$commsCheck = $conexion->createCommand("
					SELECT DISTINCT pc.committee
					FROM projects_committee AS pc
					WHERE pc.id_project = '".$id."'")->queryAll();*/

				  	$commsCheck = CHtml::listData($commsCheck, 'committee', 'committee');

					if($nextReview == 'MODIFICAR')
						$followup->followup = $this->messages[$_POST[1]];
					else if(Yii::app()->user->Rol->alias == "SEUH")
						$followup->followup = "Proyecto enviado a revisión por los siguientes comités:<br>".(array_key_exists('COMINV',$commsCheck) ? "Comité de Investigación.<br>" : "").(array_key_exists('COMETI',$commsCheck) ? "Comité de Ética en Investigación.<br>" : "").(array_key_exists('COMBIO',$commsCheck) ? "Comité de Bioseguridad." : "");
					else
						$followup->followup = $this->messages[$nextReview];
					//echo $followup->followup;

					$followup->type = "comment";

					if($followup->save())
		     			echo CJSON::encode(array('status'=>'success','message'=>'Acción realizada con éxito','subMessage'=>'El proyecto ha sido enviado satisfactoriamente para su revisión o evaluación.'));
			}else
					echo CJSON::encode(array('message'=>'Ocurrió un error.11','subMessage'=>'Error al realizar la acción solicitada, por favor vuelva a intentar.'));


			}else{
					$commsCheck = $conexion->createCommand("
					SELECT DISTINCT pc.committee
					FROM projects_committee AS pc
					WHERE pc.id_project = '".$id."'")->queryAll();

				  	$commsCheck = CHtml::listData($commsCheck, 'committee', 'committee');

				if(substr(Yii::app()->user->Rol->alias,0,3) != "COM"){

					$nextReview = (array_key_exists('COMINV',$commsCheck) ? "COMINV," : "").(array_key_exists('COMETI',$commsCheck) ? "COMETI," : "").(array_key_exists('COMBIO',$commsCheck) ? "COMBIO" : "");
						$res = $conexion->createCommand("UPDATE projects SET status = '".$nextReview."' WHERE id =".$id)->execute();




				}


					$followup = new ProjectsFollowups;
					//$conexion = Yii::app()->db;


					if($nextReview == 'MODIFICAR')
						$followup->followup = $this->messages[$_POST[1]];
					else if(Yii::app()->user->Rol->alias == "SEUH")
						$followup->followup = "Proyecto enviado a revisión por los siguientes comités:<br>".(array_key_exists('COMINV',$commsCheck) ? "Comité de Investigación.<br>" : "").(array_key_exists('COMETI',$commsCheck) ? "Comité de Ética en Investigación.<br>" : "").(array_key_exists('COMBIO',$commsCheck) ? "Comité de Bioseguridad." : ""); //$followup->followup = $this->messages[$nextReview]."<br>".(array_key_exists('COMINV',$commsCheck) ? "Comité de Investigación.<br>" : "").(array_key_exists('COMETI',$commsCheck) ? "Comité de Ética en Investigación.<br>" : "").(array_key_exists('COMBIO',$commsCheck) ? "Comité de Bioseguridad." : "");
					else
						$followup->followup = $this->messages[$nextReview];



					$followup->id_project = $id;
					$followup->id_user = Yii::app()->user->id;
					//$followup->followup = $this->messages[$nextReview];
					$followup->type = "comment";
				if($followup->save())
		     			echo CJSON::encode(array('status'=>'success','message'=>'Acción realizada con éxito22','subMessage'=>'El proyecto ha sido enviado satisfactoriamente para su revisión o evaluación.'));
			}

		//}
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
