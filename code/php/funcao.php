<?php

function conectar()
{

  $servidor = "db";
  $user = "root";
  $password = "123";
  $banco = "shopee";

  return mysqli_connect($servidor, $user, $password, $banco);
}

function desconectar($conexao)
{
  $conexao = conectar();

  mysqli_close($conexao);
}


function listarProdutos()
{
  $conexao = conectar();
  $sql = "SELECT * FROM `produtos`";
  $resultado = mysqli_query($conexao, $sql);

  echo "         <h1>Produtos</h1>

    <div class='container'>";
  while ($row = mysqli_fetch_array($resultado)) {
    $nome = $row['nome'];
    $preco = $row['preco'];
    $descricao = $row['descricao'];
    $imagem = $row['imagem'];
    $link = $row['link'];

    echo "

            <div class='card' id='productCard'>
                <div class='card-image'>
                    <img src='$imagem' alt='Produto'>
                </div>
                <div class='card-info'>
                    <h2>$nome</h2>
                    <p>$descricao</p>
                    <p class='price'>R$ $preco</p>
                    <a href='$link' target='_blank' rel='noopener noreferrer' class='button-link'>
                        <button>
                            <div class='default-btn'>
                                <svg
                                    viewBox='0 0 24 24'
                                    width='20'
                                    height='20'
                                    stroke='#FFF'
                                    stroke-width='2'
                                    fill='none'
                                    stroke-linecap='round'
                                    stroke-linejoin='round'
                                    class='css-i6dzq1'
                                >
                                    <path d='M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z'></path>
                                    <circle cx='12' cy='12' r='3'></circle>
                                </svg>
                                <span>Quick View</span>
                            </div>
                            <div class='hover-btn'>
                                <svg
                                    viewBox='0 0 24 24'
                                    width='20'
                                    height='20'
                                    stroke='#ffd300'
                                    stroke-width='2'
                                    fill='none'
                                    stroke-linecap='round'
                                    stroke-linejoin='round'
                                    class='css-i6dzq1'
                                >
                                    <circle cx='9' cy='21' r='1'></circle>
                                    <circle cx='20' cy='21' r='1'></circle>
                                    <path
                                        d='M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6'
                                    ></path>
                                </svg>
                                <span>Shop Now</span>
                            </div>
                        </button>
                    </a>
                </div>
            </div>";
  }
  echo "</div>";


  desconectar($conexao);
  // return $resultado;
}

function tabelaProdutos(){
  echo "<h1>Listagem de Produtos</h1>";
  echo "<table id='tabelaProdutos'>"; // Adicione um ID à tabela
  echo "<thead>";
  echo "  <tr>";
  echo "    <th>#</th>";
  echo "    <th>Nome</th>";
  echo "    <th>Preço</th>";
  echo "    <th>Descrição</th>";
  echo "    <th>Imagem</th>";
  echo "    <th>Categoria</th>";
  echo "    <th>Link</th>";
  echo "    <th colspan='2'>Ações</th>";
  echo "  </tr>";
  echo "</thead>";
  echo "<tbody>";

  require_once '../php/funcao.php';

  $conexao = conectar();
  $sql = "SELECT * FROM `produtos`";
  $resultado = mysqli_query($conexao, $sql);

  while ($row = mysqli_fetch_assoc($resultado)) {
    $id = $row['idproduto'];
    $nome = htmlspecialchars($row['nome']); // Evita XSS
    $preco = "R$ " . number_format($row['preco'], 2, ',', '.'); // Formatação BRL
    $descricao = htmlspecialchars($row['descricao']);
    $imagem = htmlspecialchars($row['imagem']);
    $categoria = htmlspecialchars($row['categoria']);
    $link = htmlspecialchars($row['link']);

    echo "<tr>";
    echo "  <td>$id</td>";
    echo "  <td>$nome</td>";
    echo "  <td>$preco</td>";
    echo "  <td>$descricao</td>";
    echo "  <td><img src='$imagem' alt='Imagem de $nome' width='80'></td>";
    echo "  <td>$categoria</td>";
    echo "  <td><a href='$link' target='_blank' class='btn-link'>Ver Produto</a></td>";
    echo "  <td><a href='../php/editar_produtos.php?id=$id' class='btn-editar'>Editar</a></td>";
    echo "  <td><a href='../php/excluir_produtos.php?id=$id' class='btn-excluir' onclick='return confirm(\"Tem certeza que deseja excluir este produto?\")'>Excluir</a></td>";
    echo "</tr>";
  }

  desconectar($conexao);

  echo "</tbody>";
  echo "</table>";


}


