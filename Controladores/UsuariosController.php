<?php

require "../Modelos/Usuario.php";

class UsuariosController extends Usuario{

    public function LeeInfoUsuario($email, $password, $nombre, $apellidos, $telefono, $newsletter){
       $this->email = $email;
       $this->password = $password;
       $this->nombre = $nombre;
       $this->apellidos = $apellidos;
       $this->telefono = $telefono;
       $this->newsletter = $newsletter;

       $this->ResultadoRegistraUsuario($this->registraUsuario());
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

    
}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    $Usuario = new UsuariosController();
    $Usuario->LeeInfoUsuario(
                    $_POST["email"],
                    $_POST["password"],
                    $_POST["nombre"],
                    $_POST["apellidos"],
                    $_POST["telefono"],
                    $_POST["newsletter"]
                );
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new UsuariosController();
    $objecte->LlistaUsuarios();
}





?>