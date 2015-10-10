/**
 * Created by sorlawan on 09/10/15.
 */

function createDeleteHandlerForList() {
    var del = document.getElementsByClassName("delete");
    for(var i=0;i<del.length;i++) {
        del[i].onclick = function() {
            var idDeleted = this.parentNode.parentNode.parentNode.parentNode.id;
            document.getElementsByName('idDeleted')[0].value = idDeleted;
            document.goToDelete.submit();
        }
    }
}

function createDeleteHandlerForDetail() {
    var del = document.getElementsByClassName("delete")[0];
        del.onclick = function() {
            document.goToDelete.submit();
        }
}

function createEditHandlerForList() {
    var edit = document.getElementsByClassName("edit");
    for(var i=0;i<edit.length;i++) {
        edit[i].onclick = function() {
            var idEdited = this.parentNode.parentNode.parentNode.parentNode.id;
            document.getElementsByName('idEdited')[0].value = idEdited;
            document.goToEdit.submit();
        }
    }
}

function createEditHandlerForDetail() {
    var edit = document.getElementsByClassName("edit")[0];
    edit.onclick = function () {
        document.goToEdit.submit();
    }
}