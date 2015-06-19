<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">
        <meta charset="utf-8">
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
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css">
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
                    $cs->registerScriptFile($baseUrl . '/js/reCopy.js');
                    $cs->registerScriptFile($baseUrl . '/js/file.js');
                    $cs->registerScriptFile($baseUrl . '/js/jquery.tooltipster.min.js');
                    $cs->registerScriptFile($baseUrl . '/js/evaluateCV.js');
        ?>
        <?php
                    Yii::app()->clientScript->registerScript('helpers', '
                    yii = {
                    urls: {
                            searchbar: ' . CJSON::encode(Yii::app()->createUrl('searchBar/autoSearch?keyword=')) . ',
                            searchBarResults: ' . CJSON::encode(Yii::app()->createUrl('searchBar/searchResults?keyword=')) . ',
                            base: ' . CJSON::encode(Yii::app()->baseUrl) . ',
                            back: ' . CJSON::encode(Yii::app()->baseUrl.'/index.php'.'/'.$this->uniqueid.'/admin') . ',
                        }
                    }',CClientScript::POS_HEAD);
        ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/highcharts415/highcharts.js"); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/highcharts415/modules/exporting.js"); ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script>
                                    $(document).ready(function() {
                                        $('input, select,textarea,filepicker').tooltipster({
                                            position: 'right',
                                            trigger: 'custom',
                                        })
                                        .on( 'focus', function() {
                                        $( this ).tooltipster( 'show' );
                                    })
                                        .on( 'blur', function() {
                                        $( this ).tooltipster( 'hide' );
                                    });
                                    });
        </script>
    </head>
    <body>

        <div>
            <?php 
                if(isset(Yii::app()->user->admin) && (int)Yii::app()->user->admin != 0 ){ 
                    echo "Sesion doble iniciada | ";
                    echo CHtml::button('Salir', array('submit' => array('/adminUsers/doubleSession', 'id'=>0)));
                }


            ?>
        </div>
        <?php
                if(Yii::app()->user->type == 'moral')
                    $infoUser = array(
                        "label"=>"Moral",
                        "icon"=>"PerfilEmpresa",
                        "cuentaicon"=>"CuentaEmpresa",
                        "controller"=>"sponsors/sponsorsInfo",
                        "MenuEmpresa"=>"Perfil Empresa",
                        "proyectos"=>"Proyectos",
                        "Evaluacion"=>"Evaluación",
                        "proyectosUrl"=>"sponsorShip/admin",
                        "labelEstadisticas"=>"",
                        "labelAdmin"=>"",
                        );
                else if(Yii::app()->user->type == 'fisico')
                    $infoUser = array(
                        "label"=>"Fisico",
                        "icon"=>"PCV-HC",
                        "cuentaicon"=>"Pcuenta",
                        "controller"=>"curriculumVitae/personalData",
                        "MenuEmpresa"=>"CV-HC",
                        "proyectos"=>"Proyectos",
                        "Evaluacion"=>"Evaluación CV",
                        "proyectosUrl"=>"projects/admin",
                        "labelEstadisticas"=>"",
                        "labelAdmin"=>"",
                        );
                else
                    $infoUser = array(
                    "label"=>"Administrador",
                    "icon"=>"PCV-HC",
                    "cuentaicon"=>"Pcuenta",
                    "controller"=>"curriculumVitae/personalData",
                    "MenuEmpresa"=>"CV-HC",
                    "proyectos"=>"Proyectos",
                    "Evaluacion"=>"Evaluación CV",
                    "proyectosUrl"=>"projects/admin",
                    );
        ?>
        <div class="main">
            <div class="sysheader">
                <div class="headerconteiner1">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/logoHme.png alt="home">', array('site/index'));?>
                </div>
                <div class="headerconteinerC">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/'.$infoUser['cuentaicon'].'.png alt="home">', array('account/infoAccount'));?>
                    <span>Cuenta</span>
                </div>
                <div class="headerconteinerC">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/'.$infoUser['icon'].'.png alt="home">', array($infoUser['controller']) );?>
                    <span><?php echo $infoUser['MenuEmpresa']; ?></span>
                </div>
                <div class="headerconteinerC">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PEvaluacionCV.png alt="home">', array('EvaluateCV/index'));?>
                    <span><?php echo $infoUser['Evaluacion']; ?></span>
                </div>
                <div class="headerconteinerC">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PProyectos.png alt="home">', array($infoUser['proyectosUrl']));?>
                    <span><?php echo $infoUser['proyectos']; ?></span>
                </div>
                <div class="headerconteinerF">
                    <?php
                                    $filename =  Yii::app()->baseUrl.'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png';
                                    if (file_exists ( $filename ))
                                        echo "<img id='perfil' src='".$filename."' >";
                    ?>
                </div>
                <div class="headerconteiner3">
                    <div class="fullnamed"><h5>
                        <?php echo Yii::app()->user->fullname; ?>
                    </h5></div>

                    <div class="typelabe">
                        <?php
                            echo "<h6>".$infoUser['label']."</h6>";
                        ?>
                    </div>
                    <div class="logoutbars">
                        <?php
                            echo "<h6 id='logoutlable'>";
                            echo CHtml::link('Cerrar sesión', array('site/logout'));
                            echo "</h6>";
                        ?>
                    </div>
                </div>
                <div class="headerconteiner4">
                    <h4>Menú </h4>
                </div>
                <div class="headerconteiner5">
                    <span> <?php echo $this->uniqueid; ?> / <?php echo $this->action->Id; ?> </span>
                </div>
            </div>
            <div class="syscontent">
                <div class="adminmenu">
                    <div><a href="">Manejador de Archivos</a></div>
                    <div><a href="">Gestión de usuarios</a></div>
                    <div><a href="">Gestión de proyectos</a></div>
                    <div><a href="">Respaldos</a></div>
                    <div><a href="">Areas de especialidad</a></div>
                    <div><a href="">Lineas de Investigación</a></div>
                </div>
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
                            <h2>Registro con éxito</h2>
                            <hr>
                            <div class="remainder">
                                <span>El registro a sido realizado con éxtio.</span>
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
                                <span>Corrija el error y favor de intentar de nuevo.</span>
                            </div>
                            <button class="errorbut"><h3>Volver a intentar</h3></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="abortdiv">
                <div class="backcontainer">
                    <div class="maincontainer">
                        <div class="errorh2">
                            <h2>¿Seguro que quieres cancelar?</h2>
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
                    <?php if($infoUser['labelEstadisticas'] == "")
                                            echo "";
                                        else
                    echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PEstadisticas.png alt="home">', array('site/index'));?>
                    <span><?php echo $infoUser['labelEstadisticas'] ?></span>
                </div>
                <div class="footermenuI">
                    <?php
                                        if($infoUser['labelAdmin'] == "")
                                            echo "";
                                        else
                    echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PadministracionSistema.png alt="home">', array('site/index'));?>
                    <span><?php echo $infoUser['labelAdmin'] ?></span>
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