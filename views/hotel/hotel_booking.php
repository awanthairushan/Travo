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
                <div class="rectangle2">
                    <table>
                        <tr>
                            <td><label class="label" for="dateselect">DATE :</label></td>
                            <div class="calender"></div>
                            <td>
                                <form action="bookingToDate" method="post">
                                    <input type="date" id="dateselect" name="dateselect" onchange="this.form.submit()"
                                           value="<?php echo $this->day; ?>">
                            </td>
                            </form>
                        </tr>
                    </table>
                </div>
                </br>

                <div class="rectangle">
                    <table class="b" rules="none">
                        <tr class="no-bottom-border td">
                            <th class="b">CHECK-IN</th>
                            <th class="b">CHECK-OUT</th>
                            <th class="b">SINGLE ROOMS</th>
                            <th class="b">DOUBLE ROOMS</th>
                            <th class="b">FAMILY ROOMS</th>
                            <th class="b">MASSIVE ROOMS</th>
                            <th class="b">PRICE</th>
                            <th class="b">CUSTOMER DETAILS</th>
                        </tr>
                        <?php

                        while ($hotelName = mysqli_fetch_array($this->booking)) {

                            $date2 = date('Y-m-d', strtotime($hotelName['date'] . ' +1 day'));

                            echo '<tr>
                                      <td class="b">' . $hotelName['date'] . '</td>
                                      <td class="b">' . $date2 . '</td>
                                      <td class="b">' . $hotelName['single_count'] . '</td>
                                      <td class="b">' . $hotelName['double_count'] . '</td>
                                      <td class="b">' . $hotelName['family_count'] . '</td>
                                      <td class="b">' . $hotelName['massive_count'] . '</td>
                                      <td class="b"><div class="" placeholder="Rs. XXXX">Rs.' . $hotelName['price'] . '</div></td>
                                      <td class="b"><input type="button" id="morebtn" value="MORE" class="morebtn"></td>
                                    </tr>';
                        }
                        ?>
                        </br>
                    </table>
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
