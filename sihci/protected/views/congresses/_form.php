<?php
/* @var $this CongressesController */
/* @var $model Congresses */
/* @var $form CActiveForm */
?>
<!--PC01-Registrar datos  Participacion en congresos-->
<div class="form">



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'congresses-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); 

?>



	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		 <?php echo $form->labelEx($model,'work_title'); ?>
		<?php echo $form->textField($model,'work_title',array('size'=>60,'maxlength'=>200, 'placeholder'=>'Puesto')); ?>
		<?php echo $form->error($model,'work_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year', array('placeholder'=>'Año')); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'congress'); ?>
		<?php echo $form->textField($model,'congress',array('size'=>60,'maxlength'=>200, 'placeholder'=>'Congreso')); ?>
		<?php echo $form->error($model,'congress'); ?>
	</div>

	<div class="row">
         <?php 
                $status = array('Nacional' => 'Nacional','Internacional'=>'Internacional'); 
                echo $form-> RadioButtonList($model,'type' ,$status, array ('separador' => ''));?>
         <?php echo $form->error($model,'type');?>
	 
	</div>

	<div class="row">
		  <p>Pais</p>
	        <?php
	        $this->widget(
	            'yiiwheels.widgets.formhelpers.WhCountries',
	            array(
	                'name' => 'Congresses[country]',
	                'id' => 'Congresses_country',
	                'value' => 'MX',
	                'useHelperSelectBox' => true,
	                'pluginOptions' => array(
	                    'country' => '',
	                    'language' => 'es_ES',
	                    'flags' => true
	                )
	            )
	        );
	        ?>	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_type'); ?>
        <?php echo $form->dropDownList($model,'work_type',array(''=>'','Conferencia Magistral'=>'Conferencia Magistral','Articulo in Extenso'=>'Articulo in Extenso','Ponencia'=>'Ponencia','Poster'=>'Poster'));?>
        <?php echo $form->error($model,'work_type'); ?>
     
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>250,'placeholder'=>'Palabras Clave')); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

   
	<div class="row button">

         
    
        <input type="submit" onClick="validationFrom()" value="Guardar">
        <input type="button" onClick="cleanUp()" value="Borrar">
        <input type="button" value="Cancelar">
	
		 <script>
		    function cleanUp()
		     {
		        var text;
		        var result = confirm("¿Esta usted seguro de limpiar estos datos?");
		        if (result == true) 
		          $('[type^=text]').val('');
		        else s
		        document.getElementById("demo").innerHTML = txt;
		            }
			function validationFrom()
			   {
			    alert("Registro realizado con éxito");
			    return true;
			   } 

        

        </script>
	</div>	
	<?php if(Yii::app()->user->hasFlash('success')):?>
    <script>alert(‘<?php echo Yii::app()->user->getFlash('success'); ?>’);</script>
    <?php endif; ?>

<?php $this->endWidget(); ?>
</div><!-- form -->