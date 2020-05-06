<?php
    
    require "ConexionBD.php";

class Nivel{
    protected $id_nivel;
    protected $nombre;
    

    protected function registraNivel(){

       
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlUsuario = "INSERT INTO niveles (id_nivel, nombre) 
                    VALUES (null, :nombre)";
            $resultado = $conecta->getConexionBD()->prepare($sqlUsuario);
            $resultado->execute(array(
                                    ":nombre" => $this->nombre
                                ));
            $conecta->getConexionBD()->commit();  //executa l'Insert
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  //NO insertarà 
            return false; 
        }
    }

    protected function retornaNivelesTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM niveles";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return null;  
        }
    }

    protected function modificaNivel(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE niveles
                                    SET nombre = '$this->nombre'
                                    WHERE id_nivel = '$this->id_nivel'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;  
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return $excepcio->getMessage();  
        }
    }

}


?>