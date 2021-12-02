var modal1 = document.querySelector(".modal1");
var modal2 = document.querySelector(".modal2");
var modal3 = document.querySelector(".modal3");
var details_btn = document.querySelector("#trip_details_btn");
var budget_btn = document.querySelector("#budget_btn");
var route_btn = document.querySelector("#route_btn");


route_btn.addEventListener("click", function(e){
  modal3.style.display = "block";
  modal2.style.display = "none";
  modal1.style.display = "none";
});

details_btn.addEventListener("click", function(e){
    modal1.style.display = "block";
    modal2.style.display = "none";
    modal3.style.display = "none";
  });

budget_btn.addEventListener("click", function(e){
    modal1.style.display = "none";
    modal2.style.display = "block";
    modal3.style.display = "none";
});

