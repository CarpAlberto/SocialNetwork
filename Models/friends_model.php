<?php
  class friends_Model extends Base_Model 
  {
     public function __construct()
      {
        parent::__construct();
        Session::init();
      }
    /*  public function GetFriendsAndStatus($id)
      {
          $sql  = 'select userstatus.UpdateTime as last_access,useri.ID,Nume,Prenume,userstatus.Status as Status,info_useri.Photo_Profil from info_useri inner join userstatus on info_useri.Status = userstatus.ID ';
          $sql .= ' inner join useri on info_useri.ID = useri.ID_Info where useri.ID != :id  order by userstatus.Status desc ' ;
          return $this->db->select($sql,array( 'id' => $id));
      }*/
      public function GetFriendsAndStatus($id)
      {
        $_friends_get_sql = '  select distinct  userstatus.UpdateTime as last_access,useri.ID,Nume,Prenume,userstatus.Status as Status,info_useri.Photo_Profil,coalesce(prieteni.Status,';
        $_friends_get_sql .= ' prieteni2.Status) as _Status, prieteni.User1 AS Sender  from useri  ';
        $_friends_get_sql .= ' inner join info_useri on info_useri.ID = useri.ID_Info left join prieteni on prieteni.User2 = :id and prieteni.User1 = useri.id';
        $_friends_get_sql .= ' left join prieteni prieteni2 on prieteni2.User2 = useri.id and prieteni2.User1 = :id inner join userstatus on info_useri.Status = userstatus.ID ';
        $_friends_get_sql .= ' where useri.id != :id  and (prieteni.Status=1 or prieteni2.Status = 1)';
          return $this->db->select($_friends_get_sql,array( 'id' => $id));
      }
      public function GetFriendsAndStatusStartsWith($id,$startWith)
      {
          $_friends_get_sql = '  select distinct  userstatus.UpdateTime as last_access,useri.ID,Nume,Prenume,userstatus.Status as Status,info_useri.Photo_Profil,coalesce(prieteni.Status,';
          $_friends_get_sql .= ' prieteni2.Status) as _Status, prieteni.User1 AS Sender  from useri  ';
          $_friends_get_sql .= ' inner join info_useri on info_useri.ID = useri.ID_Info left join prieteni on prieteni.User2 = :id and prieteni.User1 = useri.id';
          $_friends_get_sql .= ' left join prieteni prieteni2 on prieteni2.User2 = useri.id and prieteni2.User1 = :id inner join userstatus on info_useri.Status = userstatus.ID ';
          $_friends_get_sql .= ' where useri.id != :id  and (prieteni.Status=1 or prieteni2.Status = 1) and (Prenume LIKE :startWith or Nume LIKE :startWith)  order by userstatus.Status desc';
          return $this->db->select($_friends_get_sql,array( 'id' => $id,'startWith' => $startWith . '%'));
      }
      public function KeppUserLogged($id)
      {
          $sql  = 'select info_useri.Status as Status from info_useri inner join userstatus on info_useri.Status = userstatus.ID inner join useri on info_useri.ID = useri.ID_Info where useri.ID = :id ';
          $Id_status = $this->db->select($sql,array('id' => $id))[0]['Status'];
 
          $timestamp = date('Y-m-d G:i:s');
          $post_data = array(
               'Status' => 1,
               'UpdateTime' => $timestamp
          );
          $this->db->update('userstatus', 
              $post_data,
              "`ID`= '{$Id_status}'");
      }
      public function LogoutUser($id)
      {
         $sql  = 'select info_useri.Status as Status from info_useri inner join userstatus on info_useri.Status = userstatus.ID inner join useri on info_useri.ID = useri.ID_Info where useri.ID = :id ';
          $Id_status = $this->db->select($sql,array('id' => $id))[0]['Status'];
          $timestamp = date('Y-m-d G:i:s');
          $post_data = array(
               'Status' => 0,
          );
          $this->db->update('userstatus', 
              $post_data,
              "`ID`= '{$Id_status}'");
      }
      public function GetFriendsSelected($id,$ids)
      {
           $sql = 'select userstatus.UpdateTime as last_access , useri.ID,Nume,Prenume,userstatus.Status as Status,info_useri.Photo_Profil from info_useri inner join userstatus on info_useri.Status = userstatus.ID inner join useri on info_useri.ID = useri.ID_Info where useri.ID  = :ids and useri.ID != :id order by userstatus.Status desc';
           $data =  $this->db->select($sql,array( 'id' => $id,'ids' => $ids))[0];
           return $data;
      }
  }

