<?
    require './funciones/funcionesBD.php';
    require './funciones/funcionesCookies.php';

    if(!isset($_REQUEST['producto'])){
        header('Location:./index.php');
    }else{
        $id=$_REQUEST['producto'];
        productoVisto($id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver</title>
    <link href="./webroot/css/estilos.css" rel="stylesheet">
</head>
<body>
    <section class="producto">
    <h1>Producto</h1>
    <?
        $producto=findById($id);
        $producto = $producto[0];
        echo '<article class="card">';
        echo "<img src='./webroot/".$producto['alta']."'>";
        echo "<p>". $producto['nombre']. "</p>";
        echo "<p>". $producto['descripcion']. "</p>";
        echo "<a href='./verProducto.php?producto=".$producto['codigo']. "'>Ver</a>";
        echo "<a href='./index.php'>Volver</a>";
       echo '</article>';
    ?>
    </section>
    <section class="visto">
        <h3>Vistos</h3>

    </section>
</body>
</html>