<?php    
    /***  ENCABEZADO */

    //GP
    require_once "../../Controladores/CategoriasController.php";
    require_once "../../Controladores/SesionesController.php";
    $objecteSessions = new SesionesController();


    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../../index.php");
    }else{
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Administrador"){
                $_SESSION["Denegado"]="No tiene acceso al módulo de insertar Tienda!!";
                header ("location: ../../index.php");
        }else{  
            if (isset($_SESSION["mensajeFaltaCategoria"])){
                echo $_SESSION["mensajeFaltaCategoria"];
                unset($_SESSION["mensajeFaltaCategoria"]);
            }
        }

    }

?>

<h1>Inserta una TIENDA</h1>
<form action="../../Controladores/TiendasController.php" method="POST" enctype="multipart/form-data">
    <div class="six fields">
       

    <div class="field">
            <label for="nombre">Categoria</label>
            <select name="categoria">
                <option value="0">Seleccione:</option>
                    <?php
                        
                        $categorias = new CategoriasController();
                        $valoresCategorias = $categorias->selectCategorias();
                        foreach ($valoresCategorias as $categoria){
                            echo "<option value=$categoria->id_categoria>".$categoria->nombre."</option>";
                        }
                    ?>
            </select>

        </div>


   
        <div class="field">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="nombre">
        </div>
        <div class="field">
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" placeholder="descripcion">
        </div>
        <div class="field">
            <label for="logo">logo</label>
            <input type="file" name="logo" placeholder="logo">
   
        </div>
        <div class="field">
            <label for="horario">Horario</label>
            <input type="text" name="horario" placeholder="horario">
        </div>
        <div class="field">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" placeholder="Telefono">
        </div>
        <div class="field">
            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" placeholder="Ubicacion">
        </div>
        <div class="field">
            <label for="foto1">Foto_1</label>
            <input type="file" name="foto1" placeholder="foto1">
        </div>
        <div class="field">
            <label for="foto2">Foto_2</label>
            <input type="file" name="foto2" placeholder="foto2">
        </div> 
        <div class="field">
            <label for="foto3">Foto_3</label>
            <input type="file" name="foto3" placeholder="foto3">
        </div>
        <input type="hidden" name="operacio" value="insertaT">
        <input type="submit" value="Crea TIENDA">
    </div>
</form>

<?php    
    /***  PIE */

?>