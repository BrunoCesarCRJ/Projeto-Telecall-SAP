<?php
    session_start();
    //print_r($_SESSION);
    if (!isset($_SESSION['email']) && !isset($_SESSION['senha'])) {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
        } 
        
        else {
            $email = '';
        }
    }
    else {
        $email = $_SESSION['email'];
    }
    
    $logado = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telecall - SMS Programável </title>
    <link rel="stylesheet" href="css/sms.css">
    <link rel="shortcut icon" href="media/Icons/favicon.ico" type="image/x-icon">
    <script src="JavaScript/sms.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <header class="menu-bg">
        <div class="menu">
            <div class="menu-logo">
                <a href="index.php"><img class="logo-telecall"
                        src="./media/imagens/logo_telecall_branco_vermelho_p.png" alt="Telecall"></a>
            </div>
            <nav class="menu-nav">
                <div class="nav-list">
                    <ul>
                        <li><a href="2fa.php">2FA</a></li>
                        <li><a href="numeromascara.php">Número Máscara</a></li>
                        <li><a href="google.php">Google Verified Calls</a></li>
                        <li><a href="sms.php">SMS Programável</a></li>
                        <?php
                            if((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)){
                                // Se logado, mostra o nome do usuário
                                echo $_SESSION['email'];
                            } 
                            else {
                               echo '<li><a class="log"><a href="log.php">Já é cliente?</a></li>';
                            }
                        ?>
                        

                        <div class="dark">
                            <button><img src="media/Icons/dark_mode_FILL0_wght400_GRAD0_opsz48.svg" alt="Modo Escuro" title="Modo Escuro" id="dark"></button>
                        </div>

                        <div class = "d-flex">
                             <a href='sair.php'><i class="bi bi-box-arrow-right" id="sairbutton"></i></a>
                        </div>
                    </ul>
                </div>
            </nav>
            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="media/Icons/menu_FILL0_wght400_GRAD0_opsz48.svg"
                        alt="Menu de Navegação"></button>
            </div>
        </div>

        <div class="mobile-menu">
            <ul>
                <li><a href="2fa.php">2FA</a></li>
                <li><a href="numeromascara.php">Número Máscara</a></li>
                <li><a href="google.php">Google Verified Calls</a></li>
                <li><a href="sms.php">SMS Programável</a></li>
                <li class="log"><a href="log.php">Já é cliente?</a></li>
                <div class="dark">
                    <button><img src="media/Icons/dark_mode_FILL0_wght400_GRAD0_opsz48.svg" alt="Modo Escuro" title="Modo Escuro" id="dark"></button>
                </div>
                <div class = "d-flex">
                    <a href='sair.php'><i class="bi bi-box-arrow-right" id="sairbutton"></i></a>
                </div>
            </ul>
        </div>
    </header>
    <section class="sms">
        <h1 class="titulo-0">SMS Programável</h1>
        <h2 class="h2-azul">Conecte-se com seus clientes.</h2>
        <p>É muito provável que você já tenha recebido uma mensagem de texto de uma empresa ou organização.</p>
        <p>Com uma API, qualquer empresa pode enviar mensagens de texto e impactar clientes, prospects ou fornecedores
            como parte de seu processo comercial.</p>
        <p>Com essa ferramenta você envia mensagens de SMS com as informações que o seu cliente precisa e com a
            segurança, a velocidade e a confiabilidade que você espera.</p>
        <div class="sms-img">
            <img src="media/SVG/Cell phone-amico.svg" alt="">
        </div>
    </section>

    <section class="info">
        <div class="principal">
            <p>SMS é a forma mais rápida, eficiente e de baixo custo para se comunicar com seus clientes.</p>
        </div>
        <div class="grid">
            <p><strong>98%</strong><br>de taxa de abertura</p>
        </div>
        <div class="grid">
            <p><strong>90%</strong><br>dos SMS são lidos em até 3 minutos.</p>
        </div>
        <div class="grid">
            <p><strong>80%</strong><br>das pessoas interagem com SMS comerciais.</p>
        </div>
        <div class="grid">
            <p><strong>35x</strong><br>maior a probabilidade de um cliente abrir um SMS do que um e-mail.</p>
        </div>
    </section>
    <section class="quem-usa">
        <h2 class="titulo">Quem usa?</h2>
        <h3>São muitos os casos de uso, veja alguns exemplos:</h3>
        <div class="img-div">
            <div class="exe">
                <img src="media/exemplos/Divulgacao_fix.PNG" alt="">
                <p>Divulgação</p>
            </div>
            <div class="exe">
                <img src="media/exemplos/transacoes_fix.PNG" alt="">
                <p>Transações</p>
            </div>
            <div class="exe">
                <img src="media/exemplos/seguranca_fix.PNG" alt="">
                <p>Segurança</p>
            </div>
            <div class="exe">
                <img src="media/exemplos/suporte_fix.PNG" alt="">
                <p>Suporte ao Cliente</p>
            </div>
            <div class="exe">
                <img src="media/exemplos/notificacoes_fix.PNG" alt="">
                <p>Notificações</p>
            </div>
        </div>
    </section>
    <section class="jornada-cliente">
        <h2 class="titulo">Jornada do cliente</h2>
        <h3>Ofereça uma melhor experiência ao cliente acompanhando a sua jornada de compra.</h3>
        <img src="media/imagens/diagrama.PNG" alt="Diagrama">
        <p>Envio de SMS</p>
    </section>
    <section class="beneficios">
        <h2 class="titulo">Benefícios</h2>
        <ul>
            <li>Comunicação rápida, efetiva e escalável.</li>
            <li>Baixo custo.</li>
            <li>Alta taxa de entrega e leitura.</li>
            <li>Personalização de data, hora e conteúdo.</li>
            <li>Agendamento de campanhas.</li>
            <li>Interação bidirecional: recebimento de respostas.</li>
            <li>Plataforma user-friendly.</li>
            <li>Acompanhamento de métricas e relatórios.</li>
        </ul>
    </section>

    <script src="JavaScript/Darkmode.js"></script>

</body>
<footer>
    <div class="footer-fundo">
        <div class="footer">
            <p>Copyright © 2023 Telecall. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>