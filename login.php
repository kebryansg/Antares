<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Antares</title>
        <link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="recursos/metisMenu/metisMenu.min.css"/>
        <link rel="stylesheet" href="recursos/dist/css/sb-admin-2.css"/>
        <link rel="stylesheet" href="recursos/font-awesome/css/font-awesome.css"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                                    <center>
                                            <!--<h2><?= $opGen_record->app_main_title ?></h2>-->
                                            <h2>Antares <span style="font-size: 20px;">v.1.1</span></h2> 
                                            <!--<img src="/images/logo.png" />-->
                                    </center>
                                    <hr/>
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Por favor inicie sesión</h3>
                        </div>
                        <div class="panel-body">
                            <form id="frmLogin" role="form" method="post" action="index.php">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Cédula de Identidad" name="documentID" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Contraseña" name="pwd" type="password" value="" required>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Ingresar">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="recursos/jquery/jquery-3.2.1.min.js"></script>
    <script src="recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="recursos/metisMenu/metisMenu.min.js"></script>
    <script src="recursos/dist/js/sb-admin-2.js"></script>
</html>
