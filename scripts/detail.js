function createDetail() {
    makePresentation();
    createHandlerVoteQuestion();
    createDeleteHandlerForDetail();
    createEditHandlerForDetail();
    document.getElementById('submitBtn').onclick=function(event){
        var name = document.getElementById('name');
        var email = document.getElementById('email');
        var acontent = document.getElementById('acontent');
        if (validateForm(name, email, acontent)) {
            document.questionForm.submit();
        }
        else
        {
            event.preventDefault();
        }
    }
    document.cookie="refreshed=true;";
}


function makePresentation() {
    var x = document.getElementById("x").innerHTML;
    var res = JSON.parse(x);
    var answer = document.getElementsByClassName("answer")[0];
    for(var i=0;i<res.length;i++) {
        var row = document.createElement("div");
        row.className = "row clearfix";
        row.id = res[i].a_id;

        var vote = document.createElement("div");
        vote.className = "colVote";
        var arrowUp = document.createElement("div");
        arrowUp.className = "aVote arrow-up";
        var arrowDown = document.createElement("div");
        arrowDown.className = "aVote arrow-down";
        var voteVal = document.createElement("span");
        voteVal.className = "voteVal";
        voteVal.innerHTML = res[i].vote;

        vote.appendChild(arrowUp);
        vote.appendChild(voteVal);
        vote.appendChild(arrowDown);


        var ans = document.createElement("div");
        ans.className = "elemQDetail";

        var content = document.createElement("div");
        content.className = "elemQuestion elemA";
        content.innerHTML = res[i].acontent;

        var author = document.createElement("div");
        author.className="elemAuthor";
        var askedBy = document.createElement("span");
        askedBy.className="answeredBy";
        askedBy.innerHTML = "Answered By : ";

        var athr = document.createElement("div");
        athr.className="author";
        var name = document.createElement("span");
        name.className="name";
        name.innerHTML = res[i].email + " at " + res[i].date;
        athr.appendChild(name);

        author.appendChild(askedBy);
        author.appendChild(athr);

        ans.appendChild(content);
        ans.appendChild(author);

        row.appendChild(vote);
        row.appendChild(ans);
        answer.appendChild(row);
    }

    createHandlerVoteAnswer();

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
                    document.getElementsByClassName("qVoteVal")[0].innerHTML = http.responseText;
                }
            }
            http.send(params);
        }
    }
}

function getSpan(nodeList) {
    for(var i=0;i<nodeList.length;i++) {
        if(nodeList[i].className=="voteVal") {
            return nodeList[i];
        }
    }
}