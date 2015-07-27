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

  function lettersOnly(e)
{
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
  especiales = [8,37,39,46,45,47];

   tecla_especial = false
    for(var i in especiales)
    {
        if(key == especiales[i])
        {
          tecla_especial = true;
          break;
            }
    }

        if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}


  function changeArea(){



    var areaValue = $("#area option:selected").val();

if(areaValue =="ANTROPOLOGIA"){
    var ANTROPOLOGIA = ["ANTROPOLOGIA CULTURAL","ANTROPOLOGIA ESTRUCTURAL",
   "ANTROPOLOGIA SOCIAL","ETNOGRAFIA Y ETNOLOGIA","OTRAS ESPECIALIDADES EN MATERIA DE ANTROPOLOGIA"]
    areaValue = ANTROPOLOGIA;
   }
   if(areaValue =="ARTES Y LETRAS"){
    var ARTESYLETRAS = ["ARQUITECTURA","TEORIA, ANALISIS Y CRITICA DE LAS BELLAS ARTES",
   "TEORIA, ANALISIS Y CRITICA LITERARIOS","OTRAS ESPECIALIDADES EN MATERIA DE ARTES Y LETRAS"]
    areaValue = ARTESYLETRAS;
  }
  if(areaValue =="ASTRONOMIA Y ASTROFISICA"){
    var ASTRONOMIAYASTROFISICA = ["ASTRONOMIA OPTICA","COSMOLOGIA Y COSMOGONIA","ESPACIOS Y MATERIA INTERPLANETARIOS",
   "PLANETOLOGIA","RADIOASTRONOMIA","SISTEMA SOLAR","OTRAS ESPECIALIDADES EN MATERIA DE ASTRONOMIA"]
    areaValue = ASTRONOMIAYASTROFISICA;
  }
  if(areaValue =="CIENCIAS AGRONOMICAS Y VETERINARIAS"){
    var CIENCIASAGRONOMICASYVETERINARIAS = ["AGRONOMIA","CIENCIAS VETERINARIAS","CIENCIAS VETERINARIAS",
   "FITOPATOLOGIA","HIGIENE VETERINARIA Y SALUD PUBLICA","HORTICULTURA","INGENIERIA RURAL",
   "OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS AGRONOMICAS Y VETERINARIAS","PECES Y ANIMALES SALVAJES",
   "SILVICULTURA","QUIMICA AGRONOMICA"]
    areaValue = CIENCIASAGRONOMICASYVETERINARIAS;
  }
  if(areaValue =="CIENCIAS DE LA OCUPACION"){
    var CIENCIASDELAOCUPACION = ["TERAPIA OCUPACIONAL"]
    areaValue = CIENCIASDELAOCUPACION;
  }
  if(areaValue =="CIENCIAS DE LA TECNOLOGIA"){
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
  if(areaValue =="CIENCIAS DE LA TIERRA Y DEL COSMOS"){
    var CIENCIASDELATIERRAYDELCOSMOS = ["CIENCIAS ATMOSFERICAS","CLIMATOLOGIA","GEOQUIMICA","GEODESIA","GEOGRAFIA","GEOLOGIA","GEOFISICA","HIDROLOGIA","METEOROLOGIA","OCEANOGRAFIA","CIENCIAS DEL SUELO","CIENCIAS DEL COSMOS","OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS DE LA TIERRA, DEL COSMOS Y DEL MEDIO AMBIENTE"]
    areaValue = CIENCIASDELATIERRAYDELCOSMOS;
  }
  if(areaValue =="CIENCIAS DE LA SALUD"){
    var CIENCIASDELASALUD = ["ENFERMERÍA","INVESTIGACIÓN EN SALUD","SALUD PÚBLICA"]
    areaValue = CIENCIASDELASALUD;
  }
  if(areaValue =="CIENCIAS DE LA VIDA"){
    var CIENCIASDELAVIDA = ["ANTROPOLOGIA FISICA",
   "BIOFISICA","BIOLOGIA ANIMAL Y ZOOLOGIA","BIOLOGIA CELULAR","BIOLOGIA HUMANA","BIOLOGIA MOLECULAR",
   "BOTANICA","BIOQUIMICA","BIOMATEMATICA","BIOMETRIA","ENTOMOLOGIA GENERAL","ETOLOGIA",
   "EVOLUCION","FISIOLOGIA HUMANA","GENETICA","INMUNOLOGIA","MEDIO AMBIENTE","MICROBIOLOGIA",
   "OTRAS ESPECIALIDADES EN MATERIA DE BIOLOGIA","PALEONTOLOGIA","RADIOBIOLOGIA","SIMBIOSIS","VIROLOGIA"]
    areaValue = CIENCIASDELAVIDA;
  }
  if(areaValue =="CIENCIAS ECONOMICAS"){
    var CIENCIASECONOMICAS = ["ACTIVIDADES ECONOMICAS",
   "CAMBIO ECONOMICO O TECNOLOGICO","CONTABILIDAD PUBLICA","POLITICA FISCAL Y HACIENDA PUBLICA",
   "ECONOMETRIA","ECONOMIA INTERNACIONAL","ECONOMIA SECTORIAL","GESTION DE LA CALIDAD",
   "ORGANIZACION DE LA INDUSTRIA Y POLITICA ECONOMICA PUBLICA","ORGANIZACION Y DIRECCION DE EMPRESAS",
   "OTRAS ESPECIALIDADES EN MATERIA DE ECONOMIA","SISTEMAS ECONOMICOS","TEORIA ECONOMICA","ECONOMIA GENERAL"]
    areaValue = CIENCIASECONOMICAS;
  }
  if(areaValue =="CIENCIAS JURIDICAS Y DERECHO"){
    var CIENCIASJURIDICASYDERECHO = ["DERECHO CANONICO",
   "DERECHO INTERNACIONAL","DERECHO Y LEGISLACION NACIONALES",
   "ORGANIZACION PENAL","OTRAS ESPECIALIDADES EN MATERIA JURIDICA",
   "TEORIAS Y METODOS JURIDICOS GENERALES"]
    areaValue = CIENCIASJURIDICASYDERECHO;
  }
  if(areaValue =="CIENCIAS POLITICAS"){
    var CIENCIASPOLITICAS = ["ADMINISTRACION PUBLICA","BIBLIOTECONOMIA Y ARCHIVONOMIA",
   "IDEOLOGIAS POLITICAS","INSTITUCIONES POLITICAS","RELACIONES INTERNACIONALES","OPINION PUBLICA",
   "OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS POLITICAS","POLITICA TEORICA","POLITICAS SECTORIALES",
   "POLITICA TEORICA","SOCIOLOGIA DE LA POLITICA","SISTEMAS POLITICOS","VIDA POLITICA"]
    areaValue = CIENCIASPOLITICAS;
  }
  if(areaValue =="DEMOGRAFIA"){
    var DEMOGRAFIA = ["CARACTERISTICAS DE LAS POBLACIONES",
   "FECUNDIDAD","DEMOGRAFIA GENERAL","DEMOGRAFIA GEOGRAFICA","DEMOGRAFIA HISTORICA",
   "EVOLUCION DEMOGRAFICA","MORTALIDAD","OTRAS ESPECIALIDADES EN MATERIA DE DEMOGRAFIA"]
    areaValue = DEMOGRAFIA;
  }
  if(areaValue =="ETICA"){
    var ETICA = ["ETICA CLASICA","ETICA INDIVIDUAL","ETICA DE GRUPO","ETICA PROSPECTIVA",
    "OTRAS ESPECIALIDADES EN MATERIA DE ETICA"]
    areaValue  = ETICA;
  }
  if(areaValue =="FILOSOFIA"){
  var FILOSOFIA = ["ANTROPOLOGIA FILOSOFICA","DOCTRINAS FILOSOFICAS","FILOSOFIA DE LOS CONOCIMIENTOS",
 "FILOSOFIA GENERAL","FILOSOFIA DE LA CIENCIA","FILOSOFIA DE LA NATURALEZA",
 "FILOSOFIA SOCIAL","OTRAS ESPECIALIDADES EN MATERIA DE FILOSOFIA","SISTEMAS FILOSOFICOS"]
  areaValue = FILOSOFIA;
  }
  if(areaValue =="FISICA"){
  var FISICA = ["ACUSTICA","ELECTROMAGNETISMO","ELECTRONICA","FISICOQUIMICA",
 "FISICA DE LAS PARTICULAS NUCLEARES","FISICA DE LOS FLUIDOS","FISICA DEL ESPACIO","FISICA MOLECULAR",
 "FISICA NUCLEAR","FISICA DEL ESTADO SOLIDO","FISICA TEORICA","MECANICA","OPTICA",
 "OTRAS ESPECIALIDADES EN MATERIA DE FISICA","TERMODINAMICA","UNIDADES Y CONSTANTES FISICAS"]
  areaValue = FISICA;
}
if(areaValue =="GEOGRAFIA"){
  var GEOGRAFIA = ["GEOGRAFIA ECONOMICA","GEOGRAFIA HISTORICA","GEOGRAFIA HUMANA","GEOGRAFIA REGIONAL",
  "OTRAS ESPECIALIDADES EN MATERIA DE GEOGRAFIA"]
  areaValue = GEOGRAFIA;
}
if(areaValue =="HISTORIA"){
  var HISTORIA = ["BIOGRAFIA","CIENCIAS AUXILIARES DE LA HISTORIA","HISTORIA GENERAL","HISTORIA DE LOS PAISES",
 "HISTORIA DE LAS EPOCAS","HISTORIA ESPECIALIZADA","OTRAS ESPECIALIDADES EN MATERIA DE HISTORIA"]
  areaValue = HISTORIA;
}
if(areaValue =="LINGÜISTICA"){
    var LINGÜISTICA = ["GEOGRAFIA LINGÜISTICA","LINGÜISTICA APLICADA",
   "LINGÜISTICA DIACRONICA","LINGÜISTICA TEORICA","LINGÜISTICA SINCRONICA",
   "POLITICAS DEL LENGUAJE","OTRAS ESPECIALIDADES EN MATERIA DE LINGÜÍSTICA"]
    areaValue = LINGÜISTICA;
}
if(areaValue =="LOGICA"){
  var LOGICA = ["APLICACIONES DE LA LOGICA","LOGICA DEDUCTIVA","LOGICA GENERAL",
  "LOGICA INDUCTIVA","METODOLOGIA","OTRAS ESPECIALIDADES EN MATERIA DE LOGICA"]
  areaValue = LOGICA;
}
if(areaValue =="MATEMATICAS"){
  var MATEMATICAS = ["ALGEBRA","ANALISIS NUMERICO",
 "ANALISIS Y ANALISIS FUNCIONAL","CALCULO DE PROBABILIDADES",
 "ESTADISTICA","GEOMETRIA","INFORMATICA","INFORMATICA MATEMATICA",
 "INVESTIGACION OPERATIVA","MATEMATICAS","TEORIA DE LOS NUMEROS",
 "SISTEMAS","OTRAS ESPECIALIDADES EN MATERIA DE MATEMATICAS","TOPOLOGIA"]
  areaValue = MATEMATICAS;
}
if(areaValue =="MEDICINA Y PATOLOGIA HUMANA"){
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
if(areaValue =="PEDAGOGIA"){
  var PEDAGOGIA = ["FORMACION Y EMPLEO DE LOS EDUCADORES",
 "ORGANIZACION Y PLANIFICACION PEDAGOGICAS",
 "OTRAS ESPECIALIDADES EN MATERIA DE PEDAGOGIA",
 "TEORIAS Y METODOS PEDAGOGICOS GENERALES"]
    areaValue = PEDAGOGIA;
}
if(areaValue =="PSICOLOGIA"){
  var PSICOLOGIA = ["ESTUDIO DE LA PERSONALIDAD","ESTUDIO PSICOLOGICO DE FENOMENOS SOCIALES",
 "EVALUACION Y MEDICION PSICOLOGICAS","ORIENTACION PSICOLOGICA",
 "OTRAS ESPECIALIDADES EN MATERIA DE PSICOLOGIA","PARAPSICOLOGIA",
 "PSICOFARMACOLOGIA","PSICOLOGIA PATOLOGICA","PSICOLOGIA DE LA EDUCACION",
 "PSICOLOGIA DEL NIÑO Y DEL ADOLESCENTE","PSICOLOGIA EXPERIMENTAL","PSICOLOGIA GENERAL",
 "PSICOLOGIA GERIATRICA","PSICOLOGIA SOCIAL","PSICOLOGIA DEL TRABAJO Y DEL PERSONAL"]
  areaValue = PSICOLOGIA;
}
if(areaValue =="PROSPECTIVA"){
  var PROSPECTIVA = ["ANALISIS DE RIESGOS","ANALISIS DE TENDENCIAS",
 "CONSTRUCCION DE ESCENARIOS","DESARROLLO SUSTENTABLE","DISEÑO DE PRIORIDADES A LARGO PLAZO",
 "ETICA DEL FUTURO","FUTURO DE LOS CONOCIMIENTOS Y LAS NUEVAS TECNOLOGIAS",
 "NUEVAS FUERTES DE ENERGIA","NUEVOS SISTEMAS ORGANIZACIONALES",
 "PREVISION","OTRAS ESPECIALIDADES EN MATERIA PROSPECTIVA",
 "PLANEACION Y DISEÑO DE ESTRATEGIAS","TENDENCIAS DEMOGRAFICAS Y POBLACIONALES"]
  areaValue = PROSPECTIVA;
}
if(areaValue =="QUIMICA"){
  var QUIMICA = ["BIOQUIMICA","FARMACOBIOLOGIA",
 "OTRAS ESPECIALIDADES EN MATERIA DE QUIMICA",
 "QUIMICA ANALITICA","QUIMICA DE LAS MACROMOLECULAS",
 "QUIMICA FISICA","QUIMICA INORGANICA","QUIMICA NUCLEAR","QUIMICA ORGANICA"]
  areaValue = QUIMICA;
}
if(areaValue =="SOCIOLOGIA"){
  var SOCIOLOGIA = ["CAMBIO Y DESARROLLO SOCIAL","COMUNICACION SOCIAL",
 "CULTURA FÍSICA","HUMANIDADES","GRUPOS SOCIALES","PROBLEMAS INTERNACIONALES",
 "PROBLEMAS SOCIALES","ORGANIZACION SOCIAL ESTRUCTURA E INSTITUCIONES",
 "OTRAS ESPECIALIDADES EN MATERIA DE SOCIOLOGIA","SOCIOLOGIA CULTURAL",
 "SOCIOLOGIA EXPERIMENTAL","SOCIOLOGIA GENERAL","SOCIOLOGIA MATEMATICA Y ESTADISTICA",
 "SOCIOLOGIA DE ACTIVIDADES PARTICULARES","SOCIOLOGIA DE LA IMPLANTACION HUMANA"]
  areaValue = SOCIOLOGIA;
}


    var newDiscipline ="<span class='plain-select'><select id='BooksChapters_discipline' title='Disciplina.' name='BooksChapters[discipline]' onchange='changeDiscipline()'>";
    newDiscipline+="<option>Seleccionar Disciplina</option>";

    for (var item in areaValue) {
        newDiscipline +="<option>"+areaValue[ item ]+"</option>";
    }


    newDiscipline+="</select></span>";

    $("#comboDiscipline").html(newDiscipline);
      $('#BooksChapters_discipline').tooltipster({
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
  }

  function changeDiscipline(){
  var disciplineValue = $("#BooksChapters_discipline option:selected").val();

    if(disciplineValue =="Seleccionar Disciplina"){
      var seleccionarDisciplina ="";
      disciplineValue = seleccionarDisciplina;
    }

    if(disciplineValue =="LOGICA DEDUCTIVA"){
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
    if(disciplineValue =="LOGICA INDUCTIVA"){
      var logicaInductiva = ["INDUCCION",
                 "INTUICIONISMO",
                 "PROBABILIDAD",
                 "OTROS"]
      disciplineValue = logicaInductiva;
    }
    if(disciplineValue =="METODOLOGIA"){
      var metodologia = ["METODO CIENTIFICO",
               "OTROS"]
      disciplineValue = metodologia;
    }
    if(disciplineValue =="ALGEBRA"){
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
              "GRUPOS","POLINOMIOS",
              "RETICULOS",
              "TEORIA AXIOMATICA DE CONJUNTOS",
              "TEORIA DE LAS CATEGORIAS",
              "TEORIA DE LAS MATRICES",
              "TEORIA DE LA REPRESENTACION",
              "TEORIA K ALGEBRAICA",
              "OTROS"]
      disciplineValue = algebra;
    }
    if(disciplineValue =="ANALISIS Y ANALISIS FUNCIONAL"){
      var analisisYAnalisisFuncional = [ "ALGEBRA DE OPERADORES LOGICOS",
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
                        "SUMABILIDAD","TEORIA DE FUNCIONES GENERALIZADA",
                        "TEORIA DE GRAFICAS","TEORIA DE LA APROXIMACION",
                        "TEORIA DEL POTENCIAL",
                        "TEORIA ERGODICA",
                        "TRANSFORMACIONES INTEGRALES",
                        "OTROS"]
      disciplineValue = analisisYAnalisisFuncional;
    }
    if(disciplineValue =="INFORMATICA MATEMATICA"){
      var informaticaMatematica = ["BANCOS DE DATOS",
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
    if(disciplineValue =="GEOMETRIA"){
      var geometria = ["ANALISIS TENSORIAL",
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
    if(disciplineValue =="TEORIA DE LOS NUMEROS"){
      var teoriaDeLosNumeros = [ "GEOMETRIA DE LOS NUMEROS",
                   "PROBLEMAS DIOFANTINOS",
                   "SUCESIONES Y CONJUNTOS",
                   "TEORIA DE LOS NUMEROS ALGEBRAICOS",
                   "TEORIA DE LOS NUMEROS ANALITICOS",
                   "TEORIA DE LOS NUMEROS ELEMENTALES",
                   "TEORIA K",
                   "OTROS"]
      disciplineValue = teoriaDeLosNumeros;
    }
    if(disciplineValue =="ANALISIS NUMERICO"){
      var analisisNumerico = [ "ANALISIS DE ERRORES",
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
    if(disciplineValue =="INVESTIGACION OPERATIVA"){
      var invetigacionOperativa = [
              "ANALISIS MICROECONOMICO",
          "CIBERNETICA",
          "COLAS",
          "DISTRIBUCION Y TRANSPORTE",
          "FIABILIDAD DE LOS SISTEMAS",
          "FLUJO DE RED",
          "FORMULACION DE SISTEMAS",
          "INVENTARIO",
          "MODELACION",
          "ORDENAMIENTO",
          "OTROS",
          "PROGRAMACION DINAMICA",
          "PROGRAMACION ENTERA",
          "PROGRAMACION LINEAL",
          "PROGRAMACION NO LINEAL",
          "SISTEMAS DE CONTROL",
          "TEORIA DE JUEGOS", ]
      disciplineValue = invetigacionOperativa;
    }
        if(disciplineValue =="CALCULO DE PROBABILIDADES"){
      var calculoProbabilidades = [
          "APLICACION DE LA PROBABILIDAD",
          "CONJUNTOS ALEATORIOS",
          "FUNDAMENTOS DE LA PROBABILIDAD",
          "GEOMETRIA ESTOCASTICA",
          "MATEMATICAS ACTUARIALES",
          "PROCESOS DE MARKOV",
          "PLAUSIBILIDAD",
          "PROCESOS ESTOCASTICOS",
          "PROBABILIDADES SUBJETIVAS",
          "PROBABILIDAD GEOMETRICA",
          "OTROS",
          "TEORIA ANALITICA DE LA PROBABILIDAD",
          "TEOREMAS LIMITE"]
      disciplineValue = calculoProbabilidades;
    }
      if(disciplineValue =="ESTADISTICA"){
      var estadistica = [
          "ANALISIS DE DATOS",
          "ANALISIS MULTIVARIANTE",
          "COMPUTACION PARA LA ESTADISTICA",
          "DISEÑO Y ANALISIS DE EXPERIMENTOS",
          "ESTADISTICA ANALITICA",
          "FUNDAMENTOS DE INFERENCIA ESTADISTICA",
          "METODOS NO PARAMETRICOS",
          "OTROS",
          "PROCEDIMIENTOS DE DECISION Y TEORIA DE DECISION",
          "TEORIA DE LA DISTRIBUCION Y LA PROBABILIDAD",
          "TEORIA Y TECNICAS DE MUESTREO",
          "TEORIA ESTOCASTICA Y ANALISIS DE SERIES TEMPORALES",
          "TECNICAS DE ASOCIACION ESTADISTICA",
          "TECNICAS DE INFERENCIA ESTADISTICA",
          "TECNICAS DE PREDICCION ESTADISTICA",
          "SERIES TEMPORALES"]
      disciplineValue = estadistica;
    }
        if(disciplineValue =="TOPOLOGIA"){
      var topologia = [
          "COHOMOLOGIA",
          "ESPACIOS ABSTRACTOS",
          "DINAMICA TOPOLOGICA",
          "GRUPOS DE TRANSFORMACION",
          "GRUPOS DE LIE",
          "GRUPOS TOPOLOGICOS",
          "HACES Y ESPACIOS DE FIBRAS",
          "HOMOLOGIA",
          "HOMOTOPIA",
          "INMERSION TOPOLOGICA",
          "OTROS",
          "TEORIA K TOPOLOGICA",
          "TOPOLOGIA ALGEBRAICA",
          "TOPOLOGIA COMBINATORIA",
          "TOPOLOGIA DE CONJUNTOS DE PUNTOS",
          "TOPOLOGIA GENERAL",
          "TOPOLOGIA TRIDIMENSIONAL",
          "VARIEDADES DIFERENCIALES",
          "VARIEDADES TOPOLOGICAS"]
      disciplineValue = topologia;
    }
           if(disciplineValue =="INFORMATICA"){
      var informatica = [
          "DISEÑO Y COMPONENTES",
          "GRAFICAS INFORMATICAS",
          "ESTRUCTURA Y MANEJO DE DATOS",
          "INTELIGENCIA ARTIFICIAL",
          "LENGUAJES ALGORITMICOS",
          "LENGUAJES DE PROGRAMACION",
          "LOGICA MATEMATICA Y LENGUAJES FORMALES",
          "MATEMATICAS DISCRETAS",
          "MANIPULACION SIMBOLICA Y ALGEBRAICA",
          "OTROS",
          "SISTEMAS DE INFORMACION",
          "PROCESAMIENTO DE TEXTOS Y DOCUMENTOS",
          "PROGRAMAS MATEMATICOS",
          "SIMULACION Y MODELACION",
          "TEORIA",
          "TEORIA DE LA CODIFICACION Y DE LA INFORMACION",
          "TEORIA DE LA INFORMATICA",
          "TEORIA DE LA PROGRAMACION"]
      disciplineValue = informatica;
    }
          if(disciplineValue =="SISTEMAS"){
      var sistemas = [
              "OTROS",
          "SISTEMAS ALGEBRAICOS TOPOLOGICOS Y DIFERENCIABLES",
          "SISTEMAS DINAMICOS",
          "SISTEMAS HAMILTONIANOS",
          "SISTEMAS LAGRANGIANOS",
          "SISTEMAS ESTOCASTICOS Y CONTROL"]
      disciplineValue = sistemas;
    }
        if(disciplineValue =="COSMOLOGIA Y COSMOGONIA"){
      var cosmologiyCosmogonia = [
          "ESTRELLAS BINARIAS",
          "CONGLOMERADOS",
          "RAYOS COSMICOS",
          "GALAXIAS",
          "GRAVITACION",
          "NEBULOSAS",
          "NOVAS",
          "PULSARS",
          "QUASARS",
          "ESTRELLAS",
          "EVOLUCION ESTELAR Y DIAGRAMAS HR",
          "COMPOSICION ESTELAR",
          "SUPER NOVAS",
          "ESTRELLAS",
          "VARIABLES",
          "FUENTES DE RAYOS X",
          "OTROS ESPECIFICAR",]
      disciplineValue = cosmologiyCosmogonia;
    }
        if(disciplineValue =="ESPACIOS Y MATERIA INTERPLANETARIOS"){
      var espaciosyMateriaInterplanetarios = [
          "CAMPOS INTERPLANETARIOS",
          "MATERIAS INTERPLANETARIAS",
          "OTROS",
          "PARTICULAS INTERPLANETARIAS"]
      disciplineValue = espaciosyMateriaInterplanetarios;
    }
        if(disciplineValue =="ASTRONOMIA OPTICA"){
      var astronomiaOptica = [
          "ASTRONOMIA DE POSICION",
          "TELESCOPIOS",
          "ESPECTROSCOPIA",
          "OTROS",]
      disciplineValue = astronomiaOptica;
    }
     if(disciplineValue =="PLANETOLOGIA"){
      var planetologia = [
          "COMETAS",
          "METEORITOS",
          "ATMOSFERAS PLANETARIAS",
          "GEOLOGIA PLANETARIA",
          "FISICA PLANETARIA",
          "CAMPOS MAGNETICOS PLANETARIOS",
          "PLANETAS",
          "SATELITES",
          "TECTITAS",
          "LA LUNA",
          "OTROS"]
      disciplineValue = planetologia;
    }
    if(disciplineValue =="RADIOASTRONOMIA"){
      var radioastronimia = [
          "ANTENAS",
          "RADIOTELESCOPIOS",
          "OTROS"]
      disciplineValue = radioastronimia;
    }
     if(disciplineValue =="SISTEMA SOLAR"){
      var sistemaSolar = [
          "ENERGIA SOLAR",
          "FISICA SOLAR",
          "RADIACION SOLAR",
          "EL SOL",
          "OTROS"]
      disciplineValue = sistemaSolar;
    }
    if(disciplineValue =="ACUSTICA"){
      var acustica = [
          "PROPIEDADES ACUSTICAS DE LOS SOLIDOS",
          "ACUSTICA ARQUITECTONICA",
          "FISICA DE LA AUDICION",
          "FISICA DE LA MUSICA",
          "RUIDO",
          "ONDAS DE CHOQUE",
          "SONAR",
          "FISICA DEL HABLA",
          "ULTRASONIDOS",
          "SONIDOS SUBMARINOS",
          "VIBRACIONES",
          "OTROS"]
      disciplineValue = acustica;
    }
     if(disciplineValue =="ELECTROMAGNETISMO"){
      var electromagnetismo = [
          "CONDUCTIVIDAD",
          "CANTIDADES ELECTRICAS Y SU MEDICION",
          "ELECTRICIDAD",
          "RADIACION ELECTROMAGNETICA",
          "RAYOS GAMMA",
          "RADIACION INFRARROJA",
          "VISIBLE Y ULTRAVIOLETA",
           "INTERACCION DE LAS ONDAS ELECTROMAGNETICAS CON LA MATERIA",
          "MAGNETISMO",
          "PROPAGACION DE LAS ONDAS ELECTROMAGNETICAS",
          "ONDAS DE RADIO Y MICROONDAS",
          "SUPERCONDUCTIVIDAD",
          "RAYOS X",
          "OTROS"]
      disciplineValue = electromagnetismo;
    }
      if(disciplineValue =="ELECTRONICA"){
      var electronica = [
          "CIRCUITOS",
          "ELEMENTOS DE CIRCUITO",
          "TUBOS ELECTRONICOS",
          "MICROSCOPIA ELECTRONICA",
          "ESTADOS ELECTRONICOS",
          "TRANSPORTE DE ELECTRONES",
          "CIRCUITOS INTEGRADOS",
          "FOTOELECTRICIDAD",
          "PIEZOELECTRICIDAD",
          "OTROS"]
      disciplineValue = electronica;
    }
     if(disciplineValue =="FISICA DE LOS FLUIDOS"){
      var fisicadelosFluidos = [
          "COLOIDES",
          "DISPERSIONES",
          "CORRIENTE DE FLUIDOS",
          "MECANICA DE FLUIDOS",
          "GASES",
          "FENOMENOS DE ALTA PRESION",
          "IONIZACION",
          "LIQUIDOS",
          "MAGNETO-DINAMICA DE LOS FLUIDOS",
          "FISICA DEL PLASMA",
          "FLUIDOS CUANTICOS",
          "OTROS"]
      disciplineValue = fisicadelosFluidos;
    }
    if(disciplineValue =="MECANICA"){
      var mecanica = [
          "MECANICA ESTADISTICA",
          "TEORIA DE N CUERPOS",
          "ELASTICIDAD",
          "FRICCION",
          "MECANICA CONTINUA",
          "MECANICA DE FLUIDOS",
          "MECANICA DE SOLIDOS",
          "MEDIDA DE LAS PROPIEDADES MECANICAS",
          "OTROS",
          "PLASTICIDAD",
          "MECANICA ANALITICA",]
      disciplineValue = mecanica;
    }
      if(disciplineValue =="FISICA MOLECULAR"){
      var fisicaMolecular = [
          "RADICALES LIBRES",
          "FISICA DE LAS MOLECULAS INORGANICAS",
          "FISICA DE LAS MACROMOLECULAS",
          "MOLECULAS MESIONICAS Y MUONICAS",
          "HACES MOLECULARES",
          "IONES MOLECULARES",
          "ESPECTROSCOPIA MOLECULAR",
          "ESTRUCTURA MOLECULAR",
          "FISICA DE LAS MOLECULAS ORGANICAS",
          "FISICA DE POLIMEROS",
          "OTROS"]
      disciplineValue = fisicaMolecular;
    }

     if(disciplineValue =="FISICA NUCLEAR"){
      var fisicaNuclear = [
          "ATOMO DE HELIO",
          "ATOMO DE HIDROGENO",
          "ATOMOS CON Z>2",
          "CONVERSION DE LA ENERGIA",
          "DESINTEGRACION NUCLEAR",
          "ENERGIA NUCLEAR",
          "ESTRUCTURA DEL NUCLEO",
          "FISICA ATOMICA",
          "FISION NUCLEAR",
          "FUSION TERMONUCLEAR",
          "HACES ELECTRONICOS",
          "IONES ATOMICOS",
          "ISOTOPOS",
          "OTROS",
          "PROCESOS DE COLISION",
          "RADIOISOTOPOS",
          "REACTORES NUCLEARES",
          "RESONANCIA DE ROTACION DEL ELECTRON",
          "RESONANCIA MAGNETICA NUCLEAR",
          "RESONANCIA PARAMAGNETICA ELECTRONICA",
          "REACCIONES Y DISPERSION NUCLEARES",
          "HACES ATOMICOS"]
      disciplineValue = fisicaNuclear;
    }

    if(disciplineValue =="FISICA DE LAS PARTICULAS NUCLEARES"){
      var fisicadelasParticulasNucleares = [
              "ACELERADORES DE PARTICULAS",
          "DETECTORES DE RADIACION",
          "FISICA DE PARTICULAS",
          "FUENTES DE HACES",
          "FUENTES DE PARTICULAS",
          "OTROS",
          "CONFINAMIENTO DEL PLASMA",
          "NUCLEOS",
          "REACTORES DE FUSION",
          "MANEJO DE HACES"]
      disciplineValue = fisicadelasParticulasNucleares;
    }
      if(disciplineValue =="OPTICA"){
      var optica = [
              "CINEMATOGRAFIA",
          "COLORIMETRIA",
          "ESPECTROSCOPIA DE EMISION",
          "ESPECTROSCOPIA",
          "FISICA DE LA VISION",
          "FOTOGRAFIA",
          "HOLOGRAFIA",
          "ILUMINACION",
          "INSTRUMENTACION FOTOGRAFICA",
          "LASER",
          "LUZ",
          "MICROSCOPIOS",
          "OPTICA FISICA",
          "OPTICA GEOMETRICA",
          "OPTICA NO LINEAL",
          "OPTOMETRIA",
          "OTROS",
          "OPTICA DE FIBRAS FOTOCONDUCTORAS",
          "PROPIEDADES OPTICAS DE LOS SOLIDOS",
          "RADIACION VISIBLE",
          "RADIACION INFRARROJA",
          "RADIACION ULTRAVIOLETA",
          "RADIOMETRIA",
          "ESPECTROSCOPIA DE ABSORCION",
          "FOTOMETRIA"]
      disciplineValue = optica;
    }

    if(disciplineValue =="FISICOQUIMICA"){
      var fisicoquimica = [
          "CATALISIS",
          "CINETOQUIMICA",
          "ESPECTROSCOPIA ELECTRONICA",
          "ESTADOS DE LA MATERIA",
          "EXPLOSIVOS",
          "FENOMENOS DE MEMBRANA",
          "ELECTROLITOS",
          "ELECTROQUIMICA",
          "EMULSIONES",
          "EQUILIBRIOS DE FASE",
          "EQUILIBRIOS QUIMICOS",
          "ESPECTROSCOPIA MOLECULAR",
          "FENOMENOS DE DISPERSION",
          "FENOMENOS DE TRANSPORTE",
          "FISICA DE ESTADO LIQUIDO",
          "FISICA DE LA FASE GASEOSA",
          "FISICA DEL ESTADO SOLIDO",
          "FOTOQUIMICA",
          "INTERCAMBIO IONICO",
          "LLAMAS",
          "OTROS",
          "PROCESOS DE RELACION",
          "QUIMICA COLOIDAL",
          "QUIMICA DE ALTA TEMPERATURA",
          "QUIMICA DEL ESTADO SOLIDO",
          "QUIMICA INTERFACIAL",
          "RADIOQUIMICA",
          "REACCIONES RAPIDAS",
          "SALES FUNDIDAS",
          "SOLUCIONES",
          "TEORIA CUANTICA",
          "TEORIA DE LA VALENCIA",
          "TEORIA DE PILAS DE COMBUSTIBLE",
          "TERMODINAMICA",
          "TERMOQUIMICA",
          "TRANSFERENCIA DE ENERGIA"]
      disciplineValue = fisicoquimica;
    }
    if(disciplineValue =="FISICA DEL ESTADO SOLIDO"){
      var fisicaDelEstadoSolido = [
              "ALEACIONES",
          "COMPUESTOS",
          "CONDUCTORES METALICOS",
          "CRECIMIENTO CRISTALINO",
          "CRISTALOGRAFIA",
          "DENDRITAS",
          "DIELECTRICIDAD",
          "DIFUSION EN LOS SOLIDOS",
          "DISPOSITIVOS DE ESTADO SOLIDO",
          "ESTADOS ELECTRONICOS",
          "ESTADOS NO CRISTALINOS",
          "ESTRUCTURA CRISTALINA",
          "IMPERFECCIONES",
          "INTERACCION DE LA RADIACION CON LOS SOLIDOS",
          "INTERFACES",
          "LUMINOSIDAD",
          "MECANICA DE RETICULOS",
          "MECANOGRAFIA",
          "NANOCIENCIAS Y NANOTECNOLOGIA",
          "OTROS",
          "PROPIEDADES DE PORTADORES DE LOS ELECTRONES",
          "PROPIEDADES DE TRANSPORTE ELECTRONICO",
          "PROPIEDADES MAGNETICAS",
          "PROPIEDADES MECANICAS",
          "PROPIEDADES OPTICAS",
          "PROPIEDADES TERMODINAMICAS DE LOS SOLIDOS",
          "RESONANCIA MAGNETICA",
          "SEMICONDUCTORES",
          "SUPERCONDUCTORES",
          "SUPERFICIES",
          "TECNOLOGIA METALURGICA",
          "TRIBOLOGIA"]
      disciplineValue = fisicaDelEstadoSolido;
    }
    if(disciplineValue =="FISICA TEORICA"){
      var fisicaTeorica = [
              "CAMPOS GRAVITATORIOS",
          "CAMPOS ELECTROMAGNETICOS",
          "CAMPOS",
          "FISICA DE LA ENERGIA",
          "FOTONES",
          "GRAVITACION",
          "GRAVITONES",
          "HADRONES",
          "LEPTONES",
          "MASA",
          "OTROS",
          "PARTICULAS ELEMENTALES",
          "RADIACION ELECTROMAGNETICA",
          "TEORIA DE LA RELATIVIDAD",
          "TEORIA DE LOS CAMPOS CUANTICOS"]
      disciplineValue = fisicaTeorica;
    }
    if(disciplineValue =="TERMODINAMICA"){
      var termodinamica = [
              "ALTA PRESION",
          "ALTA TEMPERATURA",
          "BAJAS TEMPERATURAS",
          "CAMBIOS DE ESTADO",
          "EQUILIBRIOS TERMODINAMICOS",
          "FENOMENOS DE TRANSPORTE",
          "FISICA DE LA TRANSMISION DE CALOR",
          "OTROS",
          "RELACIONES TERMODINAMICAS",
          "TECNICAS DE MEDIDAS TERMICAS",
          "TEORIA CINETICA",
          "TRANSICION DE FASE",]
      disciplineValue = termodinamica;
    }
    if(disciplineValue =="UNIDADES Y CONSTANTES FISICAS"){
      var unidadesyConstantesFisicas = [
              "CONSTANTES (FISICAS)",
          "CONVERSION DE UNIDADES",
          "CALIBRACION DE UNIDADES",
          "METROLOGIA",
          "OTROS",
          "UNIDADES ESTANDAR",]
      disciplineValue = unidadesyConstantesFisicas;
    }
      if(disciplineValue =="QUIMICA ANALITICA"){
      var quimicaAnalitica = [
              "ANALISIS ELECTROQUIMICO",
          "ANALISIS BIOQUIMICO",
          "ANALISIS CROMATOGRAFICO",
          "ANALISIS DE LOS POLIMEROS",
          "ANALISIS MICROQUIMICO",
          "ANALISIS RADIOQUIMICO",
          "ESPECTROSCOPIA DE MASAS",
          "ESPECTROSCOPIA DE RAMAN",
          "ESPECTROSCOPIA INFRARROJA",
          "ESPECTROSCOPIA POR MICROONDAS",
          "ESPECTROSCOPIA DE EMISION",
          "ESPECTROSCOPIA POR RAYOS X",
          "ESPECTROSCOPIA POR RESONANCIA MAGNETICA",
          "FLUORIMETRIA",
          "FOSFORIMETRIA",
          "GRAVIMETRIA",
          "METODOS DE ANALISIS TERMICO",
          "MICROSCOPIA",
          "OTROS",
          "VOLUMETRIA",
          "ESPECTROSCOPIA DE ABSORCION"]
      disciplineValue = quimicaAnalitica;
    }
     if(disciplineValue =="BIOQUIMICA"){
      var bioquimica = [
              "ACEITES ESENCIALES",
          "ACIDOS GRASOS",
          "ACIDOS NUCLEICOS",
          "ALMIDON",
          "AMINOACIDOS",
          "ANTIMETABOLITOS",
          "BIOLOGIA MOLECULAR",
          "BIOQUIMICA FISICA",
          "BIOSINTESIS",
          "CERAS",
          "COENZIMAS",
          "ELEMENTOS TRAZA",
          "ENZIMOLOGIA",
          "ESTEROIDES",
          "FARMACOLOGIA MOLECULAR",
          "FERMENTACION",
          "FOTOSINTESIS",
          "GENETICA BIOQUIMICA",
          "GLUCIDOS",
          "HIDROCARBUROS TERPENICOS",
          "HORMONAS",
          "INMUNOQUIMICA",
          "METABOLISMO INTERMEDIO",
          "QUIMICA CLINICA",
          "REGULACION DE LA REALIMENTACION",
          "LIPIDOS",
          "OTROS",
          "PEPTIDOS",
          "PROCESOS METABOLICOS",
          "PROTEINAS",
          "QUIMICA MICROBIOLOGICA",
          "QUIMIOTERAPIA",
          "ALCALOIDES",
          "VITAMINAS"]
      disciplineValue = bioquimica;
    }

    if(disciplineValue =="QUIMICA INORGANICA"){
      var quimicaInorganica = [
              "ALQUILOS METALICOS",
          "CARBONO",
          "COMPUESTOS DEFICIENTES EN ELECTRONES",
          "COMPUESTOS DE AZUFRE",
          "COMPUESTOS DE BORO",
          "COMPUESTOS DE CLORO",
          "COMPUESTOS DE COORDINACION",
          "COMPUESTOS DE FLUOR",
          "COMPUESTOS DE FOSFORO",
          "COMPUESTOS DE NITROGENO",
          "COMPUESTOS DE SODIO",
          "COMPUESTOS ORGANOMETALICOS",
          "ELEMENTOS ALCALINOS",
          "ELEMENTOS DE TRANSICION",
          "ELEMENTOS ELECTROPOSITIVOS",
          "ELEMENTOS TRANSURANICOS",
          "ELEMENTOS SINTETICOS",
          "ESTRUCTURA DE LOS COMPUESTOS INORGANICOS",
          "GERMANIO",
          "GRAFITO",
          "HALOGENOS",
          "HIDROGENO",
          "HIDRUROS",
          "MECANISMOS DE REACCIONES INORGANICAS",
          "METALES",
          "OTROS",
          "QUIMICA DE LOS PIGMENTOS",
          "QUIMICA DEL AGUA",
          "TIERRAS ALCALINAS",
          "TIERRAS RARAS",
          "COMPUESTOS DE PLOMO",
          "QUIMICA DE LOS ACTINIDOS"]
      disciplineValue = quimicaInorganica;
    }
    if(disciplineValue =="QUIMICA DE LAS MACROMOLECULAS"){
      var quimicaDeLasMacromoleculas = [
              "ANALISIS DE LOS POLIMEROS",
          "FIBRAS SINTETICAS",
          "POLIESTIRENOS",
          "POLIETILENO",
          "POLIMEROS INORGANICOS",
          "QUIMICA DE LOS MONOMEROS",
          "CELULOSA",
          "ELASTOMEROS",
          "ESTABILIDAD DE LAS MACROMOLECULAS",
          "FIBRAS NATURALES",
          "GOMAS",
          "MACROMOLECULAS",
          "MODIFICACION DE LAS MACROMOLECULAS",
          "OTROS",
          "POLIELECTROLITOS",
          "POLIESTERES",
          "POLIMEROS COMPUESTOS",
          "POLIMEROS DISPERSOS",
          "POLIMEROS ELEVADOS",
          "POLIMEROS RETICULADOS",
          "POLIPEPTIDOS Y PROTEINAS",
          "POLISACARIDOS",
          "POLIURETANOS",
          "PLASTICOS CELULARES",
          "SINTESIS DE LAS MACROMOLECULAS"]
      disciplineValue = quimicaDeLasMacromoleculas;
    }
     if(disciplineValue =="QUIMICA NUCLEAR"){
      var quimicaNuclear = [
              "MOLECULAS MARCADAS",
          "OTROS",
          "RADIOISOTOPOS",
          "RADIOQUIMICA",
          "SEPARACION DE ISOTOPOS",
          "TRAZADORES DE ISOTOPOS",
          "QUIMICA DE LOS ATOMOS RADIACTIVOS",
          "QUIMICA DE LAS RADIACIONES"]
      disciplineValue = quimicaNuclear;
    }
     if(disciplineValue =="QUIMICA ORGANICA"){
      var quimicaOrganica = [
              "PRODUCTOS ORGANOMETALICOS",
          "QUIMICA DE LAS MATERIAS TINTOREAS",
          "QUIMICA DE LOS ESTEROIDES",
          "QUIMICA DEL CARBANION",
          "QUIMICA DEL ORGANOAZUFRE",
          "COMPUESTOS HETEROCICLICOS",
          "DERIVADOS DEL BENCENO",
          "ESTEROQUIMICA Y ANALISIS DE CONFIGURACION",
          "ESTRUCTURA DE LAS MOLECULAS ORGANICAS",
          "HIDROCARBUROS AROMATICOS",
          "HIDROCARBUROS ALIFATICOS",
          "MECANICA DE LAS REACCIONES",
          "OTROS",
          "QUIMICA BICICLICA",
          "QUIMICA DE LOS HIDRATOS DE CARBONO",
          "QUIMICA DE LOS ORGANOFOSFOROS",
          "QUIMICA DE LOS ORGANOSILICONES",
          "QUIMICA DEL CARBONIO",
          "RADICALES LIBRES"]
      disciplineValue = quimicaOrganica;
    }
    if(disciplineValue =="FARMACOBIOLOGIA"){
      var farmacobiologia = [
              "QUIMICA BIOMOLECURAR",
          "QUIMICA MEDICINAL"]
      disciplineValue = farmacobiologia;
    }
       if(disciplineValue =="BIOLOGIA ANIMAL Y ZOOLOGIA"){
      var biologiaAnimalyZoologia = [
              "ANATOMIA ANIMAL",
          "CRECIMIENTO DE LOS ANIMALES",
          "FISIOLOGIA ANIMAL",
          "CITOLOGIA ANIMAL",
          "COMPORTAMIENTO ANIMAL",
          "COMUNICACION ANIMAL",
          "DESARROLLO ANIMAL",
          "ECOLOGIA ANIMAL",
          "EMBRIOLOGIA ANIMAL",
          "GENETICA ANIMAL",
          "HERPETOLOGIA",
          "HISTOLOGIA ANIMAL",
          "INVERTEBRADOS",
          "MAMIFEROS",
          "ORNITOLOGIA",
          "OTROS",
          "PARASITOLOGIA ANIMAL",
          "PATOLOGIA ANIMAL",
          "PRIMATOLOGIA",
          "PROTOZOOLOGIA",
          "TAXONOMIA ANIMAL",
          "VERTEBRADOS",
          "ZOOLOGIA GENERAL",
          "ZOOLOGIA MARINA"]
      disciplineValue = biologiaAnimalyZoologia;
    }
       if(disciplineValue =="ANTROPOLOGIA FISICA"){
      var antroplogiaFisica = [
              "ANTROPOLOGIA MEDICA",
          "ANTROPOMETRIA Y ANTROPOLOGIA FORENSE",
          "ARCHIVOS ANTROPOLOGICOS",
          "BIOLOGIA DE LA POBLACION",
          "BIOLOGIA RACIAL",
          "COMPORTAMIENTO DE LOS PRIMATES",
          "CONSTITUCION CORPORAL",
          "CRECIMIENTO SOMATICO",
          "COMPOSICION CORPORAL",
          "HABITOS DE NUTRICION",
          "SOMATOLOGIA DE LOS PRIMATES",
          "ENVEJECIMIENTO SOMATICO",
          "ETNOLOGIA",
          "GENETICA ANTROPOLOGICA",
          "OSTEOLOGIA",
          "OTROS"]
      disciplineValue = antroplogiaFisica;
    }
     if(disciplineValue =="BIOMATEMATICA"){
      var biomatematica = [
              "BIOESTADISTICA",
              "OTROS"]
      disciplineValue = biomatematica;
    }
    if(disciplineValue =="BIOMETRIA"){
      var biometrica = [
              "BIOACUSTICA"
          ,"BIOELECTRICIDAD"
          ,"BIOENERGETICA"
          ,"BIOMECANICA"
          ,"BIOOPTICA"
          ,"FISICA MEDICA"
          ,"OTROS"]
      disciplineValue = biometrica;
    }
    if(disciplineValue =="BIOLOGIA CELULAR"){
      var biologiaCelular = [
              "CULTIVO CELULAR"
          ,"GENETICA CELULAR"
          ,"MORFOLOGIA CELULAR"
          ,"CITOLOGIA"
          ,"CULTIVO DE TEJIDOS"
          ,"OTROS"]
  disciplineValue = biologiaCelular;
    }
    if(disciplineValue =="ETOLOGIA"){
      var etopologia = [
              "ANIMAL",
          "DE LOS INSECTOS",
          "HUMANA",
          "OTROS",]
  disciplineValue = etopologia;
    }
      if(disciplineValue =="GENETICA"){
      var genetica = [
              "EMBRIOLOGIA",
          "GENETICA DE POBLACIONES",
          "INGENIERIA GENETICA",
          "OTROS"]
  disciplineValue = genetica;
    }
      if(disciplineValue =="BIOLOGIA HUMANA"){
      var biologiaHumana = [
              "EMBRIOLOGIA HUMANA",
          "FISIOLOGIA HUMANA",
          "ANATOMIA HUMANA",
          "ANATOMIA SISTEMATICA",
          "ANATOMIA TOPOGRAFICA",
          "CITOLOGIA HUMANA",
          "DESARROLLO HUMANO",
          "ECOLOGIA HUMANA,",
          "GENETICA HUMANA",
          "GRUPOS SANGUINEOS",
          "HISTOLOGIA HUMANA",
          "NEUROANATOMIA HUMANA,",
          "ORGANOS SENSORIALES",
          "OTROS"]
  disciplineValue = biologiaHumana;
    }
      if(disciplineValue =="FISIOLOGIA HUMANA"){
      var fisiologiaHumana = [
              "FISIOLOGIA DE LAS ACTITUDES",
          "ANESTESIOLOGIA",
          "FISIOLOGIA CARDIOVASCULAR,",
          "FISIOLOGIA DEL SISTEMA ENDOCRINO",
          "FISIOLOGIA DEL EJERCICIO",
          "FISIOLOGIA GASTROINTESTINAL,",
          "METABOLISMOS HUMANOS",
          "REGULACION DE LA TEMPERATURA HUMANA",
          "FISIOLOGIA MUSCULAR",
          "NEUROFISIOLOGIA",
          "FISIOLOGIA DEL SISTEMA NERVIOSO CENTRAL",
          "FISIOLOGIA DE LA AUDICION",
          "FISIOLOGIA DEL HABLA",
          "FISIOLOGIA DE LA VISION",
          "FISIOLOGIA DE LA REPRODUCCION",
          "FISIOLOGIA DE LA RESPIRACION",
          "FISIOLOGIA DE LA LOCOMOCION",
          "OTROS"]
  disciplineValue = fisiologiaHumana;
    }
          if(disciplineValue =="ENTOMOLOGIA GENERAL"){
      var entomologiaGeneral = [
              "ENTOMOLOGIA GENERAL",
          "DESARROLLO DE LOS INSECTOS",
          "ECOLOGIA DE LOS INSECTOS",
          "MORFOLOGIA DE LOS INSECTOS",
          "FISIOLOGIA DE LOS INSECTOS",
          "TAXONOMIA DE LOS INSECTOS",
          "OTROS"]
  disciplineValue = entomologiaGeneral;
    }
         if(disciplineValue =="MICROBIOLOGIA"){
      var microbiologia = [
              "ANTIBIOTICOS",
          "FISIOLOGIA BACTERIANA",
          "METABOLISMO BACTERIANO",
          "BACTERIOLOGIA",
          "BACTERIOFAGOS",
          "HONGOS",
          "METABOLISMO MICROBIANO",
          "PROCESOS MIROCROBIANOS",
          "MOHOS",
          "MICOLOGIA (LEVADURAS)",
          "OTROS"]
  disciplineValue = microbiologia;
    }
           if(disciplineValue =="PALEONTOLOGIA"){
      var paleontologia = [
              "PALEONTOLOGIA ANIMAL",
          "PALEONTOLOGIA DE LOS INVERTEBRADOS",
          "PALINOLOGIA",
          "PALEONTOLOGIA VEGETAL",
          "PALEONTOLOGIA DE LOS VERTEBRADOS",
          "OTROS"]
  disciplineValue = paleontologia;
    }
          if(disciplineValue =="BOTANICA"){
      var botanica = [
              "BRIOLOGIA",
          "DENDROLOGIA",
          "BOTANICA GENERAL",
          "LIMNOLOGIA",
          "BIOLOGIA MARINA",
          "MICOLOGIA (HONGOS)",
          "FICOLOGIA",
          "FOTOBIOLOGIA",
          "FITOPATOLOGIA",
          "PALEOBOTANICA",
          "ANATOMIA VEGETAL",
          "CITOLOGIA VEGETAL",
          "ECOLOGIA VEGETAL",
          "GENETICA VEGETAL",
          "CRECIMIENTO DE LAS PLANTAS",
          "HISTOLOGIA VEGETAL",
          "NUTRICION DE LAS PLANTAS",
          "PARASITOLOGIA VEGETAL",
          "FISIOLOGIA VEGETAL",
          "TAXONOMIA VEGETAL",
          "TERIDOLOGIA",
          "OTROS",]
  disciplineValue = botanica;
    }
           if(disciplineValue =="VIROLOGIA"){
      var virologia = [
              "ARBOVIRUS",
          "BACTERIOFAGOS",
          "VIRUS DERMATROPICOS",
          "VIRUS ENTERICOS",
          "VIRUS NEUROTROPICOS",
          "VIRUS PANTROPICOS",
          "POXVIRUS",
          "VIRUS DEL SISTEMA RESPIRATORIO",
          "VIRUS VISCEROTROPICOS",
          "OTROS"]
  disciplineValue = virologia;
    }
      if(disciplineValue =="MEDIO AMBIENTE"){
      var medioAmbiente = [
            "GESTIÓN AMBIENTAL"]
  disciplineValue = medioAmbiente;
    }
     if(disciplineValue =="CIENCIAS ATMOSFERICAS"){
      var cienciasAtmosfericas = [
            "AERONOMIA",
        "RESPLANDOR CELESTE",
        "INTERACCION AIRE-MAR",
        "ACUSTICA DE LA ATMOSFERA",
        "QUIMICA DE LA ATMOSFERA",
        "DINAMICA DE LA ATMOSFERA",
        "ELECTRICIDAD ATMOSFERICA",
        "OPTICA DE LA ATMOSFERA",
        "RADIACTIVIDAD ATMOSFERICA",
        "ESTRUCTURA DE LA ATMOSFERA",
        "TERMODINAMICA DE LA ATMOSFERA",
        "TURBULENCIA ATMOSFERICA",
        "AURORA",
        "FISICA DE LAS NUBES",
        "RAYOS COSMICOS",
        "DIFUSION ATMOSFERICA",
        "PULSACIONES GEOMAGNETICAS",
        "IONOSFERA",
        "PARTICULAS MAGNETOSFERICAS",
        "ONDAS MAGNETOSFERICAS",
        "MODELIZACION NUMERICA",
        "FISICA DE LAS PRECIPITACIONES",
        "TRANSFERENCIA RADIACTIVA",
        "RADIACION SOLAR",
        "OTROS"]
  disciplineValue = cienciasAtmosfericas;
    }

    if(disciplineValue =="CLIMATOLOGIA"){
      var climatologia = [ "BIOCLIMATOLOGIA",
      "CLIMATOLOGIA ANALITICA",
      "CLIMATOLOGIA APLICADA",
      "CLIMATOLOGIA FISICA",
      "CLIMATOLOGIA REGIONAL",
      "MICROCLIMATOLOGIA",
      "OTROS",
      "PALEOCLIMATOLOGIA"]
  disciplineValue = climatologia;
    }

     if(disciplineValue =="GEOQUIMICA"){
      var geoquimica = ["COSMOQUIMICA",
      "PETROLOGIA EXPERIMENTAL",
      "GEOQUIMICA DE EXPLORACION",
      "GEOCRONOLOGIA Y RADIOISOTOPOS",
      "GEOQUIMICA DE ALTA TEMPERATURA",
      "EOQUIMICA DE BAJA TEMPERATURA",
      "GEOQUIMICA ORGANICA",
      "ISOTOPOS ESTABLES",
      "DISTRIBUCION DE ELEMENTOS TRAZA",
      "OTROS"]
  disciplineValue = geoquimica;
    }

     if(disciplineValue =="GEODESIA"){
      var geodesia = ["ASTRONOMIA GEODESICA",
      "CARTOGRAFIA GEODESICA",
      "NAVEGACION GEODESICA",
      "FOTOGRAMETRIA GEODESICA",
      "EXPLORACION"]
  disciplineValue = geodesia;
    }
     if(disciplineValue =="GEOGRAFIA"){
      var geografia = [
        "BIOGEOGRAFIA",
        "CARTOGRAFIA GEOGRAFICA",
        "GEOGRAFIA DE LOS RECURSOS NATURALES",
        "GEOGRAFIA FISICA",
        "GEOGRAFIA MEDICA",
        "GEOGRAFIA TOPOGRAFICA",
        "TEORIA DE LA SITUACION",
        "USO DE LAS TIERRAS",
        "OTROS"]
  disciplineValue = geografia;
    }
      if(disciplineValue =="GEOLOGIA"){
      var geologia = [
        "ANALISIS DE DIAGRAMAS DE POZO",
        "ECONOMIA DE LOS HIDROCARBUROS",
        "ESTRATIGRAFIA",
        "EXPLORACION GEOLOGICA",
        "FOTOGEOLOGIA",
        "GEOHIDROLOGIA",
        "GEOLOGIA DE LAS DIVERSAS AREAS DE LA SUPERFICIE TERRESTRE",
        "GEOLOGIA DEL CARBON",
        "GEOLOGIA DEL MEDIO AMBIENTE",
        "GEOLOGIA DEL PETROLEO",
        "GEOLOGIA ESTRUCTURAL",
        "GEOLOGIA GLACIAL",
        "GEOMORFOLOGIA",
        "INGENIERIA GEOLOGICA",
        "MECANICA DE LAS ROCAS",
        "MINERALOGIA",
        "PETROLOGIA IGNEA Y METAMORFICA",
        "PETROLOGIA SEDIMENTARIA",
        "PROCESOS Y ENERGIA GEOTERMICOS",
        "SEDIMENTOLOGIA",
        "TELEDETECCION (GEOLOGIA)",
        "VULCANOLOGIA",
        "YACIMIENTOS MINERALES",
        "OTROS"]
  disciplineValue = geologia;
    }
     if(disciplineValue =="GEOFISICA"){
      var geofisica = [
        "EXPLORACION GEOFISICA",
        "FLUJO DE CALOR (TERRESTRE)",
        "GEOFISICA DE LA TIERRA SOLIDA",
        "GEOMAGNETISMO Y EXPLORACION MAGNETICA",
        "GRAVEDAD TERRESTRE Y EXPLORACION DE LA GRAVEDAD",
        "PALEOMAGNETISMO",
        "SISMOLOGIA Y EXPLORACION SISMICA",
        "TECTONICA",
        "OTROS"]
  disciplineValue = geofisica;
    }
     if(disciplineValue =="HIDROLOGIA"){
      var hidrologia = [
        "AGUAS SUBTERRANEAS",
        "AGUAS SUPERFICIALES",
        "CALIDAD DEL AGUA",
        "EROSION DEL AGUA",
        "EVAPORACION",
        "GLACIOLOGIA",
        "HIDROBIOLOGIA",
        "HIDROGRAFIA",
        "HIELO",
        "HUMEDAD DEL SUELO",
        "LIMNOLOGIA",
        "NIEVE",
        "PRECIPITACIONES",
        "SUELOS HELADOS",
        "TRANSPIRACION",
        "OTROS"]
  disciplineValue = hidrologia;
    }
       if(disciplineValue =="METEOROLOGIA"){
      var metereologia = [
        "ANALISIS METEOROLOGICO",
        "CONTAMINACION DEL AIRE",
        "CONTROL DEL TIEMPO (METEOROLOGIA)",
        "HIDROMETEOROLOGIA",
        "INSTRUCCIONES DE OBSERVACION (METEOROLOGIA)",
        "MESOMETEOROLOGIA",
        "METEOROLOGIA AGRICOLA",
        "METEOROLOGIA INDUSTRIAL",
        "METEOROLOGIA MARINA",
        "METEOROLOGIA MEDIANTE COHETES",
        "METEOROLOGIA MEDIANTE SATELITES",
        "METEOROLOGIA POLAR",
        "METEOROLOGIA POR RADAR",
        "METEOROLOGIA SINOPTICA",
        "METEOROLOGIA TROPICAL",
        "MICROMETEOROLOGIA",
        "PREDICCION METEOROLOGICA NUMERICA",
        "PREVISION METEOROLOGICA OPERACIONAL",
        "PREVISION METEOROLOGICA PROLONGADA",
        "RADIOMETEOROLOGIA",
        "OTROS"]
  disciplineValue = metereologia;
    }
     if(disciplineValue =="OCEANOGRAFIA"){
      var oceonografia = [
      "BOTANICA MARINA",
      "HIELO MARINO",
      "INTERACCIONES MAR-AIRE",
      "OCEANOGRAFIA BIOLOGICA",
      "OCEANOGRAFIA DESCRIPTIVA",
      "OCEANOGRAFIA FISICA",
      "OCEANOGRAFIA QUIMICA",
      "PROCESOS DE LAS COSTAS Y DE LAS AREAS PROXIMAS A LAS COSTAS",
      "PROCESOS DEL FONDO DEL MAR",
      "SONIDOS SUBMARINOS",
      "ZOOLOGIA MARINA",
      "OTROS"]
  disciplineValue = oceonografia;
    }
      if(disciplineValue =="CIENCIAS DEL SUELO"){
      var cienciasDelSuelo = [
      "BIOLOGICA DE SUELOS",
      "BIOQUIMICA DEL SUELO",
      "CARTOGRAFIA DE SUELOS",
      "CLASIFICACION DE SUELOS",
      "CONSERVACION DEL SUELO",
      "FISICA DEL SUELO",
      "INGENIERIA EDAFOLOGICA",
      "MECANICA DEL SUELO (AGRICULTURA)",
      "MICROBIOLOGIA DE LOS SUELOS",
      "MINERALOGIA DE LOS SUELOS",
      "MORFOLOGIA Y GENESIS DE LOS SUELOS",
      "QUIMICA DEL SUELO",
      "OTROS"]
  disciplineValue = cienciasDelSuelo;
    }
     if(disciplineValue =="CIENCIAS DEL COSMOS"){
      var cienciasDelCosmos = [
      "BIOLOGIA ESPACIAL",
      "FISIOLOGIA ESPACIAL",
      "MEDICINA AEROSPACIAL",
      "OTROS"]
  disciplineValue = cienciasDelCosmos;
    }
      if(disciplineValue =="SALUD PÚBLICA"){
      var saludPublica = [
      "ADMINISTRACIÓN DE LOS SERVICIOS DE SALUD",
        "ANTROPOLOGÍA MÉDICA",
        "EPIDEMIOLOGÍA",
        "OTROS"]
  disciplineValue = saludPublica;
    }
     if(disciplineValue =="INVESTIGACIÓN EN SALUD"){
      var investigacionEnSalud = [
      "BIOMEDICINA",
      "INVESTIGACION CLÍNICA",
      "INVESTIGACIÓN EN ADICCIONES",
      "SISTEMAS DE SALUD",
      "OTROS"]
  disciplineValue = investigacionEnSalud;
    }
       if(disciplineValue =="ENFERMERÍA"){
      var enfermeria = [
      "SALUD MATERNA"]
  disciplineValue = enfermeria;
    }
       if(disciplineValue =="QUIMICA AGRONOMICA"){
      var quimicaAgronomica = [
      "BIOQUIMICA AGRONOMICA",
      "FUNGICIDAS",
      "HERBICIDAS",
      "INSECTICIDAS",
      "PLAGUICIDAS",
      "PRODUCTOS DE CULTIVOS NO COMESTIBLES",
      "PRODUCTOS DE PESCADO",
      "PRODUCTOS LACTEOS",
      "REGULADORES DEL CRECIMIENTO DE LAS PLANTAS",
      "TECNICAS DE PRODUCCION DE FERTILIZANTES",
      "USO DE FERTILIZANTES",
      "OTROS"]
  disciplineValue = quimicaAgronomica;
    }
     if(disciplineValue =="INGENIERIA RURAL"){
      var ingenieriaRural = [
      "CONSTRUCCION RURAL",
      "DRENAJE",
      "EQUIPO DE GRANJA",
      "MECANICA AGRICOLA",
      "RIEGO",
      "OTROS"]
  disciplineValue = ingenieriaRural;
    }
       if(disciplineValue =="AGRONOMIA"){
      var agronomia = [
      "AGRICULTURA EN ZONAS ARIDAS",
      "AGRICULTURA EN ZONAS TEMPLADAS",
      "AGRICULTURA EN ZONAS TROPICALES",
      "CESPED",
      "COMPORTAMIENTO DEL SUELO CON UTILIZACIONES ALTERNADAS",
      "CONTROL DE MALEZAS",
      "CULTIVOS DE CAMPO",
      "CULTIVOS FORRAJEROS",
      "CULTIVOS ORNAMENTALES",
      "DIVULGACION Y EXTENSION AGRICOLA",
      "FERTILIDAD DEL SUELO",
      "FITOGENETICA",
      "GESTION DE CULTIVOS",
      "GESTION DE LA PRODUCCION VEGETAL",
      "HIBRIDACION DE CULTIVOS",
      "PASTIZALES",
      "PROTECCION DE CULTIVOS",
      "SEMILLAS",
      "TECNOLOGIA DE CULTIVOS",
      "OTROS"]
  disciplineValue = agronomia;
    }
        if(disciplineValue =="CIENCIAS VETERINARIAS"){
      var cienciasVeterinarias = [
      "APICULTURA",
      "ATENCION Y GESTION",
      "AVES DE CORRAL",
      "BOVINOS",
      "CONTROL Y NORMAS",
      "CUNICULTURA",
      "EQUINOS",
      "GENETICA",
      "INSTRUMENTACION",
      "NUTRICION",
      "OVINOS",
      "PORCINOS",
      "PRODUCTOS",
      "REPRODUCCION",
      "SELECCION",
      "SERICULTURA",
      "ZOOTECNIA GENERAL",
      "OTROS"]
  disciplineValue = cienciasVeterinarias;
    }
        if(disciplineValue =="PECES Y ANIMALES SALVAJES"){
      var pecesYAnimalesSalvajes = [
      "BIOLOGIA PESQUERA",
      "CAZA (ANIMALES)",
      "CONSERVACION Y ORDENAMIENTO DE LOS ANIMALES SALVAJES",
      "CONTROLES",
      "DINAMICA POBLACIONES",
      "ELABORACION DEL PESCADO",
      "HABITOS DE ALIMENTACION",
      "INFLUENCIAS DEL HABITAT",
      "LOCALIZACION DE PECES",
      "MECANICA DE LA PESCA",
      "PISCICULTURA",
      "PROPAGACION Y ORDENAMIENTO",
      "PROTECCION DE PECES",
      "OTROS"]
  disciplineValue = pecesYAnimalesSalvajes;
    }
      if(disciplineValue =="HORTICULTURA"){
      var horticultura = [
      "FITOGENETICA",
      "FLORICULTURA",
      "FRUTAS",
      "HIBRIDACION",
      "HORTALIZAS",
      "TECNICAS DE CULTIVO",
      "OTROS"]
  disciplineValue = horticultura;
    }
      if(disciplineValue =="FITOPATOLOGIA"){
      var fitopatologia = [
      "BACTERIAS",
      "CONTROL AMBIENTAL DE ENFERMEDADES",
      "CONTROL BIOLOGICO DE ENFERMEDADES",
      "CONTROL QUIMICO DE ENFERMEDADES",
      "FISIOGENESIS",
      "HONGOS",
      "NEMATODOS",
      "SENSIBILIDAD Y RESISTENCIA DE LAS PLANTAS",
      "VIRUS",
      "OTROS"]
  disciplineValue = fitopatologia;
    }
         if(disciplineValue =="CIENCIAS VETERINARIAS"){
      var cienciasVeterinarias = [
      "ANATOMIA",
      "ANESTESIOLOGIA",
      "BIOQUIMICA",
      "CIRUGIA",
      "FARMACOLOGIA",
      "FISIOLOGIA",
      "GENETICA",
      "HEMATOLOGIA",
      "INMUNOLOGIA",
      "MEDICINA INTERNA",
      "MICROBIOLOGIA",
      "MORFOLOGIA",
      "NUTRICION",
      "OBSTETRICIA",
      "PATOLOGIA",
      "RADIOLOGIA",
      "VIROLOGIA",
      "OTROS"]
  disciplineValue = cienciasVeterinarias;
    }
        if(disciplineValue =="MEDICINA CLINICA"){
      var medicinaClinica = [
      "CANCEROLOGIA",
      "DERMATOLOGIA",
      "GENETICA CLINICA",
      "GERIATRIA",
      "GINECOLOGIA",
      "MICROBIOLOGIA CLINICA",
      "OFTALMOLOGIA",
      "PATOLOGIA CLINICA",
      "PEDIATRIA",
      "PSICOLOGIA CLINICA",
      "RADIOLOGIA",
      "RADIOTERAPIA",
      "SIFILOGRAFIA",
      "OTROS"]
  disciplineValue = medicinaClinica;
    }
      if(disciplineValue =="MEDICINA DEL TRABAJO"){
      var medicinaDelTrabajo = [
      "ENFERMEDADES PROFESIONALES",
      "MEDICINA NUCLEAR",
      "REHABILITACION MEDICA",
      "SANIDAD DEL TRABAJO",
      "OTROS"]
  disciplineValue = medicinaDelTrabajo;
    }
      if(disciplineValue =="MEDICINA INTERNA"){
      var medicinaInterna = [
      "CARDIOLOGIA",
      "ENDOCRINOLOGIA",
      "ENFERMEDADES INFECCIOSAS",
      "ENFERMEDADES PULMONARES",
      "GASTROENTEROLOGIA",
      "HEMATOLOGIA",
      "NEFROLOGIA",
      "NEUROLOGIA",
      "REUMATOLOGIA",
      "OTROS"]
  disciplineValue = medicinaInterna;
    }
      if(disciplineValue =="NUTRICION"){
      var nutricion = [
      "DEFICIENCIAS ALIMENTARIAS",
      "DIGESTION",
      "ELEMENTOS MINERALES DE LOS ALIMENTOS",
      "ELEMENTOS TRAZA EN LOS ALIMENTOS",
      "ENFERMEDADES NUTRICIONALES",
      "INTOXICANTES NATURALES",
      "METABOLISMO DE LA ENERGIA",
      "NECESIDADES ALIMENTARIAS",
      "NUTRIENTES",
      "PATOGENOS DE LOS ALIMENTOS",
      "TOXICIDAD DE LOS ALIMENTOS",
      "VALORES NUTRIENTES",
      "VITAMINAS",
      "OTROS"]
  disciplineValue = nutricion;
    }
      if(disciplineValue =="PATOLOGIA"){
      var patologia = [
      "ALERGIAS",
      "ARTERIOSCLEROSIS",
      "CARCINOGENESIS",
      "ENDOTOXINAS",
      "HEMATOLOGIA",
      "HISTOPATOLOGIA",
      "INMUNOPATOLOGIA",
      "NEUROPATOLOGIA",
      "ONCOLOGIA",
      "OSTEOPATOLOGIA",
      "PARASITOLOGIA",
      "PATOLOGIA CARDIOVASCULAR",
      "PATOLOGIA COMPARADA",
      "PATOLOGIA DE LAS RADIACIONES",
      "PATOLOGIA EXPERIMENTAL",
      "STRESS",
      "TERATOLOGIA",
      "TROMBOSIS",
      "OTROS"]
  disciplineValue = patologia;
    }
      if(disciplineValue =="FARMACODINAMICA"){
      var farmacodinamica = [
      "ABSORCION DE LOS MEDICAMENTOS",
      "ACTIVACION",
      "AUTOCATALISIS",
      "CATALISIS",
      "EFECTO DE LOS MEDICAMENTOS",
      "INMUNOCATALISIS",
      "INTERACCION DE ANTIGENOS",
      "LUGARES RADIACTIVOS",
      "MECANISMOS DE ACCION DE LOS MEDICAMENTOS",
      "PROCESOS METABOLICOS DE LOS MEDICAMENTOS",
      "PROCESOS MULTIPLES",
      "RECEPTORES",
      "TERAPIA CON MEDICAMENTOS",
      "OTROS"]
  disciplineValue = farmacodinamica;
    }
        if(disciplineValue =="FARMACOLOGIA"){
      var farmacologia = [
      "ANALISIS DE LOS PRODUCTOS FARMACEUTICOS",
      "COMPOSICION DE LOS MEDICAMENTOS",
      "EVALUACION DE LOS MEDICAMENTOS",
      "FARMACIA GALENICA",
      "FARMACOGNOSIA",
      "FARMACOPEAS",
      "FITOFARMACOS",
      "MEDICAMENTOS DE ORIGEN NATURAL",
      "MEDICAMENTOS SINTETICOS",
      "NORMALIZACION DE LOS MEDICAMENTOS",
      "PSICOFARMACOLOGIA",
      "RADIOFARMACOS",
      "OTROS"]
  disciplineValue = farmacologia;
    }
       if(disciplineValue =="MEDICINA QUIRURGICA"){
      var medicinaQuirurgica = [
      "ANESTESIOLOGIA",
      "CIRUGIA ABDOMINAL",
      "CIRUGIA CARDIACA",
      "CIRUGIA DE TRANSPLANTES",
      "CIRUGIA ESTETICA",
      "CIRUGIA EXPERIMENTAL",
      "CIRUGIA MAXILO-FACIAL",
      "CIRUGIA OCULAR",
      "CIRUGIA ORTOPEDICA",
      "CIRUGIA OSEA",
      "CIRUGIA OTORRINOLARINGOLOGICA",
      "CIRUGIA VASCULAR",
      "ENDODONCIA",
      "ESTOMATOLOGIA-ORTODONCIA",
      "EXODONCIA",
      "FISIOTERAPIA",
      "NEUROCIRUGIA",
      "PARADONCIA",
      "PROCTOLOGIA",
      "PROSTODONCIA",
      "TRAUMATOLOGIA",
      "UROLOGIA",
      "OTROS"]
  disciplineValue = medicinaQuirurgica;
    }
      if(disciplineValue =="TECNOLOGIA E INGENIERIA AERONAUTICA"){
      var tecnologiaeIngenieriaAeronautica = [
      "A LA ROTATORIA",
      "AERODINAMICA",
      "AERONAVES",
      "AEROPUERTOS Y TRANSPORTE AEREO",
      "CARGAS AERODINAMICAS",
      "CARGAS DE ATERRIZAJE",
      "COMBUSTIBLE PARA AERONAVES COMBUSTION",
      "COMPRESORES Y TURBINAS",
      "DISPOSITIVOS DE SUSPENSION NEUMATICA",
      "ESTABILIDAD Y CONTROL",
      "ESTRUCTURAS DE AERONAVES",
      "HIDRODINAMICA",
      "INSTRUMENTACION (AVIACION)",
      "MATERIALES PARA SISTEMAS DE PROPULSION",
      "SISTEMAS DE PROPULSION",
      "TEMBLOR Y VIBRACION",
      "TEORIA AERODINAMICA",
      "VUELOS: ENSAYO E INVESTIGACION",
      "OTROS"]
  disciplineValue = tecnologiaeIngenieriaAeronautica;
    }
        if(disciplineValue =="TECNOLOGIA BIOQUIMICA"){
      var tecnologiaBioquimica = [
      "BIOTECNOLOGIA MARINA",
      "MICROBIOLOGIA INDUSTRIAL",
      "TECNOLOGIA DE LA FERMENTACION",
      "TECNOLOGIA DE LOS ANTIBIOTICOS",
      "OTROS"]
  disciplineValue = tecnologiaBioquimica;
    }
        if(disciplineValue =="TECNOLOGIA E INGENIERIA QUIMICA"){
      var tecnologiaeIngenieriaQuimica = [
      "DESIONIZACION",
      "ECONOMIA QUIMICA",
      "GALVANOPLASTIA",
      "OPERACIONES ELECTROQUIMICAS",
      "PROCESOS NUCLEOQUIMICOS",
      "PROCESOS QUIMICOS",
      "PROYECTOS",
      "QUIMICA INDUSTRIAL",
      "RECUBRIMIENTOS IMPERMEABLES",
      "RECUBRIMIENTOS PROTECTORES",
      "RECUBRIMIENTOS REFRACTARIOS",
      "SEPARACION QUIMICA",
      "SINTESIS QUIMICA",
      "TECNOLOGIA DE LA CATALISIS",
      "TECNOLOGIA DE LA COMBUSTION",
      "TECNOLOGIA DE LA CORROSION",
      "TECNOLOGIA DE LA PRESERVACION",
      "OTROS"]
  disciplineValue = tecnologiaeIngenieriaQuimica;
    }
      if(disciplineValue =="TECNOLOGIA DE LA INFORMATICA"){
      var tecnologiaDeLaInformatica = [
      "ARITMETICA E INSTRUCCIONES PARA LA UTILIZACION DE MAQUINAS",
      "ARQUITECTURA DE COMPUTADORES",
      "COMPUTADORES ANALOGICOS",
      "COMPUTADORES DIGITALES",
      "COMPUTADORES HIBRIDOS",
      "CONVERTIDORES DE SISTEMA ANALOGICO A SISTEMA NUMERICO",
      "DISEÑO DE SISTEMAS DE CALCULO NUMERICO",
      "DISEÑO LOGICO",
      "DISPOSITIVOS DE ALMACENAMIENTO",
      "DISPOSITIVOS DE CONTROL",
      "DISPOSITIVOS DE TRANSMISION DE DATOS",
      "EQUIPO PERIFERICO DE COMPUTADORES",
      "FIABILIDAD DE LOS COMPUTADORES",
      "SISTEMAS DE RECONOCIMIENTO DE CARACTERES",
      "SISTEMAS DE TIEMPO REAL",
      "TERMINALES DE COMPUTADOR TERMINALES DE VIDEO Y TRAZADORES DE CURVAS",
      "UNIDADES CENTRALES DE TRATAMIENTO",
      "UTILIZABILIDAD DE LOS COMPUTADORES",
      "OTROS"]
  disciplineValue = tecnologiaDeLaInformatica;
    }
     if(disciplineValue =="TECNOLOGIA DE LA CONSTRUCCION"){
      var tecnologiaDeLaConstruccion = [
      "ABASTECIMIENTO DE AGUA",
      "ALCANTARILLADO Y PURIFICACION DE AGUA",
      "CARRETERAS",
      "CASAS",
      "CIMIENTOS",
      "CODIGOS Y ESPECIFICACIONES",
      "CONSTRUCCION DE AEROPUERTOS",
      "CONSTRUCCION DE CARRETERAS",
      "CONSTRUCCION DE FERROCARRILES",
      "CONSTRUCCION DE MADERA",
      "CONSTRUCCIONES LIGERAS",
      "CONSTRUCCIONES METALICAS",
      "CONSTRUCCIONES PESADAS",
      "CONSTRUCCIONES PREFABRICADAS",
      "DISEÑO ARQUITECTONICO",
      "DRENAJE",
      "EDIFICIOS GRANDES Y RASCACIELOS",
      "EDIFICIOS INDUSTRIALES Y COMERCIALES",
      "EDIFICIOS PUBLICOS",
      "EXCAVACIONES",
      "HORMIGON PRETENSADO",
      "INGENIERIA CIVIL",
      "INGENIERIA ESTRUCTURAL",
      "INGENIERIA HIDRAULICA",
      "MECANICA DEL SUELO (CONSTRUCCION)",
      "METROLOGIA DE LA CONSTRUCCION",
      "OBRAS SUBTERRANEAS",
      "ORGANIZACION DE OBRAS",
      "OTROS",
      "PLANIFICACION URBANA",
      "PRESAS",
      "PUENTES",
      "PUERTOS",
      "REGLAMENTACIONES",
      "RESISTENCIA ESTRUCTURAL",
      "RIEGO",
      "SISTEMAS HIPERESTATICOS",
      "TECNOLOGIA DEL HORMIGON",
      "TOPOGRAFIA DE LA CONSTRUCCION",
      "TUNELES",
      "VIAS NAVEGABLES INTERIORES"]
  disciplineValue = tecnologiaDeLaConstruccion;
    }
    if(disciplineValue =="TECNOLOGIA E INGENIERIA DE LA ELECTRICIDAD"){
      var tecnologiaeIngenieriaDeLaElectricidad = [
      "APARATO DE CONEXION",
      "APLICACIONES DE LA ELECTRICIDAD",
      "CONDUCTORES AISLADOS",
      "FABRICACION DE EQUIPO ELECTRICO",
      "ILUMINACION ELECTRICA",
      "MAQUINARIA ROTATORIA",
      "MOTORES ELECTRICOS",
      "OTROS",
      "TRANSMISION Y DISTRIBUCION",
      "UTILIZACION DE LA ENERGIA DE LAS CORRIENTES CONTINUAS"]
  disciplineValue = tecnologiaeIngenieriaDeLaElectricidad;
    }
       if(disciplineValue =="TECNOLOGIA ELECTRONICA"){
      var tecnologiaElectronica = [
      "ANTENAS",
      "AUDIOELECTRONICA",
      "DISEÑO DE CIRCUITOS",
      "DISEÑO DE FILTROS",
      "DISPOSITIVOS DE GRABACION",
      "DISPOSITIVOS DE LASER",
      "DISPOSITIVOS DE MICROONDA",
      "DISPOSITIVOS DE RAYOS X",
      "DISPOSITIVOS DE SEMICONDUCTORES",
      "DISPOSITIVOS DE SONAR",
      "DISPOSITIVOS FOTOELECTRICOS",
      "DISPOSITIVOS SONICOS",
      "DISPOSITIVOS TERMOELECTRICOS",
      "DISPOSITIVOS TERMOIONICOS",
      "DISPOSITIVOS ULTRASONICOS",
      "EMISORES DE TELEVISION (TRANSMISORES)",
      "OTROS",
      "RADAR",
      "RECEPTORES DE RADIO",
      "RECEPTORES DE TELEVISION",
      "TRADUCTORES ELECTROACUSTICOS",
      "TRANSISTORES",
      "TRANSMISORES DE RADIO",
      "TUBOS ELECTRONICOS"]
  disciplineValue = tecnologiaElectronica;
    }
    if(disciplineValue =="TECNOLOGIA DEL MEDIO AMBIENTE"){
      var tecnologiaDelMedioAmbiente = [
    "AMBIENTAL",
    "CONTROL DE LA CONTAMINACION DEL AGUA",
    "DESECHOS INDUSTRIALES",
    "ECOSISTEMAS RECUPERACION DE",
    "EDUCACION",
    "ELIMINACION DE DESECHOS RADIACTIVOS",
    "MATERIALES",
    "OTROS",
    "RECUPERACION DEL AGUA",
    "REUSO Y RECICLADO",
    "TECNOLOGIA ANTICONTAMINACION",
    "TECNOLOGIA DE CONTROL DE INSECTOS",
    "TECNOLOGIA DE CONTROL DE ROEDORES",
    "TECNOLOGIA SANITARIA",
    "CONTROL DE LA CONTAMINACION DEL AIRE",
    "ELIMINACION DE RESIDUOS",
    "TECNOLOGIA DE LAS AGUAS CLOACALES",
    "TECNOLOGIA LIMPIA"]
  disciplineValue = tecnologiaDelMedioAmbiente;
    }
    if(disciplineValue =="TECNOLOGIA DE LA ALIMENTACION"){
      var tecnologiaDelAlimentacion = [
    "ACEITES Y GRASAS VEGETALES",
    "ADITIVOS ALIMENTARIOS",
    "ALIMENTOS PARA ANIMALES",
    "ALIMENTOS PROTEICOS",
    "ALIMENTOS SINTETICOS",
    "ALMIDON",
    "ANTIOXIDANTES EN LOS ALIMENTOS",
    "AROMATIZANTES",
    "AZUCAR",
    "BEBIDAS ALCOHOLICAS",
    "BEBIDAS NO ALCOHOLICAS",
    "COLORANTES",
    "CONSERVACION DE ALIMENTOS",
    "ELABORACION DE ALIMENTOS",
    "ESTABILIZADORES",
    "ESTERILIZACION DE LOS ALIMENTOS",
    "HIGIENE DE LOS ALIMENTOS",
    "INDUSTRIA CERVECERA",
    "LIOFILIZACION",
    "MOLINERIA",
    "OTROS",
    "PANADERIA",
    "PASTEURIZACION",
    "PREPARACION DE CONSERVAS",
    "PRODUCTOS DE CEREALES",
    "PRODUCTOS LACTEOS",
    "PROPIEDADES DE LOS ALIMENTOS",
    "REFRIGERACION",
    "SECADO POR CONGELACION",
    "VINO"]
  disciplineValue = tecnologiaDelAlimentacion;
    }
    if(disciplineValue =="TECNOLOGIA INDUSTRIAL"){
      var tecnologiaIndistrial = [
    "DISEÑO",
    "EQUIPO INDUSTRIAL",
    "ESPECIFICACIONES DE PROCESOS",
    "ESTUDIOS DE TIEMPOS Y MOVIMIENTOS",
    "MAQUINARIA INDUSTRIAL",
    "OTROS",
    "PROCESOS INDUSTRIALES",
    "SISTEMAS",
    "TECNOLOGIA DE LA ELABORACION",
    "TECNOLOGIA DEL MANTENIMIENTO"]
  disciplineValue = tecnologiaIndistrial;
    }
    if(disciplineValue =="INSTRUMENTAL TECNOLOGICO"){
      var instrumentalTecnologico = [
    "CONTROL DE MAQUINARIA",
    "DISPOSITIVOS ELECTROOPTICOS",
    "EQUIPO DE ENSAYOS ELECTRICOS",
    "EQUIPO DE LABORATORIO",
    "EQUIPO DE PRUEBA",
    "EQUIPO FOTOGRAFICO Y CINEMATOGRAFICO",
    "INSTRUMENTAL CIENTIFICO",
    "INSTRUMENTOS DE MEDIDA DEL TIEMPO",
    "INSTRUMENTOS DE MEDIDAS TERMICAS",
    "INSTRUMENTOS DENTALES",
    "INSTRUMENTOS ELECTRICOS",
    "INSTRUMENTOS ELECTRONICOS",
    "INSTRUMENTOS MEDICOS",
    "INSTRUMENTOS OPTICOS",
    "LENTES",
    "OTROS",
    "TECNICAS TELEQUIRICAS",
    "INSTRUMENTOS TERMOSTATICOS",
    "SERVOMECANISMOS",
    "TECNOLOGIA DE LA AUTOMATIZACION"]
  disciplineValue = instrumentalTecnologico;
    }
      if(disciplineValue =="TECNOLOGIA DE LAS MATERIAS"){
      var tecnologiaDeLasMaterias = [
    "CALIZOS",
    "CEMENTOS",
    "CERAMETAL (MATERIAL METALOCERAMICO)",
    "CERAMICA",
    "COMPOSITOS",
    "MATERIALES FUNCIONALES",
    "OTROS",
    "PLASTICOS",
    "PRODUCTOS DE LA ARCILLA",
    "PROPIEDADES DE LOS MATERIALES",
    "REFRACTARIOS",
    "RESISTENCIA DE LOS MATERIALES",
    "TECNOLOGIA DE LA MADERA",
    "ABRASIVOS",
    "ENSAYO DE MATERIALES",
    "VIDRIO"]
  disciplineValue = tecnologiaDeLasMaterias;
    }
     if(disciplineValue =="TECNOLOGIA MECANICA"){
      var tecnologiaMecanica = [
    "APLICACIONES MECANIZADAS",
    "BOMBAS Y EQUIPO DE MANEJO DE LIQUIDOS",
    "COJINETES",
    "COMPRESORES DE AIRE",
    "DISEÑO DE MAQUINAS",
    "ENGRANAJES",
    "EQUIPO DE CALEFACCION",
    "EQUIPO DE CONSTRUCCION",
    "EQUIPO DE REFRIGERACION",
    "EQUIPO DE TRANSMISION DE ENERGIA (MECANICA)",
    "EQUIPO NEUMATICO",
    "HERRAMIENTA Y ACCESORIOS",
    "MAQUINARIA AGRICOLA",
    "MAQUINARIA DE EXTRACCION DE PETROLEO",
    "MAQUINARIA DE FABRICACION DE PAPEL",
    "MAQUINARIA DE IMPRIMIR Y DUPLICAR",
    "MAQUINARIA DE LA INDUSTRIA ALIMENTARIA",
    "MAQUINARIA DE MINERIA",
    "MAQUINARIA HIDRAULICA",
    "MAQUINARIA INDUSTRIAL ESPECIALIZADA",
    "MAQUINARIA NUCLEAR",
    "MAQUINARIA TEXTIL",
    "MAQUINARIA Y EQUIPO INDUSTRIALES",
    "MAQUINARIAS PARA MANEJO DE MATERIALES",
    "MAQUINAS DE VAPOR",
    "MAQUINAS EXPENDEDORAS AUTOMATICAS Y DE ENTRENAMIENTO",
    "MAQUINAS",
    "MATRICES",
    "MOTORES DE COMBUSTION INTERNA (EN GENERAL)",
    "MOTORES DE GAS",
    "OTROS",
    "PLANTILLAS Y MODELOS",
    "PRODUCCION Y MANUFACTURA",
    "TURBINAS",
    "VENTILADORES"]
  disciplineValue = tecnologiaMecanica;
    }
    if(disciplineValue =="TECNOLOGIA DE LA MEDICINA"){
      var tecnologiaDeLaMedicina = [
    "DISPOSITIVOS DE PROTESIS",
    "ORGANOS ARTIFICIALES",
    "OTROS"]
  disciplineValue = tecnologiaDeLaMedicina;
    }
     if(disciplineValue =="TECNOLOGIA DE LA METALURGIA"){
      var tecnologiaDeLaMetalurgia = [
    "AFINADO",
    "ALUMINIO",
    "COBRE",
    "COLADA DE METALES NO FERROSOS",
    "COLADA DE PRECISION",
    "FABRICAS FUNDICIONES Y FORJAS SIDERURGICAS",
    "FUNDICION",
    "FUNDICIONES (EN GENERAL)",
    "INCLUIDO EL REFINADO DE ZONA",
    "METALES PRECIOSOS",
    "METALES RADIACTIVOS",
    "METALES RAROS",
    "METALES REFRACTARIOS",
    "OTROS",
    "PLOMO Y ZINC",
    "PRODUCTOS ELECTROMETALURGICOS",
    "PRODUCTOS METALURGICOS (ESPECIALES)",
    "PULVIMETALURGIA",
    "REFINAMIENTO Y ELABORACION DE METALES NO FERROSOS",
    "SERVICIOS METALURGICOS"]
  disciplineValue = tecnologiaDeLaMetalurgia;
    }
       if(disciplineValue =="TECNOLOGIA DE LOS PRODUCTOS METALICOS"){
      var tecnologiaDeLosProductosMetalicos = [
    "ALTOS HORNOS",
    "ARTICULOS DE ALAMBRE",
    "ENVASES Y RECIPIENTES",
    "EQUIPO DE DESTILACION",
    "ESTAMPADOS",
    "ESTRUCTURAS FABRICADAS POR SOLDEO",
    "FERRETERIA",
    "GUARNICIONES Y VALVULAS",
    "HORNOS Y HORNOS CERAMICOS",
    "OTROS",
    "PRODUCTOS DE CHAPA METALICA",
    "PRODUCTOS ELECTROCHAPADOS Y RECUBIERTOS",
    "RECIPIENTES DE PRESION",
    "SERVICIOS DE FABRICACION DE METALES",
    "TUBERIAS",
    "AUTOCLAVES Y CALDERAS",
    "PRODUCTOS DE ACERO PARA CONSTRUCCIONES",
    "PRODUCTOS ELABORADOS A MAQUINA Y TORNEADOS"]
  disciplineValue = tecnologiaDeLosProductosMetalicos;
    }
      if(disciplineValue =="TECNOLOGIA DE LOS VEHICULOS DE MOTOR"){
      var tecnologiaDeLosVehiculosDeMotor = [
    "AUTOBUSES",
    "AUTOMOVILES",
    "CAMIONES Y REMOLQUES",
    "MOTORES DE PISTON",
    "MOTORES DIESEL",
    "MOTORES ROTATORIOS",
    "OTROS",
    "PIEZAS DE REPUESTO Y ACCESORIOS",
    "REGULACION DEL TRAFICO",
    "SERVICIOS DE TRANSPORTE MOTORIZADO",
    "MOTOCICLETAS",
    "VEHICULOS TODO TERRENO"]
  disciplineValue = tecnologiaDeLosVehiculosDeMotor;
    }
     if(disciplineValue =="TECNOLOGIA DE MINAS"){
      var tecnologiaDeMinas = [
    "AZUFRE",
    "CONCENTRACION DE MINERALES",
    "MECANICA DE ROCAS",
    "MINERALES DE HIERRO",
    "MINERALES DE METALES NO FERROSOS",
    "MINERALES DE URANIO Y MINERALES RADIACTIVOS",
    "MINERALES NO METALICOS",
    "OTROS",
    "PROSPECCION MINERA",
    "SIMULACION DE YACIMIENTOS",
    "TOPOGRAFIA DE MINAS",
    "MINERALOGIA",
    "MINERIA DEL CARBON",
    "PRODUCTOS DE CANTERAS",
    "SERVICIOS DE MINAS"]
  disciplineValue = tecnologiaDeMinas;
    }
        if(disciplineValue =="TECNOLOGIA NAVAL"){
      var tecnologiaNaval = [
    "BUQUES MERCANTES",
    "BUQUES",
    "CONSTRUCCION NAVAL",
    "EMBARCACIONES DE VIAS NAVEGABLES INTERIORES",
    "HELICES",
    "INGENIERIA COSTERA",
    "LINEA DE EJES (BUQUES)",
    "MOTORES MARINOS",
    "OTROS",
    "SUBMARINOS",
    "TRANSPORTE MARITIMO",
    "TRANSPORTE OCEANICO",
    "ARQUITECTURA NAVAL",
    "DISPOSITIVOS DE SUSPENSION NEUMATICA",
    "MAQUINAS AUXILIARES (BUQUES)"]
  disciplineValue = tecnologiaNaval;
   }
       if(disciplineValue =="TECNOLOGIA NUCLEAR"){
      var tecnologiaNuclear = [
    "ENSAYOS NUCLEARES",
    "EXPLOSIONES NUCLEARES",
    "INGENIERIA QUIMICA NUCLEAR",
    "INSTRUMENTACION NUCLEAR",
    "OTROS",
    "REACTORES DE FISION NUCLEAR",
    "REACTORES DE FUSION NUCLEAR",
    "SEPARACION DE ISOTOPOS",
    "APLICACIONES DE LOS ISOTOPOS"]
  disciplineValue = tecnologiaNuclear;
    }
    if(disciplineValue =="TECNOLOGIA DEL PETROLEO Y DEL CARBON"){
      var tecnologiaDelPetroleoYdelCarbon = [
    "ACEITES Y GRASAS LUBRICANTES",
    "ALMACENAMIENTO DE PETROLEO Y GAS",
    "DISEÑO DE REFINERIAS",
    "EQUIPO DE CAMPOS PETROLIFEROS",
    "EXPLORACION",
    "GAS LICUADO",
    "GAS NATURAL",
    "GASODUCTOS",
    "OLEODUCTOS",
    "OTROS",
    "PETROLEO CRUDO",
    "PRODUCTOS CARBOQUIMICOS",
    "PRODUCTOS PETROQUIMICOS",
    "SERVICIOS DE LOS CAMPOS PETROLIFEROS",
    "MATERIALES ASFALTICOS",
    "PRODUCTOS DEL PETROLEO: GASOLINA ACEITES CERAS"]
  disciplineValue = tecnologiaDelPetroleoYdelCarbon;
    }
      if(disciplineValue =="TECNOLOGIA DE LA ENERGIA"){
      var tecnologiaDeLaEnergia = [
    "FUENTES DE ENERGIA NO CONVENCIONALES",
    "GENERACION DE ENERGIA",
    "GENERADORES DE ENERGIA",
    "OTROS",
    "TRANSMISION DE ENERGIA",
    "DISTRIBUCION DE LA ENERGIA"]
  disciplineValue = tecnologiaDeLaEnergia;
    }
       if(disciplineValue =="TECNOLOGIA DE FERROCARRILES"){
      var tecnologiaDeFerrocariles = [
    "EQUIPO DE FERROCARRILES",
    "MATERIAL RODANTE (FERROCARRILES)",
    "OTROS",
    "SERVICIOS DE FERROCARRIL",
    "LOCOMOTORAS"]
  disciplineValue = tecnologiaDeFerrocariles;
    }
    if(disciplineValue =="TECNOLOGIA DEL ESPACIO"){
      var tecnologiaDelEspacio = [
    "CONTROL DE VEHICULOS",
    "INSTALACIONES DE MISILES",
    "MISILES: LANZAMIENTO Y RECUPERACION",
    "NAVES ESPACIALES",
    "OTROS",
    "SEGUIMIENTO DE NAVES ESPACIALES",
    "MOTORES COHETE",
    "SATELITES ARTIFICIALES"]
  disciplineValue = tecnologiaDelEspacio;
    }
     if(disciplineValue =="TECNOLOGIA DE LAS TELECOMUNICACIONES"){
      var tecnologiasDeLasTelecomunicaciones = [
    "CINEMATOGRAFIA",
    "COMUNICACIONES MEDIANTE SATELITE",
    "ENLACES DE MICROONDAS",
    "OTROS",
    "RADIOCOMUNICACIONES",
    "RADIODIFUSION SONORA Y TELEVISIVA",
    "TELEFONO",
    "TELEGRAFO",
    "TELEVISION POR CABLE",
    "TELEVISION"]
  disciplineValue = tecnologiasDeLasTelecomunicaciones;
    }
    if(disciplineValue =="TECNOLOGIA TEXTIL"){
      var tecnologiaTextil = [
    "ACABADOS",
    "ALGODON",
    "HILADO",
    "LANA",
    "LINO",
    "OTROS",
    "PREPARACION PARA EL TEJIDO",
    "TEJIDO DE PUNTO",
    "TEJIDO",
    "TEXTILES SINTETICOS",
    "YUTE"]
  disciplineValue = tecnologiaTextil;
    }
    if(disciplineValue =="TECNOLOGIA DE LOS SISTEMAS DE TRANSPORTE"){
      var tecnologiaDeLosSitemasDeTransporte = [
    "ANALISIS DEL TRAFICO",
    "COMBINACIONES DE SISTEMAS",
    "OPERACIONES DE LINEAS AEREAS CONTROL DEL TRAFICO AEREO",
    "OTROS",
    "SISTEMAS DE TRAFICO URBANO"]
  disciplineValue = tecnologiaDeLosSitemasDeTransporte;
    }
     if(disciplineValue =="ANALISIS DE LAS OPERACIONES TECNOLOGICAS"){
      var analisisDeLasOperacionesTecnologicas = [
    "ABSORCION",
    "AGITACION",
    "BOMBEO",
    "CENTRIFUGACION",
    "COMPRESION",
    "CRIBADO",
    "CRISTALIZACION",
    "DESIONIZACION",
    "DESTILACION Y CONDENSACION",
    "EVAPORACION",
    "EXTRACCION LIQUIDO?LIQUIDO",
    "EXTRACCION SOLIDO-LIQUIDO",
    "FILTRACION",
    "FLOTACION",
    "FLUIDIZACION DE LOS SOLIDOS",
    "FLUJO A TRAVES DE MEDIOS POROSOS",
    "MANEJO DE LOS SOLIDOS",
    "MEZCLADO",
    "OTROS",
    "REFRIGERACION",
    "SECADO POR CONGELACION",
    "SECADO",
    "SEDIMENTACION",
    "TRANSFERENCIA DE CALOR",
    "TRANSFERENCIA DE MASA",
    "TRANSFERENCIA VAPOR-LIQUIDO)",
    "TRITURACION",
    "TUBERIAS GUARNICIONES Y VALVULAS"]
  disciplineValue = analisisDeLasOperacionesTecnologicas;
    }
    if(disciplineValue =="TECNOLOGIA DEL URBANISMO"){
      var tecnologiaDelUrbanismo = [
    "COMUNICACIONES",
    "DESARROLLO REGIONAL",
    "MEDIO AMBIENTE URBANO",
    "ORGANIZACION COMUNITARIA",
    "OTROS",
    "REGLAMENTO PARA LA CONSTRUCCION DE EDIFICIOS",
    "RELACIONES URBANO-RURALES",
    "SERVICIOS SANITARIOS",
    "TRANSPORTE",
    "USO DE LAS TIERRAS"]
  disciplineValue = tecnologiaDelUrbanismo;
    }
    if(disciplineValue =="GESTION DE LA CALIDAD"){
      var gestionDeLaCalidad = [
    "COMPARACION REFERENCIAL (BENCHMARKING)",
    "COMUNICACION",
    "CONTROL DE CALIDAD",
    "CONTROL ESTADISTICO DE LA CALIDAD",
    "CONTROL ESTADISTICO DE PROCESOS",
    "COSTOS DE CALIDAD",
    "DISEÑO DE PROCESOS",
    "DOCUMENTACION DE NORMALIZACION Y CERTIFICACION",
    "INSPECCION",
    "MEJORA E INNOVACION DE PROCESOS",
    "OTROS",
    "PROCESOS PRODUCTIVOS",
    "PRODUCTOS DISEÑO Y MEJORA DE",
    "PROTECCION DEL ASEGURAMIENTO DE LA CALIDAD",
    "REINGENIERIA",
    "SISTEMAS DE CONOCIMIENTO"]
  disciplineValue = gestionDeLaCalidad;
    }
     if(disciplineValue =="CIENCIAS DE LA COMPUTACION"){
      var cienciasDeLaComputacion = [
    "APLICACIONES DE LA INFORMATICA",
    "ARQUITECTURA DE PROCESADORES",
    "CIRCUITOS INTEGRADOS",
    "DESEMPEÑO Y FIABILIDAD",
    "DISEÑO LOGICO",
    "DISPOSITIVOS DE ENTRADA / SALIDA Y COMUNICACIONES",
    "ESTRUCTURAS DE CONTROL Y MICROPROGRAMACION",
    "ESTRUCTURAS DE MEMORIA",
    "ESTRUCTURAS LOGICAS Y ARITMETICAS",
    "IMPLEMENTACION DEL NIVEL DE REGISTRO-TRANSFERENCIA",
    "ORGANIZACION DE SISTEMAS DE COMPUTO",
    "OTROS",
    "PROCESAMIENTO DE IMAGENES Y VISION INFORMATICA",
    "RECONOCIMIENTO DE PATRONES",
    "REDES DE COMUNICACIONES INFORMATICAS",
    "SISTEMAS BASADOS EN LA APLICACION Y EN PROPOSITO",
    "SOFTWARE"]
  disciplineValue = cienciasDeLaComputacion;
    }
      if(disciplineValue =="TECNOLOGIA DE BIOPROCESOS"){
      var tecnologiaDeBioprocesos = [
    "BIOPROCESOS",
    "OTROS"]
  disciplineValue = tecnologiaDeBioprocesos;
    }
      if(disciplineValue =="TECNOLOGIA DE BIOMOLECULAS"){
      var tecnologiaDeBiomoleculas = [
    "BIOMOLECULAS",
    "OTROS"]
  disciplineValue = tecnologiaDeBiomoleculas;
    }
    if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE TECNOLOGIA"){
      var otrasEspecialidadesEnMateriaDeTEcnologia = [
    "OTROS"]
  disciplineValue = otrasEspecialidadesEnMateriaDeTEcnologia;
    }
     if(disciplineValue =="ANTROPOLOGIA CULTURAL"){
      var antropologiaCultural = [
    "ADORNO",
    "DANZAS",
    "ETNOLINGÜISTICA",
    "ETNOMUSICOLOGIA",
    "FIESTAS",
    "HECHICERIA",
    "MAGIA",
    "MEDICINA TRADICIONAL",
    "MITOS",
    "MUSEOLOGIA",
    "OTROS",
    "POEMAS",
    "RELATOS",
    "RELIGION",
    "SIMBOLISMO",
    "TRADICION",
    "VESTIMENTA"]
  disciplineValue = antropologiaCultural;
    }
       if(disciplineValue =="ETNOGRAFIA Y ETNOLOGIA"){
      var EtnografiaYEtnologia = [
    "AGRICULTURA",
    "ARMAS",
    "ARTESANIA",
    "CAZA",
    "CRIA DE GANADO",
    "FORRAJE",
    "HABITAT",
    "INTERCAMBIO",
    "METALURGIA",
    "OTROS",
    "PESCA",
    "TRUEQUE"]
  disciplineValue = EtnografiaYEtnologia;
    }
     if(disciplineValue =="ANTROPOLOGIA SOCIAL"){
      var antropologiaSocial = [
    "DESCENDENCIA",
    "ESCLAVITUD",
    "FAMILIA",
    "GUERRA",
    "JEFATURA",
    "LINAJE",
    "NOMADISMO",
    "OTROS",
    "REALEZA",
    "SERVIDUMBRE"]
  disciplineValue = antropologiaSocial;
    }
     if(disciplineValue =="FECUNDIDAD"){
      var fecundidad = [
    "ESTERILIDAD Y FECUNDIDAD",
    "FECUNDIDAD GENERAL",
    "ILEGITIMIDAD",
    "NUPCIALIDAD",
    "OTROS",
    "TASA DE NATALIDAD"]
  disciplineValue = fecundidad;
    }
     if(disciplineValue =="DEMOGRAFIA GENERAL"){
      var demografiaGeneral = [
    "METODOLOGIA DE ANALISIS",
    "METODOLOGIA DE LA INVESTIGACION",
    "OTROS",
    "TEORIA"]
  disciplineValue = demografiaGeneral;
    }
      if(disciplineValue =="DEMOGRAFIA GEOGRAFICA"){
      var demografiaGeografica = [
    "DEMOGRAFIA LOCAL",
    "DEMOGRAFIA REGIONAL",
    "DEMOGRAFIA RURAL",
    "DEMOGRAFIA URBANA",
    "MOVILIDAD Y MIGRACIONES INTERNACIONALES",
    "MOVILIDAD Y MIGRACIONES INTERNAS",
    "OTROS"]
  disciplineValue = demografiaGeografica;
    }
     if(disciplineValue =="DEMOGRAFIA HISTORICA"){
      var demografiaHistorica = [
    "ASPECTOS METODOLOGICOS",
    "ASPECTOS TEORICOS",
    "FUENTES DE OBSERVACION",
    "MIGRACIONES",
    "MORTALIDAD",
    "OTROS",
    "TASA DE FECUNDIDAD Y NUPCIALIDAD"]
  disciplineValue = demografiaHistorica;
    }
     if(disciplineValue =="MORTALIDAD"){
      var mortalidad = [
    "CAUSAS DE MORTALIDAD",
    "MORTALIDAD GENERAL",
    "MORTALIDAD INFANTIL",
    "MORTALIDAD PRENATAL Y PERINATAL",
    "OTROS",
    "VARIABLES RELACIONADAS"]
  disciplineValue = mortalidad;
    }
      if(disciplineValue =="CARACTERISTICAS DE LAS POBLACIONES"){
      var caracteristicasDeLasPoblaciones = [
    "CARACTERISTICAS BIOLOGICAS",
    "CARACTERISTICAS EPIDEMIOLOGICAS",
    "CARACTERISTICAS SOCIOECONOMICAS",
    "DISTRIBUCION POR EDADES",
    "ENVEJECIMIENTO DE LA POBLACION",
    "ESTRUCTURAS DEMOGRAFICAS GENERALES",
    "GENETICA DE POBLACIONES",
    "MORBILIDAD",
    "POBLACION ACTIVA",
    "SEXO",
    "OTROS"]
  disciplineValue = caracteristicasDeLasPoblaciones;
    }
    if(disciplineValue =="EVOLUCION DEMOGRAFICA"){
      var evolucionDemografica = [
  "CENSOS DEMOGRAFICOS Y OTROS TIPOS DE ACOPIO DE DATOS",
  "DEMOGRAFIA COMPUTACIONAL",
  "DEMOGRAFIA DE OBSERVACION",
  "ESTIMACIONES DEMOGRAFICAS",
  "TRANSICION DEMOGRAFICA",
  "PREVISIONES DEMOGRAFICAS",
  "CRECIMIENTO DE LA POBLACION",
  "MODELOS DEMOGRAFICOS",
   "PROYECCIONES DEMOGRAFICAS",
  "ESTADISTICA DEMOGRAFICA",
  "OTROS"]
  disciplineValue = evolucionDemografica;
    }
     if(disciplineValue =="POLITICA FISCAL Y HACIENDA PUBLICA"){
      var politicaFiscalyHaciendaPublica = [
  "POLITICA FISCAL Y DEUDA PUBLICA",
  "HACIENDA PUBLICA (PRESUPUESTO)",
  "OTROS"]
  disciplineValue = politicaFiscalyHaciendaPublica;
    }
      if(disciplineValue =="ECONOMETRIA"){
      var econometria = [
  "ESTADISTICA ECONOMICA",
  "INDICADORES ECONOMICOS",
  "MODELOS ECONOMETRICOS",
  "PROYECCION ECONOMICA",
  "SERIES DE TIEMPO ECONOMICAS",
  "OTROS"]
  disciplineValue = econometria;
    }
      if(disciplineValue =="CONTABILIDAD PUBLICA"){
      var contabilidadPublica = [
  "CUENTAS FINANCIERAS",
  "RIQUEZA NACIONAL Y BALANZA DE PAGOS",
  "CONTABILIDAD DE LA RENTA NACIONAL",
  "ENTRADA-SALIDA",
  "CUENTAS SOCIALES",
  "AUDITORIA",
  "CONTABILIDAD ADMINISTRATIVA",
  "CONTABILIDAD FISCAL",
  "OTRAS"]
  disciplineValue = contabilidadPublica;
    }
    if(disciplineValue =="ACTIVIDADES ECONOMICAS"){
      var actividadesEconomicas = [
   "DINERO Y BANCA",
  "AHORRO",
  "COMERCIO EXTERIOR",
  "COMERCIO INTERIOR",
  "CONSUMO",
  "DISTRIBUCION",
  "INVERSION",
  "PRODUCCION",
  "REDISTRIBUCION",
  "SEGUROS",
  "OTROS"]
  disciplineValue = actividadesEconomicas;
    }
     if(disciplineValue =="SISTEMAS ECONOMICOS"){
      var sistemasEconomicas = [
  "SISTEMAS DE ECONOMIA CAPITALISTA",
  "SISTEMAS DE ECONOMIA COLECTIVISTA",
  "SISTEMAS DE ECONOMIA COMPARADA",
  "SISTEMAS DE ECONOMIA SOCIALISTA",
  "OTROS"]
  disciplineValue = sistemasEconomicas;
    }
     if(disciplineValue =="CAMBIO ECONOMICO O TECNOLOGICO"){
      var cambioEconomicooTecnologico = [
  "ECONOMIA DE LA INVESTIGACION Y EL DESARROLLO EXPERIMENTAL",
  "INNOVACION TECNOLOGICA",
  "TRANSFERENCIA DE TECNOLOGIA",
  "OTROS"]
  disciplineValue = cambioEconomicooTecnologico;
    }
     if(disciplineValue =="TEORIA ECONOMICA"){
      var teoriaEconomica = [
  "FORMACION DE CAPITAL",
  "TEORIAS DEL CREDITO",
  "MODELOS Y TEORIAS DE DESARROLLO ECONOMICO",
  "ESTUDIOS DE DESARROLLO ECONOMICO",
  "EQUILIBRIO ECONOMICO",
  "FLUCTUACIONES ECONOMICAS",
  "PREVISIONES ECONOMICAS",
  "TEORIA DEL CRECIMIENTO ECONOMICO",
  "TEORIA DE LA PLANIFICACION ECONOMICA",
  "TEORIA DEL EMPLEO Y MODELOS DE EMPLEO",
  "TEORIA FISCAL",
  "TEORIA DEL COMERCIO INTERNACIONAL",
  "TEORIA DE LA INVERSION",
  "TEORIA MACROECONOMICA",
  "TEORIA MICROECONOMICA",
  "TEORIA MONETARIA",
  "TEORIA DEL AHORRO",
  "TEORIAS DE LA ESTABILIZACION",
  "TEORIA DEL BIENESTAR",
  "OTROS"]
  disciplineValue = teoriaEconomica;
    }
     if(disciplineValue =="ECONOMIA GENERAL"){
      var economiaGeneral = [
  "COMPORTAMIENTO DEL CONSUMIDOR",
  "HISTORIA DEL PENSAMIENTO ECONOMICO",
  "METODOLOGIA ECONOMICA",
  "OTROS"]
  disciplineValue = economiaGeneral;
    }
     if(disciplineValue =="ORGANIZACION DE LA INDUSTRIA Y POLITICA ECONOMICA PUBLICA"){
      var organizacionDeLaIndustriayPoliticaEconomicaPublica = [
  "CONCENTRACION ECONOMICA",
  "EMPRESAS PUBLICAS",
  "ESTRUCTURA DEL MERCADO",
  "INTEGRACION ECONOMICA",
  "MONOPOLIO Y COMPETENCIA",
  "REGLAMENTACION GUBERNAMENTAL DEL SECTOR PRIVADO",
  "SERVICIOS PUBLICOS",
  "OTROS"]
  disciplineValue = organizacionDeLaIndustriayPoliticaEconomicaPublica;
    }
     if(disciplineValue =="ECONOMIA INTERNACIONAL"){
      var economiaInternacional = [
   "POLITICA ECONOMICA INTERNACIONAL",
  "ACUERDOS MONETARIOS INTERNACIONALES",
  "ASUNTOS INTERNACIONALES",
  "AYUDA EXTERIOR",
  "AYUDA INTERNACIONAL",
  "BALANZA DE PAGOS",
  "FINANZAS INTERNACIONALES",
  "INVERSIONES INTERNACIONALES",
  "RELACIONES COMERCIALES INTERNACIONALES",
  "OTROS"]
  disciplineValue = economiaInternacional;
    }
    if(disciplineValue =="ORGANIZACION Y DIRECCION DE EMPRESAS"){
      var organizacionyDireccionDeEmpresas = [
  "COSTOS",
  "ESTUDIOS DE MERCADO",
  "ESTUDIOS INDUSTRIALES",
  "GESTION DE MANO DE OBRA",
  "GESTION DE MERCADOS",
  "GESTION FINANCIERA",
  "INVESTIGACION OPERATIVA",
  "MERCADEO",
  "NEGOCIO",
  "NIVELES OPTIMOS DE PRODUCCION",
  "ORGANIZACION DE LA PRODUCCION",
  "PLANEACION ESTRATEGICA",
  "PUBLICIDAD",
  "RESULTADOS Y FACTORES CRITICOS DEL",
  "OTROS"]
  disciplineValue = organizacionyDireccionDeEmpresas;
    }
     if(disciplineValue =="ECONOMIA SECTORIAL"){
      var economiaSectorial = [
   "LA INDUSTRIA DE LA COMPUTACION",
  "AGRICULTURA",
  "COMERCIO",
  "CONSTRUCCION",
  "EDUCACION",
  "ENERGIA",
  "HACIENDA Y SEGUROS",
  "INVESTIGACION Y DESARROLLO",
  "MINERIA",
  "PESCA",
  "SALUD",
  "SERVICIOS COMUNITARIOS",
  "SILVICULTURA",
  "SOCIALES Y PERSONALES",
  "TECNICAS DE PRODUCCION",
  "TRANSPORTE Y COMUNICACIONES",
  "OTROS"]
  disciplineValue = economiaSectorial;
    }
    if(disciplineValue =="GEOGRAFIA ECONOMICA"){
      var geograficaEconomica = [
    "DESARROLLO REGIONAL",
    "DISTRIBUCION DE LOS RECURSOS NATURALES",
    "GEOGRAFIA DE LAS ACTIVIDADES ECONOMICAS",
    "USO DE LAS TIERRAS",
    "OTROS"]
  disciplineValue = geograficaEconomica;
    }
    //--------------------------------------------------------//
     if(disciplineValue =="GEOGRAFIA HUMANA"){
      var geograficaHumana = [
    "DEMOGEOGRAFIA",
    "GEOGRAFIA CULTURAL",
    "GEOGRAFIA DE LA RELIGION",
    "GEOGRAFIA LINGÜISTICA",
    "GEOGRAFIA POLITICA",
    "GEOGRAFIA SOCIAL",
    "OTROS"]
  disciplineValue = geograficaHumana;
    }
     if(disciplineValue =="HISTORIA GENERAL"){
      var historiaGeneral = [
    "HISTORIOGRAFIA",
    "MONOGRAFIAS HISTORICAS",
    "TEORIA Y METODOS",
    "HISTORIA COMPARADA",
    "OTROS"]
  disciplineValue = historiaGeneral;
    }
      if(disciplineValue =="HISTORIA DE LOS PAISES"){
      var historiaDeLosPaises = [
    "HISTORIA LOCAL",
    "HISTORIA REGIONAL",
    "OTROS"]
  disciplineValue = historiaDeLosPaises;
    }
      if(disciplineValue =="HISTORIA DE LAS EPOCAS"){
      var historiaDelasEpocas = [
    "PREHISTORIA",
    "HISTORIA ANTIGUA",
    "HISTORIA CONTEMPORANEA",
    "HISTORIA DE LA EDAD MEDIA",
    "HISTORIA MODERNA",
    "OTROS"]
  disciplineValue = historiaDelasEpocas;
    }
     if(disciplineValue =="CIENCIAS AUXILIARES DE LA HISTORIA"){
      var cienciasAuxiliaresDeLaHistoria = [
    "ARCHIVISTICA",
    "ARCHIVOS ECONOMICOS",
    "ARQUEOLOGIA",
    "CERAMOLOGIA",
    "EPIGRAFIA",
    "ESTRATIGRAFIA",
    "FILOLOGIA",
    "HERALDICA",
    "ICONOGRAFIA",
    "NUMISMATICA",
    "ONOMASTICA",
    "PALEOGRAFIA",
    "PAPIROLOGIA",
    "SIGILOGRAFIA",
    "TEORIA DE DOCUMENTOS",
    "OTROS"]
  disciplineValue = cienciasAuxiliaresDeLaHistoria;
    }
       if(disciplineValue =="HISTORIA ESPECIALIZADA"){
      var historiaEspecializada = [
    "HISTORIA DE LA ASTRONOMIA",
    "HISTORIA DE LA BIOLOGIA",
    "HISTORIA DE LA CIENCIA",
    "HISTORIA DE LA CULTURA",
    "HISTORIA DE LA ECONOMIA",
    "HISTORIA DE LA EDUCACION",
    "HISTORIA DE LA FILOSOFIA",
    "HISTORIA DE LA FISICA",
    "HISTORIA DE LA GEOGRAFIA",
    "HISTORIA DE LA GEOLOGIA",
    "HISTORIA DE LA GUERRA",
    "HISTORIA DE LA LINGÜISTICA",
    "HISTORIA DE LA LITERATURA",
    "HISTORIA DE LA LOGICA",
    "HISTORIA DE LA MAGISTRATURA",
    "HISTORIA DE LA MEDICINA",
    "HISTORIA DE LA QUIMICA",
    "HISTORIA DE LA SOCIOLOGIA",
    "HISTORIA DE LA TECNOLOGIA",
    "HISTORIA DE LAS IDEAS POLITICAS",
    "HISTORIA DE LAS INSTITUCIONES",
    "HISTORIA DE LAS MENTALIDADES",
    "HISTORIA DE LAS RELACIONES INTERNACIONALES",
    "HISTORIA DE LAS RELIGIONES",
    "HISTORIA DEL ARTE",
    "HISTORIA DEL DERECHO Y DE LAS INSTITUCIONES JURIDICAS",
    "HISTORIA DEL PERIODISMO",
    "HISTORIA SOCIAL",
    "HISTORIA DE LA ARQUITECTURA",
    "OTROS"]
  disciplineValue = historiaEspecializada;
    }
    if(disciplineValue =="TEORIAS Y METODOS JURIDICOS GENERALES"){
      var teoriayMetodosJuridicosGenerales = [
    "DERECHO COMPARADO",
    "DERECHO CONSUETUDINARIO",
    "DERECHO DE LA ANTIGÜEDAD",
    "DERECHO NATURAL",
    "JURISPRUDENCIA",
    "LEGISLACION PROMULGADA",
    "OTROS"]
  disciplineValue = teoriayMetodosJuridicosGenerales;
    }
     if(disciplineValue =="DERECHO INTERNACIONAL"){
      var derechoInternacional = [
    "DERECHO AERONAUTICO",
    "DERECHO DEL ESPACIO ULTRATERRESTRE",
    "DERECHO DEL FONDO DEL MAR",
    "DERECHO MARITIMO",
    "OTROS"]
  disciplineValue = derechoInternacional;
    }
    if(disciplineValue =="ORGANIZACION PENAL"){
      var organizacionPenal = [
    "FUNCIONARIOS Y PROCEDIMIENTOS JUDICIALES",
    "MAGISTRATURA",
    "TRIBUNALES",
    "OTROS"]
  disciplineValue = organizacionPenal;
    }
     if(disciplineValue =="DERECHO Y LEGISLACION NACIONALES"){
      var derechoyLEgislacionNAcionales = [
    "DERECHO ADMINISTRATIVO",
    "DERECHO AGRARIO Y MINERO",
    "DERECHO CIVIL",
    "DERECHO COMERCIAL",
    "DERECHO CONSTITUCIONAL",
    "DERECHO DEL TRANSPORTE Y TRANSITO",
    "DERECHO FINANCIERO",
    "DERECHO FISCAL",
    "DERECHO LABORAL",
    "DERECHO NOTARIAL",
    "DERECHO PENAL",
    "DERECHO PRIVADO",
    "DERECHO ROMANO",
    "DERECHO SOCIAL",
    "LEGISLACION PUBLICA",
    "OTROS"]
  disciplineValue = derechoyLEgislacionNAcionales;
    }
    //----------------------------------///
      if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA JURIDICA"){
      var derechoyLEgislacionNAcionales = [
    "OTRAS ESPECIALIDADES EN MATERIA JURIDICA"]
  disciplineValue = derechoyLEgislacionNAcionales;
    }
     if(disciplineValue =="LINGÜISTICA APLICADA"){
      var linguisticaAplicada = [
    "PREPARACION DE RESUMENES ANALITICOS",
    "DOCUMENTACION AUTOMATIZADA",
    "BILINGÜISMO",
    "LINGÜISTICA COMPUTACIONAL",
    "LENGUAJES DOCUMENTALES",
    "DOCUMENTACION",
    "LENGUAJE Y LITERATURA",
    "LENGUAJE DE LOS NIÑOS",
    "TRADUCCION A MAQUINA",
    "PATOLOGIA Y CORRECCION DEL HABLA",
    "ENSEÑANZA DE IDIOMAS",
    "TRADUCCION",
    "ALFABETIZACION Y SISTEMAS DE ESCRITURA",
    "OTROS"]
  disciplineValue = linguisticaAplicada;
    }
    if(disciplineValue =="LINGÜISTICA DIACRONICA"){
      var linguisticaDiacronica = [
    "ETIMOLOGIA",
    "LINGÜISTICA HISTORICA",
    "OTROS"]
  disciplineValue = linguisticaDiacronica;
    }
     if(disciplineValue =="LINGÜISTICA SINCRONICA"){
      var linguisticaSincronica = [
     "SINTAXIS ANALISIS SINTACTICO",
    "ESTILISTICA (ESTILO Y RETORICA)",
    "ETNOLINGÜISTICA",
    "FONETICA",
    "FONOLOGIA",
    "LEXICOGRAFIA",
    "LEXICOLOGIA",
    "LINGÜISTICA COMPARADA",
    "LINGÜISTICA DESCRIPTIVA",
    "ORTOGRAFIA",
    "PSICOLINGÜISTICA",
    "SEMANTICA",
    "SEMIOLOGIA",
    "SOCIOLINGÜISTICA",
    "OTROS"]
  disciplineValue = linguisticaSincronica;
    }
     if(disciplineValue =="TEORIAS Y METODOS PEDAGOGICOS GENERALES"){
      var teoriasyMetodosPedagogicosGenerales = [
    "ELABORACION DE PLANES DE ESTUDIO",
    "EVALUACION DE ALUMNOS Y MAESTROS",
    "INSTRUCCION PROGRAMADA",
    "METODOS AUDIOVISUALES",
    "METODOS PEDAGOGICOS",
    "PEDAGOGIA COMPARADA",
    "PEDAGOGIA EXPERIMENTAL",
    "TEORIAS DE LA EDUCACION",
    "OTROS"]
  disciplineValue = teoriasyMetodosPedagogicosGenerales;
    }
     if(disciplineValue =="ORGANIZACION Y PLANIFICACION PEDAGOGICAS"){
      var organizacionyPlanificacionPedagogicas = [
    "EDUCACION DE ADULTOS",
    "CENTROS DOCENTES",
    "ORGANIZACION Y ADMINISTRACION",
    "PLANIFICACION Y FINANCIACION DE LA EDUCACION",
    "NIVELES Y TEMAS DE LA EDUCACION",
    "EDUCACION ESPECIAL",
    "IMPEDIDOS",
    "RETRASADOS MENTALES",
    "ANALISIS",
    "MODELOS Y PROYECCIONES ESTADISTICOS",
     "ENSEÑANZA Y FORMACION PROFESIONAL",
    "OTROS"]
  disciplineValue = organizacionyPlanificacionPedagogicas;
    }
    if(disciplineValue =="FORMACION Y EMPLEO DE LOS EDUCADORES"){
      var formacionyEmpleoDeLosEducadores = [
    "CARRERA Y CONDICION DE LOS EDUCADORES",
    "FORMACION DE EDUCADORES",
    "OTROS"]
  disciplineValue = formacionyEmpleoDeLosEducadores;
    }
    if(disciplineValue =="RELACIONES INTERNACIONALES"){
      var relacionesInternacionales = [
    "COOPERACION INTERNACIONAL",
    "ORGANIZACIONES INTERNACIONALES",
    "POLITICA INTERNACIONAL",
    "PROBLEMAS DE LAS RELACIONES INTERNACIONALES",
    "TRATADOS Y ACUERDOS INTERNACIONALES",
    "OTROS"]
  disciplineValue = relacionesInternacionales;
    }
    if(disciplineValue =="POLITICAS SECTORIALES"){
      var politicasSectoriales = [
     "POLITICA EXTERIOR",
    "PLANIFICACION DE POLITICAS",
    "POLITICA AGRICOLA",
    "POLITICA AMBIENTAL",
    "POLITICA CIENTIFICA Y TECNOLOGICA",
    "POLITICA COMERCIAL",
    "POLITICA CULTURAL",
    "POLITICA DE COMUNICACIONES",
    "POLITICA DE EDUCACION",
    "POLITICA DE INFORMACION",
    "POLITICA DE TRANSPORTES",
    "POLITICA DEMOGRAFICA",
    "POLITICA ECONOMICA",
    "POLITICA INDUSTRIAL",
    "POLITICA SANITARIA",
    "POLITICA SOCIAL",
    "OTROS"]
  disciplineValue = politicasSectoriales;
    }
    if(disciplineValue =="INSTITUCIONES POLITICAS"){
      var institucionesPoliticas = [
    "PODER EJECUTIVO",
    "PODER JUDICIAL",
    "PODER LEGISLATIVO",
    "RELACIONES ENTRE LOS PODERES",
    "OTROS"]
  disciplineValue = institucionesPoliticas;
    }
    //------------------------------------------------------//

    if(disciplineValue =="VIDA POLITICA"){
      var vidaPolitica = [
     "PARTIDOS POLITICOS",
    "COMPORTAMIENTO POLITICO",
    "ELECCIONES",
    "GRUPOS POLITICOS",
    "LIDERAZGO POLITICO",
    "MOVIMIENTOS POLITICOS",
    "OTROS"]
  disciplineValue = vidaPolitica;
    }
    if(disciplineValue =="SOCIOLOGIA DE LA POLITICA"){
      var sociologiaDeLaPolitica = [
     "CONFLICTOS SOCIALES",
    "DERECHOS HUMANOS",
    "IDIOMAS",
    "MINORIAS",
    "RAZA",
    "RELIGION",
    "OTROS"]
  disciplineValue = sociologiaDeLaPolitica;
    }
    if(disciplineValue =="ADMINISTRACION PUBLICA"){
      var administracionPublica = [
    "GESTION ADMINISTRATIVA",
    "INSTITUCIONES CENTRALES",
    "FUNCION PUBLICA",
    "SERVICIOS PUBLICOS",
     "INSTITUCIONES REGIONALES",
    "COMERCIALIZACION",
    "FINANZAS",
    "PROMOCION Y DESARROLLO DE ORGANIZACIONES",
     "RECURSOS HUMANOS",
    "SISTEMAS DE INFORMACION",
    "OTROS"]
  disciplineValue = administracionPublica;
    }
    if(disciplineValue =="OPINION PUBLICA"){
      var opinionPublica = [
    "INFORMACION",
    "MEDIOS DE COMUNICACION DE MASAS",
    "PRENSA",
    "PROPAGANDA",
    "OTROS"]
  disciplineValue = opinionPublica;
    }
    //--------------------///
     if(disciplineValue =="BIBLIOTECONOMIA Y ARCHIVONOMIA"){
      var biblioteconomiayArchivonomia = [
    "ARCHIVONOMIA",
    "BIBLIOLOGIA",
    "BIBLIOTECNIA",
    "BIBLIOTECOLOGIA",
    "BIBLIOTECONOMIA",
    "OTROS"]
  disciplineValue = biblioteconomiayArchivonomia;
    }
    if(disciplineValue =="PSICOLOGIA PATOLOGICA"){
      var psicologiPatologica = [
    "COMPORTAMIENTO DESVIADO",
    "DEFICIENCIA MENTAL",
    "PSICOPATOLOGIA",
    "TRASTORNOS DEL COMPORTAMIENTO",
    "OTROS"]
  disciplineValue = psicologiPatologica;
    }
     if(disciplineValue =="PSICOLOGIA DEL NIÑO Y DEL ADOLESCENTE"){
      var psicologiaDelNinoyDelAdolecente = [
    "INCAPACIDADES DE APRENDIZAJE",
    "PATOLOGIA DEL HABLA",
    "PSICOLOGIA DEL DESARROLLO",
    "PSICOLOGIA ESCOLAR",
    "RETRASO MENTAL",
    "OTROS"]
  disciplineValue = psicologiaDelNinoyDelAdolecente;
    }
    if(disciplineValue =="ORIENTACION PSICOLOGICA"){
      var orintacionPsicologica = [
     "PSICOANALISIS",
    "ORIENTACION EDUCATIVA",
    "ORIENTACION PROFESIONAL",
    "PSICOLOGIA DE CONSULTA",
    "PSICOTERAPIA",
    "REHABILITACION",
    "RETRASO MENTAL",
    "TERAPIA DE GRUPO",
    "TERAPIA DEL COMPORTAMIENTO",
    "OTROS"]
  disciplineValue = orintacionPsicologica;
    }
    if(disciplineValue =="PSICOLOGIA DE LA EDUCACION"){
      var psicologiaDeLaEducacion = [
    "FUNCIONAMIENTO COGNOSCITIVO",
    "LEYES DEL APRENDIZAJE",
    "METODOS EDUCATIVOS",
    "PSICOLINGÜISTICA",
    "OTROS"]
  disciplineValue = psicologiaDeLaEducacion;
    }
     if(disciplineValue =="EVALUACION Y MEDICION PSICOLOGICAS"){
      var evaluacionyMedicionPsicoligicas = [
    "PSICOLOGIA DIFERENCIAL",
    "ANALISIS DE ESCALA",
    "CONSTRUCCION DE PRUEBAS",
    "DISEÑO EXPERIMENTAL",
    "ESTADISTICA",
    "PSICOMETRIA",
    "TEORIA DE LAS MEDICIONES",
    "TEORIA DE LAS PRUEBAS",
    "VALIDACION DE PRUEBAS",
    "OTROS"]
  disciplineValue = evaluacionyMedicionPsicoligicas;
    }
       if(disciplineValue =="PSICOLOGIA EXPERIMENTAL"){
      var psicologiaExperimental = [
    "ANALISIS EXPERIMENTAL DEL COMPORTAMIENTO",
    "EMOCION",
    "FUNCION CEREBRAL",
    "MOTIVACION",
    "NIVELES DE FUNCION",
    "PROCESOS DE LA MEMORIA",
    "PROCESOS DE PERCEPCION",
    "PROCESOS MENTALES",
    "PROCESOS SENSORIALES",
    "PSICOLOGIA COMPARADA",
    "PSICOLOGIA FISIOLOGICA",
    "REACCION",
    "REFLEJOS",
    "OTROS"]
  disciplineValue = psicologiaExperimental;
    }
    if(disciplineValue =="PSICOLOGIA GENERAL"){
      var psicologiaGeneral = [
    "METODOLOGIA",
    "TEORIA Y SISTEMAS",
    "OTROS"]
  disciplineValue = psicologiaGeneral;
    }
     if(disciplineValue =="PSICOLOGIA GERIATRICA"){
      var psicologiaGeriatrica = [
    "ENVEJECIMIENTO",
    "MADUREZ",
    "MUERTE",
    "OTROS"]
  disciplineValue = psicologiaGeriatrica;
    }
     if(disciplineValue =="PSICOLOGIA DEL TRABAJO Y DEL PERSONAL"){
      var psicologiaDelTrabajoyDelPersonal = [
    "EVALUACION DEL RENDIMIENTO",
    "RELACIONES PERSONAL/ADMINISTRACION",
    "ACTITUDES Y MORAL",
    "COMPENSACION Y RECONOCIMIENTO",
    "COMPORTAMIENTO ORGANIZACIONAL",
    "CULTURA ORGANIZACIONAL",
    "DISEÑO Y EVALUACION DEL TRABAJO",
    "MEDICION DE LA SATISFACCION",
    "PERSONAL",
    "PERSONAL",
    "PREVENCION DE ACCIDENTES",
    "SELECCION DE PERSONAL",
    "TRABAJO EN EQUIPO",
    "OTROS"]
  disciplineValue = psicologiaDelTrabajoyDelPersonal;
    }
     if(disciplineValue =="PARAPSICOLOGIA"){
      var parapsicologia = [
    "HIPNOSIS",
    "PERCEPCION EXTRASENSORIAL",
    "OTROS"]
  disciplineValue = parapsicologia;
    }
    //----------------------------------------------------------------------///
    if(disciplineValue =="ESTUDIO DE LA PERSONALIDAD"){
      var estudioDeLaPersonalidad = [
    "CREATIVIDAD",
    "CULTURA Y PERSONALIDAD",
    "DESARROLLO DE LA PERSONALIDAD",
    "ESTRUCTURA Y DINAMICA DE LA PERSONALIDAD",
    "MEDICION DE LA PERSONALIDAD",
    "TEORIA DE LA PERSONALIDAD",
    "OTROS"]
  disciplineValue = estudioDeLaPersonalidad;
    }
    if(disciplineValue =="ESTUDIO PSICOLOGICO DE FENOMENOS SOCIALES"){
      var estudioPsicologicoDeFenomenosSociales = [
    "DISCRIMINACION",
    "FENOMENOS DE LOS GRUPOS MINORITARIOS",
    "POLITICA PUBLICA",
    "OTROS"]
  disciplineValue = estudioPsicologicoDeFenomenosSociales;
    }
     if(disciplineValue =="PSICOFARMACOLOGIA"){
      var psicofarmacologia = [
    "ALCOHOLISMO",
    "FUNCION DE LOS MEDICAMENTOS",
    "RESPUESTA DEL COMPORTAMIENTO",
    "TERAPIA CON MEDICAMENTOS",
    "USO INDEBIDO DE DROGAS",
    "OTROS"]
  disciplineValue = psicofarmacologia;
    }
     if(disciplineValue =="PSICOLOGIA SOCIAL"){
      var psicologiaSocial = [
    "ACTITUDES",
    "COMPORTAMIENTO COLECTIVO",
    "COMPORTAMIENTO DEL CONSUMIDOR",
    "COMPORTAMIENTO POLITICO",
    "COMPORTAMIENTO SEGUN LA FUNCION",
    "COMUNICACION SIMBOLICA",
    "CULTURA Y PERSONALIDAD",
    "INTERACCION DE GRUPOS",
    "LIDERAZGO",
    "MERCADEO",
    "OPINION PUBLICA",
    "PERCEPCIONES Y MOVIMIENTOS SOCIALES",
    "PROCESOS DE GRUPO",
    "PROCESOS Y TEORIA DE LAS DECISIONES",
    "PSICOLOGIA DE LA COMUNIDAD",
    "PSICOLOGIA DE LA INGENIERIA",
    "PSICOLOGIA DEL DEPORTE",
    "PSICOLOGIA FORENSE",
    "PUBLICIDAD",
    "SOLUCION DE CONFLICTOS",
    "OTROS"]
  disciplineValue = psicologiaSocial;
    }
    if(disciplineValue =="ARQUITECTURA"){
      var arquitectura = [
    "DISEÑO ARQUITECTONICO",
    "EJECUCION DE LA OBRA",
    "PARQUES Y JARDINES",
    "URBANISMO",
    "OTROS"]
  disciplineValue = arquitectura;
    }
    if(disciplineValue =="TEORIA, ANALISIS Y CRITICA LITERARIOS"){
      var teoriaAnalisisyCriticaLiterarios = [
    "ANALISIS LITERARIO",
    "CRITICA DE TEXTOS",
    "ESTILO Y ESTETICA LITERARIOS",
    "VOCABULARIO LITERARIO","RETORICA",
    "OTROS"]
  disciplineValue = teoriaAnalisisyCriticaLiterarios;
    }
     if(disciplineValue =="TEORIA, ANALISIS Y CRITICA DE LAS BELLAS ARTES"){
      var teoriaAnalisisyCriticaDeLasBellasArtes = [
    "CINEMATOGRAFIA",
    "ARTES DECORATIVAS",
    "COREOGRAFIA",
    "DANZA",
    "DIBUJO","GRABADO",
    "ESCULTURA",
    "ESTETICA DE LAS BELLAS ARTES",
    "FOTOGRAFIA",
    "MUSICA",
    "MUSICOLOGIA",
    "PINTURA",
    "TEATRO",
    "OTROS"]
  disciplineValue = teoriaAnalisisyCriticaDeLasBellasArtes;
    }
    if(disciplineValue =="SOCIOLOGIA CULTURAL"){
      var sociologiaCultural = [
    "CARACTERISTICAS Y CIVILIZACION NACIONALES",
    "EVOLUCION CULTURAL",
    "FOLKLORE",
    "IDIOMA Y CULTURA",
    "RELACIONES CULTURALES",
    "RELACIONES INTERETNICAS",
    "SOCIOLOGIA DE LA LITERATURA",
    "SOCIOLOGIA DE LA RELIGION",
    "SOCIOLOGIA DEL ARTE",
    "SOCIOLOGIA DEL DERECHO",
    "OTROS"]
  disciplineValue = sociologiaCultural;
    }
      if(disciplineValue =="SOCIOLOGIA EXPERIMENTAL"){
      var sociologiaExperimental = [
    "ACOPIO DE DATOS SOBRE EL TERRENO",
    "DISEÑO DE ENCUESTAS SOCIOLOGICAS",
    "METODOS DE LAS ENCUESTAS SOCIOLOGICAS",
    "PSICOLOGIA SOCIAL",
    "OTROS"]
  disciplineValue = sociologiaExperimental;
    }
     if(disciplineValue =="SOCIOLOGIA GENERAL"){
      var sociologiaGeneral = [
    "METODOLOGIA",
    "SOCIOGRAFIA",
    "SOCIOLOGIA COMPARADA",
    "SOCIOLOGIA HISTORICA",
    "TEORIA",
    "OTROS"]
  disciplineValue = sociologiaGeneral;
    }
    if(disciplineValue =="PROBLEMAS INTERNACIONALES"){
      var problemasInternacionales = [
    "CONFLICTOS",
    "GUERRA Y PAZ",
    "SOLUCION DE CONFLICTOS",
    "OTROS"]
  disciplineValue = problemasInternacionales;
    }
     if(disciplineValue =="SOCIOLOGIA MATEMATICA Y ESTADISTICA"){
      var SocioligiaMatematicayEstadistica = [
    "ANALISIS ESTADISTICO",
    "CONSTRUCCION DE MODELOS",
    "MEDICION Y CONSTRUCCION DE INDICES",
    "OTROS"]
  disciplineValue = SocioligiaMatematicayEstadistica;
    }
    if(disciplineValue =="SOCIOLOGIA DE ACTIVIDADES PARTICULARES"){
      var SocioligiaDeActividadesParticulares = [
    "BUROCRACIA",
    "OCIOLOGIA DE LOS MEDIOS DE COMUNICACION DE MASAS",
    "SOCIOLOGIA DE LA EDUCACION",
    "SOCIOLOGIA DE LA ENSEÑANZA",
    "SOCIOLOGIA DE LA INDUSTRIA",
    "SOCIOLOGIA DE LA MEDICINA",
    "SOCIOLOGIA DE LAS CIENCIAS",
    "SOCIOLOGIA DEL DERECHO"]
  disciplineValue = SocioligiaDeActividadesParticulares;
    }
    if(disciplineValue =="CAMBIO Y DESARROLLO SOCIAL"){
      var cambioyDesarrolloSocial = [
    "DESARROLLO SOCIOECONOMICO",
    "DESARROLLO SUSTENTABLE",
    "EVOLUCION DE LAS SOCIEDADES",
    "PAISES EN DESARROLLO",
    "POLITICA SOCIAL",
    "SEGURIDAD SOCIAL",
    "SERVICIOS SOCIALES",
    "TECNOLOGIA Y CAMBIO SOCIAL",
    "OTROS"]
  disciplineValue = cambioyDesarrolloSocial;
    }
     if(disciplineValue =="COMUNICACION SOCIAL"){
      var comunicacionSocial = [
    "SIGNOS",
    "SIMBOLOS",
    "SOCIOLINGÜISTICA",
    "OTROS"]
  disciplineValue = comunicacionSocial;
    }
    if(disciplineValue =="GRUPOS SOCIALES"){
      var gruposSociales = [
    "CASTAS",
    "CLASES SOCIALES",
    "CONDICION DE LA MUJER",
    "ELITES",
    "ESTRATIFICACION SOCIAL",
    "FAMILIA",
    "LINAJE",
    "MATRIMONIO",
    "MOVILIDAD SOCIAL",
    "RIBUS",
    "OTROS"]
  disciplineValue = gruposSociales;
    }
     if(disciplineValue =="PROBLEMAS SOCIALES"){
      var probelmasSociales = [
    "BIENESTAR SOCIAL",
    "CALIDAD DE VIDA",
    "CONFLICTO Y ACUERDO SOCIAL",
    "DELINCUENCIA",
    "DELITO",
    "DESEMPLEO",
    "ENFERMEDAD",
    "HAMBRE",
    "IMPEDIDOS",
    "INADAPTADOS",
    "NIVEL DE VIDA",
    "POBREZA",
    "RELACIONES INTERRACIALES",
    "TERRORISMO",
    "OTROS"]
  disciplineValue = probelmasSociales;
    }
    if(disciplineValue =="SOCIOLOGIA DE LA IMPLANTACION HUMANA"){
      var sociologiaDeLaImplicacionHumana = [
    "BARRIOS DE TUGURIOS",
    "ESTUDIOS SOBRE LA COMUNIDAD",
    "OCIOLOGIA RURAL",
    "SOCIOLOGIA ECOLOGICA",
    "SOCIOLOGIA LOCAL",
    "SOCIOLOGIA URBANA",
    "OTROS"]
  disciplineValue = sociologiaDeLaImplicacionHumana;
    }
    if(disciplineValue =="CULTURA FÍSICA"){
      var culturaFisica = [
    "ACTIVIDAD FÍSICA Y DEPORTE"]
  disciplineValue = culturaFisica;
    }
     if(disciplineValue =="HUMANIDADES"){
      var culturaFisica = [
    "TRABAJO SOCIAL"]
  disciplineValue = culturaFisica;
    }
     if(disciplineValue =="TERAPIA OCUPACIONAL"){
      var terapiaOcupacional = [
    "ADULTOS MAYORES",
    "INSERCION LABORAL",
    "PEDIATRIA",
    "REHABILITACION FISICA",
    "SALUD MENTAL"]
  disciplineValue = terapiaOcupacional;
    }
     if(disciplineValue =="ETICA INDIVIDUAL"){
      var eticaIndividual = [
    "CODIGOS DE CONDUCTA ÉTICA",
    "CODIGOS DE VALORES",
    "MOTIVACION",
    "ÉTICA FILOSOFICA",
    "ÉTICA RELIGIOSA",
    "OTROS"]
  disciplineValue = eticaIndividual;
    }
       if(disciplineValue =="ETICA DE GRUPO"){
      var eticaDeGrupo = [
    "DECLARACIONES INTERNACIONALES",
    "ÉTICA DE LA CIENCIA",
    "ÉTICA ECONOMICA",
    "ÉTICA NACIONAL",
    "ÉTICA TRANSNACIONAL",
    "OTROS"]
  disciplineValue = eticaDeGrupo;
    }
        if(disciplineValue =="FILOSOFIA DE LOS CONOCIMIENTOS"){
      var filosofiaDeLosConocimientos = [
    "EPISTEMOLOGIA",
    "FILOSOFIA APORETICA",
    "TEORIA DE LA PERCEPCION",
    "TEORIA DE LA RAZON",
    "TEORIA DEL CONCEPTO",
    "TEORIA DEL JUICIO",
    "OTROS"]
  disciplineValue = filosofiaDeLosConocimientos;
    }
    if(disciplineValue =="ANTROPOLOGIA FILOSOFICA"){
      var antropologiaFilosofica = [
    "ESTETICA",
    "FILOSOFIA DE LA ACCION",
    "FILOSOFIA DE LA IMAGINACION",
    "FILOSOFIA DE LA INTERSUBJETIVIDAD",
    "FILOSOFIA DE LA VOLUNTAD",
    "FILOSOFIA DEL LENGUAJE",
    "HERMENEUTICA",
    "PROBLEMA MENTE-CUERPO",
    "OTROS"]
  disciplineValue = antropologiaFilosofica;
    }
    if(disciplineValue =="FILOSOFIA GENERAL"){
      var filosofiaGeneral = [
    "LOGICA DIALECTICA",
    "MATERIALISMO DIALECTICO",
    "METAFISICA",
    "ONTOLOGIA",
    "TEOLOGIA NATURAL",
    "OTROS"]
  disciplineValue = filosofiaGeneral;
    }
        if(disciplineValue =="SISTEMAS FILOSOFICOS"){
      var sistemasFilosoficos = [
    "FILOSOFIA ANTIGUA",
    "FILOSOFIA DE HOY",
    "FILOSOFIA MEDIEVAL",
    "FILOSOFIA MODERNA",
    "SISTEMAS TEOLOGICO-FILOSOFICOS",
    "OTROS"]
  disciplineValue = sistemasFilosoficos;
    }
    if(disciplineValue =="FILOSOFIA DE LA CIENCIA"){
      var filosofiaDeLaCiencia = [
    "FILOSOFIA DE LA BIOLOGIA",
    "FILOSOFIA DE LA FISICA",
    "FILOSOFIA DE LA LOGICA",
    "FILOSOFIA DE LAS CIENCIAS SOCIALES",
    "FILOSOFIA DE LAS MATEMATICAS",
    "FILOSOFIA DEL DERECHO",
    "OTROS"]
  disciplineValue = filosofiaDeLaCiencia;
    }
       if(disciplineValue =="FILOSOFIA DE LA NATURALEZA"){
      var filosofiaDeLaNaturaleza = [
    "FILOSOFIA DE LA MATERIA",
    "FILOSOFIA DE LA VIDA",
    "FILOSOFIA DEL ESPACIO Y DEL TIEMPO",
    "OTROS"]
  disciplineValue = filosofiaDeLaNaturaleza;
    }
     if(disciplineValue =="FILOSOFIA SOCIAL"){
      var filosofiaSocial = [
    "FILOSOFIA DE LA CALIDAD",
    "FILOSOFIA DE LA CULTURA",
    "FILOSOFIA DE LA EDUCACION",
    "FILOSOFIA DE LA HISTORIA",
    "FILOSOFIA DE LAS TECNICAS",
    "FILOSOFIA POLITICA",
    "TEORIA DE LAS IDEOLOGIAS",
    "OTROS"]
  disciplineValue = filosofiaSocial;
    }
      if(disciplineValue =="ANALISIS DE TENDENCIAS"){
      var analisisDeTendencias = [
    "RUPTURAS",
    "OTROS"]
  disciplineValue = analisisDeTendencias;
    }
      if(disciplineValue =="NUEVOS SISTEMAS ORGANIZACIONALES"){
      var nuevosSistemasOrganizacionales = [
    "CADENAS PRODUCTIVAS",
    "MERCADOS LABORALES",
    "SEGURIDAD NACIONAL E INTERNACIONAL",
    "SISTEMAS EDUCATIVOS",
    "SISTEMAS NACIONALES DE INNOVACION",
    "OTROS"]
  disciplineValue = nuevosSistemasOrganizacionales;
    }
       if(disciplineValue =="SILVICULTURA"){
      var silvicultura = [
    "CONSERVACION",
    "CONTROL DE LA EROSION",
    "GESTION DE LAS PRADERAS",
    "ORDENAMIENTO DE CUENCAS HIDROGRAFICAS",
    "ORDENAMIENTO",
    "PRODUCTOS",
    "PROTECCION",
    "SILVICULTURA",
    "TECNICAS DE CULTIVO",
    "OTROS"]
  disciplineValue = silvicultura;
    }

  if(disciplineValue =="INMUNOLOGIA"){
      var inmunologia = [
    "ANTICUERPOS DE LOS TEJIDOS",
    "ANTICUERPOS",
    "ANTIGENOS",
    "FORMACION ANTICUERPOS",
    "HIPERSENSIBILIDAD",
    "INMUNIZACION",
    "INMUNOQUIMICA",
    "REACCION ANTIGENO- ANTICUERPO",
    "TRANSPORTE DE ORGANOS",
    "VACUNAS",
    "OTROS"]
     disciplineValue = inmunologia;
  }
    if(disciplineValue =="HIGIENE VETERINARIA Y SALUD PUBLICA"){
      var higineneVeterinariaySaludPublica = [" "]
     disciplineValue = higineneVeterinariaySaludPublica;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS DE LA TIERRA, DEL COSMOS Y DEL MEDIO AMBIENTE"){
      var otrasEspecialidadesEnMateriaDeCienciasDeLaTierra = [" "]
     disciplineValue = otrasEspecialidadesEnMateriaDeCienciasDeLaTierra;
  }
  if(disciplineValue =="BIOFISICA"){
      var biofisica = ["BIOACUSTICA",
                "BIOELECTRICIDAD",
                "BIOENERGETICA",
                "BIOMECANICA",
                "BIOOPTICA",
                "FISICA MEDICA",
                "OTROS"]
     disciplineValue = biofisica;
  }
   if(disciplineValue =="BIOLOGIA MOLECULAR"){
      var biologiaMolecular = [" "]
     disciplineValue = biologiaMolecular;
  }
  if(disciplineValue =="EVOLUCION"){
      var evolucion = [" "]
     disciplineValue = evolucion;
  }
  if(disciplineValue =="RADIOBIOLOGIA"){
      var radioBiologia = [" "]
     disciplineValue = radioBiologia;
  }
  if(disciplineValue =="SIMBIOSIS"){
      var simbiosis = [" "]
     disciplineValue = simbiosis;
  }
   if(disciplineValue =="DERECHO CANONICO"){
      var derechoCanonico = [" "]
     disciplineValue = derechoCanonico;
  }
   if(disciplineValue =="IDEOLOGIAS POLITICAS"){
      var ideologiasPoliticas = [" "]
     disciplineValue = ideologiasPoliticas;
  }
   if(disciplineValue =="POLITICA TEORICA"){
      var politicaToeorica = [" "]
     disciplineValue = politicaToeorica;
  }
   if(disciplineValue =="SISTEMAS POLITICOS"){
      var sistemasPoliticos = [" "]
     disciplineValue = sistemasPoliticos;
  }
  if(disciplineValue =="ETICA CLASICA"){
      var eticaClasica = [" "]
     disciplineValue = eticaClasica;
  }
  if(disciplineValue =="ETICA PROSPECTIVA"){
      var eticaProspectiva = [" "]
     disciplineValue = eticaProspectiva;
  }
   if(disciplineValue =="FISICA DEL ESPACIO"){
      var fisicaDelEspacio = [" "]
     disciplineValue = fisicaDelEspacio;
  }
  if(disciplineValue =="GEOGRAFIA HISTORICA"){
      var geografiaHistorica = [" "]
     disciplineValue = geografiaHistorica;
  }
  if(disciplineValue =="GEOGRAFIA REGIONAL"){
      var geografiaRegional = [" "]
     disciplineValue = geografiaRegional;
  }
   if(disciplineValue =="BIOGRAFIA"){
      var biografia = [" "]
     disciplineValue = biografia;
  }
  if(disciplineValue =="GEOGRAFIA LINGÜISTICA"){
      var geografiaLinguistica = [" "]
     disciplineValue = geografiaLinguistica;
  }
   if(disciplineValue =="LINGÜISTICA TEORICA"){
      var linguisticaTeorica = [" "]
     disciplineValue = linguisticaTeorica;
  }
   if(disciplineValue =="POLITICAS DEL LENGUAJE"){
      var politicasDelLenguaje = [" "]
     disciplineValue = politicasDelLenguaje;
  }
    if(disciplineValue =="APLICACIONES DE LA LOGICA"){
      var aplicacionesDeLaLogica = [" "]
     disciplineValue = aplicacionesDeLaLogica;
  }
    if(disciplineValue =="LOGICA GENERAL"){
      var logicaGeneral = [" "]
     disciplineValue = logicaGeneral;
  }
   if(disciplineValue =="MATEMATICAS"){
      var matematicas = [" "]
     disciplineValue = matematicas;
  }
    if(disciplineValue =="BIOLOGIA DE LA REPRODUCCION HUMANA"){
      var biologiaDeLaReproduccionHumana = [" "]
     disciplineValue = biologiaDeLaReproduccionHumana;
  }
   if(disciplineValue =="CIENCIAS DE LA INFORMACION Y COMUNICACION EN MEDICINA"){
      var cienciasDeLaInformacionyComunicacionEnMedicina = [" "]
     disciplineValue = cienciasDeLaInformacionyComunicacionEnMedicina;
  }
  if(disciplineValue =="CIENCIAS SOCIALES EN MEDICINA"){
      var cienciasSocialesEnMedicina = [" "]
     disciplineValue = cienciasSocialesEnMedicina;
  }
  if(disciplineValue =="EPIDEMIOLOGIA"){
      var epidemiologia = [" "]
     disciplineValue = epidemiologia;
  }
   if(disciplineValue =="FISIOLOGIA"){
      var fisiologia = [" "]
     disciplineValue = fisiologia;
  }
   if(disciplineValue =="MORFOLOGIA"){
      var morfologia = [" "]
     disciplineValue = morfologia;
  }
    if(disciplineValue =="MEDICINA FORENSE"){
      var medicinaForense = [" "]
     disciplineValue = medicinaForense;
  }
   if(disciplineValue =="MEDICINA PREVENTIVA"){
      var medicinaPreventiva = [" "]
     disciplineValue = medicinaPreventiva;
  }
   if(disciplineValue =="OBSTETRICIA"){
      var obstetrica = [" "]
     disciplineValue = obstetrica;
  }
    if(disciplineValue =="PSIQUIATRIA"){
      var psiquiatria = [" "]
     disciplineValue = psiquiatria;
  }
   if(disciplineValue =="SANIDAD PUBLICA"){
      var sanidadPublica = [" "]
     disciplineValue = sanidadPublica;
  }
    if(disciplineValue =="TOXICOLOGIA"){
      var toxicologia = [" "]
     disciplineValue = toxicologia;
  }
     if(disciplineValue =="QUIMICA FISICA"){
      var quimicaFisica = [" "]
     disciplineValue = quimicaFisica;
  }
     if(disciplineValue =="ORGANIZACION SOCIAL ESTRUCTURA E INSTITUCIONES"){
      var organizacionSocialEsturcturaeInstituciones = [" "]
     disciplineValue = organizacionSocialEsturcturaeInstituciones;
  }
    if(disciplineValue =="ANALISIS DE RIESGOS"){
      var analisisDeRiesgos = [" "]
     disciplineValue = analisisDeRiesgos;
  }
    if(disciplineValue =="CONSTRUCCION DE ESCENARIOS"){
      var construccionDeEscenarios = [" "]
     disciplineValue = construccionDeEscenarios;
  }
    if(disciplineValue =="DESARROLLO SUSTENTABLE"){
      var desarrolloSustentable = [" "]
     disciplineValue = desarrolloSustentable;
  }
   if(disciplineValue =="DISEÑO DE PRIORIDADES A LARGO PLAZO"){
      var disenioDePrioridadesALargoPlazo = [" "]
     disciplineValue = disenioDePrioridadesALargoPlazo;
  }
   if(disciplineValue =="ETICA DEL FUTURO"){
      var eticaDelFuturo = [" "]
     disciplineValue = eticaDelFuturo;
  }
  if(disciplineValue =="FUTURO DE LOS CONOCIMIENTOS Y LAS NUEVAS TECNOLOGIAS"){
      var futurioDeLosConocimientosyLasNuevasTecnologias = [" "]
     disciplineValue = futurioDeLosConocimientosyLasNuevasTecnologias;
  }
  if(disciplineValue =="NUEVAS FUERTES DE ENERGIA"){
      var nuevasFuentesDeEnergia = [" "]
     disciplineValue = nuevasFuentesDeEnergia;
  }
    if(disciplineValue =="PREVISION"){
      var prevision = [" "]
     disciplineValue = prevision;
  }
   if(disciplineValue =="PLANEACION Y DISEÑO DE ESTRATEGIAS"){
      var planeacionyDisenioDeEstrategias = [" "]
     disciplineValue = planeacionyDisenioDeEstrategias;
  }
   if(disciplineValue =="TENDENCIAS DEMOGRAFICAS Y POBLACIONALES"){
      var tendenciasDemograficasyPoblacionales = [" "]
     disciplineValue = tendenciasDemograficasyPoblacionales;
  }
   if(disciplineValue =="ANTROPOLOGIA ESTRUCTURAL"){
      var antropologiaEstructural = [" "]
     disciplineValue = antropologiaEstructural;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE ANTROPOLOGIA"){
      var otrasEspecialidadesAntropologia = [" "]
     disciplineValue = otrasEspecialidadesAntropologia;
  }
   if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE ARTES Y LETRAS"){
      var otrasEspecialidadesArtesyLetras = [" "]
     disciplineValue = otrasEspecialidadesArtesyLetras;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE ASTRONOMIA"){
      var otrasEspecialidadesAstronomia = [" "]
     disciplineValue = otrasEspecialidadesAstronomia;
  }
   if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS AGRONOMICAS Y VETERINARIAS"){
      var otrasEspecialidadesAgronomicasyVeterinarias = [" "]
     disciplineValue = otrasEspecialidadesAgronomicasyVeterinarias;
  }
   if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE BIOLOGIA"){
      var otrasEspecialidadesBiologia = [" "]
     disciplineValue = otrasEspecialidadesBiologia;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE ECONOMIA"){
      var otrasEspecialidadesEconomia = [" "]
     disciplineValue = otrasEspecialidadesEconomia;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS POLITICAS"){
      var otrasEspecialidadesCienciasPoliticas = [" "]
     disciplineValue = otrasEspecialidadesCienciasPoliticas;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE DEMOGRAFIA"){
      var otrasEspecialidadesDemografia = [" "]
     disciplineValue = otrasEspecialidadesDemografia;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE ETICA"){
      var otrasEspecialidadesEtica = [" "]
     disciplineValue = otrasEspecialidadesEtica;
  }
   if(disciplineValue =="DOCTRINAS FILOSOFICAS"){
      var doctrinasFisiologicas = [" "]
     disciplineValue = doctrinasFisiologicas;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE FILOSOFIA"){
      var otrasEspecialidadesFilosofica = [" "]
     disciplineValue = otrasEspecialidadesFilosofica;
  }
   if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE FISICA"){
      var otrasEspecialidadesFisica = [" "]
     disciplineValue = otrasEspecialidadesFisica;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE GEOGRAFIA"){
      var otrasEspecialidadesGeografia = [" "]
     disciplineValue = otrasEspecialidadesGeografia;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE HISTORIA"){
      var otrasEspecialidadesHistoria = [" "]
     disciplineValue = otrasEspecialidadesHistoria;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE LINGÜISTICA"){
      var otrasEspecialidadesLinguistica = [" "]
     disciplineValue = otrasEspecialidadesLinguistica;
  }
   if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE LOGICA"){
      var otrasEspecialidadesLogica = [" "]
     disciplineValue = otrasEspecialidadesLogica;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE MATEMATICAS"){
      var otrasEspecialidadesMatematicas = [" "]
     disciplineValue = otrasEspecialidadesMatematicas;
  }
  if(disciplineValue =="ADMINISTRACION DE HOSPITALES Y DE LA ATENCION MEDICA"){
      var administracionDeHospitalesyDeLaAtencionMedica = [" "]
     disciplineValue = administracionDeHospitalesyDeLaAtencionMedica;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE MEDICINA Y PATOLOGIA HUMANAS"){
      var otrasEspecialidadesMedicinayPatologiaHumanas = [" "]
     disciplineValue = otrasEspecialidadesMedicinayPatologiaHumanas;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE PEDAGOGIA"){
      var otrasEspecialidadesPedagogia = [" "]
     disciplineValue = otrasEspecialidadesPedagogia;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE PSICOLOGIA"){
      var otrasEspecialidadesPsicologia = [" "]
     disciplineValue = otrasEspecialidadesPsicologia;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA PROSPECTIVA"){
      var otrasEspecialidadesProspectiva = [" "]
     disciplineValue = otrasEspecialidadesProspectiva;
  }
   if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE QUIMICA"){
      var otrasEspecialidadesQuimica = [" "]
     disciplineValue = otrasEspecialidadesQuimica;
  }
  if(disciplineValue =="OTRAS ESPECIALIDADES EN MATERIA DE SOCIOLOGIA"){
      var otrasEspecialidadesSociologia = [" "]
     disciplineValue = otrasEspecialidadesSociologia;
  }
    var newSubdiscipline ="<span class='plain-select'><select id='BooksChapters_subdiscipline' title='Subdisciplina.' name='BooksChapters[subdiscipline]'>";
    newSubdiscipline+="<option>Seleccionar Subdisciplina</option>";
    for (var item in disciplineValue) {
        newSubdiscipline +="<option>"+disciplineValue[ item ]+"</option>";
    }

    newSubdiscipline+="</select></span>";

    $("#comboSubdiscipline").html(newSubdiscipline);
        $('#BooksChapters_subdiscipline').tooltipster({
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
        <?php echo $form->textField($model,'isbn',array('size'=>13,'maxlength'=>13,'placeholder'=>'ISBN','class' => 'numericOnly','id'=>'limite','title'=>'ISBN. (Solo se aceptan numeros)')); ?>
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

    <?php echo $form->textField($model,'volume',array('size'=>5,'maxlength'=>5, 'placeholder'=>'No. volumen','class' => 'numericOnly','title'=>'No. volumen. (Solo se aceptan numeros)')); ?>
    <?php echo $form->error($model,'volume'); ?>
  </div>

  <div class="row">

    <?php echo $form->textField($model,'pages',array('size'=>10,'maxlength'=>10,'placeholder'=>'No. páginas','class' => 'numericOnly','title'=>'No. páginas. (Solo se aceptan numeros)')); ?>
    <?php echo $form->error($model,'pages'); ?>
  </div>

  <div class="row">
    <?php echo $form->textField($model,'citations',array('size'=>10,'maxlength'=>10,'placeholder'=>'No. citas','class' => 'numericOnly','title'=>'No. citas. (Solo se aceptan numeros)')); ?>
    <?php echo $form->error($model,'citations'); ?>
  </div>

   <div class="row">
        <?php echo $form->textField($model,'total_of_authors',array('size'=>5,'maxlength'=>5,'placeholder'=>'Total de autores','class' => 'numericOnly','title'=>'Total de autores. (Solo se aceptan numeros)')); ?>
        <?php echo $form->error($model,'total_of_authors'); ?>
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

  <?php
  if(!$model->isNewRecord){

      echo '<div class="row"id="comboDiscipline">';
      echo $form->dropDownList($model,'discipline',array($model->discipline)/*,array('prompt'=>'Seleccionar disciplina')*/);
      echo '</div>';
      echo '<div class="row"id="comboSubdiscipline">';
      echo $form->dropDownList($model,'subdiscipline',array($model->subdiscipline)/*,array('prompt'=>'Seleccionar subdisciplina')*/);
      echo '</div>';

  }
  else{
    echo '<div class="row"id="comboDiscipline">';

    echo '</div>';
    echo '<div class="row"id="comboSubdiscipline">';

    echo '</div>';
  }
  ?>
   <div class="row">

        <?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>250, 'placeholder'=>'Palabras claves','title'=>'Palabras Claves')); ?>
        <?php echo $form->error($model,'keywords'); ?>
    </div>

  <div class="row">

    <?php 
      if(!$model->isNewRecord){
        echo $form->fileField($model,'url_doc',array('size'=>60,'maxlength'=>100,'title'=>'Documento / capítulo de libros')); 
        echo $model->url_doc != null ? "<a href='".Yii::app()->request->baseUrl."/".$model->url_doc."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$model->url_doc."' style='width:75px;height:auto;'></a>" : "";
        echo $form->error($model,'url_doc');
      }else{
           echo $form->fileField($model,'url_doc',array('size'=>60,'maxlength'=>100,'title'=>'Documento / capítulo de libros'));
           echo $form->error($model,'url_doc'); 
      }
    ?>
  </div>

  <?php
      $this->widget('ext.widgets.reCopy.ReCopyWidget', array(
      'targetClass'=>'authorsRegistry',
      'addButtonLabel'=>'Agregar nuevo autor',
     ));
      ?>
      <div class="authorsRegistry">

      <?php
          echo"<input type='hidden' name='idsBooksChapters[]'>";
       ?>
    <div class="row">
      <?php echo $form->textField($modelAuthor,'names',array('name'=>'names[]','size'=>30,'maxlength'=>30, 'placeholder'=>'Nombre(s)','title'=>'Nombres(s)','onKeyPress'=>'return lettersOnly(event)')); ?>
      <?php echo $form->error($modelAuthor,'names');?>
    </div>

    <div class="row">
      <?php echo $form->textField($modelAuthor,'last_name1',array('name'=>'last_names1[]','size'=>20,'maxlength'=>20, 'placeholder'=>'Apellido Paterno','title'=>'Apllido Paterno','onKeyPress'=>'return lettersOnly(event)')); ?>
      <?php echo $form->error($modelAuthor,'last_name1'); ?>
    </div>

    <div class="row">

      <?php echo $form->textField($modelAuthor,'last_name2',array('name'=>'last_names2[]','size'=>20,'maxlength'=>20,'placeholder'=>'Apellido Materno','title'=>'Apellido Materno','onKeyPress'=>'return lettersOnly(event)')); ?>
      <?php echo $form->error($modelAuthor,'last_name2'); ?>
    </div>

    <div class="row">

      <?php echo $form->textField($modelAuthor,'position',array('name'=>'positions[]','class' => 'numericOnly','placeholder'=>'Posición','title'=>'Posición. (Solo se aceptan numeros)')); ?>
      <?php echo $form->error($modelAuthor,'position'); ?>
      </div>
      </div>

      <?php
      if(!$model->isNewRecord)
      foreach ($modelAuthors as $key => $value) {
        ?>

      <?php
          echo"<input type='hidden' value='".$value->id."' name='idsBooksChapters[]'>";
         ?>
    <div class="row">
      <?php echo $form->textField($value,'names',array('name'=>'names[]','value'=>$value->names,'size'=>30,'maxlength'=>30, 'placeholder'=>'Nombre(s)','title'=>'Nombres(s)','onKeyPress'=>'return lettersOnly(event)')); ?>
      <?php echo $form->error($value,'names');?>
    </div>

    <div class="row">
      <?php echo $form->textField($value,'last_name1',array('name'=>'last_names1[]','value'=>$value->last_name1,'size'=>20,'maxlength'=>20, 'placeholder'=>'Apellido Paterno','title'=>'Apellido Paterno','onKeyPress'=>'return lettersOnly(event)')); ?>
      <?php echo $form->error($value,'last_name1'); ?>
    </div>

    <div class="row">

      <?php echo $form->textField($value,'last_name2',array('name'=>'last_names2[]','value'=>$value->last_name2,'size'=>20,'maxlength'=>20,'placeholder'=>'Apellido Materno','title'=>'Apellido Materno','onKeyPress'=>'return lettersOnly(event)')); ?>
      <?php echo $form->error($value,'last_name2'); ?>
    </div>

     <div class="row">
      <?php echo $form->textField($value,'position',array('name'=>'positions[]','value'=>$value->position,'class' => 'numericOnly','placeholder'=>'Posición','title'=>'Posición. (Solo se aceptan numeros)')); ?>
      <?php echo $form->error($value,'position');
    ?>
  </div>
   <?php echo CHtml::button('Elminar',array('submit' => array('booksChapters/deleteAuthor','id'=>$modelAuthors[$key]->id,'idBooksChapters'=>$model->id),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething')); ?>
  <hr>
    <?php } ?>

  </div>

  <div class="row buttons">

    <?php echo CHtml::htmlButton($model->isNewRecord ? 'Guardar' : 'Modificar',array(
                'onclick'=>'send("books-chapters-form", "booksChapters/'.($model->isNewRecord ? 'create' : 'update').'", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","booksChapters/admin","");',
                 //'id'=> 'post-submit-btn',
                'class'=>'savebutton',
            ));
    ?>
    <?php echo CHtml::link('Cancelar',array('booksChapters/admin'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>


  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
