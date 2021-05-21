<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Apartamento;
use CodeIgniter\Controller;
use PhpParser\Node\Expr\Print_;

class LoginController extends Controller
{

    public function index()
    {
        $this->cerrarSesion();

        echo view('login/login_view');
    }


    public function registrarse()
    {
        $request = \Config\Services::request();
        $session =  session();
        $userID = $session->get('userID');

        echo view('layouts/header');

        if (!empty($userID)) {

            $user = new User();
            $datosUser = $user->llamarUser($userID);
            echo view('login/register_view', array("user" => $datosUser[0]));
        } else {
            echo view('login/register_view');
        }

        echo view('layouts/footer');
    }
    public function comprobarUsuario()
    {
        $request = \Config\Services::request();

        $email = $request->getPost('email');
        $contrasena = $request->getPost('contrasena');

        $user = new User();
        $result = $user->comprobarUsuario($email, $contrasena);
        $this->crearSesion($result);
        $this->irHome();
    }

    public function irHome()
    {
        $apartamento = new Apartamento();

        $fotos["fotosApartamento"] = $apartamento->traerFotosCompletas();

        //var_dump($fotos["fotoApartamento"]);
        echo view('layouts/header');
        echo view('/home_view', $fotos);
        echo view('layouts/footer');
    }


    private function crearSesion($user)
    {

        $id = $user[0]->userID;
        $nombre = $user[0]->nombre;
        $email = $user[0]->email;
        $pais = $user[0]->pais;
        $ciudad = $user[0]->ciudad;
        $rol = $user[0]->rol;

        $session =  session();
        $newData = [
            'userID' => $user[0]->userID,
            'nombre' => $user[0]->userID,
            'email' => $user[0]->email,
            'pais' => $user[0]->pais,
            'ciudad' => $user[0]->ciudad,
            'rol' => $user[0]->rol
        ];
        $session->set($newData);
    }

    public function cerrarSesion()
    {
        $session =  session();
        session_destroy();
    }
}
