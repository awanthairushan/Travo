<?php

class Unregistered_Model extends Model{

    function __construct()
    {
        parent::__construct();
    }
    function getFaq(){
        return $this->db->runQuery("SELECT faq_id,question,answer FROM faq");
    }
    function getFeedback(){
        return $this->db->runQuery("SELECT feedback_id,date,feedback FROM feedback");
    }
    function addTraveler($traveler_id,  $name,  $email, $contact2, $contact1, $password, $adressLine1, $adressLine2, $city, $otp){
        $this->db->runQuery("INSERT INTO travelers VALUES ('$traveler_id', '$name', '$adressLine1', '$adressLine2', '$city', '$email', '$password', '$contact2', '$contact1', '$otp')");
    }
    function checkForExistingUsers($email){
        return $this->db->runQuery("SELECT email FROM hotels WHERE email = '$email' UNION SELECT email FROM travelers WHERE email = '$email' UNION SELECT email FROM vehicle_owners WHERE email = '$email'");
    }
    function checkForExistingTraveler($email){
        return $this->db->runQuery("SELECT * FROM travelers WHERE email='$email'");
    }
    function checkForExistingVehicle($email){
        return $this->db->runQuery("SELECT * FROM vehicle_owners WHERE email='$email'");
    }
    function checkForExistingHotel($email){
        return $this->db->runQuery("SELECT * FROM hotels WHERE email = '$email' ");
    }
    function selectAdmin($username){
        return $this->db->runQuery("SELECT * FROM admin WHERE username = '$username'");
    }
    function selectTraveler($username){
        return $this->db->runQuery("SELECT * FROM travelers WHERE email = '$username'");
    }
    function selectHotel($username){
        return $this->db->runQuery("SELECT * FROM hotels WHERE email = '$username'");
    }
    function selectVehicle($username){
        return $this->db->runQuery("SELECT * FROM vehicle_owners WHERE email = '$username'");
    }
    function selectdeleted($username){
        return $this->db->runQuery("SELECT * FROM deleted_accounts WHERE email = '$username'");
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
    function addVehicle($owner_id, $vehicle_id, $vehicle_no, $type, $Vehicle_model, $city, $no_of_passengers,  $price_for_1km, $price_for_day, $driver_type, $driver_charge, $ac, $image, $driver_name, $driver_contact1, $driver_contact2){
        // $this->db->runQuery("INSERT INTO vehicles VALUES ('$vehicle_id', '$vehicle_no',  '$type', ' $Vehicle_model', '$city', '$owner_id', 
        // '$price_for_1km', '$price_for_day', '$driver_type', '$driver_charge', '$ac', '$no_of_passengers', '$image', '$driver_name', 
        // '$driver_contact1', '$driver_contact2')");

       $this->db->runQuery("INSERT INTO vehicles (vehicle_id, vehicle_no, type, vehicle_model, city, owner_id, price_for_1km, price_for_day, driver_type, driver_charge, ac, no_of_passengers, vehicle_image, driver_name, driver_contact1, driver_contact2) VALUES ('$vehicle_id', '$vehicle_no', '$type', '$Vehicle_model', '$city', '$owner_id', '$price_for_1km', '$price_for_day', '$driver_type', '$driver_charge', '$ac', '$no_of_passengers', '$image', '$driver_name', '$driver_contact1', '$driver_contact2')");
    }
    function addVehicleOwner($owner_id, $owner_name,  $email, $contact2, $contact1, $otp, $password){
        $this->db->runQuery("INSERT INTO vehicle_owners VALUES ('$owner_id', '$owner_name', '$email', '$password', '$contact1', '$contact2',  '$otp')");
    }
    function addHotel($hotel_id, $name, $regNo, $licenceNo, $line1, $line2, $city, $latitude, $longitude, $contact1, $contact2, $description, $website, $email, $password, $hotel_type, $rep_name, $rep_email, $rep_contact1, $rep_contact2,$single_price,$massive_price,$status, $otp){
        $this->db->runQuery("INSERT INTO hotels VALUES ('$hotel_id', '$name','$regNo', '$licenceNo', '$line1', '$line2', '$city','$longitude', '$latitude', '$contact1','$contact2','$description', '$website', '$email','$password','$hotel_type','$rep_name', '$rep_email', '$rep_contact1', '$rep_contact2','$single_price','$massive_price', '$status' ,'$otp')");
    }
    function addHotelRoom($hotel_id,$type,$room_count,$room_capacity,$room_food,$room_mini_bar,$room_ac,$room_price){
        $this->db->runQuery("INSERT INTO hotel_rooms VALUES ('$hotel_id', '$type', '$room_count',$room_capacity, '$room_food', '$room_mini_bar', '$room_ac', '$room_price')");
    }
    function addHotelImages($hotel_id,$image_id,$images){
        $this->db->runQuery("INSERT INTO hotel_images VALUES ('$hotel_id', '$image_id', '$images')");
    }
    function updateTravelerOtp($traveler_otp, $user_email){
        $this->db->runQuery("UPDATE travelers SET otp = '$traveler_otp' WHERE email = '$user_email' ");
    }
    function updateTravelerPassword($newPassword, $email){
        $this->db->runQuery("UPDATE travelers SET password = '$newPassword' WHERE email = '$email' ");
    }
    function updateVehicleOtp($vehicle_otp, $user_email){
        $this->db->runQuery("UPDATE vehicle_owners SET otp = '$vehicle_otp' WHERE email = '$user_email' ");
    }
    function updateVehiclePassword($newPassword, $email){
        $this->db->runQuery("UPDATE vehicle_owners SET password = '$newPassword' WHERE email = '$email' ");
    }
    function updateHotelOtp($hotel_otp, $user_email){
        $this->db->runQuery("UPDATE hotels SET otp = '$hotel_otp' WHERE email = '$user_email' ");
    }
    function updateHotelPassword($newPassword, $email){
        $this->db->runQuery("UPDATE hotels SET password = '$newPassword' WHERE email = '$email' ");
    }
}
