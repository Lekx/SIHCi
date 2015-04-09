
<!-- FO01-Desplegar Programas PNCP -->
<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Programas PNCP ';
$this->breadcrumbs=array(
	'Programa de formación de recursos humanos en investigación / Programas PNCP ',
);
?>
<section class="informativa">


	<section class="column-left">
		<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Comités.png" alt="">
	</section>

	<section class="column-center">

	<h2>Programas PNCP</h2>
	<hr>
		<OL TYPE=A>
			<LI>Pediatría Médica (PNPC)</LI>
			<LI>Psiquiatría</LI>
			<LI>Radiología e Imagen</LI>
			<LI>Urgencias Médico Quirúrgicas</LI>
			<LI>Hospital Civil Dr. Juan I. Menchaca</LI>
			<LI>Anatomía Patológica</LI>
			<LI>Anestesiología</LI>
			<LI>Cirugía General</LI>
			<LI>Epidemiologia</LI>
			<LI>Genética Médica (PNPC)</LI>
			<LI>Ginecología y Obstetricia</LI>
			<LI>Medicina Interna (PNPC)</LI>
			<LI>Pediatría Médica (PNPC)</LI>
			<LI>Radiología e Imagen</LI>
			<LI>PNPC Padrón Nacional de Posgrados de Calidad</LI>
		</OL>
	</section>


	<section class="column-right">
	<h5>DOCUMENTOS</h5>
	<h5>DESCARGABLES:</h5>
		<?php Yii::app()->runController('filesManager/DisplayFiles/section/ProgramasPNCP'); ?>
	</section>

</section>