<?php

class Hotel_Model extends Model{

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

    function updateHotel($new_name,$new_regNo,$new_licenceNo,$new_address1,$new_address2,$new_city,$new_location,$new_email,$new_contact1,$new_contact2,$new_description,$new_webUrl,$new_password,$new_hotelType,$new_repName,$new_repEmail,$new_repContact1,$new_repContact2,$hotel_id){
        return $this->db->runQuery("UPDATE hotels SET name='$new_name', regNo='$new_regNo', licenceNo='$new_licenceNo', address_line1='$new_address1', address_line2='$new_address2', city='$new_city', location='$new_location', email='$new_email', contact1='$new_contact1', contact2='$new_contact2', description='$new_description', webUrl='$new_webUrl', password='$new_password', hotel_type='$new_hotelType', rep_name='$new_repName', rep_email='$new_repEmail', rep_contact1='$new_repContact1', rep_contact2='$new_repContact2' WHERE hotelID='$hotel_id' ");
    }
    
    function selectHotel($user){
        return $this->db->runQuery("SELECT * FROM hotels WHERE email='$user'");
    }
}
