// definir que as areas do cpf,telefone sejam apenas numeros, é que
//confirmar se o senhas são iguais
// nome materno e nome sejam apenas letras e endereço tbm

//Verificação de Prenchimento
function verificar(form){

    const nomeComp = form.nome.value;
    const cpf = form.cpf.value;
    const nomeMate = form.nomematerno.value;
    const endereço = form.endereco.value;
    const telefix = form.fixo.value;
    const telecell = form.celular.value;
    const email = form.email.value;
    const senha1 = form.senha.value;
    const senha2 = form.confirme.value;

    let cadastro =0

    if (nomeComp == '' || nomeComp.length < 6) {
        mostrarErro(form.nome, "O nome precisa de no mínimo 6 letras");
    } else {
        limparErro(form.nome);
        cadastro++;
    }

    if (cpf == '' || cpf.length < 11) {
        mostrarErro(form.cpf, "O CPF precisa de no mínimo 11 números");
    } else {
        limparErro(form.cpf);
        cadastro++;
    }

    if (nomeMate == '' || nomeMate.length < 6) {
        mostrarErro(form.nomematerno, "O nome materno precisa de no mínimo 6 letras");
    } else {
        limparErro(form.nomematerno);
        cadastro++;
    }

    if (endereço == '' || endereço.length < 6) {
        mostrarErro(form.endereco, "O endereço precisa de no mínimo 6 letras");
    } else {
        limparErro(form.endereco);
        cadastro++;
    }

    if (telefix == '' || telefix.length < 10) {
        mostrarErro(form.fixo, "O telefone fixo precisa de no mínimo 10 números");
    } else {
        limparErro(form.fixo);
        cadastro++;
    }

    if (telecell == '' || telecell.length < 11) {
        mostrarErro(form.celular, "O celular precisa de no mínimo 11 números");
    } else {
        limparErro(form.celular);
        cadastro++;
    }

    if (email == '' || email.length < 11) {
        mostrarErro(form.email, "O e-mail precisa de no mínimo 11 caracteres");
    } 
    else if (!isValidEmail(email)) {
        mostrarErro(form.email, "O e-mail não é válido");
    } 
    else {
        // Verificar se o e-mail já está cadastrado no banco de dados
        if (isEmailCadastrado(email)) {
            mostrarErro(form.email, "O e-mail já está cadastrado. Por favor, escolha outro.", "mensagem-erro-email-existente");
        } 
        else {
            limparErro(form.email);
            cadastro++;
        }
    }

    if (senha1 == '' || senha1.length < 8) {
        mostrarErro(form.senha, "A senha precisa de no mínimo 8 caracteres");
    } else {
        limparErro(form.senha);
    }

    if (senha2 !== senha1) {
        mostrarErro(form.confirme, "As senhas não coincidem");
    } else {
        limparErro(form.confirme);
    }
    
    if (cadastro > 0) {
        if (empty($erros)) {
            verificarEmailCadastrado(form.email.value);
        }
    }
    return false;
}

function isValidEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

// Função para verificar se o e-mail já está cadastrado
function verificarEmailCadastrado(email) {
    // Fazer uma solicitação assíncrona para verificar se o e-mail já está cadastrado
    fetch('verificar_email.php?email=' + email)
        .then(response => response.json())
        .then(data => {
            if (data.cadastrado) {
                mostrarErro(form.email, 'O e-mail já está cadastrado. Por favor, escolha outro.', 'mensagem-erro-email');
            } else {
                limparErro(form.email);
                cadastro++;
            }
        })
        .catch(error => {
            console.error('Erro ao verificar e-mail:', error);
        });
}

// Classe erro nos campos do formulário

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

function limparFormulario() {
    const formulario = document.getElementById("form-cad");
    formulario.reset();
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

function mostrarSenha2() {
    var senhaInput = document.getElementById('confirme');
    var senhaShow = document.getElementById('toggleButton2');

    if(senhaInput.type === 'password'){
        senhaInput.setAttribute('type','text')
        senhaShow.classList.replace('bi-eye','bi-eye-slash')
    }
    
    else{
        senhaInput.setAttribute('type','password')
        senhaShow.classList.replace('bi-eye-slash','bi-eye')
    }
}