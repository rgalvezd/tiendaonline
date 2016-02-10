<?php
require_once 'lib/Controller.php';
require_once 'model/RoleModel.php';

class User extends Controller
{

    public function __construct()
    {
        parent::__construct('User');
//        echo "Dentro de Index<br>";
    }   
   
    public function index()
    {
        //mostrar lista de todos los registros.
        $rows = $this->model->getAll();
        $this->view->render($rows);
    }
    
    public function add()
    {
        $roleModel = new RoleModel();
        $roles = $roleModel->getAll(false);        
        $this->view->add($roles);
    }
    
    public function insert()
    {
        $row = $_POST;  
        $row['password'] = md5($row['password']);
        $this->model->insert($row);    
        header('Location: ' . Config::URL . $_SESSION['lang'] . '/user/index');
    }
    public function delete($id)
    {
        $this->model->delete($id);    
        header('Location: ' . Config::URL . $_SESSION['lang'] . '/user/index');
    }
    
    public function edit($id, $error="")
    {
        $roleModel = new RoleModel();
        $roles = $roleModel->getAll(false);        
        $row = $this->model->get($id);        
        $this->view->edit($row, $error, $roles);
    }

    public function update()
    {
        $row = $_POST; 
        $error = $this->_validate($row);
        if (count($error)){
            $this->edit($row['id'], $error);
        }
        else{
            $row['password'] = md5($row['password']);
            $this->model->update($row);    
            header('Location: ' . Config::URL . $_SESSION['lang'] . '/user/index');
        }
    }
    
    private function _validate($row)
    {
        $error = array();
               
        if (!preg_match("/^.{6,20}$/", $row['password'])){
            $error['password'] = 'error_password';
        }
        
        return $error;
    }
    
}
