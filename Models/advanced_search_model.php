<?php

  class Advanced_Search_Model extends Base_Model 
  {
  	 public function __construct()
     {
      	parent::__construct();
     }
     public function GetUsersByEmail($Email)
     { 
     $sql  = "select Useri.ID,Nume,Prenume,Photo_Profil from useri inner join info_useri on";
     $sql .= "info_useri.ID = useri.id_Info where Email=:Email";
        return $this->db->select($sql,array('Email'=> $Email));
     }
     public function GetUsersByGender($Gender)
     { 
        $sql  = 'select Useri.ID ,Nume,Prenume,Photo_Profil from useri inner join info_useri on info_useri.ID ='; 
		$sql .=	'useri .id_Info where Sex=:Sex';
        return $this->db->select($sql,array('Sex' => $Gender));
     }
     public function GetUsersBySchool($Studii)
     {
      $sql = 'select Useri.ID ,Nume,Prenume,Photo_Profil from useri inner join info_useri on info_useri.ID = useri.id_Info INNER JOIN info_studii on info_Studii.ID = info_useri.ID_Info_Studii where Liceu =:Studii and Facultate = :Studii';
      return $this->db->select($sql,array('Studii' => $Studii));
     }
     public function GetUsersByAge($start,$end)
     {
     	$sql = 'select Useri.ID as ID ,Nume,Prenume,Photo_Profil,year(curdate()) - year(info_useri.Data_Nasterii) as  varsta from useri inner join info_useri on info_useri.ID = useri.id_Info group by varsta having varsta >=:start and varsta <=:end';
     	   return $this->db->select($sql,array('start' => $start,'end' => $end)); 
     }
     public function GetUsersByAdress($Locatie)
     {
     	$sql = 'select Useri.ID ,Nume,Prenume,Photo_Profil from useri inner join info_useri on info_useri.ID = useri.id_Info INNER JOIN info_locatie on info_locatie.ID = info_useri.ID_Locatie where Oras = :Locatie or Tara = :Locatie';
     	 return $this->db->select($sql,array('Locatie' => $Locatie));
     }
  }
?>