<?php

class Controller{
    public $view;
    public $model;

    function __construct($child="")
    {
        $filename = 'view/' . $child . 'View.php';
        if(file_exists($filename)){
            require_once $filename;
            $className = $child . 'View';
            $this->view = new $className ;
        }

        $filename = 'model/' . $child . 'Model.php';
        if(file_exists($filename)){
            require_once $filename;
            $className = $child . 'Model';
            $this->model = new $className ;
        }
//        echo 'Dentro de controller padre<br>';
    }

}