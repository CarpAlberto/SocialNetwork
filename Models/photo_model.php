<?php
  class photo_Model extends Base_Model {

       public function  __construct()
       {
       	    parent::__construct();
           
       }
       public function GetPhoto($id)
       {
           $sql = 'select Nume,Path from Fotografii where OwnerID = :id';
           return $this->db->select($sql,array('id' =>$id));

       }
   }
?>