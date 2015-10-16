function validateForm() {
    var name = document.forms["createquestion"]["username"].value;
    var email = document.forms["createquestion"]["useremail"].value;
    var topic = document.forms["createquestion"]["qtopic"].value;
    var content = document.forms["createquestion"]["qcontent"].value;
    if (name == "" || name == null) {
        alert("Name must be filled");
        document.createquestion.username.focus();
        return false;
    }
    if (email == "" || email == null) {
        alert("Email must be filled");
        document.createquestion.useremail.focus();
        return false;
    }
    var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
    var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
    var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
    var sQuotedPair = '\\x5c[\\x00-\\x7f]';
    var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
    var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
    var sDomain_ref = sAtom;
    var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
    var sWord = '(' + sAtom + '|' + sQuotedString + ')';
    var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
    var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
    var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
    var sValidEmail = '^' + sAddrSpec + '$'; // as whole string

    var reValidEmail = new RegExp(sValidEmail);
    if (!reValidEmail.test(email)) {
        alert("Email is in wrong format");
        return false;
    }
    if (topic == "" || topic == null) {
        alert("Question topic must be filled");
        document.createquestion.qtopic.focus();
        return false;
    }
    if (content == "" || content == null) {
        alert("Content must be filled");
        document.createquestion.qcontent.focus();
        return false;
    }
}

