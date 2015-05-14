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
		echo "<a href='".Yii::app()->baseUrl."".$getDocs[$key]->doc_id."' target='_blank'>  Archivo ".$getDocs[$key]->type."</a> <br>";
		echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteDocs','id'=>$getDocs[$key]->id, 'pathDoc'=>$getDocs[$key]->doc_id),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething'));
		echo "<hr>";
	}

	?>
	
	<?php echo $form->error($model,'doc_id'); ?>
	<div class="row">
	<h5>Acta de Nacimiento:</h5>
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'Acta'));?>
		
	</div>
	
	<div class="row">
		<h5>CURP:</h5>
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'CURP'));?>
		
	</div>

	<div class="row">
		<h5>IFE:</h5>
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'IFE'));?>

	</div>

	<div class="row">
		<h5>Pasaporte:</h5>
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'Pasaporte'));?>
	
	</div>

<hr>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', array('confirm'=>'¿Seguro que desea Guardar?','class'=>'savebutton'));?>
		<?php echo CHtml::Button('Cancelar',array('submit' => array('curriculumVitae/index'),'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->
		 
