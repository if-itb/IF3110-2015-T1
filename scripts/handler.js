/**
 * Created by sorlawan on 09/10/15.
 */

// Handler untuk vote jawaban
function createHandlerVoteAnswer() {
    var aVote = document.getElementsByClassName("aVote");
    for(var i=0;i<aVote.length;i++) {
        aVote[i].onclick = function () {
            // AJAX request
            var $this = this;
            var http = new XMLHttpRequest();
            var url = "doVoteAnswer.php";
            var aID = $this.parentNode.parentNode.id;
            var params;
            // Set parameter AJAX
            if ($this.className.indexOf("up")!=-1)
                params = "aID=" + aID + "&operation=plus";
            else
                params = "aID=" + aID + "&operation=minus";

            http.open("POST", url, true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            http.setRequestHeader("Content-length", params.length);
            http.setRequestHeader("Connection", "close");

            http.onreadystatechange = function () {
                if (http.readyState == 4 && http.status == 200) {
                    getSpan($this.parentNode.childNodes).innerHTML = http.responseText;
                }
            }
            http.send(params);
        }
    }
}

// Handler untuk vote Pertanyaan
function createHandlerVoteQuestion() {
    var qVote =document.getElementsByClassName("qVote");
    for(var i=0;i<qVote.length;i++) {
        qVote[i].onclick = function () {
            // AJAX request
            var $this = this;
            var http = new XMLHttpRequest();
            var url = "doVoteQuestion.php";
            var qID = document.getElementById("idClicked").innerHTML;
            var params;
            // Set parameter AJAX
            if ($this.className.indexOf("up")!=-1)
                params = "qID=" + qID + "&operation=plus";
            else
                params = "qID=" + qID + "&operation=minus";

            http.open("POST", url, true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            http.setRequestHeader("Content-length", params.length);
            http.setRequestHeader("Connection", "close");

            http.onreadystatechange = function () {
                if (http.readyState == 4 && http.status == 200) {
                    document.getElementsByClassName("qVoteVal")[0].innerHTML = http.responseText;
                }
            }
            http.send(params);
        }
    }
}

// Handler Delete pertanyaan untuk list/index page
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

// Handler Delete pertanyaan untuk detail page (detail.php)
function createDeleteHandlerForDetail() {
    var del = document.getElementsByClassName("delete")[0];
        del.onclick = function() {
            document.goToDelete.submit();
        }
}

// Handler Edit pertanyaan untuk list/index page
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

// Handler Edit pertanyaan untuk detail page (detail.php)
function createEditHandlerForDetail() {
    var edit = document.getElementsByClassName("edit")[0];
    edit.onclick = function () {
        document.goToEdit.submit();
    }
}

// Fungsi untuk mencari node dengan nama kelas 'voteVal'
function getSpan(nodeList) {
    for(var i=0;i<nodeList.length;i++) {
        if(nodeList[i].className=="voteVal") {
            return nodeList[i];
        }
    }
}