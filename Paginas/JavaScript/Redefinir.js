function validarEmail(form) {
  const email = form.redefinir.value;

  // Fazer uma requisição AJAX para obter a lista de e-mails do backend
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "seu_backend/endpoint/que_retorna_emails.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const emails = JSON.parse(xhr.responseText);

      if (emails.includes(email)) {
        alert("Email Enviado");
        window.location.href = "redefinir2.html";
      } else if (email.trim() === "") {
        alert("Digite seu e-mail");
      } else {
        alert("E-mail não cadastrado");
      }
    }
  };
  xhr.send();
}