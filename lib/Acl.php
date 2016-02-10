<?php

/* 
 * Clase con los permisos asiginados a un role:
 * Relación ROLE-RESOURCE
 */
//0, 1, 2

class Acl{
    private $_acl = array(
        'index' => array(
            'index' => 0,
            'hello' => 0
        ),
        
        'user' => array(
            'index' => 2,
            'add' => 2,
            'edit' => 2,
            'delete' => 2,
            'update' => 2,
            'insert' => 2
        )
    );
    public function __construct($idUsuario)
    {
//        $this->_acl = cargarAclDelUsuario;
    }
    
    public function isAllowed($className, $method, $accessLevel)
    {
        $className = strtolower($className);
        if (isset($this->_acl[$className][$method])){
            return  $accessLevel >= $this->_acl[$className][$method] ; 
        }
        else {return true;}
    }
}
