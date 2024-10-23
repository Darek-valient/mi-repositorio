<?php
session_start(); // Inicia la sesion

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Resivir y guardar los datos en la sesion
    if (isset($_POST['fecha'])) {
        $fecha = $_POST['fecha'];
        $_SESSION['datos']['fecha'] = $fecha;
    }
    if (isset($_REQUEST['jornada'])) {
        $jornada = $_POST['jornada'];
        $_SESSION['datos']['jornada'] = $jornada;
    }
    if (isset($_POST['nombre'])) {
        $nombres = $_POST['nombre'];
        $apellidos = $_POST['apellido'];
        $dni = $_POST['dni'];
        $correo = $_POST['correo'];
        $gys = $_POST['gys'];
        $area = $_POST['curso'];

        $_SESSION['datos']['nombre'] = $nombres;
        $_SESSION['datos']['apellido'] = $apellidos;
        $_SESSION['datos']['dni'] = $dni;
        $_SESSION['datos']['correo'] = $correo;
        $_SESSION['datos']['gys'] = $gys;
        $_SESSION['datos']['curso'] = $area;
    }
    $tema = $_POST['tema'];
    $_SESSION['datos']['tema'] = $tema;

    // Guardar el archivo
    $archivo = $_FILES['archivo'];

    $nombreArchivo = $archivo['name'];
    $rutaTemporal = $archivo['tmp_name'];
    $carpetaDestino = 'archivos/';
    if (!file_exists($carpetaDestino)) {
        mkdir($carpetaDestino, 0777, true);
    }
    $rutaDestino = $carpetaDestino . basename($nombreArchivo);
}

// Verifica si los datos están completos
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
    // Conexión a la base de datos
    $hostDB = '127.0.0.1';
    $nombreDB = 'valient';
    $usuarioDB = 'valient';
    $contraseñaDB = 'sqlBD123';

    try {
        $hostPDO = "mysql:host=$hostDB; dbname=$nombreDB;";
        $miPDO = new PDO($hostPDO, $usuarioDB, $contraseñaDB);
        $miPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recoge los datos de la sesion
        $fecha = $_SESSION['datos']['fecha'];
        $jornada = $_SESSION['datos']['jornada'];
        $nombres = $_SESSION['datos']['nombre'];
        $apellidos = $_SESSION['datos']['apellido'];
        $dni = $_SESSION['datos']['dni'];
        $correo = $_SESSION['datos']['correo'];
        $gys = $_SESSION['datos']['gys'];
        $area = $_SESSION['datos']['curso'];
        $tema = $_SESSION['datos']['tema'];

        // Prepara la consulta para guardar los datos
        $miInsertar = $miPDO->prepare('INSERT INTO innovacion_registro(nombres, apellidos, dni, correo, grado_seccion, area, jornada, fecha, tema, archivo)
            VALUES (:nombres, :apellidos, :dni, :correo, :grado_seccion, :area, :jornada, :fecha, :tema, :archivo)');
        $miInsertar->execute(array(
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'dni' => $dni,
            'correo' => $correo,
            'grado_seccion' => $gys,
            'jornada' => $jornada,
            'area' => $area,
            'fecha' => $fecha,
            'tema' => $tema,
            'archivo' => $rutaDestino,
        ));

        echo "Datos guardados correctamente.";
        session_unset(); // Elimina todas las variables de sesion
        session_destroy(); // Destruye la sesion
    } 
    catch (PDOException $e) {
        echo "Error al guardar los datos: " . $e->getMessage();
    }
} else {
    echo "No hay datos completos para guardar.";
}

header('Location: index.php');
exit();
?>