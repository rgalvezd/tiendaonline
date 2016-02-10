<?php
require_once 'lib/Controller.php';

class Error extends Controller
{

    public function __construct()
    {
        parent::__construct('Error');
//        echo "Dentro de Error<br>";
    }

    public function methodFail()
    {
//        echo "No existe el metodo <br>";
    }

    public function showMessage($message)
    {
        echo $message;
    }
    
    public function index()
    {
        $this->view->render();
    }

}
