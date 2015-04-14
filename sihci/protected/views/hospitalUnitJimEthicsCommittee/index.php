<!-- Unidad Hospitalaria JIM: Comité de ética <H1> -->


<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' -Comités';
$this->breadcrumbs = array(
	'OPD / Comités',
);
?>

<section class="informativa">

			<section class="column-left">
				<img id=""src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/IconCirculo/Comites.png" alt="">
			</section>


	<section class="column-center">
	<h1>Comites</h1>
		“El OPD Hospital Civil de Guadalajara cuenta con comités científicos con el cual se rigen todos sus integrantes. En este espacio usted podrá consultar los miembros de estos comités científicos más recientes.”
	</section>

		<section class="column-right">
		<h5>DOCUMENTOS</h5>
		<h5>DESCARGABLES:</h5>
			<!-- <a href= "URL" >JIM: Comité de ética.</a>
			 <a href= "URL" >JIM: Comité de ética en investigación.</a>
			 <a href= "URL" >JIM: Comité de Bioseguridad.</a>
			 <a href= "URL" >FAA: Comité de ética.</a>
			 <a href= "URL" >FAA: Comité de ética en investigación.</a>
			 <a href= "URL" >FAA: Comité de Bioseguridad.</a>-->
		<?php Yii::app()->runController('filesManager/DisplayFiles/section/'.Yii::app()->controller->id); ?>
	</section>
</section>