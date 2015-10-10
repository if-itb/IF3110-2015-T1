/**
 * Created by sorlawan on 09/10/15.
 */

function createHandlerVoteAnswer() {
    var aVote = document.getElementsByClassName("aVote");
    for(var i=0;i<aVote.length;i++) {
        aVote[i].onclick = function () {
            var $this = this;
            var http = new XMLHttpRequest();
            var url = "doVoteAnswer.php";
            var aID = $this.parentNode.parentNode.id;
            var params;
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

function createHandlerVoteQuestion() {
    var qVote =document.getElementsByClassName("qVote");
    for(var i=0;i<qVote.length;i++) {
        qVote[i].onclick = function () {
            var $this = this;
            var http = new XMLHttpRequest();
            var url = "doVoteQuestion.php";
            var qID = document.getElementById("idClicked").innerHTML;
            var params;

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

function getSpan(nodeList) {
    for(var i=0;i<nodeList.length;i++) {
        if(nodeList[i].className=="voteVal") {
            return nodeList[i];
        }
    }
}