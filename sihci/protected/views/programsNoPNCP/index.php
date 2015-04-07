<!-- FO02-Desplegar Programas NO PNCP -->

<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Programas NO PNCP ';
$this->breadcrumbs=array(
	'Programa de formación de recursos humanos en investigación / Programas NO PNCP ',
);
?>


<section class="informativa">


	
	<section class="column-left">
		<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Comités.png" alt="">
	</section>


	<section class="column-center">
	<h2>Programas NO PNCP</h2>
	<hr>
		<ol TYPE=A>
			<li>Medicina Interna (PNPC)</li>
			<li>Pediatría Médica (PNPC)</li>
			<li>Radiología e Imagen</li>
			<li>PNPC Padrón Nacional de Posgrados de Calidad</li>
			<li>SUBESPECIAliDADES</li>
			<li>Hospital Civil Fray Antonio Alcalde</li>
			<li>Alergia e Inmunología Clínica</li>
			<li>Anestesiología Pediátrica</li>
			<li>Angiología y Cirugía Vascular</li>
			<li>Cardiología</li>
			<li>Cirugía Cardiotorácica</li>
			<li>Cirugía Oncológica</li>
			<li>Cirugía Pediátrica (PNPC)</li>
			<li>Cirugía Plástica y Reconstructiva</li>
			<li>Coloproctología (PNPC)</li>
			<li>Dermatología</li>
			<li>Dermatología Pediátrica</li>
			<li>Endocrinología</li>
			<li>Gastroenterología</li>
			<li>Hematología</li>
			<li>Hemodinamia y Cardiología Intervencionista</li>
			<li>Infectología</li>
			<li>Infectología Pediátrica (PNPC)</li>
			<li>Medicina del Enfermo en Estado Crítico (PNPC)</li>
			<li>Medicina de Rehabilitación</li>
			<li>Nefrología (PNPC)</li>
			<li>Neonatología (PNPC)</li>
			<li>Neurocirugía</li>
			<li>Oncología médica</li>
			<li>Retina Médico Quirúrgica (PNPC)</li>
			<li>Reumatología (PNPC)</li>
			<li>Urología</li>
			<li>Urología Ginecológica (PNPC)</li>
			<li>Hospital Civil Dr. Juan I. Menchaca</li>
			<li>Cirugía Laparoscópica (PNPC)</li>
			<li>Gastroenterología y Nutrición Pediátrica</li>
			<li>Hemato-Oncología Pediátrica</li>
			<li>Medicina Materno Fetal</li>
			<li>Neonatología</li>
			<li>Neurocirugía</li>
			<li>Reumatología (PNPC)</li>
			<li>PNPC Padrón Nacional de Posgrados de calidad</li>
		</ol>
	</section>

	<section class="column-right">
	<h5>DOCUMENTOS</h5>
	<h5>DESCARGABLES:</h5>
		<?php Yii::app()->runController('filesManager/DisplayFiles/section/ProgramasNoPNCP'); ?>
	</section>
</section>