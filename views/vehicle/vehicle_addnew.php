<?php
  // session_start();
  // if(isset($_SESSION['username'])) {
  //     include '../../db/db_connection.php';
  //     $temp = $_SESSION['username'];
  //     $sqlForSession = "SELECT owner_id FROM vehicle_owners WHERE email = '$temp'";
  //     $resultForSession = mysqli_query($con, $sqlForSession);
  //     if (mysqli_num_rows($resultForSession) === 1) {
 ?> 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD NEW</title>
    <style> <?php include APPROOT . '/public/css/vehicle/vehicle_addnew.css'; ?> </style>
    <style> <?php include APPROOT . '/public/css/unregistered/repeating_css.css'; ?> </style>
    <link rel="icon" href="<?php echo URLROOT ?>/public/images/icons/favicon.ico"> 
    <?php include APPROOT . '/views/repeatable_contents/font.php'; ?> 
  </head>
  <body>
    <section class="sign_up-traveler">
      <?php include APPROOT . '/views/repeatable_contents/nav_bar_vehicle.php';?>
      <style> <?php include APPROOT . '/public/css/repeatable_contents/nav_bar_vehicle.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_vehicle.js"></script>
  
    
    <div class="box-sign_up-traveler">
        <form class="form-sign_up-traveler" id="signup_form_vehicle" action="../../php/vehicle/add_new_vehicle.php" method="POST">
         <!-- <label for="name">Name</label>
            <input class="text-form-sign_up-traveler" type="text" name="owner_name" id="owner_name" placeholder=""><br>
          <br>
          <label for="email">Email Address</label>
            <input class="text-form-sign_up-traveler" type="text" name="email" id="email" placeholder=""><br>
          <br>
          <label for="contact">Contact Number</label>
            <input class="text-small-form-sign_up-traveler" type="text" name="contact2" id="contact2" placeholder="">
            <input class="text-small-form-sign_up-traveler" type="text" name="contact1" id="contact1" placeholder=""><br>
          <br>
          <label for="password">Password</label>
            <input class="text-small-form-sign_up-traveler" type="password" name="password2" id="password2" placeholder="retype-password">
            <input class="text-small-form-sign_up-traveler" type="password" name="password1" id="password1" placeholder=""><br>
          <br>-->
          <div class="form_input">
          <br><br><label for="city">Location</label>
          <select class="select-form-sign_up-traveler" name="city">
                            <option value="All Sri Lanka">Sri Lanka</option>
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
          <br><br>
          </div>

          <div class="form_input">
          <label for="vehicle-no">Vehicle Number</label>
            <input class="text-form-sign_up-traveler" type="text" name="vehicle_no" id="vehicle_no" placeholder=""><br>
          <br>
          </div>

          <div class="form_input">
          <label for="vehicle">Vehicle</label>
            <input class="text-small-form-sign_up-traveler" type="text" name="no_of_passengers" id="no_of_passengers" placeholder=" No of passengers">
            <input class="text-small-form-sign_up-traveler" type="text" name="type" id="type" placeholder=" Type"><br>
          <br>
          </div>

          <div class="form_input">
          <label for="price">Price</label>
            <input class="text-small-form-sign_up-traveler" type="text" name="price_for_day" id="price_for_day" placeholder=" Price for day">
            <input class="text-small-form-sign_up-traveler" type="text" name="price_for_1km" id="price_for_1km" placeholder=" Price for 1km"><br>
          <br>
          </div>

          <div class="form_input">
          <label for="driver">Driver</label> <input class="text-small-form-sign_up-traveler" type="text" name="driver_charge" id="driver_charge" placeholder=" Driver charges for a day">
          <select class="drop-down-form-sign_up-traveler" type="driver-type" name="driver_type" id="driver_type">
              <option value="with-driver">With Driver</option>
              <option value="without-driver">Without Driver</option>
              <option value="with-without-driver">With or Without Driver</option>
          </select><br>
          <br>
          </div>

          <label for="ac">A/C</label><input class="ac-checkbox-form-sign_up-traveler" type="checkbox" name="ac" id="ac" value="yes"> <span></span> <br><br>
 
          <div class="form-control">
            <label for="images">Input Image</label> 
            <input type="file" class="img-form-sign_up-traveler" name="images" id="image-small-form-sign_up-traveler" ></br><br>
            <span class="error-msg"></span>
          </div><br>

          <input class="tc-checkbox-form-sign_up-traveler" type="checkbox" name="tc" id="tc" value="yes"><label id="tc-label-form-sign_up-traveler" for="tc">I agree to all the <a href="../../pages/unregistered/tc.php">Terms & Conditions</a> of travo.lk</label>
        
        </form>
      </div>
      <div class="buttons-sign_up-traveler">
          <input type="button" class="refreshbtn" value="REFRESH" onclick="window.location.reload();">
          <input type="submit" form="signup_form_vehicle" class="submitbtn" name="submitbtn" id="submitbtn" value="SUBMIT">
      </div>
    </section>

    
<!--__________________contact_us________________-->
  
<section id="contact_us-section">
        <?php include APPROOT . '/views/repeatable_contents/footer.php';?>
        <style> <?php include APPROOT . '/public/css/repeatable_contents/footer.css'; ?>  </style>
  </section>

<!--__________________END contact_us________________-->

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
