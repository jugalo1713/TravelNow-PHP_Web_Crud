<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table      = 'users';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'userID';
    protected $allowedFields = ['nombre', 'email', 'pais', 'ciudad', 'contrasena', 'rol'];

    function agregarUsuario($nombre, $email, $pais, $ciudad, $contrasena, $rol, $imagePath)
    {
        $sql = "INSERT INTO users (nombre, email, pais, ciudad, contrasena, rol, rutaFotoUsuario) VALUES('{$nombre}','{$email}','{$pais}', '{$ciudad}', '{$contrasena}', '{$rol}', '{$imagePath}')";

        //echo $sql;

        $this->db->query($sql);
    }

    public function comprobarUsuario($email, $contrasena)
    {
        $sql = "SELECT * FROM users WHERE email = '{$email}' AND contrasena = '{$contrasena}'";
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function llamarUser($id)
    {
        $sql = "SELECT * FROM users WHERE userID = '{$id}'";
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE userID = '{$id}'";
        $this->db->query($sql);
    }

    public function editUser($userID, $nombre, $email, $pais, $ciudad, $contrasena, $rol, $imagePath)
    {
        $sql = "UPDATE users SET nombre = '{$nombre}', email = '{$email}', pais = '{$pais}', ciudad = '{$ciudad}', contrasena = '{$contrasena}', rol = '{$rol}', rutaFotoUsuario = '{$imagePath}'  WHERE userID = {$userID} ";

        $this->db->query($sql);
    }

   

}
