<?php
/* @var $this DocsIdentityController */
/* @var $model DocsIdentity */
/* @var $form CActiveForm */
 // $this->widget('ext.widgets.reCopy.ReCopyWidget', array(
 //     'targetClass'=>'docs',
 //     'addButtonLabel'=>'Agregar nuevo',
 //     'limit'=>4,
 //  )); 
?>
<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'docs-form',
	'enableAjaxValidation' => true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
));?>



	<?php
	foreach ($getDocs as $key => $value) {
		echo "<a href='/SIHCi/sihci".$getDocs[$key]->doc_id."' target='_blank'>  Archivo ".$getDocs[$key]->type."</a> <br>";
		echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteDocs', 'id'=>$getDocs[$key]->id, 'pathDoc'=>$getDocs[$key]->doc_id),'confirm'=>'¿Seguro que desea eliminarlo?'));
		echo "<hr>";
	}

	?>
	
	<?php echo $form->error($model,'doc_id'); ?>
	<div class="row">
	Acta de Nacimiento
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'Acta'));?>
		
	</div>
	
	<div class="row">
	CURP
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'CURP'));?>
		
	</div>

	<div class="row">
	IFE
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'IFE'));?>

	</div>

	<div class="row">
	Pasaporte
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'Pasaporte'));?>
	
	</div>

<hr>

	


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', array('confirm'=>'¿Seguro que desea Guardar?'));?>
		<?php echo CHtml::Button('Cancelar',array('submit' => array('curriculumVitae/index'),'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->
		 
