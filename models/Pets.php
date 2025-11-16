<?php
require_once __DIR__ . '/../config/db_config.php';

class Pets
{

    // cadastra o pet
    public static function create($user_id, $nome_pet, $especie, $sexo, $raca, $idade, $peso, $cor, $observacoes)
    {
        global $pdo;

        $sql = "INSERT INTO pets 
               (user_id, nome_pet, especie, sexo, raca, idade, peso, cor, observacoes) 
               VALUES 
               (:user_id, :nome_pet, :especie, :sexo, :raca, :idade, :peso, :cor, :observacoes)";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            'user_id'      => $user_id,
            'nome_pet'     => $nome_pet,
            'especie'      => $especie,
            'sexo'         => $sexo,
            'raca'         => $raca,
            'idade'        => $idade,
            'peso'         => $peso,
            'cor'          => $cor,
            'observacoes'  => $observacoes
        ]);
    }


    // busca todos os pets do usuario
    public static function getByUser($user_id)
    {
        global $pdo;

        $sql = "SELECT * FROM pets WHERE user_id = :id ORDER BY created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $user_id]);
        return $stmt->fetchAll();
    }


    // busca um pet específico
    public static function get($id, $user_id)
    {
        global $pdo;

        $sql = "SELECT * FROM pets WHERE id = :id AND user_id = :user";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'user' => $user_id]);
        return $stmt->fetch();
    }


    // edita informação dp pet
    public static function update($id, $user_id, $nome_pet, $especie, $sexo, $raca, $idade, $peso, $cor, $observacoes)
    {
        global $pdo;

        $sql = "UPDATE pets SET
                nome_pet = :nome_pet,
                especie = :especie,
                sexo = :sexo,
                raca = :raca,
                idade = :idade,
                peso = :peso,
                cor = :cor,
                observacoes = :observacoes
                WHERE id = :id AND user_id = :user_id";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            'nome_pet'    => $nome_pet,
            'especie'     => $especie,
            'sexo'        => $sexo,
            'raca'        => $raca,
            'idade'       => $idade,
            'peso'        => $peso,
            'cor'         => $cor,
            'observacoes' => $observacoes,
            'id'          => $id,
            'user_id'     => $user_id
        ]);
    }


    // exclui o pet
    public static function delete($id, $user_id)
    {
        global $pdo;

        $sql = "DELETE FROM pets WHERE id = :id AND user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id, 'user_id' => $user_id]);
    }
}
