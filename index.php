<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Simple Stack Exchange</title>
	</head>
	<body onload="load()">		
		<a href="index.php"><H2>SIMPLE STACK EXCHANGE</H2></a>
		<form action="index.php" method="post">
			<input type="text" name="keyword">
			<input type="submit" value="Search">
			<p id=1>
				Can't find what you are looking for? <a href="ask.php?mode=0">Ask Here</a>
			</p>
		</form>	
		<H4>Recently Asked Questions</H4>
		<p id='RAQ'><p>
		
		<script>
		function load() {
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("RAQ").innerHTML = xmlhttp.responseText;
			    }
			}	
			xmlhttp.open("GET","list.php",true);
			xmlhttp.send();			
		}
		function del(id, topic, asker) {
			var r = confirm("Are you sure to delete question '" + topic + "' asked by [" + asker + "]?");
		    
			if (r == true) {
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					load();					
				    }			 
				}
				xhttp.open("GET", "del.php?id="+id, true);
				xhttp.send();		
				alert("Delete Success!");				
			}

			
		}
		</script>		
	
	</body>
</html>
