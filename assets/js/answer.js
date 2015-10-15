(function(){
    var _ajax, questionUpvoteAttempt = 0, questionDownvoteAttempt = 0, answerUpvoteAttempt = 0, answerDownvoteAttempt = 0, postAnswerAttempt = 0;

    (function(){
        var XHR = new XMLHttpRequest();
        var urlEncodedData = "";
        var urlEncodedDataPairs = [];

        _ajax = function(action, firstArg, secondArg, thirdArg){
            if (action == "new"){
                XHR = new XMLHttpRequest();
                urlEncodedData = "";
                urlEncodedDataPairs = [];
            } else if (action == "prepare") {
                urlEncodedDataPairs.push(encodeURIComponent(firstArg) + '=' + encodeURIComponent(secondArg));
            } else if (action == "send"){
                // We combine the pairs into a single string and replace all encoded spaces to 
                // the plus character to match the behaviour of the web browser form submit.
                urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

                XHR.open('POST', firstArg);

                // We add the required HTTP header to handle a form data POST request
                XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                XHR.setRequestHeader('Content-Length', urlEncodedData.length);

                XHR.onreadystatechange = function() {
                    if (XHR.readyState === 4) {
                        if (XHR.status === 200) {
                            secondArg(JSON.parse(XHR.responseText).data);
                        } else {
                            thirdArg(JSON.parse(XHR.responseText).message);
                        }
                    }
                }

                // And finally, We send our data.
                XHR.send(urlEncodedData);
            }
        }
    })();

    document.getElementsByClassName('delete')[0].onclick = function(event){
        if (confirm("Are you sure you want to delete this question ?")){
            window.location = "/ajax/question/delete.php?id=" + document.getElementById('question-id').getAttribute('data-id');
        }
    }

    document.getElementsByClassName('edit')[0].onclick = function(event){
        window.location = "/question/edit.php?id=" + document.getElementById('question-id').getAttribute('data-id') + "&ref=" + window.location.href;
    }

    document.getElementsByClassName('question-arrow-up')[0].onclick = function(){
        questionUpvoteAttempt = 1;
        var url = "/ajax/question/upvote.php";

        var _this = this;
        var succeedCallback = function(){
            _this.parentElement.getElementsByClassName('votes')[0].innerHTML = parseInt(_this.parentElement.getElementsByClassName('votes')[0].innerHTML) + 1;
        }

        var id = this.parentElement.parentElement.getAttribute("data-id");

        _ajax("create");
        _ajax("prepare", "id", id);
        _ajax("send", url, succeedCallback);
    }

    document.getElementsByClassName('question-arrow-down')[0].onclick = function(){
        questionDownvoteAttempt = 1;
        var url = "/ajax/question/downvote.php";

        var _this = this;
        var succeedCallback = function(){
            _this.parentElement.getElementsByClassName('votes')[0].innerHTML = parseInt(_this.parentElement.getElementsByClassName('votes')[0].innerHTML) - 1;
        }

        var id = this.parentElement.parentElement.getAttribute("data-id");

        _ajax("create");
        _ajax("prepare", "id", id);
        _ajax("send", url, succeedCallback);
    }

    voteUp = document.getElementsByClassName('answer-arrow-up');
    voteDown = document.getElementsByClassName('answer-arrow-down');

    var bindAnswerUpvote = function(){
        answerUpvoteAttempt = 1;
        var url = "/ajax/answer/upvote.php";

        var _this = this;
        var succeedCallback = function(){
            _this.parentElement.getElementsByClassName('votes')[0].innerHTML = parseInt(_this.parentElement.getElementsByClassName('votes')[0].innerHTML) + 1;
        }

        var id = this.parentElement.parentElement.getAttribute("data-id");

        _ajax("create");
        _ajax("prepare", "id", id);
        _ajax("send", url, succeedCallback);
    };

    var bindAnswerDownvote = function(){
        answerDownvoteAttempt = 1;
        var url = "/ajax/answer/downvote.php";

        var _this = this;
        var succeedCallback = function(){
            _this.parentElement.getElementsByClassName('votes')[0].innerHTML = parseInt(_this.parentElement.getElementsByClassName('votes')[0].innerHTML) - 1;
        }

        var id = this.parentElement.parentElement.getAttribute("data-id");

        _ajax("create");
        _ajax("prepare", "id", id);
        _ajax("send", url, succeedCallback);
    };

    for (var i=0;i<voteUp.length;i++){
        voteUp[i].onclick = bindAnswerUpvote;
    }

    for (var i=0;i<voteDown.length;i++){
        voteDown[i].onclick = bindAnswerDownvote;
    }

    function prepend(node, el) { node.insertBefore(el ,node.children[0]); }

    function showError(errorMessage){
        var node = document.createElement("div"),
        textnode = document.createTextNode(errorMessage);

        node.setAttribute("id", "error-message");
        node.appendChild(textnode);
        prepend(document.getElementById("your-answer"), node);

        errorMessage = "";
    }

    function appendNewAnswer(data){
        var node = document.createElement("tr");
        node.setAttribute("data-id", data.id);        

        node.innerHTML =    '<td width="50"> \
                                <div class="answer-arrow-up"></div> \
                                <div class="votes">' + data.votes + '</div> \
                                <div class="answer-arrow-down"></div> \
                            </td> \
                            <td> \
                                <div>' + data.content +
                                    '<div class="action"> \
                                        Answered by ' + data.name + ' at ' + data.create_time + 
                                    '</div> \
                                </div> \
                            </td>';

        document.getElementById('answer').getElementsByTagName('tbody')[0].appendChild(node);

        node.getElementsByClassName('answer-arrow-up')[0].onclick = bindAnswerUpvote;
        node.getElementsByClassName('answer-arrow-down')[0].onclick = bindAnswerDownvote;
    }

    document.getElementsByClassName('post-btn')[0].onclick = function(event){
        var url = "", errorMessage = "", email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

        if (document.getElementById('error-message')){
            document.getElementById('your-answer').removeChild(document.getElementById('error-message'));
        }

        postAnswerAttempt = 1;

        var name = document.getElementById('name').value,
        email = document.getElementById('email').value,
        content = document.getElementById('content').value,
        id = "";

        function successCallback(data){
            appendNewAnswer(data);
            var node = document.getElementById("answer").getElementsByTagName("th")[0].getElementsByTagName("span")[0];
            node.innerHTML = parseInt(node.innerHTML) + 1;
            postAnswerAttempt = 0;
        }

        function errorCallback(errorMessage){
            showError(errorMessage);
        }

        if (name == ''){
            errorMessage = "Name should not be empty";
        } else if (email == ''){
            errorMessage = "Email should not be empty";
        } else if (!email_re.test(email)){
            errorMessage = "Invalid Email Address";
        } else if (content == ''){
            errorMessage = "Content should not be empty";
        }
        
        if (errorMessage != ""){
            showError(errorMessage);
            return false;
        }

        _ajax("create");

        _ajax("prepare", "name", name);
        _ajax("prepare", "email", email);
        _ajax("prepare", "content", content);
        _ajax("prepare", "id", document.getElementById('question-id').getAttribute('data-id'));

        url = "/ajax/answer/post.php";

        _ajax("send", url, successCallback, errorCallback);
        return false;
    }
})();