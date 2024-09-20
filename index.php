<?php
session_start();
include 'pedidos.php';

if (!isset($_SESSION['pedidos'])) {
    $_SESSION['pedidos'] = [];
}
$pedidos = $_SESSION['pedidos'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pedidos - Petrona Burger</title>
</head>
<body>
    <h1>Lista de Pedidos</h1>
    <a href="crear_pedido.php">Crear un nuevo pedido</a><br><br>
    <?php if (empty($pedidos)) : ?>
        <p>No hay pedidos disponibles.</p>
    <?php else : ?>
        <?php foreach ($pedidos as $pedido) : ?>
            <h3>Pedido #<?= $pedido['numero'] ?></h3>
            <ul>
                <li>Cédula del cliente: <?= $pedido['cedula'] ?></li>
                <li>Productos:</li>
                <ul>
                    <?php foreach ($pedido['productos'] as $producto => $cantidad) : ?>
                        <li><?= $producto ?>: <?= $cantidad ?></li>
                    <?php endforeach; ?>
                </ul>
                <li>Total: <?= calcular_total($pedido['productos']) ?> pesos</li>
            </ul>
            <a href="eliminar_pedido.php?numero=<?= $pedido['numero'] ?>">Eliminar Pedido</a>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
