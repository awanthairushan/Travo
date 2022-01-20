<?php

class Vehicle extends Controller
{

    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        session_start();
        $this->view->isVehicle = $this->model->getOwnerDetails($_SESSION['username']);
        $this->view->render('vehicle/vehicle_home');
    }
    function faq()
    {
        session_start();
        $this->view->isVehicle = $this->model->getOwnerDetails($_SESSION['username']);
        $this->view->faq = $this->model->getFaq();
        $this->view->render('vehicle/vehicle_faq');
    }
    function myVehicle()
    {
        session_start();
        $this->view->isVehicle = $this->model->getOwnerDetails($_SESSION['username']);
        $this->view->myVehicle = $this->model->getVehicleDetails($_SESSION['username']);
        $this->view->render('vehicle/vehicle_view_vehicle');
    }
    function addVehicle()
    {
        session_start();
        $this->view->isVehicle = $this->model->getOwnerDetails($_SESSION['username']);
        $this->view->ownerId = $this->model->getOwner($_SESSION['username']);
        $this->view->render('vehicle/vehicle_addnew');
    }
    function loadUpdateProfile()
    {
        session_start();
        $this->view->isVehicle = $this->model->getOwnerDetails($_SESSION['username']);
        $this->view->profileDetails = $this->model->getOwnerDetails($_SESSION['username']);
        $this->view->ownerId = $this->model->getOwner($_SESSION['username']);
        $this->view->render('vehicle/vehicle_updateProfile');
    }
    function updateProfile()
    {
        session_start();
        $ownerDetails = $this->model->getOwnerDetails($_SESSION['username']);
        $owner_id = $_POST['ownerId'];
        $new_name = trim($_POST['owner_name']);
        $new_email = trim($_POST['email']);
        $new_contact2 = trim($_POST['contact2']);
        $new_contact1 = trim($_POST['contact1']);
        $new_password = trim($_POST['password1']);

        while ($rows = mysqli_fetch_array($ownerDetails)) {
            $name = $rows['owner_name'];
            $email = $rows['email'];
            $contact1 = $rows['contact1'];
            $contact2 = $rows['contact2'];
            $password = $rows['password'];


            //check whether newly entered data is empty

            if (empty($new_name)) {
                $new_name = $name;
            }
            if (empty($new_email)) {
                $new_email = $email;
            }
            if (empty($new_contact2)) {
                $new_contact2 = $contact2;
            }
            if (empty($new_contact1)) {
                $new_contact1 = $contact1;
            }
            if (empty($new_password)) {
                $new_password = $password;
            } else {
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            }
            $this->model->updateProfileDetails($owner_id, $new_name, $new_email, $new_contact2, $new_contact1, $new_password);
            header('location: loadUpdateProfile');
        }
    }
    function updateVehicleDetails()
    {
        session_start();
        $this->view->isVehicle = $this->model->getOwnerDetails($_SESSION['username']);
        $this->view->render('vehicle/vehicle_update_vehicle');
    }
    function addNewVehicle()
    {
        session_start();
        $owner_id = $_POST['ownerId'];
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

        $this->model->addVehicle($owner_id, $vehicle_id, $city, $vehicle_no, $type, $Vehicle_model, $no_of_passengers, $price_for_1km, $price_for_day, $driver_type, $driver_charge, $ac, $image, $driver_name, $driver_contact1, $driver_contact2);
        header('location: myVehicle');
    }
    function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('location: http://localhost/TRAVO');
    }
}
