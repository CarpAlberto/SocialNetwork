<?php
  class edit_Model extends Base_Model 
  {
  	 public function __construct()
     {
      	parent::__construct();
     }
     /*
       retuneaza informatii generale despre userul cu id-ul $id
     */
     public function GetFullInfo($id)
     {
       $sql = 'select useri.ID_info as info,ID_Locatie,Photo_Profil,Info_Relatie,ID_Info_Studii,Nume,Prenume,Email,Telefon,Sex,Facultate,Liceu,Data_Nasterii,Status_Relatie,Oras,Tara,Relatie_Familie,useri.ID as ID from useri inner join info_useri on useri.ID_info = info_useri.ID left join info_studii on info_studii.ID = info_useri.ID_Info_Studii left join info_relatii on info_useri.info_Relatie = info_relatii.ID left join info_locatie on info_locatie.ID = info_useri.ID_Locatie left join info_familie on info_familie.Relatie_Familie = info_useri.Info_Relatie where useri.ID = :id';
       return $this->db->select($sql,array("id" => $id))[0]; 
     }
     public function GetListFamily($id)
     {
     	 $sql ='select familie_useri.Nume as Nume_Membru,familie_useri.ID_Info_Familie as id_familie,info_familie.Relatie_Familie as relatie from familie_useri inner join info_familie on info_familie.ID = familie_useri.ID_Info_Familie where ID_User = :id';
     	 return $this->db->select($sql,array("id" => $id));
     }
     public function UpdatePhone($idRecord,$telefon)
     {
         $post_data = array(
               'Telefon' => $telefon
        );
       $this->db->Update('info_useri',
          $post_data,
          "`ID`='{$idRecord}'");
     }
     public function UpdateEmail($idUser,$email)
     {
        $post_data = array(
               'Email' => $email
        );
       $this->db->Update('useri',
          $post_data,
          "`ID`='{$idUser}'");
     }
     public function UpdateOrasTara($idRecord,$tara,$oras)
     {
       $post_data = array(
               'Tara' => $tara,
               'Oras' => $oras,
        );
       $this->db->Update('info_locatie',
          $post_data,
          "`ID`='{$idRecord}'");
     }
      public function UpdateDataBirth($Data,$idRecord)
     {
       $post_data = array(
               'Data_Nasterii' => $Data,
        );
       $this->db->Update('info_useri',
          $post_data,
          "`ID`='{$idRecord}'");
     }
     public function UpdateSex($sex,$idRecord)
     {
        $post_data = array(
               'Sex' => $sex,
        );
       $this->db->Update('info_useri',
          $post_data,
          "`ID`='{$idRecord}'");
     }
     public function GetFriends($id)
     {
       $sql ='SELECT Nume,Prenume,Photo_Profil,useri.ID as id from prieteni inner join useri on (useri.ID = User1 or useri.ID = User2) inner join info_useri on useri.ID_info = info_useri.ID where (prieteni.User1 = :id or prieteni.User2 = :id) and (useri.ID != :id)';
       return $this->db->select($sql,array('id' => $id));
     }
     public function UpdateRelatie($status,$idRecord)
     {
       $post_data = array(
               'Info_Relatie' => $status,
        );
       $this->db->Update('info_useri',
          $post_data,
          "`ID`='{$idRecord}'");
     }
     public function DeleteFamily($user)
     {
       $this->db->delete('familie_useri',"`ID_User` = '{$user}'");
     }
     public function UpdateLiceu($new,$idRecord)
     {
       $post_data = array(
               'Liceu' => $new,
        );
       $this->db->Update('info_studii',
          $post_data,
          "`ID`='{$idRecord}'");
     }
      public function UpdateFacultate($new,$idRecord)
     {
       $post_data = array(
               'Facultate' => $new,
        );
       $this->db->Update('info_studii',
          $post_data,
          "`ID`='{$idRecord}' ");
     }
     public function CheckRecordStudii($id)
     {
        $sql = 'select ID from info_studii where ID = :id';
        return $this->db->select($sql,array("id" => $id));
     }
     public function InsertRecordInfoStudii($Liceu,$Facultate)
     {
         return $this->db->insert('info_studii',array('Facultate' => $Facultate ,'Liceu' => $Liceu));
     }
     public function UpdateRecordStudi($idRecord,$id_studii)
     {
         $post_data = array(
            'ID_Info_Studii' => $id_studii
        );
       $this->db->Update('info_useri',
          $post_data,
          "`ID`='{$idRecord}'");
     }
   }
?>