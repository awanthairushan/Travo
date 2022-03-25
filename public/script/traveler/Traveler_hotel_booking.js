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

