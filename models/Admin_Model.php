<?php

class Admin_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function selectAdmins($user)
    {
        return $this->db->runQuery("SELECT * FROM admin WHERE username='$user'");
    }

//----------------------------------------Admin-Travelers---------------------------------------------------
    function getTravelerDetails()
    {
        return $this->db->runQuery("SELECT *,ROW_NUMBER() OVER(ORDER BY name) AS row_no FROM travelers");
    }

    function deleteTraveler($travelerID)
    {
        return $this->db->runQuery("DELETE FROM travelers WHERE travelerID= '$travelerID'");
    }

    function updateDeletedAccounts($acc_id, $email)
    {
        return $this->db->runQuery("INSERT INTO deleted_accounts (acc_id, email) VALUES ('$acc_id', '$email')");
    }

    function getTravelerDetailsId($traveler_id)
    {
        return $this->db->runQuery("SELECT * FROM travelers WHERE travelerID='$traveler_id'");
    }


//----------------------------------------Admin-Vehicle---------------------------------------------------
    function getVehicleDetails()
    {
        return $this->db->runQuery("SELECT *,ROW_NUMBER() OVER(ORDER BY vehicle_no) AS row_no FROM vehicles");
    }

    function getVehicleOwnerDetails()
    {
        return $this->db->runQuery("SELECT * from vehicle_owners");
    }

    function getAllVehicleDetails()
    {
        return $this->db->runQuery("SELECT vehicles.*, vehicle_owners.*,ROW_NUMBER() OVER(ORDER BY vehicles.vehicle_no) AS row_no FROM vehicles INNER JOIN vehicle_owners ON vehicles.owner_id = vehicle_owners.owner_id");
        //return $this->db->runQuery("SELECT *,ROW_NUMBER() OVER(ORDER BY vehicle_no) AS row_no FROM vehicles");
    }

    function deleteVehicle($ownerId)
    {
        return $this->db->runQuery("DELETE FROM vehicle_owners WHERE owner_id = '$ownerId' ");
    }


//----------------------------------------Admin-Hotels---------------------------------------------------
    function getNewHotelDetails()
    {
        return $this->db->runQuery("SELECT *,ROW_NUMBER() OVER(ORDER BY name) AS row_no FROM hotels WHERE status='NEW'");
    }

    function getExsistingHotelDetails()
    {
        return $this->db->runQuery("SELECT *,ROW_NUMBER() OVER(ORDER BY name) AS row_no FROM hotels WHERE status='Existing'");

    }

    function declineHotel($hotelID)
    {
        return $this->db->runQuery("DELETE FROM hotels WHERE hotelID= '$hotelID'");
    }

    function acceptHotel($hotelID)
    {
        return $this->db->runQuery("UPDATE hotels SET status='Existing' WHERE hotelID='$hotelID' ");
    }

    function getAllHotelDetails($hotel_id)
    {
        return $this->db->runQuery("SELECT h.*, i.* FROM hotels h INNER JOIN hotel_images i ON h.hotelID = i.hotelID WHERE h.hotelID='$hotel_id'");
    }

    function getDoubleRoomDetails($hotel_id)
    {
        return $this->db->runQuery("SELECT * from hotel_rooms WHERE hotelID='$hotel_id' AND room_type = 'double' ");
    }

    function getFamilyRoomDetails($hotel_id)
    {
        return $this->db->runQuery("SELECT * from hotel_rooms WHERE hotelID='$hotel_id' AND room_type = 'family' ");
    }

    function getSingleRoomDetails($hotel_id)
    {
        return $this->db->runQuery("SELECT * from hotel_rooms WHERE hotelID='$hotel_id' AND room_type = 'single' ");
    }

    function getMassiveRoomDetails($hotel_id)
    {
        return $this->db->runQuery("SELECT * from hotel_rooms WHERE hotelID='$hotel_id' AND room_type = 'massive' ");
    }

    function getHotelImages($hotel_id)
    {
        return $this->db->runQuery("SELECT * from hotel_images WHERE hotelID = '$hotel_id'");
    }

