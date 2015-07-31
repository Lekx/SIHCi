<?php
class MailController extends Controller
{


	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
	 	return array(

	 		array('allow',
	 			'actions'=>array('sendMail'),
	 			'users'=>array('*'),
	 		),
	 		array('deny',  // deny all users
	 			'users'=>array('*'),
	 		),
	 	);
	 }

	public function actionSendMail($to,$subject,$title,$content,$urlImg,$urltitle = 0,$key = 0)
	{

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'CC: udevelopd@gmail.com'. "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		$message ='<html>
				<head>
				<meta charset="UTF-8"/>
				</head>
				<body>
				<div id="container" style="width: 450px;height: auto;background-color: #ECEDEE">
				<div class="logo">
				<img src="http://sgei.hcg.gob.mx/sihci/sihci/img/correos/up.png" alt="" style="width: 100%"/></div>
				<div class="content" style="font-size: 15px;padding: 20px;text-align: justify">
				<h2>'.$title.'</h2>
				'.$content.'
				</div>
				<div class="link">
				<img src="http://sgei.hcg.gob.mx/sihci/sihci/img/correos/'.$urlImg.'" alt="" style=""/><a href="http://sgei.hcg.gob.mx/sihci/sihci/index.php/account/activateAccount?key='.($key == 0 ? "" : $key).'" style="text-decoration: none;display: inline-block;margin-left: 20px;margin-bottom: 20px"><h5>'.($urltitle == 0 ? "" : $urltitle)'</h5></a>
				</div>
				<div class="footer" style="font-size: 15px;padding-top: 10px;padding-bottom: 10px;border-top: 1px solid #00B9C0;text-align: center;margin-top: 10px">
				Todos los derechos reservados. Copyright © 2015 SIHCi
				</div>
			</div>
				</body>
			</html>';

		if(!mail($to,$subject,$message,$headers)){
			echo"Error al enviar el mensaje.";
		}

	}


}
