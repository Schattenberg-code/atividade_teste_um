CREATE DATABASE  sistema_simples;
USE sistema_simples;

CREATE TABLE usuario(
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

iNSERT INTO usuario (usuario, senha) VALUE ('admin', '123');
iNSERT INTO usuario (usuario, senha) VALUE ('lucas', '123');




/* 
   Script responsável pela criação do banco de dados e da tabela de usuários.
   Também inclui registros iniciais para testes e desenvolvimento da aplicação.
*/