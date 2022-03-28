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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <style> <?php include APPROOT.'/public/css/traveler/traveler_update.css'; ?> </style>
    <style> <?php include APPROOT.'/public/css/traveler/traveler_repeating_css.css'; ?> </style>
    <!-- defer indicate that script is executed after the document has been parsed -->
    <?php
      // $result = require '../../db/traveler/traveler_updateprofile.php';
      include APPROOT.'/views/repeatable_contents/font.php';      
    ?>
  </head>
  <body>
    <section class="sign_up-traveler">
      <?php include APPROOT.'/views/repeatable_contents/nav_bar_traveler.php';?>
      <style> <?php include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; ?>  </style>
      <script type="text/javascript" src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>
      
      <div class="pageheading">UPDATE</div>
      <div class="box-sign_up-traveler">

<form class="form-sign_up-traveler" id="form-sign_up-traveler" action="updateTravelerProfile" method="post">
  <?php
        if (isset($_GET['error'])) { ?>
          <p class="error-log_in"><?php echo $_GET['error']; ?></p>
        <?php }   
  ?>
  <?php
    while ($rows = mysqli_fetch_array($this->isTraveler)){
      $id=$rows['travelerID'];
      $name=$rows['name'];
      $address1=$rows['address_line1'];
      $address2=$rows['address_line2'];
      $city=$rows['city'];
      $email=$rows['email'];
      $contact1=$rows['contact1'];
      $contact2=$rows['contact2'];
      $password=$rows['password'];

  }
  ?>
  <div class="form-control">
    <label for="name">Name</label>
    <input class="text-form-sign_up-traveler" type="text" name="name" id="name" value="" placeholder="<?php echo $name; ?>"><br>
    <span class="error-msg"></span>
  </div>

  <br>

  <div class="form-control">
    <label for="email">Email Address</label>
    <input class="text-form-sign_up-traveler" type="email" name="email" id="email" value=""  placeholder="<?php echo $email; ?>"><br>
    <span class="error-msg"></span>
  </div>

  <br>

  <div class="form-control">
    <label for="contact">Contact Number</label>
    <input class="text-small-form-sign_up-traveler" type="number" name="contact2" id="contact2" value="" placeholder="<?php echo $contact2; ?>">
    <input class="text-small-form-sign_up-traveler" type="number" name="contact1" id="contact1" value="" placeholder="<?php echo $contact1; ?>"><br>
    <span class="error-msg"></span>
  </div>

  <br>

  <div class="form-control">
    <label for="password">Password</label>
    <input class="text-small-form-sign_up-traveler" type="password" name="retype-password" id="retype-password" value="" placeholder=" Confirm password" >
    <div class="tooltip">
      <span class="tooltiptext">*Please enter a password between 8 to 15 characters which contains at least one uppercase letter and one special character</span>
      <input class="text-small-form-sign_up-traveler" type="password" name="password" id="password" value=""><br>
    </div>
    <span class="error-msg"></span>
  </div>

  <br>

  <div class="form-control">
    <label for="adress">Address</label>
    <input class="text-form-sign_up-traveler" type="text" name="address-line1" id="address-line1" placeholder="<?php echo $address1; ?>" value=""  ><br>
    <input class="text-form-sign_up-traveler" type="text" name="address-line2" id="address-line2" placeholder="<?php echo $address2 ?>" value=""  ><br>
    <input class="text-form-sign_up-traveler" type="text" name="city" id="city" placeholder="<?php echo $city; ?>" value=""  ><br>
    <span class="error-msg"></span>
  </div>

    </form>
    </div>
    <div class="buttons-sign_up-traveler">
      <input type="button" class="refreshbtn" value="REFRESH" onclick="window.location.reload();">
      <input type="submit" form="form-sign_up-traveler" class="submitbtn" value="UPDATE" name="submitbtn" id="submitbtn">
    </div>
    </section>
    <section id="contact_us-section">
      <?php include APPROOT.'/views/repeatable_contents/footer.php';?>
      <style> <?php include APPROOT.'/public/css/repeatable_contents/footer.css'; ?>  </style>
    </section>
    <script src="<?php echo URLROOT ?>/public/script/traveler/traveler_update.js"></script>
    <!--<script src="../../script/unregistered/sign_up-traveler.js"></script>-->
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