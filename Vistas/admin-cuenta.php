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
            
        <?php include 'Includes/nav-cuenta-admin.php';?>
        
            <div class="col-md-9 content">
                
                <div class="row">

                    <h2 class="col-12">Datos personales</h2>
                    <?php
                    include '../Controladores/AdministradoresController.php'; 
                    $objecte = new AdministradoresController();
                    $objecte->infoAdmin();
                    ?>
                    <div class="col-12">
                        <a href="admin-modificar.php" class="btn btn-secondary">Modificar</a>
                    </div>
                    
                
                </div>

            </div>
        </div>
        
    </div>
</section>

<?php include 'Includes/footer.php'; ?>

</body>

</html>
