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

// Verificar que se haya recibido el código único
if (isset($_GET['codigo_unico'])) {
    $codigoUnico = $_GET['codigo_unico'];
} else {
    echo "Código único no proporcionado.";
    exit();
}

// Obtener los datos del estudiante con el código único
$sql = "SELECT * FROM estudiantes WHERE codigo_unico = '$codigoUnico'";
$result = mysqli_query($conn, $sql);

echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Registro Exitoso</title>";
echo "<style>";
echo "body {";
echo "    background-color: black;";
echo "    color: white;";
echo "    font-family: Arial, sans-serif;";
echo "    display: flex;";
echo "    justify-content: center;";
echo "    align-items: center;";
echo "    height: 100vh;";
echo "    margin: 0;";
echo "}";
echo ".container {";
echo "    background-color: #4CAF50;";
echo "    padding: 20px;";
echo "    border-radius: 10px;";
echo "    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);";
echo "    text-align: center;";
echo "    max-width: 400px;";
echo "    width: 100%;";
echo "}";
echo ".container img {";
echo "    border-radius: 5px;";
echo "    margin-top: 10px;";
echo "}";
echo ".container button {";
echo "    background-color: rgba(128, 0, 128, 0.8);";
echo "    color: white;";
echo "    padding: 10px 20px;";
echo "    border: none;";
echo "    border-radius: 5px;";
echo "    cursor: pointer;";
echo "    margin-top: 10px;";
echo "}";
echo ".container button:hover {";
echo "    background-color: rgba(128, 0, 128, 1);";
echo "}";
echo "</style>";
echo "</head>";
echo "<body>";

if ($result && mysqli_num_rows($result) > 0) {
    // Mostrar los datos del estudiante
    $row = mysqli_fetch_assoc($result);
    echo "<div class='container'>";
    echo "<h1>¡Registro Exitoso!</h1>";
    echo "<p><strong>Nombre:</strong> " . $row['nombre'] . "</p>";
    echo "<p><strong>Código Único:</strong> " . $row['codigo_unico'] . "</p>";
    echo "<p><strong>Foto:</strong><br><img src='uploads/" . $row['foto'] . "' alt='Foto del estudiante' width='150'></p>";
    
    echo "</div>";
} else {
    echo "<div class='container'>";
    echo "<p>No se encontró el estudiante.</p>";
    echo "</div>";
}

echo "</body>";
echo "</html>";

// Cerrar la conexión
mysqli_close($conn);
?>
