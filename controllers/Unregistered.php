<?php

class Unregistered extends Controller
{

    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $this->view->render('unregistered/index');
    }
    function faq()
    {
        $this->view->faq = $this->model->getFaq();
        $this->view->render('unregistered/faq');
    }
    function feedback()
    {
        $this->view->faq = $this->model->getFeedback();
        $this->view->render('unregistered/feedback');
    }
    function login()
    {
        $this->view->render('unregistered/log_in');
    }
    function logincheck()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST['username']) && isset($_POST['password'])) {

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


                if (empty($username)) {
                    header('location: login?error=Username is required');
                    exit();
                } else if (empty($password)) {
                    header('location: login?error=Password is required');
                    exit();
                } else {
                    if (mysqli_num_rows($sqladmin) === 1) { //The mysqli_num_rows() function returns the number of rows in a result set.
                        $row = mysqli_fetch_assoc($sqladmin); //The fetch_assoc() / mysqli_fetch_assoc() function fetches a result row as an associative array.
                        if ($row['username'] == $username  && password_verify($password, $row['password'])) {

                            $_SESSION['username'] = $row['username'];
                            header("location: http://localhost/TRAVO/admin");
                            exit();
                        } else {
                            header('location: login?error=Incorrect Username or Password');
                            exit();
                        }
                    } else if (mysqli_num_rows($sqltraveler) === 1) {
                        $row = mysqli_fetch_assoc($sqltraveler); //The fetch_assoc() / mysqli_fetch_assoc() function fetches a result row as an associative array.
                        if ($row['email'] == $username && password_verify($password, $row['password'])) {

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
                        if ($row['email'] == $username && password_verify($password, $row['password'])) {

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
                        if ($row['email'] == $username && password_verify($password, $row['password'])) {

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
            } else {
                header('location: login');
                exit();
            }
        }
    }
    function signup()
    {
        $this->view->render('unregistered/sign_up');
    }
    function signupTraveler()
    {
        $this->view->render('unregistered/sign_up-traveler');
    }
    function signupVehicle()
    {
        $this->view->render('unregistered/sign_up-vehicle');
    }
    function signupHotel()
    {
        $this->view->render('unregistered/sign_up-hotel');
    }
    function fogotPassword()
    {
        $this->view->render('unregistered/forgot_pw_step1');
    }
    function fogotPassword2()
    {
        $this->view->render('unregistered/forgot_pw_step2');
        $email = trim($_POST['username_fogot_pw']);

        if (empty($email)) {
            header('location: fogotPassword?error=Username is required');
            exit();
        } else {
            $existingTraveler = $this->model->checkForExistingTraveler($email);
            if (mysqli_num_rows($existingTraveler) > 0) {
                //echo "54321";
                while ($rows = mysqli_fetch_array($existingTraveler)) {
                    $existing_traveler_email = $rows['email'];
                    $traveler_name = $rows['name'];
                    $existing_otp = $rows['otp'];
                }
                if ($email == $existing_traveler_email) {
                    $traveler_otp = rand(1000, 9999);

                    if ($traveler_otp == $existing_otp) {
                        $traveler_otp = rand(1000, 9999); //if exists,generate a new otp
                    } else {
                        $updateTravelerOtp = $this->model->updateTravelerOtp($traveler_otp, $email);
                        $mail_subject = "OTP for reset password";
                        $mail_upper_body = "Hello {$traveler_name} ,";
                        $mail_middle_boddy = "Your OTP for reset password is {$traveler_otp}";

                        $send_mail_result = mail($existing_traveler_email, $mail_subject, $mail_middle_boddy, $mail_upper_body);

                        if ($send_mail_result) {
                            header('location: fogotPassword2?user_email=' . $existing_traveler_email);
                        } else {
                            header('location: fogotPassword?error=Email not sent');
                        }
                    }
                }
            } else {
                header('location: fogotPassword?error=Invalid username');
                exit();
            }
        }
    }
    function fogotPassword3()
    {
        $this->view->render('unregistered/forgot_pw_step3');
    }
    function addNewTraveler()
    {
        $action = $_POST['submitbtn'];

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

        if (mysqli_num_rows($this->model->checkForExistingUsers($email)) > 0) {
            header('location: signupTraveler?error=Someone already taken that email. Try another..!');
        } else {
            $this->model->addTraveler($traveler_id,  $name,  $email, $contact2, $contact1, $password, $adressLine1, $adressLine2, $city, $otp);
            header('location: login');
        }
    }
    function addNewVehicle()
    {
        $action = $_POST['submitbtn'];

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
        $ac =  $_POST['ac'];
        $image = $_FILES['vehcle_image'];
        if (isset($_POST['driver_name']) && isset($_POST['driver_contact1']) && isset($_POST['driver_contact2']) && isset($_POST['driver_charge'])) {
            $driver_charge =  trim($_POST['driver_charge']);
            $driver_name = trim($_POST['driver_name']);
            $driver_contact1 = trim($_POST['driver_contact1']);
            $driver_contact2 = trim($_POST['driver_contact2']);
        } else {
            $driver_charge =  NULL;
            $driver_name = NULL;
            $driver_contact1 = NULL;
            $driver_contact2 = NULL;
        }
        $otp = rand(1000, 9999);
        $password = password_hash($password, PASSWORD_DEFAULT);

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

        if (mysqli_num_rows($this->model->checkForExistingUsers($email)) > 0) {
            header('location: signupVehicle?error=Someone already taken that email. Try with another..!');
        } else {
            $this->model->addVehicleOwner($owner_id, $owner_name,  $email, $contact2, $contact1, $otp, $password);
            $this->model->addVehicle($owner_id, $vehicle_id, $vehicle_no, $type, $Vehicle_model, $city, $no_of_passengers,  $price_for_1km, $price_for_day, $driver_type, $driver_charge, $ac, $imageNewName, $driver_name, $driver_contact1, $driver_contact2);
            header('location: login');
        }
    }
    function addNewHotel()
    {
        $action = $_POST['submitbtn'];
        $hotel_id = uniqid("hot_");
        $name = trim($_POST['name']);
        $regNo = trim($_POST['regNO']);
        $licenceNo = trim($_POST['licenceNo']);
        $email = trim($_POST['email']);
        $contact1 = trim($_POST['contact1']);
        $contact2 = trim($_POST['contact2']);
        $password1 = trim($_POST['password']);
        $line1 = trim($_POST['address-line1']);
        $line2 = trim($_POST['address-line2']);
        $city = trim($_POST['city']);
        $decription = trim($_POST['description']);
        $website = trim($_POST['web']);
        $location = trim($_POST['location']);
        $rep_name = trim($_POST['rep_name']);
        $rep_email = trim($_POST['rep_email']);
        $rep_contact1 = trim($_POST['rep_contact1']);
        $rep_contact2 = trim($_POST['rep_contact2']);
        $hotel_type = $_POST['hotel_type-type'];
        $images = $_POST['images'];
        $otp = rand(1000, 9999);
        $password = password_hash($password1, PASSWORD_DEFAULT);

        $single_count = trim($_POST['single_room_count']);
        $single_mini_bar = $_POST['single_room_minibar'];
        $single_food = $_POST['single_room_food'];
        $single_ac = $_POST['single_room_ac'];
        $single_price = trim($_POST['single_room_price']);
        $double_count = trim($_POST['double_room_count']);
        $double_mini_bar = $_POST['double_room_minibar'];
        $double_food = $_POST['double_room_food'];
        $double_ac = $_POST['double_room_ac'];
        $double_price = trim($_POST['double_room_price']);
        $family_count = trim($_POST['family_room_count']);
        $family_mini_bar = $_POST['family_room_minibar'];
        $family_food = $_POST['family_room_food'];
        $family_ac = $_POST['family_room_ac'];
        $family_price = trim($_POST['family_room_price']);
        $massive_capacity = trim($_POST['massive_room_capacity']);
        $massive_count = trim($_POST['massive_room_count']);
        $massive_mini_bar = $_POST['massive_room_minibar'];
        $massive_food = $_POST['massive_room_food'];
        $massive_ac = $_POST['massive_room_ac'];
        $massive_price = trim($_POST['massive_room_price']);

        if (mysqli_num_rows($this->model->checkForExistingUsers($email)) > 0) {
            header('location: signupHotel?error=Someone already taken that email. Try with another..!');
        } else {
            $this->model->addHotel($hotel_id, $name, $regNo, $licenceNo, $line1, $line2, $city, $location, $contact1, $contact2, $decription, $website, $email, $password, $hotel_type, $rep_name, $rep_email, $rep_contact1, $rep_contact2, $otp);
            $this->model->addHotelRoom($hotel_id, 'single', $single_count, 1, $single_food, $single_mini_bar, $single_ac, $single_price);
            $this->model->addHotelRoom($hotel_id, 'double', $double_count, 2, $double_food, $double_mini_bar, $double_ac, $double_price);
            $this->model->addHotelRoom($hotel_id, 'family', $family_count, 4, $family_food, $family_mini_bar, $family_ac, $family_price);
            $this->model->addHotelRoom($hotel_id, 'massive', $massive_count, $massive_capacity, $massive_food, $massive_mini_bar, $massive_ac, $massive_price);
            $image_id = uniqid('hotelimg_');
            $this->model->addHotelImages($hotel_id, $image_id, $images);
            header('location: login');
        }
    }
}
