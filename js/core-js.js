function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "<center><small class='tagoutputt'>Your Result HERE</small></center>";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").style.display = "block";
              var doc =  document.getElementById("txtHint").innerHTML = this.responseText;
               document.getElementById("loader").style.display = "none";
            }
        };
        xmlhttp.open("GET", corejs.pluginsUrl+"tag.php?keyword=" + str, true);
        // Loader here
        document.getElementById("loader").style.display = "block";
        document.getElementById("txtHint").style.display = "none";
        
        xmlhttp.send();
    }
}

