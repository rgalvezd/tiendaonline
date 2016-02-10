<?php
require_once 'lib/SecureController.php';


class Boot
{

    function __construct()
    {
//        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);        
        error_reporting(E_ERROR );        
        
        $url = $this->_getUrl();
        
        $lang = array_shift($url);        
        session_start();
        $this->_setLanguage($lang);
        
        if(!isset($_SESSION['accessLevel'])){
            $_SESSION['accessLevel']=0;
//            $_SESSION['user']='Anonymous';
        }      
        
        
                
//        $_SESSION['user']=".....";
//        $_SESSION['idUser']=2;
                
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
            
            $url[] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0, 2);            
            $url[] = 'index';
        }
        return $url;
    }
    
    private function _setLanguage($lang)
    {
        $file = 'lang/' . $lang . '.php';
        if(!file_exists($file)){
            $lang = Config::DEFAULT_LANG;
        }
        
        $_SESSION['lang'] = $lang;
    }
    
    private function _loadController($url)
    {
        $controller = ucfirst($url[0]);
        $fileController = 'controller/' . $controller . '.php';

        if (!file_exists($fileController)) {
            throw new Exception('Controlador no disponible', 404);            
        }
        require_once $fileController;
        $app = new $controller;
        
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
