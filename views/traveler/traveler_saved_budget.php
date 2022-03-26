<?php
  if(isset($_SESSION['username'])) {
    // $count=0;
    // while($travelers = mysqli_fetch_array($this->isTraveler)){
    //   if($travelers['email']===$_SESSION['username']){
    //     $count=$count+1;
    //   }
    // }
    if (mysqli_num_rows($this->isTraveler)===1) {
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

                    <?php while ($details = mysqli_fetch_array($this->selectTrip)){ 
                            $trip_status = $details['status'];
                        ?>
                    <div class="container modal1">
                        <div class="details">
                            <table class="main_details">
                                <tr>
                                    <td>Date : </td>
                                    <td><?php echo $details['start_date'].' To '.$details['end_date']; ?></td>
                                </tr>
                                <tr>
                                    <td>Number of Travelers : </td>
                                    <td><?php echo $details['no_of_people']; ?></td>
                                </tr>
                                <tr>
                                    <td>Category : </td>
                                    <td><?php echo $details['category']; ?></td>
                                </tr>
                                <tr>
                                    <td>Mileage : </td>
                                    <td><?php echo $details['mileage'].'km'; ?></td>
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

                            <?php
                                $day2=0;
                                $day3=0;
                                if($details['no_of_days']==0){
                                    $tcolhide=50;
                                    $firstchild=50;
                                    $hotel1="-";
                                    $hotel2="-";
                                    $hotel3="-";
                                }
                                if($details['no_of_days']==1){
                                    $tcolhide=34;
                                    $firstchild=32;
                                    $day2=1;
                                    $hotel1=$this->hotel1;
                                    $hotel2="-";
                                    $hotel3="-";
                                }
                                if($details['no_of_days']==2){
                                    $tcolhide=29;
                                    $firstchild=13;
                                    $day2=1;
                                    $day3=1;
                                    $hotel1=$this->hotel1;
                                    $hotel2=$this->hotel2;
                                    $hotel3="-";
                                }
                            ?>
                            <style>
                                .tcolumn,.thide{
                                    width: <?php echo $tcolhide; ?>%;
                                    float: left;
                                }

                                .thide{
                                    display: none;
                                }

                                .thide:first-child{
                                    width: <?php echo $firstchild; ?>%;
                                    display: block;
                                }

                                @media screen and (max-width:850px){
                                    .tcolumn,.thide{
                                        width: 50%;
                                        margin-bottom: 1rem;
                                    }

                                    .thide:first-child{
                                        width: 50%;
                                    }

                                    .thide{display: block;}
                                }

                                @media screen and (max-width:450px){
                                    .thide{
                                        width: 30%;
                                    }

                                    .thide:first-child{
                                        width: 30%;
                                    }

                                    .tcolumn{
                                        width: 70%;
                                    }
                                }
                            </style>
                            <div class="days">
                                <div class="thide">
                                    <!-- trowhead is an empty div -->
                                    <div class="trowhead">&nbsp</div>
                                    <div class="trow"><span>Destination</span></div>
                                    <div class="trow"><span>Hotel</span></div>
                                    <div class="trow"><span>Sights<span><br/><br/><br/><br/><br/></div>
                                </div>
                                <div class="tcolumn">
                                    <div class="trowhead">Day 1</div>
                                    <div class="trow"><?php echo ' '.$details['destination_id'].' ' ?></div>
                                    <div class="trow"><?php echo ' '.$hotel1.' ' ?></div>
                                    <div class="trow">
                                        <?php 
                                        $count1=$this->sightCount1;
                                        for($a=0;$a<$count1;$a++){
                                            while($sights1=mysqli_fetch_array($this->sightsName1[$a])){
                                                echo $sights1['sight'].'<br/>';
                                            }
                                        }
                                        for($a1=5;$a1<5-$count1;$a1++){
                                            echo '-<br/>';
                                        }
                                        ?>
                                    </div>
                                    <!-- <div class="trow"> Ruwanweliseya<br />Rathna Prasada<br />Isurumuniya</div> -->
                                </div>
                                <?php if($day2==1){ ?>
                                <div class="thide">
                                    <!-- trowhead is an empty div -->
                                    <div class="trowhead">&nbsp</div>
                                    <div class="trow"><span>Destination</span></div>
                                    <div class="trow"><span>Hotel</span></div>
                                    <div class="trow"><span>Sights</span><br><br><br></div>
                                </div>
                                <div class="tcolumn">
                                    <div class="trowhead">Day 2</div>
                                    <div class="trow"><?php echo ' '.$details['destination_id2'].' ' ?></div>
                                    <div class="trow"><?php echo ' '.$hotel2.' ' ?></div>
                                    <div class="trow">
                                        <?php for($b=0;$b<$this->sightCount2;$b++){
                                            while($sights2=mysqli_fetch_array($this->sightsName2[$b])){
                                                echo $sights2['sight'].'<br/>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <!-- <div class="trow">Dutch Reformed Church<br />The National Museum<br />Japanese Peace Pagoda</div> -->
                                </div>
                                <?php } 
                                    if($day3==1){
                                ?>
                                <div class="thide">
                                    <!-- trowhead is an empty div -->
                                    <div class="trowhead">&nbsp</div>
                                    <div class="trow"><span>Destination</span></div>
                                    <div class="trow"><span>Hotel</span></div>
                                    <div class="trow"><span>Sights</span><br><br><br></div>
                                </div>
                                <div class="tcolumn">
                                    <div class="trowhead">Day 3</div>
                                    <div class="trow"><?php echo ' '.$details['destination_id3'].' ' ?></div>
                                    <div class="trow"><?php echo ' '.$hotel3.' ' ?></div>
                                    <div class="trow">
                                        <?php for($c=0;$c<$this->sightCount3;$c++){
                                            while($sights3=mysqli_fetch_array($this->sightsName3[$c])){
                                                echo $sights3['sight'].'<br/>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <!-- <div class="trow">National Museum<br />Viharamahadevi Park<br />Sri Lanka Planetarium</div> -->
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

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

                            <?php while ($budget = mysqli_fetch_array($this->budget)){ 
                                    if($budget['hotel2_accomodation']!=0){
                            ?>
                            <div class="row1">Hotel 1</div>
                            <div class="equal">=</div>
                            <div class="row">RS <?php echo $budget['hotel1_accomodation'] ?></div>

                            <div class="row1">Hotel 2</div>
                            <div class="equal">=</div>
                            <div class="row">RS <?php echo $budget['hotel2_accomodation'] ?></div>
                            <?php }
                                if($budget['accomodation']!=0){
                            ?>
                            <div class="row1 final">Accomodations</div>
                            <div class="equal final">=</div>
                            <div class="row final">RS <?php echo $budget['accomodation'] ?></div>
                            <?php }
                            ?>

                            <div class="row1">Service Charges</div>
                            <div class="equal">=</div>
                            <div class="row">RS <?php echo $budget['service_charges'] ?></div>

                            <div class="row1">Ticket fees</div>
                            <div class="equal">=</div>
                            <div class="row">(RS <?php echo $budget['ticket_fees'] ?>)</div>

                            <div class="row1 final">Total Budget</div>
                            <div class="equal final">=</div>
                            <div class="row final">RS <?php echo $budget['total_expenses'] ?></div>
                            <?php 
                            $total_price = $budget['total_expenses'];                        
                        } ?>
                        </div>
                    </div>

                    <div class="container modal3">
                            <div class="details">
                            <br>
                                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7936.595061707961!2d80.5334359!3d5.953681200000001!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slk!4v1629276519410!5m2!1sen!2slk" width="1000" height="360" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>

                        <?php if($trip_status=="Saved"){ 
                               while($travelerPay=mysqli_fetch_array($this->TravelerDetails)){
                                $payName=explode(' ',$travelerPay['name']);
                        ?>
                            <form method="post" id="payForm" name="payForm" class="payForm" action="https://sandbox.payhere.lk/pay/checkout">
                                <input type="text" name="merchant_id" value="1218929"> <!-- Replace your Merchant ID -->
                                <input type="text" name="return_url" value="http://localhost/TRAVO/Traveler/tripToGo">
                                <input type="text" name="cancel_url" value="http://localhost/TRAVO/Traveler/budget">
                                <input type="text" name="notify_url" value="https://localhost/TRAVO/Traveler/savedBudget">
                                <input type="text" name="order_id" value="<?php echo $_SESSION['trip_id']; ?>">
                                <input type="text" name="items" value="Trip"><br>
                                <input type="text" name="currency" value="LKR">
                                <input type="text" name="amount" value="<?php echo $total_price; ?>">
                                <input type="text" name="first_name" value="<?php echo $payName[0]; ?>">
                                <input type="text" name="last_name" value="<?php echo $payName[1]; ?>"><br>
                                <input type="text" name="email" value="<?php echo $travelerPay['email']; ?>">
                                <input type="text" name="phone" value="<?php echo $travelerPay['contact1']; ?>"><br>
                                <input type="text" name="address" value="<?php echo $travelerPay['address_line1'].','.$travelerPay['address_line2']; ?>">
                                <input type="text" name="city" value="<?php echo $travelerPay['city']; ?>">
                                <input type="text" name="country" value="Sri Lanka"><br><br>
                            </form>
                        <?php }} ?>

                    <div class="buttons">
                        
                        <button class="cancelbutton" id="cancelbtn" onclick="window.location.href='tripToGo'">CANCEL</button>
                        <?php if($trip_status=="Saved"){  ?>
                        <button class="button" form="payForm" id="paybtn">PAY NOW</button>
                        <?php } ?>
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