<?php
// Archivo: buscar.php

// Incluye el archivo de conexión a la base de datos
require 'database.php';

// Variable para almacenar los resultados de la búsqueda
$resultados = [];

// Verifica si se ha enviado el formulario de búsqueda
if (!empty($_POST['busqueda'])) {
    // Realiza la consulta SQL para buscar en la tabla de libros
    $sql = "SELECT * FROM libros WHERE titulo LIKE :busqueda OR autor LIKE :busqueda";
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    $busquedaParam = '%' . $_POST['busqueda'] . '%';
    $stmt->bindParam(':busqueda', $busquedaParam);

    // Ejecuta la consulta
    $stmt->execute();

    // Obtiene los resultados de la consulta
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Libros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Buscar Libros</h1>

    <!-- Formulario de búsqueda -->
    <form action="buscar.php" method="POST">
        <label for="busqueda">Buscar por título o autor:</label>
        <input type="text" id="busqueda" name="busqueda" required>
        <button type="submit">Buscar</button>
    </form>

    <!-- Resultados de la búsqueda -->
    <?php if (!empty($resultados)): ?>
        <h2>Resultados de la búsqueda:</h2>
        <ul>
            <?php foreach ($resultados as $libro): ?>
                <li>
                    <strong>Título:</strong> <?php echo $libro['titulo']; ?><br>
                    <strong>Autor:</strong> <?php echo $libro['autor']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="index.php">Inicio</a>

</body>
</html>
