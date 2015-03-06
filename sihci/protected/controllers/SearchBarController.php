<?php

class SearchBarController extends Controller
{

	public function actionIndex()
	{
		$this->layout = 'informativas';
		$this->render('index');
	}


	public function actionSearchResults($keyword)
	{
		$this->layout = 'informativas';

		$indice = $this->search($keyword, $this->tags());

		/*$results = array(
			"section"=>$indice, 	
			"keyword"=>$keyword,
			"desc"=> $this->tags()[$indice]["desc"]
				);*/

		$this->render('searchResults',array(
			'results'=>$indice
		));
	}


	public function tags(){
		return array (
			"informacionDeDireccionGeneral" => array(
				"desc"=>"Descripcion breve",
				"NULL",
				"Quienes somos",
				"Qué es el Hospital Civil de Guadalajara", 
				"Principales objetivos ", 
				"Líneas estratégicas ",
				"panocha"
			),
			"verduras" => array(
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
				    		array_push($resultado, $subvalue);
				    				    		    echo"<pre>";
				    	print_r($subvalue);
				    	echo"</pre>";
				    		}
			    	}
			    }

	    

		return $resultado;
	}


}



?>