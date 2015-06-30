<?php
/* @var $this SponsorshipController */
/* @var $model Sponsorship */
/* @var $form CActiveForm */

$researcher = "";
$sponsor = "";
if(!$model->isNewRecord){
	$researcher = $model->idUserResearcher->persons[0];
	$researcher = $researcher['last_name1']." ".$researcher['last_name2'].", ".$researcher['names'];
	$sponsor = $model->idUserSponsorer->sponsors[0];
	$sponsor = $sponsor['sponsor_name'];
}


?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sponsorship-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<?php echo $form->labelEx($model,'id_user_sponsorer'); ?>

	<?php
		$this->widget('ext.MyAutoComplete', array(
		    'model'=>$model,
		    'attribute'=>'id_user_sponsorer',
		    'name'=>'Sponsorship[id_user_sponsorer]',
		    'id'=>'id_user_sponsorer',
		    'value'=>$sponsor,
		    'source'=>$this->createUrl('/adminProjects/getSponsors'),  
		    'options'=>array(
		        'minLength'=>'0' 
		    ),
		));
	?>

		<?php echo $form->error($model,'id_user_sponsorer'); ?>
			</div>

	<div class="row">
	<?php echo $form->labelEx($model,'id_user_researcher'); ?>

	<?php
		$this->widget('ext.MyAutoComplete', array(
		    'model'=>$model,
		    'attribute'=>'id_user_researcher',
		    'name'=>'Sponsorship[id_user_researcher]',
		    'id'=>'id',
		    'value'=>$researcher,
		    'source'=>$this->createUrl('/sponsorship/getResearchers'),  
		    'options'=>array(
		        'minLength'=>'0' 
		    ),
		));
	?>
		<?php echo $form->error($model,'id_user_researcher'); ?>
			</div>
	<div class="row">
		<?php echo $form->labelEx($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'project_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->