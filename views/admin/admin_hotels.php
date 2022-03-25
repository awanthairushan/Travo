<?php
if (isset($_SESSION['username'])) {
  if (mysqli_num_rows($this->isAdmin) === 1) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
      /*  $result = require '../../db/admin/admin_hotels.php';*/
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELS</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_hotels.css">
    <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_repeating_css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>        
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">


</head>
<body>
<section class="admin-hotels">
    <!--Start Navigation bar-->
    <?php include_once  APPROOT.'/views/repeatable_contents/nav_bar_admin.php';?>
      <style> <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_admin.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_admin.js"></script>
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
           while ($rows = mysqli_fetch_array($this->new_hotels)){
                echo "<tr>
                    <td>".$rows['row_no']."</td>
                    <td>".$rows['name']."</td>
                    <td>".$rows['address_line1'].", ".$rows['address_line2'].", ".$rows['city']."</td>
                    <td>
                    <form method='post' action='hotelsMore'>
                        <input type='hidden' value='$rows[0]' name=hotelID>
                        <input type='submit' name ='hotel_morebtn' id='morebtn' class='hotel_morebtn' value='MORE'>
                    </form>
                    </td>
                    <td>
                    <form method='post' action='acceptHotelRequest'>
                        <input type='hidden' value='$rows[0]' name=hotelID>
                        <input type='submit' id='removebtn' name ='acceptbtn' class='hotel_morebtn hotel_morebtn_accept' value='ACCEPT'>
                    </form>

                    <form method='post' action='declineHotelRequest'>
                        <input type='hidden' value='$rows[0]' name=hotelID>
                        <input type='submit' id='removebtn' name ='removebtn' class='remove_hotel_btn' value='DECLINE'>
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
            <?php
           while ($rows = mysqli_fetch_array($this->existing_hotels)){
                echo "<tr>
                    <td>".$rows['row_no']."</td>
                    <td>".$rows['name']."</td>
                    <td>".$rows['address_line1'].", ".$rows['address_line2'].", ".$rows['city']."</td>
                    <td>
                    <form method='post' action='hotelsMore'>
                        <input type='hidden' value='$rows[0]' name=hotelID>
                        <input type='submit' name ='hotel_morebtn' id='morebtn' class='hotel_morebtn' value='MORE'>
                    </form>
                    </td>
                    <td>
                    <form method='post' action='declineHotelRequest'>
                        <input type='hidden' value='$rows[0]' name=hotelID>
                        <input type='submit' id='removebtn' name ='removebtn' class='remove_hotel_btn' value='REMOVE'>
                    </form>
                    </td>

                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <!--End "Exsisting Hotels" table-->


</div>

<!--<script src="../../JS/filter.js"></script>-->
</section>
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
 <!--JS file for search & filter-->
    <script src="<?php echo URLROOT ?>/public/script/admin/admin_filter_hotels.js"></script>
 <!--JS file for remove hotel-->
 <!-- <script src="<?php echo URLROOT ?>/public/script/admin/admin_hotels.js"></script> -->
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
