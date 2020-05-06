<?php

require_once "../Modelos/Valoracion.php";
//GP
require_once "../Controladores/SesionesController.php";
$objecteControlaSessio = new SesionesController();

class ValoracionesController extends Valoracion{

    public function leeInfoValoracion($cliente, $tienda, $nivel, $puntuacion, $comentario){
        $this->id_cliente = $cliente;    /**** ATENCIO-MILLORAR::  id_cliente, = l'ha de saber! = SESSION/GETs */
        $this->id_tienda = $tienda;
        $this->nivel = $nivel;

       $this->puntuacion = $puntuacion;
       $this->comentario = $comentario;
       
       $this->resultadoRegistraValoracion($this->registraValoracion());
    }

    public function resultadoRegistraValoracion($resultat){
        if ($resultat){
            require "../Vistas/Valoracion/Insertado.php";
        }else{
            require "../Vistas/Valoracion/NoInsertado.php";
        } 
    }
    public function LlistaValoraciones(){

        $Llistat = $this->retornaValoracionesTodos();
        require "../Vistas/valoracion/verValoracion.php";
    }

    public function MuestraModificarValoracion($id){

        header("location: ../Vistas/Valoracion/modificarValoracion.php?id=$id"); 
    }
    public function ModificarValoracio($id, $cliente, $tienda, $nivel, $puntuacion, $comentario){

        $this->id_valoracion = $id;
        $this->id_cliente = $cliente;
        $this->id_tienda = $tienda;
        $this->nivel = $nivel;

        $this->puntuacion = $puntuacion;
        $this->comentario = $comentario;

        $this->resultadoModificaValoracion($this->modificaValoracion());
    }
    public function resultadoModificaValoracion($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="
                    <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>Valoración Modificada</h1>
                    <div>";
        }else{
            $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La Valoración NO se ha podido Modificar</h1>
            <div>";
            
        } 
        header("location: ../index.php");
    }



}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    $Valoracion = new ValoracionesController();

    $id_cliente = 4;    /**** ATENCIO-MILLORAR::  id_cliente, = l'ha de saber! = SESSION/GETs */
    $id_tienda = 1;  /**** ATENCIO-MILLORAR::  id_tienda, = l'ha de saber! = SESSION/GETs */

    /**ATENCIO-MILLORAR:  nivel = CALCULAR!!! */ 
    $nivel = 1;  //aqui, exemple

        
    $Valoracion->leeInfoValoracion(
                    $id_cliente,
                    $id_tienda,
                    $nivel,
                    $_POST["puntuacion"],
                    $_POST["comentario"]
                );
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new ValoracionesController();
    $objecte->LlistaValoraciones();
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    $objecte = new ValoracionesController();
    $objecte->MuestraModificarValoracion($_GET["valoracion"]);
}
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    $objecte = new ValoracionesController();
    
    $id_cliente = 4;    /**** ATENCIO-MILLORAR::  id_cliente, = l'ha de saber! = SESSION/GETs */
    $id_tienda = 1;  /**** ATENCIO-MILLORAR::  id_tienda, = l'ha de saber! = SESSION/GETs */

    /**ATENCIO-MILLORAR:  nivel = CALCULAR!!! */ 
    $nivel = 1;  //aqui, exemple

    $objecte->ModificarValoracio(
                    $_POST["id"],
                    $id_cliente,
                    $id_tienda,
                    $nivel,
                    $_POST["puntuacion"],
                    $_POST["comentario"]
                );

}




?>