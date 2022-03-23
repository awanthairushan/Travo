<?php
//   session_start();
  if(isset($_SESSION['username'])) {
//     include '../../db/db_connection.php';
//     $temp = $_SESSION['username'];
//     $sqlForSession = "SELECT hotelID FROM hotels WHERE email = '$temp'";
//     $resultForSession = mysqli_query($con, $sqlForSession);
    if (mysqli_num_rows($this->isHotel) === 1) {
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>AVAILABILITY</title>
        <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
        <link rel="stylesheet" href="http://localhost/TRAVO/public/css/hotel/hotel_availability.css">
        <script type="text/javascript" src="http://localhost/TRAVO/public/script/hotel/hotel_availability.js"></script>
        <style> <?php include_once APPROOT.'/public/css/hotel/hotel_repeating_css.css'; ?> </style>
        <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
        <?php include APPROOT.'/views/repeatable_contents/font.php'; ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <section class="sign_up-traveler">
      <?php include_once APPROOT.'/views/repeatable_contents/nav_bar_hotel.php';?>
      <style>
      <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_hotel.css';?>
      </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_hotel.js"></script>
      <br>
      <?php 
        $date=$this->day;
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
            <form action="availabilityDate" method="post">
                <table class="b">
                  <tr>
                    <td class="b" colspan="3" >  <div class="calendar"><input type="date" name="start" id="start" onchange="this.form.submit()" value=<?php echo $date; ?>></div></td>
                  </tr>
</table>
           </form>
<br>
    <center>

        <form action="availabilityChange" method="post">
            <input type="hidden" name="change_date" value="<?php echo $date; ?>">
            <input type="hidden" name="new_old" value="<?php echo $check['total']; ?>">
            <div class="bg">
                <div class="rooms">
                    <div class="slide">
                        <div class ="text1">Single Room</div>
                        <?php
                            while($price1= mysqli_fetch_array($this->singlePrice)){

                                if($price1['food']=="yes"){
                                    $food="Breakfast included";
                                }
                                else{
                                    $food="Without breakfast";
                                }
                        ?>
                        <div class="roomtype r1">1 Person<br/><br/><?php echo $food; ?><br/>Attached bathroom<br/><br/>LKR <?php echo $price1['price'] ?><br/>without Luxury facilities<br/><br/><b class="nos">Only <?php echo $noBook1 ?> left !</b></div>
                        <?php } ?>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseSBValue()" value="Decrease Value">-</div>
                            <input type="hidden" name="oldSBnumber" id="oldSBnumber" value="<?php echo $noBook1; ?>" />
                            <input type="number" name="SBnumber" id="SBnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseSBValue()" value="Increase Value">+</div>
                        </div>
                    </div>

                    <div class="slide">
                        <div class ="text1">Double Room</div>
                        <?php
                            while($price2= mysqli_fetch_array($this->DoublePrice)){

                                if($price2['food']=="yes"){
                                    $food2="Breakfast included";
                                }
                                else{
                                    $food2="Without breakfast";
                                }
                        ?>
                        <div class="roomtype r2">2 Person<br/><br/><?php echo $food2; ?><br/>Attached bathroom<br/><br/>LKR <?php echo $price2['price'] ?><br/>without Luxury facilities<br/><br/><b class="nos">Only <?php echo $noBook2 ?> left !</b></div>
                        <?php } ?>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseDBValue()" value="Decrease Value">-</div>
                            <input type="hidden" name="oldDBnumber" id="oldDBnumber" value="<?php echo $noBook2; ?>" />
                            <input type="number" name="DBnumber" id="DBnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseDBValue()" value="Increase Value">+</div>
                        </div>
                    </div>

                    <div class="slide">
                        <div class ="text1">Family Room</div>
                        <?php
                            while($price3= mysqli_fetch_array($this->familyPrice)){

                                if($price3['food']=="yes"){
                                    $food3="Breakfast included";
                                }
                                else{
                                    $food3="Without breakfast";
                                }
                        ?>
                        <div class="roomtype r3">4 Person<br/><br/><?php echo $food3; ?><br/>Attached bathroom<br/><br/>LKR <?php echo $price3['price'] ?><br/>without Luxury facilities<br/><br/><b class="nos">Only <?php echo $noBook3 ?> left !</b></div>
                        <?php } ?>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseFBValue()" value="Decrease Value">-</div>
                            <input type="hidden" name="oldFBnumber" id="oldFBnumber" value="<?php echo $noBook3; ?>" />
                            <input type="number" name="FBnumber" id="FBnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseFBValue()" value="Increase Value">+</div>
                        </div>
                    </div>

                    <div class="slide">
                        <div class ="text1">Massive Room</div>
                        <?php
                            while($price4= mysqli_fetch_array($this->massivePrice)){

                                if($price4['food']=="yes"){
                                    $food4="Breakfast included";
                                }
                                else{
                                    $food4="Without breakfast";
                                }
                        ?>
                        <div class="roomtype r4"><?php echo $price4['capacity']; ?> Person<br/><br/><?php echo $food4; ?><br/>Attached bathroom<br/><br/>LKR <?php echo $price4['price'] ?><br/>without Luxury facilities<br/><br/><b class="nos">Only <?php echo $noBook4 ?> left !</b></div>
                        <?php } ?>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseMBValue()" value="Decrease Value">-</div>
                            <input type="hidden" name="oldMBnumber" id="oldMBnumber" value="<?php echo $noBook4; ?>" />
                            <input type="number" name="MBnumber" id="MBnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseMBValue()" value="Increase Value">+</div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="confirm"><button type="submit" name="confirmbtn" id="confirmbtn">CONFIRM</button></div>
        </div>

</form></center>
<?php //} ?>
</section>
<section id="contact_us-section">
      <?php include_once APPROOT.'/views/repeatable_contents/footer.php';?>
      <style> <?php include_once APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
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
