<?php
/* @var $this SoftwareController */
/* @var $model Software */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'software-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php
	        $this->widget(
	            'yiiwheels.widgets.formhelpers.WhCountries',
	            array(
					'name' => 'Software[country]',
	                'id' => 'Software_country',
	                'value' => 'MX',
	                'useHelperSelectBox' => true,
	                'pluginOptions' => array(
	                    'country' => '',
	                    'language' => 'es_ES',
	                    'flags' =>true
	                )
	            )
	        );
	    ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'participation_type'); ?>
		<?php echo $form->dropDownList($model,'participation_type',
			    array(
				  		'Inventor'=>'Inventor',
				  		'Coinventor'=>'Coinventor'
			    ),
			    array('prompt'=>'Tipo de participación')
			);
	    ?>		
		<?php echo $form->error($model,'participation_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150,'placeholder'=>'Título')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beneficiary'); ?>
		<?php echo $form->textField($model,'beneficiary',array('size'=>60,'maxlength'=>70,'placeholder'=>'Beneficiario')); ?>
		<?php echo $form->error($model,'beneficiary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entity'); ?>
		<?php echo $form->dropDownList($model,'entity',
				 array(
				 		'Pública'=>'Pública',
				 		'Privada'=>'Privada',
				 		'Sector social'=>'Sector social'
				 ),
				 array('prompt'=>'Entidad')
			);
		 ?>
		<?php echo $form->error($model,'entity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manwork_hours'); ?>
		<?php echo $form->textField($model,'manwork_hours',array('placeholder'=>'Horas hombre')); ?>
		<?php echo $form->error($model,'manwork_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model' => $model,
			    'language'=> 'es',
			    'attribute' => 'end_date',
			    'htmlOptions' => array(
			    	    'dateFormat'=>'d/m/Y',
			    		'size' => '10',         
			        	'maxlength' => '10', 
			        	'placeholder'=>'Fecha de termino',
			    ),
			));
		?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sector'); ?>
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
					array('prompt'=>'Sector')			  
			    ); 
		?>
		<?php echo $form->error($model,'sector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organization'); ?>
		<?php echo $form->dropDownList($model,'organization',
					array(
							'ADMINISTRACION CENTRO COMERCIAL ANDARES SC'=>'ADMINISTRACION CENTRO COMERCIAL ANDARES SC',
							'CLUB DEPORTIVO ATENEA'=>'CLUB DEPORTIVO ATENEA',
							'DREAM BUSINESS WEB SA DE CV'=>'DREAM BUSINESS WEB SA DE CV',
							'EDC SUPPLY S DE RL DE MI'=>'EDC SUPPLY S DE RL DE MI',
							'ENKONTA S DE RL DE CV'=>'ENKONTA S DE RL DE CV',
							'FERMIN MONTIELRIGOBERTO'=>' FERMIN MONTIELRIGOBERTO',
							'MANUFACTURERA OLSON SA DE CV'=>'MANUFACTURERA OLSON SA DE CV',
							'OSOS'=>'OSOS',
							'SIXSIGMA NETWORKS MEXICO'=>'SIXSIGMA NETWORKS MEXICO',
							'TL EFFICIENCY SA DE CV'=>'TL EFFICIENCY SA DE CV'
					),
					array('prompt'=>'Organización')
				);
		?>
		<?php echo $form->error($model,'organization'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'second_level'); ?>
			<?php echo $form->dropDownList($model,'second_level',
				        array(
				        	'CENTRO UNIVERSITARIO DE CIENCIAS BIOLOGICAS Y AGROPECUARIAS'=>'CENTRO UNIVERSITARIO DE CIENCIAS BIOLOGICAS Y AGROPECUARIAS',
				        	'CENTRO UNIVERSITARIO DE CIENCIAS DE LA SALUD'=>'CENTRO UNIVERSITARIO DE CIENCIAS DE LA SALUD',
				        	'CENTRO UNIVERSITARIO DE CIENCIAS ECONOMICAS Y ADMINISTRATIVAS'=>'CENTRO UNIVERSITARIO DE CIENCIAS ECONOMICAS Y ADMINISTRATIVAS',
                            'CENTRO UNIVERSITARIO DE CIENCIAS EXACTAS E INGENIERIA'=>'CENTRO UNIVERSITARIO DE CIENCIAS EXACTAS E INGENIERIA',
                            'CENTRO UNIVERSITARIO DE LA COSTA SUR'=>'CENTRO UNIVERSITARIO DE LA COSTA SUR',
                            'CENTRO UNIVERSITARIO DE ARTE, ARQUITECTURA Y DISEÑO'=>'CENTRO UNIVERSITARIO DE ARTE, ARQUITECTURA Y DISEÑO',
                            'CENTRO UNIVERSITARIO DE CIENCIAS SOCIALES Y HUMANIDADES.'=>'CENTRO UNIVERSITARIO DE CIENCIAS SOCIALES Y HUMANIDADES.',
                            'CENTRO UNIVERSITARIO DE LA CIENEGA'=>'CENTRO UNIVERSITARIO DE LA CIENEGA',
                            'CENTRO UNIVERSITARIO DE LA COSTA.'=>'CENTRO UNIVERSITARIO DE LA COSTA.',
                            'CENTRO UNIVERSITARIO DEL SUR.'=>'CENTRO UNIVERSITARIO DEL SUR.',
                            'CENTRO UNIVERSITARIO DE LOS ALTOS'=>'CENTRO UNIVERSITARIO DE LOS ALTOS',
                            'CENTRO DE INVESTIGACIONES EDUCATIVAS'=>'CENTRO DE INVESTIGACIONES EDUCATIVAS',
                            'CENTRO UNIVERSITARIO DE LOS LAGOS'=>'CENTRO UNIVERSITARIO DE LOS LAGOS',
                            'CENTRO DE INVESTIGACIONES SOBRE LOS MOVIMIENTOS SOCIALES'=>'CENTRO DE INVESTIGACIONES SOBRE LOS MOVIMIENTOS SOCIALES',
                            'CENTRO DE ESTUDIOS DEL PACIFICO'=>'CENTRO DE ESTUDIOS DEL PACIFICO',
                            'CENTRO DE ESTUDIOS E INVESTIGACIONES EN PSICOLOGIA'=>'CENTRO DE ESTUDIOS E INVESTIGACIONES EN PSICOLOGIA',
                            'CENTRO DE ESTUDIOS ESTRATEGICOS PARA EL DESARROLLO'=>'CENTRO DE ESTUDIOS ESTRATEGICOS PARA EL DESARROLLO',
                            'CENTRO DE INVESTIGACIONES JURIDICAS'=>'CENTRO DE INVESTIGACIONES JURIDICAS',
                            'CENTRO DE ESTUDIOS PARA EXTRANJEROS'=>'CENTRO DE ESTUDIOS PARA EXTRANJEROS',
                            'CENTRO DE ESTUDIOS E INVESTIGACION EN COMPORTAMIENTO'=>'CENTRO DE ESTUDIOS E INVESTIGACION EN COMPORTAMIENTO',
                            'CENTRO UNIVERSITARIO DE LOS VALLES'=>'CENTRO UNIVERSITARIO DE LOS VALLES',
                            'CENTRO UNIVERSITARIO DEL NORTE'=>'CENTRO UNIVERSITARIO DEL NORTE',
                            'CENTRO UNIVERSITARIO DE LA COSTA'=>'CENTRO UNIVERSITARIO DE LA COSTA',
                            'CENTRO UNIVERSITARIO DE LA COSTA SUR'=>'CENTRO UNIVERSITARIO DE LA COSTA SUR',
                            'CENTRO UNIVERSITARIO DE TONALA'=>'CENTRO UNIVERSITARIO DE TONALA',
                            'CENTRO VOCACIONAL DE ACTIVIDADES PARA EL DESARROLLO DE LA COMUNIDAD'=>'CENTRO VOCACIONAL DE ACTIVIDADES PARA EL DESARROLLO DE LA COMUNIDAD',
                            'COORDINACION DE COOPERACION ACADEMICA UDG'=>'COORDINACION DE COOPERACION ACADEMICA UDG',
                            'COORDINACION DE VINCULACION Y TRANSFERENCIA TECNOLOGICA'=>'COORDINACION DE VINCULACION Y TRANSFERENCIA TECNOLOGICA',
                            'COORDINACION DE EDUCACION CONTINUA, ABIERTA Y A DISTANCIA'=>'COORDINACION DE EDUCACION CONTINUA, ABIERTA Y A DISTANCIA',
                            'COORDINACION GENERAL DE SISTEMAS PARA LA INOVACION DEL APRENDIZAJE'=>'COORDINACION GENERAL DE SISTEMAS PARA LA INOVACION DEL APRENDIZAJE',
                            'COORDINACIÓN GENERAL DE SERVICIOS A UNIVERSITARIOS'=>'COORDINACIÓN GENERAL DE SERVICIOS A UNIVERSITARIOS',
                            'DEPARTAMENTO DE GEOGRAFIA'=>'DEPARTAMENTO DE GEOGRAFIA',
                            'DOCTORADO INTERINSTITUCIONAL EN PSICOLOGÍA'=>'DOCTORADO INTERINSTITUCIONAL EN PSICOLOGÍA',
                            'ESCUELA PREPARATORIA DE TONALA NORTE'=>'ESCUELA PREPARATORIA DE TONALA NORTE',
                            'EL COLEGIO DE JALISCO'=>'EL COLEGIO DE JALISCO',
                            'ESCUELA PREPARATORIA DE JALISCO'=>'ESCUELA PREPARATORIA DE JALISCO',
                            'ESCUELA PREPARATORIA REGIONAL DE ATOTONILCO'=>'ESCUELA PREPARATORIA REGIONAL DE ATOTONILCO',
                            'ESCUELA PREPARATORIA # 2'=>'ESCUELA PREPARATORIA # 2',
                            'FACULTAD DE INGENIERIA'=>'FACULTAD DE INGENIERIA',
                            'ESCUELA DE GRADUADOS'=>'ESCUELA DE GRADUADOS',
                            'FACULTAD DE MEDICINA'=>'FACULTAD DE MEDICINA',
                            'FACULTAD DE ARQUITECTURA'=>'FACULTAD DE ARQUITECTURA',
                            'FACULTAD DE ODONTOLOGIA'=>'FACULTAD DE ODONTOLOGIA',
                            'FACULTAD DE ODONTOLOGIA'=>'FACULTAD DE ODONTOLOGIA',
                            'FACULTAD DE AGRONOMIA'=>'FACULTAD DE AGRONOMIA',
                            'FACULTAD DE CIENCIAS'=>'FACULTAD DE CIENCIAS',
    		                'FACULTAD DE FILOSOFIA Y LETRAS'=>'FACULTAD DE FILOSOFIA Y LETRAS',
                            'FACULTAD DE GEOGRAFIA'=>'FACULTAD DE GEOGRAFIA',
                            'FACULTAD DE CIENCIAS QUIMICAS'=>'FACULTAD DE CIENCIAS QUIMICAS',
                            'FACULTAD DE ECONOMIA'=>'FACULTAD DE ECONOMIA',
                            'FACULTAD DE PSICOLOGIA'=>'FACULTAD DE PSICOLOGIA',
                            'FACULTAD DE CIENCIAS BIOLOGICAS'=>'FACULTAD DE CIENCIAS BIOLOGICAS',
                            'FACULTAD DE DERECHO'=>'FACULTAD DE DERECHO',
                            'FACULTAD DE MEDICINA, VETERINARIA Y ZOOTECNIA'=>'FACULTAD DE MEDICINA, VETERINARIA Y ZOOTECNIA',
                            'INSTITUTO MANANTLAN DE ECOLOGIA Y CONSERVACION'=>'INSTITUTO MANANTLAN DE ECOLOGIA Y CONSERVACION',
                            'INSTITUTO EN MADERA CELULOSA Y PAPEL ING. KARL A. GRELLMANN'=>'INSTITUTO EN MADERA CELULOSA Y PAPEL ING. KARL A. GRELLMANN',
                            'INSTITUTO DE BOTANICA'=>'INSTITUTO DE BOTANICA',
                            'INSTITUTO DE PATOLOGIA INFECCIOSA Y EXPERIMENTAL'=>'INSTITUTO DE PATOLOGIA INFECCIOSA Y EXPERIMENTAL',
                            'INSTITUTO REGIONAL DE INVESTIGACION EN SALUD PUBLICA'=>'INSTITUTO REGIONAL DE INVESTIGACION EN SALUD PUBLICA',
                            'INSTITUTO DE ESTUDIOS SOCIALES'=>'INSTITUTO DE ESTUDIOS SOCIALES',
                            'INSTITUTO DE INVESTIGACIONES JURIDICAS'=>'INSTITUTO DE INVESTIGACIONES JURIDICAS',
                            'LABORATORIO NATURAL LAS JOYAS DE LA SIERRA'=>'LABORATORIO NATURAL LAS JOYAS DE LA SIERRA',
                            'PREPARATORIA 4'=>'PREPARATORIA 4',
                            'PREPARATORIA # 7'=>'PREPARATORIA # 7',
                            'PROGRAMA UNIVERSITARIO DE LENGUAS EXTRANJERAS'=>'PROGRAMA UNIVERSITARIO DE LENGUAS EXTRANJERAS',
                            'SISTEMA DE UNIVERSIDAD VIRTUAL'=>'SISTEMA DE UNIVERSIDAD VIRTUAL',
                            'SIISTEMA DE EDUCACION MEDIA SUPERIOR'=>'SIISTEMA DE EDUCACION MEDIA SUPERIOR',
                            'UNIDAD DE SISTEMAS Y PROCEDIMIENTOS UDG'=>'UNIDAD DE SISTEMAS Y PROCEDIMIENTOS UDG'
			            ),
						array('prompt'=>'Segundo nivel')
			    ); 
	    ?>
		<?php echo $form->error($model,'second_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resumen'); ?>
		<?php echo $form->textArea($model,'resumen',array('rows'=>6, 'cols'=>50,'placeholder'=>'Resumen')); ?>
		<?php echo $form->error($model,'resumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'objective'); ?>
		<?php echo $form->textArea($model,'objective',array('rows'=>6, 'cols'=>50,'placeholder'=>'Objetivo')); ?>
		<?php echo $form->error($model,'objective'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contribution'); ?>
		<?php echo $form->textArea($model,'contribution',array('rows'=>6, 'cols'=>50,'placeholder'=>'Contribución')); ?>
		<?php echo $form->error($model,'contribution'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor_impacto'); ?>
		<?php echo $form->textArea($model,'valor_impacto',array('rows'=>6, 'cols'=>50,'placeholder'=>'Valor de impacto')); ?>
		<?php echo $form->error($model,'valor_impacto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'innovation_trascen'); ?>
		<?php echo $form->textArea($model,'innovation_trascen',array('rows'=>6, 'cols'=>50,'placeholder'=>'Inovación')); ?>
		<?php echo $form->error($model,'innovation_trascen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transfer_mechanism'); ?>
		<?php echo $form->textArea($model,'transfer_mechanism',array('rows'=>6, 'cols'=>50,'placeholder'=>'Mecanismo de transferencia')); ?>
		<?php echo $form->error($model,'transfer_mechanism'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hr_formation'); ?>
		<?php echo $form->textArea($model,'hr_formation',array('rows'=>6, 'cols'=>50,'placeholder'=>'Formación de recursos humanos')); ?>
		<?php echo $form->error($model,'hr_formation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'economic_support'); ?>
		<?php echo $form->dropDownList($model,'economic_support',
					array(
						"1"=>"Si",
						"0"=>"No"
					),
					array('prompt'=>'Apoyo económico')
				); 
		?>
		<?php echo $form->error($model,'economic_support'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'path'); ?>
		<?php echo $form->textField($model,'path',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>


	<div class="row buttons">
	 <?php echo CHtml::ajaxSubmitButton ('Guardar',CController::createUrl('software/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)), 
        				array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                                      
		                         if(data.status=="success")
		                         {
				                     alert("Registro realizado con éxito");
				                     $("#software-form")[0].reset();
		                         }		                         
		                         else
		                         {
			                     	alert("Complete los campos con *");   
			                     }       
		                  	}',                    
		                    
                        )); 
        ?>
		<?php echo CHtml::resetButton($model->isNewRecord ? 'Borrar' : 'Borrar'); ?>
       	<?php echo CHtml::link('Cancelar',array('/software/admin')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->