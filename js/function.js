function validateDelete(){
	if(confirm("Are you sure wanna delete this question?")){
		return true;
	}else{
		return false;
	}
}

function validasi(form){
	if(form.name.value){
		form.name.setAttribute("class", "textForm");
		if(validateEmail(form.email.value)){
			form.email.setAttribute("class", "textForm");
			if(form.topic.value){
				form.topic.setAttribute("class", "textForm");
				if(form.content.value){
					form.content.setAttribute("class", "textArea");
					return true;
				}else{
					form.content.setAttribute("class", "textArea errorForm");
					form.content.setAttribute("placeholder","Your Content blank");
					return false;
				}
			}else{
				form.topic.setAttribute("class", "textForm errorForm");
				form.topic.setAttribute("placeholder","Your Topic blank");
				return false;
			}
		}else{
			form.email.setAttribute("class", "textForm errorForm");
			form.email.value= "";
			form.email.setAttribute("placeholder","Your Email invalid");
			return false;
		}
	}else{
		form.name.setAttribute("class", "textForm errorForm");
		form.name.setAttribute("placeholder","Your Name blank");
		return false;
	}
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
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

var x = document.getElementById('closePopUp');
if (x != null){
	x.addEventListener("click",function(){
		var myElement = document.querySelector(".popUp");
		myElement.style.display = "none";
	});
}

var el = document.querySelector('.js-fade');
if (el.classList.contains('is-paused')){
  	el.classList.remove('is-paused');
}















