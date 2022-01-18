
    <?php
//     echo
//     '<div class="nav_bar-div">
//       <br>
//       <table class="nav_bar-table">
//         <tr>
//           <td> <img class="nav_bar-logo" src="' . URLROOT . '/public/images/Logo/travo.png" alt="LOGO"> </td>
//           <td></td>
//           <td></td>
//           <td class="navigations_name"><a href="'.URLROOT.'/hotel">HOME</a></td>
//           <td class="navigations_name"><a href="'.URLROOT.'/hotel/faq">FAQ</a></td>
//           <td class="navigations_name"><a href="'.URLROOT.'/hotel#about_us-section">ABOUT</a></td>
//           <td class="navigations_name"><a href="#contact_us-section">CONTACT</a></td>
//           <td class="navigations_name"><a href="'.URLROOT.'/hotel/hotelBooking">BOOKINGS</a></td>
//           <td class="navigations_name"><a href="'.URLROOT.'/hotel/availability">UPDATE AVAILABILITY </a></td>
//           <td>
//           <div class="dropdown">
//               <img class="nav_bar-img" src="' . URLROOT . '/public/images/icons/user.png">
//               <div class="dropdown-content">
//                   <div class="drop-title">',$_SESSION['name'],'</div>
//                   <div class="drop-box"><button class="deleteAccount_btn" id="deleteAccount_btn" >DELETE ACCOUNT</button></div>
//                   <div class="drop-box"><a class="drop-nav" href="'.URLROOT.'/hotel/hotelUpdate">UPDATE</a></div>
//                   <div class="drop-box"><a class="drop-nav" href=../../php/unregistered/end-log_out.php>LOG OUT</a></div>
//               </div>
//           </div>
// </td>
//         </tr>
//       </table>
//       <div class="delete_modal">
//         <div class="deleteAccount_confirm_box">
//               <h3>Delete Account</h3>
//               <hr>
//               <p>There is no recovery option. Are you sure you want to delete this account ?</p>
//               <hr>
//               <button type="button" name="delete_confirm_btn" class="delete_confirm_btn" id="delete_confirm_btn">DELETE ACCOUNT</button>
//               <button type="button" name="delete_cancel_btn" class="delete_cancel_btn" id="delete_cancel_btn">CANCEL</button>
//         </div>
//         </div>
//       <script type="text/javascript" src="nav_bar_hotel.js"></script>
//     </div> '; ?>



<?php
    echo
    '<div class="nav_bar-div">
      <br>
      <nav class = "nav_bar">
        <div class="nav_bar_logo">
            <img class="nav_bar_logo_img" src="' . URLROOT . '/public/images/Logo/travo.png" alt="LOGO">
        </div>
        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav_bar_links">
          <li class="navigations_name"></li>
          <li class="navigations_name"></li>
          <li class="navigations_name"><a href="'.URLROOT.'/hotel">HOME</a></li>
          <li class="navigations_name"><a href="'.URLROOT.'/hotel/faq">FAQ</a></li>
          <li class="navigations_name"><a href="'.URLROOT.'/hotel#about_us-section">ABOUT</a></li>
          <li class="navigations_name"><a href="#contact_us-section">CONTACT</a></li>
          <li class="navigations_name"><a href="'.URLROOT.'/hotel/hotelBooking">BOOKINGS</a></li>
          <li class="navigations_name"><a href="'.URLROOT.'/hotel/availability">UPDATE AVAILABILITY</a></li>
          <li class = "dropdown_li"> 
            <div class="dropdown">
              <img class="nav_bar-img" src="' . URLROOT . '/public/images/icons/user.png">
              <div class="dropdown-content">
                  <div class="drop-title">',$_SESSION['owner_name'],'</div>
                  <div class="drop-box"><button class="deleteAccount_btn" id="deleteAccount_btn" >DELETE ACCOUNT</button></div>
                  <div class="drop-box"><a class="drop-nav" href="'.URLROOT.'/hotel/hotelUpdate">UPDATE</a></div>
                  <div class="drop-box"><a class="drop-nav" href=../../php/unregistered/end-log_out.php>LOG OUT</a></div>
              </div>
            </div>
          </li>
        <li class="navigations_name drop_content_mini">',$_SESSION['owner_name'],'</li>
        <li class="navigations_name drop_content_mini"><button class="deleteAccount_btn" id="deleteAccount_btn" >DELETE ACCOUNT</button></li>
        <li class="navigations_name drop_content_mini"><a class="drop-nav" href="'.URLROOT.'/hotel/hotelUpdate">UPDATE</a></li>
        <li class="navigations_name drop_content_mini"><a class="drop-nav" href=../../php/unregistered/end-log_out.php>LOG OUT</a></li> 
       
          </ul>
      </nav>
      <div class="delete_modal">
        <div class="deleteAccount_confirm_box">
              <h3>Delete Account</h3>
              <hr>
              <p>There is no recovery option. Are you sure you want to delete this account ?</p>
              <hr>
              <button type="button" name="delete_confirm_btn" class="delete_confirm_btn" id="delete_confirm_btn">DELETE ACCOUNT</button>
              <button type="button" name="delete_cancel_btn" class="delete_cancel_btn" id="delete_cancel_btn">CANCEL</button>
        </div>
      </div>
      <script type="text/javascript" src="nav_bar_vehicle.js"></script>
    </div> '; ?>

