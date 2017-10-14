<?php

class Signup extends Base_Controller {

    function __construct() 
    {
        parent::__construct();
        Session::init();

    }
    function index() 
    {    
        $this->_view->title = 'Start';
        array_push($this->_view->_CSS, 
            "header.css",
            "default.css"
            );
        array_push($this->_view->_JS,
         "default.js",
         "language.js",
         "data_picker.js",
         "country_city_picker.js");
        $this->_view->render('header');
        $this->_view->render('home/start/index');
        $this->_view->render('footer');
    }
    function Finish_Signup()
    {
    	Session::init();
        $validator = new Validation();
        $rules_array = array(
              'phone' =>array(
                         'type' => 'string',
                         'required' =>false,
                         'min' => 10,
                         'max' => 14,
                         'trim' => true
                    ),
                'country' => array (
                         'type' => 'string',
                         'required' => false,
                         'min' => 1,
                         'max' => 100,
                         'trim' => true
                    ),
                'state' => array (
                         'type' => 'string',
                         'required' => false,
                         'min' => 1,
                         'max' => 100,
                         'trim' => true
                    )
            );
        $validator->addSource($_POST);
        $validator->addRules($rules_array);
        $validator->run();
        Session::set('Telefon',$_POST['phone']);
        Session::set('Tara',$_POST['country']);
        Session::set('Oras',$_POST['state']);
        $data = Helper::GetDataFormat($_POST['years'],$_POST['months'],$_POST['days']);
        Session::set('Data_Nastere',$data);
        $idLogat = $this->_model->SignUp();
        if(sizeof($validator->errors) > 0)
        {
           foreach ($validator->errors as $key => $value) {
                   echo $validator->errors[$key] . "\n" ;
            }
        }
        else
        {
            echo "succes";
        }
    }
    function VerifyMail()
    {
    	Session::init();
        Session::set('Nume',$_POST['Nume']);
        Session::set('Prenume',$_POST['Prenume']);
        Session::set('Parola',Hash::create('sha256', $_POST['Parola'], HASH_PASSWORD_KEY));
        Session::set('Email',$_POST['Email']);
        Session::set('Sex',$_POST['sex']);
        $validator = new Validation();
        $rules_array = array(
              'Nume' =>array(
                       'type' => 'string',
                       'required' =>true,
                       'min' => 0,
                       'max' => 50,
                       'trim' => true
                    ),
                'Prenume' => array (
                         'type' => 'string',
                         'required' => true,
                         'min' => 0,
                         'max' =>50,
                         'trim' =>true
                    ),
                'Parola' => array (
                        'type' => 'string',
                        'required' => true,
                        'min' => 8,
                        'max' =>100,
                        'trim' =>false
                    ));
         $validator->addSource($_POST);
         $validator->addRules($rules_array);
         $validator->run();
         $status = $this->_model->VerifyMail();
        if(sizeof($validator->errors) == 0)
        {
            if($status == "succes")
            {
                echo "succes";
            }
            else
            {
                echo "Emailul exista deja in baza de date";
            }
        }
        else
        {
            foreach ($validator->errors as $key => $value) {
                   echo $validator->errors[$key] . "\n" ;
            }
            if($status == "eroare")
            {
               echo "Emailul exista deja in baza de date";
            }
        }
    }
    function UploadImage()
    {
        try
        {
           Session::init();
           $directory = $_SERVER['DOCUMENT_ROOT'] . '/Tema2/Views/public/images/resources/' . Session::get('Email').'/';
           if (!file_exists($directory))
              mkdir($directory);
           $retFile = Helper::UploadImage($directory,'file');
           Session::set('Fisier_Uploadat', URL . 'Views/public/images/resources/' . Session::get('Email').'/' . $retFile);
           echo 'Fisierul' . $retFile .'uploadat cu succes';
        }
        catch(Exception $exception)
        {
            echo $exception->getMessage();
        }
  
    }
}
?>