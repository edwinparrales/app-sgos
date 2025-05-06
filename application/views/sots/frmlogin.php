<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Login Sgos</title>
    <meta charset="UTF-8">
    <title>Sgos</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url('public/css/simple-sidebar.css') ?> " rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="<?php echo base_url('public/jquery-ui/jquery-ui.css') ?> " rel="stylesheet">

</head>

<body class="d-flex  justify-content-center">



    <div class="container-sm w-50 mt-5">
        <div class="panel panel-info center-block">

            <div class="panel-heading" style="display: flex;">
                <img class="profile-img" src="<?php echo base_url('public/img/logo.jpg') ?>" width="50" style="margin: 3px;">
                <h3>Login Sgos</h3>

            </div>

            <div class="panel-body">
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger d-flex justify-content-center" role="alert">
                        <p>
                            <?php echo  $this->session->flashdata('error') ?>
                        </p>

                    </div>
                <?php endif; ?>

                <form class="form-signin" method="post" action="<?php echo base_url('login/inicio') ?>">


                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" class="form-control" name="usuario" placeholder="Nombre usuario " required="" autofocus="" id="usuario" />

                        </div>



                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-tag"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required="" id="password" />

                        </div>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary form-control" type="submit">Entrar</button>

                    </div>

                </form>
            </div>
            <div class="panel-footer">
                <h3 class="">Sgos</h3>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>


</body>

</html>