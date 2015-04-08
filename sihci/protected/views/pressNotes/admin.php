<?php
/* @var $this PressNotesController */
/* @var $model PressNotes */
//DP06-Barra de búsqueda
$this->breadcrumbs=array(
	'Press Notes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PressNotes', 'url'=>array('index')),
	array('label'=>'Create PressNotes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#press-notes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});()
	return false;
});
");
?>

<h1>Manage Press Notes</h1>

<div class="search-form" style="display:block" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'press-notes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_curriculum',
		'type',
		'directed_to',
		'date',
		'title',
		/*
		'responsible_agency',
		'note',
		'is_national',
		'creation_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
