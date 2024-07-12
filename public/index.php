<?php
require_once __DIR__ . '/../vendor/autoload.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/':
        header('Location: /registrar_producto');
        exit();
    case '/listar_productos':
        require_once(__DIR__ . '/../app/PPresentacion/PPresentacion.php');
        break;
    case '/registrar_producto':
        require_once(__DIR__ . '/../app/PPresentacion/registrar_producto.php');
        break;
    case '/procesar_registro':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once(__DIR__ . '/../app/PPresentacion/procesar_registro.php');
        }
        break;
    default:
        // 404 Not Found
        header("HTTP/1.0 404 Not Found");
        echo "Página no encontrada";
        break;
}
?>
