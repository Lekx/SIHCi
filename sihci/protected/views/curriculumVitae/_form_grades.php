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
            color: #fff;
            display: none;
            font-size: 10px;
            margin-top: -50px;
            margin-left: 315px;
            padding: 10px;
            position: absolute;
        }
         .grades{
            display: none;
        }
    </style>
	<script>
	 $(document).ready(function(){
            $("#btnCreate").click(function(){
                
             	var grade = $("#grade").val(); 
             	var title = $("#title").val(); 
             	var obtentionDate = $("#obtentionDate").val(); 
             	var thesisTitle = $("#thesisTitle").val();
             	var institution = $("#institution").val(); 

                if(grade == ""){
                    $("#errorGrade").fadeIn("slow");
                    return false;
                }else{
                    $("#errorGrade").fadeOut();
                    if (title == "") {
                    	$("#errorTitle").fadeIn("slow");
                    	return false;
                    }else{
                    	$("#errorTitle").fadeOut();
                    	if (obtentionDate == "") {
                    		$("#errorObtentionDate").fadeIn("slow");
                    		return false;
                    	}else{
                    		$("#errorObtentionDate").fadeOut();
                    		if (thesisTitle == "") {
                    			$("#errorThesisTitle").fadeIn("slow");
                    			return false;
                    		}else{
                    			$("#errorThesisTitle").fadeOut();
                    			if (institution == "") {
                    				$("#errorInstitution").fadeIn("slow");
                    				return false;
                    			}else{
                    				$("#errorInstitution").fadeOut();
                    			}
                    		}
                    	}
                    }
                 }
 
            });//click
            $("#showForm").on( "click", function() {
				$('.grades').show(); 
				$('#hideForm').show();
			 });
			$("#hideForm").on( "click", function() {
				$('.grades').hide(); 
			});
        });//ready
		function cleanUp(){
			var text;
			var result = confirm("¿Está usted seguro de limpiar estos datos?");
			if (result==true) {
				$('[id^=Grades_]').val('');
			}else{

			}
			document.getElementById("demo").innerHTML = text;
		}
		function validationFrom(){
			alert("Registro Realizado con éxito");
			return false;
		}
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grades-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>
<input type="button" id="showForm" value="Agregar Formación Académica">
<input class="grades" type="button" id="hideForm" value="Cancelar">

	<div class="grades">
		<input id="country" type="text" name="country" placeholder="País">
		<div id="errorCountry" class="errors"> Debe seleccionar País </div>
		<br>

		<select id="grade" name="grade">
  			<option value="" selected="">Grado</option> 
  			<option value="Trabajo">Trabajo</option>
  			<option value="Residencial">Residencial</option>
  			<option value="Particular">Particular</option>
  			<option value="Campus">Campus</option>
  			<option value="otro">otro</option>
		</select>
		<div id="errorGrade" class="errors"> Debe seleccionar su Grado</div>
		<br>
		
		
		<input id="writNumber" type="text" name="writNumber" placeholder="Número de Cédula">
		<div id="errorWriteNumber" class="errors"> Debe seleccionar Numero de Cédula </div>
		<br>

		<input id="title" type="text" name="title" placeholder="Tútulo">
		<div id="errorTitle" class="errors"> Debe seleccionar Título </div>
		<br>

		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'language'=> 'es',
			    'id'=> 'obtentionDate',
			    'name'=>'obtentionDate',
			     'options' => array(
				     		'changeMonth'=>true, //cambiar por Mes
				     		'changeYear'=>true, //cambiar por Año
				    			'maxDate' => 'now',
			     	),
			    'htmlOptions' => array(
			    			'size'=>'10',
			    			'maxlength'=>'10', 
			        		'placeholder'=>"Fecha de Obtención"),
					));
		?>
		<div id="errorObtentionDate" class="errors"> Debe seleccionar una Fecha </div>
		<br>

		<select id="status" name="status">
  			<option value="" selected="">Estatus</option> 
  			<option value="Creditos Terminados">Creditos Terminados</option>
  			<option value="Grado Obtenido">Grado Obtenido</option>
  			<option value="Proceso">Proceso</option>
  			<option value="Truncado">Truncado</option>
		</select>
		<div id="errorStatus" class="errors"> Debe seleccionar su Estatus </div>
		<br>

		<input id="thesisTitle" type="text" name="thesisTitle" placeholder="Título de Tesis">
		<div id="errorThesisTitle" class="errors"> Debe seleccionar el Título de Tesis </div>
		<br>

		<select id="state" name="state">
  			<option value="" selected="">Estado</option> 
  			<option value="En proceso">En proceso</option>
  			<option value="Terminado">Terminado</option>
		</select>
		<div id="errorState" class="errors"> Debe seleccionar su Estado </div>
		<br>

		<select id="sector" name="sector">
  			<option value="" selected="">Sector</option> 
  			<option value="No especificado">No especificado</option> 
		</select>
		<div id="errorSector" class="errors"> Debe seleccionar su Sector </div>
		<br>

		<input id="institution" type="text" name="institution" placeholder="Institución">
		<div id="errorInstitution" class="errors"> Debe seleccionar Institución </div>
		<br>	

		<input id="area" type="text" name="area" placeholder="Área">
		<div id="errorArea" class="errors"> Debe seleccionar Área </div>
		<br>

		<input id="discipline" type="text" name="discipline" placeholder="Disciplina">
		<div id="errorDiscipline" class="errors"> Debe seleccionar Disciplina </div>
		<br>

		<input id="subdiscipline" type="text" name="subdiscipline" placeholder="Subdisciplina">
		<div id="errorSubdiscipline" class="errors"> Debe seleccionar Subdisciplina </div>
		<br>
		
		<input type="submit" id="btnCreate" value="Crear Formación Académica">
		<br>

	</div>
		<br>

	<?php 
	$count = 1;
	echo $form->errorSummary($model); 
	//print_r($getGrades);
	foreach ($getGrades as $key => $value) {
		echo $count;
		echo	'<div class="row">';
			echo $form->labelEx($model,'country'); 
			echo $form->textField($model,'country',array('name'=>'getCountry[]','value'=>$getGrades[$key]->country,'size'=>50,'maxlength'=>50, 'placeholder'=>'País')); 
			echo $form->error($model,'country'); 
		echo '</div>';

		echo	'<div class="row">';
			echo $form->labelEx($model,'grade'); 
			echo $form->dropDownList($model,'grade',array('Trabajo'=>'Trabajo','Residencial'=>'Recidencial', 
																'Particular'=>'Particular',
				                                                          'Campus'=>'Campus', 'otro'=>'otro'), 
			                                                       array('required'=>'true','name'=>'getGrade[]','prompt'=>'Grado','options' => array($getGrades[$key]->grade=>array('selected'=>true))), 
			                                                       array('size'=>10,'maxlength'=>10)); 
			echo $form->error($model,'grade');
		echo '</div>';

		echo	'<div class="row">';
			echo $form->labelEx($model,'writ_number');
			 echo $form->textField($model,'writ_number',array('name'=>'getWritNumber[]','value'=>$getGrades[$key]->writ_number,'title'=>'Número de Cédula','size'=>50,'maxlength'=>50, 'placeholder'=>'Número de Cédula')); 
			echo $form->error($model,'writ_number');
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'title'); 
			 echo $form->textField($model,'title',array('required'=>'true','name'=>'getTitle[]','value'=>$getGrades[$key]->title,'size'=>45,'maxlength'=>45,'placeholder'=>'Título')); 
			 echo $form->error($model,'title'); 
		echo '</div>';


		echo	'<div class="row">';
			 echo $form->labelEx($model,'obtention_date'); 
			
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
			    			'maxlength'=>'10', 
			        		'placeholder'=>"Fecha de Obtención"),
					));
				 echo $form->error($model,'obtention_date'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'status'); 
			 echo $form->dropDownList($model,'status',array('Creditos_Terminados'=>'Creditos Terminados',
																'Grado_Obtenido'=>'Grado Obtenido', 
																'Proceso'=>'Proceso','Truncado'=>'Truncado'), 
			                                                       array('name'=>'getStatus[]','prompt'=>'Estatus','options' => array($getGrades[$key]->status=>array('selected'=>true))), 
			                                                       array('size'=>10,'maxlength'=>10)); 
			 echo $form->error($model,'status'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'thesis_title'); 
			 echo $form->textField($model,'thesis_title',array('required'=>'true','name'=>'getThesisTitle[]','value'=>$getGrades[$key]->thesis_title,'size'=>60,'maxlength'=>250,'placeholder'=>'Título de Tésis')); 
			echo $form->error($model,'thesis_title'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'state');
			 echo $form->dropDownList($model,'state',array('en_Proceso'=>'En Proceso',
																'Terminado'=>'Terminado'), 
			                                                       array('name'=>'getState[]','prompt'=>'Estado','options' => array($getGrades[$key]->state=>array('selected'=>true))), 
			                                                       array('size'=>10,'maxlength'=>10)); 
			 echo $form->error($model,'state'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'sector'); 
			 echo $form->dropDownList($model,'sector',array('No especificado'=>'No especificado','Instituciones del sector gobierno federal centralizado'=>'Instituciones del sector gobierno federal centralizado',
				                                                 'Instituciones del sector entidades paraestatales'=>'Instituciones del sector entidades paraestatales','Instituciones del sector gobierno de las entidades federativas'=>'Instituciones del sector gobierno de las entidades federativas',
				                                                 'Instituciones del sector de educacion superior publicas'=>'Instituciones del sector de educacion superior publicas','Instituciones del sector de educacion superior privadas'=>'Instituciones del sector de educacion superior privadas',
				                                                 'Instituciones del sector privado de empresas productivas (adiat)'=>'Instituciones del sector privado de empresas productivas (adiat)','Instituciones / organizaciones no lucrativas'=>'Instituciones / organizaciones no lucrativas',
				                                                 'Instituciones / organizaciones extranjeras'=>'Instituciones / organizaciones extranjeras','consultoras'=>'consultoras','Gobierno municipal'=>'Gobierno municipal','Gobierno federal descentralizado'=>'Gobierno federal descentralizado',
				                                                 'Gobierno Federal Desconcentrado'=>'Gobierno Federal Desconcentrado','Centros Públicos de Investigación'=>'Centros Públicos de Investigación','Centros Privados de Investigación'=>'Centros Privados de Investigación'),
				                                                 array('name'=>'getSector[]','prompt'=>'Sector','options' => array($getGrades[$key]->sector=>array('selected'=>true)))); 
			 echo $form->error($model,'sector'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'institution'); 
			 echo $form->textField($model,'institution',array('required'=>'true','name'=>'getInstitution[]','value'=>$getGrades[$key]->institution,'size'=>60,'maxlength'=>150,'placeholder'=>'Institución')); 
			 echo $form->error($model,'institution'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'area'); 
			 echo $form->textField($model,'area',array('name'=>'getArea[]','value'=>$getGrades[$key]->area,'size'=>45,'maxlength'=>45,'placeholder'=>'Área')); 
			 echo $form->error($model,'area'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'discipline'); 
			 echo $form->textField($model,'discipline',array('name'=>'getDiscipline[]','value'=>$getGrades[$key]->discipline,'size'=>45,'maxlength'=>45,'placeholder'=>'Disciplina')); 
			 echo $form->error($model,'discipline'); 
		echo '</div>';

		echo	'<div class="row">';
			 echo $form->labelEx($model,'subdiscipline'); 
			 echo $form->textField($model,'subdiscipline',array('name'=>'getSubdiscipline[]','value'=>$getGrades[$key]->subdiscipline,'size'=>45,'maxlength'=>45,'placeholder'=>'Subdisciplina')); 
			 echo $form->error($model,'subdiscipline'); 
		echo '</div>';
		echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteGrade', 'id'=>$getGrades[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?'));
		echo "<br>";
		echo "------------------------------------------------------------";
		echo "<br>";
		$count ++;
	}
	echo	'<div class="row buttons">';
		echo '<input class="savebutton"  type="submit" onclick="validationFrom()" value="Guardar">';
		echo '<input class="cleanbutton" type="button" onclick="cleanUp()" value="Borrar">';
		echo CHtml::button('Cancelar',array('/site/index')); 
	echo '</div>';
?>

<?php $this->endWidget(); ?>

</div><!-- form -->