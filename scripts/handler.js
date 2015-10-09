/**
 * Created by sorlawan on 09/10/15.
 */

function createDeleteHandlerForList() {
    var del = document.getElementsByClassName("delete");
    for(var i=0;i<del.length;i++) {
        console.log(del[i]);
        del[i].onclick = function() {
            var idDeleted = this.parentNode.parentNode.parentNode.parentNode.id;
            document.getElementsByName('idDeleted')[0].value = idDeleted;
            document.goToDelete.submit();
        }
    }
}

function createDeleteHandlerForDetail() {
    var del = document.getElementsByClassName("delete")[0];
        console.log(del);
        del.onclick = function() {
            document.goToDelete.submit();
        }
}