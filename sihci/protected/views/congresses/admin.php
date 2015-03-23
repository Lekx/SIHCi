<?php
/* @var $this CongressesController */
/* @var $model Congresses */

$this->breadcrumbs=array(
	'Congresses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Congreso', 'url'=>array('index')),
	array('label'=>'Crear Congreso', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#congresses-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Congreso</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'congresses-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_curriculum',
		'work_title',
		'year',
		'congress',
		'type',
		/*
		'country',
		'work_type',
		'keywords',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
