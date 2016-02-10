<?php
require_once 'lib/Model.php';

class UserModel extends Model{

    function __construct()
    {
//        echo 'En el UserModel<br>'; 
        parent::__construct();
    }

    public function delete($id)
    {
        $this->_sql = "DELETE FROM usuario WHERE id=$id";
        $this->executeQuery();
    }

    public function get($id)
    {
        $this->_sql = "SELECT usuario.*, role.role "
                . " FROM usuario INNER JOIN role "
                . " ON usuario.idRole = role.id  WHERE usuario.id = $id";
        $this->executeSelect();
        return $this->_rows[0];
    }

    public function getAll()
    {
        $this->_sql = "SELECT usuario.*, role.role "
                . "FROM usuario INNER JOIN role "
                . "ON usuario.idRole=role.id  ";
        $this->executeSelect();
        return $this->_rows;
    }

    public function insert($fila)
    {
        $this->_sql = "INSERT INTO usuario(nombre, password, idRole) "
                . "VALUES ('$fila[name]',"
                . " '$fila[password]',"
                . " '$fila[idRole]')";

        $this->executeQuery();
    }

    public function update($row)
    {
        $this->_sql = "UPDATE usuario SET nombre='$row[name]', "
                . "password='$row[password]',"
                . " idRole = $row[idRole]"
                . " WHERE id = $row[id]";
        $this->executeQuery();
    }

}