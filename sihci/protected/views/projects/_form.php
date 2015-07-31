<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/* @var $form CActiveForm */
?>

<script type="text/javascript">
var elemSum = 1;
function showAdtlRes(){

	$('#ar'+elemSum++).show();
	if(elemSum > 2)
		$('#ar'+(elemSum-2)+' input[type="button"]').hide();


	if(elemSum == 11)
		$('#addBtnAr').hide();
}

function hideAdtlRes(element){
 	$(element).parent().hide();
 	elemSum--;
	if(elemSum < 10)
		$('#addBtnAr').show();

		$('#ar'+(elemSum-1)+' input[type="button"]').show();

}

function accionCancelar(){
$('<div>></div>').appendTo('form')
    .html('<div><h6>¿Está usted seguro de cancelar la acción actual? todo su trabajo no guardado sera borrado.</h6></div>')
    .dialog({
        modal: true,
				height: 270,
				width: 350,
        title: 'Cancelar',
        zIndex: 10000,
        autoOpen: true,
        buttons: {
    Continuar: function () {
                window.location = yii.urls.cancelProject;
                $(this).dialog("close");
            },
            "Quedarme donde estoy": function () {
                $(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $(this).remove();
        }
    });
}
	var section = 1;
	function changeSection(value){
				section += value;
		$(".sections").hide();
		if(section == 4){
			$("#next").hide();
			$("#send").show();
		}
		else{
			$("#next").show();
			$("#send").hide();
		}

		if(section == 1)
			$("#back").hide();
		else
			$("#back").show();
		$("#section"+section).show();
	}

	function save(value){


		$('input[type="hidden"]').attr('disabled', true);

			if(value=="send"){
				$('<div></div>').appendTo('form')
				    .html('<div id="customModalBox"><h6>¿Esta seguro de enviar a revisión este proyecto?</h6></div>')
				    .dialog({
				        modal: true,
				        title: 'Cancelar',
				        zIndex: 10000,
				        autoOpen: true,
								height: 270,
								width: 350,
				        resizable: false,
				        buttons: {
				            "Enviar a revisión": function () {
								send("projects-form", "projects/<?php echo ($model->isNewRecord ? 'create' : 'update'); ?>", <?php echo (isset($_GET['id']) ? $_GET['id'] : 0); ?>, "projects/admin",value);
				            },
				            "Guardar como borrador": function () {
				            	send("projects-form", "projects/<?php echo ($model->isNewRecord ? 'create' : 'update'); ?>", <?php echo (isset($_GET['id']) ? $_GET['id'] : 0); ?>, "projects/admin","draft");

				            }
				        },
				        close: function (event, ui) {
				            $(this).remove();
				        }
				    });

			}else
				send("projects-form", "projects/<?php echo ($model->isNewRecord ? 'create' : 'update'); ?>", <?php echo (isset($_GET['id']) ? $_GET['id'] : 0); ?>, "projects/admin",value);

				$("#customModalBox").hide();

	}

function sendpro(value){
	send("projects-form", "projects/<?php echo ($model->isNewRecord ? 'create' : 'update'); ?>", <?php echo (isset($_GET['id']) ? $_GET['id'] : 0); ?>, "projects/admin",value);
}
function sendera(){
	send("projects-form", "projects/<?php echo ($model->isNewRecord ? 'create' : 'update'); ?>", <?php echo (isset($_GET['id']) ? $_GET['id'] : 0); ?>, "projects/admin","draft");

}
	function changeSubTema(){

		 var temaValue = $("#tema option:selected").val();

		 if(temaValue =="Enfermedades Metabólicas (incluida obesidad)"){
		    var enfermedadesMetabolicas = ["Diabetes Mellitus Tipo 2",
											"Obesidad y sobrepeso",
											"Otro. Especifique"]
		    temaValue = enfermedadesMetabolicas;
		}
		if(temaValue =="Enfermedades Cardiovasculares"){
		    var enfermedadesCardiovasculares = [
								"Enfermedad Isquémica del Corazón",
								"Evento Vascular Cerebral",
								"Hipertensión Arterial Sistémica",
								"Otro. Especifique"]
		    temaValue = enfermedadesCardiovasculares;
		}
			if(temaValue =="Enfermedades Infecciosas"){
		    var enfermedadesInfecciosas = [
		    							"Enfermedad diarreica aguda en menores de 5 años",
		    							"Infecciones Nosocomiales",
										"Infecciones agudas de vías aéreas superiores en menores de 5 años",
										"VIH/SIDA",
										"Otro. Especifique"]
		    temaValue = enfermedadesInfecciosas;
		}
		if(temaValue =="Accidentes y Violencia"){
		    var accidentesViolencia = ["Especifique"]
		    temaValue = accidentesViolencia;
		}
		if(temaValue =="Cáncer"){
		    var cancer = ["Cáncer de mama",
						"Cáncer cérvico-uterino",
						"Otro." ]
		    temaValue = cancer;
		}
		if(temaValue =="Enfermedades crónicas"){
		    var enfermedadesCronicas = ["Enfermedad hepática crónica",
										"Otro. Especifique"]
		    temaValue = enfermedadesCronicas;
		}
		if(temaValue =="Enfermedades emergentes"){
		    var enfermedadesEmergenes = ["Especifique"]
		    temaValue = enfermedadesEmergenes;
		}
			if(temaValue =="Envejecimiento"){
		    var envejecimiento = ["Especifique"]
		    temaValue = envejecimiento;
		}
		if(temaValue =="Muertes evitables (incluidas muerte materna y perinatal)"){
		    var muertesEvitables = ["Embarazo",
									"Enfermedades del recién nacido",
									"Muerte materna",
									"Muerte perinatal",
									"Otro. Especifique"]
		    temaValue = muertesEvitables;
		}
		if(temaValue =="Salud Mental y Adicciones"){
		    var saludMentalAdicciones = ["Especifique"]
		    temaValue = saludMentalAdicciones;
		}
		if(temaValue =="Discapacidad e Incapacidad"){
		    var discapacidadIncapacidad = ["Enfermedades y Riesgos de Trabajo",
											"Otro. Especifique"]
		    temaValue = discapacidadIncapacidad;
		}
		if(temaValue =="Otros"){
		    var otros = ["Alergia e Inmunología",
						"Anatomía Patológica",
						"Anatomía Patológica Pediátrica",
						"Anestesiología",
						"Anestesiología Pediátrica",
						"Angiología",
						"Biología de la Reproducción Humana",
						"Cardiología",
						"Cardiología Pediátrica",
						"Cirugía Cardiotorácica",
						"Cirugía Cardiotorácica Pediátrica",
						"Cirugía General",
						"Cirugía Pediátrica",
						"Cirugía Plástica y Reconstructiva ",
						"Coloproctología",
						"Comunicación, Audiología y Foniatría",
						"Dermatología",
						"Dermatología Pediátrica",
						"Dermatopatología",
						"Endocrinología",
						"Endocrinología Pediátrica",
						"Epidemiología",
						"Gastroenterología",
						"Gastroenterología y Nutrición Pediátrica ",
						"Genética Médica",
						"Geriatría",
						"Ginecología y Obstetricia",
						"Hematología",
						"Hematología Pediátrica ",
						"Infectología Pediátrica ",
						"Infectología de Adultos",
						"Medicina Familiar",
						"Medicina Interna",
						"Medicina Legal",
						"Medicina Materno Fetal",
						"Medicina Nuclear",
						"Medicina de Rehabilitación",
						"Medicina de la Actividad Física y Deportiva",
						"Medicina del Enfermo Pediátrico en Estado Crítico ",
						"Medicina del Enfermo en Estado Crítico ",
						"Medicina del Trabajo",
						"Nefrología",
						"Nefrología Pediátrica",
						"Neonatología",
						"Neumología ",
						"Neumología Pediátrica ",
						"Neuro-Otología",
						"Neuroanestesiología",
						"Neurocirugía",
						"Neurocirugía Pediátrica ",
						"Neurología",
						"Neurología Pediátrica ",
						"Neuropatología",
						"Neuroradiología",
						"Nutriología Clínica",
						"Oftalmología",
						"Oftalmología Neurológica",
						"Oncología Médica ",
						"Oncología Pediátrica",
						"Oncología Quirúrgica",
						"Ortopedia",
						"Otorrinolaringología",
						"Otorrinolaringología Pediátrica",
						"Patología Clínica",
						"Patología Pediátrica",
						"Pediatría",
						"Psiquiatría",
						"Psiquiatría Infantil y de la Adolescencia",
						"Radio-Oncología",
						"Radiología e imagen",
						"Reumatología",
						"Reumatología Pediátrica",
						"Terapía Endovascular Neurológica",
						"Urgencias Médico Quirúrgicas",
						"Urología",
						"Urología Ginecológica",
						"Otro. Especifique"]
		    temaValue = otros;
		}
			 	var newTema ="<span class='plain-select'><select id='Projects_sub_topic' class='tooltipstered' name='Projects[sub_topic]'>";
	    	newTema+="<option>Subtema Prioritario</option>";
	    for (var item in temaValue) {
        	newTema +="<option>"+temaValue[ item ]+"</option>";
    	}

    		newTema+="</select></span>";
    		$("#comboSubTema").html(newTema);
  }
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>
<div id="section1" class="sections" >
	<div class="row">
		<?php
			if(Yii::app()->user->Rol->id == 1){
				$researcher = "";
				if(!$model->isNewRecord){
					$researcher = $model->idCurriculum->idUser->persons[0];
					$researcher = $researcher['last_name1']." ".$researcher['last_name2'].", ".$researcher['names'];
				}
				echo "Encargado <br>";
				$this->widget('ext.MyAutoComplete', array(
				    'model'=>$model,
				    'attribute'=>'id_curriculum',
				    'name'=>'Projects[id_curriculum]',
				    'id'=>'id_curriculum',
				    'value'=>$researcher,
				    'source'=>$this->createUrl('/sponsorship/getResearchers'),
				    'options'=>array(
				        'minLength'=>'0'
				    ),
				));
			}
		?>
	</div>
	<div class="row">
		<?php echo $form->textArea($model,'title',array('size'=>60,'maxlength'=>250,'placeholder'=>'Título del proyecto de investigación','title'=>'Título del proyecto de investigación')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
	<span class="plain-select">
		<?php echo $form->dropDownList($model,'discipline',$discipline,array('prompt'=>'Seleccione la disciplina del proyecto','title'=>'Seleccione la disciplina del proyecto')); ?>
	</span>
		<?php echo $form->error($model,'discipline'); ?>
	</div>
	<?php
	if(!$model->isNewRecord){

		$rTypes = explode('*-*', $model->research_type);

		array_pop($rTypes);
		foreach ($rTypes as $key => $value) {
		echo "<div class='row'>";
		echo "	<span class='plain-select'>";
			echo $form->dropDownList($model, 'research_type',array('Biomédica'=>'Biomédica','Clínica'=>'Clínica','Educativa'=>'Educativa','Epidemiológica'=>'Epidemiológica','Servicios de Salud'=>'Servicios de Salud','otra'=>'otra'),array('prompt'=>'Seleccione un tipo de Investigación','name'=>'research_types[]','title'=>'Tipo de Investigación','options' => array($value=>array('selected'=>true))));
			echo "</span>";
			echo "<a class='deletecontact' href='#' onclick='$(this).parent().slideUp(function(){ $(this).remove() }); return false'>Eliminar</a>";
		echo "</div>";
}

	}
	?>



		<div class="row recopyRType">
				<span class="plain-select">
			<?php echo $form->dropDownList($model,'research_type',array('Biomédica'=>'Biomédica','Clínica'=>'Clínica','Educativa'=>'Educativa','Epidemiológica'=>'Epidemiológica','Servicios de Salud'=>'Servicios de Salud','otra'=>'otra'),array('prompt'=>'Seleccione un tipo de Investigación','name'=>'research_types[]','title'=>'Tipo de Investigación')); ?>
		</span>
			<?php echo $form->error($model,'research_type'); ?>
		</div>

			<?php
				$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
					'targetClass'=>'recopyRType',
					'addButtonLabel'=>'Agregar tipo de investigación',
				));
			?>



	<div class="row">

	<span class="plain-select">
		<?php echo $form->dropDownList($model,'priority_topic',array('Accidentes y Violencia'=>'Accidentes y Violencia',
																	'Cáncer'=>'Cáncer',
																	'Discapacidad e Incapacidad'=>'Discapacidad e Incapacidad',
																	'Enfermedades Cardiovasculares'=>'Enfermedades Cardiovasculares',
																	'Enfermedades Infecciosas'=>'Enfermedades Infecciosas',
																	'Enfermedades Metabólicas (incluida obesidad)'=>'Enfermedades Metabólicas (incluida obesidad)',
																	'Enfermedades crónicas'=>'Enfermedades crónicas',
																	'Enfermedades emergentes'=>'Enfermedades emergentes',
																	'Envejecimiento'=>'Envejecimiento',
																	'Muertes evitables (incluidas muerte materna y perinatal)'=>'Muertes evitables (incluidas muerte materna y perinatal)',
																	'Salud Mental y Adicciones'=>'Salud Mental y Adicciones',
																	'Otros'=>'Otros'),array('prompt'=>'Tema prioritario','title'=>'Tema prioritario','id'=>'tema', 'onchange'=>'changeSubTema()')); ?>
																</span>
		<?php echo $form->error($model,'priority_topic'); ?>
	</div>
	<div class="row" id="comboSubTema">

  	</div>


	<div class="row">
		<?php echo $form->textArea($model,'justify',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación para el tema seleccionado','title'=>'Justificación para el tema seleccionado')); ?>
		<?php echo $form->error($model,'justify'); ?>
	</div>
</div>




<div id="section2" class="sections" style="display:none;">
	<div class="row">
	<?php
		$cv = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		echo $cv->SNI > 0 ? "Proyecto perteneciente al Sistema Nacional de Investigadores (SNI)." : "Proyecto NO perteneciente al Sistema Nacional de Investigadores (SNI).";
	?>
	</div>

	<div class="row">
		Datos del investigador.
	</div>

		<?php



				$users = Users::model()->findByPk(Yii::app()->user->id);
				$persons = $users->persons[0]; //Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
				$emailUsers = $users->email;//Users::model()->findByAttributes(array('id'=>Yii::app()->user->id));
				$phoneUsers = $users->persons[0]->phones[0];//Phones::model()->findByAttributes(array('id_person'=>$persons->id,'is_primary'=>1));
				$curriculum = $users->curriculums;//Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
				$gradesUsers = $users->curriculums[0]->grades[0];//Grades::model()->findByAttributes(array('id_curriculum'=>$curriculum->id));
				$jobsUsers = $curriculum[0]->jobs[0];//Jobs::model()->findByAttributes(array('id_curriculum'=>$curriculum->id));




			 $this->widget('zii.widgets.CDetailView', array(
			'data'=>$persons,
			'attributes'=>array(

				array(
					'label'=>'Nombre(s):',
					'value'=>$persons->names,
					),
				array(
					'label'=>'Apellido Paterno:',
					'value'=>$persons->last_name1,
					),
				array(
					'label'=>'Apellido Materno:',
					'value'=>$persons->last_name2,
					),
				array(
					'label'=>'Sexo:',
					'value'=>$persons->genre,
					),
			array(
					'label'=>'Correo Electrónico:',
					'value'=>$emailUsers,
					),
				array(
					'label'=>'Teléfono:',
					'value'=>$phoneUsers != null ? $phoneUsers->phone_number.' Ext '.$phoneUsers->extension : " ",
					),
				array(
					'label'=>'Unidad hospitalaria:',
					'value'=>$jobsUsers != null ? $jobsUsers->hospital_unit : " ",
					),
				array(
				     'label'=>'Máximo grado de estudios:',
				     'value'=>$gradesUsers != null ? $gradesUsers->grade : " " ,
				     ),
				array(
					'label'=>'¿Pertenece al SNI?',
					'value'=>$curriculum != null ? $curriculum[0]->SNI :
					$curriculum[0]->SNI > 0 ? "Si, Número SNI: ".$curriculum[0]->SNI : "No Perteneciente",
					),
			),
		));
		?>

	<div class="row">
		<?php echo CHtml::link('Corregir datos del Curriculum Vitae Único (CVU)',array('curriculumVitae/personalData'),array('target'=>'_blank')); ?>
	</div>

	<div class="row">
		<span class="plain-select">
		<?php echo $form->dropDownList($model,'develop_uh',array('Hospital Civil Fray Antonio Alcalde'=>'Hospital Civil Fray Antonio Alcalde','Hospital Civil Dr. Juan I. Menchaca'=>'Hospital Civil Dr. Juan I. Menchaca'),array('prompt'=>'Unidad hospitalaria donde se desarrollará la investigación','title'=>'Unidad hospitalaria donde se desarrollará la investigación','options' => array($model->develop_uh=>array('selected'=>true)))); ?>
		</span>
		<?php echo $form->error($model,'develop_uh'); ?>
	</div>
</div>


<div id="section3" class="sections" style="display:none;">
	<div class="row">
<p>
	En caso de que existan investigadores participantes en su proyecto por favor agreguelos en los campos a continuación:
</p>
	</div>


		<input type="button" value="Agregar investigador participante" class="addSomething"onclick="showAdtlRes()" id="addBtnAr">
		<div class="row" id="ar1" style="display:<?php echo (isset($model->projectsCoworkers[0]) ? "block": "none"); ?>;">
			<?php $this->widget('ext.MyAutoComplete', array('name'=>'adtlResearchers[1]','source'=>$this->createUrl('/sponsorship/getResearchers'), 'options'=>array('minLength'=>'0',),'htmlOptions'=>array('placeholder'=>'Investigador participante número 1','title'=>'Investigador participante número 1'),'value'=>(isset($model->projectsCoworkers[0]) ? $model->projectsCoworkers[0]->fullName : ""), )); ?>
		    <input type="button" value="     " class="deleteval"  onclick="hideAdtlRes(this)">
		</div>
		<div class="row" id="ar2" style="display:<?php echo (isset($model->projectsCoworkers[1]) ? 'block': 'none'); ?>;">
			<?php $this->widget('ext.MyAutoComplete', array('name'=>'adtlResearchers[2]',
		    'source'=>$this->createUrl('/sponsorship/getResearchers'), 'options'=>array('minLength'=>'0',),'htmlOptions'=>array('placeholder'=>'Investigador participante número 2','title'=>'Investigador participante número 2'),'value'=>(isset($model->projectsCoworkers[1]) ? $model->projectsCoworkers[1]->fullName : ""), )); ?>
		    <input type="button" value="     " class="deleteval"  onclick="hideAdtlRes(this)">
		</div>
		<div class="row" id="ar3" style="display:<?php echo (isset($model->projectsCoworkers[2]) ? 'block': 'none'); ?>;">
			<?php $this->widget('ext.MyAutoComplete', array('name'=>'adtlResearchers[3]',
		    'source'=>$this->createUrl('/sponsorship/getResearchers'), 'options'=>array('minLength'=>'0',),'htmlOptions'=>array('placeholder'=>'Investigador participante número 3','title'=>'Investigador participante número 3'),'value'=>(isset($model->projectsCoworkers[2]) ? $model->projectsCoworkers[2]->fullName : ""), )); ?>
		    <input type="button" value="     " class="deleteval"  onclick="hideAdtlRes(this)">
		</div>
		<div class="row" id="ar4" style="display:<?php echo (isset($model->projectsCoworkers[3]) ? 'block': 'none'); ?>;">
			<?php $this->widget('ext.MyAutoComplete', array('name'=>'adtlResearchers[4]',
		    'source'=>$this->createUrl('/sponsorship/getResearchers'), 'options'=>array('minLength'=>'0',),'htmlOptions'=>array('placeholder'=>'Investigador participante número 4','title'=>'Investigador participante número 4'),'value'=>(isset($model->projectsCoworkers[3]) ? $model->projectsCoworkers[3]->fullName : ""), )); ?>
		    <input type="button" value="     " class="deleteval"  onclick="hideAdtlRes(this)">
		</div>
		<div class="row" id="ar5" style="display:<?php echo (isset($model->projectsCoworkers[4]) ? 'block': 'none'); ?>;">
			<?php $this->widget('ext.MyAutoComplete', array('name'=>'adtlResearchers[5]',
		    'source'=>$this->createUrl('/sponsorship/getResearchers'), 'options'=>array('minLength'=>'0'),'htmlOptions'=>array('placeholder'=>'Investigador participante número 5','title'=>'Investigador participante número 5'),'value'=>(isset($model->projectsCoworkers[4]) ? $model->projectsCoworkers[4]->fullName : ""), )); ?>
		    <input type="button" value="     " class="deleteval"  onclick="hideAdtlRes(this)">
		</div>
		<div class="row" id="ar6" style="display:<?php echo (isset($model->projectsCoworkers[5]) ? 'block': 'none'); ?>;">
			<?php $this->widget('ext.MyAutoComplete', array('name'=>'adtlResearchers[6]',
		    'source'=>$this->createUrl('/sponsorship/getResearchers'), 'options'=>array('minLength'=>'0',),'htmlOptions'=>array('placeholder'=>'Investigador participante número 6','title'=>'Investigador participante número 6'),'value'=>(isset($model->projectsCoworkers[5]) ? $model->projectsCoworkers[5]->fullName : ""), )); ?>
		    <input type="button" value="     " class="deleteval"  onclick="hideAdtlRes(this)">
		</div>
		<div class="row" id="ar7" style="display:<?php echo (isset($model->projectsCoworkers[6]) ? 'block': 'none'); ?>;">
			<?php $this->widget('ext.MyAutoComplete', array('name'=>'adtlResearchers[7]',
		    'source'=>$this->createUrl('/sponsorship/getResearchers'), 'options'=>array('minLength'=>'0',),'htmlOptions'=>array('placeholder'=>'Investigador participante número 7','title'=>'Investigador participante número 7'),'value'=>(isset($model->projectsCoworkers[6]) ? $model->projectsCoworkers[6]->fullName : ""), )); ?>
		    <input type="button" value="     " class="deleteval"  onclick="hideAdtlRes(this)">
		</div>
		<div class="row" id="ar8" style="display:<?php echo (isset($model->projectsCoworkers[7]) ? 'block': 'none'); ?>;">
			<?php $this->widget('ext.MyAutoComplete', array('name'=>'adtlResearchers[8]',
		    'source'=>$this->createUrl('/sponsorship/getResearchers'), 'options'=>array('minLength'=>'0',),'htmlOptions'=>array('placeholder'=>'Investigador participante número 8','title'=>'Investigador participante número 8'),'value'=>(isset($model->projectsCoworkers[7]) ? $model->projectsCoworkers[7]->fullName : ""),)); ?>
		    <input type="button" value="     " class="deleteval"  onclick="hideAdtlRes(this)">
		</div>
		<div class="row" id="ar9" style="display:<?php echo (isset($model->projectsCoworkers[8]) ? 'block': 'none'); ?>;">
			<?php $this->widget('ext.MyAutoComplete', array('name'=>'adtlResearchers[9]',
		    'source'=>$this->createUrl('/sponsorship/getResearchers'), 'options'=>array('minLength'=>'0',),'htmlOptions'=>array('placeholder'=>'Investigador participante número 9','title'=>'Investigador participante número 9'),'value'=>(isset($model->projectsCoworkers[8]) ? $model->projectsCoworkers[8]->fullName : ""), )); ?>
		    <input type="button" value="     " class="deleteval"  onclick="hideAdtlRes(this)">
		</div>
		<div class="row" id="ar10" style="display:<?php echo (isset($model->projectsCoworkers[9]) ? 'block': 'none'); ?>;">
			<?php $this->widget('ext.MyAutoComplete', array('name'=>'adtlResearchers[10]',
		    'source'=>$this->createUrl('/sponsorship/getResearchers'), 'options'=>array('minLength'=>'0',),'htmlOptions'=>array('placeholder'=>'Investigador participante número 10','title'=>'Investigador participante número 10'),'value'=>(isset($model->projectsCoworkers[9]) ? $model->projectsCoworkers[9]->fullName : ""), )); ?>
		    <input type="button" value="     " class="deleteval"  onclick="hideAdtlRes(this)">
		</div>
	</div>


<div id="section4" class="sections" style="display:none;">
	<div class="row">
		<p>
			En caso de que el proyecto de investigación cuente con la colaboración de otras instituciones(nacionales o extranjeras) escribalas en los campos a continuación:</p>

	</div>

	<div class="row">
		<?php echo $form->textArea($model,'participant_institutions',array('rows'=>6, 'cols'=>50,'placeholder'=>'Instituciones nacionales participantes','title'=>'Instituciones nacionales participantes')); ?>
		<?php echo $form->error($model,'participant_institutions'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'participant_institutions_international',array('rows'=>6, 'cols'=>50,'placeholder'=>'Instituciones internacionales participantes','title'=>'Instituciones internacionales participantes')); ?>
		<?php echo $form->error($model,'participant_institutions_international'); ?>
	</div>

	<div class="row"><!-- checkboxes // Formación o capacitación de persona,Asesoría,Análisis,Pacientes/Muestras/Datos,otros-->
		<?php echo $form->textField($model,'colaboration_type',array('size'=>60,'maxlength'=>150,'placeholder'=>'Tipo de colaboracion','title'=>'Tipo de colaboracion')); ?>
		<?php echo $form->error($model,'colaboration_type'); ?>
	</div>

<div class="row">
	<p>¿El protocolo reúne una o más de las siguientes características? en caso de ser afirmativo justifique brevemente en los campos a continuación:
	(Si el proyecto reúne alguna(s) de las siguientes características, entonces debe ser evaluado por la Comisión Nacional de Investigación Científica)</p>
</div>

	<div class="row">
	<p>A) Protocolos en donde se propongan el uso de medicamentos,equipo o material médico no incluido en el cuadro básico institucional</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_a',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_a'); ?>
	</div>
	<div class="row">
	<p>B) Protocolos que contemplen cambios en la polótica institucional sobre la presentación de servicios de salud</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_b',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_b'); ?>
	</div>
	<div class="row">
	<p>C) Protocolos planeados para realizarse entre el instituto Mexicano del Seguro Social y otras insituciones nacionales o extrajeras.</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_c',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_c'); ?>
	</div>
	<div class="row">
	<p>D) Protocoolos que requieren la autorización específica de la Secretaría de Salud según la ley General de Salud</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_d',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_d'); ?>
	</div>
	<div class="row">
	<p>E) Protocolos que reciban apoyo económico o meterial de la industria farmacéutica o entidades con fines lucrativos</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_e',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_e'); ?>
	</div>
	<div class="row">
	<p>F) Protocolos que se realicen en más de una unidad del Instituo Mexicano del seguro Social con la participación de pacientes, muestras o datos</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_f',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_f'); ?>
	</div>
	<div class="row">
	<p>G) Protocolos cuyos autores se inconformen con el dictamen emitido por los Comités Locales de Investigación en Salud</p>
		<?php echo $form->textArea($model,'adtl_caracteristics_g',array('rows'=>6, 'cols'=>50,'placeholder'=>'Justificación','title'=>'Justificación')); ?>
		<?php echo $form->error($model,'adtl_caracteristics_g'); ?>
	</div>

	</div>

	<div class="row buttons projectsbut">

		<?php
		echo " ".Chtml::button('Guardar en borrador',array("id"=>"draft","onClick"=>"save('draft')",'class'=>'savebutton'));
		//echo " ".Chtml::button('Cancelar',array("id"=>"x","onClick"=>"accionCancelar()",'class'=>'cancelb'));
		echo CHtml::link('Cancelar',array('projects/admin'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?'));
		echo " ".Chtml::button('Enviar',array("id"=>"send","onClick"=>"",'style'=>'display:none;','class'=>'savepro'));
		echo " ".Chtml::button('>',array("id"=>"next","onClick"=>"changeSection(1);","style"=>"float:right;",'class'=>'Rarrow glyphicon-chevron-right'));
		echo " ".Chtml::button('<',array("id"=>"back","onClick"=>"changeSection(-1);","style"=>"display:none;float:right;",'class'=>'Larrow'));


		?>

	</div>

	<div class="modal fade" id="projectsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Proyectos </h4>
				</div>
				<div class="modal-body">
					<h3>¡Enviar a Revisión!</h3>
					¿Esta usted seguro de enviar Proyecto de Investigación a revisión?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default sendpro" onClick="sendpro('send')" >Si.. Enviar Ahora</button>
					<button type="button" class="btn btn-default nopro" data-dismiss="modal" >No.. Dejarlo como esta</button>
				</div>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
