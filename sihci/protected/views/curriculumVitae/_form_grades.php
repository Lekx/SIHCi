<?php
/* @var $this GradesController */
/* @var $model Grades */
/* @var $form CActiveForm */
?>
	<style type="text/css">
         .grades{
            display: none;
        }
    </style>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/protected/views/curriculumVitae/script/script.js"></script>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grades-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>
<input id="showFormGrade" type="button"  value="Agregar nueva formación académica">

	<div class="grades">
		<div class="row">
		 <span class="plain-select">
				<?php
				$this->widget('ext.CountrySelectorWidget', array(
							'name' => 'Grades[country]',
							'id' => 'Grades_country',
							'useCountryCode' => false,
							'defaultValue' => '',
							'firstEmpty' => true,
							'firstText' => 'Pais',
							)); ?>
			</span>
		</div>

	<div class="row">
 		<span class="plain-select">
			<?php echo $form->dropDownList($model,'grade',
														array('Licenciatura'=>'Licenciatura','Maestría'=>'Maestría',
														 			'Doctorado'=>'Doctorado', 'Especialidad'=>'Especialidad‏',
																	'Super especialidad‏'=>'Super especialidad‏'),
														array('prompt'=>'Seleccionar grado','title'=>'Seleccionar grado','options' => array(''=>array('selected'=>true))),
														array('size'=>10,'maxlength'=>10)); ?>
		</span>
		<?php echo $form->error($model,'grade');?>
	</div>

	<div class="row">
	<?php	echo $form->textField($model,'writ_number',array('class'=>'numericOnly','size'=>50,'maxlength'=>50, 'placeholder'=>'Número de cédula','title'=>'Número de cédula')); ?>
	<?php echo $form->error($model,'writ_number');?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45,'placeholder'=>'Título','title'=>'Título'));?>
		<?php echo $form->error($model,'title');?>
	</div>

	<div class="row">
 		<span class="plain-select">
			<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					    'language'=> 'es',
					    'id'=> 'Grades_obtention_date',
					    'name'=>'Grades[obtention_date]',
					     'options' => array(
						     		'changeMonth'=>true, //cambiar por Mes
						     		'changeYear'=>true, //cambiar por Año
					     	),
					    'htmlOptions' => array(
					    			'size'=>'10',
					    			'readonly'=>true,
					    			'maxlength'=>'10',
										'title'=>'Fecha de obtencíon',
					        	'placeholder'=>"Fecha de obtención"),
							));
			?>
		</span>
		<?php echo $form->error($model, 'obtention_date') ?>
	</div>

	<div class="row">
 		<span class="plain-select">
		<?php	echo $form->dropDownList($model,'status',
																	array('Creditos terminados'=>'Creditos terminados',
															 					'Grado obtenido'=>'Grado obtenido',
															 					'Proceso'=>'Proceso',
																				'Truncado'=>'Truncado'),
																	array('prompt'=>'Seleccionar estatus','title'=>'Seleccionar estatus','options' => array(''=>array('selected'=>true))),
																	array('size'=>10,'maxlength'=>10)); ?>
		</span>
	<?php	echo $form->error($model,'status');?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'thesis_title',array('size'=>60,'maxlength'=>250,'placeholder'=>'Título de tésis','title'=>'Título de tésis')); ?>
		<?php	echo $form->error($model,'thesis_title');?>
	</div>

	<div class="row">
 		<span class="plain-select">
			<?php echo $form->dropDownList($model,'state',
																array('En proceso'=>'En proceso',
															 				'Terminado'=>'Terminado'),
																array('prompt'=>'Seleccionar estado del título','title'=>'Seleccionar estado del título','options' => array(''=>array('selected'=>true))),
																array('size'=>10,'maxlength'=>10));?>
		</span>
		<?php echo $form->error($model,'state');?>
	</div>

	<div class="row">
		<span class='plain-select'>
			<?php echo $form->dropDownList($model,'sector',
																   array('Centros Privados de Investigación'=>'Centros Privados de Investigación',
																				'Centros Públicos de Investigación'=>'Centros Públicos de Investigación',
																				'Consultoras'=>'consultoras',
																				'Gobierno Federal Desconcentrado'=>'Gobierno Federal Desconcentrado',
																				'Gobierno federal descentralizado'=>'Gobierno federal descentralizado',
																				'Gobierno municipal'=>'Gobierno municipal',
																				'Instituciones / organizaciones extranjeras'=>'Instituciones / organizaciones extranjeras',
																				'Instituciones / organizaciones no lucrativas'=>'Instituciones / organizaciones no lucrativas',
																				'Instituciones del sector de educacion superior privadas'=>'Instituciones del sector de educacion superior privadas',
																				'Instituciones del sector de educacion superior publicas'=>'Instituciones del sector de educacion superior publicas',
																				'Instituciones del sector entidades paraestatales'=>'Instituciones del sector entidades paraestatales',
																				'Instituciones del sector gobierno de las entidades federativas'=>'Instituciones del sector gobierno de las entidades federativas',
																				'Instituciones del sector gobierno federal centralizado'=>'Instituciones del sector gobierno federal centralizado',
																				'Instituciones del sector privado de empresas productivas (adiat)'=>'Instituciones del sector privado de empresas productivas (adiat)',
																				'No especificado'=>'No especificado',),
                                   array('prompt'=>'Seleccionar sector','title'=>'Seleccionar sector','options' => array(''=>array('selected'=>true))));?>
	  </span>
	</div>

	<div class="row">
		<span class='plain-select'>
			<?php	echo $form->dropDownList($model,'institution',
														 array('ATENEO FILOSOFICO AC'=>'ATENEO FILOSOFICO AC',
																		'BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA'=>'BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA',
																		'CENTRO DE BIOTECNOLOGIA GENOMICA IPN'=>'CENTRO DE BIOTECNOLOGIA GENOMICA IPN',
																		'CENTRO DE ENSENANZA TECNICA INDUSTRIAL'=>'CENTRO DE ENSENANZA TECNICA INDUSTRIAL',
																		'CENTRO DE ENSENANZA TECNICA Y SUPERIOR UNIVERSIDAD'=>'CENTRO DE ENSENANZA TECNICA Y SUPERIOR UNIVERSIDAD',
																		'CENTRO DE ESTUDIOS DE RECURSOS BIOTICOS IPN'=>'CENTRO DE ESTUDIOS DE RECURSOS BIOTICOS IPN',
																		'CENTRO DE ESTUDIOS TECNOLOGICOS INDUSTRIAL Y DE SERVICIOS NO 8 "RAFAEL DONDE"'=>'CENTRO DE ESTUDIOS TECNOLOGICOS INDUSTRIAL Y DE SERVICIOS NO 8 "RAFAEL DONDE"',
																		'CENTRO DE GRADUADOS E INNVESTIGACION DEL INSTITUTO TECNOLOGICO DE MORELIA'=>'CENTRO DE GRADUADOS E INNVESTIGACION DEL INSTITUTO TECNOLOGICO DE MORELIA',
																		'CENTRO DE GRADUADOS E INVESTIGACION DEL INSTITUTO TECNOLOGICO DE LA LAGUNA'=>'CENTRO DE GRADUADOS E INVESTIGACION DEL INSTITUTO TECNOLOGICO DE LA LAGUNA',
																		'CENTRO DE INVESTIGACIONES BIOLOGICAS'=>'CENTRO DE INVESTIGACIONES BIOLOGICAS',
																		'COLEGIO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL ESTADO DE MICHOACAN'=>'COLEGIO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL ESTADO DE MICHOACAN',
																		'DIRECCION GENERAL DE EDUCACION EN CIENCIA Y TECNOLOGIA DEL MAR'=>'DIRECCION GENERAL DE EDUCACION EN CIENCIA Y TECNOLOGIA DEL MAR',
																		'ESCUELA NACIONAL DE ESTUDIOS PROFESIONALES IZTACALA UNAM'=>'ESCUELA NACIONAL DE ESTUDIOS PROFESIONALES IZTACALA UNAM',
																		'ESCUELA NORMAL DE SINALOA'=>'ESCUELA NORMAL DE SINALOA',
																		'ESCUELA NORMAL SUPERIOR DEL ESTADO DE QUERETARO'=>'ESCUELA NORMAL SUPERIOR DEL ESTADO DE QUERETARO',
																		'INSTITUTO POLITECNICO NACIONAL'=>'INSTITUTO POLITECNICO NACIONAL',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO DE OAXACA NO 23'=>'INSTITUTO TECNOLOGICO AGROPECUARIO DE OAXACA NO 23',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO NO 1'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 1',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO NO 16'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 16',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO NO 19'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 19',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO NO 2 CONKAL YUCATAN'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 2 CONKAL YUCATAN',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO NO 21'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 21',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO NO 23 DE STA CRUZ XOXOCOTLAN'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 23 DE STA CRUZ XOXOCOTLAN',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO NO 28'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 28',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO NO 29 XOCOYUCANTLAX'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 29 XOCOYUCANTLAX',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO NO 33 DE CELAYA'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 33 DE CELAYA',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO NO 4'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 4',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO NO 5 DE CAMPECHE'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 5 DE CAMPECHE',
																		'INSTITUTO TECNOLOGICO AGROPECUARIO'=>'INSTITUTO TECNOLOGICO AGROPECUARIO',
																		'INSTITUTO TECNOLOGICO DE SONORA'=>'INSTITUTO TECNOLOGICO DE SONORA',
																		'INSTITUTO TECNOLOGICO DEL MAR NO 2 MAZATLAN'=>'INSTITUTO TECNOLOGICO DEL MAR NO 2 MAZATLAN',
																		'INSTITUTO TECNOLOGICO DEL MAR'=>'INSTITUTO TECNOLOGICO DEL MAR',
																		'INSTITUTO TECNOLOGICO FORESTAL'=>'INSTITUTO TECNOLOGICO FORESTAL',
																		'INSTITUTO TECNOLOGICO SUPERIOR DE XALAPA'=>'INSTITUTO TECNOLOGICO SUPERIOR DE XALAPA',
																		'SERVICIOS EDUCATIVOS INTEGRADOS AL EDO DE MEX'=>'SERVICIOS EDUCATIVOS INTEGRADOS AL EDO DE MEX'
																		'TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC'=>'TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC',
																		'TECNOLOGICO NACIONAL DE MEXICO'=>'TECNOLOGICO NACIONAL DE MEXICO',
																		'UNIVERSIDAD AUTONOMA AGRARIA ANTONIO NARRO'=>'UNIVERSIDAD AUTONOMA AGRARIA ANTONIO NARRO',
																		'UNIVERSIDAD AUTONOMA BENITO JUAREZ DE OAXACA'=>'UNIVERSIDAD AUTONOMA BENITO JUAREZ DE OAXACA',
																		'UNIVERSIDAD AUTONOMA DE AGUASCALIENTES'=>'UNIVERSIDAD AUTONOMA DE AGUASCALIENTES',
																		'UNIVERSIDAD AUTONOMA DE BAJA CALIFORNIA SUR'=>'UNIVERSIDAD AUTONOMA DE BAJA CALIFORNIA SUR',
																		'UNIVERSIDAD AUTONOMA DE BAJA CALIFORNIA'=>'UNIVERSIDAD AUTONOMA DE BAJA CALIFORNIA',
																		'UNIVERSIDAD AUTONOMA DE CAMPECHE'=>'UNIVERSIDAD AUTONOMA DE CAMPECHE',
																		'UNIVERSIDAD AUTONOMA DE CHAPINGO'=>'UNIVERSIDAD AUTONOMA DE CHAPINGO',
																		'UNIVERSIDAD AUTONOMA DE CHIAPAS'=>'UNIVERSIDAD AUTONOMA DE CHIAPAS',
																		'UNIVERSIDAD AUTONOMA DE CHIHUAHUA'=>'UNIVERSIDAD AUTONOMA DE CHIHUAHUA',
																		'UNIVERSIDAD AUTONOMA DE CIUDAD JUAREZ'=>'UNIVERSIDAD AUTONOMA DE CIUDAD JUAREZ',
																		'UNIVERSIDAD AUTONOMA DE COAHUILA'=>'UNIVERSIDAD AUTONOMA DE COAHUILA',
																		'UNIVERSIDAD AUTONOMA DE GUERRERO'=>'UNIVERSIDAD AUTONOMA DE GUERRERO',
																		'UNIVERSIDAD AUTONOMA DE HIDALGO'=>'UNIVERSIDAD AUTONOMA DE HIDALGO',
																		'UNIVERSIDAD AUTONOMA DE NAYARIT'=>'UNIVERSIDAD AUTONOMA DE NAYARIT',
																		'UNIVERSIDAD AUTONOMA DE NUEVO LEON'=>'UNIVERSIDAD AUTONOMA DE NUEVO LEON',
																		'UNIVERSIDAD AUTONOMA DE QUERETARO'=>'UNIVERSIDAD AUTONOMA DE QUERETARO',
																		'UNIVERSIDAD AUTONOMA DE SAN LUIS POTOSI'=>'UNIVERSIDAD AUTONOMA DE SAN LUIS POTOSI',
																		'UNIVERSIDAD AUTONOMA DE SINALOA'=>'UNIVERSIDAD AUTONOMA DE SINALOA',
																		'UNIVERSIDAD AUTONOMA DE TAMAULIPAS'=>'UNIVERSIDAD AUTONOMA DE TAMAULIPAS',
																		'UNIVERSIDAD AUTONOMA DE TLAXCALA'=>'UNIVERSIDAD AUTONOMA DE TLAXCALA',
																		'UNIVERSIDAD AUTONOMA DE YUCATAN'=>'UNIVERSIDAD AUTONOMA DE YUCATAN',
																		'UNIVERSIDAD AUTONOMA DE ZACATECAS'=>'UNIVERSIDAD AUTONOMA DE ZACATECAS',
																		'UNIVERSIDAD AUTONOMA DEL CARMEN'=>'UNIVERSIDAD AUTONOMA DEL CARMEN',
																		'UNIVERSIDAD AUTONOMA DEL ESTADO DE HIDALGO'=>'UNIVERSIDAD AUTONOMA DEL ESTADO DE HIDALGO',
																		'UNIVERSIDAD AUTONOMA DEL ESTADO DE MEXICO'=>'UNIVERSIDAD AUTONOMA DEL ESTADO DE MEXICO',
																		'UNIVERSIDAD AUTONOMA DEL ESTADO DE MORELOS'=>'UNIVERSIDAD AUTONOMA DEL ESTADO DE MORELOS',
																		'UNIVERSIDAD AUTONOMA METROPOLITANA'=>'UNIVERSIDAD AUTONOMA METROPOLITANA',
																		'UNIVERSIDAD DE CIENCIAS Y ARTES DE CHIAPAS'=>'UNIVERSIDAD DE CIENCIAS Y ARTES DE CHIAPAS',
																		'UNIVERSIDAD DE COLIMA'=>'UNIVERSIDAD DE COLIMA',
																		'UNIVERSIDAD DE GUADALAJARA'=>'UNIVERSIDAD DE GUADALAJARA',
																		'UNIVERSIDAD DE GUANAJUATO'=>'UNIVERSIDAD DE GUANAJUATO',
																		'UNIVERSIDAD DE LA SIERRA'=>'UNIVERSIDAD DE LA SIERRA',
																		'UNIVERSIDAD DE OCCIDENTE'=>'UNIVERSIDAD DE OCCIDENTE',
																		'UNIVERSIDAD DE QUINTANA ROO'=>'UNIVERSIDAD DE QUINTANA ROO',
																		'UNIVERSIDAD DE SONORA'=>'UNIVERSIDAD DE SONORA',
																		'UNIVERSIDAD DEL ISTMO'=>'UNIVERSIDAD DEL ISTMO',
																		'UNIVERSIDAD DEL MAR'=>'UNIVERSIDAD DEL MAR',
																		'UNIVERSIDAD ESTATAL DE SONORA'=>'UNIVERSIDAD ESTATAL DE SONORA',
																		'UNIVERSIDAD JUAREZ AUTONOMA DE TABASCO'=>'UNIVERSIDAD JUAREZ AUTONOMA DE TABASCO',
																		'UNIVERSIDAD JUAREZ DEL ESTADO DE DURANGO'=>'UNIVERSIDAD JUAREZ DEL ESTADO DE DURANGO',
																		'UNIVERSIDAD MADERO'=>'UNIVERSIDAD MADERO',
																		'UNIVERSIDAD MARISTA'=>'UNIVERSIDAD MARISTA',
																		'UNIVERSIDAD MICHOACANA DE SAN NICOLAS DE HIDALGO'=>'UNIVERSIDAD MICHOACANA DE SAN NICOLAS DE HIDALGO',
																		'UNIVERSIDAD NACIONAL AUTONOMA DE MEXICO'=>'UNIVERSIDAD NACIONAL AUTONOMA DE MEXICO',
																		'UNIVERSIDAD PEDAGOGICA NACIONAL'=>'UNIVERSIDAD PEDAGOGICA NACIONAL',
																		'UNIVERSIDAD POPULAR DE LA CHONTALPA'=>'UNIVERSIDAD POPULAR DE LA CHONTALPA',
																		'UNIVERSIDAD TECNOLOGICA DE AGUASCALIENTES'=>'UNIVERSIDAD TECNOLOGICA DE AGUASCALIENTES',
																		'UNIVERSIDAD TECNOLOGICA DE COAHUILA'=>'UNIVERSIDAD TECNOLOGICA DE COAHUILA',
																		'UNIVERSIDAD TECNOLOGICA DE IZUCAR DE MATAMOROS'=>'UNIVERSIDAD TECNOLOGICA DE IZUCAR DE MATAMOROS',
																		'UNIVERSIDAD TECNOLOGICA DE JALISCO'=>'UNIVERSIDAD TECNOLOGICA DE JALISCO',
																		'UNIVERSIDAD TECNOLOGICA DE LA HUASTECA HIDALGUENSE'=>'UNIVERSIDAD TECNOLOGICA DE LA HUASTECA HIDALGUENSE',
																		'UNIVERSIDAD TECNOLOGICA DE LA MIXTECA'=>'UNIVERSIDAD TECNOLOGICA DE LA MIXTECA',
																		'UNIVERSIDAD TECNOLOGICA DE LA SIERRA HIDALGUENSE'=>'UNIVERSIDAD TECNOLOGICA DE LA SIERRA HIDALGUENSE',
																		'UNIVERSIDAD TECNOLOGICA DE PUEBLA'=>'UNIVERSIDAD TECNOLOGICA DE PUEBLA',
																		'UNIVERSIDAD TECNOLOGICA DE TABASCO'=>'UNIVERSIDAD TECNOLOGICA DE TABASCO',
																		'UNIVERSIDAD TECNOLOGICA DE TECAMACHALCO'=>'UNIVERSIDAD TECNOLOGICA DE TECAMACHALCO',
																		'UNIVERSIDAD TECNOLOGICA DE TORREON'=>'UNIVERSIDAD TECNOLOGICA DE TORREON',
																		'UNIVERSIDAD TECNOLOGICA DE TULA'=>'UNIVERSIDAD TECNOLOGICA DE TULA',
																		'UNIVERSIDAD TECNOLOGICA DE TULANCINGO'=>'UNIVERSIDAD TECNOLOGICA DE TULANCINGO',
																		'UNIVERSIDAD TECNOLOGICA DE TULATEPEJI'=>'UNIVERSIDAD TECNOLOGICA DE TULATEPEJI',
																		'UNIVERSIDAD TECNOLOGICA DEL VALLE DEL MEZQUITAL'=>'UNIVERSIDAD TECNOLOGICA DEL VALLE DEL MEZQUITAL',
																		'UNIVERSIDAD TECNOLOGICA FIDEL VELAZQUEZ'=>'UNIVERSIDAD TECNOLOGICA FIDEL VELAZQUEZ',
																		'UNIVERSIDAD VERACRUZANA'=>'UNIVERSIDAD VERACRUZANA',),
														array('prompt'=>'Seleccionar institución','title'=>'Seleccionar institución','options' => array(''=>array('selected'=>true))));?>
	  </span>
		<?php echo $form->error($model,'institution'); ?>
	</div>
	<div class="row">
    <span class="plain-select">
    <?php echo $form->dropDownList($model,'area',array('ANTROPOLOGIA'=>'ANTROPOLOGIA',
                              'ARTES Y LETRAS'=>'ARTES Y LETRAS',
                              'ASTRONOMIA Y ASTROFISICA'=>'ASTRONOMIA Y ASTROFISICA',
                              'CIENCIAS AGRONOMICAS Y VETERINARIAS'=>'CIENCIAS AGRONOMICAS Y VETERINARIAS',
                              'CIENCIAS DE LA OCUPACION'=>'CIENCIAS DE LA OCUPACION',
                              'CIENCIAS DE LA TECNOLOGIA'=>'CIENCIAS DE LA TECNOLOGIA',
                              'CIENCIAS DE LA TIERRA Y DEL COSMOS'=>'CIENCIAS DE LA TIERRA Y DEL COSMOS',
                              'CIENCIAS DE LA SALUD'=>'CIENCIAS DE LA SALUD',
                              'CIENCIAS DE LA VIDA'=>'CIENCIAS DE LA VIDA',
                              'CIENCIAS ECONOMICAS'=>'CIENCIAS ECONOMICAS',
                              'CIENCIAS JURIDICAS Y DERECHO'=>'CIENCIAS JURIDICAS Y DERECHO',
                              'CIENCIAS POLITICAS'=>'CIENCIAS POLITICAS',
                              'DEMOGRAFIA'=>'DEMOGRAFIA',
                              'ETICA'=>'ETICA',
                              'FILOSOFIA'=>'FILOSOFIA',
                              'FISICA'=>'FISICA',
                              'GEOGRAFIA'=>'GEOGRAFIA',
                              'HISTORIA'=>'HISTORIA',
                              'LINGÜISTICA'=>'LINGÜISTICA',
                              'LOGICA'=>'LOGICA',
                              'MATEMATICAS'=>'MATEMATICAS',
                              'MEDICINA Y PATOLOGIA HUMANA'=>'MEDICINA Y PATOLOGIA HUMANA',
                              'PEDAGOGIA'=>'PEDAGOGIA',
                              'PSICOLOGIA'=>'PSICOLOGIA',
                              'PROSPECTIVA'=>'PROSPECTIVA',
                              'QUIMICA'=>'QUIMICA', 'SOCIOLOGIA'=>'SOCIOLOGIA'),
															array('prompt'=>'Seleccionar área','title'=>'Seleccionar área', 'id'=>'area', 'onchange'=>'changeArea()'));?>
    </span>
    <?php echo $form->error($model,'area'); ?>
  </div>

  <div class="row" id="comboDiscipline">

  </div>
  <div class="row" id="comboSubdiscipline">

  </div>

