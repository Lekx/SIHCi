<?php
/* @var $this CertificationsController */
/* @var $model Certifications */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'certifications-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true,)
	
)); ?>

	
	<div class="row">
		
		<?php echo $form->textField($model,'folio',array('size'=>30,'maxlength'=>30, 'placeholder'=>'Folio','title'=>'Folio')); ?>
		<?php echo $form->error($model,'folio'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'reference',array('size'=>30,'maxlength'=>30,'placeholder'=>'Referencia','title'=>'Referencia')); ?>
		<?php echo $form->error($model,'reference'); ?>
	</div>

	<div class="row">
		 <span class="plain-select">
		<?php echo $form->dropDownList($model, 'reference_type',array('credencial'=>'Credencial','foja'=>'Foja','libro'=>'Libro','otra'=>'Otra'),array('prompt'=>'Seleccionar Tipo de Referencia','title'=>'Tipo de Referencia'));?>
		</span>
		<?php echo $form->error($model,'reference_type'); ?>
	</div>

	<div class="row">
		 <span class="plain-select">
		<?php echo $form->dropDownList($model,'specialty', array('Alergia e inmunología clínica'=>'Alergia e inmunología clínica','Alergia e inmunología clínica pediátrica'=>'Alergia e inmunología clínica pediátrica',
         'Anatomía patológica'=>'Anatomía patológica','Anestesiología'=>'Anestesiología','Anestesiología pediátrica'=>'Anestesiología pediátrica','Angiología y cirugía vascular'=>'Angiología y cirugía vascular','Biología de la reproducción humana'=>'Biología de la reproducción humana',
         'Cardiología'=>'Cardiología','Cardiología pediátrica'=>'Cardiología pediátrica','Cirugía cardiotorácica'=>'Cirugía cardiotorácica',
         'Cirugía cardiotorácica pediátrica'=>'Cirugía cardiotorácica pediátrica','Cirugía general'=>'Cirugía general','Cirugía oncológica (adultos)'=>'Cirugía oncológica (adultos)',
         'Cirugía pediátrica'=>'Cirugía pediátrica','Cirugía plástica y reconstructiva'=>'Cirugía plástica y reconstructiva','Coloproctología'=>'Coloproctología',
         'Comunicación'=>'Comunicación','Dermatología'=>'Dermatología','Dermatología pediátrica'=>'Dermatología pediátrica',
         'Dermatopatología'=>'Dermatopatología','Endocrinología '=>'Endocrinología','Endocrinología pediátrica'=>'Endocrinología pediátrica','Epidemiología'=>'Epidemiología',
         'Gastroenterología'=>'Gastroenterología','Gastroenterología y nutrición pediátrica'=>'Gastroenterología y nutrición pediátrica','Genética médica'=>'Genética médica','Geriatría'=>'Geriatría',
         'Ginecología oncológica'=>'Ginecología oncológica','Ginecología y obstetricia'=>'Ginecología y obstetricia','Hematología'=>'Hematología','Hematología pediátrica'=>'Hematología pediátrica',
         'Infectología'=>'Infectología','Medicina de la actividad física y deportiva'=>'Medicina de la actividad física y deportiva','Medicina de rehabilitación'=>'Medicina de rehabilitación','Medicina de urgencias'=>'Medicina de urgencias',
         'Medicina del enfermo en estado crítico'=>'Medicina del enfermo en estado crítico','Medicina del enfermo pediátrico en estado crítico'=>'Medicina del enfermo pediátrico en estado crítico','Medicina del trabajo'=>'Medicina del trabajo',
         'Medicina familiar'=>'Medicina familiar','Medicina interna'=>'Medicina interna','Medicina legal'=>'Medicina legal','Medicina materno fetal'=>'Medicina materno fetal','Medicina nuclear'=>'Medicina nuclear','Nefrología'=>'Nefrología',
         'Nefrología pediátrica'=>'Nefrología pediátrica','Neonatología'=>'Neonatología','Neumología'=>'Neumología','Neumología pediátrica'=>'Neumología pediátrica','Neumología pediátrica 98'=>'Neumología pediátrica 98',
         'Neuroanestesiología'=>'Neuroanestesiología','Neurocirugía'=>'Neurocirugía','Neurocirugía pediátrica'=>'Neurocirugía pediátrica','Neurofisiología clínica'=>'Neurofisiología clínica','Neurología'=>'Neurología',
         'Neurología pediátrica'=>'Neurología pediátrica','Neurootología'=>'Neurootología','Neuropatología'=>'Neuropatología','Neurorradiología'=>'Neurorradiología','Nutriología clínica'=>'Nutriología clínica',
         'Oftalmología'=>'Oftalmología','Oftalmología neurológica'=>'Oftalmología neurológica','Oncología médica'=>'Oncología médica','Oncología pediátrica'=>'Oncología pediátrica',
         'Ortopedia'=>'Ortopedia','Otorrinolaringología'=>'Otorrinolaringología','Otorrinolaringología pediátrica'=>'Otorrinolaringología pediátrica','Patología clínica'=>'Patología clínica',
         'Patología pediátrica'=>'Patología pediátrica','Pediatría'=>'Pediatría','Psiquiatría'=>'Psiquiatría','Psiquiatría infantil y de la adolescencia'=>'Psiquiatría infantil y de la adolescencia',
         'Radiooncología'=>'Radiooncología','Radiología e imagen'=>'Radiología e imagen','Reumatología'=>'Reumatología','Reumatología pediátrica'=>'Reumatología pediátrica','Terapia endovascular neurológica'=>'Terapia endovascular neurológica',
         'Urgencias pediátricas'=>'Urgencias pediátricas','Urología'=>'Urología','Urología ginecológica'=>'Urología ginecológica','Cirugía Maxilofacial'=>'Cirugía Maxilofacial','Ortodoncia y Ortopedia Maxilofacial'=>'Ortodoncia y Ortopedia Maxilofacial',
         'Periodoncia'=>'Periodoncia'),array('prompt'=>'Seleccionar especialidad','title'=>'Especialidad'));?>
         </span>
		<?php echo $form->error($model,'specialty'); ?>
	</div>

	<div class="row">
		  <span class="plain-select">
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model' => $model,
		    'language'=> 'es',
		    'attribute' => 'validity_date_start',
		    'htmlOptions' => array(
		    		'size' => '10',         
		        	'maxlength' => '10',
		        	'readOnly'=>true, 
		        	'placeholder'=>"Fecha de Inicio" , 
		        	'title'=>'Fecha de Inicio' 
		    ),
		));
		?>
		</span>
		<?php echo $form->error($model,'validity_date_start'); ?>
	</div>

	<div class="row">
		 <span class="plain-select">
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model' => $model,
		    'language'=> 'es',
		    'attribute' => 'validity_date_end',
		    'htmlOptions' => array(
		    		'size' => '10',         
		        	'maxlength' => '10',
		        	'readOnly'=>true, 
		        	'placeholder'=>"Fecha Final" ,
		        	'title'=>'Fecha de Final'  
		    ),
		));
		?>
		</span>
		<?php echo $form->error($model,'validity_date_end'); ?>
	</div>

	<div class="row">
	<span class="radiotext">Tipo:          </span>
		<?php 
		$status = array('certificación' => 'Certificación','Recertificación'=>'Recertificación'); 
        echo $form-> RadioButtonList($model,'type' ,$status ,array('separator' => ' ', 'labelOptions'=>array('style'=>'display:inline')));?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row buttons">
	    <?php echo CHtml::ajaxButton ($model->isNewRecord ? 'Guardar' : 'Modificar',CController::createUrl('certifications/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
        				array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                                      
		                         if(data.status=="success")
		                         {
				              			$(".successdiv").show();	                         

		                         }		                         
		                         else
		                         {
			                     	 $(".errordiv").show();
			                     }       
		                  	}',                    
		                    
                        ),array('class'=>'savebutton')); 
        ?>
       	<?php echo CHtml::Button('Cancelar',array('submit' => array('certifications/admin'),'confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
		<div class="200">
		
		</div>
		
		<div class="404">
		</div>
		
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->