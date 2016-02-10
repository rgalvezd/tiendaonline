<?php
require_once 'lib/Controller.php';

class Help extends Controller
{

    public function __construct()
    {
        parent::__construct('Help');
//        echo "Dentro de Help<br>";
    }
    public function index()
    {
//        echo "Metodo por defecto index";
        $this->view->render();
    }


}
