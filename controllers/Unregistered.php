<?php

class Unregistered extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    function index(){
        $this->view->render('unregistered/index');
    }
    function faq(){
        $this->view->faq = $this->model->getFaq();
        $this->view->render('unregistered/faq');
    }
    function feedback(){
        $this->view->faq = $this->model->getFeedback();
        $this->view->render('unregistered/feedback');
    }
    function login(){
        $this->view->render('unregistered/log_in');
    }
    function signup(){
        $this->view->render('unregistered/sign_up');
    }
    function signupTraveler(){
        $this->view->render('unregistered/sign_up-traveler');
    }
    function signupVehicle(){
        $this->view->render('unregistered/sign_up-vehicle');
    }
    function signupHotel(){
        $this->view->render('unregistered/sign_up-hotel');
    }
    function fogotPassword(){
        $this->view->render('unregistered/forgot_pw_step1');
    }
    function fogotPassword2(){
        $this->view->render('unregistered/forgot_pw_step2');
    }
    function fogotPassword3(){
        $this->view->render('unregistered/forgot_pw_step3');
    }
}