<?php
require_once dirname(__FILE__) . '/../CapaDatos/DProducto.php';
require_once 'ContextProducto.php';
require_once 'EstrategiaAbarrote.php';
require_once 'EstrategiaBebida.php';

class NProducto {
    private $productoDatos;
    private $contextProducto;

    public function __construct() {
        $this->productoDatos = new DProducto();
        $this->contextProducto = new ContextProducto();
    }

    public function registrarProducto($codigo, $nombre, $precioCompra, $tipoProducto) {
        $precioVenta = $this->calcularPrecioVenta($precioCompra, $tipoProducto);
        $this->productoDatos->insertarProducto($codigo, $nombre, $precioCompra, $precioVenta, $tipoProducto);
    }

    public function obtenerProductos() {
        return $this->productoDatos->listarProductos();
    }

    public function editarProducto($id, $codigo, $nombre, $precioCompra, $tipoProducto) {
        $precioVenta = $this->calcularPrecioVenta($precioCompra, $tipoProducto);
        $this->productoDatos->editarProducto($id, $codigo, $nombre, $precioCompra, $precioVenta, $tipoProducto);
    }

    public function eliminarProducto($id) {
        $this->productoDatos->eliminarProducto($id);
    }

    public function calcularPrecioVenta($precioCompra, $tipoProducto) {
        if ($tipoProducto == 'bebida') {
            $this->contextProducto->setEstrategia(new EstrategiaBebida());
        } elseif ($tipoProducto == 'abarrotes') {
            $this->contextProducto->setEstrategia(new EstrategiaAbarrote());
        }

        return $this->contextProducto->calcularPrecioVenta($precioCompra);
    }
}
?>
