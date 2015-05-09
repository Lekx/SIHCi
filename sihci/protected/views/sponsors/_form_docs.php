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


<?php
/*
echo "<pre>";
print_r($modelDocs);
echo "</pre>";
*/

//echo $modelDocs[0]->path . " " . $modelDocs[0]->file_name;?>

	<?php echo $form->errorSummary($model);?>
	<!--<?php //print_r($modelDocs); ?>-->

	<div class="row">
	<h5>Decreto de creación, acta constitutiva o documento que acredite la creación de la empresa:</h5>
		<?php echo $form->fileField($model, 'path', array('name' => 'Doc1'));?>

		<?php 
		//var_dump(array_key_exists('Documento que acredite la creacion de la empresa', $modelDocs));
			if(array_key_exists('Documento_que_acredite_la_creacion_de_la_empresa', $modelDocs))
				echo "<a href='".Yii::app()->request->baseUrl."/".$modelDocs['Documento_que_acredite_la_creacion_de_la_empresa'][1]."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$modelDocs['Documento_que_acredite_la_creacion_de_la_empresa'][1]."' style='width:75px;height:auto;'></a>";
		?>
	</div>
	<div class="row">
	<h5>Documento con el que se acreditan las facultades del representante o apoderado (poder, acta de asamblea, nombramiento, etc.)</h5>
		<?php echo $form->fileField($model, 'path', array('name' => 'Doc2'));?>
		<?php 
		//var_dump(array_key_exists('Documento que acredite la creacion de la empresa', $modelDocs));
			if(array_key_exists('Acreditacion_de_las_facultades_del_representante_o_apoderado', $modelDocs))
				echo "<a href='".Yii::app()->request->baseUrl."/".$modelDocs['Acreditacion_de_las_facultades_del_representante_o_apoderado'][1]."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$modelDocs['Acreditacion_de_las_facultades_del_representante_o_apoderado'][1]."' style='width:75px;height:auto;'></a>";
		?>		
	</div>
	<div class="row">
	<h5>Licencias, autorizaciones, permisos para las actividades, etc.</h5>
		<?php echo $form->fileField($model, 'path', array('name' => 'Doc3'));?>
		<?php 
		//var_dump(array_key_exists('Documento que acredite la creacion de la empresa', $modelDocs));
			if(array_key_exists('Permisos_de_actividades', $modelDocs))
				echo "<a href='".Yii::app()->request->baseUrl."/".$modelDocs['Permisos_de_actividades'][1]."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$modelDocs['Permisos_de_actividades'][1]."' style='width:75px;height:auto;'></a>";
		?>		
	</div>
	<div class="row">
	<h5>RFC o equivalente (empresa)</h5>
		<?php echo $form->fileField($model, 'path', array('name' => 'Doc4'));?>
		<?php 
		//var_dump(array_key_exists('Documento que acredite la creacion de la empresa', $modelDocs));
			if(array_key_exists('RFC_o_equivalente', $modelDocs))
				echo "<a href='".Yii::app()->request->baseUrl."/".$modelDocs['RFC_o_equivalente'][1]."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$modelDocs['RFC_o_equivalente'][1]."' style='width:75px;height:auto;'></a>";
		?>	
	</div>
	<div class="row">
	<h5>Comprobante de domicilio (opcional para extranjeras)</h5>
		<?php echo $form->fileField($model, 'path', array('name' => 'Doc5'));?>
		<?php 
		//var_dump(array_key_exists('Documento que acredite la creacion de la empresa', $modelDocs));
			if(array_key_exists('Comprobante_de_domicilio', $modelDocs))
				echo "<a href='".Yii::app()->request->baseUrl."/".$modelDocs['Comprobante_de_domicilio'][1]."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$modelDocs['Comprobante_de_domicilio'][1]."' style='width:75px;height:auto;'></a>";
		?>	
	</div>
	<div class="row">
	<h5>Identificación Oficial del Representante</h5>
		<?php echo $form->fileField($model, 'path', array('name' => 'Doc6'));?>
		<?php 
		//var_dump(array_key_exists('Documento que acredite la creacion de la empresa', $modelDocs));
			if(array_key_exists('Identificacion_Oficial_del_Representante', $modelDocs))
				echo "<a href='".Yii::app()->request->baseUrl."/".$modelDocs['Identificacion_Oficial_del_Representante'][1]."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$modelDocs['Identificacion_Oficial_del_Representante'][1]."' style='width:75px;height:auto;'></a>";
		?>	
	</div>

	<div class="row buttons">
		<!-- cambiar todo a español y este boton-->
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', array('confirm'=>'¿Seguro que desea Guardar?','class'=>'savebutton'));?>
		<input class="cleanbutton" type="button" value="Borrar">
		<?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->