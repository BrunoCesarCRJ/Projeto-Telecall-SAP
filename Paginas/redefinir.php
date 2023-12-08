<?php 
    require_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telecall- Redefinir Senha</title>
    <link rel="stylesheet" href="./css/redefinir.css">
    <link rel="shortcut icon" href="media/Icons/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="conteudo">
            <div class="dark">
                <button><img src="media/Icons/dark_mode_FILL0_wght400_GRAD0_opsz48.svg" alt="Modo Escuro" title="Modo Escuro" id="dark"></button>
            </div>
            <a href="index.php"><img src="./media/Icons/telecall_icone_p.png" alt="Telecall" id="tele"></a>
            <h1>Redefinir Senha</h1>
            <p>Informe seu email cadastrado.</p>
            <div class="container-form">
                <form action="redefinir2.php">
                    <label for="redefinir">Email</label>
                    <input type="email" id="redefinir" name="email" required>
                    <br>
                    <!--Definir botão para submit-->
                    <div class="enviar">
                        <button onclick="validarEmail(this.form)" class="botao" >Enviar um email de redefinição de senha</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="JavaScript/Redefinir.js"></script>
<script src="JavaScript/Darkmode.js"></script>
</body>
<footer>
    <div class="footer-fundo">
        <div class="footer">
            <p>Copyright © 2023 Telecall. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>
</html>