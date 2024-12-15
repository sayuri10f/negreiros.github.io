<?php
// Obtener los datos del URL
$nombre = $_GET['nombre'];
$dni = $_GET['dni'];
$correo = $_GET['correo'];
$celular = $_GET['celular'];
$carrera = $_GET['carrera'];
$codigo = $_GET['codigo'];
$foto = $_GET['foto'];

// Mostrar los datos
echo "<h1>Datos del Estudiante</h1>";
echo "<p><strong>Nombre:</strong> $nombre</p>";
echo "<p><strong>DNI:</strong> $dni</p>";
echo "<p><strong>Correo:</strong> $correo</p>";
echo "<p><strong>Celular:</strong> $celular</p>";
echo "<p><strong>Carrera:</strong> $carrera</p>";
echo "<p><strong>Código Único:</strong> $codigo</p>";
echo "<p><strong>Foto:</strong> <img src='fotos/$foto' width='150'></p>";  // Asegúrate de que la foto esté en la carpeta correcta

?>
