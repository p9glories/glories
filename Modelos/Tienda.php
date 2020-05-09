<?php
    
    require "ConexionBD.php";

class Tienda{
    protected $id_tienda;
    protected $nombre;
    protected $descripcion;
    protected $logo;
    protected $horario;
    protected $telefono;
    protected $ubicacion;
    protected $foto1;
    protected $foto2;
    protected $foto3;

    protected $id_admin; /**** */
    protected $id_categoria; /**** */
    

    protected function registraTienda(){
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlTienda = "INSERT INTO tiendas (id_tienda, id_admin, id_categoria, nombre, descripcion, logo, horario, telefono, ubicacion, foto1, foto2, foto3) 
                    VALUES (null, :id_admin, :id_categoria, :nombre, :descripcion, :logo, :horario, :telefono, :ubicacion, :foto1, :foto2, :foto3) ";
            $resultado = $conecta->getConexionBD()->prepare($sqlTienda);
            $resultado->execute(array(
                                    ":id_admin" => $this->id_admin,
                                    ":id_categoria" => $this->id_categoria,
                                    ":nombre" => $this->nombre,
                                    ":descripcion" => $this->descripcion,
                                    ":logo" => $this->logo,
                                    ":horario" => $this->horario,
                                    ":telefono" => $this->telefono,
                                    ":ubicacion" => $this->ubicacion,
                                    ":foto1" => $this->foto1,
                                    ":foto2" => $this->foto2,
                                    ":foto3" => $this->foto3
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
    }

    protected function retornaTiendasTodas(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM tiendas";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    protected function retornaTiendasTODOTodas(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT tiendas.id_tienda, 
                                        tiendas.id_admin,
                                        administradores.id_usuario,
                                        usuarios.apellidos,
                                        tiendas.id_categoria, 
                                        categorias.nombre as nombreCategoria,  
                                    tiendas.nombre,
                                    tiendas.logo,
                                    tiendas.horario,
                                    tiendas.ubicacion,
                                    tiendas.foto1,
                                    tiendas.foto2,
                                    tiendas.foto3
                                    FROM tiendas 
                                        INNER JOIN categorias
                                        ON tiendas.id_categoria=categorias.id_categoria
                                        INNER JOIN administradores
                                        ON tiendas.id_admin=administradores.id_admin
                                        INNER JOIN usuarios
                                        ON administradores.id_usuario = usuarios.id_usuario";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    protected function modificaTienda(){
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlTienda = "UPDATE tiendas
                                SET id_admin = '$this->id_admin',
                                    id_categoria = '$this->id_categoria',
                                    nombre = :nombre, 
                                    descripcion = :descripcion,
                                    logo = :logo,
                                    horario = :horario,
                                    telefono = :telefono,
                                    ubicacion = :ubicacion,
                                    foto1 = :foto1,
                                    foto2 = :foto2,
                                    foto3 = :foto3
                                WHERE id_tienda = '$this->id_tienda'";
            $resultado = $conecta->getConexionBD()->prepare($sqlTienda);
            $resultado->execute(array(
                                    ":nombre" => $this->nombre,
                                    ":descripcion" => $this->descripcion,
                                    ":logo" => $this->logo,
                                    ":horario" => $this->horario,
                                    ":telefono" => $this->telefono,
                                    ":ubicacion" => $this->ubicacion,
                                    ":foto1" => $this->foto1,
                                    ":foto2" => $this->foto2,
                                    ":foto3" => $this->foto3
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
    }


    








}

//


?>