<?php
    if(isset(Yii::app()->user->type))
        $this->redirect('infoAccount');
?>
<div class="selecttype">
    <div class="typecontent">
        <div class="typeicons">
        <h3>¿A qué grupo Perteneces?</h3> s
        	<div class="type1">
        		   	<?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/types/Fisica.png alt="home">', array('account/selectType','type'=>'fisico'));?>
        		   	<h4>Fisico</h4>
        	</div>
        	<div class="type2">
        		<?php echo CHtml::link('<img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/types/Moral.png alt="home">', array('account/selectType', 'type'=>'moral'));?>
        		<h4>Moral</h4>
        	</div>
        </div>
    </div>
</div>