function formularioProdutos()
{
  echo "<h1>Cadastro de Produtos</h1>

    <form action='../php/cadastro_produtos.php' method='post' class='was-validated p-4 rounded shadow bg-light' enctype='multipart/form-data' novalidate>

        <!-- Nome do Produto -->
        <div class='mb-3'>
          <label for='validationNome' class='form-label fw-bold'>Nome do Produto</label>
          <input type='text' class='form-control' id='validationNome' name='nome' placeholder='Digite o nome do produto' required>
          <div class='invalid-feedback'>Por favor, insira um nome válido.</div>
        </div>

        <!-- Preço -->
        <div class='mb-3'>
          <label for='validationPreco' class='form-label fw-bold'>Preço (R$)</label>
          <input type='number' class='form-control' id='validationPreco' name='preco' step='0.01' min='0' pattern='^\d+(\.\d{1,2})?$' placeholder='Exemplo: 99.90' required>
          <div class='invalid-feedback'>Insira um preço válido no formato correto.</div>
        </div>

        <!-- Categoria -->
        <div class='mb-3'>
          <label for='validationCategoria' class='form-label fw-bold'>Categoria</label>
          <select class='form-control' id='validationCategoria' name='categoria' onchange='mostrarOutraCategoria(this)' required>
            <option value='' selected disabled>Escolha uma categoria...</option>
            <option value='Eletrônicos'>Eletrônicos</option>
            <option value='Roupas'>Roupas</option>
            <option value='Acessórios'>Acessórios</option>
            <option value='Casa e Decoração'>Casa e Decoração</option>
            <option value='Outros'>Outros</option>
          </select>
          <div class='invalid-feedback'>Selecione uma categoria.</div>
        </div>

        <!-- Campo para nova categoria -->
        <div class='mb-3' id='outraCategoriaDiv' style='display: none;'>
          <label for='outraCategoria' class='form-label fw-bold'>Outra Categoria</label>
          <input type='text' class='form-control' id='outraCategoria' name='outraCategoria' placeholder='Digite uma nova categoria'>
        </div>

        <!-- Descrição -->
        <div class='mb-3'>
          <label for='validationDescricao' class='form-label fw-bold'>Descrição</label>
          <textarea class='form-control' id='validationDescricao' name='descricao' placeholder='Descreva o produto em detalhes' rows='3' required></textarea>
          <div class='invalid-feedback'>A descrição é obrigatória.</div>
        </div>

        <!-- Link do Produto -->
        <div class='mb-3'>
          <label for='validationLink' class='form-label fw-bold'>Link do Produto</label>
          <input type='url' class='form-control' id='validationLink' name='link' placeholder='https://exemplo.com/produto' required>
          <div class='invalid-feedback'>Insira um link válido.</div>
        </div>

        <!-- Upload de Imagem -->
        <div class='mb-3'>
          <label for='validationImagem' class='form-label fw-bold'>Imagem do Produto</label>
          <input type='file' class='form-control' id='validationImagem' name='imagem' accept='image/*' required>
          <div class='invalid-feedback'>Por favor, envie uma imagem válida.</div>
        </div>

        <!-- Botão de Envio -->
        <div class='d-grid'>
          <button class='btn btn-success btn-lg' type='submit'>
            <i class='bi bi-check-circle'></i> Cadastrar Produto
          </button>
        </div>

      </form>

      <script>
        function mostrarOutraCategoria(select) {
          var outraCategoriaDiv = document.getElementById('outraCategoriaDiv');
          if (select.value === 'Outros') {
            outraCategoriaDiv.style.display = 'block';
          } else {
            outraCategoriaDiv.style.display = 'none';
          }
        }
      </script>";
}

