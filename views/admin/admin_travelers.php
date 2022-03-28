<?php
if (isset($_SESSION['username'])) {
  if (mysqli_num_rows($this->isAdmin) === 1) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
   // $result = require '../../db/admin/admin_traveler.php';
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAVELERS</title>
    <link rel="icon" href="http://localhost/TRAVO/public/images/icons/favicon.ico">
    <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_travelers.css">    
    <link rel="stylesheet" href="http://localhost/TRAVO/public/css/admin/admin_repeating_css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>        
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">


</head>
<body>
<section class="admin-travelers">
    <!--Start Navigation bar-->
    <?php include_once  APPROOT.'/views/repeatable_contents/nav_bar_admin.php';?>
      <style> <?php include_once APPROOT.'/public/css/repeatable_contents/nav_bar_admin.css'; ?>  </style>
      <script type="text/javascript" src="<?php echo URLROOT ?>/public/script/repeatable_contents/nav_bar_admin.js"></script>
    <!--End Navigation bar-->

    <!-- .....................modal box for traveler remove...................... -->
    <div class="delete_modal">
      <div class="deleteAccount_confirm_box">
            <h3>Delete Account</h3>
            <hr>
            <form method='post' action='deleteTravelers'>
            <p>This traveler may have paid trips. There is no recovery option. Are you sure you want to delete this account ?</p>
            <input type='hidden' value='0' id="traveler_id" name=travelerID>
            <input type='hidden' value='0' name=email>
            <hr>
            <button type="submit" name="delete_confirm_btn" class="delete_confirm_btn" id="delete_confirm_btn">DELETE ACCOUNT</button>
            <button type="button" name="delete_cancel_btn" class="delete_cancel_btn" id="delete_cancel_btn">CANCEL</button>
          </form>
      </div>
      </div>
<!-- .....................ebd of modal box for traveler remove...................... -->


<div class="main">

    <h1 class="heading-one">REGISTERED TRAVELERS</h1>

    <!--Start search option-->
    <div class="search_div">
        <label for="filter" class="filter-labels">SEARCH BY :</label>
        <select name="filter" id="filter" class="filter-input">
            <option value="fname" selected>NAME</option>
            <option value="faddress">ADDRESS</option>
            <option value="fcity">CITY</option>
            <option value="femail">EMAIL ADDRESS</option>
            <option value="fcontact">CONTACT NUMBER</option>
        </select>
        <input type="text" name="search" id="search" class="search-input" placeholder="Enter Value"><br>
        </div>
        <!--End search option-->

<!--Start "Registered traveler" table-->
<div class="table">
    <table class="content_table" id="traveler_table" >
        <thead>
            <tr>
                <th>NO</th>
                <th>NAME</th>
                <th>ADDRESS</th>
                <th>CITY</th>
                <th>EMAIL</th>
                <th>CONTACT</th>
                <th>REMOVE</th>
            </tr>
        </thead>
        <tbody class="scroll">


        <?php
          while ($rows = mysqli_fetch_array($this->travelers)){

            echo "<tr>
                <td>".$rows['row_no']."</td>
                <td>".$rows['name']."</td>
                <td>".$rows['address_line1'].", ".$rows['address_line2']."</td>
                <td>".$rows['city']."</td>
                <td>".$rows['email']."</td>
                <td>".$rows['contact1']."<br>".$rows['contact2']."</td>
               <td>
                    <input type='button' id='".$rows[0]."' name ='removebtn' class='removebtn' value='REMOVE'>
                </td>
            </tr>";
        }
            ?>
        </tbody>
    </table>
</div>
<!--End "Registered vehicle" table-->

</section>

<!-- JS file for delete_modal -->
<script type="text/javascript" src="<?php echo URLROOT ?>/public/script/admin/admin_traveler_remove.js"></script>

<!--JS file for search & filter-->
    <script src="<?php echo URLROOT ?>/public/script/admin/admin_filter_travelers.js"></script>
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
