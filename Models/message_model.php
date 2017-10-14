<?php
  class message_Model extends Base_Model
  {
   public function __construct()
   {
        parent::__construct();
   }
   public function HistoryMessage($id1,$id2)
   {
   	  $sql = "select conversatie_reply.Media as Media,Nume,Prenume,Photo_Profil,conversatie_reply.Sender as Sender, conversatie_reply.Message as Mesaj from conversatie_reply inner join conversatie on conversatie.ID = conversatie_reply.ID_Conversatie inner join useri on (Useri.ID = Sender) inner join info_useri on useri.ID_info = info_useri.ID where (conversatie.User1 = :User1 and conversatie.User2 = :User2 ) or (conversatie.User2= :User1 and conversatie.User1 = :User2) order by Time ";

   	 return $this->db->select($sql,
      array(
         ":User1" => $id1,
         ":User2" => $id2
        )
      );
   }
   public function AddNewMessage($SenderID,$ReceiverID,$msg,$media)
   {
   	  // verif conv
   	  $timestamp = date('Y-m-d G:i:s');
   	   $sql = "select ID from conversatie where (User1 = :user1 and User2= :user2) or (User1 = :user2 and User2= :user1)";
   	   $res = $this->db->select($sql,array(
                'user1' => $SenderID,
                'user2' => $ReceiverID
   	   	));
   	   if(count($res) == 0)
   	   {
   	   	  $idConversatie =  $this->db->insert('conversatie',array(
   	   	  	     'user1' => $SenderID,
                 'user2' => $ReceiverID,
                 'Data'  => $timestamp
   	   	  	));
   	   }
   	   else
   	   {
         $idConversatie = $res[0]['ID'];
   	   }
   	   	 $idConversatie_r = $this->db->insert('conversatie_reply',
               array(
                    'Message' =>$msg,
                    'Time'   => $timestamp,
                    'Status' => 0,
                    'ID_Conversatie' => $idConversatie, 
                    'Sender' => $SenderID,
                    'Media' => $media
               	));
   	}
     public function GetMessage($id)
     {
     	$sql = 'select conversatie_reply.Media as Media,conversatie_reply.ID as ID_r,conversatie_reply.Message as Mesaje,conversatie_reply.Time as Time,Photo_Profil as image ,Sender,info_useri.Nume,info_useri.Prenume from conversatie_reply inner join conversatie on conversatie.ID = conversatie_reply.ID_Conversatie inner join useri on useri.ID = if(Sender = User1,User1,User2) inner join info_useri on info_useri.ID = useri.Id_Info where (conversatie_reply.Status = 0 and Sender != :id AND (conversatie.User1=:id or conversatie.User2 = :id) )';
        $data = $this->db->select($sql,
        	  array(
        	  	   'id' => $id
        	  )
        	);
        return $data;
     }
     public function UpdateMsg($id,$idMessage)
     {
         $timestamp = date('Y-m-d G:i:s');
         $post_data = array(
               'Status' => 1,
               'Time' => $timestamp
        );
        $this->db->update('conversatie_reply', 
              $post_data,
              "`ID`= '{$idMessage}'");
     }
     public function GetHistoryUsers($id)
     {
          $sql ='select  conversatie_reply.Media as Media , conversatie_reply.Message,Nume,Photo_Profil,Prenume,useri.ID as id_user from conversatie inner join useri on ((useri.ID = conversatie.User2 or useri.ID = conversatie.User1) and useri.ID!=:id) inner join info_useri on info_useri.ID = useri.ID_info inner join conversatie_reply on conversatie.ID = conversatie_reply.ID_Conversatie where User1 = :id or User2= :id group by Nume';
          return $this->db->select($sql,array("id" => $id));
     }
  }
?>