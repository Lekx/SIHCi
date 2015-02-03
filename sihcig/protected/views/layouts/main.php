<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap-3.0.0/css/bootstrap.min.css" media="screen, projection" >
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<?php Yii::app()->bootstrap->register(); ?>

	<section class="logosection">
		<div class="logo"></div>
		<div class="logosub"></div>
		<div class="logoinfo"><span>Ivestigadores:</span><span>Vidas Cambiadas</span><span>Ivestigaciones</span><span>Libros Y Revistas</span></div>
		<div class="logonum"><h4>1,456</h4><h4>1,923,456</h4><h4>17,296</h4><h4>3,163</h4></div>
	</section>

	<section class="logsection">
		<div class="login"></div>
		<div class="singin"></div>
		<div class="searchbar">
			<form>
				<input type="text" placeholder="Buscar..">
			</form>
		</div>
	</section>	

	<section>
		<div class="carrusel"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg"></div>
	</section>

	<section class="carruselinfo">
		<div id="uno"></div><div id="dos"></div><div id="tres"></div>
	</section>

	<section>

		<div class="content"></div>

	</section>

	<section class="contentboxs"> 
		<div id="box1"></div>
		<div id="box2"></div>
		<div id="box3"><img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg"></div>
		<div id="box4"></div>
		<div id="box5"><img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg"></div>
		<div id="box6"></div>
	</section>

	<section class="contentboxs2"> 
		<div id="box1"></div>
		<div id="box2"></div>
		<div id="box3"><img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg"></div>
		<div id="box4"></div>	
	</section>

	<section>
		<div class="content"></div>
	</section>

	<section>
		<div class="carrusel"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg"></div>
	</section>

	<section>

		<div class="menu">
			<ul class="cbp-hsmenu">
				<div>
					<li>
						<a href="#">OPD HCG</a>
						<ul class="cbp-hssubmenu">
							<li><a href="#"><span>Delicate Wine</span></a></li>
							<li><a><span>Dirección general</span></a></li>
							<li><a><span>Sudirección general de enseñanza e investigación</span></a></li>
							<li><a><span>Organigrama</span></a></li>
							<li><a><span>Normatividad de investigación</span></a></li>
							<li><a><span>Registro RENIECYT</span></a></li>
							<li><a><span>Tramites y servicios</span></a></li>
							<li><a><span>Transparencia</span></a></li>
							<li><a><span>FInEHC</span></a></li>
							<li><a><span>Plano de ubicación</span></a></li>
						</ul>
					</li>

					<li>
						<a href="#">Programas de coopreación internacional en investigación</a>
						<ul class="cbp-hssubmenu">
							<li><a href="#"><span>Delicate Wine</span></a></li>
						</ul>
					</li>
					<li>
						<a href="#">Vinculación con universidades, institutos y hospitales</a>
						<ul class="cbp-hssubmenu">
							<li><a href="#"><span>Delicate Wine</span></a></li>
						</ul>
					</li>
				</div>

				<div>
					<li>
						<a href="#">Programas de generación de conocmiento cientifico</a>
						<ul class="cbp-hssubmenu">
							<li><a href="#"><span>Delicate Wine</span></a></li>
						</ul>
					</li>
					<li>
						<a href="#">Unidad Hospitalaria Juan I. Mecha</a>
						<ul class="cbp-hssubmenu">
							<li><a href="#"><span>Delicate Wine</span></a></li>
						</ul>
					</li>
					<li>
						<a href="#">Centro de investigación clinica medicina traslacional</a>
						<ul class="cbp-hssubmenu">
							<li><a href="#"><span>Delicate Wine</span></a></li>
						</ul>
					</li>
				</div>

				<div>
					<li>
						<a href="#">Unidades de investigación</a>
						<ul class="cbp-hssubmenu">
							<li><a href="#"><span>Delicate Wine</span></a></li>
						</ul>
					</li>
					<li>
						<a href="#">Laboratorios de investigación</a>
						<ul class="cbp-hssubmenu">
							<li><a href="#"><span>Delicate Wine</span></a></li>
						</ul>
					</li>
					<li>
						<a href="#">Unidad Hospitalaria Fray Antonio Alcalde</a>
						<ul class="cbp-hssubmenu">
							<li><a href="#"><span>Delicate Wine</span></a></li>
						</ul>
					</li>
				</div>

				<div>
					<li>
						<a href="#">Formación de recursos en investigación</a>
						<ul class="cbp-hssubmenu">
							<li><a href="#"><span>Delicate Wine</span></a></li>
						</ul>
					</li>
					<li>
						<a href="#">Convocatoria y Becas para Formar Recursos Humanos en invesitigación</a>
						<ul class="cbp-hssubmenu">
							<li><a href="#"><span>Delicate Wine</span></a></li>
						</ul>
					</li>
					<li>
						<a href="#">Unidad Editorial</a>
						<ul class="cbp-hssubmenu">
							<li><a href="#"><span>Delicate Wine</span></a></li>
						</ul>
					</li>
				</div>
			</ul>
		</div>

	</section>




</body>
</html>
