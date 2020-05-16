<?php
//GP
require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();
?>

<?php
if (isset($_SESSION["login"])){
	if ($_SESSION["login"]==true){
		include 'Includes/header_users.php';
		} 
	else {
		include 'Includes/header.php';
	}
} 
else {
	include 'Includes/header.php';
}
?>

<!-- Menú de categorías inicio -->

<?php require_once '../Controladores/CategoriasController.php'; 
	$Categoria = new CategoriasController();
    $Categoria->MenuCategorias();
    $Categoria->getNombre();
?>

<!-- Menú de categorías fin -->

<!-- Section tienda inicio -->

	<section class="commerce">
		<div class="container">
			<div class="row">

<!-- Info tienda inicio -->
<?php 
    if (isset($_GET["id"])){
    	require_once "../Controladores/TiendasController.php";
        $Categoria = new TiendasController();
    	$Categoria->paginaTienda($_GET["id"]);
    } else {
        echo "NO se puede mostrar";
    }
?>
<!-- Info tienda fin -->

<!-- Seccion valorar inicio -->
<?php 
if ((isset($_SESSION["login"]))&&(($_SESSION["login"])==true)){
	echo '
	<div class="rating-box mb-4">
		<div class="h5">Déjanos tu valoración</div>
		<form class="row">
		  	<div class="rating-stars col-12">
		  		<ul id="stars">
			      	<li class="star" data-value="1"><i></i></li>
			      	<li class="star" data-value="2"><i></i></li>
			      	<li class="star" data-value="3"><i></i></li>
			      	<li class="star" data-value="4"><i></i></li>
			      	<li class="star" data-value="5"> <i></i></li>
			    </ul>
				<span class="stars-number"></span>
		  	</div>
			<div class="col-12 mb-3">
	            <div class="input-container">
	              <textarea type="text" id="comment" name="comment" required="required" rows="3"></textarea>
	              <label for="comment" class="label">Escribe tu reseña</label>
	            </div>
	        </div>
	        <div class="col-12">
	        	<button type="submit" class="btn btn-success">Enviar valoración</button>
	        </div>
		</form>
	</div>
	';
} else {
	echo '
	<div class="rating-box mb-4">
		<div class="h5">Déjanos tu valoración</div>
		<form class="row">
	        <div class="col-12">
	        	<p class="m-0 fz-14">Debes iniciar sesión para ingresar reseñas.<br>
	        	<span class="btn btn-success mt-2" data-toggle="modal" data-target="#loginModal">Iniciar sesión</span>
	        	<a href="cliente-nuevo.php" class="btn btn-dark mt-2">Registrarme</a>
	        	</p>
	        </div>
		</form>
	</div>
	';
}
?>
<!-- Seccion valorar fin -->

<!-- Lista valoraciones inicio -->

<?php require_once '../Controladores/ValoracionesController.php'; 
if (isset($_GET["id"])){
	$objecte = new ValoracionesController();
	$objecte->LlistavaloracionesAprobadasTienda($_GET["id"]);
}?>

<!-- Lista valoraciones fin -->

       </div>
    </div>
</section>

<script>
	$('[gallery] [thumbs] img').click(function(){
		src = $(this).attr('src');
		$('[gallery] [main] img').attr('src',src)
	})
</script>

<script>
		$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = ratingValue + " de 5";
    }
    responseMessage(msg);
    
  });
  
  
});

function responseMessage(msg) {
  $('.stars-number').fadeIn(200).html("<span>" + msg + "</span>");
}
	</script>

<!-- Section tienda fin -->
	
<?php include 'Includes/footer.php'; ?>