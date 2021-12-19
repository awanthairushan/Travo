<?php
 /* session_start();
  if(isset($_SESSION['username'])) {
    include '../../db/db_connection.php';
    $temp = $_SESSION['username'];
    $sqlForSession = "SELECT username FROM admin WHERE username = '$temp'";
    $resultForSession = mysqli_query($con, $sqlForSession);
    if (mysqli_num_rows($resultForSession) === 1) {*/
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php


?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRIPS</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_trips.css">
    <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_repeating_css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>        
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<section class="admin-trips">
    <!--Start Navigation bar-->
    <?php include_once  APPROOT.'/views/repeatable_contents/nav_bar_admin.php';?>
      <style> <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_admin.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo APPROOT ?>/public/script/repeatable_contents/nav_bar_admin.js"></script>
    <!--End Navigation bar-->


    <!-- .....................modal box for cutomer details ...................... -->
    <div class="more_traveler_details_modal">
      <div class="more_traveler_details_modal_box">
          <ul>
              <li>Awantha Irushan ranaweera</li>
              <li>avanthairushan@gmail.com</li>
              <li>0716113769 0332251380</li>
              <li>499/2, kudabollatha</li>
              <li>ganemulla</li>
          </ul>
            <button type="button" name="more_traveler_cancel_btn" class="more_traveler_cancel_btn" id="more_traveler_cancel_btn">DONE</button>
      </div>
      </div>
<!-- .....................ebd of modal box for cutomer details..................... -->
<div class="middle">
    <!--Start "New Trips" table-->
    <h1 class="heading-one">NEW TRIPS</h1>
        <!--Start search option-->
        <div class = "search_div">
            <label for="filter" class="filter-labels">SEARCH BY :</label>
            <select name="filter" id="filter" class="filter-input">
                <option value="vnumber">TRIP ID</option>
                <option value="vnumber">START DATE</option>
            </select>
            <input type="text" name="search" id="search" class="search-input" placeholder="Enter Value"><br>
        </div>
            <!--End search option-->

    <div class="table">
        <table class="content_table" id="conn_table" >
            <thead>
                <tr>
                    <th>TRIP ID</th>
                    <th>START DATE</th>
                    <th>END DATE</th>
                    <th>TRIP DETAILS</th>
                    <th>CUSTOMER DETAILS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>P_12</td>
                    <td>2021-10-25</td>
                    <td>2021-10-26</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                </tr>
                <tr>
                    <td>L_67</td>
                    <td>2021-11-15</td>
                    <td>2021-11-17</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                </tr>
                <tr>
                    <td>L_90</td>
                    <td>2021-12-25</td>
                    <td>2021-12-28</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                </tr>
                <tr>
                    <td>P_34</td>
                    <td>2021-08-15</td>
                    <td>2021-08-20</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                </tr>
                <tr>
                    <td>C_23</td>
                    <td>2021-08-14</td>
                    <td>2021-08-20</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--End "New Trips" table-->

    <!--Start "Paid Trips" table-->
    <h1 class="heading-one"><br />Paid TRIPS</h1>
        <!--Start search option-->
        <div class = "search_div">
            <label for="filter" class="filter-labels">SEARCH BY :</label>
            <select name="filter" id="filter" class="filter-input">
                <option value="vnumber">TRIP ID</option>
                <option value="vnumber">START DATE</option>
            </select>
            <input type="text" name="search" id="search" class="search-input" placeholder="Enter Value"><br>
        </div>
        <!--End search option-->

    <div class="table">
        <table class="content_table different_content_table" id="conn_table" >
            <thead>
                <tr>
                    <th>TRIP ID</th>
                    <th>START DATE</th>
                    <th>END DATE</th>
                    <th>TRIP DETAILS</th>
                    <th>CUSTOMER DETAILS</th>
                    <th>COMPLETE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>L_86</td>
                    <td>2021-08-15</td>
                    <td>2021-08-20</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                    <td><input type="button" id="completedbtn" value="COMPLETED"></td>
                </tr>
                <tr>
                    <td>C_33</td>
                    <td>2021-11-15</td>
                    <td>2021-11-17</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                    <td><input type="button" id="completedbtn" value="COMPLETED"></td>
                </tr>
                <tr>
                    <td>P_128</td>
                    <td>2021-08-15</td>
                    <td>2021-08-20</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                    <td><input type="button" id="completedbtn" value="COMPLETED"></td>
                </tr>
                <tr>
                    <td>L_78</td>
                    <td>2021-10-25</td>
                    <td>2021-10-26</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                    <td><input type="button" id="completedbtn" value="COMPLETED"></td>
                </tr>
                <tr>
                    <td>C_34</td>
                    <td>2021-10-25</td>
                    <td>2021-10-26</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                    <td><input type="button" id="completedbtn" value="COMPLETED"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--End "Paid Trips" table-->

    <!--Start "Completed Trips" table-->
    <h1 class="heading-one"><br />COMPLETED TRIPS</h1>
        <!--Start search option-->
        <div class = "search_div">
            <label for="filter" class="filter-labels">SEARCH BY :</label>
            <select name="filter" id="filter" class="filter-input">
                <option value="vnumber">TRIP ID</option>
                <option value="vnumber">START DATE</option>
            </select>
            <input type="text" name="search" id="search" class="search-input" placeholder="Enter Value"><br>
        </div>    
        <!--End search option-->

    <div class="table">
        <table class="content_table" id="conn_table" >
            <thead>
                <tr>
                    <th>TRIP ID</th>
                    <th>START DATE</th>
                    <th>END DATE</th>
                    <th>TRIP DETAILS</th>
                    <th>CUSTOMER DETAILS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>P_45</td>
                    <td>2021-09-15</td>
                    <td>2021-09-20</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                </tr>
                <tr>
                    <td>L_66</td>
                    <td>2021-07-25</td>
                    <td>2021-07-27</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                </tr>
                <tr>
                    <td>L_67</td>
                    <td>2021-06-15</td>
                    <td>2021-06-26</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE"class="morebtn_traveler_details"></td>
                </tr>
                <tr>
                    <td>C_90</td>
                    <td>2021-08-15</td>
                    <td>2021-08-20</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                </tr>
                <tr>
                    <td>C_23</td>
                    <td>2021-04-13</td>
                    <td>2021-04-14</td>
                    <td><input type="button" id="morebtn" value="MORE" onclick="window.location.href='../../pages/admin/admin_trip_details.php'"></td>
                    <td><input type="button" id="morebtn" value="MORE" class="morebtn_traveler_details"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--End "Completed Trips" table-->
</div>

<!--<script src="../../JS/filter.js"></script>-->
</section>
 <!--JS file for cutomer details-->
 <script src="../../../public/script/admin/admin_trips.js"></script>
</body>
</html>
<?php
 /* } else{
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
}else{
  header("location: ../../index.html");
  exit();
}*/
 ?>
