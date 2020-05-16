<?php

if (file_exists("../Modelos/Tienda.php")){
    require_once "../Modelos/Tienda.php";
}else{
    require_once "../../Modelos/Tienda.php";
};
//GP
if (file_exists("../Controladores/SesionesController.php")){
    require_once "../Controladores/SesionesController.php";
}else{
    require_once "../../Controladores/SesionesController.php";
}

$objecteControlaSessio = new SesionesController();

class TiendasController extends Tienda{

    public function leeInfoTienda($admin, $categoria, $nombre, $descripcion, $logo, $horario, $telefono, $ubicacion, $foto1, $foto2, $foto3){
       $this->resultadoRegistraTienda($this->registraTienda($admin, $categoria, $nombre, $descripcion, $logo, $horario, $telefono, $ubicacion, $foto1, $foto2, $foto3));
    }

    public function resultadoRegistraTienda($resultat){
        if ($resultat){
            require "../Vistas/Tienda/Insertado.php";
        }else{
            require "../Vistas/Tienda/NoInsertado.php";
        } 
    }

    public function LlistaTiendas(){
        $informacioTendes = Array();
        $Llistat = Array();
        $PuntosTiendas = $this->calculaPuntosTiendas();   //tienda=>puntos
    
        $infoTenda = $this->retornaTiendasTodas();
        $i=1;
        foreach($infoTenda as $objecte){
            $informacioTendes["id_tienda"] = $objecte->id_tienda;
            $informacioTendes["id_admin"] = $objecte->id_admin;
            $informacioTendes["id_categoria"] = $objecte->id_categoria;
            $informacioTendes["nombre"] = $objecte->nombre;
            $informacioTendes["descripcion"] = $objecte->descripcion;
            $informacioTendes["logo"] = $objecte->logo;
            $informacioTendes["horario"] = $objecte->horario;
            $informacioTendes["ubicacion"] = $objecte->ubicacion;
            $informacioTendes["foto1"] = $objecte->foto1;
            $informacioTendes["foto2"] = $objecte->foto2;
            $informacioTendes["foto3"] = $objecte->foto3;
            $informacioTendes["estrellitas"] = $PuntosTiendas[$i]; 
            array_push($Llistat, $informacioTendes);
            $i++;
        }

      require "../Vistas/Tienda/verTienda.php";
    }

    public function selectTiendas(){
        return $this->retornaTiendasTodas();
    }

    public function LlistaTiendasTODOTodas(){
        $Llistat = $this->retornaTiendasTODOTodas();
        require "../Vistas/Tienda/verTiendaTODO.php";
    }

    //AZ Filtrar tiendas
    public function menuTiendas($id){    //id es CATEGORIA
        $informacioTendes = Array();
        $Llistat = Array();

        $infoTenda = $this->retornaTiendasPorCategoria($id);   //id CATEGORIA!!!!
        
        $i=1;
        foreach($infoTenda as $objecte){
            $informacioTendes["id_tienda"] = $objecte->id_tienda;
            $informacioTendes["id_admin"] = $objecte->id_admin;
            $informacioTendes["id_categoria"] = $objecte->id_categoria;
            $informacioTendes["nombre"] = $objecte->nombre;
            $informacioTendes["descripcion"] = $objecte->descripcion;
            $informacioTendes["logo"] = $objecte->logo;
            $informacioTendes["horario"] = $objecte->horario;
            $informacioTendes["ubicacion"] = $objecte->ubicacion;
            $informacioTendes["foto1"] = $objecte->foto1;
            $informacioTendes["foto2"] = $objecte->foto2;
            $informacioTendes["foto3"] = $objecte->foto3;
            $informacioTendes["estrellitas"] = $this->calculaPuntosTienda($informacioTendes["id_tienda"]); 
            array_push($Llistat, $informacioTendes);
            $i++;
        }

        require "../Vistas/Tienda/menuTienda.php";

    }

