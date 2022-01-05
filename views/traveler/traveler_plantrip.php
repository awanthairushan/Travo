<?php
//   session_start();
//   if(isset($_SESSION['username'])) {
//     include '../../db/db_connection.php';
//     $temp = $_SESSION['username'];
//     $sqlForSession = "SELECT travelerID FROM travelers WHERE email = '$temp'";
//     $resultForSession = mysqli_query($con, $sqlForSession);
//     if (mysqli_num_rows($resultForSession) === 1) {
 ?>
<html>
<head>
    <title>PLAN</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <style> <?php include APPROOT.'/public/css/traveler/traveler_plantrip.css'; ?> </style>
    <style> <?php include APPROOT.'/public/css/traveler/traveler_repeating_css.css'; ?> </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include APPROOT.'/views/repeatable_contents/font.php'; ?>
</head>

<body>
    <section class="uppersection">
        <?php include APPROOT.'/views/repeatable_contents/nav_bar_traveler.php';?>
        <style> <?php include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; ?>  </style>
        <script type="text/javascript" src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>
        <div class="pageheading plan-head">PLAN</div>
        <div class="pageheading hotel-head">HOTELS</div>
        <div class="content">
            <div class="container" >
                <div class="details">
                  <br>
                    <form id="form_plan">
                        <!-- destination  1 -->
                        <div class="location_div">
                          <label for="location">LOCATION:</label><input type="text" id="location" name="location">
                          <div class="clear"></div>
                          <div id="displaydiv" class="displaydiv"> Select up to 3 destinations</div>
                          <label for="destination">SELECT DESTINATIONS:</label><select id="choices" name="destinations" onchange="getSelectedValue()" placeholder="Select up to 3 destinations">
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>
                        </select>
                        </div>
                        <br>
                        <div id="destinations">
                            <table class="tableday">
                                <tr><td class="tdata"><label for="destination1">DESTINATION 1</label></td></tr>
                                <tr><td class="tdata"><button class="selecthotelpopupbtn"> FIRST NIGHT HOTEL</button></td></tr>
                                <!-- <tr><td class="tdata"><label for="destination1">DESTINATION 1</label></td></tr> -->
                                <tr>
                                    <td class="tdata">
                                        <div id="sights" class="sights">
                                        <input type="checkbox" id="sight1" name="sight1" value="sight1"><label for="sight1">Ruwanweliseya</label><br/>
                                        <input type="checkbox" id="sight2" name="sight2" value="sight2"><label for="sight2">Jetavanaramaya</label><br/>
                                        <input type="checkbox" id="sight3" name="sight3" value="sight3"><label for="sight3">Rathna Prasada</label><br/>
                                        <input type="checkbox" id="sight3" name="sight3" value="sight3"><label for="sight3">Isurumuniya </label><br/>
                                        <input type="checkbox" id="sight3" name="sight3" value="sight3"><label for="sight3">Jaya Sri Maha Bodhi</label><br/>    
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- destination 2 -->
                        <div id="destinations">
                            <table class="tableday">
                                <tr><td class="tdata"><label for="destination2">DESTINATION 2</label></td></tr>
                                <tr><td class="tdata"><button class="selecthotelpopupbtn">SECOND NIGHT HOTEL</button></td></tr>
                                <!-- <tr><td class="tdata"><label for="destination2">DESTINATION 2</label></td></tr> -->
                                <tr>
                                    <td class="tdata">
                                        <div id="sights" class="sights">
                                        <input type="checkbox" id="sight1" name="sight1" value="sight1"><label for="sight1">Galle Dutch Fort</label><br/>
                                        <input type="checkbox" id="sight2" name="sight2" value="sight2"><label for="sight2">Dutch Reformed Church</label><br/>
                                        <input type="checkbox" id="sight3" name="sight3" value="sight3"><label for="sight3">The National Museum</label><br/>
                                        <input type="checkbox" id="sight3" name="sight3" value="sight3"><label for="sight3">Jungle Beach</label><br/>
                                        <input type="checkbox" id="sight3" name="sight3" value="sight3"><label for="sight3">Japanese Peace Pagoda</label><br/>    
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- destination 3 -->
                        <div id="destinations">
                            <table class="tableday">
                                <tr><td class="tdata"><label for="destination3">DESTINATION 3</label></td></tr>
                                <tr><td class="tdata"><button  class="selecthotelpopupbtn">THIRD NIGHT HOTEL</button></td></tr>
                                <!-- <tr><td class="tdata"><label for="destination1">DESTINATION 3</label></td></tr> -->
                                <tr>
                                    <td class="tdata">
                                        <div id="sights" class="sights">
                                        <input type="checkbox" id="sight1" name="sight1" value="sight1"><label for="sight1">Lotus Tower</label><br/>
                                        <input type="checkbox" id="sight2" name="sight2" value="sight2"><label for="sight2">National Museum</label><br/>
                                        <input type="checkbox" id="sight3" name="sight3" value="sight3"><label for="sight3">Sri Lanka Planetarium</label><br/>
                                        <input type="checkbox" id="sight3" name="sight3" value="sight3"><label for="sight3">Viharamahadevi Park</label><br/>
                                        <input type="checkbox" id="sight3" name="sight3" value="sight3"><label for="sight3">Mount Lavinia Beach</label><br/>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <br><br>
                        <div class="location_div">
                          <label for="mails">OTHER E-MAILS:</label><input type="email" id="mails" name="mails"><br/>
                        </div>
                        <br>
                        <button id="nextbtn" class="nextbtn" onclick="window.location.href='budget'">NEXT</button>
                    
                        
                    
                        
                    </form>
                    </div>
            </div>
        </div>
