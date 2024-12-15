<?php
include('phpqrcode/qrlib.php');  // Incluir la librería

// Obtener el código único desde la URL
$codigo_unico = $_GET['codigo_unico'];

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "instituto";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del estudiante
$sql = "SELECT * FROM estudiantes WHERE codigo_unico = '$codigo_unico'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener los datos
    $row = $result->fetch_assoc();
    $data = "Nombre: " . $row['nombre'] . "\nCorreo: " . $row['correo'] . "\nCódigo Único: " . $row['codigo_unico'];

    // Generar el archivo QR
    $file = 'qrcodes/' . $codigo_unico . '.png';  // Ruta del archivo QR
    QRcode::png($data, $file);  // Genera el QR

    // Mostrar el QR generado
    echo "<h1>Carnet Virtual</h1>";
    echo "<p><strong>Foto:</strong><br><img src='" . $row['foto'] . "' alt='Foto del estudiante' width='150'></p>";
    echo "<p><strong>Código QR:</strong></p><img src='$file' alt='QR del carnet' width='150'>";
} else {
    echo "Estudiante no encontrado.";
}

// Cerrar la conexión
$conn->close();
?>
