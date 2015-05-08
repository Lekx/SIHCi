<?php
/* @var $this ArticlesGuidesController */
/* @var $model ArticlesGuides */

$this->breadcrumbs=array(
	'Articles Guides'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create'))
	);
?>

<h1><?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'isbn',
		'editorial',
		'edicion',
		'publishing_year',
		'volumen',
		'volumen_no',
		'start_page',
		'end_page',
		'article_type',
		'copies_issued',
		'magazine',
		'area',
		'discipline',
		'subdiscipline',
		'url_document',
		'keywords',
		'type',
		/*'id',
		'id_resume',
		'creation_date',*/
	),
)); ?>
