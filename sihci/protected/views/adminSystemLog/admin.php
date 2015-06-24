<?php
/* @var $this SystemLogController */
/* @var $model SystemLog */
$this->breadcrumbs=array(
	'Bitácora'=>array('admin'),
	'Gestionar',
);
$this->menu=array(
	//array('label'=>'List SystemLog', 'url'=>array('index')),
	//array('label'=>'Create SystemLog', 'url'=>array('create')),
	array('label'=>'Exportar Bitácora a PDF', 'url'=>array('pdf')),
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

<h1>Gestionar</h1>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'system-log-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',

	'columns'=>array(
			array('name'=>'Número de Movimiento','type'=>'html','id'=>'id','value'=>'CHtml::encode($data->id)'),
			array('name'=>'Número de usuario','type'=>'html','id'=>'id_user','value'=>'CHtml::encode($data->id_user)'),
			array('name'=>'Sección','type'=>'html','id'=>'section','value'=>'CHtml::encode($data->section)'),
			array('name'=>'Detalles','type'=>'html','id'=>'details','value'=>'CHtml::encode($data->details)'),
			array('name'=>'Acción','type'=>'html','id'=>'action','value'=>'CHtml::encode($data->action)'),
			array('name'=>'Fecha','type'=>'html','id'=>'datetime','value'=>'CHtml::encode($data->datetime)'),
		
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
