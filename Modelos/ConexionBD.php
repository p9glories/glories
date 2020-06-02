<?php

    //require "Config.php";

    class ConexionBD {
        private $conexionBD;

        public function __construct() {

            try{
                $this->conexionBD = new PDO('mysql:host=localhost; dbname=cc_glories', 'root', '');
                //$this->conexionBD = new PDO('mysql:host=localhost;dbname=id13923357_ccglories','id13923357_glories2020','Xu4Uv]v4YgKiWf/W');
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