<?php
   class Error extends Base_Controller 
   {
      public function __construct()
      {
      	parent::__construct();
      }
      function  Index()
      {
         $this->_view->title="404 Eroare";
         array_push($this->_view->_CSS, "default.css","error.css","header.css");
      	$this->_view->render('error/index');
      	$this->_view->render('footer');  
      }
   }
?>
