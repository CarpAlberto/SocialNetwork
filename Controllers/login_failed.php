<?php

class Login_failed extends Base_Controller {

    function __construct() {
        parent::__construct();    
    }
    
    function index() 
    {    
        $this->_view->title = 'Login Failed';
         array_push($this->_view->_CSS, "header.css","default.css","login.css");
        array_push($this->_view->_JS, "default.js","language.js");
        $this->_view->render('header');
        $this->_view->render('login_failed/index');
        $this->_view->render('footer');
    }
    
    function OnLogin()
    {
        
    }
}

?>