<?php 

$mandatory = false;
if(isset($evaluationStep) && ($evaluationStep == 3 || $evaluationStep == 4 ||$evaluationStep == 12)){
//  var_dump($evaluationStep);
  $mandatory = true;
}
?>

<div class="form">

    <?php
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'projects-followups-form',
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
   'enableAjaxValidation'=>true,
)); ?>

    <div class="row">
        <?php echo $form->textArea($model,'followup',array('rows'=>6, 'cols'=>50, 'title'=>'Comentario','placeholder'=>'Comentario')); ?>
        <?php echo $form->error($model,'followup'); ?>
    </div>

    <div class="row">
        <?php echo $form->fileField($model,'url_doc',array('size'=>60,'maxlength'=>100,'title'=>'Documento')); ?>
        <?php echo $form->error($model,'url_doc'); ?>
    </div>

    <div class="row">
      <?php echo CHtml::htmlButton('Enviar',array(
                  'onclick'=>'send("projects-followups-form", "projectsReview/review", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : "").'","'.($mandatory == true ? "mandatory,".($evaluationStep-1) : "").'")',
                  'class'=>'savebuttonp',
                  'id'=>'createFollowup',
              ));
      ?>
    </div>


<?php $this->endWidget(); ?>

</div><!-- form -->
