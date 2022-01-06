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
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact2 = $_POST['contact2'];
        $contact1 = $_POST['contact1'];
        $password = $_POST['password'];
        $adressLine1 = $_POST['address-line1'];
        $adressLine2 = $_POST['address-line2'];
        $city = $_POST['city'];
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