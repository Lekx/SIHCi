<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */
/* @var $form CActiveForm */
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->baseUrl.'/protected/views/booksChapters/js/script.js');
?>


<script type="text/javascript">
  $(document).ready(function() {
      $(".numericOnly").keydown(function (e) {
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
              (e.keyCode == 65 && e.ctrlKey === true) ||
              (e.keyCode >= 35 && e.keyCode <= 40)) {
                  return;
          }
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
          }

      });
  });
  function changeArea(){
    
    var areaValue = $("#area option:selected").val();

if(areaValue == "ANTROPOLOGIA"){
    var ANTROPOLOGIA = ["ANTROPOLOGIA CULTURAL","ANTROPOLOGIA ESTRUCTURAL",
    "ANTROPOLOGIA SOCIAL","ETNOGRAFIA Y ETNOLOGIA","OTRAS ESPECIALIDADES EN MATERIA DE ANTROPOLOGIA"]
    areaValue = ANTROPOLOGIA;
   }
   if(areaValue == "ARTES Y LETRAS"){
    var ARTESYLETRAS = ["ARQUITECTURA","TEORIA","ANALISIS Y CRITICA DE LAS BELLAS ARTES",
    "ANALISIS Y CRITICA LITERARIOS","TEORIA","OTRAS ESPECIALIDADES EN MATERIA DE ARTES Y LETRAS"]
    areaValue = ARTESYLETRAS;
  }
  if(areaValue == "ASTRONOMIA Y ASTROFISICA"){
    var ASTRONOMIAYASTROFISICA = ["ASTRONOMIA OPTICA","COSMOLOGIA Y COSMOGONIA","ESPACIOS Y MATERIA INTERPLANETARIOS",
    "PLANETOLOGIA","RADIOASTRONOMIA","SISTEMA SOLAR","OTRAS ESPECIALIDADES EN MATERIA DE ASTRONOMIA"]
    areaValue = ASTRONOMIAYASTROFISICA;
  }
  if(areaValue == "CIENCIAS AGRONOMICAS Y VETERINARIAS"){
    var CIENCIASAGRONOMICASYVETERINARIAS = ["AGRONOMIA","CIENCIAS VETERINARIAS","CIENCIAS VETERINARIAS",
    "FITOPATOLOGIA","HIGIENE VETERINARIA Y SALUD PUBLICA","HORTICULTURA","INGENIERIA RURAL",
    "OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS AGRONOMICAS Y VETERINARIAS","PECES Y ANIMALES SALVAJES",
    "SILVICULTURA","QUIMICA AGRONOMICA"]
    areaValue = CIENCIASAGRONOMICASYVETERINARIAS;
  }
  if(areaValue == "CIENCIAS DE LA OCUPACION"){
    var CIENCIASDELAOCUPACION = ["TERAPIA OCUPACIONAL"]
    areaValue = CIENCIASDELAOCUPACION;
  }
  if(areaValue == "CIENCIAS DE LA TECNOLOGIA"){
    var CIENCIASDELATECNOLOGIA = ["ANALISIS DE LAS OPERACIONES TECNOLOGICAS","CIENCIAS DE LA COMPUTACION","GESTION DE LA CALIDAD","INSTRUMENTAL TECNOLOGICO",
    "OTRAS ESPECIALIDADES EN MATERIA DE TECNOLOGIA","TECNOLOGIA BIOQUIMICA","TECNOLOGIA DE FERROCARRILES",
    "TECNOLOGIA DE LA ALIMENTACION","TECNOLOGIA DE BIOMOLECULAS","TECNOLOGIA DE BIOPROCESOS","TECNOLOGIA DE LA CONSTRUCCION",
    "TECNOLOGIA DE LA ENERGIA","TECNOLOGIA DE LA INFORMATICA","TECNOLOGIA DE LA MEDICINA","TECNOLOGIA DE LA METALURGIA",
    "TECNOLOGIA DE LAS MATERIAS","TECNOLOGIA DE LAS TELECOMUNICACIONES","TECNOLOGIA DE LOS PRODUCTOS METALICOS",
    "TECNOLOGIA DE MINAS","TECNOLOGIA ELECTRONICA","TECNOLOGIA DEL ESPACIO","TECNOLOGIA DEL MEDIO AMBIENTE","TECNOLOGIA DEL URBANISMO",
    "TECNOLOGIA DE LOS VEHICULOS DE MOTOR","TECNOLOGIA E INGENIERIA AERONAUTICA","TECNOLOGIA E INGENIERIA DE LA ELECTRICIDAD",
    "TECNOLOGIA E INGENIERIA QUIMICA","TECNOLOGIA INDUSTRIAL","TECNOLOGIA MECANICA","TECNOLOGIA NAVAL",
    "TECNOLOGIA NUCLEAR","TECNOLOGIA TEXTIL","TECNOLOGIA DEL PETROLEO Y DEL CARBON","TECNOLOGIA DE LOS SISTEMAS DE TRANSPORTE"]
    areaValue = CIENCIASDELATECNOLOGIA;
  }
  if(areaValue == "CIENCIAS DE LA TIERRA Y DEL COSMOS"){
    var CIENCIASDELATIERRAYDELCOSMOS = ["CIENCIAS ATMOSFERICAS","CLIMATOLOGIA","GEOQUIMICA","GEODESIA","GEOGRAFIA","GEOLOGIA","GEOFISICA","HIDROLOGIA","METEOROLOGIA","OCEANOGRAFIA","CIENCIAS DEL SUELO","CIENCIAS DEL COSMOS","OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS DE LA TIERRA","DEL COSMOS Y DEL MEDIO AMBIENTE"]
    areaValue = CIENCIASDELATIERRAYDELCOSMOS;
  }
  if(areaValue == "CIENCIAS DE LA SALUD"){
    var CIENCIASDELASALUD = ["ENFERMERÍA","INVESTIGACIÓN EN SALUD","SALUD PÚBLICA"]
    areaValue = CIENCIASDELASALUD;
  }
  if(areaValue == "CIENCIAS DE LA VIDA"){
    var CIENCIASDELAVIDA = ["ANTROPOLOGIA FISICA",
    "BIOFISICA","BIOLOGIA ANIMAL Y ZOOLOGIA","BIOLOGIA CELULAR","BIOLOGIA HUMANA","BIOLOGIA MOLECULAR",
    "BOTANICA","BIOQUIMICA","BIOMATEMATICA","BIOMETRIA","ENTOMOLOGIA GENERAL","ETOLOGIA",
    "EVOLUCION","FISIOLOGIA HUMANA","GENETICA","INMUNOLOGIA","MEDIO AMBIENTE","MICROBIOLOGIA",
    "OTRAS ESPECIALIDADES EN MATERIA DE BIOLOGIA","PALEONTOLOGIA","RADIOBIOLOGIA","SIMBIOSIS","VIROLOGIA"]
    areaValue = CIENCIASDELAVIDA;
  }
  if(areaValue == "CIENCIAS ECONOMICAS"){
    var CIENCIASECONOMICAS = ["ACTIVIDADES ECONOMICAS",
    "CAMBIO ECONOMICO O TECNOLOGICO","CONTABILIDAD PUBLICA","POLITICA FISCAL Y HACIENDA PUBLICA",
    "ECONOMETRIA","ECONOMIA INTERNACIONAL","ECONOMIA SECTORIAL","GESTION DE LA CALIDAD",
    "ORGANIZACION DE LA INDUSTRIA Y POLITICA ECONOMICA PUBLICA","ORGANIZACION Y DIRECCION DE EMPRESAS",
    "OTRAS ESPECIALIDADES EN MATERIA DE ECONOMIA","SISTEMAS ECONOMICOS","TEORIA ECONOMICA","ECONOMIA GENERAL"]
    areaValue = CIENCIASECONOMICAS;
  }
  if(areaValue == "CIENCIAS JURIDICAS Y DERECHO"){
    var CIENCIASJURIDICASYDERECHO = ["DERECHO CANONICO",
    "DERECHO INTERNACIONAL","DERECHO Y LEGISLACION NACIONALES",
    "ORGANIZACION PENAL","OTRAS ESPECIALIDADES EN MATERIA JURIDICA",
    "TEORIAS Y METODOS JURIDICOS GENERALES"]
    areaValue = CIENCIASJURIDICASYDERECHO;
  }
  if(areaValue == "CIENCIAS POLITICAS"){
    var CIENCIASPOLITICAS = ["ADMINISTRACION PUBLICA","BIBLIOTECONOMIA Y ARCHIVONOMIA",
    "IDEOLOGIAS POLITICAS","INSTITUCIONES POLITICAS","RELACIONES INTERNACIONALES","OPINION PUBLICA", 
    "OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS POLITICAS","POLITICA TEORICA","POLITICAS SECTORIALES",
    "POLITICA TEORICA","SOCIOLOGIA DE LA POLITICA","SISTEMAS POLITICOS","VIDA POLITICA"]
    areaValue = CIENCIASPOLITICAS;
  }
  if(areaValue == "DEMOGRAFIA"){
    var DEMOGRAFIA = ["CARACTERISTICAS DE LAS POBLACIONES",
    "FECUNDIDAD","DEMOGRAFIA GENERAL","DEMOGRAFIA GEOGRAFICA","DEMOGRAFIA HISTORICA",
    "EVOLUCION DEMOGRAFICA","MORTALIDAD","OTRAS ESPECIALIDADES EN MATERIA DE DEMOGRAFIA"]
    areaValue = DEMOGRAFIA;
  }
  if(areaValue == "ETICA"){
    var ETICA = ["ETICA CLASICA","ETICA INDIVIDUAL","ETICA DE GRUPO","ETICA PROSPECTIVA","OTRAS ESPECIALIDADES EN MATERIA DE ETICA"]
    areaValue  = ETICA;
  }
  if(areaValue == "FILOSOFIA"){
  var FILOSOFIA = ["ANTROPOLOGIA FILOSOFICA","DOCTRINAS FILOSOFICAS","FILOSOFIA DE LOS CONOCIMIENTOS",
  "FILOSOFIA GENERAL","FILOSOFIA DE LA CIENCIA","FILOSOFIA DE LA NATURALEZA",
  "FILOSOFIA SOCIAL","OTRAS ESPECIALIDADES EN MATERIA DE FILOSOFIA","SISTEMAS FILOSOFICOS"]
  areaValue = FILOSOFIA;
  }
  if(areaValue == "FISICA"){
  var FISICA = ["ACUSTICA","ELECTROMAGNETISMO","ELECTRONICA","FISICOQUIMICA",
  "FISICA DE LAS PARTICULAS NUCLEARES","FISICA DE LOS FLUIDOS","FISICA DEL ESPACIO","FISICA MOLECULAR",
  "FISICA NUCLEAR","FISICA DEL ESTADO SOLIDO","FISICA TEORICA","MECANICA","OPTICA",
  "OTRAS ESPECIALIDADES EN MATERIA DE FISICA","TERMODINAMICA","UNIDADES Y CONSTANTES FISICAS"]
  areaValue = FISICA;
}
if(areaValue == "GEOGRAFIA"){
  var GEOGRAFIA = ["GEOGRAFIA ECONOMICA","GEOGRAFIA HISTORICA","GEOGRAFIA HUMANA","GEOGRAFIA REGIONAL","OTRAS ESPECIALIDADES EN MATERIA DE GEOGRAFIA"]
  areaValue = GEOGRAFIA;
}
if(areaValue == "HISTORIA"){
  var HISTORIA = ["BIOGRAFIA","CIENCIAS AUXILIARES DE LA HISTORIA","HISTORIA GENERAL","HISTORIA DE LOS PAISES",
  "HISTORIA DE LAS EPOCAS","HISTORIA ESPECIALIZADA","OTRAS ESPECIALIDADES EN MATERIA DE HISTORIA"]
  areaValue = HISTORIA;
}
if(areaValue == "LINGÜISTICA"){
    var LINGÜISTICA = ["GEOGRAFIA LINGÜISTICA","LINGÜISTICA APLICADA",
    "LINGÜISTICA DIACRONICA","LINGÜISTICA TEORICA","LINGÜISTICA SINCRONICA",
    "POLITICAS DEL LENGUAJE","OTRAS ESPECIALIDADES EN MATERIA DE LINGÜÍSTICA"]
    areaValue = LINGÜISTICA;
}
if(areaValue == "LOGICA"){
  var LOGICA = ["APLICACIONES DE LA LOGICA","LOGICA DEDUCTIVA","LOGICA GENERAL","LOGICA INDUCTIVA","METODOLOGIA","OTRAS ESPECIALIDADES EN MATERIA DE LOGICA"]
  areaValue = LOGICA;
}
if(areaValue == "MATEMATICAS"){
  var MATEMATICAS = ["ALGEBRA","ANALISIS NUMERICO",
  "ANALISIS Y ANALISIS FUNCIONAL","CALCULO DE PROBABILIDADES",
  "ESTADISTICA","GEOMETRIA","INFORMATICA","INFORMATICA MATEMATICA",
  "INVESTIGACION OPERATIVA","MATEMATICAS","TEORIA DE LOS NUMEROS",
  "SISTEMAS","OTRAS ESPECIALIDADES EN MATERIA DE MATEMATICAS","TOPOLOGIA"]
  areaValue = MATEMATICAS;
}
if(areaValue == "MEDICINA Y PATOLOGIA HUMANA"){
  var MEDICINAYPATOLOGIAHUMANA = ["ADMINISTRACION DE HOSPITALES Y DE LA ATENCION MEDICA",
  "BIOLOGIA DE LA REPRODUCCION HUMANA","CIENCIAS DE LA INFORMACION Y COMUNICACION EN MEDICINA",
  "CIENCIAS SOCIALES EN MEDICINA","EPIDEMIOLOGIA",
  "FARMACODINAMICA","FARMACOLOGIA","FISIOLOGIA","MORFOLOGIA",
  "MEDICINA CLINICA","MEDICINA FORENSE","MEDICINA DEL TRABAJO",
  "MEDICINA INTERNA","MEDICINA PREVENTIVA","MEDICINA QUIRURGICA","NUTRICION","OBSTETRICIA",
  "OTRAS ESPECIALIDADES EN MATERIA DE MEDICINA Y PATOLOGIA HUMANAS",
  "PATOLOGIA","PSIQUIATRIA","SANIDAD PUBLICA","TOXICOLOGIA"]
  areaValue = MEDICINAYPATOLOGIAHUMANA;
}
if(areaValue == "PEDAGOGIA"){
  var PEDAGOGIA = ["FORMACION Y EMPLEO DE LOS EDUCADORES",
  "ORGANIZACION Y PLANIFICACION PEDAGOGICAS",
  "OTRAS ESPECIALIDADES EN MATERIA DE PEDAGOGIA",
  "TEORIAS Y METODOS PEDAGOGICOS GENERALES"]
    areaValue = PEDAGOGIA;
}
if(areaValue == "PSICOLOGIA"){
  var PSICOLOGIA = ["ESTUDIO DE LA PERSONALIDAD","ESTUDIO PSICOLOGICO DE FENOMENOS SOCIALES",
  "EVALUACION Y MEDICION PSICOLOGICAS","ORIENTACION PSICOLOGICA",
  "OTRAS ESPECIALIDADES EN MATERIA DE PSICOLOGIA","PARAPSICOLOGIA",
  "PSICOFARMACOLOGIA","PSICOLOGIA PATOLOGICA","PSICOLOGIA DE LA EDUCACION",
  "PSICOLOGIA DEL NIÑO Y DEL ADOLESCENTE","PSICOLOGIA EXPERIMENTAL","PSICOLOGIA GENERAL",
  "PSICOLOGIA GERIATRICA","PSICOLOGIA SOCIAL","PSICOLOGIA DEL TRABAJO Y DEL PERSONAL"]
  areaValue = PSICOLOGIA;
}
if(areaValue == "PROSPECTIVA"){
  var PROSPECTIVA = ["ANALISIS DE RIESGOS","ANALISIS DE TENDENCIAS",
  "CONSTRUCCION DE ESCENARIOS","DESARROLLO SUSTENTABLE","DISEÑO DE PRIORIDADES A LARGO PLAZO","ETICA DEL FUTURO",
  "FUTURO DE LOS CONOCIMIENTOS Y LAS NUEVAS TECNOLOGIAS","NUEVAS FUERTES DE ENERGIA","NUEVOS SISTEMAS ORGANIZACIONALES","REVISION",
  "OTRAS ESPECIALIDADES EN MATERIA PROSPECTIVA","PLANEACION Y DISEÑO DE ESTRATEGIAS","TENDENCIAS DEMOGRAFICAS Y POBLACIONALES"]
  areaValue = PROSPECTIVA;
}
if(areaValue == "QUIMICA"){
  var QUIMICA = ["BIOQUIMICA","FARMACOBIOLOGIA",
  "OTRAS ESPECIALIDADES EN MATERIA DE QUIMICA",
  "QUIMICA ANALITICA","QUIMICA DE LAS MACROMOLECULAS",
  "QUIMICA FISICA","QUIMICA INORGANICA","QUIMICA NUCLEAR","QUIMICA ORGANICA"]
  areaValue = QUIMICA;
}
if(areaValue == "SOCIOLOGIA"){
  var SOCIOLOGIA = ["CAMBIO Y DESARROLLO SOCIAL","COMUNICACION SOCIAL",
  "CULTURA FÍSICA","HUMANIDADES","GRUPOS SOCIALES","PROBLEMAS INTERNACIONALES",
  "PROBLEMAS SOCIALES","ORGANIZACION SOCIAL ESTRUCTURA E INSTITUCIONES",
  "OTRAS ESPECIALIDADES EN MATERIA DE SOCIOLOGIA","SOCIOLOGIA CULTURAL",
  "SOCIOLOGIA EXPERIMENTAL","SOCIOLOGIA GENERAL","SOCIOLOGIA MATEMATICA Y ESTADISTICA",
  "SOCIOLOGIA DE ACTIVIDADES PARTICULARES","SOCIOLOGIA DE LA IMPLANTACION HUMANA"]
  areaValue = SOCIOLOGIA;
}


    var newDiscipline = "<span class='plain-select'><select id='BooksChapters_discipline' class='tooltipstered' name='BooksChapters[discipline]' onchange='changeDiscipline()'>";
    newDiscipline+="<option>Seleccionar Disciplina</option>";
    for (var item in areaValue) {
        newDiscipline += "<option>"+areaValue[ item ]+"</option>";
    }

    newDiscipline+="</select></span>";

    $("#comboDiscipline").html(newDiscipline);
  }

  function changeDiscipline(){
  var disciplineValue = $("#BooksChapters_discipline option:selected").val();

    if(disciplineValue == "Seleccionar Disciplina"){
      var seleccionarDisciplina = "";
      disciplineValue = aplicacionesDeLaLogica;
    }

    if(disciplineValue == "LOGICA DEDUCTIVA"){
      var logicaDeductiva = ["ALGEBRA DE BOOLE", 
                   "ANALOGIA", 
                   "CALCULO DE PROPOSICIONES", 
                   "FUNCIONES RECURSIVAS", 
                   "FUNDAMENTOS DE LAS MATEMATICAS", 
                   "GENERALIZACION", 
                   "LENGUAJES FORMALIZADOS", 
                   "LOGICA FORMAL", 
                   "LOGICA MATEMATICA", 
                   "LOGICA MODAL", 
                   "LOGICA SIMBOLICA", 
                   "SISTEMAS FORMALES", 
                   "TEORIA DE DEMOSTRACIONES Y MATEMATICAS CONSTRUCTIVAS", 
                   "TEORIA DE LAS PRUEBAS", 
                   "TEORIA DE LOS LENGUAJES FORMALES", 
                   "TEORIA DE LOS MODELOS", 
                   "OTROS"]
      disciplineValue = logicaDeductiva;
    }
    if(disciplineValue == "LOGICA INDUCTIVA"){
      var logicaInductiva = ["INDUCCION", 
                  "INTUICIONISMO", 
                  "PROBABILIDAD", 
                  "OTROS"]
      disciplineValue = logicaInductiva;
    }
    if(disciplineValue == "METODOLOGIA"){
      var metodologia = ["METODO CIENTIFICO", 
                "OTROS"]
      disciplineValue = metodologia;
    }
    if(disciplineValue == "ALGEBRA"){
      var algebra = ["ALGEBRA DE LIE","ALGEBRA DIFERENCIAL", 
               "ALGEBRA HOMOLOGICA", 
               "ALGEBRA LINEAL", 
               "ALGEBRAS", 
               "ALGEBRAS NO ASOCIATIVAS", 
               "ANILLOS", 
               "CAMPOS", 
               "ESTRUCTURAS ALGEBRAICAS", 
               "GENERALIDADES", 
               "GEOMETRIA ALGEBRAICA", 
               "GRUPOS", "POLINOMIOS", 
               "RETICULOS", 
               "TEORIA AXIOMATICA DE CONJUNTOS", 
               "TEORIA DE LAS CATEGORIAS", 
               "TEORIA DE LAS MATRICES", 
               "TEORIA DE LA REPRESENTACION", 
               "TEORIA K ALGEBRAICA", 
               "OTROS"]
      disciplineValue = algebra;
    }
    if(disciplineValue == "ANALISIS Y ANALISIS FUNCIONAL"){
      var analisisYAnalisisFuncional = [  "ALGEBRA DE OPERADORES LOGICOS",
                        "ANALISIS ARMONICO", 
                        "ANALISIS COMBINATORIO", 
                        "ANALISIS DE FOURIER",
                          "ANALISIS GLOBAL", 
                          "AREA",
                          "CALCULO DE VARIACIONES", 
                          "CALCULO OPERACIONAL", 
                          "CONVEXIDAD", 
                          "DESIGUALDADES", 
                          "ECUACIONES DIFERENCIALES ORDINARIAS", 
                          "ECUACIONES DIFERENCIALES PARCIALES", 
                          "ECUACIONES EN DIFERENCIAS FINITAS", 
                          "ECUACIONES FUNCIONALES", 
                          "ECUACIONES INTEGRALES", 
                          "ESPACIOS ANALITICOS", 
                          "ESPACIOS DE HILBERT", 
                          "ESPACIOS LINEALES TOPOLOGICOS",
                          "ESPACIOS Y ALGEBRAS DE BANACH",
                          "MEDIDAS", 
                          "INTEGRACION", 
                          "FUNCIONES DE UNA VARIABLE COMPLEJA", 
                          "FUNCIONES DE VARIABLES REALES", 
                          "FUNCIONES DE VARIAS VARIABLES COMPLEJAS",
                          "FUNCIONES ESPECIALES",
                            "FUNCIONES SUBARMONICAS",
                            "SERIES",
                            "SERIES E INTEGRALES TRIGONOMETRICAS",
                            "SUMABILIDAD", "TEORIA DE FUNCIONES GENERALIZADA", 
                            "TEORIA DE GRAFICAS", "TEORIA DE LA APROXIMACION", 
                            "TEORIA DEL POTENCIAL", 
                            "TEORIA ERGODICA", 
                            "TRANSFORMACIONES INTEGRALES", 
                            "OTROS"]
      disciplineValue = analisisYAnalisisFuncional;
    }
    if(disciplineValue == "INFORMATICA MATEMATICA"){
      var informaticaMatematica = [ "BANCOS DE DATOS",
                        "CODIGOS Y SISTEMAS DE CODIFICACION", 
                        "COMPUTACION ANALOGICA", 
                        "COMPUTACION DIGITAL",
                          "COMPUTACION HIBRIDA", 
                          "CONTABILIDAD",
                          "CONTROL DE INVENTARIO", 
                          "DISEÑO CON AYUDA DE COMPUTADOR", 
                          "DISEÑO DE SISTEMAS DE SENSORES", 
                          "DISEÑO Y COMPONENTES", 
                          "ENSEÑANZA CON AYUDA DE COMPUTADOR", 
                          "HEURISTICA", 
                          "LENGUAJES ALGORITMICOS", 
                          "LENGUAJES DE PROGRAMACION", 
                          "MODELIZACION CAUSAL", 
                          "INFORMATICA", 
                          "INTELIGENCIA ARTIFICIAL", 
                          "SIMULACION",
                          "SISTEMAS AUTOMATICOS DE CONTROL DE CALIDAD",
                          "SISTEMAS DE CONTROL AMBIENTAL", 
                          "SISTEMAS DE CONTROL MEDICO", 
                          "SISTEMAS DE CONTROL DE PRODUCCION", 
                          "SISTEMAS DE INFORMACION", 
                          "SISTEMAS DE NAVEGACION DE TELEMETRIA Y ESPACIAL",
                          "SISTEMAS DE PRODUCCION AUTOMATICA",
                            "SOPORTE LOGICO DE COMPUTADORES",
                            "TEORIA DE LA PROGRAMACION",
                            "OTROS"]
      disciplineValue = informaticaMatematica;
    }
    if(disciplineValue == "GEOMETRIA"){
      var geometria = [ "ANALISIS TENSORIAL",
                "DOMINIOS CONVEXOS", 
                "ESTRUCTURAS DE ORDEN GEOMETRICO", 
                "FUNDAMENTOS",
                  "GEOMETRIA AFIN", 
                  "GEOMETRIA COMPLEJA Y REAL",
                  "GEOMETRIA DESCRIPTIVA Y ANALITICA", 
                  "GEOMETRIA DIFERENCIAL", 
                  "GEOMETRIA DISCRETA", 
                  "GEOMETRIA EUCLIDIANA", 
                  "GEOMETRIA PROYECTIVA", 
                  "GEOMETRIA TOPOLOGICA", 
                  "GEOMETRIA RIEMANIANA", 
                  "GEOMETRIAS INFINITAS", 
                  "GEOMETRIAS NO EUCLIDIANAS", 
                  "PROBLEMAS DE EXTREMO", 
                  "TEORIA DE LA FUNCION GEOMETRICA", 
                  "TEORIA K",
                  "VARIEDADES COMPLEJAS",
                    "OTROS"]
      disciplineValue = geometria;
    }
    if(disciplineValue == "TEORIA DE LOS NUMEROS"){
      var teoriaDeLosNumeros = [  "GEOMETRIA DE LOS NUMEROS",
                    "PROBLEMAS DIOFANTINOS", 
                    "SUCESIONES Y CONJUNTOS", 
                    "TEORIA DE LOS NUMEROS ALGEBRAICOS",
                      "TEORIA DE LOS NUMEROS ANALITICOS", 
                      "TEORIA DE LOS NUMEROS ELEMENTALES",
                      "TEORIA K", 
                        "OTROS"]
      disciplineValue = teoriaDeLosNumeros;
    }
    if(disciplineValue == "ANALISIS NUMERICO"){
      var analisisNumerico = [  "ANALISIS DE ERRORES",
                    "CONSTRUCCION DE ALGORITMOS", 
                    "CUADRATURA", 
                    "DIFERENCIACION NUMERICA",
                      "ECUACIONES DIFERENCIALES", 
                      "ECUACIONES DIFERENCIALES ORDINARIAS",
                      "ECUACIONES DIFERENCIALES PARCIALES", 
                      "ECUACIONES FUNCIONALES",
                      "ECUACIONES INTEGRALES",
                      "ECUACIONES INTEGRODIFERENCIALES",
                      "ECUACIONES LINEALES",
                      "INTERPOLACION",
                      "MATRICES",
                      "METODOS ITERATIVOS",
                      "PROXIMACION Y AJUSTE DE CURVAS",
                        "OTROS"]
      disciplineValue = analisisNumerico;
    }
    var newSubdiscipline = "<span class='plain-select'><select id='BooksChapters_subdiscipline' class='tooltipstered' name='BooksChapters[subdiscipline]'>";
    newSubdiscipline+="<option>Seleccionar Subdisciplina</option>";
    for (var item in disciplineValue) {
        newSubdiscipline += "<option>"+disciplineValue[ item ]+"</option>";
    }

    newSubdiscipline+="</select></span>";

    $("#comboSubdiscipline").html(newSubdiscipline);
}
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'books-chapters-form',
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
  'enableAjaxValidation'=>true,
  'enableClientValidation'=>true,
  'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>



    <div class="row">
        <?php echo $form->textField($model,'isbn', array('placeholder'=>'ISBN','title'=>'ISBN')); ?>
        <?php echo $form->error($model,'isbn'); ?>
    </div>

  <div class="row">

    <?php echo $form->textField($model,'chapter_title',array('size'=>60,'maxlength'=>100, 'placeholder'=>'Capítulo de libro','title'=>'Capítulo de libro')); ?>
    <?php echo $form->error($model,'chapter_title'); ?>
  </div>

  <div class="row">

    <?php echo $form->textField($model,'book_title',array('size'=>60,'maxlength'=>100, 'placeholder'=>'Titulo de libro','title'=>'Titulo de libro')); ?>
    <?php echo $form->error($model,'book_title'); ?>
  </div>

  <div class="row">
    <span class="plain-select">
    <?php echo $form->dropDownList($model,'publishing_year',array(
              '1930'=>'1930','1931'=>'1931','1932'=>'1932','1933'=>'1933',
          '1934'=>'1934','1935'=>'1935','1936'=>'1936','1937'=>'1937',
          '1938'=>'1938','1939'=>'1939','1940'=>'1940','1941'=>'1941',
          '1942'=>'1942','1943'=>'1943','1944'=>'1944','1945'=>'1945',
          '1946'=>'1946','1947'=>'1947','1948'=>'1948','1949'=>'1949',
          '1950'=>'1950','1951'=>'1951','1952'=>'1952','1953'=>'1953',
          '1954'=>'1954','1955'=>'1956','1956'=>'1956','1957'=>'1957',
          '1958'=>'1958','1959'=>'1959','1960'=>'1960','1961'=>'1961',
          '1962'=>'1962','1963'=>'1963','1964'=>'1964','1965'=>'1965',
          '1962'=>'1962','1963'=>'1963','1964'=>'1964','1965'=>'1965',
          '1966'=>'1966','1967'=>'1967','1968'=>'1968','1969'=>'1969',
          '1970'=>'1970','1971'=>'1971','1972'=>'1972','1973'=>'1973',
          '1974'=>'1974','1975'=>'1975','1976'=>'1976','1977'=>'1977',
          '1978'=>'1978','1979'=>'1979','1980'=>'1980','1981'=>'1981',
          '1982'=>'1982','1983'=>'1983','1984'=>'1984','1985'=>'1985',
          '1986'=>'1986','1987'=>'1987','1988'=>'1988','1989'=>'1989',
          '1990'=>'1990','1991'=>'1992','1993'=>'1993','1994'=>'1994',
          '1995'=>'1995','1996'=>'1996','1997'=>'1997','1998'=>'1998',
          '1999'=>'1999','2000'=>'2000','2001'=>'2001','2002'=>'2002',
          '2003'=>'2003','2004'=>'2004','2005'=>'2005','2006'=>'2006',
          '2007'=>'2007','2008'=>'2008','2009'=>'2009','2010'=>'2010',
          '2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014',

          '2015'=>'2015'),array('title'=>'Año de publicación','prompt'=>'Seleccionar año de publicación'));?>
