var modal = document.querySelector(".remove_modal");
var remove_btns = document.querySelectorAll(".remove_hotel_btn");
var cancelBtn = document.querySelector("#remove_cancel_btn");
var removeConfrimBtn = document.querySelector("#remove_confirm_btn");

let deleteBtn = document.getElementsByClassName('delete_confirm_btn');
// let table = document.getElementById('traveler_table');
for(var i = 0; i < remove_btns.length; i++){
    remove_btns[i].addEventListener("click", function(e) {
        modal.style.display = "block";
        event.preventDefault();
    });
}

window.onclick = function(e) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
cancelBtn.addEventListener("click", function() {
    modal.style.display = "none";
});

removeConfrimBtn.addEventListener("click", function() {
    modal.style.display = "none";
});