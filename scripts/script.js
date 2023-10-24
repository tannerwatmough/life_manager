  // Script from https://www.w3schools.com/howto/howto_js_collapsible.asp
  // Toggles the table to display or not. 
  var collapsible = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < collapsible.length; i++) {
    collapsible[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.display === "none") {
        content.style.display = "block";
      } else {
        content.style.display = "none";
      }
    });
  }