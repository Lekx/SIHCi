<?php
/* @var $this SponsorsContactsController */
/* @var $model SponsorsContacts */
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
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
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
</script>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'sponsors-contacts-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => true,
));?>

<div class="recopy">
	<hr>
		<?php
		echo "<div class='row'>";
		echo $form->textField($model, 'fullname', array('title'=>'Nombre Completo','placeholder'=>'Nombre Completo','name' => 'fullnames[]','size' => 60, 'maxlength' => 50,'onKeypress'=>'return lettersOnly(event)'));
		echo $form->error($model, 'fullname');
		echo "</div>";
?>


</div>

<hr>
	<?php

$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
	'targetClass' => 'recopy',
	'addButtonLabel' => 'Agregar nuevo',
));
?>

<hr>
<h4>Contactos Creados:</h4>
<hr>
		<?php
foreach ($fullname as $value) {
	echo "<input type='hidden' value='".$value['id']."' name ='fullnamesUpdateId[]'>";
	echo "<div class='row'>";
	echo $form->textField($model, 'fullname', array('title'=>'Nombre Completo','placeholder'=>'Nombre Completo','name' => 'fullnamesUpdate[]', 'value' => $value['fullname'], 'size' => 60, 'maxlength' => 50, 'disabled'=>'true'));
	echo $form->error($model, 'fullname');
	echo "</div>";
//	echo CHtml::link('Eliminar',array('sponsors/deleteContacts','id'=>$value['id']),array('class'=>'deleteSomething'));
  echo CHtml::ajaxLink(
    $text = 'Eliminar OP',
    $url = Yii::app()->controller->createUrl("deleteContacts",array("id"=>$value['id'])),//'/sponsors/deleteContacts/'.$value['id'],
    $ajaxOptions=array (
        'type'=>'POST',
        'dataType'=>'json',
        'success'=>'function(){ $(".successdiv").show();

        }'
        ),
    $htmlOptions=array ("id"=>"chis")
    );
	echo '<hr>';
}
?>






<div class="row buttons">
	<?php echo CHtml::htmlButton('Enviar',array(
							'onclick'=>'send("sponsors-contacts-form", "sponsors/create_contacts", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : 0).'","")',
							'class'=>'savebutton',
					));
	?>		<?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>


<?php $this->endWidget();?>

</div><!-- form -->
