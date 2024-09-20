<?php
session_start();
include 'pedidos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = generar_numero_pedido($_SESSION['pedidos']);
    $cedula = $_POST['cedula'];
    $productos = [
        'Costillas' => $_POST['costillas'],
        'Malteada' => $_POST['malteadas']
    ];

    $nuevo_pedido = [
        'numero' => $numero,
        'cedula' => $cedula,
        'productos' => $productos
    ];

    $_SESSION['pedidos'][] = $nuevo_pedido;

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Pedido - Petrona Burger</title>
</head>
<body>
    <h1>Crear Pedido</h1>
    <form method="POST" action="crear_pedido.php">
        <label for="cedula">Cédula del Cliente:</label><br>
        <input type="text" id="cedula" name="cedula" required><br><br>

        <label for="costillas">Cantidad de Costillas (15000 pesos c/u):</label><br>
        <input type="number" id="costillas" name="costillas" min="0" required><br><br>

        <label for="malteadas">Cantidad de Malteadas (5000 pesos c/u):</label><br>
        <input type="number" id="malteadas" name="malteadas" min="0" required><br><br>

        <button type="submit">Crear Pedido</button>
    </form>
</body>
</html>
