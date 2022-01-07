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
    function logincheck(){
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($_POST['username']) && isset($_POST['password'])){

                // function validate($data){
                //     $data = trim($data); //Remove characters(spaces) from both sides of a string
                //     $data = stripslashes($data); //Remove the backslash
                //     $data = htmlspecialchars($data); //Convert the predefined characters "<" (less than) and ">" (greater than) to HTML entities
                //     return $data;
                //   }
              
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $sqladmin = $this->model->selectAdmin($username);
                $sqltraveler = $this->model->selectTraveler($username);
                $sqlhotel = $this->model->selectHotel($username);
                $sqlvehicle = $this->model->selectVehicle($username);
                $sqldeleted = $this->model->selectdeleted($username);


                if(empty($username)) {
                    header('location: login?error=Username is required');
                    exit();
                }else if (empty($password)) {
                    header('location: login?error=Password is required');
                    exit();
                }else {
                    if (mysqli_num_rows($sqladmin) === 1) { //The mysqli_num_rows() function returns the number of rows in a result set.
                        $row = mysqli_fetch_assoc($sqladmin); //The fetch_assoc() / mysqli_fetch_assoc() function fetches a result row as an associative array.
                        if($row['username'] == $username  && password_verify($password, $row['password'])){
                           
                          $_SESSION['username'] = $row['username'];
                          header("location: http://localhost/TRAVO/admin");
                          exit();
                        } else {
                          header('location: login?error=Incorrect Username or Password');
                          exit();
                        }
                    
                    } else if (mysqli_num_rows($sqltraveler) === 1) {
                        $row = mysqli_fetch_assoc($sqltraveler); //The fetch_assoc() / mysqli_fetch_assoc() function fetches a result row as an associative array.
                        if($row['email'] == $username && password_verify($password, $row['password'])){
                             
                            $_SESSION['username'] = $row['email'];
                            $_SESSION['travelerID'] = $row['travelerID'];
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['city'] = $row['city'];
                            $_SESSION['contact1'] = $row['contact1'];

                            header("location: http://localhost/TRAVO/traveler");
                            exit();
                        } else {
                            header('location: login?error=Incorrect Username or Password');
                            exit();
                        }
                    } elseif (mysqli_num_rows($sqlhotel) === 1) {
                        $row = mysqli_fetch_assoc($sqlhotel); //The fetch_assoc() / mysqli_fetch_assoc() function fetches a result row as an associative array.
                        if($row['email'] == $username && password_verify($password, $row['password'])){
                             
                            $_SESSION['username'] = $row['email'];
                            $_SESSION['hotelID'] = $row['hotelID'];
                            $_SESSION['name'] = $row['name'];
                            header("location: http://localhost/TRAVO/hotel");
                            exit();
                        } else {
                            header('location: login?error=Incorrect Username or Password');
                            exit();
                        }
                    } elseif (mysqli_num_rows($sqlvehicle) === 1) {
                        $row = mysqli_fetch_assoc($sqlvehicle); //The fetch_assoc() / mysqli_fetch_assoc() function fetches a result row as an associative array.
                        if($row['email'] == $username && password_verify($password, $row['password'])){
                             
                            $_SESSION['username'] = $row['email'];
                            $_SESSION['owner_name'] = $row['owner_name'];
                            $_SESSION['vehicle_no'] = $row['vehicle_no'];
                            header("location: http://localhost/TRAVO/vehicle");
                            exit();
                        } else {
                            header('location: login?error=Incorrect Username or Password');
                            exit();
                        }
                    } elseif (mysqli_num_rows($sqldeleted) === 1) {
                        header('location: login?error=Admin removed this account.');
                         exit();
                    } else {
                        header('location: login?error=Incorrect Username or Password');
                        exit();
                    }
                }
            }else {
              header('location: login');
              exit();
            }  
        }
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