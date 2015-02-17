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
					<li><a>OPD HCG</a>
						<ul class="cbp-hssubmenu1">
							<li><a><span>Delicate Wine</span></a></li>
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
						<a>Programas de coopreación internacional en investigación</a>
						<ul class="cbp-hssubmenu1">
						</ul>
					</li>

					<li>
						<a>Vinculación con universidades, institutos y hospitales</a>
						<ul class="cbp-hssubmenu1">
						</ul>
					</li>
					<ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<a>Unidad Editorial</a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a>Programas de generación de conocmiento cientifico</a>
								<ul class="cbp-hssubmenu1">
									<li><a><span>Redacción científica</span></a></li>
									<li><a><span>Asesoría Metodológica</span></a></li>
									<li><a><span>Asesoría de corrección de estilo de redacción en español u otros idiomas</span></a></li>
									<li><a><span>Desplegar lineas de generación de conocimiento científico<span><a></li>
								</ul>
							</li>
							<li>
								<a>Programas de desarrollo tecnológico e innovación</a>
								<ul class="cbp-hssubmenu1">
									<li><a><span>proINVENCI</span></a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<a>Centro de investigación clinica medicina traslacional</a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a>Unidades de investigación</a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a>Formación de recursos en investigación</a>
								<ul class="cbp-hssubmenu1">
									<li><a><span>Delicate Wine</span></a></li>
									<li><a><span>Programas PNCP</span></a></li>
									<li><a><span>Programas NO PNCP</span></a></li>
									<li><a><span>Programas no medicos</span></a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<a>Convocatoria y Becas para Formar Recursos Humanos en invesitigación</a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>

							<li>
								<a>Unidad Editorial</a>
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
					<li><a>OPD HCG</a>
						<ul class="cbp-hssubmenu1">
							<li><a><span>Delicate Wine</span></a></li>
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
						<a>Programas de coopreación internacional en investigación</a>
						<ul class="cbp-hssubmenu1">
						</ul>
					</li>

					<li>
						<a>Vinculación con universidades, institutos y hospitales</a>
						<ul class="cbp-hssubmenu1">
						</ul>
					</li>
					<ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<a>Unidad Editorial</a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a>Programas de generación de conocmiento cientifico</a>
								<ul class="cbp-hssubmenu1">
									<li><a><span>Redacción científica</span></a></li>
									<li><a><span>Asesoría Metodológica</span></a></li>
									<li><a><span>Asesoría de corrección de estilo de redacción en español u otros idiomas</span></a></li>
									<li><a><span>Desplegar lineas de generación de conocimiento científico<span><a></li>
								</ul>
							</li>
							<li>
								<a>Programas de desarrollo tecnológico e innovación</a>
								<ul class="cbp-hssubmenu1">
									<li><a><span>proINVENCI</span></a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<a>Centro de investigación clinica medicina traslacional</a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a>Unidades de investigación</a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<a>Formación de recursos en investigación</a>
								<ul class="cbp-hssubmenu1">
									<li><a><span>Delicate Wine</span></a></li>
									<li><a><span>Programas PNCP</span></a></li>
									<li><a><span>Programas NO PNCP</span></a></li>
									<li><a><span>Programas no medicos</span></a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<a>Convocatoria y Becas para Formar Recursos Humanos en invesitigación</a>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>

							<li>
								<a>Unidad Editorial</a>
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

	<section>
	 <div id="wrapper">
    <div class="callbacks_container">
      <ul class="rslides" id="slider4">
        <li>
        <img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg">
        </li>
        <li>
          <img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner2.jpg"> 
        </li>
        <li>
         <img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner3.jpg">>
        </li>
      </ul>
    </div>
	</section>

	<section class="carruselinfo">
	<div>
		<div id="one"><span>Enlace con mucho trafico</span></div><div id="two"><span>Enlace de importancia</span></div>
		<div id="tree"><span>Enlace con mayor trafico de la pagina web</span></div>
	</div>
	</section>

	<section class="main-content">

		<div class="content">
			<div class="title"><h3>Center Curabitur ullamcorper ultricies nisi nam eget <br>
				dui etiam rhoncus</h3></div>
				<i class="fa fa-minus"></i>
				<div class="subtitle">
					<span>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
					adipiscing <br> sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.</span>
				</div>
				<div class="content1">
					<div>
						<i class="fa fa-compass fa-5x"></i>
						<h5>At solmen va esser:</h5>
							<span>l desirabilite de un nov lingua franca On refusa continuar payar custosi.</span>
					</div>
					<div>
						<i class="fa fa-compass fa-5x"></i>
						<h5>At solmen va esser:</h5>
							<span>l desirabilite de un nov lingua franca On refusa continuar payar custosi.</span>
					</div>
					<div>
						<i class="fa fa-compass fa-5x"></i>
						<h5>At solmen va esser:</h5>
							<span>l desirabilite de un nov lingua franca On refusa continuar payar custosi.</span>
					</div>
				</div>
				<div class="content2">
					<div>
						<i class="fa fa-compass fa-5x"></i>
						<h5>At solmen va esser:</h5>
							<span>l desirabilite de un nov lingua franca On refusa continuar payar custosi.</span>
					</div>
					<div>
					<i class="fa fa-compass fa-5x"></i>
						<h5>At solmen va esser:</h5>
							<span>l desirabilite de un nov lingua franca On refusa continuar payar custosi.</span>
					</div>
					<div>
					<i class="fa fa-compass fa-5x"></i>
						<h5>At solmen va esser:</h5>
							<span>l desirabilite de un nov lingua franca On refusa continuar payar custosi.</span>
					</div>
				</div>
			</div>
	</section>

	<section class="contentboxs">
		<div id="box1">
			<div id="title"><h3>Nemo enim ipsam voluptatem</h3></div>
			<div id="content"><span><p>Quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni do- lores eos qui ratione voluptatem sequi nesciunt.</p>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, ad- ipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
									<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit labori- osam, nisi ut aliquid ex ea commodi consequatur</p></span>
			</div>
		</div>
		<div id="box2">
			<div>
				<p><span>Omnicos directe: </span>al desirabilite de un nov lingua franca On refusa continuar payar custosi traductores.</p>
				<p><span>At solmen va esser: </span>necessi far uniform grammatica, grammatica del resultant pronunciation e plu sommun paroles.</p>
				<p><span>Ma quande: </span>lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues.</p>
			</div>
		</div>
		<div id="box3"><img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner4.jpg"></div>
		<div id="box4">
			<i class="fa fa-heartbeat fa-5x"></i>
		</div>
		<div id="box5"><img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner2.jpg"></div>
		<div id="box6">
			<div>
			<p><span>Omnicos directe: </span>al desirabilite de un nov lingua franca On refusa continuar payar custosi traductores.</p>
			</div>
		</div>
	</section>

	<section class="contentboxs2">
		<div id="box1">
			<div>
				<i class="fa fa-medkit fa-5x"></i>
			</div>
		</div>
		<div id="box2">
			<div><p><span>Omnicos directe: </span>al desirabilite de un nov lingua franca On refusa continuar payar custosi traductores.</p></div>
		</div>
		<div id="box3"><img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner3.jpg"></div>
		<div id="box4">
				<div id="title"><h3>Nemo enim ipsam voluptatem</h3></div>
			<div id="content"><span><p>Quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni do- lores eos qui ratione voluptatem sequi nesciunt.</p>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, ad- ipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
									<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit labori- osam, nisi ut aliquid ex ea commodi consequatur</p>
									</span>
			</div>
		</div>
	</section>

	<section>
		<div class="contenttwo">
			<div class="conteninfo">
				<div id="imagetitle">
					<i class="fa fa-medkit fa-5x"></i>
				</div>
				<div id="title">
					<h3>Curabitur ullamcorper ultricies ninam eget dui etiam rhoncus.</h3>
					<p><a>Maecenas tempus</a>, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, <a>luctus pulvinar</a>, hendrerit id, lorem.<p>
				</div>
				<div id="contentbody">
				<p>Quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni doloes eos qui ratione voluptatem sequi nesciunt.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
				<br>
				<br>
				Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
				<br>
				<br>
				At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia dese- runt mollitia animi, id est laborum et dolorum fuga.Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
				<br>
				<br>
				Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit</p>
				</div>

			</div>

			<div class="slidebar">
				<p>
				Omnicos directe:
					<p>
					<a>Al desirabilite de un nov lingua franca On refusa continuar payar custosis.</a>
					</p>
					<p>
					<a>Al desirabilite de un nov lingua franca.</a>
					</p>
				</p>
			</div>
		</div>
	</section>

	<section class"imagefoot">
		<div class="carrusel"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg"></div>
	</section>


	<section class="mapaSitio">
		<div class="menu">
			<div>
				<ul class="cbp-hsmenu">
					<li><a>OPD HCG</a>
						<ul class="cbp-hssubmenu">
							<li><a><span>Delicate Wine</span></a></li>
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
						<a>Programas de coopreación internacional en investigación</a>
						<ul class="cbp-hssubmenu">
						</ul>
					</li>

					<li>
						<a>Vinculación con universidades, institutos y hospitales</a>
						<ul class="cbp-hssubmenu">
						</ul>
					</li>
					<ul>
					</div>
					<div>
						<ul class="cbp-hsmenu">
							<li>
								<a>Unidad Editorial</a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<a>Programas de generación de conocmiento cientifico</a>
								<ul class="cbp-hssubmenu">
									<li><a><span>Redacción científica</span></a></li>
									<li><a><span>Asesoría Metodológica</span></a></li>
									<li><a><span>Asesoría de corrección de estilo de redacción en español u otros idiomas</span></a></li>
									<li><a><span>Desplegar lineas de generación de conocimiento científico<span><a></li>
								</ul>
							</li>
							<li>
								<a>Programas de desarrollo tecnológico e innovación</a>
								<ul class="cbp-hssubmenu">
									<li><a><span>proINVENCI</span></a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu">
							<li>
								<a>Centro de investigación clinica medicina traslacional</a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<a>Unidades de investigación</a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<a>Formación de recursos en investigación</a>
								<ul class="cbp-hssubmenu">
									<li><a><span>Delicate Wine</span></a></li>
									<li><a><span>Programas PNCP</span></a></li>
									<li><a><span>Programas NO PNCP</span></a></li>
									<li><a><span>Programas no medicos</span></a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu">
							<li>
								<a>Convocatoria y Becas para Formar Recursos Humanos en invesitigación</a>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<a>Unidad Editorial</a>
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
