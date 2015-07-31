<!-- UN01- Unidad Editorial -->
<?php
/* @var $this SiteController */
/* @var $error array 
$this->pageTitle=Yii::app()->name . ' - Programas de cooperación internacional en investigación';
$this->breadcrumbs=array(
'Programas de cooperación internacional en investigación',
);*/
?>
<section class="informativa">
    <section class="column-center">
         <div class="titleinfo">
        <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
        <h2>Unidad Editorial de Medios Impresos y Electronicos</h2>
        <hr>
        </div>
           <div class="generalinformation">
             <h4>Presentación</h4>
    <p>Unidad Editorial, es una figura orgánica perteneciente al OPD Hospital Civil de Guadalajara. Esta Unidad tiene como objetivo fundamental generar medios impresos y electrónicos, con el propósito de establecer vínculos d e interacción y comunicación entre la comunidad que integran las dos Unidades Hospitalarias, Fray Antonio Alcalde, Dr. Juan I. Menchaca, la sociedad en su conjunto y con el internet.</p>

        <p>Para su propio desarrollo la Unidad Editorial contará con tres áreas de trabajo: edición, formación y diseño; preparación de originales, así como, fotografía e imagen digital. Asimismo, tendrá el resguardo y la producción de materiales audiovisuales.</p>
        <p>Objetivo: Apoyar todos los procesos sustantivos que se originan en el quehacer hospitalario de este Hospital-escuela como son la docencia, investigación y atención.<p>
        <p>
          Funciones: Definir las políticas, acerca de la publicación del material de uso institucional, académico y cultural, que forme parte del quehacer sustantivo, sobre todo que contribuya a mejorar la cultura de la salud al interior de la institución, como en el entorno social.<p>
        <UL>
            <LI>Establecer contacto permanente en internet, con la comunidad médico-asistencial internacional, como con la
            sociedad en su conjunto.</LI>
            <LI>Promover la apertura de trabajos, diseñary publicar las propuestas editoriales de ambas unidades Hospitalarias.</LI>
            <LI>Establecer vínculos de colaboración y coordinación con casas editoriales, así como con la cámara de la industria editorial y con la Feria Internacional del Libro de nuestra ciudad, así como establecer un intercambio de publicaciones en línea con otras instituciones afines.</LI>
            <LI>Realizar acciones de divulgación de la cultura de la salud, a través de medios impresos y electrónicos.</LI>
            <LI>Promover la cultura de la salud a través de videos y cápsulas informativas en las diferentes áreas de atenciónen las cuales exista la infraestructura CISCO.</LI>
        </UL>
        </div>
    </section>
    <section class="column-right">
        <h5>DOCUMENTOS</h5>
        <h5>DESCARGABLES:</h5>
        <?php Yii::app()->runController('filesManager/DisplayFiles/section/'.Yii::app()->controller->id); ?>
    </section>
</section>
