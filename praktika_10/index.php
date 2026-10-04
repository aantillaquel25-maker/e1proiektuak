<?php
// primera pagina, index basico: es un formulario para crear mas calses y una tabla con las clases que se han hecho clases 
require_once __DIR__ . '/includes/inicio.php';

$taldeak = (new Taldea(Konexioa::obtener()))->obtenerTodos();

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
    
    
    <?php 
    foreach ($taldeak as $t): ?>
    <tr>
        <td><?= $t['id'] ?></td>
        <!-- El nombre es un enlace a partaideak.php con el id por el get -->
        <td><a href="partaideak.php?id=<?= $t['id'] ?>"><?= htmlspecialchars($t['izena']) ?></a></td>

        <!-- Cambiar puntos -->
        <td>
            <form action="procesar/taldea_puntuak.php" method="post">
                <input type="hidden" name="id" value="<?= $t['id'] ?>">
                <input type="number" name="puntuak" value="<?= $t['puntuak'] ?>">
                <button type="submit">Aldatu</button>
            </form>
        </td>

        <!-- Borrar clase (pide aceptar en el navegador) -->
        <td>
            <form action="procesar/taldea_ezabatu.php" method="post"
                  onsubmit="return confirm('Ziur zaude taldea ezabatu nahi duzula?');">
                <input type="hidden" name="id" value="<?= $t['id'] ?>">
                <button type="submit">Ezabatu</button>
            </form>
        </td>

        <!-- Poner como favorito-->
        <td>
            <form action="procesar/talde_gogokoena.php" method="post">
                <input type="hidden" name="id" value="<?= $t['id'] ?>">
                <button type="submit">Gogokoena</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>



<h2>Gehitu taldea</h2>
<!-- prueba si php hace solo la validacion  -->
<form action="procesar/taldea_egin.php" method="post">
    <p>Izena: <input type="text" name="izena"></p>
    <p>Puntuak: <input type="number" name="puntuak"></p>
    <button type="submit">Sortu</button>
</form>

<?php
 require __DIR__ . '/includes/pie.php';
  ?>
