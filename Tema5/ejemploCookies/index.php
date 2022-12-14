<?
    require './funciones/funcionesBD.php';
    require './funciones/funcionesCookies.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="./webroot/css/estilos.css" rel="stylesheet">
</head>
<body>
    <h1>Mi panaderia</h1>
    <main>
        <section class="productos">
            <h3>Todos</h3>
            <?
                $lista=findAll();
                foreach($lista as $producto){
                   // print_r($productos);
                   echo '<article class="card">';
                    echo "<img src='./webroot/".$producto['baja']."'>";
                    echo "<p>". $producto['nombre']. "</p>";
                    echo "<a href='./verProducto.php?producto=".$producto['codigo']. "'>Ver</a>";
                   echo '</article>';
                }
            ?>
        </section>
        <section class="visto">
            <h3>Vistos</h3>
            <?
                //recogemos de cookies los ids
                mostrarUltimos();
    ?>
        </section>
    </main>
</body>
</html>