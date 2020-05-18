<?php

require_once "../Modelos/Valoracion.php";


//GP
require_once "../Controladores/SesionesController.php";
$objecteControlaSessio = new SesionesController();

class ValoracionesController extends Valoracion{

    public function leeInfoValoracion($cliente, $tienda, $nivel, $puntuacion, $comentario){     
        //solo 1 valoracion
        if (($_SESSION["NumeroValoraciones"] = $this->buscaCuantasValoracionesTiene($cliente, $tienda))==0){
            $this->resultadoRegistraValoracion($this->registraValoracion($cliente, $tienda, $nivel, $puntuacion, $comentario));
        }else{
            $_SESSION["ExcedeValoraciones"]="<< Lo sentimos, pero Ya realizó una valoración de la tienda! Gracias por confiar en nosotros >>";
            header("location: ../Vistas/Valoracion/insertarValoracion.php");
        }

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

    public function LlistaValoracionesAprobar($administrador){
        require_once "TiendasController.php";
        $tiendas = new TiendasController();
        $conjuntDeTendes=$tiendas->buscaTiendasDeAdmin($administrador);

        $valoraciones= Array();
        foreach($conjuntDeTendes as $tendes){
            array_push($valoraciones, $this->retornaValoracionTienda($tendes->id_tienda));
        }

        $valoraciones = json_encode($valoraciones);
        require "../Vistas/valoracion/verValoracionAdministrador.php";
    }

    public function MuestraModificarValoracion($id, $cliente, $tienda){
        $this->id_cliente = $cliente;
        $this->id_tienda = $tienda;
        $retorna = $this->retornaIdUsuariodel($this->id_cliente);
        foreach ($retorna as $idUsuari){}
            
        header("location: ../Vistas/Valoracion/modificarValoracion.php?id=$id&usuario=$idUsuari->id_usuario&tienda=$tienda");
    }
    public function ModificarValoracio($id, $cliente, $tienda, $nivel, $puntuacion, $comentario){
        $this->resultadoModificaValoracion($this->modificaValoracion($id, $cliente, $tienda, $nivel, $puntuacion, $comentario));
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

     public function apruebaValoracion($valoracion, $cliente){
        $resultat = $this->aprueba($valoracion, $cliente);
        if ($resultat){
            echo "VALORACION APROBADA";
        }else{
            echo "NO SE PUDO APROBAR";
        }
     }
     
     public function eliminaValoracion($valoracion, $cliente){
        require_once "ClientesController.php";
        $client = new ClientesController();
        $valoracionesCliente = $client->CuantasValoracionesCliente($cliente)-1;

        $resultat = $this->elimina($valoracion, $cliente, $valoracionesCliente);
        if ($resultat){
            echo "VALORACION ELIMINADA";
        }else{
            echo "NO SE PUDO ELIMINAR";
        }
     }





     public function LlistavaloracionesAprobadas(){
        $Llistat = $this->ListaValoracionesAprobada();
        require "../Vistas/valoracion/verValoracion.php";
     }

     //AZ
    public function LlistavaloracionesAprobadasTienda($idtienda){
        $Llistat = $this->ListaValoracionesAprobadasTienda($idtienda);
        require "../Vistas/valoracion/tienda-valoraciones.php";
     }
    public function obtieneCantValoracionesAprobadas($idtienda){
        return $this->buscaCantValoracionesAprobadas($idtienda);
    }
    public function consultaValoracionClienteTienda($idcliente,$idtienda){
        return $this->cantValoracionClienteTienda($idcliente,$idtienda);
    }
    public function Llistavaloracionespor($idcliente){
        $Llistat = $this->ListaValoracionesPor($idcliente);
        require "../Vistas/valoracion/cliente-valoraciones.php";
    }

    public function obtenNumeroValoracionesDel($idcliente){
        return $valor = $this->calculaNumeroValoracionesDel($idcliente);
     }

     public function obteNivell($idCliente){
        $numerovaloraciones = $this->obtenNumeroValoracionesDel($idCliente);
        require_once "ClientesController.php";
        $objecteCliente = new ClientesController();
        $tiempo = $objecteCliente->obtenTiempo($idCliente);

        return $nivell = $this->retornaNivell($tiempo, $numerovaloraciones);
     }


}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="insertarV"){
    if (isset($_SESSION["id_cliente"]) && isset($_POST["puntuacion"]) && isset($_POST["comentario"])){
        $valoracion = new ValoracionesController();
        $id_tienda = $_POST["tienda"];  /**** */
        $id_nivel = $valoracion->obteNivell($_SESSION["id_cliente"]);
        $valoracion->leeInfoValoracion($_SESSION["id_cliente"],$id_tienda,$id_nivel,$_POST["puntuacion"],$_POST["comentario"]);
    }
    else{
        $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>Operación no posible. Faltan datos!</h1>
            <div>";
        header("location: ../../index.php");
    }
    
}



if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new ValoracionesController();
    $objecte->LlistaValoraciones();
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="verAprobadas"){
    $objecte = new ValoracionesController();
    $objecte->LlistavaloracionesAprobadas();
}






if(isset($_GET["operacio"]) && $_GET["operacio"]=="verAprobar"){
    $objecte = new ValoracionesController();
    if (isset($_SESSION["login"]) && $_SESSION["login"]==true){
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]=="Administrador"){
            $objecte->LlistaValoracionesAprobar($_SESSION["id_administrador"]);
        }
        else{
            $_SESSION["Denegado"]="No tiene acceso al módulo de revisar las Valoraciones!!";
            header ("location: ../index.php");
        }
    }else{
        header("location: ../formLoginPrueba.php");
    }
    
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    $objecte = new ValoracionesController();
    $objecte->MuestraModificarValoracion($_GET["valoracion"], $_GET["cliente"], $_GET["tienda"]);
}


if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    if (isset($_SESSION["id_usuario"]) && isset($_POST["id"]) && isset($_POST["tienda"]) && isset($_SESSION["id_cliente"]) && isset($_POST["puntuacion"]) && isset($_POST["comentario"])){
        $id_cliente = $_SESSION["id_usuario"];    /**** */
        $id_tienda = $_POST["tienda"];  /**** */
        $id_nivel = $objecte->obteNivell($_SESSION["id_cliente"]);

        $objecte = new ValoracionesController();
        $objecte->ModificarValoracio($_POST["id"],$id_cliente,$id_tienda,$id_nivel,$_POST["puntuacion"],$_POST["comentario"]);
    }else{
        $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>Operación no posible. Faltan datos!</h1>
            <div>";
        header("location: ../../index.php");
    }
    

}




if(isset($_GET["aprobarValoracion"]) && isset($_GET["cliente"])){
    $objecte = new ValoracionesController();
    $objecte->apruebaValoracion($_GET["aprobarValoracion"],$_GET["cliente"]);
}



if(isset($_GET["eliminarValoracion"]) && isset($_GET["cliente"])){
    $objecte = new ValoracionesController();
    $objecte->eliminaValoracion($_GET["eliminarValoracion"], $_GET["cliente"]);
}

?>