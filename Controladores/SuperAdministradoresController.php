<?php

require_once "../Modelos/SuperAdministrador.php";

class SuperAdministradoresController extends SuperAdministrador{

    public function leeInfoAdministrador($email, $password, $nombre, $apellidos, $telefono, $newsletter){
       $this->resultadoRegistraSuperAdministrador($this->registraSuperAdministrador($email, $password, $nombre, $apellidos, $telefono, $newsletter));
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

    public function buscaSuperAdmin($id){
        return $this->buscaSuperAdministrador($id);
    }


}

if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $Objeto = new SuperAdministradoresController();
        $Objeto->leeInfoAdministrador($email,$password,$_POST["nombre"],$_POST["apellidos"],$_POST["telefono"],$_POST["newsletter"]);
    }else{
        $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La operación NO se ha podido realizar. Tiene que introducir e-mail y password!</h1>
            <div>";
        header("location: ../../index.php");
    }
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new SuperAdministradoresController();
    $objecte->LlistaSuperAdministradores();
}





?>