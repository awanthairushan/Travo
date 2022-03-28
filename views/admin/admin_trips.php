<?php
if (isset($_SESSION['username'])) {
  if (mysqli_num_rows($this->isAdmin) === 1) {
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
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_admin.js"></script>
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
                </tr>
            </thead>
            <tbody>
            <?php
           while ($rows = mysqli_fetch_array($this->savedTripDetails)){
                echo "<tr>
                    <td>".$rows['trip_id']."</td>
                    <td>".$rows['start_date']."</td>
                    <td>".$rows['end_date']."</td>
                    <td>
                    <form method='post' action='tripsMore'>
                        <input type='hidden' value='$rows[0]' name=tripId>
                        <input type='hidden' value='$rows[1]' name=travelerId>
                        <input type='submit' id='morebtn' name ='removebtn' class='removebtn' value='MORE'>
                    </form>
                    </td>
                </tr>";
            }
          ?>
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
                    <th>COMPLETE</th>
                </tr>
            </thead>
            <tbody>
            <?php
           while ($rows = mysqli_fetch_array($this->paidTripDetails)){
                echo "<tr>
                    <td>".$rows['trip_id']."</td>
                    <td>".$rows['start_date']."</td>
                    <td>".$rows['end_date']."</td>
                    <td>
                    <form method='post' action='tripsMore'>
                        <input type='hidden' value='$rows[0]' name=tripId>
                        <input type='hidden' value='$rows[1]' name=travelerId>
                        <input type='submit' id='morebtn' name ='removebtn' class='removebtn' value='MORE'>
                    </form>
                    </td>
                    <td class='tdbtn'>
                    <form method='post' action='markTripCompleted'>
                        <input type='hidden' value='$rows[0]' name=tripId>
                        <input type='submit' id='completedbtn' name ='removebtn' class='removebtn' value='COMPLETED'>
                    </form>
                    </td>
                </tr>";
            }
          ?>
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
                </tr>
            </thead>
            <tbody>
            <?php
           while ($rows = mysqli_fetch_array($this->completedTripDetails)){
                echo "<tr>
                    <td>".$rows['trip_id']."</td>
                    <td>".$rows['start_date']."</td>
                    <td>".$rows['end_date']."</td>
                    <td>
                    <form method='post' action='tripsMore'>
                        <input type='hidden' value='$rows[0]' name=tripId>
                        <input type='hidden' value='$rows[1]' name=travelerId>
                        <input type='submit' id='morebtn' name ='removebtn' class='removebtn' value='MORE'>
                    </form>
                    </td>
                </tr>";
            }
          ?>
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
  } else {
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
} else {
  header("location: http://localhost/TRAVO");
  exit();
}
?>
