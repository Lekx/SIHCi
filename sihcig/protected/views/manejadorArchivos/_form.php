<?php
/* @var $this ManejadorArchivosController */
/* @var $model ManejadorArchivos */
/* @var $form CActiveForm */
?>

<div class="form">
<?php Yii::app()->bootstrap->register(); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'manejador-archivos-form',

	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


<div class="row">
    <div class="col-md-3">
        <p>Seccion</p>
        <?php
        $this->widget(
            'yiiwheels.widgets.formhelpers.WhSelectBox',
            array(
                'name' => 'ManejadorArchivos[seccion]',
                'value' => 'quepedo',
                'htmlOptions' => array(
            	'placeholder' => 'Seleccione una seccion.'),
                'data' => array(
                	isset($model->seccion) ? $model->seccion : '',
				   "OPD HCG",
					   '<option value="Direccion general">Dirección general</option>',
					   '<option value="Subdireccion general de ensenanza e investigacion">Subdirección general de enseñanza e investigación</option>',
					   '<option value="Organigrama">Organigrama</option>',
					   '<option value="Normatividad de investigacion">Normatividad de investigación</option>',
					   '<option value="Registro RENIECYT">Registro RENIECYT</option>',
					   '<option value="Tramites y servicios">Trámites y servicios</option>',
					   '<option value="Transparencia">Transparencia</option>',
					   '<option value="FInEHC">FInEHC</option>',
					   '<option value="Plano de ubicacion">Plano de ubicación</option>',
				   '</optgroup>',
				   '<optgroup label="Comités">',
				   		'<option value="Comites">Comités</option>',
				   '</optgroup>',
				   '<optgroup label="Programas de generación de conocimiento científico">',
				   		'<option value="Redaccion científica">Redacción científica</option>',
				   		'<option value="Asesoría metodológica">Asesoría metodológica</option>',
				   		'<option value="Asesoria de correccion de estilo de redaccion en espanol u otros idiomas">Asesoría de corrección de estilo de redacción en español u otros idiomas</option>',
				   		'<option value="Lineas de generacion de conocimiento cientifico">Líneas de generación de conocimiento científico</option>',
				   '</optgroup>',
				   '<optgroup label="Programas de desarrollo tecnologico e innovacion">',
				   		'<option value="proINVENCI">proINVENCI</option>',
				   '</optgroup>',
				    '<optgroup label="Programas de cooperación internacional en investigación">',
				   		'<option value="Programas de cooperacion internacional en investigacion">Programas de cooperación internacional en investigación</option>',
				   '</optgroup>',
				    '<optgroup label="Centro de investigación clínica medicina traslacional">',
				   		'<option value="Centro de investigacion clinica medicina traslacional">Centro de investigación clínica medicina traslacional</option>',
				   '</optgroup>',
				   '<optgroup label="Unidades de investigación">',
				   		'<option value="Unidades de investigacion">Unidades de investigación</option>',
				   '</optgroup>',
				   '<optgroup label="Laboratorios de investigación">',
				   		'<option value="Laboratorios de investigacion">Laboratorios de investigación</option>',
				   '</optgroup>',
				   '<optgroup label="Vinculación con universidades, institutos y hospitales">',
				   		'<option value="Vinculacion con universidades, institutos y hospitales">Vinculación con universidades, institutos y hospitales</option>',
				   '</optgroup>',

  
    /*


'Formación de recursos en investigación',
	'Programas PNCP',
	'Programas nO PNCP',
	'Programas no médicos',


'Revistas científicas',
	'Revistas científicas',

'Unidad Editorial',
	'Unidad Editorial'*/

                )
            )
        );
        ?>
    </div>
        </div>
	





	<div class="row">
		<?php echo $form->labelEx($model,'nombre_archivo'); ?>
		<?php echo $form->textField($model,'nombre_archivo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombre_archivo'); ?>
	</div>

	<!--<div class="row">
		<?php /* echo $form->labelEx($model,'ruta'); ?>
		<?php echo $form->textField($model,'ruta',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ruta'); */ ?>
	</div>-->


<div class="row">
    <?php echo $form->labelEx($model,'ruta'); ?>
    <?php echo $form->fileField($model,'ruta'); ?>
    <?php echo $form->error($model,'ruta'); ?>
  </div>


	



<div class="row">

	<div class="col-md-3">
        <p>Fecha de Inicio</p>
        <?php
        $this->widget(
            'yiiwheels.widgets.formhelpers.WhDatePickerHelper',
            array(
                'htmlOptions' => array('class' => 'input-medium',),
                'name' => 'ManejadorArchivos[fecha_inicio]',
               	'pluginOptions' => array(
               		'format' => 'd/m/y',
               		'language' => 'en',
               		'date' => isset($model->fecha_inicio) ? $model->fecha_inicio : '',
               	),
                
          	)

            
        );
        //echo isset($model->fecha_inicio) ? $model->fecha_inicio : '';
        ?>
    </div>
</div><br>
        

<div class="row">
	<div class="col-md-3">
        <p>Fecha de Final</p>
        <?php
        $this->widget(
            'yiiwheels.widgets.formhelpers.WhDatePickerHelper',
            array(
                'htmlOptions' => array('class' => 'input-medium'),
                'name' => 'ManejadorArchivos[fecha_fin]',
                'pluginOptions' => array(
	                'format' => 'd/m/y',
	           		'language' => 'en',
	           		'date' => isset($model->fecha_fin) ? $model->fecha_fin : '',
                ),
  
			)
		);
        ?>
    
        </div>
  </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->