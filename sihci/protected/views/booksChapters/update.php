<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */

$this->breadcrumbs=array(
	'Books Chapters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Capitulos', 'url'=>array('index')),
	array('label'=>'Crear Capitulos', 'url'=>array('create')),
	array('label'=>'Ver Capitulos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administar Capitulos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Capitulos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelAuthors'=>$modelAuthors)); ?>