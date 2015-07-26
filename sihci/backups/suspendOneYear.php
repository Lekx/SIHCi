 <?php $conexion = Yii::app()->db;

		$results = $conexion->createCommand("
			SELECT id,id_user, datetime FROM system_log WHERE datetime <= DATE_SUB(now(), INTERVAL 1 YEAR) GROUP BY id_user
		")->queryAll();



		foreach ($results as $key => $value){
					Users::model()->updateByPk($value['id_user'], array("status"=>"suspendido"));
		}
?>			
