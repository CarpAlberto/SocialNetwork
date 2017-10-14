<?php
  class home_Model extends Base_Model {

       public function  __construct()
       {
       	    parent::__construct();
           
       }
       public function getData($id)
       {
          $data  = $this->db->select('SELECT useri.ID,Nume,Prenume,Email,Photo_Profil from info_useri inner join useri on useri.ID_Info = info_useri.ID WHERE useri.ID = :id',
          	        array('id' => $id));
          $dataGrupuri  = $this->db->select('SELECT Nume from grupuri inner join grupuriuseri on grupuriuseri.ID_Grup = grupuri.ID WHERE grupuriuseri.ID_User = :id',
          	        array('id' => $id));
          $result = array_merge($data,$dataGrupuri);
          echo json_encode($result);
       }
       public function Email($id)
       {
          return $this->db->select('SELECT Email from useri where ID = :id',
             array('id' =>$id));
       }
       public function UploadImage($id,$fullPath,$name)
       {
          $timestamp = date('Y-m-d G:i:s');
          return $this->db->insert('fotografii',array(
            'Nume' => $name,
            'Path' => $fullPath,
            'OwnerID' => $id,
            'DataUploaded' => $timestamp
        ));
       }
       public function getUsersGroupsByCategory()
       {
           $useri = $this->db->select('SELECT Nume,Prenume,Photo_Profil,useri.ID as ID from info_useri inner join useri on useri.ID_Info = info_useri.ID');
           $grupuri = $this->db->select('select Nume from grupuri');
           for ($i=0; $i < count($useri); $i++) { 
                 $useri[$i]['category'] = 'Persoane';
            } 
            for ($i=0; $i < count($grupuri); $i++) { 
                 $grupuri[$i]['category'] = 'Grupuri';
                 $grupuri[$i]['Prenume'] = '';
            }
            return array_merge($useri,$grupuri);
       }
       public function CreateGroup($Nume,$IdOwner)
       {
          $timestamp = date('Y-m-d G:i:s');
          $idg  = $this->db->insert('grupuri',array(
            'Nume' => $Nume,
            'UserID' => $IdOwner,
            'Data' => $timestamp
        ));
          $this->AddMember($idg,$IdOwner);
          return $idg;
       }
       public function IDG($name) 
       {
          return $this->db->select('select ID from grupuri where Nume=:Nume',array('Nume' => $name))[0]['ID'];
       }
       public function AddMember($idg,$idu)
       {
          return $this->db->insert('grupuriuseri',array(
            'ID_User' => $idu,
            'ID_Grup' => $idg
        ));
       }
       public function AddMemberGroup($name,$idUser)
       { 
           $id = $this->IDG($name);
          return $this->db->insert('grupuriuseri',array(
                'ID_User' => $id,
                'ID_Grup' => $idUser
        ));
       }
  }
   
?>