<?php
require_once 'InterfaceProducto.php';

class EstrategiaBebida implements InterfaceProducto {
    public function calcular($precioCompra) {
        return $precioCompra + ($precioCompra * 0.10);
    }
}
?>
