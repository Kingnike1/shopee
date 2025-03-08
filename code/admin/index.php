<?php
require_once '../php/funcao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bem-vindo ao seu Dashboard</title>
  <link rel="stylesheet" href="../css/admin.css" />
  <!-- <link rel="stylesheet" href="../css/card.css" /> -->
  <link id="bootstrap-css" rel="stylesheet" href="../css/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>

<body>
  <!-- HEADER -->
  <header class="header">
    <div class="logo">Meu Dashboard</div>
    <nav class="nav">
      <a href="index.php?pagina=tabela" id="tabela-admin">Carregar Tabela</a>
      <a href="index.php?pagina=card" id="card-admin">Carregar Card</a>
      <a href="index.php?pagina=formulario_produtos" id="formulario-admin">Formulario Produto</a>
      <a href="index.php?pagina=estatistica" id="estatistica-admin">Estatistica Produto</a>

      <a href="logout.php">Sair</a>
    </nav>
  </header>

  <!-- CONTEÚDO PRINCIPAL -->
  <div class="container-admin">
    <div class="content" id="principal-admin">
      <?php
      require_once '../php/funcao.php';
      if (isset($_GET['pagina']) && ($_GET['pagina'] == 'tabela')) {
        tabelaProdutos(); // Chama a função e exibe a tabela
      } else if (isset($_GET['pagina']) && ($_GET['pagina'] == 'card')) {
        listarprodutosAdmin(); // Chama a função e exibe o card
      } else if (isset($_GET['pagina']) && ($_GET['pagina'] == 'formulario_produtos')) {
        formularioProdutos(); // Chama a função e exibe o formulário
      } else if (isset($_GET['pagina']) && ($_GET['pagina'] == 'estatistica')) {
        estatisticaProdutos(); // Chama a função e exibe o formulário
      } else if (isset($_GET['pagina']) && $_GET['pagina'] == 'atualizar') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $id = $_POST['idproduto'];
          $nome = $_POST['nome'];
          $preco = $_POST['preco'];
          $descricao = $_POST['descricao'];
          $link = $_POST['link'];
          $imagem = $_POST['imagem']; // Aqui você pode adicionar a lógica para upload de imagem
          $categoria = $_POST['categoria']; // Novo campo adicionado
          $outraCategoria = isset($_POST['outraCategoria']) ? $_POST['outraCategoria'] : null; // Campo opcional
          // Chama a função atualizarProduto com todos os parâmetros
          atualizarProduto($id, $nome, $preco, $descricao, $link, $imagem, $categoria, $outraCategoria);
        }
      } else {
        echo "<p class='info'>Clique no botão para carregar o conteúdo.</p>";
      }
      ?>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="footer">
    <p>&copy; 2025 Meu Dashboard. Todos os direitos reservados.</p>
  </footer>

  <script src="../js/admin.js"></script>
  <script src="../js/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
