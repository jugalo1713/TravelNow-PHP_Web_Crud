<br><br>

<div class="container">
    <form method="POST" action="<?php echo base_url() ?>/public/buscarApartamentos" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <label for="destino" class="form-label">Destino</label>
                <input type="text" name="destino" class="form-control" id="destino" required>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="mb-3">
                    <label for="fechaInicio" class="form-label col-4">Fecha de inicio</label>
                    <input type="date" name="fechaInicio" class="form-control col-4" id="fechaInicio" required>
                </div>

            </div>
            <div class="col-sm-12 col-lg-4">
                <label for="fechaFinal" class="form-label col-4">Fecha final</label>
                <input type="date" name="fechaFinal" class="form-control col4" id="fechaFinal" required>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>
    <br><br>
    <form method="POST" action="<?php echo base_url() ?>/public/buscarApartamentos/reservar">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Imágen destacada</th>
                    <th scope="col">ID</th>
                    <th scope="col">País</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Habitaciones</th>
                    <th scope="col">Tarifa por Noche</th>
                    <th scope="col">Ver</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($apartamentos as $apartamento) : ?>
                    <tr>
                        <td>
                            <img src="<?php
                                        foreach ($fotosDestacadas as $fotoDestacada) {
                                            if ($fotoDestacada->apartamentoID == $apartamento->apartamentoID) {
                                                echo $fotoDestacada->ubicacionImagen;
                                            }
                                        }
                                        ?>" style="height: 130px; width: auto;" class="img-thumbnail">
                        </td>
                        <td><?php echo $apartamento->apartamentoID; ?></td>
                        <td><?= $apartamento->Pais; ?></td>
                        <td><?= $apartamento->Ciudad; ?></td>
                        <td><?= $apartamento->numHabitaciones; ?></td>
                        <td><?= $apartamento->tarifaNoche; ?></td>
                        <td style="text-align: center;"><span style="align-items: center; text-decoration: none;" class="badge rounded-pill bg-info text-dark"><a href="<?php echo base_url() ?>/public/apartamentos/verApartamento?apartamentoID=<?= $apartamento->apartamentoID ?>">ver</a></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </form>


</div>