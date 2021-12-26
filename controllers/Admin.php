<?php

class Admin extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    function index(){
        $this->view->render('admin/admin_trips');
    }

    
    function destinations(){
        $this->view->render('admin/admin_destinations');
    }
    function faq(){
        $this->view->faq = $this->model->getFaq();
       // $this->view->faq = $this->model->addFaq();
        $this->view->render('admin/admin_faq');
    }
    function feedback(){
        $this->view->feedback = $this->model->getFeedback();
        $this->view->render('admin/admin_feedback');
    }
    function hotelsMore(){
        $this->view->render('admin/admin_hotels_more');
    }
    function hotels(){
        $this->view->hotels = $this->model->getHotelDetails();
        $this->view->render('admin/admin_hotels');
    }
    function travelers(){
        $this->view->travelers = $this->model->getTravelerDetails();
        $this->view->render('admin/admin_travelers');
    }
    function tripDetails(){
        $this->view->render('admin/admin_trip_details');
    }
    function trips(){
        $this->view->render('admin/admin_trips');
    }
    function vehiclesMore(){
        $this->view->render('admin/admin_vehicles_more');
    }
    function vehicles(){
        $this->view->vehicle_details = $this->model->getVehicleDetails();
        $this->view->render('admin/admin_vehicles');
    }
    // function navigation(){
    //     $this->view->render('admin/admin_nav_bar');
    // }


}