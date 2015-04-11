<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' -FInEHC';
$this->breadcrumbs=array(
	'/ FInEHC',
);
?>

<section class="informativa">

			<section class="column-left">
				<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/FormacionInvestigacion.png" alt="">
			</section>


	<section class="column-center">
	<p><h2>FinEHC</h2></p>
		<hr>
		<p>El OPD Hospital Civil de Guadalajara cuenta con un marco normativo con el cual se rigen todos sus integrantes.</br> 
			En este espacio usted podrá consultar el Proyecto de Reglas de Operación Fondo para el Fomento de la Investigación Científica y Tecnológica del Hospital Civil de Guadalajara “FINEHC”.</p>
	</section>

<section class="column-right">
		<h5>DOCUMENTOS</h5>
		<h5>DESCARGABLES:</h5>
		<?php Yii::app()->runController('filesManager/DisplayFiles/section/FInEHC'); ?>
	</section>

</section>