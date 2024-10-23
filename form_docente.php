<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docente</title>

    <link rel="stylesheet" href="botones.css">
    <link rel="stylesheet" href="diseño.css">
    <script>
        function validarDatos() {
            var nombre = document.getElementById("nombre").value;
            var apellido = document.getElementById("apellido").value;
            var dni = document.getElementById("dni").value;
            var correo = document.getElementById("correo").value;
            var gys = document.getElementById("gys").value;
            var curso = document.getElementById("curso").value;

            if (curso === "0") {
                alert("Por favor, ingrese su area curicular.");
                return false; // Evita que se siga con el enlace
            }

            //Envia los datos a un archivo php
            fetch('recojo_datos.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'nombre=' + encodeURIComponent(nombre) +
                        '&apellido=' + encodeURIComponent(apellido) +
                        '&dni=' + encodeURIComponent(dni) +
                        '&correo=' + encodeURIComponent(correo) +
                        '&gys=' + encodeURIComponent(gys) +
                        '&curso=' + encodeURIComponent(curso)
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                }) //respuesta del servidor
                .catch(error => {
                    console.error('Error: ', error);
                });

            return true; // Permite la navegación si la nombre está ingresada
        }
    </script>
</head>

<body>
    <h1>DIGITE SU INFORMACIÓN COMPLETO</h1>
    <h3>DATOS DEL DOCENTE</h3>


    <form action="form_tema.php" method="post" onsubmit="return validarDatos()">

        <div class="contenedor" id="formulario">
            <label for="nombre">Ingrese sus nombres:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombres" required><br>

            <label for="apellido">Ingrese sus apellidos:</label>
            <input type="text" name="apellido" id="apellido" placeholder="Apellidos" required><br>

            <label for="dni">Ingrese su DNI:</label>
            <input type="number" name="dni" id="dni" placeholder="DNI" required><br>

            <label for="correo">Ingrese su correo:</label>
            <input type="email" name="correo" id="correo" placeholder="Correo" required><br>

            <label for="gys">Grado y Sección a cargo:</label>
            <input type="text" name="gys" id="gys" placeholder="Grado y Sección" required><br>

            <label for="area">Ingrese su area curricular:</label>
            <select name="curso" id="curso">
                <option value="0">seleccionar</option>
                <option value="Comunicacion">COMUNICACIÓN</option>
                <option value="Matematica">MATEMÁTICA</option>
                <option value="Ciencias Sociales">CIENCIAS SOCIALES</option>
                <option value="DPCC">DESARROLLO PERSONAL CIUDADANIA Y CIVICA</option>
                <option value="Ciencia y Tecnologia">CIENCIA Y TECNOLOGIA</option>
                <option value="EPT">EDUCACIÓN PARA EL TRABAJO</option>
                <option value="Religion">RELIGIÓN</option>
                <option value="ED. Fisica">EDUCACIÓN FISICA</option>
                <option value="Arte">ARTE Y CULTURA</option>
                <option value="Ingles">INGLES</option>
                <option value="Tutoria">TUTORÍA</option>
            </select>
        </div>

        <div class="centrado-btn">
            <a href="form_jornada.php" class="btn">Atrás</a>
            <input type="submit" class="btn" name="nombre" value="Siguiente">
        </div>
    </form>

</body>

</html>