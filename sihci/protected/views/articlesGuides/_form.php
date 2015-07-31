<?php
/* @var $this ArticlesGuidesController */
/* @var $model ArticlesGuides */
/* @var $form CActiveForm */

?>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/protected/views/articlesGuides/js/script.js"></script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articles-guides-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	
	'enableClientValidation' => true,
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
	//'clientOptions'=>array('validateOnSubmit'=>true),


)); ?>


	<div class="row">
		<?php echo $form->textField($model,'isbn',array('maxlength'=>13,'placeholder'=>'Número de ISBN', 'class'=>'numericOnly','title'=>'Número de ISBN. (Solo se aceptan numeros)','class' => 'numericOnly')); ?>
		<?php echo $form->error($model,'isbn'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150, 'placeholder'=>'Título', 'title'=>'Título (máximo 150 carácteres)')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div class="row">
		<?php echo $form->textField($model,'editorial',array('size'=>60,'maxlength'=>80, 'placeholder'=>'Editorial', 'title'=>'Editorial (máximo 80 carácteres)')); ?>
		<?php echo $form->error($model,'editorial'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'edicion',array('placeholder'=>'Edición','maxlength'=>11, 'class'=>'numericOnly','title'=>'Edición. (Solo se aceptan numeros)')); ?>
		<?php echo $form->error($model,'edicion'); ?>
	</div>

	<div class="row">
	<span class="plain-select">
		<?php  echo $form->dropDownList($model,'publishing_year',array('promt'=>'Año de publicación',
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
					'2015'=>'2015'),array('title'=>'Año de publicación'));
		?>
		</span>
		<?php echo $form->error($model,'publishing_year'); ?>
	</div>

	<div class="row">
    <span class="plain-select">
		<?php echo $form->dropDownList($model,'article_type',
        array(
          'Memorias de congresos'=>'Memorias de congresos',
          'Publicado sin Arbitraje'=>'Publicado sin Arbitraje',
          'Revistas Arbitradas'=>'Revistas Arbitradas',
          'Revistas Indizadas'=>'Revistas Indizadas',
        ),
        array('prompt'=>'Seleccionar tipo de articulo','title'=>'Tipo de articulo'));
    ?>
		
    </span>
    <?php echo $form->error($model,'article_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'type',array('size'=>15,'maxlength'=>15,'placeholder'=>'Clasificación del articulo o guía', 'title'=>'Clasificación del articulo o guía(máximo 15 carácteres)')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'magazine',array('size'=>50,'maxlength'=>50,'placeholder'=>'Revista', 'title'=>'Revista (máximo 50 carácteres)')); ?>
		<?php echo $form->error($model,'magazine'); ?>
	</div>


	<div class="row">
		<?php echo $form->textField($model,'volumen',array('maxlength'=>11, 'placeholder'=>'Volumen','maxlength'=>11,'class'=>'numericOnly', 'title'=>'Volumen. (Solo se aceptan numeros)',)); ?>
		<?php echo $form->error($model,'volumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'volumen_no',array('maxlength'=> 11,'placeholder'=>'Número de Volumen','class'=>'numericOnly', 'title'=>'Número de Volumen. (Solo se aceptan numeros)')); ?>
		<?php echo $form->error($model,'volumen_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'start_page',array('placeholder'=>'Pagina inicial','maxlength'=>11,'class'=>'numericOnly', 'title'=>'Pagina inicial. (Solo se aceptan numeros)')); ?>
		<?php echo $form->error($model,'start_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'end_page',array('placeholder'=>'Pagina final','maxlength'=>11, 'class'=>'numericOnly','title'=>'Pagina final. (Solo se aceptan numeros)')); ?>
		<?php echo $form->error($model,'end_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'copies_issued',array( 'maxlength'=>11 ,'placeholder'=>'Tiraje', 'class'=>'numericOnly','title'=>'Tiraje. (Solo se aceptan numeros)')); ?>
		<?php echo $form->error($model,'copies_issued'); ?>
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
                                'QUIMICA'=>'QUIMICA', 'SOCIOLOGIA'=>'SOCIOLOGIA'),
                                array('prompt'=>'Seleccionar área','title'=>'Area', 'id'=>'area', 'onchange'=>'changeArea()')); ?>
       </span>
        <?php echo $form->error($model,'area'); ?>
   </div>
    <?php
  if(!$model->isNewRecord){
    
    echo '<div class="row" id="comboDiscipline" >';
    echo '<span class="plain-select">';
    if($model->area == "ANTROPOLOGIA"){
    echo $form->dropDownList($model,'discipline',array("ANTROPOLOGIA CULTURAL"=>"ANTROPOLOGIA CULTURAL","ANTROPOLOGIA ESTRUCTURAL"=>"ANTROPOLOGIA ESTRUCTURAL",
   "ANTROPOLOGIA SOCIAL"=>"ANTROPOLOGIA SOCIAL","ETNOGRAFIA Y ETNOLOGIA"=>"ETNOGRAFIA Y ETNOLOGIA",
   "OTRAS ESPECIALIDADES EN MATERIA DE ANTROPOLOGIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE ANTROPOLOGIA"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "ARTES Y LETRAS"){
    echo $form->dropDownList($model,'discipline',array("ARQUITECTURA"=>"ARQUITECTURA",
    "TEORIA, ANALISIS Y CRITICA DE LAS BELLAS ARTES"=>"TEORIA, ANALISIS Y CRITICA DE LAS BELLAS ARTES",
    "TEORIA, ANALISIS Y CRITICA LITERARIOS"=>"TEORIA, ANALISIS Y CRITICA LITERARIOS",
    "OTRAS ESPECIALIDADES EN MATERIA DE ARTES Y LETRAS"=>"OTRAS ESPECIALIDADES EN MATERIA DE ARTES Y LETRAS"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "ASTRONOMIA Y ASTROFISICA"){
    echo $form->dropDownList($model,'discipline',array("ASTRONOMIA OPTICA"=>"ASTRONOMIA OPTICA",
    "COSMOLOGIA Y COSMOGONIA"=>"COSMOLOGIA Y COSMOGONIA",
    "ESPACIOS Y MATERIA INTERPLANETARIOS"=>"ESPACIOS Y MATERIA INTERPLANETARIOS",
    "PLANETOLOGIA"=>"PLANETOLOGIA",
    "RADIOASTRONOMIA"=>"RADIOASTRONOMIA",
    "SISTEMA SOLAR"=>"SISTEMA SOLAR",
    "OTRAS ESPECIALIDADES EN MATERIA DE ASTRONOMIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE ASTRONOMIA"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "CIENCIAS AGRONOMICAS Y VETERINARIAS"){
    echo $form->dropDownList($model,'discipline',array("AGRONOMIA"=>"AGRONOMIA",
    "CIENCIAS VETERINARIAS"=>"CIENCIAS VETERINARIAS",
    "CIENCIAS VETERINARIAS"=>"CIENCIAS VETERINARIAS",
    "FITOPATOLOGIA"=>"FITOPATOLOGIA",
    "HIGIENE VETERINARIA Y SALUD PUBLICA"=>"HIGIENE VETERINARIA Y SALUD PUBLICA",
    "HORTICULTURA"=>"HORTICULTURA",
    "INGENIERIA RURAL"=>"INGENIERIA RURAL",
    "PECES Y ANIMALES SALVAJES"=>"PECES Y ANIMALES SALVAJES",
    "QUIMICA AGRONOMICA"=>"QUIMICA AGRONOMICA",
    "SILVICULTURA"=>"SILVICULTURA",
    "OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS AGRONOMICAS Y VETERINARIAS"=>"OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS AGRONOMICAS Y VETERINARIAS"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "CIENCIAS DE LA OCUPACION"){
    echo $form->dropDownList($model,'discipline',array("TERAPIA OCUPACIONAL"=>"TERAPIA OCUPACIONAL"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "CIENCIAS DE LA TECNOLOGIA"){
    echo $form->dropDownList($model,'discipline',array("ANALISIS DE LAS OPERACIONES TECNOLOGICAS"=>"ANALISIS DE LAS OPERACIONES TECNOLOGICAS",
    "CIENCIAS DE LA COMPUTACION"=>"CIENCIAS DE LA COMPUTACION",
    "GESTION DE LA CALIDAD"=>"GESTION DE LA CALIDAD",
    "INSTRUMENTAL TECNOLOGICO"=>"INSTRUMENTAL TECNOLOGICO",
    "TECNOLOGIA BIOQUIMICA"=>"TECNOLOGIA BIOQUIMICA",
    "TECNOLOGIA DE FERROCARRILES"=>"TECNOLOGIA DE FERROCARRILES",
    "TECNOLOGIA DE LA ALIMENTACION"=>"TECNOLOGIA DE LA ALIMENTACION",
    "TECNOLOGIA DE BIOMOLECULAS"=>"TECNOLOGIA DE BIOMOLECULAS",
    "TECNOLOGIA DE BIOPROCESOS"=>"TECNOLOGIA DE BIOPROCESOS",
    "TECNOLOGIA DE LA CONSTRUCCION"=>"TECNOLOGIA DE LA CONSTRUCCION",
    "TECNOLOGIA DE LA ENERGIA"=>"TECNOLOGIA DE LA ENERGIA",
    "TECNOLOGIA DE LA INFORMATICA"=>"TECNOLOGIA DE LA INFORMATICA",
    "TECNOLOGIA DE LA MEDICINA"=>"TECNOLOGIA DE LA MEDICINA",
    "TECNOLOGIA DE LA METALURGIA"=>"TECNOLOGIA DE LA METALURGIA",
    "TECNOLOGIA DE LAS MATERIAS"=>"TECNOLOGIA DE LAS MATERIAS",
    "TECNOLOGIA DE LAS TELECOMUNICACIONES"=>"TECNOLOGIA DE LAS TELECOMUNICACIONES",
    "TECNOLOGIA DE LOS PRODUCTOS METALICOS"=>"TECNOLOGIA DE LOS PRODUCTOS METALICOS",
    "TECNOLOGIA DE MINAS"=>"TECNOLOGIA DE MINAS",
    "TECNOLOGIA ELECTRONICA"=>"TECNOLOGIA ELECTRONICA",
    "TECNOLOGIA DEL ESPACIO"=>"TECNOLOGIA DEL ESPACIO",
    "TECNOLOGIA DEL MEDIO AMBIENTE"=>"TECNOLOGIA DEL MEDIO AMBIENTE",
    "TECNOLOGIA DEL URBANISMO"=>"TECNOLOGIA DEL URBANISMO",
    "TECNOLOGIA DE LOS VEHICULOS DE MOTOR"=>"TECNOLOGIA DE LOS VEHICULOS DE MOTOR",
    "TECNOLOGIA E INGENIERIA AERONAUTICA"=>"TECNOLOGIA E INGENIERIA AERONAUTICA",
    "TECNOLOGIA E INGENIERIA DE LA ELECTRICIDAD"=>"TECNOLOGIA E INGENIERIA DE LA ELECTRICIDAD",
    "TECNOLOGIA E INGENIERIA QUIMICA"=>"TECNOLOGIA E INGENIERIA QUIMICA",
    "TECNOLOGIA INDUSTRIAL"=>"TECNOLOGIA INDUSTRIAL",
    "TECNOLOGIA MECANICA"=>"TECNOLOGIA MECANICA",
    "TECNOLOGIA NAVAL"=>"TECNOLOGIA NAVAL",
    "TECNOLOGIA NUCLEAR"=>"TECNOLOGIA NUCLEAR",
    "TECNOLOGIA TEXTIL"=>"TECNOLOGIA TEXTIL",
    "TECNOLOGIA DEL PETROLEO Y DEL CARBON"=>"TECNOLOGIA DEL PETROLEO Y DEL CARBON",
    "TECNOLOGIA DE LOS SISTEMAS DE TRANSPORTE"=>"TECNOLOGIA DE LOS SISTEMAS DE TRANSPORTE",
    "OTRAS ESPECIALIDADES EN MATERIA DE TECNOLOGIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE TECNOLOGIA"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "CIENCIAS DE LA TIERRA Y DEL COSMOS"){
    echo $form->dropDownList($model,'discipline',array("CIENCIAS ATMOSFERICAS"=>"CIENCIAS ATMOSFERICAS",
    "CLIMATOLOGIA"=>"CLIMATOLOGIA",
    "GEOQUIMICA"=>"GEOQUIMICA",
    "GEODESIA"=>"GEODESIA",
    "GEOGRAFIA"=>"GEOGRAFIA",
    "GEOLOGIA"=>"GEOLOGIA",
    "GEOFISICA"=>"GEOFISICA",
    "HIDROLOGIA"=>"HIDROLOGIA",
    "METEOROLOGIA"=>"METEOROLOGIA",
    "OCEANOGRAFIA"=>"OCEANOGRAFIA",
    "CIENCIAS DEL SUELO"=>"CIENCIAS DEL SUELO",
    "CIENCIAS DEL COSMOS"=>"CIENCIAS DEL COSMOS",
    "OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS DE LA TIERRA DEL COSMOS Y DEL MEDIO AMBIENTE"=>"OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS DE LA TIERRA DEL COSMOS Y DEL MEDIO AMBIENTE",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
     if($model->area == "CIENCIAS DE LA SALUD"){
    echo $form->dropDownList($model,'discipline',array("ENFERMERÍA"=>"ENFERMERÍA",
    "INVESTIGACIÓN EN SALUD"=>"INVESTIGACIÓN EN SALUD","SALUD PÚBLICA"=>"SALUD PÚBLICA"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
     if($model->area == "CIENCIAS DE LA VIDA"){
    echo $form->dropDownList($model,'discipline',array("ANTROPOLOGIA FISICA"=>"ANTROPOLOGIA FISICA",
    "BIOFISICA"=>"BIOFISICA",
    "BIOLOGIA ANIMAL Y ZOOLOGIA"=>"BIOLOGIA ANIMAL Y ZOOLOGIA",
    "BIOLOGIA CELULAR"=>"BIOLOGIA CELULAR",
    "BIOLOGIA HUMANA"=>"BIOLOGIA HUMANA",
    "BIOLOGIA MOLECULAR"=>"BIOLOGIA MOLECULAR",
    "BOTANICA"=>"BOTANICA",
    "BIOQUIMICA"=>"BIOQUIMICA",
    "BIOMATEMATICA"=>"BIOMATEMATICA",
    "BIOMETRIA"=>"BIOMETRIA",
    "ENTOMOLOGIA GENERAL"=>"ENTOMOLOGIA GENERAL",
    "ETOLOGIA"=>"ETOLOGIA",
    "EVOLUCION"=>"EVOLUCION",
    "FISIOLOGIA HUMANA"=>"FISIOLOGIA HUMANA",
    "GENETICA"=>"GENETICA",
    "INMUNOLOGIA"=>"INMUNOLOGIA",
    "MEDIO AMBIENTE"=>"MEDIO AMBIENTE",
    "MICROBIOLOGIA"=>"MICROBIOLOGIA",
    "PALEONTOLOGIA"=>"PALEONTOLOGIA",
    "RADIOBIOLOGIA"=>"RADIOBIOLOGIA",
    "SIMBIOSIS"=>"SIMBIOSIS",
    "VIROLOGIA"=>"VIROLOGIA",
    "OTRAS ESPECIALIDADES EN MATERIA DE BIOLOGIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE BIOLOGIA",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "CIENCIAS ECONOMICAS"){
    echo $form->dropDownList($model,'discipline',array("ACTIVIDADES ECONOMICAS"=>"ACTIVIDADES ECONOMICAS",
    "CAMBIO ECONOMICO O TECNOLOGICO"=>"CAMBIO ECONOMICO O TECNOLOGICO",
    "CONTABILIDAD PUBLICA"=>"CONTABILIDAD PUBLICA",
    "POLITICA FISCAL Y HACIENDA PUBLICA"=>"POLITICA FISCAL Y HACIENDA PUBLICA",
    "ECONOMETRIA"=>"ECONOMETRIA",
    "ECONOMIA INTERNACIONAL"=>"ECONOMIA INTERNACIONAL",
    "ECONOMIA SECTORIAL"=>"ECONOMIA SECTORIAL",
    "GESTION DE LA CALIDAD"=>"GESTION DE LA CALIDAD",
    "ORGANIZACION DE LA INDUSTRIA Y POLITICA ECONOMICA PUBLICA"=>"ORGANIZACION DE LA INDUSTRIA Y POLITICA ECONOMICA PUBLICA",
    "ORGANIZACION Y DIRECCION DE EMPRESAS"=>"ORGANIZACION Y DIRECCION DE EMPRESAS",
    "OTRAS ESPECIALIDADES EN MATERIA DE ECONOMIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE ECONOMIA",
    "SISTEMAS ECONOMICOS"=>"SISTEMAS ECONOMICOS",
    "TEORIA ECONOMICA"=>"TEORIA ECONOMICA",
    "ECONOMIA GENERAL"=>"ECONOMIA GENERAL",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "CIENCIAS JURIDICAS Y DERECHO"){
    echo $form->dropDownList($model,'discipline',array("DERECHO CANONICO"=>"DERECHO CANONICO",
    "DERECHO INTERNACIONAL","DERECHO Y LEGISLACION NACIONALES"=>"DERECHO INTERNACIONAL","DERECHO Y LEGISLACION NACIONALES",
    "ORGANIZACION PENAL","OTRAS ESPECIALIDADES EN MATERIA JURIDICA"=>"ORGANIZACION PENAL","OTRAS ESPECIALIDADES EN MATERIA JURIDICA",
    "TEORIAS Y METODOS JURIDICOS GENERALES"=>"TEORIAS Y METODOS JURIDICOS GENERALES"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "CIENCIAS POLITICAS"){
    echo $form->dropDownList($model,'discipline',array("ADMINISTRACION PUBLICA"=>"ADMINISTRACION PUBLICA",
    "BIBLIOTECONOMIA Y ARCHIVONOMIA"=>"BIBLIOTECONOMIA Y ARCHIVONOMIA",
    "IDEOLOGIAS POLITICAS"=>"IDEOLOGIAS POLITICAS",
    "INSTITUCIONES POLITICAS"=>"INSTITUCIONES POLITICAS",
    "RELACIONES INTERNACIONALES"=>"RELACIONES INTERNACIONALES",
    "OPINION PUBLICA"=>"OPINION PUBLICA",
    "OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS POLITICAS"=>"OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS POLITICAS",
    "POLITICA TEORICA"=>"POLITICA TEORICA",
    "POLITICAS SECTORIALES"=>"POLITICAS SECTORIALES",
    "POLITICA TEORICA"=>"POLITICA TEORICA",
    "SOCIOLOGIA DE LA POLITICA"=>"SOCIOLOGIA DE LA POLITICA",
    "SISTEMAS POLITICOS"=>"SISTEMAS POLITICOS",
    "VIDA POLITICA"=>"VIDA POLITICA",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
     if($model->area == "DEMOGRAFIA"){
    echo $form->dropDownList($model,'discipline',array("CARACTERISTICAS DE LAS POBLACIONES"=>"CARACTERISTICAS DE LAS POBLACIONES",
    "FECUNDIDAD"=>"FECUNDIDAD",
    "DEMOGRAFIA GENERAL"=>"DEMOGRAFIA GENERAL",
    "DEMOGRAFIA GEOGRAFICA"=>"DEMOGRAFIA GEOGRAFICA",
    "DEMOGRAFIA HISTORICA"=>"DEMOGRAFIA HISTORICA",
    "EVOLUCION DEMOGRAFICA"=>"EVOLUCION DEMOGRAFICA",
    "MORTALIDAD"=>"MORTALIDAD",
    "OTRAS ESPECIALIDADES EN MATERIA DE DEMOGRAFIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE DEMOGRAFIA",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
      if($model->area == "ETICA"){
    echo $form->dropDownList($model,'discipline',array("ETICA CLASICA"=>"ETICA CLASICA",
    "ETICA INDIVIDUAL"=>"ETICA INDIVIDUAL",
    "ETICA DE GRUPO"=>"ETICA DE GRUPO",
    "ETICA PROSPECTIVA"=>"ETICA PROSPECTIVA",
    "OTRAS ESPECIALIDADES EN MATERIA DE ETICA"=>"OTRAS ESPECIALIDADES EN MATERIA DE ETICA",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
     if($model->area == "FILOSOFIA"){
    echo $form->dropDownList($model,'discipline',array("ANTROPOLOGIA FILOSOFICA"=>"ANTROPOLOGIA FILOSOFICA",
    "DOCTRINAS FILOSOFICAS"=>"DOCTRINAS FILOSOFICAS",
    "FILOSOFIA DE LOS CONOCIMIENTOS"=>"FILOSOFIA DE LOS CONOCIMIENTOS",
    "FILOSOFIA GENERAL"=>"FILOSOFIA GENERAL",
    "FILOSOFIA DE LA CIENCIA"=>"FILOSOFIA DE LA CIENCIA",
    "FILOSOFIA DE LA NATURALEZA"=>"FILOSOFIA DE LA NATURALEZA",
    "FILOSOFIA SOCIAL"=>"FILOSOFIA SOCIAL",
    "OTRAS ESPECIALIDADES EN MATERIA DE FILOSOFIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE FILOSOFIA",
    "SISTEMAS FILOSOFICOS"=>"SISTEMAS FILOSOFICOS"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
     if($model->area == "FISICA"){
    echo $form->dropDownList($model,'discipline',array("ACUSTICA"=>"ACUSTICA",
    "ELECTROMAGNETISMO"=>"ELECTROMAGNETISMO",
    "ELECTRONICA"=>"ELECTRONICA",
    "FISICOQUIMICA"=>"FISICOQUIMICA",
    "FISICA DE LAS PARTICULAS NUCLEARES"=>"FISICA DE LAS PARTICULAS NUCLEARES",
    "FISICA DE LOS FLUIDOS"=>"FISICA DE LOS FLUIDOS",
    "FISICA DEL ESPACIO"=>"FISICA DEL ESPACIO",
    "FISICA MOLECULAR"=>"FISICA MOLECULAR",
    "FISICA NUCLEAR"=>"FISICA NUCLEAR",
    "FISICA DEL ESTADO SOLIDO"=>"FISICA DEL ESTADO SOLIDO",
    "FISICA TEORICA"=>"FISICA TEORICA",
    "MECANICA"=>"MECANICA",
    "OPTICA"=>"OPTICA",
    "OTRAS ESPECIALIDADES EN MATERIA DE FISICA"=>"OTRAS ESPECIALIDADES EN MATERIA DE FISICA",
    "TERMODINAMICA"=>"TERMODINAMICA",
    "UNIDADES Y CONSTANTES FISICAS"=>"UNIDADES Y CONSTANTES FISICAS",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
     if($model->area == "GEOGRAFIA"){
    echo $form->dropDownList($model,'discipline',array("GEOGRAFIA ECONOMICA"=>"GEOGRAFIA ECONOMICA",
    "GEOGRAFIA HISTORICA"=>"GEOGRAFIA HISTORICA",
    "GEOGRAFIA HUMANA"=>"GEOGRAFIA HUMANA",
    "GEOGRAFIA REGIONAL"=>"GEOGRAFIA REGIONAL",
    "OTRAS ESPECIALIDADES EN MATERIA DE GEOGRAFIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE GEOGRAFIA",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "HISTORIA"){
    echo $form->dropDownList($model,'discipline',array("BIOGRAFIA"=>"BIOGRAFIA",
    "CIENCIAS AUXILIARES DE LA HISTORIA"=>"CIENCIAS AUXILIARES DE LA HISTORIA",
    "HISTORIA GENERAL"=>"HISTORIA GENERAL",
    "HISTORIA DE LOS PAISES"=>"HISTORIA DE LOS PAISES",
    "HISTORIA DE LAS EPOCAS"=>"HISTORIA DE LAS EPOCAS",
    "HISTORIA ESPECIALIZADA"=>"HISTORIA ESPECIALIZADA",
    "OTRAS ESPECIALIDADES EN MATERIA DE HISTORIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE HISTORIA",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "LINGÜISTICA"){
    echo $form->dropDownList($model,'discipline',array("GEOGRAFIA LINGÜISTICA"=>"GEOGRAFIA LINGÜISTICA",
    "LINGÜISTICA APLICADA"=>"LINGÜISTICA APLICADA",
    "LINGÜISTICA DIACRONICA"=>"LINGÜISTICA DIACRONICA",
    "LINGÜISTICA TEORICA"=>"LINGÜISTICA TEORICA",
    "LINGÜISTICA SINCRONICA"=>"LINGÜISTICA SINCRONICA",
    "POLITICAS DEL LENGUAJE"=>"POLITICAS DEL LENGUAJE",
    "OTRAS ESPECIALIDADES EN MATERIA DE LINGÜÍSTICA"=>"OTRAS ESPECIALIDADES EN MATERIA DE LINGÜÍSTICA",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "LOGICA"){
    echo $form->dropDownList($model,'discipline',array("APLICACIONES DE LA LOGICA"=>"APLICACIONES DE LA LOGICA",
    "LOGICA DEDUCTIVA"=>"LOGICA DEDUCTIVA",
    "LOGICA GENERAL"=>"LOGICA GENERAL",
    "LOGICA INDUCTIVA"=>"LOGICA INDUCTIVA",
    "METODOLOGIA"=>"METODOLOGIA",
    "OTRAS ESPECIALIDADES EN MATERIA DE LOGICA"=>"OTRAS ESPECIALIDADES EN MATERIA DE LOGICA",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "MATEMATICAS"){
    echo $form->dropDownList($model,'discipline',array("ALGEBRA"=>"ALGEBRA",
    "ANALISIS NUMERICO"=>"ANALISIS NUMERICO",
    "ANALISIS Y ANALISIS FUNCIONAL"=>"ANALISIS Y ANALISIS FUNCIONAL",
    "CALCULO DE PROBABILIDADES"=>"CALCULO DE PROBABILIDADES",
    "ESTADISTICA"=>"ESTADISTICA",
    "GEOMETRIA"=>"GEOMETRIA",
    "INFORMATICA"=>"INFORMATICA",
    "INFORMATICA MATEMATICA"=>"INFORMATICA MATEMATICA",
    "INVESTIGACION OPERATIVA"=>"INVESTIGACION OPERATIVA",
    "MATEMATICAS"=>"MATEMATICAS",
    "TEORIA DE LOS NUMEROS"=>"TEORIA DE LOS NUMEROS",
    "SISTEMAS"=>"SISTEMAS",
    "OTRAS ESPECIALIDADES EN MATERIA DE MATEMATICAS"=>"OTRAS ESPECIALIDADES EN MATERIA DE MATEMATICAS",
    "TOPOLOGIA"=>"TOPOLOGIA"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "MEDICINA Y PATOLOGIA HUMANA"){
    echo $form->dropDownList($model,'discipline',array("ADMINISTRACION DE HOSPITALES Y DE LA ATENCION MEDICA"=>"ADMINISTRACION DE HOSPITALES Y DE LA ATENCION MEDICA",
    "BIOLOGIA DE LA REPRODUCCION HUMANA"=>"BIOLOGIA DE LA REPRODUCCION HUMANA",
    "CIENCIAS DE LA INFORMACION Y COMUNICACION EN MEDICINA"=>"CIENCIAS DE LA INFORMACION Y COMUNICACION EN MEDICINA",
    "CIENCIAS SOCIALES EN MEDICINA"=>"CIENCIAS SOCIALES EN MEDICINA",
    "EPIDEMIOLOGIA"=>"EPIDEMIOLOGIA",
    "FARMACODINAMICA"=>"FARMACODINAMICA",
    "FARMACOLOGIA"=>"FARMACOLOGIA",
    "FISIOLOGIA"=>"FISIOLOGIA",
    "MORFOLOGIA"=>"MORFOLOGIA",
    "MEDICINA CLINICA"=>"MEDICINA CLINICA",
    "MEDICINA FORENSE"=>"MEDICINA FORENSE",
    "MEDICINA DEL TRABAJO"=>"MEDICINA DEL TRABAJO",
    "MEDICINA INTERNA"=>"MEDICINA INTERNA",
    "MEDICINA PREVENTIVA"=>"MEDICINA PREVENTIVA",
    "MEDICINA QUIRURGICA"=>"MEDICINA QUIRURGICA",
    "NUTRICION"=>"NUTRICION",
    "OBSTETRICIA"=>"OBSTETRICIA",
    "OTRAS ESPECIALIDADES EN MATERIA DE MEDICINA Y PATOLOGIA HUMANAS"=>"OTRAS ESPECIALIDADES EN MATERIA DE MEDICINA Y PATOLOGIA HUMANAS",
    "PATOLOGIA"=>"PATOLOGIA",
    "PSIQUIATRIA"=>"PSIQUIATRIA",
    "SANIDAD PUBLICA"=>"SANIDAD PUBLICA",
    "TOXICOLOGIA"=>"TOXICOLOGIA",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
       if($model->area == "PEDAGOGIA"){
    echo $form->dropDownList($model,'discipline',array("FORMACION Y EMPLEO DE LOS EDUCADORES"=>"FORMACION Y EMPLEO DE LOS EDUCADORES",
    "ORGANIZACION Y PLANIFICACION PEDAGOGICAS"=>"ORGANIZACION Y PLANIFICACION PEDAGOGICAS",
    "OTRAS ESPECIALIDADES EN MATERIA DE PEDAGOGIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE PEDAGOGIA",
    "TEORIAS Y METODOS PEDAGOGICOS GENERALES"=>"TEORIAS Y METODOS PEDAGOGICOS GENERALES"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "PSICOLOGIA"){
    echo $form->dropDownList($model,'discipline',array("ESTUDIO DE LA PERSONALIDAD","ESTUDIO PSICOLOGICO DE FENOMENOS SOCIALES",
   "EVALUACION Y MEDICION PSICOLOGICAS","ORIENTACION PSICOLOGICA",
   "OTRAS ESPECIALIDADES EN MATERIA DE PSICOLOGIA","PARAPSICOLOGIA",
   "PSICOFARMACOLOGIA","PSICOLOGIA PATOLOGICA","PSICOLOGIA DE LA EDUCACION",
   "PSICOLOGIA DEL NIÑO Y DEL ADOLESCENTE","PSICOLOGIA EXPERIMENTAL","PSICOLOGIA GENERAL",
   "PSICOLOGIA GERIATRICA","PSICOLOGIA SOCIAL","PSICOLOGIA DEL TRABAJO Y DEL PERSONAL"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "PROSPECTIVA"){
    echo $form->dropDownList($model,'discipline',array("ANALISIS DE RIESGOS"=>"ANALISIS DE RIESGOS",
    "ANALISIS DE TENDENCIAS"=>"ANALISIS DE TENDENCIAS",
    "CONSTRUCCION DE ESCENARIOS"=>"CONSTRUCCION DE ESCENARIOS",
    "DESARROLLO SUSTENTABLE"=>"DESARROLLO SUSTENTABLE",
    "DISEÑO DE PRIORIDADES A LARGO PLAZO"=>"DISEÑO DE PRIORIDADES A LARGO PLAZO",
    "ETICA DEL FUTURO"=>"ETICA DEL FUTURO",
    "FUTURO DE LOS CONOCIMIENTOS Y LAS NUEVAS TECNOLOGIAS"=>"FUTURO DE LOS CONOCIMIENTOS Y LAS NUEVAS TECNOLOGIAS",
    "NUEVAS FUERTES DE ENERGIA"=>"NUEVAS FUERTES DE ENERGIA",
    "NUEVOS SISTEMAS ORGANIZACIONALES"=>"NUEVOS SISTEMAS ORGANIZACIONALES",
    "PREVISION"=>"PREVISION",
    "OTRAS ESPECIALIDADES EN MATERIA PROSPECTIVA"=>"OTRAS ESPECIALIDADES EN MATERIA PROSPECTIVA",
    "PLANEACION Y DISEÑO DE ESTRATEGIAS"=>"PLANEACION Y DISEÑO DE ESTRATEGIAS",
    "TENDENCIAS DEMOGRAFICAS Y POBLACIONALES"=>"TENDENCIAS DEMOGRAFICAS Y POBLACIONALES",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "QUIMICA"){
    echo $form->dropDownList($model,'discipline',array("BIOQUIMICA"=>"BIOQUIMICA",
    "FARMACOBIOLOGIA"=>"FARMACOBIOLOGIA",
    "OTRAS ESPECIALIDADES EN MATERIA DE QUIMICA"=>"OTRAS ESPECIALIDADES EN MATERIA DE QUIMICA",
    "QUIMICA ANALITICA"=>"QUIMICA ANALITICA",
    "QUIMICA DE LAS MACROMOLECULAS"=>"QUIMICA DE LAS MACROMOLECULAS",
    "QUIMICA FISICA"=>"QUIMICA FISICA",
    "QUIMICA INORGANICA"=>"QUIMICA INORGANICA",
    "QUIMICA NUCLEAR"=>"QUIMICA NUCLEAR",
    "QUIMICA ORGANICA"=>"QUIMICA ORGANICA",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
     if($model->area == "SOCIOLOGIA"){
    echo $form->dropDownList($model,'discipline',array("CAMBIO Y DESARROLLO SOCIAL"=>"CAMBIO Y DESARROLLO SOCIAL",
    "COMUNICACION SOCIAL"=>"COMUNICACION SOCIAL",
    "CULTURA FÍSICA"=>"CULTURA FÍSICA",
    "HUMANIDADES"=>"HUMANIDADES",
    "GRUPOS SOCIALES"=>"GRUPOS SOCIALES",
    "PROBLEMAS INTERNACIONALES"=>"PROBLEMAS INTERNACIONALES",
    "PROBLEMAS SOCIALES"=>"PROBLEMAS SOCIALES",
    "ORGANIZACION SOCIAL ESTRUCTURA E INSTITUCIONES"=>"ORGANIZACION SOCIAL ESTRUCTURA E INSTITUCIONES",
    "OTRAS ESPECIALIDADES EN MATERIA DE SOCIOLOGIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE SOCIOLOGIA",
    "SOCIOLOGIA CULTURAL"=>"SOCIOLOGIA CULTURAL",
    "SOCIOLOGIA EXPERIMENTAL"=>"SOCIOLOGIA EXPERIMENTAL",
    "SOCIOLOGIA GENERAL"=>"SOCIOLOGIA GENERAL",
    "SOCIOLOGIA MATEMATICA Y ESTADISTICA"=>"SOCIOLOGIA MATEMATICA Y ESTADISTICA",
    "SOCIOLOGIA DE ACTIVIDADES PARTICULARES"=>"SOCIOLOGIA DE ACTIVIDADES PARTICULARES",
    "SOCIOLOGIA DE LA IMPLANTACION HUMANA"=>"SOCIOLOGIA DE LA IMPLANTACION HUMANA",),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    echo '</span>';
    echo $form->error($model,'discipline');
    echo '</div>';
  

    echo '<div class="row"id="comboSubdiscipline">';
    echo '<span class="plain-select">';
    // echo $form->dropDownList($model,'subdiscipline',array($model->subdiscipline => $model->subdiscipline),array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    if($model->discipline == "LOGICA DEDUCTIVA"){
    echo $form->dropDownList($model,'subdiscipline',array(
    "ALGEBRA DE BOOLE"=>"ALGEBRA DE BOOLE",
    "ANALOGIA"=>"ANALOGIA",
    "CALCULO DE PROPOSICIONES"=>"CALCULO DE PROPOSICIONES",
    "FUNCIONES RECURSIVAS"=>"FUNCIONES RECURSIVAS",
    "FUNDAMENTOS DE LAS MATEMATICAS"=>"FUNDAMENTOS DE LAS MATEMATICAS",
    "GENERALIZACION"=>"GENERALIZACION",
    "LENGUAJES FORMALIZADOS"=>"LENGUAJES FORMALIZADOS",
    "LOGICA FORMAL"=>"LOGICA FORMAL",
    "LOGICA MATEMATICA"=>"LOGICA MATEMATICA",
    "LOGICA MODAL"=>"LOGICA MODAL",
    "LOGICA SIMBOLICA"=>"LOGICA SIMBOLICA",
    "SISTEMAS FORMALES"=>"SISTEMAS FORMALES",
    "TEORIA DE DEMOSTRACIONES Y MATEMATICAS CONSTRUCTIVAS"=>"TEORIA DE DEMOSTRACIONES Y MATEMATICAS CONSTRUCTIVAS",
    "TEORIA DE LAS PRUEBAS"=>"TEORIA DE LAS PRUEBAS",
    "TEORIA DE LOS LENGUAJES FORMALES"=>"TEORIA DE LOS LENGUAJES FORMALES",
    "TEORIA DE LOS MODELOS"=>"TEORIA DE LOS MODELOS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "LOGICA INDUCTIVA"){
    echo $form->dropDownList($model,'subdiscipline',array("INDUCCION"=>"INDUCCION",
    "INTUICIONISMO"=>"INTUICIONISMO",
    "PROBABILIDAD"=>"PROBABILIDAD",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "METODOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("METODO CIENTIFICO"=>"METODO CIENTIFICO",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ALGEBRA"){
    echo $form->dropDownList($model,'subdiscipline',array("ALGEBRA DE LIE","ALGEBRA DIFERENCIAL"=>"ALGEBRA DE LIE","ALGEBRA DIFERENCIAL",
    "ALGEBRA HOMOLOGICA"=>"ALGEBRA HOMOLOGICA",
    "ALGEBRA LINEAL"=>"ALGEBRA LINEAL",
    "ALGEBRAS"=>"ALGEBRAS",
    "ALGEBRAS NO ASOCIATIVAS"=>"ALGEBRAS NO ASOCIATIVAS",
    "ANILLOS"=>"ANILLOS",
    "CAMPOS"=>"CAMPOS",
    "ESTRUCTURAS ALGEBRAICAS"=>"ESTRUCTURAS ALGEBRAICAS",
    "GENERALIDADES"=>"GENERALIDADES",
    "GEOMETRIA ALGEBRAICA"=>"GEOMETRIA ALGEBRAICA",
    "GRUPOS"=>"GRUPOS",
    "POLINOMIOS"=>"POLINOMIOS",
    "RETICULOS"=>"RETICULOS",
    "TEORIA AXIOMATICA DE CONJUNTOS"=>"TEORIA AXIOMATICA DE CONJUNTOS",
    "TEORIA DE LAS CATEGORIAS"=>"TEORIA DE LAS CATEGORIAS",
    "TEORIA DE LAS MATRICES"=>"TEORIA DE LAS MATRICES",
    "TEORIA DE LA REPRESENTACION"=>"TEORIA DE LA REPRESENTACION",
    "TEORIA K ALGEBRAICA"=>"TEORIA K ALGEBRAICA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
       if($model->discipline == "ANALISIS Y ANALISIS FUNCIONAL"){
    echo $form->dropDownList($model,'subdiscipline',array("ALGEBRA DE OPERADORES LOGICOS"=>"ALGEBRA DE OPERADORES LOGICOS",
    "ANALISIS ARMONICO"=>"ANALISIS ARMONICO",
    "ANALISIS COMBINATORIO"=>"ANALISIS COMBINATORIO",
    "ANALISIS DE FOURIER"=>"ANALISIS DE FOURIER",
    "ANALISIS GLOBAL"=>"ANALISIS GLOBAL",
    "AREA"=>"AREA",
    "CALCULO DE VARIACIONES"=>"CALCULO DE VARIACIONES",
    "CALCULO OPERACIONAL"=>"CALCULO OPERACIONAL",
    "CONVEXIDAD"=>"CONVEXIDAD",
    "DESIGUALDADES"=>"DESIGUALDADES",
    "ECUACIONES DIFERENCIALES ORDINARIAS"=>"ECUACIONES DIFERENCIALES ORDINARIAS",
    "ECUACIONES DIFERENCIALES PARCIALES"=>"ECUACIONES DIFERENCIALES PARCIALES",
    "ECUACIONES EN DIFERENCIAS FINITAS"=>"ECUACIONES EN DIFERENCIAS FINITAS",
    "ECUACIONES FUNCIONALES"=>"ECUACIONES FUNCIONALES",
    "ECUACIONES INTEGRALES"=>"ECUACIONES INTEGRALES",
    "ESPACIOS ANALITICOS"=>"ESPACIOS ANALITICOS",
    "ESPACIOS DE HILBERT"=>"ESPACIOS DE HILBERT",
    "ESPACIOS LINEALES TOPOLOGICOS"=>"ESPACIOS LINEALES TOPOLOGICOS",
    "ESPACIOS Y ALGEBRAS DE BANACH"=>"ESPACIOS Y ALGEBRAS DE BANACH",
    "MEDIDAS"=>"MEDIDAS",
    "INTEGRACION"=>"INTEGRACION",
    "FUNCIONES DE UNA VARIABLE COMPLEJA"=>"FUNCIONES DE UNA VARIABLE COMPLEJA",
    "FUNCIONES DE VARIABLES REALES"=>"FUNCIONES DE VARIABLES REALES",
    "FUNCIONES DE VARIAS VARIABLES COMPLEJAS"=>"FUNCIONES DE VARIAS VARIABLES COMPLEJAS",
    "FUNCIONES ESPECIALES"=>"FUNCIONES ESPECIALES",
    "FUNCIONES SUBARMONICAS"=>"FUNCIONES SUBARMONICAS",
    "SERIES"=>"SERIES",
    "SERIES E INTEGRALES TRIGONOMETRICAS"=>"SERIES E INTEGRALES TRIGONOMETRICAS",
    "SUMABILIDAD","TEORIA DE FUNCIONES GENERALIZADA"=>"SUMABILIDAD","TEORIA DE FUNCIONES GENERALIZADA",
    "TEORIA DE GRAFICAS","TEORIA DE LA APROXIMACION"=>"TEORIA DE GRAFICAS","TEORIA DE LA APROXIMACION",
    "TEORIA DEL POTENCIAL"=>"TEORIA DEL POTENCIAL",
    "TEORIA ERGODICA"=>"TEORIA ERGODICA",
    "TRANSFORMACIONES INTEGRALES"=>"TRANSFORMACIONES INTEGRALES",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
       if($model->discipline == "INFORMATICA MATEMATICA"){
    echo $form->dropDownList($model,'subdiscipline',array("BANCOS DE DATOS"=>"BANCOS DE DATOS",
    "CODIGOS Y SISTEMAS DE CODIFICACION"=>"CODIGOS Y SISTEMAS DE CODIFICACION",
    "COMPUTACION ANALOGICA"=>"COMPUTACION ANALOGICA",
    "COMPUTACION DIGITAL"=>"COMPUTACION DIGITAL",
    "COMPUTACION HIBRIDA"=>"COMPUTACION HIBRIDA",
    "CONTABILIDAD"=>"CONTABILIDAD",
    "CONTROL DE INVENTARIO"=>"CONTROL DE INVENTARIO",
    "DISEÑO CON AYUDA DE COMPUTADOR"=>"DISEÑO CON AYUDA DE COMPUTADOR",
    "DISEÑO DE SISTEMAS DE SENSORES"=>"DISEÑO DE SISTEMAS DE SENSORES",
    "DISEÑO Y COMPONENTES"=>"DISEÑO Y COMPONENTES",
    "ENSEÑANZA CON AYUDA DE COMPUTADOR"=>"ENSEÑANZA CON AYUDA DE COMPUTADOR",
    "HEURISTICA"=>"HEURISTICA",
    "LENGUAJES ALGORITMICOS"=>"LENGUAJES ALGORITMICOS",
    "LENGUAJES DE PROGRAMACION"=>"LENGUAJES DE PROGRAMACION",
    "MODELIZACION CAUSAL"=>"MODELIZACION CAUSAL",
    "INFORMATICA"=>"INFORMATICA",
    "INTELIGENCIA ARTIFICIAL"=>"INTELIGENCIA ARTIFICIAL",
    "SIMULACION"=>"SIMULACION",
    "SISTEMAS AUTOMATICOS DE CONTROL DE CALIDAD"=>"SISTEMAS AUTOMATICOS DE CONTROL DE CALIDAD",
    "SISTEMAS DE CONTROL AMBIENTAL"=>"SISTEMAS DE CONTROL AMBIENTAL",
    "SISTEMAS DE CONTROL MEDICO"=>"SISTEMAS DE CONTROL MEDICO",
    "SISTEMAS DE CONTROL DE PRODUCCION"=>"SISTEMAS DE CONTROL DE PRODUCCION",
    "SISTEMAS DE INFORMACION"=>"SISTEMAS DE INFORMACION",
    "SISTEMAS DE NAVEGACION DE TELEMETRIA Y ESPACIAL"=>"SISTEMAS DE NAVEGACION DE TELEMETRIA Y ESPACIAL",
    "SISTEMAS DE PRODUCCION AUTOMATICA"=>"SISTEMAS DE PRODUCCION AUTOMATICA",
    "SOPORTE LOGICO DE COMPUTADORES"=>"SOPORTE LOGICO DE COMPUTADORES",
    "TEORIA DE LA PROGRAMACION"=>"TEORIA DE LA PROGRAMACION",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "GEOMETRIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS TENSORIAL"=>"ANALISIS TENSORIAL",
    "DOMINIOS CONVEXOS"=>"DOMINIOS CONVEXOS",
    "ESTRUCTURAS DE ORDEN GEOMETRICO"=>"ESTRUCTURAS DE ORDEN GEOMETRICO",
    "FUNDAMENTOS"=>"FUNDAMENTOS",
    "GEOMETRIA AFIN"=>"GEOMETRIA AFIN",
    "GEOMETRIA COMPLEJA Y REAL"=>"GEOMETRIA COMPLEJA Y REAL",
    "GEOMETRIA DESCRIPTIVA Y ANALITICA"=>"GEOMETRIA DESCRIPTIVA Y ANALITICA",
    "GEOMETRIA DIFERENCIAL"=>"GEOMETRIA DIFERENCIAL",
    "GEOMETRIA DISCRETA"=>"GEOMETRIA DISCRETA",
    "GEOMETRIA EUCLIDIANA"=>"GEOMETRIA EUCLIDIANA",
    "GEOMETRIA PROYECTIVA"=>"GEOMETRIA PROYECTIVA",
    "GEOMETRIA TOPOLOGICA"=>"GEOMETRIA TOPOLOGICA",
    "GEOMETRIA RIEMANIANA"=>"GEOMETRIA RIEMANIANA",
    "GEOMETRIAS INFINITAS"=>"GEOMETRIAS INFINITAS",
    "GEOMETRIAS NO EUCLIDIANAS"=>"GEOMETRIAS NO EUCLIDIANAS",
    "PROBLEMAS DE EXTREMO"=>"PROBLEMAS DE EXTREMO",
    "TEORIA DE LA FUNCION GEOMETRICA"=>"TEORIA DE LA FUNCION GEOMETRICA",
    "TEORIA K"=>"TEORIA K",
    "VARIEDADES COMPLEJAS"=>"VARIEDADES COMPLEJAS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TEORIA DE LOS NUMEROS"){
    echo $form->dropDownList($model,'subdiscipline',array("GEOMETRIA DE LOS NUMEROS"=>"GEOMETRIA DE LOS NUMEROS",
    "PROBLEMAS DIOFANTINOS"=>"PROBLEMAS DIOFANTINOS",
    "SUCESIONES Y CONJUNTOS"=>"SUCESIONES Y CONJUNTOS",
    "TEORIA DE LOS NUMEROS ALGEBRAICOS"=>"TEORIA DE LOS NUMEROS ALGEBRAICOS",
    "TEORIA DE LOS NUMEROS ANALITICOS"=>"TEORIA DE LOS NUMEROS ANALITICOS",
    "TEORIA DE LOS NUMEROS ELEMENTALES"=>"TEORIA DE LOS NUMEROS ELEMENTALES",
    "TEORIA K"=>"TEORIA K",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ANALISIS NUMERICO"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS DE ERRORES"=>"ANALISIS DE ERRORES",
    "CONSTRUCCION DE ALGORITMOS"=>"CONSTRUCCION DE ALGORITMOS",
    "CUADRATURA"=>"CUADRATURA",
    "DIFERENCIACION NUMERICA"=>"DIFERENCIACION NUMERICA",
    "ECUACIONES DIFERENCIALES"=>"ECUACIONES DIFERENCIALES",
    "ECUACIONES DIFERENCIALES ORDINARIAS"=>"ECUACIONES DIFERENCIALES ORDINARIAS",
    "ECUACIONES DIFERENCIALES PARCIALES"=>"ECUACIONES DIFERENCIALES PARCIALES",
    "ECUACIONES FUNCIONALES"=>"ECUACIONES FUNCIONALES",
    "ECUACIONES INTEGRALES"=>"ECUACIONES INTEGRALES",
    "ECUACIONES INTEGRODIFERENCIALES"=>"ECUACIONES INTEGRODIFERENCIALES",
    "ECUACIONES LINEALES"=>"ECUACIONES LINEALES",
    "INTERPOLACION"=>"INTERPOLACION",
    "MATRICES"=>"MATRICES",
    "METODOS ITERATIVOS"=>"METODOS ITERATIVOS",
    "PROXIMACION Y AJUSTE DE CURVAS"=>"PROXIMACION Y AJUSTE DE CURVAS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "INVESTIGACION OPERATIVA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS MICROECONOMICO"=>"ANALISIS MICROECONOMICO",
    "CIBERNETICA"=>"CIBERNETICA",
    "COLAS"=>"COLAS",
    "DISTRIBUCION Y TRANSPORTE"=>"DISTRIBUCION Y TRANSPORTE",
    "FIABILIDAD DE LOS SISTEMAS"=>"FIABILIDAD DE LOS SISTEMAS",
    "FLUJO DE RED"=>"FLUJO DE RED",
    "FORMULACION DE SISTEMAS"=>"FORMULACION DE SISTEMAS",
    "INVENTARIO"=>"INVENTARIO",
    "MODELACION"=>"MODELACION",
    "ORDENAMIENTO"=>"ORDENAMIENTO",
    "OTROS"=>"OTROS",
    "PROGRAMACION DINAMICA"=>"PROGRAMACION DINAMICA",
    "PROGRAMACION ENTERA"=>"PROGRAMACION ENTERA",
    "PROGRAMACION LINEAL"=>"PROGRAMACION LINEAL",
    "PROGRAMACION NO LINEAL"=>"PROGRAMACION NO LINEAL",
    "SISTEMAS DE CONTROL"=>"SISTEMAS DE CONTROL",
    "TEORIA DE JUEGOS"=>"TEORIA DE JUEGOS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "CALCULO DE PROBABILIDADES"){
    echo $form->dropDownList($model,'subdiscipline',array("APLICACION DE LA PROBABILIDAD"=>"APLICACION DE LA PROBABILIDAD",
    "CONJUNTOS ALEATORIOS"=>"CONJUNTOS ALEATORIOS",
    "FUNDAMENTOS DE LA PROBABILIDAD"=>"FUNDAMENTOS DE LA PROBABILIDAD",
    "GEOMETRIA ESTOCASTICA"=>"GEOMETRIA ESTOCASTICA",
    "MATEMATICAS ACTUARIALES"=>"MATEMATICAS ACTUARIALES",
    "PROCESOS DE MARKOV"=>"PROCESOS DE MARKOV",
    "PLAUSIBILIDAD"=>"PLAUSIBILIDAD",
    "PROCESOS ESTOCASTICOS"=>"PROCESOS ESTOCASTICOS",
    "PROBABILIDADES SUBJETIVAS"=>"PROBABILIDADES SUBJETIVAS",
    "PROBABILIDAD GEOMETRICA"=>"PROBABILIDAD GEOMETRICA",
    "OTROS"=>"OTROS",
    "TEORIA ANALITICA DE LA PROBABILIDAD"=>"TEORIA ANALITICA DE LA PROBABILIDAD",
    "TEOREMAS LIMITE"=>"TEOREMAS LIMITE"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ESTADISTICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS DE DATOS"=>"ANALISIS DE DATOS",
    "ANALISIS MULTIVARIANTE"=>"ANALISIS MULTIVARIANTE",
    "COMPUTACION PARA LA ESTADISTICA"=>"COMPUTACION PARA LA ESTADISTICA",
    "DISEÑO Y ANALISIS DE EXPERIMENTOS"=>"DISEÑO Y ANALISIS DE EXPERIMENTOS",
    "ESTADISTICA ANALITICA"=>"ESTADISTICA ANALITICA",
    "FUNDAMENTOS DE INFERENCIA ESTADISTICA"=>"FUNDAMENTOS DE INFERENCIA ESTADISTICA",
    "METODOS NO PARAMETRICOS"=>"METODOS NO PARAMETRICOS",
    "OTROS"=>"OTROS",
    "PROCEDIMIENTOS DE DECISION Y TEORIA DE DECISION"=>"PROCEDIMIENTOS DE DECISION Y TEORIA DE DECISION",
    "TEORIA DE LA DISTRIBUCION Y LA PROBABILIDAD"=>"TEORIA DE LA DISTRIBUCION Y LA PROBABILIDAD",
    "TEORIA Y TECNICAS DE MUESTREO"=>"TEORIA Y TECNICAS DE MUESTREO",
    "TEORIA ESTOCASTICA Y ANALISIS DE SERIES TEMPORALES"=>"TEORIA ESTOCASTICA Y ANALISIS DE SERIES TEMPORALES",
    "TECNICAS DE ASOCIACION ESTADISTICA"=>"TECNICAS DE ASOCIACION ESTADISTICA",
    "TECNICAS DE INFERENCIA ESTADISTICA"=>"TECNICAS DE INFERENCIA ESTADISTICA",
    "TECNICAS DE PREDICCION ESTADISTICA"=>"TECNICAS DE PREDICCION ESTADISTICA",
    "SERIES TEMPORALES"=>"SERIES TEMPORALES"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TOPOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("COHOMOLOGIA"=>"COHOMOLOGIA",
    "ESPACIOS ABSTRACTOS"=>"ESPACIOS ABSTRACTOS",
    "DINAMICA TOPOLOGICA"=>"DINAMICA TOPOLOGICA",
    "GRUPOS DE TRANSFORMACION"=>"GRUPOS DE TRANSFORMACION",
    "GRUPOS DE LIE"=>"GRUPOS DE LIE",
    "GRUPOS TOPOLOGICOS"=>"GRUPOS TOPOLOGICOS",
    "HACES Y ESPACIOS DE FIBRAS"=>"HACES Y ESPACIOS DE FIBRAS",
    "HOMOLOGIA"=>"HOMOLOGIA",
    "HOMOTOPIA"=>"HOMOTOPIA",
    "INMERSION TOPOLOGICA"=>"INMERSION TOPOLOGICA",
    "OTROS"=>"OTROS",
    "TEORIA K TOPOLOGICA"=>"TEORIA K TOPOLOGICA",
    "TOPOLOGIA ALGEBRAICA"=>"TOPOLOGIA ALGEBRAICA",
    "TOPOLOGIA COMBINATORIA"=>"TOPOLOGIA COMBINATORIA",
    "TOPOLOGIA DE CONJUNTOS DE PUNTOS"=>"TOPOLOGIA DE CONJUNTOS DE PUNTOS",
    "TOPOLOGIA GENERAL"=>"TOPOLOGIA GENERAL",
    "TOPOLOGIA TRIDIMENSIONAL"=>"TOPOLOGIA TRIDIMENSIONAL",
    "VARIEDADES DIFERENCIALES"=>"VARIEDADES DIFERENCIALES",
    "VARIEDADES TOPOLOGICAS"=>"VARIEDADES TOPOLOGICAS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "INFORMATICA"){
    echo $form->dropDownList($model,'subdiscipline',array("DISEÑO Y COMPONENTES"=>"DISEÑO Y COMPONENTES",
    "GRAFICAS INFORMATICAS"=>"GRAFICAS INFORMATICAS",
    "ESTRUCTURA Y MANEJO DE DATOS"=>"ESTRUCTURA Y MANEJO DE DATOS",
    "INTELIGENCIA ARTIFICIAL"=>"INTELIGENCIA ARTIFICIAL",
    "LENGUAJES ALGORITMICOS"=>"LENGUAJES ALGORITMICOS",
    "LENGUAJES DE PROGRAMACION"=>"LENGUAJES DE PROGRAMACION",
    "LOGICA MATEMATICA Y LENGUAJES FORMALES"=>"LOGICA MATEMATICA Y LENGUAJES FORMALES",
    "MATEMATICAS DISCRETAS"=>"MATEMATICAS DISCRETAS",
    "MANIPULACION SIMBOLICA Y ALGEBRAICA"=>"MANIPULACION SIMBOLICA Y ALGEBRAICA",
    "OTROS"=>"OTROS",
    "SISTEMAS DE INFORMACION"=>"SISTEMAS DE INFORMACION",
    "PROCESAMIENTO DE TEXTOS Y DOCUMENTOS"=>"PROCESAMIENTO DE TEXTOS Y DOCUMENTOS",
    "PROGRAMAS MATEMATICOS"=>"PROGRAMAS MATEMATICOS",
    "SIMULACION Y MODELACION"=>"SIMULACION Y MODELACION",
    "TEORIA"=>"TEORIA",
    "TEORIA DE LA CODIFICACION Y DE LA INFORMACION"=>"TEORIA DE LA CODIFICACION Y DE LA INFORMACION",
    "TEORIA DE LA INFORMATICA"=>"TEORIA DE LA INFORMATICA",
    "TEORIA DE LA PROGRAMACION"=>"TEORIA DE LA PROGRAMACION"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "SISTEMAS"){
    echo $form->dropDownList($model,'subdiscipline',array("OTROS"=>"OTROS",
    "SISTEMAS ALGEBRAICOS TOPOLOGICOS Y DIFERENCIABLES"=>"SISTEMAS ALGEBRAICOS TOPOLOGICOS Y DIFERENCIABLES",
    "SISTEMAS DINAMICOS"=>"SISTEMAS DINAMICOS",
    "SISTEMAS HAMILTONIANOS"=>"SISTEMAS HAMILTONIANOS",
    "SISTEMAS LAGRANGIANOS"=>"SISTEMAS LAGRANGIANOS",
    "SISTEMAS ESTOCASTICOS Y CONTROL"=>"SISTEMAS ESTOCASTICOS Y CONTROL"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "COSMOLOGIA Y COSMOGONIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ESTRELLAS BINARIAS"=>"ESTRELLAS BINARIAS",
    "CONGLOMERADOS"=>"CONGLOMERADOS",
    "RAYOS COSMICOS"=>"RAYOS COSMICOS",
    "GALAXIAS"=>"GALAXIAS",
    "GRAVITACION"=>"GRAVITACION",
    "NEBULOSAS"=>"NEBULOSAS",
    "NOVAS"=>"NOVAS",
    "PULSARS"=>"PULSARS",
    "QUASARS"=>"QUASARS",
    "ESTRELLAS"=>"ESTRELLAS",
    "EVOLUCION ESTELAR Y DIAGRAMAS HR"=>"EVOLUCION ESTELAR Y DIAGRAMAS HR",
    "COMPOSICION ESTELAR"=>"COMPOSICION ESTELAR",
    "SUPER NOVAS"=>"SUPER NOVAS",
    "ESTRELLAS"=>"ESTRELLAS",
    "VARIABLES"=>"VARIABLES",
    "FUENTES DE RAYOS X"=>"FUENTES DE RAYOS X",
    "OTROS ESPECIFICAR"=>"OTROS ESPECIFICAR"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ESPACIOS Y MATERIA INTERPLANETARIOS"){
    echo $form->dropDownList($model,'subdiscipline',array("CAMPOS INTERPLANETARIOS"=>"CAMPOS INTERPLANETARIOS",
    "MATERIAS INTERPLANETARIAS"=>"MATERIAS INTERPLANETARIAS",
    "OTROS"=>"OTROS",
    "PARTICULAS INTERPLANETARIAS"=>"PARTICULAS INTERPLANETARIAS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ASTRONOMIA OPTICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ASTRONOMIA DE POSICION"=>"ASTRONOMIA DE POSICION",
    "TELESCOPIOS"=>"TELESCOPIOS",
    "ESPECTROSCOPIA"=>"ESPECTROSCOPIA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "PLANETOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("COMETAS"=>"COMETAS",
    "METEORITOS"=>"METEORITOS",
    "ATMOSFERAS PLANETARIAS"=>"ATMOSFERAS PLANETARIAS",
    "GEOLOGIA PLANETARIA"=>"GEOLOGIA PLANETARIA",
    "FISICA PLANETARIA"=>"FISICA PLANETARIA",
    "CAMPOS MAGNETICOS PLANETARIOS"=>"CAMPOS MAGNETICOS PLANETARIOS",
    "PLANETAS"=>"PLANETAS",
    "SATELITES"=>"SATELITES",
    "TECTITAS"=>"TECTITAS",
    "LA LUNA"=>"LA LUNA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "RADIOASTRONOMIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANTENAS"=>"ANTENAS",
    "RADIOTELESCOPIOS"=>"RADIOTELESCOPIOS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "SISTEMA SOLAR"){
    echo $form->dropDownList($model,'subdiscipline',array("ENERGIA SOLAR"=>"ENERGIA SOLAR",
    "FISICA SOLAR"=>"FISICA SOLAR",
    "RADIACION SOLAR"=>"RADIACION SOLAR",
    "EL SOL"=>"EL SOL",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "ACUSTICA"){
    echo $form->dropDownList($model,'subdiscipline',array("PROPIEDADES ACUSTICAS DE LOS SOLIDOS"=>"PROPIEDADES ACUSTICAS DE LOS SOLIDOS",
    "ACUSTICA ARQUITECTONICA"=>"ACUSTICA ARQUITECTONICA",
    "FISICA DE LA AUDICION"=>"FISICA DE LA AUDICION",
    "FISICA DE LA MUSICA"=>"FISICA DE LA MUSICA",
    "RUIDO"=>"RUIDO",
    "ONDAS DE CHOQUE"=>"ONDAS DE CHOQUE",
    "SONAR"=>"SONAR",
    "FISICA DEL HABLA"=>"FISICA DEL HABLA",
    "ULTRASONIDOS"=>"ULTRASONIDOS",
    "SONIDOS SUBMARINOS"=>"SONIDOS SUBMARINOS",
    "VIBRACIONES"=>"VIBRACIONES",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ELECTROMAGNETISMO"){
    echo $form->dropDownList($model,'subdiscipline',array("CONDUCTIVIDAD"=>"CONDUCTIVIDAD",
    "CANTIDADES ELECTRICAS Y SU MEDICION"=>"CANTIDADES ELECTRICAS Y SU MEDICION",
    "ELECTRICIDAD"=>"ELECTRICIDAD",
    "RADIACION ELECTROMAGNETICA"=>"RADIACION ELECTROMAGNETICA",
    "RAYOS GAMMA"=>"RAYOS GAMMA",
    "RADIACION INFRARROJA"=>"RADIACION INFRARROJA",
    "VISIBLE Y ULTRAVIOLETA"=>"VISIBLE Y ULTRAVIOLETA",
    "INTERACCION DE LAS ONDAS ELECTROMAGNETICAS CON LA MATERIA"=>"INTERACCION DE LAS ONDAS ELECTROMAGNETICAS CON LA MATERIA",
    "MAGNETISMO"=>"MAGNETISMO",
    "PROPAGACION DE LAS ONDAS ELECTROMAGNETICAS"=>"PROPAGACION DE LAS ONDAS ELECTROMAGNETICAS",
    "ONDAS DE RADIO Y MICROONDAS"=>"ONDAS DE RADIO Y MICROONDAS",
    "SUPERCONDUCTIVIDAD"=>"SUPERCONDUCTIVIDAD",
    "RAYOS X"=>"RAYOS X",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ELECTRONICA"){
    echo $form->dropDownList($model,'subdiscipline',array("CIRCUITOS"=>"CIRCUITOS",
    "ELEMENTOS DE CIRCUITO"=>"ELEMENTOS DE CIRCUITO",
    "TUBOS ELECTRONICOS"=>"TUBOS ELECTRONICOS",
    "MICROSCOPIA ELECTRONICA"=>"MICROSCOPIA ELECTRONICA",
    "ESTADOS ELECTRONICOS"=>"ESTADOS ELECTRONICOS",
    "TRANSPORTE DE ELECTRONES"=>"TRANSPORTE DE ELECTRONES",
    "CIRCUITOS INTEGRADOS"=>"CIRCUITOS INTEGRADOS",
    "FOTOELECTRICIDAD"=>"FOTOELECTRICIDAD",
    "PIEZOELECTRICIDAD"=>"PIEZOELECTRICIDAD",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "FISICA DE LOS FLUIDOS"){
    echo $form->dropDownList($model,'subdiscipline',array("COLOIDES"=>"COLOIDES",
    "DISPERSIONES"=>"DISPERSIONES",
    "CORRIENTE DE FLUIDOS"=>"CORRIENTE DE FLUIDOS",
    "MECANICA DE FLUIDOS"=>"MECANICA DE FLUIDOS",
    "GASES"=>"GASES",
    "FENOMENOS DE ALTA PRESION"=>"FENOMENOS DE ALTA PRESION",
    "IONIZACION"=>"IONIZACION",
    "LIQUIDOS"=>"LIQUIDOS",
    "MAGNETO-DINAMICA DE LOS FLUIDOS"=>"MAGNETO-DINAMICA DE LOS FLUIDOS",
    "FISICA DEL PLASMA"=>"FISICA DEL PLASMA",
    "FLUIDOS CUANTICOS"=>"FLUIDOS CUANTICOS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "MECANICA"){
    echo $form->dropDownList($model,'subdiscipline',array("MECANICA ESTADISTICA" =>"MECANICA ESTADISTICA" ,
    "TEORIA DE N CUERPOS" =>"TEORIA DE N CUERPOS" ,
    "ELASTICIDAD" =>"ELASTICIDAD" ,
    "FRICCION" =>"FRICCION" ,
    "MECANICA CONTINUA" =>"MECANICA CONTINUA" ,
    "MECANICA DE FLUIDOS" =>"MECANICA DE FLUIDOS" ,
    "MECANICA DE SOLIDOS" =>"MECANICA DE SOLIDOS" ,
    "MEDIDA DE LAS PROPIEDADES MECANICAS" =>"MEDIDA DE LAS PROPIEDADES MECANICAS" ,
    "OTROS" =>"OTROS" ,
    "PLASTICIDAD" =>"PLASTICIDAD" ,
    "MECANICA ANALITICA" =>"MECANICA ANALITICA"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "FISICA MOLECULAR"){
    echo $form->dropDownList($model,'subdiscipline',array("RADICALES LIBRES" =>"RADICALES LIBRES" ,
    "FISICA DE LAS MOLECULAS INORGANICAS" =>"FISICA DE LAS MOLECULAS INORGANICAS" ,
    "FISICA DE LAS MACROMOLECULAS" =>"FISICA DE LAS MACROMOLECULAS" ,
    "MOLECULAS MESIONICAS Y MUONICAS" =>"MOLECULAS MESIONICAS Y MUONICAS" ,
    "HACES MOLECULARES" =>"HACES MOLECULARES" ,
    "IONES MOLECULARES" =>"IONES MOLECULARES" ,
    "ESPECTROSCOPIA MOLECULAR" =>"ESPECTROSCOPIA MOLECULAR" ,
    "ESTRUCTURA MOLECULAR" =>"ESTRUCTURA MOLECULAR" ,
    "FISICA DE LAS MOLECULAS ORGANICAS" =>"FISICA DE LAS MOLECULAS ORGANICAS" ,
    "FISICA DE POLIMEROS" =>"FISICA DE POLIMEROS" ,
    "OTROS" =>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "FISICA NUCLEAR"){
    echo $form->dropDownList($model,'subdiscipline',array("ATOMO DE HELIO"=>"ATOMO DE HELIO",
    "ATOMO DE HIDROGENO"=>"ATOMO DE HIDROGENO",
    "ATOMOS CON Z>2"=>"ATOMOS CON Z>2",
    "CONVERSION DE LA ENERGIA"=>"CONVERSION DE LA ENERGIA",
    "DESINTEGRACION NUCLEAR"=>"DESINTEGRACION NUCLEAR",
    "ENERGIA NUCLEAR"=>"ENERGIA NUCLEAR",
    "ESTRUCTURA DEL NUCLEO"=>"ESTRUCTURA DEL NUCLEO",
    "FISICA ATOMICA"=>"FISICA ATOMICA",
    "FISION NUCLEAR"=>"FISION NUCLEAR",
    "FUSION TERMONUCLEAR"=>"FUSION TERMONUCLEAR",
    "HACES ELECTRONICOS"=>"HACES ELECTRONICOS",
    "IONES ATOMICOS"=>"IONES ATOMICOS",
    "ISOTOPOS"=>"ISOTOPOS",
    "OTROS"=>"OTROS",
    "PROCESOS DE COLISION"=>"PROCESOS DE COLISION",
    "RADIOISOTOPOS"=>"RADIOISOTOPOS",
    "REACTORES NUCLEARES"=>"REACTORES NUCLEARES",
    "RESONANCIA DE ROTACION DEL ELECTRON"=>"RESONANCIA DE ROTACION DEL ELECTRON",
    "RESONANCIA MAGNETICA NUCLEAR"=>"RESONANCIA MAGNETICA NUCLEAR",
    "RESONANCIA PARAMAGNETICA ELECTRONICA"=>"RESONANCIA PARAMAGNETICA ELECTRONICA",
    "REACCIONES Y DISPERSION NUCLEARES"=>"REACCIONES Y DISPERSION NUCLEARES",
    "HACES ATOMICOS"=>"HACES ATOMICOS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "FISICA DE LAS PARTICULAS NUCLEARES"){
    echo $form->dropDownList($model,'subdiscipline',array("ACELERADORES DE PARTICULAS"=>"ACELERADORES DE PARTICULAS",
    "DETECTORES DE RADIACION"=>"DETECTORES DE RADIACION",
    "FISICA DE PARTICULAS"=>"FISICA DE PARTICULAS",
    "FUENTES DE HACES"=>"FUENTES DE HACES",
    "FUENTES DE PARTICULAS"=>"FUENTES DE PARTICULAS",
    "OTROS"=>"OTROS",
    "CONFINAMIENTO DEL PLASMA"=>"CONFINAMIENTO DEL PLASMA",
    "NUCLEOS"=>"NUCLEOS",
    "REACTORES DE FUSION"=>"REACTORES DE FUSION",
    "MANEJO DE HACES"=>"MANEJO DE HACES"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OPTICA"){
    echo $form->dropDownList($model,'subdiscipline',array("CINEMATOGRAFIA"=>"CINEMATOGRAFIA",
    "COLORIMETRIA"=>"COLORIMETRIA",
    "ESPECTROSCOPIA DE EMISION"=>"ESPECTROSCOPIA DE EMISION",
    "ESPECTROSCOPIA"=>"ESPECTROSCOPIA",
    "FISICA DE LA VISION"=>"FISICA DE LA VISION",
    "FOTOGRAFIA"=>"FOTOGRAFIA",
    "HOLOGRAFIA"=>"HOLOGRAFIA",
    "ILUMINACION"=>"ILUMINACION",
    "INSTRUMENTACION FOTOGRAFICA"=>"INSTRUMENTACION FOTOGRAFICA",
    "LASER"=>"LASER",
    "LUZ"=>"LUZ",
    "MICROSCOPIOS"=>"MICROSCOPIOS",
    "OPTICA FISICA"=>"OPTICA FISICA",
    "OPTICA GEOMETRICA"=>"OPTICA GEOMETRICA",
    "OPTICA NO LINEAL"=>"OPTICA NO LINEAL",
    "OPTOMETRIA"=>"OPTOMETRIA",
    "OTROS"=>"OTROS",
    "OPTICA DE FIBRAS FOTOCONDUCTORAS"=>"OPTICA DE FIBRAS FOTOCONDUCTORAS",
    "PROPIEDADES OPTICAS DE LOS SOLIDOS"=>"PROPIEDADES OPTICAS DE LOS SOLIDOS",
    "RADIACION VISIBLE"=>"RADIACION VISIBLE",
    "RADIACION INFRARROJA"=>"RADIACION INFRARROJA",
    "RADIACION ULTRAVIOLETA"=>"RADIACION ULTRAVIOLETA",
    "RADIOMETRIA"=>"RADIOMETRIA",
    "ESPECTROSCOPIA DE ABSORCION"=>"ESPECTROSCOPIA DE ABSORCION",
    "FOTOMETRIA"=>"FOTOMETRIA"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "FISICOQUIMICA"){
    echo $form->dropDownList($model,'subdiscipline',array("CATALISIS"=>"CATALISIS",
    "CINETOQUIMICA"=>"CINETOQUIMICA",
    "ESPECTROSCOPIA ELECTRONICA"=>"ESPECTROSCOPIA ELECTRONICA",
    "ESTADOS DE LA MATERIA"=>"ESTADOS DE LA MATERIA",
    "EXPLOSIVOS"=>"EXPLOSIVOS",
    "FENOMENOS DE MEMBRANA"=>"FENOMENOS DE MEMBRANA",
    "ELECTROLITOS"=>"ELECTROLITOS",
    "ELECTROQUIMICA"=>"ELECTROQUIMICA",
    "EMULSIONES"=>"EMULSIONES",
    "EQUILIBRIOS DE FASE"=>"EQUILIBRIOS DE FASE",
    "EQUILIBRIOS QUIMICOS"=>"EQUILIBRIOS QUIMICOS",
    "ESPECTROSCOPIA MOLECULAR"=>"ESPECTROSCOPIA MOLECULAR",
    "FENOMENOS DE DISPERSION"=>"FENOMENOS DE DISPERSION",
    "FENOMENOS DE TRANSPORTE"=>"FENOMENOS DE TRANSPORTE",
    "FISICA DE ESTADO LIQUIDO"=>"FISICA DE ESTADO LIQUIDO",
    "FISICA DE LA FASE GASEOSA"=>"FISICA DE LA FASE GASEOSA",
    "FISICA DEL ESTADO SOLIDO"=>"FISICA DEL ESTADO SOLIDO",
    "FOTOQUIMICA"=>"FOTOQUIMICA",
    "INTERCAMBIO IONICO"=>"INTERCAMBIO IONICO",
    "LLAMAS"=>"LLAMAS",
    "OTROS"=>"OTROS",
    "PROCESOS DE RELACION"=>"PROCESOS DE RELACION",
    "QUIMICA COLOIDAL"=>"QUIMICA COLOIDAL",
    "QUIMICA DE ALTA TEMPERATURA"=>"QUIMICA DE ALTA TEMPERATURA",
    "QUIMICA DEL ESTADO SOLIDO"=>"QUIMICA DEL ESTADO SOLIDO",
    "QUIMICA INTERFACIAL"=>"QUIMICA INTERFACIAL",
    "RADIOQUIMICA"=>"RADIOQUIMICA",
    "REACCIONES RAPIDAS"=>"REACCIONES RAPIDAS",
    "SALES FUNDIDAS"=>"SALES FUNDIDAS",
    "SOLUCIONES"=>"SOLUCIONES",
    "TEORIA CUANTICA"=>"TEORIA CUANTICA",
    "TEORIA DE LA VALENCIA"=>"TEORIA DE LA VALENCIA",
    "TEORIA DE PILAS DE COMBUSTIBLE"=>"TEORIA DE PILAS DE COMBUSTIBLE",
    "TERMODINAMICA"=>"TERMODINAMICA",
    "TERMOQUIMICA"=>"TERMOQUIMICA",
    "TRANSFERENCIA DE ENERGIA"=>"TRANSFERENCIA DE ENERGIA"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "FISICA DEL ESTADO SOLIDO"){
    echo $form->dropDownList($model,'subdiscipline',array("ALEACIONES"=>"ALEACIONES",
    "COMPUESTOS"=>"COMPUESTOS",
    "CONDUCTORES METALICOS"=>"CONDUCTORES METALICOS",
    "CRECIMIENTO CRISTALINO"=>"CRECIMIENTO CRISTALINO",
    "CRISTALOGRAFIA"=>"CRISTALOGRAFIA",
    "DENDRITAS"=>"DENDRITAS",
    "DIELECTRICIDAD"=>"DIELECTRICIDAD",
    "DIFUSION EN LOS SOLIDOS"=>"DIFUSION EN LOS SOLIDOS",
    "DISPOSITIVOS DE ESTADO SOLIDO"=>"DISPOSITIVOS DE ESTADO SOLIDO",
    "ESTADOS ELECTRONICOS"=>"ESTADOS ELECTRONICOS",
    "ESTADOS NO CRISTALINOS"=>"ESTADOS NO CRISTALINOS",
    "ESTRUCTURA CRISTALINA"=>"ESTRUCTURA CRISTALINA",
    "IMPERFECCIONES"=>"IMPERFECCIONES",
    "INTERACCION DE LA RADIACION CON LOS SOLIDOS"=>"INTERACCION DE LA RADIACION CON LOS SOLIDOS",
    "INTERFACES"=>"INTERFACES",
    "LUMINOSIDAD"=>"LUMINOSIDAD",
    "MECANICA DE RETICULOS"=>"MECANICA DE RETICULOS",
    "MECANOGRAFIA"=>"MECANOGRAFIA",
    "NANOCIENCIAS Y NANOTECNOLOGIA"=>"NANOCIENCIAS Y NANOTECNOLOGIA",
    "OTROS"=>"OTROS",
    "PROPIEDADES DE PORTADORES DE LOS ELECTRONES"=>"PROPIEDADES DE PORTADORES DE LOS ELECTRONES",
    "PROPIEDADES DE TRANSPORTE ELECTRONICO"=>"PROPIEDADES DE TRANSPORTE ELECTRONICO",
    "PROPIEDADES MAGNETICAS"=>"PROPIEDADES MAGNETICAS",
    "PROPIEDADES MECANICAS"=>"PROPIEDADES MECANICAS",
    "PROPIEDADES OPTICAS"=>"PROPIEDADES OPTICAS",
    "PROPIEDADES TERMODINAMICAS DE LOS SOLIDOS"=>"PROPIEDADES TERMODINAMICAS DE LOS SOLIDOS",
    "RESONANCIA MAGNETICA"=>"RESONANCIA MAGNETICA",
    "SEMICONDUCTORES"=>"SEMICONDUCTORES",
    "SUPERCONDUCTORES"=>"SUPERCONDUCTORES",
    "SUPERFICIES"=>"SUPERFICIES",
    "TECNOLOGIA METALURGICA"=>"TECNOLOGIA METALURGICA",
    "TRIBOLOGIA"=>"TRIBOLOGIA"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "FISICA TEORICA"){
    echo $form->dropDownList($model,'subdiscipline',array("CAMPOS GRAVITATORIOS"=>"CAMPOS GRAVITATORIOS",
    "CAMPOS ELECTROMAGNETICOS"=>"CAMPOS ELECTROMAGNETICOS",
    "CAMPOS"=>"CAMPOS",
    "FISICA DE LA ENERGIA"=>"FISICA DE LA ENERGIA",
    "FOTONES"=>"FOTONES",
    "GRAVITACION"=>"GRAVITACION",
    "GRAVITONES"=>"GRAVITONES",
    "HADRONES"=>"HADRONES",
    "LEPTONES"=>"LEPTONES",
    "MASA"=>"MASA",
    "OTROS"=>"OTROS",
    "PARTICULAS ELEMENTALES"=>"PARTICULAS ELEMENTALES",
    "RADIACION ELECTROMAGNETICA"=>"RADIACION ELECTROMAGNETICA",
    "TEORIA DE LA RELATIVIDAD"=>"TEORIA DE LA RELATIVIDAD",
    "TEORIA DE LOS CAMPOS CUANTICOS"=>"TEORIA DE LOS CAMPOS CUANTICOS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TERMODINAMICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ALTA PRESION"=>"ALTA PRESION",
    "ALTA TEMPERATURA"=>"ALTA TEMPERATURA",
    "BAJAS TEMPERATURAS"=>"BAJAS TEMPERATURAS",
    "CAMBIOS DE ESTADO"=>"CAMBIOS DE ESTADO",
    "EQUILIBRIOS TERMODINAMICOS"=>"EQUILIBRIOS TERMODINAMICOS",
    "FENOMENOS DE TRANSPORTE"=>"FENOMENOS DE TRANSPORTE",
    "FISICA DE LA TRANSMISION DE CALOR"=>"FISICA DE LA TRANSMISION DE CALOR",
    "OTROS"=>"OTROS",
    "RELACIONES TERMODINAMICAS"=>"RELACIONES TERMODINAMICAS",
    "TECNICAS DE MEDIDAS TERMICAS"=>"TECNICAS DE MEDIDAS TERMICAS",
    "TEORIA CINETICA"=>"TEORIA CINETICA",
    "TRANSICION DE FASE"=>"TRANSICION DE FASE"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "UNIDADES Y CONSTANTES FISICAS"){
    echo $form->dropDownList($model,'subdiscipline',array("CONSTANTES (FISICAS)"=>"CONSTANTES (FISICAS)",
    "CONVERSION DE UNIDADES"=>"CONVERSION DE UNIDADES",
    "CALIBRACION DE UNIDADES"=>"CALIBRACION DE UNIDADES",
    "METROLOGIA"=>"METROLOGIA",
    "OTROS"=>"OTROS",
    "UNIDADES ESTANDAR"=>"UNIDADES ESTANDAR"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "QUIMICA ANALITICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS ELECTROQUIMICO"=>"ANALISIS ELECTROQUIMICO",
    "ANALISIS BIOQUIMICO"=>"ANALISIS BIOQUIMICO",
    "ANALISIS CROMATOGRAFICO"=>"ANALISIS CROMATOGRAFICO",
    "ANALISIS DE LOS POLIMEROS"=>"ANALISIS DE LOS POLIMEROS",
    "ANALISIS MICROQUIMICO"=>"ANALISIS MICROQUIMICO",
    "ANALISIS RADIOQUIMICO"=>"ANALISIS RADIOQUIMICO",
    "ESPECTROSCOPIA DE MASAS"=>"ESPECTROSCOPIA DE MASAS",
    "ESPECTROSCOPIA DE RAMAN"=>"ESPECTROSCOPIA DE RAMAN",
    "ESPECTROSCOPIA INFRARROJA"=>"ESPECTROSCOPIA INFRARROJA",
    "ESPECTROSCOPIA POR MICROONDAS"=>"ESPECTROSCOPIA POR MICROONDAS",
    "ESPECTROSCOPIA DE EMISION"=>"ESPECTROSCOPIA DE EMISION",
    "ESPECTROSCOPIA POR RAYOS X"=>"ESPECTROSCOPIA POR RAYOS X",
    "ESPECTROSCOPIA POR RESONANCIA MAGNETICA"=>"ESPECTROSCOPIA POR RESONANCIA MAGNETICA",
    "FLUORIMETRIA"=>"FLUORIMETRIA",
    "FOSFORIMETRIA"=>"FOSFORIMETRIA",
    "GRAVIMETRIA"=>"GRAVIMETRIA",
    "METODOS DE ANALISIS TERMICO"=>"METODOS DE ANALISIS TERMICO",
    "MICROSCOPIA"=>"MICROSCOPIA",
    "OTROS"=>"OTROS",
    "VOLUMETRIA"=>"VOLUMETRIA",
    "ESPECTROSCOPIA DE ABSORCION"=>"ESPECTROSCOPIA DE ABSORCION"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
       if($model->discipline == "BIOQUIMICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ACEITES ESENCIALES"=>"ACEITES ESENCIALES",
    "ACIDOS GRASOS"=>"ACIDOS GRASOS",
    "ACIDOS NUCLEICOS"=>"ACIDOS NUCLEICOS",
    "ALMIDON"=>"ALMIDON",
    "AMINOACIDOS"=>"AMINOACIDOS",
    "ANTIMETABOLITOS"=>"ANTIMETABOLITOS",
    "BIOLOGIA MOLECULAR"=>"BIOLOGIA MOLECULAR",
    "BIOQUIMICA FISICA"=>"BIOQUIMICA FISICA",
    "BIOSINTESIS"=>"BIOSINTESIS",
    "CERAS"=>"CERAS",
    "COENZIMAS"=>"COENZIMAS",
    "ELEMENTOS TRAZA"=>"ELEMENTOS TRAZA",
    "ENZIMOLOGIA"=>"ENZIMOLOGIA",
    "ESTEROIDES"=>"ESTEROIDES",
    "FARMACOLOGIA MOLECULAR"=>"FARMACOLOGIA MOLECULAR",
    "FERMENTACION"=>"FERMENTACION",
    "FOTOSINTESIS"=>"FOTOSINTESIS",
    "GENETICA BIOQUIMICA"=>"GENETICA BIOQUIMICA",
    "GLUCIDOS"=>"GLUCIDOS",
    "HIDROCARBUROS TERPENICOS"=>"HIDROCARBUROS TERPENICOS",
    "HORMONAS"=>"HORMONAS",
    "INMUNOQUIMICA"=>"INMUNOQUIMICA",
    "METABOLISMO INTERMEDIO"=>"METABOLISMO INTERMEDIO",
    "QUIMICA CLINICA"=>"QUIMICA CLINICA",
    "REGULACION DE LA REALIMENTACION"=>"REGULACION DE LA REALIMENTACION",
    "LIPIDOS"=>"LIPIDOS",
    "OTROS"=>"OTROS",
    "PEPTIDOS"=>"PEPTIDOS",
    "PROCESOS METABOLICOS"=>"PROCESOS METABOLICOS",
    "PROTEINAS"=>"PROTEINAS",
    "QUIMICA MICROBIOLOGICA"=>"QUIMICA MICROBIOLOGICA",
    "QUIMIOTERAPIA"=>"QUIMIOTERAPIA",
    "ALCALOIDES"=>"ALCALOIDES",
    "VITAMINAS"=>"VITAMINAS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "QUIMICA INORGANICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ALQUILOS METALICOS"=>"ALQUILOS METALICOS",
    "CARBONO"=>"CARBONO",
    "COMPUESTOS DEFICIENTES EN ELECTRONES"=>"COMPUESTOS DEFICIENTES EN ELECTRONES",
    "COMPUESTOS DE AZUFRE"=>"COMPUESTOS DE AZUFRE",
    "COMPUESTOS DE BORO"=>"COMPUESTOS DE BORO",
    "COMPUESTOS DE CLORO"=>"COMPUESTOS DE CLORO",
    "COMPUESTOS DE COORDINACION"=>"COMPUESTOS DE COORDINACION",
    "COMPUESTOS DE FLUOR"=>"COMPUESTOS DE FLUOR",
    "COMPUESTOS DE FOSFORO"=>"COMPUESTOS DE FOSFORO",
    "COMPUESTOS DE NITROGENO"=>"COMPUESTOS DE NITROGENO",
    "COMPUESTOS DE SODIO"=>"COMPUESTOS DE SODIO",
    "COMPUESTOS ORGANOMETALICOS"=>"COMPUESTOS ORGANOMETALICOS",
    "ELEMENTOS ALCALINOS"=>"ELEMENTOS ALCALINOS",
    "ELEMENTOS DE TRANSICION"=>"ELEMENTOS DE TRANSICION",
    "ELEMENTOS ELECTROPOSITIVOS"=>"ELEMENTOS ELECTROPOSITIVOS",
    "ELEMENTOS TRANSURANICOS"=>"ELEMENTOS TRANSURANICOS",
    "ELEMENTOS SINTETICOS"=>"ELEMENTOS SINTETICOS",
    "ESTRUCTURA DE LOS COMPUESTOS INORGANICOS"=>"ESTRUCTURA DE LOS COMPUESTOS INORGANICOS",
    "GERMANIO"=>"GERMANIO",
    "GRAFITO"=>"GRAFITO",
    "HALOGENOS"=>"HALOGENOS",
    "HIDROGENO"=>"HIDROGENO",
    "HIDRUROS"=>"HIDRUROS",
    "MECANISMOS DE REACCIONES INORGANICAS"=>"MECANISMOS DE REACCIONES INORGANICAS",
    "METALES"=>"METALES",
    "OTROS"=>"OTROS",
    "QUIMICA DE LOS PIGMENTOS"=>"QUIMICA DE LOS PIGMENTOS",
    "QUIMICA DEL AGUA"=>"QUIMICA DEL AGUA",
    "TIERRAS ALCALINAS"=>"TIERRAS ALCALINAS",
    "TIERRAS RARAS"=>"TIERRAS RARAS",
    "COMPUESTOS DE PLOMO"=>"COMPUESTOS DE PLOMO",
    "QUIMICA DE LOS ACTINIDOS"=>"QUIMICA DE LOS ACTINIDOS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "QUIMICA DE LAS MACROMOLECULAS"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS DE LOS POLIMEROS"=>"ANALISIS DE LOS POLIMEROS",
    "FIBRAS SINTETICAS"=>"FIBRAS SINTETICAS",
    "POLIESTIRENOS"=>"POLIESTIRENOS",
    "POLIETILENO"=>"POLIETILENO",
    "POLIMEROS INORGANICOS"=>"POLIMEROS INORGANICOS",
    "QUIMICA DE LOS MONOMEROS"=>"QUIMICA DE LOS MONOMEROS",
    "CELULOSA"=>"CELULOSA",
    "ELASTOMEROS"=>"ELASTOMEROS",
    "ESTABILIDAD DE LAS MACROMOLECULAS"=>"ESTABILIDAD DE LAS MACROMOLECULAS",
    "FIBRAS NATURALES"=>"FIBRAS NATURALES",
    "GOMAS"=>"GOMAS",
    "MACROMOLECULAS"=>"MACROMOLECULAS",
    "MODIFICACION DE LAS MACROMOLECULAS"=>"MODIFICACION DE LAS MACROMOLECULAS",
    "OTROS"=>"OTROS",
    "POLIELECTROLITOS"=>"POLIELECTROLITOS",
    "POLIESTERES"=>"POLIESTERES",
    "POLIMEROS COMPUESTOS"=>"POLIMEROS COMPUESTOS",
    "POLIMEROS DISPERSOS"=>"POLIMEROS DISPERSOS",
    "POLIMEROS ELEVADOS"=>"POLIMEROS ELEVADOS",
    "POLIMEROS RETICULADOS"=>"POLIMEROS RETICULADOS",
    "POLIPEPTIDOS Y PROTEINAS"=>"POLIPEPTIDOS Y PROTEINAS",
    "POLISACARIDOS"=>"POLISACARIDOS",
    "POLIURETANOS"=>"POLIURETANOS",
    "PLASTICOS CELULARES"=>"PLASTICOS CELULARES",
    "SINTESIS DE LAS MACROMOLECULAS"=>"SINTESIS DE LAS MACROMOLECULAS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "QUIMICA NUCLEAR"){
    echo $form->dropDownList($model,'subdiscipline',array("MOLECULAS MARCADAS"=>"MOLECULAS MARCADAS",
    "OTROS"=>"OTROS",
    "RADIOISOTOPOS"=>"RADIOISOTOPOS",
    "RADIOQUIMICA"=>"RADIOQUIMICA",
    "SEPARACION DE ISOTOPOS"=>"SEPARACION DE ISOTOPOS",
    "TRAZADORES DE ISOTOPOS"=>"TRAZADORES DE ISOTOPOS",
    "QUIMICA DE LOS ATOMOS RADIACTIVOS"=>"QUIMICA DE LOS ATOMOS RADIACTIVOS",
    "QUIMICA DE LAS RADIACIONES"=>"QUIMICA DE LAS RADIACIONES"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "QUIMICA ORGANICA"){
    echo $form->dropDownList($model,'subdiscipline',array("PRODUCTOS ORGANOMETALICOS"=>"PRODUCTOS ORGANOMETALICOS",
    "QUIMICA DE LAS MATERIAS TINTOREAS"=>"QUIMICA DE LAS MATERIAS TINTOREAS",
    "QUIMICA DE LOS ESTEROIDES"=>"QUIMICA DE LOS ESTEROIDES",
    "QUIMICA DEL CARBANION"=>"QUIMICA DEL CARBANION",
    "QUIMICA DEL ORGANOAZUFRE"=>"QUIMICA DEL ORGANOAZUFRE",
    "COMPUESTOS HETEROCICLICOS"=>"COMPUESTOS HETEROCICLICOS",
    "DERIVADOS DEL BENCENO"=>"DERIVADOS DEL BENCENO",
    "ESTEROQUIMICA Y ANALISIS DE CONFIGURACION"=>"ESTEROQUIMICA Y ANALISIS DE CONFIGURACION",
    "ESTRUCTURA DE LAS MOLECULAS ORGANICAS"=>"ESTRUCTURA DE LAS MOLECULAS ORGANICAS",
    "HIDROCARBUROS AROMATICOS"=>"HIDROCARBUROS AROMATICOS",
    "HIDROCARBUROS ALIFATICOS"=>"HIDROCARBUROS ALIFATICOS",
    "MECANICA DE LAS REACCIONES"=>"MECANICA DE LAS REACCIONES",
    "OTROS"=>"OTROS",
    "QUIMICA BICICLICA"=>"QUIMICA BICICLICA",
    "QUIMICA DE LOS HIDRATOS DE CARBONO"=>"QUIMICA DE LOS HIDRATOS DE CARBONO",
    "QUIMICA DE LOS ORGANOFOSFOROS"=>"QUIMICA DE LOS ORGANOFOSFOROS",
    "QUIMICA DE LOS ORGANOSILICONES"=>"QUIMICA DE LOS ORGANOSILICONES",
    "QUIMICA DEL CARBONIO"=>"QUIMICA DEL CARBONIO",
    "RADICALES LIBRES"=>"RADICALES LIBRES"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "FARMACOBIOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("QUIMICA BIOMOLECURAR"=>"QUIMICA BIOMOLECURAR",
    "QUIMICA MEDICINAL"=>"QUIMICA MEDICINAL"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "BIOLOGIA ANIMAL Y ZOOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANATOMIA ANIMAL"=>"ANATOMIA ANIMAL",
    "CRECIMIENTO DE LOS ANIMALES"=>"CRECIMIENTO DE LOS ANIMALES",
    "FISIOLOGIA ANIMAL"=>"FISIOLOGIA ANIMAL",
    "CITOLOGIA ANIMAL"=>"CITOLOGIA ANIMAL",
    "COMPORTAMIENTO ANIMAL"=>"COMPORTAMIENTO ANIMAL",
    "COMUNICACION ANIMAL"=>"COMUNICACION ANIMAL",
    "DESARROLLO ANIMAL"=>"DESARROLLO ANIMAL",
    "ECOLOGIA ANIMAL"=>"ECOLOGIA ANIMAL",
    "EMBRIOLOGIA ANIMAL"=>"EMBRIOLOGIA ANIMAL",
    "GENETICA ANIMAL"=>"GENETICA ANIMAL",
    "HERPETOLOGIA"=>"HERPETOLOGIA",
    "HISTOLOGIA ANIMAL"=>"HISTOLOGIA ANIMAL",
    "INVERTEBRADOS"=>"INVERTEBRADOS",
    "MAMIFEROS"=>"MAMIFEROS",
    "ORNITOLOGIA"=>"ORNITOLOGIA",
    "OTROS"=>"OTROS",
    "PARASITOLOGIA ANIMAL"=>"PARASITOLOGIA ANIMAL",
    "PATOLOGIA ANIMAL"=>"PATOLOGIA ANIMAL",
    "PRIMATOLOGIA"=>"PRIMATOLOGIA",
    "PROTOZOOLOGIA"=>"PROTOZOOLOGIA",
    "TAXONOMIA ANIMAL"=>"TAXONOMIA ANIMAL",
    "VERTEBRADOS"=>"VERTEBRADOS",
    "ZOOLOGIA GENERAL"=>"ZOOLOGIA GENERAL",
    "ZOOLOGIA MARINA"=>"ZOOLOGIA MARINA"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ANTROPOLOGIA FISICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANTROPOLOGIA MEDICA"=>"ANTROPOLOGIA MEDICA",
    "ANTROPOMETRIA Y ANTROPOLOGIA FORENSE"=>"ANTROPOMETRIA Y ANTROPOLOGIA FORENSE",
    "ARCHIVOS ANTROPOLOGICOS"=>"ARCHIVOS ANTROPOLOGICOS",
    "BIOLOGIA DE LA POBLACION"=>"BIOLOGIA DE LA POBLACION",
    "BIOLOGIA RACIAL"=>"BIOLOGIA RACIAL",
    "COMPORTAMIENTO DE LOS PRIMATES"=>"COMPORTAMIENTO DE LOS PRIMATES",
    "CONSTITUCION CORPORAL"=>"CONSTITUCION CORPORAL",
    "CRECIMIENTO SOMATICO"=>"CRECIMIENTO SOMATICO",
    "COMPOSICION CORPORAL"=>"COMPOSICION CORPORAL",
    "HABITOS DE NUTRICION"=>"HABITOS DE NUTRICION",
    "SOMATOLOGIA DE LOS PRIMATES"=>"SOMATOLOGIA DE LOS PRIMATES",
    "ENVEJECIMIENTO SOMATICO"=>"ENVEJECIMIENTO SOMATICO",
    "ETNOLOGIA"=>"ETNOLOGIA",
    "GENETICA ANTROPOLOGICA"=>"GENETICA ANTROPOLOGICA",
    "OSTEOLOGIA"=>"OSTEOLOGIA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "BIOMATEMATICA"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOESTADISTICA"=>"BIOESTADISTICA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "BIOMETRIA"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOACUSTICA"=>"BIOACUSTICA",
    "BIOELECTRICIDAD"=>"BIOELECTRICIDAD",
    "BIOENERGETICA"=>"BIOENERGETICA",
    "BIOMECANICA"=>"BIOMECANICA",
    "BIOOPTICA"=>"BIOOPTICA",
    "FISICA MEDICA"=>"FISICA MEDICA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "BIOLOGIA CELULAR"){
    echo $form->dropDownList($model,'subdiscipline',array("CULTIVO CELULAR"=>"CULTIVO CELULAR",
    "GENETICA CELULAR"=>"GENETICA CELULAR",
    "MORFOLOGIA CELULAR"=>"MORFOLOGIA CELULAR",
    "CITOLOGIA"=>"CITOLOGIA",
    "CULTIVO DE TEJIDOS"=>"CULTIVO DE TEJIDOS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ETOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANIMAL"=>"ANIMAL",
    "DE LOS INSECTOS"=>"DE LOS INSECTOS",
    "HUMANA"=>"HUMANA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "GENETICA"){
    echo $form->dropDownList($model,'subdiscipline',array("EMBRIOLOGIA"=>"EMBRIOLOGIA",
    "GENETICA DE POBLACIONES"=>"GENETICA DE POBLACIONES",
    "INGENIERIA GENETICA"=>"INGENIERIA GENETICA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "BIOLOGIA HUMANA"){
    echo $form->dropDownList($model,'subdiscipline',array("EMBRIOLOGIA HUMANA"=>"EMBRIOLOGIA HUMANA",
    "FISIOLOGIA HUMANA"=>"FISIOLOGIA HUMANA",
    "ANATOMIA HUMANA"=>"ANATOMIA HUMANA",
    "ANATOMIA SISTEMATICA"=>"ANATOMIA SISTEMATICA",
    "ANATOMIA TOPOGRAFICA"=>"ANATOMIA TOPOGRAFICA",
    "CITOLOGIA HUMANA"=>"CITOLOGIA HUMANA",
    "DESARROLLO HUMANO"=>"DESARROLLO HUMANO",
    "ECOLOGIA HUMANA"=>"ECOLOGIA HUMANA",
    "GENETICA HUMANA"=>"GENETICA HUMANA",
    "GRUPOS SANGUINEOS"=>"GRUPOS SANGUINEOS",
    "HISTOLOGIA HUMANA"=>"HISTOLOGIA HUMANA",
    "NEUROANATOMIA HUMANA,"=>"NEUROANATOMIA HUMANA,",
    "ORGANOS SENSORIALES"=>"ORGANOS SENSORIALES",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "FISIOLOGIA HUMANA"){
    echo $form->dropDownList($model,'subdiscipline',array("FISIOLOGIA DE LAS ACTITUDES"=>"FISIOLOGIA DE LAS ACTITUDES",
    "ANESTESIOLOGIA"=>"ANESTESIOLOGIA",
    "FISIOLOGIA CARDIOVASCULAR"=>"FISIOLOGIA CARDIOVASCULAR",
    "FISIOLOGIA DEL SISTEMA ENDOCRINO"=>"FISIOLOGIA DEL SISTEMA ENDOCRINO",
    "FISIOLOGIA DEL EJERCICIO"=>"FISIOLOGIA DEL EJERCICIO",
    "FISIOLOGIA GASTROINTESTINAL,"=>"FISIOLOGIA GASTROINTESTINAL,",
    "METABOLISMOS HUMANOS"=>"METABOLISMOS HUMANOS",
    "REGULACION DE LA TEMPERATURA HUMANA"=>"REGULACION DE LA TEMPERATURA HUMANA",
    "FISIOLOGIA MUSCULAR"=>"FISIOLOGIA MUSCULAR",
    "NEUROFISIOLOGIA"=>"NEUROFISIOLOGIA",
    "FISIOLOGIA DEL SISTEMA NERVIOSO CENTRAL"=>"FISIOLOGIA DEL SISTEMA NERVIOSO CENTRAL",
    "FISIOLOGIA DE LA AUDICION"=>"FISIOLOGIA DE LA AUDICION",
    "FISIOLOGIA DEL HABLA"=>"FISIOLOGIA DEL HABLA",
    "FISIOLOGIA DE LA VISION"=>"FISIOLOGIA DE LA VISION",
    "FISIOLOGIA DE LA REPRODUCCION"=>"FISIOLOGIA DE LA REPRODUCCION",
    "FISIOLOGIA DE LA RESPIRACION"=>"FISIOLOGIA DE LA RESPIRACION",
    "FISIOLOGIA DE LA LOCOMOCION"=>"FISIOLOGIA DE LA LOCOMOCION",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ENTOMOLOGIA GENERAL"){
    echo $form->dropDownList($model,'subdiscipline',array("ENTOMOLOGIA GENERAL"=>"ENTOMOLOGIA GENERAL",
    "DESARROLLO DE LOS INSECTOS"=>"DESARROLLO DE LOS INSECTOS",
    "ECOLOGIA DE LOS INSECTOS"=>"ECOLOGIA DE LOS INSECTOS",
    "MORFOLOGIA DE LOS INSECTOS"=>"MORFOLOGIA DE LOS INSECTOS",
    "FISIOLOGIA DE LOS INSECTOS"=>"FISIOLOGIA DE LOS INSECTOS",
    "TAXONOMIA DE LOS INSECTOS"=>"TAXONOMIA DE LOS INSECTOS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "MICROBIOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANTIBIOTICOS"=>"ANTIBIOTICOS",
    "FISIOLOGIA BACTERIANA"=>"FISIOLOGIA BACTERIANA",
    "METABOLISMO BACTERIANO"=>"METABOLISMO BACTERIANO",
    "BACTERIOLOGIA"=>"BACTERIOLOGIA",
    "BACTERIOFAGOS"=>"BACTERIOFAGOS",
    "HONGOS"=>"HONGOS",
    "METABOLISMO MICROBIANO"=>"METABOLISMO MICROBIANO",
    "PROCESOS MIROCROBIANOS"=>"PROCESOS MIROCROBIANOS",
    "MOHOS"=>"MOHOS",
    "MICOLOGIA (LEVADURAS)"=>"MICOLOGIA (LEVADURAS)",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "PALEONTOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("PALEONTOLOGIA ANIMAL"=>"PALEONTOLOGIA ANIMAL",
    "PALEONTOLOGIA DE LOS INVERTEBRADOS"=>"PALEONTOLOGIA DE LOS INVERTEBRADOS",
    "PALINOLOGIA"=>"PALINOLOGIA",
    "PALEONTOLOGIA VEGETAL"=>"PALEONTOLOGIA VEGETAL",
    "PALEONTOLOGIA DE LOS VERTEBRADOS"=>"PALEONTOLOGIA DE LOS VERTEBRADOS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "BOTANICA"){
    echo $form->dropDownList($model,'subdiscipline',array("BRIOLOGIA"=>"BRIOLOGIA",
    "DENDROLOGIA"=>"DENDROLOGIA",
    "BOTANICA GENERAL"=>"BOTANICA GENERAL",
    "LIMNOLOGIA"=>"LIMNOLOGIA",
    "BIOLOGIA MARINA"=>"BIOLOGIA MARINA",
    "MICOLOGIA (HONGOS)"=>"MICOLOGIA (HONGOS)",
    "FICOLOGIA"=>"FICOLOGIA",
    "FOTOBIOLOGIA"=>"FOTOBIOLOGIA",
    "FITOPATOLOGIA"=>"FITOPATOLOGIA",
    "PALEOBOTANICA"=>"PALEOBOTANICA",
    "ANATOMIA VEGETAL"=>"ANATOMIA VEGETAL",
    "CITOLOGIA VEGETAL"=>"CITOLOGIA VEGETAL",
    "ECOLOGIA VEGETAL"=>"ECOLOGIA VEGETAL",
    "GENETICA VEGETAL"=>"GENETICA VEGETAL",
    "CRECIMIENTO DE LAS PLANTAS"=>"CRECIMIENTO DE LAS PLANTAS",
    "HISTOLOGIA VEGETAL"=>"HISTOLOGIA VEGETAL",
    "NUTRICION DE LAS PLANTAS"=>"NUTRICION DE LAS PLANTAS",
    "PARASITOLOGIA VEGETAL"=>"PARASITOLOGIA VEGETAL",
    "FISIOLOGIA VEGETAL"=>"FISIOLOGIA VEGETAL",
    "TAXONOMIA VEGETAL"=>"TAXONOMIA VEGETAL",
    "TERIDOLOGIA"=>"TERIDOLOGIA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "VIROLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ARBOVIRUS"=>"ARBOVIRUS",
    "BACTERIOFAGOS"=>"BACTERIOFAGOS",
    "VIRUS DERMATROPICOS"=>"VIRUS DERMATROPICOS",
    "VIRUS ENTERICOS"=>"VIRUS ENTERICOS",
    "VIRUS NEUROTROPICOS"=>"VIRUS NEUROTROPICOS",
    "VIRUS PANTROPICOS"=>"VIRUS PANTROPICOS",
    "POXVIRUS"=>"POXVIRUS",
    "VIRUS DEL SISTEMA RESPIRATORIO"=>"VIRUS DEL SISTEMA RESPIRATORIO",
    "VIRUS VISCEROTROPICOS"=>"VIRUS VISCEROTROPICOS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "MEDIO AMBIENTE"){
    echo $form->dropDownList($model,'subdiscipline',array("GESTIÓN AMBIENTAL"=>"GESTIÓN AMBIENTAL"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "CIENCIAS ATMOSFERICAS"){
    echo $form->dropDownList($model,'subdiscipline',array("AERONOMIA"=>"AERONOMIA",
    "RESPLANDOR CELESTE"=>"RESPLANDOR CELESTE",
    "INTERACCION AIRE-MAR"=>"INTERACCION AIRE-MAR",
    "ACUSTICA DE LA ATMOSFERA"=>"ACUSTICA DE LA ATMOSFERA",
    "QUIMICA DE LA ATMOSFERA"=>"QUIMICA DE LA ATMOSFERA",
    "DINAMICA DE LA ATMOSFERA"=>"DINAMICA DE LA ATMOSFERA",
    "ELECTRICIDAD ATMOSFERICA"=>"ELECTRICIDAD ATMOSFERICA",
    "OPTICA DE LA ATMOSFERA"=>"OPTICA DE LA ATMOSFERA",
    "RADIACTIVIDAD ATMOSFERICA"=>"RADIACTIVIDAD ATMOSFERICA",
    "ESTRUCTURA DE LA ATMOSFERA"=>"ESTRUCTURA DE LA ATMOSFERA",
    "TERMODINAMICA DE LA ATMOSFERA"=>"TERMODINAMICA DE LA ATMOSFERA",
    "TURBULENCIA ATMOSFERICA"=>"TURBULENCIA ATMOSFERICA",
    "AURORA"=>"AURORA",
    "FISICA DE LAS NUBES"=>"FISICA DE LAS NUBES",
    "RAYOS COSMICOS"=>"RAYOS COSMICOS",
    "DIFUSION ATMOSFERICA"=>"DIFUSION ATMOSFERICA",
    "PULSACIONES GEOMAGNETICAS"=>"PULSACIONES GEOMAGNETICAS",
    "IONOSFERA"=>"IONOSFERA",
    "PARTICULAS MAGNETOSFERICAS"=>"PARTICULAS MAGNETOSFERICAS",
    "ONDAS MAGNETOSFERICAS"=>"ONDAS MAGNETOSFERICAS",
    "MODELIZACION NUMERICA"=>"MODELIZACION NUMERICA",
    "FISICA DE LAS PRECIPITACIONES"=>"FISICA DE LAS PRECIPITACIONES",
    "TRANSFERENCIA RADIACTIVA"=>"TRANSFERENCIA RADIACTIVA",
    "RADIACION SOLAR"=>"RADIACION SOLAR",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "CLIMATOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOCLIMATOLOGIA"=>"BIOCLIMATOLOGIA",
    "CLIMATOLOGIA ANALITICA"=>"CLIMATOLOGIA ANALITICA",
    "CLIMATOLOGIA APLICADA"=>"CLIMATOLOGIA APLICADA",
    "CLIMATOLOGIA FISICA"=>"CLIMATOLOGIA FISICA",
    "CLIMATOLOGIA REGIONAL"=>"CLIMATOLOGIA REGIONAL",
    "MICROCLIMATOLOGIA"=>"MICROCLIMATOLOGIA",
    "OTROS"=>"OTROS",
    "PALEOCLIMATOLOGIA"=>"PALEOCLIMATOLOGIA"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "GEOQUIMICA"){
    echo $form->dropDownList($model,'subdiscipline',array("PETROLOGIA EXPERIMENTAL"=>"PETROLOGIA EXPERIMENTAL",
    "GEOQUIMICA DE EXPLORACION"=>"GEOQUIMICA DE EXPLORACION",
    "GEOCRONOLOGIA Y RADIOISOTOPOS"=>"GEOCRONOLOGIA Y RADIOISOTOPOS",
    "GEOQUIMICA DE ALTA TEMPERATURA"=>"GEOQUIMICA DE ALTA TEMPERATURA",
    "EOQUIMICA DE BAJA TEMPERATURA"=>"EOQUIMICA DE BAJA TEMPERATURA",
    "GEOQUIMICA ORGANICA"=>"GEOQUIMICA ORGANICA",
    "ISOTOPOS ESTABLES"=>"ISOTOPOS ESTABLES",
    "DISTRIBUCION DE ELEMENTOS TRAZA"=>"DISTRIBUCION DE ELEMENTOS TRAZA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "GEODESIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ASTRONOMIA GEODESICA"=>"ASTRONOMIA GEODESICA",
    "CARTOGRAFIA GEODESICA"=>"CARTOGRAFIA GEODESICA",
    "NAVEGACION GEODESICA"=>"NAVEGACION GEODESICA",
    "FOTOGRAMETRIA GEODESICA"=>"FOTOGRAMETRIA GEODESICA",
    "EXPLORACION"=>"EXPLORACION"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "GEOGRAFIA"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOGEOGRAFIA"=>"BIOGEOGRAFIA",
    "CARTOGRAFIA GEOGRAFICA"=>"CARTOGRAFIA GEOGRAFICA",
    "GEOGRAFIA DE LOS RECURSOS NATURALES"=>"GEOGRAFIA DE LOS RECURSOS NATURALES",
    "GEOGRAFIA FISICA"=>"GEOGRAFIA FISICA",
    "GEOGRAFIA MEDICA"=>"GEOGRAFIA MEDICA",
    "GEOGRAFIA TOPOGRAFICA"=>"GEOGRAFIA TOPOGRAFICA",
    "TEORIA DE LA SITUACION"=>"TEORIA DE LA SITUACION",
    "USO DE LAS TIERRAS"=>"USO DE LAS TIERRAS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "GEOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS DE DIAGRAMAS DE POZO"=>"ANALISIS DE DIAGRAMAS DE POZO",
    "ECONOMIA DE LOS HIDROCARBUROS"=>"ECONOMIA DE LOS HIDROCARBUROS",
    "ESTRATIGRAFIA"=>"ESTRATIGRAFIA",
    "EXPLORACION GEOLOGICA"=>"EXPLORACION GEOLOGICA",
    "FOTOGEOLOGIA"=>"FOTOGEOLOGIA",
    "GEOHIDROLOGIA"=>"GEOHIDROLOGIA",
    "GEOLOGIA DE LAS DIVERSAS AREAS DE LA SUPERFICIE TERRESTRE"=>"GEOLOGIA DE LAS DIVERSAS AREAS DE LA SUPERFICIE TERRESTRE",
    "GEOLOGIA DEL CARBON"=>"GEOLOGIA DEL CARBON",
    "GEOLOGIA DEL MEDIO AMBIENTE"=>"GEOLOGIA DEL MEDIO AMBIENTE",
    "GEOLOGIA DEL PETROLEO"=>"GEOLOGIA DEL PETROLEO",
    "GEOLOGIA ESTRUCTURAL"=>"GEOLOGIA ESTRUCTURAL",
    "GEOLOGIA GLACIAL"=>"GEOLOGIA GLACIAL",
    "GEOMORFOLOGIA"=>"GEOMORFOLOGIA",
    "INGENIERIA GEOLOGICA"=>"INGENIERIA GEOLOGICA",
    "MECANICA DE LAS ROCAS"=>"MECANICA DE LAS ROCAS",
    "MINERALOGIA"=>"MINERALOGIA",
    "PETROLOGIA IGNEA Y METAMORFICA"=>"PETROLOGIA IGNEA Y METAMORFICA",
    "PETROLOGIA SEDIMENTARIA"=>"PETROLOGIA SEDIMENTARIA",
    "PROCESOS Y ENERGIA GEOTERMICOS"=>"PROCESOS Y ENERGIA GEOTERMICOS",
    "SEDIMENTOLOGIA"=>"SEDIMENTOLOGIA",
    "TELEDETECCION (GEOLOGIA)"=>"TELEDETECCION (GEOLOGIA)",
    "VULCANOLOGIA"=>"VULCANOLOGIA",
    "YACIMIENTOS MINERALES"=>"YACIMIENTOS MINERALES",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "GEOFISICA"){
    echo $form->dropDownList($model,'subdiscipline',array("EXPLORACION GEOFISICA"=>"EXPLORACION GEOFISICA",
    "FLUJO DE CALOR (TERRESTRE)"=>"FLUJO DE CALOR (TERRESTRE)",
    "GEOFISICA DE LA TIERRA SOLIDA"=>"GEOFISICA DE LA TIERRA SOLIDA",
    "GEOMAGNETISMO Y EXPLORACION MAGNETICA"=>"GEOMAGNETISMO Y EXPLORACION MAGNETICA",
    "GRAVEDAD TERRESTRE Y EXPLORACION DE LA GRAVEDAD"=>"GRAVEDAD TERRESTRE Y EXPLORACION DE LA GRAVEDAD",
    "PALEOMAGNETISMO"=>"PALEOMAGNETISMO",
    "SISMOLOGIA Y EXPLORACION SISMICA"=>"SISMOLOGIA Y EXPLORACION SISMICA",
    "TECTONICA"=>"TECTONICA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "HIDROLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("AGUAS SUBTERRANEAS"=>"AGUAS SUBTERRANEAS",
    "AGUAS SUPERFICIALES"=>"AGUAS SUPERFICIALES",
    "CALIDAD DEL AGUA"=>"CALIDAD DEL AGUA",
    "EROSION DEL AGUA"=>"EROSION DEL AGUA",
    "EVAPORACION"=>"EVAPORACION",
    "GLACIOLOGIA"=>"GLACIOLOGIA",
    "HIDROBIOLOGIA"=>"HIDROBIOLOGIA",
    "HIDROGRAFIA"=>"HIDROGRAFIA",
    "HIELO"=>"HIELO",
    "HUMEDAD DEL SUELO"=>"HUMEDAD DEL SUELO",
    "LIMNOLOGIA"=>"LIMNOLOGIA",
    "NIEVE"=>"NIEVE",
    "PRECIPITACIONES"=>"PRECIPITACIONES",
    "SUELOS HELADOS"=>"SUELOS HELADOS",
    "TRANSPIRACION"=>"TRANSPIRACION",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "METEOROLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS METEOROLOGICO"=>"ANALISIS METEOROLOGICO",
    "CONTAMINACION DEL AIRE"=>"CONTAMINACION DEL AIRE",
    "CONTROL DEL TIEMPO (METEOROLOGIA)"=>"CONTROL DEL TIEMPO (METEOROLOGIA)",
    "HIDROMETEOROLOGIA"=>"HIDROMETEOROLOGIA",
    "INSTRUCCIONES DE OBSERVACION (METEOROLOGIA)"=>"INSTRUCCIONES DE OBSERVACION (METEOROLOGIA)",
    "MESOMETEOROLOGIA"=>"MESOMETEOROLOGIA",
    "METEOROLOGIA AGRICOLA"=>"METEOROLOGIA AGRICOLA",
    "METEOROLOGIA INDUSTRIAL"=>"METEOROLOGIA INDUSTRIAL",
    "METEOROLOGIA MARINA"=>"METEOROLOGIA MARINA",
    "METEOROLOGIA MEDIANTE COHETES"=>"METEOROLOGIA MEDIANTE COHETES",
    "METEOROLOGIA MEDIANTE SATELITES"=>"METEOROLOGIA MEDIANTE SATELITES",
    "METEOROLOGIA POLAR"=>"METEOROLOGIA POLAR",
    "METEOROLOGIA POR RADAR"=>"METEOROLOGIA POR RADAR",
    "METEOROLOGIA SINOPTICA"=>"METEOROLOGIA SINOPTICA",
    "METEOROLOGIA TROPICAL"=>"METEOROLOGIA TROPICAL",
    "MICROMETEOROLOGIA"=>"MICROMETEOROLOGIA",
    "PREDICCION METEOROLOGICA NUMERICA"=>"PREDICCION METEOROLOGICA NUMERICA",
    "PREVISION METEOROLOGICA OPERACIONAL"=>"PREVISION METEOROLOGICA OPERACIONAL",
    "PREVISION METEOROLOGICA PROLONGADA"=>"PREVISION METEOROLOGICA PROLONGADA",
    "RADIOMETEOROLOGIA"=>"RADIOMETEOROLOGIA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "OCEANOGRAFIA"){
    echo $form->dropDownList($model,'subdiscipline',array("BOTANICA MARINA"=>"BOTANICA MARINA",
    "HIELO MARINO"=>"HIELO MARINO",
    "INTERACCIONES MAR-AIRE"=>"INTERACCIONES MAR-AIRE",
    "OCEANOGRAFIA BIOLOGICA"=>"OCEANOGRAFIA BIOLOGICA",
    "OCEANOGRAFIA DESCRIPTIVA"=>"OCEANOGRAFIA DESCRIPTIVA",
    "OCEANOGRAFIA FISICA"=>"OCEANOGRAFIA FISICA",
    "OCEANOGRAFIA QUIMICA"=>"OCEANOGRAFIA QUIMICA",
    "PROCESOS DE LAS COSTAS Y DE LAS AREAS PROXIMAS A LAS COSTAS"=>"PROCESOS DE LAS COSTAS Y DE LAS AREAS PROXIMAS A LAS COSTAS",
    "PROCESOS DEL FONDO DEL MAR"=>"PROCESOS DEL FONDO DEL MAR",
    "SONIDOS SUBMARINOS"=>"SONIDOS SUBMARINOS",
    "ZOOLOGIA MARINA"=>"ZOOLOGIA MARINA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "CIENCIAS DEL SUELO"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOLOGICA DE SUELOS"=>"BIOLOGICA DE SUELOS",
    "BIOQUIMICA DEL SUELO"=>"BIOQUIMICA DEL SUELO",
    "CARTOGRAFIA DE SUELOS"=>"CARTOGRAFIA DE SUELOS",
    "CLASIFICACION DE SUELOS"=>"CLASIFICACION DE SUELOS",
    "CONSERVACION DEL SUELO"=>"CONSERVACION DEL SUELO",
    "FISICA DEL SUELO"=>"FISICA DEL SUELO",
    "INGENIERIA EDAFOLOGICA"=>"INGENIERIA EDAFOLOGICA",
    "MECANICA DEL SUELO (AGRICULTURA)"=>"MECANICA DEL SUELO (AGRICULTURA)",
    "MICROBIOLOGIA DE LOS SUELOS"=>"MICROBIOLOGIA DE LOS SUELOS",
    "MINERALOGIA DE LOS SUELOS"=>"MINERALOGIA DE LOS SUELOS",
    "MORFOLOGIA Y GENESIS DE LOS SUELOS"=>"MORFOLOGIA Y GENESIS DE LOS SUELOS",
    "QUIMICA DEL SUELO"=>"QUIMICA DEL SUELO",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "CIENCIAS DEL COSMOS"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOLOGIA ESPACIAL"=>"BIOLOGIA ESPACIAL",
    "FISIOLOGIA ESPACIAL"=>"FISIOLOGIA ESPACIAL",
    "MEDICINA AEROSPACIAL"=>"MEDICINA AEROSPACIAL",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "SALUD PÚBLICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ADMINISTRACIÓN DE LOS SERVICIOS DE SALUD"=>"ADMINISTRACIÓN DE LOS SERVICIOS DE SALUD",
    "ANTROPOLOGÍA MÉDICA"=>"ANTROPOLOGÍA MÉDICA",
    "EPIDEMIOLOGÍA"=>"EPIDEMIOLOGÍA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->subdiscipline == "INVESTIGACIÓN EN SALUD"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOMEDICINA"=>"BIOMEDICINA",
    "INVESTIGACION CLÍNICA"=>"INVESTIGACION CLÍNICA",
    "INVESTIGACIÓN EN ADICCIONES"=>"INVESTIGACIÓN EN ADICCIONES",
    "SISTEMAS DE SALUD"=>"SISTEMAS DE SALUD",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ENFERMERÍA"){
    echo $form->dropDownList($model,'subdiscipline',array("SALUD MATERNA"=>"SALUD MATERNA"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "QUIMICA AGRONOMICA"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOQUIMICA AGRONOMICA"=>"BIOQUIMICA AGRONOMICA",
    "FUNGICIDAS"=>"FUNGICIDAS",
    "HERBICIDAS"=>"HERBICIDAS",
    "INSECTICIDAS"=>"INSECTICIDAS",
    "PLAGUICIDAS"=>"PLAGUICIDAS",
    "PRODUCTOS DE CULTIVOS NO COMESTIBLES"=>"PRODUCTOS DE CULTIVOS NO COMESTIBLES",
    "PRODUCTOS DE PESCADO"=>"PRODUCTOS DE PESCADO",
    "PRODUCTOS LACTEOS"=>"PRODUCTOS LACTEOS",
    "REGULADORES DEL CRECIMIENTO DE LAS PLANTAS"=>"REGULADORES DEL CRECIMIENTO DE LAS PLANTAS",
    "TECNICAS DE PRODUCCION DE FERTILIZANTES"=>"TECNICAS DE PRODUCCION DE FERTILIZANTES",
    "USO DE FERTILIZANTES"=>"USO DE FERTILIZANTES",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "INGENIERIA RURAL"){
    echo $form->dropDownList($model,'subdiscipline',array("CONSTRUCCION RURAL"=>"CONSTRUCCION RURAL",
    "DRENAJE"=>"DRENAJE",
    "EQUIPO DE GRANJA"=>"EQUIPO DE GRANJA",
    "MECANICA AGRICOLA"=>"MECANICA AGRICOLA",
    "RIEGO"=>"RIEGO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "AGRONOMIA"){
    echo $form->dropDownList($model,'subdiscipline',array("AGRICULTURA EN ZONAS ARIDAS"=>"AGRICULTURA EN ZONAS ARIDAS",
    "AGRICULTURA EN ZONAS TEMPLADAS"=>"AGRICULTURA EN ZONAS TEMPLADAS",
    "AGRICULTURA EN ZONAS TROPICALES"=>"AGRICULTURA EN ZONAS TROPICALES",
    "CESPED"=>"CESPED",
    "COMPORTAMIENTO DEL SUELO CON UTILIZACIONES ALTERNADAS"=>"COMPORTAMIENTO DEL SUELO CON UTILIZACIONES ALTERNADAS",
    "CONTROL DE MALEZAS"=>"CONTROL DE MALEZAS",
    "CULTIVOS DE CAMPO"=>"CULTIVOS DE CAMPO",
    "CULTIVOS FORRAJEROS"=>"CULTIVOS FORRAJEROS",
    "CULTIVOS ORNAMENTALES"=>"CULTIVOS ORNAMENTALES",
    "DIVULGACION Y EXTENSION AGRICOLA"=>"DIVULGACION Y EXTENSION AGRICOLA",
    "FERTILIDAD DEL SUELO"=>"FERTILIDAD DEL SUELO",
    "FITOGENETICA"=>"FITOGENETICA",
    "GESTION DE CULTIVOS"=>"GESTION DE CULTIVOS",
    "GESTION DE LA PRODUCCION VEGETAL"=>"GESTION DE LA PRODUCCION VEGETAL",
    "HIBRIDACION DE CULTIVOS"=>"HIBRIDACION DE CULTIVOS",
    "PASTIZALES"=>"PASTIZALES",
    "PROTECCION DE CULTIVOS"=>"PROTECCION DE CULTIVOS",
    "SEMILLAS"=>"SEMILLAS",
    "TECNOLOGIA DE CULTIVOS"=>"TECNOLOGIA DE CULTIVOS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "CIENCIAS VETERINARIAS"){
    echo $form->dropDownList($model,'subdiscipline',array("APICULTURA"=>"APICULTURA",
    "ATENCION Y GESTION"=>"ATENCION Y GESTION",
    "AVES DE CORRAL"=>"AVES DE CORRAL",
    "BOVINOS"=>"BOVINOS",
    "CONTROL Y NORMAS"=>"CONTROL Y NORMAS",
    "CUNICULTURA"=>"CUNICULTURA",
    "EQUINOS"=>"EQUINOS",
    "GENETICA"=>"GENETICA",
    "INSTRUMENTACION"=>"INSTRUMENTACION",
    "NUTRICION"=>"NUTRICION",
    "OVINOS"=>"OVINOS",
    "PORCINOS"=>"PORCINOS",
    "PRODUCTOS"=>"PRODUCTOS",
    "REPRODUCCION"=>"REPRODUCCION",
    "SELECCION"=>"SELECCION",
    "SERICULTURA"=>"SERICULTURA",
    "ZOOTECNIA GENERAL"=>"ZOOTECNIA GENERAL",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PECES Y ANIMALES SALVAJES"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOLOGIA PESQUERA"=>"BIOLOGIA PESQUERA",
    "CAZA (ANIMALES)"=>"CAZA (ANIMALES)",
    "CONSERVACION Y ORDENAMIENTO DE LOS ANIMALES SALVAJES"=>"CONSERVACION Y ORDENAMIENTO DE LOS ANIMALES SALVAJES",
    "CONTROLES"=>"CONTROLES",
    "DINAMICA POBLACIONES"=>"DINAMICA POBLACIONES",
    "ELABORACION DEL PESCADO"=>"ELABORACION DEL PESCADO",
    "HABITOS DE ALIMENTACION"=>"HABITOS DE ALIMENTACION",
    "INFLUENCIAS DEL HABITAT"=>"INFLUENCIAS DEL HABITAT",
    "LOCALIZACION DE PECES"=>"LOCALIZACION DE PECES",
    "MECANICA DE LA PESCA"=>"MECANICA DE LA PESCA",
    "PISCICULTURA"=>"PISCICULTURA",
    "PROPAGACION Y ORDENAMIENTO"=>"PROPAGACION Y ORDENAMIENTO",
    "PROTECCION DE PECES"=>"PROTECCION DE PECES",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "HORTICULTURA"){
    echo $form->dropDownList($model,'subdiscipline',array("FITOGENETICA"=>"FITOGENETICA",
    "FLORICULTURA"=>"FLORICULTURA",
    "FRUTAS"=>"FRUTAS",
    "HIBRIDACION"=>"HIBRIDACION",
    "HORTALIZAS"=>"HORTALIZAS",
    "TECNICAS DE CULTIVO"=>"TECNICAS DE CULTIVO",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "FITOPATOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("BACTERIAS"=>"BACTERIAS",
    "CONTROL AMBIENTAL DE ENFERMEDADES"=>"CONTROL AMBIENTAL DE ENFERMEDADES",
    "CONTROL BIOLOGICO DE ENFERMEDADES"=>"CONTROL BIOLOGICO DE ENFERMEDADES",
    "CONTROL QUIMICO DE ENFERMEDADES"=>"CONTROL QUIMICO DE ENFERMEDADES",
    "FISIOGENESIS"=>"FISIOGENESIS",
    "HONGOS"=>"HONGOS",
    "NEMATODOS"=>"NEMATODOS",
    "SENSIBILIDAD Y RESISTENCIA DE LAS PLANTAS"=>"SENSIBILIDAD Y RESISTENCIA DE LAS PLANTAS",
    "VIRUS"=>"VIRUS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "CIENCIAS VETERINARIAS"){
    echo $form->dropDownList($model,'subdiscipline',array("ANATOMIA"=>"ANATOMIA",
    "ANESTESIOLOGIA"=>"ANESTESIOLOGIA",
    "BIOQUIMICA"=>"BIOQUIMICA",
    "CIRUGIA"=>"CIRUGIA",
    "FARMACOLOGIA"=>"FARMACOLOGIA",
    "FISIOLOGIA"=>"FISIOLOGIA",
    "GENETICA"=>"GENETICA",
    "HEMATOLOGIA"=>"HEMATOLOGIA",
    "INMUNOLOGIA"=>"INMUNOLOGIA",
    "MEDICINA INTERNA"=>"MEDICINA INTERNA",
    "MICROBIOLOGIA"=>"MICROBIOLOGIA",
    "MORFOLOGIA"=>"MORFOLOGIA",
    "NUTRICION"=>"NUTRICION",
    "OBSTETRICIA"=>"OBSTETRICIA",
    "PATOLOGIA"=>"PATOLOGIA",
    "RADIOLOGIA"=>"RADIOLOGIA",
    "VIROLOGIA"=>"VIROLOGIA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "MEDICINA CLINICA"){
    echo $form->dropDownList($model,'subdiscipline',array("CANCEROLOGIA"=>"CANCEROLOGIA",
    "DERMATOLOGIA"=>"DERMATOLOGIA",
    "GENETICA CLINICA"=>"GENETICA CLINICA",
    "GERIATRIA"=>"GERIATRIA",
    "GINECOLOGIA"=>"GINECOLOGIA",
    "MICROBIOLOGIA CLINICA"=>"MICROBIOLOGIA CLINICA",
    "OFTALMOLOGIA"=>"OFTALMOLOGIA",
    "PATOLOGIA CLINICA"=>"PATOLOGIA CLINICA",
    "PEDIATRIA"=>"PEDIATRIA",
    "PSICOLOGIA CLINICA"=>"PSICOLOGIA CLINICA",
    "RADIOLOGIA"=>"RADIOLOGIA",
    "RADIOTERAPIA"=>"RADIOTERAPIA",
    "SIFILOGRAFIA"=>"SIFILOGRAFIA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "MEDICINA DEL TRABAJO"){
    echo $form->dropDownList($model,'subdiscipline',array("ENFERMEDADES PROFESIONALES"=>"ENFERMEDADES PROFESIONALES",
    "MEDICINA NUCLEAR"=>"MEDICINA NUCLEAR",
    "REHABILITACION MEDICA"=>"REHABILITACION MEDICA",
    "SANIDAD DEL TRABAJO"=>"SANIDAD DEL TRABAJO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "MEDICINA INTERNA"){
    echo $form->dropDownList($model,'subdiscipline',array("CARDIOLOGIA"=>"CARDIOLOGIA",
    "ENDOCRINOLOGIA"=>"ENDOCRINOLOGIA",
    "ENFERMEDADES INFECCIOSAS"=>"ENFERMEDADES INFECCIOSAS",
    "ENFERMEDADES PULMONARES"=>"ENFERMEDADES PULMONARES",
    "GASTROENTEROLOGIA"=>"GASTROENTEROLOGIA",
    "HEMATOLOGIA"=>"HEMATOLOGIA",
    "NEFROLOGIA"=>"NEFROLOGIA",
    "NEUROLOGIA"=>"NEUROLOGIA",
    "REUMATOLOGIA"=>"REUMATOLOGIA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "NUTRICION"){
    echo $form->dropDownList($model,'subdiscipline',array("DEFICIENCIAS ALIMENTARIAS"=>"DEFICIENCIAS ALIMENTARIAS",
    "DIGESTION"=>"DIGESTION",
    "ELEMENTOS MINERALES DE LOS ALIMENTOS"=>"ELEMENTOS MINERALES DE LOS ALIMENTOS",
    "ELEMENTOS TRAZA EN LOS ALIMENTOS"=>"ELEMENTOS TRAZA EN LOS ALIMENTOS",
    "ENFERMEDADES NUTRICIONALES"=>"ENFERMEDADES NUTRICIONALES",
    "INTOXICANTES NATURALES"=>"INTOXICANTES NATURALES",
    "METABOLISMO DE LA ENERGIA"=>"METABOLISMO DE LA ENERGIA",
    "NECESIDADES ALIMENTARIAS"=>"NECESIDADES ALIMENTARIAS",
    "NUTRIENTES"=>"NUTRIENTES",
    "PATOGENOS DE LOS ALIMENTOS"=>"PATOGENOS DE LOS ALIMENTOS",
    "TOXICIDAD DE LOS ALIMENTOS"=>"TOXICIDAD DE LOS ALIMENTOS",
    "VALORES NUTRIENTES"=>"VALORES NUTRIENTES",
    "VITAMINAS"=>"VITAMINAS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PATOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ALERGIAS"=>"ALERGIAS",
    "ARTERIOSCLEROSIS"=>"ARTERIOSCLEROSIS",
    "CARCINOGENESIS"=>"CARCINOGENESIS",
    "ENDOTOXINAS"=>"ENDOTOXINAS",
    "HEMATOLOGIA"=>"HEMATOLOGIA",
    "HISTOPATOLOGIA"=>"HISTOPATOLOGIA",
    "INMUNOPATOLOGIA"=>"INMUNOPATOLOGIA",
    "NEUROPATOLOGIA"=>"NEUROPATOLOGIA",
    "ONCOLOGIA"=>"ONCOLOGIA",
    "OSTEOPATOLOGIA"=>"OSTEOPATOLOGIA",
    "PARASITOLOGIA"=>"PARASITOLOGIA",
    "PATOLOGIA CARDIOVASCULAR"=>"PATOLOGIA CARDIOVASCULAR",
    "PATOLOGIA COMPARADA"=>"PATOLOGIA COMPARADA",
    "PATOLOGIA DE LAS RADIACIONES"=>"PATOLOGIA DE LAS RADIACIONES",
    "PATOLOGIA EXPERIMENTAL"=>"PATOLOGIA EXPERIMENTAL",
    "STRESS"=>"STRESS",
    "TERATOLOGIA"=>"TERATOLOGIA",
    "TROMBOSIS"=>"TROMBOSIS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "FARMACODINAMICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ABSORCION DE LOS MEDICAMENTOS"=>"ABSORCION DE LOS MEDICAMENTOS",
    "ACTIVACION"=>"ACTIVACION",
    "AUTOCATALISIS"=>"AUTOCATALISIS",
    "CATALISIS"=>"CATALISIS",
    "EFECTO DE LOS MEDICAMENTOS"=>"EFECTO DE LOS MEDICAMENTOS",
    "INMUNOCATALISIS"=>"INMUNOCATALISIS",
    "INTERACCION DE ANTIGENOS"=>"INTERACCION DE ANTIGENOS",
    "LUGARES RADIACTIVOS"=>"LUGARES RADIACTIVOS",
    "MECANISMOS DE ACCION DE LOS MEDICAMENTOS"=>"MECANISMOS DE ACCION DE LOS MEDICAMENTOS",
    "PROCESOS METABOLICOS DE LOS MEDICAMENTOS"=>"PROCESOS METABOLICOS DE LOS MEDICAMENTOS",
    "PROCESOS MULTIPLES"=>"PROCESOS MULTIPLES",
    "RECEPTORES"=>"RECEPTORES",
    "TERAPIA CON MEDICAMENTOS"=>"TERAPIA CON MEDICAMENTOS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "FARMACOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS DE LOS PRODUCTOS FARMACEUTICOS"=>"ANALISIS DE LOS PRODUCTOS FARMACEUTICOS",
    "COMPOSICION DE LOS MEDICAMENTOS"=>"COMPOSICION DE LOS MEDICAMENTOS",
    "EVALUACION DE LOS MEDICAMENTOS"=>"EVALUACION DE LOS MEDICAMENTOS",
    "FARMACIA GALENICA"=>"FARMACIA GALENICA",
    "FARMACOGNOSIA"=>"FARMACOGNOSIA",
    "FARMACOPEAS"=>"FARMACOPEAS",
    "FITOFARMACOS"=>"FITOFARMACOS",
    "MEDICAMENTOS DE ORIGEN NATURAL"=>"MEDICAMENTOS DE ORIGEN NATURAL",
    "MEDICAMENTOS SINTETICOS"=>"MEDICAMENTOS SINTETICOS",
    "NORMALIZACION DE LOS MEDICAMENTOS"=>"NORMALIZACION DE LOS MEDICAMENTOS",
    "PSICOFARMACOLOGIA"=>"PSICOFARMACOLOGIA",
    "RADIOFARMACOS"=>"RADIOFARMACOS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "MEDICINA QUIRURGICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANESTESIOLOGIA"=>"ANESTESIOLOGIA",
    "CIRUGIA ABDOMINAL"=>"CIRUGIA ABDOMINAL",
    "CIRUGIA CARDIACA"=>"CIRUGIA CARDIACA",
    "CIRUGIA DE TRANSPLANTES"=>"CIRUGIA DE TRANSPLANTES",
    "CIRUGIA ESTETICA"=>"CIRUGIA ESTETICA",
    "CIRUGIA EXPERIMENTAL"=>"CIRUGIA EXPERIMENTAL",
    "CIRUGIA MAXILO-FACIAL"=>"CIRUGIA MAXILO-FACIAL",
    "CIRUGIA OCULAR"=>"CIRUGIA OCULAR",
    "CIRUGIA ORTOPEDICA"=>"CIRUGIA ORTOPEDICA",
    "CIRUGIA OSEA"=>"CIRUGIA OSEA",
    "CIRUGIA OTORRINOLARINGOLOGICA"=>"CIRUGIA OTORRINOLARINGOLOGICA",
    "CIRUGIA VASCULAR"=>"CIRUGIA VASCULAR",
    "ENDODONCIA"=>"ENDODONCIA",
    "ESTOMATOLOGIA-ORTODONCIA"=>"ESTOMATOLOGIA-ORTODONCIA",
    "EXODONCIA"=>"EXODONCIA",
    "FISIOTERAPIA"=>"FISIOTERAPIA",
    "NEUROCIRUGIA"=>"NEUROCIRUGIA",
    "PARADONCIA"=>"PARADONCIA",
    "PROCTOLOGIA"=>"PROCTOLOGIA",
    "PROSTODONCIA"=>"PROSTODONCIA",
    "TRAUMATOLOGIA"=>"TRAUMATOLOGIA",
    "UROLOGIA"=>"UROLOGIA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA E INGENIERIA AERONAUTICA"){
    echo $form->dropDownList($model,'subdiscipline',array("A LA ROTATORIA"=>"A LA ROTATORIA",
    "AERODINAMICA"=>"AERODINAMICA",
    "AERONAVES"=>"AERONAVES",
    "AEROPUERTOS Y TRANSPORTE AEREO"=>"AEROPUERTOS Y TRANSPORTE AEREO",
    "CARGAS AERODINAMICAS"=>"CARGAS AERODINAMICAS",
    "CARGAS DE ATERRIZAJE"=>"CARGAS DE ATERRIZAJE",
    "COMBUSTIBLE PARA AERONAVES COMBUSTION"=>"COMBUSTIBLE PARA AERONAVES COMBUSTION",
    "COMPRESORES Y TURBINAS"=>"COMPRESORES Y TURBINAS",
    "DISPOSITIVOS DE SUSPENSION NEUMATICA"=>"DISPOSITIVOS DE SUSPENSION NEUMATICA",
    "ESTABILIDAD Y CONTROL"=>"ESTABILIDAD Y CONTROL",
    "ESTRUCTURAS DE AERONAVES"=>"ESTRUCTURAS DE AERONAVES",
    "HIDRODINAMICA"=>"HIDRODINAMICA",
    "INSTRUMENTACION (AVIACION)"=>"INSTRUMENTACION (AVIACION)",
    "MATERIALES PARA SISTEMAS DE PROPULSION"=>"MATERIALES PARA SISTEMAS DE PROPULSION",
    "SISTEMAS DE PROPULSION"=>"SISTEMAS DE PROPULSION",
    "TEMBLOR Y VIBRACION"=>"TEMBLOR Y VIBRACION",
    "TEORIA AERODINAMICA"=>"TEORIA AERODINAMICA",
    "VUELOS: ENSAYO E INVESTIGACION"=>"VUELOS: ENSAYO E INVESTIGACION",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA BIOQUIMICA"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOTECNOLOGIA MARINA"=>"BIOTECNOLOGIA MARINA",
    "MICROBIOLOGIA INDUSTRIAL"=>"MICROBIOLOGIA INDUSTRIAL",
    "TECNOLOGIA DE LA FERMENTACION"=>"TECNOLOGIA DE LA FERMENTACION",
    "TECNOLOGIA DE LOS ANTIBIOTICOS"=>"TECNOLOGIA DE LOS ANTIBIOTICOS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA E INGENIERIA QUIMICA"){
    echo $form->dropDownList($model,'subdiscipline',array("DESIONIZACION"=>"DESIONIZACION",
    "ECONOMIA QUIMICA"=>"ECONOMIA QUIMICA",
    "GALVANOPLASTIA"=>"GALVANOPLASTIA",
    "OPERACIONES ELECTROQUIMICAS"=>"OPERACIONES ELECTROQUIMICAS",
    "PROCESOS NUCLEOQUIMICOS"=>"PROCESOS NUCLEOQUIMICOS",
    "PROCESOS QUIMICOS"=>"PROCESOS QUIMICOS",
    "PROYECTOS"=>"PROYECTOS",
    "QUIMICA INDUSTRIAL"=>"QUIMICA INDUSTRIAL",
    "RECUBRIMIENTOS IMPERMEABLES"=>"RECUBRIMIENTOS IMPERMEABLES",
    "RECUBRIMIENTOS PROTECTORES"=>"RECUBRIMIENTOS PROTECTORES",
    "RECUBRIMIENTOS REFRACTARIOS"=>"RECUBRIMIENTOS REFRACTARIOS",
    "SEPARACION QUIMICA"=>"SEPARACION QUIMICA",
    "SINTESIS QUIMICA"=>"SINTESIS QUIMICA",
    "TECNOLOGIA DE LA CATALISIS"=>"TECNOLOGIA DE LA CATALISIS",
    "TECNOLOGIA DE LA COMBUSTION"=>"TECNOLOGIA DE LA COMBUSTION",
    "TECNOLOGIA DE LA CORROSION"=>"TECNOLOGIA DE LA CORROSION",
    "TECNOLOGIA DE LA PRESERVACION"=>"TECNOLOGIA DE LA PRESERVACION",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE LA INFORMATICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ARITMETICA E INSTRUCCIONES PARA LA UTILIZACION DE MAQUINAS"=>"ARITMETICA E INSTRUCCIONES PARA LA UTILIZACION DE MAQUINAS",
    "ARQUITECTURA DE COMPUTADORES"=>"ARQUITECTURA DE COMPUTADORES",
    "COMPUTADORES ANALOGICOS"=>"COMPUTADORES ANALOGICOS",
    "COMPUTADORES DIGITALES"=>"COMPUTADORES DIGITALES",
    "COMPUTADORES HIBRIDOS"=>"COMPUTADORES HIBRIDOS",
    "CONVERTIDORES DE SISTEMA ANALOGICO A SISTEMA NUMERICO"=>"CONVERTIDORES DE SISTEMA ANALOGICO A SISTEMA NUMERICO",
    "DISEÑO DE SISTEMAS DE CALCULO NUMERICO"=>"DISEÑO DE SISTEMAS DE CALCULO NUMERICO",
    "DISEÑO LOGICO"=>"DISEÑO LOGICO",
    "DISPOSITIVOS DE ALMACENAMIENTO"=>"DISPOSITIVOS DE ALMACENAMIENTO",
    "DISPOSITIVOS DE CONTROL"=>"DISPOSITIVOS DE CONTROL",
    "DISPOSITIVOS DE TRANSMISION DE DATOS"=>"DISPOSITIVOS DE TRANSMISION DE DATOS",
    "EQUIPO PERIFERICO DE COMPUTADORES"=>"EQUIPO PERIFERICO DE COMPUTADORES",
    "FIABILIDAD DE LOS COMPUTADORES"=>"FIABILIDAD DE LOS COMPUTADORES",
    "SISTEMAS DE RECONOCIMIENTO DE CARACTERES"=>"SISTEMAS DE RECONOCIMIENTO DE CARACTERES",
    "SISTEMAS DE TIEMPO REAL"=>"SISTEMAS DE TIEMPO REAL",
    "TERMINALES DE COMPUTADOR TERMINALES DE VIDEO Y TRAZADORES DE CURVAS"=>"TERMINALES DE COMPUTADOR TERMINALES DE VIDEO Y TRAZADORES DE CURVAS",
    "UNIDADES CENTRALES DE TRATAMIENTO"=>"UNIDADES CENTRALES DE TRATAMIENTO",
    "UTILIZABILIDAD DE LOS COMPUTADORES"=>"UTILIZABILIDAD DE LOS COMPUTADORES",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE LA CONSTRUCCION"){
    echo $form->dropDownList($model,'subdiscipline',array("ABASTECIMIENTO DE AGUA"=>"ABASTECIMIENTO DE AGUA",
    "ALCANTARILLADO Y PURIFICACION DE AGUA"=>"ALCANTARILLADO Y PURIFICACION DE AGUA",
    "CARRETERAS"=>"CARRETERAS",
    "CASAS"=>"CASAS",
    "CIMIENTOS"=>"CIMIENTOS",
    "CODIGOS Y ESPECIFICACIONES"=>"CODIGOS Y ESPECIFICACIONES",
    "CONSTRUCCION DE AEROPUERTOS"=>"CONSTRUCCION DE AEROPUERTOS",
    "CONSTRUCCION DE CARRETERAS"=>"CONSTRUCCION DE CARRETERAS",
    "CONSTRUCCION DE FERROCARRILES"=>"CONSTRUCCION DE FERROCARRILES",
    "CONSTRUCCION DE MADERA"=>"CONSTRUCCION DE MADERA",
    "CONSTRUCCIONES LIGERAS"=>"CONSTRUCCIONES LIGERAS",
    "CONSTRUCCIONES METALICAS"=>"CONSTRUCCIONES METALICAS",
    "CONSTRUCCIONES PESADAS"=>"CONSTRUCCIONES PESADAS",
    "CONSTRUCCIONES PREFABRICADAS"=>"CONSTRUCCIONES PREFABRICADAS",
    "DISEÑO ARQUITECTONICO"=>"DISEÑO ARQUITECTONICO",
    "DRENAJE"=>"DRENAJE",
    "EDIFICIOS GRANDES Y RASCACIELOS"=>"EDIFICIOS GRANDES Y RASCACIELOS",
    "EDIFICIOS INDUSTRIALES Y COMERCIALES"=>"EDIFICIOS INDUSTRIALES Y COMERCIALES",
    "EDIFICIOS PUBLICOS"=>"EDIFICIOS PUBLICOS",
    "EXCAVACIONES"=>"EXCAVACIONES",
    "HORMIGON PRETENSADO"=>"HORMIGON PRETENSADO",
    "INGENIERIA CIVIL"=>"INGENIERIA CIVIL",
    "INGENIERIA ESTRUCTURAL"=>"INGENIERIA ESTRUCTURAL",
    "INGENIERIA HIDRAULICA"=>"INGENIERIA HIDRAULICA",
    "MECANICA DEL SUELO (CONSTRUCCION)"=>"MECANICA DEL SUELO (CONSTRUCCION)",
    "METROLOGIA DE LA CONSTRUCCION"=>"METROLOGIA DE LA CONSTRUCCION",
    "OBRAS SUBTERRANEAS"=>"OBRAS SUBTERRANEAS",
    "ORGANIZACION DE OBRAS"=>"ORGANIZACION DE OBRAS",
    "OTROS"=>"OTROS",
    "PLANIFICACION URBANA"=>"PLANIFICACION URBANA",
    "PRESAS"=>"PRESAS",
    "PUENTES"=>"PUENTES",
    "PUERTOS"=>"PUERTOS",
    "REGLAMENTACIONES"=>"REGLAMENTACIONES",
    "RESISTENCIA ESTRUCTURAL"=>"RESISTENCIA ESTRUCTURAL",
    "RIEGO"=>"RIEGO",
    "SISTEMAS HIPERESTATICOS"=>"SISTEMAS HIPERESTATICOS",
    "TECNOLOGIA DEL HORMIGON"=>"TECNOLOGIA DEL HORMIGON",
    "TOPOGRAFIA DE LA CONSTRUCCION"=>"TOPOGRAFIA DE LA CONSTRUCCION",
    "TUNELES"=>"TUNELES",
    "VIAS NAVEGABLES INTERIORES"=>"VIAS NAVEGABLES INTERIORES",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA E INGENIERIA DE LA ELECTRICIDAD"){
    echo $form->dropDownList($model,'subdiscipline',array("APARATO DE CONEXION"=>"APARATO DE CONEXION",
    "APLICACIONES DE LA ELECTRICIDAD"=>"APLICACIONES DE LA ELECTRICIDAD",
    "CONDUCTORES AISLADOS"=>"CONDUCTORES AISLADOS",
    "FABRICACION DE EQUIPO ELECTRICO"=>"FABRICACION DE EQUIPO ELECTRICO",
    "ILUMINACION ELECTRICA"=>"ILUMINACION ELECTRICA",
    "MAQUINARIA ROTATORIA"=>"MAQUINARIA ROTATORIA",
    "MOTORES ELECTRICOS"=>"MOTORES ELECTRICOS",
    "OTROS"=>"OTROS",
    "TRANSMISION Y DISTRIBUCION"=>"TRANSMISION Y DISTRIBUCION",
    "UTILIZACION DE LA ENERGIA DE LAS CORRIENTES CONTINUAS"=>"UTILIZACION DE LA ENERGIA DE LAS CORRIENTES CONTINUAS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA ELECTRONICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANTENAS"=>"ANTENAS",
    "AUDIOELECTRONICA"=>"AUDIOELECTRONICA",
    "DISEÑO DE CIRCUITOS"=>"DISEÑO DE CIRCUITOS",
    "DISEÑO DE FILTROS"=>"DISEÑO DE FILTROS",
    "DISPOSITIVOS DE GRABACION"=>"DISPOSITIVOS DE GRABACION",
    "DISPOSITIVOS DE LASER"=>"DISPOSITIVOS DE LASER",
    "DISPOSITIVOS DE MICROONDA"=>"DISPOSITIVOS DE MICROONDA",
    "DISPOSITIVOS DE RAYOS X"=>"DISPOSITIVOS DE RAYOS X",
    "DISPOSITIVOS DE SEMICONDUCTORES"=>"DISPOSITIVOS DE SEMICONDUCTORES",
    "DISPOSITIVOS DE SONAR"=>"DISPOSITIVOS DE SONAR",
    "DISPOSITIVOS FOTOELECTRICOS"=>"DISPOSITIVOS FOTOELECTRICOS",
    "DISPOSITIVOS SONICOS"=>"DISPOSITIVOS SONICOS",
    "DISPOSITIVOS TERMOELECTRICOS"=>"DISPOSITIVOS TERMOELECTRICOS",
    "DISPOSITIVOS TERMOIONICOS"=>"DISPOSITIVOS TERMOIONICOS",
    "DISPOSITIVOS ULTRASONICOS"=>"DISPOSITIVOS ULTRASONICOS",
    "EMISORES DE TELEVISION (TRANSMISORES)"=>"EMISORES DE TELEVISION (TRANSMISORES)",
    "OTROS"=>"OTROS",
    "RADAR"=>"RADAR",
    "RECEPTORES DE RADIO"=>"RECEPTORES DE RADIO",
    "RECEPTORES DE TELEVISION"=>"RECEPTORES DE TELEVISION",
    "TRADUCTORES ELECTROACUSTICOS"=>"TRADUCTORES ELECTROACUSTICOS",
    "TRANSISTORES"=>"TRANSISTORES",
    "TRANSMISORES DE RADIO"=>"TRANSMISORES DE RADIO",
    "TUBOS ELECTRONICOS"=>"TUBOS ELECTRONICOS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DEL MEDIO AMBIENTE"){
    echo $form->dropDownList($model,'subdiscipline',array("AMBIENTAL"=>"AMBIENTAL",
    "CONTROL DE LA CONTAMINACION DEL AGUA"=>"CONTROL DE LA CONTAMINACION DEL AGUA",
    "DESECHOS INDUSTRIALES"=>"DESECHOS INDUSTRIALES",
    "ECOSISTEMAS RECUPERACION DE"=>"ECOSISTEMAS RECUPERACION DE",
    "EDUCACION"=>"EDUCACION",
    "ELIMINACION DE DESECHOS RADIACTIVOS"=>"ELIMINACION DE DESECHOS RADIACTIVOS",
    "MATERIALES"=>"MATERIALES",
    "OTROS"=>"OTROS",
    "RECUPERACION DEL AGUA"=>"RECUPERACION DEL AGUA",
    "REUSO Y RECICLADO"=>"REUSO Y RECICLADO",
    "TECNOLOGIA ANTICONTAMINACION"=>"TECNOLOGIA ANTICONTAMINACION",
    "TECNOLOGIA DE CONTROL DE INSECTOS"=>"TECNOLOGIA DE CONTROL DE INSECTOS",
    "TECNOLOGIA DE CONTROL DE ROEDORES"=>"TECNOLOGIA DE CONTROL DE ROEDORES",
    "TECNOLOGIA SANITARIA"=>"TECNOLOGIA SANITARIA",
    "CONTROL DE LA CONTAMINACION DEL AIRE"=>"CONTROL DE LA CONTAMINACION DEL AIRE",
    "ELIMINACION DE RESIDUOS"=>"ELIMINACION DE RESIDUOS",
    "TECNOLOGIA DE LAS AGUAS CLOACALES"=>"TECNOLOGIA DE LAS AGUAS CLOACALES",
    "TECNOLOGIA LIMPIA"=>"TECNOLOGIA LIMPIA"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE LA ALIMENTACION"){
    echo $form->dropDownList($model,'subdiscipline',array("ACEITES Y GRASAS VEGETALES"=>"ACEITES Y GRASAS VEGETALES",
    "ADITIVOS ALIMENTARIOS"=>"ADITIVOS ALIMENTARIOS",
    "ALIMENTOS PARA ANIMALES"=>"ALIMENTOS PARA ANIMALES",
    "ALIMENTOS PROTEICOS"=>"ALIMENTOS PROTEICOS",
    "ALIMENTOS SINTETICOS"=>"ALIMENTOS SINTETICOS",
    "ALMIDON"=>"ALMIDON",
    "ANTIOXIDANTES EN LOS ALIMENTOS"=>"ANTIOXIDANTES EN LOS ALIMENTOS",
    "AROMATIZANTES"=>"AROMATIZANTES",
    "AZUCAR"=>"AZUCAR",
    "BEBIDAS ALCOHOLICAS"=>"BEBIDAS ALCOHOLICAS",
    "BEBIDAS NO ALCOHOLICAS"=>"BEBIDAS NO ALCOHOLICAS",
    "COLORANTES"=>"COLORANTES",
    "CONSERVACION DE ALIMENTOS"=>"CONSERVACION DE ALIMENTOS",
    "ELABORACION DE ALIMENTOS"=>"ELABORACION DE ALIMENTOS",
    "ESTABILIZADORES"=>"ESTABILIZADORES",
    "ESTERILIZACION DE LOS ALIMENTOS"=>"ESTERILIZACION DE LOS ALIMENTOS",
    "HIGIENE DE LOS ALIMENTOS"=>"HIGIENE DE LOS ALIMENTOS",
    "INDUSTRIA CERVECERA"=>"INDUSTRIA CERVECERA",
    "LIOFILIZACION"=>"LIOFILIZACION",
    "MOLINERIA"=>"MOLINERIA",
    "OTROS"=>"OTROS",
    "PANADERIA"=>"PANADERIA",
    "PASTEURIZACION"=>"PASTEURIZACION",
    "PREPARACION DE CONSERVAS"=>"PREPARACION DE CONSERVAS",
    "PRODUCTOS DE CEREALES"=>"PRODUCTOS DE CEREALES",
    "PRODUCTOS LACTEOS"=>"PRODUCTOS LACTEOS",
    "PROPIEDADES DE LOS ALIMENTOS"=>"PROPIEDADES DE LOS ALIMENTOS",
    "REFRIGERACION"=>"REFRIGERACION",
    "SECADO POR CONGELACION"=>"SECADO POR CONGELACION",
    "VINO"=>"VINO"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA INDUSTRIAL"){
    echo $form->dropDownList($model,'subdiscipline',array("DISEÑO"=>"DISEÑO",
    "EQUIPO INDUSTRIAL"=>"EQUIPO INDUSTRIAL",
    "ESPECIFICACIONES DE PROCESOS"=>"ESPECIFICACIONES DE PROCESOS",
    "ESTUDIOS DE TIEMPOS Y MOVIMIENTOS"=>"ESTUDIOS DE TIEMPOS Y MOVIMIENTOS",
    "MAQUINARIA INDUSTRIAL"=>"MAQUINARIA INDUSTRIAL",
    "OTROS"=>"OTROS",
    "PROCESOS INDUSTRIALES"=>"PROCESOS INDUSTRIALES",
    "SISTEMAS"=>"SISTEMAS",
    "TECNOLOGIA DE LA ELABORACION"=>"TECNOLOGIA DE LA ELABORACION",
    "TECNOLOGIA DEL MANTENIMIENTO"=>"TECNOLOGIA DEL MANTENIMIENTO"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "INSTRUMENTAL TECNOLOGICO"){
    echo $form->dropDownList($model,'subdiscipline',array("CONTROL DE MAQUINARIA"=>"CONTROL DE MAQUINARIA",
    "DISPOSITIVOS ELECTROOPTICOS"=>"DISPOSITIVOS ELECTROOPTICOS",
    "EQUIPO DE ENSAYOS ELECTRICOS"=>"EQUIPO DE ENSAYOS ELECTRICOS",
    "EQUIPO DE LABORATORIO"=>"EQUIPO DE LABORATORIO",
    "EQUIPO DE PRUEBA"=>"EQUIPO DE PRUEBA",
    "EQUIPO FOTOGRAFICO Y CINEMATOGRAFICO"=>"EQUIPO FOTOGRAFICO Y CINEMATOGRAFICO",
    "INSTRUMENTAL CIENTIFICO"=>"INSTRUMENTAL CIENTIFICO",
    "INSTRUMENTOS DE MEDIDA DEL TIEMPO"=>"INSTRUMENTOS DE MEDIDA DEL TIEMPO",
    "INSTRUMENTOS DE MEDIDAS TERMICAS"=>"INSTRUMENTOS DE MEDIDAS TERMICAS",
    "INSTRUMENTOS DENTALES"=>"INSTRUMENTOS DENTALES",
    "INSTRUMENTOS ELECTRICOS"=>"INSTRUMENTOS ELECTRICOS",
    "INSTRUMENTOS ELECTRONICOS"=>"INSTRUMENTOS ELECTRONICOS",
    "INSTRUMENTOS MEDICOS"=>"INSTRUMENTOS MEDICOS",
    "INSTRUMENTOS OPTICOS"=>"INSTRUMENTOS OPTICOS",
    "LENTES"=>"LENTES",
    "OTROS"=>"OTROS",
    "TECNICAS TELEQUIRICAS"=>"TECNICAS TELEQUIRICAS",
    "INSTRUMENTOS TERMOSTATICOS"=>"INSTRUMENTOS TERMOSTATICOS",
    "SERVOMECANISMOS"=>"SERVOMECANISMOS",
    "TECNOLOGIA DE LA AUTOMATIZACION"=>"TECNOLOGIA DE LA AUTOMATIZACION"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE LAS MATERIAS"){
    echo $form->dropDownList($model,'subdiscipline',array("CALIZOS"=>"CALIZOS",
    "CEMENTOS"=>"CEMENTOS",
    "CERAMETAL (MATERIAL METALOCERAMICO)"=>"CERAMETAL (MATERIAL METALOCERAMICO)",
    "CERAMICA"=>"CERAMICA",
    "COMPOSITOS"=>"COMPOSITOS",
    "MATERIALES FUNCIONALES"=>"MATERIALES FUNCIONALES",
    "OTROS"=>"OTROS",
    "PLASTICOS"=>"PLASTICOS",
    "PRODUCTOS DE LA ARCILLA"=>"PRODUCTOS DE LA ARCILLA",
    "PROPIEDADES DE LOS MATERIALES"=>"PROPIEDADES DE LOS MATERIALES",
    "REFRACTARIOS"=>"REFRACTARIOS",
    "RESISTENCIA DE LOS MATERIALES"=>"RESISTENCIA DE LOS MATERIALES",
    "TECNOLOGIA DE LA MADERA"=>"TECNOLOGIA DE LA MADERA",
    "ABRASIVOS"=>"ABRASIVOS",
    "ENSAYO DE MATERIALES"=>"ENSAYO DE MATERIALES",
    "VIDRIO"=>"VIDRIO",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA MECANICA"){
    echo $form->dropDownList($model,'subdiscipline',array("APLICACIONES MECANIZADAS"=>"APLICACIONES MECANIZADAS",
    "BOMBAS Y EQUIPO DE MANEJO DE LIQUIDOS"=>"BOMBAS Y EQUIPO DE MANEJO DE LIQUIDOS",
    "COJINETES"=>"COJINETES",
    "COMPRESORES DE AIRE"=>"COMPRESORES DE AIRE",
    "DISEÑO DE MAQUINAS"=>"DISEÑO DE MAQUINAS",
    "ENGRANAJES"=>"ENGRANAJES",
    "EQUIPO DE CALEFACCION"=>"EQUIPO DE CALEFACCION",
    "EQUIPO DE CONSTRUCCION"=>"EQUIPO DE CONSTRUCCION",
    "EQUIPO DE REFRIGERACION"=>"EQUIPO DE REFRIGERACION",
    "EQUIPO DE TRANSMISION DE ENERGIA (MECANICA)"=>"EQUIPO DE TRANSMISION DE ENERGIA (MECANICA)",
    "EQUIPO NEUMATICO"=>"EQUIPO NEUMATICO",
    "HERRAMIENTA Y ACCESORIOS"=>"HERRAMIENTA Y ACCESORIOS",
    "MAQUINARIA AGRICOLA"=>"MAQUINARIA AGRICOLA",
    "MAQUINARIA DE EXTRACCION DE PETROLEO"=>"MAQUINARIA DE EXTRACCION DE PETROLEO",
    "MAQUINARIA DE FABRICACION DE PAPEL"=>"MAQUINARIA DE FABRICACION DE PAPEL",
    "MAQUINARIA DE IMPRIMIR Y DUPLICAR"=>"MAQUINARIA DE IMPRIMIR Y DUPLICAR",
    "MAQUINARIA DE LA INDUSTRIA ALIMENTARIA"=>"MAQUINARIA DE LA INDUSTRIA ALIMENTARIA",
    "MAQUINARIA DE MINERIA"=>"MAQUINARIA DE MINERIA",
    "MAQUINARIA HIDRAULICA"=>"MAQUINARIA HIDRAULICA",
    "MAQUINARIA INDUSTRIAL ESPECIALIZADA"=>"MAQUINARIA INDUSTRIAL ESPECIALIZADA",
    "MAQUINARIA NUCLEAR"=>"MAQUINARIA NUCLEAR",
    "MAQUINARIA TEXTIL"=>"MAQUINARIA TEXTIL",
    "MAQUINARIA Y EQUIPO INDUSTRIALES"=>"MAQUINARIA Y EQUIPO INDUSTRIALES",
    "MAQUINARIAS PARA MANEJO DE MATERIALES"=>"MAQUINARIAS PARA MANEJO DE MATERIALES",
    "MAQUINAS DE VAPOR"=>"MAQUINAS DE VAPOR",
    "MAQUINAS EXPENDEDORAS AUTOMATICAS Y DE ENTRENAMIENTO"=>"MAQUINAS EXPENDEDORAS AUTOMATICAS Y DE ENTRENAMIENTO",
    "MAQUINAS"=>"MAQUINAS",
    "MATRICES"=>"MATRICES",
    "MOTORES DE COMBUSTION INTERNA (EN GENERAL)"=>"MOTORES DE COMBUSTION INTERNA (EN GENERAL)",
    "MOTORES DE GAS"=>"MOTORES DE GAS",
    "OTROS"=>"OTROS",
    "PLANTILLAS Y MODELOS"=>"PLANTILLAS Y MODELOS",
    "PRODUCCION Y MANUFACTURA"=>"PRODUCCION Y MANUFACTURA",
    "TURBINAS"=>"TURBINAS",
    "VENTILADORES"=>"VENTILADORES",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE LA MEDICINA"){
    echo $form->dropDownList($model,'subdiscipline',array("DISPOSITIVOS DE PROTESIS"=>"DISPOSITIVOS DE PROTESIS",
    "ORGANOS ARTIFICIALES"=>"ORGANOS ARTIFICIALES",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE LA METALURGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("AFINADO"=>"AFINADO",
    "ALUMINIO"=>"ALUMINIO",
    "COBRE"=>"COBRE",
    "COLADA DE METALES NO FERROSOS"=>"COLADA DE METALES NO FERROSOS",
    "COLADA DE PRECISION"=>"COLADA DE PRECISION",
    "FABRICAS FUNDICIONES Y FORJAS SIDERURGICAS"=>"FABRICAS FUNDICIONES Y FORJAS SIDERURGICAS",
    "FUNDICION"=>"FUNDICION",
    "FUNDICIONES (EN GENERAL)"=>"FUNDICIONES (EN GENERAL)",
    "INCLUIDO EL REFINADO DE ZONA"=>"INCLUIDO EL REFINADO DE ZONA",
    "METALES PRECIOSOS"=>"METALES PRECIOSOS",
    "METALES RADIACTIVOS"=>"METALES RADIACTIVOS",
    "METALES RAROS"=>"METALES RAROS",
    "METALES REFRACTARIOS"=>"METALES REFRACTARIOS",
    "OTROS"=>"OTROS",
    "PLOMO Y ZINC"=>"PLOMO Y ZINC",
    "PRODUCTOS ELECTROMETALURGICOS"=>"PRODUCTOS ELECTROMETALURGICOS",
    "PRODUCTOS METALURGICOS (ESPECIALES)"=>"PRODUCTOS METALURGICOS (ESPECIALES)",
    "PULVIMETALURGIA"=>"PULVIMETALURGIA",
    "REFINAMIENTO Y ELABORACION DE METALES NO FERROSOS"=>"REFINAMIENTO Y ELABORACION DE METALES NO FERROSOS",
    "SERVICIOS METALURGICOS"=>"SERVICIOS METALURGICOS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE LOS PRODUCTOS METALICOS"){
    echo $form->dropDownList($model,'subdiscipline',array("ALTOS HORNOS"=>"ALTOS HORNOS",
    "ARTICULOS DE ALAMBRE"=>"ARTICULOS DE ALAMBRE",
    "ENVASES Y RECIPIENTES"=>"ENVASES Y RECIPIENTES",
    "EQUIPO DE DESTILACION"=>"EQUIPO DE DESTILACION",
    "ESTAMPADOS"=>"ESTAMPADOS",
    "ESTRUCTURAS FABRICADAS POR SOLDEO"=>"ESTRUCTURAS FABRICADAS POR SOLDEO",
    "FERRETERIA"=>"FERRETERIA",
    "GUARNICIONES Y VALVULAS"=>"GUARNICIONES Y VALVULAS",
    "HORNOS Y HORNOS CERAMICOS"=>"HORNOS Y HORNOS CERAMICOS",
    "OTROS"=>"OTROS",
    "PRODUCTOS DE CHAPA METALICA"=>"PRODUCTOS DE CHAPA METALICA",
    "PRODUCTOS ELECTROCHAPADOS Y RECUBIERTOS"=>"PRODUCTOS ELECTROCHAPADOS Y RECUBIERTOS",
    "RECIPIENTES DE PRESION"=>"RECIPIENTES DE PRESION",
    "SERVICIOS DE FABRICACION DE METALES"=>"SERVICIOS DE FABRICACION DE METALES",
    "TUBERIAS"=>"TUBERIAS",
    "AUTOCLAVES Y CALDERAS"=>"AUTOCLAVES Y CALDERAS",
    "PRODUCTOS DE ACERO PARA CONSTRUCCIONES"=>"PRODUCTOS DE ACERO PARA CONSTRUCCIONES",
    "PRODUCTOS ELABORADOS A MAQUINA Y TORNEADOS"=>"PRODUCTOS ELABORADOS A MAQUINA Y TORNEADOS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE LOS VEHICULOS DE MOTOR"){
    echo $form->dropDownList($model,'subdiscipline',array("AUTOBUSES"=>"AUTOBUSES",
    "AUTOMOVILES"=>"AUTOMOVILES",
    "CAMIONES Y REMOLQUES"=>"CAMIONES Y REMOLQUES",
    "MOTORES DE PISTON"=>"MOTORES DE PISTON",
    "MOTORES DIESEL"=>"MOTORES DIESEL",
    "MOTORES ROTATORIOS"=>"MOTORES ROTATORIOS",
    "OTROS"=>"OTROS",
    "PIEZAS DE REPUESTO Y ACCESORIOS"=>"PIEZAS DE REPUESTO Y ACCESORIOS",
    "REGULACION DEL TRAFICO"=>"REGULACION DEL TRAFICO",
    "SERVICIOS DE TRANSPORTE MOTORIZADO"=>"SERVICIOS DE TRANSPORTE MOTORIZADO",
    "MOTOCICLETAS"=>"MOTOCICLETAS",
    "VEHICULOS TODO TERRENO"=>"VEHICULOS TODO TERRENO",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE MINAS"){
    echo $form->dropDownList($model,'subdiscipline',array("AZUFRE"=>"AZUFRE",
    "CONCENTRACION DE MINERALES"=>"CONCENTRACION DE MINERALES",
    "MECANICA DE ROCAS"=>"MECANICA DE ROCAS",
    "MINERALES DE HIERRO"=>"MINERALES DE HIERRO",
    "MINERALES DE METALES NO FERROSOS"=>"MINERALES DE METALES NO FERROSOS",
    "MINERALES DE URANIO Y MINERALES RADIACTIVOS"=>"MINERALES DE URANIO Y MINERALES RADIACTIVOS",
    "MINERALES NO METALICOS"=>"MINERALES NO METALICOS",
    "OTROS"=>"OTROS",
    "PROSPECCION MINERA"=>"PROSPECCION MINERA",
    "SIMULACION DE YACIMIENTOS"=>"SIMULACION DE YACIMIENTOS",
    "TOPOGRAFIA DE MINAS"=>"TOPOGRAFIA DE MINAS",
    "MINERALOGIA"=>"MINERALOGIA",
    "MINERIA DEL CARBON"=>"MINERIA DEL CARBON",
    "PRODUCTOS DE CANTERAS"=>"PRODUCTOS DE CANTERAS",
    "SERVICIOS DE MINAS"=>"SERVICIOS DE MINAS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA NAVAL"){
    echo $form->dropDownList($model,'subdiscipline',array("BUQUES MERCANTES"=>"BUQUES MERCANTES",
    "BUQUES"=>"BUQUES",
    "CONSTRUCCION NAVAL"=>"CONSTRUCCION NAVAL",
    "EMBARCACIONES DE VIAS NAVEGABLES INTERIORES"=>"EMBARCACIONES DE VIAS NAVEGABLES INTERIORES",
    "HELICES"=>"HELICES",
    "INGENIERIA COSTERA"=>"INGENIERIA COSTERA",
    "LINEA DE EJES (BUQUES)"=>"LINEA DE EJES (BUQUES)",
    "MOTORES MARINOS"=>"MOTORES MARINOS",
    "OTROS"=>"OTROS",
    "SUBMARINOS"=>"SUBMARINOS",
    "TRANSPORTE MARITIMO"=>"TRANSPORTE MARITIMO",
    "TRANSPORTE OCEANICO"=>"TRANSPORTE OCEANICO",
    "ARQUITECTURA NAVAL"=>"ARQUITECTURA NAVAL",
    "DISPOSITIVOS DE SUSPENSION NEUMATICA"=>"DISPOSITIVOS DE SUSPENSION NEUMATICA",
    "MAQUINAS AUXILIARES (BUQUES)"=>"MAQUINAS AUXILIARES (BUQUES)",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA NUCLEAR"){
    echo $form->dropDownList($model,'subdiscipline',array("ENSAYOS NUCLEARES"=>"ENSAYOS NUCLEARES",
    "EXPLOSIONES NUCLEARES"=>"EXPLOSIONES NUCLEARES",
    "INGENIERIA QUIMICA NUCLEAR"=>"INGENIERIA QUIMICA NUCLEAR",
    "INSTRUMENTACION NUCLEAR"=>"INSTRUMENTACION NUCLEAR",
    "OTROS"=>"OTROS",
    "REACTORES DE FISION NUCLEAR"=>"REACTORES DE FISION NUCLEAR",
    "REACTORES DE FUSION NUCLEAR"=>"REACTORES DE FUSION NUCLEAR",
    "SEPARACION DE ISOTOPOS"=>"SEPARACION DE ISOTOPOS",
    "APLICACIONES DE LOS ISOTOPOS"=>"APLICACIONES DE LOS ISOTOPOS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DEL PETROLEO Y DEL CARBON"){
    echo $form->dropDownList($model,'subdiscipline',array("ACEITES Y GRASAS LUBRICANTES"=>"ACEITES Y GRASAS LUBRICANTES",
    "ALMACENAMIENTO DE PETROLEO Y GAS"=>"ALMACENAMIENTO DE PETROLEO Y GAS",
    "DISEÑO DE REFINERIAS"=>"DISEÑO DE REFINERIAS",
    "EQUIPO DE CAMPOS PETROLIFEROS"=>"EQUIPO DE CAMPOS PETROLIFEROS",
    "EXPLORACION"=>"EXPLORACION",
    "GAS LICUADO"=>"GAS LICUADO",
    "GAS NATURAL"=>"GAS NATURAL",
    "GASODUCTOS"=>"GASODUCTOS",
    "OLEODUCTOS"=>"OLEODUCTOS",
    "OTROS"=>"OTROS",
    "PETROLEO CRUDO"=>"PETROLEO CRUDO",
    "PRODUCTOS CARBOQUIMICOS"=>"PRODUCTOS CARBOQUIMICOS",
    "PRODUCTOS PETROQUIMICOS"=>"PRODUCTOS PETROQUIMICOS",
    "SERVICIOS DE LOS CAMPOS PETROLIFEROS"=>"SERVICIOS DE LOS CAMPOS PETROLIFEROS",
    "MATERIALES ASFALTICOS"=>"MATERIALES ASFALTICOS",
    "PRODUCTOS DEL PETROLEO: GASOLINA ACEITES CERAS"=>"PRODUCTOS DEL PETROLEO: GASOLINA ACEITES CERAS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE LA ENERGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("FUENTES DE ENERGIA NO CONVENCIONALES"=>"FUENTES DE ENERGIA NO CONVENCIONALES",
    "GENERACION DE ENERGIA"=>"GENERACION DE ENERGIA",
    "GENERADORES DE ENERGIA"=>"GENERADORES DE ENERGIA",
    "OTROS"=>"OTROS",
    "TRANSMISION DE ENERGIA"=>"TRANSMISION DE ENERGIA",
    "DISTRIBUCION DE LA ENERGIA"=>"DISTRIBUCION DE LA ENERGIA",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->subdiscipline == "TECNOLOGIA DE FERROCARRILES"){
    echo $form->dropDownList($model,'subdiscipline',array("EQUIPO DE FERROCARRILES"=>"EQUIPO DE FERROCARRILES",
    "MATERIAL RODANTE (FERROCARRILES)"=>"MATERIAL RODANTE (FERROCARRILES)",
    "OTROS"=>"OTROS",
    "SERVICIOS DE FERROCARRIL"=>"SERVICIOS DE FERROCARRIL",
    "LOCOMOTORAS"=>"LOCOMOTORAS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DEL ESPACIO"){
    echo $form->dropDownList($model,'subdiscipline',array("CONTROL DE VEHICULOS"=>"CONTROL DE VEHICULOS",
    "INSTALACIONES DE MISILES"=>"INSTALACIONES DE MISILES",
    "MISILES: LANZAMIENTO Y RECUPERACION"=>"MISILES: LANZAMIENTO Y RECUPERACION",
    "NAVES ESPACIALES"=>"NAVES ESPACIALES",
    "OTROS"=>"OTROS",
    "SEGUIMIENTO DE NAVES ESPACIALES"=>"SEGUIMIENTO DE NAVES ESPACIALES",
    "MOTORES COHETE"=>"MOTORES COHETE",
    "SATELITES ARTIFICIALES"=>"SATELITES ARTIFICIALES",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE LAS TELECOMUNICACIONES"){
    echo $form->dropDownList($model,'subdiscipline',array("CINEMATOGRAFIA"=>"CINEMATOGRAFIA",
    "COMUNICACIONES MEDIANTE SATELITE"=>"COMUNICACIONES MEDIANTE SATELITE",
    "ENLACES DE MICROONDAS"=>"ENLACES DE MICROONDAS",
    "OTROS"=>"OTROS",
    "RADIOCOMUNICACIONES"=>"RADIOCOMUNICACIONES",
    "RADIODIFUSION SONORA Y TELEVISIVA"=>"RADIODIFUSION SONORA Y TELEVISIVA",
    "TELEFONO"=>"TELEFONO",
    "TELEGRAFO"=>"TELEGRAFO",
    "TELEVISION POR CABLE"=>"TELEVISION POR CABLE",
    "TELEVISION"=>"TELEVISION",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA TEXTIL"){
    echo $form->dropDownList($model,'subdiscipline',array("ACABADOS"=>"ACABADOS",
    "ALGODON"=>"ALGODON",
    "HILADO"=>"HILADO",
    "LANA"=>"LANA",
    "LINO"=>"LINO",
    "OTROS"=>"OTROS",
    "PREPARACION PARA EL TEJIDO"=>"PREPARACION PARA EL TEJIDO",
    "TEJIDO DE PUNTO"=>"TEJIDO DE PUNTO",
    "TEJIDO"=>"TEJIDO",
    "TEXTILES SINTETICOS"=>"TEXTILES SINTETICOS",
    "YUTE"=>"YUTE",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE LOS SISTEMAS DE TRANSPORTE"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS DEL TRAFICO"=>"ANALISIS DEL TRAFICO",
    "COMBINACIONES DE SISTEMAS"=>"COMBINACIONES DE SISTEMAS",
    "OPERACIONES DE LINEAS AEREAS CONTROL DEL TRAFICO AEREO"=>"OPERACIONES DE LINEAS AEREAS CONTROL DEL TRAFICO AEREO",
    "OTROS"=>"OTROS",
    "SISTEMAS DE TRAFICO URBANO"=>"SISTEMAS DE TRAFICO URBANO",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ANALISIS DE LAS OPERACIONES TECNOLOGICAS"){
    echo $form->dropDownList($model,'subdiscipline',array("ABSORCION"=>"ABSORCION",
    "AGITACION"=>"AGITACION",
    "BOMBEO"=>"BOMBEO",
    "CENTRIFUGACION"=>"CENTRIFUGACION",
    "COMPRESION"=>"COMPRESION",
    "CRIBADO"=>"CRIBADO",
    "CRISTALIZACION"=>"CRISTALIZACION",
    "DESIONIZACION"=>"DESIONIZACION",
    "DESTILACION Y CONDENSACION"=>"DESTILACION Y CONDENSACION",
    "EVAPORACION"=>"EVAPORACION",
    "EXTRACCION LIQUIDO?LIQUIDO"=>"EXTRACCION LIQUIDO?LIQUIDO",
    "EXTRACCION SOLIDO-LIQUIDO"=>"EXTRACCION SOLIDO-LIQUIDO",
    "FILTRACION"=>"FILTRACION",
    "FLOTACION"=>"FLOTACION",
    "FLUIDIZACION DE LOS SOLIDOS"=>"FLUIDIZACION DE LOS SOLIDOS",
    "FLUJO A TRAVES DE MEDIOS POROSOS"=>"FLUJO A TRAVES DE MEDIOS POROSOS",
    "MANEJO DE LOS SOLIDOS"=>"MANEJO DE LOS SOLIDOS",
    "MEZCLADO"=>"MEZCLADO",
    "OTROS"=>"OTROS",
    "REFRIGERACION"=>"REFRIGERACION",
    "SECADO POR CONGELACION"=>"SECADO POR CONGELACION",
    "SECADO"=>"SECADO",
    "SEDIMENTACION"=>"SEDIMENTACION",
    "TRANSFERENCIA DE CALOR"=>"TRANSFERENCIA DE CALOR",
    "TRANSFERENCIA DE MASA"=>"TRANSFERENCIA DE MASA",
    "TRANSFERENCIA VAPOR-LIQUIDO)"=>"TRANSFERENCIA VAPOR-LIQUIDO)",
    "TRITURACION"=>"TRITURACION",
    "TUBERIAS GUARNICIONES Y VALVULAS"=>"TUBERIAS GUARNICIONES Y VALVULAS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DEL URBANISMO"){
    echo $form->dropDownList($model,'subdiscipline',array("COMUNICACIONES"=>"COMUNICACIONES",
    "DESARROLLO REGIONAL"=>"DESARROLLO REGIONAL",
    "MEDIO AMBIENTE URBANO"=>"MEDIO AMBIENTE URBANO",
    "ORGANIZACION COMUNITARIA"=>"ORGANIZACION COMUNITARIA",
    "OTROS"=>"OTROS",
    "REGLAMENTO PARA LA CONSTRUCCION DE EDIFICIOS"=>"REGLAMENTO PARA LA CONSTRUCCION DE EDIFICIOS",
    "RELACIONES URBANO-RURALES"=>"RELACIONES URBANO-RURALES",
    "SERVICIOS SANITARIOS"=>"SERVICIOS SANITARIOS",
    "TRANSPORTE"=>"TRANSPORTE",
    "USO DE LAS TIERRAS"=>"USO DE LAS TIERRAS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "GESTION DE LA CALIDAD"){
    echo $form->dropDownList($model,'subdiscipline',array("COMPARACION REFERENCIAL (BENCHMARKING)"=>"COMPARACION REFERENCIAL (BENCHMARKING)",
    "COMUNICACION"=>"COMUNICACION",
    "CONTROL DE CALIDAD"=>"CONTROL DE CALIDAD",
    "CONTROL ESTADISTICO DE LA CALIDAD"=>"CONTROL ESTADISTICO DE LA CALIDAD",
    "CONTROL ESTADISTICO DE PROCESOS"=>"CONTROL ESTADISTICO DE PROCESOS",
    "COSTOS DE CALIDAD"=>"COSTOS DE CALIDAD",
    "DISEÑO DE PROCESOS"=>"DISEÑO DE PROCESOS",
    "DOCUMENTACION DE NORMALIZACION Y CERTIFICACION"=>"DOCUMENTACION DE NORMALIZACION Y CERTIFICACION",
    "INSPECCION"=>"INSPECCION",
    "MEJORA E INNOVACION DE PROCESOS"=>"MEJORA E INNOVACION DE PROCESOS",
    "OTROS"=>"OTROS",
    "PROCESOS PRODUCTIVOS"=>"PROCESOS PRODUCTIVOS",
    "PRODUCTOS DISEÑO Y MEJORA DE"=>"PRODUCTOS DISEÑO Y MEJORA DE",
    "PROTECCION DEL ASEGURAMIENTO DE LA CALIDAD"=>"PROTECCION DEL ASEGURAMIENTO DE LA CALIDAD",
    "REINGENIERIA"=>"REINGENIERIA",
    "SISTEMAS DE CONOCIMIENTO"=>"SISTEMAS DE CONOCIMIENTO"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "CIENCIAS DE LA COMPUTACION"){
    echo $form->dropDownList($model,'subdiscipline',array("APLICACIONES DE LA INFORMATICA"=>"APLICACIONES DE LA INFORMATICA",
    "ARQUITECTURA DE PROCESADORES"=>"ARQUITECTURA DE PROCESADORES",
    "CIRCUITOS INTEGRADOS"=>"CIRCUITOS INTEGRADOS",
    "DESEMPEÑO Y FIABILIDAD"=>"DESEMPEÑO Y FIABILIDAD",
    "DISEÑO LOGICO"=>"DISEÑO LOGICO",
    "DISPOSITIVOS DE ENTRADA / SALIDA Y COMUNICACIONES"=>"DISPOSITIVOS DE ENTRADA / SALIDA Y COMUNICACIONES",
    "ESTRUCTURAS DE CONTROL Y MICROPROGRAMACION"=>"ESTRUCTURAS DE CONTROL Y MICROPROGRAMACION",
    "ESTRUCTURAS DE MEMORIA"=>"ESTRUCTURAS DE MEMORIA",
    "ESTRUCTURAS LOGICAS Y ARITMETICAS"=>"ESTRUCTURAS LOGICAS Y ARITMETICAS",
    "IMPLEMENTACION DEL NIVEL DE REGISTRO-TRANSFERENCIA"=>"IMPLEMENTACION DEL NIVEL DE REGISTRO-TRANSFERENCIA",
    "ORGANIZACION DE SISTEMAS DE COMPUTO"=>"ORGANIZACION DE SISTEMAS DE COMPUTO",
    "OTROS"=>"OTROS",
    "PROCESAMIENTO DE IMAGENES Y VISION INFORMATICA"=>"PROCESAMIENTO DE IMAGENES Y VISION INFORMATICA",
    "RECONOCIMIENTO DE PATRONES"=>"RECONOCIMIENTO DE PATRONES",
    "REDES DE COMUNICACIONES INFORMATICAS"=>"REDES DE COMUNICACIONES INFORMATICAS",
    "SISTEMAS BASADOS EN LA APLICACION Y EN PROPOSITO"=>"SISTEMAS BASADOS EN LA APLICACION Y EN PROPOSITO",
    "SOFTWARE"=>"SOFTWARE"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE BIOPROCESOS"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOPROCESOS"=>"BIOPROCESOS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TECNOLOGIA DE BIOMOLECULAS"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOMOLECULAS"=>"BIOMOLECULAS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE TECNOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ANTROPOLOGIA CULTURAL"){
    echo $form->dropDownList($model,'subdiscipline',array("ADORNO"=>"ADORNO",
    "DANZAS"=>"DANZAS",
    "ETNOLINGÜISTICA"=>"ETNOLINGÜISTICA",
    "ETNOMUSICOLOGIA"=>"ETNOMUSICOLOGIA",
    "FIESTAS"=>"FIESTAS",
    "HECHICERIA"=>"HECHICERIA",
    "MAGIA"=>"MAGIA",
    "MEDICINA TRADICIONAL"=>"MEDICINA TRADICIONAL",
    "MITOS"=>"MITOS",
    "MUSEOLOGIA"=>"MUSEOLOGIA",
    "OTROS"=>"OTROS",
    "POEMAS"=>"POEMAS",
    "RELATOS"=>"RELATOS",
    "RELIGION"=>"RELIGION",
    "SIMBOLISMO"=>"SIMBOLISMO",
    "TRADICION"=>"TRADICION",
    "VESTIMENTA"=>"VESTIMENTA"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ETNOGRAFIA Y ETNOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("AGRICULTURA"=>"AGRICULTURA",
    "ARMAS"=>"ARMAS",
    "ARTESANIA"=>"ARTESANIA",
    "CAZA"=>"CAZA",
    "CRIA DE GANADO"=>"CRIA DE GANADO",
    "FORRAJE"=>"FORRAJE",
    "HABITAT"=>"HABITAT",
    "INTERCAMBIO"=>"INTERCAMBIO",
    "METALURGIA"=>"METALURGIA",
    "OTROS"=>"OTROS",
    "PESCA"=>"PESCA",
    "TRUEQUE"=>"TRUEQUE"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ANTROPOLOGIA SOCIAL"){
    echo $form->dropDownList($model,'subdiscipline',array("DESCENDENCIA"=>"DESCENDENCIA",
    "ESCLAVITUD"=>"ESCLAVITUD",
    "FAMILIA"=>"FAMILIA",
    "GUERRA"=>"GUERRA",
    "JEFATURA"=>"JEFATURA",
    "LINAJE"=>"LINAJE",
    "NOMADISMO"=>"NOMADISMO",
    "OTROS"=>"OTROS",
    "REALEZA"=>"REALEZA",
    "SERVIDUMBRE"=>"SERVIDUMBRE",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "FECUNDIDAD"){
    echo $form->dropDownList($model,'subdiscipline',array("ESTERILIDAD Y FECUNDIDAD"=>"ESTERILIDAD Y FECUNDIDAD",
    "FECUNDIDAD GENERAL"=>"FECUNDIDAD GENERAL",
    "ILEGITIMIDAD"=>"ILEGITIMIDAD",
    "NUPCIALIDAD"=>"NUPCIALIDAD",
    "OTROS"=>"OTROS",
    "TASA DE NATALIDAD"=>"TASA DE NATALIDAD"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "DEMOGRAFIA GENERAL"){
    echo $form->dropDownList($model,'subdiscipline',array("METODOLOGIA DE ANALISIS"=>"METODOLOGIA DE ANALISIS",
    "METODOLOGIA DE LA INVESTIGACION"=>"METODOLOGIA DE LA INVESTIGACION",
    "OTROS"=>"OTROS",
    "TEORIA"=>"TEORIA",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "DEMOGRAFIA GEOGRAFICA"){
    echo $form->dropDownList($model,'subdiscipline',array("DEMOGRAFIA LOCAL"=>"DEMOGRAFIA LOCAL",
    "DEMOGRAFIA REGIONAL"=>"DEMOGRAFIA REGIONAL",
    "DEMOGRAFIA RURAL"=>"DEMOGRAFIA RURAL",
    "DEMOGRAFIA URBANA"=>"DEMOGRAFIA URBANA",
    "MOVILIDAD Y MIGRACIONES INTERNACIONALES"=>"MOVILIDAD Y MIGRACIONES INTERNACIONALES",
    "MOVILIDAD Y MIGRACIONES INTERNAS"=>"MOVILIDAD Y MIGRACIONES INTERNAS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "DEMOGRAFIA HISTORICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ASPECTOS METODOLOGICOS"=>"ASPECTOS METODOLOGICOS",
    "ASPECTOS TEORICOS"=>"ASPECTOS TEORICOS",
    "FUENTES DE OBSERVACION"=>"FUENTES DE OBSERVACION",
    "MIGRACIONES"=>"MIGRACIONES",
    "MORTALIDAD"=>"MORTALIDAD",
    "OTROS"=>"OTROS",
    "TASA DE FECUNDIDAD Y NUPCIALIDAD"=>"TASA DE FECUNDIDAD Y NUPCIALIDAD"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "MORTALIDAD"){
    echo $form->dropDownList($model,'subdiscipline',array("CAUSAS DE MORTALIDAD"=>"CAUSAS DE MORTALIDAD",
    "MORTALIDAD GENERAL"=>"MORTALIDAD GENERAL",
    "MORTALIDAD INFANTIL"=>"MORTALIDAD INFANTIL",
    "MORTALIDAD PRENATAL Y PERINATAL"=>"MORTALIDAD PRENATAL Y PERINATAL",
    "OTROS"=>"OTROS",
    "VARIABLES RELACIONADAS"=>"VARIABLES RELACIONADAS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "CARACTERISTICAS DE LAS POBLACIONES"){
    echo $form->dropDownList($model,'subdiscipline',array("CARACTERISTICAS BIOLOGICAS"=>"CARACTERISTICAS BIOLOGICAS",
    "CARACTERISTICAS EPIDEMIOLOGICAS"=>"CARACTERISTICAS EPIDEMIOLOGICAS",
    "CARACTERISTICAS SOCIOECONOMICAS"=>"CARACTERISTICAS SOCIOECONOMICAS",
    "DISTRIBUCION POR EDADES"=>"DISTRIBUCION POR EDADES",
    "ENVEJECIMIENTO DE LA POBLACION"=>"ENVEJECIMIENTO DE LA POBLACION",
    "ESTRUCTURAS DEMOGRAFICAS GENERALES"=>"ESTRUCTURAS DEMOGRAFICAS GENERALES",
    "GENETICA DE POBLACIONES"=>"GENETICA DE POBLACIONES",
    "MORBILIDAD"=>"MORBILIDAD",
    "POBLACION ACTIVA"=>"POBLACION ACTIVA",
    "SEXO"=>"SEXO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "EVOLUCION DEMOGRAFICA"){
    echo $form->dropDownList($model,'subdiscipline',array("CENSOS DEMOGRAFICOS Y OTROS TIPOS DE ACOPIO DE DATOS"=>"CENSOS DEMOGRAFICOS Y OTROS TIPOS DE ACOPIO DE DATOS",
    "DEMOGRAFIA COMPUTACIONAL"=>"DEMOGRAFIA COMPUTACIONAL",
    "DEMOGRAFIA DE OBSERVACION"=>"DEMOGRAFIA DE OBSERVACION",
    "ESTIMACIONES DEMOGRAFICAS"=>"ESTIMACIONES DEMOGRAFICAS",
    "TRANSICION DEMOGRAFICA"=>"TRANSICION DEMOGRAFICA",
    "PREVISIONES DEMOGRAFICAS"=>"PREVISIONES DEMOGRAFICAS",
    "CRECIMIENTO DE LA POBLACION"=>"CRECIMIENTO DE LA POBLACION",
    "MODELOS DEMOGRAFICOS"=>"MODELOS DEMOGRAFICOS",
    "PROYECCIONES DEMOGRAFICAS"=>"PROYECCIONES DEMOGRAFICAS",
    "ESTADISTICA DEMOGRAFICA"=>"ESTADISTICA DEMOGRAFICA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "POLITICA FISCAL Y HACIENDA PUBLICA"){
    echo $form->dropDownList($model,'subdiscipline',array("POLITICA FISCAL Y DEUDA PUBLICA"=>"POLITICA FISCAL Y DEUDA PUBLICA",
    "HACIENDA PUBLICA (PRESUPUESTO)"=>"HACIENDA PUBLICA (PRESUPUESTO)",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "ECONOMETRIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ESTADISTICA ECONOMICA"=>"ESTADISTICA ECONOMICA",
    "INDICADORES ECONOMICOS"=>"INDICADORES ECONOMICOS",
    "MODELOS ECONOMETRICOS"=>"MODELOS ECONOMETRICOS",
    "PROYECCION ECONOMICA"=>"PROYECCION ECONOMICA",
    "SERIES DE TIEMPO ECONOMICAS"=>"SERIES DE TIEMPO ECONOMICAS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "CONTABILIDAD PUBLICA"){
    echo $form->dropDownList($model,'subdiscipline',array("CUENTAS FINANCIERAS"=>"CUENTAS FINANCIERAS",
    "RIQUEZA NACIONAL Y BALANZA DE PAGOS"=>"RIQUEZA NACIONAL Y BALANZA DE PAGOS",
    "CONTABILIDAD DE LA RENTA NACIONAL"=>"CONTABILIDAD DE LA RENTA NACIONAL",
    "ENTRADA-SALIDA"=>"ENTRADA-SALIDA",
    "CUENTAS SOCIALES"=>"CUENTAS SOCIALES",
    "AUDITORIA"=>"AUDITORIA",
    "CONTABILIDAD ADMINISTRATIVA"=>"CONTABILIDAD ADMINISTRATIVA",
    "CONTABILIDAD FISCAL"=>"CONTABILIDAD FISCAL",
    "OTRAS"=>"OTRAS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "ACTIVIDADES ECONOMICAS"){
    echo $form->dropDownList($model,'subdiscipline',array("DINERO Y BANCA"=>"DINERO Y BANCA",
    "AHORRO"=>"AHORRO",
    "COMERCIO EXTERIOR"=>"COMERCIO EXTERIOR",
    "COMERCIO INTERIOR"=>"COMERCIO INTERIOR",
    "CONSUMO"=>"CONSUMO",
    "DISTRIBUCION"=>"DISTRIBUCION",
    "INVERSION"=>"INVERSION",
    "PRODUCCION"=>"PRODUCCION",
    "REDISTRIBUCION"=>"REDISTRIBUCION",
    "SEGUROS"=>"SEGUROS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "SISTEMAS ECONOMICOS"){
    echo $form->dropDownList($model,'subdiscipline',array("SISTEMAS DE ECONOMIA CAPITALISTA"=>"SISTEMAS DE ECONOMIA CAPITALISTA",
    "SISTEMAS DE ECONOMIA COLECTIVISTA"=>"SISTEMAS DE ECONOMIA COLECTIVISTA",
    "SISTEMAS DE ECONOMIA COMPARADA"=>"SISTEMAS DE ECONOMIA COMPARADA",
    "SISTEMAS DE ECONOMIA SOCIALISTA"=>"SISTEMAS DE ECONOMIA SOCIALISTA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "CAMBIO ECONOMICO O TECNOLOGICO"){
    echo $form->dropDownList($model,'subdiscipline',array("ECONOMIA DE LA INVESTIGACION Y EL DESARROLLO EXPERIMENTAL"=>"ECONOMIA DE LA INVESTIGACION Y EL DESARROLLO EXPERIMENTAL",
    "INNOVACION TECNOLOGICA"=>"INNOVACION TECNOLOGICA",
    "TRANSFERENCIA DE TECNOLOGIA"=>"TRANSFERENCIA DE TECNOLOGIA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "TEORIA ECONOMICA"){
    echo $form->dropDownList($model,'subdiscipline',array("FORMACION DE CAPITAL"=>"FORMACION DE CAPITAL",
    "TEORIAS DEL CREDITO"=>"TEORIAS DEL CREDITO",
    "MODELOS Y TEORIAS DE DESARROLLO ECONOMICO"=>"MODELOS Y TEORIAS DE DESARROLLO ECONOMICO",
    "ESTUDIOS DE DESARROLLO ECONOMICO"=>"ESTUDIOS DE DESARROLLO ECONOMICO",
    "EQUILIBRIO ECONOMICO"=>"EQUILIBRIO ECONOMICO",
    "FLUCTUACIONES ECONOMICAS"=>"FLUCTUACIONES ECONOMICAS",
    "PREVISIONES ECONOMICAS"=>"PREVISIONES ECONOMICAS",
    "TEORIA DEL CRECIMIENTO ECONOMICO"=>"TEORIA DEL CRECIMIENTO ECONOMICO",
    "TEORIA DE LA PLANIFICACION ECONOMICA"=>"TEORIA DE LA PLANIFICACION ECONOMICA",
    "TEORIA DEL EMPLEO Y MODELOS DE EMPLEO"=>"TEORIA DEL EMPLEO Y MODELOS DE EMPLEO",
    "TEORIA FISCAL"=>"TEORIA FISCAL",
    "TEORIA DEL COMERCIO INTERNACIONAL"=>"TEORIA DEL COMERCIO INTERNACIONAL",
    "TEORIA DE LA INVERSION"=>"TEORIA DE LA INVERSION",
    "TEORIA MACROECONOMICA"=>"TEORIA MACROECONOMICA",
    "TEORIA MICROECONOMICA"=>"TEORIA MICROECONOMICA",
    "TEORIA MONETARIA"=>"TEORIA MONETARIA",
    "TEORIA DEL AHORRO"=>"TEORIA DEL AHORRO",
    "TEORIAS DE LA ESTABILIZACION"=>"TEORIAS DE LA ESTABILIZACION",
    "TEORIA DEL BIENESTAR"=>"TEORIA DEL BIENESTAR",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "ECONOMIA GENERAL"){
    echo $form->dropDownList($model,'subdiscipline',array("COMPORTAMIENTO DEL CONSUMIDOR"=>"COMPORTAMIENTO DEL CONSUMIDOR",
    "HISTORIA DEL PENSAMIENTO ECONOMICO"=>"HISTORIA DEL PENSAMIENTO ECONOMICO",
    "METODOLOGIA ECONOMICA"=>"METODOLOGIA ECONOMICA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "ORGANIZACION DE LA INDUSTRIA Y POLITICA ECONOMICA PUBLICA"){
    echo $form->dropDownList($model,'subdiscipline',array("CONCENTRACION ECONOMICA"=>"CONCENTRACION ECONOMICA",
    "EMPRESAS PUBLICAS"=>"EMPRESAS PUBLICAS",
    "ESTRUCTURA DEL MERCADO"=>"ESTRUCTURA DEL MERCADO",
    "INTEGRACION ECONOMICA"=>"INTEGRACION ECONOMICA",
    "MONOPOLIO Y COMPETENCIA"=>"MONOPOLIO Y COMPETENCIA",
    "REGLAMENTACION GUBERNAMENTAL DEL SECTOR PRIVADO"=>"REGLAMENTACION GUBERNAMENTAL DEL SECTOR PRIVADO",
    "SERVICIOS PUBLICOS"=>"SERVICIOS PUBLICOS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "ECONOMIA INTERNACIONAL"){
    echo $form->dropDownList($model,'subdiscipline',array("POLITICA ECONOMICA INTERNACIONAL"=>"POLITICA ECONOMICA INTERNACIONAL",
    "ACUERDOS MONETARIOS INTERNACIONALES"=>"ACUERDOS MONETARIOS INTERNACIONALES",
    "ASUNTOS INTERNACIONALES"=>"ASUNTOS INTERNACIONALES",
    "AYUDA EXTERIOR"=>"AYUDA EXTERIOR",
    "AYUDA INTERNACIONAL"=>"AYUDA INTERNACIONAL",
    "BALANZA DE PAGOS"=>"BALANZA DE PAGOS",
    "FINANZAS INTERNACIONALES"=>"FINANZAS INTERNACIONALES",
    "INVERSIONES INTERNACIONALES"=>"INVERSIONES INTERNACIONALES",
    "RELACIONES COMERCIALES INTERNACIONALES"=>"RELACIONES COMERCIALES INTERNACIONALES",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "ORGANIZACION Y DIRECCION DE EMPRESAS"){
    echo $form->dropDownList($model,'subdiscipline',array("COSTOS"=>"COSTOS",
    "ESTUDIOS DE MERCADO"=>"ESTUDIOS DE MERCADO",
    "ESTUDIOS INDUSTRIALES"=>"ESTUDIOS INDUSTRIALES",
    "GESTION DE MANO DE OBRA"=>"GESTION DE MANO DE OBRA",
    "GESTION DE MERCADOS"=>"GESTION DE MERCADOS",
    "GESTION FINANCIERA"=>"GESTION FINANCIERA",
    "INVESTIGACION OPERATIVA"=>"INVESTIGACION OPERATIVA",
    "MERCADEO"=>"MERCADEO",
    "NEGOCIO"=>"NEGOCIO",
    "NIVELES OPTIMOS DE PRODUCCION"=>"NIVELES OPTIMOS DE PRODUCCION",
    "ORGANIZACION DE LA PRODUCCION"=>"ORGANIZACION DE LA PRODUCCION",
    "PLANEACION ESTRATEGICA"=>"PLANEACION ESTRATEGICA",
    "PUBLICIDAD"=>"PUBLICIDAD",
    "RESULTADOS Y FACTORES CRITICOS DEL"=>"RESULTADOS Y FACTORES CRITICOS DEL",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "ECONOMIA SECTORIAL"){
    echo $form->dropDownList($model,'subdiscipline',array("LA INDUSTRIA DE LA COMPUTACION"=>"LA INDUSTRIA DE LA COMPUTACION",
    "AGRICULTURA"=>"AGRICULTURA",
    "COMERCIO"=>"COMERCIO",
    "CONSTRUCCION"=>"CONSTRUCCION",
    "EDUCACION"=>"EDUCACION",
    "ENERGIA"=>"ENERGIA",
    "HACIENDA Y SEGUROS"=>"HACIENDA Y SEGUROS",
    "INVESTIGACION Y DESARROLLO"=>"INVESTIGACION Y DESARROLLO",
    "MINERIA"=>"MINERIA",
    "PESCA"=>"PESCA",
    "SALUD"=>"SALUD",
    "SERVICIOS COMUNITARIOS"=>"SERVICIOS COMUNITARIOS",
    "SILVICULTURA"=>"SILVICULTURA",
    "SOCIALES Y PERSONALES"=>"SOCIALES Y PERSONALES",
    "TECNICAS DE PRODUCCION"=>"TECNICAS DE PRODUCCION",
    "TRANSPORTE Y COMUNICACIONES"=>"TRANSPORTE Y COMUNICACIONES",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
      if($model->discipline == "GEOGRAFIA ECONOMICA"){
    echo $form->dropDownList($model,'subdiscipline',array("DESARROLLO REGIONAL"=>"DESARROLLO REGIONAL",
    "DISTRIBUCION DE LOS RECURSOS NATURALES"=>"DISTRIBUCION DE LOS RECURSOS NATURALES",
    "GEOGRAFIA DE LAS ACTIVIDADES ECONOMICAS"=>"GEOGRAFIA DE LAS ACTIVIDADES ECONOMICAS",
    "USO DE LAS TIERRAS"=>"USO DE LAS TIERRAS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "GEOGRAFIA HUMANA"){
    echo $form->dropDownList($model,'subdiscipline',array("DEMOGEOGRAFIA"=>"DEMOGEOGRAFIA",
    "GEOGRAFIA CULTURAL"=>"GEOGRAFIA CULTURAL",
    "GEOGRAFIA DE LA RELIGION"=>"GEOGRAFIA DE LA RELIGION",
    "GEOGRAFIA LINGÜISTICA"=>"GEOGRAFIA LINGÜISTICA",
    "GEOGRAFIA POLITICA"=>"GEOGRAFIA POLITICA",
    "GEOGRAFIA SOCIAL"=>"GEOGRAFIA SOCIAL",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "HISTORIA GENERAL"){
    echo $form->dropDownList($model,'subdiscipline',array("HISTORIOGRAFIA"=>"HISTORIOGRAFIA",
    "MONOGRAFIAS HISTORICAS"=>"MONOGRAFIAS HISTORICAS",
    "TEORIA Y METODOS"=>"TEORIA Y METODOS",
    "HISTORIA COMPARADA"=>"HISTORIA COMPARADA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "HISTORIA DE LOS PAISES"){
    echo $form->dropDownList($model,'subdiscipline',array("HISTORIA LOCAL"=>"HISTORIA LOCAL",
    "HISTORIA REGIONAL"=>"HISTORIA REGIONAL",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "HISTORIA DE LAS EPOCAS"){
    echo $form->dropDownList($model,'subdiscipline',array("PREHISTORIA"=>"PREHISTORIA",
    "HISTORIA ANTIGUA"=>"HISTORIA ANTIGUA",
    "HISTORIA CONTEMPORANEA"=>"HISTORIA CONTEMPORANEA",
    "HISTORIA DE LA EDAD MEDIA"=>"HISTORIA DE LA EDAD MEDIA",
    "HISTORIA MODERNA"=>"HISTORIA MODERNA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "CIENCIAS AUXILIARES DE LA HISTORIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ARCHIVISTICA"=>"ARCHIVISTICA",
    "ARCHIVOS ECONOMICOS"=>"ARCHIVOS ECONOMICOS",
    "ARQUEOLOGIA"=>"ARQUEOLOGIA",
    "CERAMOLOGIA"=>"CERAMOLOGIA",
    "EPIGRAFIA"=>"EPIGRAFIA",
    "ESTRATIGRAFIA"=>"ESTRATIGRAFIA",
    "FILOLOGIA"=>"FILOLOGIA",
    "HERALDICA"=>"HERALDICA",
    "ICONOGRAFIA"=>"ICONOGRAFIA",
    "NUMISMATICA"=>"NUMISMATICA",
    "ONOMASTICA"=>"ONOMASTICA",
    "PALEOGRAFIA"=>"PALEOGRAFIA",
    "PAPIROLOGIA"=>"PAPIROLOGIA",
    "SIGILOGRAFIA"=>"SIGILOGRAFIA",
    "TEORIA DE DOCUMENTOS"=>"TEORIA DE DOCUMENTOS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "HISTORIA ESPECIALIZADA"){
    echo $form->dropDownList($model,'subdiscipline',array("HISTORIA DE LA ASTRONOMIA"=>"HISTORIA DE LA ASTRONOMIA",
    "HISTORIA DE LA BIOLOGIA"=>"HISTORIA DE LA BIOLOGIA",
    "HISTORIA DE LA CIENCIA"=>"HISTORIA DE LA CIENCIA",
    "HISTORIA DE LA CULTURA"=>"HISTORIA DE LA CULTURA",
    "HISTORIA DE LA ECONOMIA"=>"HISTORIA DE LA ECONOMIA",
    "HISTORIA DE LA EDUCACION"=>"HISTORIA DE LA EDUCACION",
    "HISTORIA DE LA FILOSOFIA"=>"HISTORIA DE LA FILOSOFIA",
    "HISTORIA DE LA FISICA"=>"HISTORIA DE LA FISICA",
    "HISTORIA DE LA GEOGRAFIA"=>"HISTORIA DE LA GEOGRAFIA",
    "HISTORIA DE LA GEOLOGIA"=>"HISTORIA DE LA GEOLOGIA",
    "HISTORIA DE LA GUERRA"=>"HISTORIA DE LA GUERRA",
    "HISTORIA DE LA LINGÜISTICA"=>"HISTORIA DE LA LINGÜISTICA",
    "HISTORIA DE LA LITERATURA"=>"HISTORIA DE LA LITERATURA",
    "HISTORIA DE LA LOGICA"=>"HISTORIA DE LA LOGICA",
    "HISTORIA DE LA MAGISTRATURA"=>"HISTORIA DE LA MAGISTRATURA",
    "HISTORIA DE LA MEDICINA"=>"HISTORIA DE LA MEDICINA",
    "HISTORIA DE LA QUIMICA"=>"HISTORIA DE LA QUIMICA",
    "HISTORIA DE LA SOCIOLOGIA"=>"HISTORIA DE LA SOCIOLOGIA",
    "HISTORIA DE LA TECNOLOGIA"=>"HISTORIA DE LA TECNOLOGIA",
    "HISTORIA DE LAS IDEAS POLITICAS"=>"HISTORIA DE LAS IDEAS POLITICAS",
    "HISTORIA DE LAS INSTITUCIONES"=>"HISTORIA DE LAS INSTITUCIONES",
    "HISTORIA DE LAS MENTALIDADES"=>"HISTORIA DE LAS MENTALIDADES",
    "HISTORIA DE LAS RELACIONES INTERNACIONALES"=>"HISTORIA DE LAS RELACIONES INTERNACIONALES",
    "HISTORIA DE LAS RELIGIONES"=>"HISTORIA DE LAS RELIGIONES",
    "HISTORIA DEL ARTE"=>"HISTORIA DEL ARTE",
    "HISTORIA DEL DERECHO Y DE LAS INSTITUCIONES JURIDICAS"=>"HISTORIA DEL DERECHO Y DE LAS INSTITUCIONES JURIDICAS",
    "HISTORIA DEL PERIODISMO"=>"HISTORIA DEL PERIODISMO",
    "HISTORIA SOCIAL"=>"HISTORIA SOCIAL",
    "HISTORIA DE LA ARQUITECTURA"=>"HISTORIA DE LA ARQUITECTURA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TEORIAS Y METODOS JURIDICOS GENERALES"){
    echo $form->dropDownList($model,'subdiscipline',array("DERECHO COMPARADO"=>"DERECHO COMPARADO",
    "DERECHO CONSUETUDINARIO"=>"DERECHO CONSUETUDINARIO",
    "DERECHO DE LA ANTIGÜEDAD"=>"DERECHO DE LA ANTIGÜEDAD",
    "DERECHO NATURAL"=>"DERECHO NATURAL",
    "JURISPRUDENCIA"=>"JURISPRUDENCIA",
    "LEGISLACION PROMULGADA"=>"LEGISLACION PROMULGADA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "DERECHO INTERNACIONAL"){
    echo $form->dropDownList($model,'subdiscipline',array("DERECHO AERONAUTICO"=>"DERECHO AERONAUTICO",
    "DERECHO DEL ESPACIO ULTRATERRESTRE"=>"DERECHO DEL ESPACIO ULTRATERRESTRE",
    "DERECHO DEL FONDO DEL MAR"=>"DERECHO DEL FONDO DEL MAR",
    "DERECHO MARITIMO"=>"DERECHO MARITIMO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ORGANIZACION PENAL"){
    echo $form->dropDownList($model,'subdiscipline',array("FUNCIONARIOS Y PROCEDIMIENTOS JUDICIALES"=>"FUNCIONARIOS Y PROCEDIMIENTOS JUDICIALES",
    "MAGISTRATURA"=>"MAGISTRATURA",
    "TRIBUNALES"=>"TRIBUNALES",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "DERECHO Y LEGISLACION NACIONALES"){
    echo $form->dropDownList($model,'subdiscipline',array("DERECHO ADMINISTRATIVO"=>"DERECHO ADMINISTRATIVO",
    "DERECHO AGRARIO Y MINERO"=>"DERECHO AGRARIO Y MINERO",
    "DERECHO CIVIL"=>"DERECHO CIVIL",
    "DERECHO COMERCIAL"=>"DERECHO COMERCIAL",
    "DERECHO CONSTITUCIONAL"=>"DERECHO CONSTITUCIONAL",
    "DERECHO DEL TRANSPORTE Y TRANSITO"=>"DERECHO DEL TRANSPORTE Y TRANSITO",
    "DERECHO FINANCIERO"=>"DERECHO FINANCIERO",
    "DERECHO FISCAL"=>"DERECHO FISCAL",
    "DERECHO LABORAL"=>"DERECHO LABORAL",
    "DERECHO NOTARIAL"=>"DERECHO NOTARIAL",
    "DERECHO PENAL"=>"DERECHO PENAL",
    "DERECHO PRIVADO"=>"DERECHO PRIVADO",
    "DERECHO ROMANO"=>"DERECHO ROMANO",
    "DERECHO SOCIAL"=>"DERECHO SOCIAL",
    "LEGISLACION PUBLICA"=>"LEGISLACION PUBLICA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA JURIDICA"){
    echo $form->dropDownList($model,'subdiscipline',array("OTRAS ESPECIALIDADES EN MATERIA JURIDICA"=>"OTRAS ESPECIALIDADES EN MATERIA JURIDICA"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "LINGÜISTICA APLICADA"){
    echo $form->dropDownList($model,'subdiscipline',array("PREPARACION DE RESUMENES ANALITICOS"=>"PREPARACION DE RESUMENES ANALITICOS",
    "DOCUMENTACION AUTOMATIZADA"=>"DOCUMENTACION AUTOMATIZADA",
    "BILINGÜISMO"=>"BILINGÜISMO",
    "LINGÜISTICA COMPUTACIONAL"=>"LINGÜISTICA COMPUTACIONAL",
    "LENGUAJES DOCUMENTALES"=>"LENGUAJES DOCUMENTALES",
    "DOCUMENTACION"=>"DOCUMENTACION",
    "LENGUAJE Y LITERATURA"=>"LENGUAJE Y LITERATURA",
    "LENGUAJE DE LOS NIÑOS"=>"LENGUAJE DE LOS NIÑOS",
    "TRADUCCION A MAQUINA"=>"TRADUCCION A MAQUINA",
    "PATOLOGIA Y CORRECCION DEL HABLA"=>"PATOLOGIA Y CORRECCION DEL HABLA",
    "ENSEÑANZA DE IDIOMAS"=>"ENSEÑANZA DE IDIOMAS",
    "TRADUCCION"=>"TRADUCCION",
    "ALFABETIZACION Y SISTEMAS DE ESCRITURA"=>"ALFABETIZACION Y SISTEMAS DE ESCRITURA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "LINGÜISTICA DIACRONICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ETIMOLOGIA"=>"ETIMOLOGIA",
    "LINGÜISTICA HISTORICA"=>"LINGÜISTICA HISTORICA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "LINGÜISTICA SINCRONICA"){
    echo $form->dropDownList($model,'subdiscipline',array("SINTAXIS ANALISIS SINTACTICO"=>"SINTAXIS ANALISIS SINTACTICO",
    "ESTILISTICA (ESTILO Y RETORICA)"=>"ESTILISTICA (ESTILO Y RETORICA)",
    "ETNOLINGÜISTICA"=>"ETNOLINGÜISTICA",
    "FONETICA"=>"FONETICA",
    "FONOLOGIA"=>"FONOLOGIA",
    "LEXICOGRAFIA"=>"LEXICOGRAFIA",
    "LEXICOLOGIA"=>"LEXICOLOGIA",
    "LINGÜISTICA COMPARADA"=>"LINGÜISTICA COMPARADA",
    "LINGÜISTICA DESCRIPTIVA"=>"LINGÜISTICA DESCRIPTIVA",
    "ORTOGRAFIA"=>"ORTOGRAFIA",
    "PSICOLINGÜISTICA"=>"PSICOLINGÜISTICA",
    "SEMANTICA"=>"SEMANTICA",
    "SEMIOLOGIA"=>"SEMIOLOGIA",
    "SOCIOLINGÜISTICA"=>"SOCIOLINGÜISTICA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TEORIAS Y METODOS PEDAGOGICOS GENERALES"){
    echo $form->dropDownList($model,'subdiscipline',array("ELABORACION DE PLANES DE ESTUDIO"=>"ELABORACION DE PLANES DE ESTUDIO",
    "EVALUACION DE ALUMNOS Y MAESTROS"=>"EVALUACION DE ALUMNOS Y MAESTROS",
    "INSTRUCCION PROGRAMADA"=>"INSTRUCCION PROGRAMADA",
    "METODOS AUDIOVISUALES"=>"METODOS AUDIOVISUALES",
    "METODOS PEDAGOGICOS"=>"METODOS PEDAGOGICOS",
    "PEDAGOGIA COMPARADA"=>"PEDAGOGIA COMPARADA",
    "PEDAGOGIA EXPERIMENTAL"=>"PEDAGOGIA EXPERIMENTAL",
    "TEORIAS DE LA EDUCACION"=>"TEORIAS DE LA EDUCACION",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ORGANIZACION Y PLANIFICACION PEDAGOGICAS"){
    echo $form->dropDownList($model,'subdiscipline',array("EDUCACION DE ADULTOS"=>"EDUCACION DE ADULTOS",
    "CENTROS DOCENTES"=>"CENTROS DOCENTES",
    "ORGANIZACION Y ADMINISTRACION"=>"ORGANIZACION Y ADMINISTRACION",
    "PLANIFICACION Y FINANCIACION DE LA EDUCACION"=>"PLANIFICACION Y FINANCIACION DE LA EDUCACION",
    "NIVELES Y TEMAS DE LA EDUCACION"=>"NIVELES Y TEMAS DE LA EDUCACION",
    "EDUCACION ESPECIAL"=>"EDUCACION ESPECIAL",
    "IMPEDIDOS"=>"IMPEDIDOS",
    "RETRASADOS MENTALES"=>"RETRASADOS MENTALES",
    "ANALISIS"=>"ANALISIS",
    "MODELOS Y PROYECCIONES ESTADISTICOS"=>"MODELOS Y PROYECCIONES ESTADISTICOS",
    "ENSEÑANZA Y FORMACION PROFESIONAL"=>"ENSEÑANZA Y FORMACION PROFESIONAL",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "FORMACION Y EMPLEO DE LOS EDUCADORES"){
    echo $form->dropDownList($model,'subdiscipline',array("CARRERA Y CONDICION DE LOS EDUCADORES"=>"CARRERA Y CONDICION DE LOS EDUCADORES",
    "FORMACION DE EDUCADORES"=>"FORMACION DE EDUCADORES",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "RELACIONES INTERNACIONALES"){
    echo $form->dropDownList($model,'subdiscipline',array("COOPERACION INTERNACIONAL"=>"COOPERACION INTERNACIONAL",
    "ORGANIZACIONES INTERNACIONALES"=>"ORGANIZACIONES INTERNACIONALES",
    "POLITICA INTERNACIONAL"=>"POLITICA INTERNACIONAL",
    "PROBLEMAS DE LAS RELACIONES INTERNACIONALES"=>"PROBLEMAS DE LAS RELACIONES INTERNACIONALES",
    "TRATADOS Y ACUERDOS INTERNACIONALES"=>"TRATADOS Y ACUERDOS INTERNACIONALES",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "POLITICAS SECTORIALES"){
    echo $form->dropDownList($model,'subdiscipline',array("POLITICA EXTERIOR"=>"POLITICA EXTERIOR",
    "PLANIFICACION DE POLITICAS"=>"PLANIFICACION DE POLITICAS",
    "POLITICA AGRICOLA"=>"POLITICA AGRICOLA",
    "POLITICA AMBIENTAL"=>"POLITICA AMBIENTAL",
    "POLITICA CIENTIFICA Y TECNOLOGICA"=>"POLITICA CIENTIFICA Y TECNOLOGICA",
    "POLITICA COMERCIAL"=>"POLITICA COMERCIAL",
    "POLITICA CULTURAL"=>"POLITICA CULTURAL",
    "POLITICA DE COMUNICACIONES"=>"POLITICA DE COMUNICACIONES",
    "POLITICA DE EDUCACION"=>"POLITICA DE EDUCACION",
    "POLITICA DE INFORMACION"=>"POLITICA DE INFORMACION",
    "POLITICA DE TRANSPORTES"=>"POLITICA DE TRANSPORTES",
    "POLITICA DEMOGRAFICA"=>"POLITICA DEMOGRAFICA",
    "POLITICA ECONOMICA"=>"POLITICA ECONOMICA",
    "POLITICA INDUSTRIAL"=>"POLITICA INDUSTRIAL",
    "POLITICA SANITARIA"=>"POLITICA SANITARIA",
    "POLITICA SOCIAL"=>"POLITICA SOCIAL",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "INSTITUCIONES POLITICAS"){
    echo $form->dropDownList($model,'subdiscipline',array("PODER EJECUTIVO"=>"PODER EJECUTIVO",
    "PODER JUDICIAL"=>"PODER JUDICIAL",
    "PODER LEGISLATIVO"=>"PODER LEGISLATIVO",
    "RELACIONES ENTRE LOS PODERES"=>"RELACIONES ENTRE LOS PODERES",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "VIDA POLITICA"){
    echo $form->dropDownList($model,'subdiscipline',array("PARTIDOS POLITICOS"=>"PARTIDOS POLITICOS",
    "COMPORTAMIENTO POLITICO"=>"COMPORTAMIENTO POLITICO",
    "ELECCIONES"=>"ELECCIONES",
    "GRUPOS POLITICOS"=>"GRUPOS POLITICOS",
    "LIDERAZGO POLITICO"=>"LIDERAZGO POLITICO",
    "MOVIMIENTOS POLITICOS"=>"MOVIMIENTOS POLITICOS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "SOCIOLOGIA DE LA POLITICA"){
    echo $form->dropDownList($model,'subdiscipline',array("CONFLICTOS SOCIALES"=>"CONFLICTOS SOCIALES",
    "DERECHOS HUMANOS"=>"DERECHOS HUMANOS",
    "IDIOMAS"=>"IDIOMAS",
    "MINORIAS"=>"MINORIAS",
    "RAZA"=>"RAZA",
    "RELIGION"=>"RELIGION",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ADMINISTRACION PUBLICA"){
    echo $form->dropDownList($model,'subdiscipline',array("GESTION ADMINISTRATIVA"=>"GESTION ADMINISTRATIVA",
    "INSTITUCIONES CENTRALES"=>"INSTITUCIONES CENTRALES",
    "FUNCION PUBLICA"=>"FUNCION PUBLICA",
    "SERVICIOS PUBLICOS"=>"SERVICIOS PUBLICOS",
    "INSTITUCIONES REGIONALES"=>"INSTITUCIONES REGIONALES",
    "COMERCIALIZACION"=>"COMERCIALIZACION",
    "FINANZAS"=>"FINANZAS",
    "PROMOCION Y DESARROLLO DE ORGANIZACIONES"=>"PROMOCION Y DESARROLLO DE ORGANIZACIONES",
    "RECURSOS HUMANOS"=>"RECURSOS HUMANOS",
    "SISTEMAS DE INFORMACION"=>"SISTEMAS DE INFORMACION",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "OPINION PUBLICA"){
    echo $form->dropDownList($model,'subdiscipline',array("INFORMACION"=>"INFORMACION",
    "MEDIOS DE COMUNICACION DE MASAS"=>"MEDIOS DE COMUNICACION DE MASAS",
    "PRENSA"=>"PRENSA",
    "PROPAGANDA"=>"PROPAGANDA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "BIBLIOTECONOMIA Y ARCHIVONOMIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ARCHIVONOMIA"=>"ARCHIVONOMIA",
    "BIBLIOLOGIA"=>"BIBLIOLOGIA",
    "BIBLIOTECNIA"=>"BIBLIOTECNIA",
    "BIBLIOTECOLOGIA"=>"BIBLIOTECOLOGIA",
    "BIBLIOTECONOMIA"=>"BIBLIOTECONOMIA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PSICOLOGIA PATOLOGICA"){
    echo $form->dropDownList($model,'subdiscipline',array("COMPORTAMIENTO DESVIADO"=>"COMPORTAMIENTO DESVIADO",
    "DEFICIENCIA MENTAL"=>"DEFICIENCIA MENTAL",
    "PSICOPATOLOGIA"=>"PSICOPATOLOGIA",
    "TRASTORNOS DEL COMPORTAMIENTO"=>"TRASTORNOS DEL COMPORTAMIENTO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PSICOLOGIA DEL NIÑO Y DEL ADOLESCENTE"){
    echo $form->dropDownList($model,'subdiscipline',array("INCAPACIDADES DE APRENDIZAJE"=>"INCAPACIDADES DE APRENDIZAJE",
    "PATOLOGIA DEL HABLA"=>"PATOLOGIA DEL HABLA",
    "PSICOLOGIA DEL DESARROLLO"=>"PSICOLOGIA DEL DESARROLLO",
    "PSICOLOGIA ESCOLAR"=>"PSICOLOGIA ESCOLAR",
    "RETRASO MENTAL"=>"RETRASO MENTAL",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ORIENTACION PSICOLOGICA"){
    echo $form->dropDownList($model,'subdiscipline',array("PSICOANALISIS"=>"PSICOANALISIS",
    "ORIENTACION EDUCATIVA"=>"ORIENTACION EDUCATIVA",
    "ORIENTACION PROFESIONAL"=>"ORIENTACION PROFESIONAL",
    "PSICOLOGIA DE CONSULTA"=>"PSICOLOGIA DE CONSULTA",
    "PSICOTERAPIA"=>"PSICOTERAPIA",
    "REHABILITACION"=>"REHABILITACION",
    "RETRASO MENTAL"=>"RETRASO MENTAL",
    "TERAPIA DE GRUPO"=>"TERAPIA DE GRUPO",
    "TERAPIA DEL COMPORTAMIENTO"=>"TERAPIA DEL COMPORTAMIENTO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PSICOLOGIA DE LA EDUCACION"){
    echo $form->dropDownList($model,'subdiscipline',array("FUNCIONAMIENTO COGNOSCITIVO"=>"FUNCIONAMIENTO COGNOSCITIVO",
    "LEYES DEL APRENDIZAJE"=>"LEYES DEL APRENDIZAJE",
    "METODOS EDUCATIVOS"=>"METODOS EDUCATIVOS",
    "PSICOLINGÜISTICA"=>"PSICOLINGÜISTICA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "EVALUACION Y MEDICION PSICOLOGICAS"){
    echo $form->dropDownList($model,'subdiscipline',array("PSICOLOGIA DIFERENCIAL"=>"PSICOLOGIA DIFERENCIAL",
    "ANALISIS DE ESCALA"=>"ANALISIS DE ESCALA",
    "CONSTRUCCION DE PRUEBAS"=>"CONSTRUCCION DE PRUEBAS",
    "DISEÑO EXPERIMENTAL"=>"DISEÑO EXPERIMENTAL",
    "ESTADISTICA"=>"ESTADISTICA",
    "PSICOMETRIA"=>"PSICOMETRIA",
    "TEORIA DE LAS MEDICIONES"=>"TEORIA DE LAS MEDICIONES",
    "TEORIA DE LAS PRUEBAS"=>"TEORIA DE LAS PRUEBAS",
    "VALIDACION DE PRUEBAS"=>"VALIDACION DE PRUEBAS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PSICOLOGIA EXPERIMENTAL"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS EXPERIMENTAL DEL COMPORTAMIENTO"=>"ANALISIS EXPERIMENTAL DEL COMPORTAMIENTO",
    "EMOCION"=>"EMOCION",
    "FUNCION CEREBRAL"=>"FUNCION CEREBRAL",
    "MOTIVACION"=>"MOTIVACION",
    "NIVELES DE FUNCION"=>"NIVELES DE FUNCION",
    "PROCESOS DE LA MEMORIA"=>"PROCESOS DE LA MEMORIA",
    "PROCESOS DE PERCEPCION"=>"PROCESOS DE PERCEPCION",
    "PROCESOS MENTALES"=>"PROCESOS MENTALES",
    "PROCESOS SENSORIALES"=>"PROCESOS SENSORIALES",
    "PSICOLOGIA COMPARADA"=>"PSICOLOGIA COMPARADA",
    "PSICOLOGIA FISIOLOGICA"=>"PSICOLOGIA FISIOLOGICA",
    "REACCION"=>"REACCION",
    "REFLEJOS"=>"REFLEJOS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PSICOLOGIA GENERAL"){
    echo $form->dropDownList($model,'subdiscipline',array("METODOLOGIA"=>"METODOLOGIA",
    "TEORIA Y SISTEMAS"=>"TEORIA Y SISTEMAS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PSICOLOGIA GERIATRICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ENVEJECIMIENTO"=>"ENVEJECIMIENTO",
    "MADUREZ"=>"MADUREZ",
    "MUERTE"=>"MUERTE",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PSICOLOGIA DEL TRABAJO Y DEL PERSONAL"){
    echo $form->dropDownList($model,'subdiscipline',array("EVALUACION DEL RENDIMIENTO"=>"EVALUACION DEL RENDIMIENTO",
    "RELACIONES PERSONAL/ADMINISTRACION"=>"RELACIONES PERSONAL/ADMINISTRACION",
    "ACTITUDES Y MORAL"=>"ACTITUDES Y MORAL",
    "COMPENSACION Y RECONOCIMIENTO"=>"COMPENSACION Y RECONOCIMIENTO",
    "COMPORTAMIENTO ORGANIZACIONAL"=>"COMPORTAMIENTO ORGANIZACIONAL",
    "CULTURA ORGANIZACIONAL"=>"CULTURA ORGANIZACIONAL",
    "DISEÑO Y EVALUACION DEL TRABAJO"=>"DISEÑO Y EVALUACION DEL TRABAJO",
    "MEDICION DE LA SATISFACCION"=>"MEDICION DE LA SATISFACCION",
    "PERSONAL"=>"PERSONAL",
    "PERSONAL"=>"PERSONAL",
    "PREVENCION DE ACCIDENTES"=>"PREVENCION DE ACCIDENTES",
    "SELECCION DE PERSONAL"=>"SELECCION DE PERSONAL",
    "TRABAJO EN EQUIPO"=>"TRABAJO EN EQUIPO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PARAPSICOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("HIPNOSIS"=>"HIPNOSIS",
    "PERCEPCION EXTRASENSORIAL"=>"PERCEPCION EXTRASENSORIAL",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ESTUDIO DE LA PERSONALIDAD"){
    echo $form->dropDownList($model,'subdiscipline',array("CREATIVIDAD"=>"CREATIVIDAD",
    "CULTURA Y PERSONALIDAD"=>"CULTURA Y PERSONALIDAD",
    "DESARROLLO DE LA PERSONALIDAD"=>"DESARROLLO DE LA PERSONALIDAD",
    "ESTRUCTURA Y DINAMICA DE LA PERSONALIDAD"=>"ESTRUCTURA Y DINAMICA DE LA PERSONALIDAD",
    "MEDICION DE LA PERSONALIDAD"=>"MEDICION DE LA PERSONALIDAD",
    "TEORIA DE LA PERSONALIDAD"=>"TEORIA DE LA PERSONALIDAD",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ESTUDIO PSICOLOGICO DE FENOMENOS SOCIALES"){
    echo $form->dropDownList($model,'subdiscipline',array("DISCRIMINACION"=>"DISCRIMINACION",
    "FENOMENOS DE LOS GRUPOS MINORITARIOS"=>"FENOMENOS DE LOS GRUPOS MINORITARIOS",
    "POLITICA PUBLICA"=>"POLITICA PUBLICA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PSICOFARMACOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ALCOHOLISMO"=>"ALCOHOLISMO",
    "FUNCION DE LOS MEDICAMENTOS"=>"FUNCION DE LOS MEDICAMENTOS",
    "RESPUESTA DEL COMPORTAMIENTO"=>"RESPUESTA DEL COMPORTAMIENTO",
    "TERAPIA CON MEDICAMENTOS"=>"TERAPIA CON MEDICAMENTOS",
    "USO INDEBIDO DE DROGAS"=>"USO INDEBIDO DE DROGAS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PSICOLOGIA SOCIAL"){
    echo $form->dropDownList($model,'subdiscipline',array("ACTITUDES"=>"ACTITUDES",
    "COMPORTAMIENTO COLECTIVO"=>"COMPORTAMIENTO COLECTIVO",
    "COMPORTAMIENTO DEL CONSUMIDOR"=>"COMPORTAMIENTO DEL CONSUMIDOR",
    "COMPORTAMIENTO POLITICO"=>"COMPORTAMIENTO POLITICO",
    "COMPORTAMIENTO SEGUN LA FUNCION"=>"COMPORTAMIENTO SEGUN LA FUNCION",
    "COMUNICACION SIMBOLICA"=>"COMUNICACION SIMBOLICA",
    "CULTURA Y PERSONALIDAD"=>"CULTURA Y PERSONALIDAD",
    "INTERACCION DE GRUPOS"=>"INTERACCION DE GRUPOS",
    "LIDERAZGO"=>"LIDERAZGO",
    "MERCADEO"=>"MERCADEO",
    "OPINION PUBLICA"=>"OPINION PUBLICA",
    "PERCEPCIONES Y MOVIMIENTOS SOCIALES"=>"PERCEPCIONES Y MOVIMIENTOS SOCIALES",
    "PROCESOS DE GRUPO"=>"PROCESOS DE GRUPO",
    "PROCESOS Y TEORIA DE LAS DECISIONES"=>"PROCESOS Y TEORIA DE LAS DECISIONES",
    "PSICOLOGIA DE LA COMUNIDAD"=>"PSICOLOGIA DE LA COMUNIDAD",
    "PSICOLOGIA DE LA INGENIERIA"=>"PSICOLOGIA DE LA INGENIERIA",
    "PSICOLOGIA DEL DEPORTE"=>"PSICOLOGIA DEL DEPORTE",
    "PSICOLOGIA FORENSE"=>"PSICOLOGIA FORENSE",
    "PUBLICIDAD"=>"PUBLICIDAD",
    "SOLUCION DE CONFLICTOS"=>"SOLUCION DE CONFLICTOS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ARQUITECTURA"){
    echo $form->dropDownList($model,'subdiscipline',array("DISEÑO ARQUITECTONICO"=>"DISEÑO ARQUITECTONICO",
    "EJECUCION DE LA OBRA"=>"EJECUCION DE LA OBRA",
    "PARQUES Y JARDINES"=>"PARQUES Y JARDINES",
    "URBANISMO"=>"URBANISMO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TEORIA, ANALISIS Y CRITICA LITERARIOS"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS LITERARIO"=>"ANALISIS LITERARIO",
    "CRITICA DE TEXTOS"=>"CRITICA DE TEXTOS",
    "ESTILO Y ESTETICA LITERARIOS"=>"ESTILO Y ESTETICA LITERARIOS",
    "VOCABULARIO LITERARIO"=>"VOCABULARIO LITERARIO","RETORICA"=>"RETORICA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TEORIA, ANALISIS Y CRITICA DE LAS BELLAS ARTES"){
    echo $form->dropDownList($model,'subdiscipline',array("CINEMATOGRAFIA"=>"CINEMATOGRAFIA",
    "ARTES DECORATIVAS"=>"ARTES DECORATIVAS",
    "COREOGRAFIA"=>"COREOGRAFIA",
    "DANZA"=>"DANZA",
    "DIBUJO"=>"DIBUJO",
    "GRABADO"=>"GRABADO",
    "ESCULTURA"=>"ESCULTURA",
    "ESTETICA DE LAS BELLAS ARTES"=>"ESTETICA DE LAS BELLAS ARTES",
    "FOTOGRAFIA"=>"FOTOGRAFIA",
    "MUSICA"=>"MUSICA",
    "MUSICOLOGIA"=>"MUSICOLOGIA",
    "PINTURA"=>"PINTURA",
    "TEATRO"=>"TEATRO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "SOCIOLOGIA CULTURAL"){
    echo $form->dropDownList($model,'subdiscipline',array("CARACTERISTICAS Y CIVILIZACION NACIONALES"=>"CARACTERISTICAS Y CIVILIZACION NACIONALES",
    "EVOLUCION CULTURAL"=>"EVOLUCION CULTURAL",
    "FOLKLORE"=>"FOLKLORE",
    "IDIOMA Y CULTURA"=>"IDIOMA Y CULTURA",
    "RELACIONES CULTURALES"=>"RELACIONES CULTURALES",
    "RELACIONES INTERETNICAS"=>"RELACIONES INTERETNICAS",
    "SOCIOLOGIA DE LA LITERATURA"=>"SOCIOLOGIA DE LA LITERATURA",
    "SOCIOLOGIA DE LA RELIGION"=>"SOCIOLOGIA DE LA RELIGION",
    "SOCIOLOGIA DEL ARTE"=>"SOCIOLOGIA DEL ARTE",
    "SOCIOLOGIA DEL DERECHO"=>"SOCIOLOGIA DEL DERECHO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "SOCIOLOGIA EXPERIMENTAL"){
    echo $form->dropDownList($model,'subdiscipline',array("ACOPIO DE DATOS SOBRE EL TERRENO"=>"ACOPIO DE DATOS SOBRE EL TERRENO",
    "DISEÑO DE ENCUESTAS SOCIOLOGICAS"=>"DISEÑO DE ENCUESTAS SOCIOLOGICAS",
    "METODOS DE LAS ENCUESTAS SOCIOLOGICAS"=>"METODOS DE LAS ENCUESTAS SOCIOLOGICAS",
    "PSICOLOGIA SOCIAL"=>"PSICOLOGIA SOCIAL",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "SOCIOLOGIA GENERAL"){
    echo $form->dropDownList($model,'subdiscipline',array("METODOLOGIA"=>"METODOLOGIA",
    "SOCIOGRAFIA"=>"SOCIOGRAFIA",
    "SOCIOLOGIA COMPARADA"=>"SOCIOLOGIA COMPARADA",
    "SOCIOLOGIA HISTORICA"=>"SOCIOLOGIA HISTORICA",
    "TEORIA"=>"TEORIA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PROBLEMAS INTERNACIONALES"){
    echo $form->dropDownList($model,'subdiscipline',array("CONFLICTOS"=>"CONFLICTOS",
    "GUERRA Y PAZ"=>"GUERRA Y PAZ",
    "SOLUCION DE CONFLICTOS"=>"SOLUCION DE CONFLICTOS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "SOCIOLOGIA MATEMATICA Y ESTADISTICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANALISIS ESTADISTICO"=>"ANALISIS ESTADISTICO",
    "CONSTRUCCION DE MODELOS"=>"CONSTRUCCION DE MODELOS",
    "MEDICION Y CONSTRUCCION DE INDICES"=>"MEDICION Y CONSTRUCCION DE INDICES",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "SOCIOLOGIA DE ACTIVIDADES PARTICULARES"){
    echo $form->dropDownList($model,'subdiscipline',array("BUROCRACIA"=>"BUROCRACIA",
    "OCIOLOGIA DE LOS MEDIOS DE COMUNICACION DE MASAS"=>"OCIOLOGIA DE LOS MEDIOS DE COMUNICACION DE MASAS",
    "SOCIOLOGIA DE LA EDUCACION"=>"SOCIOLOGIA DE LA EDUCACION",
    "SOCIOLOGIA DE LA ENSEÑANZA"=>"SOCIOLOGIA DE LA ENSEÑANZA",
    "SOCIOLOGIA DE LA INDUSTRIA"=>"SOCIOLOGIA DE LA INDUSTRIA",
    "SOCIOLOGIA DE LA MEDICINA"=>"SOCIOLOGIA DE LA MEDICINA",
    "SOCIOLOGIA DE LAS CIENCIAS"=>"SOCIOLOGIA DE LAS CIENCIAS",
    "SOCIOLOGIA DEL DERECHO"=>"SOCIOLOGIA DEL DERECHO",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "CAMBIO Y DESARROLLO SOCIAL"){
    echo $form->dropDownList($model,'subdiscipline',array("DESARROLLO SOCIOECONOMICO"=>"DESARROLLO SOCIOECONOMICO",
    "DESARROLLO SUSTENTABLE"=>"DESARROLLO SUSTENTABLE",
    "EVOLUCION DE LAS SOCIEDADES"=>"EVOLUCION DE LAS SOCIEDADES",
    "PAISES EN DESARROLLO"=>"PAISES EN DESARROLLO",
    "POLITICA SOCIAL"=>"POLITICA SOCIAL",
    "SEGURIDAD SOCIAL"=>"SEGURIDAD SOCIAL",
    "SERVICIOS SOCIALES"=>"SERVICIOS SOCIALES",
    "TECNOLOGIA Y CAMBIO SOCIAL"=>"TECNOLOGIA Y CAMBIO SOCIAL",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "COMUNICACION SOCIAL"){
    echo $form->dropDownList($model,'subdiscipline',array("SIGNOS"=>"SIGNOS",
    "SIMBOLOS"=>"SIMBOLOS",
    "SOCIOLINGÜISTICA"=>"SOCIOLINGÜISTICA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "GRUPOS SOCIALES"){
    echo $form->dropDownList($model,'subdiscipline',array("CASTAS"=>"CASTAS",
    "CLASES SOCIALES"=>"CLASES SOCIALES",
    "CONDICION DE LA MUJER"=>"CONDICION DE LA MUJER",
    "ELITES"=>"ELITES",
    "ESTRATIFICACION SOCIAL"=>"ESTRATIFICACION SOCIAL",
    "FAMILIA"=>"FAMILIA",
    "LINAJE"=>"LINAJE",
    "MATRIMONIO"=>"MATRIMONIO",
    "MOVILIDAD SOCIAL"=>"MOVILIDAD SOCIAL",
    "RIBUS"=>"RIBUS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "PROBLEMAS SOCIALES"){
    echo $form->dropDownList($model,'subdiscipline',array("BIENESTAR SOCIAL"=>"BIENESTAR SOCIAL",
    "CALIDAD DE VIDA"=>"CALIDAD DE VIDA",
    "CONFLICTO Y ACUERDO SOCIAL"=>"CONFLICTO Y ACUERDO SOCIAL",
    "DELINCUENCIA"=>"DELINCUENCIA",
    "DELITO"=>"DELITO",
    "DESEMPLEO"=>"DESEMPLEO",
    "ENFERMEDAD"=>"ENFERMEDAD",
    "HAMBRE"=>"HAMBRE",
    "IMPEDIDOS"=>"IMPEDIDOS",
    "INADAPTADOS"=>"INADAPTADOS",
    "NIVEL DE VIDA"=>"NIVEL DE VIDA",
    "POBREZA"=>"POBREZA",
    "RELACIONES INTERRACIALES"=>"RELACIONES INTERRACIALES",
    "TERRORISMO"=>"TERRORISMO",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "SOCIOLOGIA DE LA IMPLANTACION HUMANA"){
    echo $form->dropDownList($model,'subdiscipline',array("BARRIOS DE TUGURIOS"=>"BARRIOS DE TUGURIOS",
    "ESTUDIOS SOBRE LA COMUNIDAD"=>"ESTUDIOS SOBRE LA COMUNIDAD",
    "OCIOLOGIA RURAL"=>"OCIOLOGIA RURAL",
    "SOCIOLOGIA ECOLOGICA"=>"SOCIOLOGIA ECOLOGICA",
    "SOCIOLOGIA LOCAL"=>"SOCIOLOGIA LOCAL",
    "SOCIOLOGIA URBANA"=>"SOCIOLOGIA URBANA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "CULTURA FÍSICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ACTIVIDAD FÍSICA Y DEPORTE"=>"ACTIVIDAD FÍSICA Y DEPORTE"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "HUMANIDADES"){
    echo $form->dropDownList($model,'subdiscipline',array("TRABAJO SOCIAL"=>"TRABAJO SOCIAL"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "TERAPIA OCUPACIONAL"){
    echo $form->dropDownList($model,'subdiscipline',array("ADULTOS MAYORES"=>"ADULTOS MAYORES",
    "INSERCION LABORAL"=>"INSERCION LABORAL",
    "PEDIATRIA"=>"PEDIATRIA",
    "REHABILITACION FISICA"=>"REHABILITACION FISICA",
    "SALUD MENTAL"=>"SALUD MENTAL",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ETICA INDIVIDUAL"){
    echo $form->dropDownList($model,'subdiscipline',array("CODIGOS DE CONDUCTA ÉTICA"=>"CODIGOS DE CONDUCTA ÉTICA",
    "CODIGOS DE VALORES"=>"CODIGOS DE VALORES",
    "MOTIVACION"=>"MOTIVACION",
    "ÉTICA FILOSOFICA"=>"ÉTICA FILOSOFICA",
    "ÉTICA RELIGIOSA"=>"ÉTICA RELIGIOSA",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "ETICA DE GRUPO"){
    echo $form->dropDownList($model,'subdiscipline',array("DECLARACIONES INTERNACIONALES"=>"DECLARACIONES INTERNACIONALES",
    "ÉTICA DE LA CIENCIA"=>"ÉTICA DE LA CIENCIA",
    "ÉTICA ECONOMICA"=>"ÉTICA ECONOMICA",
    "ÉTICA NACIONAL"=>"ÉTICA NACIONAL",
    "ÉTICA TRANSNACIONAL"=>"ÉTICA TRANSNACIONAL",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
     if($model->discipline == "FILOSOFIA DE LOS CONOCIMIENTOS"){
    echo $form->dropDownList($model,'subdiscipline',array("EPISTEMOLOGIA"=>"EPISTEMOLOGIA",
    "FILOSOFIA APORETICA"=>"FILOSOFIA APORETICA",
    "TEORIA DE LA PERCEPCION"=>"TEORIA DE LA PERCEPCION",
    "TEORIA DE LA RAZON"=>"TEORIA DE LA RAZON",
    "TEORIA DEL CONCEPTO"=>"TEORIA DEL CONCEPTO",
    "TEORIA DEL JUICIO"=>"TEORIA DEL JUICIO",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ANTROPOLOGIA FILOSOFICA"){
    echo $form->dropDownList($model,'subdiscipline',array("ESTETICA"=>"ESTETICA",
    "FILOSOFIA DE LA ACCION"=>"FILOSOFIA DE LA ACCION",
    "FILOSOFIA DE LA IMAGINACION"=>"FILOSOFIA DE LA IMAGINACION",
    "FILOSOFIA DE LA INTERSUBJETIVIDAD"=>"FILOSOFIA DE LA INTERSUBJETIVIDAD",
    "FILOSOFIA DE LA VOLUNTAD"=>"FILOSOFIA DE LA VOLUNTAD",
    "FILOSOFIA DEL LENGUAJE"=>"FILOSOFIA DEL LENGUAJE",
    "HERMENEUTICA"=>"HERMENEUTICA",
    "PROBLEMA MENTE-CUERPO"=>"PROBLEMA MENTE-CUERPO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "FILOSOFIA GENERAL"){
    echo $form->dropDownList($model,'subdiscipline',array("LOGICA DIALECTICA"=>"LOGICA DIALECTICA",
    "MATERIALISMO DIALECTICO"=>"MATERIALISMO DIALECTICO",
    "METAFISICA"=>"METAFISICA",
    "ONTOLOGIA"=>"ONTOLOGIA",
    "TEOLOGIA NATURAL"=>"TEOLOGIA NATURAL",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "SISTEMAS FILOSOFICOS"){
    echo $form->dropDownList($model,'subdiscipline',array("FILOSOFIA ANTIGUA"=>"FILOSOFIA ANTIGUA",
    "FILOSOFIA DE HOY"=>"FILOSOFIA DE HOY",
    "FILOSOFIA MEDIEVAL"=>"FILOSOFIA MEDIEVAL",
    "FILOSOFIA MODERNA"=>"FILOSOFIA MODERNA",
    "SISTEMAS TEOLOGICO-FILOSOFICOS"=>"SISTEMAS TEOLOGICO-FILOSOFICOS",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "FILOSOFIA DE LA CIENCIA"){
    echo $form->dropDownList($model,'subdiscipline',array("FILOSOFIA DE LA BIOLOGIA"=>"FILOSOFIA DE LA BIOLOGIA",
    "FILOSOFIA DE LA FISICA"=>"FILOSOFIA DE LA FISICA",
    "FILOSOFIA DE LA LOGICA"=>"FILOSOFIA DE LA LOGICA",
    "FILOSOFIA DE LAS CIENCIAS SOCIALES"=>"FILOSOFIA DE LAS CIENCIAS SOCIALES",
    "FILOSOFIA DE LAS MATEMATICAS"=>"FILOSOFIA DE LAS MATEMATICAS",
    "FILOSOFIA DEL DERECHO"=>"FILOSOFIA DEL DERECHO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "FILOSOFIA DE LA NATURALEZA"){
    echo $form->dropDownList($model,'subdiscipline',array("FILOSOFIA DE LA MATERIA"=>"FILOSOFIA DE LA MATERIA",
    "FILOSOFIA DE LA VIDA"=>"FILOSOFIA DE LA VIDA",
    "FILOSOFIA DEL ESPACIO Y DEL TIEMPO"=>"FILOSOFIA DEL ESPACIO Y DEL TIEMPO",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "FILOSOFIA SOCIAL"){
    echo $form->dropDownList($model,'subdiscipline',array("FILOSOFIA DE LA CALIDAD"=>"FILOSOFIA DE LA CALIDAD",
    "FILOSOFIA DE LA CULTURA"=>"FILOSOFIA DE LA CULTURA",
    "FILOSOFIA DE LA EDUCACION"=>"FILOSOFIA DE LA EDUCACION",
    "FILOSOFIA DE LA HISTORIA"=>"FILOSOFIA DE LA HISTORIA",
    "FILOSOFIA DE LAS TECNICAS"=>"FILOSOFIA DE LAS TECNICAS",
    "FILOSOFIA POLITICA"=>"FILOSOFIA POLITICA",
    "TEORIA DE LAS IDEOLOGIAS"=>"TEORIA DE LAS IDEOLOGIAS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ANALISIS DE TENDENCIAS"){
    echo $form->dropDownList($model,'subdiscipline',array("RUPTURAS"=>"RUPTURAS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "NUEVOS SISTEMAS ORGANIZACIONALES"){
    echo $form->dropDownList($model,'subdiscipline',array("CADENAS PRODUCTIVAS"=>"CADENAS PRODUCTIVAS",
    "MERCADOS LABORALES"=>"MERCADOS LABORALES",
    "SEGURIDAD NACIONAL E INTERNACIONAL"=>"SEGURIDAD NACIONAL E INTERNACIONAL",
    "SISTEMAS EDUCATIVOS"=>"SISTEMAS EDUCATIVOS",
    "SISTEMAS NACIONALES DE INNOVACION"=>"SISTEMAS NACIONALES DE INNOVACION",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "SILVICULTURA"){
    echo $form->dropDownList($model,'subdiscipline',array("CONSERVACION"=>"CONSERVACION",
    "CONTROL DE LA EROSION"=>"CONTROL DE LA EROSION",
    "GESTION DE LAS PRADERAS"=>"GESTION DE LAS PRADERAS",
    "ORDENAMIENTO DE CUENCAS HIDROGRAFICAS"=>"ORDENAMIENTO DE CUENCAS HIDROGRAFICAS",
    "ORDENAMIENTO"=>"ORDENAMIENTO",
    "PRODUCTOS"=>"PRODUCTOS",
    "PROTECCION"=>"PROTECCION",
    "SILVICULTURA"=>"SILVICULTURA",
    "TECNICAS DE CULTIVO"=>"TECNICAS DE CULTIVO",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "INMUNOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array("ANTICUERPOS DE LOS TEJIDOS"=>"ANTICUERPOS DE LOS TEJIDOS",
    "ANTICUERPOS"=>"ANTICUERPOS",
    "ANTIGENOS"=>"ANTIGENOS",
    "FORMACION ANTICUERPOS"=>"FORMACION ANTICUERPOS",
    "HIPERSENSIBILIDAD"=>"HIPERSENSIBILIDAD",
    "INMUNIZACION"=>"INMUNIZACION",
    "INMUNOQUIMICA"=>"INMUNOQUIMICA",
    "REACCION ANTIGENO- ANTICUERPO"=>"REACCION ANTIGENO- ANTICUERPO",
    "TRANSPORTE DE ORGANOS"=>"TRANSPORTE DE ORGANOS",
    "VACUNAS"=>"VACUNAS",
    "OTROS"=>"OTROS",),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "HIGIENE VETERINARIA Y SALUD PUBLICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS DE LA TIERRA, DEL COSMOS Y DEL MEDIO AMBIENTE"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "BIOFISICA"){
    echo $form->dropDownList($model,'subdiscipline',array("BIOACUSTICA"=>"BIOACUSTICA",
    "BIOELECTRICIDAD"=>"BIOELECTRICIDAD",
    "BIOENERGETICA"=>"BIOENERGETICA",
    "BIOMECANICA"=>"BIOMECANICA",
    "BIOOPTICA"=>"BIOOPTICA",
    "FISICA MEDICA"=>"FISICA MEDICA",
    "OTROS"=>"OTROS"),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "BIOLOGIA MOLECULAR"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "EVOLUCION"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "RADIOBIOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "SIMBIOSIS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "DERECHO CANONICO"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "IDEOLOGIAS POLITICAS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "POLITICA TEORICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "SISTEMAS POLITICOS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ETICA CLASICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ETICA PROSPECTIVA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "FISICA DEL ESPACIO"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "GEOGRAFIA HISTORICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "GEOGRAFIA REGIONAL"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "BIOGRAFIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "GEOGRAFIA LINGÜISTICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "LINGÜISTICA TEORICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "POLITICAS DEL LENGUAJE"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "APLICACIONES DE LA LOGICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "LOGICA GENERAL"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "MATEMATICAS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "BIOLOGIA DE LA REPRODUCCION HUMANA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "CIENCIAS DE LA INFORMACION Y COMUNICACION EN MEDICINA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "CIENCIAS SOCIALES EN MEDICINA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "EPIDEMIOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "FISIOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "MORFOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "MEDICINA FORENSE"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "MEDICINA PREVENTIVA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OBSTETRICIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "PSIQUIATRIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "SANIDAD PUBLICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "TOXICOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "QUIMICA FISICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ORGANIZACION SOCIAL ESTRUCTURA E INSTITUCIONES"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ANALISIS DE RIESGOS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "CONSTRUCCION DE ESCENARIOS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "DESARROLLO SUSTENTABLE"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "DISEÑO DE PRIORIDADES A LARGO PLAZO"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ETICA DEL FUTURO"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "FUTURO DE LOS CONOCIMIENTOS Y LAS NUEVAS TECNOLOGIAS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "NUEVAS FUERTES DE ENERGIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "PREVISION"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "PLANEACION Y DISEÑO DE ESTRATEGIAS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "TENDENCIAS DEMOGRAFICAS Y POBLACIONALES"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ANTROPOLOGIA ESTRUCTURAL"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE ANTROPOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE ARTES Y LETRAS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE ASTRONOMIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS AGRONOMICAS Y VETERINARIAS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE BIOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE ECONOMIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS POLITICAS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE DEMOGRAFIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE ETICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "DOCTRINAS FILOSOFICAS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE FILOSOFIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE FISICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE GEOGRAFIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE HISTORIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE LINGÜISTICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE LOGICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE MATEMATICAS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "ADMINISTRACION DE HOSPITALES Y DE LA ATENCION MEDICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE MEDICINA Y PATOLOGIA HUMANAS"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE PEDAGOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE PSICOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA PROSPECTIVA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE QUIMICA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    if($model->discipline == "OTRAS ESPECIALIDADES EN MATERIA DE SOCIOLOGIA"){
    echo $form->dropDownList($model,'subdiscipline',array(" "=>" "),
    array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    }
    echo '</span>';
    echo $form->error($model,'subdiscipline');
    echo '</div>';

      }
      else
      {
        echo '<div class="row"id="comboDiscipline">';

        echo '</div>';
        echo '<div class="row"id="comboSubdiscipline">';
       
        echo '</div>';
      }
  ?>
  <div class="row">      
    <?php 
      if(!$model->isNewRecord)
      {
        echo $form->FileField($model,'url_document',array('maxlength'=>100,'title'=>'archivo del articulo o guía. Máximo 2MB')); 
        echo "<a href='".Yii::app()->request->baseUrl."/".$model->url_document."' target='_blank'><img src='".Yii::app()->request->baseUrl."/img/Acciones/desplegar.png'></a>";
        echo $form->error($model,'url_document');
      }
      else
      {
          echo $form->fileField($model,'url_document',array('maxlength'=>100,'title'=>'archivo del articulo o guía. Máximo 2MB'));
          echo $form->error($model,'url_document');
      }
    ?>
  </div>

	<div class="row">
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>250,'placeholder'=>'Palabras clave', 'title'=>'Palabras clave (máximo 250 carácteres)')); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

<?php $this->widget('ext.widgets.reCopy.ReCopyWidget', array(
      'targetClass'=>'authorsRegistry',
      'addButtonLabel'=>'Agregar nuevo autor',
     )); 
    ?>
    <div class="authorsRegistry">        
     <?php  echo "<input type='hidden' name='idsArticlesGuides[]'>"; ?>
       
       <div class="row">
        <?php echo $form->textField($modelAuthor,'names',array('name'=>'names[]','size'=>30,'maxlength'=>30, 'placeholder'=>'Nombre(s)', 'title'=>'Nombre(s)','onKeyPress'=>'return lettersOnly(event)')); ?>
        <?php echo $form->error($modelAuthor,'names');?>
       </div>

      <div class="row">
        <?php echo $form->textField($modelAuthor,'last_name1',array('name'=>'last_names1[]','size'=>20,'maxlength'=>20, 'placeholder'=>'Apellido Paterno', 'title'=>'Apellido Paterno','onKeyPress'=>'return lettersOnly(event)')); ?>
        <?php echo $form->error($modelAuthor,'last_name1'); ?>
      </div>
      
       <div class="row">
        <?php echo $form->textField($modelAuthor,'last_name2',array('name'=>'last_names2[]','size'=>20,'maxlength'=>20,'placeholder'=>'Apellido Materno', 'title'=>'Apellido Materno','onKeyPress'=>'return lettersOnly(event)')); ?>
        <?php echo $form->error($modelAuthor,'last_name2'); ?>
         </div>
      <div class="row">
      <?php echo $form->textField($modelAuthor,'position',array('name'=>'positions[]','placeholder'=>'posición', 'title'=>'posición. (Solo se aceptan numeros)','class'=>'numericOnly')); ?>
      <?php echo $form->error($modelAuthor,'position'); ?>
      </div>
      <hr>
    </div>  
          
  <?php 
    if(!$model->isNewRecord)      
      foreach ($modelAuthors as $key => $value) 
      { ?>
          
         <?php echo "<input type='hidden' value='".$value->id."' name='idsArticlesGuides[]'>"; ?>
          
             <div class="row">
                <?php echo $form->textField($value,'names',array('name'=>'names[]','value'=>$value->names,'size'=>30,'maxlength'=>30, 'placeholder'=>'Nombre(s)', 'title'=>'Nombre(s)','onKeyPress'=>'return lettersOnly(event)')); ?>
                <?php echo $form->error($value,'names');?>
            </div>
            <div class="row">
                 <?php echo $form->textField($value,'last_name1',array('name'=>'last_names1[]','value'=>$value->last_name1,'size'=>20,'maxlength'=>20, 'placeholder'=>'Apellido Paterno', 'title'=>'Apellido Paterno','onKeyPress'=>'return lettersOnly(event)')); ?>
                <?php echo $form->error($value,'last_name1'); ?>
            </div>
            <div class="row">
                <?php echo $form->textField($value,'last_name2',array('name'=>'last_names2[]','value'=>$value->last_name2,'size'=>20,'maxlength'=>20,'placeholder'=>'Apellido Materno', 'title'=>'Apellido Materno','onKeyPress'=>'return lettersOnly(event)')); ?>
                <?php echo $form->error($value,'last_name2'); ?>
            </div>
        
            <div class="row">
                <?php echo $form->textField($value,'position',array('name'=>'positions[]','value'=>$value->position,'placeholder'=>'posición', 'title'=>'posición. (Solo se aceptan numeros)')); ?>
                <?php echo $form->error($value,'position'); ?>
            </div>
          <?php echo CHtml::button('Elminar',array('submit' => array('articlesGuides/deleteAuthor','id'=>$modelAuthors[$key]->id,'idsArticlesGuides'=>$model->id),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething')); ?>
      <hr>

   
  <?php } ?>


	<div class="row buttons">

		<?php echo CHtml::htmlButton($model->isNewRecord ? 'Guardar' : 'Modificar',array(
                'onclick'=>'send("articles-guides-form", "articlesGuides/'.($model->isNewRecord ? 'create' : 'update').'", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","articlesGuides/admin","checkAuths");',
                 //'id'=> 'post-submit-btn',
                'class'=>'savebutton',
            ));
   		 ?>
		 <?php echo CHtml::link('Cancelar',array('articlesGuides/admin'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
