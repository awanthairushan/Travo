<?php

class Vehicle extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    function index(){
        $this->view->render('vehicle/vehicle_home');
    }
    function faq(){
        $this->view->render('vehicle/vehicle_faq');
    }
    function myVehicle(){
        $this->view->render('vehicle/vehicle_view_vehicle');
    }
    function addVehicle(){
        $this->view->render('vehicle/vehicle_addnew');
    }
    function updateVehicle(){
        $this->view->render('vehicle/vehicle_update');
    }
    function updateVehicleDetails(){
        $this->view->render('vehicle/vehicle_update_vehicle');
    }
}