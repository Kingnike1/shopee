<?php

    require_once 'funcao.php';

    $conexao = conectar();

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $link = $_POST['link'];
    $imagem= $_POST['imagem'];

    $sql = "INSERT INTO `produtos`(`nome`, `preco`, `descricao`, `imagem`, `link`) VALUES ('{$nome}', '{$preco}', '{$descricao}', '{$imagem}', '{$link}')" ;
    mysqli_query($conexao, $sql);

    desconectar($conexao);

    echo "<script>alert('Cadastro realizado com sucesso!')</script>";
    echo "<script>location.href='../admin/index.php?pagina=tabela'</script>";
    exit;
