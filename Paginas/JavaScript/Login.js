function validar(form){

   
	const email = form.email.value;

	const senha = form.senha.value;


	let cadastro =0

    if (email == '' || email.length < 11) {
        mostrarErro(form.email, "O e-mail precisa de no mínimo 11 caracteres");
    } else {
        limparErro(form.email);
        cadastro++;
    } 

    if (senha1 == '' || senha1.length < 8) {
        mostrarErro(form.senha, "A senha precisa de no mínimo 8 caracteres");
    } else {
        limparErro(form.senha);
        cadastro++;
    }
}

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