function estatisticaProdutos()
{
  $conexao = conectar();

  // Consultas SQL (mantidas iguais)
  $sqlTotal = "SELECT COUNT(*) as total FROM `produtos`";
  $resultadoTotal = mysqli_query($conexao, $sqlTotal);
  $totalProdutos = mysqli_fetch_assoc($resultadoTotal)['total'];

  $sqlMaxPreco = "SELECT nome, preco FROM `produtos` ORDER BY preco DESC LIMIT 1";
  $resultadoMaxPreco = mysqli_query($conexao, $sqlMaxPreco);
  $produtoMaisCaro = mysqli_fetch_assoc($resultadoMaxPreco);

  $sqlMinPreco = "SELECT nome, preco FROM `produtos` ORDER BY preco ASC LIMIT 1";
  $resultadoMinPreco = mysqli_query($conexao, $sqlMinPreco);
  $produtoMaisBarato = mysqli_fetch_assoc($resultadoMinPreco);

  $sqlMediaPreco = "SELECT AVG(preco) as media_preco FROM `produtos`";
  $resultadoMediaPreco = mysqli_query($conexao, $sqlMediaPreco);
  $mediaPreco = mysqli_fetch_assoc($resultadoMediaPreco)['media_preco'];


  // Exibindo as estatísticas com classes personalizadas
  echo "<div class='container-admin'>
            <div class='content'>
              <h1>Estatísticas de Produtos</h1>
              <div class='card-estatistica'>
                <div class='card-body'>
                  <h2 class='card-title'>Total de Produtos</h2>
                  <p class='card-text'>$totalProdutos</p>
                </div>
              </div>

              <div class='card-estatistica'>
                <div class='card-body'>
                  <h2 class='card-title'>Produto Mais Caro</h2>
                  <p class='card-text text-success'>{$produtoMaisCaro['nome']} - R$ " . number_format($produtoMaisCaro['preco'], 2, ',', '.') . "</p>
                </div>
              </div>

              <div class='card-estatistica'>
                <div class='card-body'>
                  <h2 class='card-title'>Produto Mais Barato</h2>
                  <p class='card-text text-danger'>{$produtoMaisBarato['nome']} - R$ " . number_format($produtoMaisBarato['preco'], 2, ',', '.') . "</p>
                </div>
              </div>

              <div class='card-estatistica'>
                <div class='card-body'>
                  <h2 class='card-title'>Média de Preços</h2>
                  <p class='card-text text-info'>R$ " . number_format($mediaPreco, 2, ',', '.') . "</p>
                </div>
              </div>";


  desconectar($conexao);

  return $totalProdutos;
}

function listarprodutosAdmin()
{

  $conexao = conectar();
  $sql = "SELECT * FROM `produtos`";
  $resultado = mysqli_query($conexao, $sql);

  echo "         <h1>Produtos</h1>

    <div class='container'>";
  while ($row = mysqli_fetch_array($resultado)) {
    $nome = $row['nome'];
    $preco = $row['preco'];
    $descricao = $row['descricao'];
    $imagem = $row['imagem'];
    $link = $row['link'];

    echo "

            <div class='card' style='width: 18rem;'>
  <img src='$imagem' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$nome</h5>
    <p class='card-text'>$descricao</p>
    <a href='$link' class='btn btn-primary'>Go somewhere</a>
  </div>
</div>";
  }
  echo "</div>";
  desconectar($conexao);
}

