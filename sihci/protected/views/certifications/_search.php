<?php
/* @var $this CertificationsController */
/* @var $model Certifications */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'searchValue',
	'action'=>Yii::app()->createUrl($this->route),
	'enableAjaxValidation'=>true,
	'method'=>'get',
)); ?>
   		<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-search"></i>
	   	<?php echo $form->textField($model,'searchValue',array('size'=>60,'maxlength'=>70, 'placeholder'=>'Folio, Especialidad, Referencia o Tipo de referencia', 'class'=>'searchcrud')); ?>	
		<?php echo CHtml::submitButton('',array('class'=>'searchcrudbut')); ?>
</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->