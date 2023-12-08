<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $to = $_POST['email'];
        $subject = 'Teste de envio de e-mail.';
        $message = 'Olá, você é programador web?';
        $headers = 'From: bruno.cesar.romao@gmail.com' . "\r\n" . 'Reply-To: bruno.cesar.romao@souunisuam.com.br';
        
        mail($to, subject, $message, $headers);
}
?>