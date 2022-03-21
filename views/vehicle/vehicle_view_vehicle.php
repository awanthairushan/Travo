<?php
if (isset($_SESSION['username'])) {
    if (mysqli_num_rows($this->isVehicle) === 1) {
?>
        <html>

        <head>
            <title>VIEW</title>
            <style>
                <?php include APPROOT . '/public/css/vehicle/vehicle_view_vehicle.css'; ?>
            </style>
            <style>
                <?php include APPROOT . '/public/css/unregistered/repeating_css.css'; ?>
            </style>
            <link rel="icon" href="<?php echo URLROOT ?>/public/images/icons/favicon.ico">
            <?php include APPROOT . '/views/repeatable_contents/font.php'; ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>

        <body>
            <section class="uppersection">
                <?php include APPROOT . '/views/repeatable_contents/nav_bar_vehicle.php'; ?>
                <style>
                    <?php include APPROOT . '/public/css/repeatable_contents/nav_bar_vehicle.css'; ?>
                </style>
                <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_vehicle.js"></script>


                <div class="vehicle_and_owner_details">
                    <?php


                    while ($rows = mysqli_fetch_array($this->myVehicle)) {
                        echo '
                        <form action="updateVehicleDetails">
                        <table class="vehicle_details">
                            <!-- vehicle 1 -->
                            <tr>
                                <th colspan="2" class="vehicleType">' . $rows['vehicle_model'] . '</th>
                            </tr>
                            <tr class="tr_with_img">
                                <td>' . $rows['type'] . '</td>
                                <td rowspan = "6"><img class="vimg" src="<?php echo URLROOT ?>/public/images/Sample_images/toyota-2010-prius-wallpaper-01.jpg"></td>
                            </tr>
                            <tr>
                            <td>Available In  ' . $rows['city'] . '</td>
                            </tr>
                            <tr>
                            <td>' . $rows['no_of_passengers'] . ' Maximum Passengers </td>
                            </tr>
                            <tr>
                            <td>' . ($rows['ac'] == 'yes' ?  'With A/C' : 'without A/C') . '</td>
                            </tr>
                            <tr>
                            <td>Rs. ' . $rows['price_for_1km'] . ' Per km</td>
                            </tr>
                            <tr>
                            <td>Rs. ' . $rows['price_for_day'] . ' Per Day</td>
                            </tr>
                            <tr>
                            <td>' . $rows['driver_type'] . '</td>
                            </tr>
                        </table>
    
                        <table class="small_vehicle_details">
                            <!-- vehicle 1 -->
                            <tr>
                                <th colspan="2" class="vehicleType">Toyota Prius 4th Generation</th>
                            </tr>
                            <tr class="tr_with_img">
                                <td colspan = "2"><img class="vimg" src="<?php echo URLROOT ?>/public/images//Sample_images/toyota-2010-prius-wallpaper-01.jpg"></td>
                            </tr>
                            <tr>
                            <td>Car</td>
                            <td>with driver</td>
                            </tr>
                            <tr>
                            <td>With A/C</td>
                            <td>50 per km</td>
                            </tr>
                            <tr>
                            <td>5 Seats</td>
                            <td>1000 per day</td>
                            </tr>
                        </table>                   
    
    
                        <table class="driver_details">
                            <tr>
                                <th class="vehicleType">Owner Details</th>
                            </tr>
                            <tr>
                                <td>' . $rows['owner_name'] . '</td>
                            </tr>
                            <tr>
                                <td>' . $rows['contact1'] . "  " . $rows['contact2'] . '</td>
                            </tr>
                            <tr>
                                <td>LKR.1200.00 per day</td>
                            </tr>
                            <tr>
                                <th class="driverType">Driver Details</th>
                            </tr>
                            <tr>
                                <td>' . $rows['driver_name'] . '</td>
                            </tr>
                            <tr>
                                <td>' . $rows['driver_contact1'] . "  " . $rows['driver_contact2'] . '</td>
                            </tr>
    
                        </table>
    
                        <div class="buttons-sign_up-traveler">                     
                            <input type="submit" class="updatebtn" name="submitbtn" id="submitbtn" value = "UPDATE DETAILS">
                            <input type="submit" class="deletebtn" name="submitbtn" id="submitbtn"  value="DELETE VEHICLE">
                        </div>
                        </form>
    
                    ';
                    }

                    ?>
                </div>
            </section>

            <!--__________________contact_us________________-->

            <section id="contact_us-section">
                <?php include APPROOT . '/views/repeatable_contents/footer.php'; ?>
                <style>
                    <?php include APPROOT . '/public/css/repeatable_contents/footer.css'; ?>
                </style>
            </section>

            <!--__________________END contact_us________________-->

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