<?php
/* @var $this SponsorsController */
/* @var $model Sponsors */
/* @var $form CActiveForm */
	$cs = Yii::app()->getClientScript();
   $cs->registerScriptFile( Yii::app()->baseUrl. '/protected/views/sponsors/js/script.js');
?>
<script>
$(document).ready(function() {
    $(".numericOnly").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode == 65 && e.ctrlKey === true) ||
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>

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

	<div class="row">
		<?php echo $form->textField($modelAddresses, 'zip_code', array('placeholder' => 'Código Postal', 'class' => 'numericOnly','title'=>'Código Postal'));?>
		<?php echo $form->error($modelAddresses, 'zip_code');?>
	</div>

	<div class="row" class="">
		<?php echo $form->textField($modelAddresses, 'state', array('size' => 20, 'maxlength' => 20, 'placeholder' => 'Estado','title'=>'Estado'));?>
		<?php echo $form->error($modelAddresses, 'state');?>
	</div>

	<div class="row">

		<?php echo $form->textField($modelAddresses, 'delegation', array('size' => 30, 'maxlength' => 30, 'placeholder' => 'Delegación','title'=>'Delegación'));?>
		<?php echo $form->error($modelAddresses, 'delegation');?>
	</div>

	<div class="row">

		<?php echo $form->textField($modelAddresses, 'city', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Ciudad','title'=>'Ciudad'));?>
		<?php echo $form->error($modelAddresses, 'city');?>
	</div>

	<div class="row">

		<?php echo $form->textField($modelAddresses, 'town', array('size' => 30, 'maxlength' => 30, 'placeholder' => 'Municipio','title'=>'Municipio'));?>
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

		<?php echo $form->textField($modelAddresses, 'external_number', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Número Externo', 'class' => 'numericOnly','title'=>'Número Externo'));?>
		<?php echo $form->error($modelAddresses, 'external_number');?>
	</div>

	<div class="row">
		<?php echo $form->textField($modelAddresses, 'internal_number', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Número Interno', 'class' => 'numericOnly','title'=>'Número Interno'));?>
		<?php echo $form->error($modelAddresses, 'internal_number');?>
	</div>

	<!--///////////////////////FORM SPONSORS/////////////////////////////////////////////////////////////-->

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'id_user'); ?>
<?php echo $form->textField($model,'id_user'); ?>
<?php echo $form->error($model,'id_user');*/?>
	</div>-->

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'id_address'); ?>
<?php echo $form->textField($model,'id_address'); ?>
<?php echo $form->error($model,'id_address');*/?>
	</div>-->

	<div class="row">
		<?php echo $form->textField($model, 'sponsor_name', array('size' => 50, 'maxlength' => 50, 'placeholder'=>'Nombre de la empersa','title'=>'Nombre de la empersa'));?>
		<?php echo $form->error($model, 'sponsor_name');?>
	</div>

	<div class="row">
		<?php echo $form->textField($model, 'type', array('size' => 60, 'maxlength' => 150,'placeholder'=>'Tipo de Empresa','title'=>'Tipo de Empresa'));?>
		<?php echo $form->error($model, 'type');?>
	</div>

	<div class="row">
		<?php echo $form->textField($model, 'website', array('size' => 60, 'maxlength' => 100, 'placeholder'=>'Pagina Web','title'=>'Pagina Web'));?>
		<?php echo $form->error($model, 'website');?>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model, 'sector', array('size' => 60, 'maxlength' => 100,'placeholder'=>'Sector','title'=>'Sector'));?>
		<?php echo $form->error($model, 'sector');?>
<!--
00 	No especificado
01 	Instituciones del sector gobierno federal centralizado
02 	Instituciones del sector entidades paraestatales
03 	Instituciones del sector gobierno de las entidades federativas
04 	Instituciones del sector de educacion superior publicas
05 	Instituciones del sector de educacion superior privadas
06 	Instituciones del sector privado de empresas productivas (adiat)
07 	Instituciones / organizaciones no lucrativas
08 	Instituciones / organizaciones extranjeras
09 	consultoras
10 	Gobierno municipal
11 	Gobierno federal descentralizado
18 	Gobierno Federal Desconcentrado
19 	Centros Públicos de Investigación
20 	Centros Privados de Investigación
-->
	</div>

	<div class="row">
		<?php echo $form->textField($model, 'class', array('size' => 60, 'maxlength' => 100,'placeholder'=>'Clase','title'=>'Clase'));?>
		<?php echo $form->error($model, 'class');?>

<!--
621211 	CONSULTORIOS DENTALES DEL SECTOR PRIVADO
621212 	CONSULTORIOS DENTALES DEL SECTOR PUBLICO -->
	</div>

	<div class="row">
		<?php echo $form->textField($model, 'branch', array('size' => 60, 'maxlength' => 100,'placeholder'=>'Rama','title'=>'Rama'));?>
		<?php echo $form->error($model, 'branch');?>

<!--
6211 	CONSULTORIOS MEDICOS
6212 	CONSULTORIOS DENTALES
6213 	OTROS CONSULTORIOS PARA EL CUIDADO DE LA SALUD
6214 	CENTROS PARA LA ATENCION DE PACIENTES QUE NO REQUIEREN HOSPITALIZACION
6215 	LABORATORIOS MEDICOS Y DE DIAGNOSTICO
6216 	SERVICIOS DE ENFERMERIA A DOMICILIO
6219 	SERVICIOS DE AMBULANCIAS DE BANCOS DE ORGANOS Y OTROS SERVICIOS AUXILIARES AL TRATAMIENTO MEDICO
6221 	HOSPITALES GENERALES
6222 	HOSPITALES PSIQUIATRICOS Y PARA EL TRATAMIENTO POR ABUSO DE SUBSTANCIAS
6223 	HOSPITALES DE OTRAS ESPECIALIDADES MEDICAS
6231 	RESIDENCIAS CON CUIDADOS DE ENFERMERAS PARA ENFERMOS CONVALECIENTES EN REHABILITACION INCURABLES Y
6232 	RESIDENCIAS PARA EL CUIDADO DE PERSONAS CON PROBLEMAS DE RETARDO MENTAL SALUD MENTAL Y ABUSO DE SUB
6233 	ASILOS Y OTRAS RESIDENCIAS PARA EL CUIDADO DE ANCIANOS Y DISCAPACITADOS
6239 	ORFANATOS Y OTRAS RESIDENCIAS DE ASISTENCIA SOCIAL
6241 	SERVICIOS DE ORIENTACION Y TRABAJO SOCIAL
6242 	SERVICIOS COMUNITARIOS DE ALIMENTACION REFUGIO Y DE EMERGENCIA
6243 	SERVICIOS DE CAPACITACION PARA EL TRABAJO PARA PERSONAS DESEMPLEADAS SUBEMPLEADAS O DISCAPACITADAS
6244 	GUARDERIAS -->
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
		<!-- cambiar todo a español y este boton-->

		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', array('confirm'=>'¿Seguro que desea Guardar?','class'=>'savebutton'));?>
		<input class="cleanbutton" type="button" value="Borrar">
		<?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->
