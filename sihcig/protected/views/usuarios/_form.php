<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<label>Roles</label>
		<select name="Usuarios[id_rol]" id="Usuarios_id_rol">
		<option></option>
		<?php
			foreach($Roles as $Roles)
			{
		?>
		<option value="<?php echo $Roles->id;?>"><?php echo $Roles->rol;?></option>
		<?php
			}
		?>
		</select>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<p>Verificacion de Email</p>
		 <input type="text" name="Usuarios[email2]" id="Usuarios_email2"></input>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contrasena'); ?>
		<?php echo $form->textField($model,'contrasena',array('maxlength'=>30)); ?>
		<?php echo $form->error($model,'contrasena'); ?>
	</div>

	<div class="row">
		<p>Verificacion de contraseña</p>
		 <input type="password" name="Usuarios[contrasena2]" id="Usuarios_contrasena2"></input>
	</div>

<!--
	<div class="row">
		<?php /*echo $form->labelEx($model,'fecha_registro'); ?>
		<?php echo $form->textField($model,'fecha_registro'); ?>
		<?php echo $form->error($model,'fecha_registro') */; ?>
	</div>
-->

<!--
	<div class="row">
		<?php /*echo $form->labelEx($model,'fecha_activacion'); ?>
		<?php echo $form->textField($model,'fecha_activacion'); ?>
		<?php echo $form->error($model,'fecha_activacion'); */?>
	</div>
-->

<!--
	<div class="row">
		<?php /*echo $form->labelEx($model,'llave_act_rec'); ?>
		<?php echo $form->textField($model,'llave_act_rec',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'llave_act_rec'); */?>
	</div>
-->

<!--
	<div class="row">
		<?php /*echo $form->labelEx($model,'estatus'); ?>
		<?php echo $form->textField($model,'estatus'); ?>
		<?php echo $form->error($model,'estatus'); */?>
	</div>
-->

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->