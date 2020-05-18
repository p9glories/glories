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
} 
else {
    header("Location: index.php");
}
?>

<body>

<section class="admin">
    <div class="container">
        <div class="row">
            
        <?php include 'Includes/nav-cuenta-cliente.php';?>
        
            <div class="col-md-9 content">
                
                <div class="row">

                    <h2 class="col-12">Mis reseñas</h2>
                    <div class="col-12 ratings">
                    <?php
                    include '../Controladores/ValoracionesController.php'; 
                    $objecte = new ValoracionesController();
                    $objecte->Llistavaloracionespor($_SESSION['id_cliente']);
                    ?>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</section>

<?php include 'Includes/footer.php'; ?>

</body>

</html>
