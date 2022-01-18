<?php
  // session_start();
  // if(isset($_SESSION['username'])) {
  //   include '../../db/db_connection.php';
  //   $temp = $_SESSION['username'];
  //   $sqlForSession = "SELECT hotelID FROM hotels WHERE email = '$temp'";
  //   $resultForSession = mysqli_query($con, $sqlForSession);
  //   if (mysqli_num_rows($resultForSession) === 1) {
 ?>
<html>
<head>
      <title>BOOKINGS</title>
      <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <link rel="stylesheet" type="text/css" href="http://localhost/TRAVO/public/css/hotel/hotel_bookings.css">
    <style> <?php include_once APPROOT.'/public/css/hotel/hotel_repeating_css.css'; ?> </style>
    <style> <?php include_once APPROOT.'/public/css/hotel/hotel_bookings.css'; ?> </style>
    <?php include APPROOT.'/views/repeatable_contents/font.php'; ?>

</head>
<body>
<section class="sign_up-traveler">
      <?php include_once APPROOT.'/views/repeatable_contents/nav_bar_hotel.php';?>
      <style>
      <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_hotel.css'; ?>
      </style>
      <script type="text/javascript" src="<?php echo APPROOT ?>/public/script/repeatable_contents/nav_bar_hotel.js"></script>
      <br>
            <!-- .....................modal box for cutomer details ...................... -->
    <div class="more_traveler_details_modal">
      <div class="more_traveler_details_modal_box">
          <ul>
              <li>Devmini Perera</li>
              <li>devminiperera@gmail.com</li>
              <li>0705758984 0112487075</li>
              <li>No 34, Third Lane</li>
              <li>Gampaha</li>
          </ul>
            <button type="button" name="more_traveler_cancel_btn" class="more_traveler_cancel_btn" id="more_traveler_cancel_btn">DONE</button>
      </div>
      </div>
<!-- .....................end of modal box for cutomer details..................... -->
<center>
        <form>
            <div class="rectangle2">
                <table>
                  <tr>
                    <td><label class = "label" for="dateselect">DATE :</label></td>
                    <div class="calender"></div>
                    <td><input type="date" id="dateselect" name="dateselect" placeholder="yy/mm/dd"></td>
                  </tr>
                 </table>
             </div>
        </form>
         </br>

    <div class="rectangle">
    <table class="b" rules= "none">
                <tr class = "no-bottom-border td">
                    <th class ="b">CHECK-IN</th>
                    <th class ="b">CHECK-OUT</th>
                    <th class ="b">SINGLE ROOMS</th>
                    <th class ="b">DOUBLE ROOMS</th>
                    <th class ="b">FAMILY ROOMS</th>
                    <th class ="b">MASSIVE ROOMS</th>
                    <th class ="b">PRICE</th> </br>
                    <th class ="b">CUSTOMER DETAILS</th> </br>
                  </tr>
                 <tr>
                    <td class ="b"> 2021-09-12 </td>
                    <td class ="b"> 2021-09-15 </td>
                    <td class ="b"> 1 </td>
                    <td class ="b"> 2 </td>
                    <td class ="b"> 0 </td>
                    <td class ="b"> 0 </td>
                    <td class ="b">
                       <div class="price" placeholder="Rs. XXXX">RS. 7000</div>
                    </td>
                    <td class ="b"  >
                       <button class="morebtn">More</button>
                    </td>
                   </tr>
                   <tr>
                    <td class ="b"> 2021-09-12 </td>
                    <td class ="b"> 2021-09-15 </td>
                    <td class ="b"> 1 </td>
                    <td class ="b"> 0 </td>
                    <td class ="b"> 2 </td>
                    <td class ="b"> 0 </td>
                    <td class ="b"  >
                       <div class="price" placeholder="Rs. XXXX">RS. 9000</div>
                    </td>
                    <td class ="b"  >
                       <button class="morebtn">More</button>
                    </td>
                    </tr>
                    <tr>
                    <td class ="b"> 2021-09-12 </td>
                    <td class ="b"> 2021-09-15 </td>
                    <td class ="b"> 0 </td>
                    <td class ="b"> 3 </td>
                    <td class ="b"> 0 </td>
                    <td class ="b"> 1 </td>
                    <td class ="b"  >
                       <div class="price" placeholder="Rs. XXXX">RS. 12000</div>
                    </td>
                    <td class ="b"  >
                        <button class="morebtn">More</button>
                    </td>
                    </tr>
                    <tr>
                    <td class ="b"> 2021-09-12 </td>
                    <td class ="b"> 2021-09-15 </td>
                    <td class ="b"> 1 </td>
                    <td class ="b"> 1 </td>
                    <td class ="b"> 1 </td>
                    <td class ="b"> 1 </td>
                    <td class ="b"  >
                        <div class="price" placeholder="Rs. XXXX">RS. 12000</div>
                    </td>
                    <td class ="b"  >
                        <button class="morebtn">More</button>
                    </td>
                </tr>
                </br>
            </table> </div> </br>

    </section>
<section id="contact_us-section">
      <?php include_once APPROOT.'/views/repeatable_contents/footer.php';?>
      <style> <?php include_once APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
      </section>
      <!--JS file for cutomer details-->
      <script src="<?php echo APPROOT ?>/public/script/hotel/hotel_booking.js"></script>
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