//----------------------------------------Admin-Faq---------------------------------------------------------
    function getFaq()
    {
        return $this->db->runQuery("SELECT * FROM faq");
    }

    function addFaq($id, $question, $answer)
    {
        // echo "Model ekata aawaa";
        $this->db->runQuery("INSERT INTO faq (faq_id, question, answer) VALUES ('$id', '$question', '$answer')");
    }

    function deleteFaq($id)
    {
        $this->db->runQuery("DELETE FROM faq WHERE faq_id= '$id'");
    }


//----------------------------------------Admin-Feedback---------------------------------------------------------
    function getFeedback()
    {
        return $this->db->runQuery("SELECT * FROM feedback");
    }

    function deleteFeedback($id)
    {
        $this->db->runQuery("DELETE FROM feedback WHERE feedback_id= '$id'");
    }

//----------------------------------------Admin-Destination---------------------------------------------------------
function addDestination($destination, $destinationId){
    $this->db->runQuery("INSERT INTO destinations (destination_id, destination) VALUES ('$destinationId', '$destination')");
}
// function addSights($destinationId, $sightId, $sights,$ticketPrices,$categories,$location){
//     return $this->db->runQuery("INSERT INTO sights (destination_id, sight_id, sight, category, ticket_price, location) VALUES ('$destinationId', '$sightId', '$sights', '$categories', '$ticketPrices', '$location')");
// }
function addSights($destinationId, $sightId, $sights,$ticketPrices,$categories,$longitude,$latitude){
    return $this->db->runQuery("INSERT INTO sights (destination_id, sight_id, sight, category, ticket_price, longitude, latitude) VALUES ('$destinationId', '$sightId', '$sights', '$categories', '$ticketPrices', '$longitude', '$latitude')");
}
function getDestination(){
    return $this->db->runQuery("SELECT * FROM destinations");
}
function getSights($destinationId){
    return $this->db->runQuery("SELECT * FROM sights WHERE destination_id = '$destinationId' ");
}
function getDestinationId($destination){
    return $this->db->runQuery("SELECT destination_id FROM destinations WHERE destination='$destination'");
}
function removeSight($sightId){
    return $this->db->runQuery("DELETE FROM `sights` WHERE `sights`.`sight_id` = '$sightId' ");
}
function selectSights($sightId){
    return $this->db->runQuery("SELECT * FROM sight WHERE sight_id = '$sightId' ");
}

//----------------------------------------Admin-Trips---------------------------------------------------------

function getSavedTripDetails(){
    return $this->db->runQuery("SELECT * FROM trips WHERE status='Saved' ");
}
function getPaidTripDetails(){
    return $this->db->runQuery("SELECT * FROM trips WHERE status='Paid' ");
}
function getCompletedTripDetails(){
    return $this->db->runQuery("SELECT * FROM trips WHERE status='Completed' ");
}
function selectBudget($trip_id){
    return $this->db->runQuery("SELECT * FROM budget WHERE trip_id='$trip_id'");
}
function selectTrip($trip_id, $traveler_id){
    return $this->db->runQuery("SELECT * FROM trips WHERE trip_id='$trip_id' AND traveler_id = '$traveler_id' ");
}
function selectTraveler($travelerID){
    return $this->db->runQuery("SELECT * FROM travelers WHERE travelerID= '$travelerID'");
}
function selectFirstHotel($trip_id){
    return $this->db->runQuery("SELECT trip_hotels.hotelId, hotels.name FROM trip_hotels INNER JOIN hotels ON trip_hotels.hotelId = hotels.hotelID WHERE trip_hotels.trip_id = '$trip_id' AND trip_hotels.day = 'first' ");
}
function selectSecondHotel($trip_id){
    return $this->db->runQuery("SELECT trip_hotels.hotelId, hotels.name FROM trip_hotels INNER JOIN hotels ON trip_hotels.hotelId = hotels.hotelID WHERE trip_hotels.trip_id = '$trip_id' AND trip_hotels.day = 'second' ");
}
function updateTrips($tripId){
    return $this->db->runQuery("UPDATE `trips` SET `status` = 'Completed' WHERE `trips`.`trip_id` = '$tripId';");
}


//----------------------------------------Admin-Trips More---------------------------------------------------------



}