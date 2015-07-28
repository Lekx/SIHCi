
<?php

$mandatory = false;
if(isset($evaluationStep) && ($evaluationStep == 3 || $evaluationStep == 4 ||$evaluationStep == 12) && $is_sponsored == 1){ // MODIFED ADDED LAST && MAY BE REMOVED
  $mandatory = true;
}else if(isset($evaluationStep) && ($evaluationStep == 4 || $evaluationStep == 7 || $evaluationStep == 11 || $evaluationStep == 13) && $is_sponsored == 0){ // MODIFED ADDED LAST && MAY BE REMOVED all the else
  $mandatory = true;
}

$extras = ($mandatory == true ? "mandatory,".($evaluationStep-1) : "");
//2 convoke  comms , 4 addifle, 6 addfile
if(isset($evaluationStepFW) && ($evaluationStepFW == 2 || $evaluationStepFW == 4 || $evaluationStepFW == 6)){

    $extras = "mandatoryFW,".($evaluationStepFW - 1).",".$_GET['id'];
  }

if(isset($idProject)){
  $idProject = $idProject;
}else{
  $idProject = isset($_GET['id']) ? $_GET['id'] : 0;
}

?>

<div class="form">

    <?php
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'projects-followups-forms',
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
   'enableAjaxValidation'=>true,
   'enableClientValidation'=>true,

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
      <?php echo CHtml::htmlButton('Crear comentario',array(
                  'onclick'=>'send("projects-followups-forms", "projectsReview/review", "'.$idProject.'", "'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : "").'","'.$extras.'")',
                  'class'=>'savebuttonp',
                  'id'=>'createFollowup',
              ));
      ?>
    </div>


<?php $this->endWidget(); ?>

</div><!-- form -->
