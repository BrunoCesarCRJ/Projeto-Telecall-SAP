<?php
    session_start();
    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        // Acessa
        include_once('conexao.php');
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        /*print_r('Email: ' . $email);
        print_r('<br>');
        print_r('Senha: ' . $senha);*/

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        $result = $conexao->query($sql);

        print_r($sql);
        print_r($result);

        if(mysqli_num_rows($result) < 1){
            //print_r('Usuário não encontrado.');
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: log.php');
        }

        else{
            //print_r('Usuário encontrado.');
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }
    }
    else{
        // Não acessa
        header('Location: log.php');
    }


?>