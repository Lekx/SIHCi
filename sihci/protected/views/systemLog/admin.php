<?php
/* @var $this SystemLogController */
/* @var $model SystemLog */

$this->breadcrumbs=array(
	'Bitácora'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	//array('label'=>'List SystemLog', 'url'=>array('index')),
	//array('label'=>'Create SystemLog', 'url'=>array('create')),
	array('label'=>'Descargar en PDF', 'url'=>array('pdf')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#system-log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'system-log-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'summaryText'=>"Mostrando {end} de {count}",
	'columns'=>array(
		//'id',
		//'id_user',
		'section',
		//'details',
		'action',
		'datetime',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


