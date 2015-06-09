<?php
/* @var $this PatentController */
/* @var $model Patent */

$this->breadcrumbs=array(
	'Patents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>
        

<h3>Crear registro de propiedad intelectual-Patentes:</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>