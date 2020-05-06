<?php
    
    require "ConexionBD.php";

class Valoracion{
    protected $id_valoracion;
    protected $puntuacion;
    protected $comentario;
    protected $aprobado;
    protected $fecha;
    protected $nivel;

    protected $id_cliente; /**** */
    protected $id_tienda; /**** */
    

    protected function registraValoracion(){
        
        $this->aprobado = 0;  //por defecto, NO queda aprobado hasta validar!!
        $this->fecha = date("Y-m-d H:i:s");
       
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlValoracion = "INSERT INTO valoraciones (id_valoracion, id_cliente, id_tienda, puntuacion, comentario, aprobado, fecha, nivel) 
                    VALUES (null, :id_cliente, :id_tienda, :puntuacion, :comentario, :aprobado, :fecha, :nivel) ";
            $resultado = $conecta->getConexionBD()->prepare($sqlValoracion);
            $resultado->execute(array(
                                    ":id_cliente" => $this->id_cliente,
                                    ":id_tienda" => $this->id_tienda,
                                    ":puntuacion" => $this->puntuacion,
                                    ":comentario" => $this->comentario,
                                    ":aprobado" => $this->aprobado,
                                    ":fecha" => $this->fecha,
                                    ":nivel" => $this->nivel
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
        
    }


    protected function retornaValoracionesTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM valoraciones";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }


    protected function modificaValoracion(){
        
        $this->aprobado = 0;  //por defecto, NO queda aprobado hasta validar!!
        $this->fecha = date("Y-m-d H:i:s");

        //$this->fecha = "2020-05-02";
       
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlValoracion = "UPDATE valoraciones
                                    SET id_cliente = '$this->id_cliente',
                                        id_tienda = '$this->id_tienda',
                                        puntuacion = :puntuacion, 
                                        comentario = :comentario,
                                        aprobado = '$this->aprobado',
                                        fecha = '$this->fecha',
                                        nivel = :nivel
                                        WHERE id_valoracion = '$this->id_valoracion'";
            $resultado = $conecta->getConexionBD()->prepare($sqlValoracion);
            $resultado->execute(array(
                                    ":puntuacion" => $this->puntuacion,
                                    ":comentario" => $this->comentario,
                                    ":nivel" => $this->nivel
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
        
    }





    
}


?>