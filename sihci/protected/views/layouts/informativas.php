<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap-3.0.0/css/bootstrap.min.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/demo.css">

	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<?php Yii::app()->clientScript->registerCoreScript('jquery.ui');?>

	<?php 
	$baseUrl = Yii::app()->baseUrl;
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile($baseUrl.'/js/list.js');
	$cs->registerScriptFile($baseUrl.'/js/prefixfree.min');
	$cs->registerScriptFile($baseUrl.'/js/slideshow.js');
	$cs->registerScriptFile($baseUrl.'/js/scroll.js');
	$cs->registerScriptFile($baseUrl.'/js/responsiveslides.js');
	$cs->registerScriptFile($baseUrl.'/js/slideshowres.js');
	?>

	<?php Yii::app()->bootstrap->register(); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>


</head>

<body>
	<section>
		<div class="slidingDiv">
			<div class="menu">
			<div>
				<ul class="cbp-hsmenu1">
					<li><a><h6>OPD HCG</h6></a>
						<ul class="cbp-hssubmenu1">
							<li><a><span>Dirección general</span></a></li>
							<li><a><span>Organigrama</span></a></li>
							<li><a><span>Normatividad de investigación</span></a></li>
							<li><a><span>Registro RENIECYT</span></a></li>
							<li><a><span>Transparencia</span></a></li>
							<li><a><span>Comitès</span></a></li>
							<li><a><span>Plano de ubicación SGEI OPD</span></a></li>
						</ul>
					</li>
					<li>
						<a><h6>CVE-HC</h6></a>
						<ul class="cbp-hssubmenu1">
						</ul>
					</li>
					<li>
						<a><h6>Centro de Investigación Clínica</h6></a>
						<ul class="cbp-hssubmenu1">
						<li><a><span>Lineas de investigación</span></a></li>
						<li><a><span>Protocolos patrocinados por la industrias</span></a></li>
						<li><a><span>Farmacéutica</span></a></li>
						<li><a><span>Living Labs-Salud</span></a></li>
						</ul>
					</li>
					<li>
						<a><h6>FInEHC</h6></a>
						<ul class="cbp-hssubmenu1">
						</ul>
					</li>
					<ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<a><h6>Sub-Dirección General de enseñanza e investigación</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>Publicaciones Científicas</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>HCG Fray Antonio Alcalde</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>HCG DR. Juan I. Menchaca</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<a><h6>Programa de formación de recursos humanos en investigación</h6></a>
								<ul class="cbp-hssubmenu1">
								<li><a><span>Programas PNCP</span></a></li>
								<li><a><span>Programas NO PNCP</span></a></li>
								</ul>
							</li>
							<li>
								<a><h6>Convocatorias y apoyos en investigación</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>ProInvenhci</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>ProDIME</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<a><h6>Programas de generación de conocimiento</h6></a>
								<ul class="cbp-hssubmenu1">
								<li><a><span>Redacción Científicas</span></a></li>
								<li><a><span>Lineas de generación de conmiento científico</span></a></li>
								</ul>
							</li>
							<li>
								<a><h6>Programas de coperación internacional en investigación</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>Vinculación con universidades, institutos y hospitales</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>Revistas científicas</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>Unidad Editorial</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>

						</ul>
					</div>
				</div>
		</div>
	</section>

