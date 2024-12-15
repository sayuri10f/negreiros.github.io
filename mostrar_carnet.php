<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['codigo_unico'])) {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'instituto';
$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Obtener el código único del estudiante
$codigoUnico = $_SESSION['codigo_unico'];

// Consultar los datos del estudiante
$sql = "SELECT * FROM estudiantes WHERE codigo_unico = '$codigoUnico'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Mostrar carnet
    echo "<!DOCTYPE html>";
    echo "<html lang='es'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Carnet Virtual</title>";
    echo "<style>";
    echo "body { background-color: black; color: white; font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }";
    echo ".card { background-color: #4CAF50; padding: 20px; border-radius: 10px; text-align: center; width: 300px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); }";
    echo ".card img { width: 100px; height: 100px; border-radius: 50%; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<div class='card'>";
    echo "<h2>Carnet de Estudiante</h2>";
    echo "<img src='uploads/" . $row['foto'] . "' alt='Foto'>";
    echo "<p><strong>Nombre:</strong> " . $row['nombre'] . "</p>";
    echo "<p><strong>DNI:</strong> " . $row['dni'] . "</p>";
    echo "<p><strong>Carrera:</strong> " . $row['carrera'] . "</p>";
    echo "<p><strong>Ciclo:</strong> " . $row['ciclo'] . "</p>";
    echo "<p><strong>Código Único:</strong> " . $row['codigo_unico'] . "</p>";
    echo "<p><strong>Fecha de registro:</strong> " . $row['fecha_registro'] . "</p>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
} else {
    echo "<p style='color: white;'>Estudiante no encontrado.</p>";
}

mysqli_close($conn);
?>
