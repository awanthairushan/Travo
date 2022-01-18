<?php
//   session_start();
//   if(isset($_SESSION['username'])) {
//     include '../../db/db_connection.php';
//     $temp = $_SESSION['username'];
//     $sqlForSession = "SELECT hotelID FROM hotels WHERE email = '$temp'";
//     $resultForSession = mysqli_query($con, $sqlForSession);
//     if (mysqli_num_rows($resultForSession) === 1) {
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
      <script type="text/javascript" src="<?php echo APPROOT ?>/public/script/repeatable_contents/nav_bar_hotel.js"></script>
      <br>
            <form>
                <table class="b">
                  <tr>
                    <td class="b" colspan="3" >  <div class="calendar"><input type="date" id="start"></div></td>

                    <td class="b" colspan="3" > <div class="calendar"><input type="date" id="end"></div> </td>
                  </tr>
</table>
           </form>
<br>
    <center>

        <form>

            <div class="bg">
                <div class="rooms">
                    <div class="slide">
                        <div class ="text1">Single Room</div>
                        <div class="roomtype r1">1 Person<br/><br/>Breakfast included<br/>Attached bathroom<br/><br/>LKR 1000.00<br/>without Luxury facilities<br/><br/><b class="nos">Only 2 left !</b></div>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseSBValue()" value="Decrease Value">-</div>
                            <input type="number" id="SBnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseSBValue()" value="Increase Value">+</div>
                        </div>
                    </div>

                    <div class="slide">
                        <div class ="text1">Double Room</div>
                        <div class="roomtype r2">2 Person<br/><br/>Breakfast included<br/>Attached bathroom<br/><br/>LKR 2000.00<br/>without Luxury facilities<br/><br/><b class="nos">Only 3 left !</b></div>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseDBValue()" value="Decrease Value">-</div>
                            <input type="number" id="DBnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseDBValue()" value="Increase Value">+</div>
                        </div>
                    </div>

                    <div class="slide">
                        <div class ="text1">Family Room</div>
                        <div class="roomtype r3">4 Person<br/><br/>Breakfast included<br/>Attached bathroom<br/><br/>LKR 3000.00<br/>without Luxury facilities<br/><br/><b class="nos">Only 5 left !</b></div>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseFBValue()" value="Decrease Value">-</div>
                            <input type="number" id="FBnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseFBValue()" value="Increase Value">+</div>
                        </div>
                    </div>

                    <div class="slide">
                        <div class ="text1">Massive Room</div>
                        <div class="roomtype r4">6 Person<br/><br/>Breakfast included<br/>Attached bathroom<br/><br/>LKR 4000.00<br/>without Luxury facilities<br/><br/><b class="nos">Only 4 left !</b></div>
                        <div>
                            <div class="value-button" id="decrease" onclick="decreaseMBValue()" value="Decrease Value">-</div>
                            <input type="number" id="MBnumber" value="0" />
                            <div class="value-button" id="increase" onclick="increaseMBValue()" value="Increase Value">+</div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="confirm"><button id="confirmbtn">CONFIRM</button></div>
        </div>

</form></center>
</section>
<section id="contact_us-section">
      <?php include_once APPROOT.'/views/repeatable_contents/footer.php';?>
      <style> <?php include_once APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
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
