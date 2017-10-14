<?php

class Login extends Base_Controller {

    function __construct() {
        parent::__construct();    
        Session::init();
    }
    
    function index() 
    {    
        $this->_view->title = 'Login';
        array_push($this->_view->_CSS, "header.css","default.css","login.css");
        array_push($this->_view->_JS, "default.js","language.js");
        $this->_view->render('header');
        $this->_view->render('login/index');
        $this->_view->render('footer');
    }
    
    function OnLogin()
    {
        $this->_model->OnLogin();
    }
    function OnLogout()
    {
        $this->_model->OnLogout();
        Session::destroy();
        header("location: ../index");
    }
    function UpdateStatus($id){
        Session::set('userid',$id);
        Session::set('loggedIn',true);
    }
}

?>