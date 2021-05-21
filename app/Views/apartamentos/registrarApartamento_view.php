<?php 
$apartamentoID="";
$userID="";
$ciudad = "";
$pais="";
$direccion="";
$habitaciones="";
$ubicacion="";
$tarifaNoche=100000;
$descripcionApartamento = "";

if(!empty($apartamento))
{
        
    $apartamentoID=$apartamento->apartamentoID;
    $userID=$apartamento->userID;
    $ciudad = $apartamento->Ciudad;
    $pais=$apartamento->Pais;
    $direccion=$apartamento->Direccion;
    $habitaciones=$apartamento->numHabitaciones;
    $ubicacion=$apartamento->ubicacionMaps;
    $tarifaNoche = $apartamento->tarifaNoche;
    $descripcionApartamento = $apartamento->descripcionApartamento;
}

?>

<div class="container">
    <form method="POST" action="<?php echo base_url() ?>/public/apartamentos/registrar">

        <br><br><br>
        <div>
            <h1>Registrar Apartamentos</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <input type="text" value="<?php echo $ciudad;?>" name="ciudad" class="form-control" id="ciudad" required>
                </div>

            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="pais" class="form-label">Pais</label>
                    <input type="text" value="<?php echo $pais;?>" name="pais" class="form-control" id="pais" required>
                    <input type="hidden" value="<?php echo $apartamentoID;?>" name="apartamentoID">
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" value="<?php echo $direccion;?>" name="direccion" class="form-control" id="direccion" required>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="habitaciones" class="form-label">Habitaciones</label>
                    <input type="number" value="<?php echo $habitaciones;?>" name="habitaciones" class="form-control" id="habitaciones" required>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="ubicacion" class="form-label">Ubicación</label>
                    <input type="text" name="ubicacion" value="<?php echo $ubicacion;?>" class="form-control" id="ubicacion" required>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="tarifaNoche" class="form-label">Tarifa</label>
                    <input type="number" name="tarifaNoche" value="<?php echo $tarifaNoche;?>" class="form-control" id="tarifaNoche" required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="descripcionApartamento" class="form-label">Descripción Apartamento</label>
                    <input type="text" name="descripcionApartamento" value="<?php echo $descripcionApartamento;?>" class="form-control" id="descripcionApartamento" required>
                </div>
            </div>
            <br><br><br>

        </div>
        <br><br><br>
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="<?php echo base_url()?>/public/home" class="btn btn-primary" role="button">Cancelar</a>
            </div>
        </div>
    </form>
</div>