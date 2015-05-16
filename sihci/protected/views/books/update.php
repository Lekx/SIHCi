<?php
/* @var $this BooksController */
/* @var $model Books */

$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>

<h1>Modificar <?php echo $model->book_title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelAuthor'=>$modelAuthor, 'modelAuthors'=>$modelAuthors)); ?>