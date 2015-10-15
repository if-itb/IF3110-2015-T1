(function(){

    function prepend(node, el) { node.insertBefore(el ,node.children[0]); }

    var _ajax, submitAttempt = 0;

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
                            secondArg();
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

    function showError(errorMessage){
        var node = document.createElement("div"),
        textnode = document.createTextNode(errorMessage);

        node.setAttribute("id", "error-message");
        node.appendChild(textnode);
        prepend(document.getElementById("ask"), node);

        errorMessage = "";
    }

    function gup( name, url ) {
        if (!url) url = location.href
        name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
        var regexS = "[\\?&]"+name+"=([^&#]*)";
        var regex = new RegExp( regexS );
        var results = regex.exec( url );
        return results == null ? null : results[1];
    }

    document.getElementsByClassName('post-btn')[0].onclick = function(event){
        var url = "", errorMessage = "", email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

        if (document.getElementById('error-message')){
            document.getElementById('ask').removeChild(document.getElementById('error-message'));
        }

        submitAttempt = 1;

        var name = document.getElementById('name').value,
        email = document.getElementById('email').value,
        topic = document.getElementById('topic').value,
        content = document.getElementById('content').value,
        id = "";

        function successCallback(){
            window.location = gup("ref") ? gup("ref") : "/";
            submitAttempt = 0;
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
        } else if (topic == ''){
            errorMessage = "Topic should not be empty";
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
        _ajax("prepare", "topic", topic);
        _ajax("prepare", "content", content);

        // Not Edit Mode
        if (document.getElementById("question-id")) {
            // Edit Mode
            url = "/ajax/question/edit.php";

            _ajax("prepare", "id", document.getElementById("question-id").getAttribute("data-id"));
        } else {
            url = "/ajax/question/post.php";
        }

        _ajax("send", url, successCallback, errorCallback);
        return false;
    }

})();