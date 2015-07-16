<-- Ejemplo1-->
<?php
	session_start();

	$x = date("H i s m d Y",time());
	$fecha = explode(" ",$x);
	$fecha1=date("H:i:s d/m/Y ",mktime($fecha[0],$fecha[1],$fecha[2],$fecha[3],$fecha[4],$fecha[5]));

	if($_SESSION["hora"]=="") 
	{
	
		$fecha[1] = $fecha[1]+1;
		$fecha2 = date("H:i:s d/m/Y ",mktime($fecha[0],$fecha[1],$fecha[2],$fecha[3],$fecha[4],$fecha[5]));
		$_SESSION["hora"]=$fecha2;

	}
	else
	{
		if($fecha1>$_SESSION["hora"]) 
		{
?>
		<script type='text/javascript' language='javascript'>

			alert('EXPIRO SU SESION')
			document.location.href='../logout.php'
		</script>
		<?php
		}
		else
		{
			$fecha[1] = $fecha[1]+1;
			// Asigno la fecha modificada a una nueva variable
			$fecha2 = date("H:i:s d/m/Y ",mktime($fecha[0],$fecha[1],$fecha[2],$fecha[3],$fecha[4],$fecha[5]));
			$_SESSION["hora"]=$fecha2;
		}
	}

	?>

	

	<?php
	session_start();
	if(isset($_SESSION['acceso'])) {
	if ($_SESSION['acceso'] == "admin") {
	include("inactivo.php");
    ?>

<-- Ejemplo2-->


 <?php
    session_start();
    $inactive = 30; // Set timeout period in seconds

    if (isset($_SESSION['timeout'])) 
		// Do Your Logout Function Here
	}
}else{
	// This is his/her first visit.
	$_SESSION['time'] = time();
	echo 'First Visit';
	
	// Possibly Require Login Here
}

function debug($idle){
	echo '<br />------- Debug -------';
	echo '<br />Time: '.time();
	echo '<br />Last Activity: '.$_SESSION['time'];
	echo '<br /> Time Elapsed: '.(time() - $_SESSION['time']);
	echo '<br />Idle Time: '.$idle;
	echo '<br />----- End Debug -----<br /><br />';
}

?>

    {
        $session_life = time() - $_SESSION['timeout'];
        if ($session_life > $inactive)
        {
         echo"

         <script type='text/javascript' language='javascript'>

            alert('EXPIRO SU SESION')
        </script> ";
                     header("Location: ".yii::App()->request->baseurl."/index.php/site/logout");
            //header("Location: index.php");
            //session_destroy();
        }
    }
    $_SESSION['timeout'] = time();
?> 
<-- Ejemplo3-->


<?php

// Start or Resume a Session
session_start();

// How long is the user allowed to be idle?
$idle = (15 * 60); // In Seconds

// See if the User has been idle for too long
// If he/she has, then log them out.
// Otherwise, update their status.
if(isset($_SESSION['time'])){

	// Debug
	debug($idle);

	// How long from his/her last visit?
	$time_elapsed = (time() - $_SESSION['time']);
	
	if($time_elapsed < $idle){
		// Update user's activity
		$_SESSION['time'] = time();
		echo 'Activity Updated';
	}else{
		// He/She has been idle for too long
		echo 'You have been idle for too long<br />Please login again';

		// Do Your Logout Function Here
	}
}else{
	// This is his/her first visit.
	$_SESSION['time'] = time();
	echo 'First Visit';
	
	// Possibly Require Login Here
}

function debug($idle){
	echo '<br />------- Debug -------';
	echo '<br />Time: '.time();
	echo '<br />Last Activity: '.$_SESSION['time'];
	echo '<br /> Time Elapsed: '.(time() - $_SESSION['time']);
	echo '<br />Idle Time: '.$idle;
	echo '<br />----- End Debug -----<br /><br />';
}

?>


