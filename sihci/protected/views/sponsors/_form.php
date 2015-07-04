<?php
/* @var $this SponsorsController */
/* @var $model Sponsors */
/* @var $form CActiveForm */
	$cs = Yii::app()->getClientScript();
   $cs->registerScriptFile( Yii::app()->baseUrl. '/protected/views/sponsors/js/script.js');
?>




<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'sponsors-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableClientValidation' => true,
));?>


	<div class="row">

<div class="row">
  <span class="plain-select">
	<?php $this->widget('ext.CountrySelectorWidget', array(

		'value' => $modelAddresses->country,
		'name' => Chtml::activeName($modelAddresses, 'country'),
		'id' => Chtml::activeId($modelAddresses, 'country'),
		'useCountryCode' => false,
		'defaultValue' => 'Mexico',
		'firstEmpty' => true,
		'firstText' => 'Pais',

		)); ?>
</span>
        </div>

    <div class="row" class="">
		<?php echo $form->textField($modelAddresses, 'state', array('size' => 20, 'maxlength' => 20, 'placeholder' => 'Estado','onKeypress'=>'return lettersOnly(event)','title'=>'Estado'));?>
		<?php echo $form->error($modelAddresses, 'state');?>
	</div>

	<div class="row">
		<?php echo $form->textField($modelAddresses, 'zip_code', array('placeholder' => 'Código Postal', 'class' => 'numericOnly','title'=>'Código Postal'));?>
		<?php echo $form->error($modelAddresses, 'zip_code');?>
	</div>



	<div class="row">

		<?php echo $form->textField($modelAddresses, 'delegation', array('size' => 30, 'maxlength' => 30, 'placeholder' => 'Delegación','onKeypress'=>'return lettersOnly(event)','title'=>'Delegación'));?>
		<?php echo $form->error($modelAddresses, 'delegation');?>
	</div>

	<div class="row">

		<?php echo $form->textField($modelAddresses, 'city', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Ciudad','onKeypress'=>'return lettersOnly(event)','title'=>'Ciudad'));?>
		<?php echo $form->error($modelAddresses, 'city');?>
	</div>

	<div class="row">

		<?php echo $form->textField($modelAddresses, 'town', array('size' => 30, 'maxlength' => 30, 'placeholder' => 'Municipio','onKeypress'=>'return lettersOnly(event)','title'=>'Municipio'));?>
		<?php echo $form->error($modelAddresses, 'town');?>
	</div>

	<div class="row">

		<?php echo $form->textField($modelAddresses, 'colony', array('size' => 45, 'maxlength' => 45, 'placeholder' => 'Colonia','title'=>'Colonia'));?>
		<?php echo $form->error($modelAddresses, 'colony');?>
	</div>

	<div class="row">
		<?php echo $form->textField($modelAddresses, 'street', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Calle','title'=>'Calle'));?>
		<?php echo $form->error($modelAddresses, 'street');?>
	</div>

	<div class="row">

		<?php echo $form->textField($modelAddresses, 'external_number', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Número Externo','title'=>'Número Externo'));?>
		<?php echo $form->error($modelAddresses, 'external_number');?>
	</div>

	<div class="row">
		<?php echo $form->textField($modelAddresses, 'internal_number', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Número Interno', 'class' => 'numericOnly','title'=>'Número Interno'));?>
		<?php echo $form->error($modelAddresses, 'internal_number');?>
	</div>



	<div class="row">
		<?php echo $form->textField($model, 'sponsor_name', array('size' => 50, 'maxlength' => 50, 'placeholder'=>'Nombre de la empersa','title'=>'Nombre de la empersa'));?>
		<?php echo $form->error($model, 'sponsor_name');?>
	</div>

		<div>
		<span class="row plain-select">
		<?php echo $form->dropDownList($model,'type',array('no lucrativo'=>'No lucrativo','privado'=>'Privado', 'publico'=>'Publico'),
		                                                       array('title'=>'Tipo de identidad','prompt'=>'Seleccione el tipo de identidad','options' => array(''=>array('selected'=>true))),
		                                                       array('size'=>10)); ?>
		<?php echo $form->error($model,'type'); ?>
		</span>
	</div>

	<div class="row">
		<?php echo $form->textField($model, 'website', array('size' => 60, 'maxlength' => 100, 'placeholder'=>'Pagina Web','title'=>'Pagina Web'));?>
		<?php echo $form->error($model, 'website');?>
	</div>

	<div class="row">


		<?php  echo $form->dropDownList($model, 'sector', array('ACTIVIDADES DEL GOBIERNO Y DE ORGANISMOS INTERNACIONALES Y EXTRATERRITORIALES'=>'ACTIVIDADES DEL GOBIERNO Y DE ORGANISMOS INTERNACIONALES Y EXTRATERRITORIALES',
																'AGRICULTURA GANADERIA APROVECHAMIENTO FORESTAL PESCA Y CAZA'=>'AGRICULTURA GANADERIA APROVECHAMIENTO FORESTAL PESCA Y CAZA',
																'COMERCIO AL POR MAYOR'=>'COMERCIO AL POR MAYOR',
																'COMERCIO AL POR MENOR'=>'COMERCIO AL POR MENOR',
																'CONSTRUCCION'=>'CONSTRUCCION',
																'DIRECCION DE CORPORATIVOS Y EMPRESAS'=>'DIRECCION DE CORPORATIVOS Y EMPRESAS',
																'ELECTRICIDAD AGUA Y SUMINISTRO DE GAS POR DUCTOS AL CONSUMIDOR FINAL'=>'ELECTRICIDAD AGUA Y SUMINISTRO DE GAS POR DUCTOS AL CONSUMIDOR FINAL',
																'INDUSTRIA MANUFACTURERA ALIMENTARIA, TABACO, BEBIDAS Y FABRICACIÓN DE TEXTILES'=>'INDUSTRIA MANUFACTURERA ALIMENTARIA, TABACO, BEBIDAS Y FABRICACIÓN DE TEXTILES',
																'INDUSTRIA MANUFACTURERA DE MADERA, PAPEL, DERIVADOS DEL PETRÓLEO E INDUSTRIA QUÍMICA'=>'INDUSTRIA MANUFACTURERA DE MADERA, PAPEL, DERIVADOS DEL PETRÓLEO E INDUSTRIA QUÍMICA',
																'INDUSTRIA MANUFACTURERA MAQUINARÍA EQUIPO'=>'INDUSTRIA MANUFACTURERA MAQUINARÍA EQUIPO',
																'INFORMACION EN MEDIOS MASIVOS'=>'INFORMACION EN MEDIOS MASIVOS',
																'MINERIA'=>'MINERIA',
																'SERVICIOS DE ALOJAMIENTO TEMPORAL Y DE PREPARACION DE ALIMENTOS Y BEBIDAS'=>'SERVICIOS DE ALOJAMIENTO TEMPORAL Y DE PREPARACION DE ALIMENTOS Y BEBIDAS',
																'SERVICIOS DE APOYO A LOS NEGOCIOS Y MANEJO DE DERECHOS Y SERVICIOS DE REMEDIACION'=>'SERVICIOS DE APOYO A LOS NEGOCIOS Y MANEJO DE DERECHOS Y SERVICIOS DE REMEDIACION',
																'SERVICIOS DE ESPARCIMIENTO CULTURALES Y DEPORTIVOS Y OTROS SERVICIOS RECREATIVOS'=>'SERVICIOS DE ESPARCIMIENTO CULTURALES Y DEPORTIVOS Y OTROS SERVICIOS RECREATIVOS',
																'SERVICIOS DE SALUD Y DE ASISTENCIA SOCIAL'=>'SERVICIOS DE SALUD Y DE ASISTENCIA SOCIAL',
																'SERVICIOS EDUCATIVOS'=>'SERVICIOS EDUCATIVOS',
																'SERVICIOS FINANCIEROS Y DE SEGUROS'=>'SERVICIOS FINANCIEROS Y DE SEGUROS',
																'SERVICIOS INMOBILIARIOS Y DE ALQUILER DE BIENES MUEBLES E INTANGIBLES'=>'SERVICIOS INMOBILIARIOS Y DE ALQUILER DE BIENES MUEBLES E INTANGIBLES',
																'SERVICIOS POSTALES, MENSAJERÍA, PAQUETERÍA Y ALMACENAMIENTO'=>'SERVICIOS POSTALES, MENSAJERÍA, PAQUETERÍA Y ALMACENAMIENTO',
																'SERVICIOS PROFESIONALES CIENTIFICOS Y TECNICOS'=>'SERVICIOS PROFESIONALES CIENTIFICOS Y TECNICOS',
																'TRANSPORTES CORREOS Y ALMACENAMIENTO'=>'TRANSPORTES CORREOS Y ALMACENAMIENTO',
																'OTROS SERVICIOS EXCEPTO ACTIVIDADES DEL GOBIERNO'=>'OTROS SERVICIOS EXCEPTO ACTIVIDADES DEL GOBIERNO'),array('prompt'=>'Seleccionar sector','title'=>'Sector', 'id'=>'sector', 'onchange'=>'changeSector()'))?>
		<?php echo $form->error($model, 'sector');?>
	</div>

	<div class="row" id="comboClase">

  </div>

	<div class="row">
		<?php echo $form->textField($model, 'branch', array('size' => 60, 'maxlength' => 100,'placeholder'=>'Rama','title'=>'Rama'));?>
		<?php echo $form->error($model, 'branch');?>


    </div>

	<div class="row">
		<?php echo $form->textField($model, 'main_activity', array('size' => 60, 'maxlength' => 100,'placeholder'=>'Actividad Principal','title'=>'Actividad Principal'));?>
		<?php echo $form->error($model, 'main_activity');?>
	</div>

	<div class="row">
		<?php echo $form->textField($model, 'legal_structure', array('size' => 60, 'maxlength' => 100,'placeholder'=>'Estructura Legal','title'=>'Estructura Legal'));?>
		<?php echo $form->error($model, 'legal_structure');?>
	</div>

	<div class="row">
		<?php echo $form->textField($model, 'employeess_number', array('class' => 'numericOnly','placeholder'=>'Numero de empleados','title'=>'Numero de empleados'));?>
		<?php echo $form->error($model, 'employeess_number');?>
	</div>

	<div class="row">


		<?php echo $form->fileField($modelPersons, 'photo_url', array('size' => 60, 'maxlength' => 100, 'placeholder' => "Foto",'title'=>'Foto de Perfil'));?>
		<?php echo $form->error($modelPersons, 'photo_url');?>
		<br>
	</div>

	<div class="row buttons">

	  <?php echo CHtml::htmlButton('Enviar',array(
                'onclick'=>'send("sponsors-form", "sponsors/sponsorsInfo", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : 0).'","")',
                'class'=>'savebutton',
            ));
    ?>

		<?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
	</div>

<?php $this->endWidget();?>

</div>
