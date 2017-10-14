<?php

   class Base_Controller {
      
        protected $_view;
        protected $_model;
        protected $_validator;

       function __construct()
       {
          $this->_view = new View();
          $this->_validator = new Validation();
       }

       public function LoadModel($name,$modelPath)
       {
       	   $FullPath = $modelPath . $name . '_model.php';
       	   if(file_exists($FullPath))
       	   {
       	   	  require $FullPath;
       	   	  $model_Name = $name . '_Model';
       	   	  $this->_model = new $model_Name();
              
       	   }

       }
   }


?>