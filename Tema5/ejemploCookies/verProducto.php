<?
    require './funciones/funcionesBD.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver</title>
    <link href="./webroot/css/estilos.css" rel="styleheet">
</head>
<body>
    <section class="producto">
    <h1>Producto</h1>
    <?
        $producto=findById()
    ?>
    </section>
    <section class="vistos">
        <h3>Vistos</h3>

    </section>
</body>
</html>