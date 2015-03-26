
<div class="loginback">
	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableAjaxValidation'=>true,
		'action' => $this->createUrl('site/login'),
		'enableClientValidation'=>true,
		'clientOptions'=>array(
		),
	)); ?>

		<div class="row">
			<div class="inputlog">
				<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-envelope"></i>
					<?php echo $form->textField($model,'username', array('placeholder'=>"Email..")); ?>

				</div>
			</div>
				<div class="infodialog">
				<p>Favor de ingresar su correo de registro.</p>
				</div>
		</div>
	
		<div class="row">
			<div class="inputlog">
				<div class="inner-addon right-addon">
					<i class="glyphicon glyphicon-lock"></i>
					<?php echo $form->passwordField($model,'password', array('placeholder'=>"Contraseña..")); ?>
				</div>
			</div>
				<div class="infodialog1">
				<p>Favor de ingresar su contraseña.</p>
				</div>
		</div>

		<!-- <div class="row">
		<a href="<?php echo Yii::app()->createUrl('/site/recoverypassword');?>">¿Olvidó su Contraseña?</a>
		</div> -->
	
		<div class="row buttons">
			<?php echo CHtml::submitButton('Ingresar a mi cuenta'); ?>
		</div>
 	
		<div class="">
			<a href="<?php echo Yii::app()->createUrl('/site/recoverypassword');?>"><?php echo CHtml::Button('Recuperar Contraseña'); ?></a>

		</div>
	<?php $this->endWidget(); ?>
		
		<div class="closelogin">
			No deseo Ingresar <i class="glyphicon glyphicon-remove"></i>
		</div>
	</div><!-- form -->



</div>