<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */
/* @var $form CActiveForm */
?>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/protected/views/booksChapters/js/script.js"></script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'books-chapters-form',
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
  'enableAjaxValidation'=>true,
  'enableClientValidation'=>true,
  'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <div class="row">
        <?php echo $form->textField($model,'isbn',array('size'=>13,'maxlength'=>13,'placeholder'=>'ISBN','class' => 'numericOnly','id'=>'limite','title'=>'ISBN. (Solo se aceptan numeros)')); ?>
        <?php echo $form->error($model,'isbn'); ?>
    </div>

  <div class="row">

    <?php echo $form->textField($model,'chapter_title',array('size'=>60,'maxlength'=>100, 'placeholder'=>'Capítulo de libro','title'=>'Capítulo de libro')); ?>
    <?php echo $form->error($model,'chapter_title'); ?>
  </div>

  <div class="row">

    <?php echo $form->textField($model,'book_title',array('size'=>60,'maxlength'=>100, 'placeholder'=>'Titulo de libro','title'=>'Titulo de libro')); ?>
    <?php echo $form->error($model,'book_title'); ?>
  </div>

  <div class="row">
    <span class="plain-select">
    <?php echo $form->dropDownList($model,'publishing_year',array(
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
          '2015'=>'2015'),array('title'=>'Año de publicación','prompt'=>'Seleccionar año de publicación'));?>
