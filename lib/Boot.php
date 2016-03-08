<?php
require_once 'lib/SecureController.php';


class Boot
{

    function __construct()
    {
//        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);        
        error_reporting(E_ERROR );        
        
        $url = $this->_getUrl();
        
        session_start();
        
        if(!isset($_SESSION['userLog'])){
            $_SESSION['role']=1;
            $_SESSION['userLog']="Invitado";
        }      
        
//        echo 'Role ' . $_SESSION['role'];
        
        try {
            $this->_loadController($url);
        } catch (Exception $ex) {
            $this->_dealError($ex);

        }
    }
    
   
    private function _getUrl(){
        if (isset($_GET['url'])) {
            $url = $_GET;
           $url = rtrim($_GET['url'], "/");
            $url = explode("/", $url);
        } else {
            $url[] = 'index';
        }
        
        
        return $url;
    }
    
    private function _loadController($url)
    {
//        var_dump($url);
        $controller = ucfirst($url[0]);
        $fileController = 'controller/' . $controller . '.php';

        if (!file_exists($fileController)) {
            throw new Exception('Controlador no disponible', 404);            
        }
//        echo 'por aqui con filecontroller ' . $fileController . '<br>';
        require_once $fileController;
//    echo 'por aqui con controller ' . $controller .'<br>';
        $app = new $controller;
//        echo 'sigo';
        $app = new SecureController($app);

        $this->_callMethod($app, $url);        
    }
    //comprobacion de la existencia de método y su invocación 
    //con los argumentos pasados un la url.
    private function _callMethod($app, $url)
    {
        if (isset($url[1])) {
            $method = $url[1];
//            if (!method_exists($app, $method)) {
//                throw new Exception('Método no disponible', 404);            
//            }
            switch (count($url)) {
                case 3:
                    $app->$method($url[2]);
                    break;
                case 4:
                    $app->$method($url[2], $url[3]);
                    break;
                case 5:
                    $app->$method($url[2], $url[3], $url[4]);
                    break;
                case 6:
                    $app->$method($url[2], $url[3], $url[4], $url[5]);
                    break;
                default :
                    $app->$method();
                    break;
            }
        } 
        else {
            $app->index();
        }
    }
    
    private function _dealError($ex)
    {
        $controller = 'Error';
        $fileController = 'controller/' . $controller . '.php';
        require_once $fileController;
        $error = new $controller;
//            $error->showMessage('Fallo, el controlador no existe <br>');
        $error->view->render($ex);
        exit;        
    }

}
