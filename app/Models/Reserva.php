<?php

namespace App\Models;

use CodeIgniter\Model;

class Reserva extends Model
{



    public function listarApartamentosBusqueda()
    {
        $sql = "SELECT * FROM apartamentos";
        $query = $this->db->query($sql);

        return $query->getResult();
    }

    public function reservarApartamento($fechaInicio, $fechaFinal, $totalTarifa, $apartamentoID, $userID)
    {
        $sql = "INSERT INTO reservasapartamentos (fechaInicio, fechaFinal, disponible, totalTarifa, apartamentoID, userID) VALUES('{$fechaInicio}', '{$fechaFinal}', 0, {$totalTarifa}, {$apartamentoID}, {$userID})";

        $this->db->query($sql);
    }

    public function buscarDisponibilidad($fechaInicio, $fechaFinal, $destino)
    {
        $sql = "
        select apartamentos.apartamentoID, apartamentos.userID, apartamentos.Ciudad, apartamentos.Pais, apartamentos.Direccion, apartamentos.ubicacionMaps, apartamentos.tarifaNoche, apartamentos.numHabitaciones, apartamentos.descripcionApartamento, fechaInicio, reservasapartamentos.disponible 
            FROM apartamentos 
            LEFT JOIN reservasapartamentos on apartamentos.apartamentoID = reservasapartamentos.apartamentoID 
            WHERE 	(('{$fechaInicio}' NOT BETWEEN fechaInicio AND fechaFinal) OR fechaInicio IS NULL) 
                AND (( '{$fechaFinal}' NOT BETWEEN fechaInicio AND fechaFinal) OR fechaFinal IS NULL) 
                AND apartamentos.Ciudad = '{$destino}'
                AND NOT EXISTS (SELECT * FROM reservasapartamentos 
                                WHERE '{$fechaInicio}' NOT BETWEEN fechaInicio AND fechaFinal
                                AND '{$fechaFinal}' NOT BETWEEN fechaInicio AND fechaInicio
                                AND reservasapartamentos.apartamentoID = apartamentos.apartamentoID)
                ";

        echo $sql;

        $query = $this->db->query($sql);
        //var_dump($query->getResult);
        return $query->getResult();
    }

    public function buscarDisponibilidadApartamento($fechaInicio, $fechaFinal, $apartamentoID)
    {

        $sql = "
        select apartamentos.apartamentoID, apartamentos.userID, apartamentos.Ciudad, apartamentos.Pais, apartamentos.Direccion, apartamentos.ubicacionMaps, apartamentos.tarifaNoche, apartamentos.numHabitaciones, apartamentos.descripcionApartamento
            FROM apartamentos 
            WHERE NOT EXISTS(SELECT * FROM reservasapartamentos 
                 WHERE apartamentoID= {$apartamentoID}
                 AND '{$fechaInicio}' BETWEEN fechaInicio AND fechaFinal
                 OR '{$fechaFinal}' BETWEEN fechaInicio AND fechaFinal
                )
		        AND apartamentoID= {$apartamentoID};
            ";
        //echo $sql, "<br>";
        $query = $this->db->query($sql);

        //var_dump(($query->getResult())[0]);

        if (sizeof($query->getResult()) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function listarReservas($userID)
    {
        $sql = "SELECT reservasapartamentos.reservaApartamentoID, reservasapartamentos.fechaInicio, reservasapartamentos.fechaFinal, reservasapartamentos.totalTarifa, 
                reservasapartamentos.apartamentoID, apartamentos.Ciudad, apartamentos.Pais, apartamentos.Direccion, apartamentos.tarifaNoche
                FROM reservasapartamentos 
                INNER JOIN apartamentos ON apartamentos.apartamentoID = reservasapartamentos.apartamentoID
                WHERE reservasapartamentos.userID = {$userID}";
        $query = $this->db->query($sql);

        return $query->getResult();
    }

    public function eliminarReserva($reservaApartamentoID)
    {
        $sql = "DELETE FROM reservasapartamentos WHERE reservaApartamentoID = {$reservaApartamentoID}";

        //echo $sql, "<br>", $reservaApartamentoID;
        $this->db->query($sql);
    }

}
