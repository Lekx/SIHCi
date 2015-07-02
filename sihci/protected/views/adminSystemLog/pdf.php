<?php

$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');

 $dataProvider=$_SESSION['filteredData']->getData();

 $count=count($dataProvider);

$html2="";
 $html='
		<h2 align="center">SIHCi</h2>   	
 		<h3 align="center"> Sistema de Investigación del Hospitál Civil de Guadalajara </h3> 
		<h4 align="center"> Bitácora. Fecha: '.date('d/m/Y').' </h4> 
 <pre><h4>		Total Resultados: '.$count.' </h4></pre>
	<style>
		table {     
			font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    		font-size: 12px; 
    		text-align: left;    
    		border-collapse: collapse; 
    		}

		th {     
			font-size: 13px;     
			font-weight: normal;    
			padding: 8px;     
			background: #0E3152;
   			border-top: 4px solid #aabcfe;    
   			border-bottom: 1px solid #fff; 
   			color: #E6E7E8; 
   			}

		td {    
			padding: 8px;     
			background: #FFFFFF;     
			border-bottom: 1px solid #fff;
   			color: #798B9D;    
    		border-top: 1px solid transparent; 
    		}

		tr:hover td { 
			background: #d0dafd; 
			color: #339; 
		}
	</style>
		 <table align="center"> 
			 <tr>
				 <th>Número de Movimiento</th>
				 <th>Número de Usuario</th>
				 <th>Sección</th>
				 <th>Detalles</th>
				 <th>Acción</th>
				 <th>Fecha</th>
			 </tr>';
 			$i=0;
 			$val=count($dataProvider);
 			while($i<$val){
 			$html2=$html2.'
			 <tr >
				 <td>'.$dataProvider[$i]["id"].'</td>
				 <td>'.$dataProvider[$i]["id_user"].'</td>
				 <td>'.$dataProvider[$i]["section"].'</td>
				 <td>'.$dataProvider[$i]["details"].'</td>
				 <td>'.$dataProvider[$i]["action"].'</td>
				 <td>'.$dataProvider[$i]["datetime"].'</td>
			 </tr>'; $i++;
 			}

 	$html3='</table>';

 	$mpdf=new mPDF('win-1252','LETTER-L','','',9,9,24,10,5,5);
 	$mpdf->WriteHTML($html.$html2.$html3);
 	$mpdf->Output('Bitacora_'.date('Y/m/d').'.pdf','D');
 	
 exit; ?>