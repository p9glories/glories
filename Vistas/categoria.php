<?php
//GP
require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();
?>


<?php
if (isset($_SESSION["login"])){
	if ($_SESSION["login"]!=false){
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

<!-- Section tiendas inicio -->

<section class="products">
    <div class="container">

	<?php 

	    if (isset($_GET["id"])){

			$categoriaTitulo = new CategoriasController();
			$nombreCategoria = $categoriaTitulo->obtieneNombreDeLaCategoria($_GET["id"]);

	    	echo "<h2 class='title text-center'>Comercios de <b>".$nombreCategoria."</b></h2>";
	    	echo "<div class='row justify-content-center'>";
			require_once '../Controladores/TiendasController.php'; 
			    $objecte = new TiendasController();
			    $objecte->menuTiendas($_GET["id"]);
	        echo "</div>";

	    } else {
	        echo "NO se puede mostrar";
	    }

	?>

    </div>
</section>

<!-- Section tiendas fin -->

	
<?php include 'Includes/footer.php'; ?>