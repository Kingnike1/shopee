// scripts/admin.js
const auth = firebase.auth();
const db = firebase.firestore();

// Verifica se o usuário está logado
auth.onAuthStateChanged((user) => {
    if (!user) {
        window.location.href = 'login.html'; // Redireciona para o login se não estiver autenticado
    } else {
        console.log('Usuário autenticado:', user.email);
        carregarProdutos(); // Carrega os produtos ao entrar
    }
});

// Logout
function fazerLogout() {
    firebase.auth().signOut().then(() => {
        sessionStorage.removeItem("usuarioLogado"); // Remove o estado de autenticação
        window.location.href = "login.html"; // Redireciona para a página de login
    }).catch((error) => {
        console.error("Erro ao fazer logout:", error);
    });
}

// Cadastrar produto
document.getElementById('form-produto').addEventListener('submit', (e) => {
    e.preventDefault();

    const nome = document.getElementById('nome').value;
    const descricao = document.getElementById('descricao').value;
    const link = document.getElementById('link').value;
    const imagem = document.getElementById('imagem').files[0];

    // Upload da imagem para o Firebase Storage
    const storageRef = firebase.storage().ref(`produtos/${imagem.name}`);
    storageRef.put(imagem).then((snapshot) => {
        snapshot.ref.getDownloadURL().then((url) => {
            // Salva os dados do produto no Firestore
            db.collection('produtos').add({
                nome,
                descricao,
                link,
                imagem: url
            }).then(() => {
                alert('Produto cadastrado com sucesso!');
                document.getElementById('form-produto').reset();
                carregarProdutos(); // Atualiza a lista de produtos
            }).catch((error) => {
                console.error('Erro ao cadastrar produto:', error);
            });
        });
    }).catch((error) => {
        console.error('Erro ao fazer upload da imagem:', error);
    });
});

// Carregar produtos
function carregarProdutos() {
    const produtosContainer = document.getElementById('produtos-container');
    produtosContainer.innerHTML = ''; // Limpa a lista atual

    db.collection('produtos').get().then((querySnapshot) => {
        querySnapshot.forEach((doc) => {
            const produto = doc.data();
            const produtoCard = `
                <div class="produto-card">
                    <img src="${produto.imagem}" alt="${produto.nome}">
                    <h3>${produto.nome}</h3>
                    <p>${produto.descricao}</p>
                    <button onclick="excluirProduto('${doc.id}')">Excluir</button>
                </div>
            `;
            produtosContainer.innerHTML += produtoCard;
        });
    }).catch((error) => {
        console.error('Erro ao carregar produtos:', error);
    });
}

// Excluir produto
window.excluirProduto = (id) => {
    if (confirm('Tem certeza que deseja excluir este produto?')) {
        db.collection('produtos').doc(id).delete().then(() => {
            alert('Produto excluído com sucesso!');
            carregarProdutos(); // Atualiza a lista de produtos
        }).catch((error) => {
            console.error('Erro ao excluir produto:', error);
        });
    }
};

function fazerLogout() {
    firebase.auth().signOut().then(() => {
        sessionStorage.removeItem("usuarioLogado"); // Remove o estado de autenticação
        window.location.href = "login.html"; // Redireciona para a página de login
    }).catch((error) => {
        console.error("Erro ao fazer logout:", error);
    });
}
