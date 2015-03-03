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

	<p class="note">Los campos marcados con <span class="required">*</span> son necesarios.</p>
	<?php Yii::app()->bootstrap->register(); ?>
	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->errorSummary($modelPersons); ?>

	
	<!--<div class="row">
		<label>Rol</label>
		<select name="Usuarios[id_rol]" id="Usuarios_id_rol" placeholder="ROLES">
		<option></option>
		<?php
			//foreach($Roles as $Roles)
			{
		?>
		<option value="<?php //echo $Roles->id;?>"><?php //echo $Roles->rol;?></option>
		<?php
			}
		?>
		</select>
	</div>-->

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
	        <p>Pais</p>
	        <?php
	        $this->widget(
	            'yiiwheels.widgets.formhelpers.WhCountries',
	            array(
	                'name' => 'Persons[country]',
	                'id' => 'Persons_country',
	                'value' => 'MX',
	                'useHelperSelectBox' => true,
	                'pluginOptions' => array(
	                    'country' => '',
	                    'language' => 'es_ES',
	                    'flags' => true
	                )
	            )
	        );
	        ?>
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
		<?php echo $form->labelEx($modelPersons,'rfc_rud'); ?>
		<?php echo $form->textField($modelPersons,'rfc_rud',array('placeholder'=>"Pasaporte/Curp")); ?>
		<?php echo $form->error($modelPersons,'rfc_rud'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->