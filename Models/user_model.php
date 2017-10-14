<?php
  class user_Model extends Base_Model {

       public function  __construct()
       {
       	    parent::__construct();
       }
       public function GetInfo($id)
       {
          $sql = 'SELECT useri.ID as ID_User,Nume,Prenume,Email,Data_Nasterii,Tara,Oras,Facultate,Liceu,Telefon,Photo_Profil,Sex from info_useri inner join useri on useri.ID_info = info_useri.ID left join info_locatie on info_locatie.ID = info_useri.ID left join info_studii on info_studii.ID = info_useri.ID where useri.ID = :id';
          return $this->db->select($sql,
            array("id" => $id)
            );
       }
       public function CheckFriend($id1,$id2)
       {
         $sql = "Select prieteni.Status as Status from prieteni where (User1 = :id1 and User2 = :id2) or ( User1 = :id2 and User2 = :id1)";
         return $this->db->select($sql,array("id1" => $id1 ,"id2" => $id2));
       }
       public function ReqFriends($id1,$id2)
       {
         $data = $this->CheckFriend($id1,$id2);
         $timestamp = date('Y-m-d G:i:s');
         if(count($data) == 0)
         {
           $this->db->insert('prieteni',array(
                'Data' => $timestamp,
                'Status' => 0, // cerere trimisa
                'User1' => $id1,
                'User2' => $id2
                ));
         }
       }
       public function GetTimeLine($SourceID,$TargetID)
       {
         $permisiuni = null;
         $sql=null;
         if($TargetID == $SourceID)
         {
             $sql ='select Media,Nume,Prenume,useri.ID,Photo_Profil,Update_Text,updates.ID as post,updates.Data as Data_Postarii from updates inner join useri on  useri.ID = updates.ID_User inner join info_useri on info_useri.ID = useri.ID_info where ID_User_Target = :TargetID';
         }
         else if(count($this->CheckFriend($TargetID,$SourceID)) > 0)
         {
             $sql ='select Media,Nume,Prenume,useri.ID,Photo_Profil,Update_Text,updates.ID as post,updates.Data as Data_Postarii from updates inner join useri on  useri.ID = updates.ID_User inner join info_useri on info_useri.ID = useri.ID_info where ID_User_Target = :TargetID and (Permisiuni = 1 or Permisiuni = 2)';
         }
         else
         {
           $sql ='select Media,Nume,Prenume,useri.ID,Photo_Profil,Update_Text,updates.ID as post,updates.Data as Data_Postarii from updates inner join useri on  useri.ID = updates.ID_User inner join info_useri on info_useri.ID = useri.ID_info where ID_User_Target = :TargetID and Permisiuni = 2';
         }
         
          $data = $this->db->select($sql,array("TargetID" => $TargetID ));
          
          foreach ($data as $key => $value) {
             $idPostare = $data[$key]['post'];
             $data[$key]['Data_Postarii'] = Helper::Time_Ago($data[$key]['Data_Postarii']);
             $sql2 = 'select Nume,Prenume,useri.ID,Photo_Profil,Text,comentarii.ID as IdCom,comentarii.Data as Data_Comment from comentarii inner join useri on  useri.ID = comentarii.ID_User inner join info_useri on info_useri.ID = useri.ID_info where ID_Update = :idPostare';
             $comm = $this->db->select($sql2,array("idPostare" => $idPostare));
             if(count($comm) > 0)
             {
                 foreach ($comm as $key2 => $value) {
                    $comm[$key2]['Data_Comment'] = Helper::Time_Ago($comm[$key2]['Data_Comment']);
                 }
              }
             $data[$key]["Comentarii"] = $comm;
          }
          return $data;
       }

       
   }

 ?>