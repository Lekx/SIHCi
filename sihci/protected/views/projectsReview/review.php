<style type="text/css">
	label{
		width:100%;
	}
	.commWrapper{
		width:100%;
		position: relative;
		overflow: hidden;
		padding:0 !important;
		margin:0 !important;
	}
	.commWrapper .row{
		margin:5px !important;
	}

	.comm{
		width:270px;
		float:left;
		border:1px solid #ddd;
		padding:5px;
		padding-left:15px;
		margin:5px;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){

		$("#projectsMenu").appendTo($(".sysmenu"));

	});

</script>


<div id="projectsMenu">
	<?php echo $pendingProjects; ?>
</div>

<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
            <h1>Proyectos</h1>
            <hr>
        </div>

<h3>Revisión de proyecto.</h3>

<section class="projects1 sactive">
<?php $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
'attributes'=>array(
	'title',
	'discipline',
	'research_type',

),
)); ?>
</section>
<section class="projects2">
	<?php

/*

			$users = Users::model()->findByPk(Curriculum::model()->findByAttributes(array('id_user'=>$model->id_curriculum))->id_user);
		//	var_dump($users);
		$persons = $users->persons[0]; //Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
			$emailUsers = $users->email;//Users::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		//	$phoneUsers = $users->persons[0]->phones[0];//Phones::model()->findByAttributes(array('id_person'=>$persons->id,'is_primary'=>1));
			$curriculum = $users->curriculums;//Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
			$gradesUsers = $users->curriculums[0]->grades[0];//Grades::model()->findByAttributes(array('id_curriculum'=>$curriculum->id));
			$jobsUsers = $curriculum[0]->jobs[0];//Jobs::model()->findByAttributes(array('id_curriculum'=>$curriculum->id));



		$this->widget('zii.widgets.CDetailView', array(
		'data'=>$persons,
		'attributes'=>array(

			array(
				'label'=>'Nombre(s):',
				'value'=>$persons->names,
				),
			array(
				'label'=>'Apellido Paterno:',
				'value'=>$persons->last_name1,
				),
			array(
				'label'=>'Apellido Materno:',
				'value'=>$persons->last_name2,
				),
			array(
				'label'=>'Sexo:',
				'value'=>$persons->genre,
				),
		array(
				'label'=>'Correo Electrónico:',
				'value'=>$emailUsers,
				),
		/*	array(
				'label'=>'Teléfono:',
				'value'=>$phoneUsers != null ? $phoneUsers->phone_number.' Ext '.$phoneUsers->extension : " ",
			),
			array(
				'label'=>'Unidad hospitalaria:',
				'value'=>$jobsUsers != null ? $jobsUsers->hospital_unit : " ",
				),
			array(
					'label'=>'Máximo grado de estudios:',
					'value'=>$gradesUsers != null ? $gradesUsers->grade : " " ,
					),

			array(
				'label'=>'¿Pertenece al SNI?',
				'value'=>$curriculum != null ? $curriculum[0]->SNI :
				$curriculum[0]->SNI > 0 ? "Si, Número SNI: ".$curriculum[0]->SNI : "No Perteneciente",
				),
		),
	));
*/
	?>

</section>
<section class="projects3">
	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'priority_topic',
		'sub_topic',
		'justify',
		array(
				'label'=>'¿Es SNI?',
				'value'=>$model->is_sni !== 1 ? "No asignado" : $model->is_sni,
			),

	),
	)); ?>
</section>
<section class="projects4">
	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'develop_uh',
		'colaboration_type',
		'status',
		array(
			'label'=>'Folio',
			'value'=>$model->folio == -1 ? "No asignado" : $model->folio,
			),
		array(
				'label'=>'¿Patrocinado?',
				'value'=>$model->is_sponsored == 1 ? "Si" : "No",
				),
				array(
						'label'=>'Número de registro',
						'value'=>$model->registration_number == -1 ? "No asignado" : $model->folio,
					),

	),
	)); ?>


</section>
<section class="projects5">
	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'adtl_caracteristics_a',
		'adtl_caracteristics_b',
		'adtl_caracteristics_c',
		'adtl_caracteristics_d',
		'adtl_caracteristics_e',
		'adtl_caracteristics_f',
		'adtl_caracteristics_g',

	),
	)); ?>

