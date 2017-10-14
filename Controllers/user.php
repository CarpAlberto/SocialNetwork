<?php
  class User extends Base_Controller 
  {  
      function __construct() 
      {
           parent::__construct();    
           Auth::handleLogin();
           Session::init();
      } 
      public function SetId($id)
      {
        $this->_id = $id; 
      }
       public function User($id=-1) 
       {
          if($id == -1)
             $this->_view->_id = Session::get("userid");
          else
             $this->_view->_id = $id;
	       	$this->_view->title = 'Profilul Meu';
	        array_push($this->_view->_CSS, 
            "header.css",
            "default.css",
            "user.css",
            "friends.css",
            "avatar.css",
            "menu.css",
            "chat_msg.css",
            "libs/notification.css");
	        array_push($this->_view->_JS, "default.js","language.js","popup.js","notification.js","chat_msg.js");
	        array_push($this->_view->_Ajax, "data.js");
          $this->_view->_level ="../../";
	        $this->_view->render('header_home');
          $this->_view->render('chat');
          $this->_view->render('friends');
	        $this->_view->render('user/index');
	        $this->_view->render('footer');
       }
       public function UserAbout($id)
       {
        if($id == -1)
             $this->_view->_id = Session::get("userid");
          else
             $this->_view->_id = $id;
        $this->_view->title = 'Profilul Meu';
          array_push($this->_view->_CSS, 
            "header.css",
            "default.css",
            "user.css",
            "friends.css",
            "avatar.css",
            "menu.css",
            "chat_msg.css",
             "edit_profile.css",
            "libs/notification.css");
          array_push($this->_view->_JS, "default.js","language.js","popup.js","notification.js","chat_msg.js");
          array_push($this->_view->_Ajax, "data.js");
          $this->_view->_level ="../../";
          $this->_view->_id = $id;
          $this->_view->render('header_home');
          $this->_view->render('chat');
          $this->_view->render('friends');
          $this->_view->render('user/about');
          $this->_view->render('footer');
       }
      public function UserPhotos($id)
       {
          if($id == -1)
             $this->_view->_id = Session::get("userid");
          else
             $this->_view->_id = $id;
        $this->_view->title = 'Profilul Meu';
          array_push($this->_view->_CSS, 
            "header.css",
            "default.css",
            "user.css",
            "friends.css",
            "avatar.css",
            "menu.css",
            "chat_msg.css",
             "edit_profile.css",
            "libs/notification.css");
          array_push($this->_view->_JS, "default.js","language.js","popup.js","notification.js","chat_msg.js");
          array_push($this->_view->_Ajax, "data.js");
          $this->_view->_level ="../../";
          $this->_view->_id = $id;
          $this->_view->render('header_home');
          $this->_view->render('chat');
          $this->_view->render('friends');
          $this->_view->render('user/photo');
          $this->_view->render('footer');
       }
       public function GetFullInfo($id)
       {
          $data = $this->_model->GetInfo($id);
          $user_logat = Session::get("userid");
          $data_friend = $this->_model->CheckFriend($user_logat,$id);     
          if(count($data_friend) == 0)
          {
            $data[0]['Status_Prietenie'] = 2;
          }
          else
          {
             $data[0]['Status_Prietenie'] = $data_friend[0]['Status'];
          }
         echo json_encode($data);
       }
       public function UpdateFriends($id1,$id2)
       { 
          $data = $this->_model->ReqFriends($id1,$id2);

       }
       public function GetComments($idPost)
       {

       }
       public function GetTimeLine($TargetID)
       {
          $data = $this->_model->GetTimeLine(Session::get("userid"),$TargetID);
          echo json_encode($data);
       }
  }
?>