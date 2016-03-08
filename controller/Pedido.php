<?php

require_once 'lib/Controller.php';
require_once 'model/RoleModel.php';

class Pedido extends Controller
{
     public function __construct()
    {
        parent::__construct('Pedido');
//        echo "Dentro de Index<br>";
    }  
    
    // if role 3 servir todos los pedidos, sino servir solo los pedidos de usuario
    public function index(){
        $rows = null;
        if($_SESSION['role'] != 3){
            $this->view->cart();
        }else{
            //mostrar lista de todos los productos añadidos al carro
            $rows = $this->model->getAll();
            $this->view->render($rows);
        }
        
    }
    
    // getCart y getDetail puede ser el mismo metodo y modificar la presentación de datos segun variable
    // Si variable = -1 getCart sino getDetail
    
    
    public function detail($id){
        $rows = $this->model->getDetail($id);
        $this->view->detail($rows);
        
    }
    
    public function add(){
        if (isset($_SESSION['cart'])) {
            echo 'Usuario con id: ' .$_SESSION['userId'];
            $idPedido = $this->model->insert($_SESSION['userId']);
            $cart = $_SESSION['cart'];
            $this->model->add($idPedido, $cart);
            unset($_SESSION['cart']);
            $this->view->finish($idPedido);
        } else{
//            $this->view->finish(-1);
            throw new Exception('El carrito esta vacio', 403);
        }
        
    }
    
    public function edit(){
        
    }
    
    public function delete(){
        
    }
}
