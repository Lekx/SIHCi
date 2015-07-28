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
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
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
				<?php echo $form->textArea($model,'project_name',array('size'=>45,'maxlength'=>45,'placeholder'=>'Nombre del proyecto','title'=>'Nombre del proyecto')); ?>
				<?php echo $form->error($model,'project_name'); ?>
			</div>

			<div class="row">
				<?php echo $form->textArea($model,'description',array('size'=>60,'maxlength'=>150,'placeholder'=>'Descripción','title'=>'Descripción')); ?>
				<?php echo $form->error($model,'description'); ?>
			</div>

			<div class="row">
				<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>150,'placeholder'=>'Palabras clave','title'=>'Palabras clave')); ?>
				<?php echo $form->error($model,'keywords'); ?>
			</div>
	</div>



<div class="row">
		<?php 
		echo $form->fileField($model,'doc_commitment',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_commitment'))); ?>
		<?php $form->error($model,'doc_commitment'); ?>
	</div>

<div class="row">
		<?php echo $form->fileField($model,'doc_auth_cofepris',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_auth_cofepris'))); ?>
		<?php echo $form->error($model,'doc_auth_cofepris'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_project',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_project'))); ?>
		<?php echo $form->error($model,'doc_project'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_brochure',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_brochure'))); ?>
		<?php echo $form->error($model,'doc_brochure'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_consent',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_consent'))); ?>
		<?php echo $form->error($model,'doc_consent'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_amendment',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_amendment'))); ?>
		<?php echo $form->error($model,'doc_amendment'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_bank_payment',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_bank_payment'))); ?>
		<?php echo $form->error($model,'doc_bank_payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_edu_guides',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_edu_guides'))); ?>
		<?php echo $form->error($model,'doc_edu_guides'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_project_dev_guides',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_project_dev_guides'))); ?>
		<?php echo $form->error($model,'doc_project_dev_guides'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_recruitment',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_recruitment'))); ?>
		<?php echo $form->error($model,'doc_recruitment'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_conclusion_criteria',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_conclusion_criteria'))); ?>
		<?php echo $form->error($model,'doc_conclusion_criteria'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_confidentiality',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_confidentiality'))); ?>
		<?php echo $form->error($model,'doc_confidentiality'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_interests_conflict',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_interests_conflict'))); ?>
		<?php echo $form->error($model,'doc_interests_conflict'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_patient_payment',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_patient_payment'))); ?>
		<?php echo $form->error($model,'doc_patient_payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'doc_participants',array('size'=>60,'maxlength'=>150,'title'=>$model->getAttributeLabel('doc_participants'))); ?>
		<?php echo $form->error($model,'doc_participants'); ?>
	</div>



	<div class="row buttons">
	<?php echo CHtml::htmlButton('Enviar',array(
                'onclick'=>'send("sponsorship-form", "sponsorship/create", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "")',
                'class'=>'savebutton',
            ));
    ?>
    <?php echo CHtml::Button('Cancelar',array('submit' => array('sponsorship'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
