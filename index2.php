<!DOCTYPE html>
<html>
<head>
<title>P9</title>
</head>

<body>


<?php

    require_once "Controladores/SesionesController.php";
    $objecteSessio = new SesionesController();
    //GP
    if(!empty($_SESSION["id_usuario"])){
                echo "eres el usuario con ID: ".$_SESSION["id_usuario"];
                echo "<br>";
                echo "eres ".$_SESSION["rol"];
                if ($_SESSION["rol"]=="Cliente") echo "con ID_CLIENTE: ".$_SESSION["id_cliente"]."<br>";
    }  

    
    if (isset($_SESSION["login"])){
        if ($_SESSION["login"]==false){
            if (isset($_SESSION["mensajeLogin"])){
                echo "<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'><h1>";
                echo $_SESSION["mensajeLogin"];
                unset($_SESSION["mensajeLogin"]);
                echo "</h1>";
                echo "<a href='formLoginPrueba.php'>Loguearse</a>";
                echo "</div>";
            }
        }else{
            if (isset($_SESSION["Denegado"])){
                echo "<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'><h1>";
                echo $_SESSION["Denegado"];
                unset($_SESSION["Denegado"]);
                echo "</h1>";
               // echo "<a href='formLoginPrueba.php'>Loguearse de nuevo</a>";
                echo "</div>";
            }
        }
    }
    
    if (isset($_SESSION["mensajeResultado"])){
        echo $_SESSION["mensajeResultado"];
        unset($_SESSION["mensajeResultado"]);
    }
    

    echo "<br>";
    echo "<a href='Controladores/SesionesController.php?operacion=cerrarSesion'>Salir de  La Sesion</a>";

    ?>












<h1>Enlaces muestra [INSERTAR datos]</h1>
<a href="Vistas/Administrador/insertarAdministrador.php">Administrador</a>
<br>
<a href="Vistas/Categoria/insertarCategoria.php">Categorias</a>
<br>
<a href="Vistas/Cliente/insertarCliente.php">Clientes</a>
<br>
<a href="Vistas/Nivel/insertarNivel.php">Niveles</a>
<br>
<a href="Vistas/SuperAdministrador/insertarSuperAdministrador.php">SuperAdministradores</a>
<br>
<a href="Vistas/Tienda/insertarTienda.php">Tiendas</a>
<br>
(<a href="Vistas/Usuario/insertarUsuario.php">Usuarios</a>)
<br>
<a href="Vistas/Valoracion/insertarValoracion.php">Valoraciones</a>

<h1>Enlaces muestra [MOSTRAR datos]</h1>
<a href="Controladores/AdministradoresController.php?operacio=ver">Administrador</a>
<br>
<a href="Controladores/CategoriasController.php?operacio=ver">Categorias</a>
<br>
<a href="Controladores/ClientesController.php?operacio=ver">Clientes</a>
<br>
<a href="Controladores/NivelesController.php?operacio=ver">Niveles</a>
<br>
<a href="Controladores/SuperAdministradoresController.php?operacio=ver">SuperAdministradores</a>
<br>
<a href="Controladores/TiendasController.php?operacio=ver">Tiendas</a>
<br>
<a href="Controladores/TiendasController.php?operacio=verTODO">Tiendas_TODO</a>
<br>
<a href="Controladores/TiendasController.php?operacio=puntos">PUNTOS de Tiendas</a>
<br>
(<a href="Controladores/UsuariosController.php?operacio=ver">Usuarios</a>)
<br>
<a href="Controladores/ValoracionesController.php?operacio=ver">Valoraciones</a>
<br>
<a href="Controladores/ValoracionesController.php?operacio=verAprobadas">Valoraciones solo Aprobadas</a>
<br>
<a href="Controladores/ValoracionesController.php?operacio=verAprobar">Valoraciones (Pendientes de Aprobar por Administradores)</a>


</body>

</html>