<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Apartamento;

class ApartamentoController extends Controller
{

    public function index()
    {
        $sesion = $this->revisarSesion();
        if ($sesion == 1) {


            $apartamento = new Apartamento();

            $datos["apartamentos"] = $apartamento->listarApartamentos();

            echo view('layouts/header');
            echo view('apartamentos/listarApartamentos_view', $datos);
            echo view('layouts/footer');
        } else {
            echo view('login/login_view');
        }
    }

    public function addApartamento()
    {
        $sesion = $this->revisarSesion();
        if ($sesion == 1) {

            $request = \Config\Services::request();
            $session = session();
            $userID = $session->get('userID');

            $apartamentoID = $request->getPost('apartamentoID');
            $ciudad = $request->getPost('ciudad');
            $pais = $request->getPost('pais');
            $direccion = $request->getPost('direccion');
            $habitaciones = $request->getPost('habitaciones');
            $ubicacion = $request->getPost('ubicacion');
            $tarifaNoche = $request->getPost('tarifaNoche');
            $descripcionApartamento = $request->getPost('descripcionApartamento');

            $apartamento = new Apartamento();

            if ($apartamentoID != '') {
                $apartamento->editApartamento($apartamentoID, $userID, $ciudad, $pais, $direccion, $habitaciones, $ubicacion, $tarifaNoche, $descripcionApartamento);
            } else {
                $apartamento->agregarApartamento($userID, $ciudad, $pais, $direccion, $ubicacion, $habitaciones, $tarifaNoche, $descripcionApartamento);
            }

            return redirect()->to('/public/apartamentos/');
        } else {
            echo view('login/login_view');
        }
    }

    public function registrarApartamento()
    {
        $sesion = $this->revisarSesion();
        if ($sesion == 1) {


            $request = \Config\Services::request();
            $id = $request->getGet('apartamentoID');

            echo view('layouts/header');

            if (!empty($id)) {
                $apartamento = new Apartamento();
                $datosApartamento = $apartamento->llamarApartamento($id);

                echo view('apartamentos/registrarApartamento_view', array("apartamento" => $datosApartamento[0]));
            } else {
                echo view('apartamentos/registrarApartamento_view');
            }
            echo view('layouts/footer');
        } else {
            echo view('login/login_view');
        }
    }

    public function deleteApartamento()
    {
        $sesion = $this->revisarSesion();
        if ($sesion == 1) {


            $request = \Config\Services::request();
            $id = $request->getGet("apartamentoID");
            $apartamento = new Apartamento();
            $apartamento->deleteApartamento($id);

            return redirect()->to('/public/apartamentos');
        } else {
            echo view('login/login_view');
        }
    }

    public function apartamentosxUsuario()
    {
        $sesion = $this->revisarSesion();
        if ($sesion == 1) {


            $session = session();
            $userID = $session->get('userID');

            $apartamento = new Apartamento();
            $apartamentosxUsuario['apartamentos'] = $apartamento->apartamentosxUsuario($userID);

            echo view('layouts/header');
            echo view('apartamentos/listarApartamentos_view', $apartamentosxUsuario);
            echo view('layouts/footer');
        } else {
            echo view('login/login_view');
        }
    }

    public function verFotosxApartamento()
    {

        $sesion = $this->revisarSesion();
        if ($sesion == 1) {


            $request = \Config\Services::request();
            $apartamento = new Apartamento();
            $apartamentoID = $request->getGet('apartamentoID');
            $imagenApartamentoID = $request->getGet('imagenApartamentoID');

            if (!empty($imagenApartamentoID)) {
                $apartamento->eliminarfotoApartamento($imagenApartamentoID);
            }

            $datosApartamento = $apartamento->llamarApartamento($apartamentoID);


            $fotoDestacada = $apartamento->verFotoDestacadaxApartamento($apartamentoID);
            $fotosxApartamento = $apartamento->verFotosxApartamento($apartamentoID);

            $informacionApartamento["datosApartamento"] = $datosApartamento;
            $informacionApartamento["fotoDestacada"] = $fotoDestacada;
            $informacionApartamento["fotosApartamento"] = $fotosxApartamento;

            //var_dump($informacionApartamento);

            echo view('layouts/header');
            echo view('apartamentos/fotosxApartamento', $informacionApartamento);
            echo view('layouts/footer');
        } else {
            echo view('login/login_view');
        }
    }

    public function guardarFotoApartamento()
    {
        $sesion = $this->revisarSesion();
        if ($sesion == 1) {

            $request = \Config\Services::request();
            $apartamento = new Apartamento();

            $apartamentoID = $request->getPost('apartamentoID');
            $fotoApartamento = $request->getFile('fotoApartamento');
            $destacada = $request->getPost('fotoDestacada');
            $descripcionFoto = $request->getPost('descripcionFoto');

            $nombreFotoApartamento = $fotoApartamento->getRandomName();
            $imageURL = "";

            if ($fotoApartamento->isValid() && !$fotoApartamento->hasMoved()) {
                $fotoApartamento->move("./uploads/images/apartamentos/apartamentoID{$apartamentoID}/", $nombreFotoApartamento);
                $imageURL = base_url() . "/public/uploads/images/apartamentos/apartamentoID{$apartamentoID}/" . $nombreFotoApartamento;
            }

            $apartamento->addFotoApartamento($apartamentoID, $imageURL, $destacada, $descripcionFoto);

            return redirect()->to("/public/apartamentos/fotos?apartamentoID={$apartamentoID}");
        } else {
            echo view('login/login_view');
        }
    }

    public function verApartamento()
    {

        $sesion = $this->revisarSesion();
        if ($sesion == 1) {

            $request = \Config\Services::request();
            $apartamento = new Apartamento();
            $apartamentoID = $request->getGet('apartamentoID');
            $disponibilidad = $request->getGet('disponibilidad');
            $imagenApartamentoID = $request->getGet('imagenApartamentoID');

            $datosApartamento = $apartamento->llamarApartamento($apartamentoID);
            $fotoDestacada = $apartamento->verFotoDestacadaxApartamento($apartamentoID);
            $fotosxApartamento = $apartamento->verFotosxApartamento($apartamentoID);

            $informacionApartamento["datosApartamento"] = $datosApartamento;
            $informacionApartamento["fotoDestacada"] = $fotoDestacada;
            $informacionApartamento["fotosApartamento"] = $fotosxApartamento;
            $informacionApartamento["disponibilidad"] = $disponibilidad;

            echo view('layouts/header');
            echo view('apartamentos/verApartamentos_view', $informacionApartamento);
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
