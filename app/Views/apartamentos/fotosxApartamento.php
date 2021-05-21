<?php
if (!empty($datosApartamento)) {

    $apartamentoID = $datosApartamento[0]->apartamentoID;
    $userID = $datosApartamento[0]->userID;
    $ciudad = $datosApartamento[0]->Ciudad;
    $pais = $datosApartamento[0]->Pais;
    $direccion = $datosApartamento[0]->Direccion;
    $habitaciones = $datosApartamento[0]->numHabitaciones;
    $ubicacion = $datosApartamento[0]->ubicacionMaps;
}

$visibleFotoDestacada = "none";
$imagenApartamentoID = "";
$rutaFotoDestacada = "";
$descripcionFotoDestacada = "";
$imagenApartamentoDestacadaID = "";

if (!empty($fotoDestacada)) {
    $visibleFotoDestacada = "content";
    $imagenApartamentoID = $fotoDestacada[0]->imagenApartamentoID;
    $rutaFotoDestacada = $fotoDestacada[0]->ubicacionImagen;
    $descripcionFotoDestacada = $fotoDestacada[0]->descripcionImagen;
    $imagenApartamentoDestacadaID = $fotoDestacada[0]->imagenApartamentoID;
}

$visibleFotosxApartamento = "none";

if (!empty($fotosApartamento)) {
    $visibleFotosxApartamento = "content";
}


?>
<div class="container">
    <br><br><br>
    <div class="row">
        <div>
            <h1>Registrar Nuevas imágenes</h1>
        </div>
    </div>
    <br><br>

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div>
                <h4>Información del Apartamento</h4>
            </div>
            <br>
            <div class="mb-3">
                <label class="form-label"><span class="badge bg-light text-dark">ID</span></label>
                <label class="form-label"><?php echo $apartamentoID ?></label>
                <label class="form-label"><span class="badge bg-light text-dark">Ciudad</span></label>
                <label class="form-label"><?php echo $ciudad ?></label>
                <label class="form-label"><span class="badge bg-light text-dark">País</span></label>
                <label class="form-label"><?php echo $pais ?></label>
                <label class="form-label"><span class="badge bg-light text-dark">Dirección</span></label>
                <label class="form-label"><?php echo $direccion ?></label>
                <label class="form-label"><span class="badge bg-light text-dark">Habitaciones</span></label>
                <label class="form-label"><?php echo $habitaciones ?></label>
            </div>

        </div>

        <br><br><br>

        <form method="POST" action="<?php echo base_url() ?>/public/apartamentos/fotos" enctype="multipart/form-data">
            <div>
                <h4>Registrar Nueva imágen</h4>
            </div>
            <input type="hidden" name="apartamentoID" name="apartamentoID" value="<?php echo $apartamentoID ?>">
            <br>
            <div class="row">
                <div class="mb-3">
                    <label for="descripcionFoto" class="form-label">Descripción de la foto</label>
                    <textarea class="form-control" name="descripcionFoto" aria-label="With textarea" required></textarea>
                    </textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                        <input type="file" name="fotoApartamento" class="form-control" id="fotoApartamento" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select name="fotoDestacada" class="form-select" required>
                            <option value="">Foto Destacada?</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <br>

            </div>
            <br>
            <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
                <br><br>
            </div>
        </form>
        <div style="display: <?php echo $visibleFotoDestacada; ?>;">
            <div>
                <h4>Imágen Destacada</h4>
            </div>
            <div class="row">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $rutaFotoDestacada; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Foto Destacada</h5>
                        <p class="card-text"><?php echo $descripcionFotoDestacada; ?></p>
                        <a href="<?php echo base_url() ?>/public/apartamentos/fotos?apartamentoID=<?php echo $apartamentoID  ?>&imagenApartamentoID=<?php echo $imagenApartamentoDestacadaID ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
        <div style="display: <?php echo $visibleFotosxApartamento; ?>;">
            <div>
                <h4>Otras Imagenes</h4>
            </div>

            <div class="row">
                <?php for ($i = 0; $i < count($fotosApartamento); $i++) : ?>
                    <div class="card" style="width: 18rem;">
                        <img src="<?= $fotosApartamento[$i]->ubicacionImagen; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= $fotosApartamento[$i]->descripcionImagen; ?></p>
                            <a href="<?php echo base_url() ?>/public/apartamentos/fotos?apartamentoID=<?php echo $apartamentoID  ?>&imagenApartamentoID=<?= $fotosApartamento[$i]->imagenApartamentoID ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <br><br>
    </div>