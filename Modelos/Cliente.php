<?php
    
    require "ConexionBD.php";

class Cliente{
    protected $id_usuario;
    protected $email;
    protected $password;
    protected $nombre;
    protected $apellidos;
    protected $telefono;
    protected $newsletter;

    protected $id_cliente;
    //protected $id_usuario; /**** */
    //protected $id_nivel; /**** */
    protected $alta;
    protected $valoraciones;
    





    protected function registraCliente(){
        $this->id_nivel = 1; //novato, por defecto si es nuevo
        $this->alta = date("Y-m-d H:i:s");  //hoy
        $this->valoraciones = 0; //por defecto, si es nuevo
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlUsuario = "INSERT INTO usuarios (id_usuario, email, password, nombre, apellidos, telefono, newsletter) 
                    VALUES (null, :email, :password, :nombre, :apellidos, :telefono, :newsletter)";
            $resultado = $conecta->getConexionBD()->prepare($sqlUsuario);
            $resultado->execute(array(
                                    ":email" => $this->email,
                                    ":password" => $this->password,
                                    ":nombre" => $this->nombre,
                                    ":apellidos" => $this->apellidos,
                                    ":telefono" => $this->telefono,
                                    ":newsletter" => $this->newsletter
                                ));
            
            $idInsertado = $conecta->getConexionBD()->lastInsertId();
                       
            $sqlCliente = "INSERT INTO clientes (id_cliente, id_usuario, id_nivel, alta, valoraciones) 
                        VALUES (null, :id_usuario, :id_nivel, :alta, :valoraciones)";
            $resultado = $conecta->getConexionBD()->prepare($sqlCliente);
            $resultado->execute(array(
                            ":id_usuario" => $idInsertado,
                            ":id_nivel" => $this->id_nivel,
                            ":alta" => $this->alta,
                            ":valoraciones" => $this->valoraciones
                        ));
            $conecta->getConexionBD()->commit();  //executa l'Insert
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  //NO insertarà 
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
            $conecta->getConexionBD()->rollback();  //NO insertarà 
            return null;  
        }
    }

    




}


?>