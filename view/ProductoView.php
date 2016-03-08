<?php

require_once 'lib/View.php';

class ProductoView extends View
{
    function __construct()
    {
        parent::__construct();
//        echo 'En la vista Index<br>';
    }

    public function render($rows, $template='productos.tpl')
    {
        $this->smarty->assign('scripts', array('main.js'));
        $this->smarty->display($template);
    }
}
