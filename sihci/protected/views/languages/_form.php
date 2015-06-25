<?php
/* @var $this LanguagesController */
/* @var $model Languages */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'languages-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>



	<div class="row">
<span class="plain-select">
		<?php echo $form->dropDownList($model,'language',array(
					'Albanés'=>'Albanés',
					'Alemán'=>'Alemán',
					'Amharico'=>'Amharico',
					'Arabe'=>'Arabe',
					'Armenio' =>'Armenio',
					'Bengali'=>'Bengali',
					'Bieloruso'=>'Bieloruso',
					'Birmanés'=>'Birmanés',
					'Bulgaro' =>'Bulgaro' ,
					'Catalan'=>'Catalan',
					'Checo'=>'Checo',
					'Chino'=>'Chino',
					'Coreano'=>'Coreano',
					'Croata'=>'Coreano',
					'Danés'=>'Danés',
					'Dari'=>'Dari',
					'Dzongkha'=>'Dzongkha',
					'Escocés'=>'Escocés',
					'Eslovaco'=>'Eslovaco',
					'Esloveniano'=>'Esloveniano',
					'Español'=>'Español',
					'Esperanto'=>'Esperanto',
					'Estoniano' =>'Estoniano',
					'Faroese'=>'Faroese',
					'Farsi'=>'Farsi',
					'Finlandés'=>'Finlandés',
					'Francés'=>'Francés',
					'Gaelico'=>'Gaelico',
					'Galese'=>'Galese',
					'Gallego'=>'Gallego',
					'Griego'=>'Griego',
					'Hebreo'=>'Hebreo',
					'Hindi'=>'Hindi',
					'Holandés'=>'Holandés',
					'Hungaro' =>'Hungaro' ,
					'Inglés'=>'Inglés',
					'Indonesio'=>'Indonesio',
					'Inuktitut (Eskimo)'=>'Inuktitut (Eskimo)',
					'Islandico'=>'Islandico',
					'Italiano'=>'Italiano',
					'Japonés'=>'Japonés',
					'Khmer'=>'Khmer',
					'Kurdo'=>'Kurdo',
					'Lao'=>'Lao',
					'Laponico'=>'Laponico',
					'Latviano'=>'Latviano',
					'Lituano'=>	'Lituano',
					'Macedonio'=>'Macedonio',
					'Malayés'=>'Malayés',
					'Maltés'=>'Maltés',
					'Nepali'=>'Nepali',
					'Noruego' =>'Noruego',
					'Pashto'=>'Pashto',
					'Polaco'=>'Polaco',
					'Portugués'=>'Portugués',
					'Rumano'=>'Rumano',
					'Ruso' =>'Ruso',
					'Serbio'=>'Serbio',
					'Somali'=>'Somali',
					'Suahili'=>'Suahili',
					'Sueco'=>'Sueco',
					'Tagalog-Filipino'=>'Tagalog-Filipino',
					'Tajik'=>'Tajik',
					'Tamil'=>'Tamil',
					'Tailandés'=>'Tailandés',
					'Tibetano'=>'Tibetano',
					'Tigrinia'=>'Tigrinia',
					'Tonganés'=>'Tonganés',
					'Turco'=>'Turco',
					'Turkmenistano'=>'Turkmenistano',
					'Ucraniano'=>'Ucraniano',
					'Urdu'=>'Urdu',
					'Uzbekistano'=>'Uzbekistano',
					'Vasco'=>'Vasco',
					'Vietnamés'=>'Vietnamés'),
					array('prompt'=>'Seleccionar lenguaje','title'=>'Idioma')
                );
		?>
		</span>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'description',array('placeholder'=>'Descripción..','title'=>'Descripción')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'native_language');?>
		<?php echo $form->checkbox($model,'native_language');?>
		
		<?php echo $form->error($model,'native_language'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'is_traducer');?>
		<?php echo $form->checkbox($model,'is_traducer');?>
		
		<?php echo $form->error($model,'is_traducer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'is_teacher');?>
		<?php echo $form->checkbox($model,'is_teacher');?>
		<?php echo $form->error($model,'is_teacher'); ?>
	</div>

	<div class="row">
		<span class="plain-select">
		<?php echo $form->dropDownList($model,'conversational_level',array(
					'Alto'=>'Alto',
					'Medio'=>'Medio',
					'Bajo'=>'Bajo'),
					array('prompt'=>'Seleccionar nivel de conversación','title'=>'Nivel de Conversación')
                );
		?>
		</span>
		<?php echo $form->error($model,'conversational_level'); ?>
	</div>

	<div class="row">
		<span class="plain-select">
		<?php echo $form->dropDownList($model,'reading_level',array(
					'Alto'=>'Alto',
					'Medio'=>'Medio',
					'Bajo'=>'Bajo'),
					array('prompt'=>'Seleccionar nivel de lectura','title'=>'Nivel de Lectura')
                );
		?>
		</span>
		<?php echo $form->error($model,'reading_level'); ?>
	</div>

	<div class="row">
		<span class="plain-select">
		<?php echo $form->dropDownList($model,'writting_level',array(
					'Alto'=>'Alto',
					'Medio'=>'Medio',
					'Bajo'=>'Bajo'),
					array('prompt'=>'Seleccionar nivel de escritura','title'=>'Nivel de Escritura')
                );
		?>
		</span>
		<?php echo $form->error($model,'writting_level'); ?>
	</div>
	<div class="row">
    <span class="plain-select">
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'language'=> 'es',
		    'attribute' => 'evaluation_date',
		    'model' => $model,
		   	//'flat'=>true,
		     'options' => array(
			     		'changeMonth'=>true, //cambiar por Mes
			     		'changeYear'=>true, //cambiar por Año
			    		'maxDate' => 'now',
				        'yearRange'=>'1930:now',
				       

		     	),
		    'htmlOptions' => array(
		    			'readonly'=>true,
		    			'title'=>'Fecha de evaluación',
		        		'placeholder'=>"Fecha de evaluación"),
				));
	?>
	 </span>
          <?php echo $form->error($model,'evaluation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'document_percentage',array('placeholder'=>'Puntos / Porcentaje','title'=>'Puntos / Porcentaje')); ?>
		<?php echo $form->error($model,'document_percentage'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->fileField($model,'path',array('size'=>60,'maxlength'=>100, "title"=>"Exámen / Documento probatorio")); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>


	<div class="row buttons">
 <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar', array('class'=>'savebutton')); ?> 
<!--  	  <?php echo CHtml::ajaxButton ($model->isNewRecord ? 'Guardar' : 'Modificar',CController::createUrl('languages/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
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
        ?> --> 
       	<?php echo CHtml::Button('Cancelar',array('submit' => array('languages/admin'),'confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->