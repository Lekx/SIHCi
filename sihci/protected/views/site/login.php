<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Iniciar Sesión</h1>
<!-- 
<p>Please fill out the following form with your login credentials:</p> -->

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<?php echo sha1(md5(sha1("123456"))); ?>
<?php echo $msg; ?>
	<div class="row">

		<?php echo $form->textField($model,'username', array('placeholder'=>"Email")); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">

		<?php echo $form->passwordField($model,'password', array('placeholder'=>"Contraseña")); ?>
		<?php echo $form->error($model,'password'); ?>
		<!-- <p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p> -->
	</div>


	 
	<div class="row">
	<a href="<?php echo Yii::app()->createUrl('/site/recoverypassword');?>">¿Olvidó su Contraseña?</a>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Entrar'); ?>
	</div>
	

<?php $this->endWidget(); ?>
</div><!-- form -->
