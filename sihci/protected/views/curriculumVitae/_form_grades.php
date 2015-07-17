<?php
/* @var $this GradesController */
/* @var $model Grades */
/* @var $form CActiveForm */
?>
	<style type="text/css">
        .errors{
            -webkit-boxshadow: 0 0 10px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            -o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background: red;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            display: none;
            margin-top: -50px;
            margin-left: 455px;
            position: absolute;
			border-radius: 5px;
			border: 2px solid #F20862;
			background: #F20862;
			color: #fff;
			width: 190px !important;
			font-family: 'Caviar_Dreams_Bold' !important;
			font-size: 12px;
			line-height: 16px;
			padding: 8px 10px;
			text-align:  center;
        }
         .grades{
            display: none;
        }
    </style>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/protected/views/curriculumVitae/script/script.js"></script>

<div class="form">



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grades-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>
<input id="showFormGrade" type="button"  value="Agregar Nueva Formación Académica">

	<div class="grades">
	<div class="row">
	 <span class="plain-select">
		<?php
		$this->widget('ext.CountrySelectorWidget', array(
					'name' => 'country',
					'id' => 'country',
					'useCountryCode' => false,
					'defaultValue' => '',
					'firstEmpty' => true,
					'firstText' => 'Pais',

					)); ?>
					</span>
					</div>
	<div class="row">
 <span class="plain-select">
		<select id="grade" name="grade" title="Seleccionar grado">
  			<option value="" selected="">Grado</option>
  			<option value="Licenciatura">Licenciatura</option>
  			<option value="Maestria">Maestria</option>
  			<option value="Doctorado">Doctorado</option>
  			<option value="Especialidad">Especialidad</option>
  			<option value="Super especialidad‏">Super especialidad‏</option>
		</select>
		</span>
		</div>
		<div id="errorGrade" class="errors"> Debe seleccionar su Grado</div>
	<div class="row">
		<input id="writNumber" type="text" name="writNumber" placeholder="Número de Cédula" title="Número de Cédula">
		<div id="errorNumber" class="errors"> Debe ser Número </div>
	</div>
	<div class="row">
		<input id="title" type="text" name="title" placeholder="Título" title="Título">
		<div id="errorTitle" class="errors"> Debe seleccionar Título </div>
	</div>
	<div class="row">
 <span class="plain-select">
		<?php

		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'language'=> 'es',
			    'id'=> 'obtentionDate',
			    'name'=>'obtentionDate',
			     'options' => array(
				     		'changeMonth'=>true, //cambiar por Mes
				     		'changeYear'=>true, //cambiar por Año

			     	),
			    'htmlOptions' => array(
			    			'size'=>'10',
			    			'readonly'=>true,
			    			'maxlength'=>'10',
							'title'=>'Fecha de Obtencíon',
			        		'placeholder'=>"Fecha de Obtención"),
					));
		?>
		</span>
		<div id="errorObtentionDate" class="errors"> Debe seleccionar una Fecha </div>
		</div>
	<div class="row">
 <span class="plain-select">
		<select id="status" name="status" title="Selecionar Estado">
  			<option value="" selected="">Estatus</option>
  			<option value="Creditos Terminados">Creditos Terminados</option>
  			<option value="Grado Obtenido">Grado Obtenido</option>
  			<option value="Proceso">Proceso</option>
  			<option value="Truncado">Truncado</option>
		</select>
		</span>
	</div>
	<div class="row">

		<input id="thesisTitle" type="text" name="thesisTitle" placeholder="Título de Tesis" title="Título de Tesis">
		<div id="errorThesisTitle" class="errors"> Debe seleccionar el Título de Tesis </div>
		</div>
	<div class="row">

 <span class="plain-select">
		<select id="state" name="state" title="Estado de la Tesis">
  			<option value="" selected="">Estado de la Tésis</option>
  			<option value="En proceso">En proceso</option>
  			<option value="Terminado">Terminado</option>
		</select>
		</span>
		<div id="errorState" class="errors"> Debe seleccionar su Estado </div>
		</div>
	<div class="row">

	<?php
   echo " <span class='plain-select'>";
	echo $form->dropDownList($model,'sector',array('No especificado'=>'No especificado','Instituciones del sector gobierno federal centralizado'=>'Instituciones del sector gobierno federal centralizado',
				                                                 'Instituciones del sector entidades paraestatales'=>'Instituciones del sector entidades paraestatales','Instituciones del sector gobierno de las entidades federativas'=>'Instituciones del sector gobierno de las entidades federativas',
				                                                 'Instituciones del sector de educacion superior publicas'=>'Instituciones del sector de educacion superior publicas','Instituciones del sector de educacion superior privadas'=>'Instituciones del sector de educacion superior privadas',
				                                                 'Instituciones del sector privado de empresas productivas (adiat)'=>'Instituciones del sector privado de empresas productivas (adiat)','Instituciones / organizaciones no lucrativas'=>'Instituciones / organizaciones no lucrativas',
				                                                 'Instituciones / organizaciones extranjeras'=>'Instituciones / organizaciones extranjeras','consultoras'=>'consultoras','Gobierno municipal'=>'Gobierno municipal','Gobierno federal descentralizado'=>'Gobierno federal descentralizado',
				                                                 'Gobierno Federal Desconcentrado'=>'Gobierno Federal Desconcentrado','Centros Públicos de Investigación'=>'Centros Públicos de Investigación','Centros Privados de Investigación'=>'Centros Privados de Investigación'),

				                                                 array('name'=>'sector','prompt'=>'Seleccionar Sector','title'=>'Seleccionae Sector','options' => array(''=>array('selected'=>true))));
				                                                 echo "</span>";?>





		</div>
	<div class="row">

	<?php
	echo " <span class='plain-select'>";
	echo $form->dropDownList($model,'institution',array('BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA'=>'BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA','UNIVERSIDAD ESTATAL DE SONORA'=>'UNIVERSIDAD ESTATAL DE SONORA','CENTRO DE INVESTIGACIONES BIOLOGICAS'=>'CENTRO DE INVESTIGACIONES BIOLOGICAS',
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

														array('required'=>'true','name'=>'institution','prompt'=>'Selecciona Institución','title'=>'Seleccionar Institución','options' => array(''=>array('selected'=>true))));

									echo "</span>";?>




		<div id="errorInstitution" class="errors"> Debe seleccionar Institución </div>
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
                              'QUIMICA'=>'QUIMICA', 'SOCIOLOGIA'=>'SOCIOLOGIA'),array('prompt'=>'Seleccionar área','title'=>'Area', 'id'=>'area', 'name'=>'area', 'onchange'=>'changeArea()'));?>
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
	//print_r($getGrades);
	foreach ($getGrades as $key => $value) {

		echo	'<div class="row">';
		echo " <span class='plain-select'>";

					$this->widget('ext.CountrySelectorWidget', array(
					'value' => $getGrades[$key]->country,
					'name' => 'getCountry[]',
					'id' => 'country',
					'useCountryCode' => false,
					'defaultValue' => 'Mexico',
					'firstEmpty' => true,
					'firstText' => 'Pais',

					));
			echo $form->error($model,'country');
		echo '</div>';

		echo	'<div class="row">';
		echo " <span class='plain-select'>";
			echo $form->dropDownList($model,'grade',array('Licenciatura'=>'Licenciatura','Maestria'=>'Maestria',
																'Doctorado'=>'Doctorado', 'Especialidad'=>'Especialidad‏', 'Super especialidad‏'=>'Super especialidad‏'),
			                                                       array('required'=>'true','name'=>'getGrade[]','prompt'=>'Selecciona Grado','title'=>'Selecciona Grado','options' => array($getGrades[$key]->grade=>array('selected'=>true))),
			                                                       array('size'=>10,'maxlength'=>10));
			echo $form->error($model,'grade');
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->textField($model,'writ_number',array('name'=>'getWritNumber[]','value'=>$getGrades[$key]->writ_number,'class'=>'numericOnly','title'=>'Número de Cédula','size'=>50,'maxlength'=>50, 'placeholder'=>'Número de Cédula','title'=>'Número de Cédula'));
			echo $form->error($model,'writ_number');
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->textField($model,'title',array('required'=>'true','name'=>'getTitle[]','value'=>$getGrades[$key]->title,'size'=>45,'maxlength'=>45,'placeholder'=>'Título','title'=>'Título'));
			 echo $form->error($model,'title');
		echo '</div>';


		echo	'<div class="row">';
			echo " <span class='plain-select'>";
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'language'=> 'es',
			    'name'=> 'getObtentionDate[]',
			    'value'=> $getGrades[$key]->obtention_date,
			    //'attribute' => 'obtention_date',
			   // 'model' => $model,
			   // 'flat'=>false,
			     'options' => array(
				     		'changeMonth'=>true, //cambiar por Mes
				     		'changeYear'=>true, //cambiar por Año
				    			'maxDate' => 'now',
			     	),
			    'htmlOptions' => array(
			    			'size'=>'10',
			    			'readonly'=>true,
			    			'maxlength'=>'10',
							'title'=>'Fecha de Obtención',
			        		'placeholder'=>"Fecha de Obtención"),
					));
				 echo $form->error($model,'obtention_date');
		echo '</div>';

		echo	'<div class="row">';
		echo " <span class='plain-select'>";
			 echo $form->dropDownList($model,'status',array('Creditos_Terminados'=>'Creditos Terminados',
																'Grado_Obtenido'=>'Grado Obtenido',
																'Proceso'=>'Proceso','Truncado'=>'Truncado'),
			                                                       array('name'=>'getStatus[]','prompt'=>'Selecciona Estatus','title'=>'Seleccionar Estatus','options' => array($getGrades[$key]->status=>array('selected'=>true))),
			                                                       array('size'=>10,'maxlength'=>10));
			 echo $form->error($model,'status');
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->textField($model,'thesis_title',array('required'=>'true','name'=>'getThesisTitle[]','value'=>$getGrades[$key]->thesis_title,'size'=>60,'maxlength'=>250,'placeholder'=>'Título de Tésis','title'=>'Título de Tésis'));
			echo $form->error($model,'thesis_title');
		echo '</div>';

		echo	'<div class="row">';
		echo " <span class='plain-select'>";
			 echo $form->dropDownList($model,'state',array('en_Proceso'=>'En Proceso',
																'Terminado'=>'Terminado'),
			                                                       array('name'=>'getState[]','prompt'=>'Selecciona Estado','title'=>'Seleccionar Estado','options' => array($getGrades[$key]->state=>array('selected'=>true))),
			                                                       array('size'=>10,'maxlength'=>10));
			 echo $form->error($model,'state');
		echo '</div>';

		echo	'<div class="row">';
		echo " <span class='plain-select'>";
			 echo $form->dropDownList($model,'sector',array('No especificado'=>'No especificado','Instituciones del sector gobierno federal centralizado'=>'Instituciones del sector gobierno federal centralizado',
				                                                 'Instituciones del sector entidades paraestatales'=>'Instituciones del sector entidades paraestatales','Instituciones del sector gobierno de las entidades federativas'=>'Instituciones del sector gobierno de las entidades federativas',
				                                                 'Instituciones del sector de educacion superior publicas'=>'Instituciones del sector de educacion superior publicas','Instituciones del sector de educacion superior privadas'=>'Instituciones del sector de educacion superior privadas',
				                                                 'Instituciones del sector privado de empresas productivas (adiat)'=>'Instituciones del sector privado de empresas productivas (adiat)','Instituciones / organizaciones no lucrativas'=>'Instituciones / organizaciones no lucrativas',
				                                                 'Instituciones / organizaciones extranjeras'=>'Instituciones / organizaciones extranjeras','consultoras'=>'consultoras','Gobierno municipal'=>'Gobierno municipal','Gobierno federal descentralizado'=>'Gobierno federal descentralizado',
				                                                 'Gobierno Federal Desconcentrado'=>'Gobierno Federal Desconcentrado','Centros Públicos de Investigación'=>'Centros Públicos de Investigación','Centros Privados de Investigación'=>'Centros Privados de Investigación'),
				                                                 array('name'=>'getSector[]','prompt'=>'Selecciona Sector','title'=>'Seleccionar Sector','options' => array($getGrades[$key]->sector=>array('selected'=>true))));
			 echo $form->error($model,'sector');
		echo '</div>';

		echo	'<div class="row">';
		echo " <span class='plain-select'>";
			echo $form->dropDownList($model,'institution',array('BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA'=>'BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA','UNIVERSIDAD ESTATAL DE SONORA'=>'UNIVERSIDAD ESTATAL DE SONORA','CENTRO DE INVESTIGACIONES BIOLOGICAS'=>'CENTRO DE INVESTIGACIONES BIOLOGICAS',
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
														array('required'=>'true','name'=>'getInstitution[]','prompt'=>'Selecciona Institución','title'=>'Seleccionar institución','options' => array($getGrades[$key]->institution=>array('selected'=>true))));


			 echo $form->error($model,'institution');
		echo '</div>';

		echo	'<div class="row">';
		echo " <span class='plain-select'>";
		     echo $form->dropDownList($model,'area',array('ANTROPOLOGIA'=>'ANTROPOLOGIA',
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
                              'QUIMICA'=>'QUIMICA', 'SOCIOLOGIA'=>'SOCIOLOGIA'),array('name'=>'getArea[]','prompt'=>'Seleccionar Área','title'=>'Seleccionar Área','options'=>array($getGrades[$key]->area=>array('selected'=>true)),'id'=>'getArea', 'onchange'=>'changeArea()'));

			 echo $form->error($model,'area');
		echo '</div>';
 echo '<div class="row" id="comboGetDiscipline">';

 echo '</div>';
  echo '<div class="row" id="comboGetSubdiscipline">';

  echo '</div>';

		echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteGrade','id'=>$getGrades[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething'));
		echo "<br>";
		echo "<hr>";
		echo "<br>";
		$count ++;
	}
	echo	'<div class="row buttons">';
	    echo CHtml::ajaxButton ('Guardar',CController::createUrl('curriculumVitae/grades'),
        				array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data)
                     		 {

		                         if(data.status=="200")
		                         {
				                     $(".successdiv").show();
		                         }
		                         else
		                         {
			                     	$(".successdiv").show();
			                     }
		                  	}',

                      ), array('id'=>'btnCreateGrade','class'=>'savebutton'));


		echo CHtml::Button('Cancelar',array('submit' => array('curriculumVitae/index'),'confirm'=>'¿Seguro que desea Cancelar?'));
	echo '</div>';
?>

<?php $this->endWidget(); ?>

</div><!-- form -->
