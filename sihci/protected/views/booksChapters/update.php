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
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>


<h3>Modificar Registro de capitulo de libros: <?php echo $model->chapter_title; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model,'modelAuthor'=>$modelAuthor, 'modelAuthors'=>$modelAuthors)); ?>