<?php
/* @var $this SoftwareController */
/* @var $model Software */
/* @var $form CActiveForm */
?>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/protected/views/software/js/script.js"></script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'software-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
	
)); ?>


	<div class="row">
	 <span class="plain-select">	
		<?php $this->widget('ext.CountrySelectorWidget', 
			array(
				'value' => $model->country,
				'name' => Chtml::activeName($model, 'country'),
				'id' => Chtml::activeId($model, 'country'),
				'useCountryCode' => false,
				'firstEmpty' => true,
    			'firstText' => 'Seleccionar país',

		)); ?>
		</span>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
	 <span class="plain-select">	
		<?php echo $form->dropDownList($model,'participation_type',
			    array(
				  		'Autor'=>'Autor',
				  		'Co-autor'=>'Co-autor'
			    ),
			    array('prompt'=>'Seleccionar participación','title'=>'Participacíon')
			);
	    ?>		
	    </span>
		<?php echo $form->error($model,'participation_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150,'placeholder'=>'Título','title'=>'Título (maximo 150 caracteres)',)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'beneficiary',array('size'=>60,'maxlength'=>70,'placeholder'=>'Beneficiario','title'=>'Beneficiario (maximo 70 caracteres)', 'onKeyPress'=>'return lettersOnly(event)')); ?>
		<?php echo $form->error($model,'beneficiary'); ?>
	</div>

	<div class="row">
	 <span class="plain-select">	
		<?php echo $form->dropDownList($model,'entity',
				 array(
				 		'Pública'=>'Pública',
				 		'Privada'=>'Privada',
				 		'Sector social'=>'Sector social'
				 ),
				 array('prompt'=>'Seleccionar entidad','title'=>'Entidad')
			);
		 ?>
		 </span>
		<?php echo $form->error($model,'entity'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'manwork_hours',array('placeholder'=>'Horas invertidas en el proyecto','title'=>'Horas invertidas en el proyecto. (Solo se aceptan numeros)', 'class'=>'numericOnly')); ?>
		<?php echo $form->error($model,'manwork_hours'); ?>
	</div>

	<div class="row">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model' => $model,
		    'language'=> 'es',
		    'attribute' => 'end_date',
		    'htmlOptions' => array(
		    	    'dateFormat'=>'d/m/Y',
		    		'size' => '10',         
		    		'readOnly'=>true,
		        	'placeholder'=>"Fecha de termino",
		        	'title'=>'Fecha de termino',
		    ),
		));
		?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
	 <span class="plain-select">	
			<?php echo $form->dropDownList($model,'sector',
				    array(
				  	   'Centros privados de investigación'=>'Centros privados de investigación',
				  		 'Centros públicos de investigación'=>'Centros públicos de investigación',
				  		 'Consultoras'=>'Consultoras',
				  		 'Gobierno federal descentralizado'=>'Gobierno federal descentralizado',
				  		 'Gobierno federal desconcentrado'=>'Gobierno federal desconcentrado',
				  		 'Gobierno municipal'=>'Gobierno municipal',
				  		 'Instituciones del sector gobierno federal centralizado'=>' Instituciones del sector gobierno federal centralizado',
				  		 'Instituciones del sector entidades paraestatales'=>' Instituciones del sector entidades paraestatales',
				  		 'Instituciones del sector gobierno de las entidades federativas'=>'Instituciones del sector gobierno de las entidades federativas',
				  		 'Instituciones del sector de educación superior públicas'=>'Instituciones del sector de educación superior públicas',			  		 
				  		 'Instituciones del sector de educación superior privadas'=>' Instituciones del sector de educación superior privadas',
				  		 'Instituciones del sector privado de empresas productivas (adiat)'=>'Instituciones del sector privado de empresas productivas (adiat)',
				  		 'Instituciones / organizaciones no lucrativas'=>'Instituciones / organizaciones no lucrativas',
				  		 'Instituciones / organizaciones extranjeras'=>'Instituciones / organizaciones extranjeras',
				  		 'No especificado'=>'No especificado',
				    ),
					array('prompt'=>'Seleccionar sector','title'=>'Sector','id'=>'sector', 'onchange'=>'changeSector()')			  
			    ); 
		?>
		</span>
		<?php echo $form->error($model,'sector'); ?>
  </div>
  	
    <?php
        if(!$model->isNewRecord)
        { 
          echo '<div class="row" id="getSelectOrganization" >';
          echo '<span class="plain-select">';
          echo $form->dropDownList($model,'organization',array($model->organization => $model->organization),array('prompt'=>'Seleccionar organización','options'=>array($model->organization=>array('selected'=>true))));
          echo '</span>';
          echo '</div>';

          echo '<div class="row"id="getSelectSecondLevel">';
          echo '<span class="plain-select">';
          echo $form->dropDownList($model,'second_level',array($model->second_level => $model->second_level),array('prompt'=>'Seleccionar segundo nivel','options'=>array($model->second_level=>array('selected'=>true))));
          echo '</span>';
      	
        }
        else
        {
          echo '<div class="row"id="selectOrganization">
                </div>
                <div class="row"id="selectSecondLevel">
                </div>';
        }
    ?>

	<div class="row">
		<?php echo $form->textArea($model,'resumen',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>'Resumen','title'=>'Resumen (maximo 1000 caracteres)')); ?>
		<?php echo $form->error($model,'resumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'objective',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>'Objetivo del desarrollo','title'=>'Objetivo (maximo 1000 caracteres)')); ?>
		<?php echo $form->error($model,'objective'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'contribution',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>'Contribución del solicitante al desarrollo de software','title'=>'Contribución del solicitante al desarrollo de software (maximo 1000 caracteres)')); ?>
		<?php echo $form->error($model,'contribution'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'impact_value',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>'Generación de valor e impacto para el beneficiario ','title'=>' Generación de valor e impacto para el beneficiario (maximo 1000 caracteres)')); ?>
		<?php echo $form->error($model,'impact_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'innovation_trascen',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>'Grado de innovación y trascendencia','title'=>'Grado de innovación y trascendencia (maximo 1000 caracteres)')); ?>
		<?php echo $form->error($model,'innovation_trascen'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'transfer_mechanism',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>' Mecanismo de transferencia del desarrollo de software ','title'=>' Mecanismo de transferencia del desarrollo de software (maximo 1000 caracteres)')); ?>
		<?php echo $form->error($model,'transfer_mechanism'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'hr_formation',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>'Formación de recursos humanos','title'=>'Formación de recursos humanos (maximo 1000 caracteres)')); ?>
		<?php echo $form->error($model,'hr_formation'); ?>
	</div>

	<div class="row">
	<span class="radiotext">¿Recibio apoyo económico ?</span>
		<?php $status = array('1' => 'Si','0'=>'No'); 
		    echo $form-> RadioButtonList($model,'economic_support' ,$status, array('separator' => ' ','labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'economic_support'); ?>

	</div>

	<div class="row">      
    <?php 
      if(!$model->isNewRecord){
        echo $form->FileField($model,'path',array('maxlength'=>100,'title'=>'archivo probatorio')); 
        echo $model->path != null ? "<a href='".Yii::app()->request->baseUrl."/".$model->path."' target='_blank'><img src='".Yii::app()->request->baseUrl."/img/Acciones/desplegar.png'></a>" : "";
        echo $form->error($model,'path');
      }else{
           echo $form->fileField($model,'path',array('size'=>60,'maxlength'=>100,'title'=>'archivo probatorio'));
          echo $form->error($model,'path');
      }
    ?>
  </div>
		
	<div class="row buttons">		
	     <?php echo CHtml::htmlButton($model->isNewRecord ? 'Guardar': 'Modificar',array(
                'onclick'=>'send("software-form","software/'.($model->isNewRecord ? 'create' : 'update').'", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","software/admin","");',
                'class'=>'savebutton',
            ));
    	 ?>
		 <?php echo CHtml::link('Cancelar',array('software/admin'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

