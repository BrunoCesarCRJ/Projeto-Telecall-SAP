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
    <title>Telecall - Google Verified</title>
    <link rel="stylesheet" href="css/google.css">
    <link rel="shortcut icon" href="media/Icons/favicon.ico" type="image/x-icon">
    <script src="JavaScript/google.js"></script>
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
                <button onclick="menuShow()"><img class="icon" src="media/Icons/menu_FILL0_wght400_GRAD0_opsz48.svg" alt="Menu de Navegação"></button>
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

    <section class="google-verified">
        <h1 class="titulo-0">Google Verified Calls</h1>
        <h2>Chamadas verificadas</h2>
        <p>Esse novo recurso do <strong>Google</strong>, exclusivo para telefones <strong>Android</strong>, permite que
            empresas exibam para o cliente na hora da chamada sua marca, logotipo e até mesmo o motivo da chamada.</p>
        <p>A Telecall é a <strong>primeira operadora de telecom no Brasil</strong> a oferecer esse recurso do Google.
        </p>
        <div class="google-verified-img">
            <img src="media/SVG/Call center-amico.svg" alt="">
        </div>
    </section class="Compatibilidade">

    <section class="problema">
        <h2 class="titulo-0">O Problema</h2>
        <h3>Ligações de spam</h3>
        <ul>
            <li>O Brasil é o país que mais sofre com ligações de spam no mundo.</li>
            <li>Desde 2017, as chamadas telefônicas de spam no Brasil aumentaram 141%.</li>
            <li>O brasileiro recebe em média 49,9 ligações de spam por mês.</li>
        </ul>
        <div class="problema-img">
            <h3>Ligações indesejadas no Brasil</h3>
            <div class="img-bg">
                <img src="media/span2.PNG"
                    alt="Gráfico Ligações indesejadas no Brasil, 4% Telemarketing, 6% Operadoras, 42% Serviços Financeiros e 48% Fraude.">
            </div>
        </div>
    </section>
    <section class="compatibilidade">
        <h2 class="titulo">Compatibilidade</h2>
        <ul>
            <li>Exclusivo para sistema operacional <strong>Android</strong> através do aplicativo
                <strong>Telefone.</strong>
            </li>
            <li>Pré-instalado em telefones mais recentes ou pode ser baixado do <strong>Google Play Store</strong> para
                a maioria dos dispositivos com Android 9.0.</li>
            <li>Hoje no Brasil existem quase <strong>239 milhões de celulares smartphone ativos</strong>, sendo que o
                sistema <strong> Android</strong> detém uma participação de mais de <strong>86%</strong> do mercado de
                sistema operacional móvel no país.</li>
        </ul>
        <img src="" alt="">
    </section>

    <section class="como-funciona">
        <h2 class="titulo">Como funciona?</h2>
        <div class="como-funciona-1">
            <img src="media/SVG/Call center-pana.svg" alt="">
            <p>Uma chamada telefônica de uma empresa assinante é feita para um cliente potencial ou existente.</p>
        </div>

        <div class="como-funciona-2">
            <img src="media/SVG/Processing-pana.svg" alt="">
            <p>Em nanossegundos, a solicitação é encaminhada para a plataforma da Telecall que processa a chamada e
                adiciona as informações verificadas antes de encaminhá-la ao destinatário.</p>
        </div>

        <div class="como-funciona-1">
            <img src="media/SVG/Calling-bro 1.svg" alt="">
            <p>As informações aparecem na tela do celular do recipiente que atenderá a ligação com uma chamada de voz
                normal.</p>
        </div>
    </section>

    <section class="beneficios">
        <h2 class="titulo">Benefícios</h2>
        <ul>
            <li>Estabeleça Confiança</li>
            <p>Clientes são mais propensos a atender chamadas de organizações com os quais estão familiarizadas e com as
                quais já tem relação.</p>
            <li>Agilize a Conexão</li>
            <p>Quando o motivo da chamada é claro, a chance de o cliente atender é muito maior e a conexão com ele mais
                rápida e eficiente.</p>
            <li>Melhore a Experiência do Cliente</li>
            <p>O nome da marca, logotipo e a visualização do motivo da chamada oferecem uma experiencia
                melhor e muito mais amigável para o cliente.</p>
        </ul>
    </section>

    <section class="usos">
        <h2 class="titulo">Usos</h2>
        <ul>
            <li>Aviso de problemas de <strong>fraude</strong> de cartão de crédito.</li>
            <li>Aviso de atrasos e cancelamentos de <strong>voos.</strong></li>
            <li><strong>Agendamentos</strong> de serviços, entregas, reparos e instalações.</li>
            <li><strong>Avisos</strong> sobre agendamentos, exames e resultados.</li>
            <li>Oferecer uma melhor experiência de <strong>vendas</strong> e <strong>promoções.</strong></li>
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

</html>