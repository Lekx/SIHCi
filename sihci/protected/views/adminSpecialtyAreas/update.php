<?php
/* @var $this AdminSpecialtyAreasController */
/* @var $model AdminSpecialtyAreas */

$this->breadcrumbs=array(
	'Admin Specialty Areases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/AdministracionSistema.png" alt="">
            <h1>Gestión Lineas De Investigación</h1>
            <hr>
        </div>

<h3>Modificar: <?php echo $model->specialty; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model,'modelSpecialtyAreas'=>$modelSpecialtyAreas,'modelSpecialtyArea'=>$modelSpecialtyArea)); ?>