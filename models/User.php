<?php

class User
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Buscar usuário por e-mail
    public function findByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    // Criar novo usuário
    public function create($nome, $email, $telefone, $senhaHash)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO users (nome, email, telefone, senha)
            VALUES (?, ?, ?, ?)
        ");

        $stmt->execute([$nome, $email, $telefone, $senhaHash]);

        return $this->pdo->lastInsertId(); // aqui retorna o ID do novo usuário
    }
}
