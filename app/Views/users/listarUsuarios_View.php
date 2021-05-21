<?php

$session =  session();

$rol = $session->get('rol');

$btnIngresar = 'style="display: none;" ';

if($rol == 'administrador')
{
  $btnIngresar = "";
}


?>

<br><br><br>
<div class="container">

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">email</th>
        <th scope="col">pais</th>
        <th scope="col">ciudad</th>
        <th scope="col">contrasena</th>
        <th scope="col">rol</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr> 
    </thead>
    <tbody>
      <?php
      foreach ($users as $user) :
      ?>
        <tr>
          <th scope="row"><?= $user['userID']; ?></th>
          <td><?= $user['nombre']; ?></td>
          <td><?= $user['email']; ?></td>
          <td><?= $user['pais']; ?></td>
          <td><?= $user['ciudad']; ?></td>
          <td><?= $user['contrasena']; ?></td>
          <td><?= $user['rol']; ?></td>
          <td style="text-align: center;"><span style="align-items: center;" class="badge rounded-pill bg-info text-dark"><a href="<?php echo base_url()?>/public/login/registrarse?userID=<?=$user['userID']?>">&#10002;</a></span></td>
          <td style="text-align: center; color: black;"><span class="badge rounded-pill bg-danger"><a style="text-decoration: none; color:black" href="<?php echo base_url()?>/public/usuarios/eliminar?userID=<?=$user['userID']?>">X</a></span></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="row">
    <div class="col-sm-6 col-md-4">
      <a href="<?php echo base_url()?>/public/login/registrarse" <?php echo $btnIngresar; ?> class="btn btn-success" role="button">Ingresar</a>
    </div>
  </div>
</div>