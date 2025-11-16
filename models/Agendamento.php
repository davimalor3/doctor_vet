<?php
require_once __DIR__ . '/../config/db_config.php';

class Agendamento
{
    public static function create($pet_id, $especialidade, $data_hora, $observacoes)
    {
        global $pdo;

        $sql = "INSERT INTO agendamento (pet_id, especialidade, data_hora, observacoes)
                VALUES (:pet_id, :especialidade, :data_hora, :observacoes)";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            'pet_id'        => $pet_id,
            'especialidade' => $especialidade,
            'data_hora'     => $data_hora,
            'observacoes'   => $observacoes
        ]);
    }

    public static function getByPet($pet_id)
    {
        global $pdo;

        $sql = "SELECT * FROM agendamento WHERE pet_id = :p ORDER BY data_hora DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['p' => $pet_id]);

        return $stmt->fetchAll();
    }

    public static function delete($id, $user_id)
    {
        global $pdo;

        // segurança: só pode excluir agendamento que pertence ao usuário
        $sql = "DELETE a FROM agendamento a 
                JOIN pets p ON p.id = a.pet_id
                WHERE a.id = :id AND p.user_id = :user";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'user' => $user_id
        ]);
    }

    public static function updateStatus($id, $status)
    {
        global $pdo;

        $sql = "UPDATE agendamento SET status = :s WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            's' => $status,
            'id' => $id
        ]);
    }

    public static function get($id)
    {
        global $pdo;

        $sql = "SELECT a.*, p.nome_pet 
            FROM agendamento a 
            JOIN pets p ON a.pet_id = p.id
            WHERE a.id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }

    public static function reagendar($id, $data_hora)
    {
        global $pdo;

        $sql = "UPDATE agendamento 
            SET data_hora = :dh, status = 'pendente' 
            WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            'dh' => $data_hora,
            'id' => $id,
        ]);
    }
}
