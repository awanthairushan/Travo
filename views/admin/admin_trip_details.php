<?php
if (isset($_SESSION['username'])) {
  if (mysqli_num_rows($this->isAdmin) === 1) {
?>

<html>
    <head>
      <style> <?php include APPROOT.'/public/css/admin/admin_trip_details.css'; ?> </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TRIPS</title>
        <link rel="icon" href="../../../public/images/icons/favicon.ico">
    </head>
    <body>
        <section class="uppersection">
    <!--Start Navigation bar-->
    <?php include_once  APPROOT.'/views/repeatable_contents/nav_bar_admin.php';?>
      <style> <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_admin.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_admin.js"></script>
    <!--End Navigation bar-->
            <br>
            <div class="content">

<!-- ....................trip details.................... -->

    <h1 class="heading-one"> TRIP DETAILS </h1>
                <div class="container_details" id="container_details">
                    <div class="details">
                        <table class="main">
                        <?php
                            while ($rows = mysqli_fetch_array($this->tripDetails)){
                                $id = $rows['trip_id'];
                                $travelerId = $rows['traveler_id'];
                                $start = $rows['start_date'];
                                $end = $rows['end_date'];
                                $count = $rows['no_of_people'];
                                $category = $rows['category'];
                                $mileage = $rows['mileage'];
                                $des1 = $rows['destination_id'];
                                $des2 = $rows['destination_id2'];
                                $des3 = $rows['destination_id3'];
                                $sight = $rows['sight_id'];
                            }

                            while ($rows2 = mysqli_fetch_array($this->traveler)){
                                $name = $rows2['name'];
                                $email = $rows2['email'];
                                $contact1 = $rows2['contact1'];
                                $contact2 = $rows2['contact2'];
                            }

                            while ($rows3 = mysqli_fetch_array($this->firstHotel)){
                                $hotel1 = $rows3['name'];
                            }
                            while ($rows4 = mysqli_fetch_array($this->secondHotel)){
                                $hotel2 = $rows4['name'];
                            }

                        ?>
                            <tr>
                                <td>Trip ID : </td>
                                <td><?php echo $id;?></td>
                            </tr>
                            <tr>
                                <td>Traveler ID : </td>
                                <td><?php echo $travelerId;?></td>
                            </tr>
                            <tr>
                                <td>Traveler Name : </td>
                                <td><?php echo $name;?></td>
                            </tr>
                            <tr>
                                <td>Traveler Email : </td>
                                <td><?php echo $email;?></td>
                            </tr>
                            <tr>
                                <td>Traveler Contacts : </td>
                                <td><?php echo $contact1." ".$contact2;?></td>
                            </tr>
                            <tr>
                                <td>Trip Dates : </td>
                                <td><?php echo $start;?> To <?php echo $end;?></td>
                            </tr>
                            <tr>
                                <td>Number of Travelers : </td>
                                <td><?php echo $count;?></td>
                            </tr>
                            <tr>
                                <td>Category : </td>
                                <td><?php echo $category;?></td>
                            </tr>
                            <tr>
                                <td>Mileage : </td>
                                <td><?php echo $mileage;?> km</td>
                            </tr>
                        </table>

                        <table class="days" rules=none>
                            <tr>
                                <th class="trow"></th>
                                <th class="trow">Day 1</th>
                                <th class="trow">Day 2</th>
                                <th class="trow">Day 3</th>
                            </tr>
                            <tr>
                                <th class="row row-destinations">Destination</th>
                                <td class="trow"><?php echo $des1;?></td>
                                <td class="trow"><?php echo $des2;?></td>
                                <td class="trow"><?php echo $des3;?></td>
                            </tr>
                            <!-- <tr>
                                <th class="row">Hotel</th>
                                <td class="trow"><?php echo $hotel1;?></td>
                                <td class="trow"><?php echo $hotel2;?></td>
                                <td class="trow">No</td>
                            </tr> -->
                            <!-- <tr>
                                <th class="row">Sights</th>
                                <td class="trow">Thuparamaya<br/>Isurumuniya<br/>Ruwanweliseya</td>
                                <td class="trow">Nelum Pokuna<br/>Gal Viharaya<br/>Hatadage</td>
                                <td class="trow">Maha Viharaya<br/>Maligawa<br/>Ashokaramaya</td>
                            </tr> -->
                        </table>
                    </div>
                </div>
<!-- ............................end of trip details................... -->

<!-- .............................trip budget.......................... -->
<div class="container_budget" id="container_budget">
            <div class="details">
              <br>
              
                <table class="main">

                <?php
                    while ($rows = mysqli_fetch_array($this->budget)){
                        $hotel1 = $rows['hotel1_accomodation'];
                        $hotel2 = $rows['hotel2_accomodation'];
                        $hotel3 = $rows['hotel3_accomodation'];
                        $total = $rows['total_expenses'];
                        $accomodations = $rows['accomodation'];
                        $serviceCharge = $rows['service_charges'];
                        $tickets = $rows['ticket_fees'];
                        $total = $rows['total_expenses'];
                    }
                 ?>
                    <tr>
                        <td>Hotel 1</td>
                        <td>=</td>
                        <td>RS <?php echo $hotel1; ?></td>
                    </tr>
                    <tr>
                        <td>Hotel 2</td>
                        <td>=</td>
                        <td>RS <?php echo $hotel2; ?></td>
                    </tr>
                    <tr>
                        <td>hotel 3</td>
                        <td>=</td>
                        <td>RS <?php echo $hotel3; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Accomodations</td>
                        <td>=</td>
                        <td>RS <?php echo $accomodations; ?></td>
                    </tr>
                    <tr>
                        <td>Service Charges</td>
                        <td>=</td>
                        <td>RS <?php echo $serviceCharge; ?></td>
                    </tr>
                    <tr>
                        <td>Ticket fees</td>
                        <td>=</td>
                        <td>(Rs <?php echo $tickets; ?>)</td>
                    </tr>
                    <tr>
                        <th class="row" style="font-weight:bold;">Total Budget</th>
                        <th class="row">=</th>
                        <th class="row">RS <?php echo $total; ?></th>
                    </tr>
                </table>
            </div>
        </div>
      
<!-- .............................end of trip budget.......................... -->



<!-- .............................end of trip route.......................... -->
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
