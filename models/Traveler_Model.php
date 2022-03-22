<?php

class Traveler_Model extends Model{

    function __construct()
    {
        parent::__construct();
    }

    //----------------------------------------Traveler-session---------------------------------------------------

    function selectTravelers(){
        return $this->db->runQuery("SELECT * FROM travelers");
    }

    function selectTraveler($user){
        return $this->db->runQuery("SELECT * FROM travelers WHERE email='$user'");
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

    //----------------------------------------Traveler-update---------------------------------------------------------

    function updateTraveler($new_name,$new_email,$new_contact2,$new_contact1,$new_password,$new_adressLine1,$new_adressLine2,$new_city,$traveler_id){
        return $this->db->runQuery("UPDATE travelers SET name='$new_name', email='$new_email', address_line1='$new_adressLine1', address_line2='$new_adressLine2', city='$new_city', password='$new_password', contact1='$new_contact1', contact2='$new_contact2' WHERE travelerID='$traveler_id' ");
    }

    //---------------------------------------Traveler-plan trip home ----------------------------------------------------------

    function planTripHome($trip_id,$travelerID,$traveler_count,$start_date,$end_date,$trip_cat){
        return $this->db->runQuery("INSERT INTO trip_home (trip_id, no_of_people, traveler_id, start_date, end_date, category) VALUES ('$trip_id', '$traveler_count', '$travelerID', '$start_date', '$end_date', '$trip_cat')");
    }

    //---------------------------------------Traveler-Plan Trip-----------------------------------------------------------------

    function selectHalfTrip($trip_id){
        return $this->db->runQuery("SELECT * FROM trip_home WHERE trip_id='$trip_id'");
    }

    function planTripPending($trip_id,$travelerID,$start_date,$end_date,$difference,$trip_cat,$destination1,$destination2,$destination3,$chka,$chkb,$chkc,$hotel1,$hotel2,$hotel3,$traveler_count,$mileage,$budget){
        return $this->db->runQuery("INSERT INTO trips (trip_id, traveler_id, start_date, end_date, no_of_days, category, destination_id, destination_id2, destination_id3, sight_id, sight_id2, sight_id3, hotel_id1, hotel_id2, hotel_id3, no_of_people, mileage, total_budget, status) VALUES ('$trip_id', '$travelerID', '$start_date', '$end_date', '$difference', '$trip_cat', '$destination1', '$destination2', '$destination3', '$chka', '$chkb', '$chkc', '$hotel1', '$hotel2', '$hotel3', '$traveler_count', '$mileage', '$budget', 'Pending')");
    }

    function addBudget($trip_id,$budget,$hotelacc1,$hotelacc2,$hotelacc3,$totalacc,$servicecharges,$ticketfees){
        return $this->db->runQuery("INSERT INTO `budget` (`trip_id`, `hotel1_accomodation`, `hotel2_accomodation`, `hotel3_accomodation`, `total_expenses`, `accomodation`, `service_charges`, `ticket_fees`) VALUES ('$trip_id', '$hotelacc1', '$hotelacc2', '$hotelacc3', '$budget', '$totalacc', '$servicecharges', '$ticketfees')");
    }

    //-------------------------------------Traveler-budget--------------------------------------------------------------------

    function selectTrip($trip_id,$travelerID){
        return $this->db->runQuery("SELECT * FROM trips WHERE trip_id='$trip_id' AND traveler_id='$travelerID'");
    }

    function selectBudget($trip_id){
        return $this->db->runQuery("SELECT * FROM budget WHERE trip_id='$trip_id'");
    }

    function saveTrip($traveler_id,$trip_id){
        return $this->db->runQuery("UPDATE trips SET status='Saved' WHERE trip_id='$trip_id' AND traveler_id='$traveler_id'");
    }

    //------------------------------------Traveler-trip to go-------------------------------------------------------------------

    function selectPaidTrips($traveler_id){
        return $this->db->runQuery("SELECT * FROM trips WHERE traveler_id='$traveler_id' AND status='Paid'");
    }

    function selectSavedTrips($traveler_id){
        return $this->db->runQuery("SELECT * FROM trips WHERE traveler_id='$traveler_id' AND status='Saved'");
    }

    function selectCompletedTrips($traveler_id){
        return $this->db->runQuery("SELECT * FROM trips WHERE traveler_id='$traveler_id' AND status='Completed'");
    }

    function updateTripPaid($trip_id,$traveler_id){
        return $this->db->runQuery("UPDATE trips SET status='Paid' WHERE trip_id='$trip_id' AND traveler_id='$traveler_id' ");
    }

    function deleteTrip($trip_id){
        return $this->db->runQuery("DELETE FROM trips WHERE trip_id='$trip_id'");
    }

    function deleteBudget($trip_id){
        return $this->db->runQuery("DELETE FROM budget WHERE trip_id='$trip_id'");
    }

    //-----------------------------------Traveler-delete traveler------------------------------------------------------

    function deleteTraveler($traveler_id){
        return $this->db->runQuery("DELETE FROM travelers WHERE travelerID='$traveler_id'");
    }
}

?>