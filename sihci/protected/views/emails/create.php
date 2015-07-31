<?php
/* @var $this EmailsController */
/* @var $model Emails */

$this->menu=array(
	array('label'=>'List Emails', 'url'=>array('index')),
	array('label'=>'Manage Emails', 'url'=>array('admin')),
);
?>

<h1>Create Emails</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,)); ?>
