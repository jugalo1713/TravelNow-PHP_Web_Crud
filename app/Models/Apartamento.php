<?php 
namespace App\Models;

use CodeIgniter\Model;

class Apartamento extends Model{
    protected $table      = 'apartamentos';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';

    protected $primaryKey = 'apartamentoID';
    protected $allowedFields = ['apartamentoID', 'userID', 'Ciudad', 'Pais', 'Direccion', 'ubicacionMaps', 'numHabitaciones'];

    function agregarApartamento($userID, $ciudad, $pais, $direccion, $ubicacionMaps, $numHabitaciones, $tarifaNoche, $descripcionApartamento)
    {
        $sql = "INSERT INTO apartamentos (userID, Ciudad, Pais, Direccion, ubicacionMaps, numHabitaciones, tarifaNoche, descripcionApartamento) VALUES({$userID},'{$ciudad}','{$pais}', '{$direccion}', '{$ubicacionMaps}', {$numHabitaciones}, {$tarifaNoche}, '{$descripcionApartamento}') ";

        var_dump($sql);

        $this->db->query($sql);
    }

    
    public function llamarApartamento($id)
    {
        $sql = "SELECT * FROM apartamentos WHERE apartamentoID = '{$id}'";
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function deleteApartamento($id)
    {
        $sql = "DELETE FROM apartamentos WHERE apartamentoID = '{$id}'";
        $this->db->query($sql);
    }

    public function editApartamento($apartamentoID, $userID, $ciudad, $pais, $direccion, $habitaciones, $ubicacion, $tarifaNoche, $descripcionApartamento)
    {
      
        $sql = "UPDATE apartamentos SET userID = '{$userID}', Ciudad = '{$ciudad}', Pais = '{$pais}', Direccion = '{$direccion}', ubicacionMaps = '{$ubicacion}', numHabitaciones = {$habitaciones}, tarifaNoche = {$tarifaNoche}, descripcionApartamento = '{$descripcionApartamento}' WHERE apartamentoID = {$apartamentoID}";
        
        $this->db->query($sql);
    }

    public function apartamentosxUsuario($userID)
    {
        $sql = "SELECT * FROM apartamentos WHERE userID = {$userID}";
        $query = $this->db->query($sql);

        return $query->getResult();
    }
    public function listarApartamentos()
    {
        $sql = "SELECT * FROM apartamentos";
        $query = $this->db->query($sql);

        return $query->getResult();
    }
    public function addFotoApartamento($apartamentoID, $ubicacionImagen, $destacada, $descripcionImagen)
    {
        if($destacada == 1)
        {
            $sql = "DELETE FROM imagenesapartamentos WHERE apartamentoID = {$apartamentoID} AND destacada = 1";
            
            $this->db->query($sql);
        }
        
        $sql = "INSERT INTO imagenesapartamentos (apartamentoID, ubicacionImagen, destacada, descripcionImagen) VALUES ('{$apartamentoID}', '{$ubicacionImagen}', '{$destacada}', '{$descripcionImagen}');";

        $this->db->query($sql);
    }

    public function verFotosxApartamento($apartamentoID)
    {
        $sql = "SELECT * FROM imagenesapartamentos WHERE apartamentoID = {$apartamentoID} AND destacada = 0";
        $query = $this->db->query($sql);
        return $query->getResult();
        
    }

    public function verFotoDestacadaxApartamento($apartamentoID)
    {
        $sql = "SELECT * FROM imagenesapartamentos WHERE apartamentoID = {$apartamentoID} AND destacada = 1";
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function eliminarfotoApartamento($imagenApartamentoID)
    {
        $sql = "DELETE FROM imagenesapartamentos WHERE imagenApartamentoID = {$imagenApartamentoID}";
        $this->db->query($sql);
    }

    public function traerFotosCompletas()
    {
        $sql = "SELECT * FROM imagenesapartamentos";
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function traerFotosCompletasDestacadas()
    {
        $sql = "SELECT * FROM imagenesapartamentos WHERE destacada = 1";
        $query = $this->db->query($sql);
        return $query->getResult();
    }


}

