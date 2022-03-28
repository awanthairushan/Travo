<?php
// session_start();
if (isset($_SESSION['username'])) {
    //   include '../../db/db_connection.php';
    //   $temp = $_SESSION['username'];
    //   $sqlForSession = "SELECT hotelID FROM hotels WHERE email = '$temp'";
    //   $resultForSession = mysqli_query($con, $sqlForSession);
    if (mysqli_num_rows($this->isHotel) === 1) {
        ?>
        <html>
        <head>
            <title>BOOKINGS</title>
            <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
            <link rel="stylesheet" type="text/css" href="http://localhost/TRAVO/public/css/hotel/hotel_bookings.css">
            <style> <?php include_once APPROOT.'/public/css/hotel/hotel_repeating_css.css'; ?> </style>
            <style> <?php include_once APPROOT.'/public/css/hotel/hotel_bookings.css'; ?> </style>
            <?php include APPROOT . '/views/repeatable_contents/font.php'; ?>

        </head>
        <body>
        <section class="sign_up-traveler">
            <?php include_once APPROOT . '/views/repeatable_contents/nav_bar_hotel.php'; ?>
            <style>
                <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_hotel.css'; ?>
            </style>
            <script type="text/javascript"
                    src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_hotel.js"></script>
            <br>
<!--             .....................modal box for cutomer details ......................-->
<!--                        <div class="more_traveler_details_modal">-->
<!--                            <div class="more_traveler_details_modal_box">-->
<!--                                --><?php //while($customer=mysqli_fetch_array($this->$this->customerDetails)){ ?>
<!--                                <ul>-->
<!--                                    <li>"' . hotelname['name'] . '</li>-->
<!--                                    <li>--><?php //echo $customer['email'] ?><!--</li>-->
<!--                                    <li>--><?php //echo $customer['contact1'] ?>
<!--            --><?php //echo $customer['contact2'] ?><!--</li>-->
<!--                                    <li>--><?php //echo $customer['address_line1'] ?><!--,-->
<!--            --><?php //echo $customer['address_line2'] ?><!--</li>-->
<!--                                    <li>--><?php //echo $customer['city'] ?><!--</li>-->
<!--                                </ul>-->
<!--                                --><?php //} ?>
<!--                                <button type="button" name="more_traveler_cancel_btn" class="more_traveler_cancel_btn"-->
<!--                                        id="more_traveler_cancel_btn">DONE-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--             .....................end of modal box for cutomer details.....................-->
<center>

<?php
    while ($customer = mysqli_fetch_array($this->customerDetails)) {
        $customerName = $customer['name'];
        $customerAddress1 = $customer['address_line1'];
        $customerAddress2 = $customer['address_line2'];
        $city = $customer['city'];
        $email = $customer['email'];
        $contact1 = $customer['contact1'];
        $contact2 = $customer['contact2'];
    }
?>


                <div class="rectangle">
                    <h1>Customer Name : <?php echo $customerName; ?> </h1>
                    <h1>Customer Email Address : <?php echo $customerAddress1.", ".$customerAddress2.", ". $city; ?> </h1>
                    <h1>Customer Address : <?php echo $email; ?> </h1>
                    <h1>Contact Number 01 : <?php echo $contact1; ?> </h1>
                    <h1>Contact Number 02  : <?php echo $contact2; ?> </h1>
                </div>
                </br>
            </center>
        </section>
        <section id="contact_us-section">
            <?php include_once APPROOT . '/views/repeatable_contents/footer.php'; ?>
            <style> <?php include_once APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
        </section>
        <!--JS file for cutomer details-->
        <script src="<?php echo URLROOT ?>/public/script/hotel/hotel_booking.js"></script>
        </body>
        </html>
        <?php
    } else {
        echo '<script type="text/javascript">javascript:history.go(-1)</script>';
        exit();
    }
} else {
    header("location: http://localhost/TRAVO");
    exit();
}
?>
