//---------------------------trip delete box---------------------

var deleteTrip_modal = document.querySelector(".delete_trip_modal");
var deletePaidTrip_modal = document.querySelector(".delete_paidTrip_modal");
var dleteTripId = document.getElementById("deleteTrip");
var deleteTrip_btn = document.querySelectorAll(".delete_img");
var deletePaidTrip_btn = document.querySelectorAll(".delete_paidimg");
var trip_cancelBtn = document.querySelector("#deleteTrip_cancel_btn");
var paidtrip_cancelBtn = document.querySelector("#deletePaidTrip_cancel_btn");


// for (var i = 0; i < deleteTrip_btn.length; i++) {
//   deleteTrip_btn[i].addEventListener("click", function(e){
//     deleteTrip_modal.style.display = "block";
//   });
// }

window.onclick = function(e) {
    if (event.target == deleteTrip_modal) {
        deleteTrip_modal.style.display = "none";
    }
}

function deleteTripid(id){
    deleteTrip_modal.style.display = "block";
    dleteTripId.value=id;

}

function deletePaidTripid(id){
    deletePaidTrip_modal.style.display = "block";
  }

trip_cancelBtn.addEventListener("click", function(){
   deleteTrip_modal.style.display = "none";
 });

 paidtrip_cancelBtn.addEventListener("click", function(){
    deletePaidTrip_modal.style.display = "none";
  });


//----------------------------change between trip to go, saved and completed-----------------------
 var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("Slide");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        slides[slideIndex - 1].style.display = "block";
    }

}