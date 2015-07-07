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
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'Acta', 'title'=>'Acta'));?>
		
	</div>
	
	<div class="row">
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'CURP', 'title'=>'Curp'));?>
		
	</div>

	<div class="row">
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'IFE', 'title'=>'IFE'));?>

	</div>

	<div class="row">
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'Pasaporte', 'title'=>'Pasaporte'));?>
	
	</div>

<hr>

	<div class="row buttons">
		<?php echo CHtml::htmlButton('Guardar',array(
                'onclick'=>'send("docs-form", "curriculumVitae/docsIdentity", "'.$model->id.'","curriculumVitae/docsIdentity","");',
                 //'id'=> 'post-submit-btn', 
                'class'=>'savebutton',
            ));
   		 ?>
		<?php echo CHtml::Button('Cancelar',array('submit' => array('curriculumVitae/index'),'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->
		 
