<?php

/*
 * Classe envoltorio (wraper) de cualquier controller para uso seguro
 * de acuerdo a las ACL
 */
require_once 'lib/Acl.php';

class SecureController
{

    protected $target = null;
    protected $acl = null;

    public function __construct($target)
    {
        $this->target = $target; //Controlador envuelto
        $this->acl = new Acl; //acl con los permisos
    }

    public function __call($method, $arguments)
    {
        if(!method_exists( $this->target, $method )){
            throw new Exception('Método no disponible', 404);            
        }
        if ($this->acl->isAllowed(get_class($this->target), $method, $_SESSION['accessLevel'] )) {
            $msg = 'voy a llamar al método ' . $method . ' del objeto ' . get_class($this->target) ;
            
            return call_user_func_array(
                    array($this->target, $method), $arguments
            );
        } else {
            throw new Exception('Acceso bloqueado. No tiene permiso', 403);            
        }
    }

}
