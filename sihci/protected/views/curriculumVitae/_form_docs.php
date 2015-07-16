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
	// foreach ($getDocs as $key => $value) {
	// 	echo "<a href='".Yii::app()->baseUrl."".$getDocs[$key]->doc_id."' target='_blank'>  Archivo ".$getDocs[$key]->type."</a> <br>";
	// 	echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteDocs','id'=>$getDocs[$key]->id, 'pathDoc'=>$getDocs[$key]->doc_id),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething'));
	// 	echo "<hr>";
	// }

	?>

	<?php echo $form->errorSummary($model);?>

	<div class="row">
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'Acta', 'title'=>'Acta de Nacimiento'));?>
			<div id="DocsIdentity_doc_id1_em_" class="errorMessage" style="display:none;"></div>
			<?php
				if(array_key_exists('Acta', $modelDocs)){
					echo "<a href='".Yii::app()->request->baseUrl."/".$modelDocs['Acta'][1]."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$modelDocs['Acta'][1]."' style='width:75px;height:auto;'></a>";
					echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteDocs','id'=>$modelDocs['Acta'][0], 'pathDoc'=>$modelDocs['Acta'][1]),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething'));
			}
			?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'CURP', 'title'=>'Curp'));?>
		<div id="DocsIdentity_doc_id2_em_" class="errorMessage" style="display:none;"></div>
		<?php
			if(array_key_exists('CURP', $modelDocs)){
				echo "<a href='".Yii::app()->request->baseUrl."/".$modelDocs['CURP'][1]."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$modelDocs['CURP'][1]."' style='width:75px;height:auto;'></a>";
				echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteDocs','id'=>$modelDocs['CURP'][0], 'pathDoc'=>$modelDocs['CURP'][1]),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething'));
		}
		?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'IFE', 'title'=>'IFE'));?>
		<div id="DocsIdentity_doc_id3_em_" class="errorMessage" style="display:none;"></div>
		<?php
			if(array_key_exists('IFE', $modelDocs)){
				echo "<a href='".Yii::app()->request->baseUrl."/".$modelDocs['IFE'][1]."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$modelDocs['IFE'][1]."' style='width:75px;height:auto;'></a>";
				echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteDocs','id'=>$modelDocs['IFE'][0], 'pathDoc'=>$modelDocs['IFE'][1]),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething'));
		}
		?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model, 'doc_id', array('name' => 'Pasaporte', 'title'=>'Pasaporte'));?>
		<div id="DocsIdentity_doc_id4_em_" class="errorMessage" style="display:none;"></div>
		<?php
			if(array_key_exists('Pasaporte', $modelDocs)){
				echo "<a href='".Yii::app()->request->baseUrl."/".$modelDocs['Pasaporte'][1]."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$modelDocs['Pasaporte'][1]."' style='width:75px;height:auto;'></a>";
				echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteDocs','id'=>$modelDocs['Pasaporte'][0], 'pathDoc'=>$modelDocs['Pasaporte'][1]),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething'));
		}
		?>
	</div>

<hr>

	<div class="row buttons">
		<?php echo CHtml::htmlButton('Guardar',array(
                'onclick'=>'send("docs-form", "curriculumVitae/docsIdentity", "'.$model->id.'","curriculumVitae/docsIdentity","");',
                 //'id'=> 'post-submit-btn',
                'class'=>'savebutton',
            ));
   		 ?>
	<?php echo CHtml::link('Cancelar',array('curriculumVitae/docsIdentity'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->
