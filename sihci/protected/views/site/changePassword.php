<div class="loginback">
		<div class="newpass">
				<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'account-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>true,
	)); ?>

	<h1>¡Nueva contraseña!</h1>
	<hr>
	<p>
		Recuerda anotar o aprender tu nueva contraseña antes de generala
	</p>
			<div class="row">
					<div class="inner-addon right-addon">
						<i class="glyphicon glyphicon-lock"></i>
					<input type="password" name="ChangePassword[password2]" id="Account_password2" placeholder="Nueva Contraseña" title="Nueva Contraseña" oncopy="return false;" onpaste="return false;" oncut="return false;" maxlength="12">
			</div>
		</div>

				<div class="row">
					<div class="inner-addon right-addon">
						<i class="glyphicon glyphicon-lock"></i>
					<input type="password" name="ChangePassword[password22]" id="Account_password22" placeholder="Repetir Nueva Contraseña" title="Repetir Nueva Contraseña" oncopy="return false;" onpaste="return false;" oncut="return false;" maxlength="12">
			</div>
		</div>

					<?php echo CHtml::submitButton("Establecer nueva contraseña", array('confirm'=>'¿Seguro que desea Guardar?','class'=>'savebutton') ); ?>

				<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
<!-- form -->
