<?php
    
    require "ConexionBD.php";

class Categoria{
    protected $id_categoria;
    protected $nombre;
    protected $icono;  /*** RUTA */
    

    protected function registraCategoria(){
        /** PROVAR icono */
        $this->icono = "ruta";

       
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlUsuario = "INSERT INTO categorias (id_categoria, nombre, icono) 
                    VALUES (null, :nombre, :icono)";
            $resultado = $conecta->getConexionBD()->prepare($sqlUsuario);
            $resultado->execute(array(
                                    ":nombre" => $this->nombre,
                                    ":icono" => $this->icono
                                ));
            $conecta->getConexionBD()->commit();  //executa l'Insert
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  //NO insertarà 
            return false; 
        }
        

    }

    protected function retornaCategoriasTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM Categorias";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return null;  
        }
    }

    protected function modificaCategoria(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE categorias
                                    SET nombre = '$this->nombre', icono = '$this->icono'
                                    WHERE id_categoria = '$this->id_categoria'";
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