</span>
    <?php echo $form->error($model,'publishing_year'); ?>
  </div>

  <div class="row">
    <?php echo $form->textField($model,'publishers',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Editores','title'=>'Editores')); ?>
    <?php echo $form->error($model,'publishers'); ?>
  </div>

  <div class="row">
    <?php echo $form->textField($model,'editorial',array('size'=>45,'maxlength'=>45, 'placeholder'=>'Editorial','title'=>'Editorial')); ?>
    <?php echo $form->error($model,'editorial'); ?>
  </div>

  <div class="row">

    <?php echo $form->textField($model,'volume',array('size'=>45,'maxlength'=>45, 'placeholder'=>'No. Volumen','title'=>'No. Volumen')); ?>
    <?php echo $form->error($model,'volume'); ?>
  </div>

  <div class="row">

    <?php echo $form->textField($model,'pages',array('placeholder'=>'No. páginas','title'=>'No. paginas')); ?>
    <?php echo $form->error($model,'pages'); ?>
  </div>

  <div class="row">

    <?php echo $form->textField($model,'citations',array('placeholder'=>'No. citas','title'=>'No. citas')); ?>
    <?php echo $form->error($model,'citations'); ?>
  </div>

  <div class="row">
    <span class="plain-select">
    <?php echo $form->dropDownList($model,'area',array('ANTROPOLOGIA'=>'ANTROPOLOGIA',
                              'ARTES Y LETRAS'=>'ARTES Y LETRAS',
                              'ASTRONOMIA Y ASTROFISICA'=>'ASTRONOMIA Y ASTROFISICA',
                              'CIENCIAS AGRONOMICAS Y VETERINARIAS'=>'CIENCIAS AGRONOMICAS Y VETERINARIAS',
                              'CIENCIAS DE LA OCUPACION'=>'CIENCIAS DE LA OCUPACION',
                              'CIENCIAS DE LA TECNOLOGIA'=>'CIENCIAS DE LA TECNOLOGIA',
                              'CIENCIAS DE LA TIERRA Y DEL COSMOS'=>'CIENCIAS DE LA TIERRA Y DEL COSMOS',
                              'CIENCIAS DE LA SALUD'=>'CIENCIAS DE LA SALUD',
                              'CIENCIAS DE LA VIDA'=>'CIENCIAS DE LA VIDA',
                              'CIENCIAS ECONOMICAS'=>'CIENCIAS ECONOMICAS',
                              'CIENCIAS JURIDICAS Y DERECHO'=>'CIENCIAS JURIDICAS Y DERECHO',
                              'CIENCIAS POLITICAS'=>'CIENCIAS POLITICAS',
                              'DEMOGRAFIA'=>'DEMOGRAFIA',
                              'ETICA'=>'ETICA',
                              'FILOSOFIA'=>'FILOSOFIA',
                              'FISICA'=>'FISICA',
                              'GEOGRAFIA'=>'GEOGRAFIA',
                              'HISTORIA'=>'HISTORIA',
                              'LINGÜISTICA'=>'LINGÜISTICA',
                              'LOGICA'=>'LOGICA',
                              'MATEMATICAS'=>'MATEMATICAS',
                              'MEDICINA Y PATOLOGIA HUMANA'=>'MEDICINA Y PATOLOGIA HUMANA',
                              'PEDAGOGIA'=>'PEDAGOGIA',
                              'PSICOLOGIA'=>'PSICOLOGIA',
                              'PROSPECTIVA'=>'PROSPECTIVA',
                              'QUIMICA'=>'QUIMICA', 'SOCIOLOGIA'=>'SOCIOLOGIA'),array('prompt'=>'Seleccionar área','title'=>'Area', 'id'=>'area', 'onchange'=>'changeArea()'));?>
                                                      </span>
    <?php echo $form->error($model,'area'); ?>
  </div>
  <div class="row" id="comboDiscipline">

  </div>
  <div class="row" id="comboSubdiscipline">

  </div>
  

   <div class="row">

        <?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>250, 'placeholder'=>'Palabras claves','title'=>'Palabras Claves')); ?>
        <?php echo $form->error($model,'keywords'); ?>
    </div>

  <div class="row">

    <?php echo $form->fileField($model,'url_doc',array('size'=>60,'maxlength'=>100,'title'=>'archivo de capítulo de libros')); ?>
    <?php echo $form->error($model,'url_doc'); ?>
  </div>


  <?php
      $this->widget('ext.widgets.reCopy.ReCopyWidget', array(
      'targetClass'=>'authorsRegistry',
      'addButtonLabel'=>'Agregar nuevo autor',
     ));
      ?>
      <div class="authorsRegistry ">


      <?php
          echo "<input type='hidden' name='idsBooksChapters[]'>";
       ?>
    <div class="row">
      <?php echo $form->textField($modelAuthor,'names',array('name'=>'names[]','size'=>30,'maxlength'=>30, 'placeholder'=>'Nombre(s)','title'=>'Nombres(s)')); ?>
      <?php echo $form->error($modelAuthor,'names');?>
    </div>

    <div class="row">
      <?php echo $form->textField($modelAuthor,'last_name1',array('name'=>'last_names1[]','size'=>20,'maxlength'=>20, 'placeholder'=>'Apellido Paterno','title'=>'Apllido Paterno')); ?>
      <?php echo $form->error($modelAuthor,'last_name1'); ?>
    </div>

    <div class="row">

      <?php echo $form->textField($modelAuthor,'last_name2',array('name'=>'last_names2[]','size'=>20,'maxlength'=>20,'placeholder'=>'Apellido Materno','title'=>'Apellido Materno')); ?>
      <?php echo $form->error($modelAuthor,'last_name2'); ?>
    </div>

    <div class="row">

      <?php echo $form->textField($modelAuthor,'position',array('name'=>'positions[]','class' => 'numericOnly','placeholder'=>'Posición','title'=>'Posición')); ?>
      <?php echo $form->error($modelAuthor,'position'); ?>
      </div>
      </div>


      <?php
      if(!$model->isNewRecord)
      foreach ($modelAuthors as $key => $value) {
        ?>

      <?php
          echo "<input type='hidden' value='".$value->id."' name='idsBooksChapters[]'>";
         ?>
    <div class="row">
      <?php echo $form->textField($value,'names',array('name'=>'names[]','value'=>$value->names,'size'=>30,'maxlength'=>30, 'placeholder'=>'Nombre(s)','title'=>'Nombres(s)')); ?>
      <?php echo $form->error($value,'names');?>
    </div>

    <div class="row">
      <?php echo $form->textField($value,'last_name1',array('name'=>'last_names1[]','value'=>$value->last_name1,'size'=>20,'maxlength'=>20, 'placeholder'=>'Apellido Paterno','title'=>'Apellido Paterno')); ?>
      <?php echo $form->error($value,'last_name1'); ?>
    </div>

    <div class="row">

      <?php echo $form->textField($value,'last_name2',array('name'=>'last_names2[]','value'=>$value->last_name2,'size'=>20,'maxlength'=>20,'placeholder'=>'Apellido Materno','title'=>'Apellido Materno')); ?>
      <?php echo $form->error($value,'last_name2'); ?>
    </div>

     <div class="row">
      <?php echo $form->textField($value,'position',array('name'=>'positions[]','value'=>$value->position,'class' => 'numericOnly','placeholder'=>'Posición','title'=>'Posición')); ?>
      <?php echo $form->error($value,'position');
    ?>
  </div>
  <hr>
    <?php } ?>

  </div>

  <div class="row buttons">

    <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar',array('class'=>'savebutton')); ?>
    <?php echo CHtml::link('Cancelar',array('booksChapters/admin'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>


  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->