</span>
    <?php echo $form->error($model,'publishing_year'); ?>
  </div>

  <div class="row">
    <?php echo $form->textField($model,'publishers',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Editores','title'=>'Editores')); ?>
    <?php echo $form->error($model,'publishers'); ?>
  </div>

  <div class="row">
    <?php echo $form->textField($model,'editorial',array('size'=>45,'maxlength'=>45, 'placeholder'=>'Editorial','title'=>'Editorial')); ?>
    <?php echo $form->error($model,'editorial'); ?>
  </div>

  <div class="row">

    <?php echo $form->textField($model,'volume',array('size'=>5,'maxlength'=>5, 'placeholder'=>'No. volumen','class' => 'numericOnly','title'=>'No. volumen. (Solo se aceptan numeros)')); ?>
    <?php echo $form->error($model,'volume'); ?>
  </div>

  <div class="row">

    <?php echo $form->textField($model,'pages',array('size'=>10,'maxlength'=>10,'placeholder'=>'No. páginas','class' => 'numericOnly','title'=>'No. páginas. (Solo se aceptan numeros)')); ?>
    <?php echo $form->error($model,'pages'); ?>
  </div>

  <div class="row">
    <?php echo $form->textField($model,'citations',array('size'=>10,'maxlength'=>10,'placeholder'=>'No. citas','class' => 'numericOnly','title'=>'No. citas. (Solo se aceptan numeros)')); ?>
    <?php echo $form->error($model,'citations'); ?>
  </div>

   <div class="row">
        <?php echo $form->textField($model,'total_of_authors',array('size'=>5,'maxlength'=>5,'placeholder'=>'Total de autores','class' => 'numericOnly','title'=>'Total de autores. (Solo se aceptan numeros)')); ?>
        <?php echo $form->error($model,'total_of_authors'); ?>
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
                              'QUIMICA'=>'QUIMICA', 'SOCIOLOGIA'=>'SOCIOLOGIA'),array('prompt'=>'Seleccionar área','title'=>'Área', 'id'=>'area', 'onchange'=>'changeArea()'));?>
    </span>
    <?php echo $form->error($model,'area'); ?>
  </div>

  <?php
  if(!$model->isNewRecord){

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
  else{
    echo '<div class="row"id="comboDiscipline">';

    echo '</div>';
    echo '<div class="row"id="comboSubdiscipline">';

    echo '</div>';
  }
  ?>
   <div class="row">

        <?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>250, 'placeholder'=>'Palabras claves','title'=>'Palabras Claves')); ?>
        <?php echo $form->error($model,'keywords'); ?>
    </div>

  <div class="row">

    <?php 
      if(!$model->isNewRecord){
        echo $form->fileField($model,'url_doc',array('size'=>60,'maxlength'=>100,'title'=>'Documento / capítulo de libros')); 
        echo $model->url_doc != null ? "<a href='".Yii::app()->request->baseUrl."/".$model->url_doc."' target='_blank'><img src='".Yii::app()->request->baseUrl."/img/Acciones/desplegar.png'></a>" : "";
        echo $form->error($model,'url_doc');
      }else{
           echo $form->fileField($model,'url_doc',array('size'=>60,'maxlength'=>100,'title'=>'Documento / capítulo de libros'));
           echo $form->error($model,'url_doc'); 
      }
    ?>
  </div>

  <?php
      $this->widget('ext.widgets.reCopy.ReCopyWidget', array(
      'targetClass'=>'authorsRegistry',
      'addButtonLabel'=>'Agregar nuevo autor',
     ));
      ?>
      <div class="authorsRegistry">

      <?php
          echo"<input type='hidden' name='idsBooksChapters[]'>";
       ?>
    <div class="row">
      <?php echo $form->textField($modelAuthor,'names',array('name'=>'names[]','size'=>30,'maxlength'=>30, 'placeholder'=>'Nombre(s)','title'=>'Nombres(s)','onKeyPress'=>'return lettersOnly(event)')); ?>
      <?php echo $form->error($modelAuthor,'names');?>
    </div>

    <div class="row">
      <?php echo $form->textField($modelAuthor,'last_name1',array('name'=>'last_names1[]','size'=>20,'maxlength'=>20, 'placeholder'=>'Apellido Paterno','title'=>'Apllido Paterno','onKeyPress'=>'return lettersOnly(event)')); ?>
      <?php echo $form->error($modelAuthor,'last_name1'); ?>
    </div>

    <div class="row">

      <?php echo $form->textField($modelAuthor,'last_name2',array('name'=>'last_names2[]','size'=>20,'maxlength'=>20,'placeholder'=>'Apellido Materno','title'=>'Apellido Materno','onKeyPress'=>'return lettersOnly(event)')); ?>
      <?php echo $form->error($modelAuthor,'last_name2'); ?>
    </div>

    <div class="row">

      <?php echo $form->textField($modelAuthor,'position',array('name'=>'positions[]','class' => 'numericOnly','placeholder'=>'Posición','title'=>'Posición. (Solo se aceptan numeros)')); ?>
      <?php echo $form->error($modelAuthor,'position'); ?>
      </div>
      </div>

      <?php
      if(!$model->isNewRecord)
      foreach ($modelAuthors as $key => $value) {
        ?>

      <?php
          echo"<input type='hidden' value='".$value->id."' name='idsBooksChapters[]'>";
         ?>
    <div class="row">
      <?php echo $form->textField($value,'names',array('name'=>'names[]','value'=>$value->names,'size'=>30,'maxlength'=>30, 'placeholder'=>'Nombre(s)','title'=>'Nombres(s)','onKeyPress'=>'return lettersOnly(event)')); ?>
      <?php echo $form->error($value,'names');?>
    </div>

    <div class="row">
      <?php echo $form->textField($value,'last_name1',array('name'=>'last_names1[]','value'=>$value->last_name1,'size'=>20,'maxlength'=>20, 'placeholder'=>'Apellido Paterno','title'=>'Apellido Paterno','onKeyPress'=>'return lettersOnly(event)')); ?>
      <?php echo $form->error($value,'last_name1'); ?>
    </div>

    <div class="row">

      <?php echo $form->textField($value,'last_name2',array('name'=>'last_names2[]','value'=>$value->last_name2,'size'=>20,'maxlength'=>20,'placeholder'=>'Apellido Materno','title'=>'Apellido Materno','onKeyPress'=>'return lettersOnly(event)')); ?>
      <?php echo $form->error($value,'last_name2'); ?>
    </div>

     <div class="row">
      <?php echo $form->textField($value,'position',array('name'=>'positions[]','value'=>$value->position,'class' => 'numericOnly','placeholder'=>'Posición','title'=>'Posición. (Solo se aceptan numeros)')); ?>
      <?php echo $form->error($value,'position');
    ?>
  </div>
   <?php echo CHtml::button('Elminar',array('submit' => array('booksChapters/deleteAuthor','id'=>$modelAuthors[$key]->id,'idBooksChapters'=>$model->id),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething')); ?>
  <hr>
    <?php } ?>

  </div>

  <div class="row buttons">

    <?php echo CHtml::htmlButton($model->isNewRecord ? 'Guardar' : 'Modificar',array(
                'onclick'=>'send("books-chapters-form", "booksChapters/'.($model->isNewRecord ? 'create' : 'update').'", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","booksChapters/admin","");',
                 //'id'=> 'post-submit-btn',
                'class'=>'savebutton',
            ));
    ?>
    <?php echo CHtml::link('Cancelar',array('booksChapters/admin'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>


  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
