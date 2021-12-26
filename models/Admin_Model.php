<?php

class Admin_Model extends Model{

    function __construct()
    {
        parent::__construct();
    }

//----------------------------------------Admin-Travelers---------------------------------------------------
function getTravelerDetails(){
    return $this->db->selectQuery("SELECT travelerID, ROW_NUMBER() OVER(ORDER BY name) AS row_no,name,address_line1,address_line2,city,email,contact1,contact2 FROM travelers");
}


//----------------------------------------Admin-Vehicle---------------------------------------------------
    function getVehicleDetails(){
        return $this->db->selectQuery("SELECT ROW_NUMBER() OVER(ORDER BY vehicle_no) AS row_no,vehicle_no,type,city FROM vehicles");
    }
    function getVehicleOwnerDetails(){
        return $this->db->selectQuery("SELECT * from vehicle_owners");
    }

//----------------------------------------Admin-Hotels---------------------------------------------------
function getHotelDetails(){
    return $this->db->selectQuery("SELECT ROW_NUMBER() OVER(ORDER BY name) AS row_no,name,city,location,address_line1,address_line2 FROM hotels");
}

//----------------------------------------Admin-Faq---------------------------------------------------------
    function getFaq(){
        return $this->db->selectQuery("SELECT faq_id,question,answer FROM faq");
    }
    // function addFaq($faq_id,$question,$answer){
    //     $this->db->insertQuery("INSERT INTO faq (faq_id, question, answer) VALUES ('$faq_id', '$question', '$answer')");
    // }

    //----------------------------------------Admin-Feedback---------------------------------------------------------
    function getFeedback(){
        return $this->db->selectQuery("SELECT feedback_id,date,feedback FROM feedback");
    }
}