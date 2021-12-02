<?php
session_start();
if(isset($_SESSION['username'])) {
  include '../../db/db_connection.php';
  $temp = $_SESSION['username'];
  $sqlForSession = "SELECT username FROM admin WHERE username = '$temp'";
  $resultForSession = mysqli_query($con, $sqlForSession);
  if (mysqli_num_rows($resultForSession) === 1) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $result = require '../../db/admin/admin_hotels.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELS</title>
    <link rel="icon" href="../../images/icons/favicon.ico">
    <link rel="stylesheet" href="../../css/admin/admin_hotels.css">
    <link rel="stylesheet" href="../../css/admin/admin_repeating_css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>        
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">


</head>
<body>
<section class="admin-hotels">
    <!--Start Navigation bar-->
    <?php include '../../repeatable_contents/nav_bar_admin.php';?>
      <style> <?php include '../../repeatable_contents/nav_bar_admin.css'; ?>  </style>
      <script type="text/javascript" src="../../repeatable_contents/nav_bar_admin.js"></script>
    <!--End Navigation bar-->

<!-- .....................modal box for traveler remove...................... -->
    <div class="remove_modal">
      <div class="remove_modal_box">
            <h3>Remove hotel</h3>
            <hr>
            <p>There is no recovery option. Are you sure you want to remove this hotel ?</p>
            <hr>
            <button type="button" name="remove_confirm_btn" class="remove_confirm_btn" id="remove_confirm_btn">REMOVE</button>
            <button type="button" name="remove_cancel_btn" class="remove_cancel_btn" id="remove_cancel_btn">CANCEL</button>
      </div>
      </div>
<!-- .....................end of modal box for traveler remove...................... -->


<div class="middle">
    <!--Start "New Hotels" table-->
    <h1 class="heading-one">NEW HOTELS</h1>
        <!--Start search option-->
        <div class="search_div">
            <label for="filter" class="filter-labels">SEARCH BY :</label>
            <select name="filter" id="filter" class="filter-input">
                <option value="hname">HOTEL NAME</option>
                <option value="hcity">CITY</option>
            </select>
            <input type="text" name="search" id="search" class="search-input" placeholder="Enter Value"><br>
        <!--End search option-->
    </div>
    <div class="table">
        <table class="content_table" id="hotel_table" >
            <thead>
                <tr>
                    <th>NO</th>
                    <th>HOTEL NAME</th>
                    <th>ADDRESS</th>
                    <th>MORE</th>
                    <th colspan = "2">ACCEPT</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($rows = mysqli_fetch_array($result)){
                echo "<tr>
                    <td>".$rows['row_no']."</td>
                    <td>".$rows['name']."</td>
                    <td>".$rows['address_line1'].$rows['address_line2'].$rows['city']."</td>
                    <td>
                    <form method='post' action=' '>
                        <input type='hidden' value='$rows[0]' name=con_id>
                        <input type='button' id='morebtn' class='hotel_morebtn' value='MORE' onclick=\"window.location.href='admin_hotels_more.php'\";>
                    </form>
                    </td>
                    <td>
                    <form method='post' action=' '>
                    <input type='hidden' value='$rows[0]' name=con_id>
                    <input type='button' class='hotel_morebtn hotel_morebtn_accept' id='morebtn' value='ACCEPT'>
                    </form>
                    <form method='post' action=' '>
                        <input type='hidden' value='$rows[0]' name=con_id>
                        <input type='button' id='decline_hotel_btn' class='remove_hotel_btn remove_hotel_btn_decline' value='DECLINE'>
                    </form>
                    </td>

                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <!--End "New Hotels" table-->

    <!--Start "Exsisting Hotels" table-->
    <h1 class="heading-one"><br />EXSISTING HOTELS</h1>
        <!--Start search option-->
        <div class="search_div">
            <label for="filter" class="filter-labels">SEARCH BY :</label>
            <select name="filter" id="filter" class="filter-input">
                <option value="vnumber">HOTEL NAME</option>
                <option value="vnumber">ADDRESS</option>
            </select>
            <input type="text" name="search" id="search" class="search-input" placeholder="Enter Value"><br>
        </div>
            <!--End search option-->

    <div class="table">
        <table class="content_table" id="conn_table" >
            <thead>
            <tr>
                    <th>NO</th>
                    <th>HOTEL NAME</th>
                    <th>ADDRESS</th>
                    <th>DETAILS</th>
                    <th>REMOVE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>1</td>
                <td>Anantara Resort</td>
                <td>Galle Rd, Kalutara</td>
                <td><input type="button" id="morebtn" value="MORE" class='hotel_morebtn' onclick="window.location.href='admin_hotels_more.php'";></td>
                <td><input type="button" id="remove_hotel_btn" class="remove_hotel_btn" value="REMOVE"></td>
                </tr>
                <tr>
                <!--<td>Hotel Name</td>
                <td>Location</td>
                    <td><input type="button" id="morebtn" value="MORE"></td>
                    <td><input type="button" id="morebtn" value="MORE"></td>
                    <td><input type="button" id="removebtn" value="REMOVE"></td>
                </tr>
                <tr>
                <td>Hotel Name</td>
                <td>Location</td>
                    <td><input type="button" id="morebtn" value="MORE"></td>
                    <td><input type="button" id="morebtn" value="MORE"></td>
                    <td><input type="button" id="removebtn" value="REMOVE"></td>
                </tr>
                <tr>
                <td>Hotel Name</td>
                    <td>Location</td>
                    <td><input type="button" id="morebtn" value="MORE"></td>
                    <td><input type="button" id="morebtn" value="MORE"></td>
                    <td><input type="button" id="removebtn" value="REMOVE"></td>
                </tr>
                <tr>
                    <td>Hotel Name</td>
                    <td>Location</td>
                    <td><input type="button" id="morebtn" value="MORE"></td>
                    <td><input type="button" id="morebtn" value="MORE"></td>
                    <td><input type="button" id="removebtn" value="REMOVE"></td>
                </tr>-->
            </tbody>
        </table>
    </div>
    <!--End "Exsisting Hotels" table-->


</div>

<!--<script src="../../JS/filter.js"></script>-->
</section>
<?php
  } else{
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
}else{
  header("location: ../../index.html");
  exit();
}
 ?>
 <!--JS file for search & filter-->
    <script src="../../script/admin/admin_filter_hotels.js"></script>
 <!--JS file for remove hotel-->
 <script src="../../script/admin/admin_hotels.js"></script>
</body>
</html>
