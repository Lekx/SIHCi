<?php
/* @var $this SoftwareController */
/* @var $model Software */

$this->breadcrumbs=array(
	'Softwares'=>array('index'),
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
	$('#software-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Registro de propiedad intelectual: Software</h1>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'software-grid',
	 'dataProvider'=>$model->search(),
    'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'columns'=>array(
		
		array('name'=>'Tipo de participación','type'=>'html','id'=>'participation_type','value'=>'CHtml::encode($data->participation_type)'),
		array('name'=>'Título','type'=>'html','id'=>'title','value'=>'CHtml::encode($data->title)'),
		array('name'=>'Organización','type'=>'html','id'=>'organization','value'=>'CHtml::encode($data->organization)'),
		array('name'=>'Beneficiario','type'=>'html','id'=>'beneficiary','value'=>'CHtml::encode($data->beneficiary)'),
		array('name'=>'Sector','type'=>'html','id'=>'sector','value'=>'CHtml::encode($data->sector)'),

		/*
		'id',
		'id_curriculum',
		'country',
		'participation_type',
		'title',
		'beneficiary',
		'entity',
		'manwork_hours',
		'end_date',
		'sector',
		'organization',
		'second_level',
		'resumen',
		'objective',
		'contribution',
		'impact_value',
		'innovation_trascen',
		'transfer_mechanism',
		'hr_formation',
		'economic_support',
		'path',
		'creation_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
