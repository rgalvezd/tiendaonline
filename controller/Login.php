<?php

require_once 'lib/Controller.php';
require_once 'model/LoginModel.php';

class Login extends Controller{

     public function __construct()
    {
        parent::__construct('Login');
//        echo "Dentro de Index<br>";
    }
    
    public function __toString(){
        return 'LOGIN';
    }
    
    public function index(){
//        echo 'en login <br>';
        $this->view->render();
    }
    
    public function login(){
        if($_SESSION['autologin'] == 'si'){
            $userToValidate = $_SESSION['userToValidate'];
            $_SESSION['autologin'] = 'no';
            $_SESSION['userToValidate'] = "";
        } else{
            $userToValidate = $_POST;
        }
        $userLog = $this->model->validateUser($userToValidate['name'], md5($userToValidate['password']));
        if($userLog){
            $_SESSION['userId'] = $userLog['id'];
            $_SESSION['role'] = $userLog['idRole'];
            $_SESSION['userLog'] = $userLog['nombre'];
//            var_dump($userLog);
            header('Location: ' . Config::URL . 'index');
        } else{
            $this->view->render('Usuario o contraseña no validos, intentelo de nuevo');
        }
    }
    
    public function logout(){
        session_unset();
        session_destroy();
        header('Location: ' . Config::URL . 'index');
    }
}




//require_once 'lib/Controller.php';
//require_once 'model/LoginModel.php';
////require_once 'model/RoleModel.php';
//class Login extends Controller{
//   
//    public function __construct()
//    {
//        
//        parent::__construct('Login');
//
//    }
//    
//   public function login(){
//        
//    }
//    
//    public function logeado(){
//        $datosRecibidos = $_POST;        
//            $datosRecibidos['password'] = md5($datosRecibidos['password']);
//            $response = $this->model->logeado($datosRecibidos); 
//            if($response){
//                session_start();
//                $_SESSION['idUsuario'] = $response['id'];
//                $_SESSION['perm'] = $response['idRole'];
//                $_SESSION['nombre'] = $response['nombre'];
//                $this->view->render();
//            }else{
//                $_SESSION['perm'] = '1';
//                $_SESSION['nombre'] = 'Sesion Invitado';
//                $this->view->render();
//            }              
//    }