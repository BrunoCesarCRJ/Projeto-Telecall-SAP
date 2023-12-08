<?php
require_once 'conexao.php';

class Pessoa {
    private $conexao;

    public function __construct($bancodedados, $hostname, $usuario, $senha) {
        try {
            $this->conexao = new PDO("mysql:host=$hostname;dbname=$bancodedados", $usuario, $senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }

    public function buscarDados($idUsuario = null) {
        if (isset($_SESSION['master']) && $_SESSION['master'] == 1) {
            $sql = "SELECT id, nome, email, master FROM usuarios";
        } else {
            $emailDaSessao = $_SESSION['email'];
            $sql = "SELECT id, nome, email, master FROM usuarios WHERE email = '$emailDaSessao'";
        }

        $result = $this->conexao->query($sql);

        if ($result) {
            $dados = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $dados[] = $row;
            }

            if (!empty($dados)) {
                return $dados;
            }
        }

        return array();
    }

    public function entrar($email, $senha) {
        $cmd = $this->conexao->prepare("SELECT * FROM usuarios WHERE email = :e AND senha = :s");
        $cmd->bindValue(":e", $email);
        $cmd->bindValue(":s", $senha);
        $cmd->execute();

        $dados = $cmd->fetch(PDO::FETCH_ASSOC);

        if ($dados) {
            session_start();
            $_SESSION['master'] = ($dados['master'] == 1) ? 1 : 0;
            return true;
        } else {
            return false;
        }
    }

    public function excluirConta($id) {
        $cmd = $this->conexao->prepare("DELETE FROM usuarios WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
    }

    public function buscarDadosConta($id) {
        $cmd = $this->conexao->prepare("SELECT * FROM usuarios WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }

    public function getConexao() {
        return $this->conexao;
    }
}

$p = new Pessoa("contas", "localhost", "root", "");
?>