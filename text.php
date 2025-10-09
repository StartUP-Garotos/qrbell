<?php
include "db.php";

session_start();

if (!$_SESSION['numero']) {
    die(header("location: load.php"));
} 

$numero = $_SESSION['numero'];

try {
    $stmt = $conn->prepare("SELECT * FROM residencias WHERE numero = :numero");
    $stmt->bindParam(':numero', $numero, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao consultar o banco: " . $e->getMessage());
}
$_SESSION['telefone'] = $row['telefone'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/icon/icon.png">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/variaveis.css">
    <link rel="stylesheet" href="style/global.css">
    <link rel="stylesheet" href="style/reset.css">
    <title>QR Bell</title>
</head>

<body>
    <div class="header">
        <img src="images/icon/icon.png" alt="Icon QrBell">
        <div class="header-text">
            <p>BEM VINDO(A)!</p>
            <?php echo "Mandar mensagem para o número {$row['numero']}"?> <!-- Deixar bonito esta frase -->
            <hr>
        </div>
    </div>

    <div class="container-motivo">
        <p>MOTIVO DA SUA VINDA</p>
        <a href="entrega.php">
            <div class="buttons-motivo">
                <div class="button-entrega">
                    <img src="images/icon/entregador-icon.png" alt="Entregador Icon">
                    ENTREGA
                </div>
        </a>
        <div class="button-visita">
            <a href="visita.php">
                <img src="images/icon/visita.png" alt="Visita Icon">
                VISITA
            </a>
        </div>
    </div>
    </div>
    <script>
        setTimeout(() => {
            window.location.href = "load.php";
        }, 180000);
    </script>
</body>

</html>