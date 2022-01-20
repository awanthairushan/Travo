var driverType = document.getElementById("driver_type");
var driverCharge = document.getElementById("driver_charge");
var driverName = document.getElementById("driver_name");
var driverContact1 = document.getElementById("driver_contact1");
var driverContact2 = document.getElementById("driver_contact2");

driverType.onchange = function(e) {
    var isWithoutDriver = (driverType.value == "without driver");
    if(isWithoutDriver){
        driverCharge.disabled = true;
        driverName.disabled = true;
        driverContact1.disabled = true;
        driverContact2.disabled = true;
    }
    if(!isWithoutDriver){
        driverCharge.disabled = false;
        driverName.disabled = false;
        driverContact1.disabled = false;
        driverContact2.disabled = false;
    }
};

//Create an array to get all inputs with the class name = "compulsory_fields"
const fields = document.getElementsByClassName("compulsory_fields");

//Create an array to get all inputs with the class name = "driver_fields"
const driver_fields = document.getElementsByClassName("driver_fields");

//Create an array to get all inputs with the class name = "text-form-sign_up-traveler"
const fields2 = document.getElementsByClassName("text-form-sign_up-traveler");

//Get form submit button
submitbtn = document.getElementById("submitbtn");

let validity = true;

const form = document.getElementById("signup_form_vehicle");

form.addEventListener("submit", (event) => {
    validity = true;

    if(driverType.value !== "without driver"){
        driverDetailsValidation();
    }

    function driverDetailsValidation() {
        for (let i = 0; i < driver_fields.length; i++) {
            if (driver_fields[i].value == "") {
                driver_fields[i].style.border = "2px solid rgb(228, 29, 22)";
                driver_fields[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
                //fields[i].placeholder = "This Field is Compulsory!";
                validity = false;
            }
        }
    }

    //Check empty fields
    for (let i = 0; i < fields.length; i++) {
        if (fields[i].value == "") {
            fields[i].style.border = "2px solid rgb(228, 29, 22)";
            fields[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
            //fields[i].placeholder = "This Field is Compulsory!";
            validity = false;
        }
    }



    // Check contact numbers
    let con_format = /^[0-9]{10}$/;
    for (let i = 2; i < 4; i++) {
        if (fields[i].value != "" && fields[i].value.match(con_format) == null) {
            fields[i].style.border = "2px solid rgba(250, 39, 39, 0.801)";
            fields[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
            fields[i].value = "";
            fields[i].placeholder = "Wrong Contact Number Format !";
            validity = false;
        }
    }

    //Check email
    let mail_format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (fields[1].value != "" && fields2[1].value.match(mail_format) == null) {
        fields[1].style.border = "2px solid rgba(250, 39, 39, 0.801)";
        fields[1].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        fields[1].value = "";
        fields[1].placeholder = "Invalid Email !";
        validity = false;
    }

    //Check password strong
    // let password_format = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    // if (fields[5].value != "" && fields[3].value.match(password_format) == null) {
    //     fields[5].style.border = "2px solid rgba(250, 39, 39, 0.801)";
    //     fields[5].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
    //     fields[5].value = "";
    //     fields[5].placeholder = "Weak Password. Try Again !";
    //     validity = false;
    // }

    // //Check password
    // if (fields[4].value != fields[3].value) {
    //     fields[4].style.border = "2px solid rgba(250, 39, 39, 0.801)";
    //     fields[4].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
    //     fields[4].value = "";
    //     fields[4].placeholder = "Password Did Not Match. Try Again !";
    //     validity = false;
    // }


    if (validity == false) event.preventDefault();
    return validity;
});

var username_modal = document.querySelector(".username_exist_modal");
var username_ok_Btn = document.querySelector("#username_exist_okay_btn");

window.onclick = function(e) {
    if (event.target == username_modal) {
        username_modal.style.display = "none";
    }
}
username_ok_Btn.addEventListener("click", function() {
    username_modal.style.display = "none";
});

