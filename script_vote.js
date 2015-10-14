function editVote(id) {
  var xhttp;

    if (id.indexOf("question") > -1)
    {
        kind = "question";
        id = id.replace("question_","");
    }
    else if (id.indexOf("answer") > -1)
    {
        kind = "answer";
        id = id.replace("answer_","");
    }
    
        
    if (id.indexOf("up") > -1)
    {
        id.replace("up","");
        var isUp = true;
    }
    else if (id.indexOf("down") > -1)
    {
        id.replace("down","");
        var isUp = false;
    }
    else
        var isUp = null;
    
          
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() 
  {
    if (xhttp.readyState == 4 && xhttp.status == 200) 
    {
        console.log(xhttp.responseText);
        if (isUp)
        {
   	        i = 1;
   	    }
        else
        {
   	        i = -1;
   	    }
        
        if(xhttp.responseText == "yes")
        {
            document.getElementById(kind+"Vote"+id).innerHTML = parseInt(document.getElementById(kind+"Vote"+id).innerHTML) + i;
        }
        else
        {
            //nothing
        }
    }
  }
  xhttp.open("GET", "vote.php?kind="+kind+"+&id="+id+"&isUp="+isUp, true);
  xhttp.send();   
}
