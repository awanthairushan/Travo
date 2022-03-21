var deleteTrip_modal = document.querySelector(".delete_trip_modal");
var deleteTrip_btn = document.querySelectorAll(".delete_img");
var trip_cancelBtn = document.querySelector("#deleteTrip_cancel_btn");


for (var i = 0; i < deleteTrip_btn.length; i++) {
    deleteTrip_btn[i].addEventListener("click", function(e) {
        deleteTrip_modal.style.display = "block";
    });
}

window.onclick = function(e) {
    if (event.target == deleteTrip_modal) {
        deleteTrip_modal.style.display = "none";
    }
}

trip_cancelBtn.addEventListener("click", function() {
    deleteTrip_modal.style.display = "none";
});

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