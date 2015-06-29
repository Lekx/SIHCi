
<script type="text/javascript">
    function send(form, actionUrl){
        var formData ="";
        if(form != "")
            var formData = new FormData($("#"+form)[0]);

        $.ajax({
            url: '<?php echo Yii::app()->createUrl("'+actionUrl+'",array("id"=>$_GET["id"])); ?>',
            type: 'POST',
            data: formData,
            datatype:'json',
            async: false,
            beforeSend: function() { },
            success: function (response) {
                var data = JSON.parse(response); 
                if(data['status'] != 'success'){

                    $(".errordiv").show();
                    for (var key in data) {
                        $("#"+key+"_em_").show();
                        $("#"+key+"_em_").html(data[key]);
                    }
                }else{
                    alert(data['message']);
                    if(("message" in data)){
                        $(".successh2 h2").html(data['message']);
                        $(".successh2 span").html(data['subMessage']);
                    }
                    $(".error").hide();
                    $(".errorMessage").hide();
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

    <?php echo CHtml::htmlButton('Enviar',array(
                'onclick'=>'javascript: send("","projectsReview/sendReview");',
                'class'=>'savebutton',
            ));
    ?>
<?php 

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

    <?php echo CHtml::htmlButton('Crear comentario',array(
                'onclick'=>'javascript: send("projects-followups-form","projectsReview/review");',
                'class'=>'savebutton',
            ));
    ?>
<?php $this->endWidget(); ?>

</div><!-- form -->