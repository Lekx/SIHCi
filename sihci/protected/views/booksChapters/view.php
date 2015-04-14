<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */

$this->breadcrumbs=array(
	'Books Chapters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Capitulo', 'url'=>array('index')),
	array('label'=>'Crear Capitulo', 'url'=>array('create')),
	array('label'=>'Actualizar Capitulo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Capitulo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro de eliminar este registro?')),
	array('label'=>'Administrar Capitulo', 'url'=>array('admin')),
);
?>

<h1>Ver Capitulos<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_curriculum',
		'chapter_title',
		'book_title',
		'publishing_year',
		'publishers',
		'editorial',
		'volume',
		'pages',
		'citations',
		'total_of_authors',
		'area',
		'discipline',
		'subdiscipline',
		//'creation_date',
		array(
			'label'=>'Archivo',
			'type'=>'raw',
			'value'=>CHtml::link('Ver archivo',Yii::app()->request->hostInfo.'/SIHCI/sihci/users/'.Yii::app()->user->id.'/Books_Chapters/Capitulo_libro_'.$model->chapter_title, array("target"=>"_blank")),
			),
		'names',
		'last_name1',
		'last_name2',
		'position',
		//'url_doc',
	),
)); ?>
