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
	}
?>

<!-- Menú de categorías inicio -->

<?php require_once '../Controladores/TiendasController.php'; 
    $objecte = new TiendasController();
    $objecte->menuTiendas();
?>


<!-- Menú de categorías fin -->
	
<?php include 'Includes/footer.php'; ?>