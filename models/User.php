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
    public function create($nome, $email, $telefone, $senhaHash){
        $stmt = $this->pdo->prepare("
            INSERT INTO users (nome, email, telefone, senha)
            VALUES (?, ?, ?, ?)
        ");

        $stmt->execute([$nome, $email, $telefone, $senhaHash]);

        return $this->pdo->lastInsertId(); // aqui retorna o ID do novo usuário
    }

    public function updateProfile($id, $nome, $email, $telefone){
        $sql = "UPDATE users SET 
            nome = :nome,
            email = :email,
            telefone = :telefone
            WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'nome'      => $nome, 
            'email'     => $email, 
            'telefone'  => $telefone, 
            'id'        => $id
        ]);
    }

    public function updatePassword($id, $senhaHash){
        $stmt = $this->pdo->prepare("
            UPDATE users
            SET senha = ?
            WHERE id = ?
        ");
        return $stmt->execute([$senhaHash, $id]);
    }

    public function delete($id){
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
}



