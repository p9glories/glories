<?php

require_once "../Modelos/Administrador.php";

class AdministradoresController extends Administrador{

    public function leeInfoAdministrador($email, $password, $nombre, $apellidos, $telefono, $newsletter){
       $this->resultadoRegistraAdministrador($this->registraAdministrador($email, $password, $nombre, $apellidos, $telefono, $newsletter));
    }

    public function resultadoRegistraAdministrador($resultat){
        if ($resultat){
           require "../Vistas/Administrador/Insertado.php";
        }else{
           require "../Vistas/Administrador/NoInsertado.php";
        } 
    }

    public function LlistaAdministradores(){

        $Llistat = $this->retornaAdministradoresTodos();
        require "../Vistas/Administrador/verAdministrador.php";
    }

    
    public function buscaAdmin($id){
        return $this->buscaAdministrador($id);
    }

    public function retornaIdAdminDel($usuario){
        return $this->buscaIdAdminDel($usuario);
    }
    

}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $Administrador = new AdministradoresController();
        $Administrador->leeInfoAdministrador($email,$password,$_POST["nombre"],$_POST["apellidos"],$_POST["telefono"],$_POST["newsletter"]);
    }else{
        $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La operación NO se ha podido realizar. Tiene que introducir más datos!</h1>
            <div>";
        header("location: ../../index.php");
    }

    
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $Administrador = new AdministradoresController();
    $Administrador->LlistaAdministradores();
}






?>