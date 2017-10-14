<?php
   class Friends extends Base_Controller 
   {
      public function __construct()
      {
      	parent::__construct();
         Auth::handleLogin();
        Session::init();
      }
       public function UpdateFriends($opt)
      {
          $id = Session::get('userid');
          $timestamp = time();
          $this->_model->KeppUserLogged($id);
          $friends = array();
          if($opt == 'null')
          {
             $friends = $this->_model->GetFriendsAndStatus($id);
             foreach ($friends as $key => $value) {
                $time_ago = strtotime($friends[$key]['last_access']);
                $time_elapsed = $timestamp  - $time_ago;
                if($time_elapsed > 60)
                {
                     $friends[$key]['last_access'] = Helper::Time_Ago($friends[$key]['last_access']);
                     $this->_model->LogoutUser($friends[$key]['ID']);
                }
             }
          
         }
         else
         {
            $timestamp = date('Y-m-d G:i:s');
            $array = explode(',',$opt);
            for ($i=0; $i< count($array); $i++) { 
                 array_push($friends,$this->_model->GetFriendsSelected($id,$array[$i]));
            }
         }
         echo json_encode($friends);
         //print_r($friends);
      }
      public function SearchUser($pattern)
      {
          $id = Session::get('userid');
          echo json_encode($this->_model->GetFriendsAndStatusStartsWith($id,$pattern));   
      }

  }
 ?>