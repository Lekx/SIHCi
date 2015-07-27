<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Normatividad de Investigaciòn';
$this->breadcrumbs=array(
	'OPD / Normatividad de Investigaciòn',
);
?>

<section class="informativa">


	<section class="column-center">

		<div class="titleinfo">
			<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/NormatividadInvestigacion.png" alt="">
			<h3>Normatividad de Investigaciòn</h3>
			<hr>
		</div>

		<div class="generalinformation">
			<p>El OPD Hospital Civil de Guadalajara cuenta con un marco normativo con el cual se rigen todos sus integrantes.
			En este espacio usted podrá consultar las normas más recientes.</p>
		</div>
	</section>

	<section class="column-right">
	<h5>DOCUMENTOS</h5>
	<h5>DESCARGABLES:</h5>
	<?php Yii::app()->runController('filesManager/DisplayFiles/section/'.Yii::app()->controller->id); ?>
	</section>

</section>
