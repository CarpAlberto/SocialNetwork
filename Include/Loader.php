<?php

require_once 'config.php';


class Loader {
 	   private $_Controller = null;
 	   private $_Url = null;
 	   private $_PATH_CONTROLLER='Controllers/';
 	   private $_PATH_MODELS = 'Models/';
 	   private $_defaultFile = 'index.php';
     private $_ErrorFile =   "error.php";

 	   public function __construct()
    {
           $this->URL();      
           //daca nu avem niciun fisier php in url apelam index.php
           if(empty($this->_Url[0]))
           {
              $this->DefaultController();
              return ;
           }
           $this->LoadController();
           $this->_callControllerMethod();
 	   }
 	   public function URL()
 	   {
 	   	  $ret_url=null;
 	   	  if(isset($_GET['url']))
 	   	  	$ret_url = $_GET['url'];
 	   	  $ret_url = rtrim($ret_url,'/');//eliminam situatiils http://host/index////
 	   	//  $ret_url = filter_var($ret_url,FILTER_SANITIZE_URL);
 	   	  $this->_Url = explode('/',$ret_url);
 	   }

 	   public function LoadController()
 	   {
        
           $file = $this->_PATH_CONTROLLER . $this->_Url[0] . '.php';
           if(file_exists($file))
           {
           	 require $file;
           	 $this->_Controller = new $this->_Url[0];
           	 $this->_Controller->LoadModel($this->_Url[0],$this->_PATH_MODELS);
           }
           else
           {
             	$this->_SignalError();
             	return false;
           }

 	   }
       public function DefaultController()
       {
           require $this->_PATH_CONTROLLER . $this->_defaultFile;
           $this->_Controller = new Index();
           $this->_Controller->Index();
       }


 	   private function _SignalError()
 	   {
 	   	 require $this->_PATH_CONTROLLER . $this->_ErrorFile;
 	   	 $this->_Controller  = new Error();
 	   	 $this->_Controller->Index();
 	   }

 	    public function setDefaultFile($path)
	    {
	        $this->_defaultFile = trim($path, '/');
	    }
      private function _callControllerMethod()
      {
        $length = count($this->_Url);
        
        // Make sure the method we are calling exists
        if ($length > 1) {
            if (!method_exists($this->_Controller, $this->_Url[1]))
            {
                $this->_SignalError();
            }
        }
        
        // Determine what to load
        switch ($length) {
            case 6:
                //Controller->Method(Param1, Param2, Param3)
                $this->_Controller->{$this->_Url[1]}($this->_Url[2], $this->_Url[3], $this->_Url[4],$this->_Url[5]);
                break;
            case 5:
                //Controller->Method(Param1, Param2, Param3)
                $this->_Controller->{$this->_Url[1]}($this->_Url[2], $this->_Url[3], $this->_Url[4]);
                break;
            case 4:
                //Controller->Method(Param1, Param2)
                $this->_Controller->{$this->_Url[1]}($this->_Url[2], $this->_Url[3]);
                break;
            
            case 3:
                //Controller->Method(Param1, Param2)
                $this->_Controller->{$this->_Url[1]}($this->_Url[2]);
                break;
            
            case 2:
                //Controller->Method(Param1, Param2)
                $this->_Controller->{$this->_Url[1]}();
                break;
            
            default:
                $this->_Controller->index();
                break;
        }
    }
 }

?>