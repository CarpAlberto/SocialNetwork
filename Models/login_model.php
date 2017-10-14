<?php

class login_Model extends Base_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function OnLogin()
    {
         $timestamp = date('Y-m-d G:i:s');
         $sth = $this->db->prepare("SELECT * FROM useri WHERE Email = :Email AND Parola = :Parola AND Privilegii !=1 ");
         $sth->execute(
            array(
            ':Email' => $_POST['Mail_Login'],
            ':Parola' => $_POST['Parola_Login']
        ));
        $data = $sth->fetch();

        $count = $sth->rowCount();
        if ($count > 0) 
        {

            Session::init();
            $post_data = array(
               'Status' =>1,
               'UpdateTime' => $timestamp
            );
            Session::set('loggedIn', true);
            Session::set('userid', $data['ID']);
            $idUser = $this->db->select('select ID_info from useri where useri.ID = :id ',
                array(
                      'id' => Session::get('userid')
                    ));
           $id_info = $idUser[0]['ID_info'];
            
            $idStat = $this->db->select('select Status from info_useri where info_useri.ID = :id',
                array( 
                       'id' => $id_info
                    ));
                    $id_status = $idStat[0]['Status'];
                   $this->db->update('userstatus',$post_data,
                         "`ID` = '{$id_status}'"
            );
            header('location:../../home');
        }
        else 
        {
            header('location:../../login_failed');
        }
    }
    public function OnLogout()
    {
         $timestamp = date('Y-m-d G:i:s');
             Session::init();
         $post_data = array(
               'Status' =>0,
               'UpdateTime' => $timestamp
            );
        $idUser = $this->db->select('select ID_info from useri where useri.ID = :id ',
                array(
                      'id' => Session::get('userid')
                    ));
        $id_info = $idUser[0]['ID_info'];
            
        $idStat = $this->db->select('select Status from info_useri where info_useri.ID = :id',
                array( 
                       'id' => $id_info
                    ));
        $id_status = $idStat[0]['Status'];
        $this->db->update('userstatus',$post_data,
                 "`ID` = '{$id_status}'");
    }
    
}
?>