<?php
$hostDB = '127.0.0.1';
$nombreDB = 'valient';
$usuarioDB = 'valient';
$contraseñaDB = 'sqlBD123';

try {
    $hostPDO = "mysql:host=$hostDB; dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contraseñaDB);
    $miPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar la consulta
    $miConsulta = $miPDO->prepare('SELECT * FROM innovacion_registro');
    $miConsulta->execute();

} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portada</title>

    <link rel="stylesheet" href="botones.css">
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
    <h1>HISTORIAL DE PEDIDOS DEL AULA DE INNOVACIÓN</h1><br>
    <div class="centro-btn">
        <a href="portada.php" class="btn">Regresar</a>
    </div>
    
    <div id="linea"></div>

    <form action="#" method="post">
        <table>
            <tr>
                <th>CODIGO</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>DNI</th>
                <th>CORREO</th>
                <th>GRADO Y SECCION</th>
                <th>AREA</th>
                <th>JORNADA</th>
                <th>FECHA</th>
                <th>TEMA</th>
                <th>ARCHIVO</th>
            </tr>
            <?php foreach($miConsulta as $clave => $valor):?>
                <tr>
                    <td><?= htmlspecialchars($valor['codigo']);?></td>
                    <td><?= htmlspecialchars($valor['nombres']);?></td>
                    <td><?= htmlspecialchars($valor['apellidos']);?></td>
                    <td><?= htmlspecialchars($valor['dni']);?></td>
                    <td><?= htmlspecialchars($valor['correo']);?></td>
                    <td><?= htmlspecialchars($valor['grado_seccion']);?></td>
                    <td><?= htmlspecialchars($valor['area']);?></td>
                    <td><?= htmlspecialchars($valor['jornada']);?></td>
                    <td><?= htmlspecialchars($valor['fecha']);?></td>
                    <td><?= htmlspecialchars($valor['tema']);?></td>
                    <td><a href="descarga.php? archivo=<?= urlencode($valor['archivo']);?>" target="_blank" class="btn">Descargar</a></td>
                </tr>
            <?php endforeach ?>
        </table>
    </form>
</body>
</html>