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
					'2015'=>'2015','2016'=>'2016','2017'=>'2017','2018'=>'2018',
          '2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022',
          '2023'=>'2023','2024'=>'2024','2025'=>'2025','2026'=>'2026',
          '2027'=>'2027','2028'=>'2028','2029'=>'2029','2030'=>'2030'),array('title'=>'Año de publicación'));
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
		<?php echo $form->error($model,'article_type'); ?>
    </span>
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
      if(!$model->isNewRecord)
      {
      
        echo '<div class="row" id="comboDiscipline" >';
        echo '<span class="plain-select">';
        echo $form->dropDownList($model,'discipline',array($model->discipline => $model->discipline),array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
        echo '</span>';
        echo '</div>';

        echo '<div class="row"id="comboSubdiscipline">';
        echo '<span class="plain-select">';
        echo $form->dropDownList($model,'subdiscipline',array($model->subdiscipline => $model->subdiscipline),array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
        echo '</span>';

        echo '</div>';

      }
      else
      {
        echo '<div class="row"id="comboDiscipline">
              </div>
              <div class="row"id="comboSubdiscipline">
              </div>';
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
          echo $form->fileField($model,'url_document',array('size'=>60,'maxlength'=>100,'title'=>'archivo del articulo o guía'));
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
