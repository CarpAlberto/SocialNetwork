<?php
   class Edit extends Base_Controller 
   {
      public function __construct()
      {
      	parent::__construct();
        Auth::handleLogin();
        Session::init();
      }
      public function IndexEdit()
      {
          $this->_view->title = 'Profilul Meu';
          array_push($this->_view->_CSS, 
            "header.css",
            "default.css",
            "user.css",
            "friends.css",
            "edit_profile.css",
            "chat.css",
            "libs/notification.css");
          array_push($this->_view->_JS, "default.js","language.js","popup.js","notification.js");
          array_push($this->_view->_Ajax, "data.js");
          $this->_view->_level ="../";
          $this->_view->render('header_home');
          $this->_view->render('chat');
          $this->_view->render('friends');
          $this->_view->render('home/edit/index');
          $this->_view->render('footer');
      }
      public function InfoEdit()
      {
         $this->_view->title = 'Profilul Meu';
          array_push($this->_view->_CSS, 
            "header.css",
            "default.css",
            "user.css",
            "friends.css",
            "edit_profile.css",
            "chat.css",
            "libs/notification.css");
          array_push($this->_view->_JS,"data_picker.js","default.js","language.js","popup.js","notification.js");
          array_push($this->_view->_Ajax, "data.js");
          $this->_view->_level ="../";
          $this->_view->render('header_home');
          $this->_view->render('chat');
          $this->_view->render('friends');
          $this->_view->render('home/edit/info');
          $this->_view->render('footer');
      }
      public function RelatiiEdit()
      {
         $this->_view->title = 'Profilul Meu';
          array_push($this->_view->_CSS, 
            "header.css",
            "default.css",
            "user.css",
            "friends.css",
            "edit_profile.css",
            "chat.css",
            "libs/notification.css");
          array_push($this->_view->_JS,"default.js","language.js","popup.js","notification.js");
          array_push($this->_view->_Ajax, "data.js");
          $this->_view->_level ="../";
          $this->_view->render('header_home');
          $this->_view->render('chat');
          $this->_view->render('friends');
          $this->_view->render('home/edit/relatii');
          $this->_view->render('footer');
      }
      public function StudiiEdit()
      {
        $this->_view->title = 'Profilul Meu';
          array_push($this->_view->_CSS, 
            "header.css",
            "default.css",
            "user.css",
            "friends.css",
            "edit_profile.css",
            "chat.css",
            "libs/notification.css");
          array_push($this->_view->_JS,"default.js","language.js","popup.js","notification.js");
          array_push($this->_view->_Ajax, "data.js");
          $this->_view->_level ="../";
          $this->_view->render('header_home');
          $this->_view->render('chat');
          $this->_view->render('friends');
          $this->_view->render('home/edit/studii');
          $this->_view->render('footer');
      }
      public function GetInfo()
      {
         $id_logat = Session::get("userid");
         $data = $this->_model->GetFullInfo($id_logat);
         $family = $this->_model->GetListFamily($id_logat);
         $data['Familie'] = $family;
         echo json_encode($data);
      }  
      public function GetInfoFromID($id_logat)
      {
         $data = $this->_model->GetFullInfo($id_logat);
         $family = $this->_model->GetListFamily($id_logat);
         $data['Familie'] = $family;
         echo json_encode($data);
      }
      public function UpdatePhone($phone,$id)
      {
         $this->_model->UpdatePhone($phone,$id);
      }
      public function UpdateEmail($mail)
      {
         $this->_model->UpdateEmail(Session::get("userid"),$mail);
      }
      public function UpdateOrasTara($idRecord,$tara,$oras)
      {
        $this->_model->UpdateOrasTara($idRecord,$tara,$oras);
      }
      public function UpdateDataNasterii($year,$month,$day,$id)
      {
         $data = Helper::GetDataFormat($year,$month,$day);
         $this->_model->UpdateDataBirth($data,$id);
      }
      public function UpdateSex($sex,$id)
      {
        $this->_model->UpdateSex($sex,$id);
      }
      public function GetFriends()
      {
        $data = $this->_model->GetFriends(Session::get("userid"));
        echo json_encode($data);
      }
      public function GetFriendsByID($id)
      {
         $data = $this->_model->GetFriends($id);
        echo json_encode($data);
      }
      public function UpdateRelatie($new,$id)
      {
         $this->_model->UpdateRelatie($new,$id);
      }
      public function UpdateLiceu($new,$idRecord,$id_info)
      {
          if(count($this->_model->CheckRecordStudii($idRecord)) == 0)
          {
              $idRecord = $this->_model->InsertRecordInfoStudii($new,' ');
              echo $idRecord;
                $this->_model->UpdateRecordStudi($id_info,$idRecord);
          }
          else
          {
            $this->_model->UpdateLiceu($new,$idRecord);
          }
               
      }
      public function UpdateFacultate($new,$idRecord,$id_info)
      {
         if(count($this->_model->CheckRecordStudii($idRecord)) == 0)
         {
            $idRecord = $this->_model->InsertRecordInfoStudii(' ',$new);
            $this->_model->UpdateRecordStudi($id_info,$idRecord);
         }
         else
         {
           $this->_model->UpdateFacultate($new,$idRecord);
         }
    
      }

  }
 ?>