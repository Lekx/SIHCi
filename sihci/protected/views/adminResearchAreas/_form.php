<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'research-areas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>




	<div class="row">

		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Nombre de investigación', 'title'=>'Nombre de investigación')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row buttons">
   <?php echo CHtml::htmlButton($model->isNewRecord ? 'Guardar': 'Modificar',array(
                'onclick'=>'send("research-areas-form","adminResearchAreas/'.($model->isNewRecord ? 'create' : 'update').'", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","adminResearchAreas/admin","");',
                'class'=>'savebutton',
            ));
    	 ?>


       	<?php echo CHtml::link('Cancelar', array('/AdminResearchAreas/admin'),array('confirm' => 'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>

	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
