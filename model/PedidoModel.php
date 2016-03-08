<?php

require_once 'lib/Model.php';

class PedidoModel extends Model{

   
    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->_sql = "SELECT pedido.*, usuario.nombre FROM pedido INNER JOIN usuario ON pedido.idUsuario = usuario.id ORDER BY pedido.id desc";
        $this->executeSelect();
        return $this->_rows;
    }
     
    public function delete($id){
        
    }

    public function insert($user)
    {
        $this->_sql = "INSERT INTO pedido(idUsuario) "
                . "VALUES (". $user .")";
        echo $this->_sql;
        $this->executeQuery();
//        sleep(1);
//        $this->_sql = "SELECT LAST_INSERT_ID() as id";
        $this->_sql = "SELECT MAX(id) as id FROM pedido";
        $this->executeSelect();
//        var_dump($this->_rows[0]['id']);
        
//        echo 'hola ahora si ' . $this->_last_id;
       return $this->_rows[0]['id'];
    }
    
    public function add($id, $cart){
        $linea = 1;
        foreach ($cart as $line){
            $idProd = $line['id'];
            $cantidad = $line['unidades'];
            $precio = $line['precio'];
            $this->_sql = "INSERT INTO detallepedido(idPedido, linea, idProducto, cantidad, precio) "
                    . "VALUES ( $id ,"
                    . " $linea ,"
                    . " $idProd ,"
                    . " $cantidad ,"
                    . " $precio )";
            $this->executeQuery();
            $linea++;
        }
    }

    public function get($id){
        
    }
    public function update($row)
    {        
       
    }
    
   
    public function getDetail($id){
        $this->_sql = "SELECT d.idProducto as id, cantidad as unidades, d.precio, p.nombre FROM detallepedido d INNER JOIN producto p ON d.idProducto = p.id WHERE idPedido=" . $id . " ORDER BY linea";
        $this->executeSelect();
        return $this->_rows;
    }
    
   
}

