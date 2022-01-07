<?php
    class Vehicle_Model extends Model {
        function __construct () {
            parent::__construct();
        }
        function getFaq(){
            return $this->db->runQuery("SELECT faq_id,question,answer FROM faq");
        }
        function getVehicleDetails(){
            return $this->db->runQuery("SELECT * FROM vehicles");
        }
        function getOwnerDetails(){
            return $this->db->runQuery("SELECT * FROM vehicle_owners");
        }
    }