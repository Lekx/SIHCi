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

	<?php echo $form->errorSummary($model); ?>

	
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
		<?php echo $form->textField($model,'password',array('maxlength'=>30,'placeholder'=>"Minimo 6 maximo 15 caracteres")); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<p>Verificacion de contraseña</p>
		<input type="password" name="Users[password2]" id="Users_password2" placeholder="Verificacion de Contraseña"></input>
	</div>

<!--
	<div class="row">
		<?php /* echo $form->labelEx($model,'registration_date'); ?>
		<?php echo $form->textField($model,'registration_date'); ?>
		<?php echo $form->error($model,'registration_date'); */ ?>
	</div>
-->
<!--
	<div class="row">
		<?php /* echo $form->labelEx($model,'activation_date'); ?>
		<?php echo $form->textField($model,'activation_date'); ?>
		<?php echo $form->error($model,'activation_date'); */ ?>
	</div>
	-->

<!--
	<div class="row">
		<?php /* echo $form->labelEx($model,'act_react_key'); ?>
		<?php echo $form->textField($model,'act_react_key',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'act_react_key'); */ ?>
	</div>
	-->

<!--
	<div class="row">
		<?php /* echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'status');  */ ?>
	</div>
	-->

	<div class="row">
		<?php echo $form->labelEx($modelAddresses,'town'); ?>
		<?php echo $form->textField($modelAddresses,'town',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($modelAddresses,'town'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->