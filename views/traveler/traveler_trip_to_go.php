<?php
  // session_start();
  // if(isset($_SESSION['username'])) {
  //   include '../../db/db_connection.php';
  //   $temp = $_SESSION['username'];
  //   $sqlForSession = "SELECT travelerID FROM travelers WHERE email = '$temp'";
  //   $resultForSession = mysqli_query($con, $sqlForSession);
  //   if (mysqli_num_rows($resultForSession) === 1) {
 ?>
<html>
    <head>
        <title>MY TRIPS</title>
        <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
        <style> <?php include APPROOT.'/public/css/traveler/traveler_trip_to_go.css'; ?> </style>
        <style> <?php include APPROOT.'/public/css/traveler/traveler_repeating_css.css'; ?> </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include APPROOT.'/views/repeatable_contents/font.php'; ?>
    </head>
    <body>
        <section class="uppersection">
            <?php include APPROOT.'/views/repeatable_contents/nav_bar_traveler.php';?>
            <style> <?php include APPROOT.'/public/css/repeatable_contents/nav_bar_traveler.css'; ?>  </style>
            <script type="text/javascript" src="http://localhost/TRAVO/public/script/repeatable_contents/nav_bar_traveler.js"></script>

            <div class="delete_trip_modal">
              <div class="deleteTrip_confirm_box">
                    <h3>Delete Trip</h3>
                    <hr>
                    <p>There is no recovery option. Are you sure you want to delete this trip ?</p>
                    <hr>
                    <button type="button" name="deleteTrip_confirm_btn" class="deletetrip_confirm_btn" id="deleteTrip_confirm_btn">DELETE TRIP</button>
                    <button type="button" name="deleteTrip_cancel_btn" class="deleteTrip_cancel_btn" id="deleteTrip_cancel_btn">CANCEL</button>
              </div>
              </div>

            <div class="content">
                <div class="trips">
                <div class="slide trip1">
                    <div class="row1">
                        <div class="prev" onclick="plusSlides(-1)"></div>
                        <div class="topic">TRIP TO GO</div>
                        <div class="next" onclick="plusSlides(1)"></div>
                    </div>
                    <div class="cols2">
                        <div class="tripdetail t1"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"><dl class=""> <dt>Kandy</dt> <dt>Mathale</dt> <dt>Dambulla</dt> <dt>2021-11-02</dt></dl><button onclick="window.location.href='savedBudget'" id="selecttrip">READ MORE</button></div>
                        <div class="tripdetail t2"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"><dl class=""> <dt>Anuradhapura</dt> <dt>Trincomalee</dt> <dt>Jaffna</dt> <dt>2021-10-25</dt></dl><button onclick="window.location.href='savedBudget'" id="selecttrip">READ MORE</button></div>

                        <div class="tripdetail t3"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"><dl class=""> <dt>Mathale</dt> <dt>Badulla</dt> <dt>Nuwara-Eliya</dt> <dt>2022-01-05</dt></dl><button onclick="window.location.href='savedBudget'" id="selecttrip">READ MORE</button></div>
                        <div class="tripdetail t4"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"><dl class=""> <dt>Matara</dt> <dt>Galle</dt> <dt>Kataragama</dt> <dt>2021-12-15</dt></dl><button onclick="window.location.href='savedBudget'" id="selecttrip">READ MORE</button></div>
                    </div>
                </div>

                <div class="slide trip2">
                    <div class="row1">
                        <div class="prev" onclick="plusSlides(-1)"></div>
                        <div class="topic">SAVED</div>
                        <div class="next" onclick="plusSlides(1)"></div>
                    </div>
                    <div class="cols2">
                        <div class="tripdetail t1"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"><dl class=""> <dt>Jaffna</dt> <dt>Nuwara Eliya</dt> <dt>Gampaha</dt> <dt>2021-11-12 </dt></dl><button onclick="window.location.href='savedBudget'" id="selecttrip">READ MORE</button></div>
                        <div class="tripdetail t2"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"><dl class=""> <dt>Kilinochchi</dt> <dt>Batticaloa</dt> <dt> Monaragala</dt> <dt>2021-11-15</dt></dl><button onclick="window.location.href='savedBudget'" id="selecttrip">READ MORE</button></div>
                        <div class="tripdetail t3"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"><dl class=""> <dt>Kurunegala</dt> <dt>Mannar</dt> <dt> Puttalam</dt> <dt>2021-11-19</dt></dl><button onclick="window.location.href='savedBudget'"id="selecttrip">READ MORE</button></div>
                        <div class="tripdetail t4"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"><dl class=""> <dt>Matara</dt> <dt>Galle</dt> <dt>Kataragama</dt> <dt>2021-12-15</dt></dl><button onclick="window.location.href='savedBudget'" id="selecttrip">READ MORE</button></div>
                    </div>
                </div>

                <div class="slide trip3">
                    <div class="row1">
                        <div class="prev" onclick="plusSlides(-1)"></div>
                        <div class="topic">COMPLETED</div>
                        <div class="next" onclick="plusSlides(1)"></div>
                    </div>
                    <div class="cols2">
                        <div class="tripdetail t1"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"><dl class=""> <dt>Matara</dt> <dt>Galle</dt> <dt>Colombo</dt> <dt>2021-12-09</dt></dl><button onclick="window.location.href='savedBudget'" id="selecttrip">READ MORE</button></div>
                        <div class="tripdetail t2"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"><dl class=""> <dt>Kandy</dt> <dt>Nuwara Eliya</dt> <dt>Anuradhapura</dt> <dt>2021-11-20</dt></dl><button onclick="window.location.href='savedBudget'" id="selecttrip">READ MORE</button></div>

                        <div class="tripdetail t3"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"><dl class=""> <dt>Galle</dt> <dt>Ratnapura</dt> <dt>Kandy</dt> <dt>2022-06-06</dt></dl><button onclick="window.location.href='savedBudget'" id="selecttrip">READ MORE</button></div>
			            <div class="tripdetail t4"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"><dl class=""> <dt>Colombo</dt> <dt>Gampaha</dt> <dt>Kegalle</dt> <dt>2021-12-23</dt></dl><button onclick="window.location.href='savedBudget'" id="selecttrip">READ MORE</button></div>
                    </div>
                </div>
                </div>
            </div>
              <script type="text/javascript" src="http://localhost/TRAVO/public/script/traveler/traveler_trip_to_go.js"></script>
        </section>
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
// }else{
//   header("location: ../../index.html");
//   exit();
// }
 ?>
