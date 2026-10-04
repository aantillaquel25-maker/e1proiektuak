<?php
// Clase que gestiona la tabla "partaideak" (participantes)
class Partaideak
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Participantes de un equipo concreto
    public function obtenerPorTaldea(int $taldeaId): array
    {
        $stmt = $this->db->prepare(
            'SELECT id, izena, herrialdea FROM partaideak WHERE taldea_id = :taldea_id ORDER BY id'
        );
        $stmt->execute([':taldea_id' => $taldeaId]);
        return $stmt->fetchAll();
    }

    // Inserta un participante nuevo en un equipo
    public function crear(string $izena, string $herrialdea, int $taldeaId): void
    {
        $stmt = $this->db->prepare(
            'INSERT INTO partaideak (izena, herrialdea, taldea_id) VALUES (:izena, :herrialdea, :taldea_id)'
        );
        $stmt->execute([
            ':izena'      => $izena,
            ':herrialdea' => $herrialdea,
            ':taldea_id'  => $taldeaId,
        ]);
    }
}
