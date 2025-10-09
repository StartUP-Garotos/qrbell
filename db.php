<?php

$host = "sql105.infinityfree.com";
$user = "if0_40131980";
$pass = "EjtZdaxWKyidMXT";
$db_name = "if0_40131980_qrbell";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>