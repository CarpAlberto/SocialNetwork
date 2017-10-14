<?php
   require_once  'config.php';

   function __autoload($class_name) 
   {
   	 require_once  PATH_INCLUDE . $class_name . '.php';
   }
   $_Loader = new Loader();
?>