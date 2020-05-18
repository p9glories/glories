<?php
    
    require_once "ConexionBD.php";

class Valoracion{
    protected $id_valoracion;
    protected $puntuacion;
    protected $comentario;
    protected $aprobado;
    protected $fecha;
    protected $nivel;

    protected $id_cliente; /**** */
    protected $id_tienda; /**** */
    
    public function __construct(){
        $this->setId_valoracion(null);
        $this->setPuntuacion(null);
        $this->setComentario(null);
        $this->setAprobado(0); //==NO: por defecto, NO queda aprobado hasta validar!!
        $this->setFecha(date("Y-m-d H:i:s"));
        $this->setNivel(0);
        $this->setId_cliente(0);
        $this->setId_tienda(0);
    }

    protected function registraValoracion($cliente, $tienda, $nivel, $puntuacion, $comentario){
        $this->setId_cliente($cliente);
        $this->setId_tienda($tienda);
        $this->setNivel($nivel);
        $this->setPuntuacion($puntuacion);
        $this->setComentario($comentario);
       
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlValoracion = "INSERT INTO valoraciones (id_valoracion, id_cliente, id_tienda, puntuacion, comentario, aprobado, fecha, nivel) 
                    VALUES (null, :id_cliente, :id_tienda, :puntuacion, :comentario, :aprobado, :fecha, :nivel) ";
            $resultado = $conecta->getConexionBD()->prepare($sqlValoracion);
            $resultado->execute(array(
                                    ":id_cliente" => $this->getId_cliente(),
                                    ":id_tienda" => $this->getId_tienda(),
                                    ":puntuacion" => $this->getPuntuacion(),
                                    ":comentario" => $this->getComentario(),
                                    ":aprobado" => $this->getAprobado(),
                                    ":fecha" => $this->getFecha(),
                                    ":nivel" => $this->getNivel()
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return $excepcio->getMessage();
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

    
    protected function ListaValoracionesAprobada(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM valoraciones WHERE aprobado = 1";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    //AZ
    protected function ListaValoracionesAprobadasTienda($idtienda){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM valoraciones  
                                INNER JOIN clientes
                                        ON valoraciones.id_cliente=clientes.id_cliente 
                                INNER JOIN usuarios
                                        ON clientes.id_usuario=usuarios.id_usuario 
                                        WHERE aprobado = 1 AND id_tienda='$idtienda'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }
    //AZ
    protected function buscaCantValoracionesAprobadas($idtienda){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT COUNT(*) FROM valoraciones  
                                        WHERE aprobado = 1 AND id_tienda='$idtienda'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchColumn();
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return null;  
        }
    }
    // AZ
    protected function ListaValoracionesPor($idcliente){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM valoraciones
                                INNER JOIN tiendas
                                        ON valoraciones.id_tienda=tiendas.id_tienda
                                        WHERE id_cliente='$idcliente'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }
    


    
    protected function calculaNumeroValoracionesDel($cliente){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM valoraciones WHERE aprobado = 1 and id_cliente=$cliente";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
            $valoracio = 0;
            foreach($resultat as $objecte){
                $valoracio++;
            }
            return $valoracio;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }


    protected function retornaValoracionesTodosSegun($administrador){
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

    protected function retornaIdUsuariodel($cliente){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT id_usuario 
                                    FROM clientes
                                    WHERE id_cliente = $cliente";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    //AZ
    protected function cantValoracionClienteTienda($cliente,$tienda){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT count(*) valoraciones 
                                    FROM valoraciones
                                    WHERE id_cliente='$cliente' AND id_tienda='$tienda'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchColumn();
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    protected function buscaCuantasValoracionesTiene($cliente, $tienda){
        $this->setId_cliente($cliente);
        $this->setId_tienda($tienda);

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT count(*) valoraciones 
                                    FROM valoraciones
                                    WHERE id_cliente = :idCliente and id_tienda = :idTienda";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(
                            array( 
                                ":idCliente" => $this->getId_cliente(),
                                ":idTienda" => $this->getId_tienda()
                            )
            );
            return $resultat = $intencio->fetchColumn();
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }
    


    protected function modificaValoracion($id, $cliente, $tienda, $nivel, $puntuacion, $comentario){
        //$this->fecha = date("Y-m-d H:i:s");
        //$this->fecha = "2020-05-02";
        $this->setId_valoracion($id);
        $this->setId_cliente($cliente);
        $this->setId_tienda($tienda);
        $this->setNivel($nivel);
        $this->setPuntuacion($puntuacion);
        $this->setComentario($comentario);


        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlValoracion = "UPDATE valoraciones
                                    SET id_cliente = :id_cliente,
                                        id_tienda = :idTienda,
                                        puntuacion = :puntuacion, 
                                        comentario = :comentario,
                                        aprobado = :aprobado,
                                        fecha = now(),
                                        nivel = :nivel
                                        WHERE id_valoracion = :idValoracion";
            $resultado = $conecta->getConexionBD()->prepare($sqlValoracion);
            $resultado->execute(array(
                                    ":id_cliente" => $this->getId_cliente(),
                                    ":idTienda" => $this->getId_tienda(),
                                    ":aprobado" => $this->getAprobado(),
                                    ":idValoracion" => $this->getId_valoracion(),
                                    ":puntuacion" => $this->getPuntuacion(),
                                    ":comentario" => $this->getComentario(),
                                    ":nivel" => $this->getNivel()
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
        
    }


    protected function retornaValoracionTienda($tienda){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM valoraciones
                                        WHERE id_tienda= $tienda and aprobado = 0";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }


    protected function aprueba($valoracion, $cliente){

        require_once "../Controladores/ClientesController.php";
        $client = new ClientesController();
        
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlValoracion = "UPDATE valoraciones
                                    SET aprobado = 1
                                        WHERE id_valoracion = $valoracion";
            $resultado = $conecta->getConexionBD()->prepare($sqlValoracion);
            $resultado->execute();

            $client->mesValoracioCliente($cliente);
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
        
    }

  
    protected function elimina($idValoracion, $idCliente, $valoracionesFinal){
        require_once "../Controladores/ClientesController.php";
        $cliente = new ClientesController();

        $this->setId_valoracion($idValoracion);

        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $cliente->actualizaValoracionesCliente($idCliente, $valoracionesFinal);
            $sqlValoracion = "DELETE FROM valoraciones
                                        WHERE id_valoracion = :idValoracion";
            $resultado = $conecta->getConexionBD()->prepare($sqlValoracion);
            $resultado->execute(array(":idValoracion" => $this->getId_valoracion()));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
        
    }




    
    protected function retornaNivell($tiempo, $valoraciones){

        if ($tiempo<6){   //independientemente de numero de valoraciones
            $this->setNivel(2);   //2- Principiante
        }

        if ($tiempo>=6 && $tiempo<24){
            if(($valoraciones>=25 && $valoraciones<50) || $valoraciones>=50){
                $this->setNivel(3);   //3- intermedio
            }else{
                $this->setNivel(2);   //2- Principiante
            }
        }

        if ($tiempo>=24){
            if($valoraciones>=50){
                $this->setNivel(4);   //4- avanzado
            }else{
                if($valoraciones>=25 && $valoraciones<50){
                    $this->setNivel(3);   //3- intermedio
                }else{
                    $this->setNivel(2);   //2- Principiante
                }
            }
        }

       return $this->getNivel();
    }


 
    public function getId_valoracion()
    {
        return $this->id_valoracion;
    }

 
    public function setId_valoracion($id_valoracion)
    {
        $this->id_valoracion = $id_valoracion;

        return $this;
    }

    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

 
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getAprobado()
    {
        return $this->aprobado;
    }

    public function setAprobado($aprobado)
    {
        $this->aprobado = $aprobado;

        return $this;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getNivel()
    {
        return $this->nivel;
    }


    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }

    public function getId_tienda()
    {
        return $this->id_tienda;
    }

    public function setId_tienda($id_tienda)
    {
        $this->id_tienda = $id_tienda;

        return $this;
    }
}


?>