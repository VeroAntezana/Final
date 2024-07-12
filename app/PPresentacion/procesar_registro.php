<?php
require_once dirname(__FILE__) . '/../CapaNegocio/NProducto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $precioCompra = $_POST['precioCompra'];
    $tipoProducto = $_POST['tipoProducto'];

    $productoNegocio = new NProducto();
    $precioVenta = $productoNegocio->calcularPrecioVenta($precioCompra, $tipoProducto);

    // Registra el producto con el precio de venta calculado
    $productoNegocio->registrarProducto($codigo, $nombre, $precioCompra, $tipoProducto);

    // Redirige de nuevo a la página de registro
    header('Location: /registrar_producto');
    exit();
}
?>
