<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Apartamento;
use App\Models\Reserva;
use DateTime;

class ReservasController extends Controller
{

    public function index()
    {
        $sesion = $this->revisarSesion();
        if ($sesion == 1) {


            $apartamento = new Apartamento();

            $datos["apartamentos"] = $apartamento->listarApartamentos();
            $datos["fotosDestacadas"] = $apartamento->traerFotosCompletasDestacadas();

            echo view('layouts/header');
            echo view('reservas/reservas_view', $datos);
            echo view('layouts/footer');
        } else {
            echo view('login/login_view');
        }
    }

    public function buscarApartamentos()
    {
        $sesion = $this->revisarSesion();
        if ($sesion == 1) {


            $request = \Config\Services::request();
            $fechaInicio = $request->getPost('fechaInicio');
            $fechaFinal = $request->getPost('fechaFinal');
            $destino = $request->getPost('destino');

            $apartamento = new Apartamento();


            $reserva = new Reserva();

            $datos["apartamentos"] = $reserva->buscarDisponibilidad($fechaInicio, $fechaFinal, $destino);
            $datos["fotosDestacadas"] = $apartamento->traerFotosCompletasDestacadas();

            echo view('layouts/header');
            echo view('reservas/reservas_view', $datos);
            echo view('layouts/footer');
        } else {
            echo view('login/login_view');
        }
    }

    public function reservarApartamento()
    {
        $sesion = $this->revisarSesion();
        if ($sesion == 1) {


            $request = \Config\Services::request();
            $session = session();
            $reserva = new Reserva();

            $apartamento = new Apartamento();

            $apartamentoID = $request->getPost("apartamentoID");
            $fechaInicio = $request->getPost("fechaInicio");
            $fechaFinal = $request->getPost("fechaFinal");
            $userID = $session->get('userID');
            $tarifaNoche = $request->getPost('tarifaNoche');


            $fecha1 = new DateTime($fechaInicio);
            $fecha2 = new DateTime($fechaFinal);

            $result = $fecha1->format('Y-m-d H:i:s');
            $result2 = $fecha2->format('Y-m-d H:i:s');

            $diff = $fecha1->diff($fecha2);


            $tarifaFinal = floatval($diff->days) * floatval($tarifaNoche);


            //revisar Disponibilidad
            $disponibilidad  = $reserva->buscarDisponibilidadApartamento($fechaInicio, $fechaFinal, $apartamentoID);
            //print_r($disponibilidad);
            
            if ($disponibilidad == 1) {
                $reserva->reservarApartamento($fechaInicio, $fechaFinal, $tarifaFinal, $apartamentoID,  $userID);
                
                return redirect()->to('/public/buscarApartamentos');
            } else {
                
                
                return redirect()->to("/public/apartamentos/verApartamento?apartamentoID={$apartamentoID}&disponibilidad={$disponibilidad}");
            }
            
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

    

    public function listarReservas()
    {
        $session =  session();

        $userID = $session->get('userID');

        $sesion = $this->revisarSesion();
        if ($sesion == 1) {

            $reserva = new Reserva();

            $reservas["reservas"] = $reserva->listarReservas($userID);

            echo view('layouts/header');
            echo view('reservas/misReservas_view', $reservas);
            echo view('layouts/footer');


        } else {
            echo view('login/login_view');
        }
    }


    public function eliminarReserva()
    {
        $request = \Config\Services::request();
        $reservaApartamentoID = $request->getGet('reservaApartamentoID');

        $session =  session();
        $userID = $session->get('userID');

        $reserva = new Reserva();
        $reserva->eliminarReserva($reservaApartamentoID);

        //echo "entra al controller";

        return redirect()->to('/public/usuario/reservas');

    }


}
