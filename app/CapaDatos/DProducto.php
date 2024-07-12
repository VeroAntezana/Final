<?php
require_once dirname(__FILE__) . '/Conexion.php';
class DProducto {
    private $conn;

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->getConnection();
    }

    public function insertarProducto($codigo, $nombre, $precioCompra, $precioVenta, $tipoProducto) {
        $stmt = $this->conn->prepare("INSERT INTO " . Conexion::TABLE_PRODUCTO . " (codigo, nombre, precioCompra, precioVenta, tipoProducto) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdds", $codigo, $nombre, $precioCompra, $precioVenta, $tipoProducto);
        $stmt->execute();
        $stmt->close();
    }

    public function listarProductos() {
        $result = $this->conn->query("SELECT * FROM " . Conexion::TABLE_PRODUCTO);
        $productos = $result->fetch_all(MYSQLI_ASSOC);
        return $productos;
    }

    public function editarProducto($id, $codigo, $nombre, $precioCompra, $precioVenta, $tipoProducto) {
        $stmt = $this->conn->prepare("UPDATE " . Conexion::TABLE_PRODUCTO . " SET codigo=?, nombre=?, precioCompra=?, precioVenta=?, tipoProducto=? WHERE id=?");
        $stmt->bind_param("ssddsi", $codigo, $nombre, $precioCompra, $precioVenta, $tipoProducto, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function eliminarProducto($id) {
        $stmt = $this->conn->prepare("DELETE FROM " . Conexion::TABLE_PRODUCTO . " WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
