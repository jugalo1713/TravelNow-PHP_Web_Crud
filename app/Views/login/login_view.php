<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<style>
    body {
        background-color: #e0fbfc;
    }
</style>

<body>
    <div class="container  h-100">
        <div class="d-flex justify-content-md-center align-items-center vh-100">

            <div class="container">
                <div class="row">
                    <div class="col-12 align-middle">
                        <img class="mx-auto d-block" src="<?php echo base_url() ?>/public/assets/img/logo.png">
                    </div>
                </div>
                <div class="row"> 
                <div class="col-4"></div>
                    <div class="col-4">

                        <form method="POST" action="<?php echo base_url() ?>/public/login">
                            <div class="mb-3 mx-auto d-block">
                                <label for="exampleInputEmail1"  class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3 mx-auto">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="contrasena" class="form-control" id="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                            <a href="<?php echo base_url()?>/public/login/registrarse" class="btn btn-primary" role="button">Registrarse</a>
                        </form>
                    </div>
                </div>

            </div>


        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>