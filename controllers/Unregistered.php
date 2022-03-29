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
                        if ($row['username'] == $username && password_verify($password, $row['password'])) {

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
                            $_SESSION['owner_id'] = $row['owner_id'];
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

    function fogotPasswordGetUsername()
    {
        $this->view->render('unregistered/forgot_pw_step1');
    }

    function fogotPasswordSendOtp()
    {
        $email = trim($_POST['username_fogot_pw']);

        if (empty($email)) {
            header('location: fogotPasswordGetUsername?error=Username is required');
            exit();
        } else {
            $existingTraveler = $this->model->checkForExistingTraveler($email);
            $existingVehicle = $this->model->checkForExistingVehicle($email);
            $existingHotel = $this->model->checkForExistingHotel($email);

            //------------------------Traveler--------------------------------------
            if (mysqli_num_rows($existingTraveler) > 0) {
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
                            $this->view->fp_traveler = $this->model->checkForExistingTraveler($email);
                            $this->view->render('unregistered/forgot_pw_step2');
                        } else {
                            header('location: fogotPasswordGetUsername?error=Something went wrong. Try again !');
                        }
                    }
                } else {
                    header('location: fogotPasswordGetUsername?error=Invalid username');
                    exit();
                }
            }//------------------------Vehicle--------------------------------------

            else if (mysqli_num_rows($existingVehicle) > 0) {
                while ($rows = mysqli_fetch_array($existingVehicle)) {
                    $existing_vehicle_email = $rows['email'];
                    $vehicle_name = $rows['owner_name'];
                    $existing_otp = $rows['otp'];
                }
                if ($email == $existing_vehicle_email) {
                    $vehicle_otp = rand(1000, 9999);
                    if ($vehicle_otp == $existing_otp) {
                        $vehicle_otp = rand(1000, 9999); //if exists,generate a new otp
                    } else {
                        $updateVehicleOtp = $this->model->updateVehicleOtp($vehicle_otp, $email);
                        $mail_subject = "OTP for reset password";
                        $mail_upper_body = "Hello {$vehicle_name} ,";
                        $mail_middle_boddy = "Your OTP for reset password is {$vehicle_otp}";

                        $send_mail_result = mail($existing_vehicle_email, $mail_subject, $mail_middle_boddy, $mail_upper_body);

                        if ($send_mail_result) {
                            $this->view->fp_traveler = $this->model->checkForExistingVehicle($email);
                            $this->view->render('unregistered/forgot_pw_step2');
                        } else {
                            header('location: fogotPasswordGetUsername?error=Something went wrong. Try again !');
                        }
                    }
                } else {
                    header('location: fogotPasswordGetUsername?error=Invalid username');
                    exit();
                }
            }//------------------------hotel--------------------------------------

            else if (mysqli_num_rows($existingHotel) > 0) {
                while ($rows = mysqli_fetch_array($existingHotel)) {
                    $existing_hotel_email = $rows['email'];
                    $hotel_name = $rows['rep_name'];
                    $existing_otp = $rows['otp'];
                }
                if ($email == $existing_hotel_email) {
                    $hotel_otp = rand(1000, 9999);
                    if ($hotel_otp == $existing_otp) {
                        $hotel_otp = rand(1000, 9999); //if exists,generate a new otp
                    } else {
                        $updateHotelOtp = $this->model->updateHotelOtp($hotel_otp, $email);
                        $mail_subject = "OTP for reset password";
                        $mail_upper_body = "Hello {$hotel_name} ,";
                        $mail_middle_boddy = "Your OTP for reset password is {$hotel_otp}";

                        $send_mail_result = mail($existing_hotel_email, $mail_subject, $mail_middle_boddy, $mail_upper_body);

                        if ($send_mail_result) {
                            $this->view->fp_traveler = $this->model->checkForExistingHotel($email);
                            $this->view->render('unregistered/forgot_pw_step2');
                        } else {
                            header('location: fogotPasswordGetUsername?error=Something went wrong. Try again !');
                        }
                    }
                } else {
                    header('location: fogotPasswordGetUsername?error=Invalid username');
                    exit();
                }
            }
            else{
                header('location: fogotPasswordGetUsername?error=Invalid username');
            }
        }

    }

    function fogotPasswordCheckOtp()
    {
        $email = trim($_POST['username_forgot_pw']);
        $otp = $_POST['otp_forgot_pw'];


        $existingTraveler = $this->model->checkForExistingTraveler($email);
        $existingVehicle = $this->model->checkForExistingVehicle($email);
        $existingHotel = $this->model->checkForExistingHotel($email);

        if (mysqli_num_rows($existingTraveler) > 0) {
            while ($rows = mysqli_fetch_array($existingTraveler)) {
                $existing_traveler_otp = $rows['otp'];
            }
            if ($otp == $existing_traveler_otp) {
                $this->view->fp_traveler = $this->model->checkForExistingTraveler($email);
                $this->view->render('unregistered/forgot_pw_step3');
            }
        } else if (mysqli_num_rows($existingVehicle) > 0) {
            while ($rows = mysqli_fetch_array($existingVehicle)) {
                $existing_vehicle_otp = $rows['otp'];
            }
            if ($otp == $existing_vehicle_otp) {
                $this->view->fp_traveler = $this->model->checkForExistingVehicle($email);
                $this->view->render('unregistered/forgot_pw_step3');
            }
        } else if (mysqli_num_rows($existingHotel) > 0) {
            while ($rows = mysqli_fetch_array($existingHotel)) {
                $existing_Hotel_otp = $rows['otp'];
            }
            if ($otp == $existing_Hotel_otp) {
                $this->view->fp_traveler = $this->model->checkForExistingHotel($email);
                $this->view->render('unregistered/forgot_pw_step3');
            }
        } else {
            header('location: fogotPasswordGetUsername?error=Invalid OTP. Try again !');
            exit();
        }
    }

    function resetPassword()
    {
        $email = trim($_POST['username_forgot_pw']);
        $newPassword = trim($_POST['new_forgot_pw']);
        $confirmPassword = trim($_POST['confirm_forgot_pw']);

        $existingTraveler = $this->model->checkForExistingTraveler($email);
        $existingVehicle = $this->model->checkForExistingVehicle($email);
        $existingHotel = $this->model->checkForExistingHotel($email);

        if (empty($newPassword) || empty($confirmPassword)) {
            header('location: resetPasswordErrors/$email?error=Passwords cannot be empty');
        } else if ($newPassword != $confirmPassword) {
            header('location: resetPasswordErrors/$email?error=Passwords do not match');
        } else {
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            if (mysqli_num_rows($existingTraveler) > 0) {
                $isUpdatedPassword = $this->model->updateTravelerPassword($newPassword, $email);
                if ($isUpdatedPassword === false) {

                    header('location: fogotPasswordGetUsername?error=Failed to reset password. Try again !');
                } else {
                    header('location: login');
                }
            } else if (mysqli_num_rows($existingVehicle) > 0) {
                $isUpdatedPassword = $this->model->updateVehiclePassword($newPassword, $email);
                if ($isUpdatedPassword === false) {
                    header('location: fogotPasswordGetUsername?error=Failed to reset password. Try again !');
                } else {
                    header('location: login');
                }
            } else if (mysqli_num_rows($existingHotel) > 0) {
                $isUpdatedPassword = $this->model->updateHotelPassword($newPassword, $email);
                if ($isUpdatedPassword === false) {
                    header('location: fogotPasswordGetUsername?error=Failed to reset password. Try again !');
                } else {
                    header('location: login');
                }
            } else {
                header('location: login?error=Failed to reset password. Try again !');
            }
        }
    }

    function resetPasswordErrors($email)
    {
        $this->view->fp_traveler = $this->model->checkForExistingTraveler($email);
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
            $this->model->addTraveler($traveler_id, $name, $email, $contact2, $contact1, $password, $adressLine1, $adressLine2, $city, $otp);
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
        $price_for_1km = trim($_POST['price_for_1km']);
        $price_for_day = trim($_POST['price_for_day']);
        $driver_type = $_POST['driver_type'];
        $ac = $_POST['ac'];
        $image = $_FILES['vehcle_image'];
        if (isset($_POST['driver_name']) && isset($_POST['driver_contact1']) && isset($_POST['driver_contact2']) && isset($_POST['driver_charge'])) {
            $driver_charge = trim($_POST['driver_charge']);
            $driver_name = trim($_POST['driver_name']);
            $driver_contact1 = trim($_POST['driver_contact1']);
            $driver_contact2 = trim($_POST['driver_contact2']);
        } else {
            $driver_charge = NULL;
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
                    $imageDestination = APPROOT . '/public/images/assets/vehicle/' . $imageNewName;
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
            $this->model->addVehicleOwner($owner_id, $owner_name, $email, $contact2, $contact1, $otp, $password);
            $this->model->addVehicle($owner_id, $vehicle_id, $vehicle_no, $type, $Vehicle_model, $city, $no_of_passengers, $price_for_1km, $price_for_day, $driver_type, $driver_charge, $ac, $imageNewName, $driver_name, $driver_contact1, $driver_contact2);
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
        $description = trim($_POST['description']);
        $website = trim($_POST['web']);
        $latitude = trim($_POST['lat']);
        $longitude = trim($_POST['lng']);
        $rep_name = trim($_POST['rep_name']);
        $rep_email = trim($_POST['rep_email']);
        $rep_contact1 = trim($_POST['rep_contact1']);
        $rep_contact2 = trim($_POST['rep_contact2']);
        $hotel_type = $_POST['hotel_type-type'];
        $image = $_FILES['hotel_image'];
        $status = "NEW";
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

        // uploading hotel image

        $error = array();
        $countImg = 0;

        foreach ($_FILES["hotel_image"]["tmp_name"] as $key => $tmp_name) {
            $imageName = $_FILES['hotel_image']['name'][$key];
            $imageTmpName = $_FILES['hotel_image']['tmp_name'][$key];
            $imageSize = $_FILES['hotel_image']['size'][$key];
            $imageError = $_FILES['hotel_image']['error'][$key];
            $imageType = $_FILES['hotel_image']['type'][$key];

            $imageExt = explode('.', $imageName);
            $imageActucalExt = strtolower(end($imageExt));
            $allowedFormates = array('jpg', 'jpeg', 'png');

            echo $imageActucalExt;

            if (in_array($imageActucalExt, $allowedFormates)) {
                if ($imageError === 0) {
                    if ($imageSize < 500000) {
                        $imageNewName[$countImg] = uniqid('', true) . "." . $imageActucalExt;
                        $imageDestination = APPROOT . '/public/images/assets/hotel/' . $imageNewName[$countImg];
                        move_uploaded_file($imageTmpName, $imageDestination);
                    } else {
                        $error[$countImg][0] = "Your image is too big..!";
                    }
                } else {
                    $error[$countImg][1] = "There was an error uploading your image..!";
                }
            } else {
                $error[$countImg][2] = "You cannot upload images of this type..!";
            }
            $countImg = $countImg + 1;
        }

        $errormsg = "";
        for ($row = 0; $row <= $countImg; $row++) {
            for ($col = 0; $col < 3; $col++) {
                if (!empty($error[$row][$col])) {
                    $errormsg . "picture " . $row . " error - " . $error[$row][$col] . "\n";
                }
            }
        }

        if ($errormsg != "") {
            header('location: signupHotel?error=' . $errormsg);
        }

        if (mysqli_num_rows($this->model->checkForExistingUsers($email)) > 0) {
            header('location: signupHotel?error=Someone already taken that email. Try with another..!');
        } else {
            echo $imageName;
            $this->model->addHotel($hotel_id, $name, $regNo, $licenceNo, $line1, $line2, $city, $latitude, $longitude, $contact1, $contact2, $description, $website, $email, $password, $hotel_type, $rep_name, $rep_email, $rep_contact1, $rep_contact2,$single_price,$massive_price,$status, $otp);
            $this->model->addHotelRoom($hotel_id, 'single', $single_count, 1, $single_food, $single_mini_bar, $single_ac, $single_price);
            $this->model->addHotelRoom($hotel_id, 'double', $double_count, 2, $double_food, $double_mini_bar, $double_ac, $double_price);
            $this->model->addHotelRoom($hotel_id, 'family', $family_count, 4, $family_food, $family_mini_bar, $family_ac, $family_price);
            $this->model->addHotelRoom($hotel_id, 'massive', $massive_count, $massive_capacity, $massive_food, $massive_mini_bar, $massive_ac, $massive_price);
            for ($rows = 0; $rows < $countImg; $rows++) {
                $image_id = uniqid('hotelimg_');
                $this->model->addHotelImages($hotel_id, $image_id, $imageNewName[$rows]);
            }
            header('location: login');
        }
    }

    function termsAndConditions()
    {
        $this->view->render('unregistered/tc');
    }
}
