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
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <?php Yii::app()->clientScript->registerCoreScript('jquery.ui');?>
        <!-- Load JS -->
        <?php
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($baseUrl . '/js/infoboxes.js');

        ?>
        <?php Yii::app()->bootstrap->register(); ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div class="main">
            <div class="sysheader">
                <div class="headerconteiner1">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/logoHme.png alt="home">', array('site/index'));?>
                </div>
                <div class="headerconteinerC">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/Pcuenta.png alt="home">', array('site/index'));?>
                    <span>Cuenta</span>
                </div>
                <div class="headerconteinerC">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PCV-HC.png alt="home">', array('site/index'));?>
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
                <div class="headerconteinerF"></div>
                <div class="headerconteiner2"></div>
                <div class="headerconteiner3">
                    <span> Curriculum Vitae / Datos Personales</span>
                </div>
                <div class="headerconteiner4">
                    <h4>Ménu CV-HC</h4>
                </div>
                <div class="headerconteiner5">
                    <h4>Dr. Daniel Ulises García Verdín </h4>
                    <h5>Investigador</h5>
                </div>
            </div>
            <div class="syscontent">
                <div class="sysmenu">
                    <ul class="cvmenuitems">
                        <li><?php echo CHtml::link('Datos Personales',array('/curriculumVitae/personalData')); ?><hr></li>
                        <li><?php echo CHtml::link('Documentos Oficiales',array('/curriculumVitae/docsIdentity')); ?><hr></li>
                        <li><?php echo CHtml::link('Datos de Direccion Actual',array('/curriculumVitae/addresses')); ?><hr></li>
                        <li><?php echo CHtml::link('Datos Laborales',array('/curriculumVitae/jobs')); ?><hr></li>
                        <li><?php echo CHtml::link('Líneas de Investigación',array('/curriculumVitae/researchAreas')); ?><hr></li>
                        <li><?php echo CHtml::link('Datos de Contacto',array('/curriculumVitae/phones')); ?><hr></li>
                        <li><?php echo CHtml::link('Formacion Académica',array('/curriculumVitae/grades')); ?><hr></li>
                        <li><?php echo CHtml::link('Nombramientos',array('/curriculumVitae/commission')); ?></li>
                    </ul>
                </div>
                <div class="sysmaincontent">
                    <div class="syscont">
                        <div class="cvtitle">
                            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
                            <h1>Curriculum vitae electronico</h1>
                            <hr>

                        </div>
                        <div class="cvforms">
                            <?php echo $content; ?>
                        </div>
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