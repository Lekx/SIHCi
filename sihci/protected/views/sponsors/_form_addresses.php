<?php
/* @var $this AddressesController */
/* @var $model Addresses */
/* @var $form CActiveForm */
?>
<script>

		$(document).ready(function(){
			$("#hide_form").click(function(){
			
				if($("#hide_form").is(':checked'))
					$(".form").hide();
				else
					$(".form").show();
				
	   		});
		}); 
</script>

<script language="javascript">
	function letters(){
	$(".lettersOnly").keydown(function (e) {
		if (event.keyCode >45 && event.keyCode  <57) event.returnValue = false;
		{
    		return;
    	}
	}
</script>

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

	<div class="row">
			<input type="checkbox" id="hide_form">Usar la misma direccion que la empresa<br>
	</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'addresses-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">

          <?php
        $this->widget(
            'yiiwheels.widgets.formhelpers.WhCountries',
            array(
                'name' => 'Addresses[country]',
                
                'useHelperSelectBox' => true,
                'pluginOptions' => array(
                    'country' => 'MX',
                    'language' => 'es_ES',
                    'flags' => true
                )
            )
        );
        ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip_code'); ?>
		<?php echo $form->textField($model,'zip_code',array('placeholder'=>'Código Postal','class' => 'lettersOnly')); ?>
		<?php echo $form->error($model,'zip_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>20,'maxlength'=>20, 'placeholder'=>'Estado','class' => 'lettersOnly')); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delegation'); ?>
		<?php echo $form->textField($model,'delegation',array('size'=>30,'maxlength'=>30, 'placeholder'=>'Delegación','class' => 'lettersOnly')); ?>
		<?php echo $form->error($model,'delegation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Ciudad','class' => 'lettersOnly')); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'town'); ?>
		<?php echo $form->textField($model,'town',array('size'=>30,'maxlength'=>30, 'placeholder'=>'Municipio','class' => 'lettersOnly')); ?>
		<?php echo $form->error($model,'town'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'colony'); ?>
		<?php echo $form->textField($model,'colony',array('size'=>45,'maxlength'=>45, 'placeholder'=>'Colonia','class' => 'lettersOnly')); ?>
		<?php echo $form->error($model,'colony'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Calle','class' => 'lettersOnly')); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'external_number'); ?>
		<?php echo $form->textField($model,'external_number',array('size'=>8,'maxlength'=>8, 'placeholder'=>'Número Externo','class' => 'numericOnly')); ?>
		<?php echo $form->error($model,'external_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'internal_number'); ?>
		<?php echo $form->textField($model,'internal_number',array('size'=>8,'maxlength'=>8, 'placeholder'=>'Número Interno','class' => 'numericOnly')); ?>
		<?php echo $form->error($model,'internal_number'); ?>
	</div>

	<div class="row buttons">
		<input type="submit" onclick="validationFrom()" value="Guardar">
	</div>
	<script>
		function cleanUp(){
			var text;
			var result = confirm("¿Está usted seguro de limpiar estos datos?");
			if (result==true) {
				$('[id^=Addresses_]').val('');
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