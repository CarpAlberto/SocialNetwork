<?php
   class Photo extends Base_Controller 
   {
      public function __construct()
      {
      	parent::__construct();
         Auth::handleLogin();
        Session::init();
      }
      public function GetPhotoLoggedUser()
      {
      	 $id = Session::get('userid');
      	 echo json_encode($this->_model->GetPhoto($id));
      }
      public function GetPhoto($id)
      {
        echo json_encode($this->_model->GetPhoto($id));
      }
  }
?>