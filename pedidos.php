<?php
function calcular_total($productos) {
    $precios = [
        'Costillas' => 15000,
        'Malteada' => 5000
    ];

    $total = 0;
    foreach ($productos as $producto => $cantidad) {
        if (isset($precios[$producto])) {
            $total += $precios[$producto] * $cantidad;
        }
    }
    return $total;
}

function generar_numero_pedido($pedidos) {
    $max_num = 0;
    foreach ($pedidos as $pedido) {
        if ($pedido['numero'] > $max_num) {
            $max_num = $pedido['numero'];
        }
    }
    return $max_num + 1;
}
?>
