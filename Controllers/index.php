<?php
   class Index extends Base_Controller 
   {
      public function __construct()
      {
      	parent::__construct();
      }
      function  Index()
      {
         Session::init();
         $this->_view->title="Pagina Principala";
         array_push($this->_view->_CSS, "header.css","default.css");
         array_push($this->_view->_JS, "default.js","language.js");
         array_push($this->_view->_Ajax, "data.js");
      	$this->_view->render('header');
      	$this->_view->render('index/index');
      	$this->_view->render('footer');
         
      }
   }
?>



