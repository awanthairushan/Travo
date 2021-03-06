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

<!--                <div class="delete_vehicle_modal">-->
<!--                    <div class="deletevehicle_confirm_box">-->
<!--                        <h3>Delete Vehicle </h3>-->
<!--                        <hr>-->
<!--                        <p>There is no recovery option. Are you sure you want to delete this vehicle ?</p>-->
<!--                        <hr>-->
<!--                        <form action="deleteVehicle" method="post">-->
<!--                            <input type="hidden" name="vehicleID" value=""'">-->
<!--                            <button type="submit" name="delete_confirm_btn" class="delete_confirm_btn" id="delete_confirm_btn">DELETE ACCOUNT</button>-->
<!--                            <button type="button" name="delete_cancel_btn" class="delete_cancel_btn" id="delete_cancel_btn">CANCEL</button>-->
<!--                        </form>-->
<!--                    </div-->
<!--                </div>-->

                <div class="vehicle_and_owner_details">
                    <?php
                        while ($rows = mysqli_fetch_array($this->myVehicle)) {
                            echo '
                                <form action="updateVehicleDetails" id="viewVehicleDetails">
                                    <table class="vehicle_details">
                                        <!-- vehicle 1 -->
                                        <tr>
                                            <th colspan="2" class="vehicleType">' . $rows['vehicle_model'] . '</th>
                                        </tr>
                                        <tr class="tr_with_img">
                                            <td>' . $rows['type'] . '</td>
                                            <td rowspan = "6"><img src="' . URLROOT . '/public/images/assets/vehicle/' . $rows['vehicle_image'] . '" class="vimg">
                                            </td>
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
                                            <td colspan = "2"><img src="' . URLROOT . '/public/images/assets/vehicle/' . $rows['vehicle_image'] . '" class="vimg">
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>' . $rows['type'] . '</td>
                                        <td>' . $rows['driver_type'] . '</td>
                                        </tr>
                                        <tr>
                                        <td>' . ($rows['ac'] == 'yes' ?  'With A/C' : 'without A/C') . '</td>
                                        <td>Rs. ' . $rows['price_for_1km'] . ' Per km</td>
                                        </tr>
                                        <tr>
                                        <td>' . $rows['no_of_passengers'] . ' Maximum Passengers </td>
                                        <td>Rs. ' . $rows['price_for_day'] . ' Per Day</td>
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
                                </form>
                                <form action="loadupdateVehicleDetails?vehicleID='.$rows['vehicle_id'].'" id="updateVehicleDetails" method="POST">
                                                                        
                                </form>
                                <form action="deleteVehicle" id="deleteVehicle" method="POST">
                                    <input type="hidden" value="'.$rows['vehicle_id'].'" name="vehicleID" >                                    
                                </form>
                                
                                <div class="buttons-sign_up-traveler">
                                    <input type="submit" class="updatebtn" name="submitbtn" id="submitbtn" form= "updateVehicleDetails" value="UPDATE DETAILS">
                                    <input type="submit" class="deletebtn" name="deletebtn" id="deletebtn" form= "deleteVehicle" value="DELETE VEHICLE">
                                </div>
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