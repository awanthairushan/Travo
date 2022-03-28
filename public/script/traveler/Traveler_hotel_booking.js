function increaseSValue() {
  var value = parseInt(document.getElementById("Snumber").value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById("Snumber").value = value;
}

function decreaseSValue() {
  var value = parseInt(document.getElementById("Snumber").value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById("Snumber").value = value;
}

function increaseDValue() {
  var value = parseInt(document.getElementById("Dnumber").value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById("Dnumber").value = value;
}

function decreaseDValue() {
  var value = parseInt(document.getElementById("Dnumber").value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById("Dnumber").value = value;
}

function increaseFValue() {
  var value = parseInt(document.getElementById("Fnumber").value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById("Fnumber").value = value;
}

function decreaseFValue() {
  var value = parseInt(document.getElementById("Fnumber").value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById("Fnumber").value = value;
}

function increaseMValue() {
  var value = parseInt(document.getElementById("Mnumber").value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById("Mnumber").value = value;
}

function decreaseMValue() {
  var value = parseInt(document.getElementById("Mnumber").value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById("Mnumber").value = value;
}

const fields = document.getElementsByClassName("rnumber");
const cancelbtn = document.getElementById("cancelbtn");

let count=0;

if( document.getElementById("error").value=="error"){
  for(let i=0;i<fields.length;i++){
    fields[i].style.border = "2px solid rgba(250, 39, 39, 0.801)";
    fields[i].style.backgroundColor = "rgba(238, 156, 156, 0.788)";
  }

  count=1;
}

cancelbtn.addEventListener("click", function(event){
  if(count==1){
    history.go(-1);
  }{
    history.back();
  }
});
