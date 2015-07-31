<!-- OP11-Desplegar Plano de ubicación de mapa de oficina SGEI OPD -->


<?php
/* @var $this SiteController */
/* @var $error array */
/*
$this->pageTitle=Yii::app()->name . ' -Plano de Ubicación.';
$this->breadcrumbs=array(
	'ODP / Plano de Ubicación.',
);*/
?>
<section class="informativa">


		<section class="column-center">

	<div class="titleinfo">
		<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Transparencia.png" alt="">
		<h2>Plano de Ubicación.</h2>
		<hr>
		</div>
		<div class="generalinformation">

		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3732.551253938506!2d-103.34289899999996!3d20.687828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1426179858034" width="830" height="450" frameborder="0" style="border:0"></iframe>
		</div>
	</section>

	<section class="column-right">
		<h5>DOCUMENTOS</h5>
		<h5>DESCARGABLES:</h5>
		<?php Yii::app()->runController('filesManager/DisplayFiles/section/'.Yii::app()->controller->id); ?>
	</section>

</section>
