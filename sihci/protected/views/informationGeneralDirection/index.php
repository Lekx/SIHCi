<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Información de Dirección general';
$this->breadcrumbs=array(
	'OPD / Información de Dirección general',
);
?>
<!-- >OP01-Desplegar información de Dirección general-->

<section class="informativa">

	<section class="column-center">

	<div class="titleinfo">
	<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
	<h2>Información General</h2>
	<hr>
	</div>

<div class="generalinformation">

	
	
			<span>¿Quiénes somos?</span><br>
			<!--<span>¿Qué es el Hospital Civil de Guadalajara?</span><br><br>-->

		<p>Es un Organismo Público Descentralizado de la administración pública estatal, con personalidad jurídica y
		patrimonio propios; conformado por dos Unidades Hospitalarias:<p><p>
		<ul TYPE=disc>
			<li> Antiguo Hospital Civil de Guadalajara “Fray Antonio Alcalde”</li>
			<li> Nuevo Hospital Civil de Guadalajara “Dr. Juan I. Menchaca”</li>
		</ul>
		Principales objetivos:
		<ul TYPE=disc>
			 <li> Prestar servicios de salud a la población sin protección de seguridad social.</li>
			 <li> Fungir como Hospital-Escuela de la Universidad de Guadalajara para las funciones de docencia,
			investigación y extensión en el área de Salud.</li>
		</ul>
		Líneas estratégicas:
		<ul>
			 <li> Transformar la administración hospitalaria basada en procesos.</li> 
			 <li> Alcanzar un pleno desarrollo profesional y humano de profesionales en salud.</li> 
			 <li>  Establecer una Cultura enfocada hacia la Calidad y Seguridad Institucional.</li> 
			 <li> Desarrollar la investigación operativa en procesos de salud.</li> 
			 <li> Establecer sistema único e integral de información</li> 
			 <li> Lograr más y mejor comunicación.</li> 
			 <li> Implementar un sistema de financiamiento efectivo.</li> 
		     <li> Modernización, hacia un Hospital de Vanguardia. </li> 
			 <li> Internacionalización Institucional a través de Convenios e intercambios de capacitación, investigación y
			   programas de alto impacto social con Instituciones nacionales e Internacionales reconocidas.</li> 
			 <li>  Implementación de un sistema de participación activa del usuario externo en los programas asistenciales.</li> 
		</ul>
		Ideología Institucional<br>
		Misión
			<p>Brindar servicios integrales de salud hospitalaria de segundo y tercer nivel, fundamentalmente a la población que
			no pertenece a ningún régimen de seguridad social, buscando en la prestación de servicios la generación de
			conocimientos y la formación de recursos humanos de excelencia en las ciencias de la salud.</p>
		Visión:
			<p>Conformarse en un centro asistencial de referencia hospitalaria de segundo y tercer nivel, otorgando servicios de
			salud oportunos, con calidad y eficiencia. Ser Hospital-Escuela líder y de vanguardia en la Enseñanza e Investigación
			que impulse en nuestro Estado una nueva cultura para la salud.</p>
		Valores:
		<ul>
			<li>Universalidad</li>
		   <li>Humanitarismo</li>
			<li>Etica</li>
			<li>Profesionalismo</li>
			<li>Vocación de Servicio</li>
			<li>Creatividad</li>
			<li>Autocrítica</li>
			<li>Eficacia y Eficiencia</li>
			<li>Congruencia</li>
		</ul>
		 PLAN INSTITUCIONAL
			<p>El Hospital Civil de Guadalajara, forma parte de un complejo Sistema de Salud del Estado de Jalisco,
			atiende a un número importante de jaliscienses y pacientes de otros Estados que requieren de atención de
			servicios de salud de mediana y alta complejidad. Su función principal recae principalmente en tres
			dimensiones, la atención curativa, la formación de recursos humanos para la salud y la investigación en
			ciencias de la salud.</p>
			<p>Los cambios que se operan en la sociedad hacen necesario que nuestro sistema de salud sea sensible a
			nuevos problemas relacionados con la equidad, el cambio epidemiológico, la calidad de los servicios y la
			reordenación de los recursos. En los últimos años, la permanente búsqueda de la mejora continua, obligan
			al reforzamiento y desarrollo de algunas estrategias que sean garantes de mejores resultados, sobre todo
			en su impacto en la calidad de vida de los ciudadanos, que son el eje central de las acciones del Hospital
			Civil de Guadalajara y su voz, un imperativo. </p>
	</section>
	</div>

	<section class="column-right">
	<h5>DOCUMENTOS</h5>
	<h5>DESCARGABLES:</h5>
		<?php Yii::app()->runController('filesManager/DisplayFiles/section/'.Yii::app()->controller->id); ?>
	</section>
	
</section>
