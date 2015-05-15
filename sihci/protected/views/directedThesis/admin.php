<?php
/* @var $this DirectedThesisController */
/* @var $model DirectedThesis */

$this->breadcrumbs=array(
	'Directed Thesises'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'Listar Tesis', 'url'=>array('index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
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

<h1>Tesis Dirigidas</h1>

<!-- <?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); */ ?> -->
<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'directed-thesis-grid',
	'dataProvider'=>$model->search(),
	'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'columns'=>array(
		//'id',
		//'id_curriculum',
		array('name'=>'T&iacute;tulo','type'=>'html','id'=>'title','value'=>'CHtml::encode($data->title)'),
		array('name'=>'Autor','type'=>'html','id'=>'author','value'=>'CHtml::encode($data->author)'),
		'conclusion_date',
		array('name'=>'Sector','type'=>'html','id'=>'sector','value'=>'CHtml::encode($data->sector)'),
		//'author',
		//'path',
		array('name'=>'Grado','type'=>'html','id'=>'grade','value'=>'CHtml::encode($data->grade)'),
		//'grade',
		//'sector',
		array('name'=>'Organización','type'=>'html','id'=>'organization','value'=>'CHtml::encode($data->organization)'),
		//'organization',
		'second_level',
		'area',
		'discipline',
		'subdiscipline',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
