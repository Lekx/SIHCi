<?php
/* @var $this DirectedThesisController */
/* @var $model DirectedThesis */

$this->breadcrumbs=array(
	'Directed Thesises'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Tesis', 'url'=>array('index')),
	array('label'=>'Crear Tesis', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#directed-thesis-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar</h1>

<!-- <?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); */ ?> -->
<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'directed-thesis-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	//'summaryText'=>"Mostrando {end} de {count}",
	'columns'=>array(
		//'id',
		//'id_curriculum',
		'title',
		'conclusion_date',
		'author',
		//'path',
		//array(
		//'class'=>'CLinkColumn',
        //'header'=>'path',
        //'labelExpression'=>'$data->path',
        //'urlExpression'=>'$data->direccionArchivos()',
		//),
		'grade',
		'sector',
		'organization',
		'second_level',
		'area',
		'discipline',
		'subdiscipline',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
