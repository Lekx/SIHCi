<?php
/* @var $this SoftwareController */
/* @var $model Software */

$this->breadcrumbs=array(
	'Softwares'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('index')),
	array('label'=>'Graduados de posgrado ', 'url'=>array('admin')),
	array('label'=>'Difusión de prensa ', 'url'=>array('admin')),
	array('label'=>'Aplicacion de conocimiento ', 'url'=>array('admin')),
	array('label'=>'Resgirtro patente ', 'url'=>array('admin')),
	array('label'=>'Resgirtro derecho de autor', 'url'=>array('admin')),
	array('label'=>'Resgirtro software', 'url'=>array('admin')),
	array('label'=>'Articulos y guías', 'url'=>array('admin')),
	array('label'=>'Libros ', 'url'=>array('admin')),
	array('label'=>'Capítulo de libros ', 'url'=>array('admin')),
	array('label'=>'Participación en congresos ', 'url'=>array('admin')),
	array('label'=>'Tesis Dirigidas ', 'url'=>array('admin')),
	array('label'=>'Certificaciones por consejos ', 'url'=>array('admin')),
	//array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>

<h4>Modificar registro de propiedad intelectual-Software: <?php echo $model->title ?></h4>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>