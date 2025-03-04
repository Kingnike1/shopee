<?php

function conectar() {

    $servidor = "db";
    $user = "root";
    $password = "123";
    $banco = "shopee";

    return mysqli_connect($servidor, $user, $password, $banco);
}

function desconectar($conexao) {
    $conexao = conectar();

    mysqli_close($conexao);
}


function listarProdutos() {
    $conexao = conectar();
    $sql = "SELECT * FROM `produtos`";
    $resultado = mysqli_query($conexao, $sql);

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


    desconectar($conexao);
    // return $resultado;
}
