<?php
  class conferinta_Model extends Base_Model 
  {
  	 public function __construct()
     {
      	parent::__construct();
     }
     public function CreateConference($id,$Nume)
     {
         $timestamp = date('Y-m-d G:i:s');
          return $this->db->insert('conferinta',array(
            'Nume_Conferinta' => $Nume,
            'Data' => $timestamp,
            'ID_Creator' => $id
        ));
     }
     public function AddNewMember($id,$idConferinta)
     {
         $timestamp = date('Y-m-d G:i:s');
          return $this->db->insert('conferinta_users',array(
            'id_users' => $id,
            'id_conferinta' => $idConferinta,
            'Data' => $timestamp
          ));
     }
     public function InsertTextConf($idC,$Text,$id_user)
     {
          return $this->db->insert('conf_messages',array('ID_Conf' => $idC,'Text' => $Text,'User' => $id_user));

     }
     public function DeleteUser($idConf,$idUser)
     {

     }
     public function HistoryConf($idConf)
     {
         $sql = 'select conf_messages.Text,useri.ID,info_useri.Nume as Nume_User,Prenume,Photo_Profil,conferinta.Nume_Conferinta from conf_messages inner join conferinta_users on conf_messages.ID_Conf = conferinta_users.id_conferinta inner join useri on useri.ID = conferinta_users.id_users inner join info_useri on info_useri.ID = useri.ID_Info inner join conferinta on conferinta.ID = conferinta_users.id_conferinta where id_conferinta=:Idc and conf_messages.User = useri.ID';
         return $this->db->select($sql,array('Idc' => $idConf));
     }
     public function ActiveConference($id)
     {
     	 
     }

  }

 ?>