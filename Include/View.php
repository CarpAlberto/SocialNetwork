<?php
  
  class View {

     protected $title;
     
     public $_CSS = array();
     public $_JS = array();
     public $_Ajax =array();
     public $_level = "";
     public $_id;

     function __construct() 
     {
     	$this->_Css = array();
     	$this->_JS = array();
        $this->_Ajax = array();
     }
     public function Render($name)
     {
        require 'Views/' . $name . '.php';
     }

     public function __get($var)
     {
     	return $this->$var;
     }
     public function __set($var,$value)
     {
       $this->$var = $value;
     }

  }
?>



