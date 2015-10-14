<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Simple Stack Exchange</title>
		<link rel="stylesheet" type="text/css" href="style.css">	
	</head>
	<body onload="load()">	
		<div class='center'>	
		<a href="index.php"><H1>SIMPLE STACK EXCHANGE</H1></a>
		
		<form action="index.php" method="post">
			<input type="text" size=130px name="keyword">
			<input type="submit" value="Search"><br><br>
			
				<H5>Can't find what you are looking for? <a id='ask' href="ask.php?mode=0">Ask Here</a></H5>	
			
		</form>	
		</div>		
		<H4>Recently Asked Questions</H4>
		<br>
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
				    if (xhttp.readyState == 4 && xmlhttp.status == 200) {
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
