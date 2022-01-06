<?php

class Unregistered extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    function index(){
        $this->view->render('unregistered/index');
    }
    function faq(){
        $this->view->faq = $this->model->getFaq();
        $this->view->render('unregistered/faq');
    }
    function feedback(){
        $this->view->faq = $this->model->getFeedback();
        $this->view->render('unregistered/feedback');
    }
    function login(){
        $this->view->render('unregistered/log_in');
    }
    function signup(){
        $this->view->render('unregistered/sign_up');
    }
    function signupTraveler(){
        $this->view->render('unregistered/sign_up-traveler');
    }
    function signupVehicle(){
        $this->view->render('unregistered/sign_up-vehicle');
    }
    function signupHotel(){
        $this->view->render('unregistered/sign_up-hotel');
    }
    function fogotPassword(){
        $this->view->render('unregistered/forgot_pw_step1');
    }
    function fogotPassword2(){
        $this->view->render('unregistered/forgot_pw_step2');
    }
    function fogotPassword3(){
        $this->view->render('unregistered/forgot_pw_step3');
    }
    function addNewTraveler(){
        $action=$_POST['submitbtn']; 

        $traveler_id = uniqid("tr_");
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $contact2 = trim($_POST['contact2']);
        $contact1 = trim($_POST['contact1']);
        $password = trim($_POST['password']);
        $adressLine1 = trim($_POST['address-line1']);
        $adressLine2 = trim($_POST['address-line2']);
        $city = trim($_POST['city']);
        $otp = rand(1000, 9999);
        $password = password_hash($password, PASSWORD_DEFAULT);

        if(mysqli_num_rows($this->model->checkForExistingUsers($email)) >0 ){
            header('location: signupTraveler?error=Someone already taken that email. Try another..!');
        }else{
            $this->model->addTraveler($traveler_id,  $name,  $email, $contact2, $contact1, $password, $adressLine1, $adressLine2, $city, $otp);
            header('location: login');
        }
    }

}