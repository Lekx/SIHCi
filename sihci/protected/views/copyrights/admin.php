<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */

$this->breadcrumbs=array(
	'Copyrights'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#copyrights-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Propiedad intelectual: Derecho de Autor</h1>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'copyrights-grid',
    'dataProvider'=>$model->search(),
    'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'columns'=>array(		
		
		array('name' =>'Beneficiario', 'type'=>'html','id'=>'beneficiary','value'=>'CHtml::encode($data->beneficiary)'),
		array('name' => 'Tipo de participación','type'=>'html','id'=>'participation_type','value'=>'CHtml::encode($data->participation_type)'),
		array('name' => 'Título','type'=>'html','id'=>'title','value'=>'CHtml::encode($data->title)'),
		array('name' => 'Número de tramite','type'=>'html','id'=>'step_number','value'=>'CHtml::encode($data->step_number)'),
		
		/*
		'id',
		'participation_type',
		'title',
		'step_number',
		'entity',
		'beneficiary',
		'application_date',
		'id_curriculum',
		'resume',
		'impact_value',
		'creation_date',
		*/
		array('class'=>'CButtonColumn'),
	),
)); ?>