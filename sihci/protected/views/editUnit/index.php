<!-- UN01- Unidad Editorial -->
<?php
/* @var $this SiteController */
/* @var $error array */
$this->pageTitle=Yii::app()->name . ' - Programas de cooperación internacional en investigación';
$this->breadcrumbs=array(
'Programas de cooperación internacional en investigación',
);
?>
<section class="informativa">
    <section class="column-center">
         <div class="titleinfo">
        <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
        <h2>Unidad Editorial de Medios Impresos y Electronicos</h2>
        <hr>
        </div>
           <div class="generalinformation">
        <p>Presentación <BR>
        Unidad Editorial, es una figura orgánica pertenecie
        nte al OPD Hospital Civil de Guadalajara. Esta Unid
        ad tiene como
        objetivo fundamental generar medios impresos y elec
        trónicos, con el propósito de establecer vínculos d
        e
        interacción y comunicación entre la comunidad que i
        ntegran las dos Unidades Hospitalarias, Fray Antoni
        o Alcalde,
        Dr. Juan I. Menchaca, la sociedad en su conjunto y
        con el internet.</p>
        <p>Para su propio desarrollo la Unidad Editorial conta
        rá con tres áreas de trabajo: edición, formación y
        diseño;
        preparación de originales, así como, fotografía e i
        magen digital. Asimismo, tendrá el resguardo y la p
        roducción de
        materiales audiovisuales.</p>
        <p>Objetivo:
        Apoyar todos los procesos sustantivos que se origin
        an en el quehacer hospitalario de este Hospital-esc
        uela como
        son la docencia, investigación y atención.<p>
        <p>Funciones:
        Definir las políticas, acerca de la publicación del
        material de uso institucional, académico y cultura
        l, que forme
        parte del quehacer sustantivo, sobre todo que contr
        ibuya a mejorar la cultura de la salud al interior
        de la
        institución, como en el entorno social.<p>
        <UL>
            <LI>Establecer contacto permanente en interne
                t, con la comunidad médico-asistencial internaciona
                l, como con la
            sociedad en su conjunto.</LI>
            <LI>Promover la apertura de trabajos, diseñar
                y publicar las propuestas editoriales de ambas uni
                dades
            Hospitalarias.</LI>
            <LI>Establecer vínculos de colaboración y coo
                rdinación con casas editoriales, así como con la cá
                mara de la
                industria editorial y con la Feria Internacional de
                l Libro de nuestra ciudad, así como establecer un i
                ntercambio de
                publicaciones en línea con otras instituciones afin
            es.</LI>
            <LI>Realizar acciones de divulgación de la cu
                ltura de la salud, a través de medios impresos y el
            ectrónicos.</LI>
            <LI>Promover la cultura de la salud a través
                de videos y cápsulas informativas en las diferentes
                áreas de atención
            en las cuales exista la infraestructura CISCO.</LI>
        </UL>
        </div>
    </section>
    <section class="column-right">
        <h5>DOCUMENTOS</h5>
        <h5>DESCARGABLES:</h5>
        <?php Yii::app()->runController('filesManager/DisplayFiles/section/UnidadEditorial'); ?>
    </section>
</section>