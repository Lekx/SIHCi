<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Proyectos'=>array('admin'),
	'Gestión',
);


?>

<h1>Gestión de proyectos no patrocinados</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'projects-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		//'id_curriculum',
		array(
			'name'=>'is_sponsored',
			'value'=>'$data->is_sponsored == "1" ? "Si" : "No"',
		),
		'title',
		array(
			'name'=>'discipline',
			'value'=>'$data->discipline == "-1" ? "" : $data->discipline',
			),
		/*array(
			'name'=>'research_type',
			'value'=>'$data->research_type == "-1" ? "" : $data->research_type',
			),
		array(
			'name'=>'priority_topic',
			'value'=>'$data->priority_topic == "-1" ? "" : $data->priority_topic',
			),*/
		array(
			'name'=>'develop_uh',
			'value'=>'$data->develop_uh == "-1" ? "" : $data->develop_uh',
			),

		array(
			'name'=>'folio',
			'value'=>'$data->folio == "-1" ? "" : $data->folio',
			),

		array(
			'name'=>'registration_number',
			'value'=>'$data->registration_number == "-1" ? "" : $data->registration_number',
			),
			'status',

		/*
		'sub_topic',
		'justify',
		'is_sni',
		
		'institution_colaboration',
		'national_institutions',
		'participant_institutions',
		'international_institutions_',
		'participant_institutions_international',
		'colaboration_type',
		'has_adtl_caracteristics_a',
		'adtl_caracteristics_a',
		'has_adtl_caracteristics_b',
		'adtl_caracteristics_b',
		'has_adtl_caracteristics_c',
		'adtl_caracteristics_c',
		'has_adtl_caracteristics_d',
		'adtl_caracteristics_d',
		'has_adtl_caracteristics_e',
		'adtl_caracteristics_e',
		'has_adtl_caracteristics_f',
		'adtl_caracteristics_f',
		'has_adtl_caracteristics_g',
		'adtl_caracteristics_g',

		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
