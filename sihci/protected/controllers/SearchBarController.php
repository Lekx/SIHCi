<?php

class SearchBarController extends Controller
{

	public function actionIndex()
	{
		$this->layout = 'informativas';
		$this->render('index');
	}

	public function actionSearchBar(){

		$this->render('searchBar');
	}

	public function jsonResults($keyword){
		$results = $this->search($keyword, $this->tags());

		$result = "";

		if(empty($results))
			$result.= "No se encontraron resultados para su búsqueda:<b> \"".$keyword."\"</b>";
		else
			$result.=  "El resultado de la búsqueda para <b>\"".$keyword."\"</b> fue:";
			
		foreach($results as $index => $subarray)
			$result.= "<a href=".Yii::app()->baseUrl."/index.php"."/".$index." style='text-decoration:none;'><div class='resultbars' style='padding:10px;cursor:pointer;'> <h5>".$subarray["title"]."</h5>".$subarray["desc"]."</div></a>";
		
		return $result;
	}

	public function actionAutoSearch($keyword){
		echo $this->jsonResults($keyword);
		//print_r(json_encode($results));
	}

	public function actionSearchResults($keyword)
	{
		$this->layout = 'informativas';
		$results = $this->search($keyword, $this->tags());


$this->render('searchResults',array(
			'results'=>$results,'keyword'=>$keyword
		));
		
	}


