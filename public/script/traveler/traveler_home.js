//Create an array to get all inputs with the class name = "tripbegin"
const fields = document.getElementsByClassName("tripbegin"); 
const fields2 = document.getElementById("category");
const error = document.getElementById("error"); 

//Get form submit button
submitbtn = document.getElementById("nextbtn");

let validity = true;

const form = document.getElementById("tripPlanBegin");


submitbtn.addEventListener("click", (event) => {
    validity = true;

    //Check empty fields
    for (let i = 0; i < fields.length; i++) {
        if (fields[i].value == "") {
            fields[i].style.border = "2px solid rgb(228, 29, 22)";
            fields[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
            validity = false;
        }
    }  

    d1=new Date(fields[1].value);
    d2=new Date(fields[2].value);

    if(d2<d1){
        for (let i = 1; i < fields.length; i++) {
            fields[i].style.border = "2px solid rgb(228, 29, 22)";
            fields[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        }
        validity=false;
        error.innerHTML="Invalid Dates!";
        //window.alert("Invalid Dates!");
    }

    const diffTime = Math.abs(d2 - d1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 

    if(diffDays>2){
        for (let i = 1; i < fields.length; i++) {
            fields[i].style.border = "2px solid rgb(228, 29, 22)";
            fields[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        }
        validity=false;
        error.innerHTML="Duration should not exceed 3 days!";
        //window.alert("Duration should not exceed 3 days!");
    }
    
    if(fields2.value == ""){
        fields2.style.border = "2px solid rgb(228, 29, 22)";
        fields2.style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        validity = false;
    }

    if(parseInt(fields[0].value)>20){
        fields[0].style.border = "2px solid rgb(228, 29, 22)";
        fields[0].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        fields[0].value="";
        fields[0].placeholder = "Should be less than 20";
        validity = false;
    }

    if(parseInt(fields[0].value)<0){
        fields[0].style.border = "2px solid rgb(228, 29, 22)";
        fields[0].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
        fields[0].value="";
        fields[0].placeholder = "Invalid !";
        validity = false;
    }

    if (validity == false) event.preventDefault();
        
    return validity;
    
});