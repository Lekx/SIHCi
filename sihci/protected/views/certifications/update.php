<?php
/* @var $this CertificationsController */
/* @var $model Certifications */

$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'Listar Certificaciones', 'url'=>array('index'));
	//array('label'=>'Ver Certificaciones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear ', 'url'=>array('create')),
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>

<h4>Gestionar Certificaciones por Consejos Medicos:  <?php echo var_export(substr($model->creation_date, 0, 10), true).PHP_EOL; ?></h4>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>