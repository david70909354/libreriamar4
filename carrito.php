<?php
session_start();

// Inicia la sesión si no está iniciada
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Agrega un libro al carrito
if (isset($_POST['id_libro'])) {
    $id_libro = $_POST['id_libro'];

    // Verifica si el libro ya está en el carrito
    if (!in_array($id_libro, $_SESSION['carrito'])) {
        $_SESSION['carrito'][] = $id_libro;
    }
}

// Consulta para obtener los libros en el carrito
if (!empty($_SESSION['carrito'])) {
    $ids_libros = implode(',', $_SESSION['carrito']);
    $sql = "SELECT * FROM libros WHERE id IN ($ids_libros)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $libros_carrito = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Carrito de Compras</h1>

    <!-- Lista de libros en el carrito -->
    <?php if (!empty($libros_carrito)): ?>
        <ul>
            <?php foreach ($libros_carrito as $libro): ?>
                <li>
                    <strong>Título:</strong> <?php echo $libro['titulo']; ?><br>
                    <strong>Autor:</strong> <?php echo $libro['autor']; ?><br>
                    <strong>Precio:</strong> <?php echo $libro['precio']; ?> USD
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>

    <a href="index.php">Continuar Comprando</a>

</body>
</html>
