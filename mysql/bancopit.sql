CREATE DATABASE pit_site CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pit_site;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('atleta','colaborador') DEFAULT 'atleta'
);

CREATE TABLE campeonatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    local VARCHAR(100),
    data DATE,
    premiacao VARCHAR(100),
    descricao TEXT,
    imagem VARCHAR(255),
    colaborador_id INT,
    FOREIGN KEY (colaborador_id) REFERENCES usuarios(id)
);

CREATE TABLE inscricoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    campeonato_id INT,
    data_inscricao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (campeonato_id) REFERENCES campeonatos(id)
);

CREATE TABLE mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    inscricao_id INT,
    mensagem TEXT,
    resposta TEXT,
    data_envio DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (inscricao_id) REFERENCES inscricoes(id)
);

CREATE TABLE arenas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(150) NOT NULL,
    cidade_estado VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    imagem VARCHAR(255),
    colaborador_id INT,
    data_envio DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (colaborador_id) REFERENCES usuarios(id)
);
CREATE TABLE avaliacoes_site (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nota INT NOT NULL,                -- Quantidade de estrelas (1 a 5)
    comentario TEXT,
    data_envio DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE mensagens_site (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    mensagem TEXT NOT NULL,
    data_envio DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE arenas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(150) NOT NULL,
    cidade_estado VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    imagem VARCHAR(255),
    colaborador_id INT,
    data_envio DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (colaborador_id) REFERENCES usuarios(id)
);
  

ALTER TABLE usuarios ADD COLUMN telefone VARCHAR(20) AFTER cpf;

SELECT * FROM usuarios ORDER BY id DESC;
SELECT * FROM usuarios WHERE email = 'vitorurbano22@gmail.com';
DELETE FROM usuarios;
SELECT * FROM arenas ORDER BY id DESC;
DELETE FROM arenas;
ALTER TABLE arenas ADD COLUMN tipo_arena VARCHAR(50) AFTER cidade_estado;
ALTER TABLE arenas ADD COLUMN modalidade VARCHAR(50) AFTER tipo_arena;
SELECT * FROM mensagens_site ORDER BY id DESC;
SELECT * FROM mensagens_site ORDER BY id DESC;
SELECT * FROM avaliacoes_site ORDER BY id DESC;