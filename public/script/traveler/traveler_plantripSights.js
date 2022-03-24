var content = document.querySelector(".content");
var planheading = document.querySelector(".plan-head");
var hotelsheading = document.querySelector(".hotel-head");
var popup1 = document.querySelector(".show_names0");
var popup2 = document.querySelector(".show_names1");
var popup3 = document.querySelector(".show_names2");
var popupBtn = document.querySelectorAll(".selecthotelpopupbtn");
var cancelBtn1 = document.querySelector(".cancelbtn0");
var cancelBtn2 = document.querySelector(".cancelbtn1");
var cancelBtn3 = document.querySelector(".cancelbtn2");
var formPlantrip = document.querySelector("#form_plan");
var selecthotel = document.querySelectorAll(".selecthotelbtn");
var hotelcontent = document.querySelector(".hotel_booking");
var cancelhtlbtn = document.querySelector("#cancelhtlbtn");
// formPlantrip.addEventListener("submit", function(event){
//   event.preventDefault();
// });
// for (var i = 0; i < popupBtn.length; i++) {
//      popupBtn[i].addEventListener("click", function(event){
//        openPopup();
//    });
// }
// function openPopup(){
//   content.style.display = "none";
//   popup.style.display = "block";
//   planheading.style.display="none";
//   hotelsheading.style.display="block";
// }

popupBtn[0].addEventListener("click", function(event){
  content.style.display = "none";
  popup1.style.display = "block";
  planheading.style.display="none";
  hotelsheading.style.display="block";
});
cancelBtn1.addEventListener("click", function(){
  popup1.style.display = "none";
  content.style.display = "block";
  planheading.style.display="block";
  hotelsheading.style.display="none";
 });
popupBtn[1].addEventListener("click", function(event){
  content.style.display = "none";
  popup2.style.display = "block";
  planheading.style.display="none";
  hotelsheading.style.display="block";
});
cancelBtn2.addEventListener("click", function(){
  popup2.style.display = "none";
  content.style.display = "block";
  planheading.style.display="block";
  hotelsheading.style.display="none";
 });
 cancelhtlbtn.addEventListener("click", function(event){
  event.preventDefault();
  content.style.display = "block";
  planheading.style.display="block";
  hotelsheading.style.display="none";
  hotelcontent.style.display="none";
  popup1.style.display = "none";
  popup2.style.display = "none";
  popup3.style.display = "none";
});
 for (var i = 0; i < selecthotel.length; i++) {
  selecthotel[i].addEventListener("click", function(event){
    hotelcontent.style.display="block";
    popup1.style.display = "none";
    popup2.style.display = "none";
    popup3.style.display = "none";
    content.style.display = "none";
    planheading.style.display="none";
    hotelsheading.style.display="none";
    
});
}
popupBtn[2].addEventListener("click", function(event){
  content.style.display = "none";
  popup3.style.display = "block";
  planheading.style.display="none";
  hotelsheading.style.display="block";
});
cancelBtn3.addEventListener("click", function(){
  popup3.style.display = "none";
  content.style.display = "block";
  planheading.style.display="block";
  hotelsheading.style.display="none";
 });





window.onclick = function(event) {
  if (event.target == popup) {
    popup.style.display = "none";
    content.style.display = "block";
    planheading.style.display="block";
    hotelsheading.style.display="none";
  }
}

 
 
 









//  var slideIndex = 1;
//  showSlides(slideIndex);

//  // Next/previous controls
//  function plusSlides(n) {
//    showSlides(slideIndex += n);
//  }

//  // Thumbnail image controls
//  function currentSlide(n) {
//    showSlides(slideIndex = n);
//  }

//  function showSlides(n) {
//    var i;
//    var slides = document.getElementsByClassName("Slide");
//    if (n > slides.length) {slideIndex = 1}
//    if (n < 1) {slideIndex = slides.length}
//    for (i = 0; i < slides.length; i++) {
//        slides[i].style.display = "none";
//        slides[slideIndex-1].style.display = "block";
//    }

//  }








 
 
 
