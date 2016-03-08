<?php
require_once 'lib/Model.php';

class LoginModel extends Model{
   
    function __construct()
    { 
        parent::__construct();
    }
    
    function validateUser($user, $password){
        $this->_sql = "SELECT * FROM usuario WHERE nombre='$user' AND password='$password'";
        $this->executeSelect(); 
        return $this->_rows[0];
    }

    protected function delete($numero) {

    }

    protected function get($numero) {
        
    }

    protected function getAll() {
        
    }

    protected function insert($fila) {
        
    }

    protected function update($fila) {
        
    }

}