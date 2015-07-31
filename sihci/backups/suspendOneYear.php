 <?php $conexion = Yii::app()->db;

		$results = $conexion->createCommand("
			SELECT id,id_user, datetime FROM system_log WHERE datetime <= DATE_SUB(now(), INTERVAL 1 YEAR) GROUP BY id_user
		")->queryAll();



		foreach ($results as $key => $value){
					$user = Users::model()->updateByPk($value['id_user'], array("status"=>"suspendido"));
					$section = "Cuenta 1 año sin uso";
					$details = "Email del usuario: ".$user->email;
					$action = "Desactivación";
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
					
		}
?>			

