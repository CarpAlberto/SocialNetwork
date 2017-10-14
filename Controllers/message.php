<?php

class Message extends Base_Controller {

    function __construct() 
    {
        parent::__construct();    
         Auth::handleLogin();
        Session::init();
    }    
    public function message()
    {
          $this->_view->title="Mwssages";
         
         array_push($this->_view->_CSS,
            "default.css","friends.css",
            "header.css","chat_msg.css",
            "emoticoane.css","libs/notification.css",
            "message.css");
         array_push($this->_view->_JS,
          "default.js","language.js",
          "chat_msg.js","popup.js","notification.js");
         array_push($this->_view->_Ajax,"data.js");
        $this->_view->_level ="../";
        $this->_view->render('header_home');
        $this->_view->render('chat');
        $this->_view->render('friends');
        $this->_view->render('home/message/index');
        $this->_view->render('footer_home');
    }
    public function Send($msg,$sender,$receiv,$media)
    {
      echo 'mes' . $msg . $media;
        $this->_model->AddNewMessage($sender,$receiv,$msg,$media);        
    }
    public function UpdateMessage()
    {

    	$data = $this->_model->GetMessage(Session::get("userid"));
        for ($i=0; $i < count($data) ; $i++) 
        { 
             $id = $data[$i]['ID_r'];
             $this->_model->UpdateMsg(Session::get("userid"),$id);

        }
    	echo json_encode($data);
    }
    public function GetHistory($user1)
    {
        $data =  $this->_model->HistoryMessage($user1,Session::get("userid"));
        echo json_encode($data);
    }
    public function GetUsersMessages()
    {
        $data = $this->_model->GetHistoryUsers(Session::get("userid"));
        echo json_encode($data);
    }
    public function DownloadFile($Nume)
    {
       $directory = $_SERVER['DOCUMENT_ROOT'] . '/Tema2/Views/public/images/resources/';
       $path = $directory . $Nume;
       Helper::downloadFile($path,$Nume,'text/plain');
    }

}

?>