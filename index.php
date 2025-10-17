<?php

include "db.php";

session_start();

$mapa = [
    "DVSD123" => "101",
    "324IBSA" => "102",
    "2HUIDAS" => "103"
];

if (!isset($_GET['k']) || !isset($mapa[$_GET['k']])) {
    header("Location: load.php");
    exit;
}

$numero = $mapa[$_GET['k']];

$stmt = $conn->prepare("SELECT * FROM residencias WHERE numero = :numero");
$stmt->bindParam(':numero', $numero, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row){
    header("Location: load.php");
    exit;
}

$_SESSION['numero'] = $numero;

header("Location: text.php");
exit;

?>