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
			$result.= "No se encontraron resultados para su busqueda:<b> \"".$keyword."\"</b>";
		else
			$result.=  "El resultado de la busqueda para <b>\"".$keyword."\"</b> fue:";
			
		foreach($results as $index => $subarray)
			$result.= "<div class='resultbars'> <div class='resul'><h5><a href='http://localhost/SIHCi/sihci/index.php/".$index."'>".$subarray["title"]."</a></h5>"."<a href='http://localhost/SIHCi/sihci/index.php/".$index."'>".$subarray["desc"]."</a> </div></div> ";
		
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
			"informacionDeDireccionGeneral" => array(
				"title"=>"Informacion de direccion general",
				"desc"=>"Descripcion breve",
				"NULL",
				"Quienes somos",
				"Qué es el Hospital Civil de Guadalajara", 
				"Principales objetivos ", 
				"Líneas estratégicas ",
				"Ideología Institucional",
				"Misión",
				"Visión",
				"Valores",
				"PLAN INSTITUCIONAL",
			),"desplegarLineasDeInvestigacion" => array(
				"title"=>"Lineas de Investigacion",
				"desc"=>"Descripcion breve",
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
			),"desplegarProINVENHCi" => array(
				"title"=>"proINVENHCi",
				"desc"=>"Descripcion breve",
				"NULL",
				"Quienes somos",
				"PROGRAMA DE DETECCIÓN DE INVENCIONES CLÍNICAS Y TECNOLÓGICAS PARA EL REGISTRO DE PATENTES DEL HOSPITAL CIVIL DE GUADALAJARA: proINVENHCi",
				"TODAS LAS PATENTES SON INVENCIONES,AUNQUE NO TODAS LAS INVENCIONES SON PATENTABLES", 
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
				""
			),"verdurotas" => array(
				"desc"=>"Descripcion breve",
				"NULL",
				"brocoli",
				"rabano", 
				"chayote",
				"papa"
			),"verdurononas" => array(
				"desc"=>"Descripcion breve",
				"NULL",
				"brocoli",
				"rabano", 
				"chayote",
				"papa"
			));
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