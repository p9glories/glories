<?php

require_once "../Modelos/Cliente.php";

class ClientesController extends Cliente{

    public function leeInfoCliente($email, $password, $nombre, $apellidos, $telefono, $newsletter){
       $this->resultadoRegistraCliente($this->registraCliente($email, $password, $nombre, $apellidos, $telefono, $newsletter));
    }

    public function resultadoRegistraCliente($resultat){
        if ($resultat){
            require "../Vistas/Cliente/Insertado.php";
        }else{
            require "../Vistas/Cliente/NoInsertado.php";
        } 
    }

    public function LlistaClientes(){
        $Llistat = $this->retornaClientesTodos();
        require "../Vistas/Cliente/verCliente.php";
    }


    public function BuscaIdClienteDel($usuario){
        foreach($this->retornaIdClientedel($usuario) as $client){}
            return $client->id_cliente;
    }


    public function obtenTiempo($id){
        require_once "ValoracionesController.php";
        $objecteValoraciones = new ValoracionesController();
        return $nivel = $this->calculaTiempo($id);
    }
    

    public function CuantasValoracionesCliente($id){
        return $this->obtieneValoracionesCliente($id);
    }

    
    public function actualizaValoracionesCliente($id, $valoraciones){
        return  $this->restaValoracionesCliente($id, $valoraciones);
    }

    public function mesValoracioCliente($id){
        return  $this->afegeixValoracioCliente($id);
    }

    //AZ
    public function infoCliente(){

        $Llistat = $this->retornaCliente($_SESSION["id_usuario"]);

        if (file_exists("../Vistas/Cliente/cliente-perfil.php")){
            require_once "../Vistas/Cliente/cliente-perfil.php";
        }
        else if (file_exists("../../Vistas/Cliente/cliente-perfil.php")){
            require_once "../../Vistas/Cliente/cliente-perfil.php";
        }

    }

    //AZ
    public function mostrarModificarCliente(){

        $Llistat = $this->retornaCliente($_SESSION["id_usuario"]);

        if (file_exists("../Vistas/Cliente/cliente-modificar.php")){
            require_once "../Vistas/Cliente/cliente-modificar.php";
        }
        else if (file_exists("../../Vistas/Cliente/cliente-modificar.php")){
            require_once "../../Vistas/Cliente/cliente-modificar.php";
        }

    }

}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $Cliente = new ClientesController();
        $Cliente->leeInfoCliente($email,$password,$_POST["nombre"],$_POST["apellidos"],$_POST["telefono"],$_POST["newsletter"]);
    }else{
        $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La operación NO se ha podido realizar. Tiene que introducir más datos!</h1>
            <div>";
        header("location: ../../index.php");
    }
}


if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new ClientesController();
    $objecte->LlistaClientes();
}






?>