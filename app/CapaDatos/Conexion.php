<?php

class Conexion {
    const DATABASE_NOMBRE = "producto";
    const TABLE_PRODUCTO = "productos";

    public function __construct() {
    }

    public function getConnection(): mysqli {
        $dbConfig = [
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => self::DATABASE_NOMBRE,
        ];

        $conn = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password']);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $this->createDatabase($conn, $dbConfig['database']);
        $conn->select_db($dbConfig['database']);

        if (!$this->tableExists($conn, self::TABLE_PRODUCTO)) {
            $this->createTables($conn);
        }

        return $conn;
    }

    private function createDatabase(mysqli $conn, string $databaseName): void {
        $checkDatabaseQuery = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$databaseName'";
        $result = $conn->query($checkDatabaseQuery);

        if ($result->num_rows === 0) {
            $createDatabaseQuery = "CREATE DATABASE $databaseName";

            if ($conn->query($createDatabaseQuery) === TRUE) {
                error_log("Base de datos '$databaseName' creada con éxito");
            } else {
                error_log("Error al crear la base de datos: " . $conn->error);
            }
        } else {
            error_log("La base de datos '$databaseName' ya existe, no se creó nuevamente.");
        }
    }

    private function createTables(mysqli $conn): void {
        $createTableQuery = "CREATE TABLE IF NOT EXISTS " . self::TABLE_PRODUCTO . " (
            id INT AUTO_INCREMENT PRIMARY KEY,
            codigo VARCHAR(50) NOT NULL,
            nombre VARCHAR(255) NOT NULL,
            precioCompra DECIMAL(10, 2) NOT NULL,
            precioVenta DECIMAL(10, 2) NOT NULL,
            tipoProducto VARCHAR(50) NOT NULL
        )";

        if ($conn->query($createTableQuery) === FALSE) {
            die("Error al crear la tabla: " . $conn->error);
        }

        error_log("Tablas creadas con éxito");
    }

    private function tableExists(mysqli $conn, string $tableName): bool {
        $result = $conn->query("SHOW TABLES LIKE '$tableName'");
        return $result->num_rows > 0;
    }
}
?>
