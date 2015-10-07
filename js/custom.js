function validate () {
    var valid = true;
    var allForms = document.forms;
    for (var i = 0; i < valid && allForms.length; ++i) {
        for (var j = 0; valid && j < allForms[i].elements.length; ++j) {
            var elem = allForms[i][j];
            valid = valid && (elem.value.length > 0);
            if (elem.name === "email") {
                var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
                if (!re.test(elem.value)) {
                    alert("Please use a valid email.");
                    return false;
                }
            }
        }
    }
    if (!valid)
        alert("Please fill all fields.");
    return valid;
}

function vote(type, id, action) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById(type + "-" + id).innerHTML = xhttp.responseText;
        }
    }
    xhttp.open("GET", "vote.php?id=" + id + "&type=" + type + "&action=" + action, true);
    xhttp.send();
}

function deleteQuestion(id) {
    if (confirm("Are you sure you want to delete this post?")) {
        document.location = "delete.php?id=" + id;
    }
}
