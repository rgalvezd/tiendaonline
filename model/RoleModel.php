<?php
require_once 'lib/Model.php';

class RoleModel extends Model{

    function __construct()
    {
        parent::__construct();
    }

    public function delete($numero)
    {
         
    }

    public function get($numero)
    {
        
    }

    public function getAll($guest = true)
    {
        if ($guest){
            $this->_sql = "SELECT *"
                . " FROM role ";
        } else{
            $this->_sql = "SELECT *"
                . " FROM role "
                . " WHERE id<>1";            
        }
        $this->executeSelect();
        return $this->_rows;
    }

    public function insert($fila)
    {
        
    }

    public function update($fila)
    {
        
    }

}