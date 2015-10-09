function validateForms(){
	var forms = document.forms;
	for(var i = 0; i < forms.length; i++){
		for(var j = 0; j < forms[i].elements.length; j++){
			if(forms[i][j].value == null || forms[i][j].value == ""){
				alert("Please fill out the entire form");
				return false;
			}
			if(forms[i][j].name == "email"){
				var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    		if(!re.test(forms[i][j].value)){
    			alert("Please use the correct email format\nexample: user@email.com");
    			forms[i][j].focus();
    			return false;
    		}
			}
		}
	}
}

function validateDelete(){
	var result = confirm("Are you sure you want to delete?");
	if(result){
		return true;
	}
	else{
		return false;
	}
}

function vote(id, type, act) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById(type+"-"+id).innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "vote.php?id="+id+"&type="+type+"&act="+act, true);
  xhttp.send();
} 