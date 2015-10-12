function validateQuestion(){      
  if(document.savequestion.name.value == "") {
    alert( "Please provide your name" );
    document.savequestion.name.focus() ;
    return false;
  }
        
  if(document.savequestion.email.value == ""){
    alert( "Please provide your e-mail" );
    document.savequestion.email.focus() ;
    return false;
  } else {
    var emailID = document.savequestion.email.value;
    atpos = emailID.indexOf("@");
    dotpos = emailID.lastIndexOf(".");

    if (atpos < 1 || ( dotpos - atpos < 2 )) {
      alert("Please enter a correct email address")
      document.savequestion.email.focus() ;
      return false;
    }
  }
    
  if(document.savequestion.topic.value == ""){
    alert( "Please provide your question topic" );
    document.savequestion.topic.focus() ;
    return false;
  }

  if(document.savequestion.content.value == ""){
    alert( "Please provide the content of your question" );
    document.savequestion.content.focus() ;
    return false;
  }

  return (true);
}

function validateAnswer(){      
  if(document.saveanswer.name_ans.value == "") {
    alert( "Please provide your name" );
    document.saveanswer.name_ans.focus() ;
    return false;
  }
        
  if(document.saveanswer.email_ans.value == ""){
    alert( "Please provide your e-mail" );
    document.saveanswer.email_ans.focus() ;
    return false;
  } else {
    var emailID = document.saveanswer.email_ans.value;
    atpos = emailID.indexOf("@");
    dotpos = emailID.lastIndexOf(".");

    if (atpos < 1 || ( dotpos - atpos < 2 )) {
      alert("Please enter a correct email address")
      document.saveanswer.email_ans.focus() ;
      return false;
    }
  }

  if(document.saveanswer.content_ans.value == ""){
    alert( "Please provide the content of your question" );
    document.saveanswer.content_ans.focus() ;
    return false;
  }

  return (true);
}

function validateEdit(){      
  if(document.editquestion.name.value == "") {
    alert( "Please provide your name" );
    document.editquestion.name.focus() ;
    return false;
  }
        
  if(document.editquestion.email.value == ""){
    alert( "Please provide your e-mail" );
    document.editquestion.email.focus() ;
    return false;
  } else {
    var emailID = document.editquestion.email.value;
    atpos = emailID.indexOf("@");
    dotpos = emailID.lastIndexOf(".");

    if (atpos < 1 || ( dotpos - atpos < 2 )) {
      alert("Please enter a correct email address")
      document.editquestion.email.focus() ;
      return false;
    }
  }
    
  if(document.editquestion.topic.value == ""){
    alert( "Please provide your question topic" );
    document.editquestion.topic.focus() ;
    return false;
  }

  if(document.editquestion.content.value == ""){
    alert( "Please provide the content of your question" );
    document.editquestion.content.focus() ;
    return false;
  }

  return (true);
}

function validateSearch(){      
  if(document.search.searchkey.value == "") {
    document.search.searchkey.focus() ;
    return false;
  }
  return true;
}