<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter o e-mail do formulário
    $email = $_POST["email"];

    // Validar o e-mail (adicione lógica de validação personalizada, se necessário)

    // Enviar e-mail
    $assunto = "Assunto do E-mail";
    $mensagem = "Olá! Este é um e-mail de exemplo enviado para $email.";

    // Utilize a função mail para enviar o e-mail
    mail($email, $assunto, $mensagem);

    // Redirecionar de volta à página principal ou exibir uma mensagem de sucesso
    header("Location: redefinir.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telecall- Redefinir Senha</title>
    <link rel="stylesheet" href="./css/redefinir2.css">
    <link rel="shortcut icon" href="media/Icons/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="conteudo">
            <div class="dark">
                <button><img src="media/Icons/dark_mode_FILL0_wght400_GRAD0_opsz48.svg" alt="Modo Escuro" title="Modo Escuro" id="dark"></button>
            </div>
            <a href="index.php"><img src="./media/Icons/telecall_icone_p.png" alt="Telecall" id="tele"></a>
            <h1>Email enviado!</h1>
            <div class="p">
                <p>Enviamos um e-mail de redefinição. Se esse e-mail estiver conectado a uma conta Telecall, você poderá redefinir sua senha.</p>
            </div>
            <div class="button-1">
                <a href="log.php">Voltar para login</a>
            </div>
            <div class="button-2">
                <a href="redefinir.php">Tente novamente</a>
            </div>
        </div>
    </div>
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