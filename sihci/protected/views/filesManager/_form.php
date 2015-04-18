

<div class="form">
	<?php Yii::app()->bootstrap->register(); 
Yii::app()->clientScript->registerCssFile(
	Yii::app()->clientScript->getCoreScriptUrl().
	'/jui/css/base/jquery-ui.css'
);
Yii::app()->getClientScript()->registerCoreScript( 'jquery' );
Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'files-manager-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo YiiBase::getPathOfAlias("webroot")?>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
    
       
			<label for="files">Seccion</label>
			<select name="FilesManager[section]" id="FilesManager_section" >
				  	<optgroup label="OPD HCG"> 
				  		<option value=""> </option>
					   <option value="Direccion general">Dirección general</option>
					   <option value="Subdireccion general de ensenanza e investigacion">Subdirección general de enseñanza e investigación</option>
					   <option value="Organigrama">Organigrama</option>
					   <option value="Normatividad de investigacion">Normatividad de investigación</option>
					   <option value="Registro RENIECYT">Registro RENIECYT</option>
					   <option value="Tramites y servicios">Trámites y servicios</option>
					   <option value="Transparencia">Transparencia</option>
					   <option value="FInEHC">FInEHC</option>
					   <option value="Plano de ubicacion">Plano de ubicación</option>
				   </optgroup>
				   <optgroup label="Comités">
				   		<option value="Comites">Comités</option>
				   </optgroup>
				   <optgroup label="Programas de generación de conocimiento científico">
				   		<option value="Redaccion científica">Redacción científica</option>
				   		<option value="Asesoría metodológica">Asesoría metodológica</option>
				   		<option value="Asesoria de correccion de estilo de redaccion en espanol u otros idiomas">Asesoría de corrección de estilo de redacción en español u otros idiomas</option>
				   		<option value="Lineas de generacion de conocimiento cientifico">Líneas de generación de conocimiento científico</option>
				   </optgrou
				   <optgroup label="Programas de desarrollo tecnologico e innovacion">
				   		<option value="proINVENCI">proINVENCI</option>
				   </optgroup>
				    <optgroup label="Programas de cooperación internacional en investigación">
				   		<option value="Programas de cooperacion internacional en investigacion">Programas de cooperación internacional en investigación</option>
				   </optgroup>
				    <optgroup label="Centro de investigación clínica medicina traslacional">
				   		<option value="Centro de investigacion clinica medicina traslacional">Centro de investigación clínica medicina traslacional</option>
				   </optgroup>
				   <optgroup label="Unidades de investigación">
				   		<option value="Unidades de investigacion">Unidades de investigación</option>
				   </optgroup>
				   <optgroup label="Laboratorios de investigación">
				   		<option value="Laboratorios de investigacion">Laboratorios de investigación</option>
				   </optgroup>
				   <optgroup label="Vinculación con universidades, institutos y hospitales">
				   		<option value="Vinculacion con universidades, institutos y hospitales">Vinculación con universidades, institutos y hospitales</option>
				   </optgroup>
				   <optgroup label="Formación de recursos en investigación">
				   		<option value="Programas PNCP">Programas PNCP</option>
				   		<option value="Programas no PNCP">Programas no PNCP</option>
				   		<option value="Programas no médicos">Programas no médicos</option>
				   </optgroup>
				    <optgroup label="Revistas científicas">
				   		<option value="Revistas científicas">Revistas científicas</option>
				   </optgroup>
				    <optgroup label="Unidad Editorial">
				   		<option value="Unidad Editorial">Unidad Editorial</option>
				   </optgroup>
			</select>
   	
      </div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_name'); ?>
		<?php echo $form->textField($model,'file_name',array('size'=>50,'maxlength'=>50,'placeholder'=>"Nombre del documento")); ?>
		<?php echo $form->error($model,'file_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'path'); ?>
		<?php echo $form->fileField($model,'path'); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>

	<div class="row">
	  <p>Fecha de Inicio</p>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'language'=> 'es',
    'attribute' => 'start_date',
    'htmlOptions' => array(
    			'size' => '10',         
        		'maxlength' => '10', 
        		'placeholder'=>"Inicio de publicacion"   
    ),
));
?>
</div><br>

	<div class="row">
	  <p>Fecha de Inicio</p>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $model,
    'language'=> 'es',
    'attribute' => 'end_date',
    'htmlOptions' => array(
    			'size' => '10',         
        		'maxlength' => '10',  
        		'placeholder'=>"Final de publicacion"  
    ),
));
?>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->