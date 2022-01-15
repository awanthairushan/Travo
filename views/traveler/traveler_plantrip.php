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
        <style> <?php 
        include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; 
        include APPROOT.'/public/css/traveler/traveler_budget.css'; 
        ?>  </style>
        <script type="text/javascript" src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>
        <div class="pageheading plan-head">PLAN</div>
        <div class="pageheading hotel-head">HOTELS</div>
        <div class="content">
            <div class="container1" >
                <div class="details">
                  <br>
                    <form id="form_plan" action="<?php echo URLROOT; ?>/traveler/pendingTrip" method="post">
                        <?php 

                            while ($rows = mysqli_fetch_array($this->tripPlanned)){

                                echo '<input type="hidden" name="trip_id" value="'.$rows['trip_id'].'">
                                  <input type="hidden" name="peoplecount" value="'.$rows['no_of_people'].'">
                                  <input type="hidden" name="startdate" value="'.$rows['start_date'].'">
                                  <input type="hidden" name="enddate" value="'.$rows['end_date'].'">
                                  <input type="hidden" name="category" value="'.$rows['category'].'">';

                            }

                        ?>
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
                        <!-- store hotel data -->
                        <input type="hidden" name="hotel1" value="<?php echo $_SESSION['hotel_1'] ?>">
                        <input type="hidden" name="hotel2" value="<?php echo $_SESSION['hotel_2'] ?>">
                        <input type="hidden" name="hotel3" value="<?php echo $_SESSION['hotel_3'] ?>">
                        <!-- end of hotel data -->
                        <div id="destinations">
                            <table class="tableday">
                                <tr><td class="tdata"><label for="destination1">DESTINATION 1</label></td></tr>
                                <tr><td class="tdata"><button type="button" class="selecthotelpopupbtn"> FIRST NIGHT HOTEL</button></td></tr>
                                <!-- <tr><td class="tdata"><label for="destination1">DESTINATION 1</label></td></tr> -->
                                <tr>
                                    <td class="tdata">
                                        <div id="sights" class="sights">
                                        <input type="checkbox" id="sight1" name="anu[]" value="anu_1"><label for="sight1">Ruwanweliseya</label><br/>
                                        <input type="checkbox" id="sight2" name="anu[]" value="anu_2"><label for="sight2">Jetavanaramaya</label><br/>
                                        <input type="checkbox" id="sight3" name="anu[]" value="anu_3"><label for="sight3">Rathna Prasada</label><br/>
                                        <input type="checkbox" id="sight3" name="anu[]" value="anu_4"><label for="sight3">Isurumuniya </label><br/>
                                        <input type="checkbox" id="sight3" name="anu[]" value="anu_5"><label for="sight3">Jaya Sri Maha Bodhi</label><br/>    
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- destination 2 -->
                        <div id="destinations">
                            <table class="tableday">
                                <tr><td class="tdata"><label for="destination2">DESTINATION 2</label></td></tr>
                                <tr><td class="tdata"><button type="button" class="selecthotelpopupbtn">SECOND NIGHT HOTEL</button></td></tr>
                                <!-- <tr><td class="tdata"><label for="destination2">DESTINATION 2</label></td></tr> -->
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
                        </div>
                        <!-- destination 3 -->
                        <div id="destinations">
                            <table class="tableday">
                                <tr><td class="tdata"><label for="destination3">DESTINATION 3</label></td></tr>
                                <tr><td class="tdata"><button type="button"  class="selecthotelpopupbtn">THIRD NIGHT HOTEL</button></td></tr>
                                <!-- <tr><td class="tdata"><label for="destination1">DESTINATION 3</label></td></tr> -->
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
                        </div>
                        <br><br>
                        <div class="location_div">
                          <label for="mails">OTHER E-MAILS:</label><input type="email" id="mails" name="mails"><br/>
                        </div>
                        <input type="hidden" name="mileage" value="350">
                        
                        
                        <input type="hidden" name="hotelacc1" value="3500.00">
                        <input type="hidden" name="hotelacc2" value="4500.00">
                        <input type="hidden" name="hotelacc3" value="5000.00">
                        <input type="hidden" name="servicecharges" value="1000.00">
                        <input type="hidden" name="ticketfees" value="500.00">
                        <br>
                        
                    
                        
                    
                        
                    </form>
                    <input type="submit" form="form_plan" name="saveSubmit" id="nextbtn" class="nextbtn" value="NEXT">
                    </div>
            </div>
        </div>
<!-- .................................select hotels.................................. -->

