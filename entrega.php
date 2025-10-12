<?php

session_start();

if (!$_SESSION['numero']) {
    die(header("location: load.php"));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $telefone = $_SESSION['telefone'];
    $nome = $_POST['name'];
    $msg = $_POST['text'];

    // ===== CONFIGURAÇÕES =====
    $token = "EAALPyLJpacABPgEQZAIK1ZCFpZBnYkr0Lyixa6ERhHZAItMkJctRY0msUgkZC57Jx2ByAK6mFfZCKnN3AZClLNvFp4WZCDPTMsVZBJaojJVKfxSoawYeJZCzZBB5AfgmZB0owEYZCqDr7duGNZBUNs5VNZCR55S7tAZAWagjLZAGbe4njAQVgU94l44Kyb18AyJcvHv5OsanZBDANbqHot8a2Lb01lLoKtfGOlcFsHEVsBFcFXThRqFbOGtwZDZD"; // token da sua conta
    $phone_id = "787825974420506"; // ID do número do WhatsApp
    $url = "https://graph.facebook.com/v21.0/$phone_id/messages";

    // ===== DADOS DA MENSAGEM =====
    $data = [
        "messaging_product" => "whatsapp",
        "to" => "55" . preg_replace('/\D/', '', $telefone),
        "type" => "template",
        "template" => [
            "name" => "qrbell", // nome exato do modelo
            "language" => ["code" => "pt_BR"],
            "components" => [
                [
                    "type" => "header",
                    "parameters" => [
                        ["type" => "text", "text" => $nome] // variável {{1}} do cabeçalho
                    ]
                ],
                [
                    "type" => "body",
                    "parameters" => [
                        ["type" => "text", "text" => $msg] // variável {{1}} do corpo
                    ]
                ]
            ]
        ]
    ];

    // ===== ENVIO PARA META =====
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $token",
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // ===== RESULTADO =====
    $result = json_decode($response, true);
    if (isset($result['messages'])) {
        echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='index.php';</script>";
    } else {
        echo "<pre>Erro ao enviar: " . $response . "</pre>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/icon/entregador-maior.png">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/variaveis.css">
    <link rel="stylesheet" href="style/global.css">
    <link rel="stylesheet" href="style/reset.css">
    <title>Entrega</title>
</head>

<body>
    <form id="form-entrega" method="POST" onsubmit="return validarNome()">
        <div class="container-form">
            <div class="header">
                <img src="images/icon/entregador.png" alt="">
                <div class="header-text">
                    <p>RESPONDA COM ATENÇÃO!</p>
                    <hr>
                </div>
            </div>


            <div class="imagem-header">
                <img src="images/icon/entregador-maior.png" alt="">
            </div>

            <div class="container-motivo">
                <div class="field">
                    <input type="text" id="name" name="name" required>
                    <label for="name" class="label-wrapper">
                        <span class="label-text">Nome Completo</span>
                    </label>
                </div>

                <br><br>

                <textarea id="message" name="text" placeholder="Digite sua mensagem" required rows="4"
                    cols="30"></textarea>
                <div class="button-enviar">
                    <button type="submit">Enviar Mensagem</button>
                </div>
            </div>
        </div>
    </form>
    <div class="button-voltar">
        <a href="text.php">Voltar</a>
    </div>

    <script src="index.js"></script>
</body>

</html>