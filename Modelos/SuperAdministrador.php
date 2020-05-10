<?php
    
    require_once "ConexionBD.php";

class SuperAdministrador{
    protected $id_usuario;
    protected $email;
    protected $password;
    protected $nombre;
    protected $apellidos;
    protected $telefono;
    protected $newsletter;

    protected $id_superadmin;
    
    protected function registraSuperAdministrador($email, $password, $nombre, $apellidos, $telefono, $newsletter){
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
                       
            $sqlSuperAdministrador = "INSERT INTO superadministradores (id_superadmin, id_usuario) 
                        VALUES (null, :id_usuario)";
            $resultado = $conecta->getConexionBD()->prepare($sqlSuperAdministrador);
            $resultado->execute(array(
                            ":id_usuario" => $idInsertado
                        ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false;  
        }
    }

    protected function retornaSuperAdministradoresTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            //$sentenciaSQL = "SELECT * FROM Administradores";
            $sentenciaSQL = "SELECT * FROM usuarios
                                        INNER JOIN superadministradores 
                                        ON superadministradores.id_usuario=usuarios.id_usuario";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback(); 
            return null;  
        }
    }


    protected function buscaSuperAdministrador($id){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT id_superadmin 
                                FROM superadministradores
                                        WHERE id_usuario = '$id'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
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


    public function getId_superadmin()
    {
        return $this->id_superadmin;
    }

   
    public function setId_superadmin($id_superadmin)
    {
        $this->id_superadmin = $id_superadmin;

        return $this;
    }
}


?>