
<!-- C001-Desplegar Infromacion -->


<!-- ProINVENHCi -->

<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Programas de cooperación internacional en investigación';
$this->breadcrumbs=array(
	'Programas de cooperación internacional en investigación',
);
?>

<section class="informativa">

	<section class="column-left">
		<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
	</section>

		<section class="column-center">

		<h2>Programas de cooperación internacional en investigación</h2>
		<hr>
			<p>
				Existen Convenios firmados con 19 Universidades: (C
				EMIC Centro de Educación Médica e
				Investigaciones Clínicas “Norberto Quirno” CIMEQ Ce
				ntro de Investigaciones Médico Quirúrgicas,
				Facultad de Ciencias Médicas de la Universidad de S
				an Carlos de Guatemala, Hospital Vall d’Hebron-
				Universidad, Autónoma de Barcelona, IOGI Instituto
				de Otología García Ibáñez, del Barcelona Centre
				Medic, Junta de Beneficencia de Guayaquil, Universi
				dad de Santander, Universidad Médica de Innsbruck,
				Memorial University, University of lowa, AAOM Ameri
				can Association of Orthopedic Medicine, Banc de
				Sang I Teixits Clínica Hispana, Hannover Medical Sc
				hool, Hospital “Hermanos Ameijeiras”, Hospital Clín
				ic,
				Hospital Universitario de Gran Canaria, Sociedad Cu
				bana de Patología Clínica, St. Jude Medical Center
				(Fullerton) (ver cuadros).
			</p>

			<img id="redaccion"src="<?php echo Yii::app()->request->baseUrl."/protected/views/desplegarInformacion/img1.png"; ?>">
			<img id="redaccion"src="<?php echo Yii::app()->request->baseUrl."/protected/views/desplegarInformacion/img2.png"; ?>">


		</section>

	<section class="column-right">
	<h5>DOCUMENTOS</h5>
	<h5>DESCARGABLES:</h5>
	<?php Yii::app()->runController('filesManager/DisplayFiles/section/'.Yii::app()->controller->id); ?>
	</section>

</section>
