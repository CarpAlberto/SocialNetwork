<?php
  class admin_Model extends Base_Model 
  {
  	 public function __construct()
     {
      	parent::__construct();
     }
     public function GetUsers($blocked)
     {
        $sql = 'SELECT useri.ID  as ID_User ,Nume,Prenume,Email,Parola from useri inner join info_useri on useri.ID_Info = info_useri.ID where Privilegii = :blocked';
        return $this->db->select($sql,array("blocked" => $blocked));
     }
     public function Set_Privilegii($idRecord,$type)
     {
         $post_data = array(
               'Privilegii' => $type
        );
        $this->db->Update('useri',
          $post_data,
          "`ID`='{$idRecord}'");
     }
     public function GetAllMsg($id)
     {
       $sql = 'select Message,ID from conversatie_reply where Sender = :id';
       return $this->db->select($sql,array('id' => $id));
     }
     public function VerifyAdmin($id)
     {
        $sql = 'select Privilegii from useri where ID=:id';
        return $this->db->select($sql,array('id' => $id));
     }
     public function Delete_Msg($id)
     {
         echo $id ; 
        $this->db->delete('conversatie_reply',"`ID` = {$id}");
     }
  }

 ?>