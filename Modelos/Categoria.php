<?php
    
    require "ConexionBD.php";

class Categoria{
    protected $id_categoria;
    protected $nombre;
    protected $icono;  /*** RUTA */
    

    protected function registraCategoria($nombre, $icono){
        $this->setNombre($nombre);
        $this->setIcono($icono);
        
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlUsuario = "INSERT INTO categorias (id_categoria, nombre, icono) 
                    VALUES (null, :nombre, :icono)";
            $resultado = $conecta->getConexionBD()->prepare($sqlUsuario);
            $resultado->execute(array(
                                    ":nombre" => $this->getNombre(),
                                    ":icono" => $this->getIcono()
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
        

    }

    protected function retornaCategoriasTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM categorias";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return null;  
        }
    }

    protected function modificaCategoria($id, $nombre, $icono){
        $this->setId_categoria($id);
        $this->setNombre($nombre);
        $this->setIcono($icono);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE categorias
                                    SET nombre = $this->getNombre(), icono = $this->getIcono()
                                    WHERE id_categoria = $this->getId_categoria()";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;  
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return $excepcio->getMessage();  
        }
    }


    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

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


    public function getIcono()
    {
        return $this->icono;
    }


    public function setIcono($icono)
    {
        $this->icono = $icono;

        return $this;
    }
}


?>