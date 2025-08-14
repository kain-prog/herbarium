-- Criação da estrutura para o sistema de relatos

CREATE TABLE relatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(100) NOT NULL,
    anonimo BOOLEAN NOT NULL DEFAULT FALSE,
    nome VARCHAR(255),
    protocolo VARCHAR(100) NOT NULL UNIQUE,
    status ENUM('novo', 'em_andamento', 'respondido', 'fechado') DEFAULT 'novo',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE respostas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    relato_id INT NOT NULL,
    texto LONGTEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (relato_id) REFERENCES relatos(id) ON DELETE CASCADE
);

CREATE TABLE perguntas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    relato_id INT NOT NULL,
    texto LONGTEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (relato_id) REFERENCES relatos(id) ON DELETE CASCADE
);

CREATE TABLE atendentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    usuario VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);
