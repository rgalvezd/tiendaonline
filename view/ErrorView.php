<?php
require_once 'lib/View.php';

class ErrorView extends View
{

    function __construct()
    {
        parent::__construct();
//        echo 'En la vista Error<br>';
    }

    public function render(Exception $ex)
    {
        $plantilla='error.tpl';
        $this->smarty->assign('ex', $ex);        
        $this->smarty->display($plantilla);        
    }
}