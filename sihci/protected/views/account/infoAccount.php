<?php

$this->menu = array(
    array('label' => 'Datos de Cuenta', 'url' => array('account/infoAccount')),
    array('label' => 'Bitacora', 'url' => array('account/systemLog')),

    
    
);
?>

<div class="cvtitle">
    <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
    <h1>Cuenta</h1>
    <hr>
</div>
<div class="infoAccount">
    <h4>Datos de Cuenta:</h4>
    <div class="acountcont">
        <div class="acoutmail">
            <?php
            echo "<div class='row'>";
            echo "<h5>Correo:</h5>";
            echo "<input type='text' value='".$details->email."' disabled>";
            echo "</div>";
            echo CHtml::Button('Modificar',array('submit' => array('account/updateEmail'),'class'=>'addSomething'));
             ?>
        </div>
        <div class="acountpass">
            <?php
                echo "<div class='row'>";
                echo "<h5>Contraseña:</h5>";
                echo "<input type='text' value='********' disabled>";
                echo "</div>";
                echo CHtml::Button('Modificar',array('submit' => array('account/updatePassword'),'class'=>'addSomething'));
            ?>
        </div>
    </div>
</div>