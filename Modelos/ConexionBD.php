<?php

    //require "Config.php";

    class ConexionBD {
        private $conexionBD;

        public function __construct() {

            try{
                //$this->conexionBD = new PDO('mysql:host=localhost; dbname=cc_glories', 'root', '');
                $this->conexionBD = new PDO('mysql:host=sql313.epizy.com;dbname=epiz_25892821_p9glories','epiz_25892821','zgSTx73BBM');
                $this->conexionBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexionBD->exec("SET CHARACTER SET utf8");
                return $this->conexionBD;
            }catch(Exception $exepcio) {
                echo "<<<< ATENCIÓN >>>>  - ERROR: No se ha podido conectar con la Base de datos porque:<br><br>";
                echo $exepcio->getMessage();


            }

        }

        public function getConexionBD()
        {
                return $this->conexionBD;
        }
    }

?>