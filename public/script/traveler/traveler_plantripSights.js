let limit =  parseInt(document.getElementById("limit").value)+1;

let type="";
let max=5;



  let checks1 = document.querySelectorAll(".sights1");
  for (var i = 0; i < checks1.length; i++){
    checks1[i].onclick = selectiveCheck1;
  }

  if(limit==2){
    let checks2 = document.querySelectorAll(".sights2");
    for (var i = 0; i < checks2.length; i++){
      checks2[i].onclick = selectiveCheck2;
    }
  }

  if(limit==3){
    let checks2 = document.querySelectorAll(".sights2");
    for (var i = 0; i < checks2.length; i++){
      checks2[i].onclick = selectiveCheck2;
    }

    let checks3 = document.querySelectorAll(".sights3");
    for (var i = 0; i < checks3.length; i++){
      checks3[i].onclick = selectiveCheck3;
    }
  }
  


function selectiveCheck1 (event) {
  var checkedChecks = document.querySelectorAll(".sights1:checked");
  if (checkedChecks.length >= max + 1)
    return false;
}

function selectiveCheck2 (event) {
  var checkedChecks = document.querySelectorAll(".sights2:checked");
  if (checkedChecks.length >= max + 1)
    return false;
}

function selectiveCheck3 (event) {
  var checkedChecks = document.querySelectorAll(".sights3:checked");
  if (checkedChecks.length >= max + 1)
    return false;
}


 
 
 
