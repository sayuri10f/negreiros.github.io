<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "instituto";  // Nombre correcto de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dni = $_POST['dni'];
    $codigo_unico = $_POST['codigo_unico'];
    $nombre = $_POST['nombre'];
    $carrera = $_POST['carrera'];
    $ciclo = $_POST['ciclo'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    
    // Verificar si se subió una foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = "uploads/" . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    } else {
        $foto = NULL;  // Si no se subió foto, dejar como NULL
    }

    // Realizar la actualización en la base de datos
    $sql = "UPDATE estudiantes SET 
                codigo_unico = '$codigo_unico', 
                nombre = '$nombre', 
                carrera = '$carrera', 
                ciclo = '$ciclo', 
                celular = '$celular', 
                correo = '$correo', 
                foto = '$foto'
            WHERE dni = '$dni'";

    if ($conn->query($sql) === TRUE) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
