<?php

require_once "../Modelos/Categoria.php";
//GP
require_once "../Controladores/SesionesController.php";
$objecteControlaSessio = new SesionesController();

class CategoriasController extends Categoria{

    public function leeInfoCategoria($nombre, $icono){
       $this->nombre = $nombre;
       $this->icono = $icono; /** */

       $this->resultadoRegistraCategoria($this->registraCategoria());
    }

    public function resultadoRegistraCategoria($resultat){
        if ($resultat){
            require "../Vistas/Categoria/Insertado.php";
        }else{
            require "../Vistas/Categoria/NoInsertado.php";
        } 
    }

    public function LlistaCategorias(){

        $Llistat = $this->retornaCategoriasTodos();
        require "../Vistas/Categoria/verCategoria.php";
    }

    public function MuestraModificarCategoria($id){

        header("location: ../Vistas/Categoria/modificarCategoria.php?id=$id"); 
    }
    public function ModificarCategoria($id, $nombre, $icono){

        $this->id_categoria = $id;
        $this->nombre = $nombre;
        $this->icono = $icono;

        $this->resultadoModificaCategoria($this->modificaCategoria());
    }
    public function resultadoModificaCategoria($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="
                    <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>Categoria Modificada</h1>
                    <div>";
        }else{
            $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La Categoria NO se ha podido Modificar</h1>
            <div>";
            
        } 
        header("location: ../index.php");
    }


}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    $Categoria = new CategoriasController();

    $icono = $_POST["icono"];  /** ATENCIO: IMATGE */
    $Categoria->leeInfoCategoria(
                    $_POST["nombre"],
                    $icono
                );
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $Categoria = new CategoriasController();
    $Categoria->LlistaCategorias();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    $objecte = new CategoriasController();
    $objecte->MuestraModificarCategoria($_GET["categoria"]);
}
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    $objecte = new CategoriasController();
    
    $icono = $_POST["icono"];  /** ATENCIO: IMATGE */
    $objecte->ModificarCategoria(
                    $_POST["id"],
                    $_POST["nombre"],
                    $icono
                );
}




?>