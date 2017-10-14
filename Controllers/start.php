<?php

  class Start extends Base_Controller {

  	 function __construct() {
          parent::__construct();    
     }
     function index() 
     {    
        $this->_view->title = 'Start';
        array_push($this->_view->_CSS, "header.css","default.css");
        array_push($this->_view->_JS, "language.js","data_picker.js","country_city_picker.js","default.js","data.js");
         array_push($this->_view->_Ajax, "data.js");
        $this->_view->render('header');
        $this->_view->render('home/start/index');
        $this->_view->render('footer');
     }
     

  }
