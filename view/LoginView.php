<?php

require_once 'lib/View.php';

class LoginView extends View{
    function __construct() {
        parent::__construct();
    }
    
    public function render($template='login.tpl')
    {
        $this->smarty->assign('method', $this->getMethod());
        $this->smarty->display($template);
    }
}
