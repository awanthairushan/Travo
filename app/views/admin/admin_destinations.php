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
    <title>DESTINATIONS</title>
    <link rel="icon" href="../../../public/images/icons/favicon.ico">
    <link rel="stylesheet" href="../../../public/css/admin/admin_destinations.css">
    <link rel="stylesheet" href="../../../public/css/admin/admin_repeating_css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>        
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">
<!--abcdef-->
</head>
<body>
<section class="admin-destinations">
    <!--Start Navigation bar-->
    <?php include '../repeatable_contents/nav_bar_admin.php';?>
      <style> <?php include '../../../public/css/repeatable_contents/nav_bar_admin.css'; ?>  </style>
      <script type="text/javascript" src="../../../public/script/repeatable_contents/nav_bar_admin.js"></script>
    <!--End Navigation bar-->

<div class="main">
    <h1 class="heading-one">MANAGE DESTINATIONS & VISITING PLACES</h1>
<!--Start "Destinations & visiting places" table-->
<div class="table">
    <table class="content_table" id="conn_table" >
        <thead>
            <tr>
                <th colspan = "2">DESTINATION</th>
                <th colspan = "2">VISITING PLACES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Galle</td>
                <td>Galle Dutch Fort<br />
                    Dutch Reformed Church<br />
                    The National Museum of Galle<br />
                    Japanese Peace Pagoda</td>
                <td><input type="button" id="removebtn" value="REMOVE PLACE"><br />
                    <input type="button" id="removebtn" value="REMOVE PLACE"><br />
                    <input type="button" id="removebtn" value="REMOVE PLACE"><br />
                    <input type="button" id="removebtn" value="REMOVE PLACE"><br /></td>
                <td><input type="button" id="removebtn" value="REMOVE DESTINATION"><br />
                    <input type="button" id="addbtn" value="ADD NEW PLACE"></td>
            </tr>

          <tr>
                <td>Rathnapura</td>
                <td>Galle Dutch Fort<br />
                    Dutch Reformed Church<br />
                    The National Museum of Galle<br />
                    Japanese Peace Pagoda</td>
                <td><input type="button" id="removebtn" value="REMOVE PLACE"><br />
                    <input type="button" id="removebtn" value="REMOVE PLACE"><br />
                    <input type="button" id="removebtn" value="REMOVE PLACE"><br />
                    <input type="button" id="removebtn" value="REMOVE PLACE"><br /></td>
                <td><input type="button" id="removebtn" value="REMOVE DESTINATION"><br />
                    <input type="button" id="addbtn" value="ADD NEW PLACE"></td>
            </tr>
            <tr>
                <td>Rathnapura</td>
                <td>Galle Dutch Fort<br />
                    Dutch Reformed Church<br />
                    The National Museum of Galle<br />
                    Japanese Peace Pagoda</td>
                <td><input type="button" id="removebtn" value="REMOVE PLACE"><br />
                    <input type="button" id="removebtn" value="REMOVE PLACE"><br />
                    <input type="button" id="removebtn" value="REMOVE PLACE"><br />
                    <input type="button" id="removebtn" value="REMOVE PLACE"><br /></td>
                <td><input type="button" id="removebtn" value="REMOVE DESTINATION"><br />
                    <input type="button" id="addbtn" value="ADD NEW PLACE"></td>
            </tr>
        </tbody>
    </table>
</div>
<!--End "Registered vehicle" table-->

