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

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'sponsorship-grid',
	'dataProvider'=>$model->search(),
	'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		//'id',
		//'id_user_sponsorer',
		array(
			'name'=>'id_user_researcher',
			'value'=>'$data->idUserResearcher->persons[0]["last_name1"]." ".$data->idUserResearcher->persons[0]["last_name2"].", ".$data->idUserResearcher->persons[0]["names"]',
			),
		array('name'=>'Nombre del proyecto','type'=>'html','id'=>'project_name','value'=>'CHtml::encode($data->project_name)'),
		//'project_name',
		array('name'=>'Descripción','type'=>'html','id'=>'description','value'=>'CHtml::encode($data->description)'),
		//'description',
		array('name'=>'Palabras clave','type'=>'html','id'=>'keywords','value'=>'CHtml::encode($data->keywords)'),
		//'keywords',
		array('name'=>'Estatus','type'=>'html','id'=>'status','value'=>'CHtml::encode($data->status)'),
		//'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
