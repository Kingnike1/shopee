-- MySQL Script generated by MySQL Workbench
-- seg 03 mar 2025 20:01:41
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

-- Desabilitar checagem de chaves únicas e chaves estrangeiras temporariamente para evitar erros durante a criação de tabelas.
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Criar o banco de dados `shopee` se não existir
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `shopee` DEFAULT CHARACTER SET utf8mb4;
USE `shopee`;

-- -----------------------------------------------------
-- Criar a tabela `produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produtos` (
  `idproduto` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,  -- Coluna de ID autoincrementável
  `nome` VARCHAR(255) NULL DEFAULT NULL,                    -- Nome do produto
  `descricao` VARCHAR(255) NULL DEFAULT NULL,               -- Descrição do produto
  `preco` DECIMAL(10,2) NULL DEFAULT NULL,                  -- Preço do produto
  `imagem` VARCHAR(255) NULL DEFAULT NULL,                 -- Imagem do produto
  `link` VARCHAR(255) NULL DEFAULT NULL,                    -- Link de afiliado da Shopee
  PRIMARY KEY (`idproduto`)                                -- Definindo a chave primária

) ENGINE = InnoDB                                            -- Usando o mecanismo de armazenamento InnoDB
AUTO_INCREMENT = 2                                          -- Definindo o valor inicial do AUTO_INCREMENT
DEFAULT CHARACTER SET = utf8mb4;                            -- Definindo o conjunto de caracteres como utf8mb4

-- -----------------------------------------------------
-- Criar a tabela `usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,  -- Coluna de ID autoincrementável
  `nome` VARCHAR(255) NULL DEFAULT NULL,                    -- Nome do usuário
  `email` VARCHAR(255) NULL DEFAULT NULL,                   -- Email do usuário
  `senha` VARCHAR(255) NULL DEFAULT NULL,                   -- Senha do usuário
  PRIMARY KEY (`idusuario`)                                -- Definindo a chave primária
) ENGINE = InnoDB                                           -- Usando o mecanismo de armazenamento InnoDB
DEFAULT CHARACTER SET = utf8mb4;                            -- Definindo o conjunto de caracteres como utf8mb4

-- Restaurando as configurações de verificação de chaves únicas e estrangeiras.
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Inserir dados na tabela `produtos`
-- -----------------------------------------------------
INSERT INTO produtos (nome, preco, descricao, imagem, link)
VALUES
    ('Smartphone Alpha', 1200.00, 'Smartphone com tela AMOLED e câmera de 48MP.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/smartphone-alpha'),
    ('Notebook Omega', 3500.00, 'Notebook com processador i7 e 16GB de RAM.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/notebook-omega'),
    ('Fone de Ouvido Beta', 250.00, 'Fone Bluetooth com cancelamento de ruído.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/fone-beta'),
    ('Smartwatch Gamma', 800.00, 'Smartwatch com monitoramento de saúde e GPS.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/smartwatch-gamma'),
    ('Tablet Delta', 1500.00, 'Tablet com tela de 10 polegadas e 128GB de armazenamento.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/tablet-delta'),
    ('Câmera Fotográfica Sigma', 2200.00, 'Câmera DSLR com lente 18-55mm.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/camera-sigma'),
    ('Console de Jogos Zeta', 2800.00, 'Console de última geração com 1TB de armazenamento.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/console-zeta'),
    ('Impressora 3D Epsilon', 4500.00, 'Impressora 3D de alta precisão.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/impressora-epsilon'),
    ('Drone Theta', 1800.00, 'Drone com câmera 4K e controle remoto.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/drone-theta'),
    ('Monitor Gamer Iota', 1200.00, 'Monitor de 27 polegadas com taxa de atualização de 144Hz.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/monitor-iota'),
    ('Projetor Kappa', 2000.00, 'Projetor Full HD com 3000 lumens.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/projetor-kappa'),
    ('Relógio Inteligente Lambda', 500.00, 'Relógio inteligente com monitor de batimentos cardíacos.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/relogio-lambda'),
    ('Cadeira Gamer Mu', 800.00, 'Cadeira gamer com ajuste de altura e inclinação.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/cadeira-mu'),
    ('Roteador Wi-Fi Nu', 300.00, 'Roteador dual-band com velocidade de 1200Mbps.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/roteador-nu'),
    ('Caixa de Som Bluetooth Xi', 150.00, 'Caixa de som portátil com bateria de longa duração.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/caixa-xi'),
    ('Webcam Ômicron', 100.00, 'Webcam de alta qualidade com resolução de 1080p.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/webcam-omicron'),
    ('Fone de Ouvido Alpha', 150.00, 'Fone de ouvido Bluetooth com som estéreo e bateria de longa duração.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/fone-alpha'),
    ('Teclado Mecânico Beta', 350.00, 'Teclado mecânico com switches Red e retroiluminação RGB.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/teclado-beta'),
    ('Mouse Gamer Gamma', 200.00, 'Mouse gamer com 8000 DPI e design ergonômico.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/mouse-gamma'),
    ('Caixa de Som Delta', 180.00, 'Caixa de som Bluetooth à prova d\'água com 20 horas de duração.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/caixa-delta'),
    ('Carregador Portátil Epsilon', 100.00, 'Carregador portátil com 10000mAh e duas portas USB.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/carregador-epsilon'),
    ('Câmera de Segurança Zeta', 550.00, 'Câmera de segurança Wi-Fi com visão noturna e áudio bidirecional.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/camera-zeta'),
    ('Assinatura de Software Gamma', 400.00, 'Assinatura anual de software para edição de vídeo e imagens.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/software-gamma'),
    ('Assistente Virtual Beta', 120.00, 'Dispositivo de assistente virtual com integração em casa inteligente.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/assistente-beta'),
    ('Óculos de Realidade Virtual Alpha', 600.00, 'Óculos VR com imersão 360° e compatibilidade com consoles e PC.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/oculos-alpha'),
    ('Carregador Solar Delta', 250.00, 'Carregador solar portátil para celulares e dispositivos USB.', 'https://via.placeholder.com/300x200', 'https://www.exemplo.com/carregador-solar-delta');

-- -----------------------------------------------------
-- Caso queira apagar o banco de dados, descomente a linha abaixo
--  DROP DATABASE shopee;
