<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */

$this->breadcrumbs=array(
	'Books Chapters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('index')),
	array('label'=>'Gestionar ', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
	//array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h1>Modificar:  <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelAuthors'=>$modelAuthors)); ?>