<?php
  session_start();
  if(isset($_SESSION['username'])) {
    $count=0;
    while($travelers = mysqli_fetch_array($this->isTraveler)){
      if($travelers['email']===$_SESSION['username']){
        $count=$count+1;
      }
    }
    if ($count === 1) {
?>
        <html>

        <head>
            <title>MY TRIPS</title>
            <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
            <style>
                <?php include APPROOT.'/public/css/traveler/traveler_budget.css'; ?>
            </style>
            <style>
                <?php include APPROOT.'/public/css/traveler/traveler_repeating_css.css'; ?>
            </style>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <?php include APPROOT.'/views/repeatable_contents/font.php'; ?>
        </head>

        <body>
            <section class="uppersection">
                <?php include APPROOT.'/views/repeatable_contents/nav_bar_traveler.php'; ?>
                <style>
                    <?php include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; ?>
                </style>
                <script type="text/javascript" src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>
                <br>
                <div class="content">
                    <div class="trip ">
                        <button class="tripmenu" id="trip_details_btn">TRIP</button>
                        <button class="tripmenu" id="budget_btn">BUDGET</button>
                        <button class="tripmenu" id="route_btn">ROUTE</button>
                    </div>

                    <div class="container modal1">
                        <div class="details">
                            <table class="main_details">
                                <tr>
                                    <td>Date : </td>
                                    <td>2021-11-10 To 2021-11-13</td>
                                </tr>
                                <tr>
                                    <td>Number of Travelers : </td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Category : </td>
                                    <td>Cultural</td>
                                </tr>
                                <tr>
                                    <td>Mileage : </td>
                                    <td>350km</td>
                                </tr>
                            </table>

                            <!-- <table class="days" rules=none>
                                <tr>
                                    <th class="trow"></th>
                                    <th class="trow">Day 1</th>
                                    <th class="trow">Day 2</th>
                                    <th class="trow">Day 3</th>
                                </tr>
                                <tr>
                                    <td class="trow">Destination</td>
                                    <td class="trow">Anuradhapura</td>
                                    <td class="trow">Galle</td>
                                    <td class="trow">Colombo</td>
                                </tr>
                                <tr>
                                    <td class="trow">Hotel</td>
                                    <td class="trow">Hotel Alakamanda</td>
                                    <td class="trow">CocoBay Unawatuna</td>
                                    <td class="trow">Cinnamon Grand Colombo</td>
                                </tr>
                                <tr>
                                    <td class="trow">Sights</td>
                                    <td class="trow">Ruwanweliseya<br />Rathna Prasada<br />Isurumuniya</td>
                                    <td class="trow">Dutch Reformed Church<br />The National Museum<br />Japanese Peace Pagoda</td>
                                    <td class="trow">National Museum<br />Viharamahadevi Park<br />Sri Lanka Planetarium</td>
                                </tr>
                            </table> -->

                            <div class="days">
                                <div class="thide">
                                    <!-- trowhead is an empty div -->
                                    <div class="trowhead">&nbsp</div>
                                    <div class="trow"><span>Destination</span></div>
                                    <div class="trow"><span>Hotel</span></div>
                                    <div class="trow"><span>Sights<span><br/><br/><br/></div>
                                </div>
                                <div class="tcolumn">
                                    <div class="trowhead">Day 1</div>
                                    <div class="trow"> Anuradhapura	</div>
                                    <div class="trow"> Hotel Alakamanda</div>
                                    <div class="trow"> Ruwanweliseya<br />Rathna Prasada<br />Isurumuniya</div>
                                </div>
                                <div class="thide">
                                    <!-- trowhead is an empty div -->
                                    <div class="trowhead">&nbsp</div>
                                    <div class="trow"><span>Destination</span></div>
                                    <div class="trow"><span>Hotel</span></div>
                                    <div class="trow"><span>Sights</span><br><br><br></div>
                                </div>
                                <div class="tcolumn">
                                    <div class="trowhead">Day 2</div>
                                    <div class="trow">Galle</div>
                                    <div class="trow">CocoBay Unawatuna</div>
                                    <div class="trow">Dutch Reformed Church<br />The National Museum<br />Japanese Peace Pagoda</div>
                                </div>
                                <div class="thide">
                                    <!-- trowhead is an empty div -->
                                    <div class="trowhead">&nbsp</div>
                                    <div class="trow"><span>Destination</span></div>
                                    <div class="trow"><span>Hotel</span></div>
                                    <div class="trow"><span>Sights</span><br><br><br></div>
                                </div>
                                <div class="tcolumn">
                                    <div class="trowhead">Day 3</div>
                                    <div class="trow">Colombo</div>
                                    <div class="trow">Cinnamon Grand Colombo</div>
                                    <div class="trow">National Museum<br />Viharamahadevi Park<br />Sri Lanka Planetarium</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container modal2">
                        <div class="details main">
                        <br>
                            <!-- <table class="main">
                                <tr>
                                    <td>Hotel 1</td>
                                    <td>=</td>
                                    <td>RS 3500.00</td>
                                </tr>
                                <tr>
                                    <td>Hotel 2</td>
                                    <td>=</td>
                                    <td>RS 4500.00</td>
                                </tr>
                                <tr>
                                    <td>Hotel 2</td>
                                    <td>=</td>
                                    <td>RS 5000.00</td>
                                </tr>
                                <tr>
                                    <th class="row">Accomodaions</th>
                                    <th class="row">=</th>
                                    <th class="row">RS 13000.00</th>
                                </tr>
                                <tr>
                                    <td>Service Charges</td>
                                    <td>=</td>
                                    <td>RS 1000.00</td>
                                </tr>
                                <tr>
                                    <td>Ticket fees</td>
                                    <td>=</td>
                                    <td>(RS 500.00)</td>
                                </tr>
                                <tr>
                                    <th class="row">Total Budget</th>
                                    <th class="row">=</th>
                                    <th class="row">RS 14000.00</th>
                                </tr>
                            </table> -->

                            <div class="row1">Hotel 1</div>
                            <div class="equal">=</div>
                            <div class="row">RS 3500.00</div>

                            <div class="row1">Hotel 2</div>
                            <div class="equal">=</div>
                            <div class="row">RS 4500.00</div>

                            <div class="row1">Hotel 3</div>
                            <div class="equal">=</div>
                            <div class="row">RS 5000.00</div>

                            <div class="row1 final">Accomodations</div>
                            <div class="equal final">=</div>
                            <div class="row final">RS 13000.00</div>

                            <div class="row1">Service Charges</div>
                            <div class="equal">=</div>
                            <div class="row">RS 1000.00</div>

                            <div class="row1">Ticket fees</div>
                            <div class="equal">=</div>
                            <div class="row">(RS 500.00)</div>

                            <div class="row1 final">Total Budget</div>
                            <div class="equal final">=</div>
                            <div class="row final">RS 14000.00</div>
                        </div>
                    </div>

                    <div class="container modal3">
                            <div class="details">
                            <br>
                                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7936.595061707961!2d80.5334359!3d5.953681200000001!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slk!4v1629276519410!5m2!1sen!2slk" width="1000" height="360" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>

                    <form method="post" id="payForm" name="payForm" class="payForm" action="https://sandbox.payhere.lk/pay/checkout">
                        <input type="text" name="merchant_id" value="1218929"> <!-- Replace your Merchant ID -->
                        <input type="text" name="return_url" value="tripToGo">
                        <input type="text" name="cancel_url" value="savedBudget">
                        <input type="text" name="notify_url" value="https://localhost//Travo.lk/php/traveler/traveler_payment.php">
                        <input type="text" name="order_id" value="1">
                        <input type="text" name="items" value="Trip"><br>
                        <input type="text" name="currency" value="LKR">
                        <input type="text" name="amount" value="1000">
                        <input type="text" name="first_name" value="Saman">
                        <input type="text" name="last_name" value="Perera"><br>
                        <input type="text" name="email" value="samanp@gmail.com">
                        <input type="text" name="phone" value="0771234567"><br>
                        <input type="text" name="address" value="No.1, Galle Road">
                        <input type="text" name="city" value="Colombo">
                        <input type="text" name="country" value="Sri Lanka"><br><br>
                    </form>

                    <div class="buttons">
                        <button class="button" id="savebtn" onclick="window.location.href='tripToGo'">SAVE</button>
                        <button class="button" form="payForm" id="paybtn">PAY NOW</button>
                    </div>
                </div>
            </section>
            <script type="text/javascript" src="http://localhost/TRAVO/public/script/traveler/traveler_trip_details.js"></script>

            <section id="contact_us-section">
                <?php include APPROOT.'/views/repeatable_contents/footer.php'; ?>
                <style>
                    <?php include APPROOT.'/public/css/repeatable_contents/footer.css'; ?>
                </style>
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