    public function MuestraModificarTienda($id){

        header("location: ../Vistas/Tienda/modificarTienda.php?id=$id"); 
    }
    public function ModificarTienda($id, $admin, $categoria, $nombre, $descripcion, $logo, $horario, $telefono, $ubicacion, $foto1, $foto2, $foto3){
        $this->resultadoModificaTienda($this->modificaTienda($id, $admin, $categoria, $nombre, $descripcion, $logo, $horario, $telefono, $ubicacion, $foto1, $foto2, $foto3));
    }

    public function resultadoModificaTienda($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="
                    <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>Tienda Modificada</h1>
                    <div>";
        }else{
            $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La Tienda NO se ha podido Modificar</h1>
            <div>";
            
        } 
        header("location: ../index.php");
    }

    public function buscaTiendasDeAdmin($administrador){
       return $this->retornaTiendasdelAdmin($administrador);
    }


    public function calculaPuntosTiendas(){
        $vector = Array();
        $resultat = Array();
        $tiendas = $this->obtenTiendas();  
        foreach($tiendas as $laTendaNum){
            foreach($laTendaNum as $tenda){
                $infoPuntosTiendas=$this->retornaInfoPuntosTiendas($tenda);
               foreach($infoPuntosTiendas as $objecte){   //id_tienda - nivel - puntos - NumeroPuntuaciones
                     array_push($vector, array($objecte->id_tienda, $objecte->nivel, $objecte->puntos, $objecte->puntuaciones));
               }
               $resultat[$tenda]=$this->obtenPuntosTienda($vector);
            }
        }
        return $resultat;

    }


    public function calculaPuntosTienda($tienda){
        $vector=array();
        $infoPuntosTiendas=$this->retornaInfoPuntosTiendas($tienda);
        foreach ($infoPuntosTiendas as $objecte){
            array_push($vector, array($objecte->id_tienda, $objecte->nivel, $objecte->puntos, $objecte->puntuaciones));
        }
        return $this->obtenPuntosTienda($vector);
    }
    


    
    //AZ Mostrar datos de tienda individualmente

    public function paginaTienda($id){
        $informacioTendes = Array();
        $Llistat = Array();

        $infoTenda = $this->retornaTienda($id);  //id CATEGORIA!!!!
        
        $i=1;
        foreach($infoTenda as $objecte){
            $informacioTendes["id_tienda"] = $objecte->id_tienda;
            $informacioTendes["id_admin"] = $objecte->id_admin;
            $informacioTendes["id_categoria"] = $objecte->id_categoria;
             $informacioTendes["telefono"] = $objecte->telefono;
            $informacioTendes["nombre"] = $objecte->nombre;
            $informacioTendes["descripcion"] = $objecte->descripcion;
            $informacioTendes["logo"] = $objecte->logo;
            $informacioTendes["horario"] = $objecte->horario;
            $informacioTendes["ubicacion"] = $objecte->ubicacion;
            $informacioTendes["foto1"] = $objecte->foto1;
            $informacioTendes["foto2"] = $objecte->foto2;
            $informacioTendes["foto3"] = $objecte->foto3;
            $informacioTendes["estrellitas"] = $this->calculaPuntosTienda($informacioTendes["id_tienda"]); 
            array_push($Llistat, $informacioTendes);
            $i++;
        }

        require "../Vistas/Tienda/paginaTienda.php";

    }
    








}





