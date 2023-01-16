//file is used to check the session, will be required
<?php
    session_start();

    if(session_status() != PHP_SESSION_ACTIVE || !ISSET($_SESSION["user"])){
    header('location:index.php');
    exit();
    }

?>