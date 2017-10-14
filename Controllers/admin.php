<?php
   class Admin extends Base_Controller 
   {
      public function __construct()
      {
      	parent::__construct();
         Auth::handleLogin();
         Session::init();
      }
      public function index()
      {
          $this->_view->title = 'Profilul Meu';
          array_push($this->_view->_CSS, 
            "header.css",
            "default.css",
            "admin.css",
            "vertical_menu_dropdown.css",
            "chat_msg.css",
            "avatar.css",
            "libs/notification.css");
          array_push($this->_view->_JS, "default.js","language.js","popup.js","notification.js","admin.js");
          array_push($this->_view->_Ajax, "data.js");
          $this->_view->_level ="";
          $this->_view->render('header_home');
          $this->_view->render('chat');
          $this->_view->render('admin/index');
          $this->_view->render('footer');
      }
      public function GetUsers()
      {
         $data = $this->_model->GetUsers(0);
         foreach ($data as $key => $value) {
              $data[$key]['blocat']=0;
         }
         $blocked = $this->_model->GetUsers(1);
          foreach ($blocked as $key => $value) {
              $blocked[$key]['blocat']=1;
         }
         $ret = array_merge($data,$blocked);
         echo json_encode($ret);
      }
      public function SetAdmin($id)
      {
           $this->_model->Set_Privilegii($id,2);
      }
      public function BlockUser($id)
      {
        $this->_model->Set_Privilegii($id,1);
      }
      public function UnBlockUser($id)
      {
        $this->_model->Set_Privilegii($id,0);
      }
      public function GetMessageSend($id)
      {
         $data=$this->_model->GetAllMsg($id);
         echo json_encode($data);
      }
      public function DeleteMessage($id)
      {
        $this->_model->Delete_Msg($id);
      }
      public function CheckAdmin()
      {
         $id = Session::get('userid');
      	 $data = $this->_model->VerifyAdmin($id);
         if($data[0]['Privilegii'] == 2)
            echo 'true';
          else
            echo 'false';
      }
   }
?>