<?php
class ContextProducto {
    private $estrategia;

    public function setEstrategia(InterfaceProducto $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function calcularPrecioVenta($precioCompra) {
        return $this->estrategia->calcular($precioCompra);
    }
}
?>
