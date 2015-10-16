function validateForm() {
    var name = document.getElementById("name").value;
    if (name == null || name == "") {
        alert("Name must be filled out");
        return false;
    } else {
    	return true;
    }
}