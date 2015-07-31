<?php
/* @var $this ProjectsController */
/* @var $model Projects */


$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('indeºx')),
	//array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Invitaciones', 'url'=>array('projects/sponsoredAdmin'),'itemOptions'=>array('class' => 'menuitem 2')),
	array('label'=>'Proyectos de Investigación', 'url'=>array('projects/admin'),'itemOptions'=>array('class' => 'menuitem 1 now')),
		array('label'=>'Crear', 'url'=>array('projects/create'),'itemOptions'=>array('class' => 'sub')),
		array('label'=>'Gestionar', 'url'=>array('projects/admin'),'itemOptions'=>array('class' => 'sub')),

	//array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),

	);
?>


<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
            <h1>Proyectos</h1>
            <hr>
        </div>

<h3>Gestionar proyecto:</h3>


<section class="projects1 sactive">
	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'title',
			'discipline',
			'research_type',
			'priority_topic',
			'sub_topic',
			'justify',

		),
	));

	?>
</section>
<section class="projects2">
<?php



		$users = Users::model()->findByPk(Yii::app()->user->id);
		$persons = $users->persons[0]; //Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		$emailUsers = $users->email;//Users::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$phoneUsers = $users->persons[0]->phones[0];//Phones::model()->findByAttributes(array('id_person'=>$persons->id,'is_primary'=>1));
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
		array(
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

?>
</section>
<section class="projects3">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'develop_uh',
		'participant_institutions',
		'participant_institutions_international',
		'colaboration_type',

	),
));

?>
</section>
<section class="projects4">
	<?php

	$coworkers = "";
	 foreach ($model->projectsCoworkers as $key => $value) {
	 	$coworkers .=$value->fullName.". ";
	 }
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
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
					),	array(
								'label'=>'Investigadores colaboradores',
								'value'=>$coworkers,
								),

		),
	));


	?>
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
	));

	?>


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


<div class="row commets">
<?php

if($model->status !="BORRADOR"){
	$this->renderPartial('../projectsReview/_form', array('model'=>$modelfollowup));

	foreach($followups AS $key => $value){
		//print_r($value);
		$user = Users::model()->findByPk($value->id_user);
		//var_dump();
		echo '<p>'.$user->persons[0]->names.' '.$user->persons[0]->last_name1.' '.$user->persons[0]->last_name2.' ('.$user->email.') escribió: <p>';
		echo $value['followup'].'<br>';
		echo '<small>Creado el '.$value['creation_date'].' '.(empty($value['url_doc']) ? "" : "<p><a href=../../".$value['url_doc']." target = '_blank'>Ver archivo disponible</a>" ).'<p></small><hr></p>';

	}

}else{
	echo "Usted podrá generar comentarios acerca del proyecto una vez que lo envie a evaluación.";
}
?>
</div>
