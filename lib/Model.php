<?php
require_once 'lib/Config.php';

abstract class Model {

    protected $_sql;
    protected $_rows = array();
    private $_connection;

# métodos abstractos para ABM de clases que hereden
    abstract protected function getAll();
    abstract protected function get($numero);
    abstract protected function insert($fila);
    abstract protected function update($fila);
    abstract protected function delete($numero);
    
# los siguientes métodos pueden definirse con exactitud
# y no son abstractos
# Conectar a la base de datos
    public function __construct()
    {
//        echo 'en el Model.php<br>';
    }

    private function openConection() {
        $this->_connection = new mysqli(Config::DBHOST, Config::DBUSER, Config::DBPASSWORD, Config::DBNAME);
        if ($this->_connection->connect_errno > 0) {
            throw new Exception('Imposible abrir la base de datos', 404);            
        }
        else{
        }
    }

# Desconectar la base de datos

    private function closeConnection() {
        $this->_connection->close();
    }

# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE

    protected function executeQuery() {
        $this->openConection();
        $result = $this->_connection->query($this->_sql);
        if ($this->_connection->errno) {
            throw new Exception('Error SQL: ' . $this->_sql, 404);            
//            die($this->_connection->error);
        }
        $this->closeConnection();
        return $result;               
    }

# Traer resultados de una consulta en un Array

    protected function executeSelect() 
    {
        $this->openConection();
        $result = $this->_connection->query($this->_sql);
        if ($this->_connection->errno) {
            throw new Exception('Error SQL: ' . $this->_sql, 404);            
//            die($this->_connection->error);
        }
        while ($this->_rows[] = $result->fetch_assoc());
        $result->close();
        $this->closeConnection();
        array_pop($this->_rows);
    }

}
