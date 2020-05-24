<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>CC Glòries</title>
	<link rel="stylesheet" href="/Vistas/Theme/css/bootstrap.css">
	<link rel="stylesheet" href="/Vistas/Theme/css/style.css">
	<script src="/Vistas/Theme/js/jquery.min.js"></script>
	<script src="/Vistas/Theme/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<!-- Header inicio -->
	
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-4 a">
				<a class="logo" href="index.php"></a>
			</div>
			<div class="col-md-4 b align-self-center">
				<form action="#">
					<div class="input-container s2">
						<input type="text" name="search" id="search" required="required">
						<label for="search" class="label">Buscar comercio</label>
						<button type="submit">Buscar</button>
					</div>
				</form>
			</div>
			<div class="col-md-4 c align-self-center">
				<span class="btn txt">
					<i class="icon-user"></i>
					<?php 
					echo "<b>".$_SESSION["nombre"]." ".$_SESSION["apellidos"]."<span>, ".$_SESSION["rol"]."</span></b>";
					if ($_SESSION["rol"]=="Cliente"){

						if (file_exists("cliente-cuenta.php")){
						    echo "<a class='c-orange' href='cliente-cuenta.php'>Mi cuenta</a> ";
						}else{
						    echo "<a class='c-orange' href='../cliente-cuenta.php'>Mi cuenta</a> ";
						}

					} else if ($_SESSION["rol"]=="Administrador"){

						if (file_exists("admin-cuenta.php")){
						    echo "<a class='c-orange' href='admin-cuenta.php'>Mi cuenta</a> ";
						}else{
						    echo "<a class='c-orange' href='../admin-cuenta.php'>Mi cuenta</a> ";
						}

					} else if ($_SESSION["rol"]=="SuperAdministrador"){
						
						if (file_exists("superadmin-cuenta.php")){
						    echo "<a class='c-orange' href='superadmin-cuenta.php'>Mi cuenta</a> ";
						}else{
						    echo "<a class='c-orange' href='../superadmin-cuenta.php'>Mi cuenta</a> ";
						}

					}

						if (file_exists("../Controladores/SesionesController.php")){
						    echo "<a class='c-999' href='../Controladores/SesionesController.php?operacion=cerrarSesion'>Cerrar sesión</a>";
						}else{
						    echo "<a class='c-999' href='../../Controladores/SesionesController.php?operacion=cerrarSesion'>Cerrar sesión</a>";
						}

					    
        			?>

				</span>
			</div>
		</div>
	</div>
</header>

<!-- Header fin -->
	
<body>