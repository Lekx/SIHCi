<?php
/* @var $this ProjectsFollowupsController */
/* @var $model ProjectsFollowups */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'projects-followups-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>


    <?php echo $form->errorSummary($model); ?>


    <div class="row">
        <?php echo $form->labelEx($model,'Comentario'); ?>
        <?php echo $form->textArea($model,'followup',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'followup'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Archivo'); ?>
        <?php echo $form->textField($model,'url_doc',array('size'=>60,'maxlength'=>150)); ?>
        <?php echo $form->error($model,'url_doc'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->