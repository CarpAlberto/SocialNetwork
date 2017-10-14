<?php
   class Advanced_Search extends Base_Controller 
   {
      public function __construct()
      {
      	parent::__construct();
         Auth::handleLogin();
        Session::init();
      }
      function Index()
      {
         $this->_view->title="Advanced Search";
         array_push($this->_view->_CSS,
            "default.css","avatar.css","friends.css",
            "header.css","chat_msg.css",
            "emoticoane.css","libs/notification.css","libs/animate.css");
         array_push($this->_view->_JS,
          "default.js","language.js",
          "chat_msg.js","popup.js","notification.js");
         array_push($this->_view->_Ajax,"data.js");
        $this->_view->_level ="../";
      	$this->_view->render('header_home');
        $this->_view->render('chat');
        $this->_view->render('friends');
      	$this->_view->render('home/search/index');
      	$this->_view->render('footer_home');
      }
      private function ArrayPush(&$array,$array2,$field)
      {
          if(count($array) == 0)
            return $array2;
          $array_ret = array();
          foreach ($array2 as $key => $value) {
              $semafor = 0;
          	  foreach ($array as $key2 => $value) {
          	  	  if($array[$key2][$field] == $array2[$key][$field])
          	  	  {
          	  	    array_push($array_ret,$array[$key2]);
          	  	  }
          	  }
          }
          return $array_ret;
      }
      public function Filter($pattern)
      {
      	 $retUsers = array();
         $array = explode(',', $pattern);
         foreach ($array as $key => $value)
         {
             $filter = explode('_',$array[$key]);
             switch ($filter[0]) {
              	case 'Sex':
              	     $sex_filter  = $this->_model->GetUsersByGender($filter[1]);
              		    $retUsers =$this->ArrayPush($retUsers,$sex_filter,'ID');
              		break;
                case 'Age':
                    $age_filter = $this->_model->GetUsersByAge($filter[1],$filter[2]);
                     $retUsers  = $this->ArrayPush($retUsers,$age_filter,'ID');
                    break;
                case 'Email':
                    $email_filter = $this->_model->GetUsersByEmail($filter[1]);
                    $retUsers  = $this->ArrayPush($retUsers,$email_filter,'ID');
                    break;
                case 'Locatie':
                     $locatie_filter = $this->_model->GetUsersByAdress($filter[1]);
                     $retUsers  = $this->ArrayPush($retUsers,$locatie_filter,'ID');
                     break;
                 case'Studii':
                     $studii_filter = $this->_model->GetUsersByAdress($filter[1]);
                     $retUsers  = $this->ArrayPush($retUsers,$studii_filter,'ID');
                     break;
                default:
              	   break;
              } 
         }
         echo json_encode($retUsers);
      }
    }
?>