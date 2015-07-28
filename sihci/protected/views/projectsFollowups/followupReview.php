<div class="cvtitle">
	<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
	<h1>Proyectos: revisión de seguimiento.</h1>
	<hr>
</div>
<br><br><br>
<?php

echo $modelProject->id." - ".$modelProject->title."<hr>";

echo $model->followup;
//var_dump($model);
$fileTypes = array( "4"=>"Documento de revisión","6"=>"el dictamen de aprobación");

	$userRol = Yii::app()->user->Rol->alias;
	$userId = Yii::app()->user->id;
	$redirectUrl = "projectsFollowups/followupReview/".(isset($_GET['id']) ? $_GET['id'] : 0);
		if($userRol == "COMBIO" || $userRol == "COMINV" || $userRol == "COMETI")
		$userRol = "COMITE";

//for($evaluationStep = 1; $evaluationStep <= 6; $evaluationStep++)  {


 	echo "<hr> <br><br><font color='red'>".$followupRules[$evaluationStep]['type']."</font> <b>Paso: ".$evaluationStep."</b> Rol: ".$followupRules[$evaluationStep]['userType']." Acciones: ".$followupRules[$evaluationStep]['actions'][0].", ".(isset($followupRules[$evaluationStep]['actions'][1]) ? $followupRules[$evaluationStep]['actions'][1] : "").", ".(isset($followupRules[$evaluationStep]['actions'][2]) ? $followupRules[$evaluationStep]['actions'][2] : "")."<br>";
 //	$userRol =$followupRules[$evaluationStep]['userType'];


		if($followupRules[$evaluationStep]["userType"] == $userRol && ($evaluationStep == 1 || $evaluationStep == 5)){
				echo "<div class='row' style='margin-left: 30px !important'>";
					echo " ".CHtml::htmlButton('REVISAR',array(
						'onclick'=>'javascript: send("","projectsFollowups/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "none", "'.$evaluationStep.',review");',
						'class'=>'savebuttonp','id'=>'acceptEvaButton','style'=>'display:block;'

					));
				echo "</div>";

		} 


		//convocar comites
 		if($followupRules[$evaluationStep]["userType"] ==  $userRol && $evaluationStep == 2){

				echo "<div class='row' style='margin-left: 25px !important'>";
					echo CHtml::htmlButton('No aprobar',array(
						'onclick'=>'javascript: send("","projectsFollowups/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "'.$redirectUrl.'", "'.$evaluationStep.',reject");',
						'class'=>'savebuttonp',
					));		
				echo "</div>";


							$conexion = Yii::app()->db;
			$checkForConvoke = $conexion->createCommand("
			SELECT COUNT(id) AS total FROM projects_followups WHERE id_user = ".$userId." AND id_fucom = ".$_GET['id']."
			AND id_project = ".$modelProject->id." AND  type = 'mandatoryFW' AND step_number = ".($evaluationStep-1))->queryAll()[0];
			if(isset($checkForConvoke["total"]) && $checkForConvoke["total"] > 0){
				echo "<div class='row' style='margin-left: 30px !important'>";
				echo " ".CHtml::htmlButton('Aprobar',array(
					'onclick'=>'javascript: send("","projectsFollowups/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "'.$redirectUrl.'", "'.$evaluationStep.',accept");',
					'class'=>'savebuttonp','id'=>'acceptEvaButton',
				));
				echo "</div>";
			}else{
				echo "<b>Para poder aprobar el Seguimiento es necesario que primero indique el lugar, fecha y hora para la reunión con los comités.</b>";
			}
				
		}

			//aprobacion por comites
 		if($followupRules[$evaluationStep]["userType"] ==  $userRol && $evaluationStep == 3){





			$commStatus = ProjectsCommittee::model()->findByAttributes(array("id_project"=>$modelProject->id,"id_user_reviewer"=>$userId));
			var_dump($commStatus);
			if(is_object($commStatus)){
				$commStatus = $commStatus->status;
				if($commStatus!="pendienteFW")
					echo "<br>Usted ya ha <b>".substr($commStatus,0,-2)."</b> este proyecto, puede cambiar su calificación en cualquier momento de la evaluación por parte del comité.<br><br>Tome en cuenta que para que el proyecto pueda continuar con la evaluación, la calificación de todos los miembros del comité asignado deben ser las misma.<br>";
				
				if($commStatus == "aprobadoFW" || $commStatus == "pendienteFW"){
					echo "<div class='row' style='margin-left: 25px !important'>";
						echo CHtml::htmlButton('No aprobar',array(
							'onclick'=>'javascript: send("","projectsFollowups/sendReviewCommittee", "'.$modelProject->id.'", "'.$redirectUrl.'", "'.$evaluationStep.',reject,'.(isset($_GET['id']) ? $_GET['id'] : 0).'");',
							'class'=>'savebuttonp',
						));		
					echo "</div>";
				}

				if($commStatus == "rechazadoFW" || $commStatus == "pendienteFW"){
					echo "<div class='row' style='margin-left: 30px !important'>";
					echo " ".CHtml::htmlButton('Aprobar',array(
						'onclick'=>'javascript: send("","projectsFollowups/sendReviewCommittee", "'.$modelProject->id.'", "'.$redirectUrl.'", "'.$evaluationStep.',accept,'.(isset($_GET['id']) ? $_GET['id'] : 0).'");',
						'class'=>'savebuttonp','id'=>'acceptEvaButton',
					));
					echo "</div>";
				}
			}
		}

			// REGLAS PARA LOS QUE SON OBLIGADOS A SUBIR ARCHIVO ANTES DE APROBAR
		if($followupRules[$evaluationStep]["userType"] == $userRol && ($evaluationStep == 4 || $evaluationStep == 6 )){ 
			$conexion = Yii::app()->db;
			$checkForDoc = $conexion->createCommand("
			SELECT COUNT(id) AS total FROM projects_followups WHERE id_user = ".$userId." 
			AND id_project = ".$modelProject->id." AND  type = 'mandatoryFW' AND step_number = ".($evaluationStep-1)." AND url_doc IS NOT NULL")->queryAll()[0];

			if(isset($checkForDoc["total"]) && $checkForDoc["total"] > 0){
				echo "<div class='row' style='margin-left: 30px !important'>";
					echo " ".CHtml::htmlButton('Aprobar',array(
						'onclick'=>'javascript: send("","projectsFollowups/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "'.$redirectUrl.'", "'.$evaluationStep.',accept");',
						'class'=>'savebuttonp','id'=>'acceptEvaButton',
					));
				echo "</div>";

			}else{
				echo "<b>Para poder aprobar el proyecto es necesario que primero adjunte en el formulario de comentarios ".$fileTypes[$evaluationStep]."</b>";
			}
		}




//}

?>






<div class="row">
<?php $this->renderPartial('../projectsReview/_form', array('model'=>$modelfollowup,'evaluationStepFW'=>$evaluationStep,'idProject' => $modelProject->id)); // modifed, added las param, may be removed ?>
</div>



<!--  COMENTARIOS -->
<div class="row">
<?php

$followups = projectsFollowups::model()->findAllByAttributes(array('id_fucom'=>$model->id));


foreach($followups AS $key => $value){
	//print_r($value);
	echo "<br>id_fucom: ".$value['id_fucom']." step: ".$value['step_number']." idProject: ".$value['id_project']." status: ".$value['status']." type: ".$value['type'];
	$user = Users::model()->findByPk($value->id_user);
	//var_dump();
	echo '<p>'.$user->persons[0]->names.' '.$user->persons[0]->last_name1.' '.$user->persons[0]->last_name2.' ('.$user->email.') escribió: <br>';
	echo $value['followup'].'<br>';
	echo '<small>Creado el '.$value['creation_date'].' '.(empty($value['url_doc']) ? "" : "<a href=../../".$value['url_doc'].">Ver archivo disponible</a>" ).'</small><hr></p>';

}

?>
</div>