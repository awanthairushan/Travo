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
                    <form action="<?php echo URLROOT; ?>/traveler/deleteTrip" method="post">
                      <p>There is no recovery option. Are you sure you want to delete this trip ?</p>
                      <hr>
                      <input type="hidden"  id="deleteTrip" name="deleteTrip" value="0">
                      <button type="submit" name="deleteTrip_confirm_btn" class="deletetrip_confirm_btn" id="deleteTrip_confirm_btn">DELETE TRIP</button>
                      <button type="button" name="deleteTrip_cancel_btn" class="deleteTrip_cancel_btn" id="deleteTrip_cancel_btn">CANCEL</button>
                    </form>
              </div>
            </div>

            <div class="delete_paidTrip_modal">
              <div class="deletePaidTrip_confirm_box">
                    <h3>Cancel Trip</h3>
                    <hr>
                      <p>This is a paid trip! Contact administrator to cancel this trip</p>
                      <hr>
                      <button type="button" name="deletePaidTrip_cancel_btn" class="deletePaidTrip_cancel_btn" id="deletePaidTrip_cancel_btn">CANCEL</button>
                    </form>
              </div>
            </div>

            <div class="content">
                <div class="trips">
                <div class="slide trip1" id="trip1">
                    <div class="row1">
                        <div class="prev" onclick="plusSlides(-1)"></div>
                        <div class="topic">TRIP TO GO</div>
                        <div class="next" onclick="plusSlides(1)"></div>
                    </div>
                    <div class="cols2">
                      <?php 
                        $count1=1;

                        while ($rows1 = mysqli_fetch_array($this->paidTrips)){
                          if($count1==5){
                            $count1=1;
                          }

                          if($rows1['destination_id2']==""){
                            $rows1['destination_id2']="-";
                          }

                          if($rows1['destination_id3']==""){
                            $rows1['destination_id3']="-";
                          }

                          echo '<div class="tripdetail t'.$count1.'"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_paidimg"  id="'.$rows1['trip_id'].'" onClick="deletePaidTripid(this.id)"><dl class=""> <dt>'.$rows1['destination_id'].'</dt> <dt>'.$rows1['destination_id2'].'</dt> <dt>'.$rows1['destination_id3'].'</dt> <dt>'.$rows1['start_date'].'</dt></dl><button onclick="window.location.href='."'savedBudget?id=".$rows1['trip_id']."'".'" id="selecttrip">READ MORE</button></div>';
                          $count1=$count1+1;
                        }
                        ?>
                      </div>
                </div>

                <div class="slide trip2" id="trip2">
                    <div class="row1">
                        <div class="prev" onclick="plusSlides(-1)"></div>
                        <div class="topic">SAVED</div>
                        <div class="next" onclick="plusSlides(1)"></div>
                    </div>
                    <div class="cols2">
                    <?php 
                        $count2=1;

                        while ($rows2 = mysqli_fetch_array($this->savedTrips)){
                          if($count2==5){
                            $count2=1;
                          }

                          if($rows2['destination_id2']==""){
                            $rows2['destination_id2']="-";
                          }

                          if($rows2['destination_id3']==""){
                            $rows2['destination_id3']="-";
                          }

                          echo '<div class="tripdetail t'.$count2.'" id="'.$rows2['trip_id'].'"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"  id="'.$rows2['trip_id'].'" onClick="deleteTripid(this.id)"><dl class=""> <dt>'.$rows2['destination_id'].'</dt> <dt>'.$rows2['destination_id2'].'</dt> <dt>'.$rows2['destination_id3'].'</dt> <dt>'.$rows2['start_date'].'</dt></dl><button onclick="window.location.href='."'savedBudget?id=".$rows2['trip_id']."'".'" id="selecttrip">READ MORE</button></div>';
                          $count2=$count2+1;
                        }
                        ?>
                    </div>
                </div>

                <div class="slide trip3" id="trip3">
                    <div class="row1">
                        <div class="prev" onclick="plusSlides(-1)"></div>
                        <div class="topic">COMPLETED</div>
                        <div class="next" onclick="plusSlides(1)"></div>
                    </div>
                    <div class="cols2">
                    <?php 
                        $count3=1;

                        while ($rows3 = mysqli_fetch_array($this->completedTrips)){
                          if($count3==5){
                            $count3=1;
                          }

                          if($rows3['destination_id2']==""){
                            $rows3['destination_id2']="-";
                          }

                          if($rows3['destination_id3']==""){
                            $rows3['destination_id3']="-";
                          }

                          echo '<div class="tripdetail t'.$count3.'"><img src="http://localhost/TRAVO/public/images/icons/delete.png" class="delete_img"  id="'.$rows3['trip_id'].'" onClick="deleteTripid(this.id)"><dl class=""> <dt>'.$rows3['destination_id'].'</dt> <dt>'.$rows3['destination_id2'].'</dt> <dt>'.$rows3['destination_id3'].'</dt> <dt>'.$rows3['start_date'].'</dt></dl><button onclick="window.location.href='."'savedBudget?id=".$rows3['trip_id']."'".'" id="selecttrip">READ MORE</button></div>';
                          $count3=$count3+1;
                        }
                        ?>
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
  } else{
    echo '<script type="text/javascript">javascript:history.go(-1)</script>';
    exit();
  }
}else{
  header("location: http://localhost/TRAVO");
  exit();
}
?>
