<?php
if (isset($_SESSION['username'])) {
  if (mysqli_num_rows($this->isAdmin) === 1) {
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VEHICLES</title>
        <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
        <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_vehicles_more.css">
    </head>
    <body>
        <section class="uppersection">
    <!--Start Navigation bar-->
    <?php include_once  APPROOT.'/views/repeatable_contents/nav_bar_admin.php';?>
      <style> <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_admin.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_admin.js"></script>
    <!--End Navigation bar-->
            <br>
            <div class="vehicle_and_owner_details">
                <?php
                    while ($rows = mysqli_fetch_array($this->all_vehicle_details)){
                        $no = $rows['vehicle_no'];
                        $type = $rows['type'];
                        $city = $rows['city'];
                        $price_for_1km = $rows['price_for_1km'];
                        $price_for_day = $rows['price_for_day'];
                        $driver_type = $rows['driver_type'];
                        $driver_charge = $rows['driver_charge'];
                        $ac = $rows['ac'];
                        $check_ac = ($ac == 'yes' ? "With A/C" : "Without A/C");
                        $no_of_passengers = $rows['no_of_passengers'];
                        $image = $rows['vehicle_image'];
                        $driver_name = $rows['driver_name'];
                        $driver_contact1 = $rows['driver_contact1'];
                        $driver_contact2 = $rows['driver_contact2'];
                        $owner_name = $rows['owner_name'];
                        $email = $rows['email'];
                        $contact1 = $rows['contact1'];
                        $contact2 = $rows['contact2'];
                        $vehicle_model = $rows['vehicle_model'];

                    }
                ?>
                <table class="vehicledetails">
                    <!-- vehicle 1 -->
                    <tr>
                        <th colspan="2" class="vehicleType"><?php echo $vehicle_model; ?></th>
                    </tr>
                    <tr class="detail">
                        <td><?php echo $type; ?></td>
                        <td rowspan = "6"><img class="vimg" src="<?php $image ?>"></td>
                    </tr>
                    <tr>
                    <td>Available In : <?php echo $city; ?></td>
                    </tr>
                    <tr>
                    <td>Maximum Passengers : <?php echo $no_of_passengers; ?></td>
                    </tr>
                    <tr>
                    <td><?php echo $check_ac; ?></td>
                    </tr>
                    <tr>
                    <td><?php echo $price_for_1km; ?> Per km</td>
                    </tr>
                    <tr>
                    <td><?php echo $price_for_day; ?> Per Day</td>
                    </tr>
                    <tr>
                    <td><?php echo $driver_type; ?></td>
                    </tr>
                </table>
                <table class="driver_details">
                    <tr>
                        <th class="vehicleType">Owner Details</th>
                    </tr>
                    <tr>
                        <td><?php echo $owner_name; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $contact1." , ".$contact2; ?></td>
                    </tr>
                    <tr>
                        <th class="vehicleType">Driver Details</th>
                    </tr>
                    <tr>
                        <td><?php echo $driver_name; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $driver_contact1." , ".$driver_contact2; ?></td>
                    </tr>
                    <tr>
                        <td>LKR <?php echo $driver_charge; ?> per day</td>
                    </tr>
                </table>
                <h3>Other vehicles of this driver</h3>
            </div>
        </section>

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
