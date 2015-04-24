<?php
/* @var $this PostdegreeGraduatesController */
/* @var $model PostdegreeGraduates */

$this->breadcrumbs=array(
	'Postdegree Graduates'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#postdegree-graduates-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Graduados de posgrado:</h1>


<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'postdegree-graduates-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		'fullname',
		/*'id',
		'id_curriculum',*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
