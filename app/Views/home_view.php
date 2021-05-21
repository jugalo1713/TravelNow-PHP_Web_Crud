<?php
$randomNum = random_int(0, 5);

?>


<div class="container">
    <br><br>
    <a href="<?php echo base_url()."/public/buscarApartamentos" ?>" >
    <h1 style="align-items: center; text-align: center;"><span class="badge bg-secondary">Buscar Apartamentos!</span></h1>
    
    </a>
    
    <br><br>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo $fotosApartamento[$randomNum]->ubicacionImagen ?>" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo $fotosApartamento[$randomNum]->descripcionImagen ?></h5>
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

</div>