</section>
<div class="row">
	<div class="paggersection">
		<ul class="backPro"><i class="fa fa-arrow-left"></i><ul>
		<li class="page1 active">1</li>
		<li class="page2">2</li>
		<li class="page3">3</li>
		<li class="page4">4</li>
		<li class="page5">5</li>
		<ul class="nextPro"><i class="fa fa-arrow-right"></i><ul>
	</div>
</div>


































<?php

	$userRol = Yii::app()->user->Rol->alias;
	$userId = Yii::app()->user->id;
	echo $evaluationStep;

	echo $evaluationRules[$evaluationStep]["userType"];

/* EL STEP DEL PROYECTO EN PROJECT FOLLOWUPS DEBE INICIAR EN CERO */
/* AGREGAMOS  UNO  PARA  SABER  EL  ESTADO  ACTUAL */
//$step = 2;
//$userRol = "DIVUH";
/*
$roles = array("DIVUH", "SEUH", "COMITE", "COMBIO", "COMINV", "DUH", "SGEI", "DG", "JUR");
for($evaluationStep = 1; $evaluationStep <= 12; $evaluationStep++)  {
echo "<br><br><br>=============================================================================[ PASO: ".$evaluationStep." ]====================<br>";
print_r($evaluationRules[$evaluationStep]);
//print_r($evaluationRules[$evaluationStep]["actions"]); 
foreach ($roles as $key => $userRol) {
echo "<br> - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ROL: ".$userRol." - - <br>";
	
*/

	if($evaluationRules[$evaluationStep]["userType"] == $userRol && $evaluationStep == 2){
			//echo "<hr>FORM ASIGNAR COMITÉS";
			$conexion = Yii::app()->db;


			$commsCheck = $conexion->createCommand("
			SELECT DISTINCT pc.committee
			FROM projects_committee AS pc
			WHERE pc.id_project = '".$model->id."'")->queryAll();

			$commsCheck = CHtml::listData($commsCheck, 'committee', 'committee');    

			$comms = $conexion->createCommand("
			SELECT CONCAT(p.last_name1,' ',p.last_name2,', ',p.names) as fullname, u.email, u.id, r.alias,r.name 
			FROM users AS u 
			JOIN persons AS p on p.id_user=u.id 
			JOIN roles AS r on u.id_roles=r.id 
			WHERE r.alias LIKE '%COM%'")->queryAll();
			//A G R E G A R WHERE UH DE PROYECTO IGUAL A UH DEL MIEMBRO DEL COMMITTEE

			$form=$this->beginWidget('CActiveForm', array('id'=>'committees-form','enableAjaxValidation'=>true,));

				if($evaluationStep == 2)
					$disable = "";
				else
					$disable = "disabled";
				?>
				<div class="row commWrapper" id="formCommittees" style="display:<?php echo $model->folio == "-1" ? "none" : "block" ?>;">
				<div class="row">
				Asignar a los siguientes comités para la evaluación de éste proyecto:
				</div>
				<div class="row comm">
				<label>
				<input type="checkbox" name="designate[COMBIO]" <?php echo $disable." ".(array_key_exists('COMBIO',$commsCheck) ? "checked" : "");?> > Comité de Bioseguridad<br>
				<small>Se requerirá la aprobación de las siguientes personas:<br>
				<?php 
				foreach ($comms as $key => $value) {
				if($value["alias"] == "COMBIO")
				echo "<li>".$value["fullname"]."</li>";
				}
				?>
				</small>
				</label>
				</div>
				<div class="row comm">
				<label>
				<input type="checkbox" name="designate[COMETI]"  <?php echo $disable." ".(array_key_exists('COMETI',$commsCheck) ? "checked" : "");?> > Comité de Ética en investigación<br>
				<small>Se requerirá la aprobación de las siguientes personas:<br>
				<?php 
				foreach ($comms as $key => $value) {
				if($value["alias"] == "COMETI")
				echo "<li>".$value["fullname"]."</li>";
				}
				?>
				</small>
				</label>
				</div>
				<div class="row comm">
				<label>
				<input type="checkbox" name="designate[COMINV]" <?php echo $disable." ".(array_key_exists('COMINV',$commsCheck) ? "checked" : "");?> > Comité de investigación<br>
				<small>Se requerirá la aprobación de las siguientes personas:<br>
				<?php 
				foreach ($comms as $key => $value) {
				if($value["alias"] == "COMINV")
				echo "<li>".$value["fullname"]."</li>";
				}
				?>
				</small>
				</label>
				</div>
				<?php
				if($evaluationStep == 2)
				echo CHtml::htmlButton('Asignar Comités',array(
					'onclick'=>'javascript: send("committees-form","projectsReview/assignCommittees", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "none", "'.$_GET['id'].'","asignarComites,acceptEvaButton")',
					'class'=>'savebutton','id'=>'asignarComites'
				));
				?>
				</div>
				<?
			$this->endWidget(); 

	}

	if($evaluationRules[$evaluationStep]["userType"] == $userRol && $evaluationStep == 2){
			//echo "<hr>FORM ASIGNAR FOLIO";
			$form=$this->beginWidget('CActiveForm', array('id'=>'folioNumber-form','enableAjaxValidation'=>true,)); 
				?>
				<div class="row">
					<?php echo $form->labelEx($model,'folio'); ?>
					<?php echo $form->textField($model,'folio',array('size'=>20,'maxlength'=>20,'title'=>'Número de folio','value'=>$model->folio =='-1' ? "" : $model->folio)); ?>
					<?php echo $form->error($model,'folio'); ?>
				</div>

				<?php
				echo CHtml::htmlButton('Asignar número de folio',array(
					'onclick'=>'javascript: send("folioNumber-form","projectsReview/setFolioNumber", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "none", "'.$_GET['id'].'","folioNumber-form,formCommittees")',
					'class'=>'savebutton','id'=>'asignarFolio'
				));
			$this->endWidget(); 
	}

	if($evaluationRules[$evaluationStep]["userType"] == $userRol && $evaluationStep == 6){
			//echo "<hr>FORM ASIGNAR NÚMERO DE REGISTRO";
			$form=$this->beginWidget('CActiveForm', array('id'=>'regNumber-form','enableAjaxValidation'=>true,)); 
				?>
				<div class="row">
					<?php echo $form->labelEx($model,'registration_number'); ?>
					<?php echo $form->textField($model,'registration_number',array('size'=>20,'maxlength'=>20,'title'=>'Número de folio','value'=>$model->registration_number =='-1' ? "" : $model->registration_number)); ?>
					<?php echo $form->error($model,'registration_number'); ?>
				</div>

				<?php
				echo CHtml::htmlButton('Asignar número de folio',array(
					'onclick'=>'javascript: send("regNumber-form","projectsReview/setRegNumber", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "none", "'.$_GET['id'].'","regNumber-form,asignarFolio")',
					'class'=>'savebutton','id'=>'asignarRegistro'
				));
			$this->endWidget();
	}


	if($evaluationRules[$evaluationStep]["userType"] == $userRol && $evaluationStep == 1){
			//echo "<hr>BOTÓN RECHAZAR";
			echo "<div class='row' style='margin-left: 25px !important'>";
				echo CHtml::htmlButton('No aprobar',array(
					'onclick'=>'javascript: send("","projectsReview/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "none", "'.$evaluationStep.',reject");',
					'class'=>'savebuttonp',
				));		
			echo "</div>";

	}

	if($evaluationRules[$evaluationStep]["userType"] == $userRol && ($evaluationStep == 1 || $evaluationStep == 2 || $evaluationStep == 6 || $evaluationStep == 10)){
			//echo "<hr>BOTÓN ENVIAR";
			echo "<div class='row' style='margin-left: 30px !important'>";
				echo " ".CHtml::htmlButton('Aprobar',array(
					'onclick'=>'javascript: send("","projectsReview/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "none", "'.$evaluationStep.',accept");',
					'class'=>'savebuttonp','id'=>'acceptEvaButton','style'=>'display:block;'

				));
			echo "</div>";

	}

	$fileTypes = array("3"=>"la minuta", "4"=>"el acta de aprobación","12"=>"el dictamen de aprobación");
	if($evaluationRules[$evaluationStep]["userType"] == $userRol && ($evaluationStep == 4 || $userRol && $evaluationStep == 12) ){
			//echo "<hr>BOTÓN RECHAZAR";

		$conexion = Yii::app()->db;
		$checkForDoc = $conexion->createCommand("
		SELECT COUNT(id) AS total FROM projects_followups WHERE id_user = ".$userId." 
		AND id_project = ".$model->id." AND  type = 'mandatory' AND step_number = ".$evaluationStep." AND url_doc IS NOT NULL")->queryAll()[0];

		if(isset($checkForDoc["total"]) && $checkForDoc["total"] > 0){
			echo "<div class='row' style='margin-left: 25px !important'>";
				echo CHtml::htmlButton('No aprobar',array(
					'onclick'=>'javascript: send("","projectsReview/sendReviewCommittee", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "none", "'.$evaluationStep.',reject");',
					'class'=>'savebuttonp',
				));		
			echo "</div>";

		}else{
			echo "<b>Para poder aprobar el proyecto es necesario que primero adjunte en el formulario de comentarios ".$fileTypes[$evaluationStep]."</b>";
		}
	}




	// botones solo para comités 			// botones solo para comités
	if($evaluationRules[$evaluationStep]["userType"] == $userRol && ($evaluationStep == 3 || $evaluationStep == 11)){
		
		$conexion = Yii::app()->db;
		$checkForDoc = $conexion->createCommand("
		SELECT COUNT(id) AS total FROM projects_followups WHERE id_user = ".$userId." 
		AND id_project = ".$model->id." AND  type = 'mandatory' AND step_number = ".$evaluationStep." AND url_doc IS NOT NULL")->queryAll()[0];
		print_r($checkForDoc);
		if(isset($checkForDoc["total"]) && $checkForDoc["total"] > 0){

			if($evaluationRules[$evaluationStep]["userType"] == $userRol && $evaluationStep == 3){
					//echo "<hr>BOTÓN RECHAZAR";
					echo "<div class='row' style='margin-left: 25px !important'>";
						echo CHtml::htmlButton('No aprobar',array(
							'onclick'=>'javascript: send("","projectsReview/sendReviewCommittee", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "none", "'.$evaluationStep.',reject");',
							'class'=>'savebuttonp',
						));		
					echo "</div>";
			}

			if($evaluationRules[$evaluationStep]["userType"] == $userRol && ($evaluationStep == 3 || $evaluationStep == 11)){
					//echo "<hr>BOTÓN RECHAZAR";
				$userId = 17;
				$committeeCheck =ProjectsCommittee::model()->findByAttributes(array('id_project'=>$model->id,'id_user_reviewer'=>$userId));

				echo $committeeCheck["status"];

					echo "<div class='row' style='margin-left: 30px !important'>";
						echo " ".CHtml::htmlButton('Aprobar',array(
							'onclick'=>'javascript: send("","projectsReview/sendReviewCommittee", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "none", "'.$evaluationStep.',accept");',
							'class'=>'savebuttonp','id'=>'acceptEvaButton','style'=>'display:block;'

						));
					echo "</div>";
			}

		}else if($evaluationStep !=11){
			echo "<b>Para poder aprobar el proyecto es necesario que primero adjunte en el formulario de comentarios ".$fileTypes[$evaluationStep]."</b>";
		}

	}





	if($evaluationRules[$evaluationStep]["userType"] == $userRol && ($evaluationStep == 5 || $evaluationStep == 7 || $evaluationStep == 8 || $evaluationStep == 9)){
			//echo "<hr>BOTÓN REVISAR(NO HACE NADA)";
			echo "<div class='row' style='margin-left: 30px !important'>";
				echo " ".CHtml::htmlButton('REVISAR',array(
					'onclick'=>'javascript: send("","projectsReview/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "none", "'.$evaluationStep.',review");',
					'class'=>'savebuttonp','id'=>'acceptEvaButton','style'=>'display:block;'

				));
			echo "</div>";

	}








/*
}
} */

?>













































<div class="row">
<?php $this->renderPartial('../projectsReview/_form', array('model'=>$modelfollowup,'evaluationStep'=>$evaluationStep)); ?>
</div>

<!--  COMENTARIOS -->
<div class="row">
<?php

foreach($followups AS $key => $value){
	//print_r($value);
	$user = Users::model()->findByPk($value->id_user);
	//var_dump();
	echo '<p>'.$user->persons[0]->names.' '.$user->persons[0]->last_name1.' '.$user->persons[0]->last_name2.' ('.$user->email.') escribió: <br>';
	echo $value['followup'].'<br>';
	echo '<small>Creado el '.$value['creation_date'].' '.(empty($value['url_doc']) ? "" : "<a href=../../".$value['url_doc'].">Ver archivo disponible</a>" ).'</small><hr></p>';

}
?>
</div>
