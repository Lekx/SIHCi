<?php
/* @var $this PersonsController */
/* @var $model Persons */
/* @var $form CActiveForm */

?>


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
		
		<?php echo $form->textField($model,'names',array('size'=>30,'maxlength'=>30, 'placeholder'=>"Nombres")); ?>
		<?php echo $form->error($model,'names'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'last_name1',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Apellido Paterno")); ?>
		<?php echo $form->error($model,'last_name1'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'last_name2',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Apellido Materno")); ?>
		<?php echo $form->error($model,'last_name2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marital_status'); ?>
		<?php echo $form->dropDownList($model,'marital_status',array(''=>'','soltero'=>'Soltero','viudo'=>'Viudo', 'casado'=>'Casado',
			                                                          'divorciado'=>'Divorciado', 'union libre'=>'Unión Libre'), 
		                                                       array('options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'marital_status'); ?>
	</div>

	<div class="row">

		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'language'=> 'es',
		    'attribute' => 'birth_date',
		    'model' => $model,
		   // 'flat'=>false,
		     'options' => array(
			     		'changeMonth'=>true, //cambiar por Mes
			     		'changeYear'=>true, //cambiar por Año
			    			'maxDate' => 'now-5475',
		     	),
		    'htmlOptions' => array(
		    			'size'=>'10',
		    			'maxlength'=>'10', 
		        		'placeholder'=>"Fecha de Nacimiento"),
				));
	?>
	<?php echo $form->error($model,'birth_date'); ?>
	</div>


		<div class="row">
		<?php $status = array('Hombre' => 'Hombre','Mujer'=>'Mujer'); 
		    echo $form-> RadioButtonList($model,'genre' ,$status, array ('separador' => '')); 
		 ?>
		<?php echo $form->error($model,'is_national'); ?>
	</div>

	<p>Pais</p>
         <?php
         $this->widget(
             'yiiwheels.widgets.formhelpers.WhCountries',
             array(
                 'name' => 'Persons[country]',
                 'id' => 'Persons_country',
              
                 'useHelperSelectBox' => true,
                 'pluginOptions' => array(
                     'country' => '',
                     'language' => 'es_ES',
                     'flags' => true
                 )
             )
         );
         ?>
  
	

	<div class="row">
		<?php echo $form->textField($model,'state_of_birth',array('size'=>45,'maxlength'=>45, 'placeholder'=>"Estado de Nacimiento")); ?>
		<?php echo $form->error($model,'state_of_birth'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'curp_passport',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Curp")); ?>
		<?php echo $form->error($model,'curp_passport'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'curp_passport',array('size'=>20,'maxlength'=>20, 'placeholder'=>"Pasaporte")); ?>
		<?php echo $form->error($model,'curp_passport'); ?>
	</div>

	<div class="row">

		<?php echo $form->textField($model,'person_rfc',array('size'=>13,'maxlength'=>13, 'placeholder'=>"RFC")); ?>
		<?php echo $form->error($model,'person_rfc'); ?>
	</div>

	<div class="row buttons">
		<input type="submit" onclick="validationFrom()" value="Guardar">
		<input type="button" onclick="cleanUp()" value="Limpiar">
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