<!-- .................................popup.................................. -->

        <div class="hotel_names_popup">
          <table>
              <tr>
                  <td><a onclick="plusSlides(-1)"><div class="prev"></div></a></td>
                  <td class="hotels">
                  <div class="slide hotels1">
                        <div class="cols1">
                            <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn">Cinnamon Grand Colombo<br><br>Luxury<br><br>Rs.5,500 - Rs.12,000</button></div>
                            <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Occidental Eden <br><br>Deluxe<br><br>Rs.10,000 - Rs.45,000</button></div>
                        </div>
                        <div class="cols2">
                            <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Lavinia Hotel<br><br> Standard<br><br>Rs.1,500 - Rs.10,000</button></div>
                            <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Nelly Marine <br><br> Luxury<br><br>Rs.3,500 - Rs.15,000</button></div>
                        </div>
                    </div>

                      <div class="slide hotels2">
                          <div class="cols1">
                              <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> The Glamp - Kelaniya <br><br> Deluxe <br><br> Rs.7,500 - Rs.20,000 </button></div>
                              <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Sigiriya Resort - Sigiriya <br><br> Luxury <br><br> Rs.4,000 - Rs.15,000 </button></div>
                          </div>
                          <div class="cols2">
                              <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Amaya Lake - Pasikuda <br><br> Superior <br><br> Rs.3,500 - Rs.12,000 </button></div>
                              <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Amaara Forest - Kandy <br><br> Standard <br><br> Rs.1,500 - Rs.5,000 </button></div>
                          </div>
                      </div>


                      <div class="slide hotels3">
                            <div class="cols1">
                                <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Shanaya Mansion <br><br> Superior <br><br> Rs.2,000 - Rs.8,000 </button></div>
                                <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Marriott resort <br><br> Luxury <br><br> Rs.2,500 - Rs.12,500 </button></div>
                            </div>
                            <div class="cols2">
                                <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Tamarind Hill <br><br> Deluxe <br><br>  Rs.3000 - Rs.20,000 </button></div>
                                <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Shangri-La Hambantota <br><br> Deuluxe <br><br> Rs.4,000 - Rs.20,000 </button></div>
                            </div>
                        </div>


                      <!-- <div class="slide hotels4">
                          <div class="cols1">
                              <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Hotel Name <br/> 00-5000</button></div>
                              <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Hotel Name <br/> 00-5000</button></div>
                          </div>
                          <div class="cols2">
                              <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Hotel Name <br/> 00-5000</button></div>
                              <div><button onclick="window.location.href='hotelBooking';" id="selecthotelbtn"> Hotel Name <br/> 00-5000</button></div>
                          </div>
                      </div> -->
                  </td>
                  <td><a onclick="plusSlides(1)"><div class="next"></div></a></td>
              </tr>
              <tr class="cancel"><td colspan="3"><button id="cancelbtn">CANCEL</button></td></tr>
          </table>
        </div>
    </section>

    <script type="text/javascript" src="http://localhost/TRAVO/public/script/traveler/traveler_plantrip.js"></script>

    <section id="contact_us-section">
      <?php include APPROOT.'/views/repeatable_contents/footer.php';?>
      <style> <?php include APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
    </section>
</body>
</html>
<?php
//   } else{
//     echo '<script type="text/javascript">javascript:history.go(-1)</script>';
//     exit();
//   }
// }else{
//   header("location: ../../index.html");
//   exit();
// }
 ?>
