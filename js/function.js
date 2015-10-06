function validasi(form){
	if(form.name.value&&form.email.value&&form.topic.value&&form.content.value){
		if(form.email.value.indexOf("@") > -1){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function sendRequest(){
	var id = this.id;
	var kind,isup,i;

	if(this.id.indexOf("Question") > -1){
		kind = "question";
		id = id.replace("Question","");
	}else if(this.id.indexOf("Answer") > -1){
		kind = "answer";
		id = id.replace("Answer","");
	}

	if(this.classList.contains('up')){
		isup = true;
		id = id.replace("up","");
	}else if(this.classList.contains('down')){
		isup = false;
		id = id.replace("down","");
	}else{
		isup = null;
	}

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    	if (xhttp.readyState == 4 && xhttp.status == 200) {
     		//document.getElementById("demo").innerHTML = xhttp.responseText;
     		console.log(xhttp.responseText);
   			if (isup){
   				i = 1;
   			}else{
   				i = -1;
   			}
     		if(xhttp.responseText == "success"){
     			document.getElementById(kind+"Vote"+id).innerHTML = parseInt(document.getElementById(kind+"Vote"+id).innerHTML) + i;
     		}else{
     			//nothing
     		}
    	}
	}
	var url = "server.php?kind="+kind+"&id="+id+"&isup="+isup;
	xhttp.open("GET", url, true);
  	xhttp.send();
}

var voteEl =  document.getElementsByClassName('vote');

for (var i=0;i<voteEl.length;i++){
    voteEl[i].addEventListener("click", sendRequest);
}

















