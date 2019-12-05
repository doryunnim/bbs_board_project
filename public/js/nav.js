window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
    document.getElementById("mainNav").style.paddingTop = "0rem";
    document.getElementById("mainNav").style.paddingBottom = "0rem";
    document.getElementsByClassName("navbar-toggler").style.fontSize = "1.75em";
  } else {
    document.getElementById("mainNav").style.paddingTop = "1rem";
    document.getElementById("mainNav").style.paddingBottom = "1rem";
    document.getElementsByClassName("navbar-toggler").style.fontSize = "1.9em";
  }
}