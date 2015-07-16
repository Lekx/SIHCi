<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div class="error403">
<?php if ($code = 403){
?>
<img  id="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/Errors/403.svg">
</div>
<div class="error404">
<?php } else{
?><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/Errors/404.svg">
<?php  } ?>
</div>


<div class="error">
<?php echo CHtml::encode($message); ?>
</div>
