
<div class="form">

    <?php echo CHtml::htmlButton('Enviar',array(
                'onclick'=>'javascript: send("","projectsReview/sendReview");',
                'class'=>'savebutton',
            ));



$form=$this->beginWidget('CActiveForm', array(
    'id'=>'projects-followups-form',
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
   'enableAjaxValidation'=>true,
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'Comentario'); ?>
        <?php echo $form->textArea($model,'followup',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'followup'); ?>
    </div>

    <div class="row">
        <?php echo $form->fileField($model,'url_doc',array('size'=>60,'maxlength'=>100,'title'=>'Documento')); ?>
        <?php echo $form->error($model,'url_doc'); ?>
    </div>

    <?php echo CHtml::htmlButton('Enviar',array(
                'onclick'=>'send("projects-followups-form", "projectsReview/review", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'");',
                'class'=>'savebutton',
            ));
    ?>
<?php $this->endWidget(); ?>

</div><!-- form -->