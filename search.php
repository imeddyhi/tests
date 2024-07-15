<!DOCTYPE html>
<html>
<head>
    <title>Buscar registros - PHP con MySQL</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #3e6f58;
            padding: 10px;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-size: 18px;
            font-family: 'Georgia', 'Times New Roman', Times, serif;
        }
        table, tr, th, td {
            border: 1px solid black;
            background-color: #f2f0e3;
            border-collapse: separate;
        }
        table {
            background-color: #7cb379;
            margin: auto;
            padding: 15px;
            width: 900px;
            border-radius: 10px;
        }
        td {
            width: 125px;
            color: #black;
        }
        th {
            color: black;
        }
        .preview {
            font-family: Georgia, sans-serif;
            width: 100;
            background-color: #0953bc;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 0px;
            position: absolute;
            top: 10px;
            left: 60px;
            transition: background-color 0.3s;
        }
        .preview:hover {
            background-color: #7aa8cd;
        }
    </style>
</head>
<body>
    <?php
    $bd_host = "127.0.0.1";
    $bd_user = "root";
    $bd_pass = "";
    $bd_name = "fruteria";
    $precio_min = htmlspecialchars($_POST["precio_min"]);
    $precio_max = htmlspecialchars($_POST["precio_max"]);

    $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name, 3306);
    if (mysqli_connect_errno()) {
        printf("ERROR: %u - %s", mysqli_connect_errno(), mysqli_connect_error());
        exit();
    }

    mysqli_set_charset($conectar, "utf8");
    $consultar = "SELECT * FROM frutas WHERE precio_fruta";
    if ($resultado = mysqli_query($conectar, $consultar)) {
        printf("<table><tr><th>Código</th><th>Nombre</th><th>Variedad</th><th>Clase</th><th>Precio</th><th>Cantidad</th></tr>");
        while ($fila = mysqli_fetch_row($resultado)) {
            printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5]);
        }
        printf("</table>");
    } else {
        echo 'No se encontraron registros dentro del rango de precios.';
    }
        mysqli_free_result($resultado);
    else {
        echo 'Error en la consulta: '  mysqli_error($conectar);
    }
    mysqli_close($conectar);
    ?>
</body>
</html>
