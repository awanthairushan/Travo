
var forgotpw_modal = document.querySelector(".forgotPw_modal");
var forgotpw_modal_box = document.querySelector(".forgotPw_modal_box");
var otp_modal_box = document.querySelector(".otp_modal_box");
var boxLog_in = document.querySelector(".box-log_in");
var forgotpw_btn = document.querySelector("#forgot_pw_btn");
// var acc_cancelBtn = document.querySelector("#delete_cancel_btn");
var otp_sendBtn = document.querySelector("#otp_send_btn");
var otp_verifyBtn = document.querySelector("#otp_verify_btn");
// var formPlantrip = document.querySelector("#log_in_form");
// formPlantrip.addEventListener("submit", function(event){
//   event.preventDefault();
// });

forgotpw_btn.addEventListener("click", function(e){
  forgotpw_modal.style.display = "block";
  boxLog_in.style.display = "none";
});

window.onclick = function(e) {
  if (event.target == forgotpw_modal) {
    forgotpw_modal.style.display = "none";
    boxLog_in.style.display = "block";
  }
}
// acc_cancelBtn.addEventListener("click", function(){
//    forgotpw_modal.style.display = "none";
//  });
 otp_sendBtn.addEventListener("click", function(e){
    forgotpw_modal_box.style.display = "none";
    otp_modal_box.style.display = "block"
  });
  otp_verifyBtn.addEventListener("click", function(e){
     window.location.href="../../../app/views/traveler/traveler_update.php";
   });
