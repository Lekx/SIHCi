<!-- OP03-Desplegar Organigrama -->

<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Organigrama';
$this->breadcrumbs = array(
	'OPD / Organigrama',
);
?>

<section class="informativa">

	<section class="column-left">
		<img id=""src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/IconCirculo/organigrama.png" alt="">
	</section>

	<section class="column-center">

		<h2>Organigrama</h2>
		<hr>

		<img src="<?php echo Yii::app()->request->baseUrl . "/protected/views/organigram/img/org1.png";?>">


		<p>Organigrama Dando clic en subdirección general e investigación
		Titular
		M.S.P. Víctor Manuel Ramírez Anguiano
		Subdirector General de Enseñanza e Investigación</p>

		<p>Domicilio
		Hospital 278 Col. El Retiro
		Guadalajara, Jalisco</p>

		<p>Teléfono
		36 58 63 51 y 36 14 65 01 Ext. 282 y 41009</p>

		<p>Correo electrónico
		vmramirez@hcg.gob.mx</p>


		<p>Objetivo, Funciones y Atribuciones</p> <br>
		<img src="<?php echo Yii::app()->request->baseUrl . "/protected/views/organigram/img/org2.png";?>">

	</section>



	<section class="column-right">
		<h5>DOCUMENTOS</h5>
		<h5>DESCARGABLES:</h5>
			<?php Yii::app()->runController('filesManager/DisplayFiles/section/Organigrama');?>
	</section>
</section>


