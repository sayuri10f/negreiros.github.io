<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #4CAF50;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        input {
            margin-bottom: 10px;
            padding: 10px;
            width: 90%;
            border: none;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #555;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Inicio de Sesión</h2>
        <form action="procesar_login.php" method="POST">
            <input type="text" name="dni" placeholder="Ingrese su DNI" required>
            <button type="submit">Iniciar Sesión</button>

            <?php
                session_start();
                $host = 'localhost';
                $user = 'root';
                $password = '';
                $dbname = 'tu_base_datos';  // Reemplaza con el nombre de tu base de datos

                $conn = mysqli_connect($host, $user, $password, $dbname);

                if (!$conn) {
                    die("Conexión fallida: " . mysqli_connect_error());
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $dni = mysqli_real_escape_string($conn, $_POST['dni']);  // Escapando caracteres especiales

                    $sql = "SELECT * FROM estudiantes WHERE dni = '$dni'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $_SESSION['dni'] = $dni;
                        header("Location: carnet.php?dni=$dni");
                    } else {
                        $error_message = "DNI incorrecto. Por favor, intenta nuevamente.";
                    }
                }

                mysqli_close($conn);
            ?>

            <?php if (isset($error_message)) { ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php } ?>
        </form>
    </div>
</body>
</html>