function editarProduto($id)
{
  $conexao = conectar();
  $sql = "SELECT * FROM `produtos` WHERE idproduto = $id";
  $resultado = mysqli_query($conexao, $sql);
  $produto = mysqli_fetch_assoc($resultado);

  echo "<h1>Edição de Produto</h1>

  <form action='../admin/index.php?pagina=atualizar' method='post' class='was-validated p-4 rounded shadow bg-light' enctype='multipart/form-data' novalidate>

      <input type='hidden' name='idproduto' value='{$produto['idproduto']}'>

      <!-- Nome do Produto -->
      <div class='mb-3'>
        <label for='validationNome' class='form-label fw-bold'>Nome do Produto</label>
        <input type='text' class='form-control' id='validationNome' name='nome' value='{$produto['nome']}' required>
        <div class='invalid-feedback'>Por favor, insira um nome válido.</div>
      </div>

      <!-- Preço -->
      <div class='mb-3'>
        <label for='validationPreco' class='form-label fw-bold'>Preço (R$)</label>
        <input type='number' class='form-control' id='validationPreco' name='preco' step='0.01' min='0' value='{$produto['preco']}' required>
        <div class='invalid-feedback'>Insira um preço válido.</div>
      </div>

      <!-- Categoria -->
      <div class='mb-3'>
        <label for='validationCategoria' class='form-label fw-bold'>Categoria</label>
        <select class='form-control' id='validationCategoria' name='categoria' onchange='mostrarOutraCategoria(this)' required>
          <option value='' disabled>Escolha uma categoria...</option>
          <option value='Eletrônicos' " . ($produto['categoria'] == 'Eletrônicos' ? 'selected' : '') . ">Eletrônicos</option>
          <option value='Roupas' " . ($produto['categoria'] == 'Roupas' ? 'selected' : '') . ">Roupas</option>
          <option value='Acessórios' " . ($produto['categoria'] == 'Acessórios' ? 'selected' : '') . ">Acessórios</option>
          <option value='Casa e Decoração' " . ($produto['categoria'] == 'Casa e Decoração' ? 'selected' : '') . ">Casa e Decoração</option>
          <option value='Outros' " . ($produto['categoria'] == 'Outros' ? 'selected' : '') . ">Outros</option>
        </select>
        <div class='invalid-feedback'>Selecione uma categoria.</div>
      </div>

      <!-- Campo para nova categoria -->
      <div class='mb-3' id='outraCategoriaDiv' style='display: " . ($produto['categoria'] == 'Outros' ? 'block' : 'none') . ";'>
        <label for='outraCategoria' class='form-label fw-bold'>Outra Categoria</label>
        <input type='text' class='form-control' id='outraCategoria' name='outraCategoria' value='" . ($produto['categoria'] == 'Outros' ? $produto['categoria'] : '') . "' placeholder='Digite uma nova categoria'>
      </div>

      <!-- Descrição -->
      <div class='mb-3'>
        <label for='validationDescricao' class='form-label fw-bold'>Descrição</label>
        <textarea class='form-control' id='validationDescricao' name='descricao' rows='3' required>{$produto['descricao']}</textarea>
        <div class='invalid-feedback'>A descrição é obrigatória.</div>
      </div>

      <!-- Link do Produto -->
      <div class='mb-3'>
        <label for='validationLink' class='form-label fw-bold'>Link do Produto</label>
        <input type='url' class='form-control' id='validationLink' name='link' value='{$produto['link']}' required>
        <div class='invalid-feedback'>Insira um link válido.</div>
      </div>

      <!-- Upload de Imagem -->
      <div class='mb-3'>
        <label for='validationImagem' class='form-label fw-bold'>Imagem do Produto</label>
        <input type='file' class='form-control' id='validationImagem' name='imagem' accept='image/*'>
        <div class='invalid-feedback'>Por favor, envie uma imagem válida.</div>
      </div>

      <!-- Botão de Envio -->
      <div class='d-grid'>
        <button class='btn btn-success btn-lg' type='submit'>
          <i class='bi bi-check-circle'></i> Atualizar Produto
        </button>
      </div>

    </form>

    <script>
      function mostrarOutraCategoria(select) {
        var outraCategoriaDiv = document.getElementById('outraCategoriaDiv');
        if (select.value === 'Outros') {
          outraCategoriaDiv.style.display = 'block';
        } else {
          outraCategoriaDiv.style.display = 'none';
        }
      }
    </script>";

  desconectar($conexao);
}

function atualizarProduto($id, $nome, $preco, $descricao, $link, $imagem, $categoria, $outraCategoria = "ada")
{
  $conexao = conectar();

  // Verifica se a categoria é "Outros" e se foi fornecida uma nova categoria
  if ($categoria === 'Outros' && !empty($outraCategoria)) {
    $categoria = $outraCategoria; // Usa a nova categoria digitada pelo usuário
  }

  // Atualiza o produto no banco de dados
  $sql = "UPDATE `produtos`
          SET `nome` = '$nome',
              `preco` = '$preco',
              `descricao` = '$descricao',
              `link` = '$link',
              `imagem` = '$imagem',
              `categoria` = '$categoria'
          WHERE `produtos`.`idproduto` = $id";

  $resultado = mysqli_query($conexao, $sql);

  if (!$resultado) {
    die("Erro ao atualizar o produto: " . mysqli_error($conexao));
  }

  desconectar($conexao);

  // Redireciona para a página da tabela de produtos
  echo "<script>window.location.href = '../admin/index.php?pagina=tabela';</script>";
  exit();
}
