document.addEventListener('DOMContentLoaded', function() {
    
    function validateEmail(email) {
        var emailPattern =  /.+@.+/;
        return emailPattern.test(email);
    }
    
    function validateForm(name) {
        return name !== "";
    }


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