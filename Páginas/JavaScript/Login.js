
var pessoas =[
	{
		nome:"Alexandre",
		usuario: "alexandre@gmail.com",
		senha: "123"
	},
	{
		nome:"Thiago",
		usuario: "thiago@gmail.com",
		senha: "456"
	},
	{
		nome:"Matheus",
		usuario: "matheus@gmail.com",
		senha: "789"
	},
	{
		nome:"Natan",
		usuario: "natan@gmail.com",
		senha: "101"
	}
]

function validar(form){

   
	const email = form.email.value;

	const senha = form.senha.value;


	for(i= 0 ;i<pessoas.length; i++){
		if(email == pessoas[i].usuario && senha == pessoas[i].senha){
			alert("Bem Vindo" + " "+pessoas[i].nome)
			}break
		
		}
		for(i= 0 ;i<pessoas.length; i++){
			if(email != pessoas[i].usuario ){
				mostrarErro(form.email, "E-mail incorreto");
			}break
			
		}
		for(i= 0 ;i<pessoas.length; i++){
			if(senha != pessoas[i].senha ){
				mostrarErro(form.senha, "Senha incorreta");
			}break
			
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