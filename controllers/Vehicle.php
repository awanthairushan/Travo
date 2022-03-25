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
            header('location: myVehicle');
        }
    }

    function loadupdateVehicleDetails()
    {
        session_start();

        $vehicle_id=$_GET['vehicleID'];

        $this->view->isVehicle = $this->model->getVehicleDetailsId($vehicle_id);
        $this->view->vehicleDetails = $this->model->getVehicleDetailsId($vehicle_id);
        $this->view->vehicleID = $this->model->getVehicleDetails($_SESSION['username']);
        $this->view->render('vehicle/vehicle_update_vehicle');
    }

    function updateVehicleDetails()
    {
        session_start();

        $vehicle_id = $_POST['vehicle_id'];

        echo $vehicle_id;

        $vehiclesDetails = $this->model->getVehicleDetailsId($vehicle_id);
        while ($rows = mysqli_fetch_array($vehiclesDetails)) {
            $vehicle_no = $rows['vehicle_no'];
            $type = $rows['type'];
            $no_of_passengers = $rows['no_of_passengers'];
            $city = $rows['city'];
            $price_for_1km = $rows['price_for_1km'];
            $price_for_day = $rows['price_for_day'];
            $driver_type = $rows['driver_type'];
            $driver_charge = $rows['driver_charge'];
            $ac = $rows['ac'];
        }

        $vehiclesDetails = $this->model->getVehicleDetailsId($_SESSION['username']);
        
        $new_vehicle_no = trim($_POST['vehicle_no']);
        $new_type = trim($_POST['type']);
        $new_no_of_passengers = trim($_POST['no_of_passengers']);
        $new_city = trim($_POST['city']);
        $new_price_for_1km = trim($_POST['price_for_1km']);
        $new_price_for_day = trim($_POST['price_for_day']);
        $new_driver_type = trim($_POST['driver_type']);
        $new_driver_charge =  trim($_POST['driver_charge']);
        $new_ac="";
        if(isset($_POST['ac'])){
            $new_ac="yes";
        }
        echo $new_vehicle_no;

        if (empty($new_vehicle_no)) {
            $new_vehicle_no = $vehicle_no;
        }
        if (empty($new_type)) {
            $new_type = $type;
        }
        if (empty($new_no_of_passengers)) {
            $new_no_of_passengers = $no_of_passengers;
        } 
        if (empty($new_city)) {
            $new_city = $city;
        }
        if (empty($new_price_for_1km)) {
            $new_price_for_1km = $price_for_1km;
        }
        if (empty($new_price_for_day)) {
            $new_price_for_day = $price_for_day;
        }
        if (empty($new_driver_type)) {
            $new_driver_type = $driver_type;
        }
        if (empty($new_driver_charge)) {
            $new_driver_charge = $driver_charge;
        } 
        if (empty($new_ac)) {
            $new_ac = $ac;
        }          
        
        if($this->model->updateVehicleDetails($vehicle_id, $new_vehicle_no, $new_type, $new_no_of_passengers, $new_city, $new_price_for_1km, $new_price_for_day, $new_driver_type, $new_driver_charge, $new_ac)){
            //header('location: loadupdateVehicleDetails?vehicleID='.$vehicle_id);
            header('location: myVehicle');

        }
        else{
            die('Something went wrong.');
        }
    }

    
    function addNewVehicle()
    {
        session_start();
        
        $action = $_POST['submitbtn'];

        $owner_id = $_POST['ownerId'];
        $vehicle_id = uniqid("veh_");
        $city = trim($_POST['city']);
        $vehicle_no = trim($_POST['vehicle_no']);
        $type = $_POST['vehicle_type'];
        $vehicle_model = trim($_POST['Vehicle_model']);
        $no_of_passengers = trim($_POST['no_of_passengers']);
        $price_for_1km =  trim($_POST['price_for_1km']);
        $price_for_day = trim($_POST['price_for_day']);
        $driver_type = $_POST['driver_type'];
        $driver_charge =  trim($_POST['driver_charge']);
        $ac =  $_POST['ac'];
        $driver_name = trim($_POST['driver_name']);
        $driver_contact1 = trim($_POST['driver_contact1']);
        $driver_contact2 = trim($_POST['driver_contact2']);
        $image = $_FILES['vehcle_image'];
        // uploading vehicle image

        $imageName = $_FILES['vehcle_image']['name'];
        $imageTmpName = $_FILES['vehcle_image']['tmp_name'];
        $imageSize = $_FILES['vehcle_image']['size'];
        $imageError = $_FILES['vehcle_image']['error'];
        $imageType = $_FILES['vehcle_image']['type'];

        $imageExt = explode('.', $imageName);
        $imageActucalExt = strtolower(end($imageExt));
        $allowedFormates = array('jpg', 'jpeg', 'png');

        if (in_array($imageActucalExt, $allowedFormates)) {
            if ($imageError === 0) {
                if ($imageSize < 500000) {
                    $imageNewName = uniqid('', true) . "." . $imageActucalExt;
                    $imageDestination =  APPROOT . '/public/images/assets/vehicle/' . $imageNewName;
                    move_uploaded_file($imageTmpName, $imageDestination);
                } else {
                    header('location: signupVehicle?error=Your image is too big..!');
                }
            } else {
                header('location: signupVehicle?error=There was an error uploading your image..!');
            }
        } else {
            header('location: signupVehicle?error=You cannot upload images of this type..!');
        }

        // end of uploading vehicle image

        $this->model->addVehicle($vehicle_id, $vehicle_no, $type, $vehicle_model, $city, $owner_id,  $price_for_1km, $price_for_day, $driver_type, $driver_charge, $ac, $no_of_passengers, $imageNewName, $driver_name, $driver_contact1, $driver_contact2);
        header('location: myVehicle');
    }

    function logout()
    {
        session_start();
        session_unset();
        session_destroy();        
        header('location: http://localhost/TRAVO');
    }

    function deleteVehicle(){
        $vehicle_id = $_POST['vehicleID'];
        $this->model->deleteVehicle($vehicle_id);
        header('location: myVehicle');
    }
    function deleteVehicleOwner(){
    //$this->logout();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($_POST['delete_confirm_btn'])){
                $owner_id= $_POST['ownerID'];
                $this->model->deleteVehicleOwner($owner_id);
                $this->logout();
            }
        }
    }


}