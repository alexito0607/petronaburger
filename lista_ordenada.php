<?php
session_start();
include 'pedidos.php';

$pedidos = $_SESSION['pedidos'] ?? [];

usort($pedidos, function($a, $b) {
    return array_sum($a['productos']) - array_sum($b['productos']);
});
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos Ordenados</title>
</head>
<body>
    <h1>Pedidos Ordenados por Cantidad de Productos</h1>
    <a href="index.php">Volver a la lista de pedidos</a><br><br>
    <?php foreach ($pedidos as $pedido) : ?>
        <h3>Pedido #<?= $pedido['numero'] ?></h3>
        <ul>
            <?php foreach ($pedido['productos'] as $producto => $cantidad) : ?>
                <li><?= $producto ?>: <?= $cantidad ?></li>
            <?php endforeach; ?>
        </ul>
        <li>Total: <?= calcular_total($pedido['productos']) ?> pesos</li>
    <?php endforeach; ?>
</body>
</html>
