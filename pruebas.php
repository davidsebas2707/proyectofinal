<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Talla, Color y Marca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f8f8;
        }

        .producto-container {
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .producto {
            max-width: 200px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        img {
            max-width: 100px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 2% auto;
            padding: 10px;
            border: 1px solid #888;
            width: 80%;
            max-width: 700px;
            position: relative;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input[readonly] {
            border: none;
            background-color: transparent;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            width: calc(100% - 22px);
            text-align: left;
        }

        select {
            padding: 10px;
            font-size: 16px;
            width: calc(100% - 22px);
            margin-bottom: 10px;
        }

        .btn-container {
            margin-top: 20px;
            text-align: right;
        }

        button {
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
            padding: 8px 16px;
            font-size: 14px;
            flex-shrink: 0;
        }
        .btn {
            display: inline-block;
            font-size: 1em;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px;
            cursor: pointer;
        }
        .btn-atras {
            background-color: #007bff;
            color: #fff;
        }

        .btn-carrito {
            background-color: #28a745;
            color: #fff;
        }
        .btn-container {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .btn-carrito {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .btn-atras {
            position: absolute;
            top: 10px;
            left: 10px;
        }

    </style>
</head>
<body> 
    <div class="container mt-3">
        <a class="btn btn-atras" href="./inicio.php" role="button" style="float: left;">Atrás</a>
        <a class="btn btn-carrito" href="./listado.php" style="float: right;">Carrito</a>
    </div>
    <div class="producto-container">
        <!-- Imágenes con detalles de productos -->
        <div class="producto">
            <img id="imagenProducto1"
                src="https://i.pinimg.com/550x/9e/f1/d8/9ef1d83080f0fc5691a44e11a333c000.jpg"
                onclick="mostrarModal('Camiseta', '20.00')">
            <div>Camiseta</div>
        </div>

        <div class="producto">
            <img id="imagenProducto2"
                src="https://trueshop.co/cdn/shop/products/true_cargo_multipocket_pants_black_pantalones_sudaderas_1_776423a6-c4ba-43aa-be88-cf671e38a3da_720x720.jpg?v=1669821939"
                onclick="mostrarModal('Pantalón', '30.00')">
            <div>Pantalón</div>
        </div>

        <div class="producto">
            <img id="imagenProducto3"
                src="https://static.pullandbear.net/2/photos/2023/I/0/2/p/4710/504/800/4710504800_1_1_3.jpg?t=1678720885451"
                onclick="mostrarModal('Chaqueta', '40.00')">
            <div>Chaqueta</div>
        </div>

        <div class="producto">
            <img id="imagenProducto4"
                src="https://www.tumodacreativa.com/wp-content/uploads/2023/01/Zapato-casual-para-hombre-coloe-azul..webp"
                onclick="mostrarModal('Zapatos', '50.00')">
            <div>Zapatos</div>
        </div>

        <div class="producto">
            <img id="imagenProducto5"
                src="https://falabella.scene7.com/is/image/FalabellaCO/117564912_1?wid=800&hei=800&qlt=70"
                onclick="mostrarModal('Blusa', '25.00')">
            <div>Blusa</div>
        </div>
    </div>

    <!-- El modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="ocultarModal()">&times;</span>
            <h2>Detalles del Producto</h2>

            <!-- Formulario de selección de talla, color y marca -->
            <form action="guardar.php" method="post">
                <label for="producto">Producto:</label>
                <input type="text" id="producto" name="producto" readonly>

                <label for="talla">Talla:</label>
                <select id="talla" name="talla">
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                </select>

                <label for="color">Color:</label>
                <select id="color" name="color">
                    <option value="rojo">Rojo</option>
                    <option value="verde">Verde</option>
                    <option value="azul">Azul</option>
                </select>

                <label for="marca">Marca:</label>
                <select id="marca" name="marca">
                    <option value="marca1">Marca 1</option>
                    <option value="marca2">Marca 2</option>
                    <option value="marca3">Marca 3</option>
                </select>

                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio" readonly>

                <div class="btn-container">
                    <button type="submit" style="background-color: green; color: white;">Agregar al carrito</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Función para mostrar el modal
        function mostrarModal(producto, precio) {
            document.getElementById('myModal').style.display = 'block';
            document.getElementById('producto').value = producto;
            document.getElementById('precio').value = precio;
        }

        // Función para ocultar el modal
        function ocultarModal() {
            document.getElementById('myModal').style.display = 'none';
        }
        
    </script>

</body>

</html>