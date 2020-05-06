<?php
    
    require "ConexionBD.php";

class Administrador{
    protected $id_usuario;
    protected $email;
    protected $password;
    protected $nombre;
    protected $apellidos;
    protected $telefono;
    protected $newsletter;

    protected $id_admin;
    
    protected function registraAdministrador(){
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlUsuario = "INSERT INTO usuarios (id_usuario, email, password, nombre, apellidos, telefono, newsletter) 
                    VALUES (null, :email, :password, :nombre, :apellidos, :telefono, :newsletter)";
            $resultado = $conecta->getConexionBD()->prepare($sqlUsuario);
            $resultado->execute(array(
                                    ":email" => $this->email,
                                    ":password" => $this->password,
                                    ":nombre" => $this->nombre,
                                    ":apellidos" => $this->apellidos,
                                    ":telefono" => $this->telefono,
                                    ":newsletter" => $this->newsletter
                                ));
            
            $idInsertado = $conecta->getConexionBD()->lastInsertId();
                       
            $sqlAdministrador = "INSERT INTO administradores (id_admin, id_usuario) 
                        VALUES (null, :id_usuario)";
            $resultado = $conecta->getConexionBD()->prepare($sqlAdministrador);
            $resultado->execute(array(
                            ":id_usuario" => $idInsertado
                        ));
            $conecta->getConexionBD()->commit();  //executa l'Insert
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  //NO insertarà 
            return false;  
        }
    }


    protected function retornaAdministradoresTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            //$sentenciaSQL = "SELECT * FROM Administradores";
            $sentenciaSQL = "SELECT * FROM Usuarios
                                        INNER JOIN Administradores 
                                        ON Administradores.id_usuario=Usuarios.id_usuario";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  //NO insertarà 
            return null;  
        }
    }






    
}


?>