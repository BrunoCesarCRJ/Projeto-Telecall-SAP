<?php
    session_start();

    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        // Acessa
        include_once('conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('ss', $email, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows < 1) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: log.php');
        } else {
            $userData = $result->fetch_assoc();
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['master'] = $userData['master'];
            header('Location: verificacao.php');
        }
    } else {
        // Não acessa
        header('Location: log.php');
    }
?>