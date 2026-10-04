<?php
// calse que se encarga de las clases 
class Taldea
{
    private PDO $db;

    // cuando hago el objeto le paso la conexion a la base de datos
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // el talde que mas puntos tenga sale primero 
    public function obtenerTodos(): array
    {
        $sql = 'SELECT id, izena, puntuak FROM taldeak ORDER BY puntuak DESC, id ASC';
        return $this->db->query($sql)->fetchAll();
    }

    // Busca un equipo por id devuelve null si no existe
    public function buscarPorId(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT id, izena, puntuak FROM taldeak WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $fila = $stmt->fetch();
        return $fila ?: null;
    }

    // mete  un equipo nuevo
    public function crear(string $izena, int $puntuak): void
    {
        $stmt = $this->db->prepare('INSERT INTO taldeak (izena, puntuak) VALUES (:izena, :puntuak)');
        $stmt->execute([':izena' => $izena, ':puntuak' => $puntuak]);
    }

    // cambia los puntos de un talde
    public function actualizarPuntos(int $id, int $puntuak): void
    {
        $stmt = $this->db->prepare('UPDATE taldeak SET puntuak = :puntuak WHERE id = :id');
        $stmt->execute([':puntuak' => $puntuak, ':id' => $id]);
    }

    // Borra el talde sus partaideak se borran solos
    public function eliminar(int $id): void
    {
        $stmt = $this->db->prepare('DELETE FROM taldeak WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }
}
