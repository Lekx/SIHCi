<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' -Resultado de busqueda de'. $keyword ;
$this->breadcrumbs=array(
	'Resultado de busquedad'. $keyword,
	);
	?>


	<section class="informativa">

		<section class="column-left">
			<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Transparencia.png" alt="">
		</section>

		<section class="column-center">
			<?php 
			if(empty($results))
				echo "<h2>No se encontraron resultados para su busqueda:<br>\"".$keyword."\"</h2><hr>";
			else
				echo  "<h2> Resultado de la busqueda:<br> <b>\"".$keyword."\" fue:<h2><hr>";

			foreach($results as $index => $subarray)
				echo "<h3><a href=".Yii::app()->baseUrl."/index.php"."/".$index.">".$subarray["title"]."</a></h3>"."<h4 id='description'><a href=".Yii::app()->baseUrl."/index.php"."/".$index.">".$subarray["desc"]."</a></h4>";
			?>
		</section>

	</section>