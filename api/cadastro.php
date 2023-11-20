<?php
    if(isset($_POST['submit']))
    {
        /*print_r($_POST['nome']);
        print_r('<br>');
        print_r($_POST['cpf']);
        print_r('<br>');
        print_r($_POST['nomematerno']);
        print_r('<br>');
        print_r($_POST['endereco']);
        print_r('<br>');
        print_r($_POST['fixo']);
        print_r('<br>');
        print_r($_POST['celular']);
        print_r('<br>');
        print_r($_POST['email']);
        print_r('<br>');
        print_r($_POST['senha']);
        print_r('<br>');
        print_r($_POST['nasc']);
        print_r('<br>');
        print_r($_POST['gender']);*/
    

        include_once('conexao.php');

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $materno = $_POST['nomematerno'];
        $endereco = $_POST['endereco'];
        $fixo = $_POST['fixo'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nasc = $_POST['nasc'];
        $genero = $_POST['gender'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,cpf,materno,endereco,telfixo,telcel,email,senha,nascimento,sexo) 
        VALUES('$nome','$cpf','$materno','$endereco','$fixo','$celular','$email','$senha','$nasc','$genero')");

        header('Location: log.php');

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telecall - Cadastro</title>
    <link rel="stylesheet" href="./css/cadastro.css">
    <link rel="shortcut icon" href="media/Icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <header class="menu-bg">
        <div class="menu">
            <div class="menu-logo">
                <a href="index.php"><img class="logo-telecall" src="./media/imagens/logo_telecall_branco_vermelho_p.png" alt="Telecall"></a>
            </div>

            <div class="bem-vindo">
                <p>BEM VINDO(A) !</p>
                <a class="entrar-button" href="log.php">ENTRAR</a>
                <div class="dark">
                    <button><img src="media/Icons/dark_mode_FILL0_wght400_GRAD0_opsz48.svg" alt="Modo Escuro" title="Modo Escuro" id="dark"></button>
                </div>
            </div>
        </div>
    </header>
    <main class="container">
        <div class="conteudo">
            <div class="form-image">
                <img src="./media/SVG/undraw_learning_re_32qv.svg" alt="">
            </div>

            <div class="form" onsubmit="return validarFormulario(this);">
                <form action="cadastro.php" method = "POST" id="form-cad">
                    <div class="form-header">
                        <div class="title">
                            <h1>CADASTRE-SE</h1>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="group">
                            <div class="input-box1">
                                <label for="nome">Nome completo</label>
                                <input type="text" id="nome" name="nome" required>
                                <span class="mensagem-erro" id="mensagem-erro-nome"></span>

                                <label for="cpf">CPF</label>
                                <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required onblur="mascaraCpf(this)">
                                <span class="mensagem-erro" id="mensagem-erro-cpf"></span>

                                <label for="nomematerno">Nome Materno</label>
                                <input type="text" id="nomematerno" name="nomematerno" required>
                                <span class="mensagem-erro" id="mensagem-erro-nomematerno"></span>

                                <label for="endereco">Endereço</label>
                                <input type="text" id="endereco" name="endereco" required>
                                <span class="mensagem-erro" id="mensagem-erro-endereco"></span>
                            
                                <label for="fixo">Telefone Fixo</label>
                                <input type="tel" id="fixo" name="fixo" placeholder="(+55)xx-xxxxxxxx" onblur="mascaraTele(this)" onfocus="tiraHifen(this)">
                                <span class="mensagem-erro" id="mensagem-erro-fixo"></span>

                            </div>
                            <div class="input-box1">
                                <label for="celular">Telefone Celular</label>
                                <input type="text" id="celular" name="celular" placeholder="(+55)xx-xxxxxxxxx" onblur="mascaraCell(this)" onfocus="tiraHifen(this)" required>
                                <span class="mensagem-erro" id="mensagem-erro-celular"></span>

                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
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
                                        <input type="date" id="nasc" name="nasc" required>
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
                                    <input type="radio" id="famele" name="gender" value = "feminino">
                                    <label for="famele">Feminino</label>
                                </div>

                                <div class="gender-input">
                                    <input type="radio" id="mele" name="gender" value = "masculino">
                                    <label for="mele">Masculino</label>
                                </div>
                            </div>
                            <div class="gender-box2">
                                <div class="gender-input">
                                    <input type="radio" id="others" name="gender" value = "outro">
                                    <label for="others">Outro</label>
                                </div>

                                <div class="gender-input">
                                    <input type="radio" id="none" name="gender" value = "prefiro não dizer">
                                    <label for="none">Prefiro não dizer</label>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="cadastrar">
                        <input type="submit" name="submit" value="CADASTRAR" onclick="verificar(this.form)">
                        <button type="button" onclick="limparFormulario()">LIMPAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="JavaScript/Cadastro.js"></script>
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
