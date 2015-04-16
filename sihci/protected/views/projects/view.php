<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Projects', 'url'=>array('index')),
	array('label'=>'Create Projects', 'url'=>array('create')),
	array('label'=>'Update Projects', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Projects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Projects', 'url'=>array('admin')),
);
?>

<h1>View Projects #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_curriculum',
		'title',
		'discipline',
		'research_type',
		'priority_topic',
		'sub_topic',
		'justify',
		'is_sni',
		'develop_uh',
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
		'status',
		'folio',
		'is_sponsored',
		'registration_number',
	),
)); ?>
