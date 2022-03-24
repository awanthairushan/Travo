<?php
    class Vehicle_Model extends Model {
        function __construct () {
            parent::__construct();
        }
        function getFaq(){
            return $this->db->runQuery("SELECT faq_id,question,answer FROM faq");
        }
        function getVehicleDetails($user){
            //return $this->db->runQuery("SELECT * FROM vehicles");
           return $this->db->runQuery("SELECT vehicles.*, vehicle_owners.* FROM vehicles INNER JOIN vehicle_owners ON vehicles.owner_id = vehicle_owners.owner_id WHERE vehicle_owners.email = '$user' ");
        }
        function getVehicleDetailsId($vehicle_id){
            //return $this->db->runQuery("SELECT * FROM vehicles");
           return $this->db->runQuery("SELECT * FROM vehicles  WHERE vehicle_id='$vehicle_id'");
        }
        function getVehicleCount($user){
            //return $this->db->runQuery("SELECT * FROM vehicles");
           return $this->db->runQuery("SELECT COUNT(*) AS vehicle_count FROM vehicles INNER JOIN vehicle_owners ON vehicles.owner_id = vehicle_owners.owner_id WHERE vehicle_owners.email = '$user' ");
        }
        function getOwnerDetails($user){
            return $this->db->runQuery("SELECT * FROM vehicle_owners WHERE email='$user'");
        }
        function getOwner($user){
            return $this->db->runQuery("SELECT owner_id FROM vehicle_owners WHERE email='$user'");
        }
        function getVehicle($user){
            return $this->db->runQuery("SELECT  vehicles.* FROM vehicle_owners WHERE email='$user'");
        }
        function addVehicle($vehicle_id,$vehicle_no, $type,$vehicle_model, $city,$owner_id,$price_for_1km,$price_for_day,$driver_type,$driver_charge,$ac,$no_of_passengers,$vehicle_image,$driver_name,$driver_contact1,$driver_contact2){
            return $this->db->runQuery("INSERT INTO vehicles (vehicle_id, vehicle_no, type, vehicle_model, city, owner_id, price_for_1km, price_for_day, driver_type, driver_charge, ac, no_of_passengers, vehicle_image, driver_name, driver_contact1, driver_contact2) 
                                            VALUES ('$vehicle_id', '$vehicle_no', '$type','$vehicle_model', '$city', '$owner_id', '$price_for_1km', '$price_for_day', '$driver_type', '$driver_charge', '$ac', '$no_of_passengers', '$vehicle_image', '$driver_name', '$driver_contact1', '$driver_contact2')");
        }
        function updateProfileDetails($owner_id, $new_name, $new_email, $new_contact2, $new_contact1, $new_password){
            return $this->db->runQuery("UPDATE vehicle_owners SET owner_name='$new_name', email='$new_email', password='$new_password', contact1='$new_contact1', contact2='$new_contact2' WHERE owner_id='$owner_id' ");
        }
        function updateVehicleDetails($vehicle_id, $new_vehicle_no, $new_type, $new_no_of_passengers, $new_city, $new_price_for_1km, $new_price_for_day, $new_driver_type, $new_driver_charge, $new_ac){
            return $this->db->runQuery("UPDATE vehicles SET vehicle_no = '$new_vehicle_no', type = '$new_type', city = '$new_city', price_for_1km = '$new_price_for_1km', price_for_day = '$new_price_for_day', driver_type = '$new_driver_type', driver_charge = '$new_driver_charge', ac = '$new_ac', no_of_passengers = '$new_no_of_passengers' WHERE vehicle_id = '$vehicle_id'");
        }
        function deleteVehicle($vehicle_id){
            $this->db->runQuery("DELETE FROM vehicles WHERE vehicle_id='$vehicle_id'");
        }
        function deleteVehicleOwner($owner_id){
            $this->db->runQuery("DELETE FROM vehicle_owners WHERE owner_id='$owner_id'");
        }
    }