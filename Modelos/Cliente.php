<?php
    
    require_once "ConexionBD.php";

class Cliente{
    protected $id_usuario;
    protected $email;
    protected $password;
    protected $nombre;
    protected $apellidos;
    protected $telefono;
    protected $newsletter;

    protected $id_cliente;
    protected $id_nivel; /**** */
    protected $alta;
    protected $valoraciones;
    

    public function __construct(){
        $this->setId_usuario(null);
        $this->setEmail(null);
        $this->setPassword(null);
        $this->setNombre(null);
        $this->setApellidos(null);
        $this->setTelefono(null);
        $this->setNewsletter(0);
    }


    

    protected function registraCliente($email, $password, $nombre, $apellidos, $telefono, $newsletter){
        $this->setId_nivel(2); //novato, por defecto si es nuevo
        $this->setAlta(date("Y-m-d H:i:s"));  //hoy
        $this->setValoraciones(0); //por defecto, si es nuevo

        $this->setEmail($email);
        $this->setPassword($password);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setTelefono($telefono);
        $this->setNewsletter($newsletter);

        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlUsuario = "INSERT INTO usuarios (id_usuario, email, password, nombre, apellidos, telefono, newsletter) 
                    VALUES (null, :email, :password, :nombre, :apellidos, :telefono, :newsletter)";
            $resultado = $conecta->getConexionBD()->prepare($sqlUsuario);
            $resultado->execute(array(
                                    ":email" => $this->getEmail(),
                                    ":password" => $this->getPassword(),
                                    ":nombre" => $this->getNombre(),
                                    ":apellidos" => $this->getApellidos(),
                                    ":telefono" => $this->getTelefono(),
                                    ":newsletter" => $this->getNewsletter()
                                ));
            
            $idInsertado = $conecta->getConexionBD()->lastInsertId();
                       
            $sqlCliente = "INSERT INTO clientes (id_cliente, id_usuario, id_nivel, alta, valoraciones) 
                        VALUES (null, :id_usuario, :id_nivel, :alta, :valoraciones)";
            $resultado = $conecta->getConexionBD()->prepare($sqlCliente);
            $resultado->execute(array(
                            ":id_usuario" => $idInsertado,
                            ":id_nivel" => $this->getId_nivel(),
                            ":alta" => $this->getAlta(),
                            ":valoraciones" => $this->getValoraciones()
                        ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
    }


    protected function retornaClientesTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios
                                        INNER JOIN clientes 
                                        ON clientes.id_usuario=usuarios.id_usuario";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return null;  
        }
    }

    //AZ
    protected function retornaCliente($id){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios
                                        INNER JOIN clientes 
                                        ON clientes.id_usuario=usuarios.id_usuario
                                        WHERE clientes.id_usuario='$id'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return null;  
        }
    }

    protected function retornaIdClientedel($usuario){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT id_cliente 
                                    FROM clientes
                                    WHERE id_usuario = $usuario";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    protected function buscaCliente($cliente){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * 
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

    protected function obtieneValoracionesCliente($cliente){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT valoraciones 
                                    FROM clientes
                                    WHERE id_cliente = $cliente";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchColumn();
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    protected function calculaTiempo($id){
        $this->setId_cliente($id);
        $resultat = $this->buscaCliente($this->getId_cliente());

        foreach ($resultat as $objecte){}
        return $tiempo = $this->miraTiempo($objecte->alta);
    }

    protected function miraTiempo($fecha){
        $date1 = new DateTime($fecha);
        $date2 = new DateTime("now");
        $diff = $date1->diff($date2);
        $anys = $diff->y;
        $meses = $diff->m;

        if ($anys>0){
            $meses = $meses + 12*$anys;
        }

        return $meses;
    }

    protected function restaValoracionesCliente($id, $valoraciones){
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlValoracion = "UPDATE clientes
                                    SET valoraciones = $valoraciones
                                        WHERE id_cliente = $id";
            $resultado = $conecta->getConexionBD()->prepare($sqlValoracion);
            $resultado->execute();
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
    }
    
    protected function afegeixValoracioCliente($id){
        $valorAposar = $this->obtieneValoracionesCliente($id);

        $valorAposar = $valorAposar+1;
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlValoracion = "UPDATE clientes
                                    SET valoraciones = $valorAposar
                                        WHERE id_cliente = $id";
            $resultado = $conecta->getConexionBD()->prepare($sqlValoracion);
            $resultado->execute();
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
    }
   

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getNewsletter()
    {
        return $this->newsletter;
    }

    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function getAlta()
    {
        return $this->alta;
    }

    public function getValoraciones()
    {
        return $this->valoraciones;
    }

    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    public function setId_nivel($id_nivel)
    {
        $this->id_nivel = $id_nivel;

        return $this;
    }

    public function setAlta($alta)
    {
        $this->alta = $alta;

        return $this;
    }

    public function setValoraciones($valoraciones)
    {
        $this->valoraciones = $valoraciones;

        return $this;
    }

    public function getId_nivel()
    {
        return $this->id_nivel;
    }
}


?>