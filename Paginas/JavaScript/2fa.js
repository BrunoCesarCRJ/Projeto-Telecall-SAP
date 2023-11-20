function menuShow() {
  let menuMobile = document.querySelector(".mobile-menu");
  if (menuMobile.classList.contains("open")) {
    menuMobile.classList.remove("open");
  } else {
    menuMobile.classList.add("open");
  }
}

const perguntas = ["Qual o nome da sua mãe?", "Data do seu nascimento?", "CEP do seu endereço?"];

function atualizarPlaceholder() {
  const input = document.getElementById("meuInput");
  const randomIndex = Math.floor(Math.random() * perguntas.length);
  input.placeholder = perguntas[randomIndex];
}

function enviarResposta() {
  const input = document.getElementById("meuInput");
  const resposta = input.value;
  alert("Resposta: " + resposta);
}

atualizarPlaceholder();