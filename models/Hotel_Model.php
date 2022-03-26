<?php

class   Hotel_Model extends Model{

    function __construct()
    {
        parent::__construct();
    }

//----------------------------------------Hotel_updateprofile---------------------------------------------------
function getHotelDetails(){
    return $this->db->runQuery("SELECT hotelID,name,city,location,address_line1,address_line2,rep_name,rep_email,rep_contact1,rep_contact2 FROM hotels");
}



//----------------------------------------Hotel-Faq---------------------------------------------------------
function getFaq(){
    return $this->db->runQuery("SELECT faq_id,question,answer FROM faq");
}
    // function addFaq($faq_id,$question,$answer){
    //     $this->db->insertQuery("INSERT INTO faq (faq_id, question, answer) VALUES ('$faq_id', '$question', '$answer')");
    // }

    //----------------------------------------Hotel-Feedback---------------------------------------------------------
    function getFeedback(){
        return $this->db->runQuery("SELECT feedback_id,date,feedback FROM feedback");
    }

    function updateHotel($hotel_id,$new_name,$new_regNo,$new_licenceNo,$new_line1,$new_line2,$new_city,$new_latitude,$new_longitude,$new_contact1,$new_contact2,$new_decription,$new_email,$new_password,$new_hotel_type,$new_website,$new_rep_name,$new_rep_email,$new_rep_contact1,$new_rep_contact2){
        return $this->db->runQuery("UPDATE hotels SET name='$new_name', regNo='$new_regNo', hotel_type='$new_hotel_type', licenceNo='$new_licenceNo' , address_line1='$new_line1' , address_line2='$new_line2' , city='$new_city' , longitude = '$new_longitude', latitude='$new_latitude' , contact1='$new_contact1', contact2='$new_contact2', email='$new_email', password='$new_password', webUrl='$new_website', description='$new_decription', rep_name='$new_rep_name', rep_email='$new_rep_email', rep_contact1='$new_rep_contact1', rep_contact2='$new_rep_contact2' WHERE hotelId='$hotel_id'");
    }
    
    function selectHotel($user){
        return $this->db->runQuery("SELECT * FROM hotels WHERE email='$user'");
    }

    //----------------------------------------Hotel-Update Availability--------------------------------------------------
    function selectSinglePrice($userID){
        return $this->db->runQuery("SELECT * FROM hotel_rooms WHERE hotelID='$userID' AND room_type='single'");
    }

    function selectDoublePrice($userID){
        return $this->db->runQuery("SELECT * FROM hotel_rooms WHERE hotelID='$userID' AND room_type='double'");
    }

    function selectFamilyPrice($userID){
        return $this->db->runQuery("SELECT * FROM hotel_rooms WHERE hotelID='$userID' AND room_type='family'");
    }

    function selectMassivePrice($userID){
        return $this->db->runQuery("SELECT * FROM hotel_rooms WHERE hotelID='$userID' AND room_type='massive'");
    }

    function selectBookingToDate($userID,$date){
        return $this->db->runQuery("SELECT count(*) as total FROM hotel_availability WHERE hotelID='$userID' AND date='$date'");
    }

    function selectBooking($userID,$date){
        return $this->db->runQuery("SELECT * FROM hotel_availability WHERE hotelID='$userID' AND date='$date'");
    }

    function updateHotelAvailability($userID,$date,$sr,$dr,$fr,$mr){
        return $this->db->runQuery("UPDATE hotel_availability SET single_rooms = '$sr', double_rooms = '$dr', family_rooms = '$fr', massive_rooms = '$mr' WHERE hotelID = '$userID' AND date = '$date'");
    }

    function addHotelAvailability($userID,$date,$sr,$dr,$fr,$mr){
        return $this->db->runQuery("INSERT INTO hotel_availability (hotelID, date, single_rooms, double_rooms, family_rooms, massive_rooms) VALUES ('$userID','$date','$sr','$dr','$fr','$mr')");
    }
    function hotelBookings($hotel_id,$trip_id,$traveler_id,$date,$day,$singleNumber,$doubleNumber,$familyNumber,$massiveNumber,$price){
        return $this->db->runQuery("INSERT INTO trip_hotels (hotelId, trip_id, traveler_id, date, day, single_count, double_count, family_count, massive_count, price) VALUES ('$hotel_id', '$trip_id', '$traveler_id', '$date', '$day', '$singleNumber', '$doubleNumber', '$familyNumber', '$massiveNumber', '$price')");
    }
    function getBooking($userID,$date){
        return $this->db->runQuery("SELECT * FROM trip_hotels WHERE hotelId='$userID' AND date='$date'");
    }
    function getCustomerDetails($travelerId)
    {
        return $this->db->runQuery("SELECT * FROM travelers WHERE travelerID = '$travelerId'");
    }
}
