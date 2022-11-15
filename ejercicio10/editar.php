<?
if(isset($_REQUEST['volver'])){
    header('Location: ./eligeFichero.php');
    exit;
}
if($fp=fopen($_REQUEST['nombre'], 'w')){
    $leido = fread($fp, filesize($_REQUEST['nombre']));
    ?>
    <form action="./editar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="nombre" value="<? echo $_REQUEST['nombre']; ?>"> 
    
<textarea name="fichero" id="fichero" cols="30" rows="10"><?
        echo $leido;
        fwrite($fp, $leido, strlen($leido));
        fclose($fp);
    ?></textarea>
  <input type="submit" name="volver" value="Volver">
   <a href="codigo.php?fichero=<? echo basename(__FILE__)?>">Codigo de la pagina </a>     
  <?   
}


?>
