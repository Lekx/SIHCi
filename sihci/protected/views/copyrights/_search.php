<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */
/* @var $form CActiveForm */

?>
<!-- DO06- Barra de búsqueda -->

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'searchValue',
	'action'=>Yii::app()->createUrl($this->route),
	'enableAjaxValidation'=>true,
	'method'=>'get',
)); ?>
	<div class="row">
	
	   	<?php echo $form->textField($model,'searchValue',array('size'=>60,'maxlength'=>70, 'placeholder'=>'Ejemplo: Ricardo','class'=>'searchcrud')); ?>	
		<?php echo CHtml::submitButton('',array('class'=>'searchcrudbut')); ?>

	</div>
	 
<?php $this->endWidget(); ?> 

</div><!-- search-form -->