<?php
    
    require_once "ConexionBD.php";

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
    

    protected function registraTienda($admin, $categoria, $nombre, $descripcion, $logo, $horario, $telefono, $ubicacion, $foto1, $foto2, $foto3){

        $this->setId_admin($admin);
        $this->setId_categoria($categoria);
        $this->setNombre($nombre);
        $this->setDescripcion($descripcion);
        $this->setLogo($logo);
        $this->setHorario($horario);
        $this->setTelefono($telefono);
        $this->setUbicacion($ubicacion);
        $this->setFoto1($foto1);
        $this->setFoto2($foto2);
        $this->setFoto3($foto3);

        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlTienda = "INSERT INTO tiendas (id_tienda, id_admin, id_categoria, nombre, descripcion, logo, horario, telefono, ubicacion, foto1, foto2, foto3) 
                    VALUES (null, :id_admin, :id_categoria, :nombre, :descripcion, :logo, :horario, :telefono, :ubicacion, :foto1, :foto2, :foto3) ";
            $resultado = $conecta->getConexionBD()->prepare($sqlTienda);
            $resultado->execute(array(
                                    ":id_admin" => $this->getId_admin(),
                                    ":id_categoria" => $this->getId_categoria(),
                                    ":nombre" => $this->getNombre(),
                                    ":descripcion" => $this->getDescripcion(),
                                    ":logo" => $this->getLogo(),
                                    ":horario" => $this->getHorario(),
                                    ":telefono" => $this->getTelefono(),
                                    ":ubicacion" => $this->getUbicacion(),
                                    ":foto1" => $this->getFoto1(),
                                    ":foto2" => $this->getFoto2(),
                                    ":foto3" => $this->getFoto3()
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

    //AZ Mostrar tiendas por categoria

    protected function retornaTiendasPorCategoria($categoria){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM tiendas WHERE id_categoria=$categoria ";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    //AZ Mostrar datos de tienda individual

    protected function retornaTienda($id){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM tiendas WHERE id_tienda=$id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    protected function retornaInfoPuntosTiendas($tenda){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT id_tienda, nivel,  SUM(puntuacion) AS puntos, COUNT(puntuacion) AS puntuaciones
                                FROM valoraciones
                                WHERE id_tienda = $tenda
                                GROUP BY id_tienda, nivel";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    protected function obtenTiendas(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT DISTINCT id_tienda
                                FROM tiendas
                                ORDER BY id_tienda ASC";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    protected function obtenPuntosTienda($info){

        $pt=0;
        $pes=0;
        $total=0;
        foreach($info as $dato){
            if ($dato[1]==1){ //CAP
                $pes=0;
            }
            if ($dato[1]==2){ //2-principiant
                $pes=16.5;
            }
            if ($dato[1]==3){ //intermig,
                $pes=33.5;
            }
            if ($dato[1]==4){  //avançat
                $pes=50;
            }
            $mitja = $dato[2]/$dato[3];  //puntstotals/numero_puntuacions
            $total = $total+$pes*$mitja;
        }
        return round($total/100, 1);
        
    }

    protected function retornaTiendasdelAdmin($administrador){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM Tiendas
                                    WHERE id_admin = $administrador";
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
                                    tiendas.descripcion,
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

    protected function modificaTienda($id, $admin, $categoria, $nombre, $descripcion, $logo, $horario, $telefono, $ubicacion, $foto1, $foto2, $foto3){
        $this->setId_tienda($id);
        $this->setId_admin($admin);
        $this->setId_categoria($categoria);
        $this->setNombre($nombre);
        $this->setDescripcion($descripcion);
        $this->setLogo(logo);
        $this->setHorario($horario);
        $this->setTelefono($telefono);
        $this->setUbicacion($ubicacion);
        $this->setFoto1($foto1);
        $this->setFoto2($foto2);
        $this->setFoto3($foto3);
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlTienda = "UPDATE tiendas
                                SET id_admin = $this->getId_admin(),
                                    id_categoria = $this->getId_categoria(),
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
                                    ":nombre" => $this->getNombre(),
                                    ":descripcion" => $this->getDescripcion(),
                                    ":logo" => $this->getLogo(),
                                    ":horario" => $this->getHorario(),
                                    ":telefono" => $this->getTelefono(),
                                    ":ubicacion" => $this->getUbicacion(),
                                    ":foto1" => $this->getFoto1(),
                                    ":foto2" => $this->getfoto2(),
                                    ":foto3" => $this->getfoto3()
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    public function getHorario()
    {
        return $this->horario;
    }

    public function setHorario($horario)
    {
        $this->horario = $horario;

        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    public function getFoto1()
    {
        return $this->foto1;
    }

    public function setFoto1($foto1)
    {
        $this->foto1 = $foto1;

        return $this;
    }

    public function getFoto2()
    {
        return $this->foto2;
    }

    public function setFoto2($foto2)
    {
        $this->foto2 = $foto2;

        return $this;
    }

    public function getFoto3()
    {
        return $this->foto3;
    }

    public function setFoto3($foto3)
    {
        $this->foto3 = $foto3;

        return $this;
    }

    public function getId_admin()
    {
        return $this->id_admin;
    }

    public function setId_admin($id_admin)
    {
        $this->id_admin = $id_admin;

        return $this;
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
}




?>