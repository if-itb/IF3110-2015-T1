function Vote(url, success) { 
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

var voteup = document.getElementsByClassName("arrow-up-question");
for(var i = 0;i<voteup.length;i++){
	voteup[i].onclick = function(){
		var _this=this;
		function success(){
			_this.parentNode.getElementsByTagName("h2")[0].innerHTML=parseInt(_this.parentNode.getElementsByTagName("h2")[0].innerHTML)+1;
		}
		url = "voteupquestiondata.php?id="+ this.getAttribute("data-id");
		Vote(url,success);
	}
}

var voteup = document.getElementsByClassName("arrow-up-answer");
for(var i = 0;i<voteup.length;i++){
	voteup[i].onclick = function(){
		var _this=this;
		function success(){
			_this.parentNode.getElementsByTagName("h2")[0].innerHTML=parseInt(_this.parentNode.getElementsByTagName("h2")[0].innerHTML)+1;
		}
		url = "voteupanswerdata.php?id="+ this.getAttribute("data-id");
		Vote(url,success);
	}
}

var votedown = document.getElementsByClassName("arrow-down-question");
for(var i = 0;i<votedown.length;i++){
	votedown[i].onclick = function(){
		var _this=this;
		function success(){
			_this.parentNode.getElementsByTagName("h2")[0].innerHTML=parseInt(_this.parentNode.getElementsByTagName("h2")[0].innerHTML)-1;
		}
		url = "votedownquestiondata.php?id="+ this.getAttribute("data-id");
		Vote(url,success);
	}
}

var votedown = document.getElementsByClassName("arrow-down-answer");
for(var i = 0;i<votedown.length;i++){
	votedown[i].onclick = function(){
		var _this=this;
		function success(){
			_this.parentNode.getElementsByTagName("h2")[0].innerHTML=parseInt(_this.parentNode.getElementsByTagName("h2")[0].innerHTML)-1;
		}
		url = "votedownanswerdata.php?id="+ this.getAttribute("data-id");
		Vote(url,success);
	}
}

