function deleteConfirmation(id) {
    var r = confirm("Are you sure want to delete this question?");
    var link = window.location.href;
    if (r == true) {
        //window.location = link + "controllers/delete-question.controller.php?q_id=" + id;
        return true;
    } else {
        return false;
    }
}