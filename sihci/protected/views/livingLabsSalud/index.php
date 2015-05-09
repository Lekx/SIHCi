<!-- CE03-Desplegar Living-Labs-Salud -->
<?php
/* @var $this SiteController */
/* @var $error array */
$this->pageTitle=Yii::app()->name . ' - Living-labs';
$this->breadcrumbs=array(
'Centro de Investigación Clínica / Living-labs',
);
?>
<section class="informativa">
    <section class="column-center">
        <div class="titleinfo">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/CentroIInvestigacionClinica.png" alt="">
            <h2>Living-labs</h2>
            <hr>
        </div>
        <div class="generalinformation">
        <p>
        Un laboratorio viviente (Living-labs)
        es un concepto de investigación. Un laboratorio vi
        viente está centrado
        en el usuario, la innovación abierta ecosistema, lo
        s procesos de investigación e innovación concurrent
        es a
        menudo operan en un contexto territorial (por ejemp
        lo, ciudad, aglomeración, región), que integran
        [ 3 ]
        dentro
        de una asociación público-privado asociación de per
        sonas.
        </p>
        <p>
        El concepto se basa en un enfoque de co-creación de
        usuarios sistemática integración de los procesos d
        e
        investigación e innovación. Estos se integran a tra
        vés de la co-creación, exploración, experimentación
        y
        evaluación de ideas innovadoras, escenarios, concep
        tos y artefactos tecnológicos relacionados con los
        casos
        de uso de la vida real.Estos casos de uso incluyen
        las comunidades de usuarios, no sólo como sujetos
        observados, sino también como una fuente de creació
        n. Este enfoque permite a todas las partes interesa
        das a
        tener en cuenta simultáneamente tanto el desempeño
        global de un producto o servicio y su posible adopc
        ión
        por los usuarios. Esta consideración puede hacerse
        en la etapa más temprana de la investigación y el
        desarrollo ya través de todos los elementos del cic
        lo de vida del producto, desde el diseño hasta el r
        eciclaje.
        </p>
        <p>
        Métodos de investigación centrada en el usuario, tal
        es como la investigación-acción , la comunidad
        informática , diseño contextual , el diseño centrad
        o en el usuario ,diseño participativo , el diseño
        empático , diseño emocional , y otros usabilidad ,
        ya existen métodos, pero no logran empoderar
        suficientemente usuarios para la co-creación en ent
        ornos de desarrollo abiertos.
        M
        ás recientemente, la Web
        2.0 ha demostrado el impacto positivo de la partici
        pación de las comunidades de usuarios en el desarro
        llo de
        nuevos productos (NPD), tales como la colaboración
        masiva proyectos (por
        ejemplo, Wikipedia , crowdsourcing , sabiduría de l
        as multitudes ) en forma colectiva la creación de n
        uevos
        contenidos y aplicacione.
        </p>
        <p>
        Un laboratorio viviente no es similar a un banco de
        pruebas como su filosofía es convertir a los usuar
        ios, de
        ser considerado tradicionalmente como sujetos obser
        vados para los módulos de prueba en contra de los
        requisitos, en la creación de valor en la contribuc
        ión a la co-creación y la exploración de las ideas
        emergentes,
        escenarios de vanguardia, innovadora conceptos y ob
        jetos relacionados. Por lo tanto, un Living Lab en
        lugar
        constituye un entorno experiencial, que podría comp
        ararse con el concepto de aprendizaje experiencial
        ,
        donde los usuarios se sumergen en un espacio social
        creativo para diseñar y experimentar su propio
        futuro. Living Labs también podrían ser utilizados
        por los responsables políticos y los usuarios / ciu
        dadanos
        para diseñar, explorar, experimentar y perfeccionar
        nuevas políticas y regulaciones en los escenarios
        de la
        vida real para evaluar sus posibles impactos antes
        de que sus implementacione.
        </p>
        <p>
        La generación de conocimiento que se difunde a trav
        és de publicaciones, por ejemplo, artículos científ
        icos o
        libros, no garantiza su transferencia y aplicación
        para generar riqueza social y económica. Los invest
        igadores
        también deben ser evaluados por la calidad del cono
        cimiento científico que ofrece soluciones a necesid
        ades
        prioritarias; se deben utilizar las necesidades o p
        roblemas de los usuarios para que el conocimiento s
        ea
        “transformado o traducido” para su aplicación “Sin
        usuarios, no hay innovación.
        </p>
        <p>
        Se propone la implementación de Living-Labs-Salud c
        on el objetivo de ofrecer las estrategias para el
        desarrollo de la Investigación Traslacional. Los Li
        ving-Labs-Salud ofrecen un nuevo sistema de innovac
        ión,
        donde los usuarios intermedios (médicos clínicos, e
        nfermeras, psicólogos, entre otros, del área de la
        salud) y
        los usuarios finales (pacientes, familiares y socie
        dad en general), se convierten en actores activos y
        no sólo
        receptores pasivos, con la integración de redes de
        tecnologías de la información (IoT) para compartir
        y crear
        conocimiento. En el Curso Pre-Congreso se presentar
        á la experiencia en el desarrollo de la Investigaci
        ón y
        M
        edicina Traslacional de un Hospital Universitario d
        e Barcelona, España.
        </p>
        <p>
        El desafío del nuevo sistema de innovación de Livin
        g-Labs-Salud que proponemos es crear un modelo ópti
        mo
        y eficiente para implementar la cuádruple hélice co
        n la alianza de Usuarios-Institución de Salud-Estad
        o-
        Empresa (PECiTI 2014-2018). El Estado de Jalisco es
        líder en Living-Labs a través el Centro de Innovac
        ión
        para el Aceleramiento del Desarrollo Económico (CIA
        DE), por lo que, se propone la implementación de Li
        ving-
        Labs-Salud para apoyar el emprendimiento, la innova
        ción y el registro de patentes en salud.
        </p>
        </div>
    </section>
    <section class="column-right">
        <h5>DOCUMENTOS</h5>
        <h5>DESCARGABLES:</h5>
        <?php Yii::app()->runController('filesManager/DisplayFiles/section/'.Yii::app()->controller->id); ?>
    </section>
</section>