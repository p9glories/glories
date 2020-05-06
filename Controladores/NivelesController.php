<?php

require_once "../Modelos/Nivel.php";
//GP
require_once "../Controladores/SesionesController.php";
$objecteControlaSessio = new SesionesController();

class NivelesController extends Nivel{

    public function leeInfoNivel($nombre){
       $this->nombre = $nombre;

       $this->resultadoRegistraNivel($this->registraNivel());
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

        $this->id_nivel = $id;
        $this->nombre = $nombre;

        //echo $this->modificaNivel();
        $this->resultadoModificaNivel($this->modificaNivel());
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
    $Nivel = new NivelesController();
    $Nivel->leeInfoNivel(
                    $_POST["nombre"]
                );
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
    $objecte = new NivelesController();
    $objecte->ModificarNivel(
                    $_POST["id"],
                    $_POST["nombre"]
                );
}




?>