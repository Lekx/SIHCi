<?php
/* @var $this AddressesController */
/* @var $model Addresses */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
function state(){
	 country = $("#Addresses_country").val();
	 if(country == "Mexico"){

		 var comboState ="<span class='plain-select'><select id='Addresses_state' class='tooltipstered' name='Addresses[state]'>";
		 comboState+='<option>Seleccionar Estado</option>';
		 comboState+='<option value="Aguascalientes">Aguascalientes</option>';
		 comboState+='<option value="Baja California">Baja California</option>';
		 comboState+='<option value="Baja California Sur">Baja California Sur</option>';
		 comboState+='<option value="Campeche">Campeche</option>';
		 comboState+='<option value="Chiapas">Chiapas</option>';
		 comboState+='<option value="Chihuahua">Chihuahua</option>';
		 comboState+='<option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>';
		 comboState+='<option value="Colima">Colima</option>';
		 comboState+='<option value="Distrito Federal">Distrito Federal</option>';
		 comboState+='<option value="Durango">Durango</option>';
		 comboState+='<option value="Guanajuato">Guanajuato</option>';
		 comboState+='<option value="Guerrero">Guerrero</option>';
		 comboState+='<option value="Hidalgo">Hidalgo</option>';
		 comboState+='<option value="Jalisco">Jalisco</option>';
		 comboState+='<option value="Mexico">Mexico</option>';
		 comboState+='<option value="Michoacan de Ocampo">Michoacan de Ocampo</option>';
		 comboState+='<option value="Morelos">Morelos</option>';
		 comboState+='<option value="Nayarit">Nayarit</option>';
		 comboState+='<option value="Nuevo Leon">Nuevo Leon</option>';
	 	 comboState+='<option value="Oaxaca">Oaxaca</option>';
		 comboState+='<option value="Puebla">Puebla</option>';
		 comboState+='<option value="Queretaro de Arteaga">Queretaro de Arteaga</option>';
		 comboState+='<option value="Quintana Roo">Quintana Roo</option>';
		 comboState+='<option value="San Luis Potosi">San Luis Potosi</option>';
		 comboState+='<option value="Sinaloa">Sinaloa</option>';
		 comboState+='<option value="Sonora">Sonora</option>';
		 comboState+='<option value="Tabasco">Tabasco</option>';
		 comboState+='<option value="Tamaulipas">Tamaulipas</option>';
		 comboState+='<option value="Tlaxcala">Tlaxcala</option>';
		 comboState+='<option value="Veracruz-Llave">Veracruz-Llave</option>';
		 comboState+='<option value="Yucatan">Yucatan</option>';
		 comboState+='<option value="Zacatecas">Zacatecas</option>';

		 comboState+="</select></span>";
		 $("#Addresses_state").replaceWith(comboState);
	 }
}
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'addresses-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>


	<div class="row">
	 <span class="plain-select">
