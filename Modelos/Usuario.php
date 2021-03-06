<?php
    
    require "ConexionBD.php";

class Usuario{
    protected $id_usuario;
    protected $email;
    protected $password;
    protected $nombre;
    protected $apellidos;
    protected $telefono;
    protected $newsletter;


    
    public function __construct(){
        $this->setId_usuario(null);
        $this->setEmail(null);
        $this->setPassword(null);
        $this->setNombre(null);
        $this->setApellidos(null);
        $this->setTelefono(null);
        $this->setNewsletter(0);
    }

    protected function registraUsuario($email, $password, $nombre, $apellidos, $telefono, $newsletter){
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setTelefono($telefono);
        $this->setNewsletter($newsletter);

        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $SQL = "INSERT INTO usuarios (id_usuario, email, password, nombre, apellidos, telefono, newsletter) 
                    VALUES (null, :email, :password, :nombre, :apellidos, :telefono, :newsletter)";
            $resultado = $conecta->getConexionBD()->prepare($SQL);
            $resultado->execute(array(
                                    ":email" => $this->getEmail(),
                                    ":password" => $this->getPassword(),
                                    ":nombre" => $this->getNombre(),
                                    ":apellidos" => $this->getApellidos(),
                                    ":telefono" => $this->getTelefono(),
                                    ":newsletter" => $this->getNewsletter()
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return false; 
        }
    }

    protected function retornaUsuariosTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    protected function BuscaUsuariPerEmail($email, $paraula){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios
                                    WHERE email = :email";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(":email" => $email));
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    //AZ
    protected function modificarPassword($id, $password){
        $this->setPassword($password);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
                                    SET password = :password
                                    WHERE id_usuario = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":password" => $this->getPassword(),
            ));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();  
        }
    }

    //AZ
    protected function modificarCliente($id, $email, $nombre, $apellidos, $telefono, $newsletter){
        $this->setEmail($email);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setTelefono($telefono);
        $this->setNewsletter($newsletter);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
                                    SET  email = :email,
                                        nombre = :nombre,
                                        apellidos = :apellidos,
                                        telefono = :telefono,
                                        newsletter = :newsletter
                                    WHERE id_usuario = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":email" => $this->getEmail(),
                ":nombre" => $this->getNombre(),
                ":apellidos" => $this->getApellidos(),
                ":telefono" => $this->getTelefono(),
                ":newsletter" => $this->getNewsletter()
            ));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();  
        }
        
    }
    //AZ
    protected function modificarAdmin($id, $email, $nombre, $apellidos, $telefono){
        $this->setEmail($email);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setTelefono($telefono);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
                                    SET  email = :email,
                                        nombre = :nombre,
                                        apellidos = :apellidos,
                                        telefono = :telefono
                                    WHERE id_usuario = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":email" => $this->getEmail(),
                ":nombre" => $this->getNombre(),
                ":apellidos" => $this->getApellidos(),
                ":telefono" => $this->getTelefono(),
            ));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();  
        }
    }
        //AZ
    protected function modificarSuperadmin($id, $email, $nombre, $apellidos, $telefono){
        $this->setEmail($email);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setTelefono($telefono);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
                                    SET  email = :email,
                                        nombre = :nombre,
                                        apellidos = :apellidos,
                                        telefono = :telefono
                                    WHERE id_usuario = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":email" => $this->getEmail(),
                ":nombre" => $this->getNombre(),
                ":apellidos" => $this->getApellidos(),
                ":telefono" => $this->getTelefono(),
            ));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();  
        }
        
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

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

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

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

    public function getNewsletter()
    {
        return $this->newsletter;
    }

    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }
}


?>