<?php

require "../Modelos/SuperAdministrador.php";

class SuperAdministradoresController extends SuperAdministrador{

    public function leeInfoAdministrador($email, $password, $nombre, $apellidos, $telefono, $newsletter){
       $this->email = $email;
       $this->password = $password;
       $this->nombre = $nombre;
       $this->apellidos = $apellidos;
       $this->telefono = $telefono;
       $this->newsletter = $newsletter;

       $this->resultadoRegistraSuperAdministrador($this->registraSuperAdministrador());
    }

    public function resultadoRegistraSuperAdministrador($resultat){
        if ($resultat){
           require "../Vistas/SuperAdministrador/Insertado.php";
        }else{
           require "../Vistas/SuperAdministrador/NoInsertado.php";
        } 
    }
    public function LlistaSuperAdministradores(){

        $Llistat = $this->retornaSuperAdministradoresTodos();
        require "../Vistas/SuperAdministrador/verSuperAdministrador.php";
    }
}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    $Objeto = new SuperAdministradoresController();
    $Objeto->leeInfoAdministrador(
                    $_POST["email"],
                    $_POST["password"],
                    $_POST["nombre"],
                    $_POST["apellidos"],
                    $_POST["telefono"],
                    $_POST["newsletter"]
                );
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new SuperAdministradoresController();
    $objecte->LlistaSuperAdministradores();
}





?>