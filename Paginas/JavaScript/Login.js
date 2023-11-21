function limparFormulario() {
	const formulario = document.getElementById("form-log");
	formulario.reset();
}
	
function mostrarErro(input, mensagem) {
	const errorSpan = document.getElementById(`mensagem-erro-${input.id}`);
	errorSpan.textContent = mensagem;
	input.parentElement.className = 'input-group erro';
}
	
function limparErro(input) {
	const errorSpan = document.getElementById(`mensagem-erro-${input.id}`);
	errorSpan.textContent = '';
	input.parentElement.className = 'input-group';
}

function mostrarSenha() {
    var senhaInput = document.getElementById('senha');
    var senhaShow = document.getElementById('toggleButton');

    if(senhaInput.type === 'password'){
        senhaInput.setAttribute('type','text')
        senhaShow.classList.replace('bi-eye','bi-eye-slash')
    }
    
    else{
        senhaInput.setAttribute('type','password')
        senhaShow.classList.replace('bi-eye-slash','bi-eye')
    }
}