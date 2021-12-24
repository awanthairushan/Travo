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
        //$this->view->users = $this->model->getData();
        $this->view->render('admin/admin_destinations');
    }
    function faq(){
        $this->view->render('admin/admin_faq');
    }
    function feedback(){
        $this->view->render('admin/admin_feedback');
    }
    function hotelsMore(){
        $this->view->render('admin/admin_hotels_more');
    }
    function hotels(){
        $this->view->render('admin/admin_hotels');
    }
    function travelers(){
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
        $this->view->render('admin/admin_vehicles');
    }
    // function navigation(){
    //     $this->view->render('admin/admin_nav_bar');
    // }


}