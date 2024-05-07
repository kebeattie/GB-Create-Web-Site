var x = document.getElementById("links");

function myFunction() {
  
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

}

window.matchMedia("(orientation: landscape)").addEventListener("change", e => {
  x.style.display = "none";
});

