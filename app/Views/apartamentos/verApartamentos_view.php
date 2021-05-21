<?php

if($disponibilidad === "0")
{
    echo'<script type="text/javascript">
    alert("No hay disponibilidad en esas fechas");
    </script>';
}

?>

<div class="container">


    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo $fotoDestacada[0]->ubicacionImagen ?>" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo $fotoDestacada[0]->descripcionImagen ?></h5>
                </div>
            </div>

            <?php
            foreach ($fotosApartamento as $fotoApartamento) {
                $carousel =
                    "<div class='carousel-item'>
                        <img src='$fotoApartamento->ubicacionImagen' class='d-block w-100' alt='...'>
                        <div class='carousel-caption d-none d-md-block'>
                            <h5>$fotoApartamento->descripcionImagen</h5>
                        </div>
                    </div>";
                echo $carousel;
            }

            ?>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br><br><br>

    <div class="row">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <p class="fw-bolder" style="display: inline;">id: </p><?php echo $datosApartamento[0]->apartamentoID ?>
            </li>
            <li class="list-group-item">
                <p class="fw-bolder" style="display: inline;">Ciudad: </p><?php echo $datosApartamento[0]->Ciudad ?>
            </li>
            <li class="list-group-item">
                <p class="fw-bolder" style="display: inline;">País: </p><?php echo $datosApartamento[0]->Pais ?>
            </li>
            <li class="list-group-item">
                <p class="fw-bolder" style="display: inline;">Dirección: </p><?php echo $datosApartamento[0]->Direccion ?>
            </li>
            <li class="list-group-item">
                <p class="fw-bolder" style="display: inline;">Habitaciones: </p><?php echo $datosApartamento[0]->numHabitaciones ?>
            </li>
            <li class="list-group-item">
                <p class="fw-bolder" style="display: inline;">Tarifa por Noche: </p><?php echo $datosApartamento[0]->tarifaNoche ?>
            </li>
            <li class="list-group-item">
                <p class="fw-bolder" style="display: inline;">Descripción: </p><?php echo $datosApartamento[0]->descripcionApartamento ?>
            </li>

        </ul>

    </div>
    <br><br>
    <form method="POST" action="<?php echo base_url() ?>/public/apartamentos/verApartamento">
        <h3>Reservar:</h3>
        <div class="mb-3 col-4">
            <label for="fechaInicio" class="form-label">Fecha de llegada</label>
            <input type="date" name="fechaInicio" class="form-control" id="fechaInicio" required>
            <input type="hidden" name="apartamentoID" value="<?php echo $datosApartamento[0]->apartamentoID ?>">
            <input type="hidden" name="tarifaNoche" value="<?php echo $datosApartamento[0]->tarifaNoche?>">
        </div>
        <div class="mb-3 col-4">
            <label for="fechaFinal" class="form-label">Fecha de salida</label>
            <input type="date" name="fechaFinal" class="form-control" id="fechaFinal" required>
        </div>
        <button type="submit" class="btn btn-primary">Reservar</button>
    </form>
    <br><br>






</div>