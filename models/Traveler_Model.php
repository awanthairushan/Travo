<?php

class Traveler_Model extends Model{

    function __construct()
    {
        parent::__construct();
    }



    //----------------------------------------Traveler-Vehicle---------------------------------------------------
    
    function getVehicleAndOwnerDetails(){
        return $this->db->runQuery("SELECT * from vehicles INNER JOIN vehicle_owners ON vehicles.owner_id=vehicle_owners.owner_id");
    }

    function vehicleSeats(){
        return $this->db->runQuery("SELECT DISTINCT no_of_passengers from vehicles ORDER BY no_of_passengers");
    }
    
    function vehicleType(){
        return $this->db->runQuery("SELECT DISTINCT type from vehicles");
    }

    //----------------------------------------Traveler-Faq---------------------------------------------------------
    function getFaq(){
        return $this->db->runQuery("SELECT faq_id,question,answer FROM faq");
    }

    //----------------------------------------Traveler-Feedback---------------------------------------------------------
    function getFeedback(){
        return $this->db->runQuery("SELECT feedback_id,date,feedback FROM feedback");
    }

    function addFeedbacks($feedback){
    
      $id=uniqid("fee_");
      return $this->db->runQuery("INSERT INTO feedback (feedback_id, date, feedback) VALUES ('$id', curdate(), '$feedback')");
    }

}

?>