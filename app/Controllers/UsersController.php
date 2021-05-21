<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User;
use PhpParser\Node\Stmt\Else_;

class UsersController extends Controller
{
    public function index()
    {
        $sesion = $this->revisarSesion();
        if ($sesion == 1) {


            $user = new User();

            $datos['users'] = $user->orderBy('userID', 'ASC')->findAll();

            echo view('layouts/header');
            echo view('users/listarUsuarios_view', $datos);
            echo view('layouts/footer');
        } else {
            echo view('login/login_view');
        }
    }


    public function addUser()
    {
        $request = \Config\Services::request();
        $userID = $request->getPost('userID');
        $nombre = $request->getPost('nombre');
        $email = $request->getPost('email');
        $pais = $request->getPost('pais');
        $ciudad = $request->getPost('ciudad');
        $contrasena = $request->getPost('contrasena');
        $rol = $request->getPost('rol');
        $foto = $request->getFile('foto');
        $nombreFoto = $foto->getRandomName();
        $imagePath = "";

        if ($foto->isValid() && !$foto->hasMoved()) {
            $foto->move('./uploads/images/', $nombreFoto);
            $imagePath = base_url() . "/public/uploads/images/" . $nombreFoto;
        }

        $user = new User();

        if ($userID != '') {
            $user->editUser($userID, $nombre, $email, $pais, $ciudad, $contrasena, $rol, $imagePath);
            return redirect()->to('/public/Home2');
        } else {
            $user->agregarUsuario($nombre, $email, $pais, $ciudad, $contrasena, $rol, $imagePath);
            return redirect()->to('/public/login');
        }

        
    }

    public function deleteUser()
    {

        $sesion = $this->revisarSesion();
        if ($sesion == 1) {


            $request = \Config\Services::request();
            $id = $request->getGet("userID");
            $user = new User();
            $user->deleteUser($id);

            return redirect()->to('/public/usuarios');
        } else {
            echo view('login/login_view');
        }
    }

    public function datosUsuario()
    {
        $sesion = $this->revisarSesion();
        if ($sesion == 1) {


            $session = session();
            $userID = $session->get('userID');

            $userObj = new User();
            $DatosUsuario['users'][0] = (array)($userObj->llamarUser($userID))[0];


            echo view('layouts/header');
            echo view('users/listarUsuarios_view', $DatosUsuario);
            echo view('layouts/footer');
        } else {
            echo view('login/login_view');
        }
    }


    public function revisarSesion()
    {
        $session =  session();

        $userID = $session->get('userID');

        if (is_null($userID)) {
            $sesionIniciada = 0;
            return $sesionIniciada;
        } else {
            $sesionIniciada = 1;
            return $sesionIniciada;
        }
    }
}
