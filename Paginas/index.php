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
    <title>Telecall</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="media/Icons/favicon.ico" type="image/x-icon">
    <script src="JavaScript/index.js"></script>
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
    <div class="fundo">
        <div class="image-modavo">
            <img src="./media/SpaaS/modavo_teteu.PNG" alt="modavo">
        </div>
    </div>
    <section class="cpaas-oque-e">
        <div class="cpaas-info">
            <div class="cpaas-h1">
                <h1>CPaaS: O que é?</h1>
            </div>
            <div class="info-conteudo">
                <div class="h2-azul">
                    <h2>Communications Platform as a Service</h2>
                </div>
                <h2>Plataforma de Comunicação como Serviço</h2>

                <p>É uma solução de software de comunicação que atua como uma base sobre a qual desenvolvedores podem
                    integrar uma variedade de aplicativos.</p>

                <p>Métodos de comunicação típicos, como voz, chamadas de vídeo ou mensagens de texto SMS, podem ser
                    incorporados em outros sistemas por meio de APIs que se conectam à plataforma CPaaS.</p>

                <p>Essas APIs permitem que as empresas expandam suas ofertas sem a necessidade de hardware ou software
                    adicional.
                </p>
            </div>
            <div class="info-image">
                <img src="./media/SVG/App development-amico.svg" alt="">
            </div>
        </div>
    </section>
    <section class="cpaas-oque-e2">
        <div class="cpaas-info2">
            <p>O CPaaS, com sua <strong>escalabilidade,
                    flexibilidade, autenticação</strong> e <strong>segurança</strong>
                aprimoradas, está <strong>revolucionando</strong> o modo como
                as empresas habilitadas em nuvem implementam
                <strong>comunicações de voz, SMS e vídeo.</strong>
            </p>
        </div>
    </section>
    <section class="cpaas-trans-digital">
        <div class="cpaas-trans-digital-lista">
            <h2>CPaaS e a Transformação Digital</h2>
            <ul>
                <li>Expectativa de crescimento estimado de
                    <strong>$ 8,2 bilhões</strong> em 2021
                </li>
                <li><strong>85%</strong> dos profissionais se conectam de maneira diferente com colegas e clientes
                    do que faziam há apenas 5 anos.
                </li>
                <li>As receitas de CPaaS estão crescendo mais de <strong>40%</strong> ao ano.
                </li>
                <li><strong>CPaaS</strong> já ultrapassou o mercado de <strong>UCaaS</strong> (Unified Communication
                    as a Service).</li>
                <li>Marcas que estão em <strong>múltiplos canais</strong> melhoram a experiência do usuário e
                    aumentam seus resultados.</li>
            </ul>
        </div>
    </section>
    <section class="logistica">
        <div class="produto">
            <h2>Logística</h2>
            <p>Acesso seguro com 2FA.</p>
            <p>Uso de números mascarados para proteção de funcionário e cliente.</p>
            <p>Mantenha o cliente informado sobre entrega e serviços.</p>
            <p>Verified calling para confirmação de entregas.</p>
        </div>

        <div class="produto">
            <h2>Varejo</h2>
            <p>Compra segura com 2FA.</p>
            <p>Avisos sobre compras e entregas.</p>
            <p>Upsell com novas ofertas e vantagens via SMS ou Verified Calling.</p>
        </div>

        <div class="produto">
            <h2>Call Center</h2>
            <p>Melhore taxas de abertura utilizando alertas SMS para confirmações.</p>
            <p>Economia de números com o uso de um único número máscara por todos os agentes.</p>
            <p>Verified Calling para confirmação de agendamentos.</p>
        </div>

        <div class="produto">
            <h2>Saúde</h2>
            <p>Acesso seguro com 2FA.</p>
            <p>Melhore o agendamento e reduza faltas com lembretes por SMS.</p>
            <p>Tokens de autorização para procedimentos com 2FA.</p>
            <p>Verified Calling para avisos de resultados e agendamentos.</p>
        </div>
    </section>

    <section class="exemplos">
        <h2>Exemplos</h2>
        <div class="container-1">
            <div class="calendar-p">
                <p>Cliente fez um agendamento no site.</p>
            </div>
            <div class="calendar-img">
                <img src="media/SVG/Online calendar-cuate.svg" alt="">
            </div>

            <div class="email-p">
                <p>Enviado e-mail de confirmação.</p>
            </div>
            <div class="email-img">
                <img src="media/SVG/Emails-amico.svg" alt="">
            </div>
        </div>
        <div class="container-2">
            <div class="account-p">
                <p>Cliente acessa sua conta.</p>
            </div>
            <div class="account-img">
                <img src="media/SVG/Sign in-amico.svg" alt="">
            </div>

            <div class="pin-p">
                <p>Código PIN é enviado via SMS.</p>
            </div>
            <div class="pin-img">
                <img src="media/SVG/Enter OTP-bro.svg" alt="">
            </div>
        </div>
        <div class="container-2">
            <div class="calendar-2-p">
                <p>Data de instalação se aproxima.</p>
            </div>
            <div class="calendar-2-img">
                <img src="media/SVG/Calendar-amico.svg" alt="">
            </div>

            <div class="sms-p">
                <p>Mensagem de voz e SMS são enviadas pro telefone do cliente.</p>
            </div>
            <div class="sms-img">
                <img src="media/SVG/New message-amico.svg" alt="">
            </div>
        </div>
        <div class="container-1">
            <div class="compra-p">
                <p>Atualização no envio de uma compra.</p>
            </div>
            <div class="compra-img">
                <img src="media/SVG/Annotation-cuate.svg" alt="">
            </div>

            <div class="sms-2-p">
                <p>Atualização enviada pro cliente via e-mail e SMS</p>
            </div>
            <div class="sms-2-img">
                <img src="media/SVG/New message-bro.svg" alt="">
            </div>
        </div>

    </section>

    <section class="exemplos-mobile">
        <h2>Exemplos</h2>
        <div class="box-1">
            <div>
                <p>Cliente fez um agendamento no site.</p>
            </div>
            <div>
                <img src="media/SVG/Online calendar-cuate.svg" alt="">
            </div>
        </div>
        <div class="box-2">
            <div>
                <p>Enviado e-mail de confirmação.</p>
            </div>
            <div>
                <img src="media/SVG/Emails-amico.svg" alt="">
            </div>
        </div>
        <div class="box-3">
            <div>
                <p>Cliente acessa sua conta.</p>
            </div>
            <div>
                <img src="media/SVG/Sign in-amico.svg" alt="">
            </div>
        </div>
        <div class="box-4">
            <div class="pin-p">
                <p>Código PIN é enviado via SMS.</p>
            </div>
            <div>
                <img src="media/SVG/Enter OTP-bro.svg" alt="">
            </div>
        </div>
        <div class="box-5">
            <div>
                <p>Data de instalação se aproxima.</p>
            </div>
            <div>
                <img src="media/SVG/Calendar-amico.svg" alt="">
            </div>
        </div>
        <div class="box-6">
            <div>
                <p>Mensagem de voz e SMS são enviadas pro telefone do cliente.</p>
            </div>
            <div>
                <img src="media/SVG/New message-amico.svg" alt="">
            </div>
        </div>
        <div class="box-7">
            <div>
                <p>Atualização no envio de uma compra.</p>
            </div>
            <div>
                <img src="media/SVG/Annotation-cuate.svg" alt="">
            </div>
        </div>
        <div class="box-8">
            <div>
                <p>Atualização enviada pro cliente via e-mail e SMS</p>
            </div>
            <div>
                <img src="media/SVG/New message-bro.svg" alt="">
            </div>
        </div>

    </section>

    <section class="vantagens-telecall">
        <h2>Vantagens Telecall</h2>
        <div class="part1">
            <ul class="nomes">
                <li class="um">Confiança</li>
                <li class="dois">Agilidade</li>
                <li class="tres">Garantia de Rede</li>
                <li class="quatro">Suporte ao Cliente</li>
                <li class="cinco">Preço</li>
            </ul>
        </div>
        <div class="part2">
            <ul class="info">
                <li class="um">Empresa que já conhecem e confiam</li>
                <li class="dois">Aplicativos de rápida implementação</li>
                <li class="tres">Rede própria de alta capacidade e controle total de ponta-a-ponta</li>
                <li class="quatro">Representantes locais de vendas e suporte</li>
                <li class="cinco">Melhor custo benefício para um conjunto completo de recursos e serviços</li>
            </ul>
        </div>
    </section>
    <section class="vantagens-telecall-mobile">
        <h2>Vantagens Telecall</h2>
        <div>
            <ul class="nomes">
                <li class="parte1">Confiança</li>
                <li class="part2">Empresa que já conhecem e confiam</li>
                <br>
                <li class="parte1">Agilidade</li>
                <li class="part2">Aplicativos de rápida implementação</li>
                <br>
                <li class="parte1">Garantia de Rede</li>
                <li class="part2">Rede própria de alta capacidade e controle total de ponta-a-ponta</li>
                <br>
                <li class="parte1">Suporte ao Cliente</li>
                <li class="part2">Representantes locais de vendas e suporte</li>
                <br>
                <li class="parte1">Preço</li>
                <li class="part2">Melhor custo benefício para um conjunto completo de recursos e serviços</li>
            </ul>
        </div>
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