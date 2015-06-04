<?php
/* @var $this ArticlesGuidesController */
/* @var $model ArticlesGuides */

$this->breadcrumbs=array(
	'Articles Guides'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>

<h3>Modificar registro de Arituclos y Guias con ISBN: <?php echo $model->isbn; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'modelAuthor'=>$modelAuthor,'modelAuthors'=>$modelAuthors)); ?>