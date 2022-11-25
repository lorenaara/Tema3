<?
require("./validaciones.php");
?>

<?
$correcto=false;
if(enviado()){
    if(validarForm($_REQUEST['nombre'], $_REQUEST['exp'])){
        $correcto=true;
    }
}
    if(!enviado() || $correcto==false){
?>


<!DOCTYPE html>

<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <style>
        *,
        input {
            margin: 10px;
        }
    </style>
    <?php
    $array = array(
        "1DAM" => array("ENDE", "BD", "LM", "SI", "FOL"),
        "2DAM" => array("DI", "SGE", "ACDA", "EIE", "PSP"),
        "2DAW" => array("DWES", "DWEC", "DIW", "EIE")
    );

    ?>
    <form action="./Examenhtml.php" method="post">
        <label for="nombre">Nombre y apellidos:</label> <input type="text" name="nombre" id="nombre" value="<?php
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
            if(enviado() && !vacio('nombre') && !nombre('nombre')){
        ?>
            <span style="color:red">El nombre debe ser valido (3letras y tres cadenas separadas por espacios)</span>
        <?
            }
        ?>
        <br> <label for="exp">Expediente</label> <input type="text" name="exp" id="exp" value="<?
        if(enviado() && !vacio('exp') && expediente('exp')){
            echo $_REQUEST['exp'];
        }
            
        ?>">
        <?
            if(enviado() && vacio('exp')){
        ?>
        <span style="color:red">El Expediente no puede estar vacio</span>
        <?
            }
            if(enviado() && !vacio('exp') && !expediente('exp')){
        ?>
        <span style="color:red">El expediente debe ser valido (2 digitos / tres mayusculas 2 digitos)</span>
        <?
            }
        ?>
        <br> <label for="curso">Curso:</label> <select name="curso" id="curso">
            <option value="no">Selecione una opcion</option>
        <?
                foreach ($array as $key => $value) {                
                
        ?>
            <option value="<? echo $key;?>" 
        <?
            if(enviado() && existe('curso')){
                if($_REQUEST['curso']==$key){
                    echo 'selected';
                }
                
            }
        ?>
            ><? echo $key;?></option>
        <?
            }
        ?>
        
       
        </select>
        <?
            if(enviado() && existe('curso') && $_REQUEST['curso']==0){
        ?>
        <span style="color:red">No puede estar vacio</span>
        <?
            }
        ?>
        <!--<input type="hidden" name="curso" value="">-->
        <br><input type="submit" name="Enviado" value="Enviar">
    </form>

    <?
if(enviado() && existe('curso')){
   foreach ($array as $key => $value) {
    foreach ($value as $key => $asignatura) {
        if($value=='1DAM'){

    ?>
    <input type="radio" name="asignatura" id="asignatura">
    <label for="<?$key?>"><? echo $key;?></label>
    <?
        }
    }
}
}
?>

</body>

</html>
<?
}
?>