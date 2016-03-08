<?php

require_once 'lib/View.php';

class PedidoView extends View
{
    function __construct()
    {
        parent::__construct();
//        echo 'En la vista Index<br>';
    }

    public function render($rows, $template='pedido.tpl')
    {
        //$this->smarty->assign('scripts', array('main.js'));
        $this->smarty->assign('rows', $rows);
        $this->smarty->display($template);
    }
    
    public function cart($template='cart.tpl'){
        //$this->smarty->assign('scripts', array('main.js'));
        $this->smarty->assign('rows', $_SESSION['cart']);
        $this->smarty->assign('mode', 'cart');
        $this->smarty->display($template);
    }
    
    public function finish($id, $template='pedidoDone.tpl'){
        $this->smarty->assign('id', $id);
        $this->smarty->display($template);
    }
    
    public function detail($rows, $template='cart.tpl'){
        $this->smarty->assign('rows', $rows);
        $this->smarty->assign('mode', 'detail');
        $this->smarty->display($template);
    }
}