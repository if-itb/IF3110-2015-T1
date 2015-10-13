function voteUp(url, success) { 
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            success();
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();		
}

document.getElementById("question-arrow-up").onclick = function(){
	var _this=this;
	function success(){
		_this.parentNode.getElementsByTagName("h2")[0].innerHTML=parseInt(_this.parentNode.getElementsByTagName("h2")[0].innerHTML)+1;
	}
	url = "upvotequestion.php?id="+ this.getAttribute("data-id");
	voteUp(url,success);
}

document.getElementById("question-arrow-down").onclick = function(){
	var _this=this;
	function success(){
		_this.parentNode.getElementsByTagName("h2")[0].innerHTML=parseInt(_this.parentNode.getElementsByTagName("h2")[0].innerHTML)-1;
	}
	url = "downvotequestion.php?id="+ this.getAttribute("data-id");
	voteUp(url,success);
}

var aup = document.getElementsByClassName("arrow-up");
for(var i = 0;i<aup.length;i++){
	aup[i].onclick = function(){
		var _this=this;
		function success(){
			_this.parentNode.getElementsByTagName("h2")[0].innerHTML=parseInt(_this.parentNode.getElementsByTagName("h2")[0].innerHTML)+1;
		}
		url = "upvoteanswer.php?id="+ this.getAttribute("data-id");
		voteUp(url,success);
	}
}

var adown = document.getElementsByClassName("arrow-down");
for(var i = 0;i<adown.length;i++){
	adown[i].onclick = function(){
		var _this=this;
		function success(){
			_this.parentNode.getElementsByTagName("h2")[0].innerHTML=parseInt(_this.parentNode.getElementsByTagName("h2")[0].innerHTML)-1;
		}
		url = "downvoteanswer.php?id="+ this.getAttribute("data-id");
		voteUp(url,success);
	}
}
