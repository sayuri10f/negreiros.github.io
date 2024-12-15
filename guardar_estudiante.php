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

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$dni = $_POST['dni'];
$carrera = $_POST['carrera']; // Asegúrate de que este campo reciba el valor correcto
$ciclo = $_POST['ciclo'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$codigoUnico = uniqid();

// Manejo del archivo de la foto
$targetDir = "uploads/";
$photoName = "foto_" . uniqid() . "." . pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
$targetFile = $targetDir . $photoName;

if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
    // Foto cargada exitosamente
    // Insertar datos en la base de datos
    $sql = "INSERT INTO estudiantes (nombre, dni, carrera, ciclo, codigo_unico, celular, correo, foto) 
            VALUES ('$nombre', '$dni', '$carrera', '$ciclo', '$codigoUnico', '$celular', '$correo', '$photoName')";

    if (mysqli_query($conn, $sql)) {
        // Redirigir a la página de confirmación
        header("Location: registro_exitoso.php?codigo_unico=$codigoUnico");
        exit();
    } else {
        echo "Error al guardar los datos: " . mysqli_error($conn);
    }
} else {
    echo "Error al subir la foto.";
}

mysqli_close($conn);
?>
