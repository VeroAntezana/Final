<?php
require_once 'InterfaceProducto.php';

class EstrategiaAbarrote implements InterfaceProducto {
    public function calcular($precioCompra) {
        return $precioCompra + ($precioCompra * 0.15);
    }
}
?>
