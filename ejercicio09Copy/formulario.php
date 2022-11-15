<?php
require('./validaciones.php');
//$correcto = false;
/*if(enviado()){
    if(validarForm($_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['fecha'], $_REQUEST['dni'], $_REQUEST['correo'])){
        $correcto = true;
    }
}
if(!enviado() || !$correcto){*/
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
    <?
       // if($correcto){

        //}
    ?>
    <form action="./formulario.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="idNombre" placeholder="Nombre" value="<?php
            if (enviado() && !vacio('nombre') && nombre('nombre')) {
                echo $_REQUEST['nombre'];
            }
            ?>">
            <?php
            if (vacio('nombre') && enviado()) {

            ?>
            <span style="color:red">El nombre no puede estar vacio</span>
            <?php
            }
            ?>
            <?php
            if (enviado() && !vacio('nombre') && !nombre('nombre')) {
            ?>
            <span style="color:red">EL nombre debe de ser valido(minimo 3 letras)</span>
            <?php
            }
            ?>
        </p>
        <p>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="idApellido" placeholder="Apellidos" value="<?php
            if (enviado() && !vacio('apellido') && apellido('apellido')) {
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
            <span style="color:red">El apellido debe de ser valido (un minimo de 3 carecteres espacio 3
                caracteres)</span>
            <?
                }
            ?>

        </p>
        <p>
            <label for="fecha">Fecha Nacimiento:</label>
            <input type="text" name="fecha" id="idFecha" placeholder="yyyy/mm/dd" value="<?php
            if (enviado() && !vacio('fecha') && fecha('fecha')) {
                echo $_REQUEST['fecha'];
            }
            ?>">
            <?
            if(vacio('fecha') && enviado()){
            ?>
            <span style="color:red">La fecha no puede estar vacia</span>
            <?
            }
            if(enviado() && !vacio('fecha') && !fecha('fecha')){
            ?>
            <span style="color:red">La fecha tiene que tener un formato valido (09/05/2004)</span>
            <?
            } 
            elseif(enviado() && !vacio('fecha') && !mayorEdad('fecha')){
                ?>
            <span style="color:red">Tienes que ser mayor de edad</span>
            <?
                }
            ?>
        </p>
        <p>
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="idDni" placeholder="DNI" value="<?
                if(enviado() &&!vacio('dni') && dni('dni')){
                    echo $_REQUEST['dni'];
                }
            ?>">
            <?
                if(vacio('dni') && enviado()){
            ?>

            <span style="color:red">EL DNI no puede estar vacio</span>
            <?
            }
            if(enviado() && !vacio('dni') && !dni('dni')){
            ?>
            <span style="color:red">El dni tiene que tener un formato valido </span>
            <?
            }elseif(enviado() && !vacio('dni') && !letraDni('dni')){
            ?>
            <span style="color:red">La letra debe de coincidir con los numeros</span>
            <?
            }
        ?>


        </p>
        <p>
            <label for="correo">Correo:</label>
            <input type="text" name="correo" id="idCorreo" placeholder="correo" value="<?
                if(enviado() && !vacio('correo') && correo('correo')){
                    echo $_REQUEST['correo'];
                }
            ?>">
            <?
                if(enviado()&& vacio('correo')){
            ?>
            <span style="color:red">El correo no puede estar vacio</span>
            <?        
                }if(enviado() && !vacio('correo') && !correo('correo')){
                    ?>
            <span style="color:red">El correo tiene que tener un formato valido </span>
            <?
                    }
            ?>
        </p>
        <p>
            <label for="imagen">Imagen (.jpg, .png, .bmp): </label>
            <input type="file" name="imagen" id="imagen">
            <?
            // si se ha enviado fichero y sino error
            if(existeDoc('imagen')&& enviado()){
            // si tiene bien el patron y sino error
                if(imagen('imagen')){
                    //subir
                    subirImagen('imagen');
                }else{
                    ?>
                <span style="color:red">El formato de la imagen debe de ser valido </span>
                <?
                }
                   
                
            }
            if(!existeDoc('imagen')&& enviado()) { 
            ?>
            <span style="color:red">Debes selecionar una imagen no puede estar vacio</span>
            <?
                }
            

            ?>
        </p>
        <input type="submit" value="Enviar" name="enviar"><br>
        <a href="codigo.php?fichero=<? echo basename(__FILE__)?>">Codigo de la pagina form</a><br>
        <a href="codigo.php?fichero=<? self()?>">Codigo de la pagina validaciones</a>
    </form>
</body>

<?
//}
?>
</html>