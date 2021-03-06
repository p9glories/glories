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
        require "../Vistas/Valoracion/verValoracion.php";
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
        require "../Vistas/Valoracion/verValoracionAdministrador.php";
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
            $_SESSION["mensajeResultado"]="Valoración modificada";
        }else{
            $_SESSION["mensajeResultado"]="La valoración no se ha podido modificar";
        } 
        header("location:../Vistas/cliente-valoraciones.php");
    }

     public function apruebaValoracion($valoracion, $cliente){
        $resultat = $this->aprueba($valoracion, $cliente);
        include '../Vistas/Includes/header_users.php';
        if ($resultat){
            echo '<div class="container mt-5 mb-5">';
            echo '<div class="row">';
            echo '<div class="col-12 text-center">';
            echo '<h3><b>Valoración <span class="c-orange">aprobada</span></b></h3>';
            echo '<a class="btn btn-success" href="javascript:history.go(-1)">Entendido</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }else{
            echo '<div class="container mt-5 mb-5">';
            echo '<div class="row">';
            echo '<div class="col-12 text-center">';
            echo '<h3><b>Lo sentimos, no se pudo aprobar</b></h3>';
            echo '</div>';
            echo '</div>';
        }
        include '../Vistas/Includes/footer.php';
     }
     
     public function eliminaValoracion($valoracion, $cliente){
        require_once "ClientesController.php";
        $client = new ClientesController();
        $valoracionesCliente = $client->CuantasValoracionesCliente($cliente)-1;

        $resultat = $this->elimina($valoracion, $cliente, $valoracionesCliente);
        include '../Vistas/Includes/header_users.php';
        if ($resultat){
            echo '<div class="container mt-5 mb-5">';
            echo '<div class="row">';
            echo '<div class="col-12 text-center">';
            echo '<h3><b>Valoración <span class="c-orange">eliminada</span></b></h3>';
            echo '<a class="btn btn-success" href="javascript:history.go(-1)">Entendido</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }else{
            echo '<div class="container mt-5 mb-5">';
            echo '<div class="row">';
            echo '<div class="col-12 text-center">';
            echo '<h3><b>Lo sentimos, no se pudo eliminar</b></h3>';
            echo '</div>';
            echo '</div>';
        }
        include '../Vistas/Includes/footer.php';
     }





     public function LlistavaloracionesAprobadas(){
        require_once "ClientesController.php";
        $Llistat = $this->ListaValoracionesAprobada();
        require "../Vistas/Valoracion/verValoracion.php";
     }

     //AZ
    public function LlistavaloracionesAprobadasTienda($idtienda){
        $Llistat = $this->ListaValoracionesAprobadasTienda($idtienda);
        if (file_exists("../Vistas/Valoracion/tienda-valoraciones.php")){
            require "../Vistas/Valoracion/tienda-valoraciones.php";
        }
     }
     //AZ
    public function LlistavaloracionesAprobadasAdmin(){
        $Llistat = $this->retornaValoracionesAprobadasSegun($_SESSION["id_administrador"]);
        if (file_exists("../Vistas/Valoracion/tienda-valoraciones-admin.php")){
            require "../Vistas/Valoracion/tienda-valoraciones-admin.php";
        }
     }
    public function obtieneCantValoracionesAprobadas($idtienda){
        return $this->buscaCantValoracionesAprobadas($idtienda);
    }
    public function consultaValoracionClienteTienda($idcliente,$idtienda){
        return $this->cantValoracionClienteTienda($idcliente,$idtienda);
    }
    public function Llistavaloracionespor($idcliente){
        $Llistat = $this->ListaValoracionesPor($idcliente);
        require "../Vistas/Valoracion/cliente-valoraciones.php";
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


if(isset($_GET["operacio"]) && $_GET["operacio"]=="verAprobadasAdmin"){
    $objecte = new ValoracionesController();
    $objecte->LlistavaloracionesAprobadasAdmin();
}



if(isset($_GET["operacio"]) && $_GET["operacio"]=="verAprobar"){
    $objecte = new ValoracionesController();
    if (isset($_SESSION["login"]) && $_SESSION["login"]==true){
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]=="Administrador"){
            $objecte->LlistaValoracionesAprobar($_SESSION["id_administrador"]);
        }
        else{
            $_SESSION["Denegado"]="No tiene acceso al módulo!!";
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
        $id_cliente = $_SESSION["id_cliente"];    /**** */
        $id_tienda = $_POST["tienda"];  /**** */
        
        $objecte = new ValoracionesController();
        $id_nivel = $objecte->obteNivell($_SESSION["id_cliente"]);
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