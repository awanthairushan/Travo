<?php
  if(isset($_SESSION['username'])) {
    if (mysqli_num_rows($this->isTraveler) === 1) {
 ?>
<html>
<head>
    <title>PLAN</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <style> <?php include APPROOT.'/public/css/traveler/traveler_plantripSights.css'; ?> </style>
    <style> <?php include APPROOT.'/public/css/traveler/traveler_repeating_css.css'; ?> </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://localhost/TRAVO/public/script/traveler/traveler_hotel_booking.js"></script>
    <?php include APPROOT.'/views/repeatable_contents/font.php'; ?>
</head>

<body>
    <section class="uppersection">
        <?php include APPROOT.'/views/repeatable_contents/nav_bar_traveler.php';?>
        <style> <?php include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; ?>  </style>
        <script type="text/javascript" src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>
        <!-- use for map -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <div class="pageheading plan-head">PLAN</div>
        <div class="pageheading hotel-head">HOTELS</div>
        <div class="content">
            <div class="container" >
                <div class="details">
                  <br>
                    <form id="form_plan" action="<?php echo URLROOT; ?>/traveler/pendingTrip" method="post">
                    <?php 

                            echo '<input type="hidden" name="trip_id" value="'.$this->tripId.'">
                            <input type="hidden" name="peoplecount" value="'.$_SESSION['traveler_count'].'">
                            <input type="hidden" name="latitude" value="'.$this->lat.'">
                            <input type="hidden" name="longitude" value="'.$this->long.'">
                            <input type="hidden" name="startdate" value="'.$_SESSION['start_date'].'">
                            <input type="hidden" name="enddate" value="'.$_SESSION['end_date'].'">
                            <input type="hidden" name="category" value="'.$_SESSION['trip_cat'].'">
                            <input type="hidden" name="difference" id="limit" value="'.$_SESSION['difference'].'">';
                            
                            $width=100/($_SESSION['difference']+1);

                        ?>
                        <br>
                        <?php for($i=1;$i<=$_SESSION['difference']+1;$i++){ 
                            
                            if($i==1){
                                echo '<input type="hidden" name="destination1" value="'.$this->destination[$i-1].'">';
                                $hotel="FIRST";
                                $hotelCity="hotel1";
                            }
                            if($i==2){
                                echo '<input type="hidden" name="destination2" value="'.$this->destination[$i-1].'">';
                                $hotel="SECOND";
                                $hotelCity="hotel2";
                            }
                            if($i==3){
                                echo '<input type="hidden" name="destination3" value="'.$this->destination[$i-1].'">';
                                $hotel="THIRD";
                                $hotelCity="hotel3";
                            }

                            ?>
                        <style>
                            #destinations{
                                width:<?php echo $width;?>%;
                            }

                            @media screen and (max-width:950px){
                                #destinations {
                                    width: 100%;
                                }
                            }
                        </style>
                        <div id="destinations">
                            <table class="tableday">
                                <tr><td class="tdata tdata-heading"><label for="destination1"><?php echo $this->destination[$i-1]; ?></label></td></tr>
                                <tr>
                                    <td class="tdata">
                                        <div id="sights" class="sights">
                                        
                                        <?php 
                                            while($Sights = mysqli_fetch_array($this->sights[$i-1])){
                                                echo '<input type="checkbox" id="sight" class="sights'.$i.'" name="sights'.$i.'[]" value="'.$Sights['sight_id'].'"><label for="sights">'.$Sights['sight'].'</label><br/>';
                                            }
                                        ?>
                                        <!-- <input type="checkbox" id="sight1" name="anu[]" value="anu_1"><label for="sight1">Ruwanweliseya</label><br/>
                                        <input type="checkbox" id="sight2" name="anu[]" value="anu_2"><label for="sight2">Jetavanaramaya</label><br/>
                                        <input type="checkbox" id="sight3" name="anu[]" value="anu_3"><label for="sight3">Rathna Prasada</label><br/>
                                        <input type="checkbox" id="sight3" name="anu[]" value="anu_4"><label for="sight3">Isurumuniya </label><br/>
                                        <input type="checkbox" id="sight3" name="anu[]" value="anu_5"><label for="sight3">Jaya Sri Maha Bodhi</label><br/>     -->
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php } ?>
                        <br>
                        <!-- destination 2 -->
                        <!-- <div id="destinations">
                            <table class="tableday">
                                <tr><td class="tdata"><label for="destination2">DESTINATION 2</label></td></tr>
                                <tr><td class="tdata"><button type="button" class="selecthotelpopupbtn"> SECOND NIGHT HOTEL</button></td></tr>
                                <tr>
                                    <td class="tdata">
                                        <div id="sights" class="sights">
                                      <input type="checkbox" id="sight1" name="galle[]" value="galle_1"><label for="sight1">Galle Dutch Fort</label><br/>
                                        <input type="checkbox" id="sight2" name="galle[]" value="galle_2"><label for="sight2">Dutch Reformed Church</label><br/>
                                        <input type="checkbox" id="sight3" name="galle[]" value="galle_3"><label for="sight3">The National Museum</label><br/>
                                        <input type="checkbox" id="sight3" name="galle[]" value="galle_4"><label for="sight3">Jungle Beach</label><br/>
                                        <input type="checkbox" id="sight3" name="galle[]" value="galle_5"><label for="sight3">Japanese Peace Pagoda</label><br/>    
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        </div> -->
                        <!-- destination 3 -->
                        <!-- <div id="destinations">
                            <table class="tableday">
                                <tr><td class="tdata"><label for="destination3">DESTINATION 3</label></td></tr>
                                <tr><td class="tdata"><button type="button" class="selecthotelpopupbtn"> THIRD NIGHT HOTEL</button></td></tr>
                                <tr>
                                    <td class="tdata">
                                        <div id="sights" class="sights">
                                        <input type="checkbox" id="sight1" name="col[]" value="col_1"><label for="sight1">Lotus Tower</label><br/>
                                        <input type="checkbox" id="sight2" name="col[]" value="col_2"><label for="sight2">National Museum</label><br/>
                                        <input type="checkbox" id="sight3" name="col[]" value="col_3"><label for="sight3">Sri Lanka Planetarium</label><br/>
                                        <input type="checkbox" id="sight3" name="col[]" value="col_4"><label for="sight3">Viharamahadevi Park</label><br/>
                                        <input type="checkbox" id="sight3" name="col[]" value="col_5"><label for="sight3">Mount Lavinia Beach</label><br/>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div> -->
                        <br><br>                        
                    
                        
                    </form>
                    </div>
                    <br>
                    <input type="submit" form="form_plan" name="saveSubmit" id="nextbtn" form="" class="nextbtn" value="NEXT">
            </div>
        </div>
    </section>

    <script type="text/javascript" src="http://localhost/TRAVO/public/script/traveler/traveler_planTripSights.js"></script>

    <section id="contact_us-section">
      <?php include APPROOT.'/views/repeatable_contents/footer.php';?>
      <style> <?php include APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
    </section>
</body>
</html>
<?php
  } else{
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
}else{
  header("location: http://localhost/TRAVO");
  exit();
}
 ?>
