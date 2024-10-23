<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha</title>

    <link rel="stylesheet" href="botones.css">
    <link rel="stylesheet" href="diseño.css">

    <script>
        function validarFecha() {
            var fecha = document.getElementById("fecha").value;

            if (fecha === "") {
                alert("Por favor, ingresa una fecha.");
                return false; // Evita que se siga con el enlace
            }

            //Envia la fecha a un archivo php
            fetch('recojo_datos.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'fecha=' + encodeURIComponent(fecha)
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                }) //respuesta del servidor
                .catch(error => {
                    console.error('Error: ', error);
                });

            return true; // Permite la navegación si la fecha está ingresada
        }
    </script>
</head>

<body>
    <div class="img-logo">
        <img src="logo.PNG" alt="logo" style="width: 9eh; height: cover; vertical-align: middle;">
    </div>
    <h1>SELECCIONAR LA FECHA DE TU INGRESO AL AULA DE INNOVACIÓN PEDAGÓGICA</h1>
    <H3>FECHA DE INGRESO:</H3>

    <div class="centrado">
        <form action="form_jornada.php" method="post" onsubmit="return validarFecha()">
            <input type="date" name="fecha" id="fecha" required><br>

            <div class="centrado-btn">
                <a href="index.php" class="btn">Atrás</a>
                <input type="submit" class="btn" name="fecha" value="Siguiente">
            </div>
        </form>
    </div>
</body>

</html>