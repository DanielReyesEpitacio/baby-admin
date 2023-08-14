<!DOCTYPE html>
<html>
<head>
    <title>Previsualización de Ticket</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

    <style>
        .ticket {
            border: 1px solid #000;
            padding: 10px;
            margin: 20px;
            width: 300px;
        }

        @media print {
            body * {
                visibility: hidden;
            }
            .ticket, .ticket * {
                visibility: visible;
            }
            .ticket {
                position: absolute;
                left: 0;
                top: 0;
            }
        }

    </style>
</head>
<body>
    <div class="ticket">
        <h1>Ticket de Venta</h1>
        <p><strong>Fecha:</strong> 12 de agosto de 2023</p>
        <p><strong>Cliente:</strong> Juan Pérez</p>
        <table>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
            </tr>
            <tr>
                <td>Producto 1</td>
                <td>2</td>
                <td>$20.00</td>
            </tr>
            <tr>
                <td>Producto 2</td>
                <td>1</td>
                <td>$15.00</td>
            </tr>
        </table>
        <p><strong>Total:</strong> $55.00</p>
        <button onclick="window.print()">Imprimir</button>
    </div>

    <script>
        /*
        window.onafterprint = function() {
            // Se ejecutará después de la impresión
            window.location.href = "http://localhost:8000/caja";
        };*/
        
        window.onload = function() {
            // Imprimir cuando se carga la página
            window.print();
        };
    </script>
</body>
</html>
