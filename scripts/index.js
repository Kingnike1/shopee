// scripts/index.js
const db = firebase.firestore();
const produtosContainer = document.getElementById('produtos-container');

// Carregar produtos
function carregarProdutos() {
    produtosContainer.innerHTML = ''; // Limpa a lista atual

    db.collection('produtos').get().then((querySnapshot) => {
        querySnapshot.forEach((doc) => {
            const produto = doc.data();
            const produtoCard = `
                <div class="produto-card">
                    <img src="${produto.imagem}" alt="${produto.nome}">
                    <h3>${produto.nome}</h3>
                    <p>${produto.descricao}</p>
                    <a href="${produto.link}" target="_blank">Comprar Agora</a>
                </div>
            `;
            produtosContainer.innerHTML += produtoCard;
        });
    }).catch((error) => {
        console.error('Erro ao carregar produtos:', error);
    });
}

// Inicializa a carga dos produtos
carregarProdutos();
