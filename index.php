<?php

session_start();

$numero = $_GET['numero'];
if(!$numero){
    die(header("location: load.php"));
} else {
    $_SESSION['numero'] = $numero;
    header("location: text.php");
}

?>