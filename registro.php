<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Estudiante</title>
    <style>
        /* Estilos generales */
        
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #000; /* Fondo negro */
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Altura completa de la pantalla */
            flex-direction: column;
            text-align: center;
        }

        /* Título en dos partes con marco de gradiente */
        .title-card {
            font-size: 28px;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(135deg, #388e3c, rgba(128, 0, 128, 0.8));
            -webkit-background-clip: text; /* Para que el gradiente se vea solo en el texto */
            background-clip: text;
            border: 3px solid transparent;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.6);
            padding: 20px;
        }

        .title-card span {
            display: block;
            font-size: 24px;
            margin-bottom: 5px;
        }

        /* Estilos del contenedor principal */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap; /* Para que los elementos se ajusten en pantallas pequeñas */
        }

        /* Estilos del formulario */
        .form-container {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo más blanco */
            padding: 25px;
            border-radius: 10px;
            width: 30%; /* Ajustamos el tamaño para que sea más estrecho */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            text-align: left; /* Alineamos el texto a la izquierda */
        }

        /* Estilos de las etiquetas */
        label {
            font-size: 16px;
            margin-bottom: 10px;
            display: inline-block;
            color: #333;
        }

        /* Estilos de los campos de entrada */
        input[type="text"], input[type="email"], input[type="file"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px; /* Ajuste en el tamaño de la fuente */
        }

        input[type="file"] {
            padding: 8px;
        }

        input[type="submit"] {
            background-color: #388e3c;
            color: white;
            border: none;
            font-size: 16px; /* Ajuste del tamaño */
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            padding: 12px;
        }

        input[type="submit"]:hover {
            background-color: #2e7d32;
        }

        /* Estilo del botón de registro */
        button {
            background-color: rgba(128, 0, 128, 0.8);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #6a1b9a;
        }

        /* Estilos para el texto del título del carnet virtual */
        .title-card {
            font-size: 28px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>

    <div class="title-card">
        <span>Obtén tu Carnet Virtual y</span>
        <span>Simplifica tu Experiencia Académica</span>
    </div>

    <div class="container">
        <!-- Formulario de Registro -->
        <div class="form-container">
            <form action="guardar_estudiante.php" method="POST" enctype="multipart/form-data">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni" required>

                <label for="carrera">Carrera:</label>
                <input type="text" name="carrera" id="carrera" required>

                <label for="ciclo">Ciclo:</label>
                <input type="text" name="ciclo" id="ciclo" required>

                <label for="codigo_unico">Código Único:</label>
                <input type="text" name="codigo_unico" id="codigo_unico" value="<?php echo uniqid(); ?>" disabled>

                <label for="celular">Celular:</label>
                <input type="text" name="celular" id="celular" required>

                <label for="correo">Correo:</label>
                <input type="email" name="correo" id="correo" required>

                <label for="foto">Foto:</label>
                <input type="file" name="foto" id="foto" accept="image/*" required>

                <button type="submit">Registrar</button>
            </form>
        </div>
    </div>

</body>
</html>
