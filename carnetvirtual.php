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

// Verificar si el parámetro 'codigo_unico' está presente en la URL
if (isset($_GET['codigo_unico'])) {
    $codigoUnico = $_GET['codigo_unico'];
} else {
    echo "<p style='color: red; text-align: center;'>Código único no proporcionado.</p>";
    exit();
}

// Consultar los datos del estudiante
$sql = "SELECT * FROM estudiantes WHERE codigo_unico = '$codigoUnico'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    ?>

    <!-- Diseño del Carnet Virtual -->
    <div style="border: 2px solid black; padding: 20px; width: 350px; text-align: center; margin: auto; font-family: Arial, sans-serif;">
        <h2 style="color: #4CAF50;">Carnet Virtual de Estudiante</h2>
        <img src="uploads/<?php echo $row['foto']; ?>" alt="Foto del estudiante" style="width: 100px; height: 100px; border-radius: 50%; border: 1px solid #ddd; margin-bottom: 10px;">
        <p><strong>Nombre:</strong> <?php echo $row['nombre']; ?></p>
        <p><strong>DNI:</strong> <?php echo $row['dni']; ?></p>
        <p><strong>Carrera:</strong> <?php echo $row['carrera']; ?></p>
        <p><strong>Ciclo:</strong> <?php echo $row['ciclo']; ?></p>
        <p><strong>Código Único:</strong> <?php echo $row['codigo_unico']; ?></p>
        <p><strong>Celular:</strong> <?php echo $row['celular']; ?></p>
        <p><strong>Correo:</strong> <?php echo $row['correo']; ?></p>
        <p><strong>Fecha de Registro:</strong> <?php echo $row['fecha_registro']; ?></p>
        <button onclick="window.print()" style="margin-top: 10px; padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; border-radius: 5px;">
            Imprimir Carnet
        </button>
    </div>

    <?php
} else {
    echo "<p style='color: red; text-align: center;'>Estudiante no encontrado.</p>";
}

mysqli_close($conn);
?>
