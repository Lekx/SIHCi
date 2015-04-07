<!-- RC01-Desplegar Revistas Cientificas -->

<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Revistas Cientificas';
$this->breadcrumbs=array(
	'Revistas Cientificas',
);
?>
<section class="informativa">

	<section class="column-left">
		<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Comités.png" alt="">
	</section>

		<section class="column-center">

		<h2>Revistas Cientificas</h2>
		<hr>
		Publicaciones científicas
			<p>El principal vehículo de comunicación de la ciencia
			es el artículo científico original; es una obra de
			arte intelectual:
			el conocimiento científico nuevo que se origina a p
			artir del análisis e interpretación de los datos de
			una
			investigación en ciencias de la salud debe divulgar
			se.</p>
			<p>Se requiere entender la responsabilidad y conservar
			el entusiasmo de escribir para difundir conocimien
			to
			científico. Si se tiene en mente a la audiencia des
			de que se inicia la redacción del manuscrito cientí
			fico, se logrará
			con éxito transitar de la escritura privada a la es
			critura pública a través del artículo científico or
			iginal.</p>
		Hipócrates Revista Médica
			<p>Revista médica de divulgación académica con orienta
			ción clínica que busca fortalecer los conocimientos
			obtenidos
			en la práctica diaria de los médicos en formación,
			así como ser una herramienta complementaria en la p
			reparación
			del Examen Nacional para Residencias Médicas. Prete
			nde despertar interés por la generación de artículo
			s clínicos y
			culturales, proporcionando un medio de interacción
			académica entre profesionales de la salud, involucr
			ando a los
			médicos de mayor jerarquía y experiencia en la tran
			smisión de sus conocimientos a las nuevas generacio
			nes. </p>
		Archivos en Pediatría
				<p>Forma parte de las 5 mejores revistas editadas en M
			éxico. Cumple 5 años de aparición regular, sin inte
			rrupciones.
			Contiene un Comité Editorial de prestigio nacional
			e internacional. Su contenido básicamente consiste
			en: editorial,
			artículos originales, casos clínicos y actividades
			del Departamento de Pediatría del Hospital Dr. Juan
			I Menchaca. Su
			propósito es conjuntar la experiencia clínica de ot
			ros Hospitales locales y de la República, y que sir
			va como un
			medio de expresión intelectual y de actualización m
			édica.</p>

		Tracto Genital Inferior
			<p>Revista científica que pretende difundir informació
			n consistente, multidisciplinaria y de vanguardia,
			mediante la
			interconexión globalizada con instituciones, profes
			ores expertos e investigaciones, cuya dinámica prof
			esional gira
			en torno al Tracto Genital Inferior (TGI). Lo anter
			ior, en un esfuerzo que vincule y genere redes que
			filtren ideas, e
			hipótesis científicas, favoreciendo una fluida gama
			en líneas de análisis e iinvestigación.</p>

		</section>

	<section class="column-right">
		<h5>DOCUMENTOS</h5>
		<h5>DESCARGABLES:</h5>
		<?php Yii::app()->runController('filesManager/DisplayFiles/section/revistasCientificas'); ?>
	</section>

</section>