<?php
/* @var $this CongressesController */
/* @var $model Congresses */
/* @var $form CActiveForm */
?>
<!--PC01-Registrar datos  Participacion en congresos-->
<div class="form">



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'congresses-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
));

?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textField($model,'work_title',array('size'=>60,'maxlength'=>200, 'placeholder'=>'Puesto','title'=>'Puesto')); ?>
		<?php echo $form->error($model,'work_title'); ?>
	</div>

	<div class="row">
			<span class="plain-select">
		<?php echo $form->dropDownList($model,'year', array('promt'=>'Seleccionar año',
															'1930'=>'1930','1931'=>'1931',
															'1932'=>'1932','1933'=>'1933','1934'=>'1934','1935'=>'1935',
															'1936'=>'1936','1937'=>'1937','1938'=>'1938','1939'=>'1939',
															'1940'=>'1940','1941'=>'1941','1942'=>'1942','1943'=>'1943',
															'1944'=>'1944','1945'=>'1945','1946'=>'1946','1947'=>'1947',
															'1948'=>'1948','1949'=>'1949','1950'=>'1950','1951'=>'1951',
															'1952'=>'1952','1953'=>'1953','1954'=>'1954','1955'=>'1955',
															'1956'=>'1956','1957'=>'1957','1958'=>'1958','1959'=>'1959',
															'1960'=>'1960','1961'=>'1961','1962'=>'1962','1963'=>'1963',
															'1964'=>'1964','1965'=>'1965','1966'=>'1966','1967'=>'1967',
															'1968'=>'1968','1969'=>'1969','1970'=>'1970','1971'=>'1971',
															'1972'=>'1972','1973'=>'1973','1974'=>'1974','1975'=>'1975',
															'1976'=>'1976','1977'=>'1977','1978'=>'1978','1979'=>'1979',
															'1980'=>'1980','1981'=>'1981','1982'=>'1982','1983'=>'1983',
															'1984'=>'1984','1985'=>'1985','1986'=>'1986','1987'=>'1987',
															'1988'=>'1988','1989'=>'1989','1990'=>'1990','1991'=>'1992',
															'1993'=>'1993','1994'=>'1994','1995'=>'1995','1996'=>'1996',
															'1997'=>'1997','1998'=>'1998','1999'=>'1999','2000'=>'2000',
															'2001'=>'2001','2002'=>'2002','2003'=>'2003','2004'=>'2004',
															'2005'=>'2005','2006'=>'2006','2007'=>'2007','2008'=>'2008',
															'2009'=>'2009','2010'=>'2010','2011'=>'2011','2012'=>'2012',
															'2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016',
															'2017'=>'2017','2017'=>'2017','2018'=>'2018','2019'=>'2020',
															'2021'=>'2021','2022'=>'2022','2023'=>'2023','2024'=>'2024',
															'2025'=>'2025','2026'=>'2026','2027'=>'2027','2028'=>'2028',
															'2029'=>'2029','2030'=>'2030','2030'=>'2031','2031'=>'2031',
															'2032'=>'2032','2033'=>'2033','2034'=>'2034','2035'=>'2035',
															'2036'=>'2036','2037'=>'2037','2038'=>'2038','2039'=>'2039',
															'2040'=>'2040','2041'=>'2041','2042'=>'2042','2043'=>'2043',
															'2044'=>'2044','2045'=>'2045','2046'=>'2046','2047'=>'2047',
															'2048'=>'2048','2049'=>'2049','2050'=>'2050'

															),array('title'=>'Año')); ?>
															</span>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">

		<?php echo $form->textField($model,'congress',array('size'=>60,'maxlength'=>200, 'placeholder'=>'Congreso','title'=>'Congreso')); ?>
		<?php echo $form->error($model,'congress'); ?>
	</div>

	<div class="row">
         <!-- <?php /*
                $status = array('Nacional' => 'Nacional','Internacional'=>'Internacional');
                echo $form-> RadioButtonList($model,'type' ,$status, array ('separador' => ''));?>
         <?php echo $form->error($model,'type'); */ ?> -->

	</div>

	<div class="row">
			<span class="plain-select">
		<?php
			$this->widget('ext.CountrySelectorWidget',
				array(
				    'value' => $model->country,
				    'name' => Chtml::activeName($model, 'country'),
				    'id' => Chtml::activeId($model, 'country'),
				    'useCountryCode' => false,
				    'defaultValue' => 'Mexico',
				    'firstEmpty' => false,
			    )
			);
		?>
		</span>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
			<span class="plain-select">
        <?php echo $form->dropDownList($model,'work_type',array('promt'=>'Seleccionar tipo de trabajo','Conferencia Magistral'=>'Conferencia Magistral','Articulo in Extenso'=>'Articulo in Extenso','Ponencia'=>'Ponencia','Poster'=>'Poster'),array('title'=>'Tipo Trabajo'));?>
        </span>
        <?php echo $form->error($model,'work_type'); ?>

	</div>

	<div class="row">

		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>250,'placeholder'=>'Palabras Clave','title'=>'Palabras Clave')); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row buttons">
	    <?php echo CHtml::ajaxButton ($model->isNewRecord ? 'Guardar' : 'Modificar',CController::createUrl('congresses/'.($model->isNewRecord ? 'create' : 'update/'.$model->id)),
        				array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data)
                     		 {

		                         if(data.status=="success")
		                         {

									$(".successdiv").show();
		                         }
		                         else
		                         {
			                     	 $(".errordiv").show();
			                     }
		                  	}',

                        ),array('class'=>'savebutton'));
        ?>
		<?php echo CHtml::Button('Cancelar',array('submit' => array('congresses/admin'),'confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>



		<div class="200">

		</div>

		<div class="404">
		</div>

	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
