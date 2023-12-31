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
    <title>Telecall - 2FA</title>
    <link rel="stylesheet" href="css/2fa.css">
    <script src="JavaScript/2fa.js"></script>
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
    <section class="info-2fa-bg">
        <h2 class="titulo-0">2FA</h2>
        <div class="info-2fa">
            <h2 class="h2-azul">Two-Factor Authentication</h2>
            <h2 class="h2-2">Autenticação de dois fatores</h2>
            <p>O 2FA é um procedimento de segurança que garante que serão necessários 2 fatores únicos para liberação de
                uma ação. O
                primeiro fator é a senha que o usuário e o segundo pode ser
                autenticado via token, via detecção de impressão digital,
                reconhecimento facial, código enviado via sms, entre outros.</p>
        </div>
        <div class="info-2fa-img">
            <img src="media/SVG/Two factor authentication-amico.svg" alt="">
        </div>

        <div class="funcao">
            <h2>O 2FA permite que você:</h2>
            <ul>
                <li><strong>Envie</strong> uma senha via SMS, voz ou e-mail para autenticação do usuário.</li>
                <li><strong>Adicione</strong> uma camada extra de segurança além da senha pessoal.</li>
                <li><strong>Ofereça</strong> maior segurança para usuários.</li>
            </ul>
        </div>
    </section>

    <section class="info2-2fa">
        <div class="info2-2fa-div">
            <h2 class="h2-2">Fortaleça a estratégia de segurança de seu negócio.</h2>
            <p>Adicionar um número de telefone de recuperação a uma conta individual pode bloquear até:</p>
            <p class="diferente"><strong>100%</strong> dos bots automatizados,<br><strong> 99%</strong> dos ataques de
                phishing em massa,<br> e <strong>66%</strong> dos ataques direcionados.</p>
        </div>
    </section>

    <section class="como-funciona">
        <h2 class="titulo">Como Funciona</h2>
        <div class="passo1">
            <img src="media/SVG/Tablet login-amico.svg" alt="">
            <p>Usuário acessa seu site ou aplicativo e digita a senha cadastrada para entrar em seu perfil ou completar
                uma transação.</p>
        </div>

        <div class="passo2">
            <img src="media/SVG/Warning-rafiki.svg" alt="">
            <p>A Telecall recebe a tentativa de login e solicita que o usuário insira seu número de telefone para
                autorizar o acesso.</p>
        </div>

        <div class="passo3">
            <img src="media/SVG/Enter OTP-bro (2).svg" alt="">
            <p>Após inserir seu número, a Telecall envia para o usuário por SMS, chamada ou e-mail um código PIN (One
                Time Password [OTP]) de uso único.</p>
        </div>

        <div class="passo4">
            <img src="media/SVG/Enter OTP-pana.svg" alt="">
            <p>O usuário insere o código no site ou aplicativo para concluir o processo de verificação.</p>
        </div>
    </section>

    <section class="beneficios">
        <div class="funcao">
            <h2 class="titulo">Beneficios</h2>
            <ul>
                <li>Ofereça <strong>segurança aprimorada</strong> para seus clientes.</li>
                <li>Reduza casos de <strong>fraude e invasões</strong> e evite o acesso a dados por invasores.</li>
                <li>Envio de OTP por meio de <strong>vários canais</strong>, incluindo SMS, voz ou e-mail.</li>
                <li><strong>Flexibilidade</strong> de canais garante que o usuário conseguirá completar a tarefa
                    desejada mesmo quando tiver problema com um deles. Exemplo: Enviar OTP por SMS, em caso de falha,
                    enviar OTP por chamada de voz, em caso de outra falha, enviar por e-mail.</li>
                <li>API simples e de <strong>rápida implementação.</strong></li>
                <li><strong>Plataforma intuitiva</strong> que permite visualizar relatórios de uso por dia, mês ou ano e
                    pesquisar usando diversos critérios de filtro.</li>
            </ul>
        </div>
    </section>
    <section class="quem-usa2">
        <div class="quem-usa2-h1">
            <h2 class="titulo">Quem Usa ?</h2>
        </div>
        <div class="quem-usa">

            <div class="lista-quem-usa">
                <h3>Finanças</h3>
                <ul>
                    <li>Acesso ao portal/app</li>
                    <li>Autenticação para transações bancárias</li>
                    <li>Pagamentos Online (PicPay, PayPal)</li>
                    <li>Digital Wallets (Google Pay, Apple Pay, Samsung Pay)</li>
                </ul>
                <span class="img-quem-usa">
                    <img src="media/Quem usa/Financas/bradesco.PNG" alt="bradesco">
                    <img src="media/Quem usa/Financas/mercadopago.PNG" alt="Mercado Pago">
                    <img src="media/Quem usa/Financas/picpay.PNG" alt="PicPay">
                </span>
            </div>

            <div class="lista-quem-usa">
                <h3>Saúde</h3>
                <ul>
                    <li>Acesso ao portal/app</li>
                    <li>Agendamentos</li>
                    <li>Tokens de autorização</li>
                    <li>Telemedicina</li>
                </ul>
                <span class="img-quem-usa">
                    <img src="media/Quem usa/saude/amil.PNG" alt="Amil Saúde">

                </span>
            </div>

            <div class="lista-quem-usa">
                <h3>Turismo</h3>
                <ul>
                    <li>Acesso ao portal/app</li>
                    <li>Gestão de Reservas</li>
                    <li>Acesso ao histórico</li>
                    <li>Salvar dados de pagamentos</li>
                    <li>Recuperação de Senha</li>
                </ul>
                <span class="img-quem-usa">
                    <img src="media/Quem usa/turismo/airbnb.PNG" alt="Airbnb">
                </span>
            </div>

            <div class="lista-quem-usa">
                <h3>Varejo</h3>
                <ul>
                    <li>Acesso ao portal/app</li>
                    <li>Salvar dados de pagamentos</li>
                    <li>Acesso ao histórico</li>
                    <li>Recuperação de Senha</li>
                    <li>Recibo Eletrônico</li>
                </ul>
                <span class="img-quem-usa">
                    <img src="media/Quem usa/varejo/amazon.PNG" alt="Amazon">
                    <img src="media/Quem usa/varejo/appstore.PNG" alt="App Store">
                    <img src="media/Quem usa/varejo/mercadolivre.PNG" alt="Mercado Livre">
                </span>
            </div>

            <div class="lista-quem-usa">
                <h3>Governo</h3>
                <ul>
                    <li>Acesso ao portal/app</li>
                    <li>Gestão de informações</li>
                    <li>Agendamentos</li>
                    <li>Recuperação de Senha</li>
                </ul>
                <span class="img-quem-usa">
                    <img src="media/Quem usa/governo/cnh.PNG" alt="CNH Digital">
                    <img src="media/Quem usa/governo/governo.PNG" alt="">
                    <img src="media/Quem usa/governo/governo2.PNG" alt="Receita Federal">
                </span>
            </div>
        </div>
        <div class="pergunta-input">
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