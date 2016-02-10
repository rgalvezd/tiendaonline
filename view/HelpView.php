<?php

require_once 'lib/View.php';

class HelpView extends View
{

    function __construct()
    {
        parent::__construct();
//        echo 'En la vista Help<br>';
    }

    public function render($plantilla='help.tpl')
    {
        $this->smarty->display($plantilla);
    }
}
