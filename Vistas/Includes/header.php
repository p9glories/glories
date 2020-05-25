<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>CC Glòries</title>
	<link rel="stylesheet" href="/Vistas/Theme/css/bootstrap.css?v=2">
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
				<a class="logo" href="<?php $_SERVER['DOCUMENT_ROOT']?>/index.php"></a>
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
				<span class="btn txt" data-toggle="modal" data-target="#loginModal">
					<i class="icon-user"></i>
					<b>Acceso de usuarios</b>
					<span class="bb">Clientes y administradores</span>
				</span>
			</div>
		</div>
	</div>
</header>

<!-- Header fin -->

<!-- Modal login inicio -->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Acceso de <span>usuarios</span></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div>
      		<form action="../Controladores/UsuariosController.php?operacio=login" method="POST">
      			<div class="col-12 mb-3">
      				<div class="input-container">
		              <input type="text" id="email" name="email" required="required">
		              <label for="email" class="label">Tu e-mail</label>
		            </div>
      			</div>
        		<div class="col-12 mb-3">
		            <div class="input-container">
		              <input type="text" id="password" name="password" required="required">
		              <label for="password" class="label">Password</label>
		            </div>
		        </div>
		        <div class="col-12 mb-3 text-center d-none">
		        	<div class="form-check">
					    <input type="checkbox" class="form-check-input" id="admin">
					    <label class="form-check-label" for="admin">Acceder como administrador</label>
					</div>
		        </div>
		        <div class="col-12 mb-4">
		        	<input type="hidden" name="operacio" value="login">
             		<input type="submit" class="btn btn-orange btn-lg" value="Iniciar sesión">
		        </div>
				<div class="col-12 mb-4 text-center">
					<a href="cliente-registro.php" class="link">
						Registrarme como nuevo cliente 
						<svg class="bi bi-arrow-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  		<path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 01.708 0l3 3a.5.5 0 010 .708l-3 3a.5.5 0 01-.708-.708L12.793 8l-2.647-2.646a.5.5 0 010-.708z" clip-rule="evenodd"/>
					  		<path fill-rule="evenodd" d="M2 8a.5.5 0 01.5-.5H13a.5.5 0 010 1H2.5A.5.5 0 012 8z" clip-rule="evenodd"/>
						</svg>
					</a>
		        </div>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- Modal login fin -->

<body>

