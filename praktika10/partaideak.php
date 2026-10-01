<?php
// Página de un equipo: lista sus participantes + formulario para añadir otro
require_once __DIR__ . '/includes/inicio.php';

$db = Conexion::obtener();

// Leemos el id del equipo de la URL (?id=2)
$taldeaId = (int) ($_GET['id'] ?? 0);
$taldea = (new Taldea($db))->buscarPorId($taldeaId);

// Si el equipo no existe, volvemos a la página principal
if ($taldea === null) {
    header('Location: index.php');
    exit;
}

$partaideak = (new Partaidea($db))->obtenerPorTaldea($taldeaId);

$titulo = $taldea['izena'] . ' - Partaideak';
require __DIR__ . '/includes/cabecera.php';
?>

<?php if (empty($partaideak)): ?>
    <p>Talde honek ez du partaiderik oraindik.</p>
<?php else: ?>
    <table border="1">
        <tr><th>ID</th><th>Izena</th><th>Herrialdea</th></tr>
        <?php foreach ($partaideak as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['izena']) ?></td>
            <td><?= htmlspecialchars($p['herrialdea']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<h2>Gehitu partaidea</h2>
<form action="procesar/partaide_crear.php" method="post">
    <!-- Campo oculto: así el procesador sabe a qué equipo pertenece -->
    <input type="hidden" name="taldea_id" value="<?= $taldeaId ?>">
    <p>Izena: <input type="text" name="izena"></p>
    <p>Herrialdea: <input type="text" name="herrialdea"></p>
    <button type="submit">Sortu</button>
</form>

<p><a href="index.php">Itzuli</a></p>

<?php require __DIR__ . '/includes/pie.php'; ?>