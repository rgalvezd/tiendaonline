<?php

require_once 'lib/View.php';

class IndexView extends View
{
    function __construct()
    {
        parent::__construct();
//        echo 'En la vista Index<br>';
    }

    public function render($plantilla='index.tpl')
    {
        $this->smarty->assign('method', $this->getMethod());
        $this->smarty->display($plantilla);
    }
}
