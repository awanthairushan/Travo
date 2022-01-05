<?php
    class Unregistered_Model extends Model {
        function __construct() {
            parent:: __construct();
        }
        function getFaq(){
            return $this->db->selectQuery("SELECT faq_id,question,answer FROM faq");
        }
        function getFeedback(){
            return $this->db->selectQuery("SELECT feedback_id,date,feedback FROM feedback");
        }
    }