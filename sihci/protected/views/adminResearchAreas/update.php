<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */

$this->breadcrumbs=array(
	'Research Areases'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List ResearchAreas', 'url'=>array('index')),
	//array('label'=>'View ResearchAreas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/AdministracionSistema.png" alt="">
            <h1>Gestión Lineas De Investigación</h1>
            <hr>
        </div>


<h3>Modificar: <?php echo $model->name;?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>