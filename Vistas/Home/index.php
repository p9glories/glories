<?php
//GP
require_once "../../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();
?>


<?php

if (isset($_SESSION["mensajeResultado"])){
        echo $_SESSION["mensajeResultado"];
        include '../Includes/header_users.php';
    } 
    	include '../Includes/header.php';
    //var_dump($_SESSION);
?>

<?php include '../Categoria/verCategoria.php';?>

<!-- Slider inicio -->

<section class="banner">
	<div class="container container-fluid">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="../Theme/img/banner-01.jpg" alt="Primer slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="../Theme/img/banner-02.jpg" alt="Segundo slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="../Theme/img/banner-03.jpg" alt="Tercer slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="../Theme/img/banner-04.jpg" alt="Cuarto slide">
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  </a>
		</div>
	</div>
</section>

<!-- Slider fin -->

<!-- Section intro inicio -->

<section class="intro">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="title text-left">Quiénes somos</h2>
				<span></span>
				<p>El Eje Comercial Glòries es un espacio integrado en la ciudad de Barcelona que incluye una amplia oferta en moda, restauración y ocio.</p>
				<p>Dispone de una superficie de 67.000 m2 dedicados al comercio con 130 establecimientos, donde se encuentran desde reconocidas marcas internaciones hasta retailers de origen local. La alimentación y restauración están presentes en toda la zona, sobre todo en El Mercat de Glòries, un área de 3.000 m2 que presenta una variada oferta gastronómica.</p>
				<p>La experiencia de Glòries se complementa con 2.400 plazas de aparcamiento, zonas de descanso con Wi-Fi y puntos de recarga eléctrica y zona infantil.</p>
			</div>
			<div class="col-md-6">
				<img src="../Theme/img/img-intro.jpg" class="w-100">
			</div>
		</div>
	</div>
</section>

<!-- Section intro fin -->

<?php include '../Includes/footer.php'; ?>