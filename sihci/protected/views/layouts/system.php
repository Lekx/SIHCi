<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">
        <meta charset="utf-8">
        <!-- blueprint CSS framework -->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap-3.0.0/css/bootstrap.min.css" media="screen, projection">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sys.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/projects.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/owl-carousel/owl.carousel.js">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tooltipster.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.min.css">

        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <?php Yii::app()->clientScript->registerCoreScript('jquery.ui');?>

        <?php Yii::app()->bootstrap->register(); ?>
        <!-- Load JS -->
        <?php
                    $baseUrl = Yii::app()->baseUrl;
                    $cs = Yii::app()->getClientScript();
                    $cs->registerScriptFile($baseUrl . '/owl-carousel/owl.carousel.js');
                    $cs->registerScriptFile($baseUrl . '/js/sysAlerts.js');
                    $cs->registerScriptFile($baseUrl . '/js/passorcurp.js');
                    $cs->registerScriptFile($baseUrl . '/js/reCopy.js');
                    $cs->registerScriptFile($baseUrl . '/js/file.js');
                    $cs->registerScriptFile($baseUrl . '/js/jquery.tooltipster.min.js');
                    $cs->registerScriptFile($baseUrl . '/js/evaluateCV.js');
                    $cs->registerScriptFile($baseUrl . '/js/ajaxfile.js');
                    $cs->registerScriptFile($baseUrl . '/js/numbersLettersOnly.js');
                    $cs->registerScriptFile($baseUrl . '/js/projects.js');
        ?>
        <?php
                    Yii::app()->clientScript->registerScript('helpers', '
                    yii = {
                    urls: {
                            searchbar: ' . CJSON::encode(Yii::app()->createUrl('searchBar/autoSearch?keyword=')) . ',
                            searchBarResults: ' . CJSON::encode(Yii::app()->createUrl('searchBar/searchResults?keyword=')) . ',
                            base: ' . CJSON::encode(Yii::app()->baseUrl) . ',
                            back: ' . CJSON::encode(Yii::app()->baseUrl.'/index.php'.'/'.$this->uniqueid.'/admin') . ',
                            createUrl: ' . CJSON::encode(Yii::app()->createUrl('')) . ',
                            sendfile: ' . CJSON::encode(Yii::app()->createUrl('',array('id'=>(isset($_GET['id']) ? $_GET['id'] : 0)))) . ',
                        }
                    }',CClientScript::POS_HEAD);
        ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/highcharts415/highcharts.js"); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/highcharts415/modules/exporting.js"); ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script>
                                    $(document).ready(function() {
                                        $('input, select,textarea,filepicker,#BooksChapters_discipline').tooltipster({
                                            position: 'right',
                                            trigger: 'custom',
                                        })
                                        .on( 'focus', function() {
                                        $( this ).tooltipster( 'show' );
										                    $('.errorMessage').hide();
                                    })
                                        .on( 'blur', function() {
                                        $( this ).tooltipster( 'hide' );
                                    });

                                         $('.delete, .view, .update, .ttip , .highcharts-legend-item').tooltipster({
                                            position: 'top',
                                            trigger: 'hover',
                                            maxWidth:'90'
                                        });

                                        $('.ttipnot').tooltipster({
                                            position: 'top',
                                            trigger: 'hover',
                                            maxWidth:'150'
                                        });


                                    });
        </script>
    </head>
    <body>

        <div>
            <?php
                if(isset(Yii::app()->user->admin) && (int)Yii::app()->user->admin != 0 ){
                    echo "<div class='dobless'> <p>Sesion doble iniciada</p> ";
                    echo CHtml::button('Salir', array('submit' => array('/adminUsers/doubleSession', 'id'=>0,'class'=>'doblebutt')));
                    echo "</div>";
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
                        "labelEstadisticas"=>"Estadisticas",
                        "labelAdmin"=>"Administración",
                        );
                else if(Yii::app()->user->type == 'fisico')
                    $infoUser = array(
                        "label"=>"Físico",
                        "icon"=>"PCV-HC",
                        "cuentaicon"=>"Pcuenta",
                        "controller"=>"curriculumVitae/personalData",
                        "MenuEmpresa"=>"CV-HC",
                        "proyectos"=>"Proyectos",
                        "Evaluacion"=>"Evaluación CV",
                        "proyectosUrl"=>(Yii::app()->user->Rol->alias != 'USUARIO' ? "projectsReview" : "projects")."/admin",
                        "labelEstadisticas"=>"Estadisticas",
                        "labelAdmin"=>"Administración",
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
                    <?php

                      if(Yii::app()->user->Rol->id > 10)
                      {
                        $conection = Yii::app()->db;
                      $rol = Yii::app()->user->Rol->alias;

                      $condition = "WHERE p.status = '".$rol."'";

                      if($rol == "COMINV" || $rol == "COMBIO" || $rol == "COMETI")
                        $condition = "WHERE p.status LIKE '%".$rol."%'";


                        $pPro = $conection->createCommand("SELECT count(distinct p.id) AS X FROM projects AS p INNER JOIN projects_followups AS pf ON pf.id_project = p.id ".$condition)->queryAll();

                        if($pPro[0]["X"] > 0){
                          echo "<div class='notification ttipnot' title='Proyecto(s) pendientes de su aprobación'>";
                          echo $pPro[0]["X"];
                          echo "</div>";
                        }
                      }

                      ?>
                </div>
                <div class="headerconteinerF">
                    <?php
                        $filename =   Yii::app()->baseUrl.'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png';

                            echo "<img id='perfil' src='".$filename."' >";

                    ?>
                </div>

            </div>
            <div class="containerla">
                  <div class="infobar name col-md-7">

                      <?php echo Yii::app()->user->fullname; ?><br>
                         (<?php echo Yii::app()->user->Rol->name; ?>)
                         <br>

                  </div>
                  <div class="infobar type col-md-2">
                  <?php
                      echo "<h6>Perfil  :  ".$infoUser['label']."</h6>";
                  ?>
                  </div>
                  <div class="infobar logout col-md-2">
                  <?php
                      echo "<h6 id='logoutlable'>";
                      echo CHtml::link('Cerrar sesión', array('site/logout'));
                      echo "</h6>";
                  ?>
                  </div>

            </div>
            <div class="menucon">
              <div class="menucv ">
                  Menú
              </div><div class="bread">
                <?php if(isset($_GET['ide'])){
                  $ControllerB = $this->uniqueid;
                  $this->renderPartial('../adminUsers/update_user');
                }else{  ?>

                    <?php
                    switch ($this->uniqueid) {
                      case 'account':
                      $ControllerB = "Cuenta";
                      break;
                      case 'sponsors':
                      $ControllerB = "Perfil Empresa";
                      break;
                      case 'curriculumVitae':
                      $ControllerB = "Currículum vitae electrónico";
                      break;
                      case 'evaluateCV':
                      $ControllerB = "Evaluación Curricular";
                      break;
                      case 'postdegreeGraduates':
                      $ControllerB = "Gestionar graduados";
                      break;
                      case 'pressNotes':
                      $ControllerB = "Difusión de prensa";
                      break;
                      case 'knowledgeApplication':
                      $ControllerB = "Aplicación del Conocimiento";
                      break;
                      case 'patent':
                      $ControllerB = "Registro Pantente";
                      break;
                      case 'copyrights':
                      $ControllerB = "Registro derecho de autor";
                      break;
                      case 'software':
                      $ControllerB = "Registro software";
                      break;
                      case 'postdegreeGraduates':
                      $ControllerB = "Gestionar graduados";
                      break;
                      case 'articlesGuides':
                      $ControllerB = "Articulos Y Guías";
                      break;
                      case 'books':
                      $ControllerB = "Libros";
                      break;
                      case 'booksChapters':
                      $ControllerB = "Capítulo de Libros";
                      break;
                      case 'congresses':
                      $ControllerB = "Participacíon en congresos";
                      break;
                      case 'directedThesis':
                      $ControllerB = "Tesis Dirigidas";
                      break;
                      case 'certifications':
                      $ControllerB = "Certificaciones por consejos";
                      break;
                      case 'languages':
                      $ControllerB = "Idiomas";
                      break;
                      case 'charts':
                      $ControllerB = "Estadisticas";
                      break;
                      case 'tables':
                      $ControllerB = "Estadisticas";
                      break;
                      case 'sponsorship':
                      $ControllerB = "Patrocinios";
                      break;
                      case 'sponsorShip':
                      $ControllerB = "Patrocinios";
                      break;
                      case 'adminUsers':
                      $ControllerB = "Gestión de usuarios";
                      break;
                      case 'FilesManager':
                      $ControllerB = "Gestión de archivos";
                      break;
                      case 'adminProjects':
                      $ControllerB = "Gestión de proyectos";
                      break;
                      case 'adminBackups':
                      $ControllerB = "Respaldos";
                      break;
                      case 'adminSpecialtyAreas':
                      $ControllerB = "Gestión de Áreas de especialidad";
                      break;
                      case 'adminResearchAreas':
                      $ControllerB = "Gestión de Áreas de investigación";
                      break;
                      case 'projectsReview':
                      $ControllerB = "Gestión de proyectos";
                      break;
                      case 'projectsfollowups':
                      $ControllerB = "Seguimientos del Proyecto";
                      break;

                      default:
                      $ControllerB = "None";
                      break;
                    }

                      switch ($this->action->Id) {
                        case 'admin':
                        $action = "Gestionar";
                        break;
                        case 'create':
                        $action = "Crear";
                        break;
                        case 'update':
                        $action = "Modificar";
                        break;
                        case 'infoAccount':
                        $action = "Datos de Cuenta";
                        break;
                        case 'systemLog':
                        $action = "Bitacora";
                        break;
                        case 'personalData':
                        $action = "Datos Personales";
                        break;
                        case 'docsIdentity':
                        $action = "Documentos Oficiales";
                        break;
                        case 'addresses':
                        $action = "Datos de dirección actual";
                        break;
                        case 'jobs':
                        $action = "Datos laborales";
                        break;
                        case 'researchAreas':
                        $action = "Lineas de Investigación";
                        break;
                        case 'phones':
                        $action = "Datos de Contacto";
                        break;
                        case 'grades':
                        $action = "Formación Académica";
                        break;
                        case 'commission':
                        $action = "Nombramientos";
                        break;
                        case 'totalRegisteredResearchers':
                        $action = "Investigadores registrados en el sistema";
                        break;
                        case 'projectsTotal':
                        $action = "Proyectos registrados en el sistema";
                        break;
                        case 'booksTotal':
                        $action = "Libros registrados en el sistema";
                        break;
                        case 'chaptersTotal':
                        $action = "Capítulos de libros registrados en el sistema";
                        break;
                        case 'articlesGuides_':
                        $action = "Aritculos y guías registrados en el sistema";
                        break;
                        case 'researchers':
                        $action = "Cantidad de Investigadores";
                        break;
                        case 'projects':
                        $action = "Proyectos de Investigación";
                        break;
                        case 'books':
                        $action = "Libros";
                        break;
                        case 'chapters':
                        $action = "Capítulo de Libros";
                        break;
                        case 'patents':
                        $action = "Registro de propiedad intelectual patentes";
                        break;
                        case 'software':
                        $action = "Registro de propiedad intelectual software";
                        break;
                        case 'copyrights':
                        $action = "Registro de propiedad intelectual derechos de autor";
                        break;
                        case 'articlesGuides':
                        $action = "Artículos y Guías";
                        break;
                        case 'sponsorsInfo':
                        $action = "Datos Empresa";
                        break;
                        case 'create_docs':
                        $action = "Documentos Probatorios";
                        break;
                        case 'create_persons':
                        $action = "Datos de Representante";
                        break;
                        case 'create_billing':
                        $action = "Datos de Facturación";
                        break;
                        case 'create_contact':
                        $action = "Datos de Contacto";
                        break;
                        case 'create_contacts':
                        $action = "Datos de Contactos";
                        break;


                        default:
                        $action = " ";
                        break;
                      }
                     echo $ControllerB; ?> / <?php echo $action;

                      ?>

                  </div>
                    <?php } ?>

            </div>


            </div>
            <div class="syscontent">
                <div class="adminmenu">
                    <div><?php echo CHtml::link('Gestión de Archivos', array('FilesManager/admin'));?></div>
                    <div><?php echo CHtml::link('Gestión de usuarios', array('adminUsers/'));?></div>
                    <div><?php echo CHtml::link('Gestión de proyectos', array('adminProjects/'));?></div>
                    <div><?php echo CHtml::link('Respaldos', array('adminBackups/'));?></div>
                    <div><?php echo CHtml::link('Áreas de especialidad', array('adminSpecialtyAreas/admin'));?></div>
                    <div><?php echo CHtml::link('Lineas de Investigación', array('adminResearchAreas/admin'));?></div>
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
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cancelar <?=$ControllerB ?> </h4>
                  </div>
                  <div class="modal-body">
            		  ¿Estas Seguro de Cancelar Este Registro?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No, quedarme donde estoy</button>
                    <button type="button" class="btn btn-default deleter">Si</button>
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
                                <span>El registro a sido realizado con éxito.</span>
                            </div>
                            <button class="backbut" onclic="redirect()"><h3>Regresar</h3></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="errordiv">
                <div class="backcontainer">
                    <div class="maincontainer">
                        <div class="errorh2">
                            <h2>¡Ocurió un Error!</h2>
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
            <div class="loader">
              <div class="pulse">

				</div>
				<div class="heart">
				<i class="fa fa-heart fa-5x"></i></div>
            </div>
            <div class="footer">
                <div class="footermenu1">
                    <h4>¿Podemos Ayudarte?</h4>
                    <span> asistencia@sihci.com.mx / (52) 32.34.67.32</span>
                </div>
                <div class="footermenuI">

                  <?php
                   if($this->action->Id == "create" || $this->action->Id == "update" || $this->action->Id == "view")
                    {
                      echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/Iconsvg/Perfil/Salir.svg alt="home">', array('admin'));
                      echo "<span>Regresar al listado</span>";
                    }

                   ?>

                </div>
                <div class="footermenuI">
                    <?php if($infoUser['labelEstadisticas'] == "")
                                            echo "";
                                        else
                    echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PEstadisticas.png alt="home">', array('Charts/index'));?>
                    <span><?php echo $infoUser['labelEstadisticas'] ?></span>
                </div>
                <div class="footermenuI">
                    <?php
                                        if($infoUser['labelAdmin'] == "")
                                            echo "";
                                        else
                    echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PAdministracionSistema.png alt="home">', array('adminUsers/index'));?>
                    <span><?php echo $infoUser['labelAdmin'] ?></span>
                </div>
                <div class="footermenuI">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PBitacora.png alt="home">', array('account/systemLog'));?>
                    <span>Bitácora</span>
                </div>
                <div class="footermenuI logout">
                    <?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/CVmenu/PCerrarCuenta.png alt="home">', array('site/logout'));?>
                    <span>Cerrar sesión</span>
                </div>
            </div>
        </body>
    </html>
