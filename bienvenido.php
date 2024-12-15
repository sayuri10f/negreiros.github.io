<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['codigo_unico']) || !isset($_SESSION['nombre'])) {
    header("Location: login.php");
    exit();
}

// Obtener el nombre del estudiante
$nombre = $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
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
        .welcome-container {
            text-align: center;
        }
        .welcome-container button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .welcome-container button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Bienvenido, <?php echo htmlspecialchars($nombre); ?>!</h1>
        <form action="mostrar_carnet.php" method="GET">
            <button type="submit">Carnet Virtual</button>
        </form>
    </div>
</body>
</html>
