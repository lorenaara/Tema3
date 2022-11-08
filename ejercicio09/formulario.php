<?php
    require('./validaciones.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio09</title>
</head>

<body>
    <h2>Formulario de registro</h2>
    <form action="./formulario.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="idNombre" placeholder="Nombre" value="<?php
            if(enviado() && !vacio('nombre') && nombre('nombre')){
                echo $_REQUEST['nombre'];
            }
            ?>">
            <?php
                if(vacio('nombre') && enviado()){
                    
            ?>
             <span style="color:red">El nombre no puede estar vacio</span>
            <?php
                     } 
            ?>
            <?php
            if(enviado() && !vacio('nombre') && !nombre('nombre')){
                ?>
                <span style="color:red">EL nombre debe de ser valido(minimo 3 letras)</span>
                <?php
            }
            ?>
        </p>
        <p>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="idApellido" placeholder="Apellidos" value="<?php
                if(enviado() && !vacio('apellido') && apellido('apellido')){
                    echo $_REQUEST['apellido'];
                }
            ?>">
            <?
                if(vacio('apellido') && enviado()){
            ?>
            <span style="color:red">El apellido no puede estar vacio</span>
            <?
                }
                if(enviado() && !vacio('apellido') && !apellido('apellido')){
            ?>
            <span style="color:red">El apellido debe de ser valido (un minimo de 3 carecteres espacio 3 caracteres)</span>
            <?
                }
            ?>

        </p>
        <p>
            <label for="fecha">Fecha Nacimiento:</label>
            <input type="text" name="fecha" id="idFecha" placeholder="Fecha">
        </p>
        <p>
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="idDni" placeholder="DNI">
        </p>
        <p>
            <label for="correo">Correo:</label>
            <input type="text" name="correo" id="idCorreo" placeholder="correo">
        </p>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>