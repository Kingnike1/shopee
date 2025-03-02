// login.js
const formLogin = document.getElementById('login-form');
const mensagemErro = document.getElementById('mensagem-erro');

formLogin.addEventListener('submit', (e) => {
    e.preventDefault(); // Impede o envio do formulário

    // Pega os valores do formulário
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    // Autentica o usuário com Firebase
    firebase.auth().signInWithEmailAndPassword(email, senha)
        .then((userCredential) => {
            // Login bem-sucedido
            const user = userCredential.user;
            console.log('Usuário logado:', user.email);
            window.location.href = 'admin.html'; // Redireciona para a área administrativa
        })
        .catch((error) => {
            // Trata erros de login
            mensagemErro.textContent = error.message;
            mensagemErro.style.display = 'block';
        });
});
