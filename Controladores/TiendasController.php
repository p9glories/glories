<?php

require_once "../Modelos/Tienda.php";
//GP
require_once "../Controladores/SesionesController.php";
$objecteControlaSessio = new SesionesController();

class TiendasController extends Tienda{

    public function leeInfoTienda($admin, $categoria, $nombre, $descripcion, $logo, $horario, $telefono, $ubicacion, $foto1, $foto2, $foto3){
    
        $this->id_admin = $admin;
        $this->id_categoria = $categoria;
       $this->nombre = $nombre;
       $this->descripcion = $descripcion;
       $this->logo = $logo;
       $this->horario = $horario;
       $this->telefono = $telefono;
       $this->ubicacion = $ubicacion;
       $this->foto1 = $foto1;
       $this->foto2 = $foto2;
       $this->foto3 = $foto3;
       
       echo $this->registraTienda();
       $this->resultadoRegistraTienda($this->registraTienda());
    }

    public function resultadoRegistraTienda($resultat){
        if ($resultat){
            require "../Vistas/Tienda/Insertado.php";
        }else{
            require "../Vistas/Tienda/NoInsertado.php";
        } 
    }

    public function LlistaTiendas(){

        $Llistat = $this->retornaTiendasTodas();
        require "../Vistas/Tienda/verTienda.php";
    }

    public function LlistaTiendasTODOTodas(){

        $Llistat = $this->retornaTiendasTODOTodas();
        require "../Vistas/Tienda/verTiendaTODO.php";
    }


    public function MuestraModificarTienda($id){

        header("location: ../Vistas/Tienda/modificarTienda.php?id=$id"); 
    }
    public function ModificarTienda($id, $admin, $categoria, $nombre, $descripcion, $logo, $horario, $telefono, $ubicacion, $foto1, $foto2, $foto3){

        $this->id_admin = $admin;
        $this->id_categoria = $categoria;
        $this->id_tienda = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->logo = $logo;
        $this->horario = $horario;
        $this->telefono = $telefono;
        $this->ubicacion = $ubicacion;
        $this->foto1 = $foto1;
        $this->foto2 = $foto2;
        $this->foto3 = $foto3;

        $this->resultadoModificaTienda($this->modificaTienda());
    }
    public function resultadoModificaTienda($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="
                    <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>Tienda Modificada</h1>
                    <div>";
        }else{
            $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La Tienda NO se ha podido Modificar</h1>
            <div>";
            
        } 
        header("location: ../index.php");
    }







}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    $nuevoObjeto = new TiendasController();

    $id_admin = 1;   //$_POST
    $id_categoria = 1;  //$_POST

    $nuevoObjeto->leeInfoTienda(
                    $id_admin,
                    $id_categoria,
                    $_POST["nombre"],
                    $_POST["descripcion"],
                    $_POST["logo"],
                    $_POST["horario"],
                    $_POST["telefono"],
                    $_POST["ubicacion"],
                    $_POST["foto1"],
                    $_POST["foto2"],
                    $_POST["foto3"]
                );
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new TiendasController();
    $objecte->LlistaTiendas();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="verTODO"){
    $objecte = new TiendasController();
    $objecte->LlistaTiendasTODOTodas();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    $objecte = new TiendasController();
    $objecte->MuestraModificarTienda($_GET["tienda"]);
}
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    $objecte = new TiendasController();
    $id_admin = 1;   //$_POST
    $id_categoria = 1;  //$_POST
    $objecte->ModificarTienda(
                $_POST["id"],
                $id_admin,
                $id_categoria,
                $_POST["nombre"],
                $_POST["descripcion"],
                $_POST["logo"],
                $_POST["horario"],
                $_POST["telefono"],
                $_POST["ubicacion"],
                $_POST["foto1"],
                $_POST["foto2"],
                $_POST["foto3"]
                );

}




?>