<?php
require_once dirname(__FILE__) . '/../CapaNegocio/NProducto.php';

$productoNegocio = new NProducto();
$productos = $productoNegocio->obtenerProductos();
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Precio de Compra</th>
            <th>Precio de Venta</th>
            <th>Tipo de Producto</th>
          
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo htmlspecialchars($producto['codigo']); ?></td>
                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                <td><?php echo htmlspecialchars($producto['precioCompra']); ?></td>
                <td><?php echo htmlspecialchars($producto['precioVenta']); ?></td>
                <td><?php echo htmlspecialchars($producto['tipoProducto']); ?></td>
               
                <td>
                    <button class="btn btn-warning btn-sm" onclick="calcularPrecioVenta('<?php echo htmlspecialchars($producto['codigo']); ?>', '<?php echo htmlspecialchars($producto['precioCompra']); ?>', '<?php echo htmlspecialchars($producto['tipoProducto']); ?>')">Venta</button>
                    <a href="#" class="btn btn-primary btn-sm">Editar</a>
                    <a href="eliminar_producto.php?codigo=<?php echo htmlspecialchars($producto['codigo']); ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

