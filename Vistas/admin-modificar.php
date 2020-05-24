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
                    
                <?php if (isset($_SESSION["mensajeResultado"])){
                    echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeResultado"]."</span></div></div>";
                    unset($_SESSION["mensajeResultado"]);
                };
                ?>
            
                <form id="form" action="../Controladores/UsuariosController.php" method="POST">
                    <div class="row">
                        <h2 class="col-12">Modificar datos personales</h2>
                            
                        <?php
                        include '../Controladores/AdministradoresController.php'; 
                        $objecte = new AdministradoresController();
                        $objecte->mostrarModificarAdmin();
                        ?>
                        
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id_usuario']?>">
                        <input type="hidden" name="operacio" value="modificarAdmin">

                        <div class="col-md-12 mb-3">

                            <input type="submit" class="btn btn-success" value="Modificar">
                            <a href="admin-cuenta.php" class="btn btn-light">Cancelar</a>
                        </div>

                    </div>

                </form>   

            </div>
        </div>
    </div>
</section>

<?php include 'Includes/footer.php'; ?>



</body>

</html>