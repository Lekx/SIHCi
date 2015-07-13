<?php
/* @var $this SponsorshipController */
/* @var $model Sponsorship */
/* @var $form CActiveForm */

$researcher = "";
if(!$model->isNewRecord){
	$researcher = $model->idUserResearcher->persons[0];
	$researcher = $researcher['last_name1']." ".$researcher['last_name2'].", ".$researcher['names'];
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

	<?php //echo $form->errorSummary($model); ?>
	<div class="row">

	<?php
		$this->widget('ext.MyAutoComplete', array(
		    'model'=>$model,
		    'attribute'=>'id_user_researcher',
		    'name'=>'Sponsorship[id_user_researcher]',
		    'id'=>'Sponsor',
		    'value'=>$researcher,
		    'source'=>$this->createUrl('/sponsorship/getResearchers'),
		    'options'=>array(
		        'minLength'=>'0',
		    ),
		));


	?>

		<?php echo $form->error($model,'id_user_researcher'); ?>
			</div>
			<div class="row">
				<?php echo $form->textField($model,'project_name',array('size'=>45,'maxlength'=>45,'placeholder'=>'Nombre del proyecto','title'=>'Nombre del proyecto')); ?>
				<?php echo $form->error($model,'project_name'); ?>
			</div>

			<div class="row">
				<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>150,'placeholder'=>'Descripción','title'=>'Descripción')); ?>
				<?php echo $form->error($model,'description'); ?>
			</div>

			<div class="row">
				<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>150,'placeholder'=>'Palabras clave','title'=>'Palabras clave')); ?>
				<?php echo $form->error($model,'keywords'); ?>
			</div>
	</div>


	<div class="row buttons">
		<?php echo CHtml::htmlButton($model->isNewRecord ? 'Guardar': 'Modificar',array(
							'onclick'=>'send("sponsorship-form","sponsorship/'.($model->isNewRecord ? 'create' : 'update').'", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","sponsorship/admin","")',
							'class'=>'savebutton',
					));
			?>
			 <?php echo CHtml::link('Cancelar',array('sponsorship/admin')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
