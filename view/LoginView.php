<?php

require_once 'lib/View.php';

class LoginView extends View{
    function __construct() {
        parent::__construct();
    }
    
    public function render($error)
    {
        $template='login.tpl';
        $this->smarty->assign('error', $error);
        $this->smarty->display($template);
    }
}
