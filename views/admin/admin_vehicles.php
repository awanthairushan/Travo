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
    //$result = require '../../db/admin/admin_vehicles.php';
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEHICLES</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_vehicles.css">
    <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_repeating_css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>        
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">

</head>
<body>
<section class="admin-vehicles">
    <!--Start Navigation bar-->
    <?php include_once  APPROOT.'/views/repeatable_contents/nav_bar_admin.php';?>
      <style> <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_admin.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_admin.js"></script>
    <!--End Navigation bar-->

<!-- .....................modal box for traveler remove...................... -->
<div class="remove_modal">
      <div class="remove_modal_box">
            <h3>Remove Vehiclel</h3>
            <hr>
            <p>There is no recovery option. Are you sure you want to remove this vehicle ?</p>
            <hr>
            <button type="button" name="remove_confirm_btn" class="remove_confirm_btn" id="remove_confirm_btn">REMOVE</button>
            <button type="button" name="remove_cancel_btn" class="remove_cancel_btn" id="remove_cancel_btn">CANCEL</button>
      </div>
      </div>
<!-- .....................end of modal box for traveler remove...................... -->


<div class="main">

    <h1 class="heading-one">REGISTERED VEHICLES</h1>

    <!--Start search option-->
    <div class="search_div">
        <label for="filter" class="filter-labels">SEARCH BY :</label>
        <select name="filter" id="filter" class="filter-input">
            <option value="vnumber">VEHICLE NUMBER</option>
            <option value="vcategory">VEHICLE CATEGORY</option>
            <option value="vcity">CITY</option>
        </select>
        <input type="text" name="search" id="search" class="search-input" placeholder="Enter Value"><br>
    </div>
    <!--End search option-->

<!--Start "Registered vehicle" table-->
<div class="table">
    <table class="content_table" id="vehicle_table" >
        <thead>
            <tr>
                <th>NO</th>
                <th>VEHICLE NUMBER</th>
                <th>VEHICLE CATEGORY</th>
                <th>CITY</th>
                <th>VEHICLE DETAILS</th>
                <th>REMOVE</th>
            </tr>
        </thead>

        <tbody class="table-body">
        <?php
            while ($rows = mysqli_fetch_array($this->vehicle_details)){
                echo "<tr>
                    <td>".$rows['row_no']."</td>
                    <td>".$rows['vehicle_no']."</td>
                    <td>".$rows['type']."</td>
                    <td>".$rows['city']."</td>
                    <td>
                    <form method='post' action='vehiclesMore'>                        
                        <input type='hidden' value='$rows[0]' name=vehicle_id>
                        <input type='submit' id='morebtn' name='vehicle_morebtn' class='hotel_morebtn' value='MORE' onclick=\"window.location.href='vehiclesMore'\";>
                    </form>
                    </td>
                    <td>
                    <form method='post' action=' ' >
                        <input type='hidden' value='$rows[0]' name=vehicle_id>
                        <input type='button' class='remove_hotel_btn' id='removebtn' value='REMOVE' >
                    </form>
                    </td>

                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!--End "Registered vehicle" table-->


</section>
<!--JS file for search & filter-->
    <script src="<?php echo URLROOT ?>/public/script/admin/admin_filter_vehicles.js"></script>
 <!--JS file for remove vehicle-->
 <!-- <script src="<?php echo URLROOT ?>/public/script/admin/admin_vehicle.js"></script> -->
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
