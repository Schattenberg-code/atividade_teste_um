# Sistema Simples de Login e ligação com banco de dados

## Nome do Projeto

sistema-login-php

## Objetivo da Aplicação

Desenvolver uma aplicação web simples utilizando PHP e MySQL para realizar o cadastro, autenticação e listagem de usuários. O projeto tem como objetivo praticar conceitos básicos de desenvolvimento back-end, integração com banco de dados e gerenciamento de sessões.

## Tecnologias Utilizadas

* PHP
* MySQL
* HTML
* XAMPP
* Git e GitHub

## Estrutura Básica dos Arquivos

```text
projeto/
│
├── index.php
├── README.md
│
├── infra/
│   ├── redes/
│   └── db/
│       ├── connect.php
│       └── script.sql
│
└── public/
    ├── home.php
    ├── logout.php
    │
    └── component/
        └── table.php
```
### Descrição dos Arquivos

* **index.php**: tela de login.
* **connect.php**: realiza a conexão com o banco de dados.
* **home.php**: página inicial exibida após o login, permite adicionar novos usuários no banco de dados.
* **script.sql**: contém os comandos para criação do banco e da tabela de usuários.
* **logout.php**: tira o login do usuário.
* **table.sql**: cria uma tabela exibindo todos os usuários cadastrados no banco de dados.

## Funcionamento Geral do Código

O sistema inicia na tela de login, onde o usuário informa seu nome de usuário e senha. Os dados são enviados para o PHP através do método POST.
O sistema verifica se o usuário existe no banco de dados. Caso exista, o usuário é direcionado para a tela inicial (Home).
Na tela Home, existe uma função para adicionar novos usuários ao banco de dados, além de uma funcionalidade de logout.

Durante o desenvolvimento e análise do projeto, foram praticados os seguintes conceitos:

* Conexão entre PHP e MySQL.
* Utilização de consultas SQL no PHP (`SELECT` e `INSERT`).
* Uso do método POST para envio de dados.
* Validação de login.
* Criação e utilização de sessões com PHP.
* Estruturação de projetos em pastas.
* Versionamento de código utilizando Git e GitHub.
* Documentação de código através de comentários e README.
* Exibição dinâmica de dados do banco de dados em tabelas HTML.
