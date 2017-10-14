<?php
  class updates_Model extends Base_Model
  {
     public function __construct()
     {
        parent::__construct();
     }
     public function InsertUpdatesRecord($id,$text,$type,$media,$target)
     {   
     	   $timestamp = date('Y-m-d G:i:s');
      return $this->db->insert('updates',
          array(
             "Update_Text" =>$text,
             "Data" => $timestamp,
             "Permisiuni" => $type,
             "ID_User" => $id,
             "ID_User_Target" => $target,
             "Media" => $media
            ));
     }
     public function InsertCommentsRecord($id,$idPost,$text)
     {
          $timestamp = date('Y-m-d G:i:s');
      return $this->db->insert('comentarii',
          array(
             "ID_User" =>$id,
             "ID_Update" => $idPost,
             "Data" => $timestamp,
             "Text" => $text
            ));
     }
     public function InsertNotificationRecord($Id_user,$text,$Imagine,$Status)
     {
         $timestamp = date('Y-m-d G:i:s');
          return $this->db->insert('notificari',
            array(
                 'ID_User' => $Id_user,
                 'Text'   => $text,
                 'Data'   => $timestamp,
                 'Imagine' => $Imagine,
                 'Status'  => $Status,
              ));
     }
     public function GetFriends_Requests($id,$status)
     {
           $sql = 'SELECT User1,Nume,Prenume,Photo_Profil from prieteni inner join useri on useri.ID = prieteni.User1 INNER JOIN info_useri on info_useri.ID = useri.ID_Info where (User2= :id and prieteni.Status= :Status)';
           return $this->db->select($sql,array('id' => $id,'Status' => $status));          
     }  
     public function Update_Req($id,$status,$idFrom)
     {
         $post_data = array('Status' => $status);
         if($idFrom != null)
         {
          
             $this->db->update('prieteni',$post_data,
               "`User2` = '$id' and `User1`= '$idFrom' ");
         }
         else
         {
           $this->db->update('prieteni',$post_data,
               "`Status` = '$status' and `User2` = '$id'");
         }
         if($status == 4)
         {
            $this->db->delete('prieteni',"User1 = '$id' and User2='$idFrom'");
         }

       }  
       public function Update_Notification($id)
       {
         $post_data = array('Status' => 1);
           $this->db->update('notificari',$post_data,
               "`ID_User` = '$id'");
       }
       public function Get_Real_Time_Notifications($id) 
       {
          $sql = "select Data,Imagine,Text from Notificari where Status =0 and ID_User = :id";
          return $this->db->select($sql,array(":id" => $id));
       }  
       public function getInfoFromID($id)
       {
        return $this->db->select('SELECT useri.ID as Sender,Nume,Prenume,Photo_Profil from info_useri inner join useri on useri.ID_Info = info_useri.ID WHERE useri.ID = :id',
                    array('id' => $id))[0];
       }
       public function getOwnerPost($id)
       {
         return $this->db->select('SELECT ID_User,ID_User_Target from updates where ID=:id',array(":id" => $id))[0];
       }
       public function getCommentsFromPost($id)
       {
          $sql2 = 'select Nume,Prenume,useri.ID,Photo_Profil,Text,comentarii.ID as IdCom,comentarii.Data as Data_Comment from comentarii inner join useri on  useri.ID = comentarii.ID_User inner join info_useri on info_useri.ID = useri.ID_info where ID_Update = :idPostare';
          $comm = $this->db->select($sql2,array("idPostare" => $id));
          return $comm;
       }
  }
 ?>