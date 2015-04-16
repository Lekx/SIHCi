<?php
	$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
 	$dataProvider=$_SESSION['filteredData']->getData();
 	$totalData=count($dataProvider);
	$counter=0; 
	$html2="";
	$html='
	<style>
			table {     
				font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	    		font-size: 12px; 
	    		width: 900px; 
	    		text-align: left;    
	    		border-collapse: collapse; 
	    		}

			th {     
				font-size: 13px;     
				font-weight: normal;     
				padding: 8px;     
				background: #103251;
	   			border-top: 4px solid #aabcfe;    
	   			border-bottom: 1px solid #fff; 
	   			color: #fff; 
	   			}

			td {    
				padding: 8px;     
				background: #e8edff;     
				border-bottom: 1px solid #fff;
	   			color: #1EB9C0;    
	    		border-top: 1px solid transparent; 
	    		}

			tr:hover td { 
				background: #d0dafd; 
				color: #339; 
			}
		</style>

			<h1 align="center">SIHCI</h1>   	
	 		<h3 align="center"> Bitácora </h3> 

	 <pre><h4>		Total Resultados: '.$totalData.' </h4></pre>
	 		<table align="center"> 
				<tr>
					<th>Número de Acción</th>
					<th>Número de Usuario</th>
					<th>Detalles</th>
					<th>Sección</th>
					<th>Acción</th>
					<th>Fecha</th>
				</tr>';		
	 		while($counter<$totalData){
	 			
	 			$html2=$html2.'
				 <tr>
					<td>'.$dataProvider[$counter]["id"].'</td>
					<td>'.$dataProvider[$counter]["id_user"].'</td>
				 	<td>'.$dataProvider[$counter]["section"].'</td>
				 	<td>'.$dataProvider[$counter]["details"].'</td>
					<td>'.$dataProvider[$counter]["action"].'</td>
				 	<td>'.$dataProvider[$counter]["datetime"].'</td>
				 </tr>'; $counter++;
			}
 	$html3='</table>';

 	$mpdf=new mPDF('win-1252','LETTER-L','','',9,9,24,10,5,5);
 	$mpdf->WriteHTML($html.$html2.$html3);
 	$mpdf->Output('bitacora_'.date('Y/m/d').'.pdf','D');

 exit; ?>