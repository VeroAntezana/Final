<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Producto</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <style>
        .content p {
            margin-bottom: 10px;
        }

        .login-form {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1>Producto</h1>
        </div>
    </header>
    <nav>
        <!-- Aquí puedes añadir un menú de navegación estático si lo deseas -->
    </nav>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h2>Final</h2>
                    </div>
                    <div class="login-form mt-6">
                        <h3>Registrar Producto</h3>
                        <form action="/procesar_registro" method="post">
                            <div class="form-group">
                                <label for="codigo">Código</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="precioCompra">Precio de Compra</label>
                                <input type="number" class="form-control" id="precioCompra" name="precioCompra" step="0.01" required>
                            </div>
                            <div class="form-group">
                                <label for="precioVenta">Precio de Venta</label>
                                <input type="number" class="form-control" id="precioVenta" name="precioVenta" step="0.01" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tipoProducto">Tipo de Producto</label>
                                <select class="form-control" id="tipoProducto" name="tipoProducto" required>
                                    <option value="bebida">Bebida</option>
                                    <option value="abarrotes">Abarrotes</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registrar Producto</button>
                        </form>
                    </div>
                    <div class="content mt-4">
                        <h3>Lista de Productos</h3>
                        <?php require 'PPresentacion.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container text-center">
            <p>&copy; Veronica Antezana</p>
        </div>
    </footer>
</body>

</html>
