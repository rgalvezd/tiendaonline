<?php
require_once 'lib/Controller.php';

class Index extends Controller
{
    public function __construct()
    {
        parent::__construct('Index');
//        echo "Dentro de Index<br>";
    }
    
    public function __toString(){
        return 'INDEX';
    }
    
    public function index()
    {
        $this->view->render();

    }
}