if(isset($_POST["operacio"]) && $_POST["operacio"]=="insertaT"){
    if (isset($_SESSION["id_administrador"]) && isset($_POST["categoria"])){
        if ($_POST["categoria"]){
            $id_admin = $_SESSION["id_administrador"];
            $id_categoria = $_POST["categoria"];
            if (isset($_POST["nombre"]) && !empty($_POST["nombre"])){
                    $nombre = $_POST["nombre"];
                    if (isset($_FILES["logo"])){
                        if(!file_exists($ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/glories/imagenes/")){
                            mkdir($ruta_imagenes);
                        }
                        $tipo = $_FILES["logo"]["type"];
                        $tamany = $_FILES["logo"]["size"];
                        if ($tipo == "image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png"){
                            if ($tamany <= 500000){
                                $logo = $_FILES["logo"]["name"];
                                $tmp_logo = $_FILES["logo"]["tmp_name"];
                                $rutalogo = $ruta_imagenes.$logo;
                                if(file_exists($rutalogo)){
                                    $extensio = pathinfo($rutalogo, PATHINFO_EXTENSION);
                                    $nomSenseExtensio = basename($rutalogo, '.'.$extensio);
                                    $logo = $nomSenseExtensio.mt_rand(1,50).'.'.$extensio;
                                    $rutalogo = $ruta_imagenes.$logo;
                                }
                                move_uploaded_file($tmp_logo, $rutalogo);
                                }else{
                                    $_SESSION["mensajeInsertarLogo"]="La imagen sobrepasa el tamaño permitido de 0,5MB!";
                                    header("location: ../Vistas/Tienda/insertarTienda.php");
                                }
                            }else{
                                $_SESSION["mensajeInsertarLogo"]="Este tipo de archivo NO se admite. Prueba de nuevo, gracias";
                                header("location: ../Vistas/Tienda/insertarTienda.php");
                            }
                        }else{
                            $logo=null;
                            } 

                            
                    if (isset($_FILES["foto1"])){
                        if(!file_exists($ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/glories/imagenes/")){
                            mkdir($ruta_imagenes);
                        }
                        $tipo = $_FILES["foto1"]["type"];
                        $tamany = $_FILES["foto1"]["size"];
                        if ($tipo == "image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png"){
                            if ($tamany <= 1000000){
                                $foto1 = $_FILES["foto1"]["name"];
                                $tmp_foto1 = $_FILES["foto1"]["tmp_name"];
                                $rutafoto1 = $ruta_imagenes.$foto1;
                                if(file_exists($rutafoto1)){
                                    $extensio = pathinfo($rutafoto1, PATHINFO_EXTENSION);
                                    $nomSenseExtensio = basename($rutafoto1, '.'.$extensio);
                                    $foto1 = $nomSenseExtensio.mt_rand(1,50).'.'.$extensio;
                                    $rutafoto1 = $ruta_imagenes.$foto1;
                                }
                                move_uploaded_file($tmp_foto1, $rutafoto1);
                                }else{
                                    $_SESSION["mensajeInsertarFoto1"]="La Foto 1 sobrepasa el tamaño permitido de 1MB!";
                                    header("location: ../Vistas/Tienda/insertarTienda.php");
                                }
                            }else{
                                $_SESSION["mensajeInsertarFoto1"]="El tipo de archivo de Foto 1 NO se admite. Prueba de nuevo, gracias";
                                header("location: ../Vistas/Tienda/insertarTienda.php");
                            }
                        }else{
                            $foto1=null;
                            } 


                    if (isset($_FILES["foto2"])){
                        if(!file_exists($ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/glories/imagenes/")){
                            mkdir($ruta_imagenes);
                        }
                        $tipo = $_FILES["foto2"]["type"];
                        $tamany = $_FILES["foto2"]["size"];
                        if ($tipo == "image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png"){
                            if ($tamany <= 1000000){
                                $foto2 = $_FILES["foto2"]["name"];
                                $tmp_foto2 = $_FILES["foto2"]["tmp_name"];
                                $rutafoto2 = $ruta_imagenes.$foto2;
                                if(file_exists($rutafoto2)){
                                    $extensio = pathinfo($rutafoto2, PATHINFO_EXTENSION);
                                    $nomSenseExtensio = basename($rutafoto2, '.'.$extensio);
                                    $foto2 = $nomSenseExtensio.mt_rand(1,50).'.'.$extensio;
                                    $rutafoto2 = $ruta_imagenes.$foto2;
                                }
                                move_uploaded_file($tmp_foto2, $rutafoto2);
                                }else{
                                    $_SESSION["mensajeInsertarFoto2"]="La Foto 2 sobrepasa el tamaño permitido de 1MB!";
                                    header("location: ../Vistas/Tienda/insertarTienda.php");
                                }
                            }else{
                                $_SESSION["mensajeInsertarFoto2"]="El tipo de archivo de Foto 2 NO se admite. Prueba de nuevo, gracias";
                                header("location: ../Vistas/Tienda/insertarTienda.php");
                            }
                        }else{
                            $foto2=null;
                            }


                    if (isset($_FILES["foto3"])){
                        if(!file_exists($ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/glories/imagenes/")){
                            mkdir($ruta_imagenes);
                        }
                        $tipo = $_FILES["foto3"]["type"];
                        $tamany = $_FILES["foto3"]["size"];
                        if ($tipo == "image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png"){
                            if ($tamany <= 1000000){
                                $foto3 = $_FILES["foto3"]["name"];
                                $tmp_foto3 = $_FILES["foto3"]["tmp_name"];
                                $rutafoto3 = $ruta_imagenes.$foto3;
                                if(file_exists($rutafoto3)){
                                    $extensio = pathinfo($rutafoto3, PATHINFO_EXTENSION);
                                    $nomSenseExtensio = basename($rutafoto3, '.'.$extensio);
                                    $foto3 = $nomSenseExtensio.mt_rand(1,50).'.'.$extensio;
                                    $rutafoto3 = $ruta_imagenes.$foto3;
                                }
                                move_uploaded_file($tmp_foto3, $rutafoto3);
                                }else{
                                    $_SESSION["mensajeInsertarFoto3"]="La Foto 3 sobrepasa el tamaño permitido de 1MB!";
                                    header("location: ../Vistas/Tienda/insertarTienda.php");
                                }
                            }else{
                                $_SESSION["mensajeInsertarFoto3"]="El tipo de archivo de Foto 3 NO se admite. Prueba de nuevo, gracias";
                                header("location: ../Vistas/Tienda/insertarTienda.php");
                            }
                        }else{
                            $foto3=null;
                            } 

                    if (!isset($_POST["descripcion"]) || empty($_POST["descripcion"])){
                        $descripcion = null;
                    } else{
                        $descripcion = $_POST["descripcion"];
                    }
                    if (!isset($_POST["horario"]) || empty($_POST["horario"])){
                        $horario = null;
                    } else{
                        $horario = $_POST["horario"];
                    }
                    if (!isset($_POST["telefono"]) || empty($_POST["telefono"])){
                        $telefono = null;
                    } else{
                        $telefono = $_POST["telefono"];
                    }
                    if (!isset($_POST["ubicacion"]) || empty($_POST["ubicacion"])){
                        $ubicacion = null;
                    } else{
                        $ubicacion = $_POST["ubicacion"];
                    }
                    $nuevoObjeto = new TiendasController();
                    $nuevoObjeto->leeInfoTienda($id_admin,$id_categoria,$nombre,$descripcion,$logo,$horario,$telefono,$ubicacion,$foto1,$foto2,$foto3); 
                }
                else{
                    $_SESSION["mensajeInsertarTienda"]="Indique el nombre de la tienda!";
                }
        }else{
            $_SESSION["mensajeFaltaCategoria"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>Debe seleccionar la categoría!</h1>
            <div>";
            header("location: ../Vistas/Tienda/insertarTienda.php");
        }
        
    }else{
        $_SESSION["mensajeResultado"]="
        <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La operación NO se puede realizar en estos momentos!</h1>
            <div>";
        header("location: ../../index.php");
    }

}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new TiendasController();
    $objecte->LlistaTiendas();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="verTODO"){
    $objecte = new TiendasController();
    $objecte->LlistaTiendasTODOTodas();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    $objecte = new TiendasController();
    $objecte->MuestraModificarTienda($_GET["tienda"]);
}



if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){

   
    if (isset($_SESSION["id_administrador"]) && isset($_POST["categoria"]) && isset($_POST["id"])){
        if ($_POST["categoria"]){
            $id_admin = $_SESSION["id_administrador"];
            $id_categoria = $_POST["categoria"];
            $id_tienda = $_POST["id"];
            if (isset($_POST["nombre"]) && !empty($_POST["nombre"])){
                    $nombre = $_POST["nombre"];
                    if (isset($_FILES["logo"])){
                        if(!file_exists($ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/glories/imagenes/")){
                            mkdir($ruta_imagenes);
                        }
                        $tipo = $_FILES["logo"]["type"];
                        $tamany = $_FILES["logo"]["size"];
                        if ($tipo == "image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png"){
                            if ($tamany <= 500000){
                                $logo = $_FILES["logo"]["name"];
                                $tmp_logo = $_FILES["logo"]["tmp_name"];
                                $rutalogo = $ruta_imagenes.$logo;
                                if(file_exists($rutalogo)){
                                    $extensio = pathinfo($rutalogo, PATHINFO_EXTENSION);
                                    $nomSenseExtensio = basename($rutalogo, '.'.$extensio);
                                    $logo = $nomSenseExtensio.mt_rand(1,50).'.'.$extensio;
                                    $rutalogo = $ruta_imagenes.$logo;
                                }
                                move_uploaded_file($tmp_logo, $rutalogo);
                                }else{
                                    $_SESSION["mensajeInsertarLogo"]="La imagen sobrepasa el tamaño permitido de 0,5MB!";
                                    header("location: ../Vistas/Tienda/insertarTienda.php");
                                }
                            }else{
                                $_SESSION["mensajeInsertarLogo"]="Este tipo de archivo NO se admite. Prueba de nuevo, gracias";
                                header("location: ../Vistas/Tienda/insertarTienda.php");
                            }
                        }else{
                            $logo=null;
                            } 

                            
                    if (isset($_FILES["foto1"])){
                        if(!file_exists($ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/glories/imagenes/")){
                            mkdir($ruta_imagenes);
                        }
                        $tipo = $_FILES["foto1"]["type"];
                        $tamany = $_FILES["foto1"]["size"];
                        if ($tipo == "image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png"){
                            if ($tamany <= 1000000){
                                $foto1 = $_FILES["foto1"]["name"];
                                $tmp_foto1 = $_FILES["foto1"]["tmp_name"];
                                $rutafoto1 = $ruta_imagenes.$foto1;
                                if(file_exists($rutafoto1)){
                                    $extensio = pathinfo($rutafoto1, PATHINFO_EXTENSION);
                                    $nomSenseExtensio = basename($rutafoto1, '.'.$extensio);
                                    $foto1 = $nomSenseExtensio.mt_rand(1,50).'.'.$extensio;
                                    $rutafoto1 = $ruta_imagenes.$foto1;
                                }
                                move_uploaded_file($tmp_foto1, $rutafoto1);
                                }else{
                                    $_SESSION["mensajeInsertarFoto1"]="La Foto 1 sobrepasa el tamaño permitido de 1MB!";
                                    header("location: ../Vistas/Tienda/insertarTienda.php");
                                }
                            }else{
                                $_SESSION["mensajeInsertarFoto1"]="El tipo de archivo de Foto 1 NO se admite. Prueba de nuevo, gracias";
                                header("location: ../Vistas/Tienda/insertarTienda.php");
                            }
                        }else{
                            $foto1=null;
                            } 


                    if (isset($_FILES["foto2"])){
                        if(!file_exists($ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/glories/imagenes/")){
                            mkdir($ruta_imagenes);
                        }
                        $tipo = $_FILES["foto2"]["type"];
                        $tamany = $_FILES["foto2"]["size"];
                        if ($tipo == "image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png"){
                            if ($tamany <= 1000000){
                                $foto2 = $_FILES["foto2"]["name"];
                                $tmp_foto2 = $_FILES["foto2"]["tmp_name"];
                                $rutafoto2 = $ruta_imagenes.$foto2;
                                if(file_exists($rutafoto2)){
                                    $extensio = pathinfo($rutafoto2, PATHINFO_EXTENSION);
                                    $nomSenseExtensio = basename($rutafoto2, '.'.$extensio);
                                    $foto2 = $nomSenseExtensio.mt_rand(1,50).'.'.$extensio;
                                    $rutafoto2 = $ruta_imagenes.$foto2;
                                }
                                move_uploaded_file($tmp_foto2, $rutafoto2);
                                }else{
                                    $_SESSION["mensajeInsertarFoto2"]="La Foto 2 sobrepasa el tamaño permitido de 1MB!";
                                    header("location: ../Vistas/Tienda/insertarTienda.php");
                                }
                            }else{
                                $_SESSION["mensajeInsertarFoto2"]="El tipo de archivo de Foto 2 NO se admite. Prueba de nuevo, gracias";
                                header("location: ../Vistas/Tienda/insertarTienda.php");
                            }
                        }else{
                            $foto2=null;
                            }


                    if (isset($_FILES["foto3"])){
                        if(!file_exists($ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/glories/imagenes/")){
                            mkdir($ruta_imagenes);
                        }
                        $tipo = $_FILES["foto3"]["type"];
                        $tamany = $_FILES["foto3"]["size"];
                        if ($tipo == "image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png"){
                            if ($tamany <= 1000000){
                                $foto3 = $_FILES["foto3"]["name"];
                                $tmp_foto3 = $_FILES["foto3"]["tmp_name"];
                                $rutafoto3 = $ruta_imagenes.$foto3;
                                if(file_exists($rutafoto3)){
                                    $extensio = pathinfo($rutafoto3, PATHINFO_EXTENSION);
                                    $nomSenseExtensio = basename($rutafoto3, '.'.$extensio);
                                    $foto3 = $nomSenseExtensio.mt_rand(1,50).'.'.$extensio;
                                    $rutafoto3 = $ruta_imagenes.$foto3;
                                }
                                move_uploaded_file($tmp_foto3, $rutafoto3);
                                }else{
                                    $_SESSION["mensajeInsertarFoto3"]="La Foto 3 sobrepasa el tamaño permitido de 1MB!";
                                    header("location: ../Vistas/Tienda/insertarTienda.php");
                                }
                            }else{
                                $_SESSION["mensajeInsertarFoto3"]="El tipo de archivo de Foto 3 NO se admite. Prueba de nuevo, gracias";
                                header("location: ../Vistas/Tienda/insertarTienda.php");
                            }
                        }else{
                            $foto3=null;
                            } 

                    if (!isset($_POST["descripcion"]) || empty($_POST["descripcion"])){
                        $descripcion = null;
                    } else{
                        $descripcion = $_POST["descripcion"];
                    }
                    if (!isset($_POST["horario"]) || empty($_POST["horario"])){
                        $horario = null;
                    } else{
                        $horario = $_POST["horario"];
                    }
                    if (!isset($_POST["telefono"]) || empty($_POST["telefono"])){
                        $telefono = null;
                    } else{
                        $telefono = $_POST["telefono"];
                    }
                    if (!isset($_POST["ubicacion"]) || empty($_POST["ubicacion"])){
                        $ubicacion = null;
                    } else{
                        $ubicacion = $_POST["ubicacion"];
                    }
                    $accio = new TiendasController();
                    $accio->ModificarTienda($id_tienda,$id_admin,$id_categoria,$nombre,$descripcion,$logo,$horario,$telefono,$ubicacion,$foto1,$foto2,$foto3); 
                }
                else{
                    $_SESSION["mensajeInsertarTienda"]="Indique el nombre de la tienda!";
                }
        }else{
            $_SESSION["mensajeFaltaCategoria"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>Debe seleccionar la categoría!</h1>
            <div>";
            header("location: ../Vistas/Tienda/insertarTienda.php");
        }
        
    }else{
        $_SESSION["mensajeResultado"]="
        <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La operación NO se puede realizar en estos momentos!</h1>
            <div>";
        header("location: ../../index.php");
    }


}





if(isset($_GET["operacio"]) && $_GET["operacio"]=="puntos"){
    $objecte = new TiendasController();
    $objecte->calculaPuntosTiendas();
}




?>