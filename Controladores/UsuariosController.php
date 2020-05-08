<?php
//GP
require_once "../Modelos/Usuario.php";
require_once "SesionesController.php";
$objecteSessio = new SesionesController();

class UsuariosController extends Usuario{

    public function LeeInfoUsuario($email, $password, $nombre, $apellidos, $telefono, $newsletter){
       $this->ResultadoRegistraUsuario($this->registraUsuario($email, $password, $nombre, $apellidos, $telefono, $newsletter));
    }

    public function ResultadoRegistraUsuario($resultat){
        if ($resultat){
            require "../Vistas/Usuario/Insertado.php";
        }else{
            require "../Vistas/Usuario/NoInsertado.php";
        } 
    }

    public function LlistaUsuarios(){

        $Llistat = $this->retornaUsuariosTodos();
        require "../Vistas/Usuario/verUsuario.php";
    }

    
    public function CheckejaUsuari($email, $paraula)
    {
        $dadesUsuari = $this->BuscaUsuariPerEmail($email, $paraula);
        if ($dadesUsuari != null){
            foreach ($dadesUsuari as $infoDelUsuari){}  //només n'hi ha 1
                
                if ($paraula == $infoDelUsuari->password){
                    $_SESSION["id_usuario"]=$infoDelUsuari->id_usuario;
                    $_SESSION["email"]=$infoDelUsuari->email;
                    $_SESSION["password"]=$infoDelUsuari->password;
                    $_SESSION["nombre"]=$infoDelUsuari->nombre;
                    $_SESSION["apellidos"]=$infoDelUsuari->apellidos;
                    $_SESSION["telefono"]=$infoDelUsuari->telefono;
                    $_SESSION["newsletter"]=$infoDelUsuari->newsletter;
                    $_SESSION["NoPermiso"]=null;
                    
                    //mira si es Client o Administrador:
                    require_once "AdministradoresController.php";
                    
                    $administrador = new AdministradoresController();
                    if ($administrador->buscaAdmin($infoDelUsuari->id_usuario)){
                        $_SESSION["rol"]="Administrador";
                        $_SESSION["id_administrador"]=$administrador->retornaIdAdminDel($infoDelUsuari->id_usuario);

                    }else{
                        require_once "SuperAdministradoresController.php";
                        $superAdministrador = new SuperAdministradoresController();
                        if ($superAdministrador->buscaSuperAdmin($infoDelUsuari->id_usuario)){
                            $_SESSION["rol"]="SuperAdministrador";
                        }else{
                            $_SESSION["rol"]="Cliente";
                            require_once "ClientesController.php";
                            $cliente = new ClientesController();
                            $_SESSION["id_cliente"]= $cliente->BuscaIdClienteDel($infoDelUsuari->id_usuario);
                        }
                    }

                    $_SESSION["login"]=true;
                    header("location: ../index.php");
                }
                else {
                    $_SESSION["mensajeLogin"]="<< Contraseña incorrecta >>";
                    header("location: ../index.php");
                }
        }else{
            $_SESSION["mensajeLogin"]="<< El usuario No existe! >>";
            header("location: ../index.php");
        }
    }
}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $Usuario = new UsuariosController();
        $Usuario->LeeInfoUsuario($email,$password,$_POST["nombre"],$_POST["apellidos"],$_POST["telefono"],$_POST["newsletter"]);
    }else{
        $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La operación NO se ha podido realizar. Tiene que introducir más datos!</h1>
            <div>";
        header("location: ../../index.php");
    }

}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new UsuariosController();
    $objecte->LlistaUsuarios();
}


if(isset($_POST["operacio"]) && $_POST["operacio"]=="login"){
    if (isset($_POST[""]) && isset($_POST[""])){
        $objecte = new UsuariosController();
        $objecte->CheckejaUsuari($_POST["email"], $_POST["password"]);
    }else{
        $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>Tiene que introducir Email y Password!</h1>
            <div>";
        header("location: ../../index.php");
    }
   
}



?>