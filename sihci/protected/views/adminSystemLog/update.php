<?php
/* @var $this AdminSystemLogController */
/* @var $model SystemLog */



$this->menu=array(
	//array('label'=>'List SystemLog', 'url'=>array('index')),
	array('label'=>'Detalles', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Bitacora</h1>
            <hr>
        </div>

<h3>Modificar Registro <?php echo $model->id." de:  ".$person->names." ".$person->last_name1." ".$person->last_name2.""; ?></h3>



<?php $this->renderPartial('_form', array('model'=>$model, )); ?>
