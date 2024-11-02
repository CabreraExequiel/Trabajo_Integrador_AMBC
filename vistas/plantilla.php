<?php

$url = PlantillaControlador::url(); // Agregado punto y coma

?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8" />
    <title>Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo $url; ?>vistas/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="<?php echo $url; ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="<?php echo $url; ?>vistas/assets/js/alerts.js"></script>

</head>

<!-- body start -->
<body data-menu-color="dark" data-sidebar="default">

    <!-- Begin page -->
    <div id="app-layout">

        <!-- Topbar Start -->
        <?php include 'modulos/header.php'; ?>
        <!-- end Topbar -->

        <!-- Left Sidebar Start -->
        <?php include 'modulos/menu.php'; ?>
        <!-- Left Sidebar End -->          
     
        <div class="content-page">
            <div class="content">

                <?php

                if (isset($_GET["pagina"])) {

                    $pagina = explode("/", $_GET["pagina"]);

                    if (
                        $pagina[0] == "inicio" ||                         
                        $pagina[0] == "productos" ||
                        $pagina[0] == "agregar" ||
                        $pagina[0] == "editar" ||
                        $pagina[0] == "categorias" ||
                        $pagina[0] == "clientes" // Asegúrate de que esta línea esté aquí
                    ) {
                        include "vistas/modulos/" . $pagina[0] . ".php";
                    } else {
                        include "vistas/modulos/404.php";
                    }
                }

                ?>

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include 'modulos/footer.php'; ?>
            <!-- end Footer -->

        </div>
   
    </div>
    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="<?php echo $url; ?>vistas/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/feather-icons/feather.min.js"></script>

    <!-- App js-->
    <script src="<?php echo $url; ?>vistas/assets/js/app.js"></script>

</body>
</html>
