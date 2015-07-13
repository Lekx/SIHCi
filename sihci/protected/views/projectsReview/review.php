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
	'id',
	'id_curriculum',
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
		'is_sni',

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
		'folio',
		'is_sponsored',
		'registration_number',

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

if(in_array(Yii::app()->user->Rol->alias, explode(",",$model->status)) || Yii::app()->user->Rol->alias == substr($model->status,0,-1)){

	$rejectRol = Yii::app()->user->Rol->alias;
	if(Yii::app()->user->Rol->alias == "SEUH" && $model->folio == "-1"){ 


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



//<!--  ASIGNACIÓN DE NÚMERO DE REGISTRO -->
	if(substr(Yii::app()->user->Rol->alias,0,3) && $model->registration_number == "-1"){ 


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

//<!--  CAJA DE COMENTARIOS -->







if(Yii::app()->user->Rol->alias == "SEUH"){
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
				//A G R E G A R WHERE UH DE PROYECTO IGUAL A UH DEL MIEMBRO DEL COMMITTEE
				//A G R E G A R WHERE UH DE PROYECTO IGUAL A UH DEL MIEMBRO DEL COMMITTEE

 $form=$this->beginWidget('CActiveForm', array('id'=>'committees-form','enableAjaxValidation'=>true,));

if($model->status == "SEUH")
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
				if($model->status == "SEUH")
				echo CHtml::htmlButton('Asignar Comités',array(
		            'onclick'=>'javascript: send("committees-form","projectsReview/assignCommittees", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "none", "'.$_GET['id'].'","asignarComites,acceptEvaButton")',
		            'class'=>'savebutton','id'=>'asignarComites'
		        ));
	?>
</div>
<?
		 $this->endWidget(); 
	}



			/*foreach ($commsCheck as $key => $value) {
				$value['']
			}*/


	if(Yii::app()->user->Rol->alias == "DIVUH" || (substr(Yii::app()->user->Rol->alias,0,3) == "COM" && $model->status == "COMITE2")){

		echo "<div class='row' style='margin-left: 25px !important'>";
		echo CHtml::htmlButton('No Aprobar',array(
					'onclick'=>'javascript: send("","projectsReview/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "projectsReview/review'.(isset($_GET['id']) ? "/".$_GET['id'] : "").'", "reject'.Yii::app()->user->Rol->alias.'");',
					'class'=>'savebuttonp',
			));		
		echo "</div>";
	}


	if(substr(Yii::app()->user->Rol->alias,0,3) == "COM"){

		$comms1Check =ProjectsCommittee::model()->findAllByAttributes(array('id_project'=>$model->id,'id_user_reviewer'=>Yii::app()->user->id));
		$comms1Check = CHtml::listData($comms1Check, 'id_user_reviewer', 'status');

		var_dump($comms1Check);
	}

if(substr(Yii::app()->user->Rol->alias,0,3) != "COM" || (isset($comms1Check[Yii::app()->user->id]) && $comms1Check[Yii::app()->user->id] == "pendiente")){

				echo "<div class='row' style='margin-left: 30px !important'>";
				echo " ".CHtml::htmlButton('Aprobar',array(
            'onclick'=>'javascript: send("","projectsReview/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "projectsReview/review'.(isset($_GET['id']) ? "/".$_GET['id'] : "").'", "'.Yii::app()->user->Rol->alias.'");',
            'class'=>'savebuttonp','id'=>'acceptEvaButton','style'=>'display:'.( ((Yii::app()->user->Rol->alias == "SEUH" && count($commsCheck)>0) || (Yii::app()->user->Rol->alias != "SEUH")) ? "block" : "none").';'
        ));
				echo "</div>";

}
?>


<div class="row">
<?php $this->renderPartial('../projectsReview/_form', array('model'=>$modelfollowup)); ?>
</div>
<?php
}
?>

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
