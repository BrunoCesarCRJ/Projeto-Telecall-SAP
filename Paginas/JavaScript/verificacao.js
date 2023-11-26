const perguntas = ["Qual o nome da sua mãe?", "Data do seu nascimento?", "CEP do seu endereço?"];

function atualizarPlaceholder() {
  const input = document.getElementById("meuInput");
  const perguntaIndexInput = document.getElementById("perguntaIndex");

  const randomIndex = Math.floor(Math.random() * perguntas.length);

  // Defina o índice da pergunta no campo oculto
  perguntaIndexInput.value = randomIndex;

  // Atualize o placeholder do input com a pergunta
  input.placeholder = perguntas[randomIndex];
}

function limparFormulario() {
	const formulario = document.getElementById("form-ver");
	formulario.reset();
}