function createDetail() {
    document.getElementById('submitBtn').onclick=function(event){
        var name = document.getElementById('name');
        var email = document.getElementById('email');
        var acontent = document.getElementById('acontent');
        if (validateForm(name, email, acontent)) {
            document.questionForm.submit();
            window.location="answer.php";
        }
        else
        {
            event.preventDefault();
        }
    }
    createHandlerVoteQuestion();
    createHandlerVoteAnswer();
    document.cookie="refreshed=true;";
}


function getSpan(nodeList) {
    for(var i=0;i<nodeList.length;i++) {
        if(nodeList[i].className=="vote") {
            return nodeList[i];
        }
    }
}

function createHandlerVoteQuestion() {
    var qVote =document.getElementsByClassName("qVote");
    for(var i=0;i<qVote.length;i++) {
        qVote[i].onclick = function () {
            var $this = this;
            var http = new XMLHttpRequest();
            var url = "getVote.php";
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
                    document.getElementsByClassName("vote")[0].innerHTML = http.responseText;
                }
            }
            http.send(params);
        }
    }
}

function createHandlerVoteAnswer() {
    var aVote = document.getElementsByClassName("aVote");
    for(var i=0;i<aVote.length;i++) {
        aVote[i].onclick = function () {
            var $this = this;
            var http = new XMLHttpRequest();
            var url = "getVoteAnswer.php";
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