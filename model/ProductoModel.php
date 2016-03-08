<?php

require_once 'lib/Model.php';

class ProductoModel extends Model{

    private $_elements_per_page = 2;
    
    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->_sql = "SELECT * from producto";
        $this->executeSelect();
        return $this->_rows;
    }
    
    public function getPage($page)
    {
        $page = $page * $this->_elements_per_page;
        $this->_sql = "SELECT * from producto LIMIT " .$page.", " . $this->_elements_per_page;
        $this->executeSelect();
        return $this->_rows;        
    }
    
    public function getCount() 
    {
        $this->_sql = "SELECT CEILING(COUNT(*)/" . $this->_elements_per_page . ")as numPages FROM producto";
        $this->executeSelect();
        return $this->_rows;
    }


    public function delete($id){
        $this->_sql = "DELETE FROM producto WHERE id=" . $id;
        $this->executeQuery();
    }

    public function insert($row)
    {
        $this->_sql = "INSERT INTO producto(codigo, nombre, precio,existencia) "
                . "VALUES ('$row[codigo]',"
                . " '$row[nombre]',"
                . " '$row[precio]',"
                . " '$row[existencia]')";
        $this->executeQuery();
    }

    public function update($row)
    {        
        $this->_sql = "UPDATE producto SET codigo='$row[codigo]', "
                . "nombre='$row[nombre]',"
                . " precio = $row[precio],"
                . " existencia = $row[existencia]"
                . " WHERE id = $row[id]";
        $this->executeQuery();
    }
    
    public function numberOfPages(){
        $this->_sql = "SELECT CEILING(COUNT(*)/" . $this->_elements_per_page . ") AS pages "
                . "FROM producto";
        $this->executeSelect();
        return $this->_rows[0][pages];
    }

    public function get($id){

        $productoPedido = $this->_sql = "SELECT * FROM producto WHERE id= ".$id;
        $this->executeSelect();                
        return $productoPedido;
    }
    
    public function filter($str)
    {
        $this->_sql = "SELECT * FROM producto WHERE nombre like '%$str%'";
        $this->executeSelect();
        return $this->_rows;
    }
}