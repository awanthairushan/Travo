<?php

class Admin extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    function index(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $this->view->savedTripDetails = $this->model->getSavedTripDetails();
        $this->view->paidTripDetails = $this->model->getPaidTripDetails();
        $this->view->completedTripDetails = $this->model->getCompletedTripDetails();
        $this->view->render('admin/admin_trips');
    }    

    function destinations(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $this->view->destinations=$this->model->getDestination();
        $destinations = $this->model->getDestination();
        $sights = array();
        $ticket = array();
        $category = array();
        $count=0;
        while($rowDes = mysqli_fetch_array($destinations)){            
            $destinationId = $rowDes['destination_id'];
            $sights[$count] = $this->model-> getSights($destinationId); 
            $ticket[$count] = $this->model-> getSights($destinationId); 
            $category[$count] = $this->model-> getSights($destinationId); 
            $sightId[$count] = $this->model-> getSights($destinationId);
            $this->view->countSights = count($sights);
            $count++;
        }
        $this->view->sightsall=$sights;
        $this->view->ticketsall=$ticket;
        $this->view->categoryall=$category;
        $this->view->sightIdAll=$sightId;
        $this->view->render('admin/admin_destinations');
    }
    function addDestinationsAndSights(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $destinationId = uniqid('des_');
        $destination = $_POST['destination'];
        $destinationDetails = $this->model->getDestinationId($destination);
        while ($desId = mysqli_fetch_array($destinationDetails)){
            $destinationId=$desId['destination_id'];
        }
        $this->model->addDestination($destination, $destinationId);

        $sights = $_POST['visitingPlace'];
        $ticketPrices = $_POST['ticketPrice'];
        $categories = $_POST['tripCategory'];
        $longitude = $_POST['latitude'];
        $latitude = $_POST['longitude'];
        // $locations = $_POST['location'];

        $numberOfSights = count($sights);

 
       for($i = 0; $i<$numberOfSights; $i++){
            $sightId = uniqid('site_'); 
            // $isSuccess = $this->model->addSights($destinationId, $sightId, $sights[$i],$ticketPrices[$i],$categories[$i],$locations[$i]);         
            $isSuccess = $this->model->addSights($destinationId, $sightId, $sights[$i],$ticketPrices[$i],$categories[$i],$longitude,$latitude);         

            if($isSuccess){
                header('location: destinations');
            }
        }
    }
    function destinationsMap() {
        $this->view->render('admin/admin_destination_map');
    }
    function getDestination(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        return $this->view->destinations = $this->model->getDestination();
        while ($rows = mysqli_fetch_array($this->destinations)){
            $destinationId = $rows['destination_id'];
        }
        return $this->view->visitingPlaces = $this->model->getSights($destinationId);
    }
    function removeSight(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $sightId = $_POST['sightID'];
        $isRemoveSuccess = $this->model->removeSight($sightId);
        if($isRemoveSuccess){
            header('location: destinations');
        }
    }
    function editSight(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $sightId = $_POST['sightID'];
        
        $this->view->sightDetails = $this->model->selectSights($sightId);



        $isEditSuccess = $this->model->editSight($sightId);
        if($isEditSuccess){
            header('location: destinations');
        }
    }

    function faq(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $this->view->faq = $this->model->getFaq();
        $this->view->render('admin/admin_faq');
    }

    function feedback(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $this->view->feedback = $this->model->getFeedback();
        $this->view->render('admin/admin_feedback');
    }

    function hotelsMore(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $action = $_POST['hotel_morebtn']; 
        $hotel_id = $_POST['hotelID'];
        $this->view->hotel_details = $this->model->getAllHotelDetails($hotel_id);
        $this->view->family_room_details = $this->model->getFamilyRoomDetails($hotel_id);
        $this->view->double_room_details = $this->model->getDoubleRoomDetails($hotel_id);
        $this->view->single_room_details = $this->model->getSingleRoomDetails($hotel_id);
        $this->view->massive_room_details = $this->model->getMassiveRoomDetails($hotel_id);
        $this->view->hotel_images = $this->model->getHotelImages($hotel_id);
        $this->view->render('admin/admin_hotels_more');
    }

    function hotels(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $this->view->new_hotels = $this->model->getNewHotelDetails();
        $this->view->existing_hotels = $this->model->getExsistingHotelDetails();
        $this->view->render('admin/admin_hotels');
    }

    function travelers(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $this->view->travelers = $this->model->getTravelerDetails();
        $this->view->render('admin/admin_travelers');
    }

    function tripDetails(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $this->view->render('admin/admin_trip_details');
    }

    function trips(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $this->view->savedTripDetails = $this->model->getSavedTripDetails();
        $this->view->paidTripDetails = $this->model->getPaidTripDetails();
        $this->view->completedTripDetails = $this->model->getCompletedTripDetails();
        $this->view->render('admin/admin_trips');
    }

    function vehiclesMore(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $action = $_POST['vehicle_morebtn']; 
        $vehicle_id = $_POST['vehicle_id'];
        $this->view->all_vehicle_details = $this->model->getAllVehicleDetails($vehicle_id);
        $this->view->render('admin/admin_vehicles_more');
    }

    function vehicles(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $this->view->vehicle_details = $this->model->getVehicleDetails();
        $this->view->render('admin/admin_vehicles');
    }

    function addNewFaq(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $action=$_POST['submit']; 

        $faq_id = uniqid("faq_");
        $question = trim($_POST['fquestion']);
        $answer = trim($_POST['fanswer']);

        $this->model->addFaq($faq_id,$question,$answer);
		header('location: faq');
	}

    function deleteFaq(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $action = $_POST['removebtn']; 
        $faq_id = $_POST['faq_id'];

        $this->model->deleteFaq($faq_id);
		header('location: faq');
    }

    function deleteFeedback(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $action = $_POST['removebtn']; 
        $feedback_id = $_POST['feedback_id'];

        $this->model->deleteFeedback($feedback_id);
		header('location: feedback');
    }

    function deleteTravelers(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $action = $_POST['removebtn'];
        $traveler_id=$_POST['travelerID'];
        $email=$_POST['email'];

        $this->model->deleteTraveler($traveler_id);
        $this->model->updateDeletedAccounts($traveler_id, $email);
        header('location: travelers');
    }

    function deleteVehicles(){
        $ownerId = $_POST['owner_id'];
        $isDeleteSuccess = $this->model->deleteVehicle($ownerId);
        if($isDeleteSuccess){
            header('location:vehicles');
        }else{
            echo "Kela unaaa";
        }
    }

    function declineHotelRequest(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $action = $_POST['removebtn']; 
        $hotel_id = $_POST['hotelID'];

        $this->model->declineHotel($hotel_id);
        header('location: hotels');
    }
    function acceptHotelRequest(){
        session_start();
        $this->view->isAdmin = $this->model->selectAdmins($_SESSION['username']);
        $action = $_POST['acceptbtn']; 
        $hotel_id = $_POST['hotelID'];

        $this->model->acceptHotel($hotel_id);
        header('location: hotels');
    }
    function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('location: http://localhost/TRAVO');
    }
}