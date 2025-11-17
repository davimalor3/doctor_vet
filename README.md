# Como Rodar o Projeto Localmente (XAMPP)

Siga os passos abaixo para configurar e executar o Doctor Vet no seu computador.

## 1. Instalar o XAMPP

- Baixe e instale o XAMPP

## 2. Mova o projeto para a pasta htdocs

- Abra a pasta do XAMPP no seu computador e cole a pasta do projeto para dentro de "htdocs"
  Windows: "C:\xampp\htdocs\" ou no Linux "/opt/lampp/htdocs/"
- Inicie os módulos:
  Apache e MySQL

## 3. Banco de Dados

- Importar o banco de dados no phpMyAdmin
  Acesse o phpmyAdmin:
  http://localhost/phpmyadmin/

Clique em Database e crie um banco (ex: doctor_vet). Com o banco selecionado, clique na aba Importar, escolha o arquivo:
"doctor_vet/sql/schema.sql" (arquivo dentro do projeto) e clique em Executar.
Isso criará todas as tabelas e relações necessárias.

## 4. Configurar a conexão com o banco

Dentro do projeto em "config/db_config.php" modifique as variaveis conforme seu banco de dados:

```php
$dbHost = '127.0.0.1';
$dbName = 'nomedoseubanco';
$dbUser = 'root';
$dbPass = '';
$dbPort = '3306';

```

## 5. Acesse o sistema

Após tudo configurado, abra o navegador e acesse:
http://localhost/doctor_vet/

Se o XAMPP estiver rodando, o sistema iniciará normalmente.
