CREATE DATABASE frividb;
USE frividb;

-- Tabela de Usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL, -- Armazena senha hash
    avatar VARCHAR(255) DEFAULT NULL, -- URL da imagem do avatar
    bio TEXT DEFAULT NULL,
    tipo ENUM('user', 'admin') DEFAULT 'user', -- Define permissões
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Jogos
CREATE TABLE jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    genero VARCHAR(100) NOT NULL,
    data_lancamento DATE NOT NULL,
    desenvolvedor VARCHAR(255) NOT NULL,
    imagem_capa VARCHAR(255) DEFAULT NULL, -- URL da imagem do jogo
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Avaliações de Jogos
CREATE TABLE avaliacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    jogo_id INT NOT NULL,
    nota DECIMAL(3,1) CHECK (nota >= 0 AND nota <= 10), -- Notas de 0 a 10
    comentario TEXT DEFAULT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (jogo_id) REFERENCES jogos(id) ON DELETE CASCADE
);

-- Tabela para armazenar média de avaliações (melhor para performance)
CREATE TABLE media_avaliacoes (
    jogo_id INT PRIMARY KEY,
    media_nota DECIMAL(3,1) DEFAULT 0,
    total_avaliacoes INT DEFAULT 0,
    FOREIGN KEY (jogo_id) REFERENCES jogos(id) ON DELETE CASCADE
);

-- Tabela de Fórum (Tópicos)
CREATE TABLE topicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    conteudo TEXT NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabela de Respostas no Fórum
CREATE TABLE respostas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    topico_id INT NOT NULL,
    usuario_id INT NOT NULL,
    conteudo TEXT NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (topico_id) REFERENCES topicos(id) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabela para Curtidas em Comentários do Fórum
CREATE TABLE curtidas_respostas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    resposta_id INT NOT NULL,
    usuario_id INT NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (resposta_id) REFERENCES respostas(id) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabela de Biblioteca Pessoal (Jogos Favoritos do Usuário)
CREATE TABLE biblioteca (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    jogo_id INT NOT NULL,
    adicionado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (usuario_id, jogo_id), -- Impede que o mesmo jogo seja adicionado várias vezes
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (jogo_id) REFERENCES jogos(id) ON DELETE CASCADE
);

-- Tabela de Logs Administrativos (para rastrear ações dos admins)
CREATE TABLE logs_admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT NOT NULL,
    acao TEXT NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES usuarios(id) ON DELETE CASCADE
);
