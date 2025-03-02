// scripts/session_start.js

// Função para verificar o estado de autenticação
function verificarAutenticacao() {
    const user = firebase.auth().currentUser;

    if (user) {
        // Usuário está logado
        console.log("Usuário logado:", user.email);
        sessionStorage.setItem("usuarioLogado", "true"); // Armazena o estado de autenticação
    } else {
        // Usuário não está logado
        console.log("Nenhum usuário logado.");
        sessionStorage.removeItem("usuarioLogado"); // Remove o estado de autenticação
        window.location.href = "login.html"; // Redireciona para a página de login
    }
}

// Função para inicializar a verificação de autenticação
function iniciarSessao() {
    // Observa mudanças no estado de autenticação
    firebase.auth().onAuthStateChanged((user) => {
        if (user) {
            console.log("Sessão iniciada para:", user.email);
            sessionStorage.setItem("usuarioLogado", "true"); // Armazena o estado de autenticação
        } else {
            console.log("Nenhum usuário logado.");
            sessionStorage.removeItem("usuarioLogado"); // Remove o estado de autenticação
            window.location.href = "login.html"; // Redireciona para a página de login
        }
    });
}

// Inicializa a sessão quando a página é carregada
document.addEventListener("DOMContentLoaded", () => {
    iniciarSessao();
});
