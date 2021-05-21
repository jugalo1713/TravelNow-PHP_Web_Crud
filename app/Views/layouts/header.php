<?php


$session =  session();

$rol = $session->get('rol');

$displayApartamentos = 'style="display: none ";';
    $displayUsuarios = 'style="display: none ";';
    $displayMisApartamentos = 'style="display: none ";';


if($rol == 'administrador')
{
    $displayApartamentos = '';
    $displayUsuarios = '';
    $displayMisApartamentos = '';
}
else if ($rol == 'anfitrion')
{
    $displayMisApartamentos = '';; 
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<header>
    <div class="fluid-container">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ee6c4d">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url() ?>/public/assets/img/logo.png" alt="" height="60" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo base_url()."/public/Home2"?>"><strong>Travel Now</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" <?php echo $displayApartamentos ?> aria-current="page" href="<?php echo base_url().'/public/apartamentos'?>">Apartamentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo base_url() ?>/public/buscarApartamentos">Buscar Apartamentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" <?php echo  $displayUsuarios ?> aria-current="page" href="<?php echo base_url() ?>/public/usuarios">Usuarios</a>
                        </li>
                    </ul>

                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">

                            <li  class="nav-item dropdown">
                                <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Usuario
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?php echo base_url().'/public/usuarios/misDatos'?>">Mis Datos</a></li>
                                    <li><a class="dropdown-item" <?php echo $displayMisApartamentos?> href="<?php echo base_url().'/public/apartamentos/registrados'?>">Mis Apartamentos</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url().'/public/usuario/reservas'?>">Mis Reservas</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url().'/public/login'?>">Cerrar Sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>