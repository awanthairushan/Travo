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
            header('location: signupTraveler?error=Someone already taken that email. Try with another..!');
        }else{
            $this->model->addTraveler($traveler_id,  $name,  $email, $contact2, $contact1, $password, $adressLine1, $adressLine2, $city, $otp);
            header('location: login');
        }
    }
    function addNewVehicle(){
        $action=$_POST['submitbtn']; 

        echo "mekata aawa";
        $vehicle_id = uniqid("veh_");
        $owner_id = uniqid("own_");
        $owner_name = trim($_POST['owner_name']);
        $email = trim($_POST['email']);
        $contact1 = trim($_POST['contact1']);
        $contact2 = trim($_POST['contact2']);
        $password = trim($_POST['password1']);
        $city = trim($_POST['city']);
        $vehicle_no = trim($_POST['vehicle_no']);
        $type = $_POST['vehicle_type'];
        $Vehicle_model = trim($_POST['Vehicle_model']);
        $no_of_passengers = trim($_POST['no_of_passengers']);
        $price_for_1km =  trim($_POST['price_for_1km']);
        $price_for_day = trim($_POST['price_for_day']);
        $driver_type = $_POST['driver_type'];
        $driver_charge =  trim($_POST['driver_charge']);
        $ac =  $_POST['ac'];
        $image = $_POST['images'];
        $driver_name = trim($_POST['driver_name']);
        $driver_contact1 = trim($_POST['driver_contact1']);
        $driver_contact2 = trim($_POST['driver_contact2']);
        $otp = rand(1000, 9999);
        $password = password_hash($password, PASSWORD_DEFAULT);

        if(mysqli_num_rows($this->model->checkForExistingUsers($email)) >0 ){
            header('location: signupVehicle?error=Someone already taken that email. Try with another..!');
        }else{
            $this->model->addVehicle($owner_id, $vehicle_id, $vehicle_no, $type,  $Vehicle_model, $city, $no_of_passengers,  $price_for_1km, $price_for_day, $driver_type, $driver_charge, $ac, $image, $driver_name, $driver_contact1, $driver_contact2);
            $this->model->addVehicleOwner($owner_id, $owner_name,  $email, $contact2, $contact1, $otp, $password);
            header('location: login');
        }
    }

}