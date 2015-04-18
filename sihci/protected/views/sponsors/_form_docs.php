<?php
/* @var $this SponsorsDocsController */
/* @var $model SponsorsDocs */
/* @var $form CActiveForm */
/*
$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
'targetClass'=>'emails',
'addButtonLabel'=>'Agregar nuevo',
));
 */

?>


<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'sponsors-docs-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
));?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>



	<?php echo $form->errorSummary($model);?>


	<div class="row">
	Decreto de creación, acta constitutiva o documento que acredite la creación de la empresa:
		<?php echo $form->fileField($model, 'path', array('name' => 'Doc1'));?>
		<img style="width:75px;height:auto;" src="<?php echo Yii::app()->request->baseUrl . "/" . "Sponsors" . "/" . "1" . "/" . "docs" . "/" . "Acreditacion de las facultades del representante o apoderado.jpg";?>">
	</div>
	<div class="row">
	Documento con el que se acreditan las facultades del representante o apoderado (poder, acta de asamblea, nombramiento, etc.)
		<?php echo $form->fileField($model, 'path', array('name' => 'Doc2'));?>
		<img style="width:75px;height:auto;" src="<?php echo Yii::app()->request->baseUrl . "/" . "Sponsors" . "/" . "1" . "/" . "docs" . "/" . "Documento que acredite la creacion de la empresa.jpg";?>">
	</div>
	<div class="row">
	Licencias, autorizaciones, permisos para las actividades, etc.
		<?php echo $form->fileField($model, 'path', array('name' => 'Doc3'));?>
		<img style="width:75px;height:auto;" src="<?php echo Yii::app()->request->baseUrl . "/" . "Sponsors" . "/" . "1" . "/" . "docs" . "/" . "Permisos de actividades.jpg";?>">
	</div>
	<div class="row">
	RFC o equivalente (empresa)
		<?php echo $form->fileField($model, 'path', array('name' => 'Doc4'));?>
		<img style="width:75px;height:auto;" src="<?php echo Yii::app()->request->baseUrl . "/" . "Sponsors" . "/" . "1" . "/" . "docs" . "/" . "RFC o equivalente.jpg";?>">
	</div>
	<div class="row">
	Comprobante de domicilio (opcional para extranjeras)
		<?php echo $form->fileField($model, 'path', array('name' => 'Doc5'));?>
		<img style="width:75px;height:auto;" src="<?php echo Yii::app()->request->baseUrl . "/" . "Sponsors" . "/" . "1" . "/" . "docs" . "/" . "Comprobante de domicilio.jpg";?>">
	</div>
	<div class="row">
	Identificación Oficial del Representante
		<?php echo $form->fileField($model, 'path', array('name' => 'Doc6'));?>
		<img style="width:75px;height:auto;" src="<?php echo Yii::app()->request->baseUrl . "/" . "Sponsors" . "/" . "1" . "/" . "docs" . "/" . "Identificacion Oficial del Representante.jpg";?>">
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->