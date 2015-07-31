<?php
/* @var $this AddressesController */
/* @var $model Addresses */


$controller="";
$editUser = "";
if(isset($_GET["ide"]))
	$editUser = "?ide=".(int)$_GET["ide"];

$this->menu=array(
	array('label'=>'Datos personales', 'url'=>array(($controller==""?'curriculumVitae/personalData':$controller).$editUser)),
	array('label'=>'Documentos oficiales', 'url'=>array(($controller==""?'curriculumVitae/docsIdentity':$controller).$editUser)),
	array('label'=>'Datos de dirección actual', 'url'=>array(($controller==""?'curriculumVitae/addresses':$controller).$editUser)),
	array('label'=>'Datos laborales', 'url'=>array(($controller==""?'curriculumVitae/jobs':$controller).$editUser)),
	array('label'=>'Líneas de investigación', 'url'=>array(($controller==""?'curriculumVitae/researchAreas':$controller).$editUser)),
	array('label'=>'Datos de contacto', 'url'=>array(($controller==""?'curriculumVitae/phones':$controller).$editUser)),
	array('label'=>'Formación académica', 'url'=>array(($controller==""?'curriculumVitae/grades':$controller).$editUser)),
	array('label'=>'Nombramientos', 'url'=>array(($controller==""?'curriculumVitae/commission':$controller).$editUser)),

);
?>

	<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Currículum vitae electrónico</h1>
            <hr>
        </div>


<h4>Datos de dirección actual:</h4>

<?php $this->renderPartial('_form_addresses', array('model'=>$model)); ?>
