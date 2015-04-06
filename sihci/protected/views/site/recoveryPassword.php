
<div class="recoverypass">
		<div class="form">
		<?php $form = $this->beginWidget('CActiveForm',
			array(
				'id'=>'recovery-form',
				'method' => 'POST',
				'action' => Yii::app()->createUrl('site/recoveryPassword'),
				'enableClientValidation' => true,
				'clientOptions' => array(
					'validateOnSubmit' => true,
					),
				));
		?>
			<div class="revoverytitle">
				<h2>¡No te preocupes!</h2>
				<hr>
			</div>
			<div id="recoveryinfo">
				Enviaremos un correo electronico, donde podrás cambiar tu contraseña.
			</div>
			<div class="inputlog">
				<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-envelope"></i>
					<?php echo $form->textField($model,'email', array('placeholder'=>"Email..")); ?>
					<!-- <?php echo $form->error($model,'email'); ?> -->

				</div>
				<div class="infodialog3">
					<p>Favor de ingresar su correo de registro.</p>
				</div>
			</div>
			<div class="">
				<?php echo CHtml::submitButton('Recuperar Contraseña') ; ?>
			</div>

		<?php $this->endWidget(); ?>

			<div class="closerecovery">
				No Recuperar Contraseña <i class="glyphicon glyphicon-remove"></i>
			</div>

		</div>
</div>