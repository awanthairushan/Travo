var content = document.querySelector(".content");
var planheading = document.querySelector(".plan-head");
var hotelsheading = document.querySelector(".hotel-head");
var popup = document.querySelector(".hotel_names_popup");
var popupBtn = document.querySelectorAll(".selecthotelpopupbtn");
var cancelBtn = document.querySelector("#cancelbtn");
var formPlantrip = document.querySelector("#form_plan");

var allhotels = document.querySelectorAll("#selecthotelbtn");
var hotelDetails = document.querySelector(".content3");

// formPlantrip.addEventListener("submit", function(event){
//   event.preventDefault();
// });
for (var i = 0; i < popupBtn.length; i++) {
     popupBtn[i].addEventListener("click", function(event){
       openPopup();
   });
}
function openPopup(){
  content.style.display = "none";
  popup.style.display = "block";
  planheading.style.display="none";
  hotelsheading.style.display="block";
}
window.onclick = function(event) {
  if (event.target == popup) {
    popup.style.display = "none";
    content.style.display = "block";
    planheading.style.display="block";
    hotelsheading.style.display="none";
  }
}
cancelBtn.addEventListener("click", function(){
  popup.style.display = "none";
  content.style.display = "block";
  planheading.style.display="block";
  hotelsheading.style.display="none";
 });

for (var j = 0; j < allhotels.length; j++) {
  allhotels[j].addEventListener("click", function(event){
    popup.style.display = "none";
    hotelDetails.style.display = "block";
    hotelsheading.style.display="none";
});
}




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
   if (n > slides.length) {slideIndex = 1}
   if (n < 1) {slideIndex = slides.length}
   for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
       slides[slideIndex-1].style.display = "block";
   }

 }

//js for selecting destinations

 var count=0;


function getSelectedValue(){
    var e = document.getElementById("choices");
    var choiceValue = e.value; // to get value only
    var op=e.getElementsByTagName("option");
    var choicetext = e.options[e.selectedIndex].text;
    var displaydiv=document.getElementById('displaydiv');

    if(count==0){
        displaydiv.innerHTML="";
        displaydiv.style.padding= "0 0 1vh 0";
    }

    if(count<3){
      count=count+1;
      op[e.selectedIndex].disabled=true;
      choicetext.display="none";
      var newDiv = document.createElement('span');
      newDiv.setAttribute("class","choice");
      newDiv.setAttribute("id",e.selectedIndex);
      newDiv.innerHTML=choicetext+ " ";
      var spanDiv = document.createElement('b');
      spanDiv.setAttribute("class","close");
      spanDiv.innerHTML=" x ";
      spanDiv.setAttribute("onclick",'closeDiv(this)');
      var newInput = document.createElement('input');
      newInput.setAttribute("type","hidden");
      newInput.setAttribute("value",choicetext);
      countString=count.toString();
      let destination = "destination";
      newInput.setAttribute("name",destination.concat(countString));
      newDiv.appendChild(spanDiv);
      newDiv.appendChild(newInput);
      displaydiv.appendChild(newDiv);
  }
}

function closeDiv(x){
    var c = document.getElementById("choices");
    var opt=c.getElementsByTagName("option");
    var parentDiv=x.parentNode.parentNode;
    var optid=parseInt(x.parentNode.id);
    opt[optid].disabled=false;
    parentDiv.removeChild(x.parentNode);
    var displaydiv=document.getElementById('displaydiv');
    count=count-1;
    if(count<=0){
        count=0;
        displaydiv.innerHTML="Select up to 3 destinations";
        displaydiv.style.padding= "0 0 2vh 0";
    }

}





 
 
 
