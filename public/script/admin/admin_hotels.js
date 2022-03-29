var modal = document.querySelector(".remove_modal");
var remove_btn = document.querySelectorAll(".remove_existing_hotel_btn");
var remove_hotel_id = document.querySelectorAll("#hotelRemoveID");
var cancelBtn = document.querySelector("#remove_cancel_btn");
var removeConfrimBtn = document.querySelector("#remove_confirm_btn");

let deleteBtn = document.getElementsByClassName('delete_confirm_btn');
// let table = document.getElementById('traveler_table');
function loadModal(id) {
        //document.getElementById("hotel_id").value=;
        modal.style.display = "block";
        document.getElementById("hotel_id").value=id;
        event.preventDefault();
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