<?php
if (isset($_GET['archivo'])) {
    $archivo = $_GET['archivo'];

    // Verifica si el archivo existe en el servidor
    if (file_exists($archivo)) {
        // Establece los encabezados para la descarga del archivo
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($archivo) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($archivo));

        // Lee el archivo y lo envía al navegador
        readfile($archivo);
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "No se ha especificado ningún archivo para descargar.";
}
?>