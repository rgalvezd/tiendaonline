<?php

require_once 'lib/View.php';

class UserView extends View
{
    function __construct()
    {
        parent::__construct();
//        echo 'En la vista Index<br>';
    }

    public function render($rows, $template='user.tpl')
    {
//        $this->smarty->assign('method', $this->getMethod());
        
        $this->smarty->assign('rows', $rows);
//        $this->smarty->assign('user_list', $this->_translate('user_list'));
//        $this->smarty->assign('new_user', $this->_translate('new_user'));
        $this->smarty->display($template);
    }
    
    public function add($roles)
    {
//        $this->smarty->assign('method', $this->getMethod());
        $template='userFormAdd.tpl';
        $this->smarty->assign('roles', $roles);
        $this->smarty->display($template);
    }
    
    public function edit($row, $error="", $roles)
    {
        $template='userFormEdit.tpl';
        $this->smarty->assign('row', $row);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('roles', $roles);
        $this->smarty->display($template);
    }
    
    
}
