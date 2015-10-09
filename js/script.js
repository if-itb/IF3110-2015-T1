//function loadXMLDoc() {
//    "use strict";
//    var xmlhttp;
//    xmlhttp = new XMLHttpRequest();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
//        // do something if the page loaded successfully
//        }
//    };
//    
//    xmlhttp.open("GET", "ajax_file.php", true);
//    xmlhttp.send();
//}

function submitform() {
    "use strict";
    document.forms["idnya"].submit();
}