<?php

class Vehicle extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    function index(){
        session_start();
        $this->view->isVehicle = $this->model->getOwnerDetails($_SESSION['username']);
        $this->view->render('vehicle/vehicle_home');
    }
    function faq(){
        $this->view->faq = $this->model->getFaq();
        $this->view->render('vehicle/vehicle_faq');
    }
    function myVehicle(){
        session_start();
        $this->view->myVehicle =$this->model->getVehicleDetails($_SESSION['username']);
        // $this->view->owners =$this->model->getOwnerDetails();
        $this->view->render('vehicle/vehicle_view_vehicle');
    }
    function addVehicle(){
        $this->view->render('vehicle/vehicle_addnew');
    }
    function updateVehicle(){
        $this->view->render('vehicle/vehicle_update');
    }
    function updateVehicleDetails(){
        $this->view->render('vehicle/vehicle_update_vehicle');
    }
    function addNewVehicle(){
        session_start();

        $action=$_POST['submitbtn']; 
        $owner_id = $_SESSION['owner_id'];
        $vehicle_id = uniqid("veh_");
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

        $this->model->addVehicle($owner_id,$vehicle_id, $city,$vehicle_no, $type,$Vehicle_model,$no_of_passengers,$price_for_1km,$price_for_day,$driver_type,$driver_charge,$ac,$image,$driver_name,$driver_contact1,$driver_contact2);
		header('location: myVehicle');
    }
    function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('location: http://localhost/TRAVO');
    }
}