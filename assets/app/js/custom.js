$(document).ready(function () {
  var count_particles, stats, update;
  stats = new Stats();
  stats.setMode(0);
  stats.domElement.style.position = "relative";
  stats.domElement.style.left = "0px";
  stats.domElement.style.top = "0px";
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector(".js-count-particles");
  update = function () {
    stats.begin();
    stats.end();
    if (
      window.pJSDom[0].pJS.particles &&
      window.pJSDom[0].pJS.particles.array
    ) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
});

var i = 0;
var WelcomeText = "Welcome at GauravinghigC, where we are ";
var speed = 60; /* The speed/duration of the effect in milliseconds */
window.onload = function () {
  typeWriter();
};

function typeWriter() {
  if (i < WelcomeText.length) {
    document.getElementById("WelcomeText").innerHTML += WelcomeText.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}

$(document).ready(function () {
  // Add smooth scrolling to all links
  $("a").on("click", function (event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $("html, body").animate(
        {
          scrollTop: $(hash).offset().top,
        },
        2000,
        function () {
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        }
      );
    } // End if
  });
});

  //loader view
  //loader script
 document.onreadystatechange = function() {
  if (document.readyState !== "complete") {
   document.querySelector("body").style.visibility = "hidden";
   document.querySelector("#loader").style.visibility = "visible";
  } else {
   document.querySelector("#loader").style.display = "none";
   document.querySelector("body").style.visibility = "visible";
  }
 };

 
 //action btn on click
 function actionBtn(type, text) {
  document.getElementById("" + type + "").innerHTML = "<i class='fa fa-spinner fa-spin'></i> " + text;
  document.getElementById("" + type + "").classList.remove("btn-primary");
  document.getElementById("" + type + "").classList.remove("btn-success");
  document.getElementById("" + type + "").classList.remove("btn-danger");
  document.getElementById("" + type + "").classList.remove("btn-warning");
  document.getElementById("" + type + "").classList.remove("btn-dark");
  document.getElementById("" + type + "").classList.remove("square");
  document.getElementById("" + type + "").classList.add("app-bg");
  document.getElementById("" + type + "").classList.add("text-black");
}
 
//databar hide show
function Databar(data) {
  databar = document.getElementById("" + data + "");
  if (databar.style.display === "block") {
   databar.style.display = "none";
  } else {
   databar.style.display = "block";
  }
}
 
//data bar 2 with action change
function Databar2(data, text)
{
  databar = document.getElementById("" + data + "");
  if (databar.style.display === "block") {
   databar.style.display = "none";
   document.getElementById("" + text + "").classList.remove("btn-danger");
   document.getElementById("" + text + "").classList.add("btn-primary");
   document.getElementById("" + text + "").innerHTML = "Add New";
  } else {
   databar.style.display = "block";
   document.getElementById("" + text + "").classList.remove("btn-primary");
   document.getElementById("" + text + "").classList.add("btn-danger");
   document.getElementById("" + text + "").innerHTML = "Close Form";
  }
 }

 //scroll acitivity
  window.onscroll = function() {
  myFunction();
 };
 var header2 = document.getElementById("header");
 var sticky = header2.offsetTop;

 function myFunction() {
  if (window.pageYOffset > sticky) {
   header2.classList.add("fixed-top");
   header2.classList.add("sh-1");
  } else {
   header2.classList.remove("fixed-top");
   header2.classList.remove("sh-1");
  }
 }

 //count data