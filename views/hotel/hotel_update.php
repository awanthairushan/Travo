<?php
  // session_start();
  // if(isset($_SESSION['username'])) {
  //   include '../../db/db_connection.php';
  //   $temp = $_SESSION['username'];
  //   $sqlForSession = "SELECT hotelID FROM hotels WHERE email = '$temp'";
  //   $resultForSession = mysqli_query($con, $sqlForSession);
  //   if (mysqli_num_rows($resultForSession) === 1) {
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UPDATE</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <style> <?php include_once APPROOT.'/public/css/hotel/hotel_update.css'; ?> </style>
    <style> <?php include_once APPROOT.'/public/css/css/hotel/hotel_repeating_css.css'; ?> </style>
    <!-- <?php
      // $result = require '../../db/hotel/hotel_updateprofile.php';
    ?> -->
  </head>
  <body>
    <section class="sign_up-traveler">
    <?php include_once APPROOT.'/views/repeatable_contents/nav_bar_hotel.php';?>
      <style> 
      <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_hotel.css'; ?>
    </style>
      <script type="text/javascript" src="<?php echo APPROOT ?>/public/script/repeatable_contents/nav_bar_hotel.js"></script>
      <div class="box-sign_up-traveler">
        
      <form class="form-sign_up-traveler" id = "sign_up_form-hotel" action="/views/hotel/hotel_updateprofile.php" method="post">
         
          <label for="name">Hotel Name</label> <input class="text-form-sign_up-traveler" type="text" name="name" id="name" value="" placeholder="<?php echo $name ?>"><br>
          <br>
          
          <label for="hotel_type">Hotel type</label><select class="drop-down-form-sign_up-traveler" name="hotel_type-type" id="hotel_type-type">
          <option value="Deluxe">Deluxe</option>
          <option value="Luxury">Luxury</option>
          <option value="Superior">Superior</option>
          <option value="Standard">Standard</option>
          </select><br>
          <br>

          <label for="regNO">Registration Number</label> <input class="text-form-sign_up-traveler" type="text" name="regNO" id="regNO" value="" placeholder="<?php echo $regNo ?>" readonly><br>
          <br>

          <label for="licenceNo">Licence Number</label> <input class="text-form-sign_up-traveler" type="text" name="licenceNo" id="licenceNo" value="" placeholder="<?php echo $licenceNo ?>"><br>
          <br>

          <label for="adress">Address</label> <input class="text-form-sign_up-traveler" type="text" name="address-line1" id="address-line1" placeholder="<?php echo $address1 ?>"><br>
          <br>
          <input class="text-form-sign_up-traveler" type="text" name="address-line2" id="address-line2" placeholder="<?php echo $address2 ?>"><br>
          <br>
          <input class="text-form-sign_up-traveler" type="text" name="city" id="city" placeholder="<?php echo $city ?>"><br>
          <br>

          <label for="location">Location</label> <input class="text-form-sign_up-traveler" type="url" name="location" id="location" placeholder="<?php echo $location ?>"><br>
          <br>

          <label for="contact">Contact Number</label> <input class="text-small-form-sign_up-traveler" type="text" name="contact2" id="contact2" value="" placeholder="<?php echo $contact2 ?>"><input class="text-small-form-sign_up-traveler" type="text" name="contact1" id="contact1" value="" placeholder="<?php echo $contact1 ?>"><br>
          <br>
          
          <label for="email">Email Address</label> <input class="text-form-sign_up-traveler" type="text" name="email" id="email" value="" placeholder="<?php echo $email ?>"><br>
          <br>

          <label for="password">Password</label> <input class="text-small-form-sign_up-traveler" type="password" name="retype-password" id="retype-password" placeholder=" Confirm password"><input class="text-small-form-sign_up-traveler" type="password" name="password" id="password" value="" placeholder=" New password"><br>
          <br>

          <label for="description">Description</label><textarea class="description-form-hotel" id="description" name="description" rows="8" cols="80" placeholder="<?php echo $description ?>"></textarea><br>
          <br><br><br>

          <div class="form-control">
          <label for="web">Website URL</label> 
          <div class="tooltip">
          <span class="tooltiptext">*Please enter your website URL if a website is available</span>
          <input class="text-form-sign_up-traveler" type="text" name="web" id="web" value=""  placeholder="<?php echo $webUrl ?>"></br>
          <br>
          </div>
            <span class="error-msg"></span>
          </div>

        <!--  <label for="images">Input Images</label> <input type="file" class="images-small-form-sign_up-traveler" name="images" id="images" multiple=""><br>
          <br>-->

          <label for="rep_name">Representative's Name</label> <input class="text-form-sign_up-traveler" type="text" name="rep_name" id="rep_name" value="" placeholder="<?php echo $repName ?>"><br>
          <br>

          <label for="rep_email">Email Address</label> <input class="text-form-sign_up-traveler" type="text" name="rep_email" id="rep_email" value="" placeholder="<?php echo $repEmail ?>"><br>
          <br>

          <label for="rep_contact">Contact Number</label> <input class="text-small-form-sign_up-traveler" type="text" name="rep_contact2" id="rep_contact2" value="" placeholder="<?php echo $repContact2 ?>"><input class="text-small-form-sign_up-traveler" type="text" name="rep_contact1" id="rep_contact1" value="" placeholder="<?php echo $repContact1 ?>"><br>
          <br>


   <!--     <table class="room_details-form-sign_up-hotel">
                 <tr>
                     <th id="first_column_room_details-form-sign_up-hotel">Room type</th>
                     <th>Persons</th>
                     <th>Rooms</th>
                     <th>Minibar</th>
                     <th>Food include</th>
                     <th>A/C</th>
                     <th>Price</th>
                   </tr>
                  <tr>
                      <td id="first_column_room_details-form-sign_up-hotel">Single Room </td>
                      <td>1</td>
                      <td><input type="number" id="single_room_count" name="single_room_count"></td>
                      <td><input type="checkbox" id="single_room_minibar" name="single_room_minibar"></td>
                      <td><input type="checkbox" id="single_room_food" name="single_room_food"></td>
                      <td><input type="checkbox" id="single_room_ac" name="single_rooom_ac"></td>
                      <td><input type="text" id="single_room_price" name="single_room_price" placeholder="0.00"></td>
                    </tr>
                    <tr>
                      <td id="first_column_room_details-form-sign_up-hotel">Double Room </td>
                      <td>2</td>
                      <td><input type="number" id="double_room_count" name="double_room_count"></td>
                      <td><input type="checkbox" id="double_room_minibar" name="double_room_minibar" ></td>
                      <td><input type="checkbox" id="double_room_food" name="double_room_food"></td>
                      <td><input type="checkbox" id="double_room_ac" name="double_rooom_ac"></td>
                      <td><input type="text" id="double_room_price" name="double_room_price" placeholder="0.00"></td>
                    </tr>
                    <tr>
                      <td id="first_column_room_details-form-sign_up-hotel">Family Room </td>
                      <td>4</td>
                      <td><input type="number" id="family_room_count" name="family_room_count"></td>
                      <td><input type="checkbox" id="family_room_minibar" name="family_room_minibar"></td>
                      <td><input type="checkbox" id="family_room_food" name="family_room_food"></td>
                      <td><input type="checkbox" id="family_room_ac" name="family_rooom_ac"></td>
                      <td><input type="text" id="family_room_price" name="family_room_price" placeholder="0.00"></td>
                    </tr>
                    <tr>
                      <td id="first_column_room_details-form-sign_up-hotel">Massive Room </td>
                      <td><input type="number" id="massive_room_capacity" name="massive_room_capacity"></td>
                      <td><input type="number" id="massive_room_count" name="massive_room_count"></td>
                      <td><input type="checkbox" id="massive_room_minibar" name="massive_room_minibar"></td>
                      <td><input type="checkbox" id="massive_room_food" name="massive_room_food"></td>
                      <td><input type="checkbox" id="massive_room_ac" name="massive_rooom_ac"></td>
                      <td><input type="text" id="massive_room_price" name="massive_room_price" placeholder="0.00"></td>
                    </tr>
                 </tr>
               </table>-->
               <br>
  </form>
      </div>
      <div class="buttons-sign_up-traveler">
        <input type="button" class="refreshbtn" value="REFRESH" onclick="window.location.reload();">
        <input name="submit" id="submit" type="submit" class="submitbtn" value="UPDATE" onclick="" form = "sign_up_form-hotel">
      </div>
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
