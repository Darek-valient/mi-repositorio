<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema</title>

    <link rel="stylesheet" href="botones.css">
    <link rel="stylesheet" href="diseño.css">
</head>

<body>
    <h1>DIGITA EL TEMA DE TU SESIÓN A DESARROLLAR INTEGRANDO LAS TIC</h1>
    <h3>TEMA A DESARROLLAR</h3>


    <form action="recojo_datos.php" method="post" enctype="multipart/form-data">
        
        <div class="contenedor" id="formulario">
            <label for="tema">Ingrese el nombre de su tema:</label>
            <input type="text" name="tema" id="tema" placeholder="Tema" required>

            <p>SESIÓN INTEGRADA CON TIC (Al usar el aula de innovaciones pedagogica debes subir como evidencia tu sesión de clases)</p>
            <input type="file" name="archivo" id="archivo" required>
        </div>

        <div class="centrado-btn">
            <a href="form_docente.php" class="btn">Atrás</a>
            <input type="submit" class="btn" name="enviar" value="Enviar">
        </div>
    </form>
</body>

</html>