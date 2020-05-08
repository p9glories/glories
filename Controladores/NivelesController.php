<?php

require_once "../Modelos/Nivel.php";
//GP
require_once "../Controladores/SesionesController.php";
$objecteControlaSessio = new SesionesController();

class NivelesController extends Nivel{

    public function leeInfoNivel($nombre){
       $this->resultadoRegistraNivel($this->registraNivel($nombre));
    }

    public function resultadoRegistraNivel($resultat){
        if ($resultat){
            require "../Vistas/Nivel/Insertado.php";
        }else{
            require "../Vistas/Nivel/NoInsertado.php";
        } 
    }

    
    public function LlistaNiveles(){
        $Llistat = $this->retornaNivelesTodos();
        require "../Vistas/Nivel/verNivel.php";
    }

    public function MuestraModificarNivel($id){
        header("location: ../Vistas/Nivel/modificarNivel.php?id=$id"); 
    }

    public function ModificarNivel($id, $nombre){
        $this->resultadoModificaNivel($this->modificaNivel($id, $nombre));
    }

    public function resultadoModificaNivel($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="
                    <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>Nivel Modificado</h1>
                    <div>";
        }else{
            $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>El Nivel NO se ha podido Modificar</h1>
            <div>";
        } 
        header("location: ../index.php");
    }



}


if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    if(isset($_POST["nombre"]) && !empty($_POST["nombre"])){
        $nombre = $_POST["nombre"];
        $Nivel = new NivelesController();
        $Nivel->leeInfoNivel($nombre);
    }else{
        $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La operación NO se ha podido realizar. Tiene que introducir el nivel!</h1>
            <div>";
        header("location: ../../index.php");
    }
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new NivelesController();
    $objecte->LlistaNiveles();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    $objecte = new NivelesController();
    $objecte->MuestraModificarNivel($_GET["nivel"]);
}

if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        $id = $_POST["id"];
        $objecte = new NivelesController();
        $objecte->ModificarNivel($id,$_POST["nombre"]);
    }else{
        $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La operación NO se ha podido realizar. Error en el código del nivel!</h1>
            <div>";
        header("location: ../../index.php");
    }
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="eliminar"){
    $objecte = new NivelesController();
    $objecte->MuestraModificarNivel($_GET["nivel"]);
}


?>