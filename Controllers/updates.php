<?php

  class Updates extends Base_Controller {

  	 function __construct() 
  	 {
          parent::__construct();    
           Auth::handleLogin();
          Session::init();
     }
      public function GetNotification()
       {
          $id = Session::get("userid");
           $_return = array();

          $data = $this->_model->GetFriends_Requests($id,0);
          if(count($data) > 0)
          {
              foreach ($data as $key => $value) {
                 $data[$key]["Tip"]=0; 
              } 
          } 
          $notification = $this->_model->Get_Real_Time_Notifications($id);
         if(count($notification) > 0)
         {
             foreach ($notification as $key => $value) {
                 $notification[$key]["Tip"]=1; 
                 $notification[$key]['Data'] = Helper::Time_Ago( $notification[$key]['Data']);
              } 
         }
          $_return[0] = $data;
          $_return[1] = $notification;
          echo json_encode($_return);
       }   
       public function GetOnLoadNotification()
       {
         $id = Session::get("userid");
         $data = $this->_model->GetFriends_Requests($id,3);
         if(count($data) > 0)
         {
              foreach ($data as $key => $value) {
                 $data[$key]["Tip"]=0; 
              } 
         } 
          echo json_encode($data);
       } 
       public function Update_Friend_Request_Seen()
       {
           $this->_model->Update_Req(Session::get("userid"),3,null);

       }
       public function Update_Friend_Request_Acepted($idFrom)
       {
           $this->_model->Update_Req(Session::get("userid"),1,$idFrom);
           $data = $this->_model->getInfoFromID(Session::get("userid"));
          $prepareNotif = $data['Nume'] . " " . $data['Prenume'] . ' ti-a acceptat  cererea de prietenie.';
           $this->_model->InsertNotificationRecord($idFrom,$prepareNotif,$data['Photo_Profil'],0);
       }
       public function Update_Friend_Request_Ignored($idFrom)
       {
           $this->_model->Update_Req(Session::get("userid"),4,$idFrom);
       }
       public function Update_Notifications_Seen()
       {
          $this->_model->Update_Notification(Session::get("userid"));
       }
       public function UploadPost($text,$media,$permisiuni,$target = null)
       {
        
          if($target == null)
          {
             echo  $this->_model->InsertUpdatesRecord(Session::get("userid"),$text,$permisiuni,$media,Session::get("userid"));
          }
          else
          {
            if($target == Session::get("userid"))
                $permisiuni = 0;
            else
            {
               $permisiuni=2;
               $prepareNotif = $data['Nume'] . " " . $data['Prenume'] . ' a postat in cronologia ta';
               $this->_model->InsertNotificationRecord($target,$prepareNotif,$data['Photo_Profil'],0);
            }
            $data = $this->_model->getInfoFromID(Session::get("userid"));
            echo $this->_model->InsertUpdatesRecord(Session::get("userid"),$text,$permisiuni,$media,$target);
          }
       }

       public function UploadComment($idPost,$text)
       {
            $data = $this->_model->getInfoFromID(Session::get("userid"));
            $owner = $this->_model->getOwnerPost($idPost);
            $prepareNotifSource = $data['Nume'] . " " . $data['Prenume'] . 'a adaugat un comentariu la postarea ta';
            $prepareNotifTarget = $data['Nume'] . " " . $data['Prenume'] . 'a adaugat un comentariu la postarea din cronologia ta';
            if($owner['ID_User'] != $owner['ID_User_Target'])
            {
              if(Session::get("userid")!= $owner['ID_User'])
                     $this->_model->InsertNotificationRecord($owner['ID_User'],$prepareNotifSource,$data['Photo_Profil'],0);
              if(Session::get("userid")!= $owner['ID_User_Target'])
                    $this->_model->InsertNotificationRecord($owner['ID_User_Target'],$prepareNotifTarget,$data['Photo_Profil'],0);
            }
            else
            {
              if(Session::get("userid")!= $owner['ID_User'])
              {
                $this->_model->InsertNotificationRecord($owner['ID_User'],$prepareNotifSource,$data['Photo_Profil'],0);
              }
            }
            $this->_model->InsertCommentsRecord(Session::get("userid"),$idPost,$text);
            $comments = $this->_model->getCommentsFromPost($idPost);
            foreach ($comments as $key => $value) {
                $text = "Si " . $comments[$key]['Nume'] . " " . $comments[$key]['Prenume'] . 
                ' a adaugat un comentariu la o postare din cronologia ta ';
                $user =  $comments[$key]['Id_User'];
                $this->_model->InsertNotificationRecord($user,$text,$comments[$key]['Photo_Profil'],0);
            }
       }

   }
?>