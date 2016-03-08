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
            'index' => 0,
            'add' => 0,
            'edit' => 3,
            'delete' => 3,
            'update' => 3,
            'insert' => 0
        ),
        
        'login' => array(
            'index' => 0,
            'login' => 0,
            'logout' => 0
        ),
        'producto' => array(
            'index' => 0,
            'add' => 3,
            'edit' => 3,
            'delete' => 3,
            'buy' => 2,
            'filter' => 0
        ),
        'pedido' => array(
            'index' => 2,
            'getDetail' => 3,
            'add' => 2
        )
    );
    public function __construct($idUsuario)
    {
//        $this->_acl = cargarAclDelUsuario;
    }
    
    public function isAllowed($className, $method, $accessLevel)
    {
//        echo 'is allowed ' . $accessLevel . '<br>';
        $className = strtolower($className);
        if (isset($this->_acl[$className][$method])){
            return  $accessLevel >= $this->_acl[$className][$method] ; 
        }
        else {return true;}
    }
}
