<?php

class Hotel extends Controller{

    function __construct()
    {
        parent::__construct();
    }

function index(){
    $this->view->render('hotel/hotel_home');
}
function availability(){
    //$this->view->users = $this->model->getData();
    $this->view->render('hotel/hotel_availability');
}
function faq(){
    $this->view->faq = $this->model->getFaq();
    $this->view->render('hotel/hotel_faq');
}
function hotelBooking(){
    $this->view->render('hotel/hotel_booking');
}
function hotelUpdate(){
    $this->view->render('hotel/hotel_update');
}

}