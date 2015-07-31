<?php
/* @var $this DirectedThesisController */
/* @var $model DirectedThesis */
/* @var $form CActiveForm */
?>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/protected/views/directedThesis/js/script.js"></script>



<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'directed-thesis-form',
     // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>true,
    //'enableClientValidation'=>true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    //'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

    <div class="row">

        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250, 'placeholder'=>'Título','title'=>'Título')); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>

    <div class="row">
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'language'=> 'es',
            'attribute' => 'conclusion_date',
            'options' => array(
                        'changeMonth'=>false, //cambiar por Mes
                        'changeYear'=>false, //cambiar por Año
                            'maxDate' => 'now',
                ),
            'htmlOptions' => array(
                    'size' => '10',
                    'maxlength' => '10',
                    'readOnly'=>true,
                    'placeholder'=>" Seleccionar fecha de conclusión",
                    'title'=>'Fecha de Conclusión'
            ),
        ));
        ?>
        <?php echo $form->error($model,'conclusion_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->textField($model,'author',array('size'=>45,'maxlength'=>45, 'placeholder'=>'Autor','title'=>'Autor')); ?>
        <?php echo $form->error($model,'author'); ?>
    </div>

    <div class="row">

        <?php
    if(!$model->isNewRecord){
       echo $form->fileField($model,'path',array('size'=>60,'maxlength'=>100,'title'=>'archivo / tesis dirigida'));
       //echo $model->path != null ? "<a href='".Yii::app()->request->baseUrl."/".$model->path."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$model->path."' style='width:75px;height:auto;'></a>" : "";
       echo $model->path != null ? "<a href='".Yii::app()->request->baseUrl."/".$model->path."' target='_blank'><img src='".Yii::app()->request->baseUrl."/img/Acciones/desplegar.png'></a>" : "";
       echo $form->error($model,'path');
    }else{
       echo $form->fileField($model,'path',array('size'=>60,'maxlength'=>100,'title'=>'archivo / tesis dirigida'));
       echo $form->error($model,'path');
     }?>
    </div>

    <div class="row">
                <span class="plain-select">
        <?php echo $form->dropDownList($model,'grade',array('Licenciatura'=>'Licenciatura','
                                                                Maestria'=>'Maestria',
                                                                'Doctorado'=>'Doctorado',
                                                                'Especialidad'=>'Especialidad',
                                                                'Super especialidad'=>'Super especialidad'),array('prompt'=>'Seleccionar grado','title'=>'Grado')); ?>
        </span>
        <?php echo $form->error($model,'grade'); ?>
    </div>

    <div class="row">
   <span class="plain-select">
      <?php echo $form->dropDownList($model,'sector',
            array(
               'Centros privados de investigación'=>'Centros privados de investigación',
               'Centros públicos de investigación'=>'Centros públicos de investigación',
               'Consultoras'=>'Consultoras',
               'Gobierno federal descentralizado'=>'Gobierno federal descentralizado',
               'Gobierno federal desconcentrado'=>'Gobierno federal desconcentrado',
               'Gobierno municipal'=>'Gobierno municipal',
               'Instituciones del sector gobierno federal centralizado'=>' Instituciones del sector gobierno federal centralizado',
               'Instituciones del sector entidades paraestatales'=>' Instituciones del sector entidades paraestatales',
               'Instituciones del sector gobierno de las entidades federativas'=>'Instituciones del sector gobierno de las entidades federativas',
               'Instituciones del sector de educación superior públicas'=>'Instituciones del sector de educación superior públicas',
               'Instituciones del sector de educación superior privadas'=>'Instituciones del sector de educación superior privadas',
               'Instituciones del sector privado de empresas productivas (adiat)'=>'Instituciones del sector privado de empresas productivas (adiat)',
               'Instituciones / organizaciones no lucrativas'=>'Instituciones / organizaciones no lucrativas',
               'Instituciones / organizaciones extranjeras'=>'Instituciones / organizaciones extranjeras',
               'No especificado'=>'No especificado'
            ),array('prompt'=>'Seleccionar sector','title'=>'Sector','id'=>'sector', 'onchange'=>'changeSector()')
          );
    ?>
    </span>
    <?php echo $form->error($model,'sector'); ?>
  </div>
  <?php
  if(!$model->isNewRecord){

    echo '<div class="row" id="selectOrganization" >';
    echo '<span class="plain-select">';
    echo $form->dropDownList($model,'organization',array($model->organization => $model->organization),array('prompt'=>'Seleccionar organización','onclick'=>'changeSector()','options'=>array($model->organization=>array('selected'=>true))));
    echo '</span>';
    echo $form->error($model,'organization');
    echo '</div>';


    echo '<div class="row"id="selectSecondLevel">';
    echo '<span class="plain-select">';
    echo $form->dropDownList($model,'second_level',array($model->second_level => $model->second_level),array('prompt'=>'Seleccionar segundo nivel','onchange'=>'changeSecondLevel()','options'=>array($model->second_level=>array('selected'=>true))));
    echo '</span>';
    echo $form->error($model,'second_level');
    echo '</div>';
  }
  else{
    echo '<div class="row"id="selectOrganization">';
    echo '<span class="plain-select">';
    echo $form->dropDownList($model,'organization',array($model->organization),array('prompt'=>'Seleccionar organización'));
    echo '</span>';
    echo $form->error($model,'organization');
    echo '</div>';

    echo '<div class="row"id="selectSecondLevel">';

    echo '</div>';

  }
?>
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
                              'QUIMICA'=>'QUIMICA', 'SOCIOLOGIA'=>'SOCIOLOGIA'),array('prompt'=>'Seleccionar área','title'=>'Area', 'id'=>'area', 'onchange'=>'changeArea()'));?>
                                                      </span>
    <?php echo $form->error($model,'area'); ?>
  </div>

   <?php
  if(!$model->isNewRecord){

    
    echo '<div class="row" id="comboDiscipline" >';
    echo '<span class="plain-select">';
    if($model->area == "ANTROPOLOGIA"){
    echo $form->dropDownList($model,'discipline',array("ANTROPOLOGIA CULTURAL"=>"ANTROPOLOGIA CULTURAL","ANTROPOLOGIA ESTRUCTURAL"=>"ANTROPOLOGIA ESTRUCTURAL",
   "ANTROPOLOGIA SOCIAL"=>"ANTROPOLOGIA SOCIAL","ETNOGRAFIA Y ETNOLOGIA"=>"ETNOGRAFIA Y ETNOLOGIA",
   "OTRAS ESPECIALIDADES EN MATERIA DE ANTROPOLOGIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE ANTROPOLOGIA"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "ARTES Y LETRAS"){
    echo $form->dropDownList($model,'discipline',array("ARQUITECTURA"=>"ARQUITECTURA",
    "TEORIA, ANALISIS Y CRITICA DE LAS BELLAS ARTES"=>"TEORIA, ANALISIS Y CRITICA DE LAS BELLAS ARTES",
    "TEORIA, ANALISIS Y CRITICA LITERARIOS"=>"TEORIA, ANALISIS Y CRITICA LITERARIOS",
    "OTRAS ESPECIALIDADES EN MATERIA DE ARTES Y LETRAS"=>"OTRAS ESPECIALIDADES EN MATERIA DE ARTES Y LETRAS"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "ASTRONOMIA Y ASTROFISICA"){
    echo $form->dropDownList($model,'discipline',array("ASTRONOMIA OPTICA"=>"ASTRONOMIA OPTICA",
    "COSMOLOGIA Y COSMOGONIA"=>"COSMOLOGIA Y COSMOGONIA",
    "ESPACIOS Y MATERIA INTERPLANETARIOS"=>"ESPACIOS Y MATERIA INTERPLANETARIOS",
    "PLANETOLOGIA"=>"PLANETOLOGIA",
    "RADIOASTRONOMIA"=>"RADIOASTRONOMIA",
    "SISTEMA SOLAR"=>"SISTEMA SOLAR",
    "OTRAS ESPECIALIDADES EN MATERIA DE ASTRONOMIA"=>"OTRAS ESPECIALIDADES EN MATERIA DE ASTRONOMIA"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "CIENCIAS AGRONOMICAS Y VETERINARIAS"){
    echo $form->dropDownList($model,'discipline',array("AGRONOMIA"=>"AGRONOMIA",
    "CIENCIAS VETERINARIAS"=>"CIENCIAS VETERINARIAS",
    "CIENCIAS VETERINARIAS"=>"CIENCIAS VETERINARIAS",
    "FITOPATOLOGIA"=>"FITOPATOLOGIA",
    "HIGIENE VETERINARIA Y SALUD PUBLICA"=>"HIGIENE VETERINARIA Y SALUD PUBLICA",
    "HORTICULTURA"=>"HORTICULTURA",
    "INGENIERIA RURAL"=>"INGENIERIA RURAL",
    "PECES Y ANIMALES SALVAJES"=>"PECES Y ANIMALES SALVAJES",
    "QUIMICA AGRONOMICA"=>"QUIMICA AGRONOMICA",
    "SILVICULTURA"=>"SILVICULTURA",
    "OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS AGRONOMICAS Y VETERINARIAS"=>"OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS AGRONOMICAS Y VETERINARIAS"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    if($model->area == "CIENCIAS DE LA OCUPACION"){
    echo $form->dropDownList($model,'discipline',array("TERAPIA OCUPACIONAL"=>"TERAPIA OCUPACIONAL"),
    array('prompt'=>'Seleccionar disciplina','options'=>array($model->discipline=>array('selected'=>true))));
    }
    echo '</span>';
    echo '</div>';
  

    echo '<div class="row"id="comboSubdiscipline">';
    echo '<span class="plain-select">';
    echo $form->dropDownList($model,'subdiscipline',array($model->subdiscipline => $model->subdiscipline),array('prompt'=>'Seleccionar subdisciplina','options'=>array($model->subdiscipline=>array('selected'=>true))));
    echo '</span>';

    echo '</div>';

  }
  else{

    echo '<div class="row"id="comboDiscipline">

  </div>
  <div class="row"id="comboSubdiscipline">

  </div>';
  }
  ?>

    <div class="row buttons">
     <?php echo CHtml::htmlButton($model->isNewRecord ? 'Guardar': 'Modificar',array(
                'onclick'=>'send("directed-thesis-form","directedThesis/'.($model->isNewRecord ? 'create' : 'update').'", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","directedThesis/admin","");',
                'class'=>'savebutton',
            ));
    ?>
        <?php echo CHtml::link('Cancelar',array('directedThesis/admin'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>

    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->