<?php

class Traveler extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    //----------------------------Traveler-Home--------------------------------------
    function index(){
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->render('traveler/traveler_home');
    }
    function tripPlanBegin(){
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            if(isset($_POST['submitbtn'])){

                $date1= new DateTime($_POST['startdate']);
                $date2 = new DateTime($_POST['enddate']);

                $dif = $date2->diff($date1);

                $difference=$dif->format('%d');

                if (empty($_POST['peoplecount']) || empty($_POST['startdate']) || empty($_POST['enddate']) || empty($_POST['category'])){
                    header('location: '.URLROOT.'/Traveler');
                }
                if($_POST['peoplecount']>30 || $_POST['peoplecount']<0 || $difference>2 || $difference<0 || $date1 > $date2){
                    header('location: '.URLROOT.'/Traveler');
                }
                else{
                    $_SESSION['trip_id']=uniqid('trip_');
                    $_SESSION['traveler_count']=$_POST['peoplecount'];
                    $_SESSION['start_date']=$_POST['startdate'];
                    $_SESSION['end_date']=$_POST['enddate'];
                    $_SESSION['trip_cat']=$_POST['category'];
                    $_SESSION['hotel_1']='Araliya Hotel';
                    $_SESSION['hotel_2']='Full Moon Resort';
                    $_SESSION['hotel_3']='Grand Hilton Hotel';
                    $_SESSION['difference']=$difference;

                    header('location: '.URLROOT.'/Traveler/PlanTrip');   
                }

                
            }
        
        }

    }
    //------------------------Traveler-Budget------------------------------------
    function budget(){
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->selectTrip = $this->model->selectTrip($_SESSION['trip_id'],$_SESSION['travelerID']); 
        $this->view->budget = $this->model->selectBudget($_SESSION['trip_id']);
        $this->view->render('traveler/traveler_budget');
    }
    function saveTrip(){
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($_POST['savetripbtn'])){
                $traveler_id=$_POST['traveler_id'];
                $trip_id=$_POST['trip_id'];
                
                $_SESSION['trip_id']=null;
                
                if($this->model->saveTrip($traveler_id,$trip_id)){
                    
                    header('location: '.URLROOT.'/Traveler/tripToGo');   
                } else {
                    die('Something went wrong.');
                }
                
            }
        }
    }
    //--------------------------Traveler-FAQ--------------------------------------
    function faq(){
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->faq = $this->model->getFaq();
        $this->view->render('traveler/traveler_faq');
    }
    //--------------------------Traveler-Feedback---------------------------------
    function feedbacks(){
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->feedbacks = $this->model->getFeedback();
        $this->view->render('traveler/traveler_feedback_list');
    }
    function addFeedback(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($_POST['submitbtn'])){
                $data= trim($_POST['response']);
                
                if($this->model->addFeedbacks($data)){
                    header('location: '.URLROOT.'/Traveler/feedbacks');   
                } else {
                    die('Something went wrong.');
                }
                
            }
        }
    }
    //---------------------------Traveler-Hotel booking----------------------------
    function hotelBooking(){
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->render('traveler/traveler_hotel_booking');
    }
    //---------------------------Traveler-Plan Trip----------------------------------
    function planTrip(){
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        if(isset($_SESSION['trip_id'])){
            $this->view->render('traveler/traveler_plantrip');
        }else{
            header('location: '.URLROOT.'/Traveler');
        }
    }
    function pendingTrip(){
        session_start();

        echo 'awoo';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            if(isset($_POST['saveSubmit'])){
                $trip_id=$_POST['trip_id'];
                $traveler_count=$_POST['peoplecount'];
                $start_date=$_POST['startdate'];
                $end_date=$_POST['enddate'];
                $trip_cat=$_POST['category'];
                $destination1=$_POST['destination1'];
                $destination2=$_POST['destination2'];
                $destination3=$_POST['destination3'];
                $hotel1=$_POST['hotel1'];
                $hotel2=$_POST['hotel2'];
                $hotel3=$_POST['hotel3'];
                $mileage=$_POST['mileage'];
                $hotelacc1=$_POST['hotelacc1'];
                $hotelacc2=$_POST['hotelacc2'];
                $hotelacc3=$_POST['hotelacc3'];
                $servicecharges=$_POST['servicecharges'];
                $ticketfees=$_POST['ticketfees'];

                $numhotelacc1=(float)$hotelacc1;
                $numhotelacc2=(float)$hotelacc2;
                $numhotelacc3=(float)$hotelacc3;
                $numservicecharges=(float)$servicecharges;
                $numticketfees=(float)$ticketfees;
                $budget=$numhotelacc1+$numhotelacc2+$numhotelacc3+$numservicecharges+$numticketfees;
                $totalacc=$numhotelacc1+$numhotelacc2+$numhotelacc3;

                $checkbox1=$_POST['anu'];  
                $chka="";  
                foreach($checkbox1 as $chk1)  
                {  
                    $chka .= $chk1.",";  
                } 

                $checkbox2=$_POST['galle'];  
                $chkb="";  
                foreach($checkbox2 as $chk2)  
                {  
                    $chkb .= $chk2.",";  
                }
                
                $checkbox3=$_POST['col'];  
                $chkc="";  
                foreach($checkbox3 as $chk3)  
                {  
                    $chkc .= $chk3.",";  
                } 
                
                $hotel1=$_POST['hotel1'];
                $hotel2=$_POST['hotel2'];
                $hotel3=$_POST['hotel3'];
                $mileage=$_POST['mileage'];
                $hotelacc1=$_POST['hotelacc1'];
                $hotelacc2=$_POST['hotelacc2'];
                $hotelacc3=$_POST['hotelacc3'];
                $servicecharges=$_POST['servicecharges'];
                $ticketfees=$_POST['ticketfees'];

                $numhotelacc1=(float)$hotelacc1;
                $numhotelacc2=(float)$hotelacc2;
                $numhotelacc3=(float)$hotelacc3;
                $numservicecharges=(float)$servicecharges;
                $numticketfees=(float)$ticketfees;
                $budget=$numhotelacc1+$numhotelacc2+$numhotelacc3+$numservicecharges+$numticketfees;
                $totalacc=$numhotelacc1+$numhotelacc2+$numhotelacc3;

                 

                $difference= $_SESSION['difference'];
                echo $difference;

                if($this->model->planTripPending($trip_id,$_SESSION['travelerID'],$start_date,$end_date,$difference,$trip_cat,$destination1,$destination2,$destination3,$chka,$chkb,$chkc,$hotel1,$hotel2,$hotel3,$traveler_count,$mileage,$budget)){
                    if($this->model->addBudget($trip_id,$budget,$hotelacc1,$hotelacc2,$hotelacc3,$totalacc,$servicecharges,$ticketfees)){
                        header('location: '.URLROOT.'/Traveler/budget'); 
                    }  
                    else{
                        die("Something went wrong");
                    }
                } 
                else {
                    die('Something went wrong.');
                }
            }
        }    
        
    }
    //----------------------------Traveler-Saved Budget-------------------------
    //model functions are in the budget section of the model
    function savedBudget(){
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $url_trip_id=$_GET['id'];
        $this->view->selectTrip = $this->model->selectTrip($url_trip_id,$_SESSION['travelerID']); 
        $this->view->budget = $this->model->selectBudget($url_trip_id);
        $this->view->render('traveler/traveler_saved_budget');
    }
    //----------------------------Traveler-Trip to go-----------------------------
    function tripToGo(){
        session_start();

        if(isset($_GET['order_id'])){
            $order_id=$_GET['order_id'];
            
            if($this->model->updateTripPaid($order_id,$_SESSION['travelerID'])){
                $status=true;
            }
            else{
                $status=false;
                die('Something went wrong.');
            }
        }
        else{
            $status=true;
        }
      
        if($status==true){
            $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
            $this->view->paidTrips = $this->model->selectPaidTrips($_SESSION['travelerID']);
            $this->view->savedTrips = $this->model->selectSavedTrips($_SESSION['travelerID']);
            $this->view->completedTrips = $this->model->selectCompletedTrips($_SESSION['travelerID']);
            $this->view->render('traveler/traveler_trip_to_go');
        }
    }

    function deleteTrip(){
        session_start();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($_POST['deleteTrip_confirm_btn'])){
                $trip_id= $_POST['deleteTrip'];
                
                if($this->model->deleteTrip($trip_id)){
                    if($this->model->deleteBudget($trip_id)){
                        header('location: '.URLROOT.'/Traveler/tripToGo');
                    } else{
                        die('Something went wrong.');
                    }   
                } else {
                    die('Something went wrong.');
                }
                
            }
        }

    }

    //----------------------------Traveler-Update-------------------------------
    function travelerUpdate(){
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->render('traveler/traveler_update');
    }
    function updateTravelerProfile(){
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->model->selectTraveler($_SESSION['username'])){
                $travelerDetails=$this->model->selectTraveler($_SESSION['username']);
            }

            while ($rows = mysqli_fetch_array($travelerDetails)){
                $id=$rows['travelerID'];
                $name=$rows['name'];
                echo $name;
                $address1=$rows['address_line1'];
                $address2=$rows['address_line2'];
                $city=$rows['city'];
                $email=$rows['email'];
                $contact1=$rows['contact1'];
                $contact2=$rows['contact2'];
                $password=$rows['password'];
          
            }

            if(isset($_POST['submitbtn'])){
                $traveler_id=$id;
                $new_name=trim($_POST['name']);
                $new_email=trim($_POST['email']);
                $new_contact2=trim($_POST['contact2']);
                $new_contact1=trim($_POST['contact1']);
                $new_password=trim($_POST['password']);
                $new_adressLine1=trim($_POST['address-line1']);
                $new_adressLine2=trim($_POST['address-line2']);
                $new_city=trim($_POST['city']);

                //check whether newly entered data is empty
     
                if(empty($new_name)){
                    $new_name=$name;
                }
                if(empty($new_email)){
                    $new_email=$email;
                }
                if(empty($new_contact2)){
                    $new_contact2=$contact2;
                }
                if(empty($new_contact1)){
                    $new_contact1=$contact1;
                }
                if(empty($new_password)){
                    $new_password=$password;
                }else{
                    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                }
                if(empty($new_adressLine1)){
                    $new_adressLine1=$address1;
                }
                if(empty($new_adressLine2)){
                    $new_adressLine2=$address2;
                }
                if(empty($new_city)){
                    $new_city=$city;
                }
                
                if($this->model->updateTraveler($new_name,$new_email,$new_contact2,$new_contact1,$new_password,$new_adressLine1,$new_adressLine2,$new_city,$traveler_id)){
                    $_SESSION['username']=$new_email;
                    header('location: '.URLROOT.'/Traveler/travelerUpdate');   
                } else {
                    die('Something went wrong.');
                }
                
            }
        }
    }
    //---------------------------Traveler-Vehicle------------------------
    function vehicleDetails(){
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->vehicleType = $this->model->vehicleType();
        $this->view->seats = $this->model->vehicleSeats();
        $this->view->vehicles = $this->model->getVehicleAndOwnerDetails();
        $this->view->render('traveler/traveler_vehicle');
    }
    //--------------------------Traveler-Delete traveler---------------------
    function deleteTraveler(){
        session_start();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($_POST['delete_confirm_btn'])){
                $traveler_id= $_POST['travelerDelete'];
                
                if($this->model->deleteTraveler($traveler_id)){
                    header('location: '.URLROOT.'/Traveler');  
                } else {
                    die('Something went wrong.');
                }
                
            }
        }

    }
    //---------------------------Traveler nav menu-log out-------------------
    function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('location: http://localhost/TRAVO');
    }
    // function navigation(){
    //     $this->view->render('repeatable_contents/nav_bar_traveler');
    // }
    // function fonts(){
    //     $this->view->render('repeatable_contents/font');
    // }
    
    
}