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
?>

<!-- Menú de categorías fin -->

<!-- Section tienda inicio -->

	<section class="commerce">
		<div class="container">
			<div class="row">
<?php 

    if (isset($_GET["id"])){
    	require_once "../Controladores/TiendasController.php";
        $Categoria = new TiendasController();
    	$Categoria->paginaTienda($_GET["id"]);
    } else {
        echo "NO se puede mostrar";
    }

?>
       </div>
    </div>
</section>

<script>
	$('[gallery] [thumbs] img').click(function(){
		src = $(this).attr('src');
		$('[gallery] [main] img').attr('src',src)
	})
</script>

<!-- Section tienda fin -->
	
<?php include 'Includes/footer.php'; ?>