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
    } else {
        limparErro(form.email);
        cadastro++;
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



};

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


// Formatação de Telefone Celular

/*function mascaraTele(telefone){

    const telefonef = telefone.value;
    const tele = telefonef.length === 10;

    let ajuste;
    if(tele){
        const parte1 = telefonef.slice(0,2);
        const parte2 = telefonef.slice(2,6);
        const parte3 = telefonef.slice(6,10);
        ajuste = `(${parte1}) ${parte2}-${parte3}`

    }else if(tele<10){
        mostrarErro(form.telecell, "O máximo de caracteres é 10. Por favor, entre de novo com o texto.");

        return
    }
    else if(tele.length>11){
        mostrarErro(form.telefix, "O máximo de caracteres é 11. Por favor, entre de novo com o texto.");
        return
    }

    telefone.value = ajuste;

};


function mascaraCell(telefone) {
    const telefonef = telefone.value;
    const celular = telefonef.length === 11;

    let ajuste;

    if (celular) {
        const parte1 = telefonef.slice(0, 2);
        const parte2 = telefonef.slice(2, 7);
        const parte3 = telefonef.slice(7, 11);
        ajuste = `(${parte1}) ${parte2}-${parte3}`;
    } else {
        mostrarErro(telefone, "Número de celular errado.");
        return;
    }

    telefone.value = ajuste;
}


// Formatação de Cpf 
function mascaraCpf(cpf){

    const cpff = cpf.value
    const Cpf = cpff.length === 11
    let forma;
    if(Cpf){
        const parte1 = cpff.slice(0,3);
        const parte2 = cpff.slice(3,6);
        const parte3 = cpff.slice(6,9);
        const parte4 = cpff.slice(9,11);
        forma = `${parte1}.${parte2}.${parte3}-${parte4}`
        
    }else{
        mostrarErro(cpf, "Número de CPF inválido.");
        return
    }
    cpf.value = forma
}
*/
function limparFormulario() {
    const formulario = document.getElementById("form-cad");
    formulario.reset();
};


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