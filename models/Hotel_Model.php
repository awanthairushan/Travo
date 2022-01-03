<?php

class Hotel_Model extends Model{

    function __construct()
    {
        parent::__construct();
    }

//----------------------------------------Hotel_updateprofile---------------------------------------------------
function getHotelDetails(){
    return $this->db->selectQuery("SELECT hotelID,name,city,location,address_line1,address_line2,rep_name,rep_email,rep_contact1,rep_contact2 FROM hotels");
}



//----------------------------------------Hotel-Faq---------------------------------------------------------
function getFaq(){
    return $this->db->selectQuery("SELECT faq_id,question,answer FROM faq");
}
    // function addFaq($faq_id,$question,$answer){
    //     $this->db->insertQuery("INSERT INTO faq (faq_id, question, answer) VALUES ('$faq_id', '$question', '$answer')");
    // }

    //----------------------------------------Hotel-Feedback---------------------------------------------------------
    function getFeedback(){
        return $this->db->selectQuery("SELECT feedback_id,date,feedback FROM feedback");
    }
}