	public function tags(){
		return array (
			"informationGeneralDirection" => array(
"title"=>"Información de Dirección general",
"desc"=>"Es un Organismo Público Descentralizado de la administración pública estatal, con personalidad jurídica y patrimonio propios; conformado por dos Unidades Hospitalarias",
"NULL",
"OPD HCG",
"¿Quiénes somos?",
"¿Qué es el Hospital Civil de Guadalajara?",
"Ideología Institucional",
"Misión",
"Visión",
"Valores",
"PLAN INSTITUCIONAL",
),
"organigram" => array(
"title"=>"Organigrama",
"desc"=>"Titular M.S.P. Víctor Manuel Ramírez Anguiano Subdirector General de Enseñanza e Investigación, Domicilio Hospital 278 Col. El Retiro Guadalajara, Jalisco",
"NULL",
"OPD HCG",
"JUNTA DE GOBIERNO",
"DIRECCIÓN GENERAL",
"CONTRALORÍA GENERAL INTERNA",
"DEPARTAMENTO DE ENSEÑANZA",
"DEPARTAMENTO DE INVESTIGACIÓN",
"DEPARTAMENTO DE EXTENSIÓN Y VINCULACIÓN",
"SUBDIRECCIÓN GENERAL DE ENSAÑANZA E INVESTIGACIÓN",
"Domicilio",
"Teléfono",
"Correo electrónico",
"Titular",
),

"investigationNormative" => array(
"title"=>"Normatividad de Investigaciòn",
"desc"=>"El OPD Hospital Civil de Guadalajara cuenta con un marco normativo con el cual se rigen todos sus integrantes. En este espacio usted podrá consultar las normas más recientes.",
"NULL",
"OPD HCG",
),

"registerReniecyt" => array(
"title"=>"Registro RENIECYT",
"desc"=>"El Organismo Público Descentralizado Hospital Civil de Guadalajara es el hospital- escuela de la Universidad de Guadalajara que forma el mayor número de médicos especialistas en México, un promedio de 220 especialistas por año.",
"NULL",
"OPD HCG",
"Investigación",
"Regulación de los Procesos de la Investigación",
"Gestión de Recursos para la Investigación",
"Generación de Conocimiento Científico",
"Aplicación de Conocimiento Científico para la Innovación",
"INNOVACIÓN"
),

"displayTransparencia" => array(
"title"=>"Transparencia",
"desc"=>"El Organismo Público Descentralizado Hospital Civil de Guadalajara, con domicilio ubicado en el número 278 doscientos setenta y ocho de la calle Hospital, en la Colonia el Retiro, en Guadalajara, Jalisco.",
"NULL",
"OPD HCG",
"Organismo Público Descentralizado Hospital Civil de Guadalajara",
"AVISO DE PRIVACIDAD",
"PROTECCIÓN DE DATOS PERSONALES",
"Acceso a la Información Pública del Estado de Jalisco",
),
/*
"hospitalUnitJimEthicsCommittee" => array(
"title"=>"Comites",
"desc"=>"El OPD Hospital Civil de Guadalajara cuenta con comités científicos con el cual se rigen todos sus integrantes. En este espacio usted podrá consultar los miembros de estos comités científicos más recientes”,
"NULL",
"OPD HCG",
), */

"locationMapOfOfficeSGEIOPD" => array(
"title"=>"Plano de Ubicación.",
"desc"=>"Plano de Ubicación.",
"NULL",
"OPD HCG",
"MAPA",
"OFICINAS",
),

"CVEHC" => array(
"title"=>"Curriculum vitae de investigadores",
"desc"=>"Lista de los investigadores que laboran con proyectos para el hospital civil de guadalajara",
"CVE-HC",
"CURRICULUM VITAE",
"INVESTIGADORES",
),




"displayInvestigationLines" => array(
        "title"=>"Lineas de Investigación",
        "desc"=>"OPD HCG: LÍNEAS DE INVESTIGACIÓN (vs. 26 enero 2015)",
        "Centro de Investigación Clínica",
        "NULL",
        "OPD HCG",
        "LINEAS DE INVESTIGACIÓN", 
        "Especialidad",
        "Anestesiología",
        "Nuevos fármacos anestésicos",
        "Anestesiología",
        "Cirugía General",
        "Manejo farmacológico de sepsis abdominal post-cirugía",
        "Epidemiologia",
        "Infecciones nosocomiales",
        "Ginecología y Obstetricia",
        "Trabajo de Parto Espontaneo",
        "Medicina de Rehabilitación",
        "Dispositivos medicos en rehabilitación",
        "Medicina Interna",
        "Enfermedad Pulmonar Obstructiva Crónica y Asma",
        "Oftalmología",
        "Glaucoma, Enf. Retina, Enfermedades metabolicas",
        "Ortopedia",
        "Manejo de fracturas cerradas y expuestas, terapeutica en hernia de disco",
        "Otorrinolaringología y Cirugía de Cabeza y Cuello",
        "Dispositivos medicos en cirugia de columna",
        "Pediatría Médica",
        "Epilepsia en niños",
        "Psiquiatría",
        "Terapeutica en enfermedades psiquiatricas de la infancia, adolescencia y adultos",
        "Radiología e Imagen",
        "paEstudios no invasivos de fibrosis hepaticapa",
        "Radioncología",
        "Terapeutica en cancer solido",
        "Urgencias Médico Quirúrgicas",
        "Terapeutica en enfermedades coronarias agudas",
        "Alergia e Inmunología Clínica",
        "Terapeutica en padecimientos alergicos",
        "Anestesiología Pediátrica",
        "Terapeutica en alergias",
        "Angiología y Cirugía Vascular",
        "Dispositivos medicos en enfermedes vasculares",
        "Cardiología",
        "Cardiopatía Isquémica, Nuevos medicamentos anticoagulantes, Infarto Agudo al Miocardio",
        "Cirugía Cardiotorácica",
        "Dispositivos médicos en enfermedades de torax",
        "Cirugía Laparoscópica",
        "Nuevas tecnicas en cirugia laparoscopica",
        "Cirugía Oncológica",
        "Enfermedades neoplásicas, Cáncer de Pulmón y Cáncer de Próstata",
        "Cirugía Plástica y Reconstructiva",
        "Cultivo de piel para implantes en quemados",
        "Dermatología",
        "Terapeutica biologica en enfemedades cutaneas cronicas",
        "Dermatología Pediátrica",
        "Enfermedades autoinmunes con manifestaciones cutaneas",
        "Endocrinología",
        "Terapuetica en diabetes mellitus, Dislipidemia",
        "Gastroenterología",
        "Terapeutica en enfermadad crónica inflamatoria",
        "Gastroenterología y Nutrición Pediátrica",
        "Anemia ferropenica",
        "Geriatría",
        "Terapeutica del Sindrome de fraglidad del anciano, desnutrición",
        "Hematología",
        "Sindromes mieloproliferativos, Leucemias, Linfomas",
        "Hemato-Oncología Pediátrica",
        "Cateter Venoso Central compuesto, Cancer de  Estroma Gastrointestinal",
        "Infectología",
        "Nuevos esquemas terapéuticos en Infección por el VIH/SIDA, Infeccion de tejidos Blandos, Neumonia hospitalaria, tratamiento de  Hepatitis B y C, Tuberculosis, Infecciones bacterianas agudas de piel",
        "Infectología Pediátrica",
        "Enfemedades virales y bacterianas pulmonares y gastrointestinales; resistencia bateriana a antibioticos",
        "Medicina Materno Fetal",
        "Preclampsia-eclampsia, sindrome de prematurez",
        "Medicina del Enfermo en Estado Crítico",
        "Pielonefritis complicada, Neumonia Complicada, Tromboembolismo Venoso Sistemica",
        "Nefrología",
        "Enfermedad renal crónica, Transplante renal",
        "Neonatología",
        "Neurocirugía",
        "Enfermedad Vascular Cerebral y Epilepsia",
        "Oncología médica",
        "Nuevos Medicamentos en Cáncer de Pulmón, colon, higado, mama, cacu, prostata y  Melanoma",
        "Retina Médico Quirúrgica",
        "Retinopatia degenerativa",
        "Reumatología",
        "Enfermedades Inflamatorias Crónicas, Nuevos Medicamentos en Lupus Eritematoso Sistémico y Artritis Reumatoide",
        "Terapia Intensiva",
        "Terapeutica en infecciones urinarias, neumonia asociada a ventilador",
        "Urología",
        "Terapeutica en incontinencia masculina",
        "Urología Ginecológica",
        "Terapéutica en incontinencia femenina",
      ),

"sponsoredProjects" => array(
        "title"=>"Protocolos patrocinados por la industria Farmacéutica",
        "desc"=>"Lista de protocolos patrocinados por la industria Farmacéutica",
        "NULL",
        "Centro de Investigación Clínica",
        "proyectos",
        "patrocinio", 
        "protocolos",
      ),


"livingLabsSalud" => array(
        "title"=>"Living-labs",
        "desc"=>"Lista de protocolos patrocinados por la industria Farmacéutica",
        "NULL",
        "Centro de Investigación Clínica",
        "patrocinio", 
        "protocolos",
      ),


"finehc" => array(
        "title"=>"FinEHC",
        "desc"=>"Fondo para el Fomento de la Investigación Científica y Tecnológica del Hospital Civil de Guadalajara",
        "NULL",
        "finehc",
        "Fondo", 
        "Científica",
      ),
"informationOfGeneralSubdirectionOfEducationAndInvestigation" => array(
        "title"=>"Información De Subdirección General De Ensenanza e Investigación",
        "desc"=>"El Organismo Público Descentralizado Hospital Civil de Guadalajara es el hospital- escuela de la Universidad de Guadalajara que forma el mayor número de médicos especialistas en México, un promedio de 220 especialistas por año.",
        "NULL",
        "Misión Institucional",
        "Visión de futuro", 
        "Valores y principios que caracterizan nuestra institución",
        "Universalidad",
        "Calidad",
        "Humanismo",
        "Ética",
        "Eficacia y Eficiencia",
        "Transparencia y rendición de cuentas",
        "Artículo 4",
),
"subdirectionOfEducationAndInvestigation" => array(
        "title"=>"FAA: Subdirección de enseñanza e investigación.",
        "desc"=>"El Organismo Público Descentralizado Hospital Civil de Guadalajara es el hospital- escuela de la Universidad de Guadalajara que forma el mayor númer o de médicos especialistas en México, un promedio de 220 especialistas por año. ",
        "NULL",
        "HCG Fray Antonio Alcalde",
        "Misión Institucional",
        "Visión de futuro",
        "Universalidad",
        "Calidad",
        "Humanismo",
        "Eficacia y Eficiencia",
        "Transparencia y rendición de cuentas",
      ),
      "hospitalaUnitJIMSubdirectionOfEducationAndInvestigation" => array(
        "title"=>"JIM Subdireccion de Enseñanza e Investigación",
        "desc"=>"El 31 de marzo 1997 se aprueba la Ley de Creación d e OPD Hospital Civil de Guadalajara donde se define su conformación, facultades, atribuciones. Es un Or ganismo Público Descentralizado de la administració n pública estatal, con personalidad jurídica y patrim onio propios; conformado por dos Unidades Hospitala rias: Antiguo Hospital Civil de Guadalajara “Fray Antonio Alcalde”, Nuevo Hospital Civil de Guadalajara “Dr. Juan I. Menchaca.”",
        "NULL",
        "Los ejes temáticos para el desarrollo de la investi gación",
        "Regulación de los Procesos de la Investigación", 
        "Gestión de Recursos para la Investigación",
        "Generación de Conocimiento Científico",
        "Aplicación de Conocimiento Científico para la In novación",
      ),

      "scientificWriting" => array(
        "title"=>"Redacción Cientifica",
        "desc"=>"La generación de conocimiento es un bien en sí mismo: las sociedades más desarrolladas del mundo reconocen la importancia del conocimiento científico y dedican recursos humanos y financieros para impulsar esta actividad",
        "NULL",
        "Programas de generación de conocimiento",
        "TRC BÁSICO EN LÍNEA",
        "TRC BÁSICO, EN LÍNEA Y PRESENCIAL", 
        "TRC AVANZADO, EN LÍNEA PRESENCIAL",  
        "TRC AVANZADO, EN LÍNEA Y SEMIPRESENCIAL", 
      ),


      "generetionOfKnowledgeScientific" => array(
        "title"=>"Programas de generación de conocimiento / Lineas de Generación de Conocimiento Cientifico",
        "desc"=>"OPD HCG: LÍNEAS DE INVESTIGACIÓN (vs. 26 enero 2015)",
        "NULL",
        "Programas de generación de conocimiento",
        "Especialidad",
        "Línea de investigación", 
        "TRC AVANZADO, EN LÍNEA PRESENCIAL",  
        "TRC AVANZADO, EN LÍNEA Y SEMIPRESENCIAL", 
      ),
      
      "displayInformation" => array(
        "title"=>"Programas de cooperación internacional en investigación",
        "desc"=>"Existen Convenios firmados con 19 Universidades: (C EMIC Centro de Educación Médica e Investigaciones Clínicas “Norberto Quirno” CIMEQ Ce ntro de Investigaciones Médico Quirúrgicas, Facultad de Ciencias Médicas de la Universidad de S an Carlos de Guatemala, Hospital Vall d’Hebron- Universidad, Autónoma de Barcelona, IOGI Instituto de Otología García Ibáñez, del Barcelona Centre Medic, Junta de Beneficencia de Guayaquil",
        "NULL",
        "universidades",
        "convenios", 
      ),

   "ProDIME" => array(
    "title"=>"proDIME",
    "desc"=>"El OPD Hospital Civil de Guadalajara cuenta con un programa de difusión de los resultad os útiles de las investigaciones locales para su aplicación en medic ina con el cual se rigen todos sus integrantes.",
    "NULL",
    "OBJETIVO",
    "AUDIENCIA", 
    "FORMATO DE LA ENTREVISTA", 
    "CONTENIDO DE LA FICHA TÉCNICA INFORMATIVA",
    "CARACTERÍSTICAS DE UN MENSAJE PRINCIPAL",
    "ESTILO DE REDACCIÓN DE LA FICHA TÉCNICA INFORMATIVA",
    "CONTENIDO DE LA FICHA TÉCNICA INFORMATIVA",
    "TIP ́S PARA LA ENTREVISTA",
    "PROBLEMAS FRECUENTES EN EL ENTREVISTADO",
    "PROGRAMA DE DIFUSIÓN DE LOS RESULTADOS ÚTILES DE LAS INVESTIGACIONES LOCALES PARA SU APLICACIÓN EN MEDICINA: ProDiME",
    "Director OPD HCG",
    "Subdirector General de Enseñanza e Investigación OPD HCG",
    "Jefa de Departamento de investigación, SGEI OPD HCG",
    "Subdirectora de Enseñanza e Investigación, HCG FAA",
    "Subdirector de Enseñanza e Investigación, HCG JIM",
    "Jefe de Investigación, SEI HCG FAA",
    "Jefe de Investigación, SEI HCG JIM",
   ), 


   "DisplayProINVENHCi" => array(
    "title"=>"ProINVENHCi",
    "desc"=>"La comunidad científica de México produce anualment e alrededor de 10 mil artículos en revistas especializadas; el Organismo Público Descentralizad o Hospital Civil de Guadalajara (OPD HCG) se encuen tra entre las primeras 10 instituciones de salud por el número de publicaciones científicas (Foro Consulti vo Científico y Tecnológico AC, 2009)",
    "NULL",
    "OBJETIVO DEL proINVENCHCi",
    "DEFINICIONES", 
    "INVENTAR", 
    "INNOVAR",
    "INVENCIONES PROTEGIBLES",
    "PATENTE DE INVENCIÓN",
    "MODELO DE UTILIDAD",
    "DISEÑO INDUSTRIAL",
    "REQUISITOS DEL PATENTAMIENTO",
    "PROTECCIÓN INTERNACIONAL",
    "NO SON PATENTABLES",

),

   "ProgramsNoPNCP" => array(
    "title"=>"Programas NO PNCP",
    "desc"=>"Lista de Programas",
    "NULL",
    "Medicina Interna (PNPC)",
    "Pediatría Médica (PNPC)", 
    "Radiología e Imagen", 
    "PNPC Padrón Nacional de Posgrados de Calidad",
    "SUBESPECIAliDADES",
    "Hospital Civil Fray Antonio Alcalde",
    "Alergia e Inmunología Clínica",
    "Anestesiología Pediátrica",
    "Angiología y Cirugía Vascular",
    "Cardiología",
    "Cirugía Cardiotorácica",
    "Cirugía Oncológica",
    "Cirugía Pediátrica (PNPC)",
    "Cirugía Plástica y Reconstructiva",
    "Coloproctología (PNPC)",
    "Dermatología",
    "Dermatología Pediátrica",
    "Endocrinología",
    "Gastroenterología",
    "Hematología",
    "Hemodinamia y Cardiología Intervencionista",
    "Infectología",
    "Infectología Pediátrica (PNPC)",
    "Medicina del Enfermo en Estado Crítico (PNPC)",
    "Medicina de Rehabilitación",
    "Nefrología (PNPC)",
    "Neonatología (PNPC)",
    "Neurocirugía",
    "Oncología médica",
    "Retina Médico Quirúrgica (PNPC)",
    "Reumatología (PNPC)",
    "Urología",
    "Urología Ginecológica (PNPC)",
    "Hospital Civil Dr. Juan I. Menchaca",
    "Cirugía Laparoscópica (PNPC)",
    "Gastroenterología y Nutrición Pediátrica",
    "Hemato-Oncología Pediátrica",
    "Medicina Materno Fetal",
    "Neonatología",
    "Neurocirugía",
    "Reumatología (PNPC)",
    "PNPC Padrón Nacional de Posgrados de calidad",

),
   "ProgramsPNCP" => array(
    "title"=>"Programas PNCP",
    "desc"=>"Lista de Programas",
    "NULL",
    "Pediatría Médica (PNPC)",
       "Psiquiatría",
       "Radiología e Imagen",
       "Urgencias Médico Quirúrgicas",
       "Hospital Civil Dr. Juan I. Menchaca",
       "Anatomía Patológica",
       "Anestesiología",
       "Cirugía General",
       "Epidemiologia",
       "Genética Médica (PNPC)",
       "Ginecología y Obstetricia",
       "Medicina Interna (PNPC)",
       "Pediatría Médica (PNPC)",
       "Radiología e Imagen",
       "PNPC Padrón Nacional de Posgrados de Calidad",

),

   "EditUnit" => array(
    "title"=>"Programas de cooperación internacional en investigación",
    "desc"=>"Presentación 
Unidad Editorial, es una figura orgánica pertenecie nte al OPD Hospital Civil de Guadalajara.",
    "NULL",
    "Programas de cooperación internacional en investigación",
       
),



   "ProgramsPNCP" => array(
    "title"=>"Revistas Cientificas",
    "desc"=>"Publicaciones científicas
El principal vehículo de comunicación de la ciencia es el artículo científico original; es una obra de arte intelectual: el conocimiento científico nuevo que se origina a p artir del análisis e interpretación de los datos de una investigación en ciencias de la salud debe divulgar se.",
    "NULL",
    "Revistas Cientificas",
       "Publicaciones científicas",
       "Hipócrates Revista Médica",
       "Archivos en Pediatría",
       "Tracto Genital Inferior",

),

   "ProgramsPNCP" => array(
    "title"=>"Vinculacion Con Universidad Institutos Y Hospitales",
    "desc"=>"Vinculacion",
    "NULL",
    "Extensión y Vinculación",
    "Vinculacion Con Universidad Institutos Y Hospitales",
    "",

)
);
	}


	function search($value, $array)
	{
		$resultado = array();
	    
	    foreach($array as $index => $subarray)
			foreach($subarray as $subindex => $subvalue){
				if($subindex != "desc"){
				    	if(strpos(strtolower($subvalue), strtolower($value)) !== false){
				    		$resultado[$index] = array("title"=>$array[$index]["title"], "desc"=>$array[$index]["desc"]);
				    	//  echo"<pre>";
				    	//print_r($subvalue);
				    	//echo"</pre>";
				    		}
			    	}
			    }

	    

		return $resultado;
	}


}



?>