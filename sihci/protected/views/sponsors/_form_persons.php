<?php
/* @var $this PersonsController */
/* @var $model Persons */
/* @var $form CActiveForm */

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

 function lettersOnly(e){
	 key = e.keyCode || e.which;
	 tecla = String.fromCharCode(key).toLowerCase();
	 letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
	 especiales = [8,37,39,46,45,47];

	 tecla_especial = false
 	for(var i in especiales){
     if(key == especiales[i]){
  			tecla_especial = true;
  	break;
            } 
 }
 
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
     return false;
     }
</script>


<div class="form">
	<?php 
	Yii::app()->clientScript->registerCssFile(
	Yii::app()->clientScript->getCoreScriptUrl().
	'/jui/css/base/jquery-ui.css'
);
Yii::app()->getClientScript()->registerCoreScript( 'jquery' );
Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'persons-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
	
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		
		<?php echo $form->textField($model,'names',array('size'=>30,'maxlength'=>30, 'placeholder'=>"Nombres" ,'title'=>"Nombres",'onKeypress'=>'return lettersOnly(event)')); ?>
		<?php echo $form->error($model,'names'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'last_name1',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Apellido Paterno", 'title'=>"Apellido Paterno",'onKeypress'=>'return lettersOnly(event)')); ?>
		<?php echo $form->error($model,'last_name1'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'last_name2',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Apellido Materno",'title'=>"Apellido Materno",'onKeypress'=>'return lettersOnly(event)')); ?>
		<?php echo $form->error($model,'last_name2'); ?>
	</div>

	<div class="row">
	  <span class="plain-select">
		<?php echo $form->dropDownList($model,'marital_status',array('soltero'=>'Soltero','viudo'=>'Viudo', 'casado'=>'Casado',
			                                                          'divorciado'=>'Divorciado', 'union libre'=>'Unión Libre'), 
		                                                       array('title'=>'Estado Civil','prompt'=>'Selecionar Estado Civil','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'marital_status'); ?>
		</span>
	</div>

<div class="row">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model' => $model,
		    'language'=> 'es',
		    'attribute' => 'birth_date',
		    'htmlOptions' => array(
		    	    'dateFormat'=>'d/m/Y',
		    		'size' => '10',         
		    		'readOnly'=>true,
		        	'placeholder'=>"Fecha de termino",
		        	'title'=>'Fecha de termino',
		    ),
		));
		?>
	<?php echo $form->error($model,'birth_date'); ?>
	</div>




		<div class="row">
		  <span class="plain-select">
		<?php echo $form->dropDownList($model,'genre',array('Hombre'=>'Hombre',
															'Mujer'=>'Mujer',), 
		                                                       array('title'=>'Sexo','prompt'=>' Seleccionar Sexo','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
	
		</span>
	</div>
<div class="row">
  <span class="plain-select">
       <?php $this->widget('ext.CountrySelectorWidget', array(

		'value' => $model->country,
		'name' => Chtml::activeName($model, 'country'),
		'id' => Chtml::activeId($model, 'country'),
		'useCountryCode' => false,
		'defaultValue' => 'Mexico',
		'firstEmpty' => true,
		'firstText' => 'Pais',

		)); ?>

  </span>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'state_of_birth',array('size'=>45,'maxlength'=>45, 'placeholder'=>"Estado de Nacimiento" ,'title'=>"Estado de Nacimiento ",'onKeypress'=>'return lettersOnly(event)')); ?>
		<?php echo $form->error($model,'state_of_birth'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'curp_passport',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Curp",'title'=>"Curp")); ?>
		<?php echo $form->error($model,'curp_passport'); ?>
	</div>

	<div class="row">

		<?php echo $form->textField($model,'person_rfc',array('size'=>13,'maxlength'=>13, 'placeholder'=>"RFC",'title'=>"RFC")); ?>
		<?php echo $form->error($model,'person_rfc'); ?>
	</div>

	<div class="row buttons">

		<input type="submit"  class="savebutton" onclick="validationFrom()" value="Guardar">
		<?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
	</div>
	<script>
		function cleanUp(){
			var text;
			var result = confirm("¿Está usted seguro de limpiar estos datos?");
			if (result==true) {
				$('[id^=Persons_]').val('');
			}else{

			}
			document.getElementById("demo").innerHTML = text;
		}
		function validationFrom(){
			alert("Registro Realizado con éxito");
			return false;
		}
</script>


<?php $this->endWidget(); ?>

</div><!-- form -->