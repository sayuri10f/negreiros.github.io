<form action="guardar_estudiante.php" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    
    <label for="dni">DNI:</label>
    <input type="text" name="dni" required>
    <br>
    
    <label for="carrera">Carrera:</label>
    <input type="text" name="carrera" required>
    <br>
    
    <label for="ciclo">Ciclo:</label>
    <input type="text" name="ciclo" required>
    <br>
    
    <label for="codigo_unico">Código Único:</label>
    <input type="text" name="codigo_unico" required>
    <br>
    
    <label for="celular">Celular:</label>
    <input type="text" name="celular" required>
    <br>
    
    <label for="correo">Correo:</label>
    <input type="email" name="correo" required>
    <br>
    
    <label for="foto">Foto:</label>
    <input type="file" name="foto" accept="image/*">
    <br>
    
    <button type="submit">Registrar</button>
</form>
