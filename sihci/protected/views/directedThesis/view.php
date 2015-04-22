<?php
/* @var $this DirectedThesisController */
/* @var $model DirectedThesis */

$this->breadcrumbs=array(
	'Directed Thesises'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Listar Tesis', 'url'=>array('index')),
	array('label'=>'Crear Tesis', 'url'=>array('create')),
	array('label'=>'Actualizar Tesis', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Tesis', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro de eliminar este elemento?')),
	array('label'=>'Administrar Tesis', 'url'=>array('admin')),
);
?>

<h1>Ver Tesis #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
     'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'attributes'=>array(
		//'id',
		//'id_curriculum',
		'title',
		'conclusion_date',
		'author',
		array(               
                  'label'=>'Archivo',
                  'type'=>'raw',
                  'value'=>CHtml::link('Ver archivo',Yii::app()->request->hostInfo.'/SIHCI/sihci/users/'.Yii::app()->user->id.'/directed_thesis/Documento_tesis_'.$model->title, array("target"=>"_blank")),
                ),
		//'path',
		'grade',
		'sector',
		'organization',	
		'second_level',
		'area',
		'discipline',
		'subdisciplina',
	),
	 
	
)); ?>
