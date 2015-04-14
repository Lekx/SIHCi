<!-- OP07-Desplegar Transparencia -->
<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' -Transparencia';
$this->breadcrumbs=array(
	'OPD / Transparencia',
);
?>

<section class="informativa">

	<section class="column-left">
		<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Transparencia.png" alt="">
	</section>


	<section class="column-center">
		<h3>Organismo Público Descentralizado Hospital Civil de Guadalajara.</h3>
		<hr>
			<span><h4>AVISO DE PRIVACIDAD</h4></span>
			<span><h5>PROTECCIÓN DE DATOS PERSONALES</h5></span>
			
			<p>El Organismo Público Descentralizado Hospital Civil
			de Guadalajara, con domicilio
			ubicado en el número 278 doscientos setenta y ocho
			de la calle Hospital, en la
			Colonia el Retiro, en Guadalajara, Jalisco, con fun
			damento en los artículos 20, 21, 22,
			23 punto 1, fracciones II y III, 25 fracciones XV,
			XVII y XX, de la Ley de
			Transparencia y Acceso a la Información Pública del
			Estado de Jalisco y sus
			Municipios; 2° fracciones III, XV y XVI, del Reglam
			ento de la Ley de Transparencia y
			Acceso a la Información Pública del Estado de Jalis
			co y sus Municipios; así como
			con apoyo en los artículos Décimo Segundo y Décimo
			Séptimo de los
			Lineamientos Generales en Materia de Protección de
			Información Confidencial y
			Reservada, emitidos por el Instituto de Transparenc
			ia e Información Pública del
			Estado de Jalisco, publicados en el Periódico Ofici
			al “El Estado de Jalisco”, el día 1°
			primero de mayo del año 2012 dos mil doce, de aplic
			ación al asunto que nos
			ocupa; asimismo, con fundamento en el artículo Segu
			ndo, de los Criterios
			Generales en Materia de Protección de Información C
			onfidencial y Reservada del
			Organismo Público Descentralizado “Hospital Civil d
			e Guadalajara”, autorizados por
			el referido Consejo, en la Quincuagésima Primera Se
			sión Ordinaria, celebrada el día
			06 seis de noviembre del año 2012 dos mil doce;
			le informa, que los datos
			confidenciales que Usted proporcione por cualquier
			motivo ante este Organismo
			Público Descentralizado “Hospital Civil de Guadalaj
			ara”, serán única y
			exclusivamente utilizados para los fines que fueron
			proporcionados, en especial los
			datos sensibles que de los mismos se adviertan; ent
			endiéndose por Datos
			Personales, aquellos que se refieren a la persona f
			ísica identificada o identificable por datos sensibles, 
			los que afecten su intimidad, y que puedan dar origen a
			discriminación o que su difusión o entrega a tercer
			os conlleve un riesgo para su
			titular.</p>
			<p>Por otra parte, se le comunica que atento lo dispon
			e el numeral 22 de la Ley de
			Transparencia y Acceso a la Información Pública del
			Estado de Jalisco y sus
			Municipios, sus Datos Personales pueden ser transfe
			ridos o proporcionados a
			terceros, en los casos y condiciones que se mencion
			an en el mismo, en especial, si la
			petición está sujeta a una orden judicial, fuere ne
			cesaria para fines estadísticos,
			científicos o de interés general por Ley y no pueda
			asociarse con persona alguna
			en particular, sea necesaria para la prevención, di
			agnóstico o atención médica
			del propio titular de dicha información, se trasmit
			a entre las autoridades estatales y
			municipales para el ejercicio de sus atribuciones,
			o para fines públicos específicos,
			se relacione con el otorgamiento de estímulos, apoy
			os, subsidios y recursos
			públicos, o sea necesaria para el otorgamient
			o de concesiones,
			autorizaciones, licencias o permisos y por último,
			cuando no sea considerada
			como confidencial por disposición legal expresa.</p>
			<p>Ahora bien, conforme lo dispone el numeral 23 fracc
			iones II y III, de la Ley de
			Transparencia y Acceso a la Información Pública del
			Estado de Jalisco y sus
			Municipios, como titular de información confidencia
			l tiene derecho a acceder,
			rectificar, modificar, corregir, sustituir, oponers
			e, suprimir o ampliar sus datos de
			información confidencial en posesión de este sujeto
			obligado, y podrá realizar este
			trámite en la Unidad de Transparencia del Organismo
			Público Descentralizado
			“Hospital Civil de Guadalajara”, ubicada en la call
			e Coronel Calderón 777, Colonia El
			Retiro, en Guadalajara, Jalisco, a un costado de la
			Dirección General de dicha
			Institución.</p>
			<p>La presente constancia de privacidad puede sufrir m
			odificaciones, cambios o
			actualizaciones derivadas de nuevos requerimientos
			legales, de nuestras propias
			necesidades por mejorar los procedimientos y nuestr
			as prácticas de privacidad, o por
			otras causas.</p>
			<p>Nos comprometemos a mantenerlo informado sobre los
			cambios que pueda sufrir la
			constancia de privacidad que nos ocupa.</p>
	</section>


	<section class="column-right">
		<h5>DOCUMENTOS</h5>
		<h5>DESCARGABLES:</h5>
		<?php Yii::app()->runController('filesManager/DisplayFiles/section/desplegarTransparencia'); ?>
	</section>
</section>	
