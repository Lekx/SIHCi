<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap-3.0.0/css/bootstrap.min.css" media="screen, projection" >
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php Yii::app()->bootstrap->register(); ?>

	<section class="logosection">
		<div class="logo"></div>
		<div class="logosub"></div>
		<div class="logoinfo"></div>
		<div class="logonum"></div>
	</section>

	<section class="logsection">
		<div class="login"></div><div class="singin"></div><div class="searchbar"></div>
	</section>	

	<section>
		<div class="carrusel"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg"></div>
	</section>

	<section class="carruselinfo">
		<div id="uno"></div><div id="dos"></div><div id="tres"></div>
	</section>

	<section>

		<div class="content"></div>

	</section>

	<section class="contentboxs"> 
		<div id="box1"></div>
		<div id="box2"></div>
		<div id="box3"><img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg"></div>
		<div id="box4"></div>
		<div id="box5"><img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg"></div>
		<div id="box6"></div>
	</section>

	<section class="contentboxs2"> 
		<div id="box1"></div>
		<div id="box2"></div>
		<div id="box3"><img id="img1" src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg"></div>
		<div id="box4"></div>	
	</section>

	<section>
		<div class="content"></div>
	</section>

	<section>
		<div class="carrusel"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.jpg"></div>
	</section>




</body>
</html>