<section>
	<div class="slidingDiv2">
		<div class="menu">
			<div>
				<ul class="cbp-hsmenu1">
					<li><a><h6>OPD HCG</h6></a>
						<ul class="cbp-hssubmenu1">
							<li><a><span>Dirección general</span></a></li>
							<li><a><span>Organigrama</span></a></li>
							<li><a><span>Normatividad de investigación</span></a></li>
							<li><a><span>Registro RENIECYT</span></a></li>
							<li><a><span>Transparencia</span></a></li>
							<li><a><span>Comitès</span></a></li>
							<li><a><span>Plano de ubicación SGEI OPD</span></a></li>
						</ul>
					</li>
					<li>
						<a><h6>CVE-HC</h6></a>
						<ul class="cbp-hssubmenu1">
						</ul>
					</li>
					<li>
						<a><h6>Centro de Investigación Clínica</h6></a>
						<ul class="cbp-hssubmenu1">
						<li><a><span>Lineas de investigación</span></a></li>
						<li><a><span>Protocolos patrocinados por la industrias</span></a></li>
						<li><a><span>Farmacéutica</span></a></li>
						<li><a><span>Living Labs-Salud</span></a></li>
						</ul>
					</li>
					<li>
						<a><h6>FInEHC</h6></a>
						<ul class="cbp-hssubmenu1">
						</ul>
					</li>
					<ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<a><h6>Sub-Dirección General de enseñanza e investigación</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>Publicaciones Científicas</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>HCG Fray Antonio Alcalde</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>HCG DR. Juan I. Menchaca</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<a><h6>Programa de formación de recursos humanos en investigación</h6></a>
								<ul class="cbp-hssubmenu1">
								<li><a><span>Programas PNCP</span></a></li>
								<li><a><span>Programas NO PNCP</span></a></li>
								</ul>
							</li>
							<li>
								<a><h6>Convocatorias y apoyos en investigación</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>ProInvenhci</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>ProDIME</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<a><h6>Programas de generación de conocimiento</h6></a>
								<ul class="cbp-hssubmenu1">
								<li><a><span>Redacción Científicas</span></a></li>
								<li><a><span>Lineas de generación de conmiento científico</span></a></li>
								</ul>
							</li>
							<li>
								<a><h6>Programas de coperación internacional en investigación</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>Vinculación con universidades, institutos y hospitales</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>Revistas científicas</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a><h6>Unidad Editorial</h6></a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>

						</ul>
					</div>
				</div>
		</div>
             <div id="header-content-container">
                 <div id="header-content">
                 	<div id="headerlogo"></div>

	                 	<div id="hsearch">
		                 	<div id="headermenu">
		                 		<button id="show_hidemenu2" type="button" class="btn btn-default btn-lg">
		                 			<span class="glyphicon glyphicon-align-justify"></span>
		                 		</button>
		                 	 </div>
		                 	<div id="headersearch"><input id="searchbartop"type="search" placeholder="Buscar"></div>
		                 	<div id="hsearchbutton">
		                 		<button id="" type="button" class="btn btn-default btn-lg">
		                 			<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		                 		</button>
		                 	 </div>
	                 	</div>
                 </div>
            </div>
    </section>

	<section class="logosection">
		<div class="logo"></div>
		<div class="logosub"></div>
		<div class="logoinfo"><span>Ivestigadores:</span><span>Vidas Cambiadas</span><span>Ivestigaciones</span><span>Libros y Revistas</span></div>
		<div class="logonum"><h4>1,456</h4><h4>1,923,456</h4><h4>17,296</h4><h4>3,163</h4></div>
	</section>

	<section class="logsection">
		<div class="login"></div>
		<div class="singin"></div>
		<div class="searchbar">
			<form>

				<button id="show_hidemenu" type="button" class="btn btn-default btn-lg">
				<span class="glyphicon glyphicon-align-justify"></span>
				</button>


				<input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1">
				<button id="search" type="button" class="btn btn-default btn-lg">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</button>
		</div>
	</section>


	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>


	<section class="informativa">
	<?php echo $content; ?>
	</section>




	<section class="mapaSitio">
		<div class="menu">
			<div>
				<ul class="cbp-hsmenu">
					<li><a><h6>OPD HCG</h6></a>
						<ul class="cbp-hssubmenu">
							<li><a><span>Dirección general</span></a></li>
							<li><a><span>Organigrama</span></a></li>
							<li><a><span>Normatividad de investigación</span></a></li>
							<li><a><span>Registro RENIECYT</span></a></li>
							<li><a><span>Transparencia</span></a></li>
							<li><a><span>Comitès</span></a></li>
							<li><a><span>Plano de ubicación SGEI OPD</span></a></li>
						</ul>
					</li>
					<li>
						<a><h6>CVE-HC</h6></a>
						<ul class="cbp-hssubmenu">
						</ul>
					</li>
					<li>
						<a><h6>Centro de Investigación Clínica</h6></a>
						<ul class="cbp-hssubmenu">
						<li><a><span>Lineas de investigación</span></a></li>
						<li><a><span>Protocolos patrocinados por la industrias</span></a></li>
						<li><a><span>Farmacéutica</span></a></li>
						<li><a><span>Living Labs-Salud</span></a></li>
						</ul>
					</li>
					<li>
						<a><h6>FInEHC</h6></a>
						<ul class="cbp-hssubmenu">
						</ul>
					</li>
					<ul>
					</div>
					<div>
						<ul class="cbp-hsmenu">
							<li>
								<a><h6>Sub-Dirección General de enseñanza e investigación</h6></a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<a><h6>Publicaciones Científicas</h6></a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<a><h6>HCG Fray Antonio Alcalde</h6></a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<a><h6>HCG DR. Juan I. Menchaca</h6></a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu">
							<li>
								<a><h6>Programa de formación de recursos humanos en investigación</h6></a>
								<ul class="cbp-hssubmenu">
								<li><a><span>Programas PNCP</span></a></li>
								<li><a><span>Programas NO PNCP</span></a></li>
								</ul>
							</li>
							<li>
								<a><h6>Convocatorias y apoyos en investigación</h6></a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<a><h6>ProInvenhci</h6></a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<a><h6>ProDIME</h6></a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu">
							<li>
								<a><h6>Programas de generación de conocimiento</h6></a>
								<ul class="cbp-hssubmenu">
								<li><a><span>Redacción Científicas</span></a></li>
								<li><a><span>Lineas de generación de conmiento científico</span></a></li>
								</ul>
							</li>
							<li>
								<a><h6>Programas de coperación internacional en investigación</h6></a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<a><h6>Vinculación con universidades, institutos y hospitales</h6></a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<a><h6>Revistas científicas</h6></a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<a><h6>Unidad Editorial</h6></a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>

						</ul>
					</div>
				</div>
			</section>
			<section class="footersection">
				<div class="copyrigths">
					<div id="copy">
					<p> © 2015 Todos los derechos reservados Sistema de Gestión y Administración de Protocolos de Investigación Médica en el Hospital Civil.</p>
					<p><a>Condiciones de uso</a> / <a>Aviso de privacidad</a></p>
					</div>
				</div>
				<div class="loginfot"></div>
				<div class="singinfot"></div>
			</section>

</body>
</html>