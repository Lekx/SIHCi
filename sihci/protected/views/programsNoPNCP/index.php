<!-- FO02-Desplegar Programas NO PNCP -->
<?php
/* @var $this SiteController */
/* @var $error array */
$this->pageTitle=Yii::app()->name . ' - Programas NO PNCP ';
$this->breadcrumbs=array(
'Programa de formación de recursos humanos en investigación / Programas NO PNCP ',
);
?>
<section class="informativa">

    <section class="column-center">
     <div class="titleinfo">
     <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Comites.png" alt="">
        <h2>Programas NO PNCP</h2>
        <hr>
        </div>
                  <div class="generalinformation">
        <OL TYPE=A>
            <h4>ESPECIALIDADES</h4>
            <h5>Hospital Civil Fray Antonio Alcalde</h5>

            <LI>Anatomía Patológica</LI>
            <LI>Anestesiología</LI>
            <LI>Cirugía General</LI>
            <LI>Genética Médica</LI>
            <LI>Geriatría (PNPC)</LI>
            <LI>Ginecología y Obstetricia</LI>
            <LI>Medicina de Rehabilitación</LI>
            <LI>Medicina Interna</LI>
            <LI>Oftalmología</LI>
            <LI>Ortopedia (PNPC)</LI>
            <LI>Otorrinolaringología y Cirugía de Cabeza y Cuello (PNPC)</LI>
            <LI>Patología Clínica</LI>
            <LI>Pediatría Médica (PNPC)</LI>
            <LI>Psiquiatría</LI>
            <LI>Radiología e Imagen</LI>
            <LI>Urgencias Médico Quirúrgicas</LI>
            <h5>Hospital Civil Dr. Juan I. Menchaca</h5>
            <LI>Hospital Civil Dr. Juan I. Menchaca</LI>
            <LI>Anatomía Patológica</LI>
            <LI>Anestesiología</LI>
            <LI>Cirugía General</LI>
            <LI>Epidemiologia</LI>
            <LI>Genética Médica (PNPC)</LI>
            <LI>Ginecología y Obstetricia</LI>
            <LI>Medicina Interna (PNPC)</LI>
            <LI>Pediatría Médica (PNPC)</LI>
            <LI>Radiología e Imagen</LI><br>
            <b>PNPC</b> <h5>Padrón Nacional de Posgrados de Calidad</h5><br>
            <h4>SUBESPECIALIDADES</h4>
            <h5>Hospital Civil Fray Antonio Alcalde</h5>
            <LI>Alergia e Inmunología Clínica</LI>
            <LI>Anestesiología Pediátrica</LI>
            <LI>Angiología y Cirugía Vascular</LI>
            <LI>Cardiología</LI>
            <LI>Cirugía Cardiotorácica</LI>
            <LI>Cirugía Oncológica</LI>
            <LI>Cirugía Pediátrica (PNPC)</LI>
            <LI>Cirugía Plástica y Reconstructiva</LI>
            <LI>Coloproctología (PNPC)</LI>
            <LI>Dermatología</LI>
            <LI>Dermatología Pediátrica</LI>
            <LI>Endocrinología</LI>
            <LI>Gastroenterología</LI>
            <LI>Hematología</LI>
            <LI>Hemodinamia y Cardiología Intervencionista</LI>
            <LI>Infectología</LI>
            <LI>Infectología Pediátrica (PNPC)</LI>
            <LI>Medicina del Enfermo en Estado Crítico (PNPC)</LI>
            <LI>Medicina de Rehabilitación</LI>
            <LI>Nefrología (PNPC)</LI>
            <LI>Neonatología (PNPC)</LI>
            <LI>Neurocirugía</LI>
            <LI>Oncología médica</LI>
            <LI>Retina Médico Quirúrgica (PNPC)</LI>
            <LI>Reumatología (PNPC)</LI>
            <LI>Urología</LI>
            <LI>Urología Ginecológica (PNPC)</LI>
            <h5>Hospital Civil Dr. Juan I. Menchaca</h5>
            <LI>Cirugía Bariátrica</LI>
            <LI>Cirugía Laparoscópica (PNPC)</LI>
            <LI>Gastroenterología y Nutrición Pediátrica</LI>
            <LI>Hemato-Oncología Pediátrica</LI>
            <LI>Medicina Materno Fetal</LI>
            <LI>Neonatología</LI>
            <LI>Neurocirugía</LI>
            <LI>Reumatología (PNPC)</LI><br>
            <b>PNPC</b> <h5>Padrón Nacional de Posgrados de Calidad</h5><br>
        </OL>
        </div>
    </section>
    <section class="column-right">
        <h5>DOCUMENTOS</h5>
        <h5>DESCARGABLES:</h5>
        <?php Yii::app()->runController('filesManager/DisplayFiles/section/'.Yii::app()->controller->id); ?>
    </section>
</section>
