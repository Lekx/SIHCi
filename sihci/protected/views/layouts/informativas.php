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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/informativas.css">
	
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
	
<script type="text/javascript">
	$(document).ready(function(){
		var searchKey = "";
	    $(".searchBarMain").keypress(function() {
	       // var imgId = String($(this).parent().attr('id)).split('_')[1]; //obtain img ID
	       searchKey = $(this).val();
	       
	       if(searchKey.length > 1){
		        $.ajax({
		           url: "<?php echo Yii::app()->createUrl('searchBar/autoSearch?keyword='); ?>"+searchKey,
		           type : 'POST',
		       	 /*data: {
		               keyword: searchKey
		           },*/
		           success: function(data) {
		                $("#searchBarResults").show();
		                $('#searchBarResults').html(data);
		            },
		        }).done({
		            //alert('Success!');
		        }).fail({
		            //alert('fail :(');
		        });
			}
		});
   		$(".searchButton").click(function() {
			window.location = "http://localhost/SIHCi/sihci/index.php/searchBar/searchResults?keyword=" + searchKey;
		});
	});
</script>


</head>
<body>
	<section>
		<div class="slidingDiv">
			<div class="menu">
			<div>
				<ul class="cbp-hsmenu1">
					<li><span><h6>OPD HCG</h6></span>
						<ul class="cbp-hssubmenu1">
							<li><?php echo CHtml::link('Direccion General',array('InformacionDeDireccionGeneral/index')); ?></li>
							<li><?php echo CHtml::link('Organigrama',array('Organigrama/index')); ?></li>
							<li><?php echo CHtml::link('Normatividad de investigación',array('NormatividadDeInvestigacion/index')); ?></li>
							<li><?php echo CHtml::link('Registro RENIECYT',array('RegistroReniecyt/index')); ?></li>
							<li><?php echo CHtml::link('Transparencia',array('desplegarTransparencia/index')); ?></li>
							<li><?php echo CHtml::link('Comités',array('unidadHospitalariaJimComiteDeEtica/index')); ?></li>
							<li><?php echo CHtml::link('Plano de ubicación SGEI OPD',array('planoDeUbicacionDeMapaDeOficinaSGEIOPD/index')); ?></li>
						</ul>
					</li>
					<li>
					<h6><?php echo CHtml::link('CVE-HC',array('site/index')); ?></h6>
						<ul class="cbp-hssubmenu1">
						</ul>
					</li>
					<li>
					<span><h6>Centro de Investigación Clínica</h6></span>
						<ul class="cbp-hssubmenu1">
						<li><?php echo CHtml::link('Lineas de investigación',array('desplegarLineasDeInvestigacion/index')); ?></li>
						<li><?php echo CHtml::link('Protocolos patrocinados por la industria Farmacéutica',array('Site/index')); ?></li>
						<li><?php echo CHtml::link('Living Labs-Salud',array('livinglabssalud/index')); ?></li>
						</ul>
					</li>
					<li>
					<h6><?php echo CHtml::link('FInEHC',array('finehc/index')); ?></h6>
						<ul class="cbp-hssubmenu1">
						</ul>
					</li>
					<ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
							<h6><?php echo CHtml::link('Sub-Dirección General de enseñanza e investigación',array('informacionDeSubdireccionGeneralDeEnsenanzaEInvestigacion/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('HCG Fray Antonio Alcalde',array('subdireccionDeEnsenanzaEInvestigacion/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('HCG DR. Juan I. Menchaca',array('unidadHospitalariaJIMSubdireccionDeEnsenanzaEInvestigacion/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<span><h6>Programa de formación de recursos humanos en investigación</h6></span>
								<ul class="cbp-hssubmenu1">
									<li><?php echo CHtml::link('Programas PNCP',array('Site/index')); ?></li>
									<li><?php echo CHtml::link('Programas NO PNCP',array('Site/index')); ?></li>
								</ul>
							</li>
							<li>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
							<h6><?php echo CHtml::link('ProInvenhci',array('desplegarProINVENHCI/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
							<h6><?php echo CHtml::link('ProDIME',array('proDIME/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<h6><span>Programas de generación de conocimiento</span></h6>
								<ul class="cbp-hssubmenu1">
								<li><?php echo CHtml::link('Redacción Científicas',array('redaccionCientifica/index')); ?></li>
								<li><?php echo CHtml::link('Lineas de generación de conmiento científico',array('generacionDeConocimientoCientifico/index')); ?></li>
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('Programas de coperación internacional en investigación',array('desplegarInformacion/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('Vinculación con universidades, institutos y hospitales',array('vinculacionConUniversidadInstitutosHospitales/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('Revistas científicas',array('site/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('Unidad Editorial',array('site/index')); ?></h6>
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
					<li><span><h6>OPD HCG</h6></span>
						<ul class="cbp-hssubmenu1">
							<li><?php echo CHtml::link('Direccion General',array('InformacionDeDireccionGeneral/index')); ?></li>
							<li><?php echo CHtml::link('Organigrama',array('Organigrama/index')); ?></li>
							<li><?php echo CHtml::link('Normatividad de investigación',array('NormatividadDeInvestigacion/index')); ?></li>
							<li><?php echo CHtml::link('Registro RENIECYT',array('RegistroReniecyt/index')); ?></li>
							<li><?php echo CHtml::link('Transparencia',array('desplegarTransparencia/index')); ?></li>
							<li><?php echo CHtml::link('Comités',array('unidadHospitalariaJimComiteDeEtica/index')); ?></li>
							<li><?php echo CHtml::link('Plano de ubicación SGEI OPD',array('planoDeUbicacionDeMapaDeOficinaSGEIOPD/index')); ?></li>
						</ul>
					</li>
					<li>
					<h6><?php echo CHtml::link('CVE-HC',array('site/index')); ?></h6>
						<ul class="cbp-hssubmenu1">
						</ul>
					</li>
					<li>
					<span><h6>Centro de Investigación Clínica</h6></span>
						<ul class="cbp-hssubmenu1">
						<li><?php echo CHtml::link('Lineas de investigación',array('desplegarLineasDeInvestigacion/index')); ?></li>
						<li><?php echo CHtml::link('Protocolos patrocinados por la industria Farmacéutica',array('Site/index')); ?></li>
						<li><?php echo CHtml::link('Living Labs-Salud',array('livinglabssalud/index')); ?></li>
						</ul>
					</li>
					<li>
					<h6><?php echo CHtml::link('FInEHC',array('finehc/index')); ?></h6>
						<ul class="cbp-hssubmenu1">
						</ul>
					</li>
					<ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
							<h6><?php echo CHtml::link('Sub-Dirección General de enseñanza e investigación',array('informacionDeSubdireccionGeneralDeEnsenanzaEInvestigacion/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('HCG Fray Antonio Alcalde',array('subdireccionDeEnsenanzaEInvestigacion/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('HCG DR. Juan I. Menchaca',array('unidadHospitalariaJIMSubdireccionDeEnsenanzaEInvestigacion/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<span><h6>Programa de formación de recursos humanos en investigación</h6></span>
								<ul class="cbp-hssubmenu1">
									<li><?php echo CHtml::link('Programas PNCP',array('Site/index')); ?></li>
									<li><?php echo CHtml::link('Programas NO PNCP',array('Site/index')); ?></li>
								</ul>
							</li>
							<li>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
							<h6><?php echo CHtml::link('ProInvenhci',array('desplegarProINVENHCI/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
							<h6><?php echo CHtml::link('ProDIME',array('proDIME/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu1">
							<li>
								<h6><span>Programas de generación de conocimiento</span></h6>
								<ul class="cbp-hssubmenu1">
								<li><?php echo CHtml::link('Redacción Científicas',array('redaccionCientifica/index')); ?></li>
								<li><?php echo CHtml::link('Lineas de generación de conmiento científico',array('generacionDeConocimientoCientifico/index')); ?></li>
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('Programas de coperación internacional en investigación',array('desplegarInformacion/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('Vinculación con universidades, institutos y hospitales',array('vinculacionConUniversidadInstitutosHospitales/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('Revistas científicas',array('site/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('Unidad Editorial',array('site/index')); ?></h6>
								<ul class="cbp-hssubmenu1">
								</ul>
							</li>

						</ul>
					</div>
			</div>
		</div>
             <div id="header-content-container">
                 <div id="header-content">
                 	<div id="headerlogo"><?php echo CHtml::link('<img id="" src='.Yii::app()->request->baseUrl.'/img/icons/logoHme.png alt="home">',array('site/index')); ?></div>
	                 	<div id="hsearch">
		                 	<div id="headermenu">
		                 		<button id="show_hidemenu2" type="button" class="">
		                 			<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/menuCh.png" alt="">
		                 		</button>
		                 	 </div>
		                 	<div id="headersearch"><input type="search" id="searchbartop" class="searchBarMain" placeholder="Buscar"></div>
		                 	<div id="hsearchbutton">
		                 		<button id="" type="button">
		                 			<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/menuBuscarCh.png" alt="">
		                 		</button>
		                 	</div>
		                 	

	                 	</div>
                 </div>
            </div>
    </section>

	<section class="logosection">
		<div class="logo"><?php echo CHtml::link('<img id="logohme" src='.Yii::app()->request->baseUrl.'/img/icons/logoHme.png alt="home">',array('site/index')); ?></a></div>
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
			

				<button type="button" id="show_hidemenu">
				<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/menuGr.png" alt="">
					Menu
				</button>

				<input type="text" id="searchBarMain1" class="form-control searchBarMain" placeholder="Search" aria-describedby="basic-addon1">

				<button id="search" type="button" class="searchButton">

					<img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/menuBuscarGr.png" alt="">
					Buscar
				</button>
		</div>
		<div id="searchBarResults">estoy bien escondido</div>
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
					<li><span><h6>OPD HCG</h6></span>
						<ul class="cbp-hssubmenu">
							<li><?php echo CHtml::link('Direccion General',array('InformacionDeDireccionGeneral/index')); ?></li>
							<li><?php echo CHtml::link('Organigrama',array('Organigrama/index')); ?></li>
							<li><?php echo CHtml::link('Normatividad de investigación',array('NormatividadDeInvestigacion/index')); ?></li>
							<li><?php echo CHtml::link('Registro RENIECYT',array('RegistroReniecyt/index')); ?></li>
							<li><?php echo CHtml::link('Transparencia',array('desplegarTransparencia/index')); ?></li>
							<li><?php echo CHtml::link('Comités',array('unidadHospitalariaJimComiteDeEtica/index')); ?></li>
							<li><?php echo CHtml::link('Plano de ubicación SGEI OPD',array('planoDeUbicacionDeMapaDeOficinaSGEIOPD/index')); ?></li>
						</ul>
					</li>
					<li>
					<h6><?php echo CHtml::link('CVE-HC',array('site/index')); ?></h6>
						<ul class="cbp-hssubmenu">
						</ul>
					</li>
					<li>
						<span><h6>Centro de Investigación Clínica</h6></span>
						<ul class="cbp-hssubmenu">
						<li><?php echo CHtml::link('Lineas de investigación',array('desplegarLineasDeInvestigacion/index')); ?></li>
						<li><?php echo CHtml::link('Protocolos patrocinados por la industrias Farmacéutica',array('Site/index')); ?></li>
						<li><?php echo CHtml::link('Living Labs-Salud',array('livinglabssalud/index')); ?></li>
						</ul>
					</li>
					<li>
					<h6><?php echo CHtml::link('FInEHC',array('finehc/index')); ?></h6>
						<ul class="cbp-hssubmenu">
						</ul>
					</li>
					<ul>
					</div>
					<div>
						<ul class="cbp-hsmenu">
							<li>
							<h6><?php echo CHtml::link('Sub-Dirección General de enseñanza e investigación',array('informacionDeSubdireccionGeneralDeEnsenanzaEInvestigacion/index')); ?></h6>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('HCG Fray Antonio Alcalde',array('subdireccionDeEnsenanzaEInvestigacion/index')); ?></h6>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('HCG DR. Juan I. Menchaca',array('unidadHospitalariaJIMSubdireccionDeEnsenanzaEInvestigacion/index')); ?></h6>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu">
							<li>
							<span><h6>Programa de formación de recursos humanos en investigación</h6></span>
								<ul class="cbp-hssubmenu">
									<li><?php echo CHtml::link('Programas PNCP',array('Site/index')); ?></li>
									<li><?phttp://localhost/~dan/SIHCi/sihci/index.php/site/indexhp echo CHtml::link('Programas NO PNCP',array('Site/index')); ?></li>
								</ul>
							</li>
							<li>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
							<h6><?php echo CHtml::link('ProInvenhci',array('desplegarProINVENHCI/index')); ?></h6>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
							<h6><?php echo CHtml::link('ProDIME',array('proDIME/index')); ?></h6>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
						</ul>
					</div>
					<div>
						<ul class="cbp-hsmenu">
							<li>
								<h6><span>Programas de generación de conocimiento</span></h6>
								<ul class="cbp-hssubmenu">
								<li><?php echo CHtml::link('Redacción Científicas',array('redaccionCientifica/index')); ?></li>
								<li><?php echo CHtml::link('Lineas de generación de conmiento científico',array('generacionDeConocimientoCientifico/index')); ?></li>
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('Programas de coperación internacional en investigación',array('desplegarInformacion/index')); ?></h6>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('Vinculación con universidades, institutos y hospitales',array('vinculacionConUniversidadInstitutosHospitales/index')); ?></h6>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('Revistas científicas',array('site/index')); ?></h6>
								<ul class="cbp-hssubmenu">
								</ul>
							</li>
							<li>
								<h6><?php echo CHtml::link('Unidad Editorial',array('site/index')); ?></h6>
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