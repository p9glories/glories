<?php
    
    require "ConexionBD.php";

class Nivel{
    protected $id_nivel;
    protected $nombre;
    

    protected function registraNivel($nombre){
        $this->setNombre($nombre);
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlUsuario = "INSERT INTO niveles (id_nivel, nombre) 
                    VALUES (null, :nombre)";
            $resultado = $conecta->getConexionBD()->prepare($sqlUsuario);
            $resultado->execute(array(
                                    ":nombre" => $this->getNombre()
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
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

    protected function modificaNivel($id, $nombre){
        $this->setId_nivel($id);
        $this->setNombre($nombre);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE niveles
                                    SET nombre = $this->getNombre()
                                    WHERE id_nivel = $this->getId_nivel()";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;  
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return $excepcio->getMessage();  
        }
    }


    public function getId_nivel()
    {
        return $this->id_nivel;
    }

    public function setId_nivel($id_nivel)
    {
        $this->id_nivel = $id_nivel;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}


?>