<?php
/* @var $this DocsIdentityController */
/* @var $model DocsIdentity */
/* @var $form CActiveForm */
 // $this->widget('ext.widgets.reCopy.ReCopyWidget', array(
 //     'targetClass'=>'docs',
 //     'addButtonLabel'=>'Agregar nuevo',
 //     'limit'=>4,
 //  ));
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'commission-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>


	<?php echo $form->errorSummary($model);
	if($model->SNI == -1)
		$model->SNI = "";
	?>

<div class="docs">

	<div class="row">
		<?php echo $form->textField($model,'SNI',array('title'=>'Nombramiento SNI','maxlength'=>11,'class'=>'numericOnly', 'placeholder'=>'Nombramiento SNI')); ?>
		<?php echo $form->error($model,'SNI'); ?>
	</div>

	<div class="row">
			<?php echo $form->textField($model,'researcher_title',array('class'=>'lettersAndNumbers','title'=>'Nombramiento en el Hopital Civil','size'=>60,'maxlength'=>100, 'placeholder'=>"Nombramiento en el Hospital Civil")); ?>
		<?php echo $form->error($model,'researcher_title'); ?>
	</div>

</div>

	<div class="row buttons">
		<?php echo CHtml::htmlButton('Guardar',array(
							 'onclick'=>'send("commission-form", "curriculumVitae/commission", "'.$model->id.'","curriculumVitae/commission","");',
								//'id'=> 'post-submit-btn',
							 'class'=>'savebutton',
					 ));
			 ?>

<?php echo CHtml::link('Cancelar',array('curriculumVitae/commission'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
