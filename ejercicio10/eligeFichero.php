<?
//si ha sido enviado el formulario comprobar si ha sido leer o editar

    if(isset($_REQUEST['leer']) || isset($_REQUEST['editar'])){
        if(isset($_REQUEST['leer'])){
            if(!file_exists($_REQUEST['nombre'])){
                echo 'Debe introducir un nombre de fichero valido';
            }else{
                header('Location: ./leer.php?nombre='. $_REQUEST['nombre']);
                exit;
            }
        }else{
            header('Location: ./editar.php?nombre='. $_REQUEST['nombre']);
                exit;
        }
    }
    

//si es leer comprobar que exista y si no existe se carga el formulario
//si existe me envia con un header el nombre del fichero como parametro
//si es ediatr un header si existe le pasa el nombre si no lo crea 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichero</title>
</head>
<body>
    <form action="./eligeFichero.php" method="post" enctype="multipart/form-data">
        <p>
    <label for="nombre">Nombre del fichero:</label>
    <input type="text" name="nombre" id="nombre">
    </p>
    <input type="submit" value="Editar" name="editar">
    <input type="submit" value="Leer" name="leer">
    </form>
    <a href="codigo.php?fichero=<? echo basename(__FILE__)?>">Codigo de la pagina </a>
<<<<<<< HEAD
=======

>>>>>>> 488b6aa (codigo)
</body>
</html>