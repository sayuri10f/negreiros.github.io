<?php
session_start();

// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'instituto';
$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Obtener el DNI del formulario
$dni = $_POST['dni'];

// Consultar el estudiante por DNI
$sql = "SELECT * FROM estudiantes WHERE dni = '$dni'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['codigo_unico'] = $row['codigo_unico'];
    $_SESSION['nombre'] = $row['nombre'];
    header("Location: bienvenido.php");
    exit();
} else {
    echo "<p style='color: white; text-align: center;'>DNI no encontrado. Inténtelo de nuevo.</p>";
}

mysqli_close($conn);
?>