<!--Start form of adding new destination-->
<div class="form-container">
    <form class="form_add_destination" id="form_add_destination" action="../../php/unregistered/admin_add_destinations.php" method="POST">
       <!-- Enter destination-->
        <label for="fdestination" class="fdes">DESTINATION</label>
            <input type="text" id="fdestination" name="fdestination">

            <!-- Enter visiting places-->
            <div class="site_details_div">
              <input type="text" id="fvp" name="fvp" placeholder="  Sight">
              <input type="text" id="fprice" name="fprice" placeholder="  Ticket price LKR">
              <input type="text" id="ftime" name="ftime" placeholder="  Time">
              <select id="fcategory" name="fcategory">
                  <option value="0">Select Category :</option>
                  <option value="1">Cultural</option>
                  <option value="2">Pilgrimage</option>
                  <option value="3">Leisure</option>
              </select>
              <input type="text" id="flocation" name="flocation">
              <img src="../../../public/images/icons/placeholder.png" id="location">
            </div>

            <div class="site_details_div">
              <input type="text" id="fvp" name="fvp" placeholder="  Sight">
              <input type="text" id="fprice" name="fprice" placeholder="  Ticket price LKR">
              <input type="text" id="ftime" name="ftime" placeholder="  Time">
              <select id="fcategory" name="fcategory">
                  <option value="0">Select Category :</option>
                  <option value="1">Cultural</option>
                  <option value="2">Pilgrimage</option>
                  <option value="3">Leisure</option>
              </select>
              <input type="text" id="flocation" name="flocation">
              <img src="../../../public/images/icons/placeholder.png" id="location">
            </div>

            <div class="site_details_div">
              <input type="text" id="fvp" name="fvp" placeholder="  Sight">
              <input type="text" id="fprice" name="fprice" placeholder="  Ticket price LKR">
              <input type="text" id="ftime" name="ftime" placeholder="  Time">
              <select id="fcategory" name="fcategory">
                  <option value="0">Select Category :</option>
                  <option value="1">Cultural</option>
                  <option value="2">Pilgrimage</option>
                  <option value="3">Leisure</option>
              </select>
              <input type="text" id="flocation" name="flocation">
              <img src="../../../public/images/icons/placeholder.png" id="location">
            </div>

            <div class="site_details_div">
              <input type="text" id="fvp" name="fvp" placeholder="  Sight">
              <input type="text" id="fprice" name="fprice" placeholder="  Ticket price LKR">
              <input type="text" id="ftime" name="ftime" placeholder="  Time">
              <select id="fcategory" name="fcategory">
                  <option value="0">Select Category :</option>
                  <option value="1">Cultural</option>
                  <option value="2">Pilgrimage</option>
                  <option value="3">Leisure</option>
              </select>
              <input type="text" id="flocation" name="flocation">
              <img src="../../../public/images/icons/placeholder.png" id="location">
            </div>


            <!-- This div is for copying this field when click on "Add new place" button-->
            <!-- <div id="myP" class="myP">
              <input type="text" id="fvp" name="fvp" placeholder="  Sight">
              <input type="text" id="fprice" name="fprice" placeholder="  Ticket price LKR">
              <input type="text" id="ftime" name="ftime" placeholder="  Time">
              <select id="fcategory" name="fcategory">
                  <option value="0">Select Category :</option>
                  <option value="1">Cultural</option>
                  <option value="2">Pilgrimage</option>
                  <option value="3">Leisure</option>
              </select>
              <input type="text" id="flocation" name="flocation">
              <img src="../../images/icons/placeholder.png" id="location"><br/>
            </div> -->
            <!-- <div id="demo"></div> -->
            <!-- This div is for copying that field to here-->


    </form>
    <input type="button" id="addvpbtn" name="addvpbtn" value="ADD NEW PLACE" onclick="addPlace()">
    <input type="submit" form="form_add_destination" id="submitvpbtn" name="submitvpbtn" value="SUBMIT">
</div>
<!--End form of adding new destination-->
<!-- </div>
<div class="site_details_div" id="site_details_div">
  <input type="text" id="fvp" name="fvp" placeholder="  Sight">
  <input type="text" id="fprice" name="fprice" placeholder="  Ticket price LKR">
  <input type="text" id="ftime" name="ftime" placeholder="  Time">
  <select id="fcategory" name="fcategory">
      <option value="0">Select Category :</option>
      <option value="1">Cultural</option>
      <option value="2">Pilgrimage</option>
      <option value="3">Leisure</option>
  </select>
  <input type="text" id="flocation" name="flocation">
  <img src="../../images/icons/placeholder.png" id="location">
</div> -->
<script type="text/javascript" src="../../../public/script/admin/admin_destinations.js"></script>
<!--JS to get new row when click on "Add new place" -->


</section>
</body>
</html>
<?php
  /*} else{
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
}else{
  header("location: ../../index.html");
  exit();
}*/
 ?>
