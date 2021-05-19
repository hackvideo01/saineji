 var goFS = document.getElementById("goFS");
    goFS.addEventListener("click", function() {
        document.documentElement.requestFullscreen();
        document.getElementById("goFS").hidden = true;
        document.getElementById("manage").hidden = true;
        // document.getElementById("Update").hidden = true;
        // document.getElementById("Login").hidden = true;
    }, false);