<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "instituto";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el código único del QR escaneado (supongamos que se pasa como parámetro GET)
$codigo_unico = $_GET['codigo_unico'];  // Ejemplo: http://localhost/validar_acceso.php?codigo_unico=codigo_abc123

// Consultar la base de datos para verificar si el código existe
$sql = "SELECT * FROM estudiantes WHERE codigo_unico = '$codigo_unico'";
$result = $conn->query($sql);

// Verificar si el código existe en la base de datos
if ($result->num_rows > 0) {
    // Si el código existe, se muestra la información del estudiante
    $estudiante = $result->fetch_assoc();
    echo "Acceso permitido. Bienvenido, " . $estudiante['nombre'] . "<br>";
    echo "Correo: " . $estudiante['correo'] . "<br>";
    echo "Código único: " . $estudiante['codigo_unico'] . "<br>";
} else {
    // Si el código no existe, se deniega el acceso
    echo "Acceso denegado. Código no válido.";
}

$conn->close();
?>
