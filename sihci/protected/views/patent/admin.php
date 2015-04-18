<?php
/* @var $this PatentController */
/* @var $model Patent */
$this->breadcrumbs=array(
	'Patents'=>array('index'),
	'Manage',
);
$this->menu=array(
	array('label'=>'Desplegar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
); 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#patent-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<h1>Propiedad intelectual: Patentes</h1>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patent-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'presentation_date',
		'owner',
		'application_number',
		'state',
		'application_type',
		/*
		'country',
		'participation_type',
		'id_curriculum',
		'patent_type',
		'consession_date',
		'record',
		'international_clasification',
		'title',
		'resumen',
		'industrial_exploitation',
		'resource_operator',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>