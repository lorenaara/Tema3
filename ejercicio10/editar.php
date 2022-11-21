<?
if(isset($_REQUEST['volver'])){
    header('Location: ./eligeFichero.php');
    exit;
}

if(isset($_REQUEST['guardar'])){
    if($fp=fopen($_REQUEST['nombre'], 'a')){
        fwrite($fp, $_REQUEST['fichero'], strlen($_REQUEST['fichero']));
        fclose($fp);
        header('Location:./leer.php?nombre='. $_REQUEST['nombre']);
        exit;
    }
}

$existe=false;
if(file_exists($_REQUEST['nombre'])){
    $existe=true;
}
if($fp=fopen($_REQUEST['nombre'], 'a+')){
   
    ?>
    <form action="./editar.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="nombre" value="<? echo $_REQUEST['nombre']; ?>"> 
        
        <textarea name="fichero" id="fichero" cols="30" rows="10"><?
        if($existe){
            
            $leido = fread($fp, filesize($_REQUEST['nombre']));
            echo $leido;
            fclose($fp);
        }
        }
    ?></textarea><br>

  <input type="submit" name="volver" value="Volver">
  <input type="submit" name="guardar" value="Guardar"><br>
    </form>
   <a href="codigo.php?fichero=<? echo basename(__FILE__)?>">Codigo de la pagina </a>     

<?
if(isset($_REQUEST['volver'])){
    header('Location: ./eligeFichero.php');
    exit;
}

if(isset($_REQUEST['guardar'])){
    if($fp=fopen($_REQUEST['nombre'], 'a')){
        fwrite($fp, $_REQUEST['fichero'], strlen($_REQUEST['fichero']));
        fclose($fp);
        header('Location:./leer.php?nombre='. $_REQUEST['nombre']);
        exit;
    }
}

$existe=false;
if(file_exists($_REQUEST['nombre'])){
    $existe=true;
}
if($fp=fopen($_REQUEST['nombre'], 'a+')){
   
    ?>
    <form action="./editar.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="nombre" value="<? echo $_REQUEST['nombre']; ?>"> 
        
        <textarea name="fichero" id="fichero" cols="30" rows="10"><?
        if($existe){
            
            $leido = fread($fp, filesize($_REQUEST['nombre']));
            echo $leido;
            fclose($fp);
        }
        }
    ?></textarea><br>

  <input type="submit" name="volver" value="Volver">
  <input type="submit" name="guardar" value="Guardar"><br>
    </form>
   <a href="codigo.php?fichero=<? echo basename(__FILE__)?>">Codigo de la pagina </a>     

