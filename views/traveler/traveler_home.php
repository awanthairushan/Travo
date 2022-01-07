<?php
  session_start();
  if(isset($_SESSION['username'])) {
  //   include '../../db/db_connection.php';
  //   $temp = $_SESSION['username'];
  //   $sqlForSession = "SELECT travelerID FROM travelers WHERE email = '$temp'";
  //   $resultForSession = mysqli_query($con, $sqlForSession);
  //   if (mysqli_num_rows($resultForSession) === 1) {
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <style> <?php include APPROOT.'/public/css/traveler/traveler_home.css'; ?> </style>
    <style> <?php include APPROOT.'/public/css/traveler/traveler_repeating_css.css'; ?> </style>
    <?php include APPROOT.'/views/repeatable_contents/font.php'; ?>
  </head>
  <body>

    <section class = "home-watermark_and_started-section">
      <?php include APPROOT.'/views/repeatable_contents/nav_bar_traveler.php';?>
      <style> <?php include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; ?>  </style>
      <script type="text/javascript" src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>
      <br>
      <p class = "watermark">TRAVO.lk</p>
      </div>


    <div class="container" id="containerstart">
            <div class="details">

              <!-- toogle -->
              <input type="checkbox" id="switch">
              <div class="app">
                  <div class="selecttype">
                      <label for="switch">
                      <div class="toggle_select"></div>
                      <div class="names">
                          <p class="planning">PLAN</p>
                          <p class="upcoming">UPCOMING</p>
                      </div>
                      </label>
                  </div>
              </div>
              <!-- end of the toggle -->

              <form class="" action="traveler/planTrip" method="post">
                <table class="main">
                      <tr>
                          <th class="trow heading">PEOPLE COUNT</th>
                          <th class="trow heading">DATE</th>
                          <th class="trow heading">CATEGORY</th>
                      </tr>
                      <tr>
                          <td class="trow"><input type="number" id="peoplecount" name="peoplecount" ></td>
                          <td class="trow to"><input type="date" id="startdate" name="startdate"><span class="select-to">to</span><input type="date" id="enddate" name="enddate"></td>
                          <td class="trow"><select name="category" id="category">
                              <option selected>Select Category</option>
                              <option value="pilgrimage">Pilgrimage</option>
                              <option value="cultural">Cultural</option>
                              <option value="leisure">Leisure</option>
                              </select>
                          </td>
                  </table>
                  <button id="nextbtn" class="nextbtn" onclick="window.location.href='traveler/planTrip'">NEXT</button>
                </form>
            </div>
        </div>
    </section>

<!--__________________about_us________________-->
    <section id="about_us-section">
      <?php include APPROOT.'/views/repeatable_contents/about_us.php';?>
      <style> <?php include APPROOT.'/public/css/repeatable_contents/about_us.css'; ?>  </style>
      <script type="text/javascript" src="http://localhost/TRAVO/public/script/repeatable_contents/about_us.js"></script>
      <br>
    </section>
<!--__________________END about_us________________-->

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
}else{
  header("location: http://localhost/TRAVO");
  exit();
}
 ?>
