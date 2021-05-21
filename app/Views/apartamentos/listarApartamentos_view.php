<br><br><br>
<div class="container">

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">ID de USUARIO</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Pais</th>
        <th scope="col">Dirección</th>
        <th scope="col">Habitaciones</th>
        <th scope="col">Tarifa</th>
        <th scope="col">Ubicación</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
        <th scope="col">Fotos</th>
      </tr> 
    </thead>
    <tbody>
      <?php
      foreach ($apartamentos as $apartamento) :
      ?>
        <tr>
          <th scope="row"><?= $apartamento->apartamentoID; ?></th>
          <td><?= $apartamento->userID; ?></td>
          <td><?= $apartamento->Ciudad; ?></td>
          <td><?= $apartamento->Pais; ?></td>
          <td><?= $apartamento->Direccion; ?></td>
          <td><?= $apartamento->numHabitaciones;?></td>
          <td><?= $apartamento->tarifaNoche;?></td>
          <td><a style="text-decoration: none;" href="<?= $apartamento->ubicacionMaps;?>">Ubicación</a></td>
          <td style="text-align: center;"><span style="align-items: center;" class="badge rounded-pill bg-info text-dark"><a href="<?php echo base_url()?>/public/apartamentos/registrar?apartamentoID=<?=$apartamento->apartamentoID?>">&#10002;</a></span></td>
          <td style="text-align: center; color: black;"><span class="badge rounded-pill bg-danger"><a style="text-decoration: none; color:black" href="<?php echo base_url()?>/public/apartamentos/eliminar?apartamentoID=<?=$apartamento->apartamentoID?>">X</a></span></td>
          <td style="text-align: center; color: white;"><span class="badge rounded-pill bg-secondary"><a style="text-decoration: none; color:white" href="<?php echo base_url()?>/public/apartamentos/fotos?apartamentoID=<?=$apartamento->apartamentoID?>">fotos</a></span></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="row">
    <div class="col-sm-6 col-md-4">
      <a href="<?php echo base_url()?>/public/apartamentos/registrar" class="btn btn-success" role="button">Ingresar</a>
    </div>
  </div>
</div>   