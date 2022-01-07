<?php

class Traveler extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    function index(){
        $this->view->render('traveler/traveler_home');
    }
    function budget(){
        $this->view->render('traveler/traveler_budget');
    }
    function faq(){
        $this->view->faq = $this->model->getFaq();
        $this->view->render('traveler/traveler_faq');
    }
    function feedbacks(){
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
    function hotelBooking(){
        $this->view->render('traveler/traveler_hotel_booking');
    }
    function planTrip(){
        $this->view->render('traveler/traveler_plantrip');
    }
    function savedBudget(){
        $this->view->render('traveler/traveler_saved_budget');
    }
    function tripToGo(){
        $this->view->render('traveler/traveler_trip_to_go');
    }
    function travelerUpdate(){
        $this->view->render('traveler/traveler_update');
    }
    function vehicleDetails(){
        $this->view->vehicleType = $this->model->vehicleType();
        $this->view->seats = $this->model->vehicleSeats();
        $this->view->vehicles = $this->model->getVehicleAndOwnerDetails();
        $this->view->render('traveler/traveler_vehicle');
    }
    function navigation(){
        $this->view->render('repeatable_contents/nav_bar_traveler');
    }
    function fonts(){
        $this->view->render('repeatable_contents/font');
    }
    function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('location: http://localhost/TRAVO');
    }
    
}