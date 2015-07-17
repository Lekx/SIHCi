

<div class="form wide">
 
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'group-form',
            'enableAjaxValidation'=>false,
    )); ?>
 
    <p class="note">Fields with <span class="required">*</span> are required.</p>
 
    <?php
        //show errorsummary at the top for all models
        //build an array of all models to check
        echo $form->errorSummary(array_merge(array($model),$validatedEmail));
    ?>
 
<?php
 
    // see http://www.yiiframework.com/doc/guide/1.1/en/form.table
    // Note: Can be a route to a config file too,
    //       or create a method 'getMultiModelForm()' in the member model
 
    $emailFormConfig = array(
          'elements'=>array(
            'email'=>array(
                'type'=>'text',
                'maxlength'=>40,
            ),
            'type'=>array(
                'type'=>'text',
                'maxlength'=>40,
            ),
        ));
 
    $this->widget('ext.multimodelform.MultiModelForm',array(
            'id' => 'id_emails', //the unique widget id
              'tableView' => true,
            'formConfig' => $emailFormConfig, //the form configuration array
            'model' => $emails, //instance of the form model
 
            //if submitted not empty from the controller,
            //the form will be rendered with validation errors
            'validatedItems' => $validatedEmail,
 
            //array of member instances loaded from db
            'data' => $emails->findAll('id_person=:id_person', array(':id_person'=>$model->id)),
        ));
    ?>
  
         
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
 
    <?php $this->endWidget(); ?>
 
    </div><!-- form -->