<?php
    include_once('conexao.php');
    
    if(isset($_POST['update'])){
        $id = $_POST['id'];
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
        
        $sqlUpdate = "UPDATE usuarios SET nome='$nome',cpf='$cpf',materno='$materno',endereco='$endereco',telfixo='$fixo',telcel='$celular',email='$email',senha='$senha',nascimento='$nasc',sexo='$genero' WHERE id='$id'";
        
        $result = $conexao->query($sqlUpdate);
        
    }
    header('Location: sistema.php');

?>