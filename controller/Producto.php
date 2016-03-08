<?php

require_once 'lib/Controller.php';
require_once 'model/RoleModel.php';

class Producto extends Controller
{

    public function __construct()
    {
        parent::__construct('Producto');
//        echo "Dentro de Index<br>";
    }   
   
    public function index()
    {        
        //mostrar lista de todos los productos
        $rows = $this->model->getAll();
        $this->view->render($rows);
    }
    
    public function getPage(){
        $rows = $this->model->getPage($_POST['page']);
        echo json_encode($rows);
    }
    
    public function getNumPages()
    {
        $rows = $this->model->getCount();
//        echo $rows;
        echo json_encode($rows);
    }
    
    public function add()
    {
        $this->model->insert($_POST);
    }
    
    
    public function edit()
    {    
        $this->model->update($_POST);
    }
    
    
    public function delete()
    {
        $this->model->delete($_POST['id']);    
    }
    
    public function buy()
    {
//        $_SESSION['visitas'][$_POST['id']] = array('id' => $_POST['id'], 'nombre' => $_POST['nombre'], 'especie' => $_POST['especie']);
        $data = json_decode($_POST['data']);
        $item = $data[0];
        if (isset($_SESSION['cart'])) {
            if (array_key_exists($item->{'id'}, $_SESSION['cart'])) {
                $_SESSION['cart'][$item->{'id'}]['unidades'] += intval($item->{'unidades'});
            } else{
                $_SESSION['cart'][$item->{'id'}] = array('id' => $item->{'id'}, 'nombre' => $item->{'nombre'}, 'unidades' => intval($item->{'unidades'}), 'precio' => intval($item->{'precio'}));
            }
        }else{
            $_SESSION['cart'][$item->{'id'}] = array('id' => $item->{'id'}, 'nombre' => $item->{'nombre'}, 'unidades' => intval($item->{'unidades'}), 'precio' => intval($item->{'precio'}));
        }
//        var_dump($_SESSION['cart']);
        echo "Producto añadido";
    }
    
    public function filter()
    {
        $response = $this->model->filter($_POST['filter']);
        echo json_encode($response);
    }
}