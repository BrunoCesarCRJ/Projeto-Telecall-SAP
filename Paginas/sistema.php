<?php
session_start();

ob_start();

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    header('Location: log.php');
    exit;
}

$logado = $_SESSION['email'];
require_once 'usuarios.php';
$p = new Pessoa("contas", "localhost", "root", "");
$dados = $p->buscarDados();

// Verifica se $dados é um array antes de usar a função count

if (!isset($_SESSION['master'])) {
    require_once 'usuarios.php';
    $p = new Pessoa("contas", "localhost", "root", "");
    $dados = $p->buscarDados();

    if (is_array($dados) && count($dados) > 0 && isset($dados[0]['master'])) {
        $masterValue = $dados[0]['master'];
        $_SESSION['master'] = $masterValue;
    } else {
        $_SESSION['master'] = 0;
    }
}

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: log.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telecall - Sistema</title>
    <link rel="stylesheet" href="css/sistema.css">
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

    <?php
        echo "<br>";
        echo "<h3 id='bemvindo'>Bem-vindo, <u>$logado</u>!</h3>";
    ?>
    
    <?php if (isset($_SESSION['master']) && $_SESSION['master'] == 0){ ?>
    <section id="informações">
        <p id="aviso-comum">Por ser um usuário comum, você tem acesso apenas aos seus próprios dados.</p>
        <br>
        <table>
            <tr id="titulo">
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th class="cargo-cell" colspan="3">Cargo</th>
            </tr>
            <?php
            $dados = $p->buscarDados();
            if (count($dados) > 0) {
                for ($i = 0; $i < count($dados); $i++) {
                    echo "<tr>";
                    foreach ($dados[0] as $key => $value) {
                        if ($key != "cpf" && $key != "materno" && $key != "endereco" && $key != "telfixo" && $key != "telcel" && $key != "senha" && $key != "nascimento" && $key != "sexo" && $key != "master") {
                            echo "<td>" . $value . "</td>";
                        }
                    }
                    if (isset($dados[$i]['master'])) {
                            echo "<td>";
                            echo ($dados[$i]['master'] == 0) ? "Usuário comum" : "Administrador";
                            echo "</td>";
                        }
                        echo "<td id=\"edit-td-$i\"><a href=\"editardados.php?id=" . $dados[$i]['id'] . "\"><button id=\"bt1\">Editar</button></a></td>";
    
                        echo "<td id=\"delete-td-$i\"><a href=\"sistema.php?id=" . $dados[$i]['id'] . "\"><button id=\"bt2\">Excluir</button></a></td>";
    
                        echo "</tr>";
                    }
            }
            ?>
        </table>
    </section>
<?php  
}
?>

<?php if (isset($_SESSION['master']) && $_SESSION['master'] == 1) : ?>
    <!-- Seção do HTML que só deve ser exibida para usuários "mestres" -->
    <section id="informações">
        <p id="aviso-admin">Por ser um usuário administrador, você possui acesso ao nosso banco de dados.</p>
        <br>
        <table>
            <tr id="titulo">
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th class="cargo-cell" colspan="3">Cargo</th>
            </tr>
            <?php
            $dados = $p->buscarDados();
            if (count($dados) > 0) {
                for ($i = 0; $i < count($dados); $i++) {
                    echo "<tr>";
                    foreach ($dados[$i] as $key => $value) {
                        if ($key != "cpf" && $key != "materno" && $key != "endereco" && $key != "telfixo" && $key != "telcel" && $key != "senha" && $key != "nascimento" && $key != "sexo" && $key != "master") {
                            echo "<td>" . $value . "</td>";
                        }
                    }
                    if (isset($dados[$i]['master'])) {
                        echo "<td>";
                        echo ($dados[$i]['master'] == 0) ? "Usuário comum" : "Administrador";
                        echo "</td>";
                    }
                    echo "<td id=\"edit-td-$i\"><a href=\"editardados.php?id=" . $dados[$i]['id'] . "\"><button id=\"bt1\">Editar</button></a></td>";

                    echo "<td id=\"delete-td-$i\"><a href=\"sistema.php?id=" . $dados[$i]['id'] . "\"><button id=\"bt2\">Excluir</button></a></td>";

                    echo "</tr>";
                }
            }
            ?>
        </table>
    </section>
<?php endif; ?>

    <script src="JavaScript/index.js"></script>
    <script src="JavaScript/Darkmode.js"></script>
</body>
</html>

<?php
    if(isset($_GET['id'])){
        $id_usuario = addslashes($_GET['id']);
        $p->excluirConta($id_usuario);
        header("Location: sistema.php");
        exit;
    }
?>