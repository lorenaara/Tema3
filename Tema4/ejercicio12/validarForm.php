<?
function vacio($nombre){
        if(empty($_REQUEST[$nombre])){
            return true;
        }
        return false;
    }
    function enviado(){
        if(isset($_REQUEST['enviar']))
        return true;
    return false;
    }
    function nombre($nombre){
        if(strlen($nombre)<=45){
        return true;
        }
        return false;
    }
    //la fecha no tiene que estar validada ya que con date lo que se recibe es año/mes/dia
    

?>