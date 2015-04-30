<?php
/* @var $this CertificationsController */
/* @var $model Certifications */

$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'Listar Certificaciones', 'url'=>array('index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#certifications-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Certificaciones por Concejos  M&eacute;dicos</h1>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'certifications-grid',
	'dataProvider'=>$model->search(),
	'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$model->search(),
	'columns'=>array(					
		//'id',
		//'id_curriculum',
		array('name'=>'Folio','type'=>'html','id'=>'folio','value'=>'CHtml::encode($data->folio)'),
		array('name'=>'Referencia','type'=>'html','id'=>'reference','value'=>'CHtml::encode($data->reference)'),
		array('name'=>'Tipo de Referencia','type'=>'html','id'=>'reference_type','value'=>'CHtml::encode($data->reference_type)'),
		array('name'=>'Especialidad','type'=>'html','id'=>'specialty','value'=>'CHtml::encode($data->specialty)'),
		/*
		'validity_date_start',
		'validity_date_end',
		'type',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
