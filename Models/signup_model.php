<?php
  class signup_Model extends Base_Model
  {
     public function __construct()
     {
        parent::__construct();
     }
     public function SignUp()
     {      
        $timestamp = date('Y-m-d G:i:s');
        $lastIdStudii = $this->db->insert('info_studii',
               array('Facultate' => null,
                     'Liceu' => null,  
                 ));
        $lastIdLocatie = $this->db->insert('info_locatie',
               array('Tara' => Session::get('Tara'),
                     'Oras' => Session::get('Oras')   
                 ));
         $lastStatus = $this->db->insert('userstatus',
              array(
                    'Status_Relatie' => 0
                ));
       $lastId =  $this->db->insert('info_useri',array(
                 'Nume' => Session::get('Nume'),
                 'Prenume'  => Session::get('Prenume'),
                 'ID_Info_Studii' => $lastIdStudii,
                 'ID_Locatie' => $lastIdLocatie,
                 'Sex' => Session::get('Sex'),
                 'Photo_Profil' => Session::get('Fisier_Uploadat'),
                 'Data_Nasterii' => Session::get('Data_Nastere'),
                 'Telefon' => Session::get('Telefon'),
                 'Status' => $lastStatus,
                 'Info_Relatie' =>1
         	));
        $idUserLogat = $this->db->insert('useri',array(
            'Email' => Session::get('Email'),
            'Parola' => Session::get('Parola'),
            'ID_Info' => $lastId,
            'Privilegii' => 0
        ));
        return $idUserLogat;
     }
     public function VerifyMail()
     {
        $statement  = $this->db->prepare("SELECT ID from useri where Email =:Email");
        $statement->execute(array(
            ':Email' => Session::get('Email')
            ));
        $data  = $statement->fetch();
        $count = $statement->rowCount();
        $status;
        if($count > 0)
        {
           $status =  "eroare";
        }
        else
        {

           $status =  "succes";
        }
        return $status;
     }
  }
?>