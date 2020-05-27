filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  
  x = document.getElementsByClassName("column");
  var j = document.getElementById("controlTable");
  if (c == "all"){
    c = "";
  }


  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
  
  
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

var botones = document.querySelector("#myBtnContainer").children;
for(var i = 0; i < botones.length; i++){
  botones[i].addEventListener("click", function(){
    for(var j = 0; j < botones.length; j++){
      botones[j].classList.remove("active");
    }
    this.classList.add("active");
  });
}
