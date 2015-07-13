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
			),*/
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

if(in_array(Yii::app()->user->Rol->alias, explode(",",$model->status))){

	$rejectRol = Yii::app()->user->Rol->alias;
	//echo substr(Yii::app()->user->Rol->alias,1,3);
	if(Yii::app()->user->Rol->alias == "SEUH" || substr(Yii::app()->user->Rol->alias,0,3) == "COM"){

		echo "<div class='row' style='margin-left: 25px !important'>";
		echo CHtml::htmlButton('Rechazar',array(
					'onclick'=>'javascript: send("","projectsReview/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "projectsReview/review'.(isset($_GET['id']) ? "/".$_GET['id'] : "").'", "reject'.Yii::app()->user->Rol->alias.'");',
					'class'=>'savebuttonp',
			));
		echo "</div>";
	}
				echo "<div class='row' style='margin-left: 30px !important'>";
				echo " ".CHtml::htmlButton('Aprobar',array(
            'onclick'=>'javascript: send("","projectsReview/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "projectsReview/review'.(isset($_GET['id']) ? "/".$_GET['id'] : "").'", "'.Yii::app()->user->Rol->alias.'");',
            'class'=>'savebuttonp',
        ));
				echo "</div>";
?>

<div class="row">
<?php $this->renderPartial('../projectsReview/_form', array('model'=>$modelfollowup)); ?>
</div>
<?php
}
?>
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
