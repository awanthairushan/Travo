var deleteVehicle_modal = document.querySelector(".delete_vehicle_modal");
var deleteVehicle_btn = document.querySelectorAll(".deletebtn");
var vehicle_confirmBtn = document.querySelector("#deletevehicle_confirm_btn");
var vehicle_cancelBtn = document.querySelector("#deletevehicle_cancel_btn");

for (let i = 0; i < deleteVehicle_btn.length; i++) {
    deleteVehicle_btn[i].addEventListener("click", function(e) {
        deleteVehicle_modal.style.display = "block";
    });
}

window.onclick = function(e) {
    if (event.target == deleteVehicle_modal) {
        deleteVehicle_modal.style.display = "none";
    }
}

vehicle_cancelBtn.addEventListener("click", function() {
    deleteVehicle_modal.style.display = "none";
});
vehicle_confirmBtn.addEventListener("click", function() {
    console.log("Awaaaa");
});