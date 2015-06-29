<?php
/* @var $this AddressesController */
/* @var $model Addresses */
/* @var $form CActiveForm */
?>

<div class="form">
<script type="text/javascript">
	function showState(){
		 var state = $("#country option:selected").val();
		 if(state == "Mexico"){
		 	alert('asa');
		 }
		 var newDiscipline ="<span class='plain-select'><select id='BooksChapters_discipline' class='tooltipstered' name='BooksChapters[discipline]' onchange='changeDiscipline()'>";
    newDiscipline+="<option>Seleccionar Disciplina</option>";
    for (var item in areaValue) {
        newDiscipline +="<option>"+areaValue[ item ]+"</option>";
    }

    newDiscipline+="</select></span>";

    $("#state").html(newDiscipline);
	}
</script>
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
        array('prompt'=>'Seleccionar País','title'=>'País', 'id'=>'contry', 'onchange'=>'showState()'));?>         
          </span>
           <?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'zip_code',array('title'=>'Codigo Postal','placeholder'=>'Código Postal')); ?>
		<?php echo $form->error($model,'zip_code'); ?>
	</div>

	<div class="row" id="state">
		
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
			<?php echo CHtml::ajaxButton ('Guardar',CController::createUrl('curriculumVitae/addresses'), 
				array(
					'dataType'=>'json',
             		'type'=>'post',
             		'class'=>'savebutton',
             		'success'=>'function(data) 
             		 {
                                      
                         if(data.status=="200")
                         {
		                     $(".successdiv").show();
		                    
                         }		                         
                         else
                         {
	                     	  $(".errordiv").show(); 
	                     }       
                  	}',                    
                ), array('class'=>'savebutton'));  
		?>
		
		<?php echo CHtml::Button('Cancelar',array('submit' => array('curriculumVitae/index'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
		</div>

<?php $this->endWidget(); ?>

</div><!-- form -->