function validateForm() {
    var p = document.forms["searchQuestion"]["search"].value;
    if (p == null || p == "" ) {
        alert("Search must be filled out");
        return false;
    }	
}