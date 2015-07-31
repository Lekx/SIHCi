<?php
/* @var $this PersonsController */
/* @var $model Persons */
/* @var $form CActiveForm */

?>
<script type="text/javascript">

  $('.lettersAndNumbers').bind('keyup input',function(){
    var input = $(this);
    input.val(input.val().replace(/[^a-z0-9A-ZñÑ´'ÁáÉéÍíÓóÚú ]/g,'') );
  });

    function lettersOnly(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.";
      especiales = "8-9-37-38-46-164";

      tecla_especial = false
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }

      if (letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
    }
    function numericOnly(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      numbers = " 1234567890";
      especiales = "8-9-37-38-46-164";

      tecla_especial = false
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }

      if (numbers.indexOf(tecla) == -1 && !tecla_especial)
        return false;
    }

    function lettersAndNumbersOnly(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890";
      especiales = "8-9-37-38-46-164";

      tecla_especial = false
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }

      if (letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
    }



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
		<?php echo CHtml::htmlButton('Enviar',array(
								'onclick'=>'send("persons-form", "sponsors/create_persons", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : 0).'","")',
								'class'=>'savebutton',
						));
		?>
		 <?php echo CHtml::link('Cancelar',array('sponsors/create_persons')); ?>
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
</script>


<?php $this->endWidget(); ?>

</div><!-- form -->
