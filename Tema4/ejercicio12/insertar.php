<?
require("./validarForm.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Insertar</title>
</head>
<body>
    <form action="insertar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?
            if (enviado() && !vacio('nombre') && nombre('nombre')){
            echo $_REQUEST['nombre'];
            }
        ?>"
        ><br>
        <?php
            if(vacio('nombre') && enviado()){
        ?>
        <span style="color:red">El nombre no puede estar vacio</span>
        <?php
            }
            if(enviado() && !vacio('nombre') && !nombre('nombre')){
        ?>
            <span style="color:red">El nombre debe ser valido</span>
        <?
            }
        ?>
        <label for="nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="nacimiento" id="nacimiento"><br>
        <label for="peso">Peso:</label>
        <input type="number" name="peso" id="peso"><br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>
</html>