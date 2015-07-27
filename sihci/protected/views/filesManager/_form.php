

<div class="form">
	<?php Yii::app()->bootstrap->register();
Yii::app()->clientScript->registerCssFile(
	Yii::app()->clientScript->getCoreScriptUrl().
	'/jui/css/base/jquery-ui.css'
);
Yii::app()->getClientScript()->registerCoreScript( 'jquery' );
Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'files-manager-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>


	<div class="row">


<span class="plain-select">
			<select name="FilesManager[section]" id="FilesManager_section" title="Sección" >
				  	<optgroup label="OPD HCG">
				  		<option value="">Seccíon </option>
					   <option value="informationGeneralDirection">Dirección general</option>
					   <option value="organigram">Organigrama</option>
					   <option value="investigationNormative">Normatividad de investigación</option>
					   <option value="registerReniecyt">Registro RENIECYT</option>
					   <option value="displayTransparencia">Transparencia</option>
					   <option value="hospitalUnitJimEthicsCommittee">Comités</option>
					   <option value="locationMapOfOfficeSGEIOPD">Plano de ubicación SGEI OPD</option>

				  	<optgroup label="CVE-HC">
				   		<option value="cveHc">CVE-HC</option>
						</optgroup>

						<optgroup label="FInEHC">
				   		<option value="finehc">FInEHC</option>
						</optgroup>

						<optgroup label="Sub-Dirección General de enseñanza e investigación">
							<option value="informationOfGeneralSubdirectionOfEducationAndInvestigation">Sub-Dirección General de enseñanza e investigación</option>
						</optgroup>

				 		<optgroup label="Centro de Investigación Clínica">
				   		<option value="displayInvestigationLines">Lineas de investigación</option>
				   		<option value="sponsoredProjects">Protocolos patrocinados por la industria Farmacéutica</option>
				   		<option value="livingLabsSalud">Living Labs-Salud</option>
				   	</optgroup>

					 	<optgroup label="HCG Fray Antonio Alcalde">
				   		<option value="hospitalaUnitJIMSubdirectionOfEducationAndInvestigation">HCG Fray Antonio Alcalde</option>
				   	</optgroup>

				     <optgroup label="HCG DR. Juan I. Menchaca">
				   		<option value="proINVENCI">HCG DR. Juan I. Menchaca</option>
				   	</optgroup>

				    <optgroup label="Programa de formación de recursos humanos en investigación">
				   		<option value="programsPNCP">Programas PNCP</option>
				   		<option value="programsNoPNCP">Programas no PNCP</option>
				   	</optgroup>

				   	<optgroup label="proINVENCI">
				   		<option value="displayProINVENHCi">proINVENCI</option>
				   	</optgroup>

				    <optgroup label="ProDIME">
				   		<option value="proDIME">ProDIME</option>
				   	</optgroup>

				    <optgroup label="Unidad Editorial">
				   		<option value="editUnit">Unidad Editorial</option>
				   	</optgroup>


				   	<optgroup label="Programas de generación de conocimiento">
				   		<option value="scientificWriting">Redacción Científicas</option>
				   		<option value="generetionOfKnowledgeScientific">Lineas de generación de conmiento científico</option>
				   	</optgroup>

				   	<optgroup label="Programas de coperación internacional en investigación">
				   		<option value="displayInformation">Programas de coperación internacional en investigación</option>
				   	</optgroup>

				   	<optgroup label="Vinculación con universidades, institutos y hospitales">
				   		<option value="vinculationWithUniversityInstitutesHospitals">Vinculación con universidades, institutos y hospitales</option>
				   	</optgroup>


				    <optgroup label="Revistas científicas">
				   		<option value="scientificMagazines">Revistas científicas</option>
				   	</optgroup>

			</select>
</span>
      </div>

	<div class="row">
		<?php echo $form->textField($model,'file_name',array('size'=>50,'maxlength'=>50,'placeholder'=>"Nombre del documento",'title'=>'Nombre del documento',)); ?>
		<?php echo $form->error($model,'file_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'path', array('title'=>'Archivo')); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>

	<div class="row">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model' => $model,
		    'language'=> 'es',
		    'attribute' => 'start_date',
		    'htmlOptions' => array(
		    	    'dateFormat'=>'d/m/Y',
		    		'size' => '10',
		    		'readOnly'=>true,
		        	'placeholder'=>"Inicio de publicación",
		        	'title'=>'Inicio de publicación',
		    ),
		));
		?>
		<?php echo $form->error($model,'start_date'); ?>
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
		        	'placeholder'=>"Final de publicación",
		        	'title'=>'Final de publicación',
		    ),
		));
		?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row buttons">

		<?php echo CHtml::htmlButton('Enviar',array(
								'onclick'=>'send("files-manager-form", "FilesManager/create", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : 0).'","")',
								'class'=>'savebutton',
						));
		?>

		<?php echo CHtml::Button('Cancelar',array('submit' => array('FilesManager/admin'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
