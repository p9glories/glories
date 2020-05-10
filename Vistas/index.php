<?php
//GP
require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();
?>


<?php
if (isset($_SESSION["login"])){
	if ($_SESSION["login"]){
			include 'Includes/header_users.php';
		} else {
			include 'Includes/header.php';
		}
	} else {
		include 'Includes/header.php';
	}
?>
<?php

if (isset($_SESSION["login"])){
    if ($_SESSION["login"]==false){
        if (isset($_SESSION["mensajeLogin"])){
        	// AZ
            echo "<div class='modal fade' id='wrongModal' tabindex='-1' role='dialog' aria-labelledby='wrongModal' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content p-4 text-center'>";
            echo "<a class='close' data-dismiss='modal'>×</a>";
            echo "<p class='m-0'><b>".$_SESSION["mensajeLogin"]."</b></p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<script>$('#wrongModal').modal('show');</script>";
            unset($_SESSION["mensajeLogin"]);
        }
    }else{
        if (isset($_SESSION["Denegado"])){
        	// AZ
            echo "<div class='modal fade' id='wrongModal' tabindex='-1' role='dialog' aria-labelledby='wrongModal' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content p-4 text-center'>";
            echo "<a class='close' data-dismiss='modal'>×</a>";
            echo "<p class='m-0'><b>".$_SESSION["Denegado"]."</b></p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<script>$('#wrongModal').modal('show');</script>";
            unset($_SESSION["Denegado"]);
        }
    }
}
    

if (isset($_SESSION["mensajeResultado"])){
    echo $_SESSION["mensajeResultado"];
    unset($_SESSION["mensajeResultado"]);
}

?>


<!-- Menú de categorías inicio -->

<?php require_once '../Controladores/CategoriasController.php'; 
	$Categoria = new CategoriasController();
    $Categoria->MenuCategorias();
?>

<!-- Menú de categorías fin -->

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
		      <img class="d-block w-100" src="Theme/img/banner-01.jpg" alt="Primer slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="Theme/img/banner-02.jpg" alt="Segundo slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="Theme/img/banner-03.jpg" alt="Tercer slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="Theme/img/banner-04.jpg" alt="Cuarto slide">
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
				<img src="Theme/img/img-intro.jpg" class="w-100">
			</div>
		</div>
	</div>
</section>

<!-- Section intro fin -->

<!-- Enlaces a las categorías inicio -->

<?php require_once '../Controladores/CategoriasController.php'; 
	$Categoria = new CategoriasController();
    $Categoria->EnlaceCategorias();
?>

<!-- Enlaces a las categorías fin -->

<!-- Section mapa inicio -->

<section class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2992.5543373878186!2d2.189297215426369!3d41.40548387926261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a323781f11ed%3A0xd7a15aeddffc7581!2zR2zDsnJpZXM!5e0!3m2!1ses!2ses!4v1588023152265!5m2!1ses!2ses" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>

<!-- Section mapa fin -->
	
<?php include 'Includes/footer.php'; ?>