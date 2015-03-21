<!-- VI01-Vinculacion Con Universidad Institutos Y Hospitales -->

<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Vinculacion Con Universidad Institutos Y Hospitales';
$this->breadcrumbs=array(
	'Vinculacion Con Universidad Institutos Y Hospitales',
);
?>
<section class="informativa">

	<section class="column-left">
			<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/VinculaciónUniversidadesInstitutosHospitales.png" alt="">
	</section>

	
	<section class="column-center">

	<h2>Vinculacion Con Universidad Institutos Y Hospitales</h2>
	<hr>
	<p>
		<h6>Extensión y Vinculación</h6>
		Las actividades de vinculación constituyen el puent
		e entre los procesos de formación de recursos human
		os
		especializados y las instituciones de servicio y de
		educación que potencialmente representan una forta
		leza para
		mejorar y coadyuvar en la educación de internos y e
		specialistas en las unidades hospitalarias del OPD-
		Hospital Civil
		de Guadalajara. De igual manera, es la extensión el
		mecanismo por el cual se puede realizar un acercam
		iento entre
		los procesos de enseñanza, investigación y servicio
		, pero también entre estas y la comunidad hospitala
		ria y la
		sociedad local y regional en la cual se enclava el
		Organismo Público Descentralizad

	</p>
	</section>

	<section class="column-right">
	<h5>DOCUMENTOS</h5>
	<h5>DESCARGABLES:</h5>
		     	<?php Yii::app()->runController('filesManager/DisplayFiles/section/Vinculacion con universidades, institutos y hospitales'); ?>
	 </section>

</section>


