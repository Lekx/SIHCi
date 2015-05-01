<?php
/* @var $this JobsController */
/* @var $model Jobs */

$this->breadcrumbs=array(
	'Datos Laborales'=>array('jobs'),
);

$this->menu=array(
	array('label'=>'List Jobs', 'url'=>array('index')),
	array('label'=>'Manage Jobs', 'url'=>array('admin')),
);
?>
	<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Currículum vitae electrónico</h1>
            <hr>
        </div>

<h4>Datos laborales:</h4>

<?php $this->renderPartial('_form_jobs', array('model'=>$model)); ?>