<div class="hotel_names_popup">
          <table>
              <tr>
                  <td><a onclick="plusSlides(-1)"><div class="prev"></div></a></td>
                  <td class="hotels">
                  <div class="slide hotels1">
                        <div class="cols1">
                            <div> <button type="button" id="selecthotelbtn">Cinnamon Grand Colombo<br><br>Luxury<br><br>Rs.5,500 - Rs.12,000</button></div>
                            <div> <button type="button" id="selecthotelbtn"> Occidental Eden <br><br>Deluxe<br><br>Rs.10,000 - Rs.45,000</button></div>
                        </div>
                        <div class="cols2">
                            <div> <button type="button" id="selecthotelbtn"> Lavinia Hotel<br><br> Standard<br><br>Rs.1,500 - Rs.10,000</button></div>
                            <div> <button type="button" id="selecthotelbtn"> Nelly Marine <br><br> Luxury<br><br>Rs.3,500 - Rs.15,000</button></div>
                        </div>
                    </div>

                      <div class="slide hotels2" style="display:none;">
                          <div class="cols1">
                              <div> <button type="button" id="selecthotelbtn"> The Glamp - Kelaniya <br><br> Deluxe <br><br> Rs.7,500 - Rs.20,000 </button></div>
                              <div> <button type="button" id="selecthotelbtn"> Sigiriya Resort - Sigiriya <br><br> Luxury <br><br> Rs.4,000 - Rs.15,000 </button></div>
                          </div>
                          <div class="cols2">
                              <div> <button type="button" id="selecthotelbtn"> Amaya Lake - Pasikuda <br><br> Superior <br><br> Rs.3,500 - Rs.12,000 </button></div>
                              <div> <button type="button" id="selecthotelbtn"> Amaara Forest - Kandy <br><br> Standard <br><br> Rs.1,500 - Rs.5,000 </button></div>
                          </div>
                      </div>


                      <div class="slide hotels3" style="display:none;">
                            <div class="cols1">
                                <div> <button type="button" id="selecthotelbtn"> Shanaya Mansion <br><br> Superior <br><br> Rs.2,000 - Rs.8,000 </button></div>
                                <div> <button type="button" id="selecthotelbtn"> Marriott resort <br><br> Luxury <br><br> Rs.2,500 - Rs.12,500 </button></div>
                            </div>
                            <div class="cols2">
                                <div> <button type="button" id="selecthotelbtn"> Tamarind Hill <br><br> Deluxe <br><br>  Rs.3000 - Rs.20,000 </button></div>
                                <div> <button type="button" id="selecthotelbtn"> Shangri-La Hambantota <br><br> Deuluxe <br><br> Rs.4,000 - Rs.20,000 </button></div>
                            </div>
                        </div>


                      <!-- <div class="slide hotels4" style="display:none;">
                          <div class="cols1">
                              <div> <button type="button" id="selecthotelbtn"> Hotel Name <br/> 00-5000</button></div>
                              <div> <button type="button" id="selecthotelbtn"> Hotel Name <br/> 00-5000</button></div>
                          </div>
                          <div class="cols2">
                              <div> <button type="button" id="selecthotelbtn"> Hotel Name <br/> 00-5000</button></div>
                              <div> <button type="button" id="selecthotelbtn"> Hotel Name <br/> 00-5000</button></div>
                          </div>
                      </div> -->
                  </td>
                  <td><a onclick="plusSlides(1)"><div class="next"></div></a></td>
              </tr>
              <tr class="cancel"><td colspan="3"><button id="cancelbtn">CANCEL</button></td></tr>
          </table>
        </div>

                <!-- section to show details of a specific hotel -->

                <div class="content3">
                    <div class="hotelpageheading">CINNAMON GRAND</div>
                    <div class="hotelcontent">
                    <div class="image_gallery_hotel">
                        <table>
                        <tr>
                            <td> <img src="http://localhost/TRAVO/public/images/sample_images/for_hotels/1.jpg" class="images_image_gallery_hotel" alt="HOTEL SAMPLE IMAGES"> </td>
                            <td> <img src="http://localhost/TRAVO/public/images/sample_images/for_hotels/2.jpg" class="images_image_gallery_hotel" alt="HOTEL SAMPLE IMAGES"></td>
                            <td><img src="http://localhost/TRAVO/public/images/sample_images/for_hotels/3.jpg" class="images_image_gallery_hotel" alt="HOTEL SAMPLE IMAGES"></td>
                            <td><img src="http://localhost/TRAVO/public/images/sample_images/for_hotels/4.jpg" class="images_image_gallery_hotel" alt="HOTEL SAMPLE IMAGES"></td>
                            <td><img src="http://localhost/TRAVO/public/images/sample_images/for_hotels/5.jpg" class="images_image_gallery_hotel" alt="HOTEL SAMPLE IMAGES"></td>
                        </tr>
                        </table>
                    </div>

                    <div>
                        <form action="planTrip">
                        <div class="rooms">
                            <div class="slide_room">
                                <div class="rname">Single Room</div>
                                <div class="roomtype r1">
                                    <dl class="">
                                    <dt>1 Person</dt>
                                    <br>
                                    <dt>Breakfast included</dt>
                                    <dt>Mini Bar</dt>
                                    <dt>A/C</dt>
                                    <br>
                                    <dt class="price">LKR 6500.00</dt>
                                    <dt class="left">Only 2 left..!</dt>
                                    </dl>
                                </div>
                                <div>
                                    <div class="value-button" id="decrease" onclick="decreaseSValue()" value="Decrease Value">-</div>
                                    <input type="number" id="Snumber" value="0" />
                                    <div class="value-button" id="increase" onclick="increaseSValue()" value="Increase Value">+</div>
                                </div>
                            </div>

                            <div class="slide_room">
                                <div class="rname">Double Room</div>
                                <div class="roomtype r2">
                                <dl class="">
                                    <dt>2 Person</dt>
                                    <br>
                                    <dt>Breakfast included</dt>
                                    <dt>Mini Bar</dt>
                                    <dt>A/C</dt>
                                    <br>
                                    <dt class="price">LKR 12000.00</dt>
                                    <dt class="left">Only 5 left..!</dt>
                                </dl>
                                </div>
                                <div>
                                    <div class="value-button" id="decrease" onclick="decreaseDValue()" value="Decrease Value">-</div>
                                    <input type="number" id="Dnumber" value="0" />
                                    <div class="value-button" id="increase" onclick="increaseDValue()" value="Increase Value">+</div>
                                </div>
                            </div>

                            <div class="slide_room">
                                <div class="rname">Family Room</div>
                                <div class="roomtype r3">
                                <dl class="">
                                    <dt>4 Person</dt>
                                    <br>
                                    <dt>Breakfast included</dt>
                                    <dt>Mini Bar</dt>
                                    <dt>A/C</dt>
                                    <br>
                                    <dt class="price">LKR 15000.00</dt>
                                    <dt class="left">Only 4 left..!</dt>
                                </dl>
                                </div>
                                <div>
                                    <div class="value-button" id="decrease" onclick="decreaseFValue()" value="Decrease Value">-</div>
                                    <input type="number" id="Fnumber" value="0" />
                                    <div class="value-button" id="increase" onclick="increaseFValue()" value="Increase Value">+</div>
                                </div>
                            </div>

                            <div class="slide_room">
                                <div class="rname">Massive Room</div>
                                <div class="roomtype r4">
                                <dl class="">
                                    <dt>6 Person</dt>
                                    <br>
                                    <dt>Breakfast included</dt>
                                    <dt>Mini Bar</dt>
                                    <dt>A/C</dt>
                                    <br>
                                    <dt class="price">LKR 20000.00</dt>
                                    <dt class="left">Only 3 left..!</dt>
                                </dl>
                                </div>
                                <div>
                                    <div class="value-button" id="decrease" onclick="decreaseMValue()" value="Decrease Value">-</div>
                                    <input type="number" id="Mnumber" value="0" />
                                    <div class="value-button" id="increase" onclick="increaseMValue()" value="Increase Value">+</div>
                                </div>
                            </div>
                        </div>
                        <div class="confirm"><button id="confirmbtn" class="confirmbtn"  onclick="window.location.href='planTrip'">CONFIRM</button></div>
                    </form>

                    <!-- <table class="hoteldetails">
                        <tr>
                            <th>Location</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7921.539473306047!2d79.84874!3d6.918109!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb0658168859e3c0e!2sCinnamon%20Grand%20Colombo!5e0!3m2!1sen!2slk!4v1629560069244!5m2!1sen!2slk" width="95%" height="92%"  allowfullscreen="" loading="lazy"></iframe>
                            </td>
                            <td>
                            <p>
                                Set 1 km from both the Slave Island Railway Station and Galle Face Green, a seaside urban park, this grand resort hotel is also 2 km from Gangaramaya Buddhist Temple.
                                Featuring picture windows, the polished rooms come with minibars, free Wi-Fi and flat-screen TVs. Suites add living rooms and dining areas, and some offer kitchenettes, wet bars or butler service.
                                </p>
                            </td>
                        </tr>
                    </table> -->

                    <div class="hoteldetails">
                        <div class="hdrow">
                            <div class="hdhead">Location</div>
                            <div class="hdbody">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7921.539473306047!2d79.84874!3d6.918109!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb0658168859e3c0e!2sCinnamon%20Grand%20Colombo!5e0!3m2!1sen!2slk!4v1629560069244!5m2!1sen!2slk" width="95%" height="92%"  allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                        <div class="hdrow">
                            <div class="hdhead">Description</div>
                            <div class="hdbody">
                            <p>
                                Set 1 km from both the Slave Island Railway Station and Galle Face Green, a seaside urban park, this grand resort hotel is also 2 km from Gangaramaya Buddhist Temple.
                                Featuring picture windows, the polished rooms come with minibars, free Wi-Fi and flat-screen TVs. Suites add living rooms and dining areas, and some offer kitchenettes, wet bars or butler service.
                            </p>
                            </div>
                        </div>
                    </div>

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
  } else{
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
}else{
  header("location: http://localhost/TRAVO");
  exit();
}
 ?>
