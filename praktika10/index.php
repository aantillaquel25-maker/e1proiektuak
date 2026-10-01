<?php
// Página principal: lista de equipos + formulario para crear uno
require_once __DIR__ . '/includes/inicio.php';

$taldeak = (new Taldea(Conexion::obtener()))->obtenerTodos();

$titulo = 'Sailkapena';
require __DIR__ . '/includes/cabecera.php';
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Izena</th>
        <th>Puntuak</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($taldeak as $t): ?>
    <tr>
        <td><?= $t['id'] ?></td>
        <!-- El nombre es un enlace a partaideak.php con el id por GET -->
        <td><a href="partaideak.php?id=<?= $t['id'] ?>"><?= htmlspecialchars($t['izena']) ?></a></td>

        <!-- Cambiar puntos -->
        <td>
            <form action="procesar/taldea_puntuak.php" method="post">
                <input type="hidden" name="id" value="<?= $t['id'] ?>">
                <input type="number" name="puntuak" value="<?= $t['puntuak'] ?>">
                <button type="submit">Aldatu</button>
            </form>
        </td>

        <!-- Borrar equipo (pide confirmación en el navegador) -->
        <td>
            <form action="procesar/taldea_borrar.php" method="post"
                  onsubmit="return confirm('Ziur zaude taldea ezabatu nahi duzula?');">
                <input type="hidden" name="id" value="<?= $t['id'] ?>">
                <button type="submit">Ezabatu</button>
            </form>
        </td>

        <!-- Marcar como favorito -->
        <td>
            <form action="procesar/taldea_favorito.php" method="post">
                <input type="hidden" name="id" value="<?= $t['id'] ?>">
                <button type="submit">Gogokoena</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h2>Gehitu taldea</h2>
<!-- Sin "required" a propósito: la validación la hace PHP en el procesador -->
<form action="procesar/taldea_crear.php" method="post">
    <p>Izena: <input type="text" name="izena"></p>
    <p>Puntuak: <input type="number" name="puntuak"></p>
    <button type="submit">Sortu</button>
</form>

<?php require __DIR__ . '/includes/pie.php'; ?>