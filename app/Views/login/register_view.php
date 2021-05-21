<?php 
$userID="";
$nombre="";
$email = "";
$pais="";
$ciudad="";
$rutaFotoUsuario = "";

$rutaEnvioFormulario = base_url()."/public/login/registrarse";
$rutaCancelar = base_url()."/public/login";

if(!empty($user))
{
    $userID = $user->userID;
    $nombre =  $user->nombre;
    $email = $user->email;
    $pais= $user->pais;
    $ciudad= $user->ciudad;
    $rutaFotoUsuario = $user->rutaFotoUsuario;


    $rutaEnvioFormulario = base_url()."/public/login/registrarse";
    $rutaCancelar = base_url()."/public/Home2";

}
$displayFoto="none";
if($rutaFotoUsuario != ""){$displayFoto = 'content';}


?>

<div class="container">
    <form method="POST" action="<?php echo  $rutaEnvioFormulario  ?>" enctype="multipart/form-data">

        <br><br><br>
        <div>
            <h1>Registrarse</h1>
        </div>
        <div class="row">
            <div style="max-height: 200px; height: 200px; display: <?php echo $displayFoto ?>;">
                <img style="max-height: 200px;" src="<?php echo $rutaFotoUsuario?>"  class="img-thumbnail" alt="foto" >
            </div>
            

            <br><br>
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Completo</label>
                    <input type="text" value="<?php echo $nombre;?>" name="nombre" va class="form-control" id="nombre" required>
                </div>

            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="<?php echo $email;?>" name="email" class="form-control" id="email" required>
                    <input type="hidden" value="<?php echo $userID;?>" name="userID">
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="pais" class="form-label">País</label>
                    <input type="text" value="<?php echo $pais;?>" name="pais" class="form-control" id="pais" required>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <input type="text" value="<?php echo $ciudad;?>" name="ciudad" class="form-control" id="ciudad" required>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="contrasena" class="form-control" id="password" required>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label for="foto" class="form-label">Imágen</label>
                    <input type="file" name="foto" class="form-control" id="foto">
                </div>
            </div>
            <br><br><br>

        </div>
        <div class="row">
            <div class="col-2">
                <select name="rol" class="form-select" required >
                    <option value="">Seleccione Usuario</option>
                    <option value="anfitrion">Anfitrion</option>
                    <option value="invitado">Invitado</option>
                </select>
            </div>
        </div>
        <br><br><br>
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="<?php echo $rutaCancelar ?>" class="btn btn-primary" role="button">Cancelar</a>
            </div>
        </div>
        <br><br><br>
    </form>
</div>