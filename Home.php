<?php
	require_once("./Database.php");
	include("./Header.php");
?>

<head>

<link rel="stylesheet" href="style.css">

<script>
function search() {
     
}
</script>




</head>


<body>

<!-- Search box -->
<div class = "center">
<form>
	<input type= "search" name= "Search" size = "50">
	<input type = "button" onclick = "myFunction()" value = "Search" /> 
</form>
	Cannot find what you are looking for? <a href = "Ask.php"> Ask here </a>




<br><br>
<div class = "left">Recently Asked Questions</div>
<table style="width:100%" name = "RAQ">
	<tr>
		<td>
			<?php echo countAnswer(1); ?><br/>
			Answer(s)
		</td>
	</tr>
</table>

</div>	


<?php
	include("./Footer.php");
?>
