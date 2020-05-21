<?php

if (file_exists("../Modelos/Categoria.php")){
    require_once "../Modelos/Categoria.php";
}else{
    require_once "../../Modelos/Categoria.php";
}

//GP
if (file_exists("../Controladores/SesionesController.php")){
    require_once "../Controladores/SesionesController.php";
}else{
    require_once "../../Controladores/SesionesController.php";
}

$objecteControlaSessio = new SesionesController();

class CategoriasController extends Categoria{

    public function leeInfoCategoria($nombre, $icono){
       $this->resultadoRegistraCategoria($this->registraCategoria($nombre, $icono));
    }

    public function resultadoRegistraCategoria($resultat){
        if ($resultat){
            require "../Vistas/Categoria/Insertado.php";
        }else{
            require "../Vistas/Categoria/NoInsertado.php";
        } 
    }

    public function LlistaCategorias(){

        $Llistat = $this->retornaCategoriasTodos();
        require "../Vistas/Categoria/verCategoria.php";
    }

    // AZ
    public function MenuCategorias(){

        $Llistat = $this->retornaCategoriasTodos();
        require "../Vistas/Categoria/menuCategoria.php";
    }

    // AZ
    public function EnlaceCategorias(){

        $Llistat = $this->retornaCategoriasTodos();
        require "../Vistas/Categoria/enlaceCategoria.php";
    }

    public function MuestraModificarCategoria($id){
        header("location: ../Vistas/Categoria/modificarCategoria.php?id=$id"); 
    }
    public function ModificarCategoria($id, $nombre, $icono){
        $this->resultadoModificaCategoria($this->modificaCategoria($id, $nombre, $icono));
    }
    public function resultadoModificaCategoria($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="
                    <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
                        <h1>Categoria Modificada</h1>
                    <div>";
        }else{
            $_SESSION["mensajeResultado"]="
            <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
                <h1>La Categoria NO se ha podido Modificar</h1>
            <div>";
        } 
        header("location: ../index.php");
    }

    public function selectCategorias(){
        return $this->retornaCategoriasTodos();
    }

    public function obtieneNombreDeLaCategoria($categoria){
        return $this->buscaNombreDeLaCategoria($categoria);
    }


}




if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    if (isset($_POST["nombre"]) && !empty($_POST["nombre"])){
        if (isset($_FILES["icono"])){
            if(!file_exists($ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/imagenes/")){
                mkdir($ruta_imagenes);
            }
            $tipo = $_FILES["icono"]["type"];
            $tamany = $_FILES["icono"]["size"];
            if ($tipo == "image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png"){
                if ($tamany <= 1000000){
                    $icono = $_FILES["icono"]["name"];
                    $tmp_icono = $_FILES["icono"]["tmp_name"];
                    $rutaicono = $ruta_imagenes.$icono;
                    if(file_exists($rutaicono)){
                        $extensio = pathinfo($rutaicono, PATHINFO_EXTENSION);
                        $nomSenseExtensio = basename($rutaicono, '.'.$extensio);
                        $icono = $nomSenseExtensio.mt_rand(1,50).'.'.$extensio;
                        $rutaicono = $ruta_imagenes.$icono;
                    }
                    move_uploaded_file($tmp_icono, $rutaicono);
                    }else{
                        $_SESSION["mensajeInsertarIcono"]="La imagen sobrepasa el tamaño permitido de 1MB!";
                        header("location: ../Vistas/Categoria/insertarCategoria.php");
                    }
                }else{
                    $_SESSION["mensajeInsertarIcono"]="Este tipo de archivo NO se admite. Prueba de nuevo, gracias";
                    header("location: ../Vistas/Categoria/insertarCategoria.php");
                }
            }else{
                $icono=null;
                }  
        $Categoria = new CategoriasController();
        $Categoria->leeInfoCategoria($_POST["nombre"],$icono); 
    }
    else{
        $_SESSION["mensajeInsertarCategoria"]="Faltan datos!";
    }
}
    
   


if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $Categoria = new CategoriasController();
    $Categoria->LlistaCategorias();
}

if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
    $objecte = new CategoriasController();
    $objecte->MuestraModificarCategoria($_GET["categoria"]);
}


if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
    if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["id"]) && !empty($_POST["id"])){
        if (isset($_FILES["icono"])){
            if(!file_exists($ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/imagenes/")){
                mkdir($ruta_imagenes);
            }
            $tipo = $_FILES["icono"]["type"];
            $tamany = $_FILES["icono"]["size"];
            if ($tipo == "image/jpeg" || $tipo=="image/jpg" || $tipo=="image/png"){
                if ($tamany <= 1000000){
                    $icono = $_FILES["icono"]["name"];
                    $tmp_icono = $_FILES["icono"]["tmp_name"];
                    $rutaicono = $ruta_imagenes.$icono;
                    if(file_exists($rutaicono)){
                        $extensio = pathinfo($rutaicono, PATHINFO_EXTENSION);
                        $nomSenseExtensio = basename($rutaicono, '.'.$extensio);
                        $icono = $nomSenseExtensio.mt_rand(1,50).'.'.$extensio;
                        $rutaicono = $ruta_imagenes.$icono;
                    }
                    move_uploaded_file($tmp_icono, $rutaicono);
                    }else{
                        $_SESSION["mensajeInsertarIcono"]="La imagen sobrepasa el tamaño permitido de 1MB!";
                        header("location: ../Vistas/Categoria/insertarCategoria.php");
                    }
                }else{
                    $_SESSION["mensajeModificarIcono"]="Este tipo de archivo NO se admite. Prueba de nuevo, gracias";
                    header("location: ../Vistas/Categoria/insertarCategoria.php");
                }
            }else{
                $icono=null;
                }  
        $objecte = new CategoriasController();
        $objecte->ModificarCategoria($_POST["id"],$_POST["nombre"],$icono); 
    }else{
        $_SESSION["mensajeModificarCategoria"]="Faltan datos!";
    }
}




?>