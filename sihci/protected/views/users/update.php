<?php
/* @var $this UsersController */
/* @var $model Users */
?>

<h1>Update Users <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>