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
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sys.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tooltipster.css">
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <?php Yii::app()->clientScript->registerCoreScript('jquery.ui');?>
        <?php Yii::app()->bootstrap->register(); ?>
        <!-- Load JS -->
        <?php
            $baseUrl = Yii::app()->baseUrl;
            $cs = Yii::app()->getClientScript();
            $cs->registerScriptFile($baseUrl . '/js/sysAlerts.js');
            $cs->registerScriptFile($baseUrl . '/js/passorcurp.js');
            $cs->registerScriptFile($baseUrl . '/js/jquery.tooltipster.min.js');
        ?>
         <?php
            Yii::app()->clientScript->registerScript('helpers', '
            yii = {
            urls: {
                    searchbar: ' . CJSON::encode(Yii::app()->createUrl('searchBar/autoSearch?keyword=')) . ',
                    searchBarResults: ' . CJSON::encode(Yii::app()->createUrl('searchBar/searchResults?keyword=')) . ',
                    base: ' . CJSON::encode(Yii::app()->baseUrl) . '
                }
            };
            ');
        ?>
        
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script>
                            $(document).ready(function() {
                                $('input, select').tooltipster({
                                    position: 'right',
                                    trigger: 'click',
                                });

                            });
        </script>
    </head>
    <body>
        <div class="main">
            <div class="sysheader">
                <div class="headerconteiner1">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/logoHme.png alt="home">', array('site/index'));?>
                </div>
                <div class="headerconteinerC">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/Pcuenta.png alt="home">', array('account/infoAccount'));?>
                    <span>Cuenta</span>
                </div>
                <div class="headerconteinerC">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PCV-HC.png alt="home">', array('curriculumVitae/personalData'));?>
                    <span>CV-HC</span>
                </div>
                <div class="headerconteinerC">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PEvaluacionCV.png alt="home">', array('site/index'));?>
                    <span>Evalucación CV</span>
                </div>
                <div class="headerconteinerC">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PProyectos.png alt="home">', array('site/index'));?>
                    <span>Protocolos</span>
                </div>
                <div class="headerconteinerF"><?php echo "<img id='perfil' src='".Yii::app()->baseUrl.'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png'."' alt='Foto de Perfil' >";  ?></div> 
                <div class="headerconteiner2"></div>
                <div class="headerconteiner3">
                    <span> Cuenta / Datos de Cuenta</span>
                </div>
                <div class="headerconteiner4">
                    <h4>Ménu </h4>
                </div>
                <div class="headerconteiner5">
                    <h4> <?php echo Yii::app()->user->fullname; ?></h4>
                    <h5><?php echo Yii::app()->user->id_roles; ?> </h5>
                </div>
            </div>
            <div class="syscontent">
                <div class="sysmenu">
                <ul class="cvmenuitems">
                   <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'Operations',
        ));
        $this->widget('zii.widgets.CMenu', array(
            'items'=>$this->menu,
            'htmlOptions'=>array('class'=>'operations'),
        ));
        $this->endWidget();
    ?>
    </ul>
                </div>
                <div class="sysmaincontent">
                    <div class="syscont">
                        <div class="cvforms">
                            <?php echo $content; ?>
                        </div>
                    </div>
       

            </div>
        </div>
        <div class="successdiv">
        <div class="backcontainer">
                <div class="maincontainer">
                    <div class="successh2">
                        <h2>Registro con Extio</h2>
                        <hr>
                        <div class="remainder">
                            <span>El registro a sido realizado con extio.</span>
                        </div>
                        <button class="backbut"><h3>Regresar</h3></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="errordiv">
            <div class="backcontainer">
                <div class="maincontainer">
                    <div class="errorh2">
                        <h2>¡Ocurio un Error!</h2>
                        <hr>
                        <div class="remainder">
                            <span>Mensaje de lo que sucedió, favor de intentar de nuevo.</span>
                        </div>
                        <button class="errorbut"><h3>Volver a intentar</h3></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="cleandiv">
            <div class="backcontainer">
                <div class="maincontainer">
                    <div class="errorh2">
                        <h2>¡Borrar Formulario!</h2>
                        <hr>
                        <div class="remainder">
                            <span>¿Esta usted seguro de borrar los datos del formulario?</span>
                        </div>
                        <button class="cleanbut"><h3>Si.. Borrar ahora </h3></button>
                        <button class="backbut"><h3>No.. Dejarlo como esta </h3></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footermenu1">
                <h4>¿Podemos Ayudarte?</h4>
                <span> asistencia@sihci.com.mx / (52) 32.34.67.32</span>
            </div>
            <div class="footermenuI">
            </div>
            <div class="footermenuI">
                <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PEstadisticas.png alt="home">', array('site/index'));?>
                <span>Estadisticas</span>
            </div>
            <div class="footermenuI">
                <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PadministracionSistema.png alt="home">', array('site/index'));?>
                <span>Adminstración del sistema</span>
            </div>
            <div class="footermenuI">
                <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PBitacora.png alt="home">', array('site/index'));?>
                <span>Bitacora</span>
            </div>
            <div class="footermenuI logout">
                <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PCerrarCuenta.png alt="home">', array('site/logout'));?>
                <span> Cerrar sesión</span>
            </div>
        </div>
    </body>
</html>