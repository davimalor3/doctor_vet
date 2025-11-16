-- sql/schema.sql
CREATE DATABASE IF NOT EXISTS db_clinica_vet CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_clinica_vet;

-- USUÁRIOS
CREATE TABLE IF NOT EXISTS users (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(120) NOT NULL,
email VARCHAR(150) NOT NULL UNIQUE,
telefone VARCHAR(30),
senha VARCHAR(255) NOT NULL,
created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
last_login DATETIME NULL,
login_attempts INT NOT NULL DEFAULT 0,
locked_until DATETIME DEFAULT NULL,
INDEX (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- PETS
CREATE TABLE IF NOT EXISTS pets (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT NOT NULL,
nome_pet VARCHAR(120) NOT NULL,
especie ENUM('cachorro','gato') NOT NULL,
sexo ENUM('macho','femea') NOT NULL,
raca VARCHAR(120),
idade INT,
peso DECIMAL(5,2),
cor VARCHAR(30),
observacoes TEXT,
created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- AGENDAMENTOS
CREATE TABLE IF NOT EXISTS agendamento (
id INT AUTO_INCREMENT PRIMARY KEY,
pet_id INT NOT NULL,
especialidade ENUM('radiologia','endoscopia','nutricionista','dermatologia','ortopedia','vacina') NOT NULL,
data_hora DATETIME NOT NULL,
status ENUM('pendente','confirmado','cancelado','concluido') DEFAULT 'pendente',
observacoes TEXT,
created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (pet_id) REFERENCES pets(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;