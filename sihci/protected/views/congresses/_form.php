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
		<?php echo $form->dropDownList($model,'year', array('promt'=>'Año','1980'=>'1980','1981'=>'1981','1982'=>'1982','1983'=>'1983',
															'1984'=>'1984','1985'=>'1985','1986'=>'1986','1987'=>'1987',
															'1988'=>'1988','1989'=>'1989','1990'=>'1990','1991'=>'1992',
															'1993'=>'1993','1994'=>'1994','1995'=>'1995','1996'=>'1996',
															'1997'=>'1997','1998'=>'1998','1999'=>'1999','2000'=>'2000',
															'2001'=>'2001','2002'=>'2002','2003'=>'2003','2004'=>'2004',
															'2005'=>'2005','2006'=>'2006','2007'=>'2007','2008'=>'2008',
															'2009'=>'2009','2010'=>'2010','2011'=>'2011','2012'=>'2012',
															'2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016',
															'2017'=>'2017','2017'=>'2017','2018'=>'2018','2019'=>'2020',
															'2021'=>'2021','2022'=>'2022','2023'=>'2023','2024'=>'2024',
															'2025'=>'2025','2026'=>'2026','2027'=>'2027','2028'=>'2028',
															'2029'=>'2029','2030'=>'2030','2030'=>'2031','2031'=>'2031',
															'2032'=>'2032','2033'=>'2033','2034'=>'2034','2035'=>'2035',
															'2036'=>'2036','2037'=>'2037','2038'=>'2038','2039'=>'2039',
															'2040'=>'2040','2041'=>'2041','2042'=>'2042','2043'=>'2043',
															'2044'=>'2044','2045'=>'2045','2046'=>'2046','2047'=>'2047',
															'2048'=>'2048','2049'=>'2049','2050'=>'2050'
															)); ?>
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
		  <?php echo $form->labelEx($model,'pais'); ?>
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

	<div class="row buttons">
	    <?php echo CHtml::ajaxSubmitButton ('Guardar',CController::createUrl('congresses/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
        				array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                                      
		                         if(data.status=="success")
		                         {
				                     alert("Registro realizado con éxito");
				                     $("#congresses-form")[0].reset();
				                     window.location.href ="'.Yii::app()->createUrl('congresses/admin').'";
		                         }		                         
		                         else
		                         {
			                     	alert("Complete los campos con *");   
			                     }       
		                  	}',                    
		                    
                        )); 
        ?>
		<?php echo CHtml::resetButton($model->isNewRecord ? 'Borrar' : 'Borrar'); ?>
       	<?php echo CHtml::link('Cancelar',array('/congresses/admin')); ?>
	</div>	

<?php $this->endWidget(); ?>
</div><!-- form -->