<?php
/* @var $this SponsorshipController */
/* @var $model Sponsorship */

$this->breadcrumbs=array(
	'Sponsorships'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Sponsorship', 'url'=>array('index')),
	array('label'=>'Create Sponsorship', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sponsorship-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestión de patrocinios</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sponsorship-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		//'id_user_sponsorer',
		array(
			'name'=>'id_user_researcher',
			'value'=>'$data->idUserResearcher->persons[0]["last_name1"]." ".$data->idUserResearcher->persons[0]["last_name2"].", ".$data->idUserResearcher->persons[0]["names"]',
			),

		'project_name',
		'description',
		'keywords',
		
		'status',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
