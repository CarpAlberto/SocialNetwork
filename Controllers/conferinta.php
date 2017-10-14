<?php
   class Conferinta extends Base_Controller 
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
            "message.css",
            "edit_profile.css",
            "avatar.css",
            "friends.css",
            "libs/notification.css");
          array_push($this->_view->_JS, "default.js","chat_msg.js","language.js","popup.js","notification.js","admin.js");
          array_push($this->_view->_Ajax, "data.js");
          $this->_view->_level ="";
          $this->_view->render('header_home');
          $this->_view->render('chat');
           $this->_view->render('friends');
          $this->_view->render('home/message/conference');
          $this->_view->render('footer');
      }
      public function OnCreateConference($Nume,$pattern)
      {
         $lastId = $this->_model->CreateConference(Session::get("userid"),$Nume);
         echo $lastId;
         $array = explode(',',$pattern);
         for ($i=0; $i < count($array); $i++) { 
                $this->_model->AddNewMember($array[$i],$lastId);
         }
      }
      public function AddNewMember($id,$idConf)
      {
        $this->_model->AddNewMember($id,$idConf); 
      }
      public function DeleteUser($idConf)
      { 
         $this->_model->DeleteUser(Session::get("userid"),$idConf);
      }
      public function GetHistory($idConf)
      {
         $data = $this->_model->HistoryConf($idConf);
         echo json_encode($data);
      }
      public function Send($msg,$idConf)
      {
         
      }
      public function GetActiveConference()
      {
 
      }
  }
 ?>