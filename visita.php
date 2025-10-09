<?php

session_start();

if (!$_SESSION['numero']){
    die(header("location: load.php"));
}

$telefone = $_SESSION['telefone'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/icon/visita-maior.png">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/variaveis.css">
    <link rel="stylesheet" href="style/global.css">
    <link rel="stylesheet" href="style/reset.css">
    <title>Visita</title>
</head>

<body>
    <form id="form-entrega" action="" onsubmit="return validarNome()">
        <div class="container-form">
            <div class="header">
                <img src="images/icon/entregador.png" alt="">
                <div class="header-text">
                    <p>RESPONDA COM ATENÇÃO!</p>
                    <hr>
                </div>
            </div>

            <div class="imagem-header">
                <img src="images/icon/visita-maior.png" alt="">
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