<?php echo $form->dropDownList($model,'country',array('AF' => "Afghanistan",
        'Albania' => "Albania",
        'Algeria' => "Algeria",
        'American Samoa' => "American Samoa",
        'AD' => "Andorra",
        'AO' => "Angola",
        'AI' => "Anguilla",
        'AQ' => "Antarctica",
        'AG' => "Antigua and Barbuda",
        'AR' => "Argentina",
        'AM' => "Armenia",
        'AW' => "Aruba",
        'AU' => "Australia",
        'AT' => "Austria",
        'AZ' => "Azerbaijan",
        'BS' => "Bahamas",
        'BH' => "Bahrain",
        'BD' => "Bangladesh",
        'BB' => "Barbados",
        'BY' => "Belarus",
        'BE' => "Belgium",
        'BZ' => "Belize",
        'BJ' => "Benin",
        'BM' => "Bermuda",
        'BT' => "Bhutan",
        'BO' => "Bolivia",
        'BA' => "Bosnia and Herzegowina",
        'BW' => "Botswana",
        'BV' => "Bouvet Island",
        'BR' => "Brazil",
        'IO' => "British Indian Ocean Territory",
        'BN' => "Brunei Darussalam",
        'BG' => "Bulgaria",
        'BF' => "Burkina Faso",
        'BI' => "Burundi",
        'KH' => "Cambodia",
        'CM' => "Cameroon",
        'CA' => "Canada",
        'CV' => "Cape Verde",
        'KY' => "Cayman Islands",
        'CF' => "Central African Republic",
        'TD' => "Chad",
        'CL' => "Chile",
        'CN' => "China",
        'CX' => "Christmas Island",
        'CC' => "Cocos (Keeling) Islands",
        'CO' => "Colombia",
        'KM' => "Comoros",
        'CG' => "Congo",
        'CD' => "Congo, the Democratic Republic of the",
        'CK' => "Cook Islands",
        'CR' => "Costa Rica",
        'CI' => "Cote d'Ivoire",
        'HR' => "Croatia (Hrvatska)",
        'CU' => "Cuba",
        'CY' => "Cyprus",
        'CZ' => "Czech Republic",
        'DK' => "Denmark",
        'DJ' => "Djibouti",
        'DM' => "Dominica",
        'DO' => "Dominican Republic",
        'TP' => "East Timor",
        'EC' => "Ecuador",
        'EG' => "Egypt",
        'SV' => "El Salvador",
        'GQ' => "Equatorial Guinea",
        'ER' => "Eritrea",
        'EE' => "Estonia",
        'ET' => "Ethiopia",
        'FK' => "Falkland Islands (Malvinas)",
        'FO' => "Faroe Islands",
        'FJ' => "Fiji",
        'FI' => "Finland",
        'FR' => "France",
        'FX' => "France, Metropolitan",
        'GF' => "French Guiana",
        'PF' => "French Polynesia",
        'TF' => "French Southern Territories",
        'GA' => "Gabon",
        'GM' => "Gambia",
        'GE' => "Georgia",
        'DE' => "Germany",
        'GH' => "Ghana",
        'GI' => "Gibraltar",
        'GR' => "Greece",
        'GL' => "Greenland",
        'GD' => "Grenada",
        'GP' => "Guadeloupe",
        'GU' => "Guam",
        'GT' => "Guatemala",
        'GN' => "Guinea",
        'GW' => "Guinea-Bissau",
        'GY' => "Guyana",
        'HT' => "Haiti",
        'HM' => "Heard and Mc Donald Islands",
        'VA' => "Holy See (Vatican City State)",
        'HN' => "Honduras",
        'HK' => "Hong Kong",
        'HU' => "Hungary",
        'IS' => "Iceland",
        'IN' => "India",
        'ID' => "Indonesia",
        'IR' => "Iran (Islamic Republic of)",
        'IQ' => "Iraq",
        'IE' => "Ireland",
        'IL' => "Israel",
        'IT' => "Italy",
        'JM' => "Jamaica",
        'JP' => "Japan",
        'JO' => "Jordan",
        'KZ' => "Kazakhstan",
        'KE' => "Kenya",
        'KI' => "Kiribati",
        'KP' => "Korea, Democratic People's Republic of",
        'KR' => "Korea, Republic of",
        'KW' => "Kuwait",
        'KG' => "Kyrgyzstan",
        'LA' => "Lao People's Democratic Republic",
        'LV' => "Latvia",
        'LB' => "Lebanon",
        'LS' => "Lesotho",
        'LR' => "Liberia",
        'LY' => "Libyan Arab Jamahiriya",
        'LI' => "Liechtenstein",
        'LT' => "Lithuania",
        'LU' => "Luxembourg",
        'MO' => "Macau",
        'MK' => "Macedonia, The Former Yugoslav Republic of",
        'MG' => "Madagascar",
        'MW' => "Malawi",
        'MY' => "Malaysia",
        'MV' => "Maldives",
        'ML' => "Mali",
        'MT' => "Malta",
        'MH' => "Marshall Islands",
        'MQ' => "Martinique",
        'MR' => "Mauritania",
        'MU' => "Mauritius",
        'YT' => "Mayotte",
        'Mexico' => "México",
        'FM' => "Micronesia, Federated States of",
        'MD' => "Moldova, Republic of",
        'MC' => "Monaco",
        'MN' => "Mongolia",
        'MS' => "Montserrat",
        'MA' => "Morocco",
        'MZ' => "Mozambique",
        'MM' => "Myanmar",
        'NA' => "Namibia",
        'NR' => "Nauru",
        'NP' => "Nepal",
        'NL' => "Netherlands",
        'AN' => "Netherlands Antilles",
        'NC' => "New Caledonia",
        'NZ' => "New Zealand",
        'NI' => "Nicaragua",
        'NE' => "Niger",
        'NG' => "Nigeria",
        'NU' => "Niue",
        'NF' => "Norfolk Island",
        'MP' => "Northern Mariana Islands",
        'NO' => "Norway",
        'OM' => "Oman",
        'PK' => "Pakistan",
        'PW' => "Palau",
        'PA' => "Panama",
        'PG' => "Papua New Guinea",
        'PY' => "Paraguay",
        'PE' => "Peru",
        'PH' => "Philippines",
        'PN' => "Pitcairn",
        'PL' => "Poland",
        'PT' => "Portugal",
        'PR' => "Puerto Rico",
        'QA' => "Qatar",
        'RE' => "Reunion",
        'RO' => "Romania",
        'RU' => "Russian Federation",
        'RW' => "Rwanda",
        'KN' => "Saint Kitts and Nevis",
        'LC' => "Saint LUCIA",
        'VC' => "Saint Vincent and the Grenadines",
        'WS' => "Samoa",
        'SM' => "San Marino",
        'ST' => "Sao Tome and Principe",
        'SA' => "Saudi Arabia",
        'SN' => "Senegal",
        'SC' => "Seychelles",
        'SL' => "Sierra Leone",
        'SG' => "Singapore",
        'SK' => "Slovakia (Slovak Republic)",
        'SI' => "Slovenia",
        'SB' => "Solomon Islands",
        'SO' => "Somalia",
        'ZA' => "South Africa",
        'GS' => "South Georgia and the South Sandwich Islands",
        'ES' => "Spain",
        'LK' => "Sri Lanka",
        'SH' => "St. Helena",
        'PM' => "St. Pierre and Miquelon",
        'SD' => "Sudan",
        'SR' => "Suriname",
        'SJ' => "Svalbard and Jan Mayen Islands",
        'SZ' => "Swaziland",
        'SE' => "Sweden",
        'CH' => "Switzerland",
        'SY' => "Syrian Arab Republic",
        'TW' => "Taiwan, Province of China",
        'TJ' => "Tajikistan",
        'TZ' => "Tanzania, United Republic of",
        'TH' => "Thailand",
        'TG' => "Togo",
        'TK' => "Tokelau",
        'TO' => "Tonga",
        'TT' => "Trinidad and Tobago",
        'TN' => "Tunisia",
        'TR' => "Turkey",
        'TM' => "Turkmenistan",
        'TC' => "Turks and Caicos Islands",
        'TV' => "Tuvalu",
        'UG' => "Uganda",
        'UA' => "Ukraine",
        'AE' => "United Arab Emirates",
        'GB' => "United Kingdom",
        'US' => "United States",
        'UM' => "United States Minor Outlying Islands",
        'UY' => "Uruguay",
        'UZ' => "Uzbekistan",
        'VU' => "Vanuatu",
        'VE' => "Venezuela",
        'VN' => "Viet Nam",
        'VG' => "Virgin Islands (British)",
        'VI' => "Virgin Islands (U.S.)",
        'WF' => "Wallis and Futuna Islands",
        'EH' => "Western Sahara",
        'YE' => "Yemen",
        'Yugoslavia' => "Yugoslavia",
        'Zambia' => "Zambia",
        'Zimbabwe' => "Zimbabwe"),
        array('prompt'=>'Seleccionar País','title'=>'País', 'onchange'=>'state()',));?>
          </span>
           <?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row" id="state">
		<?php
		if($model->country == "Mexico"){
		echo	'<span class="plain-select">';
			echo $form->dropDownList($model,'state',
											array("Aguascalientes",
														"Baja California Sur"=>"Baja California Sur",
														"Baja California"=>"Baja California",
														"Campeche"=>"Campeche",
														"Chiapas"=>"Chiapas",
														"Chihuahua"=>"Chihuahua",
														"Coahuila de Zaragoza"=>"Coahuila de Zaragoza",
														"Colima"=>"Colima",
														"Distrito Federal"=>"Distrito Federal",
														"Durango"=>"Durango",
														"Guanajuato"=>"Guanajuato",
														"Guerrero"=>"Guerrero",
														"Hidalgo"=>"Hidalgo",
														"Jalisco"=>"Jalisco",
														"Mexico"=>"Mexico",
														"Michoacan de Ocampo"=>"Michoacan de Ocampo",
														"Morelos"=>"Morelos",
														"Nayarit"=>"Nayarit",
														"Nuevo Leon"=>"Nuevo Leon",
														"Oaxaca"=>"Oaxaca",
														"Puebla"=>"Puebla",
														"Queretaro de Arteaga"=>"Queretaro de Arteaga",
														"Quintana Roo"=>"Quintana Roo",
														"San Luis Potosi"=>"San Luis Potosi",
														"Sinaloa"=>"Sinaloa",
														"Sonora"=>"Sonora",
														"Tabasco"=>"Tabasco",
														"Tamaulipas"=>"Tamaulipas",
														"Tlaxcala"=>"Tlaxcala",
														"Veracruz-Llave"=>"Veracruz",
														"Yucatan"=>"Yucatan",
														"Zacatecas"=>"Zacatecas"),
			        array('prompt'=>'Seleccionar Estado','title'=>'Estado',));
						echo	'</span>';
		}else{
			echo $form->textField($model,'state',array('title'=>'Estado','placeholder'=>'Estado'));
	  	echo $form->error($model,'state');
	  }
		?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'delegation',array('title'=>'Delegación','size'=>30,'maxlength'=>30, 'placeholder'=>'Delegación')); ?>
		<?php echo $form->error($model,'delegation'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'city',array('title'=>'Ciudad','size'=>50,'maxlength'=>50, 'placeholder'=>'Ciudad')); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'town',array('title'=>'Municipio','size'=>30,'maxlength'=>30, 'placeholder'=>'Municipio')); ?>
		<?php echo $form->error($model,'town'); ?>
	</div>

    <div class="row">

        <?php echo $form->textField($model,'zip_code',array('title'=>'Codigo Postal','class'=>'numericOnly', 'placeholder'=>'Código Postal')); ?>
        <?php echo $form->error($model,'zip_code'); ?>
    </div>

	<div class="row">
		<?php echo $form->textField($model,'colony',array('title'=>'Colonia','size'=>45,'maxlength'=>45, 'placeholder'=>'Colonia')); ?>
		<?php echo $form->error($model,'colony'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'street',array('title'=>'Calle','size'=>50,'maxlength'=>50, 'placeholder'=>'Calle')); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'external_number',array( 'title'=>'Numero Externo','size'=>8,'maxlength'=>8, 'placeholder'=>'Número Externo')); ?>
		<?php echo $form->error($model,'external_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'internal_number',array( 'title'=>'Número Interior','size'=>8,'maxlength'=>8, 'placeholder'=>'Número Interior')); ?>
		<?php echo $form->error($model,'internal_number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::htmlButton('Guardar',array(
							 'onclick'=>'send("addresses-form", "curriculumVitae/addresses", "'.$model->id.'","curriculumVitae/addresses","");',
								//'id'=> 'post-submit-btn',
							 'class'=>'savebutton',
					 ));
			?>
		<?php echo CHtml::link('Cancelar',array('curriculumVitae/addresses'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
		</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
