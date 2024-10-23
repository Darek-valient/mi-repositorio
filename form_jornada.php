<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jornada Trabajo</title>

    <link rel="stylesheet" href="botones.css">
    <link rel="stylesheet" href="diseño.css">

    <script>
        function validarJornada() {
            var jornada = [];

            // Obtiene los elementos checkbox y verifica cuáles están marcados
            if (document.getElementById("primera").checked) {
                jornada.push("primera");
            }
            if (document.getElementById("segunda").checked) {
                jornada.push("segunda");
            }
            if (document.getElementById("tercera").checked) {
                jornada.push("tercera");
            }
            if (document.getElementById("cuarta").checked) {
                jornada.push("cuarta");
            }
            if (document.getElementById("quinta").checked) {
                jornada.push("quinta");
            }
            if (document.getElementById("sexta").checked) {
                jornada.push("sexta");
            }
            if (document.getElementById("septima").checked) {
                jornada.push("septima");
            }
            if (document.getElementById("octava").checked) {
                jornada.push("octava");
            }
            if (document.getElementById("novena").checked) {
                jornada.push("novena");
            }

            // Verifica si al menos un checkbox está marcado
            if (jornada.length === 0) {
                alert("Por favor, seleccione al menos una jornada.");
                return false; // Evita que se siga con el enlace
            }

            // Envía las jornadas seleccionadas al archivo PHP
            fetch('recojo_datos.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'jornada=' + encodeURIComponent(jornada.join(','))
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                }) // Muestra la respuesta del servidor en la consola
                .catch(error => {
                    console.error('Error:', error);
                });

            return true; // Permite la navegación si la validación es exitosa
        }
    </script>

</head>

<body>
    <h1>SELECCIONA LA HORA ESCOLAR DE TU INGRESO AL AULA DE INNOVACIÓN PEDAGÓGICA</h1>
    <h3>JORNADA DE TRABAJO</h3>

    <div class="contenedor">
        <div class="centrado">
            <p>(Marca las horas de permanencia en el AIP)</p>
        </div>
        <p>
            <input type="checkbox" name="primera" id="primera">PRIMERA HORA
            (08:00 AM - 08:45 AM)
        </p>
        <p>
            <input type="checkbox" name="segunda" id="segunda">SEGUNDA HORA
            (08:45 AM - 09:30 AM)
        </p>
        <p>
            <input type="checkbox" name="tercera" id="tercera">TERCERA HORA
            (09:30 AM - 10:15 AM)
        </p>
        <p>
            <input type="checkbox" name="cuarta" id="cuarta">CUARTA HORA
            (10:15 AM - 11:00 AM)
        </p>
        <p>
            <input type="checkbox" name="quinta" id="quinta">QUINTA HORA
            (11:15 AM - 12:00 PM)
        </p>
        <p>
            <input type="checkbox" name="sexta" id="sexta">SEXTA HORA
            (12:00 PM - 12:45 PM)
        </p>
        <p>
            <input type="checkbox" name="septima" id="septima">SEPTIMA HORA
            (12:45 PM - 01:30 PM)
        </p>
        <p>
            <input type="checkbox" name="octava" id="octava">OCTAVA HORA
            (02:00 PM - 02:45 PM)
        </p>
        <p>
            <input type="checkbox" name="novena" id="novena">NOVENA HORA
            (02:45 PM - 03:30 PM)
        </p>
    </div>

    <div class="centrado-btn">
        <a href="form_fecha.php" class="btn">Atrás</a>
        <a href="form_docente.php" class="btn" name="jornada" onclick="return validarJornada()">Siguiente</a>
    </div>

</body>

</html>