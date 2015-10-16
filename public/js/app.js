document.addEventListener('DOMContentLoaded', function() {
    
    function validateEmail(email) {
        var emailPattern =  /\w+@\w+\.\w+/;
        return emailPattern.test(email);
    }
    
    function validateForm(name) {
        return name !== "";
    }

    // Vote question with AJAX
    [].forEach.call(document.querySelectorAll('.vote-question'), function(el) {
        el.addEventListener('click', function(e) {
            e.preventDefault();

            var questionId = el.dataset.idQuestion;
            var vote = el.dataset.vote;

            // Create XHR Object
            var xhr = new XMLHttpRequest();
            var url = 'vote'
            var qry = 'id_question=' + questionId + '&vote=' + vote;

            // Send POST
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
            xhr.send(qry); 


            // Update vote counts
            xhr.onreadystatechange = function() {
                var voteContainer = document.getElementById('question-vote-' + questionId);    
                if (xhr.readyState == 4 && xhr.status == 200) {
                    voteContainer.innerHTML = xhr.responseText;
                }
            }

        });
    });

    // Vote answer with AJAX
    [].forEach.call(document.querySelectorAll('.vote-answer'), function(el) {
        el.addEventListener('click', function(e) {
            e.preventDefault();

            var answerId = el.dataset.idAnswer;
            var vote = el.dataset.vote;

            // Create XHR Object
            var xhr = new XMLHttpRequest();
            var url = 'vote'
            var qry = 'id_answer=' + answerId + '&vote=' + vote;

            console.log(qry);

            // Send POST
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
            xhr.send(qry); 


            // Update votecounts;
            var voteContainer = document.getElementById('answer-vote-' + answerId);
            if (vote === 'up') {
                voteContainer.innerHTML = parseInt(voteContainer.innerHTML) + 1;
            } else {
                voteContainer.innerHTML = parseInt(voteContainer.innerHTML) - 1;
            }

        });
    });


    // Validate question form
    var questionForm = document.getElementById('questionForm');
    var submitQuestionForm = document.getElementById('submitQuestionForm');

    if (submitQuestionForm !== null) {
        submitQuestionForm.addEventListener('click', function(e) {
            e.preventDefault();

            var name = validateForm(document.getElementById('name').value);
            var email = validateEmail(document.getElementById('email').value);
            var topic = validateForm(document.getElementById('topic').value);
            var content = validateForm(document.getElementById('content').value);

            if (name && email && topic && content) {
                questionForm.submit();
            } else {
                if (!name) {
                    alert("Please insert your name");
                    return;
                }
                if (!email) {
                    alert("Please insert valid email address");
                    return
                }
                if (!topic) {
                    alert("Please insert your topic");
                    return
                }
                if (!content) {
                    alert("Please insert your content");
                    return
                }
            }
        });
    }


    // Validate answer form
    var answerForm = document.getElementById('answerForm');
    var submitAnswerForm = document.getElementById('submitAnswerForm');

    if (submitAnswerForm !== null) {
        submitAnswerForm.addEventListener('click', function(e) {
            e.preventDefault();

            var name = validateForm(document.getElementById('name').value);
            var email = validateEmail(document.getElementById('email').value);
            var content = validateForm(document.getElementById('content').value);

            if (name && email && content) {
                answerForm.submit();
                console.log("owowowow")
            } else {
                if (!name) {
                    alert("Please insert your name");
                    return;
                }
                if (!email) {
                    alert("Please insert valid email address");
                    return
                }
                if (!content) {
                    alert("Please insert your content");
                    return
                }
            }
        });
    }

    // Delete confirmation
    [].forEach.call(document.querySelectorAll('.form-delete'), function(el) {
        el.addEventListener('click', function(e) {
            e.preventDefault();

            var formId = el.dataset.formId;
            var formEl = document.getElementById(formId);

            console.log(formEl);
            if (confirm('Are you sure want to delete this?')) {
                formEl.submit();
            }
        });
    });

})