</div>
	<?php
	$count = 1;
	echo $form->errorSummary($model);
	foreach ($getGrades as $key => $value) {

		echo	'<div class="row">';
		echo " <span class='plain-select'>";

					$this->widget('ext.CountrySelectorWidget', array(
					'value' => $getGrades[$key]->country,
					'name' => 'getCountry[]',
					'id' => 'getCountry',
					'useCountryCode' => false,
					'defaultValue' => 'Mexico',
					'firstEmpty' => true,
					'firstText' => 'Pais',

					));
			echo $form->error($modelUp,'country', array('id'=>'Grades_country_em_'.$getGrades[$key]->id));
		echo '</div>';

		echo	'<div class="row">';
		echo " <span class='plain-select'>";
			echo $form->dropDownList($modelUp,'grade',array('Licenciatura'=>'Licenciatura','Maestría'=>'Maestría',
																'Doctorado'=>'Doctorado', 'Especialidad'=>'Especialidad‏', 'Super especialidad‏'=>'Super especialidad‏'),
			                                                       array('name'=>'getGrade[]','prompt'=>'Seleccionar grado','title'=>'Seleccionar grado','options' => array($getGrades[$key]->grade=>array('selected'=>true))),
			                                                       array('size'=>10,'maxlength'=>10));
		echo '</span>';
			echo $form->error($modelUp,'grade', array('id'=>'Grades_grade_em_'.$getGrades[$key]->id));
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->textField($modelUp,'writ_number',array('name'=>'getWritNumber[]','value'=>$getGrades[$key]->writ_number,'class'=>'numericOnly','size'=>50,'maxlength'=>50, 'placeholder'=>'Número de cédula','title'=>'Número de cédula'));
			echo $form->error($modelUp,'writ_number', array('id'=>'Grades_writ_number_em_'.$getGrades[$key]->id));
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->textField($modelUp,'title',array('name'=>'getTitle[]','value'=>$getGrades[$key]->title,'size'=>45,'maxlength'=>45,'placeholder'=>'Título','title'=>'Título'));
			 echo '<div id="getTitle'.$getGrades[$key]->id.'" class="errorMessage" style="display:none;"></div>';
		echo '</div>';


		echo	'<div class="row">';
			echo " <span class='plain-select'>";
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'language'=> 'es',
			    'name'=> 'getObtentionDate[]',
			    'value'=> $getGrades[$key]->obtention_date,
			     'options' => array(
				     		'changeMonth'=>true, //cambiar por Mes
				     		'changeYear'=>true, //cambiar por Año
				    			'maxDate' => 'now',
			     	),
			    'htmlOptions' => array(
			    			'size'=>'10',
			    			'readonly'=>true,
			    			'maxlength'=>'10',
								'title'=>'Fecha de obtención',
			        	'placeholder'=>"Fecha de obtención"),
					));
				echo '</span>';
			echo $form->error($modelUp,'obtention_date', array('id'=>'Grades_obtention_date_em_'.$getGrades[$key]->id));
		echo '</div>';

		echo	'<div class="row">';
		echo "<span class='plain-select'>";
			 echo $form->dropDownList($modelUp,'status',array('Creditos_Terminados'=>'Creditos Terminados',
																'Grado_Obtenido'=>'Grado Obtenido',
																'Proceso'=>'Proceso','Truncado'=>'Truncado'),
			                                                       array('name'=>'getStatus[]','prompt'=>'Seleccionar estatus','title'=>'Seleccionar estatus','options' => array($getGrades[$key]->status=>array('selected'=>true))),
			                                                       array('size'=>10,'maxlength'=>10));
		echo '</span>';
			 echo $form->error($modelUp,'status', array('id'=>'Grades_status_em_'.$getGrades[$key]->id));
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->textField($modelUp,'thesis_title',array('name'=>'getThesisTitle[]','value'=>$getGrades[$key]->thesis_title,'size'=>60,'maxlength'=>250,'placeholder'=>'Título de tésis','title'=>'Título de tésis'));
			echo $form->error($modelUp,'thesis_title', array('id'=>'Grades_thesis_title_em_'.$getGrades[$key]->id));
		echo '</div>';

		echo	'<div class="row">';
		echo " <span class='plain-select'>";
			 echo $form->dropDownList($modelUp,'state',
			 													array('En proceso'=>'En proceso',
																			'Terminado'=>'Terminado'),
							                 array('name'=>'getState[]','prompt'=>'Seleccionar estado del título','title'=>'Seleccionar estado del título','options' => array($getGrades[$key]->state=>array('selected'=>true))),
							                 array('size'=>10,'maxlength'=>10));
		echo '</span>';
			 echo $form->error($modelUp,'state', array('id'=>'Grades_state_em_'.$getGrades[$key]->id));
		echo '</div>';

		echo	'<div class="row">';
		echo " <span class='plain-select'>";
			 echo $form->dropDownList($modelUp,'sector',array('No especificado'=>'No especificado','Instituciones del sector gobierno federal centralizado'=>'Instituciones del sector gobierno federal centralizado',
				                                                 'Instituciones del sector entidades paraestatales'=>'Instituciones del sector entidades paraestatales','Instituciones del sector gobierno de las entidades federativas'=>'Instituciones del sector gobierno de las entidades federativas',
				                                                 'Instituciones del sector de educacion superior publicas'=>'Instituciones del sector de educacion superior publicas','Instituciones del sector de educacion superior privadas'=>'Instituciones del sector de educacion superior privadas',
				                                                 'Instituciones del sector privado de empresas productivas (adiat)'=>'Instituciones del sector privado de empresas productivas (adiat)','Instituciones / organizaciones no lucrativas'=>'Instituciones / organizaciones no lucrativas',
				                                                 'Instituciones / organizaciones extranjeras'=>'Instituciones / organizaciones extranjeras','consultoras'=>'consultoras','Gobierno municipal'=>'Gobierno municipal','Gobierno federal descentralizado'=>'Gobierno federal descentralizado',
				                                                 'Gobierno Federal Desconcentrado'=>'Gobierno Federal Desconcentrado','Centros Públicos de Investigación'=>'Centros Públicos de Investigación','Centros Privados de Investigación'=>'Centros Privados de Investigación'),
				                                                 array('name'=>'getSector[]','prompt'=>'Seleccionar sector','title'=>'Seleccionar sector','options' => array($getGrades[$key]->sector=>array('selected'=>true))));
		echo '</span>';
			 echo $form->error($modelUp,'sector', array('id'=>'Grades_sector_em_'.$getGrades[$key]->id));
		echo '</div>';

		echo	'<div class="row">';
		echo " <span class='plain-select'>";
			echo $form->dropDownList($modelUp,'institution',array('BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA'=>'BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA','UNIVERSIDAD ESTATAL DE SONORA'=>'UNIVERSIDAD ESTATAL DE SONORA','CENTRO DE INVESTIGACIONES BIOLOGICAS'=>'CENTRO DE INVESTIGACIONES BIOLOGICAS',
			                                                       'CENTRO DE BIOTECNOLOGIA GENOMICA IPN'=>'CENTRO DE BIOTECNOLOGIA GENOMICA IPN','CENTRO DE ESTUDIOS DE RECURSOS BIOTICOS IPN'=>'CENTRO DE ESTUDIOS DE RECURSOS BIOTICOS IPN','TECNOLOGICO NACIONAL DE MEXICO'=>'TECNOLOGICO NACIONAL DE MEXICO',
			                                                       'ESCUELA NORMAL DE SINALOA'=>'ESCUELA NORMAL DE SINALOA','INSTITUTO POLITECNICO NACIONAL'=>'INSTITUTO POLITECNICO NACIONAL','INSTITUTO TECNOLOGICO AGROPECUARIO'=>'INSTITUTO TECNOLOGICO AGROPECUARIO','INSTITUTO TECNOLOGICO DE SONORA'=>'INSTITUTO TECNOLOGICO DE SONORA',
			                                                       'INSTITUTO TECNOLOGICO DEL MAR'=>'INSTITUTO TECNOLOGICO DEL MAR','TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC'=>'TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC','UNIVERSIDAD AUTONOMA AGRARIA ANTONIO NARRO'=>'UNIVERSIDAD AUTONOMA AGRARIA ANTONIO NARRO',
			                                                       'UNIVERSIDAD AUTONOMA BENITO JUAREZ DE OAXACA'=>'UNIVERSIDAD AUTONOMA BENITO JUAREZ DE OAXACA','UNIVERSIDAD AUTONOMA DE AGUASCALIENTES'=>'UNIVERSIDAD AUTONOMA DE AGUASCALIENTES','UNIVERSIDAD AUTONOMA DE BAJA CALIFORNIA'=>'UNIVERSIDAD AUTONOMA DE BAJA CALIFORNIA',
			                                                       'UNIVERSIDAD AUTONOMA DE BAJA CALIFORNIA SUR'=>'UNIVERSIDAD AUTONOMA DE BAJA CALIFORNIA SUR','UNIVERSIDAD AUTONOMA DE CAMPECHE'=>'UNIVERSIDAD AUTONOMA DE CAMPECHE','UNIVERSIDAD AUTONOMA DE CHAPINGO'=>'UNIVERSIDAD AUTONOMA DE CHAPINGO',
			                                                       'UNIVERSIDAD AUTONOMA DE CHIAPAS'=>'UNIVERSIDAD AUTONOMA DE CHIAPAS','UNIVERSIDAD AUTONOMA DE CHIHUAHUA'=>'UNIVERSIDAD AUTONOMA DE CHIHUAHUA','UNIVERSIDAD AUTONOMA DE COAHUILA'=>'UNIVERSIDAD AUTONOMA DE COAHUILA','UNIVERSIDAD AUTONOMA DEL ESTADO DE HIDALGO'=>'UNIVERSIDAD AUTONOMA DEL ESTADO DE HIDALGO',
			                                                       'UNIVERSIDAD AUTONOMA DE NAYARIT'=>'UNIVERSIDAD AUTONOMA DE NAYARIT','UNIVERSIDAD AUTONOMA DE NUEVO LEON'=>'UNIVERSIDAD AUTONOMA DE NUEVO LEON','UNIVERSIDAD AUTONOMA DE QUERETARO'=>'UNIVERSIDAD AUTONOMA DE QUERETARO','UNIVERSIDAD AUTONOMA DE SAN LUIS POTOSI'=>'UNIVERSIDAD AUTONOMA DE SAN LUIS POTOSI',
			                                                       'UNIVERSIDAD AUTONOMA DE SINALOA'=>'UNIVERSIDAD AUTONOMA DE SINALOA','UNIVERSIDAD AUTONOMA DE TAMAULIPAS'=>'UNIVERSIDAD AUTONOMA DE TAMAULIPAS','UNIVERSIDAD AUTONOMA DE TLAXCALA'=>'UNIVERSIDAD AUTONOMA DE TLAXCALA','UNIVERSIDAD AUTONOMA DE YUCATAN'=>'UNIVERSIDAD AUTONOMA DE YUCATAN',
			                                                       'UNIVERSIDAD AUTONOMA DE ZACATECAS'=>'UNIVERSIDAD AUTONOMA DE ZACATECAS','UNIVERSIDAD AUTONOMA DEL CARMEN'=>'UNIVERSIDAD AUTONOMA DEL CARMEN','UNIVERSIDAD AUTONOMA DEL ESTADO DE MEXICO'=>'UNIVERSIDAD AUTONOMA DEL ESTADO DE MEXICO','UNIVERSIDAD AUTONOMA DEL ESTADO DE MORELOS'=>'UNIVERSIDAD AUTONOMA DEL ESTADO DE MORELOS',
			                                                       'UNIVERSIDAD AUTONOMA METROPOLITANA'=>'UNIVERSIDAD AUTONOMA METROPOLITANA','UNIVERSIDAD DE COLIMA'=>'UNIVERSIDAD DE COLIMA','UNIVERSIDAD DE GUADALAJARA'=>'UNIVERSIDAD DE GUADALAJARA','UNIVERSIDAD DE GUANAJUATO'=>'UNIVERSIDAD DE GUANAJUATO','UNIVERSIDAD DE QUINTANA ROO'=>'UNIVERSIDAD DE QUINTANA ROO',
			                                                       'UNIVERSIDAD DE SONORA'=>'UNIVERSIDAD DE SONORA','UNIVERSIDAD JUAREZ DEL ESTADO DE DURANGO'=>'UNIVERSIDAD JUAREZ DEL ESTADO DE DURANGO','UNIVERSIDAD JUAREZ AUTONOMA DE TABASCO'=>'UNIVERSIDAD JUAREZ AUTONOMA DE TABASCO','UNIVERSIDAD MADERO'=>'UNIVERSIDAD MADERO',
			                                                       'UNIVERSIDAD MICHOACANA DE SAN NICOLAS DE HIDALGO'=>'UNIVERSIDAD MICHOACANA DE SAN NICOLAS DE HIDALGO','UNIVERSIDAD NACIONAL AUTONOMA DE MEXICO'=>'UNIVERSIDAD NACIONAL AUTONOMA DE MEXICO','UNIVERSIDAD PEDAGOGICA NACIONAL'=>'UNIVERSIDAD PEDAGOGICA NACIONAL','UNIVERSIDAD VERACRUZANA'=>'UNIVERSIDAD VERACRUZANA',
			                                                       'UNIVERSIDAD AUTONOMA DE CIUDAD JUAREZ'=>'UNIVERSIDAD AUTONOMA DE CIUDAD JUAREZ','UNIVERSIDAD AUTONOMA DE GUERRERO'=>'UNIVERSIDAD AUTONOMA DE GUERRERO','UNIVERSIDAD TECNOLOGICA DE AGUASCALIENTES'=>'UNIVERSIDAD TECNOLOGICA DE AGUASCALIENTES','UNIVERSIDAD TECNOLOGICA DE IZUCAR DE MATAMOROS'=>'UNIVERSIDAD TECNOLOGICA DE IZUCAR DE MATAMOROS',
			                                                       'UNIVERSIDAD TECNOLOGICA DE PUEBLA'=>'UNIVERSIDAD TECNOLOGICA DE PUEBLA','UNIVERSIDAD TECNOLOGICA DE TABASCO'=>'UNIVERSIDAD TECNOLOGICA DE TABASCO','UNIVERSIDAD TECNOLOGICA DE TECAMACHALCO'=>'UNIVERSIDAD TECNOLOGICA DE TECAMACHALCO','UNIVERSIDAD TECNOLOGICA DE TULA'=>'UNIVERSIDAD TECNOLOGICA DE TULA',
			                                                       'UNIVERSIDAD TECNOLOGICA DE TULANCINGO'=>'UNIVERSIDAD TECNOLOGICA DE TULANCINGO','UNIVERSIDAD TECNOLOGICA DE LA HUASTECA HIDALGUENSE'=>'UNIVERSIDAD TECNOLOGICA DE LA HUASTECA HIDALGUENSE','UNIVERSIDAD TECNOLOGICA DE LA MIXTECA'=>'UNIVERSIDAD TECNOLOGICA DE LA MIXTECA',
			                                                       'UNIVERSIDAD TECNOLOGICA DEL VALLE DEL MEZQUITAL'=>'UNIVERSIDAD TECNOLOGICA DEL VALLE DEL MEZQUITAL','UNIVERSIDAD DE CIENCIAS Y ARTES DE CHIAPAS'=>'UNIVERSIDAD DE CIENCIAS Y ARTES DE CHIAPAS','UNIVERSIDAD DE OCCIDENTE'=>'UNIVERSIDAD DE OCCIDENTE','UNIVERSIDAD DEL MAR'=>'UNIVERSIDAD DEL MAR',
			                                                       'CENTRO DE ENSENANZA TECNICA Y SUPERIOR UNIVERSIDAD'=>'CENTRO DE ENSENANZA TECNICA Y SUPERIOR UNIVERSIDAD','ESCUELA NORMAL SUPERIOR DEL ESTADO DE QUERETARO'=>'ESCUELA NORMAL SUPERIOR DEL ESTADO DE QUERETARO','UNIVERSIDAD TECNOLOGICA DE LA SIERRA HIDALGUENSE'=>'UNIVERSIDAD TECNOLOGICA DE LA SIERRA HIDALGUENSE',
			                                                       'DIRECCION GENERAL DE EDUCACION EN CIENCIA Y TECNOLOGIA DEL MAR'=>'DIRECCION GENERAL DE EDUCACION EN CIENCIA Y TECNOLOGIA DEL MAR','UNIVERSIDAD TECNOLOGICA DE TULATEPEJI'=>'UNIVERSIDAD TECNOLOGICA DE TULATEPEJI','UNIVERSIDAD AUTONOMA DE HIDALGO'=>'UNIVERSIDAD AUTONOMA DE HIDALGO',
			                                                       'ATENEO FILOSOFICO AC'=>'ATENEO FILOSOFICO AC','CENTRO DE ENSENANZA TECNICA INDUSTRIAL'=>'CENTRO DE ENSENANZA TECNICA INDUSTRIAL','UNIVERSIDAD POPULAR DE LA CHONTALPA'=>'UNIVERSIDAD POPULAR DE LA CHONTALPA','UNIVERSIDAD TECNOLOGICA FIDEL VELAZQUEZ'=>'UNIVERSIDAD TECNOLOGICA FIDEL VELAZQUEZ',
			                                                       'INSTITUTO TECNOLOGICO AGROPECUARIO NO 16'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 16','INSTITUTO TECNOLOGICO AGROPECUARIO DE OAXACA NO 23'=>'INSTITUTO TECNOLOGICO AGROPECUARIO DE OAXACA NO 23','INSTITUTO TECNOLOGICO AGROPECUARIO NO 2 CONKAL YUCATAN'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 2 CONKAL YUCATAN',
			                                                       'INSTITUTO TECNOLOGICO AGROPECUARIO NO 1'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 1','INSTITUTO TECNOLOGICO DEL MAR NO 2 MAZATLAN'=>'INSTITUTO TECNOLOGICO DEL MAR NO 2 MAZATLAN','UNIVERSIDAD TECNOLOGICA DE TORREON'=>'UNIVERSIDAD TECNOLOGICA DE TORREON','UNIVERSIDAD TECNOLOGICA DE COAHUILA'=>'UNIVERSIDAD TECNOLOGICA DE COAHUILA',
			                                                       'INSTITUTO TECNOLOGICO AGROPECUARIO NO 28'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 28','INSTITUTO TECNOLOGICO SUPERIOR DE XALAPA'=>'INSTITUTO TECNOLOGICO SUPERIOR DE XALAPA','INSTITUTO TECNOLOGICO AGROPECUARIO NO 19'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 19','INSTITUTO TECNOLOGICO AGROPECUARIO NO 21'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 21',
			                                                       'INSTITUTO TECNOLOGICO AGROPECUARIO NO 4'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 4','INSTITUTO TECNOLOGICO AGROPECUARIO NO 5 DE CAMPECHE'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 5 DE CAMPECHE','INSTITUTO TECNOLOGICO FORESTAL'=>'INSTITUTO TECNOLOGICO FORESTAL','UNIVERSIDAD DE LA SIERRA'=>'UNIVERSIDAD DE LA SIERRA',
			                                                       'UNIVERSIDAD MARISTA'=>'UNIVERSIDAD MARISTA','UNIVERSIDAD TECNOLOGICA DE JALISCO'=>'UNIVERSIDAD TECNOLOGICA DE JALISCO','CENTRO DE ESTUDIOS TECNOLOGICOS INDUSTRIAL Y DE SERVICIOS NO 8 "RAFAEL DONDE"'=>'CENTRO DE ESTUDIOS TECNOLOGICOS INDUSTRIAL Y DE SERVICIOS NO 8 "RAFAEL DONDE"',
			                                                       'CENTRO DE GRADUADOS E INNVESTIGACION DEL INSTITUTO TECNOLOGICO DE MORELIA'=>'CENTRO DE GRADUADOS E INNVESTIGACION DEL INSTITUTO TECNOLOGICO DE MORELIA','CENTRO DE GRADUADOS E INVESTIGACION DEL INSTITUTO TECNOLOGICO DE LA LAGUNA'=>'CENTRO DE GRADUADOS E INVESTIGACION DEL INSTITUTO TECNOLOGICO DE LA LAGUNA',
			                                                       'ESCUELA NACIONAL DE ESTUDIOS PROFESIONALES IZTACALA UNAM'=>'ESCUELA NACIONAL DE ESTUDIOS PROFESIONALES IZTACALA UNAM','COLEGIO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL ESTADO DE MICHOACAN'=>'COLEGIO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL ESTADO DE MICHOACAN','UNIVERSIDAD DEL ISTMO'=>'UNIVERSIDAD DEL ISTMO',
			                                                       'INSTITUTO TECNOLOGICO AGROPECUARIO NO 23 DE STA CRUZ XOXOCOTLAN'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 23 DE STA CRUZ XOXOCOTLAN','INSTITUTO TECNOLOGICO AGROPECUARIO NO 29 XOCOYUCANTLAX'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 29 XOCOYUCANTLAX','INSTITUTO TECNOLOGICO AGROPECUARIO NO 33 DE CELAYA'=>'INSTITUTO TECNOLOGICO AGROPECUARIO NO 33 DE CELAYA',
			                                                       'SERVICIOS EDUCATIVOS INTEGRADOS AL EDO DE MEX'=>'SERVICIOS EDUCATIVOS INTEGRADOS AL EDO DE MEX'),
														array('name'=>'getInstitution[]','prompt'=>'Seleccionar institución','title'=>'Seleccionar institución','options' => array($getGrades[$key]->institution=>array('selected'=>true))));
		echo '</span>';
			 echo $form->error($modelUp,'institution', array('id'=>'Grades_institution_em_'.$getGrades[$key]->id));
		echo '</div>';

		echo	'<div class="row">';
		echo " <span class='plain-select'>";
		     echo $form->dropDownList($modelUp,'area',array('ANTROPOLOGIA'=>'ANTROPOLOGIA',
                              'ARTES Y LETRAS'=>'ARTES Y LETRAS',
                              'ASTRONOMIA Y ASTROFISICA'=>'ASTRONOMIA Y ASTROFISICA',
                              'CIENCIAS AGRONOMICAS Y VETERINARIAS'=>'CIENCIAS AGRONOMICAS Y VETERINARIAS',
                              'CIENCIAS DE LA OCUPACION'=>'CIENCIAS DE LA OCUPACION',
                              'CIENCIAS DE LA TECNOLOGIA'=>'CIENCIAS DE LA TECNOLOGIA',
                              'CIENCIAS DE LA TIERRA Y DEL COSMOS'=>'CIENCIAS DE LA TIERRA Y DEL COSMOS',
                              'CIENCIAS DE LA SALUD'=>'CIENCIAS DE LA SALUD',
                              'CIENCIAS DE LA VIDA'=>'CIENCIAS DE LA VIDA',
                              'CIENCIAS ECONOMICAS'=>'CIENCIAS ECONOMICAS',
                              'CIENCIAS JURIDICAS Y DERECHO'=>'CIENCIAS JURIDICAS Y DERECHO',
                              'CIENCIAS POLITICAS'=>'CIENCIAS POLITICAS',
                              'DEMOGRAFIA'=>'DEMOGRAFIA',
                              'ETICA'=>'ETICA',
                              'FILOSOFIA'=>'FILOSOFIA',
                              'FISICA'=>'FISICA',
                              'GEOGRAFIA'=>'GEOGRAFIA',
                              'HISTORIA'=>'HISTORIA',
                              'LINGÜISTICA'=>'LINGÜISTICA',
                              'LOGICA'=>'LOGICA',
                              'MATEMATICAS'=>'MATEMATICAS',
                              'MEDICINA Y PATOLOGIA HUMANA'=>'MEDICINA Y PATOLOGIA HUMANA',
                              'PEDAGOGIA'=>'PEDAGOGIA',
                              'PSICOLOGIA'=>'PSICOLOGIA',
                              'PROSPECTIVA'=>'PROSPECTIVA',
                              'QUIMICA'=>'QUIMICA', 'SOCIOLOGIA'=>'SOCIOLOGIA'),
											array('name'=>'getArea[]','prompt'=>'Seleccionar área','title'=>'Seleccionar área','options'=>array($getGrades[$key]->area=>array('selected'=>true)),'id'=>'getArea', 'onchange'=>'changeArea()'));
			echo '</span>';
			 echo $form->error($modelUp,'area', array('id'=>'Grades_area_em_'.$getGrades[$key]->id));
		echo '</div>';


		echo '<div class="row"id="comboDiscipline">';
		echo '<span class="plain-select">';
	echo $form->dropDownList($modelUp,'discipline',array($getGrades[$key]->discipline=>$getGrades[$key]->discipline),array('prompt'=>'Seleccionar disciplina', 'name'=>'getDiscipline[]','options'=>array($getGrades[$key]->discipline=>array('selected'=>true))));
		echo '</span>';
		echo '</div>';
		echo '<div class="row"id="comboSubdiscipline">';
		echo '<span class="plain-select">';
			echo $form->dropDownList($modelUp,'subdiscipline',array($getGrades[$key]->subdiscipline => $getGrades[$key]->subdiscipline),array('prompt'=>'Seleccionar subdisciplina', 'name'=>'getSubdiscipline[]','options'=>array($getGrades[$key]->subdiscipline=>array('selected'=>true))));
		echo '</span>';
		echo '</div>';

		echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteGrade','id'=>$getGrades[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething'));
		echo "<br>";
		echo "<hr>";
		echo "<br>";
		$count ++;
	} ?>

	<div class="row buttons">
		<?php echo CHtml::htmlButton('Guardar',array(
							 'onclick'=>'send("grades-form", "curriculumVitae/grades", "'.$model->id.'","curriculumVitae/grades","");',
								//'id'=> 'post-submit-btn',
							 'class'=>'savebutton',
					 ));
			 ?>
<?php echo CHtml::link('Cancelar',array('curriculumVitae/grades'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>
<hr>

<?php $this->endWidget(); ?>

</div><!-- form -->
