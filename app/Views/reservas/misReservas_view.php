<?php

//var_dump($reservas);

?>

<br><br><br>
<div class="container">

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID de Apartamento</th>
                <th scope="col">Fecha de llegada</th>
                <th scope="col">Fecha de Salida</th>
                <th scope="col">Total Tarifa</th>
                <th scope="col">País</th>
                <th scope="col">ciudad</th>
                <th scope="col">Dirección</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($reservas as $reserva) :
            ?>
                <tr>
                    <th scope="row"><?= $reserva->apartamentoID; ?></th>
                    <td><?= $reserva->fechaInicio ?></td>
                    <td><?= $reserva->fechaFinal ?></td>
                    <td><?= $reserva->totalTarifa ?></td>
                    <td><?= $reserva->Pais ?></td>
                    <td><?= $reserva->Ciudad ?></td>
                    <td><?= $reserva->Direccion ?></td>
                    <td style="text-align: center; color: black;"><span class="badge rounded-pill bg-danger"><a style="text-decoration: none; color:black" href="<?php echo base_url() ?>/public/usuario/eliminarReserva?reservaApartamentoID=<?= $reserva->reservaApartamentoID ?>">X</a></span></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row">
    </div>
</div>