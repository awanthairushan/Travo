<?php

class Admin extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    function index(){
        $this->view->render('admin/admin_trips');
    }

    
    function destinations(){
        $this->view->render('admin/admin_destinations');
    }

    function faq(){
        $this->view->faq = $this->model->getFaq();
        $this->view->render('admin/admin_faq');
    }

    function feedback(){
        $this->view->feedback = $this->model->getFeedback();
        $this->view->render('admin/admin_feedback');
    }

    function hotelsMore(){
        $action = $_POST['hotel_morebtn']; 
        $hotel_id = $_POST['hotelID'];
        $this->view->hotel_details = $this->model->getAllHotelDetails($hotel_id);
        $this->view->family_room_details = $this->model->getFamilyRoomDetails($hotel_id);
        $this->view->double_room_details = $this->model->getDoubleRoomDetails($hotel_id);
        $this->view->single_room_details = $this->model->getSingleRoomDetails($hotel_id);
        $this->view->massive_room_details = $this->model->getMassiveRoomDetails($hotel_id);
        $this->view->render('admin/admin_hotels_more');
    }

    function hotels(){
        $this->view->new_hotels = $this->model->getNewHotelDetails();
        $this->view->existing_hotels = $this->model->getExsistingHotelDetails();
        $this->view->render('admin/admin_hotels');
    }

    function travelers(){
        $this->view->travelers = $this->model->getTravelerDetails();
        $this->view->render('admin/admin_travelers');
    }

    function tripDetails(){
        $this->view->render('admin/admin_trip_details');
    }

    function trips(){
        $this->view->render('admin/admin_trips');
    }

    function vehiclesMore(){
        $this->view->render('admin/admin_vehicles_more');
    }

    function vehicles(){
        $this->view->vehicle_details = $this->model->getVehicleDetails();
        $this->view->render('admin/admin_vehicles');
    }

    function addNewFaq(){
		//echo "controller ekata awaa";
        $action=$_POST['submit']; 

        $faq_id = uniqid("faq_");
        $question = $_POST['fquestion'];
        $answer = $_POST['fanswer'];

        $this->model->addFaq($faq_id,$question,$answer);
		header('location: faq');
	}

    function deleteFaq(){
        $action = $_POST['removebtn']; 
        $faq_id = $_POST['faq_id'];

        $this->model->deleteFaq($faq_id);
		header('location: faq');
    }

    function deleteFeedback(){
        $action = $_POST['removebtn']; 
        $feedback_id = $_POST['feedback_id'];

        $this->model->deleteFeedback($feedback_id);
		header('location: feedback');
    }

    function deleteTravelers(){
        $action = $_POST['removebtn'];
        $traveler_id=$_POST['travelerID'];
        $email=$_POST['email'];

        $this->model->deleteTraveler($traveler_id);
        $this->model->updateDeletedAccounts($traveler_id, $email);
        header('location: travelers');
    }

    function declineHotelRequest(){
        $action = $_POST['removebtn']; 
        $hotel_id = $_POST['hotelID'];

        $this->model->declineHotel($hotel_id);
        header('location: hotels');
    }
    function acceptHotelRequest(){
        $action = $_POST['acceptbtn']; 
        $hotel_id = $_POST['hotelID'];

        $this->model->acceptHotel($hotel_id);
        header('location: hotels');
    }
    // function loadHotelMorePage(){
    //     echo "Wade harii";

        

    // }



}