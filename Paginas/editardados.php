<?php
session_start();

ob_start();

$logado = $_SESSION['email'];

    if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
        header('Location: log.php');
        exit;
    }
    
    
    if (!empty($_GET['id'])) {
        
        include_once('conexao.php');
    
        $id = $_GET['id'];
    
        $sqlSelect = "SELECT * FROM usuarios WHERE id = $id";
    
        $result = $conexao->query($sqlSelect);
        
        //print_r($result);
    
        if ($result->num_rows > 0) {
            while ($dados = mysqli_fetch_assoc($result)) {
                $nome = $dados['nome'];
                $cpf = $dados['cpf'];
                $materno = $dados['materno'];
                $endereco = $dados['endereco'];
                $fixo = $dados['telfixo'];
                $celular = $dados['telcel'];
                $email = $dados['email'];
                $senha = $dados['senha'];
                $nasc = $dados['nascimento'];
                $genero = $dados['sexo'];
            }
        }
        else {
            header('Location: sistema.php');
            
        }
    }
    else{
        header('Location: sistema.php');
    }

//var_dump($_GET);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telecall - Atualizar Dados</title>
    <link rel="stylesheet" href="./css/editardados.css">
    <link rel="shortcut icon" href="media/Icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <header class="menu-bg">
        <div class="menu">
            <div class="menu-logo">
                <a href="index.php"><img class="logo-telecall" src="./media/imagens/logo_telecall_branco_vermelho_p.png" alt="Telecall"></a>
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
    <main class="container">
        <div class="conteudo">
            <div class="form-image">
                <img src="./media/SVG/undraw_learning_re_32qv.svg" alt="">
            </div>

            <div class="form">
                <form action="salvaredit.php" method = "POST" id="form-cad">
                    <div class="form-header">
                        <div class="title">
                            <h1>ATUALIZE SEUS DADOS</h1>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="group">
                            <div class="input-box1">
                                <label for="nome">Nome completo</label>
                                <input type="text" id="nome" name="nome" value="<?php echo ($nome); ?>" required>
                                <span class="mensagem-erro" id="mensagem-erro-nome"></span>

                                <label for="cpf">CPF</label>
                                <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" value="<?php echo ($cpf); ?>" required onblur="mascaraCpf(this)">
                                <span class="mensagem-erro" id="mensagem-erro-cpf"></span>

                                <label for="nomematerno">Nome Materno</label>
                                <input type="text" id="nomematerno" name="nomematerno" value="<?php echo ($materno); ?>" required>
                                <span class="mensagem-erro" id="mensagem-erro-nomematerno"></span>

                                <label for="endereco">Endereço</label>
                                <input type="text" id="endereco" name="endereco" value="<?php echo ($endereco); ?>" required>
                                <span class="mensagem-erro" id="mensagem-erro-endereco"></span>
                            
                                <label for="fixo">Telefone Fixo</label>
                                <input type="tel" id="fixo" name="fixo" placeholder="(+55)xx-xxxxxxxx" value="<?php echo ($fixo); ?>" onblur="mascaraTele(this)" onfocus="tiraHifen(this)">
                                <span class="mensagem-erro" id="mensagem-erro-fixo"></span>

                            </div>
                            <div class="input-box1">
                                <label for="celular">Telefone Celular</label>
                                <input type="text" id="celular" name="celular" placeholder="(+55)xx-xxxxxxxxx" value="<?php echo ($celular); ?>" onblur="mascaraCell(this)" onfocus="tiraHifen(this)" required>
                                <span class="mensagem-erro" id="mensagem-erro-celular"></span>

                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="<?php echo ($email); ?>" required>
                                <span class="mensagem-erro" id="mensagem-erro-email"></span>

                                <div id="senhaContainer">
                                    <label for="senha">Senha</label>
                                    <input type="password" id="senha" name="senha" required>
                                    <i class="bi bi-eye" id="toggleButton" onclick="mostrarSenha()"></i>
                                    <span class="mensagem-erro" id="mensagem-erro-senha"></span>
                                </div>

                                <div id="senhaContainer">
                                    <label for="confirme">Confirme sua senha</label>
                                    <input type="password" id="confirme" name="confirme" required>
                                    <i class="bi bi-eye" id="toggleButton2" onclick="mostrarSenha2()"></i>
                                    <span class="mensagem-erro" id="mensagem-erro-confirme"></span>
                                </div>
                                
                                <div class="birth">
                                    <div class="birth-input1">
                                        <label for="nasc">Data de Nascimento</label>
                                        <input type="date" id="nasc" name="nasc" value="<?php echo ($nasc); ?>" required>
                                        <span class="mensagem-erro" id="mensagem-erro-"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gender-inputs">
                        <div class="gender-itens">

                            
                            <p>Gênero:</p>
                            <div class="gender-box1">
                                
                                <div class="gender-input">
                                    <input type="radio" id="famele" name="gender" value="feminino" <?php echo ($genero) == 'feminino' ? 'checked' : '' ?>>
                                    <label for="famele">Feminino</label>
                                </div>

                                <div class="gender-input">
                                    <input type="radio" id="mele" name="gender" value="masculino" <?php echo ($genero) == 'masculino' ? 'checked' : '' ?>>
                                    <label for="mele">Masculino</label>
                                </div>
                            </div>
                            <div class="gender-box2">
                                <div class="gender-input">
                                    <input type="radio" id="others" name="gender" value="outro" <?php echo ($genero) == 'outro' ? 'checked' : '' ?>>
                                    <label for="others">Outro</label>
                                </div>

                                <div class="gender-input">
                                    <input type="radio" id="none" name="gender" value="prefiro não dizer" <?php echo ($genero) == 'prefiro não dizer' ? 'checked' : '' ?>>
                                    <label for="none">Prefiro não dizer</label>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="cadastrar">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="update" id="update" value="ENVIAR" onclick="verificar(this.form)">
                        <button type="button" onclick="limparFormulario()">LIMPAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="JavaScript/editardados.js"></script>
    <script src="JavaScript/Darkmode.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script>
        $('#cpf').mask('000.000.000-00');
        $('#fixo').mask('(+55) 00-0000-0000');
        $('#celular').mask('(+55) 00-00000-0000');
    </script>
</body>

<footer>
    <div class="footer-fundo">
        <div class="footer">
            <p>Copyright © 2023 Telecall. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>
</html>