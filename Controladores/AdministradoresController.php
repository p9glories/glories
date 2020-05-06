<?php

require "../Modelos/Administrador.php";

class AdministradoresController extends Administrador{

    public function leeInfoAdministrador($email, $password, $nombre, $apellidos, $telefono, $newsletter){
       $this->email = $email;
       $this->password = $password;
       $this->nombre = $nombre;
       $this->apellidos = $apellidos;
       $this->telefono = $telefono;
       $this->newsletter = $newsletter;

       $this->resultadoRegistraAdministrador($this->registraAdministrador());
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




}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    $Administrador = new AdministradoresController();
    $Administrador->leeInfoAdministrador(
                    $_POST["email"],
                    $_POST["password"],
                    $_POST["nombre"],
                    $_POST["apellidos"],
                    $_POST["telefono"],
                    $_POST["newsletter"]
                );
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $Administrador = new AdministradoresController();
    $Administrador->LlistaAdministradores();
}






?>