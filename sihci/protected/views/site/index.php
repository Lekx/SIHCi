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
                 	<div id="headerlogo"><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/logoHch.png" alt=""></a></div>

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
		<div class="logo"><a href=""><img id="logohme"src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/logoHme.png" alt="home"></a></div>
		<div class="logosub"></div>
		<div class="logoinfo"><span>Ivestigadores:</span><span>Vidas Cambiadas</span><span>Ivestigaciones</span><span>Libros y Revistas</span></div>
		<div class="logonum"><h4>1,456</h4><h4>1,923,456</h4><h4>17,296</h4><h4>3,163</h4></div>
	</section>

	<section class="logsection">
		<div class="login"><a href=""><img id="logocuentas"src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/cuentaIngresar.png" alt=""></a>
		Ingresar a tu cuenta</div>
		<div class="singin"><a href=""><img id="logocuentas"src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/cuentaCrear.png" alt=""></a>
		Crear una cuenta</div>
		<div class="searchbar">
			<form>

				<button id="show_hidemenu" type="button">
				<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/menuGr.png" alt="">
					Menu
				</button>

				<input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1">

				<button id="search" type="button">
					<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/menuBuscarGr.png" alt="">
					Buscar
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
		<div id="one"><span><a href="">Unidades de investigación</a></span></div><div id="two"><span><a href="">Laboratorios de investigación</a></span></div>
		<div id="tree"><span><a href="">Vinculación con universidades, institutos y hospitales</a></span></div>
	</div>
	</section>

	<section class="main-content">

		<div class="content">
			<div class="title"><h3>Sistema de Gestión y Administración de Protocolos de Investigación Médica en el Hospital Civil</h3></div>
				<i class="fa fa-minus"></i>
				<div class="subtitle">
					<span>El SIHCi es un proyecto institucional que busca modernizar los procesos de registro, evaluación y seguimiento de proyectos de investigación
					<br>, con el fin de establecer mejoras importantes en la calidad que el OPD Hospital Civil de Guadalajara ofrece a su comunidad y al público en general.</span>
				</div>
				<div class="content1">
					<div>
				<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Comités.png" alt="">
						<br>
						<br>
						<h5>Cómites</h5>	
					</div>
					<div>
							<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
						<h5>Programas de desarrollo tecnológico e innovación<br></h5>	
					</div>
					<div>
							<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/CentroIInvestigacionClinica.png" alt="">
						<h5>Centro de investigación clinica y medicina traslacional</h5>
					</div>
				</div>
				<div class="content2">
					<div>
							<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/RedaccionCientifica.png" alt="">
						<h5>Revistas cientificas<br><br></h5>
					</div>
					<div>
					<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/TramitesServicios.png" alt="">
						<h5>Unidad editorial<br><br></h5>
					</div>
					<div>
						<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/VinculaciónUniversidadesInstitutosHospitales.png" alt="">
						<h5>Vinculación con Universidades, Institutos y Hospitales</h5>
				</div>
			</div>
	</section>

	<section class="contentboxs">
		<div id="box1">
			<div id="title">
			<h3>CVE-HC</h3>
			</div>
			<div id="content"><span><p>Quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni do- lores eos qui ratione voluptatem sequi nesciunt.</p>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, ad- ipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
									<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit labori- osam, nisi ut aliquid ex ea commodi consequatur</p></span>
			</div>
		</div>
		<div id="box2">
			<div>
				<h5>Publicaciones cientificas:</h5>
				<p><span>Hipócrates Revista Médica:</span> Revista médica de divulgación académica con orientación clínica.</p>
				<p><span>Archivos en Pediatría: </span>Forma parte de las 5 mejores revistas editadas en México.</p>
				<p><span>Tracto Genital Inferior: </span>Revista científica que pretende difundir información consistente, multidisciplinaria y de vanguardia.</p>
			</div>
		</div>
		<div id="box3"><img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner4.jpg"></div>
		<div id="box4">
		<br>
			<a href=""><img id="contentimg1"src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconBlanco/01.png" alt=""></a>
			<h6>Programas de generación de conocimento</h6>
		</div>
		<div id="box5"><img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner2.jpg"></div>
		<div id="box6">
			<div>
			<p><span><h6>Estadisticas</h6> </span>Información estadistica relacionada con el sitio.</p>
			</div>
		</div>
	</section>

	<section class="contentboxs2">
		<div id="box1">
			<div>
				<a href=""><img id="contentimg"src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconBlanco/02.png" alt=""></a>
				<h6>Registro de proyectos de investigación del OPD HCG</h6>
			</div>
		</div>
		<div id="box2">
			<div><p><span><h6>SIHCi</h6></span>Sistema de investigación del hospital Civil de Guadalajara. </p></div>
		</div>
		<div id="box3"><img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner3.jpg"></div>
		<div id="box4">
				<div id="title"><h3>Programas de generacion de conocimiento cientifico:</h3></div>
			<div id="content"><span>La generación de conocimiento es un bien en sí mismo: las sociedades más desarrolladas del mundo reconocen la importancia del conocimiento científico y dedican recursos humanos y financieros para impulsar esta actividad. Tradicionalmente, los investigadores realizan estudios que generan conocimiento científico nuevo; éste es comunicado a través presentaciones en congresos y reuniones científicas, y es difundido, en una proporción variable, en publicaciones científicas que usualmente “leen” otros investigadores para realizar más estudios y generar más conocimiento, y así sucesivamente </span>
			</div>
		</div>
	</section>

	<section>
		<div class="contenttwo">
			<div class="conteninfo">
				<div id="imagetitle">
					<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
				</div>
				<div id="title">
					<h3>¿Qué es el Hospital Civil de Guadalajara?</h3>
					<p><a href="">¿Quiénes somos?</a>, Es un Organismo Público Descentralizado de la administración pública estatal, con personalidad jurídica y patrimonio propios; conformado por dos Unidades Hospitalarias: <p>
				</div>
				<div id="contentbody">
				<ul>
					<li>Antiguo Hospital Civil de Guadalajara “Fray Antonio Alcalde” </li>
					<li>Nuevo Hospital Civil de Guadalajara “Dr. Juan I. Menchaca” </li>
				</ul>
				<p>Líneas estrégicas:</p>
				<ul>
					<li>Transformar la administración hospitalaria basada en procesos.</li>
					<li>Alcanzar un pleno desarrollo profesional y humano de profesionales en salud.</li>
					<li>Establecer una Cultura enfocada hacia la Calidad y Seguridad Institucional.</li>
					<li>Desarrollar la investigación operativa en procesos de salud.</li>
					<li>Establecer sistema único e integral de información</li>
					<li>Lograr más y mejor comunicación.</li>
					<li>Implementar un sistema de financiamiento efectivo.</li>
					<li>Modernización, hacia un Hospital de Vanguardia.</li>
					<li>Internacionalización Institucional a través de Convenios e intercambios de capacitación, investigación y programas de alto impacto social con Instituciones nacionales e Internacionales reconocidas. </li>
					<li>Implementación de un sistema de participación activa del usuario externo en los programas asistenciales.</li>
				</ul>

				<p>Misión</p>
				<p>Brindar servicios integrales de salud hospitalaria de segundo y tercer nivel, fundamentalmente a la población que no pertenece a ningún régimen de seguridad social, buscando en la prestación de servicios la generación de conocimientos y la formación de recursos humanos de excelencia en las ciencias de la salud.</p>
				<p>Visión:</p>
				<p>Conformarse en un centro asistencial de referencia hospitalaria de segundo y tercer nivel, otorgando servicios de salud oportunos, con calidad y eficiencia. Ser Hospital-Escuela líder y de vanguardia en la Enseñanza e Investigación que impulse en nuestro Estado una nueva cultura para la salud. </p>
				</div>

			</div>

			<div class="slidebar">
			
			<p>Principales objetivos:</p>
				<ul>
					<a href=""><li>Prestar servicios de salud a la población sin protección de seguridad social.</li></a>
					<br>
					<a href=""><li>Fungir como Hospital-Escuela de la Universidad de Guadalajara para las funciones de docencia, investigación y extensión en el área de Salud. </li></a>
				</ul>
			</div>
		</div>
	</section>

	<section class"imagefoot">
		<div class="carrusel">
			<img  id="back" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg">
			<div class="opcity"></div>
			<a href=""><img id="logohmeb"src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/logoHmeBlanco.png" alt="home"></a>
			<div class="textfont">
			<h2 id="textfont">Sistema de Gestión y administración de Protocolos de Inestigación Médica en el Hospital Civil.</h2>
			</div>
			</div>
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
				<div class="loginfot"><a href=""><img id="logocuentas"src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/cuentaIngresar.png" alt=""></a>
				Ingresar a tu cuenta</div>
				<div class="singinfot"><a href=""><img id="logocuentas"src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/cuentaCrear.png" alt=""></a>
				Crear una cuenta</div>
			</section>

	</body>
	</html>