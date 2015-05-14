<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'users-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php Yii::app()->bootstrap->register(); ?>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->errorSummary($modelPersons); ?>


    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('placeholder'=>"Email")); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <p>Verificacion de Email</p>
         <input type="text" name="Users[email2]" id="Users_email2" placeholder="Verificacion de Email" ></input>
    </div>

    
    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->textField($model,'password',array('placeholder'=>"Minimo 6 maximo 15 caracteres")); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row">
        <p>Verificacion de contraseña</p>
        <input type="password" name="Users[password2]" id="Users_password2" placeholder="Verificacion de Contraseña"></input>
    </div>



    <div class="row">
            <select name="Persons[country]">
                <option>mexiquito</option> 
                <option>unitestates</option> 
            </select>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelPersons,'names'); ?>
        <?php echo $form->textField($modelPersons,'names',array('placeholder'=>"Nombre/s completos.")); ?>
        <?php echo $form->error($modelPersons,'names'); ?>  
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelPersons,'last_name1'); ?>
        <?php echo $form->textField($modelPersons,'last_name1',array('placeholder'=>"Apellido Paterno")); ?>
        <?php echo $form->error($modelPersons,'last_name1'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelPersons,'last_name2'); ?>
        <?php echo $form->textField($modelPersons,'last_name2',array('placeholder'=>"Apelido Materno")); ?>
        <?php echo $form->error($modelPersons,'last_name2'); ?>
    </div>

    <div class="row">   
        <?php echo $form->labelEx($modelPersons,'curp_passport'); ?>
        <?php echo $form->textField($modelPersons,'curp_passport',array('placeholder'=>"Pasaporte/Curp")); ?>
        <?php echo $form->error($modelPersons,'curp_passport'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'crear' : 'Guardar'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
