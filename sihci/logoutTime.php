 <?php
    session_start();
    $inactive = 30; // Set timeout period in seconds

    if (isset($_SESSION['timeout'])) 
    {
        $session_life = time() - $_SESSION['timeout'];
        if ($session_life > $inactive)
        {
             
             session_destroy();
             header("Location: ".Yii::app()->baseurl."/site/logout");
             exit;
        }
    }
    $_SESSION['timeout'] = time();
?> 
