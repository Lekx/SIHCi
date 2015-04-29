<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */

$this->breadcrumbs=array(
	'Research Areases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ResearchAreas', 'url'=>array('index')),
	array('label'=>'Create ResearchAreas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#research-areas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'research-areas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'id_curriculum',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
