<?php
    class Vehicle_Model extends Model {
        function __construct () {
            parent::__construct();
        }
        function getFaq(){
            return $this->db->selectQuery("SELECT faq_id,question,answer FROM faq");
        }
        function getVehicleDetails(){
            return $this->db->selectQuery("SELECT * FROM vehicles");
        }
        function getOwnerDetails(){
            return $this->db->selectQuery("SELECT * FROM vehicle_owners");
        }
    }