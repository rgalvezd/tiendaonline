<?php
require_once 'smarty/libs/Smarty.class.php';

class View{
    public $smarty;
    private $_method;
            
            
    
    function getMethod()
    {
        return $this->_method;
    }

    function setMethod($method)
    {
        $this->_method = $method;
    }

    
    function __construct()
    {
       
        //preparar smarty
        $this->smarty = new Smarty();
        $this->smarty->template_dir = 'template';
        $this->smarty->compile_dir = 'tmp';
        
        //asignar variables para las cabeceras/pies
        $this->smarty->assign('url', Config::URL);
//        echo 'En la Vista padre <br>';
    }    
    
}