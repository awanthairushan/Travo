<?php

class Admin_Model extends Model{

    function __construct()
    {
        parent::__construct();
    }

//----------------------------------------Admin-Travelers---------------------------------------------------
function getTravelerDetails(){
    return $this->db->runQuery("SELECT *,ROW_NUMBER() OVER(ORDER BY name) AS row_no FROM travelers");
}
function deleteTraveler($travelerID){
    return $this->db->runQuery("DELETE FROM travelers WHERE travelerID= '$travelerID'");
}
function updateDeletedAccounts($acc_id, $email){
    return $this->db->runQuery("INSERT INTO deleted_accounts (acc_id, email) VALUES ('$acc_id', '$email')");
}


//----------------------------------------Admin-Vehicle---------------------------------------------------
function getVehicleDetails(){
    return $this->db->runQuery("SELECT *,ROW_NUMBER() OVER(ORDER BY vehicle_no) AS row_no FROM vehicles");
}
function getVehicleOwnerDetails(){
    return $this->db->runQuery("SELECT * from vehicle_owners");
}


//----------------------------------------Admin-Hotels---------------------------------------------------
function getNewHotelDetails(){
    return $this->db->runQuery("SELECT *,ROW_NUMBER() OVER(ORDER BY name) AS row_no FROM hotels WHERE status='NEW'");
}
function getExsistingHotelDetails(){
    return $this->db->runQuery("SELECT *,ROW_NUMBER() OVER(ORDER BY name) AS row_no FROM hotels WHERE status='Existing'");

}
function declineHotel($hotelID){
    return $this->db->runQuery("DELETE FROM hotels WHERE hotelID= '$hotelID'");
}
function acceptHotel($hotelID){
    return $this->db->runQuery("UPDATE hotels SET status='Existing' WHERE hotelID='$hotelID' ");
}
function getAllHotelDetails($hotel_id){
    return $this->db->runQuery("SELECT h.*, i.* FROM hotels h INNER JOIN hotel_images i ON h.hotelID = i.hotelID WHERE h.hotelID='$hotel_id'");
}
function getDoubleRoomDetails($hotel_id){
    return $this->db->runQuery("SELECT * from hotel_rooms WHERE hotelID='$hotel_id' AND room_type = 'double' " );
}
function getFamilyRoomDetails($hotel_id){
    return $this->db->runQuery("SELECT * from hotel_rooms WHERE hotelID='$hotel_id' AND room_type = 'family' " );
}
function getSingleRoomDetails($hotel_id){
    return $this->db->runQuery("SELECT * from hotel_rooms WHERE hotelID='$hotel_id' AND room_type = 'single' " );
}
function getMassiveRoomDetails($hotel_id){
    return $this->db->runQuery("SELECT * from hotel_rooms WHERE hotelID='$hotel_id' AND room_type = 'massive' " );
}

//----------------------------------------Admin-Faq---------------------------------------------------------
    function getFaq(){
        return $this->db->runQuery("SELECT * FROM faq");
    }
    function addFaq($id,$question,$answer){
       // echo "Model ekata aawaa";
        $this->db->runQuery("INSERT INTO faq (faq_id, question, answer) VALUES ('$id', '$question', '$answer')");
    }
    function deleteFaq($id){
        $this->db->runQuery("DELETE FROM faq WHERE faq_id= '$id'");
    }


//----------------------------------------Admin-Feedback---------------------------------------------------------
function getFeedback(){
    return $this->db->runQuery("SELECT * FROM feedback");
}
function deleteFeedback($id){
    $this->db->runQuery("DELETE FROM feedback WHERE feedback_id= '$id'");
}


}