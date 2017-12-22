<!DOCTYPE html>
<html>
    <head>
        <?php require_once('mvc/views/header.php'); ?>
        <?php require_once('mvc/views/scripts.php'); ?>
    </head>
    <body oncontextmenu="return false" onselectstart="return false">
        <div id="wrapper">
            <?php require_once('mvc/views/navbar.php'); ?>
        </div>
        <div id="page-wrapper">
            <?php
                //include './mvc/views/activos/ciudad.php';
            ?>
        </div>
        <?php require_once('mvc/views/modal.php'); ?>
        
    </body>
    <script type="text/javascript">
        $("#page-wrapper").load("mvc/views/items/proveedor.php");
        //$("#page-wrapper").load("mvc/views/activos/contribuyente.php");
    </script>
</html>
