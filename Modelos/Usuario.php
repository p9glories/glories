<?php
    
    require "ConexionBD.php";

class Usuario{
    protected $id_usuario;
    protected $email;
    protected $password;
    protected $nombre;
    protected $apellidos;
    protected $telefono;
    protected $newsletter;


    protected function registraUsuario(){
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $SQL = "INSERT INTO usuarios (id_usuario, email, password, nombre, apellidos, telefono, newsletter) 
                    VALUES (null, :email, :password, :nombre, :apellidos, :telefono, :newsletter)";
            $resultado = $conecta->getConexionBD()->prepare($SQL);
            $resultado->execute(array(
                                    ":email" => $this->email,
                                    ":password" => $this->password,
                                    ":nombre" => $this->nombre,
                                    ":apellidos" => $this->apellidos,
                                    ":telefono" => $this->telefono,
                                    ":newsletter" => $this->newsletter
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return false; 
        }
    }

    protected function retornaUsuariosTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

}


?>