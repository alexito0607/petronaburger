<?php
session_start();
include 'pedidos.php';

if (isset($_GET['numero'])) {
    $numero = $_GET['numero'];
    foreach ($_SESSION['pedidos'] as $index => $pedido) {
        if ($pedido['numero'] == $numero) {
            unset($_SESSION['pedidos'][$index]);
            $_SESSION['pedidos'] = array_values($_SESSION['pedidos']);
            break;
        }
    }
}

header('Location: index.php');
exit;
?>
