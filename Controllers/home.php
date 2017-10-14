<?php
   class Home extends Base_Controller 
   {
      public function __construct()
      {
      	 parent::__construct();
         Auth::handleLogin();
          Session::init();
      }
      function Index()
      {
         $this->_view->title="Home";
         
         array_push($this->_view->_CSS,
            "default.css","avatar.css","friends.css",
            "header.css","chat_msg.css",
            "emoticoane.css","libs/notification.css","libs/animate.css","libs/jquery.remodal.css");
         array_push($this->_view->_JS,
          "default.js","language.js",
          "chat_msg.js","popup.js","notification.js","libs/jquery.remodal.js");
         array_push($this->_view->_Ajax,"data.js");
      	$this->_view->render('header_home');
        $this->_view->render('chat');
        $this->_view->render('friends');
      	$this->_view->render('home/index');
      	$this->_view->render('footer_home');
      }

      public function getInitialData()
      {
         $this->_model->getData(Session::get('userid'));
      }
      public function UploadImage($name)
      {
         $email = $this->_model->Email(Session::get('userid'))[0]['Email'];
         $directory = $_SERVER['DOCUMENT_ROOT'] . '/Tema2/Views/public/images/resources/' . $email . '/';
         if (!file_exists($directory))
              mkdir($directory);
         $retFile = Helper::UploadImage($directory,'file');
         $databaseLocation =  URL . 'Views/public/images/resources/' . $email . '/' . $retFile; 
         $this->_model->UploadImage(Session::get('userid'), $databaseLocation,$retFile);
      }
      public function PostImage($name)
      {
         $directory = $_SERVER['DOCUMENT_ROOT'] . '/Tema2/Views/public/images/resources/';
         $retFile = Helper::UploadImage($directory,$name);
         $databaseLocation =  URL . 'Views/public/images/resources/'.$retFile; 
         echo $retFile;
      }
      public function GetPeopleGroups()
      {
         $data = $this->_model->getUsersGroupsByCategory();
         echo json_encode($data);
      }
      public function PrepareAddGroup()
      {
        $this->AddNewGroup($_POST['NumeGrup'],$_POST['info']);
        header('location:../../home');
      }
      private function AddNewGroup($NumeGrup,$IdList)
      { 
         try
         {
              $rules_array = array(
                'NumeGrup' => array (
                         'type' => 'string',
                         'required' => true
               ),
                'info' => array
                ('type' =>'string' ,'required' =>false )
            );
              $this->_validator->addSource($rules_array);
              $this->_validator->run();
              $array = explode(',',$IdList);
              $gid = $this->_model->CreateGroup($NumeGrup,Session::get('userid'));
              foreach ($array as $key => $value) {
                  if(!empty($value))
                        $this->_model->AddMember($gid,$value);
            }
         }
         catch(Exception $ex)
         {
            print($ex.getMessage());
         }
      }

   }
?>