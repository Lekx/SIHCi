<?php
/* @var $this DirectedThesisController */
/* @var $model DirectedThesis */

$this->breadcrumbs=array(
	'Directed Thesises'=>array('index'),
	$model->title,
);

$this->menu=array(
	//array('label'=>'Listar Tesis', 'url'=>array('index')),
	array('label'=>'Crear ', 'url'=>array('create')),
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro de eliminar este elemento?')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Tesis Dirigidas</h1>

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
                'value'=>CHtml::link('Ver archivo', Yii::app()->createUrl($model->path),array("target"=>"_blank")),
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
