<?php
require 'database.php';

// Consulta para obtener la lista de libros
$sql = "SELECT * FROM libros";
$stmt = $conn->prepare($sql);
$stmt->execute();
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Librería</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Librería</h1>

    <!-- Lista de libros -->
    <ul>
        <?php foreach ($libros as $libro): ?>
            <li>
                <strong>Título:</strong> <?php echo $libro['titulo']; ?><br>
                <strong>Autor:</strong> <?php echo $libro['autor']; ?><br>
                <strong>Precio:</strong> <?php echo $libro['precio']; ?> USD<br>
                <form action="carrito.php" method="post">
                    <input type="hidden" name="id_libro" value="<?php echo $libro['id']; ?>">
                    <input type="submit" value="Agregar al carrito">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="carrito.php">Ver Carrito</a>

</body>
</html>
