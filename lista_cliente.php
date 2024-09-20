<?php
session_start();
$cedula = $_GET['cedula'] ?? null;
$pedidos = $_SESSION['pedidos'] ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos del Cliente</title>
</head>
<body>
    <h1>Pedidos del Cliente con Cédula: <?= $cedula ?></h1>
    <a href="index.php">Volver a la lista de pedidos</a><br><br>
    <?php foreach ($pedidos as $pedido) : ?>
        <?php if ($pedido['cedula'] == $cedula) : ?>
            <h3>Pedido #<?= $pedido['numero'] ?></h3>
            <ul>
                <?php foreach ($pedido['productos'] as $producto => $cantidad) : ?>
                    <li><?= $producto ?>: <?= $cantidad ?></li>
                <?php endforeach; ?>
            </ul>
            <li>Total: <?= calcular_total($pedido['productos']) ?> pesos</li>
        <?php endif; ?>
    <?php endforeach; ?>
</body>
</html>
