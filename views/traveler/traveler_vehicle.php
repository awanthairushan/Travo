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
      <title>VEHICLES</title>
      <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
        <style> <?php include APPROOT.'/public/css/traveler/traveler_vehicle.css'; ?> </style>
        <style> <?php include APPROOT.'/public/css/traveler/traveler_repeating_css.css'; ?> </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include APPROOT.'/views/repeatable_contents/font.php'; ?>
    </head>
    <body>
        <section class="uppersection">
            <?php include APPROOT.'/views/repeatable_contents/nav_bar_traveler.php';?>
            <style> <?php include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; ?>  </style>
            <script type="text/javascript" src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>
            <div class="pageheading">VEHICLES</div>
            <button id="filterbtn" class="filterbtn">ADD FILTER</button>
            <div class="content">
                <form class="filter_form">
                  <table class="filter_table">
                    <tr>
                      <td>
                        <select class="type" id="vehicletype" onchange="filterVValue()">
                            <option value="all">All types</option>
                            <?php
                              while($types = mysqli_fetch_array($this->vehicleType)){
                                  echo '<option value="'.$types['type'].'">'.$types['type'].'</option>';
                                }
                            ?>
                        </select>
                      </td>
                      <td>
                        <select class="seats" id="seats" onchange="filterVValue()">
                            <option value="all">Any Seats</option>
                            <?php

                              while($seats = mysqli_fetch_array($this->seats)){
                                echo '<option value="'.$seats['no_of_passengers'].' seats">'.$seats['no_of_passengers'].'</option>';
                              }
                            ?>
                        </select>
                      </td>
                      <td>
                        <select class="area" id="area" onchange="filterVValue()">
                            <option value="all">Sri Lanka</option>
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
                      </td>
                      <td>
                        <select class="AC" id="AC" onchange="filterVValue()">
                            <option value="all">A/C Any</option>
                            <option value="With A/C">A/C</option>
                            <option value="Non A/C">Non A/C</option>
                        </select>
                      </td>
                    </tr>
                  </table>
                  <div name="filtersubmitbtn"  class="filtersubmitbtn">OK</div>
            </form>
            <div class="vehicledetails_div">
              <!-- <table class="vehicledetails"> -->
                  <!-- vehicle 1 -->
                  <!-- <tr>
                      <th colspan="5" class="vehicleType">Toyota Prius 4th Generation</th>
                  </tr>
                  <tr class="detail">
                      <td class="trow">Car<br/>With A/C<br/>5 seats<br/>with/without Driver<br/>LKR.50 per km</td>
                      <td class="trow"><img class="vimg" src="../../images/Sample_images/for_vehicles/car2.jpg"></td>
                      <td class="trow">Mr.Kamal Ranasinghe<br/>kamal@gmail.com<br/>0710000000/0332200000<br/>Gampaha<br/>LKR.1000.00 for a driver</td>
                  </tr>
              </table> -->

              <?php  
              
                while($rows = mysqli_fetch_array($this->vehicles)){

                  if($rows['ac']=="yes"){
                    $ac="With A/C";
                  }else{
                    $ac="Non A/C";
                  }

                  echo '<div class="vtable">
                  <!-- vehicle details -->
                  <div class="vdetails">Toyota Prius 4th Generation</div>
                  <div class="vdetails">
                    <dl>
                      <dt class="vspecs vtype">'.$rows['type'].'</dt>
                      <dt class="vspecs vac">'.$ac.'</dt>
                      <dt class="vspecs vpassengers">'.$rows['no_of_passengers'].' seats</dt>
                      <dt class="vspecs">'.$rows['driver_type'].'</dt>
                      <dt class="vspecs">LKR.'.$rows['price_for_1km'].' per km</dt>
                    </dl>
                  </div>
                  <div class="vdetails"><img class="vimg" src="http://localhost/TRAVO/public/images/Sample_images/for_vehicles/car2.jpg"></div>
                  <div class="vdetails">
                    <dl>
                      <dt class="vspecs">Mr.'.$rows['owner_name'].'</dt>
                      <dt class="vspecs">'.$rows['email'].'</dt>
                      <dt class="vspecs">'.$rows['contact1'].'/'.$rows['contact2'].'</dt>
                      <dt class="vspecs vareatype">'.$rows['city'].'</dt>
                      <dt class="vspecs">LKR.'.$rows['driver_charge'].' for a driver</dt>
                    </dl>
                  </div>
                </div>';
                }

              ?>
            </div>
        </section>
        <script type="text/javascript" src="http://localhost/TRAVO/public/script/traveler/traveler_vehicle.js"></script>
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
