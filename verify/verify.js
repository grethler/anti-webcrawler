/* Copyright Florian Grethler; info [at] grethler [dot] ch*/
(localStorage.getItem("verified") != "true"){
    var currentUrl = window.location.href;
    localStorage.setItem("url", currentUrl);
    window.open("verify/verify.html", "_self");
    if (localStorage.getItem("verified") == "true") {
      window.open(currentUrl, "_self");
    } else {
      window.open("verify/verify.html", "_self");
    }
  }