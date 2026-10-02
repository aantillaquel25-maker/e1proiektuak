<?php
// Clase que gestiona la tabla "taldeak" (equipos)
class Taldea
{
    private PDO $db;

    // Recibimos la conexión al crear el objeto
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Todos los equipos, el que más puntos tiene primero
    public function obtenerTodos(): array
    {
        $sql = 'SELECT id, izena, puntuak FROM taldeak ORDER BY puntuak DESC, id ASC';
        return $this->db->query($sql)->fetchAll();
    }

    // Busca un equipo por id. Devuelve null si no existe
    public function buscarPorId(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT id, izena, puntuak FROM taldeak WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $fila = $stmt->fetch();
        return $fila ?: null;
    }

    // Inserta un equipo nuevo
    public function crear(string $izena, int $puntuak): void
    {
        $stmt = $this->db->prepare('INSERT INTO taldeak (izena, puntuak) VALUES (:izena, :puntuak)');
        $stmt->execute([':izena' => $izena, ':puntuak' => $puntuak]);
    }

    // Cambia los puntos de un equipo
    public function actualizarPuntos(int $id, int $puntuak): void
    {
        $stmt = $this->db->prepare('UPDATE taldeak SET puntuak = :puntuak WHERE id = :id');
        $stmt->execute([':puntuak' => $puntuak, ':id' => $id]);
    }

    // Borra el equipo. Sus partaideak se borran solos (ON DELETE CASCADE)
    public function eliminar(int $id): void
    {
        $stmt = $this->db->prepare('DELETE FROM taldeak WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }
}