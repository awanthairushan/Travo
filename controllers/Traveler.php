<?php

class Traveler extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    //----------------------------Traveler-Home--------------------------------------
    function index()
    {
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->render('traveler/traveler_home');
    }

    function tripPlanBegin()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST['submitbtn'])) {

                $date1 = new DateTime($_POST['startdate']);
                $date2 = new DateTime($_POST['enddate']);

                $dif = $date2->diff($date1);

                $difference = $dif->format('%d');

                if (empty($_POST['peoplecount']) || empty($_POST['startdate']) || empty($_POST['enddate']) || empty($_POST['category'])) {
                    header('location: ' . URLROOT . '/Traveler');
                }
                if ($_POST['peoplecount'] > 30 || $_POST['peoplecount'] < 0 || $difference > 2 || $difference < 0 || $date1 > $date2) {
                    header('location: ' . URLROOT . '/Traveler');
                } else {
                    $_SESSION['trip_id'] = uniqid('trip_');
                    $_SESSION['traveler_count'] = $_POST['peoplecount'];
                    $_SESSION['start_date'] = $_POST['startdate'];
                    $_SESSION['end_date'] = $_POST['enddate'];
                    $_SESSION['trip_cat'] = $_POST['category'];
                    $_SESSION['hotel_1'] = 'Araliya Hotel';
                    $_SESSION['hotel_2'] = 'Full Moon Resort';
                    $_SESSION['hotel_3'] = 'Grand Hilton Hotel';
                    $_SESSION['difference'] = $difference;

                    header('location: ' . URLROOT . '/Traveler/PlanTrip');
                }


            }

        }

    }

    //------------------------Traveler-Budget------------------------------------
    function budget()
    {
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->TravelerDetails =$this->model->selectTraveler($_SESSION['username']); 
        $this->view->selectTrip = $this->model->selectTrip($_SESSION['trip_id'],$_SESSION['travelerID']);
        $trip = $this->model->selectTrip($_SESSION['trip_id'],$_SESSION['travelerID']);

        while ($sights = mysqli_fetch_array($trip)) {
            $sights1 = $sights['sight_id'];
            $sights2 = $sights['sight_id2'];
            $sights3 = $sights['sight_id3'];
        }


        $dif = $_SESSION['difference'];

        if ($dif == 0) {
            $com1 = substr_count($sights1, ",");
            $this->view->sightCount1 = $com1;
            $sightsId1 = explode(",", $sights1);
            for ($i = 0; $i < $com1; $i++) {
                $this->view->sightsName1[$i] = $this->model->selectSightName($sightsId1[$i]);
            }
        }

        if ($dif == 1) {

            $com1 = substr_count($sights1, ",");
            $this->view->sightCount1 = $com1;
            $sightsId1 = explode(",", $sights1);
            for ($i = 0; $i < $com1; $i++) {
                $this->view->sightsName1[$i] = $this->model->selectSightName($sightsId1[$i]);
            }
            $com2 = substr_count($sights2, ",");
            $this->view->sightCount2 = $com2;
            $sightsId2 = explode(",", $sights2);
            for ($j = 0; $j < $com2; $j++) {
                $this->view->sightsName2[$j] = $this->model->selectSightName($sightsId2[$j]);
            }

            //take hotel1 data
            $hotel1 = $this->model->selectHotelID($_SESSION['trip_id'], 'first');
            while ($hoteldes1 = mysqli_fetch_array($hotel1)) {
                $des1 = $hoteldes1['hotelId'];
            }
            $hotelname1 = $this->model->selectHotelName($des1);
            while ($hoteldes1 = mysqli_fetch_array($hotelname1)) {
                $this->view->hotel1 = $hoteldes1['name'];
            }
        }

        if ($dif == 2) {

            $com1 = substr_count($sights1, ",");
            $this->view->sightCount1 = $com1;
            $sightsId1 = explode(",", $sights1);
            for ($i = 0; $i < $com1; $i++) {
                $this->view->sightsName1[$i] = $this->model->selectSightName($sightsId1[$i]);
            }
            $com2 = substr_count($sights2, ",");
            $this->view->sightCount2 = $com2;
            $sightsId2 = explode(",", $sights2);
            for ($j = 0; $j < $com2; $j++) {
                $this->view->sightsName2[$j] = $this->model->selectSightName($sightsId2[$j]);
            }
            $com3 = substr_count($sights3, ",");
            $this->view->sightCount3 = $com3;
            $sightsId3 = explode(",", $sights3);
            for ($k = 0; $k < $com3; $k++) {
                $this->view->sightsName3[$k] = $this->model->selectSightName($sightsId3[$k]);
            }

            //take hotel1 data
            $hotel1 = $this->model->selectHotelID($_SESSION['trip_id'], 'first');
            while ($hoteldes1 = mysqli_fetch_array($hotel1)) {
                $des1 = $hoteldes1['hotelId'];
            }
            $hotelname1 = $this->model->selectHotelName($des1);
            while ($hoteldes1 = mysqli_fetch_array($hotelname1)) {
                $this->view->hotel1 = $hoteldes1['name'];
            }

            //take hotel2 data
            $hotel2 = $this->model->selectHotelID($_SESSION['trip_id'], 'second');
            while ($hoteldes2 = mysqli_fetch_array($hotel2)) {
                $des2 = $hoteldes2['hotelId'];
            }
            $hotelname2 = $this->model->selectHotelName($des2);
            while ($hoteldes2 = mysqli_fetch_array($hotelname2)) {
                $this->view->hotel2 = $hoteldes2['name'];
            }
        }

        $this->view->budget = $this->model->selectBudget($_SESSION['trip_id']);
        $this->view->render('traveler/traveler_budget');
    }

    function saveTrip()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST['savetripbtn'])) {
                $traveler_id = $_POST['traveler_id'];
                $trip_id = $_POST['trip_id'];

                $_SESSION['trip_id'] = null;

                if ($this->model->saveTrip($traveler_id, $trip_id)) {

                    header('location: ' . URLROOT . '/Traveler/tripToGo');
                } else {
                    die('Something went wrong.');
                }

            }
        }
    }

    //--------------------------Traveler-FAQ--------------------------------------
    function faq()
    {
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->faq = $this->model->getFaq();
        $this->view->render('traveler/traveler_faq');
    }

    //--------------------------Traveler-Feedback---------------------------------
    function feedbacks()
    {
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->feedbacks = $this->model->getFeedback();
        $this->view->render('traveler/traveler_feedback_list');
    }

    function addFeedback()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST['submitbtn'])) {
                $data = trim($_POST['response']);

                if ($this->model->addFeedbacks($data)) {
                    header('location: ' . URLROOT . '/Traveler/feedbacks');
                } else {
                    die('Something went wrong.');
                }

            }
        }
    }

    //---------------------------Traveler-Plan Trip----------------------------------
    function planTrip()
    {
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        if (isset($_SESSION['trip_id'])) {
            $this->view->render('traveler/traveler_plantrip');
        } else {
            header('location: ' . URLROOT . '/Traveler');
        }
    }

    //---------------------------Traveler-Plan Trip Sights----------------------------------
    function planTripSights()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST['saveSubmit'])) {
                $trip_id = $_POST['trip_id'];

                // $this->view->availabilityExist=$this->model->
                // $this->view->availability=$this->model>

                if ($_SESSION['difference'] == 0) {
                    $this->view->destination[0] = $_POST['destination1'];
                    //get destination id
                    $destId1 = $this->model->getDestinationId($_POST['destination1']);
                    //get sights
                    while ($dest1 = mysqli_fetch_array($destId1)) {
                        $this->view->sights[0] = $this->model->getSights($dest1['destination_id']);
                    }


                    $this->view->destination[1] = "-";
                    $this->view->sights[1] = "-";


                    $this->view->destination[2] = "-";
                    $this->view->sights[2] = "-";
                }


                if ($_SESSION['difference'] == 1) {
                    $this->view->destination[0] = $_POST['destination1'];
                    //get destination id
                    $destId1 = $this->model->getDestinationId($_POST['destination1']);
                    //get hotel data
                    $this->view->hotel1 = $this->model->getHotels($_POST['destination1']);
                    //get hote rooms data
                    $this->view->hotel1 = $this->model->getHotels($_POST['destination1']);
                    //get sights
                    while ($dest1 = mysqli_fetch_array($destId1)) {
                        $this->view->sights[0] = $this->model->getSights($dest1['destination_id']);
                    }

                    $this->view->destination[1] = $_POST['destination2'];
                    //get destination id
                    $destId2 = $this->model->getDestinationId($_POST['destination2']);
                    //get hotel data
                    $this->view->hotel2 = $this->model->getHotels($_POST['destination2']);
                    //get sights
                    while ($dest2 = mysqli_fetch_array($destId2)) {
                        $this->view->sights[1] = $this->model->getSights($dest2['destination_id']);
                    }


                    $this->view->destination[2] = "-";
                    $this->view->sights[2] = "-";
                }
                if ($_SESSION['difference'] == 2) {
                    $this->view->destination[0] = $_POST['destination1'];
                    //get destination id
                    $destId1 = $this->model->getDestinationId($_POST['destination1']);
                    //get hotel data
                    $this->view->hotel1 = $this->model->getHotels($_POST['destination1']);
                    //get sights
                    while ($dest1 = mysqli_fetch_array($destId1)) {
                        $this->view->sights[0] = $this->model->getSights($dest1['destination_id']);
                    }


                    $this->view->destination[1] = $_POST['destination2'];
                    //get destination id
                    $destId2 = $this->model->getDestinationId($_POST['destination2']);
                    //get hotel data
                    $this->view->hotel2 = $this->model->getHotels($_POST['destination2']);
                    //get sights
                    while ($dest2 = mysqli_fetch_array($destId2)) {
                        $this->view->sights[1] = $this->model->getSights($dest2['destination_id']);
                    }


                    $this->view->destination[2] = $_POST['destination3'];
                    //get destination id
                    $destId3 = $this->model->getDestinationId($_POST['destination3']);
                    //get hotel data
                    $this->view->hotel3 = $this->model->getHotels($_POST['destination3']);
                    //get sights
                    while ($dest3 = mysqli_fetch_array($destId3)) {
                        $this->view->sights[2] = $this->model->getSights($dest3['destination_id']);
                    }
                }

                $this->view->lat = $_POST['lat'];
                $this->view->long = $_POST['lng'];
            }
        }

        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        if (isset($trip_id)) {
            $this->view->tripId = $trip_id;
            $this->view->render('traveler/traveler_planTripSights');
        } else {
            header('location: ' . URLROOT . '/Traveler');
        }
    }

    //plantripSights submit function
    function pendingTrip()
    {
        session_start();

        echo 'awoo';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST['saveSubmit'])) {
                echo 'awoo';
                $trip_id = $_POST['trip_id'];
                $traveler_count = $_POST['peoplecount'];
                $start_date = $_POST['startdate'];
                $end_date = $_POST['enddate'];
                $trip_cat = $_POST['category'];
                $longitude = $_POST['longitude'];
                $latitude = $_POST['latitude'];

                $difference = $_SESSION['difference'];

                if ($difference == 0) {
                    $destination1 = $_POST['destination1'];
                    $checkbox1 = $_POST['sights1'];
                    $chka = "";
                    $ticket1 = 0;
                    foreach ($checkbox1 as $chk1) {
                        $chka .= $chk1 . ",";
                        $ticketquery1 = $this->model->getTickets($chk1);
                        while ($ticketPrice1 = mysqli_fetch_array($ticketquery1)) {
                            $ticket1 = $ticket1 + intval($ticketPrice1['ticket_price']);
                        }
                    }

                    $destination2 = "-";
                    $chkb = "-";
                    $ticket2 = 0;

                    $destination3 = "-";
                    $chkc = "-";
                    $ticket3 = 0;
                }

                if ($difference == 1) {
                    $destination1 = $_POST['destination1'];
                    $checkbox1 = $_POST['sights1'];
                    $chka = "";
                    $ticket1 = 0;
                    foreach ($checkbox1 as $chk1) {
                        $chka .= $chk1 . ",";
                        $ticketquery1 = $this->model->getTickets($chk1);
                        while ($ticketPrice1 = mysqli_fetch_array($ticketquery1)) {
                            $ticket1 = $ticket1 + intval($ticketPrice1['ticket_price']);
                        }
                    }

                    $destination2 = $_POST['destination2'];
                    $checkbox2 = $_POST['sights2'];
                    $chkb = "";
                    $ticket2 = 0;
                    $chkbArray = array();
                    foreach ($checkbox2 as $chk2) {
                        $chkb .= $chk2 . ",";
                        $ticketquery2 = $this->model->getTickets($chk2);
                        while ($ticketPrice2 = mysqli_fetch_array($ticketquery2)) {
                            $ticket2 = $ticket2 + intval($ticketPrice2['ticket_price']);
                        }
                    }

                    $destination3 = "-";
                    $chkc = "-";
                    $ticket3 = 0;
                }

                if ($difference == 2) {
                    $destination1 = $_POST['destination1'];
                    $checkbox1 = $_POST['sights1'];
                    $chka = "";
                    $ticket1 = 0;
                    foreach ($checkbox1 as $chk1) {
                        $chka .= $chk1 . ",";
                        $ticketquery1 = $this->model->getTickets($chk1);
                        while ($ticketPrice1 = mysqli_fetch_array($ticketquery1)) {
                            $ticket1 = $ticket1 + intval($ticketPrice1['ticket_price']);
                        }
                    }

                    echo $ticket1;

                    $destination2 = $_POST['destination2'];
                    $checkbox2 = $_POST['sights2'];
                    $chkb = "";
                    $ticket2 = 0;
                    $chkbArray = array();
                    foreach ($checkbox2 as $chk2) {
                        $chkb .= $chk2 . ",";
                        $ticketquery2 = $this->model->getTickets($chk2);
                        while ($ticketPrice2 = mysqli_fetch_array($ticketquery2)) {
                            $ticket2 = $ticket2 + intval($ticketPrice2['ticket_price']);
                        }
                    }

                    $destination3 = $_POST['destination3'];
                    $checkbox3 = $_POST['sights3'];
                    $chkc = "";
                    $ticket3 = 0;
                    $chkcArray = array();
                    foreach ($checkbox3 as $chk3) {
                        $chkc .= $chk3 . ",";
                        $ticketquery3 = $this->model->getTickets($chk3);
                        while ($ticketPrice3 = mysqli_fetch_array($ticketquery3)) {
                            $ticket3 = $ticket3 + intval($ticketPrice3['ticket_price']);
                        }
                    }
                }

                $mileage = $_POST['mileage'];
                $budget = ($ticket1 + $ticket2 + $ticket3) * $traveler_count;
                $_SESSION['tickets'] = $budget;

                if($this->model->planTripPending($trip_id,$_SESSION['travelerID'],$start_date,$end_date,$difference,$trip_cat,$destination1,$destination2,$destination3,$chka,$chkb,$chkc,$traveler_count,$mileage,$budget,$latitude,$longitude)){
                    if($difference==0){
                        $hotel1=0;
                        $hotel2=0;
                        if($this->model->addBudget($_SESSION['trip_id'],$hotel1,$hotel2,$_SESSION['tickets'])){
                            header('location: '.URLROOT.'/Traveler/budget'); 
                        }
                    }
                    else{
                        if($difference==2){
                            $_SESSION['des2'] = $destination2;
                        }
                        header('location: ' . URLROOT . '/Traveler/planTripHotels?count=0&des=' . $destination1 . '&date=' . $start_date);
                    }
                } else {
                    die('Something went wrong.');
                }
            }
        }

    }

    //-----------------------------Traveler-plan trip hotels----------------------------------
    function planTripHotels()
    {
        session_start();
        // $url_trip_id=$_GET['id'];
        $url_trip_des = $_GET['des'];
        $this->view->des = $url_trip_des;
        $this->view->date = $_GET['date'];

        if ($_GET['count'] == 0) {
            $this->view->count = "FISRT";
            $this->view->counter = 0;
        }
        if ($_GET['count'] == 1) {
            $this->view->count = "SECOND";
            $this->view->counter = 1;
        }

        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        //get hotel data
        $this->view->hotel = $this->model->getHotels($url_trip_des);
        if (isset($_SESSION['trip_id'])) {
            $this->view->render('traveler/traveler_planTripHotels');
        } else {
            header('location: ' . URLROOT . '/Traveler');
        }
    }


    //---------------------------Traveler-Hotel booking----------------------------
    function hotelBooking()
    {
        session_start();
        $url_hotel_id = $_GET['htlId'];
        $this->view->hotel_id = $url_hotel_id;
        $this->view->count = $_GET['count'];
        $date = $_GET['date'];
        $this->view->date = $date;

        $hoteldetails = $this->model->getHotelName($url_hotel_id);
        while ($hotelname = mysqli_fetch_array($hoteldetails)) {
            $this->view->hotelName = $hotelname['name'];
            $this->view->latitude = $hotelname['latitude'];
            $this->view->longitude = $hotelname['longitude'];
            $this->view->hoteDescription = $hotelname['description'];
        }
        $this->view->hotelSingle = $this->model->selectSinglePrice($url_hotel_id);
        $this->view->hotelDouble = $this->model->selectDoublePrice($url_hotel_id);
        $this->view->hotelFamily = $this->model->selectFamilyPrice($url_hotel_id);
        $this->view->hotelMassive = $this->model->selectMassivePrice($url_hotel_id);
        $this->view->singlePricecheck = $this->model->selectSinglePrice($url_hotel_id);
        $this->view->DoublePricecheck = $this->model->selectDoublePrice($url_hotel_id);
        $this->view->familyPricecheck = $this->model->selectFamilyPrice($url_hotel_id);
        $this->view->massivePricecheck = $this->model->selectMassivePrice($url_hotel_id);
        $this->view->checkToDate = $this->model->selectBookingToDate($url_hotel_id, $date);
        $this->view->checkBooking = $this->model->selectBooking($url_hotel_id, $date);
        $this->view->day = $date;

        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->render('traveler/traveler_hotel_booking');
    }

    //submit hotel bookings
    function bookTripRooms()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST['confirmbtn'])) {
                $hotel_id = $_POST['hotel_id'];
                $count = $_POST['count'];
                $singleNumber = $_POST['Snumber'];
                $doubleNumber = $_POST['Dnumber'];
                $familyNumber = $_POST['Fnumber'];
                $massiveNumber = $_POST['Mnumber'];
                $singleOldNumber = $_POST['oldSnumber'];
                $doubleOldNumber = $_POST['oldDnumber'];
                $familyOldNumber = $_POST['oldFnumber'];
                $massivOldeNumber = $_POST['oldMnumber'];
                $singlePrice = $_POST['singlePrice'];
                $doublePrice = $_POST['doublePrice'];
                $familyPrice = $_POST['familyPrice'];
                $massivPrice = $_POST['massivePrice'];
                $singleNewNumber = $singleOldNumber - $singleNumber;
                $doubleNewNumber = $doubleOldNumber - $doubleNumber;
                $familyNewNumber = $familyOldNumber - $familyNumber;
                $massiveNewNumber = $massivOldeNumber - $massiveNumber;
                $date = $_POST['date'];
                $date2 = date('Y-m-d', strtotime($date . ' +1 day'));
                $new_old = $_POST['new_old'];
                $price = ($singleNumber * $singlePrice) + ($doubleNumber * $doublePrice) + ($familyNumber * $familyPrice) + ($massiveNumber * $massivPrice);

                if ($count == 0) {
                    $day = 'first';
                    $_SESSION['hote1_price'] = $price;
                }
                if ($count == 1) {
                    $day = 'second';
                    $_SESSION['hotel2_price'] = $price;
                }

                // echo $count;

                $add = 0;

                if ($new_old == 0) {
                    if ($this->model->addHotelAvailability($hotel_id, $date, $singleNewNumber, $doubleNewNumber, $familyNewNumber, $massiveNewNumber)) {
                        //added to availability table
                        $add = 1;
                    } else {
                        die('Something went wrong.');
                    }
                } else {
                    if ($this->model->updateHotelAvailability($hotel_id, $date, $singleNewNumber, $doubleNewNumber, $familyNewNumber, $massiveNewNumber)) {
                        //edited to availability table
                        $add = 1;
                    } else {
                        die('Something went wrong.');
                    }
                }

                if ($add == 1) {
                    if ($this->model->addBooking($hotel_id, $_SESSION['trip_id'], $_SESSION['travelerID'], $date, $day, $singleNumber, $doubleNumber, $familyNumber, $massiveNumber, $price)) {
                        if ($_SESSION['difference'] == 1 && $count == 0) {
                            $hotel2 = 0;
                            if ($this->model->addBudget($_SESSION['trip_id'], $_SESSION['hote1_price'], $hotel2, $_SESSION['tickets'])) {
                                header('location: ' . URLROOT . '/Traveler/budget');
                            } else {
                                die('Something went erong');
                            }
                        }
                        if ($_SESSION['difference'] == 2 && $count == 0) {

                            header('location: ' . URLROOT . '/Traveler/planTripHotels?count=1&des=' . $_SESSION['des2'] . '&date=' . $date2);
                        }
                        if ($_SESSION['difference'] == 2 && $count == 1) {

                            if ($this->model->addBudget($_SESSION['trip_id'], $_SESSION['hote1_price'], $_SESSION['hotel2_price'], $_SESSION['tickets'])) {
                                header('location: ' . URLROOT . '/Traveler/budget');
                            } else {
                                die('Something went erong');
                            }

                            header('location: ' . URLROOT . '/Traveler/budget');
                        }
                    } else {
                        die("Something went wrong.");
                    }
                }
            }
        }
    }

    //----------------------------Traveler-Saved Budget-------------------------
    //model functions are in the budget section of the model
    function savedBudget()
    {
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->TravelerDetails =$this->model->selectTraveler($_SESSION['username']); 
        $url_trip_id=$_GET['id'];


        $trip = $this->model->selectTrip($url_trip_id, $_SESSION['travelerID']);

        while ($sights = mysqli_fetch_array($trip)) {
            $sights1 = $sights['sight_id'];
            $sights2 = $sights['sight_id2'];
            $sights3 = $sights['sight_id3'];
            $status = $sights['status'];
            $difference = $sights['no_of_days'];
        }


        $dif = $difference;

        if ($dif == 0) {
            //get sights names
            $com1 = substr_count($sights1, ",");
            $this->view->sightCount1 = $com1;
            $sightsId1 = explode(",", $sights1);
            for ($i = 0; $i < $com1; $i++) {
                $this->view->sightsName1[$i] = $this->model->selectSightName($sightsId1[$i]);
            }
        }

        if ($dif == 1) {

            //get sights names
            $com1 = substr_count($sights1, ",");
            $this->view->sightCount1 = $com1;
            $sightsId1 = explode(",", $sights1);
            for ($i = 0; $i < $com1; $i++) {
                $this->view->sightsName1[$i] = $this->model->selectSightName($sightsId1[$i]);
            }

            //get sights names
            $com2 = substr_count($sights2, ",");
            $this->view->sightCount2 = $com2;
            $sightsId2 = explode(",", $sights2);
            for ($j = 0; $j < $com2; $j++) {
                $this->view->sightsName2[$j] = $this->model->selectSightName($sightsId2[$j]);
            }

            //take hotel1 data
            $hotel1 = $this->model->selectHotelID($url_trip_id, 'first');
            while ($hoteldes1 = mysqli_fetch_array($hotel1)) {
                $des1 = $hoteldes1['hotelId'];
            }
            $hotelname1 = $this->model->selectHotelName($des1);
            while ($hoteldes1 = mysqli_fetch_array($hotelname1)) {
                $this->view->hotel1 = $hoteldes1['name'];
            }
        }

        if ($dif == 2) {

            //get sights names
            $com1 = substr_count($sights1, ",");
            $this->view->sightCount1 = $com1;
            $sightsId1 = explode(",", $sights1);
            for ($i = 0; $i < $com1; $i++) {
                $this->view->sightsName1[$i] = $this->model->selectSightName($sightsId1[$i]);
            }

            //get sights names
            $com2 = substr_count($sights2, ",");
            $this->view->sightCount2 = $com2;
            $sightsId2 = explode(",", $sights2);
            for ($j = 0; $j < $com2; $j++) {
                $this->view->sightsName2[$j] = $this->model->selectSightName($sightsId2[$j]);
            }

            //get sights names
            $com3 = substr_count($sights3, ",");
            $this->view->sightCount3 = $com3;
            $sightsId3 = explode(",", $sights3);
            for ($k = 0; $k < $com3; $k++) {
                $this->view->sightsName3[$k] = $this->model->selectSightName($sightsId3[$k]);
            }

            //take hotel1 data
            $hotel1 = $this->model->selectHotelID($url_trip_id, 'first');
            while ($hoteldes1 = mysqli_fetch_array($hotel1)) {
                $des1 = $hoteldes1['hotelId'];
            }
            $hotelname1 = $this->model->selectHotelName($des1);
            while ($hoteldes1 = mysqli_fetch_array($hotelname1)) {
                $this->view->hotel1 = $hoteldes1['name'];
            }

            //take hotel2 data
            $hotel2 = $this->model->selectHotelID($url_trip_id, 'second');
            while ($hoteldes2 = mysqli_fetch_array($hotel2)) {
                $des2 = $hoteldes2['hotelId'];
            }
            $hotelname2 = $this->model->selectHotelName($des2);
            while ($hoteldes2 = mysqli_fetch_array($hotelname2)) {
                $this->view->hotel2 = $hoteldes2['name'];
            }
        }

        $this->view->selectTrip = $this->model->selectTrip($url_trip_id, $_SESSION['travelerID']);
        $this->view->budget = $this->model->selectBudget($url_trip_id);
        $this->view->render('traveler/traveler_saved_budget');
    }

    //----------------------------Traveler-Trip to go-----------------------------
    function tripToGo()
    {
        session_start();

        if (isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];

            if ($this->model->updateTripPaid($order_id, $_SESSION['travelerID'])) {
                $status = true;
            } else {
                $status = false;
                die('Something went wrong.');
            }
        } else {
            $status = true;
        }

        if ($status == true) {
            $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
            $this->view->paidTrips = $this->model->selectPaidTrips($_SESSION['travelerID']);
            $this->view->savedTrips = $this->model->selectSavedTrips($_SESSION['travelerID']);
            $this->view->completedTrips = $this->model->selectCompletedTrips($_SESSION['travelerID']);
            $this->view->render('traveler/traveler_trip_to_go');
        }
    }

    function deleteTrip()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST['deleteTrip_confirm_btn'])) {
                $trip_id = $_POST['deleteTrip'];

                if ($this->model->deleteTrip($trip_id)) {
                    if ($this->model->deleteBudget($trip_id)) {
                        header('location: ' . URLROOT . '/Traveler/tripToGo');
                    } else {
                        die('Something went wrong.');
                    }
                } else {
                    die('Something went wrong.');
                }

            }
        }

    }

    //----------------------------Traveler-Update-------------------------------
    function travelerUpdate()
    {
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->render('traveler/traveler_update');
    }

    function updateTravelerProfile()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if ($this->model->selectTraveler($_SESSION['username'])) {
                $travelerDetails = $this->model->selectTraveler($_SESSION['username']);
            }

            while ($rows = mysqli_fetch_array($travelerDetails)) {
                $id = $rows['travelerID'];
                $name = $rows['name'];
                echo $name;
                $address1 = $rows['address_line1'];
                $address2 = $rows['address_line2'];
                $city = $rows['city'];
                $email = $rows['email'];
                $contact1 = $rows['contact1'];
                $contact2 = $rows['contact2'];
                $password = $rows['password'];

            }

            if (isset($_POST['submitbtn'])) {
                $traveler_id = $id;
                $new_name = trim($_POST['name']);
                $new_email = trim($_POST['email']);
                $new_contact2 = trim($_POST['contact2']);
                $new_contact1 = trim($_POST['contact1']);
                $new_password = trim($_POST['password']);
                $new_adressLine1 = trim($_POST['address-line1']);
                $new_adressLine2 = trim($_POST['address-line2']);
                $new_city = trim($_POST['city']);

                //check whether newly entered data is empty

                if (empty($new_name)) {
                    $new_name = $name;
                }
                if (empty($new_email)) {
                    $new_email = $email;
                }
                if (empty($new_contact2)) {
                    $new_contact2 = $contact2;
                }
                if (empty($new_contact1)) {
                    $new_contact1 = $contact1;
                }
                if (empty($new_password)) {
                    $new_password = $password;
                } else {
                    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                }
                if (empty($new_adressLine1)) {
                    $new_adressLine1 = $address1;
                }
                if (empty($new_adressLine2)) {
                    $new_adressLine2 = $address2;
                }
                if (empty($new_city)) {
                    $new_city = $city;
                }

                if ($this->model->updateTraveler($new_name, $new_email, $new_contact2, $new_contact1, $new_password, $new_adressLine1, $new_adressLine2, $new_city, $traveler_id)) {
                    $_SESSION['username'] = $new_email;
                    header('location: ' . URLROOT . '/Traveler/travelerUpdate');
                } else {
                    die('Something went wrong.');
                }

            }
        }
    }

    //---------------------------Traveler-Vehicle------------------------
    function vehicleDetails()
    {
        session_start();
        $this->view->isTraveler = $this->model->selectTraveler($_SESSION['username']);
        $this->view->vehicleType = $this->model->vehicleType();
        $this->view->seats = $this->model->vehicleSeats();
        $this->view->vehicles = $this->model->getVehicleAndOwnerDetails();
        $this->view->render('traveler/traveler_vehicle');
    }

    //--------------------------Traveler-Delete traveler---------------------
    function deleteTraveler()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST['delete_confirm_btn'])) {
                $traveler_id = $_POST['travelerDelete'];

                if ($this->model->deleteTraveler($traveler_id)) {
                    header('location: ' . URLROOT . '/Traveler');
                } else {
                    die('Something went wrong.');
                }

            }
        }

    }

    //---------------------------Traveler nav menu-log out-------------------
    function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('location: http://localhost/TRAVO');
    }
}