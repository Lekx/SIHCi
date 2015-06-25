
<script type="text/javascript">
// this script for collecting the form data and pass to the controller action and doing the on success validations
function send(){
    var formData = new FormData($("#projects-followups-form")[0]);
    $.ajax({
        url: '<?php echo Yii::app()->createUrl("projectsReview/review",array("id"=>$_GET["id"])); ?>',
        type: 'POST',
        data: formData,
        datatype:'json',
        // async: false,
        beforeSend: function() {
            // do some loading options
        },
        success: function (response) {
            var data = JSON.parse(response); 
            if(data['status'] != 'success'){
                alert("if");
                $(".errordiv").show();
                if(typeof data['ProjectsFollowups_followup'] !== "undefined"){
                    $("#ProjectsFollowups_followup_em_").show();
                    $("#ProjectsFollowups_followup_em_").html(data['ProjectsFollowups_followup']);
                }

                if(typeof data['ProjectsFollowups_url_doc'] !== "undefined"){
                    $("#ProjectsFollowups_url_doc_em_").html(""+data['ProjectsFollowups_url_doc']);
                    $("#ProjectsFollowups_url_doc_em_").show();
                }
            }else{
                alert("else");
                $(".error").hide();
                $(".successdiv").show();
            }
        },
        complete: function(data) { },
        error: function (data) { },
        cache: false,
        contentType: false,
        processData: false
    });
 
    return false;
}
</script>

<div class="form">

<?php 

$form=$this->beginWidget('CActiveForm', array(
    'id'=>'projects-followups-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    'enableAjaxValidation'=>true,
    //'validateOnChange'=>false,

)); ?>


    <?php //echo $form->errorSummary($model); ?>


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
                'onclick'=>'javascript: send();', // on submit call JS send() function
                'id'=> 'post-submit-btn', // button id
                'class'=>'post_submit',
            ));
    ?>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->