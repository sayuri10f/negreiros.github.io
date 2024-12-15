<?php
// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'instituto';
$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Obtener el código único desde la URL
$codigoUnico = $_GET['codigo_unico'];

// Consultar la base de datos para obtener los datos del estudiante
$sql = "SELECT * FROM estudiantes WHERE codigo_unico = '$codigoUnico'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "Nombre: " . $row['nombre'] . "<br>";
    echo "Correo: " . $row['correo'] . "<br>";
    echo "Código Único: " . $row['codigo_unico'] . "<br>";
    // Mostrar la foto si existe
    if ($row['foto']) {
        echo "<img src='uploads/" . $row['foto'] . "' alt='Foto de estudiante'>";
    }
} else {
    echo "Estudiante no encontrado.";
}

mysqli_close($conn);
?>
