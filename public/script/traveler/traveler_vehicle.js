var hiddenfilter = document.querySelector(".filter_form");
var addfilterbtn = document.querySelector(".filterbtn");
var submitfilterbtn = document.querySelector(".filtersubmitbtn");

addfilterbtn.addEventListener("click", function(e){
  hiddenfilter.style.display = "block";
});

// window.onclick = function(e) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }
submitfilterbtn.addEventListener("click", function(){
   hiddenfilter.style.display = "none";
 });

let table = document.getElementById('vehicle_table');
var type = document.getElementById('vehicletype');
var seats = document.getElementById('seats');
var area = document.getElementById('area');
var ac = document.getElementById('AC');

function filterVValue() {

    const vehicles = document.getElementsByClassName('vtable');
    const vtype = document.getElementsByClassName('vtype');
    const vseats = document.getElementsByClassName('vpassengers');
    const varea = document.getElementsByClassName('vareatype');
    const vac = document.getElementsByClassName('vac');    
    

    for (let i = 0; i < vehicles.length; i++) {

      var extra=0;
    
      if(type.value == "all" || type.value == vtype[i].innerHTML ){
          extra=extra+1;
      }

      if(ac.value == "all" || ac.value == vac[i].innerHTML ){
        extra=extra+1;
      }

      if(area.value == "all" || area.value == varea[i].innerHTML ){
        extra=extra+1;
      }

      if(seats.value == "all" || seats.value == vseats[i].innerHTML ){
        extra=extra+1;
      }

        // if (type.value ==  &&  seats.value == vseats[i].innerHTML && area.value == varea[i].innerHTML && ac.value == vac[i].innerHTML) {
        if(extra == 4){
          vehicles[i].style.display="block";
        }
        else{
          vehicles[i].style.display="none"; 
        }
    //     // console.log(vehicles[i + 1]);

    }

}