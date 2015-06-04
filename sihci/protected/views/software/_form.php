<?php
/* @var $this SoftwareController */
/* @var $model Software */
/* @var $form CActiveForm */
   $cs = Yii::app()->getClientScript();
   $cs->registerScriptFile( Yii::app()->baseUrl. '/protected/views/software/js/script.js');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'software-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
	
)); ?>


	<?php echo $form->errorSummary($model); ?>

	
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
				  		'Inventor'=>'Inventor',
				  		'Co-inventor'=>'Co-inventor'
			    ),
			    array('prompt'=>'Seleccionar participación')
			);
	    ?>		
	    </span>
		<?php echo $form->error($model,'participation_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150,'placeholder'=>'Título')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'beneficiary',array('size'=>60,'maxlength'=>150,'placeholder'=>'Beneficiario')); ?>
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
				 array('prompt'=>'Seleccionar entidad')
			);
		 ?>
		 </span>
		<?php echo $form->error($model,'entity'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'manwork_hours',array('placeholder'=>'Horas invertidas en el proyecto')); ?>
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
					array('prompt'=>'Sector')			  
			    ); 
		?>
		</span>
		<?php echo $form->error($model,'sector'); ?>
	</div>

	<div class="row">
	 <span class="plain-select">	
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
					array('prompt'=>'Seleccionar organización')
				);
		?>
		</span>
		<?php echo $form->error($model,'organization'); ?>
	</div>

	<div class="row">
	 <span class="plain-select">	
			<?php echo $form->dropDownList($model,'second_level',
				        array(
                            'CENTRO DE ESTUDIOS DEL PACIFICO'=>'CENTRO DE ESTUDIOS DEL PACIFICO',
                            'CENTRO DE ESTUDIOS E INVESTIGACION EN COMPORTAMIENTO'=>'CENTRO DE ESTUDIOS E INVESTIGACION EN COMPORTAMIENTO',
                            'CENTRO DE ESTUDIOS E INVESTIGACIONES EN PSICOLOGIA'=>'CENTRO DE ESTUDIOS E INVESTIGACIONES EN PSICOLOGIA',
                            'CENTRO DE ESTUDIOS ESTRATEGICOS PARA EL DESARROLLO'=>'CENTRO DE ESTUDIOS ESTRATEGICOS PARA EL DESARROLLO',
                            'CENTRO DE ESTUDIOS PARA EXTRANJEROS'=>'CENTRO DE ESTUDIOS PARA EXTRANJEROS',
                            'CENTRO DE INVESTIGACIONES JURIDICAS'=>'CENTRO DE INVESTIGACIONES JURIDICAS',
                            'CENTRO DE INVESTIGACIONES EDUCATIVAS'=>'CENTRO DE INVESTIGACIONES EDUCATIVAS',
                            'CENTRO DE INVESTIGACIONES SOBRE LOS MOVIMIENTOS SOCIALES'=>'CENTRO DE INVESTIGACIONES SOBRE LOS MOVIMIENTOS SOCIALES',
                            'CENTRO UNIVERSITARIO DE ARTE, ARQUITECTURA Y DISEÑO'=>'CENTRO UNIVERSITARIO DE ARTE, ARQUITECTURA Y DISEÑO',
				        	'CENTRO UNIVERSITARIO DE CIENCIAS BIOLOGICAS Y AGROPECUARIAS'=>'CENTRO UNIVERSITARIO DE CIENCIAS BIOLOGICAS Y AGROPECUARIAS',
				        	'CENTRO UNIVERSITARIO DE CIENCIAS DE LA SALUD'=>'CENTRO UNIVERSITARIO DE CIENCIAS DE LA SALUD',
				        	'CENTRO UNIVERSITARIO DE CIENCIAS ECONOMICAS Y ADMINISTRATIVAS'=>'CENTRO UNIVERSITARIO DE CIENCIAS ECONOMICAS Y ADMINISTRATIVAS',
                            'CENTRO UNIVERSITARIO DE CIENCIAS EXACTAS E INGENIERIA'=>'CENTRO UNIVERSITARIO DE CIENCIAS EXACTAS E INGENIERIA',
                            'CENTRO UNIVERSITARIO DE CIENCIAS SOCIALES Y HUMANIDADES.'=>'CENTRO UNIVERSITARIO DE CIENCIAS SOCIALES Y HUMANIDADES.',
                            'CENTRO UNIVERSITARIO DE LA CIENEGA'=>'CENTRO UNIVERSITARIO DE LA CIENEGA',
                            'CENTRO UNIVERSITARIO DE LA COSTA SUR'=>'CENTRO UNIVERSITARIO DE LA COSTA SUR',
                            'CENTRO UNIVERSITARIO DE LA COSTA.'=>'CENTRO UNIVERSITARIO DE LA COSTA.',
                            'CENTRO UNIVERSITARIO DE LOS ALTOS'=>'CENTRO UNIVERSITARIO DE LOS ALTOS',
                            'CENTRO UNIVERSITARIO DEL SUR.'=>'CENTRO UNIVERSITARIO DEL SUR.',
                            'CENTRO UNIVERSITARIO DE LOS LAGOS'=>'CENTRO UNIVERSITARIO DE LOS LAGOS',
                            'CENTRO UNIVERSITARIO DE LOS VALLES'=>'CENTRO UNIVERSITARIO DE LOS VALLES',
                            'CENTRO UNIVERSITARIO DEL NORTE'=>'CENTRO UNIVERSITARIO DEL NORTE',
                            'CENTRO UNIVERSITARIO DE LA COSTA'=>'CENTRO UNIVERSITARIO DE LA COSTA',
                            'CENTRO UNIVERSITARIO DE LA COSTA SUR'=>'CENTRO UNIVERSITARIO DE LA COSTA SUR',
                            'CENTRO UNIVERSITARIO DE TONALA'=>'CENTRO UNIVERSITARIO DE TONALA',
                            'CENTRO VOCACIONAL DE ACTIVIDADES PARA EL DESARROLLO DE LA COMUNIDAD'=>'CENTRO VOCACIONAL DE ACTIVIDADES PARA EL DESARROLLO DE LA COMUNIDAD',
                            'COORDINACION DE COOPERACION ACADEMICA UDG'=>'COORDINACION DE COOPERACION ACADEMICA UDG',
                            'COORDINACION DE EDUCACION CONTINUA, ABIERTA Y A DISTANCIA'=>'COORDINACION DE EDUCACION CONTINUA, ABIERTA Y A DISTANCIA',
                            'COORDINACION DE VINCULACION Y TRANSFERENCIA TECNOLOGICA'=>'COORDINACION DE VINCULACION Y TRANSFERENCIA TECNOLOGICA',
                            'COORDINACIÓN GENERAL DE SERVICIOS A UNIVERSITARIOS'=>'COORDINACIÓN GENERAL DE SERVICIOS A UNIVERSITARIOS',
                            'COORDINACION GENERAL DE SISTEMAS PARA LA INOVACION DEL APRENDIZAJE'=>'COORDINACION GENERAL DE SISTEMAS PARA LA INOVACION DEL APRENDIZAJE',
                            'DEPARTAMENTO DE GEOGRAFIA'=>'DEPARTAMENTO DE GEOGRAFIA',
                            'DOCTORADO INTERINSTITUCIONAL EN PSICOLOGÍA'=>'DOCTORADO INTERINSTITUCIONAL EN PSICOLOGÍA',
                            'EL COLEGIO DE JALISCO'=>'EL COLEGIO DE JALISCO',
                            'ESCUELA DE GRADUADOS'=>'ESCUELA DE GRADUADOS',
                            'ESCUELA PREPARATORIA DE JALISCO'=>'ESCUELA PREPARATORIA DE JALISCO',
                            'ESCUELA PREPARATORIA DE TONALA NORTE'=>'ESCUELA PREPARATORIA DE TONALA NORTE',
                            'ESCUELA PREPARATORIA REGIONAL DE ATOTONILCO'=>'ESCUELA PREPARATORIA REGIONAL DE ATOTONILCO',
                            'ESCUELA PREPARATORIA #2'=>'ESCUELA PREPARATORIA #2',
                            'FACULTAD DE AGRONOMIA'=>'FACULTAD DE AGRONOMIA',
                            'FACULTAD DE ARQUITECTURA'=>'FACULTAD DE ARQUITECTURA',
                            'FACULTAD DE CIENCIAS'=>'FACULTAD DE CIENCIAS',
                            'FACULTAD DE CIENCIAS BIOLOGICAS'=>'FACULTAD DE CIENCIAS BIOLOGICAS',
                            'FACULTAD DE CIENCIAS QUIMICAS'=>'FACULTAD DE CIENCIAS QUIMICAS',
                            'FACULTAD DE DERECHO'=>'FACULTAD DE DERECHO',
                            'FACULTAD DE ECONOMIA'=>'FACULTAD DE ECONOMIA',
    		                'FACULTAD DE FILOSOFIA Y LETRAS'=>'FACULTAD DE FILOSOFIA Y LETRAS',
                            'FACULTAD DE GEOGRAFIA'=>'FACULTAD DE GEOGRAFIA',
                            'FACULTAD DE INGENIERIA'=>'FACULTAD DE INGENIERIA',
                            'FACULTAD DE ODONTOLOGIA'=>'FACULTAD DE ODONTOLOGIA',
                            'FACULTAD DE MEDICINA'=>'FACULTAD DE MEDICINA',
                            'FACULTAD DE MEDICINA,VETERINARIA Y ZOOTECNIA'=>'FACULTAD DE MEDICINA,VETERINARIA Y ZOOTECNIA',
                            'FACULTAD DE ODONTOLOGIA'=>'FACULTAD DE ODONTOLOGIA',
                            'FACULTAD DE PSICOLOGIA'=>'FACULTAD DE PSICOLOGIA',
                            'INSTITUTO DE BOTANICA'=>'INSTITUTO DE BOTANICA',
                            'INSTITUTO DE ESTUDIOS SOCIALES'=>'INSTITUTO DE ESTUDIOS SOCIALES',
                            'INSTITUTO DE INVESTIGACIONES JURIDICAS'=>'INSTITUTO DE INVESTIGACIONES JURIDICAS',
                            'INSTITUTO DE PATOLOGIA INFECCIOSA Y EXPERIMENTAL'=>'INSTITUTO DE PATOLOGIA INFECCIOSA Y EXPERIMENTAL',
                            'INSTITUTO EN MADERA CELULOSA Y PAPEL ING. KARL A. GRELLMANN'=>'INSTITUTO EN MADERA CELULOSA Y PAPEL ING. KARL A. GRELLMANN',
                            'INSTITUTO MANANTLAN DE ECOLOGIA Y CONSERVACION'=>'INSTITUTO MANANTLAN DE ECOLOGIA Y CONSERVACION',
                            'INSTITUTO REGIONAL DE INVESTIGACION EN SALUD PUBLICA'=>'INSTITUTO REGIONAL DE INVESTIGACION EN SALUD PUBLICA',
                            'LABORATORIO NATURAL LAS JOYAS DE LA SIERRA'=>'LABORATORIO NATURAL LAS JOYAS DE LA SIERRA',
                            'PREPARATORIA 4'=>'PREPARATORIA 4',
                            'PREPARATORIA # 7'=>'PREPARATORIA # 7',
                            'PROGRAMA UNIVERSITARIO DE LENGUAS EXTRANJERAS'=>'PROGRAMA UNIVERSITARIO DE LENGUAS EXTRANJERAS',
                            'SIISTEMA DE EDUCACION MEDIA SUPERIOR'=>'SIISTEMA DE EDUCACION MEDIA SUPERIOR',
                            'SISTEMA DE UNIVERSIDAD VIRTUAL'=>'SISTEMA DE UNIVERSIDAD VIRTUAL',
                            'UNIDAD DE SISTEMAS Y PROCEDIMIENTOS UDG'=>'UNIDAD DE SISTEMAS Y PROCEDIMIENTOS UDG'
			            ),
						array('prompt'=>' Seleccionar segundo nivel')
			    ); 
	    ?>
	    </span>
		<?php echo $form->error($model,'second_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'resumen',array('rows'=>6, 'cols'=>50,'maxlength'=>10000,'placeholder'=>'Resumen')); ?>
		<?php echo $form->error($model,'resumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'objective',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>'Objetivo')); ?>
		<?php echo $form->error($model,'objective'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'contribution',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>'Contribución')); ?>
		<?php echo $form->error($model,'contribution'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'impact_value',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>'Valor de impacto')); ?>
		<?php echo $form->error($model,'impact_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'innovation_trascen',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>'Inovación')); ?>
		<?php echo $form->error($model,'innovation_trascen'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'transfer_mechanism',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>'Mecanismo de transferencia')); ?>
		<?php echo $form->error($model,'transfer_mechanism'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'hr_formation',array('rows'=>6, 'cols'=>50,'maxlength'=>1000,'placeholder'=>'Formación de recursos humanos')); ?>
		<?php echo $form->error($model,'hr_formation'); ?>
	</div>

	<div class="row">
		Apoyo economico
		<?php $status = array('1' => 'Si','0'=>'No'); 
		    echo $form-> RadioButtonList($model,'economic_support' ,$status, array('separator' => ' ','labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'economic_support'); ?>

	</div>

	<div class="row">
		<?php echo $form->FileField($model,'path',array('id'=>'path')); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>


	<div class="row buttons">		
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar', array('class'=>'savebutton','onClick'=>($model->isNewRecord ?  'send()' : 'upDate()'))); ?>
		<?php echo CHtml::Button('Cancelar',array('submit' => array('software/admin'),'confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>

<?php $this->endWidget(); ?>


</div><!-- form -->