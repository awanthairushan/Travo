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
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>HOTEL</title>
      <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
        <style> <?php include APPROOT.'/public/css/traveler/traveler_hotel_booking.css'; ?> </style>
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
            
            <?php 
              $check = mysqli_fetch_array($this->checkToDate);

              //total is counted in the query
              if($check['total']==0){
                  while($book1 = mysqli_fetch_assoc($this->singlePricecheck)){
                      $noBook1 = $book1['no_of_rooms'];
                  }
                  while($book2 = mysqli_fetch_assoc($this->DoublePricecheck)){
                      $noBook2 = $book2['no_of_rooms'];
                  }
                  while($book3 = mysqli_fetch_assoc($this->familyPricecheck)){
                      $noBook3 = $book3['no_of_rooms'];
                  }
                  while($book4 = mysqli_fetch_assoc($this->massivePricecheck)){
                      $noBook4 = $book4['no_of_rooms'];
                  }
              }
              else{
                  while($booking = mysqli_fetch_assoc($this->checkBooking)){
                      $noBook1 = $booking['single_rooms'];
                      $noBook2 = $booking['double_rooms'];
                      $noBook3 = $booking['family_rooms'];
                      $noBook4 = $booking['massive_rooms'];
                  }
              }
            ?>

            <div class="pageheading"><?php echo $this->hotelName; ?></div>
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
                <form id="roomPlan" action="bookTripRooms" method="post">
                  <?php echo '<input type="hidden" name="hotel_id" value="'.$this->hotel_id.'">'; ?>
                  <?php echo '<input type="hidden" name="count" value="'.$this->count.'">'; ?>
                  <input type="hidden" name="new_old" value="<?php echo $check['total']; ?>">
                  <input type="hidden" name="date" value="<?php echo $this->date; ?>">
                <div class="rooms">
                    <div class="slide_room">
                        <div class="rname">Single Room</div>
                        <?php
                            while($price1= mysqli_fetch_array($this->hotelSingle)){

                                if($price1['food']=="yes"){
                                    $food="Breakfast included";
                                }
                                else{
                                    $food="Without breakfast";
                                }
                        ?>
                          <div class="roomtype r1">
                            <dl class="">
                              <dt>1 Person</dt>
                              <br>
                              <dt><?php echo $food; ?></dt>
                              <dt>Mini Bar</dt>
                              <dt>A/C</dt>
                              <br>
                              <dt class="price">LKR <?php echo $price1['price'] ?></dt>
                              <input type="hidden" name="singlePrice" value="<?php echo $price1['price'] ?>">
                              <dt class="left">Only <?php echo $noBook1 ?> left..!</dt>
                            </dl>
                          </div>
                          <?php } ?>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseSValue()" value="Decrease Value">-</div>
                            <input type="hidden" name="oldSnumber" id="oldSnumber" value="<?php echo $noBook1; ?>" />
                            <input type="number" name="Snumber" id="Snumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseSValue()" value="Increase Value">+</div>
                        </div>
                    </div>

                    <div class="slide_room">
                        <div class="rname">Double Room</div>
                        <?php
                            while($price2= mysqli_fetch_array($this->hotelDouble)){

                                if($price2['food']=="yes"){
                                    $food2="Breakfast included";
                                }
                                else{
                                    $food2="Without breakfast";
                                }
                        ?>
                        <div class="roomtype r2">
                          <dl class="">
                            <dt>2 Person</dt>
                            <br>
                            <dt><?php echo $food2; ?></dt>
                            <dt>Mini Bar</dt>
                            <dt>A/C</dt>
                            <br>
                            <dt class="price">LKR <?php echo $price2['price'] ?></dt>
                            <input type="hidden" name="doublePrice" value="<?php echo $price2['price'] ?>">
                            <dt class="left">Only <?php echo $noBook2 ?> left..!</dt>
                          </dl>
                        </div>
                        <?php } ?>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseDValue()" value="Decrease Value">-</div>
                            <input type="hidden" name="oldDnumber" id="oldDnumber" value="<?php echo $noBook2; ?>" />
                            <input type="number" name="Dnumber" id="Dnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseDValue()" value="Increase Value">+</div>
                        </div>
                    </div>

                    <div class="slide_room">
                        <div class="rname">Family Room</div>
                        <?php
                            while($price3= mysqli_fetch_array($this->hotelFamily)){

                                if($price3['food']=="yes"){
                                    $food3="Breakfast included";
                                }
                                else{
                                    $food3="Without breakfast";
                                }
                        ?>
                        <div class="roomtype r3">
                          <dl class="">
                            <dt>4 Person</dt>
                            <br>
                            <dt><?php echo $food3; ?></dt>
                            <dt>Mini Bar</dt>
                            <dt>A/C</dt>
                            <br>
                            <dt class="price">LKR <?php echo $price3['price'] ?></dt>
                            <input type="hidden" name="familyPrice" value="<?php echo $price3['price'] ?>">
                            <dt class="left">Only <?php echo $noBook3 ?> left..!</dt>
                          </dl>
                        </div>
                        <?php } ?>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseFValue()" value="Decrease Value">-</div>
                            <input type="hidden" name="oldFnumber" id="oldFnumber" value="<?php echo $noBook3; ?>" />
                            <input type="number" name="Fnumber" id="Fnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseFValue()" value="Increase Value">+</div>
                        </div>
                    </div>

                    <div class="slide_room">
                        <div class="rname">Massive Room</div>
                        <?php
                            while($price4= mysqli_fetch_array($this->hotelMassive)){

                                if($price4['food']=="yes"){
                                    $food4="Breakfast included";
                                }
                                else{
                                    $food4="Without breakfast";
                                }
                        ?>
                        <div class="roomtype r4">
                          <dl class="">
                            <dt><?php echo $price4['capacity']; ?> Person</dt>
                            <br>
                            <dt><?php echo $food4; ?></dt>
                            <dt>Mini Bar</dt>
                            <dt>A/C</dt>
                            <br>
                            <dt class="price">LKR <?php echo $price4['price'] ?></dt>
                            <input type="hidden" name="massivePrice" value="<?php echo $price4['price'] ?>">
                            <dt class="left">Only <?php echo $noBook4 ?> left..!</dt>
                          </dl>
                        </div>
                        <?php } ?>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseMValue()" value="Decrease Value">-</div>
                            <input type="hidden" name="oldMnumber" id="oldMnumber" value="<?php echo $noBook4; ?>" />
                            <input type="number" name="Mnumber" id="Mnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseMValue()" value="Increase Value">+</div>
                        </div>
                    </div>
                </div>
                
            </form>
            <div class="confirm">
              <button id="cancelbtn" class="cancelbtn" onclick="history.back()">CANCEL</button>
              <button type="submit" name="confirmbtn" id="confirmbtn" class="confirmbtn" form="roomPlan">CONFIRM</button>
            </div>


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
                  <p><?php echo $this->hoteDescription ?></p>
                </div>
              </div>

            </div>
        </section>

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
