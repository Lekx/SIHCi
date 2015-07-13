

<div class="form">

    <?php
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'projects-followups-form-create',
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
   'enableAjaxValidation'=>true,
)); ?>

    <div class="row">
        <?php echo $form->textArea($model,'followup',array('rows'=>6, 'cols'=>50, 'title'=>'Seguimiento', 'placeholder'=>'Seguimiento')); ?>
        <?php echo $form->error($model,'followup'); ?>
    </div>

    <div class="row">
        <?php echo $form->fileField($model,'url_doc',array('size'=>60,'maxlength'=>100,'title'=>'Documento')); ?>
        <?php echo $form->error($model,'url_doc'); ?>
    </div>
  <div class="row">
    <?php echo CHtml::htmlButton('Crear',array(
                'onclick'=>'send("projects-followups-form-create", "projectsFollowups/createFollowup", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : "").'","")',
                'class'=>'savebuttonp',
            ));
    ?>
        </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
