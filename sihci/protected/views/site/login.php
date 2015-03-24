
<div class="loginback">
	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'action' => $this->createUrl('site/login'),
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,

		),
	)); ?>

		<div class="row">
		<div class="inner-addon right-addon">
			 <i class="glyphicon glyphicon-envelope"></i>
			<?php echo $form->textField($model,'username', array('placeholder'=>"Email..")); ?>
					
		</div>
			<!--  <?php echo $form->error($model,'username'); ?> -->
		</div>

		<div class="row">
			<div class="inner-addon right-addon">
				<i class="glyphicon glyphicon-lock"></i>
				<?php echo $form->passwordField($model,'password', array('placeholder'=>"Contraseña..")); ?>
			</div>
		<!-- 	<?php echo $form->error($model,'password'); ?> -->
		</div>

		<!-- <div class="row">
		<a href="<?php echo Yii::app()->createUrl('/site/recoverypassword');?>">¿Olvidó su Contraseña?</a>
		</div> -->

		<div class="row buttons">
			<?php echo CHtml::submitButton('Ingresar a mi cuenta'); ?>
		</div>
	<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>