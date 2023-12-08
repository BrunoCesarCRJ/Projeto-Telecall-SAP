<?php

    session_start();

    if (isset($_POST['submit']) && !empty($_POST['perguntaIndex'])) {
        include_once('conexao.php');
        $pergunta = $_POST['perguntaIndex'];

        $sql = "SELECT * FROM usuarios WHERE materno = ? OR endereco = ? OR nascimento = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('sss', $pergunta, $pergunta, $pergunta);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $userData = $result->fetch_assoc();
            $_SESSION['materno'] = $userData['materno'];
            $_SESSION['endereco'] = $userData['endereco'];
            $_SESSION['nascimento'] = $userData['nascimento'];
            $_SESSION['master'] = $userData['master'];
            var_dump($_SESSION);
            
            header('Location: sistema.php');
            exit();
        }
    }
    
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telecall - Verificação</title>
    <link rel="stylesheet" href="./css/log.css">
    <link rel="shortcut icon" href="media/Icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

    <div class="log">
        <div class="bem-vindo-fundo">
            <div class="dark">
                <button><img src="media/Icons/dark_mode_FILL0_wght400_GRAD0_opsz48.svg" alt="Modo Escuro" title="Modo Escuro" id="dark"></button>
            </div>
            <div class="bem-vindo">
                <a href="index.php"><img src="./media/Icons/telecall_icone_p.png" alt="Telecall"></a>
                <h1>Bem Vindo(a)!</h1>
                <p>Responda a pergunta ao lado para verificarmos se é você mesmo!</p>
            </div>
        </div>

        <div class="login-fundo">
            <div class="login">
                <h1>Autenticação</h1>
                <form action="sistema.php" method="POST" id="form-ver">
        <div class="pergunta-input">
            
            <div class="group">
                    <div class="pergunta-h1">
                    </div>
                    <input type="hidden" id="perguntaIndex" name="perguntaIndex" value="">
                    <input type="text" id="meuInput" placeholder="Clique no botão abaixo">
                    <button type="button" onclick="atualizarPlaceholder()">GERAR PERGUNTA</button>
                <br>
                <br>
            </div>
        </div>
                    <button type="submit" name="submit" onclick="validar(this.form)">ENVIAR</button>
                    <button type="button" onclick="limparFormulario(this.form)">LIMPAR</button>
                    <div class="cadastroii">
                </form>

            </div>
        </div>
    </div>
    </div>
    <script src="JavaScript/Darkmode.js"></script>
    <script src="JavaScript/verificacao.js"></script>

    
</body>

<footer>
    <div class="footer-fundo">
        <div class="footer">
            <p>Copyright © 2023 Telecall. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>

</html>
