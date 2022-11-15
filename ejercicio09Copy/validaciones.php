<?php
function self(){
    echo basename(__FILE__);
}
function vacio($nombre){
    if(empty($_REQUEST[$nombre])){
        return true;
    }
    return false;
}
function enviado(){
    if(isset($_REQUEST['enviar'])){
        return true;
    }
    return false;
}
function nombre($nombre){
    $patron= '/\D{3,}/';
    if(preg_match($patron, $_REQUEST[$nombre])==1){
        return true;
    }
    return false;
}
function apellido($apellido){
    $patron= '/\D{3,}\s\D{3,}/';
    if(preg_match($patron, $_REQUEST[$apellido])==1){
        return true;
    }
    return false;
}
function fecha($fecha){
    $patron='/[0-9]{4}\/[0-9]{2}\/[0-9]{2}/';
    if(preg_match($patron, $_REQUEST[$fecha])==1){
        //calcular edad
      return true;
        
        
    }
    return false;
}
function mayorEdad($fecha){
    $fechaHoy= date("Y-m-d");
    $edad= date_diff(date_create($_REQUEST['fecha']), date_create($fechaHoy));
    if($edad->y>=18){
        return true;
    }else{
       return false;
    }
}
function dni($dni){
    $patron = '/[0-9]{8}[a-zA-Z]{1}/';
    if(preg_match($patron, $_REQUEST[$dni])==1){
        return true;
    }
    return false;
}
function letraDni($dni){
    $letra=strtoupper(substr($_REQUEST['dni'], -1));
    $numero= (int) substr($_REQUEST['dni'], 0, -1);
    $palabro = 'TRWAGMYFPDXBNJZSQVHLCKE';  
    if(substr($palabro, $numero%23, 1)==$letra){
        return true;
    }else{
        return false;
    }
}
function correo($correo){
    $patron='/^[a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3}/';
    if(preg_match($patron, $_REQUEST[$correo])==1){
        return true;
    }
    return false;
}
function imagen($imagen){
    $patron='/(.)+\.(jpg|png|bmp)/';
    $nombreTemporal= basename($_FILES[$imagen]['name']);
    if(preg_match($patron, $nombreTemporal)==1){    
        return true;
    }
    return false;
}
function subirImagen($imagen){
    $ubicacion='./';
    $nombreTemporal= basename($_FILES[$imagen]['name']);
    $ubicacion = $ubicacion .$nombreTemporal;
    if(move_uploaded_file($_FILES[$imagen]['tmp_name'], $ubicacion)){
        echo "<span style='color:green'>el fichero se ha subido</span>";
    }else{
        echo "<span style='color:red'>Se ha producido un error</span>";
    }
}
function existeDoc($nombre){
    if(!empty($_FILES[$nombre]['name'])){
        return true;
    }
    return false;
}
/*function validarForm($nombre, $apellido, $fecha, $dni, $correo){
    if(enviado()){
        if(vacio($nombre) && vacio($apellido) && vacio($fecha) && vacio($correo) && existeDoc('imagen') && nombre($nombre) && apellido($apellido) && fecha($fecha) && correo($correo) && imagen('imagen')){
            echo '<span><strong>El nombre es: </strong></span>'.$nombre;
            echo '<br><span><strong>El apellido es: </strong></span>'. $apellido;
            echo '<br><span><strong>La fecha de nacimiento es: </strong></span>'. $fecha;
            echo '<br><span><strong>El dni es: </strong></span>' . $dni;
            echo '<br><span><strong>El correo es: </strong></span>' . $correo;
            echo '<br><span><strong>El fichero selecionado es: </strong></span>'. $_FILES['imagen']['name'];
            
        }
    }
}*/
?>