function validateSearch() {
    var a = document.forms["Searchquestion"]["Search"].value;
    if (a == null || a == "") {
        alert("Search must be filled out");
        return false;
    }
}