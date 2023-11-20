function validarEmail(form){

  const email = form.redefinir.value;

  emails = ["alexandre@gmail.com","thiago@gmail.com","matheus@gmail.com","natan@gmail.com"];

  if(emails.includes(email)){
    alert("Email Enviado")
    window.location = "redefinir2.html"
  }
  else if(email == ""){
    alert("Digite seu e-mail")
  }

  else{
    alert("E-mail não cadastrado")
  }
  
} 